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

class model extends connection
{

    /**Creating db in phpMyAdmin*
     * @param $name
     */
    public function createDb($name)
    {
        $this->db->query("CREATE DATABASE $name");

    }


    /**This function validates whether the db name is already
     * exists in local host*
     * @param $DbName
     * @return
     */
    public function dbValidation($DbName)
    {
        return $this->db->query("
        SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA
        WHERE SCHEMA_NAME = '$DbName'")->fetchAll(PDO::FETCH_ASSOC);
    }

    /**getting Database**/
    public function gettingDatabaseList()
    {
        return $this->db->query("SHOW DATABASES")->fetchAll(PDO::FETCH_OBJ);
    }

    public function creatingTableOnDb($dbname, $table_name)
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
    public function addcolumn($dbname, $table_name, $table_column, $table_datatype)
    {
        $this->db->query("
        USE $dbname;
        ALTER TABLE $table_name ADD COLUMN $table_column $table_datatype;
        ");
    }

    /**getting table to fetch on ui by giving variable name *
     * @param $dbname
     * @return array
     */
    public function gettableondb($dbname)
    {
        $tablename = $this->db->query("SELECT TABLE_NAME AS tablesname,TABLE_SCHEMA 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = '$dbname';")->fetchAll(PDO::FETCH_OBJ);
        return $tablename;
    }


    /**getting column to fetch on ui by giving variable name *
     * @param $tablename
     * @param $dbname
     * @return array
     */
    public function gettingcolumndb($tablename, $dbname)
    {
        $column = $this->db->query("SELECT column_name 
            FROM `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE `TABLE_SCHEMA`='$dbname' 
                AND `TABLE_NAME`='$tablename'")->fetchAll(PDO::FETCH_OBJ);
        return $column;
    }


//    /**Inserting data into db by getting values*
//     * @param $dbname
//     * @param $table_name
//     * @param $column_name
//     * @param $values
//     */

    public function insertingdata($dbname, $table_name, $column_name, $values)
    {
        $this->db->query("
        USE $dbname;
        INSERT INTO $table_name ($column_name) values ($values)
        ");
        return $this->db->query("SELECT id FROM $table_name ORDER BY id desc")->fetchAll(PDO::FETCH_NAMED);
    }

    public function updateData($dbname,$table_name,$column_name,$values,$id)
    {
        $this->db->query("
    use $dbname;
    UPDATE $table_name set $column_name = $values WHERE id = '$id'");
    }
}

