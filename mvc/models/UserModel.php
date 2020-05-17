<?php
class UserModel extends DB
{
    public function loginModel($username, $password)
    {
        $sql = "select * from ts_user where username = ?";
        $result = $this->prepare($sql);
        $result->bind_param('s',$username);
        $result->execute();  
        if($result->num_rows > 0 )
        {
            $row = $result->fetch_assoc();
            if($row['password'] == md5($password)) {
                while($row)
                {
                    $_SESSION['display_name']= $row['last_name'] + $row['first_name'];
                    $_SESSION['user']= $row['username'];
                    $_SESSION['ID']= $row['id_user'];
                }
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
        $id = $_SESSION['ID'];
		$sql = "SELECT * FROM ts_user WHERE id_user = '$id'";
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