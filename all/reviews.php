<?php top('Отзывы'); MessageShow();?>



<h1>Отзывы</h1>
<form onsubmit="return false" >
<p><textarea onkeyup="schet('10', '500')" class="cl" placeholder="Текст сообщения" id="subject"></textarea></p>
<p id="WordCounter"></p>
<p><button onclick="post_query('addreview', 'reviews', 'subject')">Добавить</button> </p>
</form>
<h1>Список отзывов</h1>


<?php
$query = mysql_query('SELECT `id`, `text`, `uid` FROM `reviews` ORDER BY `id` DESC');


if ( !mysql_num_rows($query) ) exit('Список отзывов пуст');




while ( $row = mysql_fetch_assoc($query) ) {

    $user = mysql_fetch_assoc( mysql_query("SELECT `email`, `id` FROM `users` WHERE `id` = $row[uid]") );


    echo '<div class="reviews">'.(($_SESSION['id'] == $user['id']) ? '<a class="delblog" href="/control/delete/type/reviews/id/'.$row[id].'">x</a>' : '').'<span>Отправитель: '.hideEmail($user['email']).'</span>'.nl2br( htmlspecialchars($row['text']), false).'</div>';



}




bottom() ?>