<?php

namespace App\Http\Controllers\Web;

// use App\Repository\PostRepositoryInterface;
// use App\Repository\ProleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\BlockInfo;

class GalleryController extends Controller
{
    

    public function index()
    {
        $oPage = Homepage::where('page_name', 'thu-vien')->first();
        $oVideos = BlockInfo::where('block_type', 'video')->get();
        $oPhotos = BlockInfo::where('block_type', 'gallery_photo')->get();

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>'', 'utilities'=>'', 'progress'=>'', 'gallery'=>' class=active', 'news'=>'', 'lancaster'=>'', 'about'=>''];
        
        return view('web.gallery', compact('menu_active', 'oPage', 'oVideos', 'oPhotos'));
    }
}
