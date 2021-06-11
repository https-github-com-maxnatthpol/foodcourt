<?php include('../template/header.php'); ?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php require_once('../template/menu.php'); ?>
<!-- ============================================================== -->

<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>

<style>
  .page-titles {
    background: #ffffff;
    margin: 0 -30px 15px;
    padding: 5px 15px 5px 15px;
    -webkit-box-shadow: 1px 0 5px rgb(0 0 0 / 10%);
    box-shadow: 1px 0 5px rgb(0 0 0 / 10%);
  }
</style>
<!--alerts CSS -->

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
        <h3 class="text-themecolor m-b-0 m-t-0">รายการชำระค่าอาหาร (เงินสด)</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
          <li class="breadcrumb-item active">รายการชำระค่าอาหาร (เงินสด)</li>
        </ol>
      </div>
    </div>
    <div class="">
      <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>

    <div class="row">

      <div class="col-md-7 col-lg-7 col-sm-12">
        <div class="ribbon-wrapper card">
          <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-credit-card-scan"></i> รายการอาหาร</div>


          <div class="row el-element-overlay">
            <div class="col-lg-3 col-md-6">
              <div class="card" onclick="addToCart(2,'ชาไทย')">
                <div class="el-card-item">
                  <div class="el-card-avatar el-overlay-1"> <img src="1.jpg" alt="user">
                    <div class="el-overlay">

                    </div>
                  </div>
                  <div class="el-card-content">
                    <h3 class="box-title">ชาไทย</h3> <small>55 บาท</small>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="el-card-item">
                  <div class="el-card-avatar el-overlay-1"> <img src="1.jpg" alt="user">
                    <div class="el-overlay">
                      <ul class="el-info">
                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
                        <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content">
                    <h3 class="box-title">Genelia Deshmukh</h3> <small>Managing Director</small>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="el-card-item">
                  <div class="el-card-avatar el-overlay-1"> <img src="1.jpg" alt="user">
                    <div class="el-overlay">
                      <ul class="el-info">
                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
                        <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content">
                    <h3 class="box-title">Genelia Deshmukh</h3> <small>Managing Director</small>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="el-card-item">
                  <div class="el-card-avatar el-overlay-1"> <img src="1.jpg" alt="user">
                    <div class="el-overlay">
                      <ul class="el-info">
                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
                        <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="el-card-content">
                    <h3 class="box-title">Genelia Deshmukh</h3> <small>Managing Director</small>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="col-md-5 col-lg-5 col-sm-12">
        <div class="ribbon-wrapper card">
          <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-credit-card-scan"></i> รายการชำระเงิน</div>

          <div class="table-responsive">
            <table class="table cart">
              <thead>
                <tr>
                  <th>#</th>
                  <th>รายการ</th>
                  <th>จำนวน</th>
                  <th>ราคา</th>
                  <th>ลบ</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>จำนวน <span class="cart_number"> 0 </span>รายการ</th>
              </tr>
              <tr>
                <th>รวมเป็นเงิน <span class="cart_number"> 0 </span>บาท</th>
              </tr>
            </table>
          </div>

          <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bootstrap TouchSpin</h4>
                                <h6 class="card-subtitle">Use the <code> data-plugin="touchSpin" </code> to create a Bootstrap style spinner.</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form class="p-r-20">
                                            <div class="form-group">
                                                <label class="control-label">Vertical Touchspin</label>
                                                <div class="input-group bootstrap-touchspin"><input class="vertical-spin form-control" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="" name="vertical-spin" style="display: block;"><div class="input-group-append bootstrap-touchspin-postfix" style="display: none;"></div><span class="input-group-btn-vertical"><button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button"><i class="ti-plus"></i></button><button class="btn btn-secondary btn-outline bootstrap-touchspin-down" type="button"><i class="ti-minus"></i></button></span></div> </div>
                                            <div class="form-group">
                                                <label class="control-label">Postfix</label>
                                                <div class="input-group bootstrap-touchspin"><div class="input-group-prepend"><button class="btn btn-secondary btn-outline bootstrap-touchspin-down" type="button">-</button></div><div class="input-group-prepend bootstrap-touchspin-prefix" style="display: none;"><span class="input-group-text"></span></div><input id="tch1" type="text" value="55" name="tch1" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" class="form-control" style="display: block;"><div class="input-group-append bootstrap-touchspin-postfix"><span class="input-group-text">%</span></div><div class="input-group-append"><button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button">+</button></div></div> </div>
                                            <div class="form-group m-b-0">
                                                <label class="control-label">Prefix</label>
                                                <div class="input-group bootstrap-touchspin"><div class="input-group-prepend"><button class="btn btn-secondary btn-outline bootstrap-touchspin-down" type="button">-</button></div><div class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text">$</span></div><input id="tch2" type="text" value="0" name="tch2" class="form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" style="display: block;"><div class="input-group-append bootstrap-touchspin-postfix" style="display: none;"><span class="input-group-text"></span></div><div class="input-group-append"><button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button">+</button></div></div> </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <form>
                                            <div class="form-group">
                                                <label class="control-label">Init </label>
                                                <div class="input-group bootstrap-touchspin"><div class="input-group-prepend"><button class="btn btn-secondary btn-outline bootstrap-touchspin-down" type="button">-</button></div><div class="input-group-prepend bootstrap-touchspin-prefix" style="display: none;"><span class="input-group-text"></span></div><input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" class="form-control" style="display: block;"><div class="input-group-append bootstrap-touchspin-postfix" style="display: none;"><span class="input-group-text"></span></div><div class="input-group-append"><button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button">+</button></div></div> </div>
                                            <div class="form-group">
                                                <label class="control-label">Value set 30 </label>
                                                <div class="input-group bootstrap-touchspin"><div class="input-group-prepend"><button class="btn btn-secondary btn-outline bootstrap-touchspin-down" type="button">-</button></div><div class="input-group-prepend bootstrap-touchspin-prefix" style="display: none;"><span class="input-group-text"></span></div><input id="tch3_22" type="text" value="30" name="tch3_22" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" class="form-control" style="display: block;"><div class="input-group-append bootstrap-touchspin-postfix" style="display: none;"><span class="input-group-text"></span></div><div class="input-group-append"><button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button">+</button></div></div> </div>
                                            <div class="form-group m-b-0">
                                                <label class="control-label">Button group</label>
                                                <div class="input-group bootstrap-touchspin">
                                                    <div class="input-group-prepend"><button class="btn btn-secondary btn-outline bootstrap-touchspin-down" type="button">-</button></div><div class="input-group-prepend bootstrap-touchspin-prefix"><span class="input-group-text">pre</span></div><input id="tch5" type="text" class="form-control" name="tch5" value="50" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" style="display: block;"><div class="input-group-append bootstrap-touchspin-postfix"><span class="input-group-text">post</span></div>
                                                    <div class="input-group-btn"><button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button">+</button>
                                                        <button type="button" class="btn btn-secondary btn-outline dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
                                                        <div class="dropdown-menu"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="#">Separated link</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
      </div>

    </div>

    <script>
      var cart = $(".cart");
      var cart_number = $(".cart_number");

      function addToCart(id, text) {

        var html = '<tr id="item' + id + '"><td>' + ($(".cart tr").length) + '</td><td>' + id + text + '</td><td>1</td><td>50</td><td><a onClick="removeFromCart(' + id + ')"><span class="label label-danger">ลบ</span></a></td></tr>';
        cart.append(html);
        cart_number.text($(".cart tr").length - 1);
      }

      function removeFromCart(index) {
        $("#item" + index).remove();
        cart_number.text($(".cart tr").length - 1);
      }
    </script>


  </div>
</div>
<!-- End PAge Content -->

<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
<input type="hidden" name="per_input_approval" id="per_input_approval" value="<?php echo $button_approval ?>">
<?php include('../template/footer.php'); ?>
<script type="text/javascript" src="js/javascript.js"></script>
<script src="../../plugins_b/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>