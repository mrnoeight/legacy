<?php

namespace App\Http\Controllers\Web;

// use App\Repository\PostRepositoryInterface;
// use App\Repository\ProleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\BlockInfo;
use Carbon\Carbon;

class ProgressController extends Controller
{
    

    public function index()
    {
        $oPage = Homepage::where('page_name', 'tien-do')->first();
        $oProgress = BlockInfo::where('block_type', 'progress')->orderBy('block_date','DESC')->get();
        $arrProgress = [];

        foreach ($oProgress as $progress)
        {
            $date = new Carbon($progress->block_date);
            $arrProgress[$date->year][] = $progress;
        }

        //print_r($arrProgress);

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>'', 'utilities'=>'', 'progress'=>' class=active', 'gallery'=>'', 'news'=>'', 'lancaster'=>'', 'about'=>''];
        
        return view('web.progress', compact('menu_active', 'oPage', 'arrProgress'));
    }
}
