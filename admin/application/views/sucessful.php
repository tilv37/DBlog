<?php
/**
 * Created by PhpStorm.
 * User: erdao
 * Date: 16-1-26
 * Time: 下午9:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view("header") ?>
<?php $this->load->view("sidebar") ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="alert alert-success" role="alert"><?php echo $echo; ?></div>
    <p>文章标题:<?php echo anchor_popup('http://www.xjdsz.net/archive/'.$cid,$title,$title);?></p>
    <p><?php echo anchor_popup('http://www.xjdsz.net/archive/'.$cid,'>>立即查看');?></p>
    <p><?php echo anchor_popup('home','>>后台首页');?></p>
    <p><?php echo anchor_popup('http://www.xjdsz.net','>>博客首页');?></p>
</div>


<?php $this->load->view("footer") ?>

