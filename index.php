<?php

require __DIR__.'/vendor/autoload.php';

//$slugify = new \Cocur\Slugify\Slugify();

//echo $slugify->slugify('ée654684sdf5 ae é ée');

echo \OKLM\StringGenerator\PasswordGenerator::generate(50000, \OKLM\StringGenerator\PasswordGenerator::PASSWORD_HARD);