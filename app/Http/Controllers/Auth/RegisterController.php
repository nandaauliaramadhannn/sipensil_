<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function create(array $data)
    {
        $ktp = $akte = $surat = null;

        if ($data['role'] === 'lembaga') {
            if (request()->hasFile('ktp') && request()->file('ktp')->isValid()) {
                $file = request()->file('ktp');
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::uuid() . '.' . $extension;
                $file->move(public_path('upload/pendaftaran/'), $fileName);
                $ktp = $fileName;
            } else {
                return back()->withInput()->withErrors(['ktp' => 'The KTP file upload failed.']);
            }

            if (request()->hasFile('akte') && request()->file('akte')->isValid()) {
                $file = request()->file('akte');
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::uuid() . '.' . $extension;
                $file->move(public_path('upload/pendaftaran/'), $fileName);
                $akte = $fileName;
            } else {
                return back()->withInput()->withErrors(['akte' => 'The Akte file upload failed.']);
            }

            if (request()->hasFile('surat') && request()->file('surat')->isValid()) {
                $file = request()->file('surat');
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::uuid() . '.' . $extension;
                $file->move(public_path('upload/pendaftaran/'), $fileName);
                $surat = $fileName;
            } else {
                return back()->withInput()->withErrors(['surat' => 'The Surat file upload failed.']);
            }
        }

        return User::create([
            'id' => Str::uuid(),
            'nama_lengkap' => $data['name'],
            'email' => $data['email'],
            'nama_operator' => $data['role'] === 'lembaga' ? $data['nama_operator'] : null,
            'nik' => $data['nik'],
            'no_wa' => $data['no_wa'],
            'alamat' => $data['alamat'],
            'ktp' => $ktp,
            'akte' => $akte,
            'surat' => $surat,
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
        Alert::toast('Registration successful. Please verify your email.', 'success');
        return redirect()->route('verification.verify');
    }
}
