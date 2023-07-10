<?php

class connection{
    public $db;
    public function __construct()
    {
        try{
            $this->db = new PDO('mysql:host=localhost','root','welcome');
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

    public  function creatingTableOnDb($table){
        try {
            $dbname =$table['dbname'];
            $table_name=$table['Table_Name'];
            var_dump($table);

            $sql =("USE '$dbname';
            create table $table_name(
                id int not null AUTO_INCREMENT,
                primary key(id)
            );");

            $this->db->query($sql);
            echo "oki";
        }
        catch (PDOException $e){
            die($e->getMessage());
        }





    }
}

