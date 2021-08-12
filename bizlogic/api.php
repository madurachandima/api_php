<?php
include('connection/connection.php');
include('httpMethods/httpMethod.php');
include('api/urlEndpoint/urlEndpoint.php');
include('api/sendLocation.php');
include('api/patientSms.php');


$requestMethod = $_SERVER["REQUEST_METHOD"];
$request_url = $_SERVER['REQUEST_URI'];

print($request_url);
switch ($requestMethod) {
        case httpMethod::POST:
                switch ($request_url) {
                        case urlEndpoint::REGISTER:
                                $userdata = json_decode(file_get_contents("php://input"));
                                PostLocation::saveLocation($userdata);
                                break;
                        case urlEndpoint::SENDSMS:
                                $userdata = json_decode(file_get_contents("php://input"));
                                SendPatientSms::senPatientSms($userdata);
                                break;
                }
                break;
}
