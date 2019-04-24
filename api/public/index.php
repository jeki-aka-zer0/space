<?php

declare(strict_types=1);

header('Content-type: application/json');

/*echo json_encode([
    'message' => 'Backend coming soon. '.time(),
]);*/

$dbconn = pg_connect("host=space-bc-api-postgres port=5432 dbname=api user=api password=secret");
$query = 'SELECT * FROM users';
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

$users = [];
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    $users[] = $line;
}

pg_free_result($result);
pg_close($dbconn);

echo json_encode([
    'users' => $users,
]);
