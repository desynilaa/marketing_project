<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Auth;
use App\Models\Monitoring;

class MonitoringController extends Controller
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
        $email = Auth::user()->email;
        $role =  DB::table('users')->where('email', $email)->value('role');
        if ($role == 'administrator') {
            $monitorings = DB::table('monitorings')->get();
        }elseif ($role == 'user') {
            $monitorings = DB::table('monitorings')->where('username', $email)->get();
        }
        // $monitorings= DB::table('monitorings')->get();
        return view('monitoring.index', ['monitorings' => $monitorings]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitoring.input');
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
            'username' => 'required',
            'kategori_tenant' => 'required',
            'agenda_visit' => 'required',
            'nama_tenant' => 'required',
            'perusahaan_tenant' => 'required',
            'alamat_tenant' => 'required',
            'jabatan_tenant' => 'required',
            'no_telp_tenant' => 'required|min:10',
            'email_tenant' => 'required|min:9|email',
            'jabatan_pemegang_kebijakan' => 'required',
            'nama_pemegang_kebijakan' => 'required',
            'minat_produk' => 'required',
            'detail_minat_produk' => 'required',
            'dokumentasi' => 'required',
            'foto_dokumentasi' => 'required',
            'cttn_peluang' => 'required',
            'cttn_estimasi_revenue' => 'required',
            'cttn_timeline' => 'required',
            'cttn_permintaan_tenant' => 'required'
        ]);

        $data = new Monitoring();
        $data->username = $request->username;
        $data->kategori_tenant = $request->kategori_tenant;
        $data->agenda_visit = $request->agenda_visit;
        $data->nama_tenant = $request->nama_tenant;
        $data->perusahaan_tenant = $request->perusahaan_tenant;
        $data->alamat_tenant = $request->alamat_tenant;
        $data->jabatan_tenant = $request->jabatan_tenant;

        $data->no_telp_tenant = $request->no_telp_tenant;
        $data->email_tenant = $request->email_tenant;
        $data->jabatan_pemegang_kebijakan = $request->jabatan_pemegang_kebijakan;
        $data->nama_pemegang_kebijakan = $request->nama_pemegang_kebijakan;
        $data->minat_produk = $request->minat_produk;
        $data->detail_minat_produk = $request->detail_minat_produk;
        $data->dokumentasi = $request->dokumentasi;
        $data->foto_dokumentasi = $request->foto_dokumentasi;
        $data->cttn_peluang = $request->cttn_peluang;

        $data->cttn_estimasi_revenue = $request->cttn_estimasi_revenue;
        $data->cttn_timeline = $request->cttn_timeline;
        $data->cttn_permintaan_tenant = $request->cttn_permintaan_tenant;
        $data->save();

        return redirect('monitoring/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monitorings= DB::table('monitorings')->where('id', $id)->first();
        return view('monitoring.detail', compact('monitorings'));
// return view('ecommerce.show', compact('product'));
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
    public function destroy($id)
    {
        //
    }
}
