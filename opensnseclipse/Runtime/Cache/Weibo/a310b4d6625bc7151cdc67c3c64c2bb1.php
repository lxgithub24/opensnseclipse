<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i; echo W('Comment/detail',array('comment_id'=>$comment['id'])); endforeach; endif; else: echo "" ;endif; ?>
<?php $pageCount = ceil($weiboCommentTotalCount / 10); ?>
<div class="pager">
    <?php echo getPageHtml('weibo_page',$pageCount,array('weibo_id'=>$weiboId),$page);?>
</div>