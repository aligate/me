<?php
header('Content-Type: text/html; charset=utf-8');

// функция для сортировки данных
function cut($haystack, $before, $after){
	
	$pie = explode($before, $haystack, 2);
	$pie = explode($after, $pie[1], 2);
	return $pie[0];
	
}
if(isset($_GET['id'])){
$id = $_GET['id'];
$file = file_get_contents("https://habrahabr.ru/post/$id/");

//Создаем массив с требуемыми данными
$info = [];

// заголовок статьи
$info['title'] = cut($file, '<span>', '</span>');

// первое предложение статьи
preg_match('/^(.*?[?!.])(?=\s*[A-ZА-ЯЁ]|$)/s', cut($file, '<div class="content html_format">', '<br/>'), $res);
$info['text'] = $res[0];
if($info['text'] === null) $info['text'] = 'image';

// дату публикации
$info['date'] = cut($file, '<span class = "post__time_published">', '</span>');
 
// рейтинг статьи
$info['rating'] = cut($file, '"user-rating__value">', '</span>');

// количество просмотров
$info['views'] = cut($file, 'title="Просмотры публикации">', '</div>');

// количество «звезд»
$info['stars'] = cut($file, 'публикацию в избранное">', '</span>');
 
// теги, если они есть (выводятся рядом с заголовком статьи)
$pie_tag = explode('<div class="hubs">', $file, 2);
if(count($pie_tag) === 1){
	$info['status'] = 'error';
} else {
$pie_tag = explode('</div>', $pie_tag[1]);
$pie_tag = explode('}">', $pie_tag[0]);
for($i=1; $i < count($pie_tag); $i++) {
	$result = explode('</a><span class = "profiled_hub"', $pie_tag[$i]);
	$info['tags'][] = $result[0];
		}	
	}
}

?>
<form action="" >
<input type="text" name ="id" size= "30" placeholder= "Введите идентификатор поста">
<input type="submit" value ="go">
</form>
<br/>

<?php

if($info) echo json_encode($info, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

?>
