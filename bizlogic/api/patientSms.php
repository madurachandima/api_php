<?php

class SendPatientSms
{
    static  function senPatientSms($data)
    {

        $patient_id = $data->patient_id;

        $cernter_name = null;
        $officer_mobile = null;
        $msg=null;

        $query = "SELECT `center_name` FROM `patients` WHERE id = '$patient_id'";
        $conn = Connection::getConnection();
        $result = mysqli_query($conn, $query);
        print($conn->error);

        if ($result->num_rows > 0) {
            $data = array();

            while ($users = mysqli_fetch_assoc($result)) {
                $data[] = $users;
                $cernter_name = $data[0]['center_name'];
            }
        }

        if(!is_null($cernter_name)){
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
                    $msg = "Need Help patient id : '$patient_id'";
                    //TODO call sms api and send officer_mobile
                    CallApi::callSmsApi($officer_mobile,$msg);

                }
            }
        }
        
        exit;
    }
}

?>