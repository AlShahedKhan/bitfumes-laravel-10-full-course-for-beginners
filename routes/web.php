<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    // return view('welcome');
    // fetch all users
    // $users = DB::select("select * from users");
    // $users = DB::table('users')->find(1);
    $users = User::find(12);

    // Insert user
    // $user = DB::insert('insert into users (name,email,password) values (?, ?, ?)', 
    // ['shahed', 'shahed@gmail.com','12345']);
    // $user = DB::table('users')->insert([
    //     'name' => 'shahed',
    //     'email' => 'shahed@gmail.com',
    //     'password' => '12345'
    // ]);
    // $user = User::create([
    //     'name' => 'shahed',
    //     'email' => 'shahed2@gmail.com',
    //     'password' => '12345'
    // ]);

    // Update user
    // $user = DB::update("update users set email = ? where id = ?",['shahed@gmail.com', 2]);
    // $user = DB::table('users')->where('id',7)->update([
    //     'email' => 'abc@gmail.com'
    // ]);
    // $user = User::find(8);
    // $user -> update([
    //     'email' => 'shahed@gmail.com'
    // ]);

    // delete user
    // $user = DB::delete("delete from users where id = 2");
    // $user = DB::table('users')->where('id',7)->delete();
    // $user = User::find(9);
    // $user -> delete();

    dd($users->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
