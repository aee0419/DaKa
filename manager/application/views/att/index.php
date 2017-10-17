
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

    <!-- Basics -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>员工签到系统</title>
    <meta name="description" content="John Deo, UI / UX / Frontend">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>public/img/favicon.ico">

    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/main.css">
    <link href="<?php echo base_url();?>public/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:300,400,700'>

</head>
<body>

<div class="wrapper">

    <header>
        <a class="menu-icon jiji">
            <span></span>
        </a>
        <nav class="menu visuallyhidden">
            <ul>
                <li><a href="#home">主页</a></li>
                <li><a href="#about">关于我</a></li>
                <li><a href="#contact">联系</a></li>
            </ul>
        </nav>
    </header>

    <section id="home" class="row">
        <div class="overlay">
            <div style="margin-left: 1350px;font-size: large;"><a href="<?php echo site_url('login/logout');?>" style="color: orangered">安全退出</a></div>
            <div class="col home-title jiji">
                <h1><?php echo $username;//$this->session->username;?></h1>
                <h2><?php echo $data['pos']['posname'];?> / <?php echo $data['dep']['depname'];?></h2>
                <h3><?php include "./public/time.php";?></h3>

                <h4 style="color: #000">当前状态:<?php
                if($row['worktime'] === date("Y-m-d",time()) && $row['s_status'] == 0){
                    echo "未打卡上班";
                }else{
                    echo "今日于".date("H:i:s",$row['start'])."打卡";
                }
                if($row['s_status'] == 1){
                    if($row['e_status'] == 0){
                        echo "<br>工作中...";
                    }else{
                        echo "<br>今日于".date("H:i:s",$row['end'])."下班";
                    }
                }
                ?></h4>
                <a href="<?php echo base_url()."index.php/Att/clock"?>" class="but">打卡</a>

            </div>
        </div>
    </section>

    <section id="about">
        <div class="col contact-title">
            <h3
                data-100="-webkit-transform: translateX(100px); opacity:0;"
                data-500="-webkit-transform: translateX(0px); opacity:1;"
            >关于我</h3>
        </div>
        <br>
        <br>
        <br>
        <div style="float:left;width:100%;margin-left: 200px;margin-top: 50px">
            <div style="float:left;width:20%;margin-right: 20px">
                <div width="100px">
                    <table class="table table-bordered table-header">
                        <b><caption style="font-size: 20px;text-align: center">我的信息</caption></b>
                        <tr>
                            <th style="text-align: center">工 号</th>
                            <td width="150px"><?php echo $emodata['empno'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align: center">姓 名</th>
                            <td><?php echo $username;?></td>
                        </tr>
                        <tr>
                            <th style="text-align: center">电 话</th>
                            <td><?php echo $emodata['tel'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align: center">生 日</th>
                            <td><?php echo $emodata['birth'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align: center">性 别</th>
                            <td><?php echo $emodata['sex'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align: center">学 历</th>
                            <td><?php echo $data['edu']['eduname'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align: center">职 位</th>
                            <td><?php echo $data['pos']['posname'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align: center">部 门</th>
                            <td><?php echo $data['dep']['depname'];?></td>
                        </tr>
                    </table>
                    <div><a data-toggle="modal" data-target="#seeUserInfo" class="but">修改密码</a></div>
                </div>
            </div>
            <div style="float:left;width:50%;margin-right: 20px">
                <table class="table table-bordered table-header">
                    <b><caption style="font-size: 20px;text-align: center">我的考勤</caption></b>
                    <thead>
                    <tr>
                        <td >工号</td>
                        <td >姓名</td>
                        <td >日期</td>
                        <td >上班时间</td>
                        <td >打卡状态</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($userdata as $v):?>
                            <tr>
                                <td><?php echo $v->empno;?></td>
                                <td><?php echo $username;?></td>
                                <td><?php echo $v->worktime;?></td>
                                <td><?php echo date('H:i:s',$v->start);?></td>
                                <td><?php if($v->s_status == 0){
                                        echo "本日未打卡上班";
                                    }else{
                                        if($v->e_status == 0){
                                            echo "本日未打卡下班";
                                        }else{
                                            echo "本日已打卡，并工作了:".floor(($v->end-$v->start)/3600)."个小时".floor((($v->end-$v->start)%3600)/60)."分钟";
                                        }
                                    }
                                    ?></td>
                            </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <h4 style="float:right;"><button class="btn btn-info">打印考勤表</button></h4>
            </div>
        </div>
    </section>

    <hr><div class="copyrights"></div>
    <hr>

    <section id="contact" class="row">
        <div class="contact-content page">
            <div class="col contact-title">
                <h3
                    data-100="-webkit-transform: translateX(100px); opacity:0;"
                    data-500="-webkit-transform: translateX(0px); opacity:1;"
                >遇到问题了?</h3>
            </div>
            <div class="col empty">&nbsp;</div>
            <div class="col contact-description">
                <div><a data-toggle="modal" data-target="#send" class="but">联系后台</a></div>
            </div>
            <div class="col empty">&nbsp;</div>
        </div>
    </section>

    <footer id="footer" class="row">
        <div class="footer-content page">
            <div class="col f1">
                <p>版权所有 © 2017 黑水有限公司   <a href="<?php echo site_url('login/index');?>" target="_blank">管理员入口</a></p>
            </div>
        </div>
    </footer>

</div>
<!--个人信息模态框-->
<div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <?php echo form_open('login/changeuser');?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >修改密码</h4>
            </div>
            <div class="modal-body">
                <table class="table" style="margin-bottom:0px;">
                    <thead>
                    <tr> </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td wdith="20%">用户名:</td>
                        <td width="80%"><input type="text" value="<?php echo $login;?>" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td wdith="20%">旧密码:</td>
                        <td width="80%"><input type="password" class="form-control" name="old_password" maxlength="18" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td wdith="20%">新密码:</td>
                        <td width="80%"><input type="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr></tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary" name="submit">提交</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!--个人信息模态框-->
<div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <?php echo form_open('login/send');?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >发送反馈</h4>
            </div>
            <div class="modal-body">
                <table class="table" style="margin-bottom:0px;">
                    <thead>
                    <tr> </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td wdith="20%">姓名:</td>
                        <td width="80%"><input type="text" value="<?php echo $login;?>" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td wdith="20%">邮箱:</td>
                        <td width="80%"><input type="email" class="form-control" name="email" maxlength="18" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td wdith="20%">你的反馈:</td>
                        <td width="80%"><textarea rows="10" name="message" id="contact-body" placeholder="Your Message" class="form-control input-lg"></textarea></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr></tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary" name="submit">提交</button>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="loader"></div>

<!-- JavaScript -->
<script src="<?php echo base_url();?>public/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>public/js/modernizr-2.6.2.min.js"></script>
<script src="<?php echo base_url();?>public/js/skrollr.js"></script>
<script src="<?php echo base_url();?>public/js/main.js"></script>
<script src="<?php echo base_url();?>public/bootstrap-3.3.5/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>