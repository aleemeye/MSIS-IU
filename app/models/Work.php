<?php

class Work{
  public $work_id;
  public $task_it;
  public $team_id;
  public $start_date;
  public $stop_date;
  public $hours;
  public $complete_estimate;

  public function __contstruct($data){
    $this->id = intval($row['id']) ? intval($row['id']) : null;

    $this->task_id = intval($row['task_id']);
    $this->team_id = intval($row['team_id']);

    $this->start = intval($row['start']);
    $this->hours = intval($row['hours']);

    //calculate stop date
  }

  public function create() {
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);

    //2. prepare query
    $sql = 'INSERT INTO Work(task_id, team_id, start_date, hours, completion_estimate) VALUES (?, ?, ?, ?, ?)';

    $statement = $db->prepare($sql);

    //3. execute
    $success = $statement->execute([
      $this->task_id,
      $this->team_id,
      $this->start,
      $this->hours,
      $this->completion_estimate
    ]);

    $this->id = $db->lastInsertID();
      
  }

  public static function findByTaskID($taskID){
    //1. get database connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    var_dump($db);

    die;
    //2. prepare query
    $sql = 'SELECT * FROM Work WHERE task_id = ?';

    $statement = $db->prepare($sql);

    //3. execute
    $success = $statement->execute(
        [$taskID]
      );

    //4. Handle result
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
      //4.a for each row, make a new work SplObjectStorage
      $workItem = new Work($row);

      array_push($arr, $workItem);

      //4.b. return array
      return $arr;

    }
  }


}
