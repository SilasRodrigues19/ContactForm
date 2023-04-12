<?php

function displayMailNotification($isSuccess, $errorMsg)
{
  $toastMessage = $isSuccess ? 'E-mail enviado com sucesso' : ('Falha ao enviar o e-mail. ' . $errorMsg);
  $toastMessageJson = json_encode($toastMessage);
  $notificationType = $isSuccess ? 'form-success' : 'form-error';
  echo "<div class='$notificationType' data-" . ($isSuccess ? 'success' : 'error') . "-msg='$toastMessageJson'></div>";
}