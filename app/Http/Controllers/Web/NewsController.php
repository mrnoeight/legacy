<?php

namespace App\Http\Controllers\Web;

// use App\Repository\PostRepositoryInterface;
// use App\Repository\ProleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\BlockInfo;

class NewsController extends Controller
{

    

    public function index()
    {
        $oPage = Homepage::where('page_name', 'tin-tuc')->where('enabled',0)->firstOrFail();
        $oNews = BlockInfo::where('block_type', 'news')->orderBy('block_date', 'DESC')->get();

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>'', 'utilities'=>'', 'progress'=>'', 'gallery'=>'', 'news'=>' class=active', 'lancaster'=>'', 'about'=>''];
        
        return view('web.news', compact('menu_active', 'oPage', 'oNews'));
    }

    public function detail($id)
    {
        $id = intval($id);

        $news = BlockInfo::findOrFail($id);
        $news->head_desc1 = tk1StripStyle($news->head_desc1);
        $news->head_desc1 = str_replace("<p><br></p>", "", $news->head_desc1);
        
        $oNews = BlockInfo::where('block_type', 'news')->where('id', '<>', $id)->orderBy('block_date', 'DESC')->get()->take(3);

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>'', 'utilities'=>'', 'progress'=>'', 'gallery'=>'', 'news'=>' class=active', 'lancaster'=>'', 'about'=>''];
        
        return view('web.news_detail', compact('menu_active', 'news', 'oNews'));
    }
}
