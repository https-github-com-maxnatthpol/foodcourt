<?php include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php require_once('../template/menu.php');?>
        <!-- ============================================================== -->
<?php require_once '../lib/permission.php'; ?>
<?php
require_once '../lib/connect.php';
$db = new DB ();
if(!isset($_GET['id'])){
  header('Location:front_manage.php');
}

$sql = "UPDATE mod_contact SET status = '1' WHERE id_mail = '".$_GET['id']."'";
$query = $db->Query($sql);

$sql = "SELECT `id_mail`, `name`, `email`, `subject`, `message`, `send_datetime`, `status` FROM mod_contact WHERE id_mail = '".$_GET['id']."'";
$query = $db->Query($sql);
$result = mysqli_fetch_array($query);
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
	.button_coler_read
	{
	background-color: white; -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.1);
    border-radius: 4px;
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
                        <h3 class="text-themecolor m-b-0 m-t-0">รายละเอียดการติดต่อ</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">รายละเอียดการติดต่อ</li>
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
									 <h4 class="card-title">เนื้อหา 
<?php
    $sql_pre = "SELECT `id_mail`, `name`, `email`, `subject`, `message`, `send_datetime`, `status` FROM mod_contact WHERE id_mail < '".$_GET['id']."' ORDER BY `id_mail` DESC ";
    $query_pre = $db->Query($sql_pre);
    $num_pre = mysqli_num_rows($query_pre);
    $result_pre = mysqli_fetch_array($query_pre);

    if($num_pre!=0){
?>
                           <a href="read.php?id=<?=$result_pre['id_mail']?>" class="btn btn-box-tool" data-toggle="tooltip" title="หน้าก่อน"><i class="fa fa-chevron-left"></i> หน้าก่อน</a>
<?php        
    }
?>

<?php
    $sql_next = "SELECT `id_mail`, `name`, `email`, `subject`, `message`, `send_datetime`, `status` FROM mod_contact WHERE id_mail > '".$_GET['id']."'";
    $query_next = $db->Query($sql_next);
    $num_next = mysqli_num_rows($query_next);
    $result_next = mysqli_fetch_array($query_next);

    if($num_next!=0){
?>
                            <a href="read.php?id=<?=$result_next['id_mail']?>" class="btn btn-box-tool" data-toggle="tooltip" title="หน้าถัดไป"><i class="fa fa-chevron-right"></i> หน้าถัดไป</a>
<?php
    }
?></h4><hr>

                        <h5>เรื่องที่ติดต่อ : <?=$result['subject']?>
                        <span class="mailbox-read-time pull-right"></span></h5>
                       	<h5>รายละเอียด : <?=$result['message']?></h5><hr>
						<div class="pull-right" style="float: right;">
                             <button type="button" class="btn btn-primary reply" data-id="<?=$result['email']?>"  message="<?=$result['message']?>" subject="<?=$result['subject']?>" name="<?=$result['name']?>"><i class="fa fa-reply"></i> ส่งข้อความ</button>
                          </div>
                          <button type="button" class="btn btn-danger del" data-id="<?=$result['id_mail']?>"><i class="mdi mdi-delete-empty"></i> ลบ</button>
						  <hr>
						  <div class="cardsave" style="padding-top: 10px;">
         					 <a href="front_manage.php" class="btn btn-default pull-right button_coler_read" style="float: right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;<?=lang('ยกเลิก','Cancel')?></a>
        				</div>			
                        </div>
                        <!-- /.box-footer -->
								
                      </div>
                      <!-- /. box -->			
                    </div>					
								
                        </div>
                    </div>
                </div>	
				</div>	
                <!-- Row -->
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
                <button type="button" class="btn btn-warning" data-dismiss="modal">ปิด</button>
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
	<script src="js/script_contact_read.js"></script>

	