<?php
class UserModel extends DB
{
    public function loginModel($username, $password)
    {
        $sql = "select * from ts_user where username = ?";
        $stmt = mysqli_prepare($this->con, $sql);
        mysqli_stmt_bind_param($stmt,'s',$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $getData = mysqli_fetch_assoc($result);
        
        if( mysqli_num_rows($result) > 0 )
        {
            if($getData['password'] == md5($password)) {            
                $_SESSION['user']= $getData['username'];
                $_SESSION['ID']= $getData['id_user'];
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    function oldPasswordMatched($password){
		$sql = "SELECT * FROM ts_user WHERE id_user = ?";
		$stmt = mysqli_prepare($this->con, $sql);
        mysqli_stmt_bind_param($stmt,'i',$_SESSION['ID']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
		if( mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_assoc($result);
            $pass = $row['password'];
            if(  md5($password) == $pass  ){
                return true;
            }
            else {
                return false;
            }

        }
        else
        {
            return false;
        }

    }
    
    public function UpdatePass($npass)
    {
        $id = $_SESSION['ID'];
        $pass = md5($npass);
        $sql = "update ts_user set password = ? where id_user = ? ";
        $stmt = mysqli_prepare($this->con, $sql);
        mysqli_stmt_bind_param($stmt,'si',$pass,$id);
            
        if(mysqli_stmt_execute($stmt) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>