<?php

require_once(__DIR__ . "/vendor/autoload.php");

use aredridel\Blurhash\ToCss as BlurhashToCss;

$hash = 'Nr8%YLkDR4j[aej]NSaznzjuk9ayR3jYofayj[f6';
$x = new BlurhashToCss($hash);

echo "Hash: $hash <br> Image: <div style='width: 300px; height: 150px; overflow: hidden; " . $x->toCss() . "'></div>";

