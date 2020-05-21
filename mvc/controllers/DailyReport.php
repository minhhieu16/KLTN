<?php
class DailyReport extends Controller 
{
    public $checkUser;
    public $rep;
    public function __construct ()
    {
        $this->checkUser = $this->SessionProcess();
        $this->rep = $this->model("HomeModel");
        if(!$this->checkUser)
        {
            echo '<script language="javascript">location.href="./../index.php";</script>';
        }
    }
    public function index()
    {
            $this->view("index",[
                "pages"=>"show"
        ]);
    }
    public function processDateReport()
    {
        if(isset($_POST['func'])&&$_POST['func']=='show')
        {
            if ($_POST['date']=='no') {
                $where = ' ';
            } else {
                $where = $this->rep->handle_date($_POST['date']);
            }
            $data = $this->rep->getReport($where);
            echo $data;
        }
    }
    public function searchDate()
    {
        
        if (isset($_POST['GamingDate'])) {
            $date = $_POST['GamingDate'];
            $this->view("index",[
                    "pages"=>"show",
                    "date" => $date,
                    "rep"=>$this->rep->getDate($date)
            ]);
        }
            
    }

    public function addNew()
    {
        
        $this->view("index",[
            "pages"=>"addNew",
            "issue"=>$this->rep->Add_Issue(),
            "status"=>$this->rep->Add_Status(),
            "level"=>$this->rep->Add_Level(),
            "type"=>$this->rep->Add_Type(),
            "shift"=>$this->rep->Add_Shift()]);
            
        }
        
        public function ajaxChooseType()
        {
            if(isset($_POST['id']))
            {
               $arrType =  $this->rep->selectType($_POST['id']);
               foreach($arrType as $val)
               {
                   
                   echo'
                        <option value="'.$val['Type'].'">'.$val['Type'].'</option>
                   ';
               }
            }
        }

        public function CalcuTime()
        {
            if (isset($_POST['time'])) {
                $s1 = explode(':', $_POST['timeS1']);
                $s2 = explode(':', $_POST['timeS2']);
                
                $total = ($s2[0]*60 + $s2[1] ) - ($s1[0]*60 + $s1[1] );
                $du = $total%60;
                $nguyen = ($total-$du)/60;
                $checkNguyen = true;
                $checkDu = true;
                if($nguyen < 10 && $nguyen >= 0)
                {
                    $nguyen = "0".$nguyen;
                    $checkNguyen = true;
                }
                elseif ($nguyen < 0)
                {
                    $checkNguyen = false;
                }
                if($du < 10 && $du >= 0)
                {
                    $du = "0".$du;
                    $checkDu = true;
                }
                elseif ($du < 0)
                {
                    $checkDu = false;
                }
                if($checkDu && $checkNguyen)
                {
                    echo $total_char = $nguyen.":".$du;

                }
                else {
                    echo "failed";
                }
            }
        }

        public function addNewReport()
        {
            if(isset($_POST['newReport']))
            {
                $data = array(
                            "issue"=> $_POST['issue'],
                            "level"=> $_POST['level'],
                            "type"=> $_POST['mc'],
                            "shift"=> $_POST['shift'],
                            "status"=> $_POST['status'],
                            "total"=> $_POST['total'],
                            "start"=> $_POST['start'],
                            "finish"=> $_POST['finish'],
                            "note"=> $_POST['note'],
                            "reason"=> $_POST['reason'],
                            "solution"=> $_POST['solution']
                            );
                
                if($this->rep->addNewReportModel($data)==true){
                    echo "success";
                }else{
                    echo "failed";
                }
                
            }
            else 
            {
                echo "failed";
            }
        }


        public function Edit($id)
        {
            $arr =json_decode($this->rep->checkEdit($id));
            
            if($arr[0]->id_user == $_SESSION['ID'])
            {
                $this->view("index",[
                    "pages"=>"edit",
                    "OldReport"=>$this->rep->checkEdit($id),
                    "issue"=>$this->rep->Add_Issue(),
                    "status"=>$this->rep->Add_Status(),
                    "level"=>$this->rep->Add_Level(),
                    "shift"=>$this->rep->Add_Shift(),
                    "type"=>$this->rep->Add_Type(),
                    "Sessionid_user" => $id
                ]);

            }
            else {
                $name = $this->rep->getName($arr[0]->id_user);
                echo "<script language='javascript'>alert('You can not edit report of ".$name[0]['DisplayName']." ');</script>";
                echo '<script language="javascript">location.href="../index";</script>';
            }
        }
        
        public function EditReport($id_user)
        {
            
            if(isset($_POST['editReport']))
            {
                
                $data = array(
                            "id_user"=> $idReport,
                            "issue"=> $_POST['issue'],
                            "level"=> $_POST['level'],
                            "mc"=> $_POST['mc'],
                            "shift"=> $_POST['shift'],
                            "status"=> $_POST['status'],
                            "total"=> $_POST['total'],
                            "start"=> $_POST['start'],
                            "finish"=> $_POST['finish'],
                            "note"=> $_POST['note'],
                            "reason"=> $_POST['reason'],
                            "solution"=> $_POST['solution']
                            );
                
                if($this->rep->EditReportModel($data)==true){
                    echo "success";
                }else{
                    echo "failed";
                }
                
            }
            else 
            {
                echo "failed";
            }
        }
}

?>