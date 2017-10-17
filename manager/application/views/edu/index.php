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
                    <li  class="active">
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
                    <li>
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
						<h4>学历管理</h4>      
					</div>
                    </div>
                    <div class="info-center-title">
					<a class="btn btn-info" href="add">添加学历</a>
				</div>
                    <div class="clearfix"></div>
					<div class="table-margin">
                      <table class="table table-bordered table-header">
                      <thead>
                         <tr>
                           <td class="w25">编号</td>
                           <td class="w25">学历</td>
                           <td class="w50">操作</td>
                         </tr>
                         </thead>
                         <tbody>
                         <?php 
                         //if(is_array($data)):
                         foreach($data as $v):?>
                         <tr>
                          <td><?php echo $v->id;?></td>
                          <td><?php echo $v->eduname;?></td>
                          <td><a class="btn btn-danger" href="<?php echo site_url('edu/del/'.$v->id)?>">删除</a>&nbsp;&nbsp;<a class="btn btn-warning" href="<?php echo site_url('edu/edit/'.$v->id)?>">修改</a></td>
                         </tr>
                         <?php 
                         endforeach;
                         //endif;
                         ?>
                         </tbody>
                      </table>
                      <div class="panel panel-default">
                    <div class="panel-body" style="font-size: 20px;text-align: center;">
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
