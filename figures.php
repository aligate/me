<?php
header('Content-Type: text/html; charset=utf-8');
//Числа Фибоначчи

$x = $_GET['x'];

$a = 1;
 
$b = 1;

while($x > $a){
	
	$c = $a;
	
	$a += $b;
	
	$b = $c;
	
	}

?>

<div style = 'text-align:center;'>
<h2>Числа Фибоначчи</h2>

<form action="" >

<input type="text" name ="x" placeholder = "Введите число">
<input type="submit" value="go">

</form>

<?php if(strpos($_SERVER['REQUEST_URI'], '?')):?>
<!--Пустая строка и буквы нам не нужна, поэтому делаем проверку-->
	<?php if($x!=='' AND is_numeric($x)): ?>

	<?php if($x==$a): ?>
	<p>задуманное число: <b><?= $x; ?></b> - входит в числовой ряд</p>
	<?php endif; ?>

	<?php if($x < $a): ?>
	<p>задуманное число: <b><?= $x; ?></b> - Не входит в числовой ряд</p>
	<?php endif; ?>
	
	<?php else: ?>
	<p style ='color: red; font-size: 20px;'>Внимание! Введите число!</p>
	<?php endif; ?>

<?php endif;?>
</div>



