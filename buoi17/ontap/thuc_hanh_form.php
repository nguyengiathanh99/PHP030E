<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $list = [
        0 => "PHP",
        1 => "JAVA",
        2 => "PYTHON"
    ];
    $error = '';
    $result = '';
    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $descreption = $_POST['descreption'];
        $gender = '';
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        $job = '';
        if (isset($_POST['job'])) {
            $job = $_POST['job'];
        }
        $coutry = $_POST['country'];

        // Kiem tra dieu kien
        if (empty($name) || empty($password)) {
            $error = 'Tài khoản và mật khẩu không được để trống';
        }
        elseif (strlen($password) < 6 ) {
            $error = 'Mật khẩu phải lớn hơn 6 ký tự';
        }
        $regex =  "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";     
        if (!preg_match($regex,$email)) {
            $error = 'Địa chỉ email không phù hợp';
        }
        elseif(empty($date)) {
            $error = 'Không được để trống date';
        }
        elseif (strlen($gender) == 0) {
            $error = 'Giới tính không được để trống';
        }
        if (empty($error)) {
            $result .= "Name : $name <br>";
            $result .= "Email: $email <br>";
            $result .= "Date: $date <br>";
            $result .= "Descreption: $descreption <br>";

           
            switch ($gender) {
                case '0':
                    $result .= "Gender: Nam <br>";
                    break;
                case '1':
                    $result .= "Gender: Nữ <br>";    
                }
          
            if (isset($job)) {
                foreach ($job as $value) {
                    $result .=  "$list[$value] <br>";
                }
            }
      
           switch ($coutry) {
               case '0':
                   $result .= "Country: Việt Nam <Br>";
                   break;
                case '1':
                    $result .= "Country: Japan <Br>";
                break;
                case '2':
                    $result .= "Country: USA <Br>";
                break;
              
           }
            
        }
    }
    
?>
<h3 style="color:red;"><?php echo $error; ?></h3>
<h3 style="color: green;"><?php echo $result; ?></h3>
<form action="" method="post">
    Name:
    <input type="text" name="name" value=""><br>
    Password: 
    <input type="password" name="password" value=""><br>
    Email:
    <input type="email" name="email" value=""><br>
    Date-time:
    <input type="date" name="date" value=""><br>
    Descreption:
    <textarea name="descreption" cols="20" rows="5"></textarea><br>
    Gender:
    <input type="radio" name="gender" value="0"> Nam
    <input type="radio" name="gender" value="1"> Nữ
    <br>
    Jobs:
    <input type="checkbox" name="job[]" value="0"> PHP
    <input type="checkbox" name="job[]" value="1"> JAVA
    <input type="checkbox" name="job[]" value="2"> PYTHON
    <br>
    Country:
    <select name="country" id="">
        <option value="0">Việt Nam</option>
        <option value="1">Japan</option>
        <option value="2">USA</option>
    </select>
    <br>
    <input type="submit" name="submit" value="Gửi">
</form>