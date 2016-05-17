<?php if (!defined('THINK_PATH')) exit();?><div style="padding-left:20px;">
    <?php if(!$top_list&&!$list): ?><p class="text-muted" style="text-align: center; font-size: 3em;">
            <br><br>
            <?php echo L('_EMPTY_NOW_');?>
            <br><br><br>
        </p><?php endif; ?>
    <style>
        .weibo_icon {
            border: 1px solid #f0f0f0;
            border-right: none;
        }
    </style>
    <link href="/opensnseclipse/Application//Weibo/Static/css/weibo.css" type="text/css" rel="stylesheet"/>
    <div id="top_list">
        <?php if(is_array($top_list)): $i = 0; $__LIST__ = $top_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i; echo W('Weibo/WeiboDetail/detail',array('weibo_id'=>$top)); endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div id="weibo_list">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$weibo): $mod = ($i % 2 );++$i; echo W('Weibo/WeiboDetail/detail',array('weibo_id'=>$weibo)); endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div id="index_weibo_page">
        <div class="text-right">
            <?php echo getPagination($total_count,10);?>
        </div>
    </div>
    <script>
        var SUPPORT_URL = "<?php echo addons_url('Support://Support/doSupport');?>";
        var THIS_MODEL_NAME = 'Weibo';
        $(function () {
                    $('.pswp__ui--hidden').hide();
                }
        );
    </script>
    <script src="/opensnseclipse/Application//Weibo/Static/js/weibo.js"></script>
</div>