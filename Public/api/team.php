<?php
require '../../app/common.php';

//fetch all from database
$team = Team ::findAll();

//convert to JSON and Print
header('Content-type: application/json');
echo json_encode($work);
