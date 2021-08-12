<?php
include('isUserInRange.php');
include('callSmsApi.php');

class CheckLocation
{
    static  function checkUserLocation($latitude, $longitude, $patient_id)
    {

        $center_lat = null;
        $center_lon = null;
        $cernter_name = null;
        $officer_mobile = null;
        $msg = null;

        //Todo : get cernter_name using user_id from user_registration_table 
        $conn = Connection::getConnection();
        $query = "SELECT `center_name` FROM `patients` WHERE id = '$patient_id'";
        $result = mysqli_query($conn, $query);
        print($conn->error);



        if ($result->num_rows > 0) {
            $data = array();

            while ($users = mysqli_fetch_assoc($result)) {
                $data[] = $users;
                $cernter_name = $data[0]['center_name'];
                
            }
        }

        //TODO : get center location useing cernter_name
        if (!is_null($cernter_name)) {
            $query = "SELECT * FROM `quarantine_centres` WHERE centre_location = '$cernter_name'";
            $result = mysqli_query($conn, $query);
            print($conn->error);

            if ($result->num_rows > 0) {
                $data = array();

                while ($users = mysqli_fetch_assoc($result)) {
                    $data[] = $users;
                    $center_lat = $data[0]['latitude'];
                    $center_lon = $data[0]['longitude'];
                
             
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


                $query = "SELECT * FROM `sms_status` WHERE patient_id = '$patient_id'";
                $result = mysqli_query($conn, $query);
                print($conn->error);

                if ($result->num_rows > 0) {
                    $is_reset = array();

                    while ($sms_status = mysqli_fetch_assoc($result)) {
                        $is_reset[] = $sms_status;
                    }
                    if ($is_reset[0]['is_reset'] == "I") {
                        //TODO get reciver details
                        $query = "SELECT * FROM `officers` WHERE centre = '$cernter_name'";
                        $result = mysqli_query($conn, $query);
                        print($conn->error);

                        if ($result->num_rows > 0) {

                            $officer_data = array();

                            while ($users = mysqli_fetch_assoc($result)) {
                                $officer_data[] = $users;
                            }

                            foreach ($officer_data as $officer) {

                                $officer_mobile = $officer['mobile'];

                                //TODO call sms api and send officer_mobile
                                $get_data = CallApi::callSmsApi($officer_mobile,$msg);
                                // $response = json_decode($get_data, true);

                                if ($get_data=="OK") {

                                    $query = "UPDATE sms_status SET is_reset = 'A' WHERE patient_id = '$patient_id'";
                                    mysqli_query($conn, $query);
                                    print($conn->error);
                                }
                            }
                        }
                    }
                } else {

                    //TODO get reciver details
                    $query = "SELECT * FROM `officers` WHERE centre = '$cernter_name'";
                    $result = mysqli_query($conn, $query);
                    print($conn->error);

                    if ($result->num_rows > 0) {

                        $officer_data = array();

                        while ($users = mysqli_fetch_assoc($result)) {
                            $officer_data[] = $users;
                        }

                        foreach ($officer_data as $officer) {

                            $officer_mobile = $officer['mobile'];

                            //TODO call sms api and send officer_mobile
                            $get_data = CallApi::callSmsApi($officer_mobile,$msg);

                            if ($get_data=="OK") {

                                $query = "INSERT INTO sms_status (sms_status,patient_id,send_to,is_reset) VALUES ('send','$patient_id','$officer_mobile','A')";
                                mysqli_query($conn, $query);
                                print($conn->error);
                            }
                        }
                    }
                }
            }else{
                print("cccccccc");
            }
        }
    }
}
