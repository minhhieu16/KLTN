$(document).ready(function() {

    $("#finishID").change(function () {
        var start= $("#startID").val();
        var finish = $("#finishID").val();
        $.post("DailyReport/CalcuTime",{time: "CalTotal", timeS1: start, timeS2: finish},function (data) {

            if(data=="failed")
            {   
                $("#noticeTotal").html("<p style='color: red;'>TotalTime can not be nagative number!</p>");
                $("#button-submit").html('<button type="submit" id="" class="btn btn-primary" disabled="">Add</button>');
                $("#button-submit-edit").html('<button type="submit" id="" class="btn btn-primary" disabled="">Edit</button>');
            }
            else
            {   
                $("#noticeTotal").html("");
                $("#total12").html('<input type="text" class="form-control" id="total" name="total" value="'+data+'" disabled="">');
                $("#button-submit").html('<button type="submit" id="" class="btn btn-primary">Add</button>');
                $("#button-submit-edit").html('<button type="submit" id="" class="btn btn-primary">Edit</button>');
            }
        })
    })
    $("#startID").change(function () {
        var start= $("#startID").val();
        var finish = $("#finishID").val();
        $.post("DailyReport/CalcuTime",{time: "CalTotal", timeS1: start, timeS2: finish},function (data) {

            if(data=="failed")
            {   
                $("#noticeTotal").html("<p style='color: red;'>TotalTime can not be nagative number!</p>");
                $("#button-submit").html('<button type="submit" id="" class="btn btn-primary" disabled="">Add</button>');
                $("#button-submit-edit").html('<button type="submit" id="" class="btn btn-primary" disabled="">Edit</button>');
            }
            else
            {   
                $("#noticeTotal").html("");
                $("#total12").html('<input type="text" class="form-control" id="total" name="total" value="'+data+'" disabled="">');
                $("#button-submit").html('<button type="submit" id="" class="btn btn-primary">Add</button>');
                $("#button-submit-edit").html('<button type="submit" id="" class="btn btn-primary">Edit</button>');
            }
        })
    })

    $("#formAdd").on('submit',function(e) {
        
        e.preventDefault();
 
        $form = $(this);
        submitAddReport($form);
    });
    function submitAddReport($form) {
        var type = $("#type").val();
        var issue = $("#issue").val();
        var level = $("#level").val();
        var status = $("#status").val();
        var shift = $("#shift").val();
        var startID = $("#startID").val();
        var finishID = $("#finishID").val();
        var total = $("#total").val();
        var note = $("#note").val();
        var reason = $("#reason").val();
        var solution = $("#solution").val();
        
        
        $.ajax({
            url: $form.attr('action'),
            method: $form.attr('method'),
            data:{
                newReport: "addReport",
                issue: issue,
                level: level,
                status: status,
                shift: shift,
                type: type,
                total: total,
                start: startID,
                finish: finishID,
                note: note,
                reason: reason,
                solution: solution, 
            },
            success: function (response) {
                
                if(response=="success")
                {
                    // $('#notice').html('<p style="color: green; text-align:center;font-weight: bold;font-size: 20px;">Add successed!</p>');
                    alert('Add Success');
                    window.location="index.php";
                }
                else if(response=="failed")
                {
                    $('#notice').html('<p style="color: red; text-align:center;font-weight: bold;font-size: 20px;">Add failed!</p>');                }
            },
            error: function (req) {
                alert('error');
            }
        })
   }

//    form edit
   $("#formEdit").on('submit',function(e) {
    e.preventDefault();

    $form = $(this);
    
    submitEditReport($form);
});
function submitEditReport($form) {
    var type = $("#type").val();
    var issue = $("#issue").val();
    var level = $("#level").val();
    var status = $("#status").val();
    var shift = $("#shift").val();
    var startID = $("#startID").val();
    var finishID = $("#finishID").val();
    var total = $("#total").val();
    var note = $("#note").val();
    var reason = $("#reason").val();
    var solution = $("#solution").val();
    

    $.ajax({
        url: $form.attr('action'),
        method: $form.attr('method'),
        data:{
            editReport: "editReport",
            issue: issue,
            level: level,
            status: status,
            shift: shift,
            type: type,
            total: total,
            start: startID,
            finish: finishID,
            note: note,
            reason: reason,
            solution: solution, 
        },
        success: function (response) {
            
            if(response=="success")
            {
                //$('#notice').html('<p style="color: green; text-align:center; font-weight: bold;font-size: 20px;">Edit successed!</p>');
                alert('Edit Success');
                window.location="index.php";
            }
            else if(response=="failed")
            {
                $('#notice').html('<p style="color: red; text-align:center;font-weight: bold;font-size: 20px;">Edit failed!</p>');
            }
        },
        error: function (req) {
            alert('error')
        }
    })
}

})