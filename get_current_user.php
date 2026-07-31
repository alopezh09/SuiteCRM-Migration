<?php

header('Content-Type: application/json; charset=utf-8');

$sessionPath = session_save_path();
$file = "$sessionPath/sess_" . $_REQUEST['sessid'];
$contents = file_get_contents($file);
session_start();
session_decode($contents);
echo json_encode($_SESSION);
