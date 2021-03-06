<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>QuickBlox SuperSample Web/Facebook</title>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&language=en"></script>
	<script type="text/javascript" src="http://crypto-js.googlecode.com/files/2.3.0-crypto-sha1-hmac.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="quickblox.js"></script>
	<script type="text/javascript" src="engine.js"></script>
	<link rel="stylesheet" href="qb-widget-style.css" type="text/css" />
	<style type="text/css" media="screen">
		#qb-widget {
			margin:0 auto;
		}
	</style>
</head>
<body>
	<div id="fb-root"></div>
	<script type="text/javascript">
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '293659350686658',
				status     : true, 
				cookie     : true,
				xfbml      : true,
				oauth      : true,
			});
			
			qbWidgetLogin();			
		};

	   (function(d){
	      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
	      js = d.createElement('script'); js.id = id; js.async = true;
	      js.src = "//connect.facebook.net/en_US/all.js";
	      d.getElementsByTagName('head')[0].appendChild(js);
	    }(document));
	    
	    function qbWidgetLogin() {
			FB.getLoginStatus(function(response) {
				if (response.status == 'connected') {
					$('#qb-auth').hide();
					$('#qb-map').show();
					$('#qb-tabs').show();
					
					console.log(response.status);

					FB.api('/me', function(me) {
						console.log('[DEBUG] fb object ->');
						console.log(me);
						
						$('#qb-welcome-user').html('Howdy, <strong>' + me.name + '</strong>');
						
						init(me);
					});
				} else {
					console.log(response.status);
				}
			});
	    }
	</script>
	
	<div id="qb-widget" ip="91.200.156.203">
		<div id="qb-auth">
			<div id="qb-logo"></div>
			<div id="qb-welcome-text">Welcome to QuickBlox Map Chat<br>powered by <a href="http://quickblox.com">quickblox.com</a></div>
			<div class="fb-login-button" id="fb-login-button" onlogin="qbWidgetLogin()">Login with Facebook</div>
		</div>
		<div id="qb-welcome-user"></div>
		<div id="qb-tabs">
		  <div id="qb-map-tab" class="selected">Map</div>
		  <div id="qb-chat-tab">Chat</div>
		</div>
		<div id="qb-chat">
			<div id="qb-chat-room"></div>
			<div id="qb-send-message-wrap">
				<input type="text" name="status" id="qb-status-message" placeholder="Type message here..." />
				<input type="button" value="Send" id="qb-send-message" />
			</div>
		</div>
		<div id="qb-map">
			<div id="qb_map_canvas"></div>
		</div>
	</div>
</body>
</html>