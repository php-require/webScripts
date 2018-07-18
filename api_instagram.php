<?php
/**
* instagram api
* Jury alferov
Для интеграции необходимо авторизовать сайт
1) https://www.instagram.com/developer/clients/manage/  - registr new client
2) в security снять галочку Disable implicit OAuth
3) заполнить все поля (важное поле Redirect URIs: главная страница сайта)
4) воткнуть ссылку на главную страницу <a href="https://instagram.com/oauth/authorize/?client_id=c2630280b1ce4ad39ea3bf1d73107c19&redirect_uri=https://азия-спа.рф&response_type=token&scope=public_content">but22</a>
.... в ответ получим токен, пример = 584003671.c263028.fd1da4ec3ada4bc885fe277a53071975 где 584003671 это userid
5) авторизуемся. 
6) заливаем в любое место сайта страницу api.php
*/
/*  +++++  Посты из группы инстаграмм  +++++
$userid = "584003671";
$accessToken = "584003671.c263028.fd1da4ec3ada4bc885fe277a53071975";
// Get our data
function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
// Pull and parse data.
$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}");
$result = json_decode($result);
echo "<pre>"; 
var_dump($result);
echo "</pre>"; 
?>

<?php $limit = 8; // Amount of images to show ?>
<?php $i = 0; ?>

<?php foreach ($result->data as $post): ?>
	<?php if ($i < $limit ): ?>
		<a href="<?= $post->images->standard_resolution->url ?>"><img src="<?= $post->images->standard_resolution->url ?>" width="500" height="500"></a>
		 <a href="<?= $post->videos->standard_resolution->url ?>"><img src="<?= $post->images->standard_resolution->url ?>" width="500" height="500"></a>
		 <p><?= $post->caption->text ?></p>
		<?php $i ++; ?>
	<?php endif; ?>
<?php endforeach; ?>
*/
 
$tag_name ="asiabeautyspa";
$userid = "584003671";
$accessToken = "584003671.c263028.fd1da4ec3ada4bc885fe277a53071975";
// Get our data
function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
// Pull and parse data.
$result = fetchData("https://api.instagram.com/v1/tags/{$tag_name}/media/recent/?access_token={$accessToken}");
$result = json_decode($result);
/*echo "<pre>"; 
var_dump($result);
echo "</pre>"; */
?>

<?php $limit = 8; // Amount of images to show ?>
<?php $i = 0; ?>

<?php foreach ($result->data as $post): ?>
	<?php if ($i < $limit ): ?>
		<a href="<?= $post->videos->standard_resolution->url ?>"><img src="<?= $post->images->standard_resolution->url ?>" width="500" height="500"></a>
		<!--<a href="<?= $post->videos->standard_resolution->url ?>"><img src="<?= $post->images->standard_resolution->url ?>" width="500" height="500"></a> -->
		 <p><?= $post->caption->text ?></p>
		<?php $i ++; ?>
	<?php endif; ?>
<?php endforeach; ?>
