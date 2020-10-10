<?php

class Controller {

    public function view($view,$data = [])
    {
          require_once '../app/views/'.$view.'.php';

        # code...
    }

     public function model($model)
    {
        require_once '../app/models/'.$model.'.php';
        return new $model;

        # code...
    }
}
