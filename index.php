<?php

	//
	//	Question2Answer API
	//	Author : Arun Anson
	//	Copyright (c) 2017 Hello Infinity Business Solutions Pvt. Ltd.
	//	15th June 2017
	//
	
	//Q2A Location on server
	define("Q2ALOCATION", "../q2a");

	include 'login.php';
	include 'update-profile.php';
	include 'get-questions.php';

	//Get JSON Request
	$json_request = json_decode(file_get_contents('php://input'), true);

	$interactionCode	= $json_request['requestHeader']['interactionCode'];
	$serviceId	= $json_request['requestHeader']['serviceId'];

	switch ($interactionCode) {

		case 'LOGIN':{
			login($json_request);
		}	
		break;
		
		case 'UPDATEPROFILE':{
			updateprofile($json_request);
		}
		break;

		case 'GETQUESTIONS':{
			get_questions($json_request);
		}
		break;

		default:{
				echo '{"responseHeader"	:	{
							"serviceId": "'.$serviceId.'",
							"status": "405",
							"message": "Method Not Allowed"
						}
					}';
			}
			break;
	}
?>