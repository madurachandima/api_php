<?php
include('checkUserLocation.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class PostLocation
{
    static  function saveLocation($data)
    {

        $latitude = $data->latitude;
        $longitude = $data->longitude;
        $patient_id = $data->patient_id;

        $query = "INSERT INTO user_location_history(latitude,longitude,patient_id) VALUES ('$data->latitude','$data->longitude','$data->patient_id')";
        $conn = Connection::getConnection();
        print($conn->error);
        if (mysqli_query($conn, $query)) {
           
            $response["status"] = 201;
            $response["message"] = "New record inserted id : " . mysqli_insert_id($conn);
            $response["data"] = "";
            CheckLocation::checkUserLocation($latitude, $longitude, $patient_id);
        } else {
            $response["status"] = 500;
            $response["message"] = "Internal Server Error" . $conn->error;
            $response["data"] = "";
        }

        // echo json_encode($response);
        exit;
    }
}
