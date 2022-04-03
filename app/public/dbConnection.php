<?php
function getDb(): ?mysqli
{
    static $db = null;
    if (is_null($db)) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $db = new mysqli('mysql', 'anton', 'antonpass', 'php-basic');
    }
    return $db;
}
