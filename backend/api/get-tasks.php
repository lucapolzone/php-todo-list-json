<?php


// $tasks_path = __DIR__ . '/../data/tasks.json';

$tasks_path = '../data/tasks.json';


$to_do_list = file_get_contents($tasks_path);

// $to_do_list_encoded = json_encode($to_do_list);

header('Content-Type: application/json');

// echo $to_do_list_encoded; //se faccio l'encode non funziona

echo $to_do_list;

?>