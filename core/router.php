<?php

class router {
    public $router = [];
    public $controller;
    public function __construct()
    {
        $this->controller = new controller();
    }



    public function get($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
            'middleware' => null
        ];
        return $this;
    }

    public function post($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'POST',
            'middleware' => null
        ];
        return $this;
    }

    public function delete($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'DELETE',
            'middleware' => null
        ];
        return $this;
    }

    public function patch($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'PATCH',
            'middleware' => null
        ];
        return $this;
    }

    public function routingFunction(){

        foreach ($this->router as $key) {
            if($key['uri'] === $_SERVER['REQUEST_URI']){

                if($key['action']){
                    switch ($key['action']){
                        case 'create_database':
                            $this->controller->create_database($_POST);
                            break;
                        case 'create_table':
                            $this->controller->create_table($_POST);
                            break;
                        default :
                            $this->controller->index();
                    }
                }else{
                    $this->controller->index();
                }

            }
        }
        exit();
    }
}
