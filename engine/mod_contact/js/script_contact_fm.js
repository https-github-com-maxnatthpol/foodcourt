
var data = '';
$('#btnSendAdd').click(function (event) {

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

})
    //</script>