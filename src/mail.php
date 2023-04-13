<html>

<head>
  <title>Processando e-mail...</title>
  <meta charset="utf-8">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css">
  <!-- Sweet Alert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

</head>

<body class="bg-gray-900 text-white min-h-screen h-full w-full mx-auto p-8">

  <?php

  require_once('Credentials.php');
  require_once('PHPMailer.php');
  require_once('SMTP.php');
  require_once('Exception.php');
  require_once('Helpers.php');


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $toastMessage = '';


  session_start();
  
  if (isset($_POST['name'])) $_SESSION['name'] = mb_convert_encoding($_POST['name'], 'ISO-8859-1', 'UTF-8');
  if (isset($_POST['email'])) $_SESSION['email'] = $_POST['email'];
  if (isset($_POST['message'])) $_SESSION['message'] = mb_convert_encoding($_POST['message'], 'ISO-8859-1', 'UTF-8');


  if (isset($_POST['submit'])) {

    $mail = new PHPMailer(true);

    $mail->setLanguage('pt_br', '../language/phpmailer.lang-pt_br.php');

    try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
      $mail->isSMTP();
      $mail->Host       = HOST;
      $mail->SMTPAuth   = true;
      $mail->Username   = EMAIL;
      $mail->Password   = PASSWORD;
      $mail->Port       = PORT;

      //Recipients
      $mail->setFrom(EMAIL, 'Silas');
      $mail->addAddress(CC, 'Silas');
      $mail->addCC(CC);

      //var_dump($_FILES['file']); exit;

      //Attachments
      if (isset($_FILES['file'])) {
        $all_files = count($_FILES['file']['tmp_name']);

        for ($i = 0; $i < $all_files; $i++) {
          $tmpFilePath = $_FILES['file']['tmp_name'][$i];

          if ($tmpFilePath != "") {
            $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);
          }
        }
      }

      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Mensagem do Formulário';
      $mail->CharSet = 'UTF-8';
      $mail->ContentType = 'text/html; charset=UTF-8';
      $mail->Body    = '
                        <body style="font-family: Arial, sans-serif; font-size: 16px; color: #333; background: #f7f7f7; padding: 20px;">
                          <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
                            <h1 style="color: #333; margin-bottom: 20px; font-size: 24px; font-weight: bold;">Nova Mensagem de Contato</h1>

                            <p style="margin-bottom: 16px;">Olá,</p>

                            <p style="margin-bottom: 16px;">Você recebeu uma nova mensagem de contato através do seu website. Abaixo estão os detalhes da mensagem:</p>

                            <ul style="list-style: none; padding-left: 0; margin-bottom: 16px;">
                              <li style="margin-bottom: 8px;"><strong>Nome:</strong> ' . $_SESSION['name'] . '</li>
                              <li style="margin-bottom: 8px;"><strong>Email:</strong> ' . $_SESSION['email'] . '</li>
                              <li style="margin-bottom: 8px;"><strong>Mensagem:</strong> ' . $_SESSION['message'] . '</li>
                            </ul>

                            <p style="margin-bottom: 16px;">Atenciosamente.</p>
                            <p style="margin-bottom: 0;">' . $_SESSION['name'] . '</p>
                          </div>
                        </body>
                        ';
      $mail->AltBody = "Olá,

                        Obrigado por entrar em contato. Abaixo estão as informações que você nos enviou:

                        Nome: {$_SESSION['name']}
                        Email: {$_SESSION['email']}
                        Mensagem: {$_SESSION['message']}

                        Atenciosamente,
                        Silas Rodrigues
                        ";


      $mail->send();
      displayMailNotification(true, '');
      session_unset();
      session_destroy();
    } catch (Exception $e) {
      displayMailNotification(false, $mail->ErrorInfo);
    }
  }

  ?>
  <script src="../assets/js/mail.js"></script>
</body>

</html>