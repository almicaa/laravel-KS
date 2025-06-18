<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth.login');
})->name('login.form');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/clanovi');
    }
    return back()->withErrors(['email' => 'Pogrešni podaci za prijavu.']);
})->name('login');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect('/clanovi');
})->name('register');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/clanovi', [MemberController::class, 'index'])->name('members.index');
Route::get('/clanovi/novi', [MemberController::class, 'create'])->name('members.create');
Route::post('/clanovi', [MemberController::class, 'store'])->name('members.store');
Route::delete('/clanovi/{id}', [MemberController::class, 'destroy'])->name('members.destroy');
