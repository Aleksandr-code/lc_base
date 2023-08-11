<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movie1 = Movie::find(1); // метод find - извлекает запись по id
        var_dump($movie1); // вывод информации через php команду
        dump($movie1);
        dump($movie1->storyline); // dump
        // --------------------
        $movies = Movie::all(); // метод all - извлекает все записи, возвращает коллекцию
        foreach ($movies as $movie){
            dump($movie->title);
        }
        // -------------------- метод where - извлечение записей по условию, метод get - вернуть коллекцию
        $movieYear = Movie::where('year', '>', 2018)->get();
        foreach ($movieYear as $movie){
            dump($movie->year);
        }
        // -------------------- метод first - вернуть первую найденную запись
        $movieTime = Movie::where('running_time_min', '=', 180)->first();
        dump($movieTime->running_time_min);
        dd('end'); // dump die
    }

    public function create(){
        $MovieArr = [
            [
                'title' => 'new Movie2',
                'year' => 2023,
                'running_time_min' => 120,
                'storyline' => 'description',
            ],
        ];

        foreach ($MovieArr as $movie){
            Movie::create($movie);
        }
        dd('created');
    }

    public function update(){
        $movie = Movie::find(3);
        $movie->update([
            'storyline' => 'description new',
        ]);
        dd($movie);
    }

    public function delete(){
        $movie = Movie::find(2);
        $movie->delete();
        dd('delete');
        // Восстановить удаленное
//        $movie = Movie::withTrashed()->find(2);
//        $movie->restore();
//        dd('restore');
    }

    public function firstOrCreate(){

    }

    public function updateOrCreate(){

    }
}
