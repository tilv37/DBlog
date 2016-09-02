<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view("header") ?>
<?php $this->load->view("sidebar") ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h3>
            用户列表
            <?php echo anchor('user/create', '新建用户', array('title'=>'新建用户','class'=>"btn btn-primary btn-xs",'role'=>"button")); ?>
        </h3>
        <form method="get">
            <div name="options" style="margin: 3px;float: left;">
                <div class="dropdown">
                    <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                        选中项
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-xs" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="del" tabindex="-1" href="javascript:void(0)" id="delSelected">删除</a></li>
                    </ul>
                </div>
            </div>
        </form>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th><input type="checkbox" name="checkAll" id="checkAll"/></th>
                <th>#</th>
                <th>用户</th>
                <th>昵称</th>
                <th>电子邮件</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $item):?>
                <tr>
                    <td><input type="checkbox" name="checklist" id="<?php echo 'checkbox'.$item['uid']?>" value="<?php echo $item['uid']?>" /></td>
                    <td><?php echo $item['uid'];?></td>
                    <td>
                        <strong><?php echo anchor( 'user/edit_user/'.$item['uid'], $item['name'], array('title' => '编辑'));?></strong>
                    </td>
                    <td><?php echo $item['screenname'];?></td>
                    <td><?php echo $item['mail'];?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $("#checkAll").click(function(){
                if(this.checked){
                    $("input[name='checklist']").each(function(){
                        this.checked=true;
                    });
                }else{
                    $("input[name='checklist']").each(function(){
                        this.checked=false;
                    });
                }
            }
        );

        $("#delSelected").click(function(){
            var val=new Array();
            $("input[name=checklist]").each(function(){
                    if(this.checked)
                    {
                        val.push(this.value);
                    }
                }
            );
            $.post("<?php echo site_url('article/del_article')?>",{ids:val},function(data){console.log(data);})
        });
    </script>
<?php $this->load->view("footer") ?>