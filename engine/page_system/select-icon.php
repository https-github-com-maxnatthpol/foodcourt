<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myDIV *").filter(function() {
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });
	});
	</script>
<div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <!--<ul class="nav nav-tabs">
              <li class="active"><a href="#fa-icons" data-toggle="tab">Font Awesome </a></li>
              <li><a href="#glyphicons" data-toggle="tab">Glyphicons</a></li>
            </ul>-->
			<ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#icon_fontawesome" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">ไอคอนตัวอักษรยอดเยี่ยม</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#material_icon" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">ไอคอนวัสดุ</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#themify_icon" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">ชุดไอคอน</span></a> </li>
									<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#weather_icon" role="tab"><span class="hidden-sm-up"><i class="ti-bell"></i></span> <span class="hidden-xs-down">ไอคอนสภาพอากาศ</span></a> </li>
									<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#flag_icon" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">ไอคอนธง</span></a> </li>
                                </ul>  
            
                        
              <div class="tab-content">
              <!-- Font Awesome Icons -->
			  <!--<input id="myInput" type="text" placeholder="Search..">-->

		  
              <div class="tab-pane active" id="icon_fontawesome">
				<!--<div id="myDIV">-->
					<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Solid Icons</h4>
                                <h6 class="card-subtitle">use the icon by just put class <code>fas fa-address-book</code> in i tag </h6>
                                <section>
                                    <div class="icon-list-demo row">
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-address-book"></i></a>fas fa-address-book</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-address-card"></i></a>fas fa-address-card</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-adjust"></i></a>fas fa-adjust</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-align-center"></i></a>fas fa-align-center</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-align-justify"></i></a>fas fa-align-justify</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-align-left"></i></a>fas fa-align-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-align-right"></i></a>fas fa-align-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-allergies"></i></a>fas fa-allergies</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ambulance"></i></a>fas fa-ambulance</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-american-sign-language-interpreting"></i></a>fas fa-american-sign-language-interpreting</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-anchor"></i></a>fas fa-anchor</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-double-down"></i></a>fas fa-angle-double-down</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-double-left"></i></a>fas fa-angle-double-left</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-double-right"></i></a>fas fa-angle-double-right</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-double-up"></i></a>fas fa-angle-double-up</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-down"></i></a>fas fa-angle-down</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-left"></i></a>fas fa-angle-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-right"></i></a>fas fa-angle-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-angle-up"></i></a>fas fa-angle-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-archive"></i></a>fas fa-archive</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-alt-circle-down"></i></a>fas fa-arrow-alt-circle-down
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-alt-circle-left"></i></a>fas fa-arrow-alt-circle-left</div>
                                        <div class=" col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-alt-circle-right"></i></a>fas fa-arrow-alt-circle-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-alt-circle-up"></i></a>fas fa-arrow-alt-circle-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-circle-down"></i></a>fas fa-arrow-circle-down
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-circle-left"></i></a>fas fa-arrow-circle-left
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-circle-right"></i></a>fas fa-arrow-circle-right
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-circle-up"></i></a>fas fa-arrow-circle-up
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-down"></i></a>fas fa-arrow-down</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-left"></i></a>fas fa-arrow-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-right"></i></a>fas fa-arrow-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrow-up"></i></a>fas fa-arrow-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrows-alt"></i></a>fas fa-arrows-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrows-alt-h"></i></a>fas fa-arrows-alt-h</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-arrows-alt-v"></i></a>fas fa-arrows-alt-v</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-assistive-listening-systems"></i></a>fas fa-assistive-listening-systems</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-asterisk"></i></a>fas fa-asterisk</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-at"></i></a>fas fa-at</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-audio-description"></i></a>fas fa-audio-tion
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-backward"></i></a>fas fa-backward</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-balance-scale"></i></a>fas fa-balance-scale</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ban"></i></a>fas fa-ban</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-band-aid"></i></a>fas fa-band-aid</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-barcode"></i></a>fas fa-barcode</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bars"></i></a>fas fa-bars</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-baseball-ball"></i></a>fas fa-baseball-ball</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-basketball-ball"></i></a>fas fa-basketba
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bath"></i></a>fas fa-bath</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-battery-empty"></i></a>fas fa-battery-empty</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-battery-full"></i></a>fas fa-battery-full</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-battery-half"></i></a>fas fa-battery-half</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-battery-quarter"></i></a>fas fa-battery-quarter
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 "><a href='#' class="change-icon"><i class="fas fa-battery-three-quarters"></i></a>fas fa-battery-three-quarters
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bed"></i></a>fas fa-bed</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-beer"></i></a>fas fa-beer</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bell"></i></a>fas fa-bell</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bell-slash"></i></a>fas fa-bell-slash</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bicycle"></i></a>fas fa-bicycle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-binoculars"></i></a>fas fa-binoculars</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-birthday-cake"></i></a>fas fa-birthday-cake</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-blind"></i></a>fas fa-blind</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bold"></i></a>fas fa-bold</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bolt"></i></a>fas fa-bolt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bomb"></i></a>fas fa-bomb</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-book"></i></a>fas fa-book</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bookmark"></i></a>fas fa-bookmark</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bowling-ball"></i></a>fas fa-bowling-ball</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-box"></i></a>fas fa-box</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-box-open"></i></a>fas fa-box-open</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-boxes"></i></a>fas fa-boxes</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-braille"></i></a>fas fa-braille</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-briefcase"></i></a>fas fa-briefcase</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-briefcase-medical"></i></a>fas fa-briefcical
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bug"></i></a>fas fa-bug</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-building"></i></a>fas fa-building</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bullhorn"></i></a>fas fa-bullhorn</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bullseye"></i></a>fas fa-bullseye</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-burn"></i></a>fas fa-burn</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-bus"></i></a>fas fa-bus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-calculator"></i></a>fas fa-calculator</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-calendar"></i></a>fas fa-calendar</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-calendar-alt"></i></a>fas fa-calendar-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-calendar-check"></i></a>fas fa-calendar-check</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-calendar-minus"></i></a>fas fa-calendar-minus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-calendar-plus"></i></a>fas fa-calendar-plus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-calendar-times"></i></a>fas fa-calendar-times</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-camera"></i></a>fas fa-camera</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-camera-retro"></i></a>fas fa-camera-retro</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-capsules"></i></a>fas fa-capsules</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-car"></i></a>fas fa-car</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-down"></i></a>fas fa-caret-down</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-left"></i></a>fas fa-caret-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-right"></i></a>fas fa-caret-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-square-down"></i></a>fas fa-caret-down
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-square-left"></i></a>fas fa-caret-left
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-square-right"></i></a>fas fa-caret-right
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-square-up"></i></a>fas fa-caret-sq
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-caret-up"></i></a>fas fa-caret-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cart-arrow-down"></i></a>fas fa-cart-arr
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cart-plus"></i></a>fas fa-cart-plus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-certificate"></i></a>fas fa-certificate</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chart-area"></i></a>fas fa-chart-area</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chart-bar"></i></a>fas fa-chart-bar</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chart-line"></i></a>fas fa-chart-line</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chart-pie"></i></a>fas fa-chart-pie</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-check"></i></a>fas fa-check</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-check-circle"></i></a>fas fa-check-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-check-square"></i></a>fas fa-check-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess"></i></a>fas fa-chess</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess-bishop"></i></a>fas fa-chess-bishop</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess-board"></i></a>fas fa-chess-board</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess-king"></i></a>fas fa-chess-king</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess-knight"></i></a>fas fa-chess-knight</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess-pawn"></i></a>fas fa-chess-pawn</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess-queen"></i></a>fas fa-chess-queen</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chess-rook"></i></a>fas fa-chess-rook</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chevron-circle-down"></i></a>fas fa-chevron-circle-down</div>
                                        <div class=" col-sm-6 col-md-4 col-lg-6 "><a href='#' class="change-icon"><i class="fas fa-chevron-circle-left"></i></a>fas fa-chevron-circle-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chevron-circle-right"></i></a>fas fa-chevron-circle-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chevron-circle-up"></i></a>fas fa-chevroe-up
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chevron-down"></i></a>fas fa-chevron-down</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chevron-left"></i></a>fas fa-chevron-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chevron-right"></i></a>fas fa-chevron-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-chevron-up"></i></a>fas fa-chevron-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-child"></i></a>fas fa-child</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-circle"></i></a>fas fa-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-circle-notch"></i></a>fas fa-circle-notch</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-clipboard"></i></a>fas fa-clipboard</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-clipboard-check"></i></a>fas fa-clipboard-check
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-clipboard-list"></i></a>fas fa-clipboard-list</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-clock"></i></a>fas fa-clock</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-clone"></i></a>fas fa-clone</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-closed-captioning"></i></a>fas fa-closedning
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cloud"></i></a>fas fa-cloud</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cloud-download-alt"></i></a>fas fa-cloudad-alt
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cloud-upload-alt"></i></a>fas fa-cloud-alt
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-code"></i></a>fas fa-code</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-code-branch"></i></a>fas fa-code-branch</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-coffee"></i></a>fas fa-coffee</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cog"></i></a>fas fa-cog</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cogs"></i></a>fas fa-cogs</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-columns"></i></a>fas fa-columns</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-comment"></i></a>fas fa-comment</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-comment-alt"></i></a>fas fa-comment-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-comment-dots"></i></a>fas fa-comment-dots</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-comment-slash"></i></a>fas fa-comment-slash</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-comments"></i></a>fas fa-comments</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-compass"></i></a>fas fa-compass</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-compress"></i></a>fas fa-compress</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-copy"></i></a>fas fa-copy</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-copyright"></i></a>fas fa-copyright</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-couch"></i></a>fas fa-couch</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-credit-card"></i></a>fas fa-credit-card</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-crop"></i></a>fas fa-crop</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-crosshairs"></i></a>fas fa-crosshairs</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cube"></i></a>fas fa-cube</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cubes"></i></a>fas fa-cubes</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-cut"></i></a>fas fa-cut</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-database"></i></a>fas fa-database</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-deaf"></i></a>fas fa-deaf</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-desktop"></i></a>fas fa-desktop</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-diagnoses"></i></a>fas fa-diagnoses</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-dna"></i></a>fas fa-dna</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-dollar-sign"></i></a>fas fa-dollar-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-dolly"></i></a>fas fa-dolly</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-dolly-flatbed"></i></a>fas fa-dolly-flatbed</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-donate"></i></a>fas fa-donate</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-dot-circle"></i></a>fas fa-dot-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-dove"></i></a>fas fa-dove</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-download"></i></a>fas fa-download</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-edit"></i></a>fas fa-edit</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-eject"></i></a>fas fa-eject</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ellipsis-h"></i></a>fas fa-ellipsis-h</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ellipsis-v"></i></a>fas fa-ellipsis-v</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-envelope"></i></a>fas fa-envelope</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-envelope-open"></i></a>fas fa-envelope-open</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-envelope-square"></i></a>fas fa-envelope-square
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-eraser"></i></a>fas fa-eraser</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-euro-sign"></i></a>fas fa-euro-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-exchange-alt"></i></a>fas fa-exchange-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-exclamation"></i></a>fas fa-exclamation</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-exclamation-circle"></i></a>fas fa-exclamation-circle
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-exclamation-triangle"></i></a>fas fa-exclamation-triangle</div>
                                        <div class=" col-sm-6 col-md-4 col-lg-6 "><i class="fas fa-expand"></i></a>fas fa-expand</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 "><i class="fas fa-expand-arrows-alt"></i></a>fas fa-expand-alt
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 "><i class="fas fa-external-link-alt"></i></a>fas fa-external-link-alt
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6 "><i class="fas fa-external-link-square-alt"></i></a>fas fa-external-link-square-alt
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-eye"></i></a>fas fa-eye</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-eye-dropper"></i></a>fas fa-eye-dropper</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-eye-slash"></i></a>fas fa-eye-slash</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-fast-backward"></i></a>fas fa-fast-backward</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-fast-forward"></i></a>fas fa-fast-forward</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-fax"></i></a>fas fa-fax</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-female"></i></a>fas fa-female</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-fighter-jet"></i></a>fas fa-fighter-jet</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file"></i></a>fas fa-file</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-alt"></i></a>fas fa-file-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-archive"></i></a>fas fa-file-archive</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-audio"></i></a>fas fa-file-audio</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-code"></i></a>fas fa-file-code</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-excel"></i></a>fas fa-file-excel</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-image"></i></a>fas fa-file-image</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-medical"></i></a>fas fa-file-medical</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-medical-alt"></i></a>fas fa-file-medical-alt
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-pdf"></i></a>fas fa-file-pdf</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-powerpoint"></i></a>fas fa-file-pow
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-video"></i></a>fas fa-file-video</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-file-word"></i></a>fas fa-file-word</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-film"></i></a>fas fa-film</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-filter"></i></a>fas fa-filter</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-fire"></i></a>fas fa-fire</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-fire-extinguisher"></i></a>fas fa-fire-extinguisher
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-first-aid"></i></a>fas fa-first-aid</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-flag"></i></a>fas fa-flag</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-flag-checkered"></i></a>fas fa-flag-checkered</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-flask"></i></a>fas fa-flask</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-folder"></i></a>fas fa-folder</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-folder-open"></i></a>fas fa-folder-open</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-font"></i></a>fas fa-font</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-football-ball"></i></a>fas fa-football-ball</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-forward"></i></a>fas fa-forward</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-frown"></i></a>fas fa-frown</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-futbol"></i></a>fas fa-futbol</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-gamepad"></i></a>fas fa-gamepad</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-gavel"></i></a>fas fa-gavel</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-gem"></i></a>fas fa-gem</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-genderless"></i></a>fas fa-genderless</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-gift"></i></a>fas fa-gift</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-glass-martini"></i></a>fas fa-glass-martini</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-globe"></i></a>fas fa-globe</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-golf-ball"></i></a>fas fa-golf-ball</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-graduation-cap"></i></a>fas fa-graduation-cap</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-h-square"></i></a>fas fa-h-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-holding"></i></a>fas fa-hand-holding</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-holding-heart"></i></a>fas fa-hand-holding-heart
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-holding-usd"></i></a>fas fa-hand-holding-usd
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-lizard"></i></a>fas fa-hand-lizard</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-paper"></i></a>fas fa-hand-paper</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-peace"></i></a>fas fa-hand-peace</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-point-down"></i></a>fas fa-hand-point-down
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-point-left"></i></a>fas fa-hand-point-left
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-point-right"></i></a>fas fa-hand-point-right
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-point-up"></i></a>fas fa-hand-point-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-pointer"></i></a>fas fa-hand-pointer</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-rock"></i></a>fas fa-hand-rock</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-scissors"></i></a>fas fa-hand-scissors</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hand-spock"></i></a>fas fa-hand-spock</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hands"></i></a>fas fa-hands</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hands-helping"></i></a>fas fa-hands-helping</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-handshake"></i></a>fas fa-handshake</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hashtag"></i></a>fas fa-hashtag</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hdd"></i></a>fas fa-hdd</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-heading"></i></a>fas fa-heading</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-headphones"></i></a>fas fa-headphones</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-heart"></i></a>fas fa-heart</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-heartbeat"></i></a>fas fa-heartbeat</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-history"></i></a>fas fa-history </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hockey-puck"></i></a>fas fa-hockey-puck</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-home"></i></a>fas fa-home</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hospital"></i></a>fas fa-hospital</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hospital-alt"></i></a>fas fa-hospital-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hospital-symbol"></i></a>fas fa-hospital
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hourglass"></i></a>fas fa-hourglass</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hourglass-end"></i></a>fas fa-hourglass-end</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hourglass-half"></i></a>fas fa-hourglass-half</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-hourglass-start"></i></a>fas fa-hourglass-start
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-i-cursor"></i></a>fas fa-i-cursor</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-id-badge"></i></a>fas fa-id-badge</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-id-card"></i></a>fas fa-id-card</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-id-card-alt"></i></a>fas fa-id-card-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-image"></i></a>fas fa-image</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-images"></i></a>fas fa-images</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-inbox"></i></a>fas fa-inbox</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-indent"></i></a>fas fa-indent</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-industry"></i></a>fas fa-industry</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-info"></i></a>fas fa-info</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-info-circle"></i></a>fas fa-info-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-italic"></i></a>fas fa-italic</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-key"></i></a>fas fa-key</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-keyboard"></i></a>fas fa-keyboard</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-language"></i></a>fas fa-language</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-laptop"></i></a>fas fa-laptop</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-leaf"></i></a>fas fa-leaf</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-lemon"></i></a>fas fa-lemon</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-level-down-alt"></i></a>fas fa-level-down-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-level-up-alt"></i></a>fas fa-level-up-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-life-ring"></i></a>fas fa-life-ring</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-lightbulb"></i></a>fas fa-lightbulb</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-link"></i></a>fas fa-link</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-lira-sign"></i></a>fas fa-lira-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-list"></i></a>fas fa-list</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-list-alt"></i></a>fas fa-list-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-list-ol"></i></a>fas fa-list-ol</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-list-ul"></i></a>fas fa-list-ul</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-location-arrow"></i></a>fas fa-location-arrow</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-lock"></i></a>fas fa-lock</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-lock-open"></i></a>fas fa-lock-open</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-long-arrow-alt-down"></i></a>fas fa-long-arrow-alt-down</div>
                                        <div class=" col-sm-6 col-md-4 col-lg-6 "><i class="fas fa-long-arrow-alt-left"></i></a>fas fa-long-arrow-alt-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-long-arrow-alt-right"></i></a>fas fa-long-arrow-alt-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-long-arrow-alt-up"></i></a>fas fa-long-arrow-alt-up
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-low-vision"></i></a>fas fa-low-vision</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-magic"></i></a>fas fa-magic</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-magnet"></i></a>fas fa-magnet</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-male"></i></a>fas fa-male</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-map"></i></a>fas fa-map</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-map-marker"></i></a>fas fa-map-marker</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-map-marker-alt"></i></a>fas fa-map-marker-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-map-pin"></i></a>fas fa-map-pin</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-map-signs"></i></a>fas fa-map-signs</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mars"></i></a>fas fa-mars</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mars-double"></i></a>fas fa-mars-double</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mars-stroke"></i></a>fas fa-mars-stroke</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mars-stroke-h"></i></a>fas fa-mars-stroke-h</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mars-stroke-v"></i></a>fas fa-mars-stroke-v</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-medkit"></i></a>fas fa-medkit</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-meh"></i></a>fas fa-meh</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mercury"></i></a>fas fa-mercury</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-microchip"></i></a>fas fa-microchip</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-microphone"></i></a>fas fa-microphone</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-microphone-slash"></i></a>fas fa-microphone-slash
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-minus"></i></a>fas fa-minus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-minus-circle"></i></a>fas fa-minus-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-minus-square"></i></a>fas fa-minus-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mobile"></i></a>fas fa-mobile</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mobile-alt"></i></a>fas fa-mobile-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-money-bill-alt"></i></a>fas money-bill-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-moon"></i></a>fas fa-moon</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-motorcycle"></i></a>fas fa-motorcycle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-mouse-pointer"></i></a>fas fa-mouse-pointer</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-music"></i></a>fas fa-music</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-neuter"></i></a>fas fa-neuter</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-newspaper"></i></a>fas fa-newspaper</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-notes-medical"></i></a>fas fa-notes-medical</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-object-group"></i></a>fas fa-object-group</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-object-ungroup"></i></a>fas fa-object-ungroup</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-outdent"></i></a>fas fa-outdent</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-paint-brush"></i></a>fas fa-paint-brush</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-pallet"></i></a>fas fa-pallet</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-paper-plane"></i></a>fas fa-paper-plane</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-paperclip"></i></a>fas fa-paperclip</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-parachute-box"></i></a>fas fa-parachute-box</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-paragraph"></i></a>fas fa-paragraph</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-paste"></i></a>fas fa-paste</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-pause"></i></a>fas fa-pause</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-pause-circle"></i></a>fas pause-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-paw"></i></a>fas fa-fa-paw</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-pen-square"></i></a>fas fa-pen-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-pencil-alt"></i></a>fas fa-pencil-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-people-carry"></i></a>fas fa-people-carry</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-percent"></i></a>fas fa-percent</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-phone"></i></a>fas fa-phone</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-phone-slash"></i></a>fas fa-phone-slash</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-phone-square"></i></a>fas fa-phone-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-phone-volume"></i></a>fas fa-phone-volume</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-piggy-bank"></i></a>fas fa-piggy-bank</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-pills"></i></a>fas fa-pills</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-plane"></i></a>fas fa-plane</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-play"></i></a>fas fa-play</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-play-circle"></i></a>fas fa-play-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-plug"></i></a>fas fa-plug</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-plus"></i></a>fas fa-plus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-plus-circle"></i></a>fas fa-plus-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-plus-square"></i></a>fas fa-plus-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-podcast"></i></a>fas fa-podcast</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-poo"></i></a>fas fa-poo</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-pound-sign"></i></a>fas fa-pound-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-power-off"></i></a>fas fa-power-off</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-prescription-bottle"></i></a>fas fa-prescription-bottle</div>
                                        <div class=" col-sm-6 col-md-4 col-lg-6 "><i class="fas fa-prescription-bottle-alt"></i></a>fas fa-prescription-bottle-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-print"></i></a>fas fa-print</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-procedures"></i></a>fas fa-procedures</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-puzzle-piece"></i></a>fas fa-puzzle-piece</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-qrcode"></i></a>fas fa-qrcode</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-question"></i></a>fas fa-question</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-question-circle"></i></a>fas fa-question
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-quidditch"></i></a>fas fa-quidditch</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-quote-left"></i></a>fas fa-quote-left</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-quote-right"></i></a>fas fa-quote-right</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-random"></i></a>fas fa-random</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-recycle"></i></a>fas fa-recycle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-redo"></i></a>fas fa-redo</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-redo-alt"></i></a>fas fa-redo-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-registered"></i></a>fas fa-registered</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-reply"></i></a>fas fa-reply</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-reply-all"></i></a>fas fa-reply-all</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-retweet"></i></a>fas fa-retweet</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ribbon"></i></a>fas fa-ribbon</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-road"></i></a>fas fa-road</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-rocket"></i></a>fas fa-rocket</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-rss"></i></a>fas fa-rss</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-rss-square"></i></a>fas fa-rss-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ruble-sign"></i></a>fas fa-ruble-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-rupee-sign"></i></a>fas fa-rupee-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-save"></i></a>fas fa-save</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-search"></i></a>fas fa-search</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-search-minus"></i></a>fas fa-search-minus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-search-plus"></i></a>fas fa-search-plus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-seedling"></i></a>fas fa-seedling</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-server"></i></a>fas fa-server</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-share"></i></a>fas fa-share</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-share-alt"></i></a>fas fa-share-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-share-alt-square"></i></a>fas fa-share-alt-square
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-share-square"></i></a>fas fa-share-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-shekel-sign"></i></a>fas fa-shekel-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-shield-alt"></i></a>fas fa-shield-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ship"></i></a>fas fa-ship</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-shipping-fast"></i></a>fas fa-shipping-fast</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-shopping-bag"></i></a>fas fa-shopping-bag</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-shopping-basket"></i></a>fas fa-shopping-basket
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-shopping-cart"></i></a>fas fa-shopping-cart</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-shower"></i></a>fas fa-shower</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sign"></i></a>fas fa-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sign-in-alt"></i></a>fas fa-sign-in-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sign-language"></i></a>fas fa-sign-language</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sign-out-alt"></i></a>fas fa-sign-out-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-signal"></i></a>fas fa-signal</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sitemap"></i></a>fas fa-sitemap</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sliders-h"></i></a>fas fa-sliders-h</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-smile"></i></a>fas fa-smile</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-smoking"></i></a>fas fa-smoking</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-snowflake"></i></a>fas fa-snowflake</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort"></i></a>fas fa-sort</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-alpha-down"></i></a>fas fa-alpha-down
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-alpha-up"></i></a>fas fa-sort-alpha-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-amount-down"></i></a>fas fa-sort-amount-down
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-amount-up"></i></a>fas fa-sort-amount-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-down"></i></a>fas fa-sort-down</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-numeric-down"></i></a>fas fa-sort-numeric-down
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-numeric-up"></i></a>fas fa-sort-numeric-up
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sort-up"></i></a>fas fa-sort-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-space-shuttle"></i></a>fas fa-space-shuttle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-spinner"></i></a>fas fa-spinner</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-square"></i></a>fas fa-square</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-square-full"></i></a>fas fa-square-full</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-star"></i></a>fas fa-star</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-star-half"></i></a>fas fa-star-half</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-step-backward"></i></a>fas fa-step-backward</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-step-forward"></i></a>fas fa-step-forward</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-stethoscope"></i></a>fas fa-stethoscope</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sticky-note"></i></a>fas fa-sticky-note</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-stop"></i></a>fas fa-stop</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-stop-circle"></i></a>fas fa-stop-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-stopwatch"></i></a>fas fa-stopwatch</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-street-view"></i></a>fas fa-street-view</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-strikethrough"></i></a>fas fa-strikethrough</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-subscript"></i></a>fas fa-subscript</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-subway"></i></a>fas fa-subway</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-suitcase"></i></a>fas fa-suitcase</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sun"></i></a>fas fa-sun</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-superscript"></i></a>fas fa-superscript</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sync"></i></a>fas fa-sync</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-sync-alt"></i></a>fas fa-sync-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-syringe"></i></a>fas fa-syringe</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-table"></i></a>fas fa-table</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-table-tennis"></i></a>fas fa-table-tennis</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tablet"></i></a>fas fa-tablet</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tablet-alt"></i></a>fas fa-tablet-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tablets"></i></a>fas fa-tablets</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tachometer-alt"></i></a>fas fa-tachometer-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tag"></i></a>fas fa-tag</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tags"></i></a>fas fa-tags</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tape"></i></a>fas fa-tape</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tasks"></i></a>fas fa-tasks</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-taxi"></i></a>fas fa-taxi</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-terminal"></i></a>fas fa-terminal</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-text-height"></i></a>fas fa-text-height</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-text-width"></i></a>fas fa-text-width</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-th"></i></a>fas fa-th</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-th-large"></i></a>fas fa-th-large</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-th-list"></i></a>fas fa-th-list</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thermometer"></i></a>fas fa-thermometer</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thermometer-empty"></i></a>fas fa-thermometer-empty
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thermometer-full"></i></a>fas fa-thermometer-full
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thermometer-half"></i></a>fas fa-thermometer-half
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thermometer-quarter"></i></a>fas fa-thermometer-quarter</div>
                                        <div class=" col-sm-6 col-md-4 col-lg-6 "><i class="fas fa-thermometer-three-quarters"></i></a>fas fa-thermometer-three-quarters</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thumbs-down"></i></a>fas fa-thumbs-down</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thumbs-up"></i></a>fas fa-thumbs-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-thumbtack"></i></a>fas fa-thumbtack</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-ticket-alt"></i></a>fas fa-ticket-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-times"></i></a>fas fa-times</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-times-circle"></i></a>fas fa-times-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tint"></i></a>fas fa-tint</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-toggle-off"></i></a>fas fa-toggle-off</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-toggle-on"></i></a>fas fa-toggle-on</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-trademark"></i></a>fas fa-trademark</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-train"></i></a>fas fa-train</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-transgender"></i></a>fas fa-transgender</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-transgender-alt"></i></a>fas fa-transgen
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-trash"></i></a>fas fa-trash</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-trash-alt"></i></a>fas fa-trash-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tree"></i></a>fas fa-tree</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-trophy"></i></a>fas fa-trophy</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-truck"></i></a>fas fa-truck</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-truck-loading"></i></a>fas fa-truck-loading</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-truck-moving"></i></a>fas fa-truck-moving</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tty"></i></a>fas fa-tty</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-tv"></i></a>fas fa-tv</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-umbrella"></i></a>fas fa-umbrella</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-underline"></i></a>fas fa-underline</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-undo"></i></a>fas fa-undo</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-undo-alt"></i></a>fas fa-undo-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-universal-access"></i></a>fas fa-universal-access
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-university"></i></a>fas fa-university</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-unlink"></i></a>fas fa-unlink</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-unlock"></i></a>fas fa-unlock</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-unlock-alt"></i></a>fas fa-unlock-alt</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-upload"></i></a>fas fa-upload</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-user"></i></a>fas fa-user</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-user-circle"></i></a>fas fa-user-circle</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-user-md"></i></a>fas fa-user-md</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-user-plus"></i></a>fas fa-user-plus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-user-secret"></i></a>fas fa-user-secret</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-user-times"></i></a>fas fa-user-times</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-users"></i></a>fas fa-users</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-utensil-spoon"></i></a>fas fa-utensil-spoon</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-utensils"></i></a>fas fa-utensils</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-venus"></i></a>fas fa-venus</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-venus-double"></i></a>fas fa-venus-double</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-venus-mars"></i></a>fas fa-venus-mars</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-vial"></i></a>fas fa-vial</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-vials"></i></a>fas fa-vials</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-video"></i></a>fas fa-video</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-video-slash"></i></a>fas fa-video-slash</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-volleyball-ball"></i></a>fas fa-volleyba
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-volume-down"></i></a>fas fa-volume-down</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-volume-off"></i></a>fas fa-volume-off</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-volume-up"></i></a>fas fa-volume-up</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-warehouse"></i></a>fas fa-warehouse</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-weight"></i></a>fas fa-weight</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-wheelchair"></i></a>fas fa-wheelchair</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-wifi"></i></a>fas fa-wifi</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-window-close"></i></a>fas fa-window-close</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-window-maximize"></i></a>fas fa-window-maximize
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-window-minimize"></i></a>fas fa-window-minimize
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-window-restore"></i></a>fas fa-window-restore</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-wine-glass"></i></a>fas fa-wine-glass</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-won-sign"></i></a>fas fa-won-sign</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-wrench"></i></a>fas fa-wrench</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-x-ray"></i></a>fas fa-x-ray</div>
                                        <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fas fa-yen-sign"></i></a>fas fa-yen-sign</div>
                                    </div>
                                </section>
                            </div>
                        </div>
						<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Regular Icons</h4>
                                <h6 class="card-subtitle">use the icon by just put class <code>far fa-address-card</code> in i tag </h6>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-address-book"></i></a><span>far fa-address-book</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-address-card"></i></a><span>far fa-address-card</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-arrow-alt-circle-down"></i></a><span>far fa-arrow-alt-circle-down</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-arrow-alt-circle-left"></i></a><span>far fa-arrow-alt-circle-left</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-arrow-alt-circle-right"></i></a><span>far fa-arrow-alt-circle-right</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-arrow-alt-circle-up"></i></a><span>far fa-arrow-alt-circle-up</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-bell"></i></a><span>far fa-bell</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-bell-slash"></i></a><span>far fa-bell-slash</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-bookmark"></i></a><span>far fa-bookmark</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-building"></i></a><span>far fa-building</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-calendar"></i></a><span>far fa-calendar</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-calendar-alt"></i></a><span>far fa-calendar-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-calendar-check"></i></a><span>far fa-calendar-check</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-calendar-minus"></i></a><span>far fa-calendar-minus</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-calendar-plus"></i></a><span>far fa-calendar-plus</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-calendar-times"></i></a><span>far fa-calendar-times</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-caret-square-down"></i></a><span>far fa-caret-square-down</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-caret-square-left"></i></a><span>far fa-caret-square-left</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-caret-square-right"></i></a><span>far fa-caret-square-right</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-caret-square-up"></i></a><span>far fa-caret-square-up</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-chart-bar"></i></a><span>far fa-chart-bar</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-check-circle"></i></a><span>far fa-check-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-check-square"></i></a><span>far fa-check-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-circle"></i></a><span>far fa-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-clipboard"></i></a><span>far fa-clipboard</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-clock"></i></a><span>far fa-clock</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-clone"></i></a><span>far fa-clone</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-closed-captioning"></i></a><span>far fa-closed-captioning</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-comment"></i></a><span>far fa-comment</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-comment-alt"></i></a><span>far fa-comment-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-comments"></i></a><span>far fa-comments</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-compass"></i></a><span>far fa-compass</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-copy"></i></a><span>far fa-copy</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-copyright"></i></a><span>far fa-copyright</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-credit-card"></i></a><span>far fa-credit-card</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-dot-circle"></i></a><span>far fa-dot-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-edit"></i></a><span>far fa-edit</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-envelope"></i></a><span>far fa-envelope</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-envelope-open"></i></a><span>far fa-envelope-open</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-eye-slash"></i></a><span>far fa-eye-slash</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file"></i></a><span>far fa-file</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-alt"></i></a><span>far fa-file-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-archive"></i></a><span>far fa-file-archive</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-audio"></i></a><span>far fa-file-audio</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-code"></i></a><span>far fa-file-code</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-excel"></i></a><span>far fa-file-excel</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-image"></i></a><span>far fa-file-image</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-pdf"></i></a><span>far fa-file-pdf</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-powerpoint"></i></a><span>far fa-file-powerpoint</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-video"></i></a><span>far fa-file-video</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-file-word"></i></a><span>far fa-file-word</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-flag"></i></a><span>far fa-flag</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-folder"></i></a><span>far fa-folder</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-folder-open"></i></a><span>far fa-folder-open</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-frown"></i></a><span>far fa-frown</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-futbol"></i></a><span>far fa-futbol</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-gem"></i></a><span>far fa-gem</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-lizard"></i></a><span>far fa-hand-lizard</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-paper"></i></a><span>far fa-hand-paper</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-peace"></i></a><span>far fa-hand-peace</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-point-down"></i></a><span>far fa-hand-point-down</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-point-left"></i></a><span>far fa-hand-point-left</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-point-right"></i></a><span>far fa-hand-point-right</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-point-up"></i></a><span>far fa-hand-point-up</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-pointer"></i></a><span>far fa-hand-pointer</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-rock"></i></a><span>far fa-hand-rock</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-scissors"></i></a><span>far fa-hand-scissors</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hand-spock"></i></a><span>far fa-hand-spock</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-handshake"></i></a><span>far fa-handshake</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hdd"></i></a><span>far fa-hdd</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-heart"></i></a><span>far fa-heart</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hospital"></i></a><span>far fa-hospital</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-hourglass"></i></a><span>far fa-hourglass</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-id-badge"></i></a><span>far fa-id-badge</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-id-card"></i></a><span>far fa-id-card</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-image"></i></a><span>far fa-image</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-images"></i></a><span>far fa-images</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-keyboard"></i></a><span>far fa-keyboard</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-lemon"></i></a><span>far fa-lemon</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-life-ring"></i></a><span>far fa-life-ring</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-lightbulb"></i></a><span>far fa-lightbulb</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-list-alt"></i></a><span>far fa-list-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-map"></i></a><span>far fa-map</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-meh"></i></a><span>far fa-meh</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-minus-square"></i></a><span>far fa-minus-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-money-bill-alt"></i></a><span>far fa-money-bill-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-moon"></i></a><span>far fa-moon</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-newspaper"></i></a><span>far fa-newspaper</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-object-group"></i></a><span>far fa-object-group</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-object-ungroup"></i></a><span>far fa-object-ungroup</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-paper-plane"></i></a><span>far fa-paper-plane</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-pause-circle"></i></a><span>far fa-pause-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-play-circle"></i></a><span>far fa-play-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-plus-square"></i></a><span>far fa-plus-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-question-circle"></i></a><span>far fa-question-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-registered"></i></a><span>far fa-registered</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-save"></i></a><span>far fa-save</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-share-square"></i></a><span>far fa-share-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-smile"></i></a><span>far fa-smile</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-snowflake"></i></a><span>far fa-snowflake</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-square"></i></a><span>far fa-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-star"></i></a><span>far fa-star</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-star-half"></i></a><span>far fa-star-half</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-sticky-note"></i></a><span>far fa-sticky-note</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-stop-circle"></i></a><span>far fa-stop-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-sun"></i></a><span>far fa-sun</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-thumbs-down"></i></a><span>far fa-thumbs-down</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-thumbs-up"></i></a><span>far fa-thumbs-up</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-times-circle"></i></a><span>far fa-times-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-trash-alt"></i></a><span>far fa-trash-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-user"></i></a><span>far fa-user</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-user-circle"></i></a><span>far fa-user-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-window-close"></i></a><span>far fa-window-close</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-window-maximize"></i></a><span>far fa-window-maximize</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-window-minimize"></i></a><span>far fa-window-minimize</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="far fa-window-restore"></i></a><span>far fa-window-restore</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Brand  Icons</h4>
                                <h6 class="card-subtitle">use the icon by just put class <code>fab fa-accessible-icon</code> in i tag </h6>
                                <div class="clearfix icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-500px"></i></a><span>fab fa-500px</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-accessible-icon"></i></a><span>fab fa-accessible-icon</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-accusoft"></i></a><span>fab fa-accusoft</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-adn"></i></a><span>fab fa-adn</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-adversal"></i></a><span>fab fa-adversal</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-affiliatetheme"></i></a><span>fab fa-affiliatetheme</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-algolia"></i></a><span>fab fa-algolia</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-amazon"></i></a><span>fab fa-amazon</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-amazon-pay"></i></a><span>fab fa-amazon-pay</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-amilia"></i></a><span>fab fa-amilia</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-android"></i></a><span>fab fa-android</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-angellist"></i></a><span>fab fa-angellist</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-angrycreative"></i></a><span>fab fa-angrycreative</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-angular"></i></a><span>fab fa-angular</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-app-store"></i></a><span>fab fa-app-store</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-app-store-ios"></i></a><span>fab fa-app-store-ios</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-apper"></i></a><span>fab fa-apper</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-apple"></i></a><span>fab fa-apple</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-apple-pay"></i></a><span>fab fa-apple-pay</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-asymmetrik"></i></a><span>fab fa-asymmetrik</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-audible"></i></a><span>fab fa-audible</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-autoprefixer"></i></a><span>fab fa-autoprefixer</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-avianex"></i></a><span>fab fa-avianex</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-aviato"></i></a><span>fab fa-aviato</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-aws"></i></a><span>fab fa-aws</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-bandcamp"></i></a><span>fab fa-bandcamp</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-behance"></i></a><span>fab fa-behance</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-behance-square"></i></a><span>fab fa-behance-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-bimobject"></i></a><span>fab fa-bimobject</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-bitbucket"></i></a><span>fab fa-bitbucket</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-bitcoin"></i></a><span>fab fa-bitcoin</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-bity"></i></a><span>fab fa-bity</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-black-tie"></i></a><span>fab fa-black-tie</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-blackberry"></i></a><span>fab fa-blackberry</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-blogger"></i></a><span>fab fa-blogger</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-blogger-b"></i></a><span>fab fa-blogger-b</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-bluetooth"></i></a><span>fab fa-bluetooth</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-bluetooth-b"></i></a><span>fab fa-bluetooth-b</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-btc"></i></a><span>fab fa-btc</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-buromobelexperte"></i></a><span>fab fa-buromobelexperte</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-amazon-pay"></i></a><span>fab fa-cc-amazon-pay</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-amex"></i></a><span>fab fa-cc-amex</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-apple-pay"></i></a><span>fab fa-cc-apple-pay</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-diners-club"></i></a><span>fab fa-cc-diners-club</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-discover"></i></a><span>fab fa-cc-discover</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-jcb"></i></a><span>fab fa-cc-jcb</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-mastercard"></i></a><span>fab fa-cc-mastercard</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-paypal"></i></a><span>fab fa-cc-paypal</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-stripe"></i></a><span>fab fa-cc-stripe</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cc-visa"></i></a><span>fab fa-cc-visa</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-centercode"></i></a><span>fab fa-centercode</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-chrome"></i></a><span>fab fa-chrome</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cloudscale"></i></a><span>fab fa-cloudscale</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cloudsmith"></i></a><span>fab fa-cloudsmith</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cloudversify"></i></a><span>fab fa-cloudversify</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-codepen"></i></a><span>fab fa-codepen</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-codiepie"></i></a><span>fab fa-codiepie</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-connectdevelop"></i></a><span>fab fa-connectdevelop</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-contao"></i></a><span>fab fa-contao</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cpanel"></i></a><span>fab fa-cpanel</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-creative-commons"></i></a><span>fab fa-creative-commons</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-css3"></i></a><span>fab fa-css3</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-css3-alt"></i></a><span>fab fa-css3-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-cuttlefish"></i></a><span>fab fa-cuttlefish</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-d-and-d"></i></a><span>fab fa-d-and-d</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-dashcube"></i></a><span>fab fa-dashcube</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-delicious"></i></a><span>fab fa-delicious</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-deploydog"></i></a><span>fab fa-deploydog</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-deskpro"></i></a><span>fab fa-deskpro</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-deviantart"></i></a><span>fab fa-deviantart</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-digg"></i></a><span>fab fa-digg</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-digital-ocean"></i></a><span>fab fa-digital-ocean</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-discord"></i></a><span>fab fa-discord</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-discourse"></i></a><span>fab fa-discourse</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-dochub"></i></a><span>fab fa-dochub</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-docker"></i></a><span>fab fa-docker</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-draft2digital"></i></a><span>fab fa-draft2digital</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-dribbble"></i></a><span>fab fa-dribbble</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-dribbble-square"></i></a><span>fab fa-dribbble-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-dropbox"></i></a><span>fab fa-dropbox</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-drupal"></i></a><span>fab fa-drupal</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-dyalog"></i></a><span>fab fa-dyalog</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-earlybirds"></i></a><span>fab fa-earlybirds</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-edge"></i></a><span>fab fa-edge</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-elementor"></i></a><span>fab fa-elementor</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-ember"></i></a><span>fab fa-ember</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-empire"></i></a><span>fab fa-empire</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-envira"></i></a><span>fab fa-envira</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-erlang"></i></a><span>fab fa-erlang</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-ethereum"></i></a><span>fab fa-ethereum</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-etsy"></i></a><span>fab fa-etsy</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-expeditedssl"></i></a><span>fab fa-expeditedssl</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-facebook"></i></a><span>fab fa-facebook</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-facebook-f"></i></a><span>fab fa-facebook-f</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-facebook-messenger"></i></a><span>fab fa-facebook-messenger</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-facebook-square"></i></a><span>fab fa-facebook-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-firefox"></i></a><span>fab fa-firefox</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-first-order"></i></a><span>fab fa-first-order</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-firstdraft"></i></a><span>fab fa-firstdraft</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-flickr"></i></a><span>fab fa-flickr</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-flipboard"></i></a><span>fab fa-flipboard</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-fly"></i></a><span>fab fa-fly</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-font-awesome"></i></a><span>fab fa-font-awesome</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-font-awesome-alt"></i></a><span>fab fa-font-awesome-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-font-awesome-flag"></i></a><span>fab fa-font-awesome-flag</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-fonticons"></i></a><span>fab fa-fonticons</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-fonticons-fi"></i></a><span>fab fa-fonticons-fi</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-fort-awesome"></i></a><span>fab fa-fort-awesome</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-fort-awesome-alt"></i></a><span>fab fa-fort-awesome-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-forumbee"></i></a><span>fab fa-forumbee</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-foursquare"></i></a><span>fab fa-foursquare</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-free-code-camp"></i></a><span>fab fa-free-code-camp</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-freebsd"></i></a><span>fab fa-freebsd</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-get-pocket"></i></a><span>fab fa-get-pocket</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gg"></i></a><span>fab fa-gg</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gg-circle"></i></a><span>fab fa-gg-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-git"></i></a><span>fab fa-git</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-git-square"></i></a><span>fab fa-git-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-github"></i></a><span>fab fa-github</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-github-alt"></i></a><span>fab fa-github-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-github-square"></i></a><span>fab fa-github-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gitkraken"></i></a><span>fab fa-gitkraken</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gitlab"></i></a><span>fab fa-gitlab</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gitter"></i></a><span>fab fa-gitter</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-glide"></i></a><span>fab fa-glide</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-glide-g"></i></a><span>fab fa-glide-g</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gofore"></i></a><span>fab fa-gofore</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-goodreads"></i></a><span>fab fa-goodreads</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-goodreads-g"></i></a><span>fab fa-goodreads-g</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-google"></i></a><span>fab fa-google</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-google-drive"></i></a><span>fab fa-google-drive</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-google-play"></i></a><span>fab fa-google-play</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-google-plus"></i></a><span>fab fa-google-plus</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-google-plus-g"></i></a><span>fab fa-google-plus-g</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-google-plus-square"></i></a><span>fab fa-google-plus-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-google-wallet"></i></a><span>fab fa-google-wallet</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gratipay"></i></a><span>fab fa-gratipay</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-grav"></i></a><span>fab fa-grav</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gripfire"></i></a><span>fab fa-gripfire</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-grunt"></i></a><span>fab fa-grunt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-gulp"></i></a><span>fab fa-gulp</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-hacker-news"></i></a><span>fab fa-hacker-news</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-hacker-news-square"></i></a><span>fab fa-hacker-news-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-hips"></i></a><span>fab fa-hips</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-hire-a-helper"></i></a><span>fab fa-hire-a-helper</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-hooli"></i></a><span>fab fa-hooli</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-hotjar"></i></a><span>fab fa-hotjar</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-houzz"></i></a><span>fab fa-houzz</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-html5"></i></a><span>fab fa-html5</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-hubspot"></i></a><span>fab fa-hubspot</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-imdb"></i></a><span>fab fa-imdb</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-instagram"></i></a><span>fab fa-instagram</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-internet-explorer"></i></a><span>fab fa-internet-explorer</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-ioxhost"></i></a><span>fab fa-ioxhost</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-itunes"></i></a><span>fab fa-itunes</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-itunes-note"></i></a><span>fab fa-itunes-note</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-jenkins"></i></a><span>fab fa-jenkins</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-joget"></i></a><span>fab fa-joget</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-joomla"></i></a><span>fab fa-joomla</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-js"></i></a><span>fab fa-js</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-js-square"></i></a><span>fab fa-js-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-jsfiddle"></i></a><span>fab fa-jsfiddle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-keycdn"></i></a><span>fab fa-keycdn</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-kickstarter"></i></a><span>fab fa-kickstarter</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-kickstarter-k"></i></a><span>fab fa-kickstarter-k</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-korvue"></i></a><span>fab fa-korvue</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-laravel"></i></a><span>fab fa-laravel</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-lastfm"></i></a><span>fab fa-lastfm</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-lastfm-square"></i></a><span>fab fa-lastfm-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-leanpub"></i></a><span>fab fa-leanpub</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-less"></i></a><span>fab fa-less</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-line"></i></a><span>fab fa-line</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-linkedin"></i></a><span>fab fa-linkedin</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-linkedin-in"></i></a><span>fab fa-linkedin-in</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-linode"></i></a><span>fab fa-linode</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-linux"></i></a><span>fab fa-linux</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-lyft"></i></a><span>fab fa-lyft</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-magento"></i></a><span>fab fa-magento</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-maxcdn"></i></a><span>fab fa-maxcdn</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-medapps"></i></a><span>fab fa-medapps</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-medium"></i></a><span>fab fa-medium</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-medium-m"></i></a><span>fab fa-medium-m</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-medrt"></i></a><span>fab fa-medrt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-meetup"></i></a><span>fab fa-meetup</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-microsoft"></i></a><span>fab fa-microsoft</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-mix"></i></a><span>fab fa-mix</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-mixcloud"></i></a><span>fab fa-mixcloud</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-mizuni"></i></a><span>fab fa-mizuni</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-modx"></i></a><span>fab fa-modx</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-monero"></i></a><span>fab fa-monero</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-napster"></i></a><span>fab fa-napster</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-nintendo-switch"></i></a><span>fab fa-nintendo-switch</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-node"></i></a><span>fab fa-node</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-node-js"></i></a><span>fab fa-node-js</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-npm"></i></a><span>fab fa-npm</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-ns8"></i></a><span>fab fa-ns8</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-nutritionix"></i></a><span>fab fa-nutritionix</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-odnoklassniki"></i></a><span>fab fa-odnoklassniki</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-odnoklassniki-square"></i></a><span>fab fa-odnoklassniki-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-opencart"></i></a><span>fab fa-opencart</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-openid"></i></a><span>fab fa-openid</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-opera"></i></a><span>fab fa-opera</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-optin-monster"></i></a><span>fab fa-optin-monster</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-osi"></i></a><span>fab fa-osi</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-page4"></i></a><span>fab fa-page4</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pagelines"></i></a><span>fab fa-pagelines</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-palfed"></i></a><span>fab fa-palfed</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-patreon"></i></a><span>fab fa-patreon</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-paypal"></i></a><span>fab fa-paypal</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-periscope"></i></a><span>fab fa-periscope</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-phabricator"></i></a><span>fab fa-phabricator</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-phoenix-framework"></i></a><span>fab fa-phoenix-framework</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-php"></i></a><span>fab fa-php</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pied-piper"></i></a><span>fab fa-pied-piper</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pied-piper-alt"></i></a><span>fab fa-pied-piper-alt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pied-piper-pp"></i></a><span>fab fa-pied-piper-pp</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pinterest"></i></a><span>fab fa-pinterest</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pinterest-p"></i></a><span>fab fa-pinterest-p</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pinterest-square"></i></a><span>fab fa-pinterest-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-playstation"></i></a><span>fab fa-playstation</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-product-hunt"></i></a><span>fab fa-product-hunt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-pushed"></i></a><span>fab fa-pushed</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-python"></i></a><span>fab fa-python</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-qq"></i></a><span>fab fa-qq</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-quinscape"></i></a><span>fab fa-quinscape</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-quora"></i></a><span>fab fa-quora</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-ravelry"></i></a><span>fab fa-ravelry</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-react"></i></a><span>fab fa-react</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-readme"></i></a><span>fab fa-readme</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-rebel"></i></a><span>fab fa-rebel</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-red-river"></i></a><span>fab fa-red-river</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-reddit"></i></a><span>fab fa-reddit</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-reddit-alien"></i></a><span>fab fa-reddit-alien</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-reddit-square"></i></a><span>fab fa-reddit-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-rendact"></i></a><span>fab fa-rendact</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-renren"></i></a><span>fab fa-renren</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-replyd"></i></a><span>fab fa-replyd</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-resolving"></i></a><span>fab fa-resolving</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-rocketchat"></i></a><span>fab fa-rocketchat</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-rockrms"></i></a><span>fab fa-rockrms</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-safari"></i></a><span>fab fa-safari</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-sass"></i></a><span>fab fa-sass</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-schlix"></i></a><span>fab fa-schlix</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-scribd"></i></a><span>fab fa-scribd</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-searchengin"></i></a><span>fab fa-searchengin</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-sellcast"></i></a><span>fab fa-sellcast</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-sellsy"></i></a><span>fab fa-sellsy</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-servicestack"></i></a><span>fab fa-servicestack</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-shirtsinbulk"></i></a><span>fab fa-shirtsinbulk</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-simplybuilt"></i></a><span>fab fa-simplybuilt</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-sistrix"></i></a><span>fab fa-sistrix</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-skyatlas"></i></a><span>fab fa-skyatlas</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-skype"></i></a><span>fab fa-skype</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-slack"></i></a><span>fab fa-slack</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-slack-hash"></i></a><span>fab fa-slack-hash</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-slideshare"></i></a><span>fab fa-slideshare</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-snapchat"></i></a><span>fab fa-snapchat</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-snapchat-ghost"></i></a><span>fab fa-snapchat-ghost</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-snapchat-square"></i></a><span>fab fa-snapchat-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-soundcloud"></i></a><span>fab fa-soundcloud</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-speakap"></i></a><span>fab fa-speakap</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-spotify"></i></a><span>fab fa-spotify</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-stack-exchange"></i></a><span>fab fa-stack-exchange</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-stack-overflow"></i></a><span>fab fa-stack-overflow</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-staylinked"></i></a><span>fab fa-staylinked</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-steam"></i></a><span>fab fa-steam</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-steam-square"></i></a><span>fab fa-steam-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-steam-symbol"></i></a><span>fab fa-steam-symbol</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-sticker-mule"></i></a><span>fab fa-sticker-mule</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-strava"></i></a><span>fab fa-strava</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-stripe"></i></a><span>fab fa-stripe</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-stripe-s"></i></a><span>fab fa-stripe-s</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-studiovinari"></i></a><span>fab fa-studiovinari</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-stumbleupon"></i></a><span>fab fa-stumbleupon</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-stumbleupon-circle"></i></a><span>fab fa-stumbleupon-circle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-superpowers"></i></a><span>fab fa-superpowers</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-supple"></i></a><span>fab fa-supple</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-telegram"></i></a><span>fab fa-telegram</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-telegram-plane"></i></a><span>fab fa-telegram-plane</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-tencent-weibo"></i></a><span>fab fa-tencent-weibo</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-themeisle"></i></a><span>fab fa-themeisle</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-trello"></i></a><span>fab fa-trello</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-tripadvisor"></i></a><span>fab fa-tripadvisor</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-tumblr"></i></a><span>fab fa-tumblr</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-tumblr-square"></i></a><span>fab fa-tumblr-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-twitch"></i></a><span>fab fa-twitch</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-twitter"></i></a><span>fab fa-twitter</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-twitter-square"></i></a><span>fab fa-twitter-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-typo3"></i></a><span>fab fa-typo3</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-uber"></i></a><span>fab fa-uber</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-uikit"></i></a><span>fab fa-uikit</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-uniregistry"></i></a><span>fab fa-uniregistry</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-untappd"></i></a><span>fab fa-untappd</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-usb"></i></a><span>fab fa-usb</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-ussunnah"></i></a><span>fab fa-ussunnah</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vaadin"></i></a><span>fab fa-vaadin</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-viacoin"></i></a><span>fab fa-viacoin</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-viadeo"></i></a><span>fab fa-viadeo</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-viber"></i></a><span>fab fa-viber</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vimeo"></i></a><span>fab fa-vimeo</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vimeo-square"></i></a><span>fab fa-vimeo-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vimeo-v"></i></a><span>fab fa-vimeo-v</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vine"></i></a><span>fab fa-vine</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vk"></i></a><span>fab fa-vk</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vnv"></i></a><span>fab fa-vnv</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-vuejs"></i></a><span>fab fa-vuejs</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-weibo"></i></a><span>fab fa-weibo</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-weixin"></i></a><span>fab fa-weixin</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-whatsapp"></i></a><span>fab fa-whatsapp</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-whatsapp-square"></i></a><span>fab fa-whatsapp-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-whmcs"></i></a><span>fab fa-whmcs</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-wikipedia-w"></i></a><span>fab fa-wikipedia-w</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-windows"></i></a><span>fab fa-windows</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-wordpress"></i></a><span>fab fa-wordpress</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-wordpress-simple"></i></a><span>fab fa-wordpress-simple</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-wpbeginner"></i></a><span>fab fa-wpbeginner</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-wpexplorer"></i></a><span>fab fa-wpexplorer</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-wpforms"></i></a><span>fab fa-wpforms</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-xbox"></i></a><span>fab fa-xbox</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-xing"></i></a><span>fab fa-xing</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-xing-square"></i></a><span>fab fa-xing-square</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-y-combinator"></i></a><span>fab fa-y-combinator</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-yahoo"></i></a><span>fab fa-yahoo</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-yandex"></i></a><span>fab fa-yandex</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-yandex-international"></i></a><span>fab fa-yandex-international</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-yelp"></i></a><span>fab fa-yelp</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-yoast"></i></a><span>fab fa-yoast</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-youtube"></i></a><span>fab fa-youtube</span></div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"><i class="fab fa-youtube-square"></i></a><span>fab fa-youtube-square</span></div>
                                </div>
                            </div>
                        </div>
					<!--</div>-->
              </div>
			
              <!-- /#fa-icons -->

              <div class="tab-pane" id="material_icon">
                	<div class="card">
                            <div class="card-body" >
                                <h4 class="card-title">Material Icons</h4>
                                <h6 class="card-subtitle">you can use any icon with class of <code>mid mid-</code>name of icon</h6>
                                <div class="material-icon-list-demo">
                                    <div class="icons" id="icons" >
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-access-point"></i></a><code>f002</code><span>mdi-access-point</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-access-point-network"></i></a><code>f003</code><span>mdi-access-point-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account"></i></a><code>f004</code><span>mdi-account</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-alert"></i></a><code>f005</code><span>mdi-account-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-box"></i></a><code>f006</code><span>mdi-account-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-box-outline"></i></a><code>f007</code><span>mdi-account-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-card-details"></i></a><code>f5d2</code><span>mdi-account-card-details</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-check"></i></a><code>f008</code><span>mdi-account-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-circle"></i></a><code>f009</code><span>mdi-account-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-convert"></i></a><code>f00a</code><span>mdi-account-convert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-edit"></i></a><code>f6bb</code><span>mdi-account-edit</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-key"></i></a><code>f00b</code><span>mdi-account-key</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-location"></i></a><code>f00c</code><span>mdi-account-location</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-minus"></i></a><code>f00d</code><span>mdi-account-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-multiple"></i></a><code>f00e</code><span>mdi-account-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-multiple-minus"></i></a><code>f5d3</code><span>mdi-account-multiple-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-multiple-outline"></i></a><code>f00f</code><span>mdi-account-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-multiple-plus"></i></a><code>f010</code><span>mdi-account-multiple-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-network"></i></a><code>f011</code><span>mdi-account-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-off"></i></a><code>f012</code><span>mdi-account-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-outline"></i></a><code>f013</code><span>mdi-account-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-plus"></i></a><code>f014</code><span>mdi-account-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-remove"></i></a><code>f015</code><span>mdi-account-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-search"></i></a><code>f016</code><span>mdi-account-search</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-settings"></i></a><code>f630</code><span>mdi-account-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-settings-variant"></i></a><code>f631</code><span>mdi-account-settings-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-star"></i></a><code>f017</code><span>mdi-account-star</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-star-variant"></i></a><code>f018</code><span>mdi-account-star-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-account-switch"></i></a><code>f019</code><span>mdi-account-switch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-adjust"></i></a><code>f01a</code><span>mdi-adjust</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-air-conditioner"></i></a><code>f01b</code><span>mdi-air-conditioner</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-airballoon"></i></a><code>f01c</code><span>mdi-airballoon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-airplane"></i></a><code>f01d</code><span>mdi-airplane</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-airplane-landing"></i></a><code>f5d4</code><span>mdi-airplane-landing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-airplane-off"></i></a><code>f01e</code><span>mdi-airplane-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-airplane-takeoff"></i></a><code>f5d5</code><span>mdi-airplane-takeoff</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-airplay"></i></a><code>f01f</code><span>mdi-airplay</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alarm"></i></a><code>f020</code><span>mdi-alarm</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alarm-check"></i></a><code>f021</code><span>mdi-alarm-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alarm-multiple"></i></a><code>f022</code><span>mdi-alarm-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alarm-off"></i></a><code>f023</code><span>mdi-alarm-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alarm-plus"></i></a><code>f024</code><span>mdi-alarm-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alarm-snooze"></i></a><code>f68d</code><span>mdi-alarm-snooze</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-album"></i></a><code>f025</code><span>mdi-album</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alert"></i></a><code>f026</code><span>mdi-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alert-box"></i></a><code>f027</code><span>mdi-alert-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alert-circle"></i></a><code>f028</code><span>mdi-alert-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alert-circle-outline"></i></a><code>f5d6</code><span>mdi-alert-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alert-octagon"></i></a><code>f029</code><span>mdi-alert-octagon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alert-octagram"></i></a><code>f6bc</code><span>mdi-alert-octagram</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alert-outline"></i></a><code>f02a</code><span>mdi-alert-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-all-inclusive"></i></a><code>f6bd</code><span>mdi-all-inclusive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alpha"></i></a><code>f02b</code><span>mdi-alpha</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-alphabetical"></i></a><code>f02c</code><span>mdi-alphabetical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-altimeter"></i></a><code>f5d7</code><span>mdi-altimeter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-amazon"></i></a><code>f02d</code><span>mdi-amazon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-amazon-clouddrive"></i></a><code>f02e</code><span>mdi-amazon-clouddrive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ambulance"></i></a><code>f02f</code><span>mdi-ambulance</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-amplifier"></i></a><code>f030</code><span>mdi-amplifier</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-anchor"></i></a><code>f031</code><span>mdi-anchor</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-android"></i></a><code>f032</code><span>mdi-android</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-android-debug-bridge"></i></a><code>f033</code><span>mdi-android-debug-bridge</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-android-studio"></i></a><code>f034</code><span>mdi-android-studio</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-angular"></i></a><code>f6b1</code><span>mdi-angular</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-angularjs"></i></a><code>f6be</code><span>mdi-angularjs</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-animation"></i></a><code>f5d8</code><span>mdi-animation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple"></i></a><code>f035</code><span>mdi-apple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-finder"></i></a><code>f036</code><span>mdi-apple-finder</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-ios"></i></a><code>f037</code><span>mdi-apple-ios</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-keyboard-caps"></i></a><code>f632</code><span>mdi-apple-keyboard-caps</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-keyboard-command"></i></a><code>f633</code><span>mdi-apple-keyboard-command</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-keyboard-control"></i></a><code>f634</code><span>mdi-apple-keyboard-control</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-keyboard-option"></i></a><code>f635</code><span>mdi-apple-keyboard-option</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-keyboard-shift"></i></a><code>f636</code><span>mdi-apple-keyboard-shift</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-mobileme"></i></a><code>f038</code><span>mdi-apple-mobileme</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apple-safari"></i></a><code>f039</code><span>mdi-apple-safari</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-application"></i></a><code>f614</code><span>mdi-application</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-apps"></i></a><code>f03b</code><span>mdi-apps</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-archive"></i></a><code>f03c</code><span>mdi-archive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrange-bring-forward"></i></a><code>f03d</code><span>mdi-arrange-bring-forward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrange-bring-to-front"></i></a><code>f03e</code><span>mdi-arrange-bring-to-front</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrange-send-backward"></i></a><code>f03f</code><span>mdi-arrange-send-backward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrange-send-to-back"></i></a><code>f040</code><span>mdi-arrange-send-to-back</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-all"></i></a><code>f041</code><span>mdi-arrow-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-bottom-left"></i></a><code>f042</code><span>mdi-arrow-bottom-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-bottom-right"></i></a><code>f043</code><span>mdi-arrow-bottom-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-compress"></i></a><code>f615</code><span>mdi-arrow-compress</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-compress-all"></i></a><code>f044</code><span>mdi-arrow-compress-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down"></i></a><code>f045</code><span>mdi-arrow-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down-bold"></i></a><code>f046</code><span>mdi-arrow-down-bold</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down-bold-circle"></i></a><code>f047</code><span>mdi-arrow-down-bold-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down-bold-circle-outline"></i></a><code>f048</code><span>mdi-arrow-down-bold-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i></a><code>f049</code><span>mdi-arrow-down-bold-hexagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down-box"></i></a><code>f6bf</code><span>mdi-arrow-down-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down-drop-circle"></i></a><code>f04a</code><span>mdi-arrow-down-drop-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-down-drop-circle-outline"></i></a><code>f04b</code><span>mdi-arrow-down-drop-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-expand"></i></a><code>f616</code><span>mdi-arrow-expand</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-expand-all"></i></a><code>f04c</code><span>mdi-arrow-expand-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left"></i></a><code>f04d</code><span>mdi-arrow-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left-bold"></i></a><code>f04e</code><span>mdi-arrow-left-bold</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left-bold-circle"></i></a><code>f04f</code><span>mdi-arrow-left-bold-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left-bold-circle-outline"></i></a><code>f050</code><span>mdi-arrow-left-bold-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left-bold-hexagon-outline"></i></a><code>f051</code><span>mdi-arrow-left-bold-hexagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left-box"></i></a><code>f6c0</code><span>mdi-arrow-left-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left-drop-circle"></i></a><code>f052</code><span>mdi-arrow-left-drop-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-left-drop-circle-outline"></i></a><code>f053</code><span>mdi-arrow-left-drop-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right"></i></a><code>f054</code><span>mdi-arrow-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right-bold"></i></a><code>f055</code><span>mdi-arrow-right-bold</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right-bold-circle"></i></a><code>f056</code><span>mdi-arrow-right-bold-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right-bold-circle-outline"></i></a><code>f057</code><span>mdi-arrow-right-bold-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i></a><code>f058</code><span>mdi-arrow-right-bold-hexagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right-box"></i></a><code>f6c1</code><span>mdi-arrow-right-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right-drop-circle"></i></a><code>f059</code><span>mdi-arrow-right-drop-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-right-drop-circle-outline"></i></a><code>f05a</code><span>mdi-arrow-right-drop-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-top-left"></i></a><code>f05b</code><span>mdi-arrow-top-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-top-right"></i></a><code>f05c</code><span>mdi-arrow-top-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up"></i></a><code>f05d</code><span>mdi-arrow-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up-bold"></i></a><code>f05e</code><span>mdi-arrow-up-bold</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up-bold-circle"></i></a><code>f05f</code><span>mdi-arrow-up-bold-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up-bold-circle-outline"></i></a><code>f060</code><span>mdi-arrow-up-bold-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up-bold-hexagon-outline"></i></a><code>f061</code><span>mdi-arrow-up-bold-hexagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up-box"></i></a><code>f6c2</code><span>mdi-arrow-up-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up-drop-circle"></i></a><code>f062</code><span>mdi-arrow-up-drop-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-arrow-up-drop-circle-outline"></i></a><code>f063</code><span>mdi-arrow-up-drop-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-assistant"></i></a><code>f064</code><span>mdi-assistant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-asterisk"></i></a><code>f6c3</code><span>mdi-asterisk</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-at"></i></a><code>f065</code><span>mdi-at</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-attachment"></i></a><code>f066</code><span>mdi-attachment</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-audiobook"></i></a><code>f067</code><span>mdi-audiobook</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-auto-fix"></i></a><code>f068</code><span>mdi-auto-fix</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-auto-upload"></i></a><code>f069</code><span>mdi-auto-upload</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-autorenew"></i></a><code>f06a</code><span>mdi-autorenew</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-av-timer"></i></a><code>f06b</code><span>mdi-av-timer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-baby"></i></a><code>f06c</code><span>mdi-baby</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-baby-buggy"></i></a><code>f68e</code><span>mdi-baby-buggy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-backburger"></i></a><code>f06d</code><span>mdi-backburger</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-backspace"></i></a><code>f06e</code><span>mdi-backspace</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-backup-restore"></i></a><code>f06f</code><span>mdi-backup-restore</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bandcamp"></i></a><code>f674</code><span>mdi-bandcamp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bank"></i></a><code>f070</code><span>mdi-bank</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-barcode"></i></a><code>f071</code><span>mdi-barcode</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-barcode-scan"></i></a><code>f072</code><span>mdi-barcode-scan</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-barley"></i></a><code>f073</code><span>mdi-barley</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-barrel"></i></a><code>f074</code><span>mdi-barrel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-basecamp"></i></a><code>f075</code><span>mdi-basecamp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-basket"></i></a><code>f076</code><span>mdi-basket</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-basket-fill"></i></a><code>f077</code><span>mdi-basket-fill</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-basket-unfill"></i></a><code>f078</code><span>mdi-basket-unfill</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery"></i></a><code>f079</code><span>mdi-battery</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-10"></i></a><code>f07a</code><span>mdi-battery-10</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-20"></i></a><code>f07b</code><span>mdi-battery-20</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-30"></i></a><code>f07c</code><span>mdi-battery-30</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-40"></i></a><code>f07d</code><span>mdi-battery-40</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-50"></i></a><code>f07e</code><span>mdi-battery-50</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-60"></i></a><code>f07f</code><span>mdi-battery-60</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-70"></i></a><code>f080</code><span>mdi-battery-70</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-80"></i></a><code>f081</code><span>mdi-battery-80</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-90"></i></a><code>f082</code><span>mdi-battery-90</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-alert"></i></a><code>f083</code><span>mdi-battery-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging"></i></a><code>f084</code><span>mdi-battery-charging</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging-100"></i></a><code>f085</code><span>mdi-battery-charging-100</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging-20"></i></a><code>f086</code><span>mdi-battery-charging-20</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging-30"></i></a><code>f087</code><span>mdi-battery-charging-30</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging-40"></i></a><code>f088</code><span>mdi-battery-charging-40</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging-60"></i></a><code>f089</code><span>mdi-battery-charging-60</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging-80"></i></a><code>f08a</code><span>mdi-battery-charging-80</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-charging-90"></i></a><code>f08b</code><span>mdi-battery-charging-90</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-minus"></i></a><code>f08c</code><span>mdi-battery-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-negative"></i></a><code>f08d</code><span>mdi-battery-negative</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-outline"></i></a><code>f08e</code><span>mdi-battery-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-plus"></i></a><code>f08f</code><span>mdi-battery-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-positive"></i></a><code>f090</code><span>mdi-battery-positive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-battery-unknown"></i></a><code>f091</code><span>mdi-battery-unknown</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-beach"></i></a><code>f092</code><span>mdi-beach</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-beaker"></i></a><code>f68f</code><span>mdi-beaker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-beats"></i></a><code>f097</code><span>mdi-beats</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-beer"></i></a><code>f098</code><span>mdi-beer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-behance"></i></a><code>f099</code><span>mdi-behance</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bell"></i></a><code>f09a</code><span>mdi-bell</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bell-off"></i></a><code>f09b</code><span>mdi-bell-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bell-outline"></i></a><code>f09c</code><span>mdi-bell-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bell-plus"></i></a><code>f09d</code><span>mdi-bell-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bell-ring"></i></a><code>f09e</code><span>mdi-bell-ring</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bell-ring-outline"></i></a><code>f09f</code><span>mdi-bell-ring-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bell-sleep"></i></a><code>f0a0</code><span>mdi-bell-sleep</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-beta"></i></a><code>f0a1</code><span>mdi-beta</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bible"></i></a><code>f0a2</code><span>mdi-bible</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bike"></i></a><code>f0a3</code><span>mdi-bike</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bing"></i></a><code>f0a4</code><span>mdi-bing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-binoculars"></i></a><code>f0a5</code><span>mdi-binoculars</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bio"></i></a><code>f0a6</code><span>mdi-bio</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-biohazard"></i></a><code>f0a7</code><span>mdi-biohazard</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bitbucket"></i></a><code>f0a8</code><span>mdi-bitbucket</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-black-mesa"></i></a><code>f0a9</code><span>mdi-black-mesa</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blackberry"></i></a><code>f0aa</code><span>mdi-blackberry</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blender"></i></a><code>f0ab</code><span>mdi-blender</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blinds"></i></a><code>f0ac</code><span>mdi-blinds</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-block-helper"></i></a><code>f0ad</code><span>mdi-block-helper</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blogger"></i></a><code>f0ae</code><span>mdi-blogger</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bluetooth"></i></a><code>f0af</code><span>mdi-bluetooth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bluetooth-audio"></i></a><code>f0b0</code><span>mdi-bluetooth-audio</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bluetooth-connect"></i></a><code>f0b1</code><span>mdi-bluetooth-connect</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bluetooth-off"></i></a><code>f0b2</code><span>mdi-bluetooth-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bluetooth-settings"></i></a><code>f0b3</code><span>mdi-bluetooth-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bluetooth-transfer"></i></a><code>f0b4</code><span>mdi-bluetooth-transfer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blur"></i></a><code>f0b5</code><span>mdi-blur</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blur-linear"></i></a><code>f0b6</code><span>mdi-blur-linear</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blur-off"></i></a><code>f0b7</code><span>mdi-blur-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-blur-radial"></i></a><code>f0b8</code><span>mdi-blur-radial</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bomb"></i></a><code>f690</code><span>mdi-bomb</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bomb-off"></i></a><code>f6c4</code><span>mdi-bomb-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bone"></i></a><code>f0b9</code><span>mdi-bone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book"></i></a><code>f0ba</code><span>mdi-book</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-minus"></i></a><code>f5d9</code><span>mdi-book-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-multiple"></i></a><code>f0bb</code><span>mdi-book-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-multiple-variant"></i></a><code>f0bc</code><span>mdi-book-multiple-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-open"></i></a><code>f0bd</code><span>mdi-book-open</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-open-page-variant"></i></a><code>f5da</code><span>mdi-book-open-page-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-open-variant"></i></a><code>f0be</code><span>mdi-book-open-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-plus"></i></a><code>f5db</code><span>mdi-book-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-book-variant"></i></a><code>f0bf</code><span>mdi-book-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bookmark"></i></a><code>f0c0</code><span>mdi-bookmark</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bookmark-check"></i></a><code>f0c1</code><span>mdi-bookmark-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bookmark-music"></i></a><code>f0c2</code><span>mdi-bookmark-music</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bookmark-outline"></i></a><code>f0c3</code><span>mdi-bookmark-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bookmark-plus"></i></a><code>f0c5</code><span>mdi-bookmark-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bookmark-plus-outline"></i></a><code>f0c4</code><span>mdi-bookmark-plus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bookmark-remove"></i></a><code>f0c6</code><span>mdi-bookmark-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-boombox"></i></a><code>f5dc</code><span>mdi-boombox</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bootstrap"></i></a><code>f6c5</code><span>mdi-bootstrap</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-all"></i></a><code>f0c7</code><span>mdi-border-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-bottom"></i></a><code>f0c8</code><span>mdi-border-bottom</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-color"></i></a><code>f0c9</code><span>mdi-border-color</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-horizontal"></i></a><code>f0ca</code><span>mdi-border-horizontal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-inside"></i></a><code>f0cb</code><span>mdi-border-inside</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-left"></i></a><code>f0cc</code><span>mdi-border-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-none"></i></a><code>f0cd</code><span>mdi-border-none</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-outside"></i></a><code>f0ce</code><span>mdi-border-outside</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-right"></i></a><code>f0cf</code><span>mdi-border-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-style"></i></a><code>f0d0</code><span>mdi-border-style</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-top"></i></a><code>f0d1</code><span>mdi-border-top</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-border-vertical"></i></a><code>f0d2</code><span>mdi-border-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bow-tie"></i></a><code>f677</code><span>mdi-bow-tie</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bowl"></i></a><code>f617</code><span>mdi-bowl</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bowling"></i></a><code>f0d3</code><span>mdi-bowling</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-box"></i></a><code>f0d4</code><span>mdi-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-box-cutter"></i></a><code>f0d5</code><span>mdi-box-cutter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-box-shadow"></i></a><code>f637</code><span>mdi-box-shadow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bridge"></i></a><code>f618</code><span>mdi-bridge</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-briefcase"></i></a><code>f0d6</code><span>mdi-briefcase</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-briefcase-check"></i></a><code>f0d7</code><span>mdi-briefcase-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-briefcase-download"></i></a><code>f0d8</code><span>mdi-briefcase-download</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-briefcase-upload"></i></a><code>f0d9</code><span>mdi-briefcase-upload</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-1"></i></a><code>f0da</code><span>mdi-brightness-1</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-2"></i></a><code>f0db</code><span>mdi-brightness-2</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-3"></i></a><code>f0dc</code><span>mdi-brightness-3</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-4"></i></a><code>f0dd</code><span>mdi-brightness-4</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-5"></i></a><code>f0de</code><span>mdi-brightness-5</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-6"></i></a><code>f0df</code><span>mdi-brightness-6</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-7"></i></a><code>f0e0</code><span>mdi-brightness-7</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brightness-auto"></i></a><code>f0e1</code><span>mdi-brightness-auto</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-broom"></i></a><code>f0e2</code><span>mdi-broom</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-brush"></i></a><code>f0e3</code><span>mdi-brush</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-buffer"></i></a><code>f619</code><span>mdi-buffer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bug"></i></a><code>f0e4</code><span>mdi-bug</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bulletin-board"></i></a><code>f0e5</code><span>mdi-bulletin-board</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bullhorn"></i></a><code>f0e6</code><span>mdi-bullhorn</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bullseye"></i></a><code>f5dd</code><span>mdi-bullseye</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-burst-mode"></i></a><code>f5de</code><span>mdi-burst-mode</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-bus"></i></a><code>f0e7</code><span>mdi-bus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cached"></i></a><code>f0e8</code><span>mdi-cached</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cake"></i></a><code>f0e9</code><span>mdi-cake</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cake-layered"></i></a><code>f0ea</code><span>mdi-cake-layered</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cake-variant"></i></a><code>f0eb</code><span>mdi-cake-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calculator"></i></a><code>f0ec</code><span>mdi-calculator</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar"></i></a><code>f0ed</code><span>mdi-calendar</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-blank"></i></a><code>f0ee</code><span>mdi-calendar-blank</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-check"></i></a><code>f0ef</code><span>mdi-calendar-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-clock"></i></a><code>f0f0</code><span>mdi-calendar-clock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-multiple"></i></a><code>f0f1</code><span>mdi-calendar-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-multiple-check"></i></a><code>f0f2</code><span>mdi-calendar-multiple-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-plus"></i></a><code>f0f3</code><span>mdi-calendar-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-question"></i></a><code>f691</code><span>mdi-calendar-question</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-range"></i></a><code>f678</code><span>mdi-calendar-range</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-remove"></i></a><code>f0f4</code><span>mdi-calendar-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-text"></i></a><code>f0f5</code><span>mdi-calendar-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-calendar-today"></i></a><code>f0f6</code><span>mdi-calendar-today</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-call-made"></i></a><code>f0f7</code><span>mdi-call-made</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-call-merge"></i></a><code>f0f8</code><span>mdi-call-merge</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-call-missed"></i></a><code>f0f9</code><span>mdi-call-missed</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-call-received"></i></a><code>f0fa</code><span>mdi-call-received</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-call-split"></i></a><code>f0fb</code><span>mdi-call-split</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camcorder"></i></a><code>f0fc</code><span>mdi-camcorder</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camcorder-box"></i></a><code>f0fd</code><span>mdi-camcorder-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camcorder-box-off"></i></a><code>f0fe</code><span>mdi-camcorder-box-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camcorder-off"></i></a><code>f0ff</code><span>mdi-camcorder-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera"></i></a><code>f100</code><span>mdi-camera</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-burst"></i></a><code>f692</code><span>mdi-camera-burst</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-enhance"></i></a><code>f101</code><span>mdi-camera-enhance</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-front"></i></a><code>f102</code><span>mdi-camera-front</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-front-variant"></i></a><code>f103</code><span>mdi-camera-front-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-iris"></i></a><code>f104</code><span>mdi-camera-iris</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-off"></i></a><code>f5df</code><span>mdi-camera-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-party-mode"></i></a><code>f105</code><span>mdi-camera-party-mode</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-rear"></i></a><code>f106</code><span>mdi-camera-rear</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-rear-variant"></i></a><code>f107</code><span>mdi-camera-rear-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-switch"></i></a><code>f108</code><span>mdi-camera-switch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-camera-timer"></i></a><code>f109</code><span>mdi-camera-timer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-candle"></i></a><code>f5e2</code><span>mdi-candle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-candycane"></i></a><code>f10a</code><span>mdi-candycane</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-car"></i></a><code>f10b</code><span>mdi-car</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-car-battery"></i></a><code>f10c</code><span>mdi-car-battery</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-car-connected"></i></a><code>f10d</code><span>mdi-car-connected</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-car-wash"></i></a><code>f10e</code><span>mdi-car-wash</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cards"></i></a><code>f638</code><span>mdi-cards</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cards-outline"></i></a><code>f639</code><span>mdi-cards-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cards-playing-outline"></i></a><code>f63a</code><span>mdi-cards-playing-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cards-variant"></i></a><code>f6c6</code><span>mdi-cards-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-carrot"></i></a><code>f10f</code><span>mdi-carrot</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cart"></i></a><code>f110</code><span>mdi-cart</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cart-off"></i></a><code>f66b</code><span>mdi-cart-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cart-outline"></i></a><code>f111</code><span>mdi-cart-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cart-plus"></i></a><code>f112</code><span>mdi-cart-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-case-sensitive-alt"></i></a><code>f113</code><span>mdi-case-sensitive-alt</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cash"></i></a><code>f114</code><span>mdi-cash</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cash-100"></i></a><code>f115</code><span>mdi-cash-100</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cash-multiple"></i></a><code>f116</code><span>mdi-cash-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cash-usd"></i></a><code>f117</code><span>mdi-cash-usd</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cast"></i></a><code>f118</code><span>mdi-cast</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cast-connected"></i></a><code>f119</code><span>mdi-cast-connected</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-castle"></i></a><code>f11a</code><span>mdi-castle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cat"></i></a><code>f11b</code><span>mdi-cat</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone"></i></a><code>f11c</code><span>mdi-cellphone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone-android"></i></a><code>f11d</code><span>mdi-cellphone-android</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone-basic"></i></a><code>f11e</code><span>mdi-cellphone-basic</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone-dock"></i></a><code>f11f</code><span>mdi-cellphone-dock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone-iphone"></i></a><code>f120</code><span>mdi-cellphone-iphone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone-link"></i></a><code>f121</code><span>mdi-cellphone-link</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone-link-off"></i></a><code>f122</code><span>mdi-cellphone-link-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cellphone-settings"></i></a><code>f123</code><span>mdi-cellphone-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-certificate"></i></a><code>f124</code><span>mdi-certificate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chair-school"></i></a><code>f125</code><span>mdi-chair-school</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-arc"></i></a><code>f126</code><span>mdi-chart-arc</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-areaspline"></i></a><code>f127</code><span>mdi-chart-areaspline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-bar"></i></a><code>f128</code><span>mdi-chart-bar</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-bubble"></i></a><code>f5e3</code><span>mdi-chart-bubble</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-gantt"></i></a><code>f66c</code><span>mdi-chart-gantt</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-histogram"></i></a><code>f129</code><span>mdi-chart-histogram</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-line"></i></a><code>f12a</code><span>mdi-chart-line</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-pie"></i></a><code>f12b</code><span>mdi-chart-pie</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-scatterplot-hexbin"></i></a><code>f66d</code><span>mdi-chart-scatterplot-hexbin</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chart-timeline"></i></a><code>f66e</code><span>mdi-chart-timeline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-check"></i></a><code>f12c</code><span>mdi-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-check-all"></i></a><code>f12d</code><span>mdi-check-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-check-circle"></i></a><code>f5e0</code><span>mdi-check-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-check-circle-outline"></i></a><code>f5e1</code><span>mdi-check-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-blank"></i></a><code>f12e</code><span>mdi-checkbox-blank</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-blank-circle"></i></a><code>f12f</code><span>mdi-checkbox-blank-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></a><code>f130</code><span>mdi-checkbox-blank-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-blank-outline"></i></a><code>f131</code><span>mdi-checkbox-blank-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-marked"></i></a><code>f132</code><span>mdi-checkbox-marked</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-marked-circle"></i></a><code>f133</code><span>mdi-checkbox-marked-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-marked-circle-outline"></i></a><code>f134</code><span>mdi-checkbox-marked-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-marked-outline"></i></a><code>f135</code><span>mdi-checkbox-marked-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-blank"></i></a><code>f136</code><span>mdi-checkbox-multiple-blank</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-blank-circle"></i></a><code>f63b</code><span>mdi-checkbox-multiple-blank-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-blank-circle-outline"></i></a><code>f63c</code><span>mdi-checkbox-multiple-blank-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-blank-outline"></i></a><code>f137</code><span>mdi-checkbox-multiple-blank-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-marked"></i></a><code>f138</code><span>mdi-checkbox-multiple-marked</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-marked-circle"></i></a><code>f63d</code><span>mdi-checkbox-multiple-marked-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-marked-circle-outline"></i></a><code>f63e</code><span>mdi-checkbox-multiple-marked-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkbox-multiple-marked-outline"></i></a><code>f139</code><span>mdi-checkbox-multiple-marked-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-checkerboard"></i></a><code>f13a</code><span>mdi-checkerboard</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chemical-weapon"></i></a><code>f13b</code><span>mdi-chemical-weapon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-double-down"></i></a><code>f13c</code><span>mdi-chevron-double-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-double-left"></i></a><code>f13d</code><span>mdi-chevron-double-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-double-right"></i></a><code>f13e</code><span>mdi-chevron-double-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-double-up"></i></a><code>f13f</code><span>mdi-chevron-double-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-down"></i></a><code>f140</code><span>mdi-chevron-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-left"></i></a><code>f141</code><span>mdi-chevron-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-right"></i></a><code>f142</code><span>mdi-chevron-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chevron-up"></i></a><code>f143</code><span>mdi-chevron-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-chip"></i></a><code>f61a</code><span>mdi-chip</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-church"></i></a><code>f144</code><span>mdi-church</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cisco-webex"></i></a><code>f145</code><span>mdi-cisco-webex</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-city"></i></a><code>f146</code><span>mdi-city</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard"></i></a><code>f147</code><span>mdi-clipboard</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-account"></i></a><code>f148</code><span>mdi-clipboard-account</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-alert"></i></a><code>f149</code><span>mdi-clipboard-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-arrow-down"></i></a><code>f14a</code><span>mdi-clipboard-arrow-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-arrow-left"></i></a><code>f14b</code><span>mdi-clipboard-arrow-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-check"></i></a><code>f14c</code><span>mdi-clipboard-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-flow"></i></a><code>f6c7</code><span>mdi-clipboard-flow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-outline"></i></a><code>f14d</code><span>mdi-clipboard-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clipboard-text"></i></a><code>f14e</code><span>mdi-clipboard-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clippy"></i></a><code>f14f</code><span>mdi-clippy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clock"></i></a><code>f150</code><span>mdi-clock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clock-alert"></i></a><code>f5ce</code><span>mdi-clock-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clock-end"></i></a><code>f151</code><span>mdi-clock-end</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clock-fast"></i></a><code>f152</code><span>mdi-clock-fast</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clock-in"></i></a><code>f153</code><span>mdi-clock-in</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clock-out"></i></a><code>f154</code><span>mdi-clock-out</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-clock-start"></i></a><code>f155</code><span>mdi-clock-start</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close"></i></a><code>f156</code><span>mdi-close</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-box"></i></a><code>f157</code><span>mdi-close-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-box-outline"></i></a><code>f158</code><span>mdi-close-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-circle"></i></a><code>f159</code><span>mdi-close-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-circle-outline"></i></a><code>f15a</code><span>mdi-close-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-network"></i></a><code>f15b</code><span>mdi-close-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-octagon"></i></a><code>f15c</code><span>mdi-close-octagon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-octagon-outline"></i></a><code>f15d</code><span>mdi-close-octagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-close-outline"></i></a><code>f6c8</code><span>mdi-close-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-closed-caption"></i></a><code>f15e</code><span>mdi-closed-caption</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud"></i></a><code>f15f</code><span>mdi-cloud</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-check"></i></a><code>f160</code><span>mdi-cloud-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-circle"></i></a><code>f161</code><span>mdi-cloud-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-download"></i></a><code>f162</code><span>mdi-cloud-download</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-outline"></i></a><code>f163</code><span>mdi-cloud-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-outline-off"></i></a><code>f164</code><span>mdi-cloud-outline-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-print"></i></a><code>f165</code><span>mdi-cloud-print</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-print-outline"></i></a><code>f166</code><span>mdi-cloud-print-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-sync"></i></a><code>f63f</code><span>mdi-cloud-sync</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cloud-upload"></i></a><code>f167</code><span>mdi-cloud-upload</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-array"></i></a><code>f168</code><span>mdi-code-array</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-braces"></i></a><code>f169</code><span>mdi-code-braces</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-brackets"></i></a><code>f16a</code><span>mdi-code-brackets</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-equal"></i></a><code>f16b</code><span>mdi-code-equal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-greater-than"></i></a><code>f16c</code><span>mdi-code-greater-than</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-greater-than-or-equal"></i></a><code>f16d</code><span>mdi-code-greater-than-or-equal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-less-than"></i></a><code>f16e</code><span>mdi-code-less-than</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-less-than-or-equal"></i></a><code>f16f</code><span>mdi-code-less-than-or-equal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-not-equal"></i></a><code>f170</code><span>mdi-code-not-equal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-not-equal-variant"></i></a><code>f171</code><span>mdi-code-not-equal-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-parentheses"></i></a><code>f172</code><span>mdi-code-parentheses</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-string"></i></a><code>f173</code><span>mdi-code-string</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-tags"></i></a><code>f174</code><span>mdi-code-tags</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-code-tags-check"></i></a><code>f693</code><span>mdi-code-tags-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-codepen"></i></a><code>f175</code><span>mdi-codepen</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-coffee"></i></a><code>f176</code><span>mdi-coffee</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-coffee-outline"></i></a><code>f6c9</code><span>mdi-coffee-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-coffee-to-go"></i></a><code>f177</code><span>mdi-coffee-to-go</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-coin"></i></a><code>f178</code><span>mdi-coin</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-coins"></i></a><code>f694</code><span>mdi-coins</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-collage"></i></a><code>f640</code><span>mdi-collage</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-color-helper"></i></a><code>f179</code><span>mdi-color-helper</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment"></i></a><code>f17a</code><span>mdi-comment</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-account"></i></a><code>f17b</code><span>mdi-comment-account</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-account-outline"></i></a><code>f17c</code><span>mdi-comment-account-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-alert"></i></a><code>f17d</code><span>mdi-comment-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-alert-outline"></i></a><code>f17e</code><span>mdi-comment-alert-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-check"></i></a><code>f17f</code><span>mdi-comment-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-check-outline"></i></a><code>f180</code><span>mdi-comment-check-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-multiple-outline"></i></a><code>f181</code><span>mdi-comment-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-outline"></i></a><code>f182</code><span>mdi-comment-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-plus-outline"></i></a><code>f183</code><span>mdi-comment-plus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-processing"></i></a><code>f184</code><span>mdi-comment-processing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-processing-outline"></i></a><code>f185</code><span>mdi-comment-processing-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-question-outline"></i></a><code>f186</code><span>mdi-comment-question-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-remove-outline"></i></a><code>f187</code><span>mdi-comment-remove-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-text"></i></a><code>f188</code><span>mdi-comment-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-comment-text-outline"></i></a><code>f189</code><span>mdi-comment-text-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-compare"></i></a><code>f18a</code><span>mdi-compare</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-compass"></i></a><code>f18b</code><span>mdi-compass</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-compass-outline"></i></a><code>f18c</code><span>mdi-compass-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-console"></i></a><code>f18d</code><span>mdi-console</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-contact-mail"></i></a><code>f18e</code><span>mdi-contact-mail</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-contacts"></i></a><code>f6ca</code><span>mdi-contacts</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-content-copy"></i></a><code>f18f</code><span>mdi-content-copy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-content-cut"></i></a><code>f190</code><span>mdi-content-cut</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-content-duplicate"></i></a><code>f191</code><span>mdi-content-duplicate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-content-paste"></i></a><code>f192</code><span>mdi-content-paste</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-content-save"></i></a><code>f193</code><span>mdi-content-save</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-content-save-all"></i></a><code>f194</code><span>mdi-content-save-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-content-save-settings"></i></a><code>f61b</code><span>mdi-content-save-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-contrast"></i></a><code>f195</code><span>mdi-contrast</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-contrast-box"></i></a><code>f196</code><span>mdi-contrast-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-contrast-circle"></i></a><code>f197</code><span>mdi-contrast-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cookie"></i></a><code>f198</code><span>mdi-cookie</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-copyright"></i></a><code>f5e6</code><span>mdi-copyright</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-counter"></i></a><code>f199</code><span>mdi-counter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cow"></i></a><code>f19a</code><span>mdi-cow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-creation"></i></a><code>f1c9</code><span>mdi-creation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-credit-card"></i></a><code>f19b</code><span>mdi-credit-card</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-credit-card-multiple"></i></a><code>f19c</code><span>mdi-credit-card-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-credit-card-off"></i></a><code>f5e4</code><span>mdi-credit-card-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-credit-card-plus"></i></a><code>f675</code><span>mdi-credit-card-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-credit-card-scan"></i></a><code>f19d</code><span>mdi-credit-card-scan</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crop"></i></a><code>f19e</code><span>mdi-crop</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crop-free"></i></a><code>f19f</code><span>mdi-crop-free</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crop-landscape"></i></a><code>f1a0</code><span>mdi-crop-landscape</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crop-portrait"></i></a><code>f1a1</code><span>mdi-crop-portrait</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crop-rotate"></i></a><code>f695</code><span>mdi-crop-rotate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crop-square"></i></a><code>f1a2</code><span>mdi-crop-square</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crosshairs"></i></a><code>f1a3</code><span>mdi-crosshairs</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crosshairs-gps"></i></a><code>f1a4</code><span>mdi-crosshairs-gps</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-crown"></i></a><code>f1a5</code><span>mdi-crown</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cube"></i></a><code>f1a6</code><span>mdi-cube</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cube-outline"></i></a><code>f1a7</code><span>mdi-cube-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cube-send"></i></a><code>f1a8</code><span>mdi-cube-send</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cube-unfolded"></i></a><code>f1a9</code><span>mdi-cube-unfolded</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cup"></i></a><code>f1aa</code><span>mdi-cup</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cup-off"></i></a><code>f5e5</code><span>mdi-cup-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cup-water"></i></a><code>f1ab</code><span>mdi-cup-water</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-btc"></i></a><code>f1ac</code><span>mdi-currency-btc</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-eur"></i></a><code>f1ad</code><span>mdi-currency-eur</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-gbp"></i></a><code>f1ae</code><span>mdi-currency-gbp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-inr"></i></a><code>f1af</code><span>mdi-currency-inr</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-ngn"></i></a><code>f1b0</code><span>mdi-currency-ngn</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-rub"></i></a><code>f1b1</code><span>mdi-currency-rub</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-try"></i></a><code>f1b2</code><span>mdi-currency-try</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-usd"></i></a><code>f1b3</code><span>mdi-currency-usd</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-currency-usd-off"></i></a><code>f679</code><span>mdi-currency-usd-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cursor-default"></i></a><code>f1b4</code><span>mdi-cursor-default</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cursor-default-outline"></i></a><code>f1b5</code><span>mdi-cursor-default-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cursor-move"></i></a><code>f1b6</code><span>mdi-cursor-move</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cursor-pointer"></i></a><code>f1b7</code><span>mdi-cursor-pointer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-cursor-text"></i></a><code>f5e7</code><span>mdi-cursor-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-database"></i></a><code>f1b8</code><span>mdi-database</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-database-minus"></i></a><code>f1b9</code><span>mdi-database-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-database-plus"></i></a><code>f1ba</code><span>mdi-database-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-debug-step-into"></i></a><code>f1bb</code><span>mdi-debug-step-into</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-debug-step-out"></i></a><code>f1bc</code><span>mdi-debug-step-out</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-debug-step-over"></i></a><code>f1bd</code><span>mdi-debug-step-over</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-decimal-decrease"></i></a><code>f1be</code><span>mdi-decimal-decrease</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-decimal-increase"></i></a><code>f1bf</code><span>mdi-decimal-increase</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-delete"></i></a><code>f1c0</code><span>mdi-delete</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-delete-circle"></i></a><code>f682</code><span>mdi-delete-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-delete-empty"></i></a><code>f6cb</code><span>mdi-delete-empty</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-delete-forever"></i></a><code>f5e8</code><span>mdi-delete-forever</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-delete-sweep"></i></a><code>f5e9</code><span>mdi-delete-sweep</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-delete-variant"></i></a><code>f1c1</code><span>mdi-delete-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-delta"></i></a><code>f1c2</code><span>mdi-delta</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-deskphone"></i></a><code>f1c3</code><span>mdi-deskphone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-desktop-mac"></i></a><code>f1c4</code><span>mdi-desktop-mac</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-desktop-tower"></i></a><code>f1c5</code><span>mdi-desktop-tower</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-details"></i></a><code>f1c6</code><span>mdi-details</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-developer-board"></i></a><code>f696</code><span>mdi-developer-board</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-deviantart"></i></a><code>f1c7</code><span>mdi-deviantart</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dialpad"></i></a><code>f61c</code><span>mdi-dialpad</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-diamond"></i></a><code>f1c8</code><span>mdi-diamond</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-1"></i></a><code>f1ca</code><span>mdi-dice-1</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-2"></i></a><code>f1cb</code><span>mdi-dice-2</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-3"></i></a><code>f1cc</code><span>mdi-dice-3</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-4"></i></a><code>f1cd</code><span>mdi-dice-4</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-5"></i></a><code>f1ce</code><span>mdi-dice-5</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-6"></i></a><code>f1cf</code><span>mdi-dice-6</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-d20"></i></a><code>f5ea</code><span>mdi-dice-d20</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-d4"></i></a><code>f5eb</code><span>mdi-dice-d4</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-d6"></i></a><code>f5ec</code><span>mdi-dice-d6</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dice-d8"></i></a><code>f5ed</code><span>mdi-dice-d8</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dictionary"></i></a><code>f61d</code><span>mdi-dictionary</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-directions"></i></a><code>f1d0</code><span>mdi-directions</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-directions-fork"></i></a><code>f641</code><span>mdi-directions-fork</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-discord"></i></a><code>f66f</code><span>mdi-discord</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-disk"></i></a><code>f5ee</code><span>mdi-disk</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-disk-alert"></i></a><code>f1d1</code><span>mdi-disk-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-disqus"></i></a><code>f1d2</code><span>mdi-disqus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-disqus-outline"></i></a><code>f1d3</code><span>mdi-disqus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-division"></i></a><code>f1d4</code><span>mdi-division</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-division-box"></i></a><code>f1d5</code><span>mdi-division-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dna"></i></a><code>f683</code><span>mdi-dna</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dns"></i></a><code>f1d6</code><span>mdi-dns</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-do-not-disturb"></i></a><code>f697</code><span>mdi-do-not-disturb</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-do-not-disturb-off"></i></a><code>f698</code><span>mdi-do-not-disturb-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dolby"></i></a><code>f6b2</code><span>mdi-dolby</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-domain"></i></a><code>f1d7</code><span>mdi-domain</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dots-horizontal"></i></a><code>f1d8</code><span>mdi-dots-horizontal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dots-vertical"></i></a><code>f1d9</code><span>mdi-dots-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-douban"></i></a><code>f699</code><span>mdi-douban</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-download"></i></a><code>f1da</code><span>mdi-download</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-drag"></i></a><code>f1db</code><span>mdi-drag</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-drag-horizontal"></i></a><code>f1dc</code><span>mdi-drag-horizontal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-drag-vertical"></i></a><code>f1dd</code><span>mdi-drag-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-drawing"></i></a><code>f1de</code><span>mdi-drawing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-drawing-box"></i></a><code>f1df</code><span>mdi-drawing-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dribbble"></i></a><code>f1e0</code><span>mdi-dribbble</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dribbble-box"></i></a><code>f1e1</code><span>mdi-dribbble-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-drone"></i></a><code>f1e2</code><span>mdi-drone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dropbox"></i></a><code>f1e3</code><span>mdi-dropbox</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-drupal"></i></a><code>f1e4</code><span>mdi-drupal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-duck"></i></a><code>f1e5</code><span>mdi-duck</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-dumbbell"></i></a><code>f1e6</code><span>mdi-dumbbell</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-earth"></i></a><code>f1e7</code><span>mdi-earth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-earth-box"></i></a><code>f6cc</code><span>mdi-earth-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-earth-box-off"></i></a><code>f6cd</code><span>mdi-earth-box-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-earth-off"></i></a><code>f1e8</code><span>mdi-earth-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-edge"></i></a><code>f1e9</code><span>mdi-edge</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eject"></i></a><code>f1ea</code><span>mdi-eject</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-elevation-decline"></i></a><code>f1eb</code><span>mdi-elevation-decline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-elevation-rise"></i></a><code>f1ec</code><span>mdi-elevation-rise</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-elevator"></i></a><code>f1ed</code><span>mdi-elevator</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-email"></i></a><code>f1ee</code><span>mdi-email</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-email-alert"></i></a><code>f6ce</code><span>mdi-email-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-email-open"></i></a><code>f1ef</code><span>mdi-email-open</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-email-open-outline"></i></a><code>f5ef</code><span>mdi-email-open-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-email-outline"></i></a><code>f1f0</code><span>mdi-email-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-email-secure"></i></a><code>f1f1</code><span>mdi-email-secure</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-email-variant"></i></a><code>f5f0</code><span>mdi-email-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emby"></i></a><code>f6b3</code><span>mdi-emby</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon"></i></a><code>f1f2</code><span>mdi-emoticon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-cool"></i></a><code>f1f3</code><span>mdi-emoticon-cool</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-dead"></i></a><code>f69a</code><span>mdi-emoticon-dead</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-devil"></i></a><code>f1f4</code><span>mdi-emoticon-devil</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-excited"></i></a><code>f69b</code><span>mdi-emoticon-excited</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-happy"></i></a><code>f1f5</code><span>mdi-emoticon-happy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-neutral"></i></a><code>f1f6</code><span>mdi-emoticon-neutral</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-poop"></i></a><code>f1f7</code><span>mdi-emoticon-poop</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-sad"></i></a><code>f1f8</code><span>mdi-emoticon-sad</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-emoticon-tongue"></i></a><code>f1f9</code><span>mdi-emoticon-tongue</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-engine"></i></a><code>f1fa</code><span>mdi-engine</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-engine-outline"></i></a><code>f1fb</code><span>mdi-engine-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-equal"></i></a><code>f1fc</code><span>mdi-equal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-equal-box"></i></a><code>f1fd</code><span>mdi-equal-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eraser"></i></a><code>f1fe</code><span>mdi-eraser</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eraser-variant"></i></a><code>f642</code><span>mdi-eraser-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-escalator"></i></a><code>f1ff</code><span>mdi-escalator</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ethernet"></i></a><code>f200</code><span>mdi-ethernet</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ethernet-cable"></i></a><code>f201</code><span>mdi-ethernet-cable</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ethernet-cable-off"></i></a><code>f202</code><span>mdi-ethernet-cable-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-etsy"></i></a><code>f203</code><span>mdi-etsy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ev-station"></i></a><code>f5f1</code><span>mdi-ev-station</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-evernote"></i></a><code>f204</code><span>mdi-evernote</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-exclamation"></i></a><code>f205</code><span>mdi-exclamation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-exit-to-app"></i></a><code>f206</code><span>mdi-exit-to-app</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-export"></i></a><code>f207</code><span>mdi-export</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eye"></i></a><code>f208</code><span>mdi-eye</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eye-off"></i></a><code>f209</code><span>mdi-eye-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eye-outline"></i></a><code>f6cf</code><span>mdi-eye-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eye-outline-off"></i></a><code>f6d0</code><span>mdi-eye-outline-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eyedropper"></i></a><code>f20a</code><span>mdi-eyedropper</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-eyedropper-variant"></i></a><code>f20b</code><span>mdi-eyedropper-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-face"></i></a><code>f643</code><span>mdi-face</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-face-profile"></i></a><code>f644</code><span>mdi-face-profile</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-facebook"></i></a><code>f20c</code><span>mdi-facebook</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-facebook-box"></i></a><code>f20d</code><span>mdi-facebook-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-facebook-messenger"></i></a><code>f20e</code><span>mdi-facebook-messenger</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-factory"></i></a><code>f20f</code><span>mdi-factory</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fan"></i></a><code>f210</code><span>mdi-fan</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fast-forward"></i></a><code>f211</code><span>mdi-fast-forward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fast-forward-outline"></i></a><code>f6d1</code><span>mdi-fast-forward-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fax"></i></a><code>f212</code><span>mdi-fax</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-feather"></i></a><code>f6d2</code><span>mdi-feather</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ferry"></i></a><code>f213</code><span>mdi-ferry</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file"></i></a><code>f214</code><span>mdi-file</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-chart"></i></a><code>f215</code><span>mdi-file-chart</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-check"></i></a><code>f216</code><span>mdi-file-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-cloud"></i></a><code>f217</code><span>mdi-file-cloud</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-delimited"></i></a><code>f218</code><span>mdi-file-delimited</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-document"></i></a><code>f219</code><span>mdi-file-document</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-document-box"></i></a><code>f21a</code><span>mdi-file-document-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-excel"></i></a><code>f21b</code><span>mdi-file-excel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-excel-box"></i></a><code>f21c</code><span>mdi-file-excel-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-export"></i></a><code>f21d</code><span>mdi-file-export</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-find"></i></a><code>f21e</code><span>mdi-file-find</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-hidden"></i></a><code>f613</code><span>mdi-file-hidden</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-image"></i></a><code>f21f</code><span>mdi-file-image</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-import"></i></a><code>f220</code><span>mdi-file-import</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-lock"></i></a><code>f221</code><span>mdi-file-lock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-multiple"></i></a><code>f222</code><span>mdi-file-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-music"></i></a><code>f223</code><span>mdi-file-music</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-outline"></i></a><code>f224</code><span>mdi-file-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-pdf"></i></a><code>f225</code><span>mdi-file-pdf</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-pdf-box"></i></a><code>f226</code><span>mdi-file-pdf-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-powerpoint"></i></a><code>f227</code><span>mdi-file-powerpoint</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-powerpoint-box"></i></a><code>f228</code><span>mdi-file-powerpoint-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-presentation-box"></i></a><code>f229</code><span>mdi-file-presentation-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-restore"></i></a><code>f670</code><span>mdi-file-restore</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-send"></i></a><code>f22a</code><span>mdi-file-send</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-tree"></i></a><code>f645</code><span>mdi-file-tree</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-video"></i></a><code>f22b</code><span>mdi-file-video</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-word"></i></a><code>f22c</code><span>mdi-file-word</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-word-box"></i></a><code>f22d</code><span>mdi-file-word-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-file-xml"></i></a><code>f22e</code><span>mdi-file-xml</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-film"></i></a><code>f22f</code><span>mdi-film</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-filmstrip"></i></a><code>f230</code><span>mdi-filmstrip</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-filmstrip-off"></i></a><code>f231</code><span>mdi-filmstrip-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-filter"></i></a><code>f232</code><span>mdi-filter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-filter-outline"></i></a><code>f233</code><span>mdi-filter-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-filter-remove"></i></a><code>f234</code><span>mdi-filter-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-filter-remove-outline"></i></a><code>f235</code><span>mdi-filter-remove-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-filter-variant"></i></a><code>f236</code><span>mdi-filter-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-find-replace"></i></a><code>f6d3</code><span>mdi-find-replace</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fingerprint"></i></a><code>f237</code><span>mdi-fingerprint</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fire"></i></a><code>f238</code><span>mdi-fire</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-firefox"></i></a><code>f239</code><span>mdi-firefox</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fish"></i></a><code>f23a</code><span>mdi-fish</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flag"></i></a><code>f23b</code><span>mdi-flag</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flag-checkered"></i></a><code>f23c</code><span>mdi-flag-checkered</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flag-outline"></i></a><code>f23d</code><span>mdi-flag-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flag-outline-variant"></i></a><code>f23e</code><span>mdi-flag-outline-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flag-triangle"></i></a><code>f23f</code><span>mdi-flag-triangle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flag-variant"></i></a><code>f240</code><span>mdi-flag-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flash"></i></a><code>f241</code><span>mdi-flash</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flash-auto"></i></a><code>f242</code><span>mdi-flash-auto</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flash-off"></i></a><code>f243</code><span>mdi-flash-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flash-outline"></i></a><code>f6d4</code><span>mdi-flash-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flash-red-eye"></i></a><code>f67a</code><span>mdi-flash-red-eye</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flashlight"></i></a><code>f244</code><span>mdi-flashlight</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flashlight-off"></i></a><code>f245</code><span>mdi-flashlight-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flask"></i></a><code>f093</code><span>mdi-flask</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flask-empty"></i></a><code>f094</code><span>mdi-flask-empty</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flask-empty-outline"></i></a><code>f095</code><span>mdi-flask-empty-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flask-outline"></i></a><code>f096</code><span>mdi-flask-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flattr"></i></a><code>f246</code><span>mdi-flattr</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flip-to-back"></i></a><code>f247</code><span>mdi-flip-to-back</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flip-to-front"></i></a><code>f248</code><span>mdi-flip-to-front</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-floppy"></i></a><code>f249</code><span>mdi-floppy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-flower"></i></a><code>f24a</code><span>mdi-flower</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder"></i></a><code>f24b</code><span>mdi-folder</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-account"></i></a><code>f24c</code><span>mdi-folder-account</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-download"></i></a><code>f24d</code><span>mdi-folder-download</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-google-drive"></i></a><code>f24e</code><span>mdi-folder-google-drive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-image"></i></a><code>f24f</code><span>mdi-folder-image</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-lock"></i></a><code>f250</code><span>mdi-folder-lock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-lock-open"></i></a><code>f251</code><span>mdi-folder-lock-open</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-move"></i></a><code>f252</code><span>mdi-folder-move</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-multiple"></i></a><code>f253</code><span>mdi-folder-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-multiple-image"></i></a><code>f254</code><span>mdi-folder-multiple-image</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-multiple-outline"></i></a><code>f255</code><span>mdi-folder-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-outline"></i></a><code>f256</code><span>mdi-folder-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-plus"></i></a><code>f257</code><span>mdi-folder-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-remove"></i></a><code>f258</code><span>mdi-folder-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-star"></i></a><code>f69c</code><span>mdi-folder-star</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-folder-upload"></i></a><code>f259</code><span>mdi-folder-upload</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-font-awesome"></i></a><code>f03a</code><span>mdi-font-awesome</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-food"></i></a><code>f25a</code><span>mdi-food</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-food-apple"></i></a><code>f25b</code><span>mdi-food-apple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-food-fork-drink"></i></a><code>f5f2</code><span>mdi-food-fork-drink</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-food-off"></i></a><code>f5f3</code><span>mdi-food-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-food-variant"></i></a><code>f25c</code><span>mdi-food-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-football"></i></a><code>f25d</code><span>mdi-football</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-football-australian"></i></a><code>f25e</code><span>mdi-football-australian</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-football-helmet"></i></a><code>f25f</code><span>mdi-football-helmet</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-align-center"></i></a><code>f260</code><span>mdi-format-align-center</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-align-justify"></i></a><code>f261</code><span>mdi-format-align-justify</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-align-left"></i></a><code>f262</code><span>mdi-format-align-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-align-right"></i></a><code>f263</code><span>mdi-format-align-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-annotation-plus"></i></a><code>f646</code><span>mdi-format-annotation-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-bold"></i></a><code>f264</code><span>mdi-format-bold</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-clear"></i></a><code>f265</code><span>mdi-format-clear</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-color-fill"></i></a><code>f266</code><span>mdi-format-color-fill</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-color-text"></i></a><code>f69d</code><span>mdi-format-color-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-float-center"></i></a><code>f267</code><span>mdi-format-float-center</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-float-left"></i></a><code>f268</code><span>mdi-format-float-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-float-none"></i></a><code>f269</code><span>mdi-format-float-none</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-float-right"></i></a><code>f26a</code><span>mdi-format-float-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-font"></i></a><code>f6d5</code><span>mdi-format-font</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-1"></i></a><code>f26b</code><span>mdi-format-header-1</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-2"></i></a><code>f26c</code><span>mdi-format-header-2</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-3"></i></a><code>f26d</code><span>mdi-format-header-3</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-4"></i></a><code>f26e</code><span>mdi-format-header-4</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-5"></i></a><code>f26f</code><span>mdi-format-header-5</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-6"></i></a><code>f270</code><span>mdi-format-header-6</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-decrease"></i></a><code>f271</code><span>mdi-format-header-decrease</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-equal"></i></a><code>f272</code><span>mdi-format-header-equal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-increase"></i></a><code>f273</code><span>mdi-format-header-increase</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-header-pound"></i></a><code>f274</code><span>mdi-format-header-pound</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-horizontal-align-center"></i></a><code>f61e</code><span>mdi-format-horizontal-align-center</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-horizontal-align-left"></i></a><code>f61f</code><span>mdi-format-horizontal-align-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-horizontal-align-right"></i></a><code>f620</code><span>mdi-format-horizontal-align-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-indent-decrease"></i></a><code>f275</code><span>mdi-format-indent-decrease</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-indent-increase"></i></a><code>f276</code><span>mdi-format-indent-increase</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-italic"></i></a><code>f277</code><span>mdi-format-italic</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-line-spacing"></i></a><code>f278</code><span>mdi-format-line-spacing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-line-style"></i></a><code>f5c8</code><span>mdi-format-line-style</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-line-weight"></i></a><code>f5c9</code><span>mdi-format-line-weight</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-list-bulleted"></i></a><code>f279</code><span>mdi-format-list-bulleted</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-list-bulleted-type"></i></a><code>f27a</code><span>mdi-format-list-bulleted-type</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-list-numbers"></i></a><code>f27b</code><span>mdi-format-list-numbers</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-page-break"></i></a><code>f6d6</code><span>mdi-format-page-break</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-paint"></i></a><code>f27c</code><span>mdi-format-paint</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-paragraph"></i></a><code>f27d</code><span>mdi-format-paragraph</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-pilcrow"></i></a><code>f6d7</code><span>mdi-format-pilcrow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-quote"></i></a><code>f27e</code><span>mdi-format-quote</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-rotate-90"></i></a><code>f6a9</code><span>mdi-format-rotate-90</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-section"></i></a><code>f69e</code><span>mdi-format-section</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-size"></i></a><code>f27f</code><span>mdi-format-size</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-strikethrough"></i></a><code>f280</code><span>mdi-format-strikethrough</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-strikethrough-variant"></i></a><code>f281</code><span>mdi-format-strikethrough-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-subscript"></i></a><code>f282</code><span>mdi-format-subscript</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-superscript"></i></a><code>f283</code><span>mdi-format-superscript</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-text"></i></a><code>f284</code><span>mdi-format-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-textdirection-l-to-r"></i></a><code>f285</code><span>mdi-format-textdirection-l-to-r</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-textdirection-r-to-l"></i></a><code>f286</code><span>mdi-format-textdirection-r-to-l</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-title"></i></a><code>f5f4</code><span>mdi-format-title</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-underline"></i></a><code>f287</code><span>mdi-format-underline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-vertical-align-bottom"></i></a><code>f621</code><span>mdi-format-vertical-align-bottom</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-vertical-align-center"></i></a><code>f622</code><span>mdi-format-vertical-align-center</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-vertical-align-top"></i></a><code>f623</code><span>mdi-format-vertical-align-top</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-wrap-inline"></i></a><code>f288</code><span>mdi-format-wrap-inline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-wrap-square"></i></a><code>f289</code><span>mdi-format-wrap-square</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-wrap-tight"></i></a><code>f28a</code><span>mdi-format-wrap-tight</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-format-wrap-top-bottom"></i></a><code>f28b</code><span>mdi-format-wrap-top-bottom</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-forum"></i></a><code>f28c</code><span>mdi-forum</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-forward"></i></a><code>f28d</code><span>mdi-forward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-foursquare"></i></a><code>f28e</code><span>mdi-foursquare</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fridge"></i></a><code>f28f</code><span>mdi-fridge</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fridge-filled"></i></a><code>f290</code><span>mdi-fridge-filled</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fridge-filled-bottom"></i></a><code>f291</code><span>mdi-fridge-filled-bottom</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fridge-filled-top"></i></a><code>f292</code><span>mdi-fridge-filled-top</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fullscreen"></i></a><code>f293</code><span>mdi-fullscreen</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-fullscreen-exit"></i></a><code>f294</code><span>mdi-fullscreen-exit</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-function"></i></a><code>f295</code><span>mdi-function</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gamepad"></i></a><code>f296</code><span>mdi-gamepad</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gamepad-variant"></i></a><code>f297</code><span>mdi-gamepad-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-garage"></i></a><code>f6d8</code><span>mdi-garage</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-garage-open"></i></a><code>f6d9</code><span>mdi-garage-open</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gas-cylinder"></i></a><code>f647</code><span>mdi-gas-cylinder</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gas-station"></i></a><code>f298</code><span>mdi-gas-station</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gate"></i></a><code>f299</code><span>mdi-gate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gauge"></i></a><code>f29a</code><span>mdi-gauge</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gavel"></i></a><code>f29b</code><span>mdi-gavel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gender-female"></i></a><code>f29c</code><span>mdi-gender-female</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gender-male"></i></a><code>f29d</code><span>mdi-gender-male</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gender-male-female"></i></a><code>f29e</code><span>mdi-gender-male-female</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gender-transgender"></i></a><code>f29f</code><span>mdi-gender-transgender</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ghost"></i></a><code>f2a0</code><span>mdi-ghost</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gift"></i></a><code>f2a1</code><span>mdi-gift</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-git"></i></a><code>f2a2</code><span>mdi-git</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-github-box"></i></a><code>f2a3</code><span>mdi-github-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-github-circle"></i></a><code>f2a4</code><span>mdi-github-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-github-face"></i></a><code>f6da</code><span>mdi-github-face</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-glass-flute"></i></a><code>f2a5</code><span>mdi-glass-flute</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-glass-mug"></i></a><code>f2a6</code><span>mdi-glass-mug</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-glass-stange"></i></a><code>f2a7</code><span>mdi-glass-stange</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-glass-tulip"></i></a><code>f2a8</code><span>mdi-glass-tulip</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-glassdoor"></i></a><code>f2a9</code><span>mdi-glassdoor</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-glasses"></i></a><code>f2aa</code><span>mdi-glasses</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gmail"></i></a><code>f2ab</code><span>mdi-gmail</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gnome"></i></a><code>f2ac</code><span>mdi-gnome</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gondola"></i></a><code>f685</code><span>mdi-gondola</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google"></i></a><code>f2ad</code><span>mdi-google</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-cardboard"></i></a><code>f2ae</code><span>mdi-google-cardboard</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-chrome"></i></a><code>f2af</code><span>mdi-google-chrome</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-circles"></i></a><code>f2b0</code><span>mdi-google-circles</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-circles-communities"></i></a><code>f2b1</code><span>mdi-google-circles-communities</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-circles-extended"></i></a><code>f2b2</code><span>mdi-google-circles-extended</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-circles-group"></i></a><code>f2b3</code><span>mdi-google-circles-group</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-controller"></i></a><code>f2b4</code><span>mdi-google-controller</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-controller-off"></i></a><code>f2b5</code><span>mdi-google-controller-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-drive"></i></a><code>f2b6</code><span>mdi-google-drive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-earth"></i></a><code>f2b7</code><span>mdi-google-earth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-glass"></i></a><code>f2b8</code><span>mdi-google-glass</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-keep"></i></a><code>f6db</code><span>mdi-google-keep</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-maps"></i></a><code>f5f5</code><span>mdi-google-maps</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-nearby"></i></a><code>f2b9</code><span>mdi-google-nearby</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-pages"></i></a><code>f2ba</code><span>mdi-google-pages</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-photos"></i></a><code>f6dc</code><span>mdi-google-photos</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-physical-web"></i></a><code>f2bb</code><span>mdi-google-physical-web</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-play"></i></a><code>f2bc</code><span>mdi-google-play</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-plus"></i></a><code>f2bd</code><span>mdi-google-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-plus-box"></i></a><code>f2be</code><span>mdi-google-plus-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-translate"></i></a><code>f2bf</code><span>mdi-google-translate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-google-wallet"></i></a><code>f2c0</code><span>mdi-google-wallet</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-gradient"></i></a><code>f69f</code><span>mdi-gradient</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-grease-pencil"></i></a><code>f648</code><span>mdi-grease-pencil</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-grid"></i></a><code>f2c1</code><span>mdi-grid</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-grid-off"></i></a><code>f2c2</code><span>mdi-grid-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-group"></i></a><code>f2c3</code><span>mdi-group</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-guitar-electric"></i></a><code>f2c4</code><span>mdi-guitar-electric</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-guitar-pick"></i></a><code>f2c5</code><span>mdi-guitar-pick</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-guitar-pick-outline"></i></a><code>f2c6</code><span>mdi-guitar-pick-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hackernews"></i></a><code>f624</code><span>mdi-hackernews</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hamburger"></i></a><code>f684</code><span>mdi-hamburger</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hand-pointing-right"></i></a><code>f2c7</code><span>mdi-hand-pointing-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hanger"></i></a><code>f2c8</code><span>mdi-hanger</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hangouts"></i></a><code>f2c9</code><span>mdi-hangouts</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-harddisk"></i></a><code>f2ca</code><span>mdi-harddisk</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-headphones"></i></a><code>f2cb</code><span>mdi-headphones</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-headphones-box"></i></a><code>f2cc</code><span>mdi-headphones-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-headphones-settings"></i></a><code>f2cd</code><span>mdi-headphones-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-headset"></i></a><code>f2ce</code><span>mdi-headset</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-headset-dock"></i></a><code>f2cf</code><span>mdi-headset-dock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-headset-off"></i></a><code>f2d0</code><span>mdi-headset-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart"></i></a><code>f2d1</code><span>mdi-heart</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-box"></i></a><code>f2d2</code><span>mdi-heart-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-box-outline"></i></a><code>f2d3</code><span>mdi-heart-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-broken"></i></a><code>f2d4</code><span>mdi-heart-broken</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-half-outline"></i></a><code>f6dd</code><span>mdi-heart-half-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-half-part"></i></a><code>f6de</code><span>mdi-heart-half-part</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-half-part-outline"></i></a><code>f6df</code><span>mdi-heart-half-part-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-outline"></i></a><code>f2d5</code><span>mdi-heart-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-heart-pulse"></i></a><code>f5f6</code><span>mdi-heart-pulse</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-help"></i></a><code>f2d6</code><span>mdi-help</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-help-circle"></i></a><code>f2d7</code><span>mdi-help-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-help-circle-outline"></i></a><code>f625</code><span>mdi-help-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hexagon"></i></a><code>f2d8</code><span>mdi-hexagon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hexagon-multiple"></i></a><code>f6e0</code><span>mdi-hexagon-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hexagon-outline"></i></a><code>f2d9</code><span>mdi-hexagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-highway"></i></a><code>f5f7</code><span>mdi-highway</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-history"></i></a><code>f2da</code><span>mdi-history</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hololens"></i></a><code>f2db</code><span>mdi-hololens</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-home"></i></a><code>f2dc</code><span>mdi-home</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-home-map-marker"></i></a><code>f5f8</code><span>mdi-home-map-marker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-home-modern"></i></a><code>f2dd</code><span>mdi-home-modern</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-home-outline"></i></a><code>f6a0</code><span>mdi-home-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-home-variant"></i></a><code>f2de</code><span>mdi-home-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hook"></i></a><code>f6e1</code><span>mdi-hook</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hook-off"></i></a><code>f6e2</code><span>mdi-hook-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hops"></i></a><code>f2df</code><span>mdi-hops</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hospital"></i></a><code>f2e0</code><span>mdi-hospital</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hospital-building"></i></a><code>f2e1</code><span>mdi-hospital-building</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hospital-marker"></i></a><code>f2e2</code><span>mdi-hospital-marker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-hotel"></i></a><code>f2e3</code><span>mdi-hotel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-houzz"></i></a><code>f2e4</code><span>mdi-houzz</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-houzz-box"></i></a><code>f2e5</code><span>mdi-houzz-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human"></i></a><code>f2e6</code><span>mdi-human</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-child"></i></a><code>f2e7</code><span>mdi-human-child</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-female"></i></a><code>f649</code><span>mdi-human-female</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-greeting"></i></a><code>f64a</code><span>mdi-human-greeting</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-handsdown"></i></a><code>f64b</code><span>mdi-human-handsdown</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-handsup"></i></a><code>f64c</code><span>mdi-human-handsup</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-male"></i></a><code>f64d</code><span>mdi-human-male</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-male-female"></i></a><code>f2e8</code><span>mdi-human-male-female</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-human-pregnant"></i></a><code>f5cf</code><span>mdi-human-pregnant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image"></i></a><code>f2e9</code><span>mdi-image</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-album"></i></a><code>f2ea</code><span>mdi-image-album</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-area"></i></a><code>f2eb</code><span>mdi-image-area</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-area-close"></i></a><code>f2ec</code><span>mdi-image-area-close</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-broken"></i></a><code>f2ed</code><span>mdi-image-broken</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-broken-variant"></i></a><code>f2ee</code><span>mdi-image-broken-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter"></i></a><code>f2ef</code><span>mdi-image-filter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-black-white"></i></a><code>f2f0</code><span>mdi-image-filter-black-white</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-center-focus"></i></a><code>f2f1</code><span>mdi-image-filter-center-focus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-center-focus-weak"></i></a><code>f2f2</code><span>mdi-image-filter-center-focus-weak</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-drama"></i></a><code>f2f3</code><span>mdi-image-filter-drama</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-frames"></i></a><code>f2f4</code><span>mdi-image-filter-frames</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-hdr"></i></a><code>f2f5</code><span>mdi-image-filter-hdr</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-none"></i></a><code>f2f6</code><span>mdi-image-filter-none</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-tilt-shift"></i></a><code>f2f7</code><span>mdi-image-filter-tilt-shift</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-filter-vintage"></i></a><code>f2f8</code><span>mdi-image-filter-vintage</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-image-multiple"></i></a><code>f2f9</code><span>mdi-image-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-import"></i></a><code>f2fa</code><span>mdi-import</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-inbox"></i></a><code>f686</code><span>mdi-inbox</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-inbox-arrow-down"></i></a><code>f2fb</code><span>mdi-inbox-arrow-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-inbox-arrow-up"></i></a><code>f3d1</code><span>mdi-inbox-arrow-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-incognito"></i></a><code>f5f9</code><span>mdi-incognito</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-infinity"></i></a><code>f6e3</code><span>mdi-infinity</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-information"></i></a><code>f2fc</code><span>mdi-information</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-information-outline"></i></a><code>f2fd</code><span>mdi-information-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-information-variant"></i></a><code>f64e</code><span>mdi-information-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-instagram"></i></a><code>f2fe</code><span>mdi-instagram</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-instapaper"></i></a><code>f2ff</code><span>mdi-instapaper</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-internet-explorer"></i></a><code>f300</code><span>mdi-internet-explorer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-invert-colors"></i></a><code>f301</code><span>mdi-invert-colors</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-itunes"></i></a><code>f676</code><span>mdi-itunes</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-jeepney"></i></a><code>f302</code><span>mdi-jeepney</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-jira"></i></a><code>f303</code><span>mdi-jira</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-jsfiddle"></i></a><code>f304</code><span>mdi-jsfiddle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-json"></i></a><code>f626</code><span>mdi-json</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keg"></i></a><code>f305</code><span>mdi-keg</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-kettle"></i></a><code>f5fa</code><span>mdi-kettle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-key"></i></a><code>f306</code><span>mdi-key</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-key-change"></i></a><code>f307</code><span>mdi-key-change</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-key-minus"></i></a><code>f308</code><span>mdi-key-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-key-plus"></i></a><code>f309</code><span>mdi-key-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-key-remove"></i></a><code>f30a</code><span>mdi-key-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-key-variant"></i></a><code>f30b</code><span>mdi-key-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard"></i></a><code>f30c</code><span>mdi-keyboard</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard-backspace"></i></a><code>f30d</code><span>mdi-keyboard-backspace</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard-caps"></i></a><code>f30e</code><span>mdi-keyboard-caps</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard-close"></i></a><code>f30f</code><span>mdi-keyboard-close</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard-off"></i></a><code>f310</code><span>mdi-keyboard-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard-return"></i></a><code>f311</code><span>mdi-keyboard-return</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard-tab"></i></a><code>f312</code><span>mdi-keyboard-tab</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-keyboard-variant"></i></a><code>f313</code><span>mdi-keyboard-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-kodi"></i></a><code>f314</code><span>mdi-kodi</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-label"></i></a><code>f315</code><span>mdi-label</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-label-outline"></i></a><code>f316</code><span>mdi-label-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lambda"></i></a><code>f627</code><span>mdi-lambda</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lamp"></i></a><code>f6b4</code><span>mdi-lamp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lan"></i></a><code>f317</code><span>mdi-lan</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lan-connect"></i></a><code>f318</code><span>mdi-lan-connect</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lan-disconnect"></i></a><code>f319</code><span>mdi-lan-disconnect</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lan-pending"></i></a><code>f31a</code><span>mdi-lan-pending</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-c"></i></a><code>f671</code><span>mdi-language-c</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-cpp"></i></a><code>f672</code><span>mdi-language-cpp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-csharp"></i></a><code>f31b</code><span>mdi-language-csharp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-css3"></i></a><code>f31c</code><span>mdi-language-css3</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-html5"></i></a><code>f31d</code><span>mdi-language-html5</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-javascript"></i></a><code>f31e</code><span>mdi-language-javascript</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-php"></i></a><code>f31f</code><span>mdi-language-php</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-python"></i></a><code>f320</code><span>mdi-language-python</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-python-text"></i></a><code>f321</code><span>mdi-language-python-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-swift"></i></a><code>f6e4</code><span>mdi-language-swift</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-language-typescript"></i></a><code>f6e5</code><span>mdi-language-typescript</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-laptop"></i></a><code>f322</code><span>mdi-laptop</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-laptop-chromebook"></i></a><code>f323</code><span>mdi-laptop-chromebook</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-laptop-mac"></i></a><code>f324</code><span>mdi-laptop-mac</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-laptop-off"></i></a><code>f6e6</code><span>mdi-laptop-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-laptop-windows"></i></a><code>f325</code><span>mdi-laptop-windows</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lastfm"></i></a><code>f326</code><span>mdi-lastfm</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-launch"></i></a><code>f327</code><span>mdi-launch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-layers"></i></a><code>f328</code><span>mdi-layers</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-layers-off"></i></a><code>f329</code><span>mdi-layers-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lead-pencil"></i></a><code>f64f</code><span>mdi-lead-pencil</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-leaf"></i></a><code>f32a</code><span>mdi-leaf</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-led-off"></i></a><code>f32b</code><span>mdi-led-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-led-on"></i></a><code>f32c</code><span>mdi-led-on</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-led-outline"></i></a><code>f32d</code><span>mdi-led-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-led-variant-off"></i></a><code>f32e</code><span>mdi-led-variant-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-led-variant-on"></i></a><code>f32f</code><span>mdi-led-variant-on</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-led-variant-outline"></i></a><code>f330</code><span>mdi-led-variant-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-library"></i></a><code>f331</code><span>mdi-library</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-library-books"></i></a><code>f332</code><span>mdi-library-books</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-library-music"></i></a><code>f333</code><span>mdi-library-music</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-library-plus"></i></a><code>f334</code><span>mdi-library-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lightbulb"></i></a><code>f335</code><span>mdi-lightbulb</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lightbulb-on"></i></a><code>f6e7</code><span>mdi-lightbulb-on</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lightbulb-on-outline"></i></a><code>f6e8</code><span>mdi-lightbulb-on-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lightbulb-outline"></i></a><code>f336</code><span>mdi-lightbulb-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-link"></i></a><code>f337</code><span>mdi-link</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-link-off"></i></a><code>f338</code><span>mdi-link-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-link-variant"></i></a><code>f339</code><span>mdi-link-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-link-variant-off"></i></a><code>f33a</code><span>mdi-link-variant-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-linkedin"></i></a><code>f33b</code><span>mdi-linkedin</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-linkedin-box"></i></a><code>f33c</code><span>mdi-linkedin-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-linux"></i></a><code>f33d</code><span>mdi-linux</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lock"></i></a><code>f33e</code><span>mdi-lock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lock-open"></i></a><code>f33f</code><span>mdi-lock-open</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lock-open-outline"></i></a><code>f340</code><span>mdi-lock-open-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lock-outline"></i></a><code>f341</code><span>mdi-lock-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lock-pattern"></i></a><code>f6e9</code><span>mdi-lock-pattern</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lock-plus"></i></a><code>f5fb</code><span>mdi-lock-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-login"></i></a><code>f342</code><span>mdi-login</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-login-variant"></i></a><code>f5fc</code><span>mdi-login-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-logout"></i></a><code>f343</code><span>mdi-logout</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-logout-variant"></i></a><code>f5fd</code><span>mdi-logout-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-looks"></i></a><code>f344</code><span>mdi-looks</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-loop"></i></a><code>f6ea</code><span>mdi-loop</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-loupe"></i></a><code>f345</code><span>mdi-loupe</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-lumx"></i></a><code>f346</code><span>mdi-lumx</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-magnet"></i></a><code>f347</code><span>mdi-magnet</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-magnet-on"></i></a><code>f348</code><span>mdi-magnet-on</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-magnify"></i></a><code>f349</code><span>mdi-magnify</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-magnify-minus"></i></a><code>f34a</code><span>mdi-magnify-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-magnify-minus-outline"></i></a><code>f6eb</code><span>mdi-magnify-minus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-magnify-plus"></i></a><code>f34b</code><span>mdi-magnify-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-magnify-plus-outline"></i></a><code>f6ec</code><span>mdi-magnify-plus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-mail-ru"></i></a><code>f34c</code><span>mdi-mail-ru</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-mailbox"></i></a><code>f6ed</code><span>mdi-mailbox</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map"></i></a><code>f34d</code><span>mdi-map</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map-marker"></i></a><code>f34e</code><span>mdi-map-marker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map-marker-circle"></i></a><code>f34f</code><span>mdi-map-marker-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map-marker-minus"></i></a><code>f650</code><span>mdi-map-marker-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map-marker-multiple"></i></a><code>f350</code><span>mdi-map-marker-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map-marker-off"></i></a><code>f351</code><span>mdi-map-marker-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map-marker-plus"></i></a><code>f651</code><span>mdi-map-marker-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-map-marker-radius"></i></a><code>f352</code><span>mdi-map-marker-radius</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-margin"></i></a><code>f353</code><span>mdi-margin</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-markdown"></i></a><code>f354</code><span>mdi-markdown</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-marker"></i></a><code>f652</code><span>mdi-marker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-marker-check"></i></a><code>f355</code><span>mdi-marker-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-martini"></i></a><code>f356</code><span>mdi-martini</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-material-ui"></i></a><code>f357</code><span>mdi-material-ui</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-math-compass"></i></a><code>f358</code><span>mdi-math-compass</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-matrix"></i></a><code>f628</code><span>mdi-matrix</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-maxcdn"></i></a><code>f359</code><span>mdi-maxcdn</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-medical-bag"></i></a><code>f6ee</code><span>mdi-medical-bag</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-medium"></i></a><code>f35a</code><span>mdi-medium</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-memory"></i></a><code>f35b</code><span>mdi-memory</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-menu"></i></a><code>f35c</code><span>mdi-menu</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-menu-down"></i></a><code>f35d</code><span>mdi-menu-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-menu-down-outline"></i></a><code>f6b5</code><span>mdi-menu-down-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-menu-left"></i></a><code>f35e</code><span>mdi-menu-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-menu-right"></i></a><code>f35f</code><span>mdi-menu-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-menu-up"></i></a><code>f360</code><span>mdi-menu-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-menu-up-outline"></i></a><code>f6b6</code><span>mdi-menu-up-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message"></i></a><code>f361</code><span>mdi-message</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-alert"></i></a><code>f362</code><span>mdi-message-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-bulleted"></i></a><code>f6a1</code><span>mdi-message-bulleted</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-bulleted-off"></i></a><code>f6a2</code><span>mdi-message-bulleted-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-draw"></i></a><code>f363</code><span>mdi-message-draw</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-image"></i></a><code>f364</code><span>mdi-message-image</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-outline"></i></a><code>f365</code><span>mdi-message-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-plus"></i></a><code>f653</code><span>mdi-message-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-processing"></i></a><code>f366</code><span>mdi-message-processing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-reply"></i></a><code>f367</code><span>mdi-message-reply</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-reply-text"></i></a><code>f368</code><span>mdi-message-reply-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-settings"></i></a><code>f6ef</code><span>mdi-message-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-settings-variant"></i></a><code>f6f0</code><span>mdi-message-settings-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-text"></i></a><code>f369</code><span>mdi-message-text</span></div>

                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-text-outline"></i></a><code>f36a</code><span>mdi-message-text-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-message-video"></i></a><code>f36b</code><span>mdi-message-video</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-meteor"></i></a><code>f629</code><span>mdi-meteor</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microphone"></i></a><code>f36c</code><span>mdi-microphone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microphone-off"></i></a><code>f36d</code><span>mdi-microphone-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microphone-outline"></i></a><code>f36e</code><span>mdi-microphone-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microphone-settings"></i></a><code>f36f</code><span>mdi-microphone-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microphone-variant"></i></a><code>f370</code><span>mdi-microphone-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microphone-variant-off"></i></a><code>f371</code><span>mdi-microphone-variant-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microscope"></i></a><code>f654</code><span>mdi-microscope</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-microsoft"></i></a><code>f372</code><span>mdi-microsoft</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-minecraft"></i></a><code>f373</code><span>mdi-minecraft</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-minus"></i></a><code>f374</code><span>mdi-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-minus-box"></i></a><code>f375</code><span>mdi-minus-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-minus-box-outline"></i></a><code>f6f1</code><span>mdi-minus-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-minus-circle"></i></a><code>f376</code><span>mdi-minus-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-minus-circle-outline"></i></a><code>f377</code><span>mdi-minus-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-minus-network"></i></a><code>f378</code><span>mdi-minus-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-mixcloud"></i></a><code>f62a</code><span>mdi-mixcloud</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-monitor"></i></a><code>f379</code><span>mdi-monitor</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-monitor-multiple"></i></a><code>f37a</code><span>mdi-monitor-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-more"></i></a><code>f37b</code><span>mdi-more</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-motorbike"></i></a><code>f37c</code><span>mdi-motorbike</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-mouse"></i></a><code>f37d</code><span>mdi-mouse</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-mouse-off"></i></a><code>f37e</code><span>mdi-mouse-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-mouse-variant"></i></a><code>f37f</code><span>mdi-mouse-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-mouse-variant-off"></i></a><code>f380</code><span>mdi-mouse-variant-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-move-resize"></i></a><code>f655</code><span>mdi-move-resize</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-move-resize-variant"></i></a><code>f656</code><span>mdi-move-resize-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-movie"></i></a><code>f381</code><span>mdi-movie</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-multiplication"></i></a><code>f382</code><span>mdi-multiplication</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-multiplication-box"></i></a><code>f383</code><span>mdi-multiplication-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-box"></i></a><code>f384</code><span>mdi-music-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-box-outline"></i></a><code>f385</code><span>mdi-music-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-circle"></i></a><code>f386</code><span>mdi-music-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note"></i></a><code>f387</code><span>mdi-music-note</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-bluetooth"></i></a><code>f5fe</code><span>mdi-music-note-bluetooth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-bluetooth-off"></i></a><code>f5ff</code><span>mdi-music-note-bluetooth-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-eighth"></i></a><code>f388</code><span>mdi-music-note-eighth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-half"></i></a><code>f389</code><span>mdi-music-note-half</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-off"></i></a><code>f38a</code><span>mdi-music-note-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-quarter"></i></a><code>f38b</code><span>mdi-music-note-quarter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-sixteenth"></i></a><code>f38c</code><span>mdi-music-note-sixteenth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-music-note-whole"></i></a><code>f38d</code><span>mdi-music-note-whole</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nature"></i></a><code>f38e</code><span>mdi-nature</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nature-people"></i></a><code>f38f</code><span>mdi-nature-people</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-navigation"></i></a><code>f390</code><span>mdi-navigation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-near-me"></i></a><code>f5cd</code><span>mdi-near-me</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-needle"></i></a><code>f391</code><span>mdi-needle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nest-protect"></i></a><code>f392</code><span>mdi-nest-protect</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nest-thermostat"></i></a><code>f393</code><span>mdi-nest-thermostat</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-network"></i></a><code>f6f2</code><span>mdi-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-network-download"></i></a><code>f6f3</code><span>mdi-network-download</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-network-question"></i></a><code>f6f4</code><span>mdi-network-question</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-network-upload"></i></a><code>f6f5</code><span>mdi-network-upload</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-new-box"></i></a><code>f394</code><span>mdi-new-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-newspaper"></i></a><code>f395</code><span>mdi-newspaper</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nfc"></i></a><code>f396</code><span>mdi-nfc</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nfc-tap"></i></a><code>f397</code><span>mdi-nfc-tap</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nfc-variant"></i></a><code>f398</code><span>mdi-nfc-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nodejs"></i></a><code>f399</code><span>mdi-nodejs</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-note"></i></a><code>f39a</code><span>mdi-note</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-note-multiple"></i></a><code>f6b7</code><span>mdi-note-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-note-multiple-outline"></i></a><code>f6b8</code><span>mdi-note-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-note-outline"></i></a><code>f39b</code><span>mdi-note-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-note-plus"></i></a><code>f39c</code><span>mdi-note-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-note-plus-outline"></i></a><code>f39d</code><span>mdi-note-plus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-note-text"></i></a><code>f39e</code><span>mdi-note-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-notification-clear-all"></i></a><code>f39f</code><span>mdi-notification-clear-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-npm"></i></a><code>f6f6</code><span>mdi-npm</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nuke"></i></a><code>f6a3</code><span>mdi-nuke</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric"></i></a><code>f3a0</code><span>mdi-numeric</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-0-box"></i></a><code>f3a1</code><span>mdi-numeric-0-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-0-box-multiple-outline"></i></a><code>f3a2</code><span>mdi-numeric-0-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-0-box-outline"></i></a><code>f3a3</code><span>mdi-numeric-0-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-1-box"></i></a><code>f3a4</code><span>mdi-numeric-1-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-1-box-multiple-outline"></i></a><code>f3a5</code><span>mdi-numeric-1-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-1-box-outline"></i></a><code>f3a6</code><span>mdi-numeric-1-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-2-box"></i></a><code>f3a7</code><span>mdi-numeric-2-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-2-box-multiple-outline"></i></a><code>f3a8</code><span>mdi-numeric-2-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-2-box-outline"></i></a><code>f3a9</code><span>mdi-numeric-2-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-3-box"></i></a><code>f3aa</code><span>mdi-numeric-3-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-3-box-multiple-outline"></i></a><code>f3ab</code><span>mdi-numeric-3-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-3-box-outline"></i></a><code>f3ac</code><span>mdi-numeric-3-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-4-box"></i></a><code>f3ad</code><span>mdi-numeric-4-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-4-box-multiple-outline"></i></a><code>f3ae</code><span>mdi-numeric-4-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-4-box-outline"></i></a><code>f3af</code><span>mdi-numeric-4-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-5-box"></i></a><code>f3b0</code><span>mdi-numeric-5-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-5-box-multiple-outline"></i></a><code>f3b1</code><span>mdi-numeric-5-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-5-box-outline"></i></a><code>f3b2</code><span>mdi-numeric-5-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-6-box"></i></a><code>f3b3</code><span>mdi-numeric-6-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-6-box-multiple-outline"></i></a><code>f3b4</code><span>mdi-numeric-6-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-6-box-outline"></i></a><code>f3b5</code><span>mdi-numeric-6-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-7-box"></i></a><code>f3b6</code><span>mdi-numeric-7-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-7-box-multiple-outline"></i></a><code>f3b7</code><span>mdi-numeric-7-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-7-box-outline"></i></a><code>f3b8</code><span>mdi-numeric-7-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-8-box"></i></a><code>f3b9</code><span>mdi-numeric-8-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-8-box-multiple-outline"></i></a><code>f3ba</code><span>mdi-numeric-8-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-8-box-outline"></i></a><code>f3bb</code><span>mdi-numeric-8-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-9-box"></i></a><code>f3bc</code><span>mdi-numeric-9-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-9-box-multiple-outline"></i></a><code>f3bd</code><span>mdi-numeric-9-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-9-box-outline"></i></a><code>f3be</code><span>mdi-numeric-9-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-9-plus-box"></i></a><code>f3bf</code><span>mdi-numeric-9-plus-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-9-plus-box-multiple-outline"></i></a><code>f3c0</code><span>mdi-numeric-9-plus-box-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-numeric-9-plus-box-outline"></i></a><code>f3c1</code><span>mdi-numeric-9-plus-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nut"></i></a><code>f6f7</code><span>mdi-nut</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-nutrition"></i></a><code>f3c2</code><span>mdi-nutrition</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-oar"></i></a><code>f67b</code><span>mdi-oar</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-octagon"></i></a><code>f3c3</code><span>mdi-octagon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-octagon-outline"></i></a><code>f3c4</code><span>mdi-octagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-octagram"></i></a><code>f6f8</code><span>mdi-octagram</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-odnoklassniki"></i></a><code>f3c5</code><span>mdi-odnoklassniki</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-office"></i></a><code>f3c6</code><span>mdi-office</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-oil"></i></a><code>f3c7</code><span>mdi-oil</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-oil-temperature"></i></a><code>f3c8</code><span>mdi-oil-temperature</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-omega"></i></a><code>f3c9</code><span>mdi-omega</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-onedrive"></i></a><code>f3ca</code><span>mdi-onedrive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-opacity"></i></a><code>f5cc</code><span>mdi-opacity</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-open-in-app"></i></a><code>f3cb</code><span>mdi-open-in-app</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-open-in-new"></i></a><code>f3cc</code><span>mdi-open-in-new</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-openid"></i></a><code>f3cd</code><span>mdi-openid</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-opera"></i></a><code>f3ce</code><span>mdi-opera</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ornament"></i></a><code>f3cf</code><span>mdi-ornament</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ornament-variant"></i></a><code>f3d0</code><span>mdi-ornament-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-owl"></i></a><code>f3d2</code><span>mdi-owl</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-package"></i></a><code>f3d3</code><span>mdi-package</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-package-down"></i></a><code>f3d4</code><span>mdi-package-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-package-up"></i></a><code>f3d5</code><span>mdi-package-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-package-variant"></i></a><code>f3d6</code><span>mdi-package-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-package-variant-closed"></i></a><code>f3d7</code><span>mdi-package-variant-closed</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-page-first"></i></a><code>f600</code><span>mdi-page-first</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-page-last"></i></a><code>f601</code><span>mdi-page-last</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-page-layout-body"></i></a><code>f6f9</code><span>mdi-page-layout-body</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-page-layout-footer"></i></a><code>f6fa</code><span>mdi-page-layout-footer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-page-layout-header"></i></a><code>f6fb</code><span>mdi-page-layout-header</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-page-layout-sidebar-left"></i></a><code>f6fc</code><span>mdi-page-layout-sidebar-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-page-layout-sidebar-right"></i></a><code>f6fd</code><span>mdi-page-layout-sidebar-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-palette"></i></a><code>f3d8</code><span>mdi-palette</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-palette-advanced"></i></a><code>f3d9</code><span>mdi-palette-advanced</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-panda"></i></a><code>f3da</code><span>mdi-panda</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pandora"></i></a><code>f3db</code><span>mdi-pandora</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-panorama"></i></a><code>f3dc</code><span>mdi-panorama</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-panorama-fisheye"></i></a><code>f3dd</code><span>mdi-panorama-fisheye</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-panorama-horizontal"></i></a><code>f3de</code><span>mdi-panorama-horizontal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-panorama-vertical"></i></a><code>f3df</code><span>mdi-panorama-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-panorama-wide-angle"></i></a><code>f3e0</code><span>mdi-panorama-wide-angle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-paper-cut-vertical"></i></a><code>f3e1</code><span>mdi-paper-cut-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-paperclip"></i></a><code>f3e2</code><span>mdi-paperclip</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-parking"></i></a><code>f3e3</code><span>mdi-parking</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pause"></i></a><code>f3e4</code><span>mdi-pause</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pause-circle"></i></a><code>f3e5</code><span>mdi-pause-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pause-circle-outline"></i></a><code>f3e6</code><span>mdi-pause-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pause-octagon"></i></a><code>f3e7</code><span>mdi-pause-octagon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pause-octagon-outline"></i></a><code>f3e8</code><span>mdi-pause-octagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-paw"></i></a><code>f3e9</code><span>mdi-paw</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-paw-off"></i></a><code>f657</code><span>mdi-paw-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pen"></i></a><code>f3ea</code><span>mdi-pen</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pencil"></i></a><code>f3eb</code><span>mdi-pencil</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pencil-box"></i></a><code>f3ec</code><span>mdi-pencil-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pencil-box-outline"></i></a><code>f3ed</code><span>mdi-pencil-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pencil-circle"></i></a><code>f6fe</code><span>mdi-pencil-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pencil-lock"></i></a><code>f3ee</code><span>mdi-pencil-lock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pencil-off"></i></a><code>f3ef</code><span>mdi-pencil-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pentagon"></i></a><code>f6ff</code><span>mdi-pentagon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pentagon-outline"></i></a><code>f700</code><span>mdi-pentagon-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-percent"></i></a><code>f3f0</code><span>mdi-percent</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pharmacy"></i></a><code>f3f1</code><span>mdi-pharmacy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone"></i></a><code>f3f2</code><span>mdi-phone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-bluetooth"></i></a><code>f3f3</code><span>mdi-phone-bluetooth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-classic"></i></a><code>f602</code><span>mdi-phone-classic</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-forward"></i></a><code>f3f4</code><span>mdi-phone-forward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-hangup"></i></a><code>f3f5</code><span>mdi-phone-hangup</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-in-talk"></i></a><code>f3f6</code><span>mdi-phone-in-talk</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-incoming"></i></a><code>f3f7</code><span>mdi-phone-incoming</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-locked"></i></a><code>f3f8</code><span>mdi-phone-locked</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-log"></i></a><code>f3f9</code><span>mdi-phone-log</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-minus"></i></a><code>f658</code><span>mdi-phone-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-missed"></i></a><code>f3fa</code><span>mdi-phone-missed</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-outgoing"></i></a><code>f3fb</code><span>mdi-phone-outgoing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-paused"></i></a><code>f3fc</code><span>mdi-phone-paused</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-plus"></i></a><code>f659</code><span>mdi-phone-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-settings"></i></a><code>f3fd</code><span>mdi-phone-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-phone-voip"></i></a><code>f3fe</code><span>mdi-phone-voip</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pi"></i></a><code>f3ff</code><span>mdi-pi</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pi-box"></i></a><code>f400</code><span>mdi-pi-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-piano"></i></a><code>f67c</code><span>mdi-piano</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pig"></i></a><code>f401</code><span>mdi-pig</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pill"></i></a><code>f402</code><span>mdi-pill</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pillar"></i></a><code>f701</code><span>mdi-pillar</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pin"></i></a><code>f403</code><span>mdi-pin</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pin-off"></i></a><code>f404</code><span>mdi-pin-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pine-tree"></i></a><code>f405</code><span>mdi-pine-tree</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pine-tree-box"></i></a><code>f406</code><span>mdi-pine-tree-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pinterest"></i></a><code>f407</code><span>mdi-pinterest</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pinterest-box"></i></a><code>f408</code><span>mdi-pinterest-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pistol"></i></a><code>f702</code><span>mdi-pistol</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pizza"></i></a><code>f409</code><span>mdi-pizza</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plane-shield"></i></a><code>f6ba</code><span>mdi-plane-shield</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-play"></i></a><code>f40a</code><span>mdi-play</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-play-box-outline"></i></a><code>f40b</code><span>mdi-play-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-play-circle"></i></a><code>f40c</code><span>mdi-play-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-play-circle-outline"></i></a><code>f40d</code><span>mdi-play-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-play-pause"></i></a><code>f40e</code><span>mdi-play-pause</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-play-protected-content"></i></a><code>f40f</code><span>mdi-play-protected-content</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-playlist-check"></i></a><code>f5c7</code><span>mdi-playlist-check</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-playlist-minus"></i></a><code>f410</code><span>mdi-playlist-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-playlist-play"></i></a><code>f411</code><span>mdi-playlist-play</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-playlist-plus"></i></a><code>f412</code><span>mdi-playlist-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-playlist-remove"></i></a><code>f413</code><span>mdi-playlist-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-playstation"></i></a><code>f414</code><span>mdi-playstation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plex"></i></a><code>f6b9</code><span>mdi-plex</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus"></i></a><code>f415</code><span>mdi-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-box"></i></a><code>f416</code><span>mdi-plus-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-box-outline"></i></a><code>f703</code><span>mdi-plus-box-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-circle"></i></a><code>f417</code><span>mdi-plus-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-circle-multiple-outline"></i></a><code>f418</code><span>mdi-plus-circle-multiple-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-circle-outline"></i></a><code>f419</code><span>mdi-plus-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-network"></i></a><code>f41a</code><span>mdi-plus-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-one"></i></a><code>f41b</code><span>mdi-plus-one</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-plus-outline"></i></a><code>f704</code><span>mdi-plus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pocket"></i></a><code>f41c</code><span>mdi-pocket</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pokeball"></i></a><code>f41d</code><span>mdi-pokeball</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-polaroid"></i></a><code>f41e</code><span>mdi-polaroid</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-poll"></i></a><code>f41f</code><span>mdi-poll</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-poll-box"></i></a><code>f420</code><span>mdi-poll-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-polymer"></i></a><code>f421</code><span>mdi-polymer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pool"></i></a><code>f606</code><span>mdi-pool</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-popcorn"></i></a><code>f422</code><span>mdi-popcorn</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pot"></i></a><code>f65a</code><span>mdi-pot</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pot-mix"></i></a><code>f65b</code><span>mdi-pot-mix</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pound"></i></a><code>f423</code><span>mdi-pound</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pound-box"></i></a><code>f424</code><span>mdi-pound-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-power"></i></a><code>f425</code><span>mdi-power</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-power-plug"></i></a><code>f6a4</code><span>mdi-power-plug</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-power-plug-off"></i></a><code>f6a5</code><span>mdi-power-plug-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-power-settings"></i></a><code>f426</code><span>mdi-power-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-power-socket"></i></a><code>f427</code><span>mdi-power-socket</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-prescription"></i></a><code>f705</code><span>mdi-prescription</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-presentation"></i></a><code>f428</code><span>mdi-presentation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-presentation-play"></i></a><code>f429</code><span>mdi-presentation-play</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-printer"></i></a><code>f42a</code><span>mdi-printer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-printer-3d"></i></a><code>f42b</code><span>mdi-printer-3d</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-printer-alert"></i></a><code>f42c</code><span>mdi-printer-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-printer-settings"></i></a><code>f706</code><span>mdi-printer-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-priority-high"></i></a><code>f603</code><span>mdi-priority-high</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-priority-low"></i></a><code>f604</code><span>mdi-priority-low</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-professional-hexagon"></i></a><code>f42d</code><span>mdi-professional-hexagon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-projector"></i></a><code>f42e</code><span>mdi-projector</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-projector-screen"></i></a><code>f42f</code><span>mdi-projector-screen</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-publish"></i></a><code>f6a6</code><span>mdi-publish</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-pulse"></i></a><code>f430</code><span>mdi-pulse</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-puzzle"></i></a><code>f431</code><span>mdi-puzzle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-qqchat"></i></a><code>f605</code><span>mdi-qqchat</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-qrcode"></i></a><code>f432</code><span>mdi-qrcode</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-qrcode-scan"></i></a><code>f433</code><span>mdi-qrcode-scan</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-quadcopter"></i></a><code>f434</code><span>mdi-quadcopter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-quality-high"></i></a><code>f435</code><span>mdi-quality-high</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-quicktime"></i></a><code>f436</code><span>mdi-quicktime</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radar"></i></a><code>f437</code><span>mdi-radar</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radiator"></i></a><code>f438</code><span>mdi-radiator</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radio"></i></a><code>f439</code><span>mdi-radio</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radio-handheld"></i></a><code>f43a</code><span>mdi-radio-handheld</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radio-tower"></i></a><code>f43b</code><span>mdi-radio-tower</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radioactive"></i></a><code>f43c</code><span>mdi-radioactive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radiobox-blank"></i></a><code>f43d</code><span>mdi-radiobox-blank</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-radiobox-marked"></i></a><code>f43e</code><span>mdi-radiobox-marked</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-raspberrypi"></i></a><code>f43f</code><span>mdi-raspberrypi</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ray-end"></i></a><code>f440</code><span>mdi-ray-end</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ray-end-arrow"></i></a><code>f441</code><span>mdi-ray-end-arrow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ray-start"></i></a><code>f442</code><span>mdi-ray-start</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ray-start-arrow"></i></a><code>f443</code><span>mdi-ray-start-arrow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ray-start-end"></i></a><code>f444</code><span>mdi-ray-start-end</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ray-vertex"></i></a><code>f445</code><span>mdi-ray-vertex</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rdio"></i></a><code>f446</code><span>mdi-rdio</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-react"></i></a><code>f707</code><span>mdi-react</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-read"></i></a><code>f447</code><span>mdi-read</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-readability"></i></a><code>f448</code><span>mdi-readability</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-receipt"></i></a><code>f449</code><span>mdi-receipt</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-record"></i></a><code>f44a</code><span>mdi-record</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-record-rec"></i></a><code>f44b</code><span>mdi-record-rec</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-recycle"></i></a><code>f44c</code><span>mdi-recycle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-reddit"></i></a><code>f44d</code><span>mdi-reddit</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-redo"></i></a><code>f44e</code><span>mdi-redo</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-redo-variant"></i></a><code>f44f</code><span>mdi-redo-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-refresh"></i></a><code>f450</code><span>mdi-refresh</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-regex"></i></a><code>f451</code><span>mdi-regex</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-relative-scale"></i></a><code>f452</code><span>mdi-relative-scale</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-reload"></i></a><code>f453</code><span>mdi-reload</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-remote"></i></a><code>f454</code><span>mdi-remote</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rename-box"></i></a><code>f455</code><span>mdi-rename-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-reorder-horizontal"></i></a><code>f687</code><span>mdi-reorder-horizontal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-reorder-vertical"></i></a><code>f688</code><span>mdi-reorder-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-repeat"></i></a><code>f456</code><span>mdi-repeat</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-repeat-off"></i></a><code>f457</code><span>mdi-repeat-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-repeat-once"></i></a><code>f458</code><span>mdi-repeat-once</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-replay"></i></a><code>f459</code><span>mdi-replay</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-reply"></i></a><code>f45a</code><span>mdi-reply</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-reply-all"></i></a><code>f45b</code><span>mdi-reply-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-reproduction"></i></a><code>f45c</code><span>mdi-reproduction</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-resize-bottom-right"></i></a><code>f45d</code><span>mdi-resize-bottom-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-responsive"></i></a><code>f45e</code><span>mdi-responsive</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-restart"></i></a><code>f708</code><span>mdi-restart</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-restore"></i></a><code>f6a7</code><span>mdi-restore</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rewind"></i></a><code>f45f</code><span>mdi-rewind</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rewind-outline"></i></a><code>f709</code><span>mdi-rewind-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rhombus"></i></a><code>f70a</code><span>mdi-rhombus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rhombus-outline"></i></a><code>f70b</code><span>mdi-rhombus-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ribbon"></i></a><code>f460</code><span>mdi-ribbon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-road"></i></a><code>f461</code><span>mdi-road</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-road-variant"></i></a><code>f462</code><span>mdi-road-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-robot"></i></a><code>f6a8</code><span>mdi-robot</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rocket"></i></a><code>f463</code><span>mdi-rocket</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-roomba"></i></a><code>f70c</code><span>mdi-roomba</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rotate-3d"></i></a><code>f464</code><span>mdi-rotate-3d</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rotate-left"></i></a><code>f465</code><span>mdi-rotate-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rotate-left-variant"></i></a><code>f466</code><span>mdi-rotate-left-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rotate-right"></i></a><code>f467</code><span>mdi-rotate-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rotate-right-variant"></i></a><code>f468</code><span>mdi-rotate-right-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rounded-corner"></i></a><code>f607</code><span>mdi-rounded-corner</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-router-wireless"></i></a><code>f469</code><span>mdi-router-wireless</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-routes"></i></a><code>f46a</code><span>mdi-routes</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rowing"></i></a><code>f608</code><span>mdi-rowing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rss"></i></a><code>f46b</code><span>mdi-rss</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-rss-box"></i></a><code>f46c</code><span>mdi-rss-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ruler"></i></a><code>f46d</code><span>mdi-ruler</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-run"></i></a><code>f70d</code><span>mdi-run</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-run-fast"></i></a><code>f46e</code><span>mdi-run-fast</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sale"></i></a><code>f46f</code><span>mdi-sale</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-satellite"></i></a><code>f470</code><span>mdi-satellite</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-satellite-variant"></i></a><code>f471</code><span>mdi-satellite-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-saxophone"></i></a><code>f609</code><span>mdi-saxophone</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-scale"></i></a><code>f472</code><span>mdi-scale</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-scale-balance"></i></a><code>f5d1</code><span>mdi-scale-balance</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-scale-bathroom"></i></a><code>f473</code><span>mdi-scale-bathroom</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-scanner"></i></a><code>f6aa</code><span>mdi-scanner</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-school"></i></a><code>f474</code><span>mdi-school</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-screen-rotation"></i></a><code>f475</code><span>mdi-screen-rotation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-screen-rotation-lock"></i></a><code>f476</code><span>mdi-screen-rotation-lock</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-screwdriver"></i></a><code>f477</code><span>mdi-screwdriver</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-script"></i></a><code>f478</code><span>mdi-script</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sd"></i></a><code>f479</code><span>mdi-sd</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seal"></i></a><code>f47a</code><span>mdi-seal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-search-web"></i></a><code>f70e</code><span>mdi-search-web</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-flat"></i></a><code>f47b</code><span>mdi-seat-flat</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-flat-angled"></i></a><code>f47c</code><span>mdi-seat-flat-angled</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-individual-suite"></i></a><code>f47d</code><span>mdi-seat-individual-suite</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-legroom-extra"></i></a><code>f47e</code><span>mdi-seat-legroom-extra</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-legroom-normal"></i></a><code>f47f</code><span>mdi-seat-legroom-normal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-legroom-reduced"></i></a><code>f480</code><span>mdi-seat-legroom-reduced</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-recline-extra"></i></a><code>f481</code><span>mdi-seat-recline-extra</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-seat-recline-normal"></i></a><code>f482</code><span>mdi-seat-recline-normal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-security"></i></a><code>f483</code><span>mdi-security</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-security-home"></i></a><code>f689</code><span>mdi-security-home</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-security-network"></i></a><code>f484</code><span>mdi-security-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-select"></i></a><code>f485</code><span>mdi-select</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-select-all"></i></a><code>f486</code><span>mdi-select-all</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-select-inverse"></i></a><code>f487</code><span>mdi-select-inverse</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-select-off"></i></a><code>f488</code><span>mdi-select-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-selection"></i></a><code>f489</code><span>mdi-selection</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-send"></i></a><code>f48a</code><span>mdi-send</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-serial-port"></i></a><code>f65c</code><span>mdi-serial-port</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server"></i></a><code>f48b</code><span>mdi-server</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server-minus"></i></a><code>f48c</code><span>mdi-server-minus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server-network"></i></a><code>f48d</code><span>mdi-server-network</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server-network-off"></i></a><code>f48e</code><span>mdi-server-network-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server-off"></i></a><code>f48f</code><span>mdi-server-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server-plus"></i></a><code>f490</code><span>mdi-server-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server-remove"></i></a><code>f491</code><span>mdi-server-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-server-security"></i></a><code>f492</code><span>mdi-server-security</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-settings"></i></a><code>f493</code><span>mdi-settings</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-settings-box"></i></a><code>f494</code><span>mdi-settings-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shape-circle-plus"></i></a><code>f65d</code><span>mdi-shape-circle-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shape-plus"></i></a><code>f495</code><span>mdi-shape-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shape-polygon-plus"></i></a><code>f65e</code><span>mdi-shape-polygon-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shape-rectangle-plus"></i></a><code>f65f</code><span>mdi-shape-rectangle-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shape-square-plus"></i></a><code>f660</code><span>mdi-shape-square-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-share"></i></a><code>f496</code><span>mdi-share</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-share-variant"></i></a><code>f497</code><span>mdi-share-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shield"></i></a><code>f498</code><span>mdi-shield</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shield-outline"></i></a><code>f499</code><span>mdi-shield-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shopping"></i></a><code>f49a</code><span>mdi-shopping</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shopping-music"></i></a><code>f49b</code><span>mdi-shopping-music</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shovel"></i></a><code>f70f</code><span>mdi-shovel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shovel-off"></i></a><code>f710</code><span>mdi-shovel-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shredder"></i></a><code>f49c</code><span>mdi-shredder</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shuffle"></i></a><code>f49d</code><span>mdi-shuffle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shuffle-disabled"></i></a><code>f49e</code><span>mdi-shuffle-disabled</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-shuffle-variant"></i></a><code>f49f</code><span>mdi-shuffle-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sigma"></i></a><code>f4a0</code><span>mdi-sigma</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sigma-lower"></i></a><code>f62b</code><span>mdi-sigma-lower</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sign-caution"></i></a><code>f4a1</code><span>mdi-sign-caution</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-signal"></i></a><code>f4a2</code><span>mdi-signal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-signal-2g"></i></a><code>f711</code><span>mdi-signal-2g</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-signal-3g"></i></a><code>f712</code><span>mdi-signal-3g</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-signal-4g"></i></a><code>f713</code><span>mdi-signal-4g</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-signal-hspa"></i></a><code>f714</code><span>mdi-signal-hspa</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-signal-hspa-plus"></i></a><code>f715</code><span>mdi-signal-hspa-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-signal-variant"></i></a><code>f60a</code><span>mdi-signal-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-silverware"></i></a><code>f4a3</code><span>mdi-silverware</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-silverware-fork"></i></a><code>f4a4</code><span>mdi-silverware-fork</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-silverware-spoon"></i></a><code>f4a5</code><span>mdi-silverware-spoon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-silverware-variant"></i></a><code>f4a6</code><span>mdi-silverware-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sim"></i></a><code>f4a7</code><span>mdi-sim</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sim-alert"></i></a><code>f4a8</code><span>mdi-sim-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sim-off"></i></a><code>f4a9</code><span>mdi-sim-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sitemap"></i></a><code>f4aa</code><span>mdi-sitemap</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-backward"></i></a><code>f4ab</code><span>mdi-skip-backward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-forward"></i></a><code>f4ac</code><span>mdi-skip-forward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-next"></i></a><code>f4ad</code><span>mdi-skip-next</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-next-circle"></i></a><code>f661</code><span>mdi-skip-next-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-next-circle-outline"></i></a><code>f662</code><span>mdi-skip-next-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-previous"></i></a><code>f4ae</code><span>mdi-skip-previous</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-previous-circle"></i></a><code>f663</code><span>mdi-skip-previous-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skip-previous-circle-outline"></i></a><code>f664</code><span>mdi-skip-previous-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skull"></i></a><code>f68b</code><span>mdi-skull</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skype"></i></a><code>f4af</code><span>mdi-skype</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-skype-business"></i></a><code>f4b0</code><span>mdi-skype-business</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-slack"></i></a><code>f4b1</code><span>mdi-slack</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sleep"></i></a><code>f4b2</code><span>mdi-sleep</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sleep-off"></i></a><code>f4b3</code><span>mdi-sleep-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-smoking"></i></a><code>f4b4</code><span>mdi-smoking</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-smoking-off"></i></a><code>f4b5</code><span>mdi-smoking-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-snapchat"></i></a><code>f4b6</code><span>mdi-snapchat</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-snowflake"></i></a><code>f716</code><span>mdi-snowflake</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-snowman"></i></a><code>f4b7</code><span>mdi-snowman</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-soccer"></i></a><code>f4b8</code><span>mdi-soccer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sofa"></i></a><code>f4b9</code><span>mdi-sofa</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-solid"></i></a><code>f68c</code><span>mdi-solid</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sort"></i></a><code>f4ba</code><span>mdi-sort</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sort-alphabetical"></i></a><code>f4bb</code><span>mdi-sort-alphabetical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sort-ascending"></i></a><code>f4bc</code><span>mdi-sort-ascending</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sort-descending"></i></a><code>f4bd</code><span>mdi-sort-descending</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sort-numeric"></i></a><code>f4be</code><span>mdi-sort-numeric</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sort-variant"></i></a><code>f4bf</code><span>mdi-sort-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-soundcloud"></i></a><code>f4c0</code><span>mdi-soundcloud</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-branch"></i></a><code>f62c</code><span>mdi-source-branch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-commit"></i></a><code>f717</code><span>mdi-source-commit</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-commit-end"></i></a><code>f718</code><span>mdi-source-commit-end</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-commit-end-local"></i></a><code>f719</code><span>mdi-source-commit-end-local</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-commit-local"></i></a><code>f71a</code><span>mdi-source-commit-local</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-commit-next-local"></i></a><code>f71b</code><span>mdi-source-commit-next-local</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-commit-start"></i></a><code>f71c</code><span>mdi-source-commit-start</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-commit-start-next-local"></i></a><code>f71d</code><span>mdi-source-commit-start-next-local</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-fork"></i></a><code>f4c1</code><span>mdi-source-fork</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-merge"></i></a><code>f62d</code><span>mdi-source-merge</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-source-pull"></i></a><code>f4c2</code><span>mdi-source-pull</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-speaker"></i></a><code>f4c3</code><span>mdi-speaker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-speaker-off"></i></a><code>f4c4</code><span>mdi-speaker-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-speaker-wireless"></i></a><code>f71e</code><span>mdi-speaker-wireless</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-speedometer"></i></a><code>f4c5</code><span>mdi-speedometer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-spellcheck"></i></a><code>f4c6</code><span>mdi-spellcheck</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-spotify"></i></a><code>f4c7</code><span>mdi-spotify</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-spotlight"></i></a><code>f4c8</code><span>mdi-spotlight</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-spotlight-beam"></i></a><code>f4c9</code><span>mdi-spotlight-beam</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-spray"></i></a><code>f665</code><span>mdi-spray</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-square-inc"></i></a><code>f4ca</code><span>mdi-square-inc</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-square-inc-cash"></i></a><code>f4cb</code><span>mdi-square-inc-cash</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stackexchange"></i></a><code>f60b</code><span>mdi-stackexchange</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stackoverflow"></i></a><code>f4cc</code><span>mdi-stackoverflow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stadium"></i></a><code>f71f</code><span>mdi-stadium</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stairs"></i></a><code>f4cd</code><span>mdi-stairs</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-star"></i></a><code>f4ce</code><span>mdi-star</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-star-circle"></i></a><code>f4cf</code><span>mdi-star-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-star-half"></i></a><code>f4d0</code><span>mdi-star-half</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-star-off"></i></a><code>f4d1</code><span>mdi-star-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-star-outline"></i></a><code>f4d2</code><span>mdi-star-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-steam"></i></a><code>f4d3</code><span>mdi-steam</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-steering"></i></a><code>f4d4</code><span>mdi-steering</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-step-backward"></i></a><code>f4d5</code><span>mdi-step-backward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-step-backward-2"></i></a><code>f4d6</code><span>mdi-step-backward-2</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-step-forward"></i></a><code>f4d7</code><span>mdi-step-forward</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-step-forward-2"></i></a><code>f4d8</code><span>mdi-step-forward-2</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stethoscope"></i></a><code>f4d9</code><span>mdi-stethoscope</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sticker"></i></a><code>f5d0</code><span>mdi-sticker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stocking"></i></a><code>f4da</code><span>mdi-stocking</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stop"></i></a><code>f4db</code><span>mdi-stop</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stop-circle"></i></a><code>f666</code><span>mdi-stop-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stop-circle-outline"></i></a><code>f667</code><span>mdi-stop-circle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-store"></i></a><code>f4dc</code><span>mdi-store</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-store-24-hour"></i></a><code>f4dd</code><span>mdi-store-24-hour</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-stove"></i></a><code>f4de</code><span>mdi-stove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-subdirectory-arrow-left"></i></a><code>f60c</code><span>mdi-subdirectory-arrow-left</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-subdirectory-arrow-right"></i></a><code>f60d</code><span>mdi-subdirectory-arrow-right</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-subway"></i></a><code>f6ab</code><span>mdi-subway</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-subway-variant"></i></a><code>f4df</code><span>mdi-subway-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sunglasses"></i></a><code>f4e0</code><span>mdi-sunglasses</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-surround-sound"></i></a><code>f5c5</code><span>mdi-surround-sound</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-svg"></i></a><code>f720</code><span>mdi-svg</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-swap-horizontal"></i></a><code>f4e1</code><span>mdi-swap-horizontal</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-swap-vertical"></i></a><code>f4e2</code><span>mdi-swap-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-swim"></i></a><code>f4e3</code><span>mdi-swim</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-switch"></i></a><code>f4e4</code><span>mdi-switch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sword"></i></a><code>f4e5</code><span>mdi-sword</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sync"></i></a><code>f4e6</code><span>mdi-sync</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sync-alert"></i></a><code>f4e7</code><span>mdi-sync-alert</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-sync-off"></i></a><code>f4e8</code><span>mdi-sync-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tab"></i></a><code>f4e9</code><span>mdi-tab</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tab-unselected"></i></a><code>f4ea</code><span>mdi-tab-unselected</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table"></i></a><code>f4eb</code><span>mdi-table</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-column-plus-after"></i></a><code>f4ec</code><span>mdi-table-column-plus-after</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-column-plus-before"></i></a><code>f4ed</code><span>mdi-table-column-plus-before</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-column-remove"></i></a><code>f4ee</code><span>mdi-table-column-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-column-width"></i></a><code>f4ef</code><span>mdi-table-column-width</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-edit"></i></a><code>f4f0</code><span>mdi-table-edit</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-large"></i></a><code>f4f1</code><span>mdi-table-large</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-row-height"></i></a><code>f4f2</code><span>mdi-table-row-height</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-row-plus-after"></i></a><code>f4f3</code><span>mdi-table-row-plus-after</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-row-plus-before"></i></a><code>f4f4</code><span>mdi-table-row-plus-before</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-table-row-remove"></i></a><code>f4f5</code><span>mdi-table-row-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tablet"></i></a><code>f4f6</code><span>mdi-tablet</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tablet-android"></i></a><code>f4f7</code><span>mdi-tablet-android</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tablet-ipad"></i></a><code>f4f8</code><span>mdi-tablet-ipad</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag"></i></a><code>f4f9</code><span>mdi-tag</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag-faces"></i></a><code>f4fa</code><span>mdi-tag-faces</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag-heart"></i></a><code>f68a</code><span>mdi-tag-heart</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag-multiple"></i></a><code>f4fb</code><span>mdi-tag-multiple</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag-outline"></i></a><code>f4fc</code><span>mdi-tag-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag-plus"></i></a><code>f721</code><span>mdi-tag-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag-remove"></i></a><code>f722</code><span>mdi-tag-remove</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tag-text-outline"></i></a><code>f4fd</code><span>mdi-tag-text-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-target"></i></a><code>f4fe</code><span>mdi-target</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-taxi"></i></a><code>f4ff</code><span>mdi-taxi</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-teamviewer"></i></a><code>f500</code><span>mdi-teamviewer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-telegram"></i></a><code>f501</code><span>mdi-telegram</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-television"></i></a><code>f502</code><span>mdi-television</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-television-guide"></i></a><code>f503</code><span>mdi-television-guide</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-temperature-celsius"></i></a><code>f504</code><span>mdi-temperature-celsius</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-temperature-fahrenheit"></i></a><code>f505</code><span>mdi-temperature-fahrenheit</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-temperature-kelvin"></i></a><code>f506</code><span>mdi-temperature-kelvin</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tennis"></i></a><code>f507</code><span>mdi-tennis</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tent"></i></a><code>f508</code><span>mdi-tent</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-terrain"></i></a><code>f509</code><span>mdi-terrain</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-test-tube"></i></a><code>f668</code><span>mdi-test-tube</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-text-shadow"></i></a><code>f669</code><span>mdi-text-shadow</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-text-to-speech"></i></a><code>f50a</code><span>mdi-text-to-speech</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-text-to-speech-off"></i></a><code>f50b</code><span>mdi-text-to-speech-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-textbox"></i></a><code>f60e</code><span>mdi-textbox</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-texture"></i></a><code>f50c</code><span>mdi-texture</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-theater"></i></a><code>f50d</code><span>mdi-theater</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-theme-light-dark"></i></a><code>f50e</code><span>mdi-theme-light-dark</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-thermometer"></i></a><code>f50f</code><span>mdi-thermometer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-thermometer-lines"></i></a><code>f510</code><span>mdi-thermometer-lines</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-thumb-down"></i></a><code>f511</code><span>mdi-thumb-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-thumb-down-outline"></i></a><code>f512</code><span>mdi-thumb-down-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-thumb-up"></i></a><code>f513</code><span>mdi-thumb-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-thumb-up-outline"></i></a><code>f514</code><span>mdi-thumb-up-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-thumbs-up-down"></i></a><code>f515</code><span>mdi-thumbs-up-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ticket"></i></a><code>f516</code><span>mdi-ticket</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ticket-account"></i></a><code>f517</code><span>mdi-ticket-account</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ticket-confirmation"></i></a><code>f518</code><span>mdi-ticket-confirmation</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ticket-percent"></i></a><code>f723</code><span>mdi-ticket-percent</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tie"></i></a><code>f519</code><span>mdi-tie</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tilde"></i></a><code>f724</code><span>mdi-tilde</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timelapse"></i></a><code>f51a</code><span>mdi-timelapse</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timer"></i></a><code>f51b</code><span>mdi-timer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timer-10"></i></a><code>f51c</code><span>mdi-timer-10</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timer-3"></i></a><code>f51d</code><span>mdi-timer-3</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timer-off"></i></a><code>f51e</code><span>mdi-timer-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timer-sand"></i></a><code>f51f</code><span>mdi-timer-sand</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timer-sand-empty"></i></a><code>f6ac</code><span>mdi-timer-sand-empty</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-timetable"></i></a><code>f520</code><span>mdi-timetable</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-toggle-switch"></i></a><code>f521</code><span>mdi-toggle-switch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-toggle-switch-off"></i></a><code>f522</code><span>mdi-toggle-switch-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tooltip"></i></a><code>f523</code><span>mdi-tooltip</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tooltip-edit"></i></a><code>f524</code><span>mdi-tooltip-edit</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tooltip-image"></i></a><code>f525</code><span>mdi-tooltip-image</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tooltip-outline"></i></a><code>f526</code><span>mdi-tooltip-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tooltip-outline-plus"></i></a><code>f527</code><span>mdi-tooltip-outline-plus</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tooltip-text"></i></a><code>f528</code><span>mdi-tooltip-text</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tooth"></i></a><code>f529</code><span>mdi-tooth</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tor"></i></a><code>f52a</code><span>mdi-tor</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tower-beach"></i></a><code>f680</code><span>mdi-tower-beach</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tower-fire"></i></a><code>f681</code><span>mdi-tower-fire</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-traffic-light"></i></a><code>f52b</code><span>mdi-traffic-light</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-train"></i></a><code>f52c</code><span>mdi-train</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tram"></i></a><code>f52d</code><span>mdi-tram</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-transcribe"></i></a><code>f52e</code><span>mdi-transcribe</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-transcribe-close"></i></a><code>f52f</code><span>mdi-transcribe-close</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-transfer"></i></a><code>f530</code><span>mdi-transfer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-transit-transfer"></i></a><code>f6ad</code><span>mdi-transit-transfer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-translate"></i></a><code>f5ca</code><span>mdi-translate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-treasure-chest"></i></a><code>f725</code><span>mdi-treasure-chest</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tree"></i></a><code>f531</code><span>mdi-tree</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trello"></i></a><code>f532</code><span>mdi-trello</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trending-down"></i></a><code>f533</code><span>mdi-trending-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trending-neutral"></i></a><code>f534</code><span>mdi-trending-neutral</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trending-up"></i></a><code>f535</code><span>mdi-trending-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-triangle"></i></a><code>f536</code><span>mdi-triangle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-triangle-outline"></i></a><code>f537</code><span>mdi-triangle-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trophy"></i></a><code>f538</code><span>mdi-trophy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trophy-award"></i></a><code>f539</code><span>mdi-trophy-award</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trophy-outline"></i></a><code>f53a</code><span>mdi-trophy-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trophy-variant"></i></a><code>f53b</code><span>mdi-trophy-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-trophy-variant-outline"></i></a><code>f53c</code><span>mdi-trophy-variant-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-truck"></i></a><code>f53d</code><span>mdi-truck</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-truck-delivery"></i></a><code>f53e</code><span>mdi-truck-delivery</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-truck-trailer"></i></a><code>f726</code><span>mdi-truck-trailer</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tshirt-crew"></i></a><code>f53f</code><span>mdi-tshirt-crew</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tshirt-v"></i></a><code>f540</code><span>mdi-tshirt-v</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tumblr"></i></a><code>f541</code><span>mdi-tumblr</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tumblr-reblog"></i></a><code>f542</code><span>mdi-tumblr-reblog</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tune"></i></a><code>f62e</code><span>mdi-tune</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-tune-vertical"></i></a><code>f66a</code><span>mdi-tune-vertical</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-twitch"></i></a><code>f543</code><span>mdi-twitch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-twitter"></i></a><code>f544</code><span>mdi-twitter</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-twitter-box"></i></a><code>f545</code><span>mdi-twitter-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-twitter-circle"></i></a><code>f546</code><span>mdi-twitter-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-twitter-retweet"></i></a><code>f547</code><span>mdi-twitter-retweet</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ubuntu"></i></a><code>f548</code><span>mdi-ubuntu</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-umbraco"></i></a><code>f549</code><span>mdi-umbraco</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-umbrella"></i></a><code>f54a</code><span>mdi-umbrella</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-umbrella-outline"></i></a><code>f54b</code><span>mdi-umbrella-outline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-undo"></i></a><code>f54c</code><span>mdi-undo</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-undo-variant"></i></a><code>f54d</code><span>mdi-undo-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-unfold-less"></i></a><code>f54e</code><span>mdi-unfold-less</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-unfold-more"></i></a><code>f54f</code><span>mdi-unfold-more</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-ungroup"></i></a><code>f550</code><span>mdi-ungroup</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-unity"></i></a><code>f6ae</code><span>mdi-unity</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-untappd"></i></a><code>f551</code><span>mdi-untappd</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-update"></i></a><code>f6af</code><span>mdi-update</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-upload"></i></a><code>f552</code><span>mdi-upload</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-usb"></i></a><code>f553</code><span>mdi-usb</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-arrange-above"></i></a><code>f554</code><span>mdi-vector-arrange-above</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-arrange-below"></i></a><code>f555</code><span>mdi-vector-arrange-below</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-circle"></i></a><code>f556</code><span>mdi-vector-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-circle-variant"></i></a><code>f557</code><span>mdi-vector-circle-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-combine"></i></a><code>f558</code><span>mdi-vector-combine</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-curve"></i></a><code>f559</code><span>mdi-vector-curve</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-difference"></i></a><code>f55a</code><span>mdi-vector-difference</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-difference-ab"></i></a><code>f55b</code><span>mdi-vector-difference-ab</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-difference-ba"></i></a><code>f55c</code><span>mdi-vector-difference-ba</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-intersection"></i></a><code>f55d</code><span>mdi-vector-intersection</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-line"></i></a><code>f55e</code><span>mdi-vector-line</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-point"></i></a><code>f55f</code><span>mdi-vector-point</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-polygon"></i></a><code>f560</code><span>mdi-vector-polygon</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-polyline"></i></a><code>f561</code><span>mdi-vector-polyline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-rectangle"></i></a><code>f5c6</code><span>mdi-vector-rectangle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-selection"></i></a><code>f562</code><span>mdi-vector-selection</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-square"></i></a><code>f001</code><span>mdi-vector-square</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-triangle"></i></a><code>f563</code><span>mdi-vector-triangle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vector-union"></i></a><code>f564</code><span>mdi-vector-union</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-verified"></i></a><code>f565</code><span>mdi-verified</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vibrate"></i></a><code>f566</code><span>mdi-vibrate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-video"></i></a><code>f567</code><span>mdi-video</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-video-off"></i></a><code>f568</code><span>mdi-video-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-video-switch"></i></a><code>f569</code><span>mdi-video-switch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-agenda"></i></a><code>f56a</code><span>mdi-view-agenda</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-array"></i></a><code>f56b</code><span>mdi-view-array</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-carousel"></i></a><code>f56c</code><span>mdi-view-carousel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-column"></i></a><code>f56d</code><span>mdi-view-column</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-dashboard"></i></a><code>f56e</code><span>mdi-view-dashboard</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-day"></i></a><code>f56f</code><span>mdi-view-day</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-grid"></i></a><code>f570</code><span>mdi-view-grid</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-headline"></i></a><code>f571</code><span>mdi-view-headline</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-list"></i></a><code>f572</code><span>mdi-view-list</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-module"></i></a><code>f573</code><span>mdi-view-module</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-parallel"></i></a><code>f727</code><span>mdi-view-parallel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-quilt"></i></a><code>f574</code><span>mdi-view-quilt</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-sequential"></i></a><code>f728</code><span>mdi-view-sequential</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-stream"></i></a><code>f575</code><span>mdi-view-stream</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-view-week"></i></a><code>f576</code><span>mdi-view-week</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vimeo"></i></a><code>f577</code><span>mdi-vimeo</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vine"></i></a><code>f578</code><span>mdi-vine</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-violin"></i></a><code>f60f</code><span>mdi-violin</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-visualstudio"></i></a><code>f610</code><span>mdi-visualstudio</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vk"></i></a><code>f579</code><span>mdi-vk</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vk-box"></i></a><code>f57a</code><span>mdi-vk-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vk-circle"></i></a><code>f57b</code><span>mdi-vk-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vlc"></i></a><code>f57c</code><span>mdi-vlc</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-voice"></i></a><code>f5cb</code><span>mdi-voice</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-voicemail"></i></a><code>f57d</code><span>mdi-voicemail</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-volume-high"></i></a><code>f57e</code><span>mdi-volume-high</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-volume-low"></i></a><code>f57f</code><span>mdi-volume-low</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-volume-medium"></i></a><code>f580</code><span>mdi-volume-medium</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-volume-off"></i></a><code>f581</code><span>mdi-volume-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-vpn"></i></a><code>f582</code><span>mdi-vpn</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-walk"></i></a><code>f583</code><span>mdi-walk</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wallet"></i></a><code>f584</code><span>mdi-wallet</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wallet-giftcard"></i></a><code>f585</code><span>mdi-wallet-giftcard</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wallet-membership"></i></a><code>f586</code><span>mdi-wallet-membership</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wallet-travel"></i></a><code>f587</code><span>mdi-wallet-travel</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wan"></i></a><code>f588</code><span>mdi-wan</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-washing-machine"></i></a><code>f729</code><span>mdi-washing-machine</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-watch"></i></a><code>f589</code><span>mdi-watch</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-watch-export"></i></a><code>f58a</code><span>mdi-watch-export</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-watch-import"></i></a><code>f58b</code><span>mdi-watch-import</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-watch-vibrate"></i></a><code>f6b0</code><span>mdi-watch-vibrate</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-water"></i></a><code>f58c</code><span>mdi-water</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-water-off"></i></a><code>f58d</code><span>mdi-water-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-water-percent"></i></a><code>f58e</code><span>mdi-water-percent</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-water-pump"></i></a><code>f58f</code><span>mdi-water-pump</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-watermark"></i></a><code>f612</code><span>mdi-watermark</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-cloudy"></i></a><code>f590</code><span>mdi-weather-cloudy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-fog"></i></a><code>f591</code><span>mdi-weather-fog</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-hail"></i></a><code>f592</code><span>mdi-weather-hail</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-lightning"></i></a><code>f593</code><span>mdi-weather-lightning</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-lightning-rainy"></i></a><code>f67d</code><span>mdi-weather-lightning-rainy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-night"></i></a><code>f594</code><span>mdi-weather-night</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-partlycloudy"></i></a><code>f595</code><span>mdi-weather-partlycloudy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-pouring"></i></a><code>f596</code><span>mdi-weather-pouring</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-rainy"></i></a><code>f597</code><span>mdi-weather-rainy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-snowy"></i></a><code>f598</code><span>mdi-weather-snowy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-snowy-rainy"></i></a><code>f67e</code><span>mdi-weather-snowy-rainy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-sunny"></i></a><code>f599</code><span>mdi-weather-sunny</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-sunset"></i></a><code>f59a</code><span>mdi-weather-sunset</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-sunset-down"></i></a><code>f59b</code><span>mdi-weather-sunset-down</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-sunset-up"></i></a><code>f59c</code><span>mdi-weather-sunset-up</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-windy"></i></a><code>f59d</code><span>mdi-weather-windy</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weather-windy-variant"></i></a><code>f59e</code><span>mdi-weather-windy-variant</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-web"></i></a><code>f59f</code><span>mdi-web</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-webcam"></i></a><code>f5a0</code><span>mdi-webcam</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-webhook"></i></a><code>f62f</code><span>mdi-webhook</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-webpack"></i></a><code>f72a</code><span>mdi-webpack</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wechat"></i></a><code>f611</code><span>mdi-wechat</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weight"></i></a><code>f5a1</code><span>mdi-weight</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-weight-kilogram"></i></a><code>f5a2</code><span>mdi-weight-kilogram</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-whatsapp"></i></a><code>f5a3</code><span>mdi-whatsapp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wheelchair-accessibility"></i></a><code>f5a4</code><span>mdi-wheelchair-accessibility</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-white-balance-auto"></i></a><code>f5a5</code><span>mdi-white-balance-auto</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-white-balance-incandescent"></i></a><code>f5a6</code><span>mdi-white-balance-incandescent</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-white-balance-iridescent"></i></a><code>f5a7</code><span>mdi-white-balance-iridescent</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-white-balance-sunny"></i></a><code>f5a8</code><span>mdi-white-balance-sunny</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-widgets"></i></a><code>f72b</code><span>mdi-widgets</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wifi"></i></a><code>f5a9</code><span>mdi-wifi</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wifi-off"></i></a><code>f5aa</code><span>mdi-wifi-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wii"></i></a><code>f5ab</code><span>mdi-wii</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wiiu"></i></a><code>f72c</code><span>mdi-wiiu</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wikipedia"></i></a><code>f5ac</code><span>mdi-wikipedia</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-window-close"></i></a><code>f5ad</code><span>mdi-window-close</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-window-closed"></i></a><code>f5ae</code><span>mdi-window-closed</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-window-maximize"></i></a><code>f5af</code><span>mdi-window-maximize</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-window-minimize"></i></a><code>f5b0</code><span>mdi-window-minimize</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-window-open"></i></a><code>f5b1</code><span>mdi-window-open</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-window-restore"></i></a><code>f5b2</code><span>mdi-window-restore</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-windows"></i></a><code>f5b3</code><span>mdi-windows</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wordpress"></i></a><code>f5b4</code><span>mdi-wordpress</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-worker"></i></a><code>f5b5</code><span>mdi-worker</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wrap"></i></a><code>f5b6</code><span>mdi-wrap</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wrench"></i></a><code>f5b7</code><span>mdi-wrench</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-wunderlist"></i></a><code>f5b8</code><span>mdi-wunderlist</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xaml"></i></a><code>f673</code><span>mdi-xaml</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xbox"></i></a><code>f5b9</code><span>mdi-xbox</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xbox-controller"></i></a><code>f5ba</code><span>mdi-xbox-controller</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xbox-controller-off"></i></a><code>f5bb</code><span>mdi-xbox-controller-off</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xda"></i></a><code>f5bc</code><span>mdi-xda</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xing"></i></a><code>f5bd</code><span>mdi-xing</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xing-box"></i></a><code>f5be</code><span>mdi-xing-box</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xing-circle"></i></a><code>f5bf</code><span>mdi-xing-circle</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-xml"></i></a><code>f5c0</code><span>mdi-xml</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-yeast"></i></a><code>f5c1</code><span>mdi-yeast</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-yelp"></i></a><code>f5c2</code><span>mdi-yelp</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-yin-yang"></i></a><code>f67f</code><span>mdi-yin-yang</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-youtube-play"></i></a><code>f5c3</code><span>mdi-youtube-play</span></div>
                                        <div><a href='#' class="change-icon"><i class="mdi mdi-zip-box"></i></a><code>f5c4</code><span>mdi-zip-box</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
              </div>
              <!-- /#ion-icons -->
				  
			  <div class="tab-pane" id="themify_icon">
              		<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Arrows & Direction Icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-up"></i></a> ti-arrow-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-right"></i></a> ti-arrow-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-left"></i></a> ti-arrow-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-down"></i></a> ti-arrow-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrows-vertical"></i></a> ti-arrows-vertical </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrows-horizontal"></i></a> ti-arrows-horizontal </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-up"></i></a> ti-angle-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-right"></i></a> ti-angle-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-left"></i></a> ti-angle-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-down"></i></a> ti-angle-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-double-up"></i></a> ti-angle-double-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-double-right"></i></a> ti-angle-double-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-double-left"></i></a> ti-angle-double-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-angle-double-down"></i></a> ti-angle-double-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-move"></i></a> ti-move </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-fullscreen"></i></a> ti-fullscreen </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-top-right"></i></a> ti-arrow-top-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-top-left"></i></a> ti-arrow-top-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-circle-up"></i></a> ti-arrow-circle-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-circle-right"></i></a> ti-arrow-circle-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-circle-left"></i></a> ti-arrow-circle-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrow-circle-down"></i></a> ti-arrow-circle-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-arrows-corner"></i></a> ti-arrows-corner </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-split-v"></i></a> ti-split-v </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-split-v-alt"></i></a> ti-split-v-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-split-h"></i></a> ti-split-h </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hand-point-up"></i></a> ti-hand-point-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hand-point-right"></i></a> ti-hand-point-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hand-point-left"></i></a> ti-hand-point-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hand-point-down"></i></a> ti-hand-point-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-back-right"></i></a> ti-back-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-back-left"></i></a> ti-back-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-exchange-vertical"></i></a> ti-exchange-vertical </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Web App Icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-wand"></i></a> ti-wand </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-save"></i></a> ti-save </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-save-alt"></i></a> ti-save-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-direction"></i></a> ti-direction </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-direction-alt"></i></a> ti-direction-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-user"></i></a> ti-user </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-link"></i></a> ti-link </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-unlink"></i></a> ti-unlink </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-trash"></i></a> ti-trash </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-target"></i></a> ti-target </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-tag"></i></a> ti-tag </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-desktop"></i></a> ti-desktop </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-tablet"></i></a> ti-tablet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-mobile"></i></a> ti-mobile </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-email"></i></a> ti-email </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-star"></i></a> ti-star </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-spray"></i></a> ti-spray </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-signal"></i></a> ti-signal </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shopping-cart"></i></a> ti-shopping-cart </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shopping-cart-full"></i></a> ti-shopping-cart-full </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-settings"></i></a> ti-settings </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-search"></i></a> ti-search </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-zoom-in"></i></a> ti-zoom-in </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-zoom-out"></i></a> ti-zoom-out </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-cut"></i></a> ti-cut </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-ruler"></i></a> ti-ruler </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-ruler-alt-2"></i></a> ti-ruler-alt-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-ruler-pencil"></i></a> ti-ruler-pencil </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-ruler-alt"></i></a> ti-ruler-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bookmark"></i></a> ti-bookmark </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bookmark-alt"></i></a> ti-bookmark-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-reload"></i></a> ti-reload </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-plus"></i></a> ti-plus </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-minus"></i></a> ti-minus </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-close"></i></a> ti-close </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pin"></i></a> ti-pin </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pencil"></i></a> ti-pencil </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pencil-alt"></i></a> ti-pencil-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-paint-roller"></i></a> ti-paint-roller </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-paint-bucket"></i></a> ti-paint-bucket </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-na"></i></a> ti-na </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-medall"></i></a> ti-medall </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-medall-alt"></i></a> ti-medall-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-marker"></i></a> ti-marker </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-marker-alt"></i></a> ti-marker-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-lock"></i></a> ti-lock </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-unlock"></i></a> ti-unlock </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-location-arrow"></i></a> ti-location-arrow </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout"></i></a> ti-layout </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layers"></i></a> ti-layers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layers-alt"></i></a> ti-layers-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-key"></i></a> ti-key </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-image"></i></a> ti-image </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-heart"></i></a> ti-heart </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-heart-broken"></i></a> ti-heart-broken </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hand-stop"></i></a> ti-hand-stop </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hand-open"></i></a> ti-hand-open </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hand-drag"></i></a> ti-hand-drag </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-flag"></i></a> ti-flag </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-flag-alt"></i></a> ti-flag-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-flag-alt-2"></i></a> ti-flag-alt-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-eye"></i></a> ti-eye </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-import"></i></a> ti-import </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-export"></i></a> ti-export </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-cup"></i></a> ti-cup </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-crown"></i></a> ti-crown </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-comments"></i></a> ti-comments </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-comment"></i></a> ti-comment </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-comment-alt"></i></a> ti-comment-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-thought"></i></a> ti-thought </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-clip"></i></a> ti-clip </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-check"></i></a> ti-check </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-check-box"></i></a> ti-check-box </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-camera"></i></a> ti-camera </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-announcement"></i></a> ti-announcement </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-brush"></i></a> ti-brush </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-brush-alt"></i></a> ti-brush-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-palette"></i></a> ti-palette </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-briefcase"></i></a> ti-briefcase </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bolt"></i></a> ti-bolt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bolt-alt"></i></a> ti-bolt-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-blackboard"></i></a> ti-blackboard </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bag"></i></a> ti-bag </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-world"></i></a> ti-world </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-wheelchair"></i></a> ti-wheelchair </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-car"></i></a> ti-car </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-truck"></i></a> ti-truck </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-timer"></i></a> ti-timer </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-ticket"></i></a> ti-ticket </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-thumb-up"></i></a> ti-thumb-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-thumb-down"></i></a> ti-thumb-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-stats-up"></i></a> ti-stats-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-stats-down"></i></a> ti-stats-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shine"></i></a> ti-shine </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shift-right"></i></a> ti-shift-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shift-left"></i></a> ti-shift-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shift-right-alt"></i></a> ti-shift-right-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shift-left-alt"></i></a> ti-shift-left-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shield"></i></a> ti-shield </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-notepad"></i></a> ti-notepad </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-server"></i></a> ti-server </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pulse"></i></a> ti-pulse </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-printer"></i></a> ti-printer </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-power-off"></i></a> ti-power-off </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-plug"></i></a> ti-plug </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pie-chart"></i></a> ti-pie-chart </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-panel"></i></a> ti-panel </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-package"></i></a> ti-package </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-music"></i></a> ti-music </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-music-alt"></i></a> ti-music-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-mouse"></i></a> ti-mouse </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-mouse-alt"></i></a> ti-mouse-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-money"></i></a> ti-money </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-microphone"></i></a> ti-microphone </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-menu"></i></a> ti-menu </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-menu-alt"></i></a> ti-menu-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-map"></i></a> ti-map </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-map-alt"></i></a> ti-map-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-location-pin"></i></a> ti-location-pin </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-light-bulb"></i></a> ti-light-bulb </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-info"></i></a> ti-info </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-infinite"></i></a> ti-infinite </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-id-badge"></i></a> ti-id-badge </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-hummer"></i></a> ti-hummer </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-home"></i></a> ti-home </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-help"></i></a> ti-help </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-headphone"></i></a> ti-headphone </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-harddrives"></i></a> ti-harddrives </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-harddrive"></i></a> ti-harddrive </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-gift"></i></a> ti-gift </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-game"></i></a> ti-game </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-filter"></i></a> ti-filter </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-files"></i></a> ti-files </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-file"></i></a> ti-file </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-zip"></i></a> ti-zip </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-folder"></i></a> ti-folder </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-envelope"></i></a> ti-envelope </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-dashboard"></i></a> ti-dashboard </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-cloud"></i></a> ti-cloud </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-cloud-up"></i></a> ti-cloud-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-cloud-down"></i></a> ti-cloud-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-clipboard"></i></a> ti-clipboard </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-calendar"></i></a> ti-calendar </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-book"></i></a> ti-book </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bell"></i></a> ti-bell </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-basketball"></i></a> ti-basketball </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bar-chart"></i></a> ti-bar-chart </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-bar-chart-alt"></i></a> ti-bar-chart-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-archive"></i></a> ti-archive </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-anchor"></i></a> ti-anchor </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-alert"></i></a> ti-alert </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-alarm-clock"></i></a> ti-alarm-clock </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-agenda"></i></a> ti-agenda </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-write"></i></a> ti-write </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-wallet"></i></a> ti-wallet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-video-clapper"></i></a> ti-video-clapper </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-video-camera"></i></a> ti-video-camera </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-vector"></i></a> ti-vector </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-support"></i></a> ti-support </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-stamp"></i></a> ti-stamp </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-slice"></i></a> ti-slice </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-shortcode"></i></a> ti-shortcode </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-receipt"></i></a> ti-receipt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pin2"></i></a> ti-pin2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pin-alt"></i></a> ti-pin-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pencil-alt2"></i></a> ti-pencil-alt2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-eraser"></i></a> ti-eraser </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-more"></i></a> ti-more </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-more-alt"></i></a> ti-more-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-microphone-alt"></i></a> ti-microphone-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-magnet"></i></a> ti-magnet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-line-double"></i></a> ti-line-double </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-line-dotted"></i></a> ti-line-dotted </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-line-dashed"></i></a> ti-line-dashed </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-ink-pen"></i></a> ti-ink-pen </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-info-alt"></i></a> ti-info-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-help-alt"></i></a> ti-help-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-headphone-alt"></i></a> ti-headphone-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-gallery"></i></a> ti-gallery </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-face-smile"></i></a> ti-face-smile </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-face-sad"></i></a> ti-face-sad </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-credit-card"></i></a> ti-credit-card </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-comments-smiley"></i></a> ti-comments-smiley </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-time"></i></a> ti-time </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-share"></i></a> ti-share </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-share-alt"></i></a> ti-share-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-rocket"></i></a> ti-rocket </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-new-window"></i></a> ti-new-window </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-rss"></i></a> ti-rss </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-rss-alt"></i></a> ti-rss-alt </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Control Icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-stop"></i></a> ti-control-stop </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-shuffle"></i></a> ti-control-shuffle </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-play"></i></a> ti-control-play </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-pause"></i></a> ti-control-pause </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-forward"></i></a> ti-control-forward </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-backward"></i></a> ti-control-backward </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-volume"></i></a> ti-volume </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-skip-forward"></i></a> ti-control-skip-forward </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-skip-backward"></i></a> ti-control-skip-backward </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-record"></i></a> ti-control-record </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-control-eject"></i></a> ti-control-eject </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Text Editor Icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-paragraph"></i></a> ti-paragraph </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-uppercase"></i></a> ti-uppercase </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-underline"></i></a> ti-underline </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-text"></i></a> ti-text </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-Italic"></i></a> ti-Italic </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-smallcap"></i></a> ti-smallcap </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-list"></i></a> ti-list </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-list-ol"></i></a> ti-list-ol </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-align-right"></i></a> ti-align-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-align-left"></i></a> ti-align-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-align-justify"></i></a> ti-align-justify </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-align-center"></i></a> ti-align-center </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-quote-right"></i></a> ti-quote-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-quote-left"></i></a> ti-quote-left </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Layout Icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-width-full"></i></a> ti-layout-width-full </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-width-default"></i></a> ti-layout-width-default </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-width-default-alt"></i></a> ti-layout-width-default-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-tab"></i></a> ti-layout-tab </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-tab-window"></i></a> ti-layout-tab-window </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-tab-v"></i></a> ti-layout-tab-v </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-tab-min"></i></a> ti-layout-tab-min </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-slider"></i></a> ti-layout-slider </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-slider-alt"></i></a> ti-layout-slider-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-sidebar-right"></i></a> ti-layout-sidebar-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-sidebar-none"></i></a> ti-layout-sidebar-none </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-sidebar-left"></i></a> ti-layout-sidebar-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-placeholder"></i></a> ti-layout-placeholder </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-menu"></i></a> ti-layout-menu </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-menu-v"></i></a> ti-layout-menu-v </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-menu-separated"></i></a> ti-layout-menu-separated </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-menu-full"></i></a> ti-layout-menu-full </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-right"></i></a> ti-layout-media-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-right-alt"></i></a> ti-layout-media-right-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-overlay"></i></a> ti-layout-media-overlay </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-overlay-alt"></i></a> ti-layout-media-overlay-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-overlay-alt-2"></i></a> ti-layout-media-overlay-alt-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-left"></i></a> ti-layout-media-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-left-alt"></i></a> ti-layout-media-left-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-center"></i></a> ti-layout-media-center </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-media-center-alt"></i></a> ti-layout-media-center-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-list-thumb"></i></a> ti-layout-list-thumb </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-list-thumb-alt"></i></a> ti-layout-list-thumb-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-list-post"></i></a> ti-layout-list-post </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-list-large-image"></i></a> ti-layout-list-large-image </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-line-solid"></i></a> ti-layout-line-solid </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-grid4"></i></a> ti-layout-grid4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-grid3"></i></a> ti-layout-grid3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-grid2"></i></a> ti-layout-grid2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-grid2-thumb"></i></a> ti-layout-grid2-thumb </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-cta-right"></i></a> ti-layout-cta-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-cta-left"></i></a> ti-layout-cta-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-cta-center"></i></a> ti-layout-cta-center </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-cta-btn-right"></i></a> ti-layout-cta-btn-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-cta-btn-left"></i></a> ti-layout-cta-btn-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-column4"></i></a> ti-layout-column4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-column3"></i></a> ti-layout-column3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-column2"></i></a> ti-layout-column2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-accordion-separated"></i></a> ti-layout-accordion-separated </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-accordion-merged"></i></a> ti-layout-accordion-merged </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-accordion-list"></i></a> ti-layout-accordion-list </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-widgetized"></i></a> ti-widgetized </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-widget"></i></a> ti-widget </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-widget-alt"></i></a> ti-widget-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-view-list"></i></a> ti-view-list </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-view-list-alt"></i></a> ti-view-list-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-view-grid"></i></a> ti-view-grid </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-upload"></i></a> ti-upload </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-download"></i></a> ti-download </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-loop"></i></a> ti-loop </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-sidebar-2"></i></a> ti-layout-sidebar-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-grid4-alt"></i></a> ti-layout-grid4-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-grid3-alt"></i></a> ti-layout-grid3-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-grid2-alt"></i></a> ti-layout-grid2-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-column4-alt"></i></a> ti-layout-column4-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-column3-alt"></i></a> ti-layout-column3-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-layout-column2-alt"></i></a> ti-layout-column2-alt </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Brand Icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-flickr"></i></a> ti-flickr </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-flickr-alt"></i></a> ti-flickr-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-instagram"></i></a> ti-instagram </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-google"></i></a> ti-google </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-github"></i></a> ti-github </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-facebook"></i></a> ti-facebook </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-dropbox"></i></a> ti-dropbox </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-dropbox-alt"></i></a> ti-dropbox-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-dribbble"></i></a> ti-dribbble </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-apple"></i></a> ti-apple </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-android"></i></a> ti-android </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-yahoo"></i></a> ti-yahoo </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-trello"></i></a> ti-trello </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-stack-overflow"></i></a> ti-stack-overflow </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-soundcloud"></i></a> ti-soundcloud </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-sharethis"></i></a> ti-sharethis </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-sharethis-alt"></i></a> ti-sharethis-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-reddit"></i></a> ti-reddit </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-microsoft"></i></a> ti-microsoft </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-microsoft-alt"></i></a> ti-microsoft-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-linux"></i></a> ti-linux </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-jsfiddle"></i></a> ti-jsfiddle </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-joomla"></i></a> ti-joomla </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-html5"></i></a> ti-html5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-css3"></i></a> ti-css3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-drupal"></i></a> ti-drupal </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-wordpress"></i></a> ti-wordpress </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-tumblr"></i></a> ti-tumblr </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-tumblr-alt"></i></a> ti-tumblr-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-skype"></i></a> ti-skype </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-youtube"></i></a> ti-youtube </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-vimeo"></i></a> ti-vimeo </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-vimeo-alt"></i></a> ti-vimeo-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-twitter"></i></a> ti-twitter </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-twitter-alt"></i></a> ti-twitter-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-linkedin"></i></a> ti-linkedin </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pinterest"></i></a> ti-pinterest </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-pinterest-alt"></i></a> ti-pinterest-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-themify-logo"></i></a> ti-themify-logo </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-themify-favicon"></i></a> ti-themify-favicon </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4"><a href='#' class="change-icon"> <i class="ti-themify-favicon-alt"></i></a> ti-themify-favicon-alt </div>
                                </div>
                            </div>
                        </div>  
              </div>
              <!-- /#ion-icons -->
			  <div class="tab-pane" id="weather_icon">
    					<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">25 icons v2.0 <span class="label label-sm label-success">New </span></h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-cloudy-high"></i></a> wi wi-day-cloudy-high </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moonrise"></i></a>wi wi-moonrise </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-volcano"></i></a>wi wi-volcano </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-light-wind"></i></a>wi wi-day-light-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moonset"></i></a>wi wi-moonset </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-flood"></i></a>wi wi-flood </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-train"></i></a>wi wi-train </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-sleet"></i></a>wi wi-day-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-sleet"></i></a>wi wi-night-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-sandstorm"></i></a>wi wi-sandstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-small-craft-advisory"></i></a>wi wi-small-craft-advisory </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-haze"></i></a>wi wi-day-haze </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-sleet"></i></a>wi wi-night-alt-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-tsunami"></i></a>wi wi-tsunami </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-gale-warning"></i></a>wi wi-gale-warning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-cloudy-high"></i></a>wi wi-night-cloudy-high </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-raindrop"></i></a>wi wi-raindrop </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-earthquake"></i></a>wi wi-earthquake </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-storm-warning"></i></a>wi wi-storm-warning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-partly-cloudy"></i></a>wi wi-night-alt-partly-cloudy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-barometer"></i></a>wi wi-barometer </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-fire"></i></a>wi wi-fire </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-hurricane-warning"></i></a>wi wi-hurricane-warning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-sleet"></i></a>wi wi-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-humidity"></i></a>wi wi-humidity </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daytime icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-sunny"></i></a> wi wi-day-sunny </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-cloudy"></i></a> wi wi-day-cloudy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-cloudy-gusts"></i></a> wi wi-day-cloudy-gusts </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-cloudy-windy"></i></a> wi wi-day-cloudy-windy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-fog"></i></a> wi wi-day-fog </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-hail"></i></a> wi wi-day-hail </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-haze"></i></a> wi wi-day-haze </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-lightning"></i></a> wi wi-day-lightning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-rain"></i></a> wi wi-day-rain </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-rain-mix"></i></a> wi wi-day-rain-mix </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-rain-wind"></i></a> wi wi-day-rain-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-showers"></i></a> wi wi-day-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-sleet"></i></a> wi wi-day-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-sleet-storm"></i></a> wi wi-day-sleet-storm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-snow"></i></a> wi wi-day-snow </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-snow-thunderstorm"></i></a> wi wi-day-snow-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-snow-wind"></i></a> wi wi-day-snow-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-sprinkle"></i></a> wi wi-day-sprinkle </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-storm-showers"></i></a> wi wi-day-storm-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-sunny-overcast"></i></a> wi wi-day-sunny-overcast </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-thunderstorm"></i></a> wi wi-day-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-windy"></i></a> wi wi-day-windy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-solar-eclipse"></i></a> wi wi-solar-eclipse </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-hot"></i></a> wi wi-hot </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-cloudy-high"></i></a> wi wi-day-cloudy-high </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-day-light-wind"></i></a> wi wi-day-light-wind </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Night Time icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-clear"></i></a> wi wi-night-clear </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-cloudy"></i></a> wi wi-night-alt-cloudy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-cloudy-gusts"></i></a> wi wi-night-alt-cloudy-gusts </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-cloudy-windy"></i></a> wi wi-night-alt-cloudy-windy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-hail"></i></a> wi wi-night-alt-hail </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-lightning"></i></a> wi wi-night-alt-lightning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-rain"></i></a> wi wi-night-alt-rain </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-rain-mix"></i></a> wi wi-night-alt-rain-mix </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-rain-wind"></i></a> wi wi-night-alt-rain-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-showers"></i></a> wi wi-night-alt-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-sleet"></i></a> wi wi-night-alt-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-sleet-storm"></i></a> wi wi-night-alt-sleet-storm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-snow"></i></a> wi wi-night-alt-snow </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-snow-thunderstorm"></i></a> wi wi-night-alt-snow-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-snow-wind"></i></a> wi wi-night-alt-snow-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-sprinkle"></i></a> wi wi-night-alt-sprinkle </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-storm-showers"></i></a> wi wi-night-alt-storm-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-thunderstorm"></i></a> wi wi-night-alt-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-cloudy"></i></a> wi wi-night-cloudy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-cloudy-gusts"></i></a> wi wi-night-cloudy-gusts </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-cloudy-windy"></i></a> wi wi-night-cloudy-windy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-fog"></i></a> wi wi-night-fog </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-hail"></i></a> wi wi-night-hail </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-lightning"></i></a> wi wi-night-lightning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-partly-cloudy"></i></a> wi wi-night-partly-cloudy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-rain"></i></a> wi wi-night-rain </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-rain-mix"></i></a> wi wi-night-rain-mix </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-rain-wind"></i></a> wi wi-night-rain-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-showers"></i></a> wi wi-night-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-sleet"></i></a> wi wi-night-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-sleet-storm"></i></a> wi wi-night-sleet-storm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-snow"></i></a> wi wi-night-snow </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-snow-thunderstorm"></i></a> wi wi-night-snow-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-snow-wind"></i></a> wi wi-night-snow-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-sprinkle"></i></a> wi wi-night-sprinkle </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-storm-showers"></i></a> wi wi-night-storm-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-thunderstorm"></i></a> wi wi-night-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-lunar-eclipse"></i></a> wi wi-lunar-eclipse </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-stars"></i></a> wi wi-stars </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-storm-showers"></i></a> wi wi-storm-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-thunderstorm"></i></a> wi wi-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-cloudy-high"></i></a> wi wi-night-alt-cloudy-high </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-cloudy-high"></i></a> wi wi-night-cloudy-high </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-night-alt-partly-cloudy"></i></a> wi wi-night-alt-partly-cloudy </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Neutral icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-cloud"></i></a> wi wi-cloud </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-cloudy"></i></a> wi wi-cloudy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-cloudy-gusts"></i></a> wi wi-cloudy-gusts </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-cloudy-windy"></i></a> wi wi-cloudy-windy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-fog"></i></a> wi wi-fog </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-hail"></i></a> wi wi-hail </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-rain"></i></a> wi wi-rain </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-rain-mix"></i></a> wi wi-rain-mix </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-rain-wind"></i></a> wi wi-rain-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-showers"></i></a> wi wi-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-sleet"></i></a> wi wi-sleet </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-snow"></i></a> wi wi-snow </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-sprinkle"></i></a> wi wi-sprinkle </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-storm-showers"></i></a> wi wi-storm-showers </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-thunderstorm"></i></a> wi wi-thunderstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-snow-wind"></i></a> wi wi-snow-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-snow"></i></a> wi wi-snow </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-smog"></i></a> wi wi-smog </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-smoke"></i></a> wi wi-smoke </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-lightning"></i></a> wi wi-lightning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-raindrops"></i></a> wi wi-raindrops </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-raindrop"></i></a> wi wi-raindrop </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-dust"></i></a> wi wi-dust </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-snowflake-cold"></i></a> wi wi-snowflake-cold </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-windy"></i></a> wi wi-windy </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-strong-wind"></i></a> wi wi-strong-wind </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-sandstorm"></i></a> wi wi-sandstorm </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-earthquake"></i></a> wi wi-earthquake </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-fire"></i></a> wi wi-fire </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-flood"></i></a> wi wi-flood </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-meteor"></i></a> wi wi-meteor </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-tsunami"></i></a> wi wi-tsunami </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-volcano"></i></a> wi wi-volcano </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-hurricane"></i></a> wi wi-hurricane </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-tornado"></i></a> wi wi-tornado </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-small-craft-advisory"></i></a> wi wi-small-craft-advisory </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-gale-warning"></i></a> wi wi-gale-warning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-storm-warning"></i></a> wi wi-storm-warning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-hurricane-warning"></i></a> wi wi-hurricane-warning </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-wind-direction"></i></a> wi wi-wind-direction </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Moon Phase icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-new"></i></a> wi wi-moon-new </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-cresent-1"></i></a> wi wi-moon-waxing-cresent-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-cresent-2"></i></a> wi wi-moon-waxing-cresent-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-cresent-3"></i></a> wi wi-moon-waxing-cresent-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-cresent-4"></i></a> wi wi-moon-waxing-cresent-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-cresent-5"></i></a> wi wi-moon-waxing-cresent-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-cresent-6"></i></a> wi wi-moon-waxing-cresent-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-first-quarter"></i></a> wi wi-moon-first-quarter </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-gibbous-1"></i></a> wi wi-moon-waxing-gibbous-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-gibbous-2"></i></a> wi wi-moon-waxing-gibbous-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-gibbous-3"></i></a> wi wi-moon-waxing-gibbous-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-gibbous-4"></i></a> wi wi-moon-waxing-gibbous-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-gibbous-5"></i></a> wi wi-moon-waxing-gibbous-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waxing-gibbous-6"></i></a> wi wi-moon-waxing-gibbous-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-full"></i></a> wi wi-moon-full </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-gibbous-1"></i></a> wi wi-moon-waning-gibbous-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-gibbous-2"></i></a> wi wi-moon-waning-gibbous-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-gibbous-3"></i></a> wi wi-moon-waning-gibbous-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-gibbous-4"></i></a> wi wi-moon-waning-gibbous-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-gibbous-5"></i></a> wi wi-moon-waning-gibbous-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-gibbous-6"></i></a> wi wi-moon-waning-gibbous-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-third-quarter"></i></a> wi wi-moon-third-quarter </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-crescent-1"></i></a> wi wi-moon-waning-crescent-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-crescent-2"></i></a> wi wi-moon-waning-crescent-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-crescent-3"></i></a> wi wi-moon-waning-crescent-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-crescent-4"></i></a> wi wi-moon-waning-crescent-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-crescent-5"></i></a> wi wi-moon-waning-crescent-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-waning-crescent-6"></i></a> wi wi-moon-waning-crescent-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-new"></i></a> wi wi-moon-alt-new </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-cresent-1"></i></a> wi wi-moon-alt-waxing-cresent-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-cresent-2"></i></a> wi wi-moon-alt-waxing-cresent-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-cresent-3"></i></a> wi wi-moon-alt-waxing-cresent-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-cresent-4"></i></a> wi wi-moon-alt-waxing-cresent-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-cresent-5"></i></a> wi wi-moon-alt-waxing-cresent-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-cresent-6"></i></a> wi wi-moon-alt-waxing-cresent-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-first-quarter"></i></a> wi wi-moon-alt-first-quarter </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-gibbous-1"></i></a> wi wi-moon-alt-waxing-gibbous-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-gibbous-2"></i></a> wi wi-moon-alt-waxing-gibbous-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-gibbous-3"></i></a> wi wi-moon-alt-waxing-gibbous-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-gibbous-4"></i></a> wi wi-moon-alt-waxing-gibbous-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-gibbous-5"></i></a> wi wi-moon-alt-waxing-gibbous-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waxing-gibbous-6"></i></a> wi wi-moon-alt-waxing-gibbous-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-full"></i></a> wi wi-moon-alt-full </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-gibbous-1"></i></a> wi wi-moon-alt-waning-gibbous-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-gibbous-2"></i></a> wi wi-moon-alt-waning-gibbous-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-gibbous-3"></i></a> wi wi-moon-alt-waning-gibbous-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-gibbous-4"></i></a> wi wi-moon-alt-waning-gibbous-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-gibbous-5"></i></a> wi wi-moon-alt-waning-gibbous-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-gibbous-6"></i></a> wi wi-moon-alt-waning-gibbous-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-third-quarter"></i></a> wi wi-moon-alt-third-quarter </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-crescent-1"></i></a> wi wi-moon-alt-waning-crescent-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-crescent-2"></i></a> wi wi-moon-alt-waning-crescent-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-crescent-3"></i></a> wi wi-moon-alt-waning-crescent-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-crescent-4"></i></a> wi wi-moon-alt-waning-crescent-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-crescent-5"></i></a> wi wi-moon-alt-waning-crescent-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moon-alt-waning-crescent-6"></i></a> wi wi-moon-alt-waning-crescent-6 </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Other icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-alien"></i></a> wi wi-alien </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-celsius"></i></a> wi wi-celsius </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-fahrenheit"></i></a> wi wi-fahrenheit </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-degrees"></i></a> wi wi-degrees </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-thermometer"></i></a> wi wi-thermometer </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-thermometer-exterior"></i></a> wi wi-thermometer-exterior </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-thermometer-internal"></i></a> wi wi-thermometer-internal </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-cloud-down"></i></a> wi wi-cloud-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-cloud-up"></i></a> wi wi-cloud-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-cloud-refresh"></i></a> wi wi-cloud-refresh </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-horizon"></i></a> wi wi-horizon </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-horizon-alt"></i></a> wi wi-horizon-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-sunrise"></i></a> wi wi-sunrise </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-sunset"></i></a> wi wi-sunset </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moonrise"></i></a> wi wi-moonrise </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-moonset"></i></a> wi wi-moonset </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-refresh"></i></a> wi wi-refresh </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-refresh-alt"></i></a> wi wi-refresh-alt </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-umbrella"></i></a> wi wi-umbrella </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-barometer"></i></a> wi wi-barometer </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-humidity"></i></a> wi wi-humidity </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-na"></i></a> wi wi-na </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-train"></i></a> wi wi-train </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi "></i></a> wi </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Time icons</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-1"></i></a> wi wi-time-1 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-2"></i></a> wi wi-time-2 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-3"></i></a> wi wi-time-3 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-4"></i></a> wi wi-time-4 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-5"></i></a> wi wi-time-5 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-6"></i></a> wi wi-time-6 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-7"></i></a> wi wi-time-7 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-8"></i></a> wi wi-time-8 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-9"></i></a> wi wi-time-9 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-10"></i></a> wi wi-time-10 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-11"></i></a> wi wi-time-11 </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-time-12"></i></a> wi wi-time-12 </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Directional Arrows</h4>
                                <div class="icon-list-demo row">
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-up"></i></a> wi wi-direction-up </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-up-right"></i></a> wi wi-direction-up-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-right"></i></a> wi wi-direction-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-down-right"></i></a> wi wi-direction-down-right </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-down"></i></a> wi wi-direction-down </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-down-left"></i></a> wi wi-direction-down-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-left"></i></a> wi wi-direction-left </div>
                                    <div class="col-sm-6 col-md-4 col-lg-6"><a href='#' class="change-icon"> <i class="wi wi-direction-up-left"></i></a> wi wi-direction-up-left </div>
                                </div>
                            </div>
                        </div>
              </div>
              <!-- /#ion-icons -->
			  <div class="tab-pane" id="flag_icon">
                	<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">flag icons</h4>
                                <h6 class="card-subtitle">You can use any icons with class <code>flag-icon flag-icon-us</code></h6>
                                <div class="icon-list-demo row">
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ad" title="ad" id="ad"></i></a> AD</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ae" title="ae" id="ae"></i></a> AE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-af" title="af" id="af"></i></a> AF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ag" title="ag" id="ag"></i></a> AG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ai" title="ai" id="ai"></i></a> AU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-al" title="al" id="al"></i></a> AL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-am" title="am" id="am"></i></a> AM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ao" title="ao" id="ao"></i></a> AO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-aq" title="aq" id="aq"></i></a> AQ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ar" title="ar" id="ar"></i></a> AR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-as" title="as" id="as"></i></a> AS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-at" title="at" id="at"></i></a> AT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-au" title="au" id="au"></i></a> AU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-aw" title="aw" id="aw"></i></a> AW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ax" title="ax" id="ax"></i></a> AX</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-az" title="az" id="az"></i></a> AZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ba" title="ba" id="ba"></i></a> BA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bb" title="bb" id="bb"></i></a> BB</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bd" title="bd" id="bd"></i></a> BD</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-be" title="be" id="be"></i></a> BE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bf" title="bf" id="bf"></i></a> BF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bg" title="bg" id="bg"></i></a> BG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bh" title="bh" id="bh"></i></a> BH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bi" title="bi" id="bi"></i></a> BI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bj" title="bj" id="bj"></i></a> BJ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bl" title="bl" id="bl"></i></a> BL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bm" title="bm" id="bm"></i></a> BM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bn" title="bn" id="bn"></i></a> BN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bo" title="bo" id="bo"></i></a> BO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bq" title="bq" id="bq"></i></a> BQ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-br" title="br" id="br"></i></a> BR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bs" title="bs" id="bs"></i></a> BS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bt" title="bt" id="bt"></i></a> BT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bv" title="bv" id="bv"></i></a> BV</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bw" title="bw" id="bw"></i></a> BW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-by" title="by" id="by"></i></a> BY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-bz" title="bz" id="bz"></i></a> BZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ca" title="ca" id="ca"></i></a> CA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cc" title="cc" id="cc"></i></a> CC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cd" title="cd" id="cd"></i></a> CD</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cf" title="cf" id="cf"></i></a> CF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cg" title="cg" id="cg"></i></a> CG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ch" title="ch" id="ch"></i></a> CH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ci" title="ci" id="ci"></i></a> CI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ck" title="ck" id="ck"></i></a> CK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cl" title="cl" id="cl"></i></a> CL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cm" title="cm" id="cm"></i></a> CM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cn" title="cn" id="cn"></i></a> CN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-co" title="co" id="co"></i></a> CO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cr" title="cr" id="cr"></i></a> CR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cu" title="cu" id="cu"></i></a> CU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cv" title="cv" id="cv"></i></a> CV</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cw" title="cw" id="cw"></i></a> CW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cx" title="cx" id="cx"></i></a> CX</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cy" title="cy" id="cy"></i></a> CY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-cz" title="cz" id="cz"></i></a> CZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-de" title="de" id="de"></i></a> DE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-dj" title="dj" id="dj"></i></a> DJ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-dk" title="dk" id="dk"></i></a> DK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-dm" title="dm" id="dm"></i></a> DM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-do" title="do" id="do"></i></a> DO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-dz" title="dz" id="dz"></i></a> DZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ec" title="ec" id="ec"></i></a> EC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ee" title="ee" id="ee"></i></a> EE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-eg" title="eg" id="eg"></i></a> EG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-eh" title="eh" id="eh"></i></a> EH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-er" title="er" id="er"></i></a> ER</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-es" title="es" id="es"></i></a> ES</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-et" title="et" id="et"></i></a> ET</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-fi" title="fi" id="fi"></i></a> FI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-fj" title="fj" id="fj"></i></a> FJ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-fk" title="fk" id="fk"></i></a> FK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-fm" title="fm" id="fm"></i></a> FM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-fo" title="fo" id="fo"></i></a> FO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i></a> FR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ga" title="ga" id="ga"></i></a> GA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gb" title="gb" id="gb"></i></a> GB</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gd" title="gd" id="gd"></i></a> GD</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ge" title="ge" id="ge"></i></a> GE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gf" title="gf" id="gf"></i></a> GF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gg" title="gg" id="gg"></i></a> GG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gh" title="gh" id="gh"></i></a> GH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gi" title="gi" id="gi"></i></a> GI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gl" title="gl" id="gl"></i></a> GL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gm" title="gm" id="gm"></i></a> GM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gn" title="gn" id="gn"></i></a> GN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gp" title="gp" id="gp"></i></a> GP</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gq" title="gq" id="gq"></i></a> GQ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gr" title="gr" id="gr"></i></a> GR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gs" title="gs" id="gs"></i></a> GS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gt" title="gt" id="gt"></i></a> GT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gu" title="gu" id="gu"></i></a> GU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gw" title="gw" id="gw"></i></a> GW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-gy" title="gy" id="gy"></i></a> GY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-hk" title="hk" id="hk"></i></a> HK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-hm" title="hm" id="hm"></i></a> HM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-hn" title="hn" id="hn"></i></a> HN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-hr" title="hr" id="hr"></i></a> HR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ht" title="ht" id="ht"></i></a> HT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-hu" title="hu" id="hu"></i></a> HU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-id" title="id" id="id"></i></a> ID</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ie" title="ie" id="ie"></i></a> IE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-il" title="il" id="il"></i></a> IL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-im" title="im" id="im"></i></a> IM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-in" title="in" id="in"></i></a> IN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-io" title="io" id="io"></i></a> IO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-iq" title="iq" id="iq"></i></a> IQ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ir" title="ir" id="ir"></i></a> IR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-is" title="is" id="is"></i></a> IS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-it" title="it" id="it"></i></a> IT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-je" title="je" id="je"></i></a> JE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-jm" title="jm" id="jm"></i></a> JM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-jo" title="jo" id="jo"></i></a> JO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-jp" title="jp" id="jp"></i></a> JP</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ke" title="ke" id="ke"></i></a> KE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-kg" title="kg" id="kg"></i></a> KG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-kh" title="kh" id="kh"></i></a> KH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ki" title="ki" id="ki"></i></a> KI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-km" title="km" id="km"></i></a> KM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-kn" title="kn" id="kn"></i></a> KN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-kp" title="kp" id="kp"></i></a> KP</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-kr" title="kr" id="kr"></i></a> KR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-kw" title="kw" id="kw"></i></a> KW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ky" title="ky" id="ky"></i></a> KY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-kz" title="kz" id="kz"></i></a> KZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-la" title="la" id="la"></i></a> LA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-lb" title="lb" id="lb"></i></a> LB</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-lc" title="lc" id="lc"></i></a> LC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-li" title="li" id="li"></i></a> LI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-lk" title="lk" id="lk"></i></a> LK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-lr" title="lr" id="lr"></i></a> LR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ls" title="ls" id="ls"></i></a> LS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-lt" title="lt" id="lt"></i></a> LT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-lu" title="lu" id="lu"></i></a> LU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-lv" title="lv" id="lv"></i></a> LV</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ly" title="ly" id="ly"></i></a> LY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ma" title="ma" id="ma"></i></a> MA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mc" title="mc" id="mc"></i></a> MC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-md" title="md" id="md"></i></a> MD</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-me" title="me" id="me"></i></a> ME</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mf" title="mf" id="mf"></i></a> MF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mg" title="mg" id="mg"></i></a> MG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mh" title="mh" id="mh"></i></a> MH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mk" title="mk" id="mk"></i></a> MK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ml" title="ml" id="ml"></i></a> ML</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mm" title="mm" id="mm"></i></a> MM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mn" title="mn" id="mn"></i></a> MN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mo" title="mo" id="mo"></i></a> MO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mp" title="mp" id="mp"></i></a> MP</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mq" title="mq" id="mq"></i></a> MQ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mr" title="mr" id="mr"></i></a> MR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ms" title="ms" id="ms"></i></a> MS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mt" title="mt" id="mt"></i></a> MT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mu" title="mu" id="mu"></i></a> MU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mv" title="mv" id="mv"></i></a> MV</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mw" title="mw" id="mw"></i></a> MW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mx" title="mx" id="mx"></i></a> MX</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-my" title="my" id="my"></i></a> MY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-mz" title="mz" id="mz"></i></a> MZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-na" title="na" id="na"></i></a> NA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-nc" title="nc" id="nc"></i></a> NC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ne" title="ne" id="ne"></i></a> NE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-nf" title="nf" id="nf"></i></a> NF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ng" title="ng" id="ng"></i></a> NG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ni" title="ni" id="ni"></i></a> NI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-nl" title="nl" id="nl"></i></a> NL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-no" title="no" id="no"></i></a> NO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-np" title="np" id="np"></i></a> NP</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-nr" title="nr" id="nr"></i></a> NR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-nu" title="nu" id="nu"></i></a> NU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-nz" title="nz" id="nz"></i></a> NZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-om" title="om" id="om"></i></a> OM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pa" title="pa" id="pa"></i></a> PA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pe" title="pe" id="pe"></i></a> PE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pf" title="pf" id="pf"></i></a> PF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pg" title="pg" id="pg"></i></a> PG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ph" title="ph" id="ph"></i></a> PH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pk" title="pk" id="pk"></i></a> PK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pl" title="pl" id="pl"></i></a> PL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pm" title="pm" id="pm"></i></a> PM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pn" title="pn" id="pn"></i></a> PN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pr" title="pr" id="pr"></i></a> PR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ps" title="ps" id="ps"></i></a> PS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i></a> PT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-pw" title="pw" id="pw"></i></a> PW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-py" title="py" id="py"></i></a> PY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-qa" title="qa" id="qa"></i></a> QA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-re" title="re" id="re"></i></a> RE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ro" title="ro" id="ro"></i></a> RO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-rs" title="rs" id="rs"></i></a> RS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ru" title="ru" id="ru"></i></a> RU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-rw" title="rw" id="rw"></i></a> RW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sa" title="sa" id="sa"></i></a> SA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sb" title="sb" id="sb"></i></a> SB</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sc" title="sc" id="sc"></i></a> SC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sd" title="sd" id="sd"></i></a> SD</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-se" title="se" id="se"></i></a> SE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sg" title="sg" id="sg"></i></a> SG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sh" title="sh" id="sh"></i></a> SH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-si" title="si" id="si"></i></a> SI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sj" title="sj" id="sj"></i></a> SJ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sk" title="sk" id="sk"></i></a> SK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sl" title="sl" id="sl"></i></a> SL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sm" title="sm" id="sm"></i></a> SM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sn" title="sn" id="sn"></i></a> SN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-so" title="so" id="so"></i></a> SO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sr" title="sr" id="sr"></i></a> SR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ss" title="ss" id="ss"></i></a> SS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-st" title="st" id="st"></i></a> ST</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sv" title="sv" id="sv"></i></a> SV</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sx" title="sx" id="sx"></i></a> SX</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sy" title="sy" id="sy"></i></a> SY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-sz" title="sz" id="sz"></i></a> SZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tc" title="tc" id="tc"></i></a> TC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-td" title="td" id="td"></i></a> TD</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tf" title="tf" id="tf"></i></a> TF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tg" title="tg" id="tg"></i></a> TG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-th" title="th" id="th"></i></a>TH</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tj" title="tj" id="tj"></i></a> TJ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tk" title="tk" id="tk"></i></a> TK</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tl" title="tl" id="tl"></i></a> TL</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tm" title="tm" id="tm"></i></a> TM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tn" title="tn" id="tn"></i></a> TN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-to" title="to" id="to"></i></a> TO</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tr" title="tr" id="tr"></i></a> TR</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tt" title="tt" id="tt"></i></a> TT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tv" title="tv" id="tv"></i></a> TV</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tw" title="tw" id="tw"></i></a> TW</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-tz" title="tz" id="tz"></i></a> TZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ua" title="ua" id="ua"></i></a> UA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ug" title="ug" id="ug"></i></a> UG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-um" title="um" id="um"></i></a> UM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-us" title="us" id="us"></i></a> US</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-uy" title="uy" id="uy"></i></a> UY</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-uz" title="uz" id="uz"></i></a> UZ</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-va" title="va" id="va"></i></a> VA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-vc" title="vc" id="vc"></i></a> VC</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ve" title="ve" id="ve"></i></a> VE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-vg" title="vg" id="vg"></i></a> VG</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-vi" title="vi" id="vi"></i></a> VI</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-vn" title="vn" id="vn"></i></a> VN</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-vu" title="vu" id="vu"></i></a> VU</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-wf" title="wf" id="wf"></i></a> WF</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ws" title="ws" id="ws"></i></a> WS</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-ye" title="ye" id="ye"></i></a> YE</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-yt" title="yt" id="yt"></i></a> YT</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-za" title="za" id="za"></i></a> ZA</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-zm" title="zm" id="zm"></i></a> ZM</div>
                                    <div class="col-3"><a href='#' class="change-icon"><i class="flag-icon flag-icon-zw" title="zw" id="zw"></i></a> ZW</div>
                                </div>
                            </div>
                        </div>
              </div>
              <!-- /#ion-icons -->	  

            </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
