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
        return $where = " AND dr.Date BETWEEN '".$date1." 00:00:00' AND '".$date2." 23:59:59'";
    }
    public function getReport($where)
    {
        
        $sql = "SELECT dr.ID_Report,dr.EmpID,dr.Date,iss.IssueName, lv.Level, st.Status, s.ShiftName,dr.Start, dr.Finished, dr.Total ,emp.DisplayName, dr.Note, dr.Reason,dr.Solution,dr.IsActive,dr.Type FROM tbl_dailyreport dr 
            join tbl_issue iss on iss.ID_Issue=dr.ID_Issue
            join tbl_level lv on lv.ID_Level=dr.ID_Level
            join tbl_status st on st.ID_Status=dr.ID_Status
            join tbl_employee emp on emp.EmpID=dr.EmpID
            join tbl_shiftname s on s.ShiftID=dr.ShiftID
            WHERE dr.IsActive = 1 ".$where." ORDER by dr.ID_Report DESC";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        $i = 1;
        while($rows = mysqli_fetch_array($row))
        {
            $sub_array = array();
            $sub_array[] = $i;
            $sub_array[] = date('d/m/y',strtotime($rows["Date"]));
            $sub_array[] = $rows["IssueName"];
            $sub_array[] = $rows["Type"];
            $sub_array[] = $rows["Level"];
            $sub_array[] = $rows["Status"];
            $sub_array[] = '<a style="font-weight:bold" class="green">'.$rows["ShiftName"].'</a>';
            $sub_array[] = $rows["Start"];
            $sub_array[] = $rows["Finished"];
            $sub_array[] = $rows["Total"];
            $sub_array[] = $rows["DisplayName"];
            $sub_array[] = $rows["Note"];
            $sub_array[] = $rows["Reason"];
            $sub_array[] = $rows["Solution"];
            //$sub_array[] = $rows["ID_Report"];
            $sub_array[] = "<a href='DailyReport/Edit/".$rows['ID_Report']."' id='editReport' class='btn btn-info btn-xs' ><i class='fa fa-pencil'></i>Edit</a>";
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
     $sql = "SELECT * FROM tbl_dailyreport";
     $result = mysqli_query($this->con,$sql);
     return mysqli_num_rows($result);
    }
    public function number_filter_row()
    {
     $sql = "SELECT * FROM tbl_dailyreport";
     $result = mysqli_query($this->con,$sql);
     return mysqli_num_rows($result);
    }

    public function Add_Issue(){
        $sql = "SELECT * FROM tbl_issue WHERE IsActive = 1 ORDER BY IssueName ASC";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Type(){
        $sql = "SELECT * FROM tbl_type WHERE IsActive = 1 ORDER BY name_type ASC";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Status(){
        $sql = "SELECT * FROM tbl_status WHERE IsActive = 1";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Shift(){
        $sql = "SELECT * FROM tbl_shiftname WHERE IsActive = 1";
        $arr = array();
        $row = mysqli_query($this->con,$sql);
        while($rows = mysqli_fetch_array($row))
        {
            $arr[]= $rows;
        }
        return json_encode($arr);
    }
    public function Add_Level(){
        $sql = "SELECT * FROM tbl_level WHERE IsActive = 1";
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
        $sql = "select Type from tbl_issue where ID_Issue = '$id' AND IsActive = 1 ";
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
        // $sql = "insert into tbl_dailyreport values(null,CURRENT_TIMESTAMP,'".$data['issue']."',
        // '".$data['mc']."','".$data['level']."','".$data['status']."','".$data['shift']."',
        // '".$data['start']."','".$data['finish']."','".$data['total']."',
        // '".$_SESSION['ID']."','".$data['note']."','".$data['reason']."',
        // '".$data['solution']."',1)";
        // $result = mysqli_query($this->con,$sql);
        // return $result;
        $sql1 = "insert into tbl_dailyreport values(null,CURRENT_TIMESTAMP,?,?,?,?,?,?,?,?,?,?,?,?,1)";
        $stmt = mysqli_prepare($this->con,$sql1);
        mysqli_stmt_bind_param($stmt,"isiiisssisss",$data['issue'],$data['mc'],$data['level'],
                                                    $data['status'],$data['shift'],$data['start'],
                                                    $data['finish'],$data['total'],$_SESSION['ID'],
                                                    $data['note'],$data['reason'],$data['solution']);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    public function checkEdit($id)
    {
        $sql = "select * from tbl_dailyreport where ID_Report = $id AND IsActive = 1";
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
        $sql = "select DisplayName from tbl_employee where EmpID = $idUser AND IsActive = 1";
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
        

        // $sql ="UPDATE tbl_dailyreport 
        // SET ID_Issue = '".$data['issue']."' ,  Type = '".$data['mc']."',
        //     ID_Level = '".$data['level']."' ,  ID_Status = '".$data['status']."',
        //     ShiftID = '".$data['shift']."' ,  Start = '".$data['start']."',
        //     Finished = '".$data['finish']."' ,  Total = '".$data['total']."',
        //     Note = '".$data['note']."' ,  Reason = '".$data['reason']."',
        //     Solution = '".$data['solution']."'
        // WHERE ID_Report = '".$data['idReport']."'";
        // $result = mysqli_query($this->con,$sql);
        // return $result;

        $sql1 = " UPDATE tbl_dailyreport SET 
                ID_Issue = ?, Type = ? , ID_Level = ?,
                ID_Status = ?, ShiftID= ?, Start=?,
                Finished = ?, Total = ?, Note= ? ,
                Reason = ? , Solution= ?
            WHERE ID_Report = ?
        ";
        $stmt =  mysqli_prepare($this->con,$sql1);
        mysqli_stmt_bind_param($stmt,"isiiissssssi",$data['issue'],$data['mc'],$data['level'],
                                                    $data['status'],$data['shift'],$data['start'],
                                                    $data['finish'],$data['total'],$data['note']
                                                    ,$data['reason'],$data['solution'],$data['idReport']);
        $result = mysqli_stmt_execute($stmt);
        return $result;

    }
}


?>