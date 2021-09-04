<?php
    //  1 -  Một số chú ý:
    // - Chức năng gửi mail ứng dụng rất nhiều trong thực tế: đăng ký, quên mật khẩu, đặt hàng
    // gửi thông tin liên hệ....
    // Về code, PHP có 1 hàng dùng để gửi mail: mail()
    // Thử gửi mail = hàm mail của PHP
    // Nên dùng thư viện bên ngoài để hỗ trợ việc gửi mail, 1 trong số đó là thư viện  PHPMailer
    // Với PHPMailer cần cấu hình các thông số liên quan đến mật khẩu ứng dụng của Gmail
    // Copy từ PHPMailer
    // CÓ yheer viết thành 1 hàm gủi mail dựa trên thư viện này
    // public function sendMail($mail,$title,$body,$attachment)

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    // Copy 1 file ảnh bất kỳ vào ngang hàng với file hiện tại
    // để demo chức năng đính kèm file khi gửi mail: img1.jpg
    
    // Nhúng 3 file chứa class PHPMailer, SMTP, Exception
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    require_once 'PHPMailer/src/Exception.php';
    // Load Composer's autoloader
    // * comment lại đoạn này do chưa sử dụng composer
    // require 'vendor/autoload.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        // * Cần setting thêm để k bị lỗi font có dấu
        $mail->CharSet = 'UTF-8';
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        // $mail->SMTPDebug = SMTP::DEBUG_OFF;  
        $mail->isSMTP();
        // Send using SMTP
        // * Sử dụng server của gmail để gửi mail
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true; 
        // Enable SMTP authentication
        // SMTP username
        $mail->Username   = 'nguyengiathanh1999@gmail.com'; 
        // SMTP password
        // * Password này ko phải là password để đăng nhập Gmail, là mật khẩu ứng dụng,
        // để lấy mật khẩu ứng dụng cần lấy link (cần cài mật khẩu 2 lớp và có mk ứng dụng)
        $mail->Password   = 'ubcnqkvixvpvpzvs';
                                      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        // * Setting người gửi và người nhận
        $mail->setFrom('nguyengiathanh1999@gmail.com', 'Nguyễn Gia Thành');
        //*  Setting người nhận
        $mail->addAddress('nguyengiathanh1999@gmail.com');
                     // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
    
        // Attachments
        // *  Đây là chức năng đính kèm file
        $mail->addAttachment('img1.jpg');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        // * Setting nội dung mail
        $mail->isHTML(true);
      // Set email format to HTML
    
        $mail->Subject = 'Tiêu đề mail của tôi';
        // * ghi nội dung
        $mail->Body    = 'Cảm ơn đã đặt hàng';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    // * mail('nguyengiathanh1999@gmail.com', 'Tiêu đề mail', 'Message'); // Lỗi
?>  