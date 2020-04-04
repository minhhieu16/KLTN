

$(document).ready(function() {
   $("#formChange").on('submit',function(e) {
       e.preventDefault();

       $form = $(this);

       submitForm($form);
   });

   function submitForm($form) {
        $footer = $form.parent('.modal-body').next('.modal-footer');
        $footer.html('<img src="../public/images/ajax-loader.gif">');
        var npass = $("#npassword");
        var cpass = $("#cpassword");
        if(npass.val() === cpass.val())
        {
            $.ajax({
                url: $form.attr('action'),
                method: $form.attr('method'),
                data: {
                    key: "ChangePass",
                    opassword: $("#opassword").val(),
                    npassword: $("#npassword").val(),
                    cpassword: $("#cpassword").val()
                },
                success: function (response) {
                    if(response=="success")
                    {
                        $footer.html('<p style="color: green; text-align:center">Change successed!</p>');

                    }
                    else if(response=="failed")
                    {
                        $footer.html('<p style="color: red; text-align:center">Change failed!</p>');
                    }
                },
                error: function (req) {
                    alert('error')
                }
            })
        }
        else
        {
            $footer.html('<p style="color: red; text-align:center">New password and confirm password must macth!</p>');
        }
        // $.ajax({
        //     url: $form.attr('action'),
        //     method: $form.attr('method'), 
        //     data: {
        //         key: ChangePass,
        //         opassword: $("#opassword").val(),
        //         npassword: $("#npassword").val(),
        //         cpassword: $("#cpassword").val(),
        //     },
        //     success: function (res) {
        //         alert('success')
        //     },
        //     error: function(er) {
        //         alert('error')
        //     }
        // });
   }

   function isNotEmpty(caller) {
       if(caller.val()==''){
           caller.css('border','1px solid red');
           return false;
       }
       else
       {
           caller.css('border', '');
       }
       return true;
   }
})