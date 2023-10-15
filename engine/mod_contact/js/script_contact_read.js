//<script type="text/javascript">
            $('.mail').click(function(event) {
               var mail = $(this).attr('data-mail');
               location.href = 'mailto:'+mail;
            });

            $(document).on('click','.del',function(event) {
                var data = $(this).attr('data-id');
                swal.fire({
                  title: 'ยืนยัน?',
                  text: "คุณยืนยันจะลบข้อความนี้หรือไม่?",
                  icon: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ยืนยัน',
				  cancelButtonText: 'ยกเลิก',
				  reverseButtons: true,	
                  showLoaderOnConfirm: true,
                  preConfirm: function () {
                        return new Promise(function (resolve) {
                        $.ajax({
                            type: "POST",
                            url: "functions.php",
                            data: {id:data,_method:'DELETE'},
                         })
                      // in case of successfully understood ajax response
                        .done(function (myAjaxJsonResponse) {
                            //console.log(myAjaxJsonResponse);
                            swal.fire('สำเร็จ','ลบสำเร็จ.','success');
                            location.href = 'front_manage.php';
                           })
                        .fail(function (erordata) {
                          //console.log(erordata);
                          swal.fire('ไม่สำเร็จ', 'เกิดปัญหากับระบบ', 'error');
                        })

                    })
                  },    
                })
            });
$(document).on('click', '.reply', function(event) {
                var email = $(this).attr('data-id');
                var message = $(this).attr('message');
                var subject = $(this).attr('subject');
                var name = $(this).attr('name');

//                console.log(email);
//                console.log(message);
//                console.log(subject);
//				  console.log(name);

                $("#email").html("E-mail : "+email);
                $("#name").html("ชื่อผู้ติดต่อ : "+name);
                $("#subject").html("เรื่องที่ติดต่อ : "+subject);

                $("#email_data").val(email); 
                $("#name_data").val(name); 
                $("#subject_data").val(subject); 
                $("#detail_data").val(message); 


                $('#modal_mail').modal('show');
            
                // location.href = 'mailto:'+email;
            });


var data = '';
$('#btnSendAdd').click(function (event) {


var formData = new FormData($('#send_mail_form')[0]);
if($("#sub_to_reply").val() == "" || $("#mass_to_reply").val() == "" ){
    swal.fire('คำเตือน!','กรุณากรอกข้อมูล','warning')
                    if($("#sub_to_reply").val() == ""){
                        $("#sub_to_reply").attr("style" , "border-color: red; border-width: 1px;");
                        setTimeout(function() {
                            $("#sub_to_reply").attr("style" , "");
                        }, 5000);
                    }
                    if($("#mass_to_reply").val() == ""){
                        $("#mass_to_reply").attr("style" , "border-color: red; border-width: 1px;");
                        setTimeout(function() {
                            $("#mass_to_reply").attr("style" , "");
                        }, 5000);
                    }
}else{
var formData = new FormData($('#send_mail_form')[0]);

        swal.fire({
            title: 'ยืนยัน?',
            text: "ยืนยันการส่ง E-mail",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน!',
			cancelButtonText: 'ยกเลิก',
			reverseButtons: true,
            showLoaderOnConfirm: true
        }).then((result) => {
           if (result.value) {
                //console.log(result.value);
                $.ajax({
                    type: "POST",
                    url: "mail_to.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                         //console.log(data.status);
                        //  if(data.status==1){
                        swal.fire('สำเร็จ',
                            'การส่ง E-mail สำเร็จ',
                            'success'
                        ).then((value) => {
                            // window.location = 'front-add.php?values=' + $('#sale_id').val();
                            window.location = '';
                        }); 
                  //  }                         
                    },
                });
            }
        })
     }
});

   // </script>