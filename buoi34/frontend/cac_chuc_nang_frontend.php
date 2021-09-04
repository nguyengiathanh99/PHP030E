<!-- 
    Các chức năng cơ bản của Frontend
     1 - Giỏ hàng: demo trong khóa học: như 1 giỏ hàng, đi nhặt sản phẩm, nếu ưng ý thì mới
    thanh toán
    + Chức năng này là chức năng cơ bản trong 1 website bán bàng
    + Về mặt code có các cách sau để lưu giỏ hàng: cookie, database, session
    + Thông thường sẽ hay dùng session để lưu, vì dữ liệu khi user cho vào giỏ có thể là dữ liệu
    rác nếu user ko quay lại trang nữa
    2 - Feedback: 1 sản phẩm có chức năng vote và comment
    có thể sử dụng các plugin của js hoặc tự code ra, thử phân tích bằng feedbacks: id,user_id,
    product_id, start_id, comment
    - Có thể xử lý thêm nếu mua hàng thành công sản phẩm đó rồi thì mới cho sử dụng chức năng này
    3 - Danh sách yêu thích: thả tim 1 sản phẩm -> thêm sản phẩm đó vào danh sách yêu thích
    Về cơ chế: thường sẽ lưu vào database/cookie vì khả năng user quay lại mua sản phẩm này rất cao
    Phân tích favorites: id, user_id, product_id
    - Yêu cầu đăng nhập để thực hiện chức năng này
    4 - Top sản phẩm: là các sản phẩm bán chạy nhất, dựa vào số đơn hàng mà sản phẩm có số lượng
    bán nhiều nhất
    5 - Danh sách sản phẩm, chi tiết sản phẩm, liên hệ, giới thiệu....
    6 - Show sản phẩm theo trend khi insert: tìm theo từ khóa nào dc search nhiều nhất
    Về cơ chế: tạo 1 bảng lưu lại từ khóa search, khi user search ngoài việc tìm kiếm còn phải
    lưu vào bảng này
    searchs: id, ketword,
    vd: các bản ghi
    1 iphone
    2 samsung
    3 iphone
    4 iphone
    COUNT(id) GROUP BY keyword
    Bảng trên chỉ là demo về mặt cơ bản nhất
    7 - Thanh toán: user nhập thông tin và thanh toán
    8 -  Nhập Mã Giảm giá: thông thường sẽ nhập mã giảm giá ở bước thanh toán
    VD: user thanh toán đơn hàng A với giá trị tiền B, nhập mã giảm giá C thì đơn hàng còn
    giá tiền B' với B' < B
    Cơ chế: tạo 1 bảng chứa mã giảm giá
    Bảng discount: id, code,
     description,
     expried_date: ngày kết thúc của mã
     amount: số lượng tối đa của mã này
     discount: % hoặc giá tiền giảm
     status:
     + Nếu 1 đơn hàng chỉ dc nhập 1 mã giảm giá, có thể thêm 1 trường discount_id vào bảng orders
     9 - Chức năng tích điểm khi mua hàng: user mua hàng, tích điểm cho user dựa vào giá trị đơn
     hàng, mua 10tr tích đc 100d, quy đổi điểm này thành giá tiền được giảm
    Về cơ chế: thêm 1 trường point trong bảng users, mỗi lần user mua hàng thành công thì sẽ
    cộng dồn điểm vào trường này. Trường hợp user dùng số điểm này thì sẽ trừ đi tương ứng
    10 - Sản phẩm/ tin tức liên quan:
    Cơ chế: là lấy các sản phẩm từ danh mục với sản phẩm hiện tại và phải trừ đi chính sản phẩm đó
    11 - Tích hợp chat trực tuyến như Messager, tích hợp chat từ talk.to, tích hợp Like/Share Facebook
    vào bài viết
    12 - Filter sản phẩm
    13 - Sắp xếp sản phẩm

    Demo 
    Thêm giỏ hàng:
    +  Dùng session để lưu thông tin giỏ hàng
    + Dùng cơ chế ajax để lưu vào giỏ user click thêm vào giỏ hàng
    + Cấu trúc giỏ hàng như sau
    
 -->
 <?php
$_SESSION['cart'] = [
    3 => [
        'name' => 'Samsung S9',
        'price' => 3000,
        'avatar' => 'samsung.jpg',
        'quanlity' => 5
    ],
    5 => [
        'name' => 'Iphone',
        'price' => 4000,
        'avatar' => 'iphone.jpg',
        'quanlity' => 2
    ],
    ];
 ?>
 
