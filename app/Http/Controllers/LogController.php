<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    public function showLog()
    {
        $file = 'logs/visits.log';
        if (Storage::exists($file)) {
            $content = Storage::get('logs/visits.log');
            $contentArray = explode("\n", $content);
            /*
            usort($contentArray, function($a, $b) {
                return $a <=> $b;
            });
            */
        } 
        else {
            $contentArray = ['Nėra duomenų'];
        }
       
        return view('log', compact( 'contentArray' ));
    }
}
