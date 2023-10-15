
fetch_data_table()
function fetch_data_table() {
          var button_update = $('#per_button_edit').val();
          var button_delete = $('#per_button_del').val();
          var button_create = $('#per_button_open').val();
          var button_view   = $('#per_input_read').val();
        $.ajax({
            url: "select_data.php",
            method: "POST",
            data: {
                form: "select_table_front_manage",button_update:button_update,button_delete:button_delete,button_create:button_create,button_view:button_view
            },
            success: function(data) {
                $('#div_table_list').html(data);
                $('#table_front_manage').DataTable({
                	scrollY: true,
                	scrollCollapse: true,
                	scrollX: true,
                	 "order": [[ 1, 'asc' ]]
										,
            language: {
                sEmptyTable: "ไม่มีข้อมูลในตาราง",
				sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
				sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
				sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
				sInfoPostFix: "",
				sInfoThousands: ",",
				sLengthMenu: "แสดง _MENU_ แถว",
				sLoadingRecords: "กำลังโหลดข้อมูล...",
				sProcessing: "กำลังดำเนินการ...",
				sSearch: "ค้นหา: ",
				sZeroRecords: "ไม่พบข้อมูล",
				oPaginate: {
				sFirst: "หน้าแรก",
				sPrevious: "ก่อนหน้า",
				sNext: "ถัดไป",
				sLast: "หน้าสุดท้าย",	
				},
				oAria: {
				sSortAscending: ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
				sSortDescending: ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย",
				},
            }
				});
            }
			
        });
    }

 $(document).on('click', '.edit_btn', function(){ 
 	form = "select_div_edit_front_manage";
 	id = $(this).attr('data-id');
        $.ajax({
            url: "select_data.php",
            method: "POST",
            data: {
                form : form,id : id
            },
            success: function(data) {
                $('#div_edit').html(data);
                
            }
        });
 });

 $(document).on('click', '.delete_btn', function(){
       id = $(this).attr('data-id');
       form = "del_one";
         swal.fire({
        title: "ยืนยัน?",
        text: "ยืนยันการลบหรือไม่?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน',
		reverseButtons: true,
        showLoaderOnConfirm: true	 
        
    }).then((result) => {
        if (result.value){
        
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                form : form,id : id
            },
            success: function(data) {
                if (data.status=='0') {
            		swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
            		fetch_data_table()
                $('.num_').html('');
                $('#MultiDelete').prop('disabled',true);
            
        		}else{
        			swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
        		}
                
            }
        });
      }
      });
    });




  $(document).on('click', '.checkbox_remove', function(){
    var i =0; 
    if($(this).is(":checked")) {
      $(this).parents('.show-tr').addClass("remove-item");
      $('#MultiDelete').prop('disabled',false);
      $('.remove-item').each(function() {
        i++;       
      });
      $('.num_').html('[ '+i+' ]');
    }else{
      $(this).parents('.show-tr').removeClass("remove-item");
      $('.remove-item').each(function() {
        i++;       
      });
      $('.num_').html('[ '+i+' ]');
      if($('input.checkbox_remove').is(':checked')){
      }else{
        $('#MultiDelete').prop('disabled',true);
      }
    }
  });

function ClickCheckAll(vol){
    var i=1;
    for(i=1;i<=document.frmMain.hdnCount.value;i++){
      id_Chk = document.getElementById("Chk"+i);
      if (id_Chk) {
      $('.num_').html('[ '+i+' ]');
      if(vol.checked == true){
        eval("document.frmMain.Chk"+i+".checked=true");
        $(".show-tr").addClass("remove-item"); 
        $('#MultiDelete').prop('disabled',false);
        
      }else{
        $('.num_').html('');
        eval("document.frmMain.Chk"+i+".checked=false");
        $('#MultiDelete').prop('disabled',true);
        $(".show-tr").removeClass("remove-item");
      }
    }
    }
  }



$(document).on('click', '#btnSendAdd', function(){
       var formData = new FormData($('#form_add')[0]);
        swal.fire({
        title: "ยืนยัน?",
        text: "ยืนยันการบันทึกหรือไม่?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน',
		reverseButtons: true,
        showLoaderOnConfirm: true
        
    }).then((result) => {
        if (result.value){
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
          	if (data.status=='0') {
            swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
            fetch_data_table()
            document.getElementById("form_add").reset(); 
            disabled_btn_add();
        }else{
        	swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
        }
          },
        });
      }
      });
    });

$(document).on('click', '#btnSendEdit', function(){
       var formData = new FormData($('#form_edit')[0]);
         swal.fire({
        title: "ยืนยัน?",
        text: "ยืนยันการแก้ไขหรือไม่?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน',
		reverseButtons: true,
        showLoaderOnConfirm: true	 
        
    }).then((result) => {
        if (result.value){
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
          	if (data.status=='0') {
            swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
            fetch_data_table()
            $('#modal_edit').modal('toggle');
        }else{
        	swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
        }
          },
        });
      }
      });
    });

function disabled_btn_add(){
	var name_th = $('#name_th').val();
	if (name_th == '') {
		document.getElementById('btnSendAdd').disabled = true;
	}else{
		document.getElementById('btnSendAdd').disabled = false;
	}
}

function disabled_btn_edit(){
	var name_th = $('#name_th_edit').val();
	if (name_th == '') {
		document.getElementById('btnSendEdit').disabled = true;
	}else{
		document.getElementById('btnSendEdit').disabled = false;
	}
}


function order_chanhe(num){
        var order = $('#order'+num).val();
        var id = $('#id'+num).val();
        var form = "order_chanhe";
        swal.fire({
        title: "ยืนยัน?",
        text: "ยืนยันการเปลี่ยนลำดับหรือไม่?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน',
		reverseButtons: true,
        showLoaderOnConfirm: true	
        
    }).then((result) => {
        if (result.value){
        	

        $.ajax({
          type: "POST",
          url: "functions.php?order="+order+"&&id="+id+"&&form="+form,
          data: {},
          contentType: false,
          processData: false,
          success: function(data) {
          	if (data.status=='0') {
            swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
            fetch_data_table()
            
        }else{
        	swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
        }
          },
        });
      }
      });
    }

    $(document).on('click', '#MultiDelete', function(){
       var formData = new FormData($('#frmMain')[0]);
         swal.fire({
        title: "ยืนยัน?",
        text: "ยืนยันการลบหรือไม่?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน',
		reverseButtons: true,
        showLoaderOnConfirm: true	 
        
    }).then((result) => {
        if (result.value){
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
          	if (data.status=='0') {
            swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
            fetch_data_table()
            document.getElementById("form_add").reset(); 
            $('.num_').html('');
            $('#MultiDelete').prop('disabled',true);
        }else{
        	swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
        }
          },
        });
      }
      });
    });