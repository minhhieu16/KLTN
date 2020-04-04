<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

    public function SessionProcess()
    {
        if(isset($_SESSION['ID']))
        {
            return true;
            #echo '<script language="javascript">location.href="./../index.php";</script>';
        }
        else
        {
            return false;
        }
    }
}
?>