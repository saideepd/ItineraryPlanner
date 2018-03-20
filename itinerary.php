<?php
	session_start();
	ob_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		$places=$_POST['multiple'];
		$pieces = explode(",", $places);
		$length = sizeof($pieces);
		$SESSION['places']=$length;
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$city = trim($_POST['city']);
		$days = trim($_POST['days']);
		$people = trim($_POST['people']);
		$date = trim($_POST['date']);
		$SESSION['name']=$name;
		
		if( !$error ) {
			
			$query = "INSERT INTO users(name,city,days,people,date) VALUES('$name','$city','$days','$people','$date')";
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
	

	<script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>
		Itinerary Form
	</title>
	<style type="text/css">
		.card{
			margin: 100px;
			z-index: 10;
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
    .b-agent-demo_header {
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
        background: #c62828;
        -webkit-transform: translateZ(0);
        transform: translateZ(0) border-radius: 25px;
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
        border-color: #c62828 transparent transparent;
        left: 8px;
        bottom: -8px
    }
    #chat:hover {
        background: #ff5f52;
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
	<div class="card" style="margin-top: 80px">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="images/card-background.jpg" width="600px" height="500px">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Register with us!<i class="material-icons right">more_vert</i></span>
      <p><a href="login.html">Already a Member?Sign in Here!</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Register with us!<i class="material-icons right">close</i></span>
      <div class="row">
	    <form class="col s12" method="post" action="itinerary_form.php">
	      <div class="row">
	        <div class="input-field col s12">
	          <input id="name" type="text" name="name" class="validate" required="true">
	          <label>Name</label>
	        </div>
   	      </div>
	  	<div class="row">
	        <div class="input-field col s12" style="margin: 25px;">
				    <select multiple name="multiple">
				      <option value="" disabled selected>Choose your option</option>
				      <option value="Jaipur">Jaipur</option>
				      <option value="Jaisalmer">Jaisalmer</option>
				      <option value="Udaipur">Udaipur</option>
				    </select>
				    <label>Cities to visit</label>
				  </div>
	    </div>
	    <div class="row">
	        <div class="input-field col s12">
	          <input id="name" type="number" name="days" class="validate" max="9" maxlength="1" required="true">
	          <label>Number of Days</label>
	        </div>
   	      </div>
   	      <div class="row">
	        <div class="input-field col s12">
	          <input id="name" type="number" name="people" class="validate" maxlength="2" required="true">
	          <label>Number of People</label>
	        </div>
   	      </div>
   	      <div class="row" style="margin-left: 1%; ">
	    	<h6>Travel date:</h6>
	    	<input type="text" class="datepicker" name="birthdate" required="true">
	    	</div>
	    <br><br><br>
	    <div class="row">
	  	  <center><button class="btn waves-effect waves-light" type="submit" name="action">Submit</button></center>
		</div>
	  </form>
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

        <div id="chat" class="animated-chat tada" style="border-radius: 25px" onclick="loadChatbox()">
            <div style="color: white">Chat</div>
        </div>
        <div class="chatbox" id="chatbox">
            <!-- 
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
                <h5 class="white-text">Itinerary Planner</h5>
                <p class="grey-text text-lighten-4">You can use our readily available itineraries or make your own custom Itinerary.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Plans</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Royal Plan</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Premium Plan</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Deluxe Plan</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container" style="text-align: center;">
            	Copyrights &copy; 2017
            </div>
          </div>
        </footer>
        <script type="text/javascript">
	        $('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 200, // Creates a dropdown of 15 years to control year,
		    min: new Date().setYear(new Date().getFullYear()),
		    //max: new Date( date.getFullYear(), date.getMonth() + 1, date.getDate() )
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: false // Close upon selecting a date,
		  });     
		  	 $(document).ready(function() {
			    $('select').material_select();
			  });  
	         $('select').material_select('destroy');

           
        </script>
</body>
</html>