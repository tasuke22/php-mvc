<?php

echo '<h1>Hello World</h1>';

$hoge = [
    'name' => 'hoge',
    'age' =>"20",
    'profile' => 'hogehoge',
    'status' => 'yes',
];

foreach ($hoge as $item) {
    echo $item;
    echo '<br>';
}
