<!doctype html>
<html>

<head>
<?php

require_once(__DIR__ . "/vendor/autoload.php");

use aredridel\Blurhash\ToCss as BlurhashToCss;

$hash = 'Nr8%YLkDR4j[aej]NSaznzjuk9ayR3jYofayj[f6';
$o1 = new BlurhashToCss($hash);

?>
</head>

<body>
	<dl>
		<dt>
			Hash </dt>
		<dd> <?= $hash ?> </dd>
		<dt>
			Image </dt>
		<dd>
			<div style="overflow: hidden; width: 300px; height: 150px; display: inline-block;">
				<div style='height: 100%; width: 100%; <?= $o1->toCss() ?>'></div>
			</div>
		</dd>
	</dl>
</body>

</html>
