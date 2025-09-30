<?php
function fich2Tab($filename) {
    $usersAssoc = [];
    $users = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Automatically trims newlines
    $size = count($users);

    for ($i = 0; $i < $size; $i += 3) {
        if (
            isset($users[$i]) &&
            isset($users[$i + 1]) &&
            isset($users[$i + 2])
        ) {
            $id = trim($users[$i]);
            $usersAssoc[$id] = array(
                'password' => trim($users[$i + 1]),
                'status' => trim($users[$i + 2])
            );
        }
    }

    return $usersAssoc;
}

function tab2Fich($usersAssoc) {
    $f = fopen("users.txt", "w");
    foreach ($usersAssoc as $id => $value) {
        fwrite($f, trim($id) . PHP_EOL);
        fwrite($f, trim($value['password']) . PHP_EOL);
        fwrite($f, trim($value['status']) . PHP_EOL);
    }
    fclose($f);
}
?>  Q1.php