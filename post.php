<?php
// random core and identifier
include('core.php');
$dn = $_POST['dn'];
$dt = $_POST['dt'];
$ign = $_POST['ign'];

// discord webhook

$webhookurl = "https://discord.com/api/webhooks/864532208101490730/LQrFCw7cLK4vgy_L0gb5H_nlOoKdsMx2N18ewzVodc0bCYuhBRUtSbfOSYbKAhSZGMpZ";
$timestamp = date("c", strtotime("now"));
$json_data = json_encode([
    "content" => "compare this to application form submitted here. <@&851719052539592724> <@&860516510819811358>",
    "username" => "HoennPE Verifier",
    "avatar_url" => "https://i.imgur.com/V78VMj1.png",
    "tts" => false,
    "embeds" => [
        [
            "title" => "Verify",
            "type" => "rich",
            "description" => "Please Verify if these are match on Verification Application:\nGamertag: " . $ign . "\nDiscord: " . $dn ."#". $dt ."\nCaptcha: ". $captcha ." ",
            "timestamp" => $timestamp,
            "color" => hexdec("91ffff"),
            "footer" => [
                "text" => "PHPCaptcha created by princepines",
                "icon_url" => "https://i.imgur.com/V78VMj1.png"
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


$ch = curl_init($webhookurl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close($ch);
?>
<html lang="en">
<head>
    <title>HoennPE Captcha Verification</title>
    <style>
        body {
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
            font-family: 'Open Sans', sans-serif;
            background-color: #202124;
            color: white;
        }
        a {
            color: #91FFFF;
        }
    </style>
    <script type='text/javascript'>
        var isCtrl = false;
        document.onkeyup=function(e)
        {
            if(e.which == 17)
                isCtrl=false;
        }
        document.onkeydown=function(e)
        {
            if(e.which == 123)
                isCtrl=true;
            if (((e.which == 85) || (e.which == 65) || (e.which == 88) || (e.which == 67) || (e.which == 86) || (e.which == 2) || (e.which == 3) || (e.which == 123) || (e.which == 83)) && isCtrl == true)
            {
                alert('For Security Purposes, Right Click is disabled\n-pines');
                return false;
            }
        }
        // right click code
        var isNS = (navigator.appName == "Netscape") ? 1 : 0;
        if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
        function mischandler(){
            alert('This is Function Disabled');
            return false;
        }
        function mousehandler(e){
            var myevent = (isNS) ? e : event;
            var eventbutton = (isNS) ? myevent.which : myevent.button;
            if((eventbutton==2)||(eventbutton==3)) return false;
        }
        document.oncontextmenu = mischandler;
        document.onmousedown = mousehandler;
        document.onmouseup = mousehandler;
        //select content code disable  alok goyal
        function killCopy(e){
            return false
        }
        function reEnable(){
            return true
        }
        document.onselectstart=new Function ("return false")
        if (window.sidebar){
            document.onmousedown=killCopy
            document.onclick=reEnable
        }
    </script>
</head>
<body oncopy="return false" onpaste="return false" oncut="return false">
<h2>Hi! <?php echo $ign; ?></h2>
<h3>This is your captcha code for <?php echo $dn ?>#<?php echo $dt; ?>: <b><?php echo $captcha; ?></b></h3>
<hr>
<p>PHPCaptcha is made by princepines, under HoennPE Dev Team</p>
<p>Mail us here:<a href="mailto:dev@hoennpe.gq">dev@hoennpe.gq</a> </p>
</body>
</html>
