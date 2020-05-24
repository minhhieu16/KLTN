<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daily Report - Vegas</title>
    <base href="https://shielded-wildwood-41045.herokuapp.com/">
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="public/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="public/vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="public/vendor/datatables/css/buttons.dataTables.min.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- <a href="DailyReport/index" class="nav navbar-left">
                <img src="public/images/logo.png" width="250px" height="80px">
            </a> -->
            <div class="navbar-header" style="padding-top: 10px;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-left">
                <!-- <li class="">    
                    <a href="DailyReport/index">
                        <img src="public/images/logo.png" width="120px" height="50px">
                    </a>
                </li> -->
                <li>
                    <a href="">Home</a>
                </li>
                
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span style="color: red"><?php echo $_SESSION['user']; ?></span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="#" data-toggle="modal" data-target="#changePassword"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="User/Logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>


                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                
            </ul>
            
            
            
        </nav>
        <div class="content">
            <nav aria-label="breadcrumb">
            </nav>
            <?php
                include 'pages/'.$data["pages"].'.php'; 
                
            ?>
        </div>
        
        <div class="col-lg-12 bg-basic footer">
        <p align="center" style="margin-top: 20px;">© 2019 KGIM</p>
    </div>
        <!-- /#page-wrapper -->

    </div>


    <!-- /#wrapper -->
    <?php
        include 'pages/model.php';
    ?>
    <!-- jQuery -->
    <script src="public/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="public/vendor/raphael/raphael.min.js"></script>
    <script src="public/vendor/morrisjs/morris.min.js"></script>
    <script src="public/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/dist/js/sb-admin-2.js"></script>
    <script src="public/dist/js/ChangePass.js"></script>
    <script src="public/dist/js/addNew.js"></script>
    <script src="public/dist/js/editReport.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="public/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="public/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="public/vendor/datatables/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="public/vendor/datatables/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="public/vendor/datatables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="public/vendor/datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="public/vendor/datatables/js/date-uk.js"></script> 
    <script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();
        
        function cb(start, end) {
            $('#reportrange span').html(start.format('D/MM/YYYY') + ' - ' + end.format('D/MM/YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });
    
    function searchDateTest(){
        var GamingDate = $('#reportrange span').html();
        fetch_data(GamingDate);
    }
    fetch_data('no');
    function fetch_data(GamingDate)
    {
        var dataTable = $('#order_data').DataTable({
        dom: 'Bfrtip',
        //aaSorting: [[1, "asc"]],
        columnDefs: [
        {
            type: 'date-uk', targets: 1
        },
        {
            targets: [0,1,2,3,4,5,6,7,8,9,10],
            className: 'dt-center' 
        },
        {   width: '5px', targets: [0,6,7,8,9] },
        {   width: '200px', targets: 2 }, // cột list
        {   width: '200px', targets: 11 },
        {   width: '200px', targets: 12 },
        {   width: '200px', targets: 13 },
        
        ],
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ],
           "ajax" : {
            url:"DailyReport/processDateReport",
            type:"POST",
            data:{
              func: 'show',
              date: GamingDate
            }
           },
            paging: false,
            searching: true,
            ordering: true,
            deferRender: true,
            scrollCollapse: true,
            scroller: true,
            destroy: true,

      });
    }
</script>
</body>

</html>
