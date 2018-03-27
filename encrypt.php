<?php 
require_once('head.php');
if(isset($_POST['url'])){
    $str = $_POST['url'] ;
    $str = preg_replace('#^https?://#', '', rtrim($str,'/'));
    $urls = file_get_contents("data.json"); 
    $urls = json_decode($urls,true);
    $random = substr(sha1(microtime()),0,9);
    if(!isset($urls[$random])){
        $urls[$random] = $str;
    }
    file_put_contents('data.json',json_encode($urls));
    echo '<br><div align="center">$domain/user-validation/index.php?url='.$random.'</div><br>';
}
?>
<html>
<head>
<title>Encrypt url here</title>
</head>
    <body >
        <div align="center">
            <form action="" method="post">
                <input id="url" type="text" name="url" placeholder="url">
                <input id="but" type="submit">
            </form>
        </div>
    </body>
</html>