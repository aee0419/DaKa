<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/base.css">  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/b_login.css">
    <title>后台登录页面</title>
</head>
<body>
<h2 style="text-align: center;color: red">登录</h2>
<div class="login">
    <div class="loginmain">
        <br>
        <br>
        <br>
        <br>
        <form action="http://127.0.0.1/manager/index.php/login/login" method="post" class="form-horizontal">
            <!-- 让表单在一行中显示form-horizontal -->

            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-lg-1 control-label">用户 名</label>
                <div class="col-lg-4">
                    <input type="text" name="username" id="username" class="form-control">
                </div>
            </div>
            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-lg-1 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                <div class="col-lg-4">
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="form-group"></div>
            <!-- <div class="form-group"></div> -->
            <div class="form-group" style="margin-bottom: 10px;">
                <label class="col-lg-1 control-label">入&nbsp;&nbsp;&nbsp;&nbsp;口</label>
                <div class="col-lg-4" style="font-size: large">
                    <input type="radio" name="xuan"  value="1" checked>员工入口&nbsp;&nbsp;
                    <input type="radio" name="xuan"  value="2">管理员入口


                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-11 col-lg-offset-1">
		                <span class="checkbox ">
		                    <label><input type="checkbox" name="checkbox" class="checkbox-inline">记住我</label>
		                </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-4 col-lg-offset-1">
                    <input type="submit" name="submit" value="登录" onclick="fn()" class="btn btn-danger btn-lg">
                    <span class="text"></span>
                </div>

            </div>
        </form>
    </div>
    <div class="rightpic">
        <div id="container">
            <!-- <img src="picture/1.jpg" alt="" width="500px" height="330px"> -->
        </div>
    </div>
</div>
<script>
    var user = document.getElementsByTagName("input")[0],
        pass = document.getElementsByTagName("input")[1],
        check = document.getElementsByTagName("input")[2],
        loUser = localStorage.getItem("user") || "";
    loPass = localStorage.getItem("pass") || "";
    user.value = loUser;
    pass.value = loPass;
    if(loUser !== "" && loPass !== ""){
        check.setAttribute("checked","");
    }
    function fn(){
        if(check.checked){
            localStorage.setItem("user",user.value);
            localStorage.setItem("pass",pass.value);
        }else{
            localStorage.setItem("user","");
            localStorage.setItem("pass","");
        }
    }
</script>

<script src="<?php echo base_url();?>public/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/js/delaunay.js"></script>
<script src="<?php echo base_url();?>public/js/TweenMax.js"></script>
<script src="<?php echo base_url();?>public/js/effect.js"></script>
<script src="<?php echo base_url();?>public/js/b_login.js"></script>
</body>
</html>


