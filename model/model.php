<?php

class connection{
    public $db;
    public function __construct()
    {
        try{
            $this->db = new PDO('mysql:host=localhost','dckap','Dckap2023Ecommerce');
        }
        catch (exception $e){;
            die("connnection error".$e->getMessage());
        }
    }
}

class model extends connection{

    /**Creating db in phpMyAdmin*
     * @param $name
     */
    public function createDb($name){
        $this->db->query("CREATE DATABASE $name");
    }

    /**getting Database**/
    public function gettingDatabaseList(){
        return $this->db->query("SHOW DATABASES")->fetchAll  (PDO::FETCH_OBJ);
    }

    public  function creatingTableOnDb($dbname,$table_name){
        try {
                $this->db->query("
        USE $dbname;
        CREATE TABLE $table_name (
        id int auto_increment,
        primary key (id)
        )
        ");

        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function addcolumn($dbname,$table_name,$table_column,$table_datatype){
        $this->db->query("
        USE $dbname;
        ALTER TABLE $table_name ADD COLUMN $table_column $table_datatype;
        ");
    }
}

