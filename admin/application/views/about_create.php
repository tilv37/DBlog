<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("header") ?>
<?php $this->load->view("sidebar") ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <!-- 配置文件 -->
        <script type="text/javascript" src="/DBlog/plugins/ueditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/DBlog/plugins/ueditor/ueditor.all.min.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container');
        </script>

        <?php echo form_open('about/add_new_page')?>

        <ul class="list-group">
            <li class="list-group-item"><?php echo form_label('标题:');?>
                <?php echo form_error('title'); ?>
                <?php echo form_input(array('name'=>'title','class'=>'form-control','value'=>'about','readonly'=>'readonly'));?>
            </li>
            <li class="list-group-item"><?php echo form_label('内容:');?>
                <!-- 加载编辑器的容器 -->
                <?php echo form_error('contents'); ?>
                <script id="container" name="contents" type="text/plain" style="height: 300px">
                </script>
            </li>
            <li  class="list-group-item" style="text-align:center"><input class="btn btn-primary" type="submit" name="submit" value="保存"></li>
        </ul>
        <?php echo form_close();?>
    </div>
<?php $this->load->view("footer") ?>