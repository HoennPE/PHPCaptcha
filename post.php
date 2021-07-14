<?php
// random core and identifier
include('core.php');
$dn = $_POST['dn'];
$dt = $_POST['dt'];
$ign = $_POST['ign'];

// discord webhook

$webhookurl = "WEBHOOK URL";
$timestamp = date("c", strtotime("now"));
$json_data = json_encode([
    "content" => "YOUR CONTENT",
    "username" => "PHPCaptcha",
    "avatar_url" => "https://i.imgur.com/V78VMj1.png",
    "tts" => false,
    "embeds" => [
        [
            "title" => "TITLE",
            "type" => "rich",
            "description" => "DESCRIPTION",
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <script type='text/javascript' src="restrict.js"></script>
</head>
<body oncopy="return false" onpaste="return false" oncut="return false">
<h2>Hi! <?php echo $ign; ?></h2>
<h3>This is your captcha code for <?php echo $dn ?>#<?php echo $dt; ?>: <b><?php echo $captcha; ?></b></h3>
<hr>
<p>PHPCaptcha is made by princepines, under HoennPE Dev Team</p>
<p>Mail us here:<a href="mailto:dev@hoennpe.gq">dev@hoennpe.gq</a> </p>
<?php include('version.php'); ?>
</body>
</html>
