<?php include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php include('../template/menu.php');?>
<!-- ============================================================== -->
<?php require_once '../lib/permission.php'; ?>

<style>
	.box-box-fa {
    cursor: pointer;
    text-align: center;
    margin-top: 12px;
    margin-left: 5px;
    color: #ddd;
    width: 100%;
    font-size: 86px;
    border: 1px #ddd solid;
    border-radius: 4px;
}
	.group-btn-custom{
      margin-top: 15px;
    }
	.active_link{
    background: #28a745;
    border: 1px solid #26c6da;
    -webkit-box-shadow: 0 2px 2px 0 rgba(40, 190, 189, 0.14), 0 3px 1px -2px rgba(40, 190, 189, 0.2), 0 1px 5px 0 rgba(40, 190, 189, 0.12);
    box-shadow: 0 2px 2px 0 rgba(40, 190, 189, 0.14), 0 3px 1px -2px rgba(40, 190, 189, 0.2), 0 1px 5px 0 rgba(40, 190, 189, 0.12);
    -webkit-transition: 0.2s ease-in;
    -o-transition: 0.2s ease-in;
    transition: 0.2s ease-in;
	color: #FFFFFF;	
    }
	.remove-item{
      transition: 0.4s;
      background-color: #fff4f4 !important;
    }
	.select2{
		
	}
</style>

  <link rel="stylesheet" href="../../plugins_b/bootstrap-select/bootstrap-select.min.css">
  <!-- upload template css-->
  <link rel="stylesheet" type="text/css" href="../../plugins_b/bootstrap-select/style.css">
  <link href="../../plugins_b/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">	
        <!-- ============================================================== -->
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
                        <h3 class="text-themecolor">ระบบเพิ่มระบบ</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">ระบบเพิ่มระบบ</li>
                        </ol>
                    </div>
                </div>
				<div class="">
                	<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i>
					</button>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
				<?php if($adminFlg == '1'){ ?>
					<?php if($button_view != 'display:none' ) { ?>
				<div class="row">
                    <!-- Column -->
                    <div class="col-lg-7 col-md-7" >
                        <div class="card card-inverse card-info callout-primary-box" >
                            <div class="card-body" style="padding: 0.48rem;">
								<h4 class="card-title"> <a href="#code1" data-toggle="collapse"><i class="fas fa-chevron-circle-down" style="color: #FFFFFF;" data-toggle="tooltip" title="อ่านรายละเอียด"></i> <span style="color: #FBFBFB">คำแนะนำการเพิ่มระบบเมนู</span> </a></h4>
                        <div id="code1" class="collapse" >
                            <div class="highlight" style="border-radius: 5px; margin: 0rem 0px;">
                              <p > <i class="fa fa-caret-right"></i> สามารถเพิ่มไอคอนระบบได้ ด้วยการคลิกที่กล่องไอคอน              </p><p > <i class="fa fa-caret-right"></i> สามารถเลือกรูปแบบระบบได้ที่ปรากฏในแถบเมนู         </p><p class="font"> <i class="fa fa-caret-right"></i> สามารถเลือกที่จะเป็นหัวข้อหลักหรือหัวข้อย่อยได้ *            </p><p class="font">&nbsp;&nbsp;*ถ้าต้องการให้เป็นหัวข้อหลัก หรือหัวข้อนั้นๆ มีซับย่อยอีก กรุณาเลือก root folder เป็น #             </p><p class="font"> <i class="fa fa-caret-right"></i> เลือกวิธีการเชื่อมต่อ โดยเริ่มจาก Root folder <i class="fa fa-folder"> </i> จากนั้นเลือกลิ้ง <i class="fa fa-link"> </i> ที่ต้องการให้เมนูเปลี่ยนหน้า</i></p>
                            </div>
                        </div>
							</div>	
                        </div>
						<div class="card card-inverse card-warning callout-warning-new-box" style="display: none;">
                            <div class="card-body" style="padding: 0.48rem;">
								<h4 class="card-title"> <a href="#code2" data-toggle="collapse"><i class="fas fa-chevron-circle-down" style="color: #FFFFFF;" data-toggle="tooltip" title="อ่านรายละเอียด"></i> <span style="color: #FBFBFB">คำแนะนำการแก้ไขระบบเมนู</span> </a></h4>
                        <div id="code2" class="collapse">
                            <div class="highlight" style="border-radius: 5px; margin: 0rem 0px;">
                              <p > <i class="fa fa-caret-right"></i> ถ้าไม่ต้องการให้มี icon ให้ลบชื่อที่กล่อง icon              </p><p > <i class="fa fa-caret-right"></i> เมื่อเข้าสู่โหมดการแก้ไขเมนู จะไม่สามารถลบระบบเมนูอื่นๆ ได้         </p><p class="font"> <i class="fa fa-caret-right"></i> สามารถเลือกที่จะเป็นหัวข้อหลักหรือหัวข้อย่อยได้ *            </p><p class="font">&nbsp;&nbsp;*ถ้าต้องการให้เป็นหัวข้อหลัก หรือหัวข้อนั้นๆ มีซับย่อยอีก กรุณาเลือก root folder เป็น #             </p>
                            </div>
                        </div>
							</div>	
                        </div>
						<div class="card add_system-box">
							<div class="card card-outline" style="margin-bottom: 0px;">
                            	<div class="card-header" style="background: #26c6da">
                                	<h4 class="m-b-0 text-white">เพิ่มเมนูระบบ</h4>
								</div>
                        	</div>
                            <div class="card-body">
								
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#th" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-th"></i> ภาษาไทย</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#us" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-us"></i> ภาษาอังกฤษ</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
								<form action="" name="frmMain" id="frm_system" method="post">
                                <div class="tab-content tabcontent-border">
									<div class="tab-pane active" id="th" role="tabpanel">
                                        <div class="p-20">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        ชื่อระบบ
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="ภาษาไทย" name="name" id="name_th" onkeyup="checklength()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-20" id="us" role="tabpanel">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        System name
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="english" id="english" placeholder="ภาษาอังกฤษ">
                                            </div>
                                        </div>
					<div class="row" style="margin-left: 0px;margin-right: 0px;">
                      <div class="col-lg-3 col-md-3">
						<div class="box-box-fa ch-icon" id="change-icon" >
                          <i class="mdi mdi-checkbox-blank-circle-outline"></i>
                        </div>
                      </div>
                      <div class="col-lg-9 col-md-9 p-20">
							<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        icon
                                                    </span>
                                                </div>
                                                <input type="text" name="icon" id="change-icon-value" class="form-control"  placeholder="สามารถไส่ชื่อไอคอนได้ ตัวอย่าง <i class='fa fa-check'></i>">
                                            </div>
						  <div class="group-btn-custom">
                            <span class="btn btn-secondary active_link" id="head-link">หัวข้อหลัก</span>
                            <span class="btn btn-secondary" id="sub-link">หัวข้อย่อย</span>
<!--                            <span class="btn btn-warning fa-pull-right" id="view">กำหนดสิทธิ์การมองเห็น</span>-->
                          </div>
                        
                      </div>
                    </div>
				  <div class="form-type" style="padding:10px; text-align: center; font-size: 16px; display: none;">
                          <input type="radio" name="form-system" checked value="1" id="mn_system"> หัวข้อหลัก                   
                           <input type="radio" name="form-system" value="2" id="mn_system_sub"> หัวข้อย่อย
                  </div>				
									
					<div class="row" style="padding: 20px;">
                        <div class="col-lg-6" >
                          <div class="card card-outline-inverse" id="mn_system_show">
                            <div class="card-header" style="background: #d2d6de">
                                <h4 class="m-b-0 text-black-50">รูปแบบระบบ</h4>
							</div>
                            <div class="card-body">
								<div class="demo-radio-button">
                                    <input name="form-type" type="radio" id="radio_30" value="1" class="with-gap radio-col-red" checked />
                                    <label for="radio_30">จัดการเนื้อหา</label>
                                    <input name="form-type" type="radio" id="radio_31" value="2" class="with-gap radio-col-red" />
                                    <label for="radio_31">จัดการดีไซต์</label>
                                </div>	
                            </div>
                          </div>  
                          <div class="card card-outline-inverse" id="mn_system_sub_show" style="display: none;">
                            <div class="card-header" style="background: #d2d6de">
                                <h4 class="m-b-0 text-black-50">ภายใต้ระบบ</h4>
							</div>
                            <div class="card-body">
                              <div id="live_system_sub"></div>
                            </div>
                          </div>  
                        </div>
                        <div class="col-lg-6" style="max-width: 100%;">
                            <div class="card card-outline-inverse">
                            <div class="card-header" style="background: #d2d6de">
                              <h4 class="m-b-0 text-black-50">การเชื่อมต่อ</h4>
                            </div>
                            <div class="card-body" style="padding: 0">
                              <table class="table">
                                <tr>
                                  <td width="30">
                                    <img src="../images/folder.png" width="25" height="25">
                                  </td>
                                  <td>
                                    <select class="form-control select_dir" id="basic3">
                                      <option value="#">#</option>
<?php
  $dir = "../../engine/";
  if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
          while (($file = readdir($dh)) !== false) {
              if ($file=='.' || $file=='..') {
                  continue;
              }
              if (strpos($file, 'mod') !== false || strpos($file, 'page') !== false) {
                  echo "<option value=".$file.">" . $file . "</option>";
              }
          }
          closedir($dh);
      }
  }
?>
                                    </select>
                                  </td>
                                </tr>
                                <tr >
                                  <td><i class="fa fa-link" style="font-size: 24px; color:#3c8dbc !important "></i></td>
                                  <td>
                                    <div id="select_dir-file" style="top: 40px;">
                                      
                                    </div>
                                    <select class="form-control form-control select_dir-file" disabled="" id="basic4">
                                      <option></option>
                          
                                    </select>
                                  </td>
                                </tr>
								
                              </table>
								<div class="row" style="padding-left: 30px;">
								<a class="mytooltip" href="javascript:void(0)" style="color: #FF0004; z-index: 9;"> * ข้อควรระวังการใช้งาน<span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2">ควรตั้งชื่อ Folder <i class="fa fa-folder"></i> ให้ขึ้นต้นด้วย mod ทุกครั้ง </span></span></span></a>
								</div>	
                            </div>
                          </div>  
                          <p style="float: left; margin-right: 10px;"></p> 
                        </div>
                      </div>				
                                    
                                </div>
									</form><br>
			<div class="box-footer" style="text-align: right;">
              <button class="btn btn-warning reset_form" style="border:1px solid orange;"><i class="fas fa-arrow-alt-circle-left"></i> เคลียร์</button>
              <button class="btn btn-info btn-send-add" id="btn-send-add" disabled><i class="fas fa-plus-circle"></i> เพิ่ม</button>
            </div>
                            </div>
							            
                        </div>
					<div class="card edit_system-box" style="display: none;">
							<div class="card card-outline" style="margin-bottom: 0px;">
                            	<div class="card-header" style="background: #ffb22b;">
                                	<h4 class="m-b-0 text-white"><button type="button" class="btn btn-secondary recover_box-add" style="border: 1px solid #ffb22b;" ><i class="fa fa-times"></i></button> แก้ไขระบบเมนู</h4>
								</div>	
                        	</div>
                            
<!-- Edit syste begin -->
          <!-- Edit syste begin -->
          <div class="box box-warning box-solid edit_system-box" style="display: none; padding: 18px;">
            <form action="" name="frmMain_mul_em_edit" id="frm_system-edit" method="post">
				
              <div id="select_system-edit"></div>
            </form>
            <div class="box-footer" style="text-align: right;">
              
              <button class="btn btn-danger delete-system_this" data-id="" style="margin-right: 5px; "><i class="mdi mdi-delete-empty"></i> ลบระบบเมนู</button>
              <button class="btn btn-primary recover_box-add" style="margin-right: 5px; "><i class="fas fa-arrow-alt-circle-left"></i> ออกจากการแก้ไข</button>
             <!--  <button class="btn btn-warning pull-left open_view-edit" style="border:1px solid #e08e0b;"> แก้ไขสิทธิ์การมองเห็น</button>
               -->
              
              <button class="btn btn-info btn-send-edit" id="btn-send-edit"><i class="fas fa-plus-circle"></i> บันทึก</button>
            </div>
          </div>
<!-- End of edit system begin -->
<!-- End of edit system begin -->
							            
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-5 col-md-5" >
						<div class="row" style="margin-bottom: 10px;">
							  <div class="col-md-12">
								<div class="input-group">
								   <span class="input-group-btn">
									<button class="btn btn-secondary show-all" value="" style="font-size: 18px; margin-right: 5px; "><i class="fas fa-redo pull-right" style="margin: 0;"></i></button>
									<button class="btn btn-secondary show-system" value="1" style="font-size: 18px; margin-right: 5px;"><i class="fa fa-cog pull-right" style="margin: 0;"></i></button>
									<button class="btn btn-secondary show-design" value="2" style="font-size: 18px; margin-right: 5px;"><i class="fa fa-desktop pull-right" style="margin: 0;" ></i></button>
								  </span>
									<input type="text" name="q" class="form-control" placeholder="ค้นหา..." id="search-jquery">
										<div class="input-group-append">
											<span class="input-group-text" id="basic-addon2">
												<i class="fas fa-search"></i>
											</span>
										</div>
								</div>
							   </div>
                    	</div>
                    <!-- Column -->
						<div class="card card-inverse card-info" style="margin-bottom: 0px;" >
                            <div class="card-body" style="padding: 0.48rem;">
								<h4 class="card-title"> <a href="#code3" data-toggle="collapse"><i class="fas fa-chevron-circle-down" style="color: #FFFFFF;" data-toggle="tooltip" title="อ่านรายละเอียด"></i> <span style="color: #FBFBFB">คำแนะนำการจัดการระบบเมนู</span> </a></h4>
                        <div id="code3" class="collapse" >
                            <div class="highlight" style="border-radius: 5px; margin: 0rem 0px;">
                              <p > <i class="fa fa-caret-right"></i> คลิ๊กที่ไอคอน <i class="fas fa-redo pull-right" style="margin: 0;"></i> จะเป็นการแสดงทั้งหมดของระบบ              </p><p > <i class="fa fa-caret-right"></i>  คลิ๊กที่ไอคอน <i class="fa fa-cog pull-right" style="margin: 0;"></i> จะเป็นการแสดงหน้าจัดการของระบบ         </p><p class="font"> <i class="fa fa-caret-right"></i> คลิ๊กที่ไอคอน <i class="fa fa-desktop pull-right" style="margin: 0;" ></i> จะเป็นการแสดงหน้าจัดการของดีไซน์            </p>
                            </div>
                        </div>
							</div>	
                        </div>
						<div class="box box-default" style="background: white;
   								 margin-top: 30px; border-top: 3px solid #d2d6de; -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    								box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);">
							<div class="box-header">
							  <h3 class="box-title">เมนูระบบ</h3>
							</div>
								<form action="" name="frmMain_mul" id="frmMain_mul" method="post">
								<div class="box-body select_system" id="select_system" style="padding: 0;">
								</form>
							</div><br>
							<button type="button" class="delmulti-menu btn btn-danger" style="transition: 0.4s;" id="MultiDelete" disabled><i class="mdi mdi-delete-empty"></i> ลบรายการที่เลือก <span class="num_"></span></button>
                		</div>
				
                
                <!-- Row -->
                <!-- Row -->
                <!-- Row -->
                
                <!-- Row -->
                <!-- Row -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
			<!-- change icon -->
        <div class="modal fade bs-example-modal-lg" id="modal-ch-icon">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: .9rem; padding: 20px;">
              <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">เลือกไอคอน</h4>
              </div>
              <div class="modal-body" style="padding: 0;">
                <input type="hidden" name="" id="id_catagory" class="form-control">
<?php require_once 'select-icon.php'; ?>
              </div>
              <!--/.modal-body-->
            </div><!-- /.modal-content -->
          </div>
        </div>

         <div class="modal fade bs-example-modal-lg" id="modal-ch-icon-edit">
          <div class="modal-dialog modal-lg modal-chicon">
            <div class="modal-content" style="border-radius: .9rem; padding: 20px;">
              <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">เลือกไอคอน</h4>
              </div>
              <div class="modal-body" style="padding: 0;">
<?php require_once 'select-icon-edit.php'; ?>
              </div>
              <!--/.modal-body-->
            </div><!-- /.modal-content -->
          </div>
        </div>

        <div class="modal fade bs-example-modal-lg" id="modal-view">
          <div class="modal-dialog modal-em-add">
            <div class="modal-content">
              <div class="modal-header" style="border-bottom: none;">
                <button type="button" class="close" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">กำหนดสิทธิ์</h4>
              </div>
              <div class="modal-body" style="padding-top: 0">
                <div class="row" style="padding-bottom: 10px;">
                  <div class="col-md-5">
                    <div class="input-group pull-right">
                      <input type="text" name="q" class="form-control" placeholder="Search..." id="search-jquery-addview">
                      <span class="input-group-btn">
                        <button name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </div>
                  <form action="" name="frmMain_mul_em_add" id="frmMain_mul_em_add" method="post">

<?php
  //require 'select_em-list.php';
?>
                </form>
              </div>
              <!--/.modal-body-->
            </div><!-- /.modal-content -->
          </div>
        </div>

        <!-- END OF CHANGE ICON -->
            </div>
				<?php } ?>
			<?php } ?>
	</div>
</div>


		
<?php include('../template/footer.php');?>

<!-- ============================================================== -->
<!-- All custom script -->
<!-- ============================================================== -->
<script> 
  $(document).ready(function () {
    $('#basic3').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    $('#basic4').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    $('#basic5').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    function fetch_system_sub(){
      $.ajax({
        url: "select_system-add.php",
        method:"POST",
        success:function(data){  
        $('#live_system_sub').html(data);  
        }  
      })
    }
    fetch_system_sub();

     $(document).on('click','.set_authen', function(){
          var i = $(this).attr('data-id');
          $('.authen'+i).removeClass('authen_acitve-block');
          $(this).addClass('authen_acitve-block');
        })

    $(document).on('click','.open_view-edit', function(){
      $('#modal-view-edit').modal('show');
    })

    function fetch_system_sub_edit(ids){
      $.ajax({
        url: "select_system-modify.php",
        method:"POST",  
        data: {ids:ids},
        success:function(data){  
        $('#live_system_sub-edit').html(data);  
        }  
      })
    }
    

    function fetch_system_front(check){
      $.ajax({
        url: "select_system-front.php",
        method:"POST",  
        success:function(data){  
          $('#select_system').html(data);  
          if(check=='true'){
             $('.delete-system').prop('disabled', true);
             $('#CheckAll').prop('disabled', true);
             $('.checkbox_remove').prop('disabled', true);
          }
        }  
      })
    }
    fetch_system_front();

    $(document).on('click', '#view', function(){
      $('#modal-view').modal('show');
    })

    $(document).on('click', '.ch-icon', function(){
      $('#modal-ch-icon').modal('show');   
    });

    $(document).on('click', '.ch-icon-edit', function(){
      var id = $(this).attr('data-id');
      $('#id_system').val(id);
      $('#modal-ch-icon-edit').modal('show');   
    });

    $(document).on('click', '.change-icon', function(){
      var i = $(this).html();
      $('#change-icon').html(i);
      $('#change-icon-value').val(i);
      $('#modal-ch-icon').modal('hide');
    });

    $(document).on('click', '.change-icon-edit', function(){
      var i = $(this).html();
      $('#change-icon-edit').html(i);
      $('#change-icon-value-edit').val(i);
      $('#modal-ch-icon-edit').modal('hide');
    });
    $(document).on('click', '#head-link', function(){
      $(this).addClass('active_link');
      $('#sub-link').removeClass('active_link');
      $('#mn_system').prop('checked', true);
       $('#mn_system_show').show();
      $('#mn_system_sub_show').hide();
    });

    $(document).on('click', '#sub-link', function(){
      $(this).addClass('active_link');
      $('#head-link').removeClass('active_link');
      $('#mn_system_sub').prop('checked', true);
      $('#mn_system_show').hide();
      $('#mn_system_sub_show').show();
    });

    $(document).on('click', '#head-link-edit', function(){
      $(this).addClass('active_link');
      $("select#basic8")[0].selectedIndex = 0;
      $('#sub-link-edit').removeClass('active_link');
      $('#mn_system_edit').prop('checked', true);
      $('#mn_system_show').show();
      $('#mn_system_sub_show').hide();
      $('#mn_system_show_edit').show();
      $('#mn_system_sub_show_edit').hide();
    });

    $(document).on('click', '#sub-link-edit', function(){
      $(this).addClass('active_link');
      $('#head-link-edit').removeClass('active_link');
      $('#mn_system_sub_edit').prop('checked', true);
      var id = $(this).attr('data-id');
      fetch_system_sub_edit(id);
      $('#mn_system_show_edit').hide();
      $('#mn_system_sub_show_edit').show();
    });

    $(document).on('click', '.select_dir .dropdown-menu .inner li a', function(){
      var file = $(this).find('.text').html();
      $.ajax({
        beforeSend: function() {                    
        },
        type:'POST',
        url:'ajaxData_dir-file.php',
        data:'file='+file,
        success:function(html){
          $('.select_dir-file').hide();
          $('#select_dir-file').html(html);
        }
      }); 
    })

    $(document).on('click', '.select_dir-edit .dropdown-menu .inner li a', function(){
      var file = $(this).find('.text').html();
      $.ajax({
        beforeSend: function() {                    
        },
        type:'POST',
        url:'ajaxData_dir-file.php',
        data:'file='+file,
        success:function(html){
          $('.hide_dir-file').hide();
          $('#select_dir-file-edit').html(html);
        }
      }); 
    })
    

    $("#search-jquery").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-search tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    $("#search-jquery-addview").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-search-addview tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    $(document).on("keyup","#search-jquery-editview", function() {
        var value = $(this).val().toLowerCase();
        $("#table-search-editview tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    $(document).on('click', '.show-system', function(){
        var id = $(this).val();
        $.ajax({
        url: "select_system-front.php",
        data: {id:id},
        method:"POST",  
        success:function(data){  
          $('#select_system').html(data);  
          if($('.edit_system-box').is(':visible')){
             $('.delete-system').prop('disabled', true);
             $('#CheckAll').prop('disabled', true);
             $('.checkbox_remove').prop('disabled', true);
          }
        }  
      })
    });

    $(document).on('click', '.show-all', function(){
        var id = $(this).val();
        $.ajax({
        url: "select_system-front.php",
        data: {id:id},
        method:"POST",  
        success:function(data){  
          $('#select_system').html(data);  
          if($('.edit_system-box').is(':visible')){
             $('.delete-system').prop('disabled', true);
             $('#CheckAll').prop('disabled', true);
             $('.checkbox_remove').prop('disabled', true);
          }
        }  
      })
    });

    $(document).on('click', '.show-design', function(){
      var id = $(this).val();
        $.ajax({
        url: "select_system-front.php",
        data: {id:id},
        method:"POST",  
        success:function(data){  
          $('#select_system').html(data);  
          if($('.edit_system-box').is(':visible')){
             $('.delete-system').prop('disabled', true);
             $('#CheckAll').prop('disabled', true);
             $('.checkbox_remove').prop('disabled', true);
          }
        }  
      })
    });

    $(document).on('click', '.btn-send-add', function(){
       var formData = new FormData($('#frm_system')[0]);
       swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>ยืนยันการเพิ่มระบบ</label>",
        // text: "" + role_id,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
        }).then((result) => {
          if (result.value){
            $.ajax({
          complete: function() {
            swal.fire("สำเร็จ", "เพิ่มระบบเรียบร้อยแล้ว", "success");
            fetch_system_sub();
            fetch_system_front();
            $('#change-icon').html('<i class="fa fa-circle-o"></i>')
            $('#head-link').addClass('active_link');
            $('#sub-link').removeClass('active_link')
            $('#mn_system_show').show();
            $('#mn_system_sub_show').hide();
          },
          method: "POST",
          url: "back_add-mod.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
             //alert(data);
              $.ajax({
                url: 'back_add-push-system.php?id='+data.message,
                type: 'POST',
                data: $('#frmMain_mul_em_add').serialize(),
              })
              .done(function(data) {
                console.log("success"+data.message);
              })
              .fail(function(data) {
                console.log("error"+data.message);
              })
              .always(function(data) {
                console.log("complete"+data.message);
              });
            $('#frm_system')[0].reset();
            $('#select-type').val('1');
            $('.checkbox_em_add').prop('checked', false);
            $('.show-tr-em-add').removeClass("remove-item");
            $('#CheckAll_em_add').prop('checked', false);
            
          },
        });

          }
        
      });
    });

    $(document).on('click', '.reset_form', function(){
      $('#select-type').val('1');
      $('.checkbox_em_add').prop('checked', false);
      $('#CheckAll_em_add').prop('checked', false);
      $('#frm_system')[0].reset();
      $('#change-icon').html('<i class="mdi mdi-checkbox-blank-circle-outline"></i>');
    });

    $(document).on('click', '.edit-system', function(){
      var id = $(this).attr('data-id');  
      $('.delete-system').prop('disabled', true);  
      $('#CheckAll').prop('disabled', true);
      $('.checkbox_remove').prop('disabled', true);
      $('.delete-system_this').attr('data-id',id);
       $.ajax({
          url: "select_system-edit.php",
          method:"POST",  
          data:{id:id},
          success:function(data){  
          $('#select_system-edit').html(data);  
          $('.edit_system-box').show();
          $('.callout-warning-new-box').show();
          $('.callout-primary-box').hide();
          $('.add_system-box').hide();
          fetch_system_sub_edit(id);
          }  
        })
      });

    $(document).on('click', '.recover_box-add', function(){
      $('.edit_system-box').hide();
      $('.add_system-box').show();
      $('.callout-warning-new-box').hide();
      $('.callout-primary-box').show();
      $('.delete-system').prop('disabled', false); 
      $('#CheckAll').prop('disabled', false);
      $('.checkbox_remove').prop('disabled', false);
    })
     $(document).on('click', '.btn-send-edit', function(){
      var id = $('#id_edit').val();
       var formData = new FormData($('#frm_system-edit')[0]);
       swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>ยืนยันการแก้ไขระบบ</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
        }).then((result) => {
          if (result.value){
            $.ajax({
          complete: function() {
            var check = 'true';
            swal.fire("สำเร็จ", "แก้ไขระบบเรียบร้อยแล้ว", "success");
            fetch_system_sub();
            fetch_system_front(check);
            fetch_system_sub_edit(id);
           
          },
          method: "POST",
          url: "back_edit-mod.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(test) {
            // alert(test);
          },
        });

          }
        
      });
    });

    $(document).on('change', '.sort_level', function(){
      var id = $(this).attr('data-id');
      var type = $(this).attr('data-type');
      var sort = $(this).val();
        if($('.edit_system-box').is(':visible')){
          var check = 'true';
        }else{
          var check = '';
        }
      $.ajax({
        url: "back_edit-sort.php",
        data: {id:id,sort:sort},
        method:"POST",  
        success:function(data){  
          fetch_system_front(check);
        }  
      })
    })

    $(document).on('click','.delete-system', function(){
      var id = $(this).attr('data-id');
      swal.fire({
        title: "ยืนยัน?",
        text: "ยืนยันการลบระบบเมนู",
        type: "info",
        showCancelButton: true,
        cancelButtonText: "ยกเลิก",
        confirmButtonText: "ยืนยัน",
        confirmButtonClass: "btn-info",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }).then((result) => {
        if (result.value){
          $.ajax({
          complete:function(){
            swal.fire("สำเร็จ", "ลบระบบเรียบร้อยแล้ว", "success");
          },
          url: "back_del-mod.php",
          method: "POST",
          data: {id:id},
          success:function(data){
          fetch_system_front();
          fetch_system_sub();
          }
        });

        }
        
      });
    });

    $(document).on('click','.delete-system_this', function(){
      var id = $(this).attr('data-id');
      swal.fire({
        title: "ยืนยัน?",
        text: "ยืนยันการลบระบบเมนู",
        type: "info",
        showCancelButton: true,
        cancelButtonText: "ยกเลิก",
        confirmButtonText: "ยืนยัน",
        confirmButtonClass: "btn-info",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      }).then((result) => {
        if (result.value){
          $.ajax({
          complete:function(){
            swal.fire("สำเร็จ", "ลบระบบเรียบร้อยแล้ว", "success");
          },
          url: "back_del-mod.php",
          method: "POST",
          data: {id:id},
          success:function(data){
          fetch_system_front();
          fetch_system_sub();
          $('.edit_system-box').hide();
          $('.add_system-box').show();
          $('.delete-system').prop('disabled', false); 
          }
        });

        }
        
      });
    });
    //---------------------------------------Alert modal for notification of delete multiple--------------------------------------------------
    $(document).on('click', '#MultiDelete', function () {
      swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะลบระบบที่เลือก</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
        }).then((result) => {
          if (result.value){
            $.ajax({
          complete: function() {
            swal.fire("สำเร็จ", "ลบระบบเรียบร้อยแล้ว", "success");
          },
          type: "POST",
          url: "back_del-mod.php",
          data: $("#frmMain_mul").serialize(),
          success: function(data) {
            // alert(data);
            fetch_system_front();
            fetch_system_sub();
            $('.num_').html('');
            $('#MultiDelete').prop('disabled',true);
          },
        });

          }
          
      });
    });
  });
  //----------------------------------------------Click Check all--------------------------------------------------------------------------------
  function ClickCheckAll(vol){
    var i=1;
    for(i=1;i<=document.frmMain_mul.hdnCount.value;i++){
      $('.num_').html('[ '+i+' ]');
      if(vol.checked == true){
        eval("document.frmMain_mul.Chk"+i+".checked=true");
        $(".show-tr").addClass("remove-item"); 
        $('#MultiDelete').prop('disabled',false);
        $('#MultiEdit').prop('disabled',false);
      }else{
        $('.num_').html('');
        eval("document.frmMain_mul.Chk"+i+".checked=false");
        $('#MultiDelete').prop('disabled',true);
        $('#MultiEdit').prop('disabled',true);
        $(".show-tr").removeClass("remove-item");
      }
    }
  }
  //---------------------------------------------------Add Class---------------------------------------------------------------------------------
  $(document).on('click', '.checkbox_remove', function(){
    var i =0; 
    if($(this).is(":checked")) {
      $(this).parents('.show-tr').addClass("remove-item");
      $('#MultiDelete').prop('disabled',false);
      $('#MultiEdit').prop('disabled',false);
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
        $('#MultiEdit').prop('disabled',true);
      }
    }
  });

  //----------------------------------------------Click Check all em add--------------------------------------------------------------------------
  function ClickCheckAll_em_add(vol){
    var i=1;
    for(i=1;i<=document.frmMain_mul_em_add.hdnCount_em_add.value;i++){
      if(vol.checked == true){
        eval("document.frmMain_mul_em_add.Chk"+i+".checked=true");
        $(".show-tr-em-add").addClass("remove-item"); 
      }else{
        eval("document.frmMain_mul_em_add.Chk"+i+".checked=false");
        $(".show-tr-em-add").removeClass("remove-item");
      }
    }
  }
  //----------------------------------------------Click Check all em add--------------------------------------------------------------------------
  function ClickCheckAll_em_edit(vol){
    var i=1;
    for(i=1;i<=document.frmMain_mul_em_edit.hdnCount.value;i++){
      if(vol.checked == true){
        eval("document.frmMain_mul_em_edit.Chk"+i+".checked=true");
        $(".show-tr-em-add").addClass("remove-item"); 
      }else{
        eval("document.frmMain_mul_em_edit.Chk"+i+".checked=false");
        $(".show-tr-em-add").removeClass("remove-item");
      }
    }
  }
  //---------------------------------------------------Add Class---------------------------------------------------------------------------------
  $(document).on('click', '.checkbox_em_add', function(){
    var i =0; 
    if($(this).is(":checked")) {
      $(this).parents('.show-tr-em-add').addClass("remove-item");
    }else{
      $(this).parents('.show-tr-em-add').removeClass("remove-item");
    }
  });

  function checklength() {
    var input = document.getElementById("name_th") ;
    if(input.value.length > 0)
    {
      document.getElementById("btn-send-add").disabled = false;
    }else{
      document.getElementById("btn-send-add").disabled = true;
    }
  }
  function checklength_edit() {
    var input = document.getElementById("name_th-edit") ;
    if(input.value.length > 0)
    {
      document.getElementById("btn-send-edit").disabled = false;
    }else{
      document.getElementById("btn-send-edit").disabled = true;
    }
  }
</script>    

<script>
	
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
		