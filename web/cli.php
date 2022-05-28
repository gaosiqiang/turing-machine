<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../vendor/base/Application.php';


$config = array_merge(
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/common/main.php'
);

(new vendor\base\Application())->run($config);

