<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Monitoring;
Use \Carbon\Carbon;
use View;

class DashboardController extends Controller
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
        #menghitung banyak user
        $users = User::all()->count();

        #menghitung banyak kunjungan per tahun
        $reportyear = Monitoring::whereYear(
            'created_at', '=', Carbon::now()->year
        )->count();

        #menghitung banyak kunjungan per bulan
        $reportmonth = Monitoring::whereYear('created_at', '=', Carbon::now()->year)
              ->whereMonth('created_at', '=', Carbon::now()->month)
              ->count();

        #menghitung banyak kunjungan per minggu
        $reportweek = DB::table('monitorings') 
        ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
        ->count();


        // $reportperweek=array();
        for ($i = 1; $i <= 12; $i++) {
           $perweek = DB::table('monitorings')
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', $i)
            ->count();

            $reportperweek[$i]=$perweek;
        }
        
        // dd(json_encode($reportperweek,JSON_NUMERIC_CHECK));
        // return view('dashboard', compact('users', 'reportyear', 'reportmonth', 'reportweek', 'reportperweek'));
        return view::make('dashboard')
        ->with(compact('users'))
        ->with(compact('reportyear'))
        ->with(compact('reportmonth'))
        ->with(compact('reportweek'))
        ->with(json_encode($reportperweek,JSON_NUMERIC_CHECK));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
