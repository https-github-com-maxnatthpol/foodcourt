$(document).on("click", ".approval_btn_product", function() {
	id = $(this).attr("data-id");
	sales_store = $(this).attr("data-sales_store");
	sales_store_transfer = $(this).attr("data-sales_store_transfer");
	sales_store_paid = $(this).attr("data-sales_store_paid");
	sales_store_total = $(this).attr("data-sales_store_total");
	date_action = $(this).attr("data-date_action");

	form = "approval_one";
	//console.log(sales_store);
	swal
	  .fire({
		title: "ยืนยัน?",
		text: "ยืนยันอนุมัติการรับเงิน ร้านค้านี้ หรือไม่?",
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
			  sales_store:sales_store,
			  sales_store_transfer:sales_store_transfer,
			  sales_store_paid:sales_store_paid,
			  sales_store_total:sales_store_total,
			  date_action:date_action
			},
			success: function(data) {
			  if (data.status == "0") {

				swal.fire("สำเร็จ", "อนุมัติการรับเงิน เรียบร้อยแล้ว", "success");
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
	date_action = $(this).attr("data-date_action");
	window.open(`print_history_cashier.php?id=${id}&date_action=${date_action}`, '_bank');
  });
