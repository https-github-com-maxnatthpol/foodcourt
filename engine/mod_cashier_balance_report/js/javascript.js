fetch_data_table()
    
function fetch_data_table() {
          var button_update = $('#per_button_edit').val();
          var button_delete = $('#per_button_del').val();
          var button_create = $('#per_button_open').val();
          var button_view = $('#per_input_read').val();
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
                	 "order": [[ 2, 'DESC' ]]
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