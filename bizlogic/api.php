<?php
include('connection/connection.php');
include('httpMethods/httpMethod.php');
include('api/urlEndpoint/urlEndpoint.php');
include('api/userRegistration.php');


$requestMethod = $_SERVER["REQUEST_METHOD"];
$request_url = $_SERVER['REQUEST_URI'];

switch ($requestMethod) {
        case httpMethod::POST:
                switch ($request_url) {                 
                        case urlEndpoint::REGISTER:
                                $user = json_decode(file_get_contents("php://input"));
                                PostUser::saveUser($user);
                                break;                    
                }
                break;
}
