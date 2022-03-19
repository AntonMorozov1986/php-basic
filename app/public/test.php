<?php
phpinfo();

$pdo = new PDO('mysql:dbname=php-basic;host=mysql', 'anton', 'antonpass', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$query = $pdo->query('SHOW VARIABLES like "version"');

$row = $query->fetch();

echo 'MySQL version:' . $row['Value'];
?>
<h3>Проверка работы php</h3>
<p>Если вы видите версию mySQL, то это значит, что все запущено успешно. &#128640; &#127881;</p>
<a class="link" href="index.html">&#9166; Вернуться на главную</a>
<style>
.link {
    text-decoration: none;
    font: inherit;
    color: inherit;
}
</style>
