			    <!-- ============================================================== -->
			    <!-- Right sidebar -->
			    <!-- ============================================================== -->
			    <!-- .right-sidebar -->
			    <div class="right-sidebar">
			        <div class="slimscrollright">
			            <div class="rpanel-title"> แผงบริการ <span><i class="ti-close right-side-toggle"></i></span> </div>
			            <div class="r-panel-body">
			                <ul id="themecolors" class="m-t-20">
			                    <li><b>แถบข้างขาว</b></li>
			                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
			                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
			                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
			                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
			                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
			                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
			                    <li class="d-block m-t-30"><b>แถบข้างดำ</b></li>
			                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
			                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
			                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
			                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
			                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
			                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
			                </ul>
			            </div>
			        </div>
			    </div>
			    <!-- ============================================================== -->
			    <!-- End Right sidebar -->
			    <!-- ============================================================== -->
			    <!-- ============================================================== -->
			    <!-- End Container fluid  -->
			    <!-- ============================================================== -->
			    <!-- ============================================================== -->
			    <!-- footer -->
			    <!-- ============================================================== -->
			    <center>
			        <footer class="footer">Copyright © <?php echo Copyright_Year; ?> - 
<?php if (Copyright_Year === date('Y')) {
    echo 'Present.';
} else {
    echo date('Y');
} ?>
			            <?php echo $_SERVER['SERVER_NAME']; ?> , All Right
			            Reserved.
			            <?php if (Mikesuwan_present === true) { ?> 
						    Developed by <a href="http://mikesuwanbc581.blogspot.com/" target="_blank">Mikesuwan</a>

			            <?php } ?>
			        </footer>
			    </center>
			    <!-- ============================================================== -->
			    <!-- End footer -->
			    <!-- ============================================================== -->
			    </div>
			    <!-- ============================================================== -->
			    <!-- End Page wrapper  -->
			    <!-- ============================================================== -->
			    </div>
			    <!-- ============================================================== -->
			    <!-- End Wrapper -->
			    <!-- ============================================================== -->

			    <!-- ============================================================== -->
			    <!-- All Jquery -->
			    <!-- ============================================================== -->
				<?php include('../template/script.php'); ?>
			    </body>

			    </html>

<!-- ============================================================== -->
<!-- All custom script -->
<!-- ============================================================== -->

			    <script>
										
					
var first = true;

var today = new Date();

function startTime() {

    today.setSeconds(today.getSeconds() + 1);

    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
	document.getElementById('realtime').innerHTML =
        "เวลาปัจจุบัน : " + h + ":" + m + ":" + s;


    var t = setTimeout(startTime, 1000);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }; // add zero in front of numbers < 10
    return i;
}

$(function() {
    startTime();
});
</script>

<script type="text/javascript">
  $('.logout').click(function(){  
        let logout = new FormData();
        logout.append('actionlogout','logout');
           //var logout = "logout";  
           $.ajax({  
                url: "../lib/service.php",  
                method: "POST",  
                data: logout,  
                processData: false,
                contentType: false,
                success:function(data)  
                {  
                  //console.log(data);
                  //alert(data.message);
                location.href='../../home/'; 
//				  location;	
                }  
           });  
      });  
</script>