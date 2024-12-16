<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

Route::get('/', [IssueController::class, 'index'])->name('issues.index');
Route::get('/computer_issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/computer_issues', [IssueController::class, 'store'])->name('issues.store');
Route::get('/computer_issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');
Route::put('/computer_issues/{id}', [IssueController::class, 'update'])->name('issues.update');
Route::delete('/computer_issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
