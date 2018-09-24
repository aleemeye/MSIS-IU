<?php

class work{
  public $work_id;
  public $task_it;
  public $team_id;
  public $start_date;
  public $stop_date;
  public $hours;

  public function __contstruct($data){

    //TODO
  }

  public static function findByTaskID($taskID){
    //1. get database connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    var_dump($db);

    die;
    //2. prepare query

    //3. execute

    //4.
  }
}
 ?>
