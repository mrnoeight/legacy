<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\BlockInfo;

class LancasterController extends Controller
{
    

    public function index()
    {
        $oPage = Homepage::where('page_name', 'lancaster-by-trung-thuy')->first();
        $oPCon = Homepage::where('page_name', 'consultant-image')->first();
        $oMaster = BlockInfo::where('block_type', 'master_gallery')->orderBy('order_id')->get();  
        $oBasic = BlockInfo::where('block_type', 'basic_service')->orderBy('order_id')->get();        
        $oEnhance = BlockInfo::where('block_type', 'enhance_service')->orderBy('order_id')->get();        
        $oButler = BlockInfo::where('block_type', 'butler_service')->orderBy('order_id')->get(); 
        $oCards = BlockInfo::where('block_type', 'member_card')->get();     
        $oConsultants = BlockInfo::where('block_type', 'consultant')->orderBy('order_id')->get();
        $oText = BlockInfo::where('block_type', 'lancaster_text')->get();

        $arrText = [];
        $arrSecDisables = [];
        foreach ($oText as $text) {
            $arrText[$text->block_name] = $text->head_title1;
            if ($text->enabled == 1)
                $arrSecDisables[] = $text->block_name;
        }
            
        
        $goldCard = $diamondCard = $platinumCard = new BlockInfo;
        foreach ($oCards as $card) {
            if (!isset($platinumCard->id))
                $platinumCard = $card;
            else if (!isset($diamondCard->id))
                $diamondCard = $card;
            else
                $goldCard = $card;
        }
        $i=0;
        $arrConsultants = [];
        foreach ($oConsultants as $con) {
            if (!isset($arrConsultants[$i]) || count($arrConsultants[$i]) < 2) 
                $arrConsultants[$i][] = $con;
            else {
                $i++;
                $arrConsultants[$i][] = $con;
            }
                
        }

        //print_r($arrSecDisables);

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>'', 'utilities'=>'', 'progress'=>'', 'gallery'=>'', 'news'=>'', 'lancaster'=>' class=active', 'about'=>''];
        
        return view('web.lancaster', compact('menu_active', 'oPage', 'oMaster', 'oBasic', 'oEnhance', 'oButler', 'goldCard', 'diamondCard', 'platinumCard', 'arrConsultants', 'arrText', 'oPCon', 'arrSecDisables'));
    }
}
