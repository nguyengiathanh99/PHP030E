//js/main.js
// do đã tích hợp jquery, nên sẽ dử dụng các phương thức của jquery để thao tác
// jquery để thao tác
// document.ready đảm bảo code js của bạn được chạy sau cùng, sau khi các html trên trang
//hiển thị hết để đảm bảo không bị lỗi
$(document).ready(function () {
    // luôn viết code js trong hàm ready
    // jquery sử dụng selector giống hệt css
    // gọi sự kiện click trên nút lưu đnag có í = save
    $('#save').click(function () {
        //lấy các giá trị từ input tương ứng, để chuẩn bị gửi vào ajax
        //attr('')
        var name = $('#name').val();
        var description = $('#description').val();
        console.log(name);
        console.log(description);
        // gọi ajax để nhờ PHP xử lý lưu thông tin vòa CSDL
        // tạo dối tương chứ các thông tin gọi ajax
        var obj_ajax = {
            // đường dẫn tới file php sẽ xử lý dữ liệu gửi từ ajax
            url: 'insert.php',
            // phương thức truyền dữ liệu: get/post
            method: 'post',
                // các dữ liệu sẽ gửi hết lên url
                data: {
                    name: name,
                        description: description
        },
        // nơi lưu trữ kết quả trả về từ url do php xử lý
        success: function (data) {
            console.log(data);
        }
        };
        // gọi ajax sử dụng jquery
        $.ajax(obj_ajax);
        // để debug xem ajax đang hoạt động trên trang web ntn, sẽ sử dụng công cụ developtool của trình duyệt,
        //  thông qua tab network


    });
});