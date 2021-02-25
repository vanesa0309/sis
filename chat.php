<?php
include "Bot.php";
$bot = new Bot;
$questions = [

   
"1" => "Los horarios de misas son de Lunes a Vierenes a las 7PM , Sábados 9AM  y el día Domingo Se realizan 3 misas 9AM,12PM y 6PM.",

      
    "gracias" =>"Excelente dia",
   
    "what is your name?" =>" my name is Bot",
   


    "tu nombre es?" => "Mi nombre es " . $bot->getName(),
    "tu eres?" => "Yo soy una " . $bot->getGender()
    
];

if (isset($_GET['msg'])) {
   
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('Hola');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Lo siento, Las preguntas deben estar relacionadas con la parroquia.");
        } else {
            $botty->reply($botty->ask($msg,$questions));
        }
    });
}
