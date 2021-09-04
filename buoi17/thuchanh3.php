<?php 
//debug thông tin mảng $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
// Khai báo biến error và result
$error = '';
$result = '';
// Nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
    // Tạo biến và giá trị cho biến
    $name = $_POST['name'];
    $email = $_POST['email'];
    $specific_time = $_POST['specific_time'];
    $class_details = $_POST['class_details'];
    // Với radio và checkbox sẽ có trường hợp user k tích chọn radio thì khi submit form, sẽ k tồn tại các key tương ứng với radio và checkbox
    //Kiểm tra gender xem tồn tại hay chưa dùng isset
    
    $gender = '';
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    $jobs = '';
    if (isset($_POST['jobs'])) {
        $jobs = $_POST['jobs'];
    }
    $country = $_POST['country'];
    // validate dữ liệu
    if (empty($name)) {
        $error = 'Name ko được để trống';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email chưa đúng định dạng';
    }
    elseif(empty($specific_time)) {
        $error = 'Specific time ko dc để trống';
    }
    elseif(strlen($gender) == 0) {
        $error = 'Phải chọn gender';
    }
    elseif(empty($jobs)) {
        $error = 'Phải chọn ít nhất 1 jobs';
}
// Xử lý logic submit form khi k có lỗi nào
    if (empty($error)) {
        // Hiển thị các thông tin user đã nhập ra màn hình
        $result .= "Name : $name <br/> ";
        $result .= "Email : $email <br/> ";
        $result .= "Specific Time : $specific_time <br/> ";
        $result .= "Class detail : $class_details <br/> ";
        // Với các input radio, checkbox, select do đang để value là kiểu số
        // Nên cần có bước chuyển đổi thành dữ liệu dễ đọc với người dùng
        if (!empty($gender)) {
            // switch dùng để so sánh bằng
            switch($gender) {
                case 0: $result .= "Gender: Female <br/>"; break;
                case 1: $result .= "Gender: Male <br/>"; break;
            }
        }
        // Xử lý hiển thị jobs
        if (!empty($jobs)) {
            foreach ($jobs as $job) {
               switch ($job) {
                case 0: $result .= "Jobs: Developer <br/>"; break;
                case 1: $result .= "Jobs: Tester <br/>"; break;
                case 2: $result .= "Jobs: PM <br/>"; break;
               }
            }
        }
        // Xử lý select country,  giống với xử lý radio
        switch ($country) {
            case 0: $result .= "Country: VN <br/>"; break;
            case 1: $result .= "Country: USA <br/>"; break;
            case 2: $result .= "Country: Japan  <br/>"; break;
           }
    }
}
?>
<h3 style = "color: red">
<?php echo $error; ?>
</h3> 
<h3 style = "color: green">
<?php echo $result; ?>
</h3>  
<form action="" method = "post">
    Name:
    <input type="text" name = "name" value ="">
    <br/>
    Email: 
    <input type="text" name = "email" value = "" >
    <br/>
    Specific Time
    <input type="date" name = "specific_time" value ="" >
    <br/>
    Class details:
    <textarea name="class_details" cols="20" ></textarea>
    <br/>
    Gender: 
    <input type="radio" name = "gender" value = "0" /> Female
    <input type="radio" name = "gender" value = "1" /> Male
    <br/>
    Jobs:
    <input type="checkbox" name = "jobs[]" value = "0" > Developer
    <input type="checkbox" name = "jobs[]" value = "1" > Tester
    <input type="checkbox" name = "jobs[]" value = "2" > PM
    <br/>
    Country: 
    <select name = "country">
        <option value="0">VN</option>
        <option value="1">USA</option>
        <option value="2">Japan</option>
    </select>
    <br/>
    <input type="submit" name = "submit" value = "Show info">
    <input type="reset" name = "reset" varlue = "Reset">
</form>