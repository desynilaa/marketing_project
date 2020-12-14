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

        return view::make('dashboard')
        ->with(compact('users'))
        ->with(compact('reportyear'))
        ->with(compact('reportmonth'))
        ->with(compact('reportweek'));
        // ->with(compact('reportperweek'));
    }

    public function chart()
    {
        // $bulan=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        // dd($bulan);
        $reportperweek=array();
        for ($i = 1; $i <= 12; $i++) {
           $data = DB::table('monitorings')
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', $i)
            ->count();

            // array_push($reportperweek, (string)$data);
            array_push($reportperweek, $data);
        }
        // $reportperweek = json_encode($reportperweek);
        // dd(gettype($reportperweek));
        $response['labels']=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $response['data']=['0','0','0','0','0','0','0','0','0','0','2','3'];
        return response()->json($response);
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
