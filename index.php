<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <link rel="stylesheet" href="./assets/css/style.min.css">
</head>

<body>
  <main class="bg-gray-900 text-white min-h-screen h-full w-full flex items-center justify-content-center">
    <form class="container max-w-2xl m-auto" method="POST" action="src/mail.php" id="formContact" enctype="multipart/form-data">
      <div class="mb-4">
        <label for="name" class="block mb-2 font-bold">Nome</label>
        <input autocomplete="off" type="text" id="name" name="name" class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-3 px-4 transition-colors duration-200 focus:outline-none focus:bg-gray-700 focus:border-gray-500" value="<?= isset($_SESSION['name']) ? utf8_encode($_SESSION['name']) : '' ?>" />
      </div>

      <div class="mb-4">
        <label for="email" class="block mb-2 font-bold">Email</label>
        <input autocomplete="off" type="email" id="email" name="email" class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-3 px-4 transition-colors duration-200 focus:outline-none focus:bg-gray-700 focus:border-gray-500" value="<?= isset($_SESSION['email']) ? utf8_encode($_SESSION['email']) : '' ?>" />
      </div>

      <div class="mb-4">
        <label for="message" class="block mb-2 font-bold">Mensagem</label>
        <textarea id="message" name="message" class="w-full bg-gray-800 text-white border border-gray-700 rounded-lg resize-none py-3 px-4 transition-colors duration-200 focus:outline-none focus:bg-gray-700 focus:border-gray-500" rows="5"><?= isset($_SESSION['message']) ? trim($_SESSION['message']) : '' ?></textarea>
      </div>

      <div class="mb-4">
        <label for="file" class="block mb-2 font-bold">Anexo</label>
        <div class="relative">
          <input multiple type="file" id="file" name="file[]" class="custom-file-input w-full bg-gray-800 text-white border border-gray-700 rounded-lg py-3 px-4 transition-colors duration-200 focus:outline-none focus:bg-gray-700 focus:border-gray-500" />
        </div>
      </div>

      <button type="submit" name="submit" id="submit" class="bg-gray-800 text-white rounded-lg py-3 px-6 hover:bg-gray-700 transition-colors duration-200">
        Enviar
      </button>

      <a href="clear_session.php" class="text-white border border-gray-800 rounded-lg py-3 px-6 hover:bg-gray-800 transition-colors duration-200">
        Limpar
      </a>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
  <script src="./assets/js/validations.js"></script>
  <script src="./assets/js/script.js"></script>


</body>

</html>