<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/note/index', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::get('/note/store', [NoteController::class, 'store'])->name('note.store');
Route::get('/note/show/{id}', [NoteController::class, 'show'])->name('note.show');
Route::get('/note/edit/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::get('/note/update/{id}', [NoteController::class, 'update'])->name('note.update');
Route::get('/note/destroy/{id}', [NoteController::class, 'destroy'])->name('note.destroy');