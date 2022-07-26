<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('server-setup-qa', function () {

    Artisan::call('storage:link');
    $output = Artisan::output();

    Artisan::call('cache:clear');
    $output .= Artisan::output();
    Artisan::call('config:clear');
    $output .= Artisan::output();
    Artisan::call('route:clear');
    $output .= Artisan::output();
    Artisan::call('view:clear');
    $output .= Artisan::output();

    dd($output);

})->describe('QA Server Setup');


Artisan::command('server-setup-live', function () {

    Artisan::call('storage:link');
    $output = Artisan::output();

    Artisan::call('cache:clear');
    $output .= Artisan::output();

    Artisan::call('config:cache');
    $output .= Artisan::output();
    Artisan::call('route:cache');
    $output .= Artisan::output();
    Artisan::call('view:cache');
    $output .= Artisan::output();

    dd($output);

})->describe('Live Server Setup');


Artisan::command('server-setup-db', function () {

    Artisan::call('migrate:fresh');
    $output = Artisan::output();
    Artisan::call('db:seed');
    $output .= Artisan::output();

    dd($output);

})->describe('Server DB Setup');
