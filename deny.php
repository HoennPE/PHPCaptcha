<?php
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
                alert('This is Function Disabled');
                return false;
            }
        }
        // right click code
        var isNS = (navigator.appName == "Netscape") ? 1 : 0;
        if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
        function mischandler(){
            alert('For Security Purposes, Right Click is disabled\n-pines');
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
<h3>Uh Oh, you are not allowed to submit form again.</h3>
<p>In this case please email us, or dm any HoennPE Staff</p>
<hr>
<p>PHPCaptcha is made by princepines, under HoennPE Dev Team</p>
<p>Mail us here:<a href="mailto:dev@hoennpe.gq">dev@hoennpe.gq</a> </p>
</body>
</html>
