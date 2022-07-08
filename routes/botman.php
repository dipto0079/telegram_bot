<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');


$data = \App\QuestionAnswer::all();

foreach ($data as $key) {
    $botman->hears($key->question, function ($bot) use ($key) {
        $bot->reply($key->answer);
    });
}
$botman->hears('Start conversation', BotManController::class . '@startConversation');
