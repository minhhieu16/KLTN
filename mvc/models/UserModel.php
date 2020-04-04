<?php
class UserModel extends DB
{
    public function loginModel($username, $password)
    {
        $sql = "select * from tbl_employee where Username = '$username' and Passcode = '$password'";
        $result = mysqli_query($this->con,$sql);  
        if(mysqli_num_rows($result)!=0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $_SESSION['user']= $row['Username'];
                $_SESSION['display_name']= $row['DisplayName'];
                $_SESSION['ID']= $row['EmpID'];
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