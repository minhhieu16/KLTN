<?php
class UserModel extends DB
{
    public function loginModel($username, $password)
    {
        echo $sql = "select * from user where username = '$username' and password = '$password'";
        $result = mysqli_query($this->con,$sql);  
        if(mysqli_num_rows($result)!=0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $_SESSION['user']= $row['username'];
                $_SESSION['display_name']= $row['username'];
                $_SESSION['ID']= $row['id_user'];
            }
            return true;
        }
        else
        {
            return false;
        }
    }
    function oldPasswordMatched($password){
        $id = $_SESSION['ID'];
		$sql = "SELECT * FROM tbl_employee WHERE EmpID= '$id'";
		$result = mysqli_query($this->con,$sql);  
		
		if( mysqli_num_rows($result)!=0 ){


			while( $row = mysqli_fetch_assoc($result) ){
                $pass = $row['Passcode'];
                
            }

            if(  $password == $pass  ){
                return true;
            }
            else {
                return false;
            }

		}
		return false;

    }
    
    public function UpdatePass($npass)
    {
        $id = $_SESSION['ID'];
        $sql = "update tbl_employee set Passcode = '$npass' where EmpID='$id'";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }
}

?>