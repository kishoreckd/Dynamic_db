<?php

require 'model/model.php';

class controller{
    public $model;
    public function __construct()
    {
        $this->model = new model();
    }

    /**This function used to show the home_page UI first, when the localhost hits **/
    public function index(){

            require 'view/home.view.php';
    }

    /**This function creates DB Dynamically by getting input from UI
     and check if the database already exists*
     * @param $DbName
     */
    public function create_database($DbName){

        unset($_SESSION['db_name_exists']);
        if ($DbName){
            $db_Validate = $this->model->dbValidation($DbName['dbname']);
            if(!isset($db_Validate[0]['SCHEMA_NAME'])){
                $this->model->createDb($DbName['dbname']);
                header('location: /');
            }
            else{
                $_SESSION['db_name_exists']=$DbName['dbname'];
                require "view/create_db.view.php";
            }
        }
        else{
            require "view/create_db.view.php";
        }

    }


    /**This function creates table on db*
     * @param $table
     */
    public function create_table($table)
    {
        if ($table){
            $dbname =$table['dbname'];
            $table_name=$table['Table_Name'];
//            $this->model->tableValidation($table_name);
            $this->model->creatingTableOnDb($dbname,$table_name);

            $table_column =$table['column_name'];
            $table_datatype =$table['data_type'];
            $count =count($table['column_name']);

            for ($i=0;$i<$count;$i++){
                if ($table_column[$i] !='' && $table_datatype[$i] != ''){
                    $this->model->addcolumn($dbname,$table_name,$table_column[$i],$table_datatype[$i]);
                }
            }
            header("location:/");

        }
        else{
           $databaseList=$this->model->gettingDatabaseList();
            require "view/create_table.view.php";
        }
    }

    /**creating data dynamically by getting values in db**/
    public  function  create_data($datas){
        if ($datas){

        }
        else{
            $databaseList=$this->model->gettingDatabaseList();

            require "view/create_data.view.php";
        }
    }

    function gettingtable($dbname){
       $tablename= $this->model->gettableondb($dbname);
//       var_dump($tablename);
      echo json_encode($tablename);
//        $databaseList=$this->model->gettingDatabaseList();

    }



}


