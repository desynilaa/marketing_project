<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitorings= DB::table('monitorings')->get();
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
            'waktu_kunjungan' => 'required',
            'tujuan_kunjungan' => 'required',
            'keterangan' => 'required'
        ]);

        $query = DB::table('monitorings')->insert([
            'username' => $request->input('username'),
            'waktu_kunjungan' => $request->input('waktu_kunjungan'),
            'tujuan_kunjungan' => $request->input('tujuan_kunjungan'),
            'keterangan' => $request->input('keterangan')
        ]);
        if($query){
            return redirect('monitoring/index');
        }else{
            return back()->with('fail', 'Something went wrong!');
        }
        
        // return $request->input();
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
    public function destroy($id)
    {
        //
    }
}