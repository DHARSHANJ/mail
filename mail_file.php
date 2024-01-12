<?php
//("Note : First install phpmailer of the system to work on it")
// ***change your mail and password in the given positions***
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$subject = "Mail using PHPMailer";
$body = "Kindly added a star to this code("Note : First install phpmailer of the system to work on it")";
try {
                $recipient1 = "receiver side mail id";
                $fileTmpPath = $_FILES["fileInput"]["tmp_name"];
                $fileName = $_FILES["fileInput"]["name"];

                $mail = new PHPMailer(true);

                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'your mail id';
                $mail->Password   = 'your app password';
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;

                // Sender and recipient settings
                $mail->setFrom('your mail id @gmail.com');
                $mail->addAddress($recipient1);

                // Attach the PDF file
                $mail->addAttachment($fileTmpPath, $fileName);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->send();
  } catch (Exception $e) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Failure',
                text: 'Fail to send mail'
            });
        </script>
        <?php
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

<form id="search_student" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <label for="fileInput">Choose a PDF file:</label>
    <input type="file" name="fileInput" id="fileInput" accept=".pdf" required>
    <br>

    <br>
    <input type="submit" value="Send Email">
</form>

</body>
</html>
