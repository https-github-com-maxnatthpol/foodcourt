<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
    if ($_POST['form']=="select_table_front_manage") {
        select_table_front_manage();
    } elseif ($_POST['form']=="select_div_edit_front_manage") {
        select_div_edit_front_manage();
    }
} else {
}

function select_div_edit_front_manage()
{
    $db = new DB();

    $strSQL = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`description_th`,`description_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE  `id_catagory` = '".$_POST["id"]."' ";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC); ?>

<div class="card card-body" >
          <div class="box-header with-border">
		  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
            <h3 class="box-title">แก้ไขหมวดหมู่</h3>

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_edit" id="form_edit" method="post">
              <input type="hidden" name="form" value="form_edit">
              <input type="hidden" name="id_category_edit" value="<?php echo $_POST["id"] ?>">
              <div id="div_form_edit">
                  <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#thai_edit" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-th"></i> ภาษาไทย</span></a> 
									</li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#english_edit" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-us"></i> ภาษาอังกฤษ</span></a> 
									</li>  
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                               
                                <div class="tab-pane active" id="thai_edit" role="tabpanel">
                                    <div class="card-body">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อหมวดหมู่ </label>
                                        <input onkeyup ="disabled_btn_edit()" type="text" class="form-control" id="name_th_edit" name="name_th_edit" placeholder="ภาษาไทย" value="<?php echo $objResult['name_catagory_th'] ?>" >
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">คำอธิบายอย่างย่อ </label>
                                        <textarea rows="5" class="form-control" id="explanation_th_edit" name="explanation_th_edit"><?php echo $objResult['description_th'] ?></textarea>
                                      </div>


                                    </div>
                                </div>
								
<?php
			$level = $objResult['level'];
			$disabled = 'disabled';
			
?>								
								
                                <div class="tab-pane" id="english_edit" role="tabpanel">
                                    <div class="card-body">
                                        
                                      <div class="form-group">
                                        <label for="example-email">ชื่อหมวดหมู่ </label>
                                        <input type="text" class="form-control" id="name_en_edit" name="name_en_edit" placeholder="ภาษาอังกฤษ" value="<?php echo $objResult['name_catagory_en'] ?>">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">คำอธิบายอย่างย่อ </label>
                                        <textarea rows="5" class="form-control" id="explanation_en_edit" name="explanation_en_edit"><?php echo $objResult['description_en'] ?></textarea>
                                      </div>

                                    </div>
                                </div>
								
								<div class="card-body" style="padding: 0rem 1.25rem 1.25rem 1.25rem;">
								<div class="form-group">
                                        <label for="example-catagory">หมวดหมู่สินค้า </label>
			  					
										  	<select class="form-control select2" name="name_catagory_ed" id="name_catagory_ed">
												
												<?php if($level == '1') { ?>
												
                                          		<option value="0" selected="selected" >-- หมวดหมู่หลัก --</option>
												
												<?php 
												 $strSQL01 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '1' AND `delete_datetime` IS null";
    											 $objQuery01 = $db->Query($strSQL01);
	 
	 											 while ($objResult01 = mysqli_fetch_array($objQuery01, MYSQLI_ASSOC)) {
												?>
												<option value="1-<?php echo $objResult01['id_catagory'] ?>">&nbsp; <?php echo $objResult01['name_catagory_th'] ?></option>
												
													<?php 
													 $strSQL2 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '2' AND `group_sub` = '".$objResult01['id_catagory']."' AND `delete_datetime` IS null";
													 $objQuery2 = $db->Query($strSQL2);

													 while ($objResult2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)) {
													?>
														<option value="2-<?php echo $objResult2['id_catagory'] ?>">&nbsp;&nbsp;- <?php echo $objResult2['name_catagory_th'] ?></option>

													<?php } ?>
												
												  <?php } ?>
												<?php } ?>
												
												<?php if($level == '2') { ?>
												
                                          		<option value="0">-- หมวดหมู่หลัก --</option>
												
												<?php 
												 $strSQL01 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '1' AND `delete_datetime` IS null";
    											 $objQuery01 = $db->Query($strSQL01);
	 
	 											 while ($objResult01 = mysqli_fetch_array($objQuery01, MYSQLI_ASSOC)) {
													 
												?>
												
												<?php 
													 
											$strSQL02 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `id_catagory` = '".$objResult["id_catagory"]."' AND `delete_datetime` IS null";
    										$objQuery02 = $db->Query($strSQL02);
											$objResult02 = mysqli_fetch_array($objQuery02, MYSQLI_ASSOC);	
													 
												if($objResult01['id_catagory'] == $objResult02["group_sub"]){
													$selected = 'selected';
													$disabled = '';
												}	
												else{
													$selected = '';
													$disabled = '';
												}		
														
												?>		
												<option value="1-<?php echo $objResult01['id_catagory'] ?>" <?php echo $selected; ?> <?=$disabled;?>>&nbsp; <?php echo $objResult01['name_catagory_th']?></option>
												
													<?php 
													 $strSQL2 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '2' AND `group_sub` = '".$objResult01['id_catagory']."' AND `delete_datetime` IS null";
													 $objQuery2 = $db->Query($strSQL2);

													 while ($objResult2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)) {
													?>
														<option value="2-<?php echo $objResult2['id_catagory'] ?>">&nbsp;&nbsp;- <?php echo $objResult2['name_catagory_th'] ?></option>

													<?php } ?>
												
												  <?php } ?>
												<?php } ?>
												
												<?php if($level == '3') { ?>
												
                                          		<option value="0">-- หมวดหมู่หลัก --</option>
												
												<?php 
												 $strSQL01 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '1' AND `delete_datetime` IS null";
    											 $objQuery01 = $db->Query($strSQL01);
	 
	 											 while ($objResult01 = mysqli_fetch_array($objQuery01, MYSQLI_ASSOC)) {
												?>
												<option value="1-<?php echo $objResult01['id_catagory'] ?>">&nbsp; <?php echo $objResult01['name_catagory_th'] ?></option>
												
													<?php 
													
													 $strSQL2 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '2' AND `group_sub` = '".$objResult01['id_catagory']."' AND `delete_datetime` IS null";
													 $objQuery2 = $db->Query($strSQL2);

													 while ($objResult2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)) {
														 	 
													?>
												
													<?php
														 $group_sub = $objResult['group_sub'];
														 if($objResult2['id_catagory'] == $group_sub)
														 {
															 $selected2 = 'selected';
															 $disabled = '';
														 }
														 else
														 {
															 $selected2 = '';
															 $disabled = '';
														 }
													?>
												
														<option value="2-<?php echo $objResult2['id_catagory'] ?>" <?php echo $selected2 ?> <?=$disabled;?>>&nbsp;&nbsp;- <?php echo $objResult2['name_catagory_th'];?></option>

													<?php } ?>
												
												  <?php } ?>
												<?php } ?>
												
												
										  	</select>
										  
                                      </div>
                               	</div>
                            </div>
                        </div>
                    </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">

                <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><i class="fa fa-times" aria-hidden="true"></i> ปิด</button>
				
				<button   type="button" class="btn btn-success  btnSendAdd" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>  

              </div>  
            </form>
          </div>
        </div>
      </div>

<?php
}


function select_table_front_manage()
{
    $db = new DB();
    $button_update  = $_POST["button_update"];
    $button_delete  = $_POST["button_delete"];
    $button_create   = $_POST["button_create"];
    $button_view   = $_POST["button_view"];

    $strSQL = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `delete_datetime` IS null ORDER BY 'group_sub','order' ASC";
    $objQuery = $db->Query($strSQL); ?>
	<table class="table" id="table_front_manage" width="100%">
		<thead>
			<th >
				<input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label>
			</th>
			<th >ลำดับ</th>
			<th >หมวดหมู่</th>
			<th >จัดการ</th>
		</thead>
		<tbody>
<?php
    $num=0;
    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        $num++; ?>
			<tr class="show-tr">
				<td width="5%">
					<input type="checkbox" name="Chk[]" id="Chk<?php echo $num ?>" value="<?php echo $objResult['id_catagory'] ?>" class="checkbox_remove filled-in chk-col-light-blue" /><label for="Chk<?php echo $num ?>"></label>


				</td>
				<td width="10%">
					<input onchange="order_chanhe(<?php echo $num ?>)" class="form-control" type="number" name="order" id="order<?php echo $num ?>" value="<?php echo  $objResult['order'] ?>">
					<input  class="form-control" type="hidden" name="id" id="id<?php echo $num ?>" value="<?php echo  $objResult['id_catagory'] ?>"><font style="display: none;"><?php echo  $objResult['order'] ?></font>
				</td>
				<td>
					<?php
						if($objResult["level"] == '1'){
							echo $objResult["name_catagory_th"];
						}
						else if ($objResult["level"] == '2'){
							echo '<i class="fa fa-level-up" aria-hidden="true"></i> '.$objResult["name_catagory_th"];
						}
						else if ($objResult["level"] == '3'){
							echo '&nbsp;&nbsp;<i class="fa fa-level-up" aria-hidden="true"></i> '.$objResult["name_catagory_th"];
						}
					?>
				</td>
				<td>
					<a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id_catagory'] ?>" ><i class="fa fa-edit" style="color: white;"></i></a>

					

          <button type="button" class="btn btn-danger  btn-sm delete_btn" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_catagory'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
				</td>
			</tr>
<?php
    } ?>			
		</tbody>
	</table>
	<input type="hidden" name="hdnCount" value="<?php echo $num ?>">
<?php
}

?>
<script>
	 $(".select2").select2({
      width : '100%'
    });
</script>