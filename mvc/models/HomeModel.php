<?php
class HomeModel extends DB
{
    
    public function handle_date($date){
        $date = str_replace(" ","",$date);
        $s = explode("-",$date);
        $s1 = explode("/",$s[0]);
        $s2 = explode("/",$s[1]);
        $date1 = $s1['2'].'-'.$s1['1'].'-'.$s1['0'];
        $date2 = $s2['2'].'-'.$s2['1'].'-'.$s2['0'];
        return $where = " AND dr.date BETWEEN '".$date1." 00:00:00' AND '".$date2." 23:59:59'";
    }
    public function getReport($where)
    {
        
        $sql = "SELECT dr.id_report,dr.id_user,dr.date,iss.name_issue, lv.name_level, st.name_status, s.name_shift,dr.start, dr.finish, dr.total ,emp.first_name, emp.last_name, dr.note, dr.reason,dr.solution,dr.is_active, ty.name_type FROM ts_report dr 
            join ts_issue iss on iss.id_issue=dr.id_issue
            join ts_level lv on lv.id_level=dr.id_level
            join ts_status st on st.id_status=dr.id_status
            join ts_user emp on emp.id_user=dr.id_user
            join ts_shift s on s.id_shift=dr.id_shift
            join ts_type ty on ty.id_type=dr.id_type
            WHERE dr.is_active = 1 ".$where." ORDER by dr.id_report DESC";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        $i = 1;
        while($rows = mysqli_fetch_array($row))
        {
            $sub_array = array();
            $sub_array[] = $i;
            $sub_array[] = date('d/m/y',strtotime($rows["date"]));
            $sub_array[] = $rows["name_issue"];
            $sub_array[] = $rows["name_type"];
            $sub_array[] = $rows["name_level"];
            $sub_array[] = $rows["name_status"];
            $sub_array[] = '<a style="font-weight:bold" class="green">'.$rows["name_shift"].'</a>';
            $sub_array[] = $rows["start"];
            $sub_array[] = $rows["finish"];
            $sub_array[] = $rows["total"];
            $sub_array[] = $rows["last_name"] . " " . $rows["first_name"];
            $sub_array[] = $rows["note"];
            $sub_array[] = $rows["reason"];
            $sub_array[] = $rows["solution"];
            
            $sub_array[] = "<a href='DailyReport/Edit/".$rows['id_report']."' id='editReport' class='btn btn-info btn-xs' ><i class='fa fa-pencil'></i>Edit</a>";
            $arr[] = $sub_array;
            $i+=1;
        }
       
        $output = array(
        "recordsTotal"  =>  $this->get_all_data(),
        "recordsFiltered" => $this->number_filter_row(),
        "data"    => $arr
        );

        return json_encode($output);
    }
    public function get_all_data()
    {
     $sql = "SELECT * FROM ts_report";
     $result = mysqli_query($this->con,$sql);
     return mysqli_num_rows($result);
    }
    public function number_filter_row()
    {
     $sql = "SELECT * FROM ts_report";
     $result = mysqli_query($this->con,$sql);
     return mysqli_num_rows($result);
    }

    public function Add_Issue(){
        $sql = "SELECT * FROM ts_issue WHERE is_active = 1 ORDER BY name_issue ASC";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Type(){
        $sql = "SELECT * FROM ts_type WHERE is_active = 1 ORDER BY name_type ASC";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Status(){
        $sql = "SELECT * FROM ts_status WHERE is_active = 1";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Shift(){
        $sql = "SELECT * FROM ts_shift WHERE is_active = 1";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Level(){
        $sql = "SELECT * FROM ts_level WHERE is_active = 1";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function selectType($id)
    {
        $sql = "select type from ts_issue where id_issue = '$id' AND is_active = 1 ";
        $res = mysqli_query($this->con, $sql);
        $arr = array();
        if(mysqli_num_rows($res)>0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $arr[] = $row;
            }
        }
        return $arr;

    }

    public function addNewReportModel($data)
    {
        $data['note'] = mysqli_real_escape_string($this->con,$data['note']);
        $data['reason'] = mysqli_real_escape_string($this->con,$data['reason']);
        $data['solution'] = mysqli_real_escape_string($this->con,$data['solution']);
        $sql = "insert into ts_report(start, finish, total, id_user, id_level, id_status, id_shift, id_issue, id_type, note, reason, solution) values(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->con,$sql);
        mysqli_stmt_bind_param($stmt,"sssiiiiiisss",$data['start'],$data['finish'],$data['total'],$_SESSION['ID'],$data['level'],$data['status'],$data['shift'],$data['issue'],$data['type'],$data['note'],$data['reason'],$data['solution']);
        
        if ( mysqli_stmt_execute($stmt) ) {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function checkEdit($id)
    {
        $sql = "select * from ts_report where id_report = $id AND is_active = 1";
        $res = mysqli_query($this->con,$sql);
        $arr = array();
        if(mysqli_num_rows($res)>0)
        {
            while($row=  mysqli_fetch_assoc($res))
            {
                $arr[] = $row;
                
                
            }
            
        }
        return json_encode($arr);
    }

    public function getName($idUser)
    {
        $sql = "select first_name, last_name from ts_user where id_user = $idUser AND is_active = 1";
        $res = mysqli_query($this->con,$sql);
        $arr = array();
        if(mysqli_num_rows($res)>0)
        {
            while($row=  mysqli_fetch_assoc($res))
            {
                $arr[] = $row;
            }
            
        }
        return $arr;
    }

    public function EditReportModel($data)
    {
        $data['note'] = mysqli_real_escape_string($this->con,$data['note']);
        $data['reason'] = mysqli_real_escape_string($this->con,$data['reason']);
        $data['solution'] = mysqli_real_escape_string($this->con,$data['solution']);
        $sql1 = " update ts_report set id_issue = ?, id_type = ? , id_level = ?, id_status = ?, id_shift= ?, start=?, finish = ?, total = ?, note= ? , reason = ? , solution= ? WHERE id_report = ? ";
        $stmt =  mysqli_prepare($this->con,$sql1);
        mysqli_stmt_bind_param($stmt,"iiiiissssssi",$data['issue'],$data['type'],$data['level'], $data['status'],$data['shift'],$data['start'], $data['finish'],$data['total'],$data['note'],$data['reason'],$data['solution'],$data['id_report']);
        
        if(mysqli_stmt_execute($stmt))
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