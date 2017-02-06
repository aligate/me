<?php
header('Content-Type: text/html; charset=utf-8');

$name = "Александр";
$age = "44 года";
$email = "adrubinov@gmail.com";
$town = "Мюнхен";
$message = "Работаю на почте";
?>
<!--Вариант 1-->

<h1>Страница пользователя Александра (Вариант 1)</h1>

<table style = "font-size: 18px">

<tr><td><b>Имя:</b></td><td><?= $name;?></td></tr>
<tr><td><b>Возраст:</b></td><td><?= $age;?></td></tr>
<tr><td><b>Адрес электронной почты:</b></td><td><a href="mailto:<?= $email;?>"><?= $email;?></a></td></tr>
<tr><td><b>Место жительства:</b></td><td><?= $town;?></td></tr>
<tr><td><b>Коротко о себе:</b></td><td><?= $message;?></td></tr>

</table>

<hr/>

<!--Вариант 2-->

<?php

$request = array('Имя:', 'Возраст:', 'Адрес электронной почты:', 'Место жительства:', 'Коротко о себе:');
$response = array('Александр', '44 года', 'adrubinov@gmail.com', 'Мюнхен', 'Работаю на почте');

$data = array_combine($request, $response);

?>

<h1>Страница пользователя Александра (Вариант 2)</h1>

<table style = "font-size: 18px">

<?php foreach($data as $key =>$value):?>

<tr><td><b><?=$key;?></b></td><td><?php if(strpos($value, '@')) echo "<a href='mailto:$value'>$value</a>"; else echo $value;?></td></tr>

<?php endforeach;?>

</table>

