<?php?>
<!DOCTYPE html>
<html>
<head>
	<title>redirecting</title>
</head>
<body>




<script type="text/javascript">
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body>
</html>