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

    /**This function creates DB Dynamically by getting input from UI*
     * @param $DbName
     */
    public function create_database($DbName){

        if ($DbName){
            var_dump($DbName);
                    $this->model->createDb($DbName['dbname']);
                    header("location:/");

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
            var_dump($table);
            $dbname =$table['dbname'];
            $table_name=$table['Table_Name'];

            $this->model->creatingTableOnDb($dbname,$table_name);

            $table_column =$table['column_name'];
            $table_datatype =$table['data_type'];
            $count =count($table['column_name']);

            for ($i=0;$i<$count;$i++){
                $this->model->addcolumn($dbname,$table_name,$table_column[$i],$table_datatype[$i]);

            }


        }
        else{
           $databaseList=$this->model->gettingDatabaseList();
//           var_dump($databaseList);
            require "view/create_table.view.php";
        }
    }

}
