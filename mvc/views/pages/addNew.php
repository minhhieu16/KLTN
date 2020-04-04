<div class="container style-add">

<h2 align="left" style="color: blue">ADD NEW DAILY REPORT</h2>

<div class="row">
    
    <div class="col-sm-8 add">
        <form class="was-validated" method="post" id="formAdd" action="DailyReport/addNewReport">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="issue">List of Issue:</label>
                <select class="form-control" id="issue" name="issue">
                    <!-- /<option>Choose Issue</option> -->
                    <?php
                        // Others nằm cuối danh sách
                        $issue = json_decode($data["issue"]);
                        foreach ($issue as $val) {
                            if ($val->IssueName != 'Others') {
                                echo "<option value='".$val->ID_Issue."'>".$val->IssueName."</option>";
                            }
                        }
                        foreach ($issue as $val) {
                            if ($val->IssueName == 'Others') {
                                echo "<option value='".$val->ID_Issue."'>".$val->IssueName."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="type">Type:</label>
                <select class="form-control" id="Type" name="Type" required>
                    <?php
                        $type = json_decode($data["type"]);
                        foreach ($type as $val) {
                            echo "<option value='".$val->name_type."'>".$val->name_type."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="type">MC:</label>
                <input type="text" class="form-control" id="valMC" name="valMC" placeholder="MC">
            </div>
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
                <input type="time" class="form-control" id="startID" name="startID" required>
            </div>
            <div class="col-lg-4">
                <label for="uname">Finish:</label>
                <input type="time" class="form-control" id="finishID" name="finishID" required>
            </div>
            <div class="col-lg-4">
                <label for="uname">Total: </label>
                <div id="total12">
                    <input type="text" class="form-control" id="total" name="total" disabled="">
                </div>
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
               <textarea class="form-control" id="note" name="note" rows="5" placeholder="Note"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Reason:</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" name="reason" rows="5" id="reason" placeholder="Reason"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <label for="uname">Solution:</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" name="solution" rows="5" id="solution" placeholder="Solution"></textarea>
            </div>
        </div>
    </div>
  
  <div class="row">
    <div class="col-lg-1" id="button-submit">
        <button type="submit" id="" class="btn btn-primary" disabled="">Add</button>
    </div>
    <div class="col-lg-1">
        <a href="DailyReport/index" class="btn btn-danger" id="back">Back</a>
    </div>
  </div>
  
  
  <div  style="text-align: center;" id="notice"></div>
  
</form>
    </div>
</div>
    
</div>