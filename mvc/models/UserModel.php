<?php
class UserModel extends DB
{
    public function loginModel($username, $password)
    {
        $username = $this->con->real_escape_string($username);
        $sql = "select * from ts_user where username = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $getData = $result->fetch_assoc();
        
        if( $result->num_rows > 0 )
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
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('i',$_SESSION['ID']);
        $stmt->execute();
        $result = $stmt->get_result();
        
        /// -----------------------------------
		if( $result->num_rows > 0 ){
            $row = $result->fetch_assoc();
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
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('si',$pass,$id);
            
        if($stmt->execute() )
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