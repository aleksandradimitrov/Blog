<?php

use MailchimpMarketing\ApiClient;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/newsletter', function () {

    request()->validate(['email' => 'required|email']);

    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us11'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('a1d8e49862', [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);
    } catch (\Exception $e) {
        \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }

    // $response = $mailchimp->ping->get();
    // ddd($response);

    return redirect('/')->with('success', 'You are now signed up for our newsletter!');
});


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/home', [PostController::class, 'index']);
Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('authors/{author:username}', function (User $author) {
    return view('author', [
        'posts' => $author->posts
    ]);
})->name('author');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
