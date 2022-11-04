<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Homepage;
use App\Models\BlockInfo;
use Mail;

class HomeController extends Controller
{

    public function index()
    {
        $oPage = Homepage::where('page_name', 'trang-chu')->first();
        $oSliders = BlockInfo::where('block_type', 'slider_home')->get();
        $oGalleries = BlockInfo::where('block_type', 'gallery_home')->get();
        $oPartners = BlockInfo::where('block_type', 'partner')->get();
        $oLocations = BlockInfo::where('block_type', 'location')->get();
        $oText = BlockInfo::where('block_type', 'home_text')->get();
        
        $arrText = [];
        foreach ($oText as $text)
            $arrText[$text->block_name] = $text->head_title1;
        
        $menu_active = ['home'=>' class=active', 'location'=>'', 'apartment'=>'', 'utilities'=>'', 'progress'=>'', 'gallery'=>'', 'news'=>'', 'lancaster'=>'', 'about'=>''];
        
        return view('web.index', compact('menu_active', 'oPage', 'oSliders', 'oGalleries', 'oPartners', 'oLocations', 'arrText'));
    }

    public function changeLanguage(Request $request)
    {
        $lang = $request->language;
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }
        Session::put('language', $language);
        return redirect()->back();
    }

    public function getApartmentInfo() 
    {
        $apartment = BlockInfo::where('block_name', $_POST['code'])->first();
        $oText = BlockInfo::where('block_type', 'apartment_text')->get();

        $arrText = [];
        foreach ($oText as $text)
            $arrText[$text->block_name] = $text->head_title1;
//print_r($arrText);exit;
        $data = view('web.apartment_info', compact('apartment', 'arrText'))->render();

        return \response()->json(['status' => 1, 
                                    'data' => $data,
                                ]);
    }

    function sendEmail(Request $request) 
    {
        $data = $request->all();
        Mail::send('mail', $data, function($message) {
            $message->to('mrnoeight@gmail.com')->subject
                ('Legacy Lancaster Registration');
            $message->from('ttgholding.vn@gmail.com','Info'); //ttgholding.vn@gmail.com
        });

        return \response()->json(['status'=>1, 
                                        'data'=>'Good!', 
                                        'message'=>'Email sent!',
                                    ]);
    }
}
