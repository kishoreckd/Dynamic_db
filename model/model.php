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


    /**This function validates whether the db name is already
     * exists in local host*
     * @param $DbName
     * @return
     */
    public function dbValidation($DbName){
        return $this->db->query("
        SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA
        WHERE SCHEMA_NAME = '$DbName'")->fetchAll(PDO::FETCH_ASSOC);
    }

    /**getting Database**/
    public function gettingDatabaseList(){
        return $this->db->query("SHOW DATABASES")->fetchAll  (PDO::FETCH_OBJ);
    }

    public  function creatingTableOnDb($dbname,$table_name)
    {
        try {
            $this->db->query("
        USE $dbname;
        CREATE TABLE $table_name (
        id int auto_increment,
        primary key (id)
        )
        ");

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**Adding column for table**/
    public function addcolumn($dbname,$table_name,$table_column,$table_datatype){
        $this->db->query("
        USE $dbname;
        ALTER TABLE $table_name ADD COLUMN $table_column $table_datatype;
        ");
    }

    public function gettableondb($dbname){
        $tablename=$this->db->query("SHOW TABLES FROM $dbname")->fetchAll(PDO::FETCH_OBJ);
        return $tablename;
    }
}

