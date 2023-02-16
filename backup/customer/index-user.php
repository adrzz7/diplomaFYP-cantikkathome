<?php
	session_start();
  include '../connect.php';
	if(!isset($_SESSION["CUSTOMER_Username"])){
    header("Location:../customer/Login.php");
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>



	<body>
		<div class="nav">
		 <?php include 'header.php';?>
 </div>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <div class="footer">
  <?php include 'footer.php';?>
 </div>


 <!-- Start of LiveChat (www.livechatinc.com) code -->
 <script>
     window.__lc = window.__lc || {};
     window.__lc.license = 12604245;
     ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
 </script>
 <noscript><a href="https://www.livechatinc.com/chat-with/12604245/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
 <!-- End of LiveChat code -->
	</body>
</html>
