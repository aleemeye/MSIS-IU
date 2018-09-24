<?php
require '../../app/common.php';
//get the taskID
  //if set use value if not use 0
$taskID = $_GET['taskID'] ?? 0;

//fetch work from SQLiteDatabase
  //static properties is the double colon
$work =Work::findByTaskID($taskID);

//convert to JSON and Print
echo json_encode($work);
