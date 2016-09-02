<?php
/**
 * Created by PhpStorm.
 * User: DINGSHUO
 * Date: 2015/12/24
 * Time: 14:48
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("header") ?>
<?php $this->load->view("sidebar") ?>
<meta http-equiv="refresh" content="<?php echo $interval ?>;url=<?php echo site_url($url);?>"/>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"
    <h1>信息提示！ </h1>
    <div class="f   ormTips-mod" >
    <h3><?php echo $tips;?></h3>
    <p><?php echo $interval?>秒后系统将自动跳转</p>
    <p><a href="<?php echo site_url($url);?>">返回</a></p>
    </div>
</div>


<?php $this->load->view("footer") ?>



