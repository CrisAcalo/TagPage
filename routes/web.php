<?php

use App\Http\Controllers\TagController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome',[
        'tags'=> Tag::all()
    ]);
});

Route::post('tags', [TagController::class, 'store'])->name('tags.store');
Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');