<?php

//nuovi dati per task vengono trasmessi al server attraverso una richiesta HTTP POST, e in PHP questi dati vengono recuperati utilizzando l'array $_POST.
$task_index = $_POST['index']; //$task_index contiene l'indice del compito che deve essere modificato

//la struttura dati dell'array associativo viene utilizzata per aggiornare il contenuto del json
$new_task = [
  'text' => $_POST['taskText'], // Ottieni il testo di task

  //Il campo 'done' viene impostato su vero se il valore di $_POST['taskDone'] è uguale a 'true'.
  // il valore true o false di taskDone arriva da main.js > toggleDone()
  'done' => $_POST['taskDone'] === 'true',
];


//json decode, decodifica il json in un array associativo in php
$tasks = json_decode(file_get_contents('../data/tasks.json'), true);

//Prendi la lista $task, vai all'indice che vogliamo cambiare ($task_index). 
//Ora sostituisci tutte le informazioni su quel task con queste nuove informazioni: $new_task."
$tasks[$task_index] = $new_task; 

// ricodifico l'array in json
file_put_contents('../data/tasks.json', json_encode($tasks));

// stampo
header('Content-Type: application/json');
echo file_get_contents('../data/tasks.json');















?>