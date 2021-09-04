// do đã tích hợp query,nên sử dụng cấc phương thức của jquery để thao tác
// $document.ready đảm bảo code js của bạn chạy dc sau cùng 
// Sau khi các HTML trên trang hiển thị hết, để đảm bảo k bị lỗi
$(document).ready(function(){
    // Luôn viết code js trong hàm ready
    // alert('123') : thử xem chèn js thành công chưa;
    // JQuery sử dụng selector giống hệt CSS
    // GỌi sự kiện click trên nút lưu đang có id = save
    $('#save').click(function(){
        // Lấy các giá trị từ input tương ứng để chuẩn bị gửi vào ajax
        // attr('') lấy dc bất cứ giá trị của thuộc tính bất kỳ nào
        // VỚi các input sẽ dùng hàm val để lấy giá trị
        var name = $('#name').val();
        var description = $('#description').val();
        console.log(name);
        console.log(description);
        // Gọi Ajax để nhờ PHP xử lý lưu thông tin vào CSDL 
        // Tạo đối tượng chứa các thông tin gọi ajax
        var obj_ajax =  {
            // Đường dẫn tới file php sẽ xử lý dữ liệu từ ajax
            url: 'insert.php',
            // Phương thức truyền dữ liệu
            // Các dữ liệu sẽ gửi lên url
            method: 'post',
            data: {
                name: name,
                description: description    
            },
            // Nơi lưu chữ kết quả trả về từ url do PHP xử lý
            success: function (data) {
                console.log(data);
            }
        };
        // Gọi ajax sử dụng jquery
        $.ajax(obj_ajax);
        // Để debug xem ajax đang hoạt động trên trang web như tn
        // Sẽ sử dụng công cụ inspect Developer của trình duyệt
        // Thông qua tab Network
    });
});