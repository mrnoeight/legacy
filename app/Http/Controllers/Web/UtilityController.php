<?php

namespace App\Http\Controllers\Web;

// use App\Repository\PostRepositoryInterface;
// use App\Repository\ProleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\BlockInfo;

class UtilityController extends Controller
{
    
    

    public function index()
    {
        $oPage = Homepage::where('page_name', 'tien-ich')->where('enabled',0)->firstOrFail();
        $oSliders = BlockInfo::where('block_type', 'slider_facilities')->orderBy('order_id')->get();  
        $oMidSliders = BlockInfo::where('block_type', 'slider_facilities2')->orderBy('order_id')->get();        
        $healths = BlockInfo::where('block_type', 'health_utilities')->orderBy('order_id')->get();        
        $entertainments = BlockInfo::where('block_type', 'entertainment')->orderBy('order_id')->get(); 
        $business = BlockInfo::where('block_type', 'business')->get();     
        // $pool = BlockInfo::where('block_type', 'f_pool')->get();
        // $gym = BlockInfo::where('block_type', 'f_gym')->get();
        // $sauna = BlockInfo::where('block_type', 'f_sauna')->get();
        // $playground = BlockInfo::where('block_type', 'f_playground')->get();
        // $yoga = BlockInfo::where('block_type', 'f_yoga')->get();
        // $park = BlockInfo::where('block_type', 'f_park')->get();

        $arrSubServices = [];

        foreach ($healths as $s) {
            if ($s->block_name != '') {
                $subS = BlockInfo::where('block_type', 'f_'.$s->block_name)->orderBy('order_id')->get();
                $arrSubServices[$s->block_name] = $subS;
            }
        }

        foreach ($entertainments as $s) {
            if ($s->block_name != '') {
                $subS = BlockInfo::where('block_type', 'f_'.$s->block_name)->orderBy('order_id')->get();
                $arrSubServices[$s->block_name] = $subS;
            }
        }

        foreach ($business as $s) {
            if ($s->block_name != '') {
                $subS = BlockInfo::where('block_type', 'f_'.$s->block_name)->orderBy('order_id')->get();
                $arrSubServices[$s->block_name] = $subS;
            }
        }
        // $restaurant = BlockInfo::where('block_type', 'e_restaurant')->get();
        // $bbq = BlockInfo::where('block_type', 'e_bbq')->get();
        // $golf = BlockInfo::where('block_type', 'e_golf')->get();
        // $lounge = BlockInfo::where('block_type', 'b_lounge')->get();
        // $work = BlockInfo::where('block_type', 'b_work')->get();

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>'', 'utilities'=>' class=active', 'progress'=>'', 'gallery'=>'', 'news'=>'', 'lancaster'=>'', 'about'=>''];
        
        return view('web.tienich', compact('menu_active', 'oPage', 'oMidSliders', 'oSliders', 'healths', 'entertainments', 'business', 'arrSubServices'));
    }
}
