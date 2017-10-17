<?php
include "./public/selectDate.php";
?>
<div class="down-main">
    <div class="left-main left-full">
        <div class="sidebar-fold"><span class="glyphicon glyphicon-menu-hamburger"></span></div>
        <div class="subNavBox">
            <div class="sBox">
                <div class="subNav sublist-down"><span class="title-icon glyphicon glyphicon-chevron-down"></span><span class="sublist-title">管理中心</span>
                </div>
                <ul class="navContent" style="display:block">
                    <li class="active">
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
                        <h4>修改员工信息</h4>
                    </div>
                </div>
                <?php echo form_open('emo/doedit');?>
                <div class="form-horizontal" style="width: 50%;margin: 50px;text-align: center">
                    <?php echo form_hidden('id',$data['id'])?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">工 号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="empno" value="<?php echo $data['empno'];?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">姓 名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">默认密码</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" value="<?php echo $data['password'];?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">电 话</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" value="<?php echo $data['tel'];?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">生日</label>
                        <div class="col-sm-10">
                            <input type="text" style="width: 80px" value="<?php echo $data['birth'];?>">&nbsp;&nbsp;
                            <select onchange="setDays()" name="year"></select>
                            <span>年</span>
                            <select onchange="setDays()" name="month"></select>
                            <span>月</span>
                            <select name="day"></select>
                            <span>日</span>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">性别</label>
                        <div class="col-sm-10">
                            <input type="radio"  name="sex" value="男">男&nbsp;&nbsp;
                            <input type="radio"  name="sex" value="女">女
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">学 历</label>
                        <div class="col-sm-10">
                            <select name="edu" class="form-control">
                                <?php
                                if(is_array($edu)):
                                    foreach($edu as $v):
                                        ?>
                                        <option value="<?php echo $v->id;?>"<?php
                                        if($v->id == $data['edu']){
                                            echo "selected";
                                        }
                                        ?>><?php echo $v->eduname;?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">职 位</label>
                        <div class="col-sm-10">
                            <select name="pos" class="form-control">
                                <?php
                                if(is_array($pos)):
                                    foreach($pos as $v):
                                        ?>
                                        <option value="<?php echo $v->id;?>"<?php
                                        if($v->id == $data['pos']){
                                            echo "selected";
                                        }
                                        ?>><?php echo $v->posname;?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">部 门</label>
                        <div class="col-sm-10">
                            <select name="dep" class="form-control">
                                <?php
                                if(is_array($dep)):
                                    foreach($dep as $v):
                                        ?>
                                        <option value="<?php echo $v->id;?>"<?php
                                        if($v->id == $data['dep']){
                                            echo "selected";
                                        }
                                        ?>><?php echo $v->depname;?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">更新信息</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
