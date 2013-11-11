<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<script type="text/javascript" src="<?php echo $this->theme_path.'assets/jwplayer/jwplayer.js' ?>"></script>
	<script type="text/javascript" src="<?php echo $this->theme_path.'assets/jwplayer/jwplayer.html5.js' ?>"></script>

</head>
<body>
	
<?php  

if ( empty( $data_video ) ) 
{
	echo "Can not show video ! ";
	die();
}

?>

<div id="video1" style="overflow: hidden;">
		Loading..
</div>	

<script>

	    jwplayer('video1').setup({
	    file: '<?php echo $data_video ); ?>',
	    // image: '/content/images/phoenix/download_video_preview.png',
	    width: '742',
	    height: '440',
	    stretching: 'fill',
	    // autostart: false
	    
	    // logo: {
	    // file: "http://p.jwpcdn.com/6/0/logo.png",
	    // link: "http://www.longtailvideo.com/jwpabout/?a=l&v=" + jwplayer.version + "&m=f&e=a"
	    // },
	    // abouttext: "JW Player " + jwplayer.version,
	    // aboutlink: "http://www.longtailvideo.com/jwpabout/?a=r&v=" + jwplayer.version + "&m=f&e=a"
	    });
									
</script>
	

</body>
</html>