<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("header") ?>
<?php $this->load->view("sidebar") ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h3>
            新增分类
        </h3>

        <?php echo form_open('category/add_category'); ?>
            <ul class="list-group">
                <li class="list-group-item"><?php echo form_label('分类名称:');?>
                    <?php echo form_error('name'); ?>
                    <?php echo form_input(array('name'=>'name','class'=>'form-control'));?>
                </li>
                <li class="list-group-item"><?php echo form_label('分类缩略名:');?>
                    <?php echo form_input(array('name'=>'slug','class'=>'form-control'));?>
                </li>
                <li class="list-group-item"><?php echo form_label('父级分类:');?>
                    <?php echo form_input(array('name'=>'parent','class'=>'form-control'));?>
                </li>
                <li class="list-group-item"><?php echo form_label('分类描述:');?>
                    <?php echo form_textarea(array('name'=>'description','class'=>'form-control'));?>
                </li>
                <li  class="list-group-item" style="text-align:center"><input class="btn btn-primary" type="submit" name="submit" value="增加分类">
                </li>
            </ul>
        <?php echo form_close();?>
<?php $this->load->view("footer") ?>