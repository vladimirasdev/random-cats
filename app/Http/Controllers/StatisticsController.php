<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistic;
use App\Visit;

class StatisticsController extends Controller
{
    public function showStats()
    {
        $countAll = Statistic::get()->sum('total_visits');
        $All_N = Visit::all();
       
        return view('statistics', compact( 'countAll', 'All_N' ));
    }
}
