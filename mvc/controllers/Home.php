<?php
class Home extends Controller
{
    public $re;
    public function __construct()
    {
        $this->re = $this->model("HomeModel");
    }

    public function index()
    {
        $this->view("index",
                    ["page"=>"report",
                     "rep"=>$this->re->Test()
        ]);

    }
}

?>