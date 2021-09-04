<?php
    // 1 - Khái niệm
    // Cookie được dùng để lưu các giá trị riêng của các trang web để phục vụ cho 1 mục đích gì đấy (quảng cáo, tăng tốc độ trang....)
    // Cookie đc lưu trên trình duyệt của user, khác với session (lưu trên server)
    // Hoàn toàn có thể xem dc trình duyệt đang lưu các cookie gì
    // Cookie sẽ k mất đi khi close trình duyệt như session mà chỉ mất đi dựa vào thời gian sống (có thể set dc thời gian sống trong cookie)
    // PHP đã tạo ra sẵn 1 biến $_COOKIE để lưu tất cả các thông tin về cookie trên hệ thốn, có kiểu mảng
    // Chức năng hay dùng: ghi nhớ đăng nhập, bookrmark (sản phẩm yêu thích)
    // 2 - Thao tác với cookie
    // Thử debug biến $_COOKIE
    // Khác với session, cookie sẽ k phải khởi tạo luôn sử dụng được
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
    // Khởi tạo cookie, sử dụng hàm setcookie, chứ k thêm kiểu như session
    // Thời gian sống của cookie dc set như sau: lấy thời gian hiện tại + thời gian sống muốn set: time() + số giây
    setcookie( 'name', 'Thành', time() + 60 );
    setcookie( 'age', 30, time() + 5 );
    // + Lấy giá trị của cooke giống hệt thao tác lấy giá trị với mảng
    echo $_COOKIE['name']; // Thành
    // Do ko chắc key có tồn tại hay k, vì cookie có thời gian sống nên có thể dùng isset trước khi hiển thị
    echo isset($_COOKIE['age']) ? $_COOKIE['age'] : ''; //30

    //+ Cách xem cookie đang được lưu trên trình duyệt
    // Truy cập inspect HTML -> tab Application -> Storage -> Cookies
    // + XÓa cookie, ko như session là sử dụng unset, mà sẽ sử dụng getcookie tuy nhiên thời gian sống là giá trị âm
    setcookie('name', 'abc', time() -1);

    // + Sử dụng giống nhau của session và cookie
    // Đểu dùng để lưu thông tin
    // + Khác nhau:
    // Session hoạt động trên server, cookie hoạt động trên trình duyệt, nên session sẽ bảo mật hơn cookie
    // Session mất đi khi close trình duyệt,  còn cookie thì ko
    
?>