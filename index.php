<?php
$dbms='mysql';     
$host='localhost'; 
$dbName='gocar';    
$user='root';     
$pass='rootpswd';          
$dsn="$dbms:host=$host;dbname=$dbName";

try {
    $pdo = new PDO($dsn, $user, $pass); 
    echo "資料庫連線成功<br>";
 
    // $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

?>

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
	原子筆：<input type="text" name="pen" value="<?php if(!empty($_POST['pen'])){echo $_POST['pen'];} ?>">20/支<br>
	記事本：<input type="text" name="notebook" value="<?php if(!empty($_POST['notebook'])){echo $_POST['notebook'];} ?>">15/本<br>
	像皮擦：<input type="text" name="eraser" value="<?php if(!empty($_POST['eraser'])){echo $_POST['eraser'];} ?>">10/個<br>
	墊板 (特定商品)：<input type="text" name="pad" value="<?php if(!empty($_POST['pad'])){echo $_POST['pad'];} ?>">15/個<br>
	<input type="submit" value="結帳" name="dosubmit"><br>
	滿額 X 元 <input type="text" name="full_discount_x" value="<?php if(!empty($_POST['full_discount_x'])){echo $_POST['full_discount_x'];} ?>"> Z 折：<input type="text" name="full_discount_z" value="<?php if(!empty($_POST['full_discount_z'])){echo $_POST['full_discount_z'];} ?>"><br>
	特定商品滿 X 件<input type="text" name="special_full_qty_x" value="<?php if(!empty($_POST['special_full_qty_x'])){echo $_POST['special_full_qty_x'];} ?>"> 折 Y 元：<input type="text" name="specil_full_discount_y" value="<?php if(!empty($_POST['specil_full_discount_y'])){echo $_POST['specil_full_discount_y'];} ?>"><br>
	訂單滿 X 元贈送特定商品<input type="text" name="full_gift_x" value="<?php if(!empty($_POST['full_gift_x'])){echo $_POST['full_gift_x'];} ?>"> 個<br>
	訂單滿 X 元折 Y 元，此折扣在全站總共只能套⽤ N 次 <input type="text" name="specil_full_discount_times"> 次<br>
	</form>
	<hr>
	<?php
		spl_autoload_register(function ($class) {
			include strtolower($class) . '.class.php';
		});
		if(isset($_POST['dosubmit'])){
			$cal = new Calculator($_POST);
			$total01 = $cal->valid($pdo);
			$promo = new Promotion($_POST);
			$total02 = $promo->getFullDiscount($total01);
			
			$total03 = $promo->getSpecialFullDiscount($total02);
			$promo->getSpecialGiftQty($total01);
		}


	?>
<br>
<hr>
訂單滿 X 元折 Z % <br>
特定商品滿 X 件折 Y 元 <br>
訂單滿 X 元贈送特定商品 <br>
訂單滿 X 元折 Y 元，此折扣在全站總共只能套⽤ N 次 <br>
（加分題）訂單滿 X 元折 Z %，折扣每⼈只能總共優惠 N 元 <br>
（加分題）訂單滿 X 元折 Y 元，此折扣在全站每個⽉折扣上限為 N 元<br>
</body>
</html>