<iframe src="https://player.vimeo.com/video/128947850" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

<?php include('../template/script.php');?>

<script src="https://player.vimeo.com/api/player.js"></script>

<script type="text/javascript">
	// play the video
$("iframe").vimeo("play");

// pause the video
$("iframe").vimeo("pause");

// jump to a defined position (seconds) in the video
$("iframe").vimeo("seekTo", 10);

// set the volume
$("iframe").vimeo("setVolume", 0.6);

// enable looping
$("iframe").vimeo("setLoop", true);

// set the color
$("iframe").vimeo("setColor", "#666");

// unload the plugin
$("iframe").vimeo("unload");

// play the video
$("iframe").vimeo("play");

// pause the video
$("iframe").vimeo("pause");

// jump to a defined position (seconds) in the video
$("iframe").vimeo("seekTo", 10);

// set the volume
$("iframe").vimeo("setVolume", 0.6);

// enable looping
$("iframe").vimeo("setLoop", true);

// set the color
$("iframe").vimeo("setColor", "#666");

// unload the plugin
$("iframe").vimeo("unload");
// whether video is paused
// return true or false
$("iframe").vimeo("paused", function(data){  
  console.log( "Is paused?", data ); 
})

// get current position (time)
$("iframe").vimeo("getCurrentTime", function(data){
  console.log( "Current time", data ); 
})

// get total duration in seconds
$("iframe").vimeo("getDuration", function(data){
  console.log( "Video length", data ); 
})

// get volume in percentage
$("iframe").vimeo("getVolume", function(data){
  console.log( "Volume is", data ); 
})

// get video's height
$("iframe").vimeo("getVideoHeight", function(data){
  console.log( "Height", data ); 
})

// get video's width
$("iframe").vimeo("getVideoWidth", function(data){
  console.log( "Width", data ); 
})

// get video's URL
$("iframe").vimeo("getVideoUrl", function(data){
  console.log( "Video URL", data ); 
})

// get video's color
$("iframe").vimeo("getColor", function(data){
  console.log( "Player color", data ); 
})

// fired when the video is playing
$("iframe").on("play", function(){
  console.log( "Video is playing" );
});

// fired when the video is paused
$("iframe").on("pause", function(){
  console.log( "Video is paused" );
});

// fired when the video is finished
$("iframe").on("finish", function(){
  console.log( "Video is done playing" );
});

// return information as video is playing
$("iframe").on("playProgress", function(event, data){
  console.log( data );
});

// return information as video is seeking.
$("iframe").on("seek", function(event, data){
  console.log( data );
});

$("iframe").vimeo("play")
  .vimeo("getVolume", function(d){ console.log("volume", d); })
  .vimeo("setVolume", 0.6)
  .vimeo("getVolume", function(d){ console.log("new volume", d); })
  .on("pause", function(){ console.log("paused"); })
</script>