<?php

$a = json_decode($data["OldReport"]);
foreach ($a as $value) {
    #split array type
    $arrType = explode(" ", filter_var(trim($value->Type, " ")));
    ?>
    <div class="container">
        <h2 align="left" style="color: blue">EDIT REPORT</h2>
<div class="row">
    
    <div class="col-sm-8 add">
        <form class="was-validated" method="post" id="formEdit" action="DailyReport/EditReport">
    <div class="form-group">
        <div class="row">
            
            <div class="col-lg-4">
            <input type="hidden" id="id_report" name="id_report" value="<?php echo $data["SessionIdReport"]; ?>">
                <label for="issue">List of Issue:</label>
                <select class="form-control" id="issue" name="issue">
                    <?php
                        $issue = json_decode($data["issue"]);
                        foreach ($issue as $val) {
                            if($val->id_issue == $value->id_issue)
                                echo "<option value='".$val->id_issue."' selected>".$val->name_issue."</option>";
                            else
                                echo "<option value='".$val->id_issue."'>".$val->name_issue."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type">
                <?php
                        $type = json_decode($data["type"]);
                        foreach ($type as $val) {
                            if($val->id_type == $value->id_type)
                                echo "<option value='".$val->id_type."' selected>".$val->name_type."</option>";
                            else
                                echo "<option value='".$val->id_type."'>".$val->name_type."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            


        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Level:</label>
                <select class="form-control" id="level" name="level">
                    <?php
                        $level = json_decode($data["level"]);
                        foreach ($level as $val) {
                            if($val->id_level == $value->id_level)
                            echo "<option value='".$val->id_level."' selected>".$val->name_level."</option>";
                            else
                            echo "<option value='".$val->id_level."'>".$val->name_level."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="uname">Status:</label>
                <select class="form-control" id="status" name="status">
                    <?php
                        $status = json_decode($data["status"]);
                        foreach ($status as $val) {
                            if($val->id_status == $value->id_status)
                            echo "<option value='".$val->id_status."' selected>".$val->name_status."</option>";
                            else
                            echo "<option value='".$val->id_status."'>".$val->name_status."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="shift">Shift:</label>
                <select class="form-control" id="shift" name="shift">
                    <?php
                        
                        $shift = json_decode($data["shift"]);
                        foreach ($shift as $val) {
                            if($val->id_shift == $value->id_shift)
                            echo "<option value='".$val->id_shift."' selected>".$val->name_shift."</option>";
                            else
                            echo "<option value='".$val->id_shift."'>".$val->name_shift."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="Start">Start:</label>
                <input type="time" value="<?php echo $value->start; ?>" class="form-control" id="startID" name="startID" >
            </div>
            <div class="col-lg-4">
                <label for="Finish">Finish:</label>
                <input type="time" value="<?php echo $value->finish; ?>" class="form-control" id="finishID" name="finishID" >
            </div>
            <div class="col-lg-4">
                <label for="Total">Total:</label>
                <div id="total12">
                <input type="text" value="<?php echo $value->total; ?>" class="form-control" id="total" name="total" disabled=""></div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12" id="noticeTotal">
            
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Note:</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" id="note" name="note" rows="5" placeholder="Note"><?php echo $value->note; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Reason:</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" name="reason" id="reason" rows="5" placeholder="Reason"><?php echo $value->reason; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Solution:</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" name="solution" id="solution" rows="5" placeholder="Solution"><?php echo $value->solution; ?></textarea>
            </div>
        </div>
    </div>
  

    <div class="row">
        <div class="col-lg-1" id="button-submit-edit">
            <button type="submit" id="" class="btn btn-primary" >Edit</button>
        </div>
        <div class="col-lg-1">
            <a href="DailyReport/index" class="btn btn-danger" id="back">Back</a>
        </div>
    </div>

  <div  style="text-align: center;" id="notice"></div>
</form>
    </div>
</div>
<?php
}
?>
</div>