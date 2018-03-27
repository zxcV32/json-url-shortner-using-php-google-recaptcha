<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php require_once('head.php'); ?>
<style>
body{
background-image:url("2.png");
font-family: Helvetica,Arial;
color:#fff;
}
</style>
</head>
<body>
<div align="center" >
<h1>URL SHORTNER</h1><p>Please fill in the captcha to proceed!</p>
<form  method="post" action="validate.php">
<div class="g-recaptcha" data-sitekey="GOOGLE RECAPTCHA SITE KEY"></div>
<input name ="code" type="hidden" value="<?php echo $_GET['url'];?>" />
<input type="submit" value="go to link">
</div>
</form>
</body>
</html>
