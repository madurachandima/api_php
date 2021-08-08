<?php
include('isUserInRange.php');
include('callSmsApi.php');

class CheckLocation
{
    static  function checkUserLocation($latitude, $longitude, $patient_id)
    {

        $center_lat = null;
        $center_lon = null;
        $center_id = null;
        $cernter_name=null;

        //Todo : get center_id using user_id from user_registration_table 
        $conn = Connection::getConnection();
        $query = "SELECT `center_id` FROM `patients` WHERE id = '$patient_id'";
        $result = mysqli_query($conn, $query);



        if ($result->num_rows > 0) {
            $data = array();

            while ($users = mysqli_fetch_assoc($result)) {
                $data[] = $users;
                $center_id = $data[0]['center_id'];
            }
        }

        //TODO : get center location useing center_id
        if (!is_null($center_id)) {
            $query = "SELECT * FROM `quarantine_centres` WHERE center_id = '$center_id'";
            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {
                $data = array();

                while ($users = mysqli_fetch_assoc($result)) {
                    $data[] = $users;
                    $center_lat = $data[0]['latitude'];
                    $center_lon = $data[0]['longitude'];
                    $cernter_name = $data[0]['centre_location'];
                }
            }
        }


        if (!is_null($center_lat) && !is_null($center_lon)) {

            $center_lat_max = $center_lat + 12.200;
            $center_lon_max = $center_lon + 12.200;

            if (
                !UserRange::isUserinRange($latitude, $center_lat, $center_lat_max) &&
                !UserRange::isUserinRange($longitude, $center_lon, $center_lon_max)
            ) {

                //TODO get reciver details
                $query = "SELECT * FROM `officers` WHERE centre = '$cernter_name'";
                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    $officer_data = array();

                    while ($users = mysqli_fetch_assoc($result)) {
                        $officer_data[] = $users;
                    }


                    foreach($officer_data as $officer){

                        echo "$officer[mobile]<br>";
                        
                        $get_data = CallApi::callSmsApi();
                        print($get_data);
                        $response = json_decode($get_data, true);
                        echo "$response[title]<br>";
                    }


                    //TODO call sms api
                   
                }

            
            }
        }
    }
}
