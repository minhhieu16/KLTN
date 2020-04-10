<div class="row show">
    <div class="col-lg-8">

        <a href="DailyReport/addNew"><button type="button"  class="btn btn-primary">Add New</button></a>
            Time Sheet
            
            
    </div>
    <div class="col-lg-3">
      <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; 
      border: 1px solid #ccc; width: 100%; font-size: 15px; margin: 5px;">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
      </div>
      
    </div>
    <div class="col-lg-1"> 
      <button type="button"  class="btn btn-primary" onclick="searchDateTest();">GO!</button>

    </div>

    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row reportrange">
    <div  class="col-lg-12 table-responsive" id="rptContent" >
        <table id="order_data" class="table table-bordered table-striped display" cellpadding="0" width="100%">
            <thead>
                <tr style="font-weight: bold;">
                   <td>No</td>
                   <td>User</td>
                   <td>Start Date</td>
                   <td>End Date</td>
                   <td>Approved by</td>
                   <td>Approved/rejected</td>
                   <td>Rejected by</td>
                   <td>Total Time</td>
                   <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                
                
                
            </tbody>
        </table>
    </div>
    
</div>
