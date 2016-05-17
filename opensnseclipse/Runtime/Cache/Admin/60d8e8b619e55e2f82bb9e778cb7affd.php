<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo L("_JUMP_CUE_");?></title>
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: rgb(79, 138, 208); font-family: 'Microsoft YaHei'; color: #fff; font-size: 16px;text-align: center; }
        .system-message{position: fixed;left: 50%;top: 50%;margin-left: -222px;margin-top: -230px}
        .system-message h1{ font-size: 80px; font-weight: normal; line-height: 120px; margin-bottom: 12px }
        .system-message .jump{ padding-top: 10px;margin-bottom:20px}
        .system-message .jump a{ color: #333;}
        .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
        #wait {
            font-size:46px;
        }
        #btn-stop,#href{
            display: inline-block;
            margin-right: 10px;
            font-size: 16px;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 0 none;
            background-color: white;
            padding: 10px 20px;
            color: rgb(79, 138, 208);
            border-radius: 3px;
            font-weight: bold;
            border-color: transparent;
            text-decoration:none;
        }

        #btn-stop:hover,#href:hover{
            color: rgba(79, 138, 208,0.9);
            background: rgba(255,255,255,0.9);
        }
    </style>
</head>
<body>
<div class="system-message">
    <h1><?php echo L("_CONGRATULATIONS_");?></h1>
    <p class="error"><?php echo($message); ?></p>
    <p class="detail"></p>
    <p class="jump">
        <b id="wait"><?php echo($waitSecond); ?></b><?php echo L("_SECONDS_AFTER_THE_PAGE_WILL_AUTOMATICALLY_JUMP_");?>
    </p>
    <div>
        <a id="href" id="btn-now" href="<?php echo($jumpUrl); ?>"><?php echo L("_JUMP_IMMEDIATELY_");?></a>
        <button id="btn-stop" type="button" onclick="stop()"><?php echo L("_STOP_JUMP_");?></button>
        <a id="href" id="btn-now" href="<?php echo(U('Public/logout')); ?>"><?php echo L("_RE_LOGIN_");?></a>
    </div>
</div>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
        window.stop = function (){
            console.log(111);
            clearInterval(interval);
        }
    })();
</script>
</body>
</html>