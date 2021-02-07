div_table_list_course();
function div_table_list_course() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var button_approval = $("#per_input_approval").val();
  var id_course = $("#id_courese").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_table_list_course",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      button_approval:button_approval
    },
    success: function(data) {
      $("#div_table_list_course").html(data);
      $("#table_list_course").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[0, "asc"]]
      });
    }
  });
}

function div_reviwe() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_course = $("#id_courese").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_reviwe",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_course: id_course
    },
    success: function(data) {
      $("#reviwe_div").html(data);
      $(".slimtest1").slimScroll({
        height: "150px"
      });
    }
  });
}

function AVG_score() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_course = $("#id_courese").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "AVG_score",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_course: id_course
    },
    success: function(data) {
      $("#AVG_score_div").html(data);
    }
  });
}

function div_reviwe_group() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_course = $("#id_courese").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_reviwe_group",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_course: id_course
    },
    success: function(data) {
      $("#div_reviwe_group").html(data);
    }
  });
}

$(document).on("click", ".btn_del_reviwe", function() {
  id = $(this).attr("data-id");
  form = "btn_del_reviwe";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
              div_reviwe();
              AVG_score();
              div_reviwe_group();
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".pagination_link", function() {
  var page = $(this).attr("id");
  var name_f = $(this).attr("data-n-fast");
  var name = $(this).attr("data-n");
  var code = $(this).attr("data-c");
  var surname = $(this).attr("data-surname");
  var posi_em = $(this).attr("data-posi");
  var code_id = $(this).attr("data-codeid");
  var date = $(this).attr("data-d");
  var sort = $(this).attr("data-sort");

  fetch_data_reviwe(
    page,
    name_f,
    name,
    code,
    surname,
    posi_em,
    code_id,
    date,
    sort
  );
});
function fetch_data_reviwe(
  page,
  name_f,
  name,
  code,
  surname,
  posi_em,
  code_id,
  date,
  sort
) {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_course = $("#id_courese").val();
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_reviwe",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_course: id_course,
      page: page,
      name: name_f,
      name_em: name,
      sur_em: surname,
      code_id_em: code,
      birthday: date,
      posi_em: posi_em,
      sort: sort
    },
    success: function(data) {
      $("#reviwe_div").html(data);
      $(".slimtest1").slimScroll({
        height: "150px"
      });
    }
  });
}
$(document).on("click", "#btn_search", function() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_course = $("#id_courese").val();

  var id_partner = $("#id_partner").val();
  var id_category = $("#id_category").val();
  var search_key = $("#search_key").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_table_list_course",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_partner: id_partner,
      id_category: id_category,
      search_key: search_key
    },
    success: function(data) {
      $("#div_table_list_course").html(data);
      $("#table_list_course").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[0, "asc"]]
      });
    }
  });
});

fetch_data_table();
function fetch_data_table() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_course = $("#id_courese").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "select_table_class_schedule",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_course: id_course
    },
    success: function(data) {
      $("#div_table_list").html(data);
      $("#table_front_manage").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[1, "asc"]]
      });
    }
  });
}

function fetch_data_table_course_quiz() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_course = $("#id_courese").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "select_table_course_quiz",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_course: id_course
    },
    success: function(data) {
      $("#div_table_list_course_quiz").html(data);
      $("#table_course_quiz").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[1, "asc"]]
      });
    }
  });
}

fetch_pang_front_courese_manage();
function fetch_pang_front_courese_manage() {
  var id_courese = $("#id_courese").val();
  if (id_courese != "") {
    $("#btnSendedit_detail").show();
    $("#btnSendAdd_detail").hide();

    $.ajax({
      url: "select_data.php",
      method: "POST",
      data: {
        form: "fetch_pang_front_courese_manage",
        id_course: id_courese
      },
      success: function(data) {
        $("#name_th").val(data.name_th);
        $("#name_en").val(data.name_en);
        $("#describe_th").val(data.describe_th);
        $("#describe_en").val(data.describe_en);

        // $('#description_th').val(data.description_th);
        // $('#description_en').val(data.description_en);
        $text = "";
        $text += '<label for="example-email">คำอธิบายราายวิชา </label>';
        $text +=
          '<textarea rows="5" class="edit" style="overflow-y: auto;"  id="description_th" name="description_th">';
        $text += "" + data.description_th;
        $text += "</textarea>    ";
        document.getElementById("editor").innerHTML = $text;

        $text = "";
        $text += '<label for="example-email">คำอธิบายราายวิชา </label>';
        $text +=
          ' <textarea class="edit"   style="margin-top: 20px;max-height: 250px; overflow-y: auto;"  id="description_en" name="description_en">';
        $text += "" + data.description_en;
        $text += "</textarea>    ";
        document.getElementById("editor_en").innerHTML = $text;
        $(".edit").froalaEditor();

        $("#tag_title_th").val(data.tag_title_th);
        $("#tag_title_en").val(data.tag_title_en);
        $("#tag_description_th").val(data.tag_description_th);
        $("#tag_description_en").val(data.tag_description_en);

        $("#id_category").val(data.id_category);
        $("#id_category")
          .select2()
          .trigger("change");

        $("#id_tutor").val(data.id_tutor);
        $("#id_tutor")
          .select2()
          .trigger("change");

        $("#id_partner").val(data.id_partner);
        $("#id_partner")
          .select2()
          .trigger("change");

        $("#age").val(data.age);
        $("#age_unit").val(data.age_unit);
        $("#age_unit").select2().trigger("change");
        $("#price").val(data.price);
        $("#pay_rate").val(data.pay_rate);

        $("#assess_flg").val(data.assess_flg);
        if (data.assess_flg == "1") {
          document.getElementById("assess_flg").checked = true;
        }

        $("#assess_rate").val(data.assess_rate);
        document.getElementById("div_assess_rate").innerHTML =
          '<input type="range" name="assess_rate" id="assess_rate" value="' +
          data.assess_rate +
          '">';
        $("#assess_rate").ionRangeSlider({
          grid: true,
          min: 0,
          max: 100,
          postfix: "%"
        });

        $("#suggest_flg").val(data.suggest_flg);
        if (data.suggest_flg == "1") {
          document.getElementById("div_suggest_flg").innerHTML =
            '<input checked name="suggest_flg" id="suggest_flg" value="1" type="checkbox"  data-off-color="danger" data-on-color="success" data-off-text="<i class=' +
            "'mdi mdi-close'" +
            '></i>" data-on-text="<i class=' +
            "'mdi mdi-check'" +
            '></i>"> ';
          $(
            ".bt-switch input[type='checkbox'], .bt-switch input[type='radio']"
          ).bootstrapSwitch();
        }

        $("#popular_flg").val(data.popular_flg);
        if (data.popular_flg == "1") {
          document.getElementById("div_popular_flg").innerHTML =
            '<input checked name="popular_flg" id="popular_flg" value="1" type="checkbox"  data-off-color="danger" data-on-color="success" checked data-off-text="<i class=' +
            "'mdi mdi-close'" +
            '></i>" data-on-text="<i class=' +
            "'mdi mdi-check'" +
            '></i>"> ';
          $(
            ".bt-switch input[type='checkbox'], .bt-switch input[type='radio']"
          ).bootstrapSwitch();
        }

        $("#start_date").val(data.start_date);
        $("#end_date").val(data.end_date);
        $("#study_time").val(data.study_time);
        $("#study_rate").val(data.study_rate);
        $("#quiz_min").val(data.quiz_min);
        $("#quiz_rate").val(data.quiz_rate);

        $("#order_lesson_flg").val(data.order_lesson_flg);
        if (data.order_lesson_flg == "1") {
          document.getElementById("order_lesson_flg").checked = true;
        }

        $("#id_certificate").val(data.id_certificate);
        $("#id_certificate").select2();

        directory_name_img =
          'data-default-file="' + data.directory + data.name_img + '"';
        document.getElementById("div_img").innerHTML =
          '<input accept="image/*" type="file" id="name_img" class="dropify" name="name_img" ' +
          directory_name_img +
          " />";
        $(".dropify").dropify({
          messages: {
            default: "Drag and drop a file here or click",
            replace: "Drag and drop or click to replace",
            remove: "Remove",
            error: "Ooops, something wrong happended."
          },
          tpl: {
            message:
              '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>'
          }
        });

        // Used events
        var drEvent = $("#input-file-events").dropify();

        drEvent.on("dropify.beforeClear", function(event, element) {
          return confirm(
            'Do you really want to delete "' + element.file.name + '" ?'
          );
        });

        drEvent.on("dropify.afterClear", function(event, element) {
          alert("File deleted");
        });

        drEvent.on("dropify.errors", function(event, element) {
          console.log("Has Errors");
        });

        var drDestroy = $("#input-file-to-destroy").dropify();
        drDestroy = drDestroy.data("dropify");
        $("#toggleDropify").on("click", function(e) {
          e.preventDefault();
          if (drDestroy.isDropified()) {
            drDestroy.destroy();
          } else {
            drDestroy.init();
          }
        });

        document.getElementById("div_img_ed").innerHTML =
          '<input type="hidden" name="directory_ed" value="' +
          data.directory +
          '"> <input type="hidden" name="name_img_ed" value="' +
          data.name_img +
          '"> <input type="hidden" name="id_img_ed" value="' +
          data.id_image +
          '">';

        $(".daterange").daterangepicker({
          showDropdowns: true,
          locale: {
            format: "DD/MM/YYYY"
          },
          startDate: data.start_date,
          endDate: data.end_date
        });

        disabled_btn_add_detail();
        fetch_data_table();
      }
    });
  }
}

$(document).on("click", ".edit_btn", function() {
  form = "select_div_edit_front_manage";
  id = $(this).attr("data-id");
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: form,
      id: id
    },
    success: function(data) {
      $("#div_edit").html(data);
      $("#id_certificate").select2();
    }
  });
});

$(document).on("click", ".address_btn", function() {
  form = "select_div_address";
  id = $(this).attr("data-id");
  name = $(this).attr("data1-id");
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: form,
      id: id,
      name: name
    },
    success: function(data) {
      $("#div_address").html(data);
    }
  });
});

$(document).on("click", "#MultiDeleteclass_schedule", function() {
  var formData = new FormData($("#frmMain_class_schedule")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("frmMain_class_schedule").reset();
              $(".num_class_schedule_").html("");
              $("#MultiDeleteclass_schedule").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".delete_btn", function() {
  id = $(this).attr("data-id");
  form = "del_one";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
              fetch_data_table();
              $(".num_class_schedule_").html("");
              $("#MultiDeleteclass_schedule").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".checkbox_remove", function() {
  var i = 0;
  if ($(this).is(":checked")) {
    $(this)
      .parents(".show-tr")
      .addClass("remove-item");
    $("#MultiDeleteclass_schedule").prop("disabled", false);
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_class_schedule_").html("[ " + i + " ]");
  } else {
    $(this)
      .parents(".show-tr")
      .removeClass("remove-item");
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_class_schedule_").html("[ " + i + " ]");
    if ($("input.checkbox_remove").is(":checked")) {
    } else {
      $("#MultiDeleteclass_schedule").prop("disabled", true);
    }
  }
});





function ClickCheckAll(vol) {
  var i = 1;
  var num = 0;
  for (i = 1; i <= document.frmMain_class_schedule.hdnCount.value; i++) {
    Chk_content = document.getElementById("Chk_content"+i);
if (Chk_content != null) {
      num++;
    $(".num_class_schedule_").html("[ " + num + " ]");
    if (vol.checked == true) {
      eval("document.frmMain_class_schedule.Chk" + i + ".checked=true");
      $(".show-tr").addClass("remove-item");
      $("#MultiDeleteclass_schedule").prop("disabled", false);
    } else {
      $(".num_class_schedule_").html("");
      eval("document.frmMain_class_schedule.Chk" + i + ".checked=false");
      $("#MultiDeleteclass_schedule").prop("disabled", true);
      $(".show-tr").removeClass("remove-item");
    }
  }}
}

$(document).on("click", "#btnSendedit_detail", function() {
  var formData = new FormData($("#form_add_detail")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการแก้ไขหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "แก้ไขเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table();
                  document.getElementById("form_add_detail").reset();
                  var tagButton = document.getElementsByClassName(
                    "dropify-clear"
                  )[0];
                  tagButton.click();
                  disabled_btn_add_detail();
                  $("#id_course").val(data.id_course);
                  window.location.href =
                    "front_courese_manage.php?id_course=" + data.id_course;
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", "#btnSendAdd_detail", function() {
  id_certificate = $("#id_certificate").val();
  if (id_certificate == '0') {
    swal.fire("คำเตือน", "กรุณาเลือก 'รูปแบบใบรับรอง' ", "warning");
    document.getElementById("lable_id_certificate").style.color = "red";
    document.getElementById("lable_id_certificate").focus();
    return false
  }else{
    document.getElementById("lable_id_certificate").style = "none";
  }
  var formData = new FormData($("#form_add_detail")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "บันทึกสำเร็จ ",
                  text: "คุณต้องการเพิ่มเนื้อหา / ข้อสอบของคอร์ส ?",
                  icon: "success",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, แก้ไขรายการ!",
                  cancelButtonText: "No, เพิ่มคอร์ส!"
                })
                .then(result => {
                  if (result.value) {
                    fetch_data_table();
                    document.getElementById("form_add_detail").reset();
                    var tagButton = document.getElementsByClassName(
                      "dropify-clear"
                    )[0];
                    tagButton.click();
                    disabled_btn_add_detail();
                    $("#id_course").val(data.id_course);
                    window.location.href =
                      "front_courese_manage.php?id_course=" + data.id_course;
                  } else {
                    window.location.href = "front_courese_manage.php";
                  }
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", "#btnSendEdit", function() {
  var name = $("#name_edit").val();
  var rate = $("#rate_edit").val();
  const isValidid_cade = id_cade_edit.checkValidity();
  const isValidEmail = e_mail_edit.checkValidity();
  const isValidtelaphone = telaphone_edit.checkValidity();

  if (
    name == "" ||
    rate == "" ||
    !isValidid_cade ||
    !isValidEmail ||
    !isValidtelaphone
  ) {
    if (name == "") {
      $("#name_edit").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#name_edit").attr("style", "");
    }

    if (rate == "") {
      $("#rate").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#rate").attr("style", "");
    }

    if (isValidid_cade) {
      $("#id_cade_edit").attr("style", "");
    } else {
      $("#id_cade_edit").attr("style", "border-color: red; border-width: 1px;");
    }

    if (isValidEmail) {
      $("#e_mail_edit").attr("style", "");
    } else {
      $("#e_mail_edit").attr("style", "border-color: red; border-width: 1px;");
    }

    if (isValidtelaphone) {
      $("#telaphone_edit").attr("style", "");
    } else {
      $("#telaphone_edit").attr(
        "style",
        "border-color: red; border-width: 1px;"
      );
    }

    swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน", "warning");
    return false;
  } else {
    $("#name_edit").attr("style", "");
    $("#id_cade_edit").attr("style", "");
    $("#e_mail_edit").attr("style", "");
    $("#telaphone_edit").attr("style", "");
  }
  var formData = new FormData($("#form_edit")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการแก้ไขหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("form_edit").reset();
              $("#modal_edit").modal("toggle");
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

function disabled_btn_add_detail() {
  var name_th = $("#name_th").val();
  var id_courese = $("#id_courese").val();
  if (id_courese == "") {
    btnSendAdd = "btnSendAdd_detail";
  } else {
    btnSendAdd = "btnSendedit_detail";
  }

  if (name_th == "") {
    document.getElementById(btnSendAdd).disabled = true;
  } else {
    document.getElementById(btnSendAdd).disabled = false;
  }
}

function disabled_btn_add_class_schedule() {
  var name_th = $("#lesson_name_th").val();
  var id_lesson = $("#id_lesson").val();

  if (id_lesson == "") {
    name_btn = "btnSendAdd_class_schedule";
  } else {
    name_btn = "btnSendedit_class_schedule";
  }

  if (name_th == "") {
    document.getElementById("" + name_btn).disabled = true;
  } else {
    document.getElementById("" + name_btn).disabled = false;
  }
}

function disabled_btn_add_content() {
  var name_th = $("#content_name_th").val();
  var id_subject = $("#id_subject").val();

  if (id_subject == "") {
    name_btn = "btnSendAdd_content";
  } else {
    name_btn = "btnSendedit_content";
  }

  if (name_th == "") {
    document.getElementById("" + name_btn).disabled = true;
  } else {
    document.getElementById("" + name_btn).disabled = false;
  }
}

function disabled_btn_edit() {
  var account_name_th = $("#account_name_th_edit").val();
  var name_th = $("#name_th_edit").val();
  var account_number_th = $("#account_number_th_edit").val();

  if (account_name_th == "" || name_th == "" || account_number_th == "") {
    document.getElementById("btnSendEdit").disabled = true;
  } else {
    document.getElementById("btnSendEdit").disabled = false;
  }
}

$("#modal_add_content").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  $("#id_subject").val('');
  $('#div_iframe').html('');
  $("#content_link_video").attr("style", "");
  $("#content_link_document").attr("style", "");
  var tagButton = document.getElementsByClassName("dropify-clear")[1];
  tagButton.click();
  document.getElementById("form_add_content").reset();
  document.getElementById("btnSendAdd_content").disabled = true;

  document.getElementById("h3_add_content").style.display = "";
  document.getElementById("btnSendAdd_content").style.display = "";

  document.getElementById("h3_edit_content").style.display = "none";
  document.getElementById("btnSendedit_content").style.display = "none";
});

$("#modal_add_class_schedule").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  document.getElementById("form_add_class_schedule").reset();
  document.getElementById("btnSendAdd_class_schedule").disabled = true;

  document.getElementById("h3_add_class_schedule").style.display = "";
  document.getElementById("btnSendAdd_class_schedule").style.display = "";

  document.getElementById("h3_edit_class_schedule").style.display = "none";
  document.getElementById("btnSendedit_class_schedule").style.display = "none";
});

$("#modal_edit").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  $("#name_edit").attr("style", "");
  $("#id_cade_edit").attr("style", "");
  $("#e_mail_edit").attr("style", "");
  $("#telaphone_edit").attr("style", "");
});

$("#modal_add").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  $("#name").attr("style", "");
  $("#id_cade").attr("style", "");
  $("#e_mail").attr("style", "");
  $("#telaphone").attr("style", "");
});

$("#modal_address").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
});

function check_num(ele) {
  var vchar = String.fromCharCode(event.keyCode);
  if (vchar < "0" || vchar > "9") return false;
  ele.onKeyPress = vchar;
}

function isNumber(ele) {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar < "0" || vchar > "9") && vchar != ".") return false;
  ele.onKeyPress = vchar;
}

function check_format(data) {
  var data_val = $("#" + data).val();

  if (data == "id_cade") {
    if (data_val.length == 1) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 6) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 10) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 12) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 14) {
      $("#" + data).val(data_val + "-");
    }
  } else if (data == "telaphone") {
    if (data_val.length == 3) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 8) {
      $("#" + data).val(data_val + "-");
    }
  } else if (data == "id_cade_edit") {
    if (data_val.length == 1) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 6) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 10) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 12) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 14) {
      $("#" + data).val(data_val + "-");
    }
  } else if (data == "telaphone_edit") {
    if (data_val.length == 3) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 8) {
      $("#" + data).val(data_val + "-");
    }
  }
}

$(document).on("click", "#btnSendaddress", function() {
  var formData = new FormData($("#form_address")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
              document.getElementById("form_address").reset();
              $("#modal_address").modal("toggle");
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

function check_email(val) {
  if (val == "add") {
    id_partner = "";
    var e_mail = $("#e_mail").val();
  } else {
    id_partner = val;
    var e_mail = $("#e_mail_edit").val();
  }

  $.ajax({
    url: "functions.php",
    method: "POST",
    data: {
      e_mail: e_mail,
      form: "check_email",
      id_partner: id_partner
    },
    success: function(data) {
      if (data.status == "0") {
        if (val == "add") {
          $("#e_mail").attr("style", "");
          $("#warning_email").hide();
        } else {
          $("#e_mail_edit").attr("style", "");
          $("#warning_email_edit").hide();
        }
      } else {
        if (val == "add") {
          $("#warning_email").show();
          $("#e_mail").attr("style", "border-color: red; border-width: 1px;");
        } else {
          $("#warning_email_edit").show();
          $("#e_mail_edit").attr(
            "style",
            "border-color: red; border-width: 1px;"
          );
        }
      }
    }
  }).fail(function(data) {
    // คือไม่สำรเ็จ
    swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
  });
}

function ckeck_munbermax(id_input) {
  var id_input_rate = $("#" + id_input).val();
  if (id_input_rate > 100) {
    $("#" + id_input).val("");
    $("#" + id_input).focus();
  }
}

$(document).on("click", ".tab_2_3", function() {
  var id_course = $("#id_courese").val();
  if (id_course == "") {
    swal.fire("คำเตือน", "กรุณาบันทึกรายละเอียดก่อน", "warning");

    $(".tab_2_3").removeClass("active");
    $("#content").removeClass("active");
    $("#opinion").removeClass("active");
    $("#examination").removeClass("active");
    $("#btn_detail").addClass("active");
    $("#detail").addClass("active");
  } else {
    fetch_data_table();
    fetch_data_table_course_quiz();
  }
});

$(document).on("click", "#btnSendAdd_class_schedule", function() {
  var formData = new FormData($("#form_add_class_schedule")[0]);
  var id_course = $("#id_courese").val();

  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_course=" + id_course,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table();
                  $("#head_english_class_schedule").removeClass("active");
                  $("#head_thai_class_schedule").addClass("active");
                  $("#english_class_schedule").removeClass("active");
                  $("#thai_class_schedule").addClass("active");
                  $("#modal_add_class_schedule").modal("toggle");
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", "#btnSendedit_class_schedule", function() {
  var formData = new FormData($("#form_add_class_schedule")[0]);
  var id_course = $("#id_courese").val();

  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการแก้ไขหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_course=" + id_course,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกการแก้ไขเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table();
                  $("#head_english_class_schedule").removeClass("active");
                  $("#head_thai_class_schedule").addClass("active");
                  $("#english_class_schedule").removeClass("active");
                  $("#thai_class_schedule").addClass("active");
                  $("#modal_add_class_schedule").modal("toggle");

                  document.getElementById(
                    "h3_add_class_schedule"
                  ).style.display = "";
                  document.getElementById(
                    "btnSendAdd_class_schedule"
                  ).style.display = "";

                  document.getElementById(
                    "h3_edit_class_schedule"
                  ).style.display = "none";
                  document.getElementById(
                    "btnSendedit_class_schedule"
                  ).style.display = "none";
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".edit_btn_class_schedule", function() {
  var id_lesson = $(this).attr("data-id");
  var name_th = $(this).attr("data1-id");
  var name_en = $(this).attr("data2-id");

  $("#id_lesson").val(id_lesson);
  $("#lesson_name_th").val(name_th);
  $("#lesson_name_en").val(name_en);

  document.getElementById("h3_add_class_schedule").style.display = "none";
  document.getElementById("btnSendAdd_class_schedule").style.display = "none";

  document.getElementById("h3_edit_class_schedule").style.display = "";
  document.getElementById("btnSendedit_class_schedule").style.display = "";

  disabled_btn_add_class_schedule();
  $("#modal_add_class_schedule").modal("show");
});

function order_chanhe(num) {
  var order = $("#order" + num).val();
  var id = $("#id" + num).val();
  var form = "order_chanhe";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการเปลี่ยนลำดับหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "functions.php?order=" + order + "&&id=" + id + "&&form=" + form,
          data: {},
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
              fetch_data_table();
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
}

$(document).on("click", ".lesson_content_btn", function() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_lesson = $(this).attr("data-id");
  var name_th = $(this).attr("data1-id");
  $("#id_lesson_content").val(id_lesson);
  $("#head_list_content").html("(บทเรียน : " + name_th + " )");
  document.getElementById("add_btn_content").style = "";

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_table_list_content",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_lesson: id_lesson,
      name_th: name_th
    },
    success: function(data) {
      $("#div_table_list_content").html(data);
      $("#table_list_content").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[1, "asc"]]
      });
    }
  });
});

function fetch_data_table_countent(id_lesson) {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_table_list_content",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_lesson: id_lesson
    },
    success: function(data) {
      $("#div_table_list_content").html(data);
      $("#table_list_content").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[1, "asc"]]
      });
    }
  });
}

$(document).on("click", "#btnSendAdd_content", function() {
  if_iframe()
 
});


$(document).on("click", "#btnSendedit_content", function() {
  if_iframe()
  
});

function order_chanhe_content(num) {
  var id_lesson = $("#id_lesson_content").val();
  var order = $("#order_content" + num).val();
  var id = $("#id_content" + num).val();
  var form = "order_chanhe_content";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการเปลี่ยนลำดับหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "functions.php?order=" + order + "&&id=" + id + "&&form=" + form,
          data: {},
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
              fetch_data_table_countent(id_lesson);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
}

$(document).on("click", ".edit_btn_content", function() {

  var id_subject = $(this).attr("data-id");
  var name_th = $(this).attr("data1-id");
  var name_en = $(this).attr("data2-id");

  var link_video = $(this).attr("data3-id");
  var link_reference = $(this).attr("data4-id");
  var name_img = $(this).attr("data5-id");
  var directory = $(this).attr("data6-id");
  var id_image = $(this).attr("data7-id");
  var total_time = $(this).attr("data8-id");

  $("#id_subject").val(id_subject);
  $("#content_name_th").val(name_th);
  $("#content_name_en").val(name_en);
  $("#content_link_video").val(link_video);
  $("#content_link_document").val(link_reference);
  $("#duration_input").val(total_time);
change_link()
  if (name_img != "") {
    directory_name_img = 'data-default-file="' + directory + name_img + '"';
    document.getElementById("div_img_content").innerHTML =
      "<input " +
      directory_name_img +
      ' accept="image/*,application/pdf,application/x-pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/pdf,video/*" type="file" id="file_content" class="dropify" name="file_content" />';
    $(".dropify").dropify({
      messages: {
        default: "Drag and drop a file here or click",
        replace: "Drag and drop or click to replace",
        remove: "Remove",
        error: "Ooops, something wrong happended."
      },
      tpl: {
        message:
          '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>'
      }
    });

    // Used events
    var drEvent = $("#input-file-events").dropify();

    drEvent.on("dropify.beforeClear", function(event, element) {
      return confirm(
        'Do you really want to delete "' + element.file.name + '" ?'
      );
    });

    drEvent.on("dropify.afterClear", function(event, element) {
      alert("File deleted");
    });

    drEvent.on("dropify.errors", function(event, element) {
      console.log("Has Errors");
    });

    var drDestroy = $("#input-file-to-destroy").dropify();
    drDestroy = drDestroy.data("dropify");
    $("#toggleDropify").on("click", function(e) {
      e.preventDefault();
      if (drDestroy.isDropified()) {
        drDestroy.destroy();
      } else {
        drDestroy.init();
      }
    });
  }
  document.getElementById("div_img_ed_content").innerHTML =
    '<input type="hidden" name="directory_ed_content" value="' +
    directory +
    '"> <input type="hidden" name="name_img_ed_content" value="' +
    name_img +
    '"> <input type="hidden" name="id_img_ed_content" value="' +
    id_image +
    '">';

  document.getElementById("h3_add_content").style.display = "none";
  document.getElementById("btnSendAdd_content").style.display = "none";

  document.getElementById("h3_edit_content").style.display = "";
  document.getElementById("btnSendedit_content").style.display = "";

  disabled_btn_add_content();
  $("#modal_add_content").modal("show");
});

$(document).on("click", ".checkbox_remove_content", function() {
  var i = 0;
  if ($(this).is(":checked")) {
    $(this)
      .parents(".show-tr_content")
      .addClass("remove-item");
    $("#MultiDelete_content").prop("disabled", false);
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_content_").html("[ " + i + " ]");
  } else {
    $(this)
      .parents(".show-tr_content")
      .removeClass("remove-item");
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_content_").html("[ " + i + " ]");
    if ($("input.checkbox_remove_content").is(":checked")) {
    } else {
      $("#MultiDelete_content").prop("disabled", true);
    }
  }
});




function ClickCheckAll_content(vol) {
  var i = 1;
  var num = 0;

  for (
    i = 1;
    i <= document.frmMain_content.hdnCount_content.value;
    i++
  ) {

    Chk_content = document.getElementById("Chk_content"+i);
     if (Chk_content != null) {
      num++;
    $(".num_content_").html("[ " + num + " ]");
    if (vol.checked == true) {
      eval(
        "document.frmMain_content.Chk_content" + i + ".checked=true"
      );
      $(".show-tr_content").addClass("remove-item");
      $("#MultiDelete_content").prop("disabled", false);
    } else {
      $(".num_content_").html("");
      eval(
        "document.frmMain_content.Chk_content" + i + ".checked=false"
      );
      $("#MultiDelete_content").prop("disabled", true);
      $(".show-tr_content").removeClass("remove-item");
    }
  }
  }
}

$(document).on("click", "#MultiDelete_content", function() {
  var id_lesson = $("#id_lesson_content").val();

  var formData = new FormData($("#frmMain_content")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
              fetch_data_table_countent(id_lesson);
              $(".num_content_").html("");
              $("#MultiDelete_content").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".delete_btn_content", function() {
  var id_lesson = $("#id_lesson_content").val();

  id = $(this).attr("data-id");
  form = "del_one_content";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
              fetch_data_table_countent(id_lesson);
              $(".num_content_").html("");
              $("#MultiDelete_content").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".open_editor", function() {
  var quiz_name_th_taxteditor = $("#quiz_name_th_taxteditor").val();
  var quiz_name_en_taxteditor = $("#quiz_name_en_taxteditor").val();

  if (quiz_name_th_taxteditor == "") {
    var quiz_name_th = $("#quiz_name_th").val();
  } else {
    var quiz_name_th = quiz_name_th_taxteditor;
  }

  if (quiz_name_en_taxteditor == "") {
    var quiz_name_en = $("#quiz_name_en").val();
  } else {
    var quiz_name_en = quiz_name_en_taxteditor;
  }

  $("#quiz_editor_th").froalaEditor("html.set", quiz_name_th);
  $("#quiz_editor_en").froalaEditor("html.set", quiz_name_en);
});

$(document).on("focus", ".quiz_name", function() {
  var quiz_name_th_taxteditor = $("#quiz_name_th_taxteditor").val();
  var quiz_name_en_taxteditor = $("#quiz_name_en_taxteditor").val();
  if (quiz_name_th_taxteditor != "" || quiz_name_en_taxteditor != "") {
    $("#quiz_editor_th").froalaEditor("html.set", quiz_name_th_taxteditor);
    $("#quiz_editor_en").froalaEditor("html.set", quiz_name_en_taxteditor);
    $("#modal_add_quiz_editor").modal("show");
  }
});

$(document).on("click", "#btnSendAdd_quiz_editor", function() {
  var quiz_editor_th = $("#quiz_editor_th").val();
  var quiz_editor_en = $("#quiz_editor_en").val();

  if (quiz_editor_th != "") {
    $("#quiz_name_th").val(stripHtml(quiz_editor_th));
    $("#quiz_name_th_taxteditor").val(quiz_editor_th);
  }
  if (quiz_editor_en != "") {
    $("#quiz_name_en").val(stripHtml(quiz_editor_en));
    $("#quiz_name_en_taxteditor").val(quiz_editor_en);
  }

  $("#modal_add_quiz_editor").modal("toggle");
  disabled_btn_add_quiz();
});

function stripHtml(html) {
  // Create a new div element
  var temporalDivElement = document.createElement("div");
  // Set the HTML content with the providen
  temporalDivElement.innerHTML = html;
  // Retrieve the text property of the element (cross-browser support)
  return temporalDivElement.textContent || temporalDivElement.innerText || "";
}

function disabled_btn_add_quiz() {
  var quiz_name_th = $("#quiz_name_th").val();
  var id_quiz = $("#id_quiz").val();
  if (id_quiz == "") {
    btnSendAdd = "btnSendAdd_quiz";
  } else {
    btnSendAdd = "btnSendedit_quiz";
  }

  if (quiz_name_th == "") {
    document.getElementById(btnSendAdd).disabled = true;
  } else {
    document.getElementById(btnSendAdd).disabled = false;
  }
}

$("#modal_add_quiz").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  document.getElementById("form_add_quiz").reset();
  document.getElementById("form_add_quiz_editor").reset();
  $("#quiz_editor_th").froalaEditor("html.set", "");
  $("#quiz_editor_en").froalaEditor("html.set", "");
  $("#quiz_name_th_taxteditor").val("");
  $("#quiz_name_en_taxteditor").val("");
  document.getElementById("btnSendAdd_quiz").disabled = true;

  document.getElementById("h3_add_quiz").style.display = "";
  document.getElementById("btnSendAdd_quiz").style.display = "";

  document.getElementById("h3_edit_quiz").style.display = "none";
  document.getElementById("btnSendedit_quiz").style.display = "none";
});

$(document).on("click", "#btnSendAdd_quiz", function() {
  var id_course = $("#id_courese").val();
  var formData = new FormData($("#form_add_quiz")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_course=" + id_course,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table_course_quiz();
                  document.getElementById("form_add_quiz").reset();
                  disabled_btn_add_quiz();
                  $("#modal_add_quiz").modal("toggle");
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".edit_btn_quiz", function() {
  var id_quiz = $(this).attr("data-id");
  var name_th = $(this).attr("data1-id");
  var name_en = $(this).attr("data2-id");

  var pass_new_flg = $(this).attr("data3-id");
  var pass_new_number = $(this).attr("data4-id");
  var fail_new_flg = $(this).attr("data5-id");
  var fail_new_number = $(this).attr("data6-id");
  var random_flg = $(this).attr("data7-id");
  var exam_number = $(this).attr("data8-id");

  $("#id_quiz").val(id_quiz);
  $("#quiz_name_th").val(stripHtml(name_th));
  $("#quiz_name_en").val(stripHtml(name_en));
  $("#quiz_name_th_taxteditor").val(name_th);
  $("#quiz_name_en_taxteditor").val(name_en);
  $("#quiz_editor_th").froalaEditor("html.set", name_th);
  $("#quiz_editor_en").froalaEditor("html.set", name_en);

  $("#pass_new_number").val(pass_new_number);
  $("#fail_new_number").val(fail_new_number);
  $("#exam_number").val(exam_number);

  if (pass_new_flg == "1") {
    document.getElementById("pass_new_flg").checked = true;
  }
  if (fail_new_flg == "1") {
    document.getElementById("fail_new_flg").checked = true;
  }
  if (random_flg == "1") {
    document.getElementById("random_flg").checked = true;
  }

  document.getElementById("h3_add_quiz").style.display = "none";
  document.getElementById("btnSendAdd_quiz").style.display = "none";

  document.getElementById("h3_edit_quiz").style.display = "";
  document.getElementById("btnSendedit_quiz").style.display = "";

  disabled_btn_add_quiz();
  $("#modal_add_quiz").modal("show");
});

$(document).on("click", "#btnSendedit_quiz", function() {
  var id_course = $("#id_courese").val();
  var formData = new FormData($("#form_add_quiz")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการแก้ไขหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_course=" + id_course,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกการแก้ไขเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table_course_quiz();
                  document.getElementById("form_add_quiz").reset();
                  $("#id_quiz").val("");
                  disabled_btn_add_quiz();
                  $("#modal_add_quiz").modal("toggle");
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".checkbox_remove_quiz", function() {
  var i = 0;
  if ($(this).is(":checked")) {
    $(this)
      .parents(".show-tr_quiz")
      .addClass("remove-item");
    $("#MultiDeletecourse_quiz").prop("disabled", false);
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_course_quiz_").html("[ " + i + " ]");
  } else {
    $(this)
      .parents(".show-tr_quiz")
      .removeClass("remove-item");
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_course_quiz_").html("[ " + i + " ]");
    if ($("input.checkbox_remove_quiz").is(":checked")) {
    } else {
      $("#MultiDeletecourse_quiz").prop("disabled", true);
    }
  }
});




function ClickCheckAll_quiz(vol) {
  var i = 1;
  var num = 0;
  for (i = 1; i <= document.frmMain_course_quiz.hdnCount_quiz.value; i++) {
    Chk_content = document.getElementById("Chk_content"+i);
   
     if (Chk_content != null) {
      num++;
    $(".num_course_quiz_").html("[ " + num + " ]");
    if (vol.checked == true) {
      eval("document.frmMain_course_quiz.Chk_quiz" + i + ".checked=true");
      $(".show-tr_quiz").addClass("remove-item");
      $("#MultiDeletecourse_quiz").prop("disabled", false);
    } else {
      $(".num_course_quiz_").html("");
      eval("document.frmMain_course_quiz.Chk_quiz" + i + ".checked=false");
      $("#MultiDeletecourse_quiz").prop("disabled", true);
      $(".show-tr_quiz").removeClass("remove-item");
    }
  }}
}

$(document).on("click", "#MultiDeletecourse_quiz", function() {
  var formData = new FormData($("#frmMain_course_quiz")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
              fetch_data_table_course_quiz();
              document.getElementById("frmMain_class_schedule").reset();
              $(".num_class_schedule_").html("");
              $("#MultiDeleteclass_schedule").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".delete_btn_quiz", function() {
  id = $(this).attr("data-id");
  form = "del_one_quiz";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
              fetch_data_table_course_quiz();
              $(".num_class_schedule_").html("");
              $("#MultiDeleteclass_schedule").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".course_question_btn", function() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  var id_quiz = $(this).attr("data-id");
  var name_th = $(this).attr("data1-id");
  $("#id_question").val(id_quiz);
  $("#head_list_course_question").html(name_th);
  document.getElementById("add_btn_course_question").style = "";
  document.getElementById("MultiDelete_course_question").style =
    "transition: 0.4s;";
  fetch_data_table_course_question(id_quiz);
});

function fetch_data_table_course_question(id_quiz) {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "div_table_list_course_question",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_quiz: id_quiz
    },
    success: function(data) {
      $("#div_table_list_course_question").html(data);
      $("#table_list_question").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[1, "asc"]]
      });
    }
  });
}
$(document).on("click", "#btnSendAdd_quiz_question_pic", function() {
  var formData = new FormData($("#quiz_question_pic")[0]);
  name_div = $("#name_div").val();
  if (name_div == "div_img_quiz_question") {
    directory = "_question";
    newname_img = "_question";
    tmp_size = "_question";
  } else {
    directory = "[]";
    newname_img = "[]";
    tmp_size = "[]";
  }
  $.ajax({
    method: "POST",
    url: "functions.php",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function(data) {
      if (data.status == "0") {
        $("#name_div").val("");
        var allOrangeJuiceQuery = document.querySelectorAll(".div_img_answer");
        var num_img = document.querySelectorAll(".num_img");
        console.log(num_img);
        if (num_img.length < 1) {
          x = 0;
          for (var i = 1; i <= allOrangeJuiceQuery.length; i++) {
            document.getElementsByClassName("div_img_answer")[x].innerHTML =
              "<a onclick='edit_pic(" +
              '"div_img_quiz_question_' +
              i +
              '"' +
              "," +
              '"img/no_image.png"' +
              ")'><img class='img-responsive radius num_img' src='img/no_image.png' width='150px'></a> <input type='hidden' name='directory" +
              directory +
              "' value='img/'><input type='hidden' name='newname_img" +
              newname_img +
              "' value='no_image.png'><input type='hidden' name='tmp_size" +
              tmp_size +
              "' value=''>";

            x++;
          }
        }
        document.getElementById(name_div).innerHTML =
          "<a onclick='edit_pic(" +
          '"' +
          name_div +
          '"' +
          "," +
          '"' +
          data.directory +
          data.newname_img +
          '"' +
          ")'><img class='img-responsive radius num_img' src='" +
          data.directory +
          data.newname_img +
          "' width='150px'></a> <input type='hidden' name='directory" +
          directory +
          "' value='" +
          data.directory +
          "'><input type='hidden' name='newname_img" +
          newname_img +
          "' value='" +
          data.newname_img +
          "'><input type='hidden' name='tmp_size" +
          tmp_size +
          "' value='" +
          data.tmp_size +
          "'>";
        var tagButton = document.getElementsByClassName("dropify-clear")[2];
        tagButton.click();
        $("#modal_add_quiz_question_pic").modal("toggle");
      } else if (data.status == "2") {
        document.getElementById(name_div).innerHTML = "";
        $("#name_div").val("");
        $("#modal_add_quiz_question_pic").modal("toggle");
      } else {
        swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
      }
    }
  }).fail(function(data) {
    // คือไม่สำรเ็จ
    swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
  });
});

function open_modal_pic(data) {
  $("#name_div").val(data);
}
function edit_pic(data, directory) {
  $("#name_div").val(data);
  $("#name_directory").val(directory);
  directory_name_img = 'data-default-file="' + directory + '"';
  document.getElementById("div_input_file_img").innerHTML =
    '<input  accept="image/*" ' +
    directory_name_img +
    ' type="file" id="name_img_quiz_question" class="dropify" name="name_img_quiz_question"  />';
  $(".dropify").dropify({
    messages: {
      default: "Drag and drop a file here or click",
      replace: "Drag and drop or click to replace",
      remove: "Remove",
      error: "Ooops, something wrong happended."
    },
    tpl: {
      message:
        '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>'
    }
  });

  // Used events
  var drEvent = $("#input-file-events").dropify();

  drEvent.on("dropify.beforeClear", function(event, element) {
    return confirm(
      'Do you really want to delete "' + element.file.name + '" ?'
    );
  });

  drEvent.on("dropify.afterClear", function(event, element) {
    alert("File deleted");
  });

  drEvent.on("dropify.errors", function(event, element) {
    console.log("Has Errors");
  });

  var drDestroy = $("#input-file-to-destroy").dropify();
  drDestroy = drDestroy.data("dropify");
  $("#toggleDropify").on("click", function(e) {
    e.preventDefault();
    if (drDestroy.isDropified()) {
      drDestroy.destroy();
    } else {
      drDestroy.init();
    }
  });
  $("#modal_add_quiz_question_pic").modal("show");
}

$(document).on("click", ".open_editor_question", function() {
  var quiz_question_name_th_taxteditor = $(
    "#quiz_question_name_th_taxteditor"
  ).val();
  var quiz_question_name_en_taxteditor = $(
    "#quiz_question_name_en_taxteditor"
  ).val();

  if (quiz_question_name_th_taxteditor == "") {
    var quiz_name_th = $("#quiz_name_th_question").val();
  } else {
    var quiz_name_th = quiz_question_name_th_taxteditor;
  }

  if (quiz_question_name_en_taxteditor == "") {
    var quiz_name_en = $("#quiz_question_name_en").val();
  } else {
    var quiz_name_en = quiz_question_name_en_taxteditor;
  }

  $("#quiz_question_editor_th").froalaEditor("html.set", quiz_name_th);
  $("#quiz_question_editor_en").froalaEditor("html.set", quiz_name_en);
  $("#quiz_question_editor_th").val(quiz_name_th);
  $("#quiz_question_editor_en").val(quiz_name_en);
});

$(document).on("focus", ".quiz_question_name", function() {
  var quiz_question_name_th_taxteditor = $(
    "#quiz_question_name_th_taxteditor"
  ).val();
  var quiz_question_name_en_taxteditor = $(
    "#quiz_question_name_en_taxteditor"
  ).val();
  if (
    quiz_question_name_th_taxteditor != "" ||
    quiz_question_name_en_taxteditor != ""
  ) {
    $("#quiz_question_editor_th").froalaEditor(
      "html.set",
      quiz_question_name_th_taxteditor
    );
    $("#quiz_question_editor_en").froalaEditor(
      "html.set",
      quiz_question_name_en_taxteditor
    );
    $("#quiz_question_editor_th").val(quiz_question_name_th_taxteditor);
    $("#quiz_question_editor_en").val(quiz_question_name_en_taxteditor);
    $("#modal_add_quiz_question_editor").modal("show");
  }
});

$(document).on("focus", ".quiz_question_name_edit", function() {
  var quiz_question_name_th_taxteditor = $(
    "#question_name_th_editor_edit"
  ).val();
  var quiz_question_name_en_taxteditor = $(
    "#question_name_en_editor_edit"
  ).val();
  if (
    quiz_question_name_th_taxteditor != "" ||
    quiz_question_name_en_taxteditor != ""
  ) {
    $("#quiz_question_editor_th").froalaEditor(
      "html.set",
      quiz_question_name_th_taxteditor
    );
    $("#quiz_question_editor_en").froalaEditor(
      "html.set",
      quiz_question_name_en_taxteditor
    );
    $("#quiz_question_editor_th").val(quiz_question_name_th_taxteditor);
    $("#quiz_question_editor_en").val(quiz_question_name_en_taxteditor);
    $("#modal_add_quiz_question_editor").modal("show");
  }
});

$(document).on("click", "#btnSendAdd_quiz_question_editor", function() {
  var name_div_editor = $("#name_div_editor").val();
  if (name_div_editor == "") {
    var quiz_question_editor_th = $("#quiz_question_editor_th").val();
    var quiz_question_editor_en = $("#quiz_question_editor_en").val();

    $("#quiz_name_th_question").val(stripHtml(quiz_question_editor_th));
    $("#quiz_question_name_th_taxteditor").val(quiz_question_editor_th);

    $("#quiz_question_name_en").val(stripHtml(quiz_question_editor_en));
    $("#quiz_question_name_en_taxteditor").val(quiz_question_editor_en);
  } else {
    var quiz_question_editor_th = $("#quiz_question_editor_th").val();
    var quiz_question_editor_en = $("#quiz_question_editor_en").val();

    $("#answer_" + name_div_editor).val(stripHtml(quiz_question_editor_th));
    $("#editor_answer_" + name_div_editor).val(quiz_question_editor_th);

    $("#answer_en_" + name_div_editor).val(stripHtml(quiz_question_editor_en));
    $("#editor_answer_en_" + name_div_editor).val(quiz_question_editor_en);
  }
  $("#modal_add_quiz_question_editor").modal("toggle");
});

function checkbox_val_add(target) {
  correct_flg = $("#correct_flg_val_add_" + target).val();
  if (correct_flg == "0") {
    val_flg = "1";
  } else {
    val_flg = "0";
  }
  $("#correct_flg_val_add_" + target).val(val_flg);

  //alert(target);
}

var room = 2;

function education_fields() {
  room++;
  var objTo = document.getElementById("education_fields");
  var divtest = document.createElement("div");
  divtest.setAttribute("class", "form-group removeclass" + room);
  var rdiv = "removeclass" + room;

  text_data = "";
  text_data +=
    '<div class="form-group removeclass_' +
    room +
    '" id="div_answer_' +
    room +
    '"><label for="example-email">คำตอบ</label>';
  text_data += '<div class="input-group"><div class="input-group-prepend">';
  text_data +=
    '<button class="btn btn-default pull-righ " style="transition: 0.4s; ">';
  text_data +=
    '<img class="flag-lang" src="img/th-fl.png" width="22" height="15" > </button></div>';
  text_data +=
    '<input onfocus="open_editor_answer(' +
    room +
    ')" class="form-control" type="text" name="answer[]" id="answer_' +
    room +
    '">';
  text_data +=
    '<input type="hidden" name="editor_answer[]" id="editor_answer_' +
    room +
    '"><div class="input-group-prepend">';
  text_data +=
    '<button onclick="remove_education_fields(' +
    "'_" +
    room +
    "');" +
    '"  type="button" class="btn btn-default pull-right " style="transition: 0.4s; " id=""  > <i class="mdi mdi-delete"> </i> </button>';
  text_data +=
    '<div class="btn btn-default pull-right " style="background: #dcdcdc"><i class="mdi mdi-cursor-move"></i></div></div></div>';
  text_data += '<div class="input-group"><div class="input-group-prepend">';
  text_data +=
    '<button class="btn btn-default pull-righ " style="transition: 0.4s; ">';
  text_data +=
    '<img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > </button></div>';
  text_data +=
    '<input onfocus="open_editor_answer(' +
    room +
    ')" class="form-control" type="text" name="answer_en[]" id="answer_en_' +
    room +
    '">';
  text_data +=
    '<input type="hidden" name="editor_answer_en[]" id="editor_answer_en_' +
    room +
    '">';
  text_data += '<div class="input-group-prepend">';
  text_data +=
    '<button data-toggle="modal" data-target="#modal_add_quiz_question_editor" type="button" class="btn btn-default pull-right " onclick="open_editor_answer(' +
    room +
    ');" style="transition: 0.4s; " id=""  > <i class="mdi mdi-border-color"> </i> </button>';
  text_data +=
    '<button onclick="open_modal_pic(' +
    "'div_img_quiz_question_" +
    room +
    "')" +
    '" data-toggle="modal" data-target="#modal_add_quiz_question_pic" type="button" class="btn btn-default pull-righ open_pic_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-image"> </i> </button>';
  text_data +=
    '</div></div><div class="col-lg-3 col-md-12 m-b-20 div_img_answer" id="div_img_quiz_question_' +
    room +
    '"></div>';
  text_data +=
    '<input type="checkbox" onchange="checkbox_val_add(' +
    room +
    ')" name="correct_flg[]" id="correct_flg_' +
    room +
    '" value="1" class=" filled-in chk-col-light-blue" /><label for="correct_flg_' +
    room +
    '">คำตอบที่ถูกต้อง</label></div>';
  text_data +=
    '<input type="hidden" name="correct_flg_val[]" id="correct_flg_val_add_' +
    room +
    '" value="0">';
  divtest.innerHTML = text_data;

  objTo.appendChild(divtest);

  var num_img = document.querySelectorAll(".num_img");
  console.log(num_img.length);
  if (num_img.length > 0) {
    num = num_img.length - 1;
    i = room;

    document.getElementById("div_img_quiz_question_" + room).innerHTML =
      "<a onclick='edit_pic(" +
      '"div_img_quiz_question_' +
      room +
      '"' +
      "," +
      '"img/no_image.png"' +
      ")'><img class='img-responsive radius num_img' src='img/no_image.png' width='150px'></a> <input type='hidden' name='directory" +
      directory +
      "' value='img/'><input type='hidden' name='newname_img" +
      newname_img +
      "' value='no_image.png'><input type='hidden' name='tmp_size" +
      tmp_size +
      "' value=''>";
  }
}

function remove_education_fields(rid) {
  $(".removeclass" + rid).remove();
}

function open_editor_answer(id) {
  $("#name_div_editor").val(id);
  var editor_answer_ = $("#editor_answer_" + id).val();
  var editor_answer_en_ = $("#editor_answer_en_" + id).val();
  if (editor_answer_ != "" || editor_answer_en_ != "") {
    $("#modal_add_quiz_question_editor").modal("show");
  }
  if (editor_answer_ == "") {
    var quiz_name_th = $("#answer_" + id).val();
  } else {
    var quiz_name_th = editor_answer_;
  }

  if (editor_answer_en_ == "") {
    var quiz_name_en = $("#answer_en_" + id).val();
  } else {
    var quiz_name_en = editor_answer_en_;
  }

  $("#quiz_question_editor_th").froalaEditor("html.set", quiz_name_th);
  $("#quiz_question_editor_en").froalaEditor("html.set", quiz_name_en);
  $("#quiz_question_editor_th").val(quiz_name_th);
  $("#quiz_question_editor_en").val(quiz_name_en);
  var quiz_question_editor_th = $("#quiz_question_editor_th").val();
  var quiz_question_editor_en = $("#quiz_question_editor_en").val();
}

$("#modal_add_quiz_question_editor").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  $("#name_div_editor").val("");
});

$("#modal_add_quiz_question_pic").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  $("#name_div").val("");
  var tagButton = document.getElementsByClassName("dropify-clear")[2];
  tagButton.click();
});

$("#modal_add_quiz_question").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  document.getElementById("form_add_quiz_question").reset();
  disabled_btn_add_question();
  $("img").attr("src", "");
  $("#education_fields").load(location.href + " #education_fields>*", "");
});

function disabled_btn_add_question() {
  var quiz_name_th = $("#quiz_name_th_question").val();
  var id_quiz_question = $("#id_quiz_question").val();
  if (id_quiz_question == "") {
    btnSendAdd = "btnSendAdd_quiz_question";
  } else {
    btnSendAdd = "btnSendedit_quiz_question";
  }

  if (quiz_name_th == "") {
    document.getElementById(btnSendAdd).disabled = true;
  } else {
    document.getElementById(btnSendAdd).disabled = false;
  }
}

$(document).on("click", "#btnSendAdd_quiz_question", function() {
  var id_question = $("#id_question").val();

  var formData = new FormData($("#form_add_quiz_question")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_question=" + id_question,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table_course_question(id_question);
                  document.getElementById("form_add_quiz_question").reset();
                  disabled_btn_add_question();
                  $("#modal_add_quiz_question").modal("toggle");
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", "#btnSendedit_quiz_question", function() {
  var id_question = $("#id_question").val();

  var formData = new FormData($("#question_edit")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการแก้ไขหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_question=" + id_question,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกการแก้ไขเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table_course_question(id_question);
                  document.getElementById("question_edit").reset();
                  $("#modal_edit_content_question").modal("toggle");
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

function order_chanhe_question(num) {
  var id_question = $("#id_question").val();
  var order = $("#order_content" + num).val();
  var id = $("#id_content" + num).val();
  var form = "order_chanhe_question";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการเปลี่ยนลำดับหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "functions.php?order=" + order + "&&id=" + id + "&&form=" + form,
          data: {},
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
              fetch_data_table_course_question(id_question);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
}

$(document).on("click", ".checkbox_remove_question", function() {
  var i = 0;
  if ($(this).is(":checked")) {
    $(this)
      .parents(".show-tr_question")
      .addClass("remove-item");
    $("#MultiDelete_course_question").prop("disabled", false);
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_course_question_").html("[ " + i + " ]");
  } else {
    $(this)
      .parents(".show-tr_question")
      .removeClass("remove-item");
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_course_question_").html("[ " + i + " ]");
    if ($("input.checkbox_remove_question").is(":checked")) {
    } else {
      $("#MultiDelete_course_question").prop("disabled", true);
    }
  }
});




function ClickCheckAll_question(vol) {
  var i = 1;
  var num = 0;
  for (
    i = 1;
    i <= document.frmMain_course_question.hdnCount_question.value;
    i++
  ) {
    Chk_content = document.getElementById("Chk_content"+i);
   
     if (Chk_content != null) {
      num++;
    $(".num_course_question_").html("[ " + num + " ]");
    if (vol.checked == true) {
      eval(
        "document.frmMain_course_question.Chk_question" + i + ".checked=true"
      );
      $(".show-tr_question").addClass("remove-item");
      $("#MultiDelete_course_question").prop("disabled", false);
    } else {
      $(".num_course_question_").html("");
      eval(
        "document.frmMain_course_question.Chk_question" + i + ".checked=false"
      );
      $("#MultiDelete_course_question").prop("disabled", true);
      $(".show-tr_question").removeClass("remove-item");
    }
  }}
}

$(document).on("click", "#MultiDelete_course_question", function() {
  var id_question = $("#id_question").val();

  var formData = new FormData($("#frmMain_course_question")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
              fetch_data_table_course_question(id_question);
              $(".num_course_question_").html("");
              $("#MultiDelete_course_question").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".delete_btn_question", function() {
  var id_question = $("#id_question").val();

  id = $(this).attr("data-id");
  form = "del_one_question";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
              fetch_data_table_course_question(id_question);
              $(".num_course_question_").html("");
              $("#MultiDelete_course_question").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

//*******แก้ไขคำถาม

function education_fields_edit() {
  var room_edit = $("#num_i").val();
  console.log(room_edit);
  room_edit++;

  var objTo = document.getElementById("education_fields_edit");
  var divtest = document.createElement("div");
  divtest.setAttribute("class", "form-group removeclass_edit_" + room_edit);
  var rdiv = "removeclass_edit_" + room_edit;
  text_data = "";
  text_data +=
    '<div class="form-group removeclass_edit_' +
    room_edit +
    '" id="div_answer_' +
    room_edit +
    '"><label for="example-email">คำตอบ</label>';
  text_data +=
    '<input type="hidden" name="id_answer[]" value=""><div class="input-group"><div class="input-group-prepend">';
  text_data +=
    '<button class="btn btn-default pull-righ " style="transition: 0.4s; ">';
  text_data +=
    '<img class="flag-lang" src="img/th-fl.png" width="22" height="15" > </button></div>';
  text_data +=
    '<input onfocus="open_editor_answer(' +
    room_edit +
    ')" class="form-control" type="text" name="answer[]" id="answer_' +
    room_edit +
    '">';
  text_data +=
    '<input type="hidden" name="editor_answer[]" id="editor_answer_' +
    room_edit +
    '"><div class="input-group-prepend">';
  text_data +=
    '<button onclick="remove_education_fields_edit(' +
    "'_" +
    room_edit +
    "');" +
    '"  type="button" class="btn btn-default pull-right " style="transition: 0.4s; " id=""  > <i class="mdi mdi-delete"> </i> </button>';
  text_data +=
    '<div class="btn btn-default pull-right " style="background: #dcdcdc"><i class="mdi mdi-cursor-move"></i></div></div></div>';
  text_data += '<div class="input-group"><div class="input-group-prepend">';
  text_data +=
    '<button class="btn btn-default pull-righ " style="transition: 0.4s; ">';
  text_data +=
    '<img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > </button></div>';
  text_data +=
    '<input onfocus="open_editor_answer(' +
    room_edit +
    ')" class="form-control" type="text" name="answer_en[]" id="answer_en_' +
    room_edit +
    '">';
  text_data +=
    '<input type="hidden" name="editor_answer_en[]" id="editor_answer_en_' +
    room_edit +
    '">';
  text_data += '<div class="input-group-prepend">';
  text_data +=
    '<button data-toggle="modal" data-target="#modal_add_quiz_question_editor" type="button" class="btn btn-default pull-right " onclick="open_editor_answer(' +
    room_edit +
    ');" style="transition: 0.4s; " id=""  > <i class="mdi mdi-border-color"> </i> </button>';
  text_data +=
    '<button onclick="open_modal_pic(' +
    "'div_img_quiz_question_" +
    room_edit +
    "')" +
    '" data-toggle="modal" data-target="#modal_add_quiz_question_pic" type="button" class="btn btn-default pull-righ open_pic_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-image"> </i> </button>';
  text_data +=
    '</div></div><div class="col-lg-3 col-md-12 m-b-20 div_img_answer" id="div_img_quiz_question_' +
    room_edit +
    '"></div>';
  text_data +=
    '<input onchange="checkbox_val(' +
    room_edit +
    ')" type="checkbox" name="correct_flg[]" id="correct_flg_edit_' +
    room_edit +
    '" value="1" class=" filled-in chk-col-light-blue " /><label for="correct_flg_edit_' +
    room_edit +
    '">คำตอบที่ถูกต้อง</label></div>';
  text_data +=
    '<input type="hidden" name="correct_flg_val[]" id="correct_flg_val_' +
    room_edit +
    '" value="0">';
  divtest.innerHTML = text_data;
  // divtest.innerHTML = '<div class="form-group" id="div_answer_'+room_edit+'"><label for="example-email">คำตอบ</label><div class="input-group"><div class="input-group-prepend"><button data-toggle="modal" data-target="#modal_add_quiz_question_editor" type="button" class="btn btn-default pull-right " onclick="open_editor_answer('+room_edit+');" style="transition: 0.4s; " id=""  > <i class="mdi mdi-border-color"> </i> </button><button onclick="open_modal_pic('+"'div_img_quiz_question_"+room_edit+"')"+'" data-toggle="modal" data-target="#modal_add_quiz_question_pic" type="button" class="btn btn-default pull-righ open_pic_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-image"> </i> </button></div><input onfocus="open_editor_answer('+room_edit+')" class="form-control" type="text" name="answer[]" id="answer_'+room_edit+'"><input type="hidden" name="editor_answer[]" id="editor_answer_'+room_edit+'"><div class="input-group-prepend"><button  type="button" class="btn btn-default pull-right " style="transition: 0.4s; " id=""  onclick="remove_education_fields_edit('+"'_"+room_edit+"');"+'> <i class="mdi mdi-delete"> </i> </button><div class="btn btn-default pull-right " style="background: #dcdcdc"><i class="mdi mdi-cursor-move"></i></div></div></div><div class="col-lg-3 col-md-12 m-b-20 div_img_answer" id="div_img_quiz_question_'+room_edit+'"></div><input type="checkbox" name="correct_flg[]" id="correct_flg_'+room_edit+'" value="1" class=" filled-in chk-col-light-blue" /><label for="correct_flg_'+room_edit+'">คำตอบที่ถูกต้อง</label></div>';
  objTo.appendChild(divtest);

  var num_img = document.querySelectorAll(".num_img");
  console.log(num_img.length);
  if (num_img.length > 0) {
    num = num_img.length - 1;
    i = room_edit;

    document.getElementById("div_img_quiz_question_" + room_edit).innerHTML =
      "<a onclick='edit_pic(" +
      '"div_img_quiz_question_' +
      room_edit +
      '"' +
      "," +
      '"img/no_image.png"' +
      ")'><img class='img-responsive radius num_img' src='img/no_image.png' width='150px'></a> <input type='hidden' name='directory[]' value='img/'><input type='hidden' name='newname_img[]' value='no_image.png'><input type='hidden' name='tmp_size[]' value=''><input type='hidden' name='id_image[]'  value=''>";
  }
  $("#num_i").val(room_edit);
}

function remove_education_fields_edit(rid) {
  $(".removeclass_edit" + rid).remove();
}
$(document).on("click", ".edit_btn_content_question", function() {
  var id_question = $(this).attr("data-id");
  $("#id_question_edit").val(id_question);

  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "select_div_edit_question",
      id_question: id_question
    },
    success: function(data) {
      $("#div_edit_question").html(data);
    }
  });

  $("#modal_edit_content_question").modal("show");
});

$(document).on("click", ".checkbox_remove_course", function() {
  var i = 0;
  if ($(this).is(":checked")) {
    $(this)
      .parents(".show-tr_course")
      .addClass("remove-item");
    $("#MultiDelete_course").prop("disabled", false);
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_course_").html("[ " + i + " ]");
  } else {
    $(this)
      .parents(".show-tr_course")
      .removeClass("remove-item");
    $(".remove-item").each(function() {
      i++;
    });
    $(".num_course_").html("[ " + i + " ]");
    if ($("input.checkbox_remove_course").is(":checked")) {
    } else {
      $("#MultiDelete_course").prop("disabled", true);
    }
  }
});




function ClickCheckAll_course(vol) {
  var i = 1;
  var num = 0;
  for (i = 1; i <= document.frmMain.hdnCount_course.value; i++) {
    Chk_content = document.getElementById("Chk_content"+i);
   
     if (Chk_content != null) {
      num++;
    $(".num_course_").html("[ " + num + " ]");
    if (vol.checked == true) {
      eval("document.frmMain.Chk_course" + i + ".checked=true");
      $(".show-tr_course").addClass("remove-item");
      $("#MultiDelete_course").prop("disabled", false);
    } else {
      $(".num_course_").html("");
      eval("document.frmMain.Chk_course" + i + ".checked=false");
      $("#MultiDelete_course").prop("disabled", true);
      $(".show-tr_course").removeClass("remove-item");
    }
  }}
}

function ClickCheckAll_course_list(vol) {
  var i = 1;
  var num = 0;
  for (i = 1; i <= document.frmMain.hdnCount_course.value; i++) {
    Chk_content = document.getElementById("Chk_course"+i);
   
     if (Chk_content != null) {
      num++;
    $(".num_course_").html("[ " + num + " ]");
    if (vol.checked == true) {
      eval("document.frmMain.Chk_course" + i + ".checked=true");
      $(".show-tr_course").addClass("remove-item");
      $("#MultiDelete_course").prop("disabled", false);
    } else {
      $(".num_course_").html("");
      eval("document.frmMain.Chk_course" + i + ".checked=false");
      $("#MultiDelete_course").prop("disabled", true);
      $(".show-tr_course").removeClass("remove-item");
    }
  }}
}



$(document).on("click", "#MultiDelete_course", function() {
  var formData = new FormData($("#frmMain")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
              div_table_list_course();
              $(".num_course_").html("");
              $("#MultiDelete_course").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", ".delete_btn_course", function() {
  id = $(this).attr("data-id");
  form = "del_one_course";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
              div_table_list_course();
              $(".num_course_").html("");
              $("#MultiDelete_course").prop("disabled", true);
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});


$(document).on("click", ".approval_btn_course", function() {
  id = $(this).attr("data-id");
  data_val = $(this).attr("data-val");
  form = "approval_one_course";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการเปลี่ยนสถานะ Approval หรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id,
            data_val:data_val
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "เปลี่ยนสถานะ Approvalเรียบร้อยแล้ว", "success");
              div_table_list_course();
              
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});



