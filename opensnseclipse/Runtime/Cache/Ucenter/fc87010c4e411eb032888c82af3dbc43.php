<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php echo hook('syncMeta');?>

<?php $oneplus_seo_meta = get_seo_meta($vars,$seo); ?>
<?php if($oneplus_seo_meta['title']): ?><title><?php echo ($oneplus_seo_meta['title']); ?></title>
    <?php else: ?>
    <title><?php echo modC('WEB_SITE_NAME',L('_OPEN_SNS_'),'Config');?></title><?php endif; ?>
<?php if($oneplus_seo_meta['keywords']): ?><meta name="keywords" content="<?php echo ($oneplus_seo_meta['keywords']); ?>"/><?php endif; ?>
<?php if($oneplus_seo_meta['description']): ?><meta name="description" content="<?php echo ($oneplus_seo_meta['description']); ?>"/><?php endif; ?>

<!-- zui -->
<link href="/opensnseclipse/Public/zui/css/zui.css" rel="stylesheet">

<link href="/opensnseclipse/Public/zui/css/zui-theme.css" rel="stylesheet">
<link href="/opensnseclipse/Public/css/core.css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/opensnseclipse/Public/js/ext/magnific/magnific-popup.css"/>
<!--<script src="/opensnseclipse/Public/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/js/com/com.functions.js"></script>

<script type="text/javascript" src="/opensnseclipse/Public/js/core.js"></script>-->
<script src="/opensnseclipse/Public/js.php?f=js/jquery-2.0.3.min.js,js/com/com.functions.js,js/core.js,js/com/com.toast.class.js,js/com/com.ucard.js"></script>
<!--Style-->
<!--合并前的js-->
<?php $config = api('Config/lists'); C($config); $count_code=C('COUNT_CODE'); ?>
<script type="text/javascript">
    var ThinkPHP = window.Think = {
        "ROOT": "/opensnseclipse", //当前网站地址
        "APP": "/opensnseclipse/index.php?s=", //当前项目地址
        "PUBLIC": "/opensnseclipse/Public", //项目公共目录地址
        "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
        "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
        "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
        'URL_MODEL': "<?php echo C('URL_MODEL');?>",
        'WEIBO_ID': "<?php echo C('SHARE_WEIBO_ID');?>"
    }
    var cookie_config={
        "prefix":"<?php echo C('COOKIE_PREFIX');?>"
    }
    var Config={
        'GET_INFORMATION':<?php echo modC('GET_INFORMATION',1,'Config');?>,
        'GET_INFORMATION_INTERNAL':<?php echo modC('GET_INFORMATION_INTERNAL',10,'Config');?>*1000
    }

    var weibo_comment_order = "<?php echo modC('COMMENT_ORDER',0,'WEIBO');?>";
</script>

<!-- Bootstrap库 -->
<!--
<?php $js[]=urlencode('/static/bootstrap/js/bootstrap.min.js'); ?>

&lt;!&ndash; 其他库 &ndash;&gt;
<script src="/opensnseclipse/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/Core/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/static/jquery.iframe-transport.js"></script>
-->
<!--CNZZ广告管家，可自行更改-->
<!--<script type='text/javascript' src='http://js.adm.cnzz.net/js/abase.js'></script>-->
<!--CNZZ广告管家，可自行更改end-->
<!-- 自定义js -->
<!--<script src="/opensnseclipse/Public/js.php?get=<?php echo implode(',',$js);?>"></script>-->


<script>
    //全局内容的定义
    var _ROOT_ = "/opensnseclipse";
    var MID = "<?php echo is_login();?>";
    var MODULE_NAME="<?php echo MODULE_NAME; ?>";
    var ACTION_NAME="<?php echo ACTION_NAME; ?>";
    var CONTROLLER_NAME ="<?php echo CONTROLLER_NAME; ?>";
    var initNum = "<?php echo modC('WEIBO_NUM',140,'WEIBO');?>";
    function adjust_navbar(){
        $('#sub_nav').css('top',$('#nav_bar').height());
        $('#main-container').css('padding-top',$('#nav_bar').height()+$('#sub_nav').height()+20)
    }
</script>

<audio id="music" src="" autoplay="autoplay"></audio>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>
</head>
<body>
<!-- 头部 -->
<!-- /头部 -->

<!-- 主体 -->
<div id="main-container" class="container">
    <div class="row">
        <section>
            <div class="col-xs-9 login" style="background: #ffffff">
                <?php echo W('Login/login',array('type'=>"login"));?>
            </div>


        </section>
    </div>
</div>
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->


<!-- 为了让html5shiv生效，请将所有的CSS都添加到此处 -->
<link type="text/css" rel="stylesheet" href="/opensnseclipse/Public/static/qtip/jquery.qtip.css"/>


<!--<script type="text/javascript" src="/opensnseclipse/Public/js/com/com.notify.class.js"></script>-->

<!-- 其他库-->
<!--<script src="/opensnseclipse/Public/static/qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/js/ext/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/static/jquery.iframe-transport.js"></script>

<script type="text/javascript" src="/opensnseclipse/Public/js/ext/magnific/jquery.magnific-popup.min.js"></script>-->

<!--<script type="text/javascript" src="/opensnseclipse/Public/js/ext/placeholder/placeholder.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/js/ext/atwho/atwho.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/zui/js/zui.js"></script>-->
<link type="text/css" rel="stylesheet" href="/opensnseclipse/Public/js/ext/atwho/atwho.css"/>

<script src="/opensnseclipse/Public/js.php?t=js&f=js/com/com.notify.class.js,static/qtip/jquery.qtip.js,js/ext/slimscroll/jquery.slimscroll.min.js,js/ext/magnific/jquery.magnific-popup.min.js,js/ext/placeholder/placeholder.js,js/ext/atwho/atwho.js,zui/js/zui.js&v=<?php echo ($site["sys_version"]); ?>.js"></script>
<script type="text/javascript" src="/opensnseclipse/Public/static/jquery.iframe-transport.js"></script>

<script src="/opensnseclipse/Public/js/ext/lazyload/lazyload.js"></script>


<!-- /主体 -->

<!-- 底部 -->
<!-- /底部 -->
</body>
</html>