<?php
  ob_start();
  session_start();
  if( isset($_SESSION['user'])!="" ){
    header("Location: home.php");
  }
  include_once 'dbconnect.php';

 if ( isset($_POST['btn-signup']) ) {
    
    // clean user inputs to prevent sql injections
    $city = trim($_POST['city']);
    $places = trim($_POST['places']);
    
    if( !$error ) {
      
      $query = "INSERT INTO city (city,places) VALUES('$city','$places')";
      $res = mysql_query($query);
        
      if ($res) {
        $errTyp = "success";
        $errMSG = "Successfully registered, you may login now";
      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..."; 
      }    
    }  
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Itinerary form details!
	</title>
	<script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <style type="text/css">
		.card{
			margin: 100px;
			z-index: 10;
		}
		.footer-social{
			width: 3.65%;
			margin: 0.67%;

		}
		body{
			background-color: #ffeab7;
		}
		nav{
			background-color: burlywood;
		}
		.page-footer{
			background-color: burlywood;
		}
		.header{
			color: #cbb887;
			margin: 100px;
		}
		.modal-overlay{
			background:white;
		}
		.modal{
			opacity: 0.5;
		}
		.brand-logo{
			margin-left: 20px;
		}

        /*bot css*/
    #chat,
    #chat:after,
    .chatbox {
        transition: all .4s ease-in-out
    }
    
    #chat,
    #close-chat,
    .minim-button,
    .maxi-button,
    .chat-text {
        font-weight: 700;
        cursor: pointer;
        font-family: Arial, sans-serif;
        text-align: center;
        height: 40px;
        line-height: 35px
    }
     .b-agent-demo_header{
      background-color: white;
    }
    #chat,
    #close-chat,
    .chatbox {
        border: 1px solid #A8A8A8
    }
    
    #chat:after,
    #chat:before {
        position: absolute;
        border-style: solid;
        content: ""
    }
    
    .chatbox {
        border-radius: 10px;
        position: fixed;
        bottom: 15px;
        right: 15px;
        margin: 0 0 -1500px;
        background: #deb887;
        padding: 28px 5px 5px;
        z-index: 100000;
        box-shadow: 0 0 15px 1px #848383
    }
    
    #close-chat {
        position: absolute;
        top: 2px;
        right: 2px;
        font-size: 24px;
        border: 1px solid #dedede;
        width: 40px;
        background: #fefefe;
        z-index: 2;
      border-radius: 25px;
    }
    
    #minim-chat,
    #maxi-chat {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 20px;
        line-height: 20px;
        cursor: pointer;
        z-index: 1
    }
    
    .minim-button {
        position: absolute;
        top: 2px;
        right: 46px;
        font-size: 24px;
        border: 1px solid #dedede;
        width: 40px;
        background: #fefefe;
      border-radius: 25px;
    }
    
    .maxi-button {
        position: absolute;
        top: 2px;
        right: 46px;
        font-size: 24px;
        border: 1px solid #dedede;
        width: 40px;
        background: #fefefe;
        border-radius: 25px;
    }
    
    .chat-text {
        position: absolute;
        top: 5px;
        left: 10px;
        font-size: 16px;
    }
    
    #chat {
        width: 45px;
        border-radius: 3px;
        padding: 2px 8px;
        font-size: 12px;
        background: #3f51b5;
        -webkit-transform: translateZ(0);
        transform: translateZ(0)
        border-radius: 25px;
        position: fixed;
        bottom: 20px;
      right: 18px;  
    }
    
    #chat:before {
        border-width: 10px 11px 0 0;
        border-color: #A8A8A8 transparent transparent;
        left: 7px;
        bottom: -10px
    }
    
    #chat:after {
        border-width: 10px 10px 0 0;
        border-color: #3f51b5 transparent transparent;
        left: 8px;
        bottom: -8px
    }
    
    #chat:hover {
        background: #ef5350;
        -webkit-animation-name: hvr-pulse-grow;
        animation-name: hvr-pulse-grow;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-direction: alternate;
        animation-direction: alternate
    }
    
    #chat:hover:after {
        border-color: #ef5350 transparent transparent!important
    }
    
    .animated-chat {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in
    }
    
    @-webkit-keyframes tada {
        0% {
            -webkit-transform: scale(1)
        }
        10%,
        20% {
            -webkit-transform: scale(.9)rotate(-3deg)
        }
        30%,
        50%,
        70%,
        90% {
            -webkit-transform: scale(1.1)rotate(3deg)
        }
        40%,
        60%,
        80% {
            -webkit-transform: scale(1.1)rotate(-3deg)
        }
        100% {
            -webkit-transform: scale(1)rotate(0)
        }
    }
    
    @keyframes tada {
        0% {
            transform: scale(1)
        }
        10%,
        20% {
            transform: scale(.9)rotate(-3deg)
        }
        30%,
        50%,
        70%,
        90% {
            transform: scale(1.1)rotate(3deg)
        }
        40%,
        60%,
        80% {
            transform: scale(1.1)rotate(-3deg)
        }
        100% {
            transform: scale(1)rotate(0)
        }
    }
    
    .tada {
        -webkit-animation-name: tada;
        animation-name: tada
    }
    
    @-webkit-keyframes hvr-pulse-grow {
        to {
            -webkit-transform: scale(1.1);
            transform: scale(1.1)
        }
    }
    
    @keyframes hvr-pulse-grow {
        to {
            -webkit-transform: scale(1.1);
            transform: scale(1.1)
        }
    }
    
    .b-agent-demo .b-agent-demo_header {
    min-height: 80px;
    height: 80px;
    overflow: hidden;
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #ffeab7;
    display: table;
  }

	</style>
</head>
<body>
<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Rajasthan Tourism</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.html">Home</a></li>
        <li><a href="itinerary.php">Customised Itinerary</a></li>
        <li><a href="maps.html">Check your distance!</a></li>
        <li><a href="aboutus.html">About us!</a></li>
      </ul>
    </div>
</nav>
<div class="col s12 m7">
    <center><h2 class="header">Day 1</h2></center>
    <div class="card horizontal">
      <div class="card-image">
        <img src="images/card-background-1.jpg">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          	<div class="row">
			    <form class="col s12" method="post" action="thankyou.html">
			       <div class="input-field col s12" style="margin: 25px;">
				    <select required="true">
				      <option value="" disabled selected>Choose your option</option>
				      <option value="Jaipur">Jaipur </option>
				      <option value="Jaisalmer">Jaisalmer </option>
				      <option value="Udaipur">Udaipur </option>
				    </select>
				    <label>City</label>
				  </div>
				  <div class="input-field col s12" style="margin: 25px;"">
				    <select multiple required="true">
				      <option value=""  disabled selected>Choose your option</option>
				      <option value="hawamahal">Hawa Mahal</option>
				      <option value="citypalace">City Palace</option>
				      <option value="nahargarhfort">Nahargarh Fort</option>
				    </select>
				    <label>Places to visit</label>
				  </div>
				  <br><br><br><br>
				  <center><button class="waves-effect waves-light btn modal-trigger" type="submit" name="action">Submit
				    <i class="material-icons right">send</i></button></center>

			   </form>
			</div>

      
        </div>
      </div>
    </div>
  </div>
  
  <!-- bot -->
    <div id="preloader" style="opacity: 0; display: none; background-color: #ffeab7;">
        <noscript>
            &lt;h1&gt;This application does'not work without javascript&lt;/h1&gt;
        </noscript>
        <div class="logo"></div>
    </div>

    <div id="chat" class="animated-chat tada" style="border-radius: 25px" onclick="loadChatbox()"><div style="color: white">Chat</div></div>
    <div class="chatbox" id="chatbox"><!-- 
        <span class="chat-text">Chatting Yuk!</span> -->
        <script>
            //<![CDATA[
            document.write('<div id="smartchatbox_img901621879" style="width: 340px; height: 450px; overflow: hidden; margin: auto; padding: 0;">');
            document.write('<div id="smartchatbox901621879" style="width: 340px; height: 450px; overflow: hidden; margin: auto; padding: 0; border:0; ">');
            document.write('<iframe src="https://console.dialogflow.com/api-client/demo/embedded/fe66fb48-0077-4817-b045-9346489491bd" scrolling="no" frameborder="0" width="350px" height="430px" style="border:0; margin:0; padding: 0;">');
            document.write('</iframe></div></div>');
            //]]>
        </script>
        <div id="close-chat" onclick="closeChatbox()">&times;</div>
        <div id="minim-chat" onclick="minimChatbox()"><span class="minim-button">&minus;</span></div>
        <div id="maxi-chat" onclick="loadChatbox()"><span class="maxi-button">&plus;</span></div>
    </div>

    <script>
        //<![CDATA[
        function loadChatbox() {
            var e = document.getElementById("minim-chat");
            e.style.display = "block";
            var e = document.getElementById("maxi-chat");
            e.style.display = "none";
            var e = document.getElementById("chatbox");
            e.style.margin = "0";
        }

        function closeChatbox() {
            var e = document.getElementById("chatbox");
            e.style.margin = "0 0 -1500px 0";
        }

        function minimChatbox() {
            var e = document.getElementById("minim-chat");
            e.style.display = "none";
            var e = document.getElementById("maxi-chat");
            e.style.display = "block";
            var e = document.getElementById("chatbox");
            e.style.margin = "0 0 -460px 0";
        }
        //]]>
    </script>
<!-- bot end -->


<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Follow Us for latest updates and join the conversation</h5>
                <p class="grey-text text-lighten-4">Nodal Officer Website 
				Ms. Shikha Saxena, ACP (Dy. Dir.)<br>

				For suggestions & feedback relating to website, please write to it-dot@rajasthan.gov.in, acpdd-dot@rajasthan.gov.in or call 0141-5155110.<br>

				For any general queries or details, please mail us at namaste@rajasthan.gov.in or call 91-141-5110598</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Follow us at!</h5>
                <ul>
                  <li><a class="footer-social" href="https://www.facebook.com/rajasthantourism" target="_blank">
            <img src="icon/fb-icon.png" alt="Facebook" width="50px" height="50px"></a></li>
                  <li><a class="footer-social" href="https://www.twitter.com/my_rajasthan" target="_blank">
        <img src="icon/tt-icon.png" alt="Twitter" width="50px" height="50px"></a></li>
                  <li><a class="footer-social" href="https://www.instagram.com/rajasthan_tourism/" target="_blank">
        <img src="icon/int-icon.png" alt="Instagram" width="50px" height="50px"></a></li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
             Copyrights &copy; 2017
            </div>
          </div>
        </footer>
        <script type="text/javascript">
        	 $('select').material_select('destroy');
	         $(document).ready(function() {
		     $('select').material_select();
		     });
        </script>
</body>
</html>