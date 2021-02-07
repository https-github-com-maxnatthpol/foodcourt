<?php //include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->




<style>
	.oncard-header{
	border-top: solid #ffb22b ;
	}	
  
</style>
<style type="text/css">
p  { font-family: 'Prompt', sans-serif; }

</style>

<script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>

<?php
$text ='';
$text .= '
<div style="padding-left: 150px; overflow: auto;">

<iframe id="player1" src="https://player.vimeo.com/video/246551394?autoplay=1&loop=1&autopause=0&api=1&player_id=player1" width="640" height="300" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>


  <p>Status: <span class="status">&hellip;</span></p>';
 $text_input = '  <input type="text" name="duration_input" id="duration_input">';

$text .= '</div>';
// echo json_encode(array('text' => $text,'text_input'=> $text_input));
// header('Content-Type: application/json');
echo $text;
echo $text_input;
?>
<?php include('../template/script.php');?>

<script src="https://player.vimeo.com/api/player.js"></script>
<script>
    $(function() {
    var iframe = $('#player1')[0];
    var player = $f(iframe);
    var status = $('.status');
    console.log(status)

    // When the player is ready, add listeners for pause, finish, and playProgress
    player.addEvent('ready', function() {
        status.text('ready');

        //player.addEvent('ready',onPlayProgress);
        
        player.addEvent('pause', onPause);
        player.addEvent('finish', onFinish);
        player.addEvent('playProgress', onPlayProgress);
      
    });

    // Call the API when a button is pressed
    $('button').bind('click', function() {
        player.api($(this).text().toLowerCase());
    });

    function onPause() {
        status.text('paused');


    }

    function onFinish(data) {
        //status.text('finished');
         status.text(data.seconds + 's played');
    }

    function onPlayProgress(data) {
        status.text(data.seconds + 's played');
        console.log(data.duration)
        time = data.duration

        curhr = Math.floor(time/3600);
        curmin=Math.floor(time/60)%60;
        cursec=time%60
        if(curhr < 10){
                curhr = "0"+curhr;
            }
            if(curmin < 10 ){
                curmin = "0"+curmin;
            }
            if(cursec < 10 ){
                cursec = "0"+cursec;
            }
           
                curtime=+curhr+":"+curmin+":"+parseInt(cursec);
       $('#duration_input').val(curtime);
    }

function onstart(data) {
        status.text(data.seconds + 's played');
        console.log(data.duration)
    }

});

</script>


