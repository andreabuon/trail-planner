<?php
//Interfaccia per richieste Javascript
include 'get_data.php';

if(!isset($_GET['what']))
	exit();

switch($_GET['what']){
	case('parks'):
		echo json_encode(getParks());
		break;
	case('trails'):
		if(isset($_GET['park']))
			echo json_encode(getParkTrails($_GET['park']));
		else
			echo json_encode(getTrails());
		break;
	case('events'):
		//to implement
		// %
		break;
	default:
		break;
}
?>