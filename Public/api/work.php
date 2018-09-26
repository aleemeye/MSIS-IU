<?php
require '../../app/common.php';
//get the taskID
  //if set use value if not use 0
$taskID = $_GET['taskID'] ?? 0;

//fetch work from SQL
  //static method is the double colon, instance methods apply to data of a specific instance; static can operate without specific instance
$work =Work::findByTaskID($taskID);


//convert to JSON and Print
echo json_encode($work);
