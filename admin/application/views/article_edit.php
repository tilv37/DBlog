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

        <?php echo form_open('article/update_article/'.$this->uri->segment(3))?>

        <ul class="list-group">
            <li class="list-group-item"><?php echo form_label('标题:');?>
                <?php echo form_error('title'); ?>
                <?php echo form_input(array('name'=>'title','class'=>'form-control'),$article['title']);?>
            </li>
            <li class="list-group-item"><?php echo form_label('时间:');?>
                <?php echo form_error('time'); ?>
                <?php echo form_input(array('style'=> 'width:20%','name'=>'datetimepicker','id'=>'datetimepicker','class'=>'form-control','type'=>'text', 'data-date-format'=>'yyyy-mm-dd hh:ii','value'=>$article['posttime']));?>
            </li>
            <li class="list-group-item"><?php echo form_label('内容:');?>
                <!-- 加载编辑器的容器 -->
                <?php echo form_error('contents'); ?>
                <script id="container" name="contents" type="text/plain" style="height: 300px"><?php echo $article['content'];?></script>
            </li>
            <li class="list-group-item"><?php echo form_label('分类:');?>
                <?php foreach ($all_category as $item):?>
                    <label class="radio-inline">
                        <input type="radio" <?php echo  ($item['mid']==$article_category[0]['mid'])? 'checked':'';?> name="category" id="<?php echo 'cate'.$item['mid'] ?>" value="<?php echo $item['mid']?>"> <?php echo $item['name']?>
                    </label>
                    <?php ?>
                <?php endforeach;?>
            </li>
            <li  class="list-group-item" style="text-align:center"><input class="btn btn-primary" type="submit" name="submit" value="保存"></li>
        </ul>
        <?php echo form_close();?>
    </div>

    <script type="text/javascript">
        $('#datetimepicker').datetimepicker({
            language: 'zh-CN',
            autoclose:true,
            bootcssVer:3
        });

        $('#datetimepicker').on("click", function(){
            if(this.value==''){
                var myDate = new Date();
                this.value=CurentTime();
            }
        });

    </script>

<?php $this->load->view("footer") ?>