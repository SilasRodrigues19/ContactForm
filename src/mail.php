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
      $mail->addAddress(EMAIL, 'Silas');

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
                        <html lang="pt-br">
                          <head>
                            <meta charset="UTF-8">
                            <title>Nova Mensagem de Contato</title>
                          </head>
                          <body style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">

                            <div style="background-color: #f7f7f7; padding: 20px;">
                              <h1 style="color: #333; margin-bottom: 20px;">Nova Mensagem de Contato</h1>

                              <p>Olá,</p>

                              <p>Você recebeu uma nova mensagem de contato através do seu website. Abaixo estão os detalhes da mensagem:</p>

                              <ul style="list-style: none; padding-left: 0;">
                                <li><strong>Nome:</strong>' . $_SESSION['name'] . '</li>
                                <li><strong>Email:</strong>' . $_SESSION['email'] . '</li>
                                <li><strong>Mensagem:</strong>' . $_SESSION['message'] . '</li>
                              </ul>

                              <p>Atenciosamente.</p>
                              <p>' . $_SESSION['name'] . '</p>
                            </div>

                          </body>
                        ';
      $mail->AltBody = "Olá,

                          Obrigado por entrar em contato. Abaixo estão as informações que você nos enviou:

                          Nome: {$_POST['name']}
                          Email: {$_POST['email']}
                          Mensagem: {$_POST['message']}

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