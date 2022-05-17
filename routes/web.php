<?php

use Illuminate\Support\Facades\Route;
use App\Exports\CandidatesExport;
use App\Exports\VotersExport;
use App\Exports\PostsExport;

Route::post('/activity', 'Website\VoterController@voterActivity')->name('voter.activity');

Route::get('/check-activity', 'Website\VoterController@checkVoterActivity')->name('check.activity');


Route::get('/admin/login', function () {
    return view('admin.login');
})->name("admin.login");
// dashboard
Route::get('/admin/dashboard', "Admin\DashboardController@index")->name("admin.dashboard");
Route::get('/admin/dashboard/election_result', 'Admin\DashboardController@electionResult')->name("admin.dashboard.election_result");

// vote
Route::get('/admin/dashboard/votes', 'Admin\VoteController@index')->name("admin.vote.index");
Route::get('/admin/dashboard/votes/delete-all', 'Admin\VoteController@deleteAll')->name("admin.vote.delete-all");
Route::get('/admin/dashboard/votes/{id}', 'Admin\VoteController@delete')->name("admin.vote.delete");


// candidate
Route::get('/admin/dashboard/candidates/download-csv', function () {
    return Excel::download(new CandidatesExport, 'candidates.csv');
})->name("admin.candidate.download-csv");
Route::get('/admin/dashboard/candidates/add-bulk', 'Admin\CandidateController@bulk')->name("admin.candidate.bulk");
Route::post('/admin/dashboard/candidates/add_bulk/upload', 'Admin\CandidateController@uploadBulk')->name("admin.candidate.upload-bulk");

Route::get('/admin/dashboard/candidates', 'Admin\CandidateController@index')->name("admin.candidate.index");
Route::get('/admin/dashboard/candidates/add', 'Admin\CandidateController@create')->name("admin.candidate.create");
Route::get('/admin/dashboard/candidates/{candidate}/edit', 'Admin\CandidateController@edit')->name("admin.candidate.edit");
Route::post('/admin/dashboard/candidates', 'Admin\CandidateController@store')->name("admin.candidate.store");
Route::put('/admin/dashboard/candidates', 'Admin\CandidateController@update')->name("admin.candidate.update");
Route::get('/admin/dashboard/candidates/delete-all', 'Admin\CandidateController@deleteAll')->name("admin.candidate.delete-all");
Route::get('/admin/dashboard/candidates/{id}', 'Admin\CandidateController@delete')->name("admin.candidate.delete");
Route::post('/admin/dashboard/candidates/upload-image', 'Admin\CandidateController@uploadImage')->name("admin.candidate.upload-image");

// voter
Route::get('/admin/dashboard/voters/download-csv', function () {
    return Excel::download(new VotersExport, 'voters.csv');
})->name("admin.voter.download-csv");
Route::get('/admin/dashboard/voters/add-bulk', 'Admin\VoterController@bulk')->name("admin.voter.bulk");
Route::post('/admin/dashboard/voters/add_bulk/upload', 'Admin\VoterController@uploadBulk')->name("admin.voter.upload-bulk");


Route::get('/admin/dashboard/voters', 'Admin\VoterController@index');
Route::get('/admin/dashboard/voters/add', 'Admin\VoterController@create')->name("admin.voter.create");
Route::get('/admin/dashboard/voters/{voter}/edit', 'Admin\VoterController@edit')->name("admin.voter.edit");
Route::post('/admin/dashboard/voters', 'Admin\VoterController@store')->name("admin.voter.store");
Route::put('/admin/dashboard/voters', 'Admin\VoterController@update')->name("admin.voter.update");
Route::get('/admin/dashboard/voters/delete-all', 'Admin\VoterController@deleteAll')->name("admin.voter.delete-all");
Route::get('/admin/dashboard/voters/{id}', 'Admin\VoterController@delete')->name("admin.voter.delete");

// post
Route::get('/admin/dashboard/posts/download-csv', function () {
    return Excel::download(new PostsExport, 'posts.csv');
})->name("admin.post.download-csv");
Route::get('/admin/dashboard/posts/add-bulk', 'Admin\PostController@bulk')->name("admin.post.bulk");
Route::post('/admin/dashboard/posts/add-bulk/upload', 'Admin\PostController@uploadBulk')->name("admin.post.upload-bulk");

Route::get('/admin/dashboard/posts', 'Admin\PostController@index')->name("admin.post.index");
Route::get('/admin/dashboard/posts/add', 'Admin\PostController@create')->name("admin.post.create");
Route::get('/admin/dashboard/posts/{post}/edit', 'Admin\PostController@edit')->name("admin.post.edit");
Route::post('/admin/dashboard/posts', 'Admin\PostController@store')->name("admin.post.store");
Route::put('/admin/dashboard/posts', 'Admin\PostController@update')->name("admin.post.update");
Route::get('/admin/dashboard/posts/delete-all', 'Admin\PostController@deleteAll')->name("admin.post.delete-all");
Route::get('/admin/dashboard/posts/{id}', 'Admin\PostController@delete')->name("admin.post.delete");


// main-website
Route::get('/', "Website\LandPageController@index");
Route::post('/vote/store', "Website\VoteController@store")->name('website.vote.store');
//vote
Route::get('/vote', "Website\VoteController@index")->name("website.vote");

//login
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});
Route::get('/login', 'Auth\VoterLoginController@index')->name('voter.login');
Route::post('/login', 'Auth\VoterLoginController@login')->name('voter.login.submit');

// userLogout
Route::get('voters/logout', 'Auth\VoterLoginController@logout')->name('voter.logout');
Route::post('admins/logout', 'Auth\LoginController@userLogout')->name('admin.logout');
