<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= DB::table('users')->get();
        return view('pengguna.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|min:6|unique:users',
            'nama' => 'required',
            'no_telf' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'loker' => 'required',
            'FM' => 'required',
            'role' => 'required'
        ]);

        $data = new User();
        $data->email = $request->email;
        $data->password = bcrypt('000000');
        $data->nama = $request->nama;
        $data->no_telf = $request->no_telf;
        $data->loker = $request->loker;
        $data->FM = $request->FM;
        $data->role = $request->role;
        $data->save();

        return redirect('pengguna/index')->with('success','Kamu berhasil Register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        DB::table('users') -> where('email', $email) -> delete();
        // Alihkan ke halaman books
        return redirect('/pengguna/index') -> with('status', 'Data has been successfully deleted');
    }

    public function reset_password($email)
    {
        DB::table('users')
            ->where('email', $email)
            ->update(['password' => bcrypt('000000')]);

        return redirect('/pengguna/index') -> with('status', 'Password has been successfully reset');
    }

    public function page_ganti_password()
    {
        return view('pengguna.ganti_pass');

    }

    public function ganti_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6'
        ]);

        $email = Auth::user()->email;
        DB::table('users')
        ->where('email', $email)
        ->update(['password' => bcrypt($request->password) ]);

        return redirect('/pengguna/index') -> with('status', 'Password has been successfully changed');
    }
}
