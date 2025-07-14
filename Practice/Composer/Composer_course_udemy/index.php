<?php

require_once __DIR__ ."/vendor/autoload.php";

use Devscreencast\ResponseClass\JsonResponse;

$student = array(
      'name' => 'John Doe',
      'course' => 'Siftware Engineering',
      'level' => '200',
      'collections' => ['books', 'sometgin','music' => 'rap']
);

new JsonResponse('unauthorized','',$student);
