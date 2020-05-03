<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    public function showLog()
    {
        $content = Storage::get('logs/visits.log');
        $contentArray = explode("\n", $content);
        return view('log', compact( 'contentArray' ));
    }
}
