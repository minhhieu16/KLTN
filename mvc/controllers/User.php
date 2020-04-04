<?php
class User extends Controller 
{
    public $us;
    public $userChangePass;

    public function __construct()
    {
        $this->us = $this->model("UserModel");
        
        
    }

    function IndexLogin()
    {
        $this->view("login",[]);
    }

    public function UserLogin()
    {
        if(isset($_POST['btnLogin']))
        {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $kq = $this->us->loginModel($user,$pass);
            if($kq)
            {
                echo '<script language="javascript">location.href="../DailyReport/index";</script>';
               
            }
            else
            {
                echo '<script language="javascript">alert("Login Failed!");</script>';
                echo '<script language="javascript">location.href="../User/IndexLogin";</script>';
            }
             
        }
        else
        {
            echo '<script language="javascript">location.href="../User/IndexLogin";</script>';
        }
    }

    public function ChangePass()
    {

        if($_POST['key']=='ChangePass')
        {
            if( $this->us->oldPasswordMatched($_POST['opassword']) ){
                 if($this->us->UpdatePass($_POST['npassword']))
                 {
                     echo 'success';
                 }
                 else {
                     echo 'failed';
                 }
            }
            else {
                echo 'failed';
            }
        }
        else {
            echo 'failed';
        }



    }

    public function Logout()
    {
        session_unset();
        session_destroy();
        header("location: ./../index.php");
        exit();
    }
}

?>