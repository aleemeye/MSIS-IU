<?php
require '../../app/common.php';

//fetch all from database
$team = Team ::findAll();

//convert to JSON and Print
echo json_encode($work); 
