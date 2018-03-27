<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php require_once('head.php');?>

<style>
body{
background-image:url("2.png");
font-family: Helvetica,Arial;
color:#fff;
}

</style>
</head>

<body>
<div align="center">
<h1>URL SHORTNER</h1>
<?php

if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] ){
$secret = "GOOGLE RECAPTCHA SITE SECRET";
$ip = $_SERVER['REMOTE_ADDR'];		
$captcha = $_POST['g-recaptcha-response'];
$res = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
$arr = json_decode($res,TRUE);
if($arr["success"]){
if(isset($_POST['code'])){
    $urls = file_get_contents("data.json");
    $urls = json_decode($urls,true);
    if(isset($urls[$_POST['code']])){  
echo "<p>Here is Your Url !</p><br>";   
         $url = "https://{$urls[$_POST['code']]}";
         echo '<script>window.location="'.$url.'"</script>';
    }else
        echo "CODE ERROR";
}
else
    echo "Error: no data on this url";
}else
echo "Invalid Captcha,Please go back and fill in the correcet captcha!";
}else
echo "Please fill in the correct captcha!";

?>
</div>
</body>
</html>
