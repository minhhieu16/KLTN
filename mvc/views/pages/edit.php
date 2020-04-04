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
        <form class="was-validated" method="post" id="formEdit" action="DailyReport/EditReport/<?php echo $data["SessionIdReport"]; ?>">
    <div class="form-group">
        <div class="row">
            
            <div class="col-lg-4">
                <label for="issue">List of Issue:</label>
                <select class="form-control" id="issue" name="issue">
                    <?php
                        $issue = json_decode($data["issue"]);
                        foreach ($issue as $val) {
                            if($val->ID_Issue == $value->ID_Issue)
                                echo "<option value='".$val->ID_Issue."' selected>".$val->IssueName."</option>";
                            else
                                echo "<option value='".$val->ID_Issue."'>".$val->IssueName."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="type">Type:</label>
                <select class="form-control" id="Type" name="Type">
                        <?php
                        $type = json_decode($data["type"]);
                        
                        foreach ($type as $val) {
                            if(count($arrType)>1)
                            {
                                $stringType = "";
                                foreach($arrType as $typeArrElement)
                                {
                                    if(is_numeric($typeArrElement))
                                    {
                                        settype($typeArrElement, "integer");
                                    }
                                    if(is_string($typeArrElement))
                                    {
                                        $stringType .=  $typeArrElement . " ";
                                    }
                                    
                                }
                                $stringType = rtrim($stringType, " ");
                                if($val->name_type == $stringType)
                                    
                                    echo "<option value='".$val->name_type."' selected>".$val->name_type."</option>";
                                else
                                    echo "<option value='".$val->name_type."'>".$val->name_type."</option>";
                                
                            }
                            else {
                                if($val->name_type == $arrType[0])
                                    echo "<option value='".$arrType[0]."' selected>".$arrType[0]."</option>";
                                else
                                    echo "<option value='".$val->name_type."'>".$val->name_type."</option>";
                            }
                                
                            
                            #-----------------------------#
                            // if (!is_numeric($value->Type)) {
                            //     # char
                            //     if($val->name_type == $value->Type)
                            //     echo "<option value='".$val->name_type."' selected>".$val->name_type."</option>";
                            //     else
                            //     echo "<option value='".$val->name_type."'>".$val->name_type."</option>";
                            // } else {
                            //     // number
                            //     if($val->name_type == 'MC' || $val->name_type == 'Slot' || $val->name_type == 'Roulette')
                            //     echo "<option value='".$val->name_type."' selected>".$val->name_type."</option>";
                            //     else
                            //     echo "<option value='".$val->name_type."'>".$val->name_type."</option>";
                            // }
                            

                            
                        }
                        ?>
                    
                </select>
            </div>
            <div class="col-lg-4">
                <label for="type">MC:</label>
                <input type="text" value="<?php  
                // if(count($arrType) > 1) 
                //     echo end($arrType);
                foreach($arrType as $typeArrElement)
                    {
                        if(is_numeric($typeArrElement))
                        {
                            echo $typeArrElement . " ";
                        }
                    }
                
                ?>" class="form-control" id="valMC" name="valMC" placeholder="MC">
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
                            if($val->ID_Level == $value->ID_Level)
                            echo "<option value='".$val->ID_Level."' selected>".$val->Level."</option>";
                            else
                            echo "<option value='".$val->ID_Level."'>".$val->Level."</option>";
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
                            if($val->ID_Status == $value->ID_Status)
                            echo "<option value='".$val->ID_Status."' selected>".$val->Status."</option>";
                            else
                            echo "<option value='".$val->ID_Status."'>".$val->Status."</option>";
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
                            if($val->ShiftID == $value->ShiftID)
                            echo "<option value='".$val->ShiftID."' selected>".$val->ShiftName."</option>";
                            else
                            echo "<option value='".$val->ShiftID."'>".$val->ShiftName."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Start:</label>
                <input type="time" value="<?php echo $value->Start; ?>" class="form-control" id="startID" name="startID" >
            </div>
            <div class="col-lg-4">
                <label for="uname">Finish:</label>
                <input type="time" value="<?php echo $value->Finished; ?>" class="form-control" id="finishID" name="finishID" >
            </div>
            <div class="col-lg-4">
                <label for="uname">Total:</label>
                <div id="total12">
                <input type="text" value="<?php echo $value->Total; ?>" class="form-control" id="total" name="total" value="" disabled=""></div>
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
               <textarea class="form-control" id="note" name="note" rows="5" placeholder="Note"><?php echo $value->Note; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Reason:</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" name="reason" id="reason" rows="5" placeholder="Reason"><?php echo $value->Reason; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Solution:</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" name="solution" id="solution" rows="5" placeholder="Solution"><?php echo $value->Solution; ?></textarea>
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