<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description, //? means that is optional
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/', function () use ($tasks) {  // "use" to take the variable $tasks inside the function scope
    return view('index',
        [
            'name' => "luca",
            'tasks' => $tasks,   //We could pass variables to the blade template. In Blade {{$name}} to get the value.

        ]);
});

Route::get('/greetings/{name}', function ($name) {
    return "hello ${name}";
})->name('greetings');  //we name this route greetings

//redirecting in case of a misspel for
//route() allows me to specify the parameter as associative array.
Route::get('/greeting/{name}', function ($name) {
    return redirect()->route('greetings', ['name' => $name]);
});

//fallback in case of not existing route
Route::fallback(function () {
    return "page does not exist";
});
