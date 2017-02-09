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

<h2>Числа Фибоначчи</h2>

<form action="" >

<input type="text" name ="x" placeholder = "Введите число">
<input type="submit" value="go">

</form>

<?php

if($x!= null)
{
	
	if($x == $a)
	{
	echo "задуманное число: <b>$x</b> - входит в числовой ряд";
	
	}
 	
	if($x < $a)
	{
	echo "задуманное число: <b>$x</b> - НЕ входит в числовой ряд";

	}
} 

?>


