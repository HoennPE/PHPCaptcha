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
