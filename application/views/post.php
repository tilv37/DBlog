<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("headerPost") ?>
</header>
<article class="mod-post mod-post__type-post">
    <header>
        <h1 class="mod-post__title"><?php echo $title;?></h1>
    </header>
    <div class="mod-post__entry wzulli">
        <?php echo $content; ?>
    </div>
    <div class="mod-post__meta">
        <div>
            <div>
                — 于 <time datetime=<?php echo $posttime;?>><?php echo $posttime;?></time>
            </div>
            <div>— 文内使用到的标签：<span class="mod_tag"></span></div>
        </div>
    </div>
</article>
<!-- 多说评论框 start -->
<div class="ds-thread" data-thread-key="<?php echo $cid ?>" data-title="<?php echo $title ?>"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
    var duoshuoQuery = {short_name:"XXX"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
<!-- 多说公共JS代码 end -->
<?php $this->load->view("footer") ?>