<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/18
 *Time: 21:06
 */
?>

<div class="down-main">
    <div class="left-main left-full">
        <div class="sidebar-fold"><span class="glyphicon glyphicon-menu-hamburger"></span></div>
        <div class="subNavBox">
            <div class="sBox">
                <div class="subNav sublist-down"><span class="title-icon glyphicon glyphicon-chevron-down"></span><span class="sublist-title">管理中心</span>
                </div>
                <ul class="navContent" style="display:block">
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />员工管理</div>
                        <a href="<?php echo site_url('emo/index');?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">员工管理</span></a> </li>
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />学历管理</div>
                        <a href="<?php echo site_url('edu/index');?>"><span class="sublist-icon glyphicon glyphicon-envelope"></span><span class="sub-title">学历管理</span></a> </li>
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />部门管理</div>
                        <a href="<?php echo site_url('dep/index');?>"><span class="sublist-icon glyphicon glyphicon-bullhorn"></span><span class="sub-title">部门管理</span></a></li>
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />职位管理</div>
                        <a href="<?php echo site_url('pos/index');?>"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">职位管理</span></a></li>
                    <li>
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />员工考勤</div>
                        <a href="<?php echo site_url('att/att');?>"><span class="sublist-icon glyphicon glyphicon-calendar"></span><span class="sub-title">员工考勤</span></a></li>
                </ul>
            </div>
            <div class="sBox">
                <div class="subNav sublist-up"><span class="title-icon glyphicon glyphicon-chevron-up"></span><span class="sublist-title">员工反馈</span></div>
                <ul class="navContent" style="display:none">
                    <li class="active">
                        <div class="showtitle" style="width:100px;"><img src="./public/img/leftimg.png" />反馈信息</div>
                        <a href="<?php echo site_url('message/index');?>"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">反馈信息</span></a></li>
                </ul>
            </div>
        </div>
    </div>
  <div class="right-product view-product right-full">
     <div class="container-fluid">
				<div class="info-center">
					<div class="page-header">
                      <div class="pull-left">
						<h4>员工反馈</h4>
					</div>
                    </div>
                    <div class="info-center-title">
				</div>
                    <div class="clearfix"></div>
					<div class="table-margin">
                      <table class="table table-bordered table-header">
                      <thead>
                         <tr>
                           <td class="w10">编号</td>
                           <td class="w15">姓名</td>
                           <td class="w20">邮箱</td>
                           <td class="w40">反馈信息</td>
                           <td class="w15">操作</td>
                         </tr>
                         </thead>
                         <tbody>
                         <?php
                         //if(is_array($data)):
                         foreach($data as $v):?>
                             <tr>
                                 <td><?php echo $v->id;?></td>
                                 <td><?php echo $v->username;?></td>
                                 <td><?php echo $v->email;?></td>
                                 <td><?php echo $v->message;?></td>
                                 <td><a class="btn btn-default" href="<?php echo site_url('message/show/'.$v->id)?>">查看</a>&nbsp;&nbsp;<a class="btn btn-danger" href="<?php echo site_url('message/del/'.$v->id)?>">删除</a></td>
                             </tr>
                             <?php
                         endforeach;
                         //endif;
                         ?>
                    </tbody>
                    </table>
                        <div class="panel panel-default" <?php if($config['total_rows']<= $config['per_page']){echo 'style="display: none;"';}?>>
                            <div class="panel-body" style="font-size: 16px;text-align: center;">
                                <?php echo $link;?>
                            </div>
                        </div>
<div class="show-page hidden">
    <ul>
    </ul>
</div>
</div>
</div>
</div>
