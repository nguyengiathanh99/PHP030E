$(document).ready(function () {

  var closeNavigate = function () {
    $('.overlay').hide();
    $('.sidebar').removeClass('opened');
    $('body').removeClass('fixed');
  }

  //close sidebar panel, clicked overlay and close sidebar button.
  $('.overlay, .sidebar-toggle-button').on('click', function () {
    closeNavigate();
  });

//sidebar navigation close method.
  var openNavigate = function () {
    if ($(window).width() < 760)
      $('body').addClass('fixed');
    $('.overlay').show();
    $('.sidebar').addClass('opened');
  }

  //sidebar menu click event. open when clicked.
  $('.toggle-sidebar').on('click', function () {
    openNavigate();
  });

  $('.material-button').on('click', function (e) {
    $('.material-button').not($(this)).next('.header-submenu').hide();
    // addWaveEffect($(this), e);
    $(this).next('.header-submenu').toggleClass('active');
  });
  // gọi ajax để xử lý thêm vào giỏ hàng khi click thêm vào giỏ hàng, class add-to-cart
  $('.add-to-cart').click(function() {
    // alert('clicked');
    // Lấy giá trị của thuộc tính data_id đã khai báo trong class hiện tại, data-id là product_id
    //  của sản phẩm
    // + Sử dụng $(this) để tham chiếu đến chính selector hiện tại
    var product_id = $(this).attr('data-id');
    // alert(product_id);
    // + Gọi ajax, truyền vào 1 đối tượng
    $.ajax({
      method:'GET',
      // + URL  theo mô hình MVC sẽ xử lý ajax
      url: 'index.php?controller=cart&action=add',
      // + Dữ liệu gửi lên là 1 object
      data: {
          product_id: product_id
      },
      // + Nơi đón kết quả trả về từ url
      // Nơi chứa toàn bộ kết quả trả về
      success: function(data) {
        console.log(data);
        $('.ajax-message').html('Thêm giỏ hàng thành công');
        // add class này để set opacity = 1 vì mặc định ban đầu message đang có opacity = 0 -> ẩn
        $('.ajax-message').addClass('ajax-message-active');
        // Sau khi hiển thị message thì sẽ xóa message này đi
        // Chờ khoảng 5s r mới xóa, sử dụng hàm setTimeout
        setTimeout(function() {
          // Remove class ajax-message-active đi
          $('.ajax-message').removeClass('ajax-message-active');
        }, 3000);
      }
      // + Xem thông tin ajax: xem trong tab Network của trình duyệt
    });
  })

});