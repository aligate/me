<?php

$animals = array('Asia'=>array('Mammuthus columbi','Maclura pomifera','Mammuthus meridionalis','Bison'), 
		 'Amerika'=>array('Homotherium serum','Gymnocladus dioicus','Smilodon populator'), 
		 'Europe'=>array('Panthera tigris','Felis virgata','Tigris regalis','Chondrichthyes'), 
		 'Afrika'=>array('Arctodus simus','Ursus maritimus','Acanthodii','Arctodus pristinus'));

//Сортируем в отдельный массив имена животных из двух слов
$double_names=[];
foreach($animals as $kont =>$animal){
	foreach($animal as $item){
		$res = explode(' ', $item);
		if(count($res)>1) $double_names[]=$item;
	}
}

// Смешиваем части имен, создаем новые имена и выводим их на экран
echo '<h1>Fantasy animals</h1>';
$new_keys =[];
$new_values=[];
		for($i=0; $i<count($double_names);$i++){
		$item = explode(' ',$double_names[$i]);
		$new_values[] = array_pop($item);
		$new_keys[]=array_pop($item);
	}
	shuffle($new_keys);	
	shuffle($new_values);
	$x = 0;
	while($x < count($new_keys)){
	$result .= '- '.$new_keys[$x].' '.$new_values[$x].',<br>';
	$x++;
	}
	echo rtrim($result, ',<br>').'.';
	
echo '<hr>';
	
// Дополнительно. 
// Участвуют все имена исходного массива
$all_names=[];
foreach($animals as $kont =>$animal){
	foreach($animal as $item){
		$all_names[]= $item;
	}
}
while(count($new_values)<count($all_names)){
	$new_values[]='';
	shuffle($new_values);
} 
foreach($animals as $kont=>$animal){
	echo "<h2>$kont</h2>";
	shuffle($animal);
	for($i = 0;$i< count($animal);$i++){
		$new_name = explode(' ',$animal[$i]);
		if(count($new_name)>1) array_pop($new_name);
		array_push($new_name, array_shift($new_values));
		if($i < count($animal)-1) echo implode(' ', $new_name).', ';
		else echo implode(' ', $new_name).'.';
		}
	}

?>
