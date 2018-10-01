<?php

class webapps {
    public $hostname = "localhost";
    public $user = "root";
    public $password = "";
    public $database = "practical exam";
    public $connection;

    public function __construct ()
{
        $this->connection = new mysqli($this->hostname,$this->user,$this->password,$this->database);

        if (!$this->connection){
            /* echo "connected";
        }else{ */
            echo "not connected";
        }
    }
    public function insert($insert_query){
        $return = $this->connection->query($insert_query);
        if($return){

            throw new exception ;
        }
    }


}

$webapps = new webapps;
?>