<?php

?>
<div class="container">
    <h1>Form đăng ký</h1>
    <form action="#" method = "post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id= "username" name = "username" class = "form-control" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name = "password" class = "form-control"/>
        </div>
        <div class="form-group">
            <label for="confirm-password">Nhập lại mật khẩu</label>
            <input type="password" id="confirm-password" name = "confirm_password" class = "form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" name = "register" value = "Đăng ký" class = "btn btn-primary"/>
        </div>
    </form>
</div>
