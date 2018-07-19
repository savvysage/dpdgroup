<?php

session_start();
require 'funcs.php';
require_login();

if (!areset(['shipper_name', 'shipper_phone', 'shipper_addr', 'receiver_name', 'receiver_phone', 'consign_no', 'ship_type', 'weight',
	'invoice_no', 'booking_mode', 'total_freight', 'mode', 'pickup_date_time', 'est_time_of_arrival', 'status', 'current_loc',
	'comment', 'comment2', 'comment3'])) {
	header('Location: index.php?msg=Err1: An error occured. Please try again later.');
	exit();
}

$tracking_no = $_POST['tracking_no'];
$shipper_name = $_POST['shipper_name'];
$shipper_phone = $_POST['shipper_phone'];
$shipper_addr = $_POST['shipper_addr'];
$receiver_name = $_POST['receiver_name'];
$receiver_phone = $_POST['receiver_phone'];
$consign_no = $_POST['consign_no'];
$ship_type = $_POST['ship_type'];
$weight = $_POST['weight'];
$invoice_no = $_POST['invoice_no'];
$booking_mode = $_POST['booking_mode'];
$total_freight = $_POST['total_freight'];
$mode = $_POST['mode'];
$pickup_date_time = $_POST['pickup_date_time'];
$est_time_of_arrival = $_POST['est_time_of_arrival'];
$status = $_POST['status'];
$current_loc = $_POST['current_loc'];
$comment = $_POST['comment'];
$comment2 = $_POST['comment2'];
$comment3 = $_POST['comment3'];

$query = 'UPDATE `tracking_infos` SET `shipper_name` = "' . $shipper_name . '", `shipper_phone` = "' . $shipper_phone . '",
`shipper_addr` = "' . $shipper_addr . '", `receiver_name` = "' . $receiver_name . '", `receiver_phone` = "' . $receiver_phone . '",
`consign_no` = "' . $consign_no . '", `ship_type` = "' . $ship_type . '", `weight` = "' . $weight . '",
`invoice_no` = "' . $invoice_no . '", `booking_mode` = "' . $booking_mode . '", `total_freight` = "' . $total_freight . '",
`mode` = "' . $mode . '", `pickup_date_time` = "' . $pickup_date_time . '", `est_time_of_arrival` = "' . $est_time_of_arrival . '",
`status` = "' . $status . '", `current_loc` = "' . $current_loc . '", `comment` = "' . $comment . '", `comment2` = "' . $comment2 . '",
`comment3` = "' . $comment3 . '" WHERE `tracking_no` = "' . $tracking_no . '"';

if (!(mysqli_query(db_conn(), $query))) {
    header('Location: index.php?msg=Err2: The tracking info could not be updated in the database. Please try again later.');
} else {
	header('Location: index.php?msg=The tracking info has been updated in the database.');
}

exit();
