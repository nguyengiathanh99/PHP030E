<?php
    // Demo form.php
    // Khái báo 1 form đơn giản chứa tất cả các input thông dụng
?>
<!-- Action của form: url xử lý form, thường sẽ để giá trị rỗng, nghĩa là chính file khai báo form đó sẽ
xử lý form luôn
 -->
<form action = "" method = "get">
<!-- Khai báo input trong php bắt buộc phải khai báo thuộc tính name -->
    Name: <input name="name"  type="text" > <br/>
    Password:
    <input type="password" name ="password"><br/>
    Age: 
    <input name="age"  type="number" > <br/>
    Gender: 
    <!-- Với radio bắt buộc phải khia báo trùn name để chức năng radio hoạt động chính xác -->
    <input type="radio" name ="gender" value = "0"> Nữ
    <input type="radio" name ="gender" value = "1"> Nam
    <Br/>
    <!-- VỚi các input mà cho phép chọn nhiều giá trị tại 1 thời điểm như checkbox, select (ở chế multiple),
    file (ở chế độ multiple), thì name của input bắt buộc phải ở dạng Mảng
     -->
    Chọn job: 
    <input type ="checkbox" name ="jobs[]" value = "0" > Developer
    <input type ="checkbox" name ="jobs[]" value = "1" > Tester
    <input type ="checkbox" name ="jobs[]" value = "2" > PM
    <Br/>
    Chọn quốc gia: 
    <select name = "country">
        <option value = "0"> VN </option>
        <option value = "1"> USA </option>
    </select>
    </br>
    <!-- Select nhiều thì name sẽ ở dạng mảng, chỉ có mảng mới lưu nhiều giá trị tại 1 thời điểm -->
    Chọn nhiều quốc gia: 
    <select name = "multi_country[]">
    <option value = "0"> VN </option>
    <option value = "1"> VN1 </option>
    <option value = "2"> VN2 </option>
    <option value = "3"> VN3 </option>
    <option value = "4"> VN4 </option>
    <option value = "5"> VN5 </option>
    </select>
    <br/>
    Chọn file:
    <input name="avatar"  type="file">
    <br/>
    Chọn nhiều file:
    <input name="multi_avatar[]"  type="file">
    <Br/>
    <!-- Với thẻ texarea thì k để ký tự các bên trong nội dung thẻ -->
    <textarea name = "note" cols = "20" rows = "5"></textarea>
    <br/>
    <input name="submit"  type="submit" value = "Send">
</form>

<?php
    // Demo biến $_SERVER: Kiểu mảng,
    // Chứa các thông tin về server của bạn
    // Dùng cấu trúc sau để debug (xem thông tin) mảng  
    // echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";
?>