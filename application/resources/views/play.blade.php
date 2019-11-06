<?php 
if (isset($_SERVER['HTTPS']) &&
	($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
	isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
	$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
	$protocol = 'https://';
}
else {
	$protocol = 'http://';
	header("Location: https://deadlyarena.com/game.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="{{asset('application/public')}}/{{getSettings()->company_logo}}">
  <title>Deadly Arena | Play</title>
</head>
<body>
      <!-- The core Firebase JS SDK is always required and must be listed first -->
      <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
      
      <!-- TODO: Add SDKs for Firebase products that you want to use
          https://firebase.google.com/docs/web/setup#available-libraries -->
      <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-analytics.js"></script>
      
      <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
          apiKey: "AIzaSyAR3BkLVEbRnUEpoz2r3mTB675TVRkcK1c",
          authDomain: "deadly-arena-web.firebaseapp.com",
          databaseURL: "https://deadly-arena-web.firebaseio.com",
          projectId: "deadly-arena-web",
          storageBucket: "deadly-arena-web.appspot.com",
          messagingSenderId: "50475292263",
          appId: "1:50475292263:web:5ae995722209947a3026c2",
          measurementId: "G-SFL9FBHHJC"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
      </script>  
      <main> 
        <iframe src="https://dn6ufkxy0y8vk.cloudfront.net" 
          style="position:fixed; top:0; left:0; bottom:0; right:0; 
          width:100%; height:100%; border:none; margin:0; padding:0; 
          overflow:hidden; z-index:999999;"
          allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
          >
            Your browser doesn't support iframes
        </iframe>
      </main>
</body>
</html>




