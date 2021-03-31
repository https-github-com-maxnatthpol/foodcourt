
$(document).on("click", ".approval_btn_product", function() {
  id = $(this).attr("data-id");
  amount_customer = $(this).attr("data-amount-customer");
  amount_percent = $(this).attr("data-amount-percent");
  total_cus_per = $(this).attr("data-total_cus_per");
  date_action = $(this).attr("data-date_action");    
  form = "approval_one_shop";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันอนุมัติการจ่ายเงิน ร้านค้านี้ หรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
	  reverseButtons: true
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "function_m.php",
          method: "POST",
          data: {
            form: form,
            id: id,
            amount_customer:amount_customer,
            amount_percent:amount_percent,
            total_cus_per:total_cus_per,
            date_action:date_action  
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "อนุมัติการจ่ายเงิน ร้านค้านี้ เรียบร้อยแล้ว", "success");
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
});

$(document).on("click", ".print_btn", function() {
  id = $(this).attr("data-id");
  window.open(`print_history_shop.php?id=${id}`, '_bank');      
});