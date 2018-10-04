<?php

class Team{
  public $id;
  public $name;

  public function __contstruct($row){
    $this->id = intval($row['id']);

    $this->task_id = intval($row['name']);
  }


  public static function findAll($id){
    //1. get database connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  
    //2. prepare query
    $sql = 'SELECT * FROM Team';

    $statement = $db->prepare($sql);

    //3. execute
    $success = $statement->execute();

    //4. Handle result
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
      //4.a for each row, make a new work SplObjectStorage
      $theTeam = new Team($row);

      array_push($arr, $theTeam);

      //4.b. return array
      return $arr;


    }
  }
