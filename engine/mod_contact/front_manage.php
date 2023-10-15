<?php include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php require_once('../template/menu.php');?>
        <!-- ============================================================== -->
<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
?>
	<!--Css table -->
  	<link rel="stylesheet" href="css/table-contact.css">

<style>
	.oncard-header{
	border-top: solid #ffb22b ;
	}
	.card-body-img{
		border-top: solid #00c0ef;
	}
	.card-body-data{
		border-top: solid #00c0ef;
	}
	.card-card-center{
    max-width: 400px;
    margin-top: 15px;
  	}
  	.card-card-center>.card-detail-em>p{
    font-weight: bold;
    margin-bottom: 3px;
    text-align: left;
  	}
  	.card-card-center>.card-detail-em>label{
    margin-bottom: 0;
  	}
  .warning-text-check{
    color: orange;
  }
  .warning-text-check-b2{
    color: orange;
  }
    .authen_acitve-block{
    background-color: #00a65a;
    border-color: #008d4c;
    color: white;
  }	
</style>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">รายการติดต่อ</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">รายการติดต่อ</li>
                        </ol>
                    </div>
                    
                </div>
							<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
				

				
				<!--  ============================================================= -->
				
                <!-- ============================================================== -->
                <!-- Row -->
         		<div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body card-body-data">
                                <div class="box box-primary callout-primary-box">
									 <h4 class="card-title">รายการติดต่อ</h4><hr>
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>
                                            ลำดับวันที่ส่ง
                                        </th>
                                        <th>
                                            ชื่อผู้ติดต่อ
                                        </th>
                                        <th>
                                            อีเมล
                                        </th>
                                        <th>
                                            เรื่องที่ติดต่อ
                                        </th>
                                        <th>
                                            สถานะ
                                        </th>
										<th>
                                            การจัดการ
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>					
								
                        </div>
                    </div>
                </div>	
				</div>	
                <!-- Row -->
				<form id="frmDel">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="id" id="id">
        		</form>
                <!-- ============================================================== -->
	    
      <!-- /.box -->
      <!-- /.form send to DB-->
      
        <!-- /.modal -->
		<!-- mail Modal -->
<div class="modal fade" id="modal_mail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<div class="row">
				<div class="col-12">	
                <h3 class="modal-title">ตอบกลับการติดต่อ <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></h3>
                <hr>
				</div>
				<div class="col-12"><label><div id="name"></div></label><br></div>	
                <div class="col-12"><label><div id="email"></div></label><br></div>
                <div class="col-12"><label><div id="subject"></div></label><br></div>   
            </div>
			</div>	
            <div class="modal-body">
      
<form action="" method="post" id="send_mail_form">

<input type="hidden" name="email_data" id="email_data">
<input type="hidden" name="name_data" id="name_data">
<input type="hidden" name="subject_data" id="subject_data">
<input type="hidden" name="detail_data" id="detail_data">

<div class="form-group">
  <label for="">จาก : </label>
  <input type="text" name="name_to_reply" id="name_to_reply"  value="<?php echo from_e_mail ?>" readonly class="form-control" placeholder="" aria-describedby="helpId">
</div>
<div class="form-group">
  <label for="">E-mail : </label>
  <input type="text" name="email_to_reply" id="email_to_reply" value="<?php echo e_mail ?>" readonly class="form-control" placeholder="" aria-describedby="helpId">
</div>
<div class="form-group">
  <label for="">หัวข้อ : </label>
  <input type="text" name="sub_to_reply" id="sub_to_reply" class="form-control" placeholder="" aria-describedby="helpId"  required>
</div>
<div class="form-group">
  <label for="">ข้อความ : </label>
  <textarea name="mass_to_reply" cols="30" rows="5" class="form-control" wrap="virtual" id="mass_to_reply"  required></textarea>
</div>


</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" id="btnSendAdd">ส่งข้อความ...</button>
            </div>
        </div>
    </div>
</div>		
		
		<!-- /.modal -->

</div>
               <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->		
		
<?php include('../template/footer.php');?>
			
	<script type="text/javascript">
        $(document).ready(function(){
            
            var table = $('#table').DataTable( {
                "ajax": 'select-contact.php',
                "iDisplayLength" : 10,
                "columns": [
                    { "data": "send_datetime" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "subject" },
                    { "data": function (data, type, dataToSet) {
                        if(data.status == 0){
                            return "<small class='label' style='font-size:12px; background-color: orange;'><?//=lang('ยังไม่ได้อ่าน','Have not read')?>ยังไม่ได้อ่าน</small>";
                        }else{
                            return "<small class='label' style='font-size:12px; background-color: green;'><?//=lang('อ่านแล้ว','Read')?>อ่านแล้ว</small>";
                        }
                    } },
                    { "data": function (data, type, dataToSet) {
 						return "" +
                        "<div class='btn-group'>" +
                        "<button class='btn btn-success btn-sm read' style='<?=$button_view;?>' data-id='"+data.id_mail+"'><i class='fa fa-eye'></i></button>" +
                        "<button class='btn btn-primary btn-sm reply' style='<?=$button_create;?>' data-id='"+data.email+"' message='"+data.message+"' subject='"+data.subject+"' name='"+data.name+"'  data-toggle='tooltip' data-container='body' data-original-title='Reply'><i class='fa fa-reply'></i></button>" +
                        "<button class='btn btn-danger btn-sm del' style='<?=$button_delete;?>' ><i class='fa fa-trash'></i></button>" +
                        "</div>"
                    } }
                ],
				
				"order": [[ 0, 'DESC' ]],
				
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
            $(document).on('click', '.reply', function(event) {
                //var email = $(this).attr('data-id');
                var email = $(this).attr('data-id');
                var message = $(this).attr('message');
                var subject = $(this).attr('subject');
                var name = $(this).attr('name');

                //console.log(email);
                //console.log(detail);
                //console.log(subject);

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
        
            $(document).on('click', '.read', function(event) {
                var id = $(this).attr('data-id');
                location.href = 'read.php?id='+id;
            });
            $(document).on('click','.del',function(event) {
                var data = table.row( $(this).parents('tr') ).data();
                $('#id').val(data.id_mail);
                swal.fire({
                  title: 'ยืนยัน ?',
                  text: "คุณยืนยันจะลบข้อความนี้หรือไม่ ?",
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
                            data: $('#frmDel').serialize(),
                         })
                      // in case of successfully understood ajax response
                        .done(function (myAjaxJsonResponse) {
                            //console.log(myAjaxJsonResponse);
                            swal.fire('สำเร็จ','ลบสำเร็จ','success')
                            table.ajax.reload();  
                           })
                        .fail(function (erordata) {
                          //console.log(erordata);
                          swal.fire('ไม่สำเร็จ', 'เกิดปัญหากับระบบ', 'error');
                        })

                    })
                  },    
                })
            });
        });	
		
		
	<?php
		if($button_view != ''){
			$btn_view = explode(":", $button_view);
			$btn_view_show = $btn_view[0].$btn_view[1];
	?>
		var btn_view = 'displaynone'
		var btn_view_show = '<?php echo $btn_view_show; ?>'
		if(btn_view == btn_view_show ){

							swal.fire({
							title: 'คุณไม่มีสิทธิเข้าใช้งาน หน้านี้',
							icon: 'warning',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							allowEscapeKey : false,
							allowOutsideClick: false,
							confirmButtonText: 'ตกลง',
							onClose: () => {
									   window.location.href = "../";
								 }
						  })
	}
	<?php } ?>
		
		</script>
			
	<script src="js/script_contact_fm.js"></script>	
	