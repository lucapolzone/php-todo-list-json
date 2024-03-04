<?php

//nuovi dati per task vengono trasmessi al server attraverso una richiesta HTTP POST, e in PHP questi dati vengono recuperati utilizzando l'array $_POST.
$task_index = $_POST['index'];

//json decode, decodifica il json in un array associativo in php
$tasks = json_decode(file_get_contents('../data/tasks.json'), true);

//cancello  la task all'indice specifico
unset($tasks[$task_index]);

// ricodifico l'array in json
file_put_contents('../data/tasks.json', json_encode($tasks));

// stampo
header('Content-Type: application/json');
echo file_get_contents('../data/tasks.json');

?>