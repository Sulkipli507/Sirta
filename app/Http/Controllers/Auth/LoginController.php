<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function attemptLogin(Request $request)
    {
        // Lakukan pengecekan login seperti biasa
        $credentials = $this->credentials($request);

        // Tambahkan pengecekan status pengguna di sini
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Jika pengguna ditemukan, cek statusnya
            if ($user->status === 'Active' && $this->guard()->attempt($credentials, $request->filled('remember'))) {
                return true;
            } elseif ($user->status !== 'Active') {
                throw ValidationException::withMessages([
                    $this->username() => ['Akun Anda belum aktif, Silakan hubungi admin'],
                ]);
            }
        } else {
            // Jika pengguna tidak ditemukan, berikan pesan bahwa mereka belum terdaftar
            throw ValidationException::withMessages([
                $this->username() => ['Akun Anda belum terdaftar'],
            ]);
        }
        
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
