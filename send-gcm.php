#!/usr/bin/php
<?php

// your Google Cloud Messenger API Key
$gcm_api_key = 'YOUR_API_KEY';

// array of registration IDs from Android devices (recipients of your push message)
$registration_ids = array('REGISTRATION_ID1', 'REGISTRATION_ID2');

// data to be sent to the Android device
$msg = array(
	'to' => 'Earl Cooper',
	'message' => 'hello earl');

// package it all up
$data = array(
    'registration_ids' => $registration_ids,
    'data' => $msg);

// headers, notice the authorization key
$headers = array(
	'Authorization: key=' . $gcm_api_key,
    'Content-Type: application/json');

// make the curl request
$request = curl_init();
curl_setopt($request, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($data));

// execute the request
$result = curl_exec($request);
curl_close($request);

// print the result
echo $result;

?>
