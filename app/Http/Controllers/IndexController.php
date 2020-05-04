<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Statistic;
use App\Visit;

class IndexController extends Controller
{
    public function showIndex()
    {
        $meta_title = 'Atsitiktinės kačių veislės!';
        return view('index', compact( 'meta_title' ));
    }


    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showId($id)
	{
        $cacheTime = 60;

        if ($id >= 1 && $id <= 1000000) {
            $content = Storage::get('cats.txt');
            $contentArray = explode("\n", $content);
            $rngCatsArray = array();

            if (!Cache::has($id)) {
                for($i=1; $i<=3; $i++) {
                    start:
                        $rngEntry = array_rand($contentArray, 1);
                        if ($contentArray[$rngEntry] != NULL && !in_array($contentArray[$rngEntry], $rngCatsArray)) {
                            array_push($rngCatsArray, trim($contentArray[$rngEntry], " \t\n\r\x0B"));
                        }
                        else goto start;
                }
                uasort($rngCatsArray, function ($a, $b) {
                    return $a <=> $b;
                });
                Cache::add($id, json_encode($rngCatsArray), $cacheTime);
            }

            //log countAll
            Statistic::increment('total_visits', 1);

            //log countN
            if (Visit::where('page_id', '=', $id)->exists()) {
                //update
                Visit::where('page_id', $id)->increment('count', 1);
            } else {
                //insert
                $visit = new Visit;
                $visit->page_id = $id;
                $visit->count = '1';
                $visit->save();
            }
            $countAll = Statistic::get('total_visits');
            $countN = Visit::where('page_id', $id)->get('count');
            
            //log visit data
            $data = [
                "datetime" => date('Y-m-d H:m:s'),
                "N" => $id,
                "Cats" => Cache::has($id) ? json_decode(Cache::get($id), true) : $rngCatsArray,
                "countAll" => $countAll,
                "countN" => $countN
            ];
            //Log::channel('visitslog')->info(json_encode($data)); //write to default with laravel log class
            Storage::append('logs/visits.log', json_encode($data)); //write to storage dir
            
            //show result
            if(Cache::has($id)) {
                $results = json_decode(Cache::get($id), true);
            } else {
                $results = $rngCatsArray;
            }
    
            return view('index', compact( 'id','results', 'countAll', 'countN' ));
        }
        else {
            $errors = array('Galimi rezultatai tik nuo 1 iki 1000000');
            return view('index', compact( 'errors' ));
        }
    }

}
