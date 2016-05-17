<?php if (!defined('THINK_PATH')) exit();?><!-- Modal -->
<div id="frm-post-popup" class="white-popup" style="max-width: 745px">
    <div class="weibo_post_box">
    <h2><?php echo L('_REPOST_');?></h2>

    <div class="aline" style="margin-bottom: 10px"></div>
    <div class="row">


        <div class="col-xs-12">

            <div>  <a ucard="<?php echo ($sourceWeibo["user"]["uid"]); ?>" href="<?php echo ($sourceWeibo["user"]["space_url"]); ?>"><?php echo ($sourceWeibo["user"]["nickname"]); ?></a></div>

            <div><?php echo (parse_weibo_content($sourceWeibo["content"])); ?></div>


            <br/>
            <p><textarea class="form-control" id="repost_content" style="height: 6em;"
                         placeholder="<?php echo L('_PLACEHOLDER_SOMETHING_TO_WRITE_');?>"><?php echo ($weiboContent); ?></textarea></p>
            <a href="javascript:" onclick="insertFace($(this))"><img src="/opensnseclipse/Application/Core/Static/images/bq.png"/></a>
            <p class="pull-right"><input type="submit" value="<?php echo L('_PUBLISH_');?> Ctrl+Enter" data-role="do_send_repost"  data-weibo-id="<?php echo ($weiboId); ?>"  data-source-id = "<?php echo ($sourceId); ?>"
                                         class="btn btn-primary" data-url="<?php echo U('weibo/Index/doSendRepost1');?>"/></p>
          <p><input id="becomment" type="checkbox" value="1" name="becomment" ><?php echo L('_PUBLISH_AS_COMMON_');?></p>
        </div>
    </div>
    <div id="emot_content" class="emot_content"></div>
    <button title="Close (Esc)" type="button" class="mfp-close" style="color: #333;">×</button>
    </div>
</div>
<!-- /.modal -->

        <script>
        weibo_bind();
            $(function () {
                $('#repost_content').keypress(function (e) {
                if (e.ctrlKey && e.which == 13 || e.which == 10) {
                    $("[data-role='do_send_repost']").click();
                }
            });
            });
        </script>