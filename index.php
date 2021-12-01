<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	請填入以下購買數量：
    <form action="./index.php" method="post">
	原子筆：<input type="text" name="pen">20/支<br>
	記事本：<input type="text" name="notebook">15/本<br>
	像皮擦：<input type="text" name="eraser">10/個<br>
	墊板 (特定商品)：<input type="text" name="pad">15/個<br>
	<input type="submit" value="結帳">
	</form>
	<hr>
	<?php
		spl_autoload_register(function ($class) {
			include $class . '.class.php';
		});

		$prod =  new Product();
		echo $prod->name;
	?>
訂單滿 X 元折 Z % <br>
特定商品滿 X 件折 Y 元 <br>
訂單滿 X 元贈送特定商品 <br>
訂單滿 X 元折 Y 元，此折扣在全站總共只能套⽤ N 次 <br>
（加分題）訂單滿 X 元折 Z %，折扣每⼈只能總共優惠 N 元 <br>
（加分題）訂單滿 X 元折 Y 元，此折扣在全站每個⽉折扣上限為 N 元<br>
</body>
</html>