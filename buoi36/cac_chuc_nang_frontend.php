<?php
/**
 * Các chức năng cơ bản của Frontend
 * 1 - Giỏ hàng:
 * + Demo trong khóa học: như 1 giỏ hàng, đi nhặt
 * sản phẩm, nếu ưng ý thì mới thanh toán
 * + Chức năng này là chức năng cơ bản trong 1 Website bán
 * hàng
 * + Về mặt code có các cách để lưu giỏ hàng: cookie, database,
 * session. Thông thường sẽ hay dùng session để lưu, vì
 * liệu khi user cho vào giỏ có thể là dữ liệu rác nếu user
 * ko quay lại trang nữa
 * 2 - Feedback: 1 sản phẩm có chức năng vote và comment, vote
 * có thể sử dụng các plugin của js hoặc tự code ra, thử phân
 * tích bảng feedbacks: id, user_id, product_id, start, comment
 * Có thể xủ lý thêm nếu mua hàng thành công sản phẩm đó r
 * thì mới cho sử dụng chức năng này
 * 3 - Danh sách yêu thích: thả tim vào các sản phẩm -> thêm
 * sp đó vào danh sách yêu thích
 * Về cơ chế: thường sẽ lưu vào database/cookie vì khả năng
 * user quay lại mua sản phẩm này rất cao
 * Phân tích favorites: id, user_id, product_id ...
 * Yêu cầu đăng nhập để thực hiện đc chức năng này
 * 4 - Top sản phẩm: là các sản phẩm bán chạy nhất, dựa vào số
 * đơn hàng mà sản phẩm có số lượng bán nhiều nhất
 * 5 - Danh sách sản phẩm, chi tiết sản phẩm, liên hệ, giới
 * thiệu ...
 * 6 - Show sản phẩm theo trend khi search: tìm theo
 * từ khóa sản phẩm nào đc search nhiều nhất
 * Về cơ chế: tạo 1 bảng lưu lại các từ khóa search, khi user
 * search ngoài việc tìm kiếm, còn cần phải lưu vào bảng này
 * searchs: id, keyword
 * vd: các bản ghi
 * 1 iphone
 * 2 samsung
 * 3 iphone
 * 4 iphone
 * COUNT (id) GROUP BY keyword
 * Bảng trên chỉ là demo về mặt cơ bản nhất
 * 7 - Thanh toán: user nhập thông tin và thanh toán
 * 8 - Nhập mã giảm giá: thông thường sẽ nhập mã giảm giá
 * ở bước thanh toán
 * VD: user thanh toán dơn hàng A với giá tiền B, nhập mã giảm
 * giá C thì đơn hàng còn giá tiền B' với B' < B
 * Cơ chế: tạo bảng 1 bảng chứa các mã giảm giá
 * + Bảng discounts:
 * id,
 * code: tên mã giảm giá
 * description,
 * expired_date: ngày kết thúc của mã
 * amount: số lượng tối đa của mã này
 * discount: % hoặc giá tiền giảm
 * status:
 * + Nếu 1 đơn hàng chỉ nhập đc 1 mã giảm giá, có thể thêm
 * 1 trường discount_id vào bảng orders
 * 9 - Chức năng tích điểm khi mua hàng: user mua hàng, tích
 * điểm cho user dựa vào giá trị đơn hàng, mua 10tr tích
 * dc 100đ, quy đổi điểm này thành giá tiền đc giảm
 * Về cơ chế: thêm 1 trường point trong bảng users, mỗi lần
 * user mua hàng thành công thì sẽ cộng dồn điểm vào trường
 * này. Trường hợp nếu user dùng số điểm này thì trừ đi tương
 * ứng
 * 10 - sản phẩm/tin tức liên quan:
 * Cơ chế: lấy các sản p hẩm cùng danh mục với sản phẩm hiên
 * tại, và phải trừ đi chính sản phẩm đó
 * 11 - Tích hợp chat trực tuyến như Messenger, tích hợp Chat
 * từ talk.to, tích hợp Like/Share Facebook bài viết
 * 12 - Filter sản phẩm
 * 13 - Sắp xếp sản phẩm
 *
 * * + Dùng session để lưu thông tin giỏ hàng
 * + Dùng cơ chế ajax để lưu vào giỏ khi user click thêm vào
 * Giỏ hàng
 * + Cấu trúc giỏ hàng sẽ như sau:
 *
 * DEMO chức năng thanh toán:
 * Về mặt giao diện, trang thanh toán hiển thị 2 phần chính: form nhập thông tin mua hàng
 * thông tin giỏ hàng
 * Về mặt code: cần xử lý lưu vào 2 bảng sau: orders và order_ details
 * Chú ý thêm: nếu user đã đăng nhập trên trang, thì sẽ hiển thị luôn các thông tun của user
 * đó trong form thanh toán, còn nếu là khách vãng lai thì sẽ để nhập từ đầu
 * + 
 *
 */
$_SESSION['cart'] = [
    //mỗi 1 phần tử của giỏ hàng sẽ có dạng sau:
    //<product_id> => []
    3 => [
        'name' => 'Samsung S9',
        'price' => 3000,
        'avatar' => 'samsung.jpg',
        'quantity' => 5
    ],
    5 => [
        'name' => 'Iphone',
        'price' => 4000,
        'avatar' => 'iphone.jpg',
        'quantity' => 2
    ]
];