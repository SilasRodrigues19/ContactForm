<?php

  $tag = 'form_php';

  define('HOST', 'smtp.gmail.com');
  define('EMAIL', 'silasrodrigues.fatec@gmail.com');
  define('CC', str_replace('{tag}', $tag, 'sa9db.{tag}@inbox.testmail.app'));
  define('PASSWORD', 'xxxxxxxxxxxxxxxx');
  define('PORT', 587);