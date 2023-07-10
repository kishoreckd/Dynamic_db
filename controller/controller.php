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

        }
        else{
            require "view/createdb.view.php";
        }

    }

}