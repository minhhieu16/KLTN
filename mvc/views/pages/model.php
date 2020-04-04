
<!-- change password report -->
<div class="modal" id="changePassword">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">CHANGE PASSWORD</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form id="formChange" action="User/ChangePass" method="post" class="was-validated">
                
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="curPass">Current Password:</label>
                            <input type="password" class="form-control" id="opassword" name="opassword" placeholder="Current Password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="newPass">New Password:</label>
                            <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="confPass">Confirm Password:</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="notice">
                </div>
                
              
              
              <button type="submit" class="btn btn-primary" id="btnChangePass" name="btnChangePass">Change</button>
            </form>
            
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          
        </div>
        
      </div>
    </div>
</div>