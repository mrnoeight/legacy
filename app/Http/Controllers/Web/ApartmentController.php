<?php

namespace App\Http\Controllers\Web;

// use App\Repository\PostRepositoryInterface;
// use App\Repository\ProleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\BlockInfo;

class ApartmentController extends Controller
{
    
    

    public function index()
    {
        $oPage = Homepage::where('page_name', 'thong-tin-can-ho')->first();
        $oMaster = BlockInfo::where('block_type', 'master_plan')->first();
        $oFloor6 = BlockInfo::where('block_type', 'floor6')->first();
        $oRoofs = BlockInfo::where('block_type', 'rooftop')->get();
        $oFloorA1 = BlockInfo::where('block_type', 'floorplanA')->get();
        $oFloorB1 = BlockInfo::where('block_type', 'floorplanB')->get();
        $oFloorC1 = BlockInfo::where('block_type', 'floorplanC')->get();
        $oText = BlockInfo::where('block_type', 'home_text')->get();

        $arrText = [];
        foreach ($oText as $text)
            $arrText[$text->block_name] = $text->head_title1;

        $floorA = $floorB = $floorC = new BlockInfo;

        foreach ($oRoofs as $roof) {
            if ($roof->id == 18)
                $floorC = $roof;
            else if ($roof->id == 19)
                $floorA = $roof;
            else if ($roof->id == 20)
                $floorB = $roof;
        }

        foreach ($oFloorA1 as $f)
            $oFloorA[] = $f;

        foreach ($oFloorB1 as $f)
            $oFloorB[] = $f;

        foreach ($oFloorC1 as $f)
            $oFloorC[] = $f;

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>' class=active', 'utilities'=>'', 'progress'=>'', 'gallery'=>'', 'news'=>'', 'lancaster'=>'', 'about'=>''];
        
        return view('web.apartment', compact('menu_active', 'oPage', 'oMaster', 'oFloor6', 'floorA', 'floorB', 'floorC', 'arrText', 'oFloorA', 'oFloorB', 'oFloorC'));
    }
}
