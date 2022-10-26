<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Homepage;
use App\Models\BlockInfo;

if (!function_exists('tk1GetLogo')) {
    function tk1GetLogo()
    {
        $oLogo = Homepage::where('page_name', 'website')->first();

        return $oLogo;
    }
}

if (!function_exists('tk1GetFooterLogo')) {
    function tk1GetFooterLogo()
    {
        $oLogo = Homepage::where('page_name', 'footer')->first();

        return $oLogo;
    }
}

if (!function_exists('tk1GetMenu')) {
    function tk1GetMenu()
    {
        $oText = BlockInfo::where('block_type', 'menu_text')->get();

        $arrMenuText = [];
        foreach ($oText as $t) {
            $arrMenuText[$t->block_name] = $t->head_title1;
        }

        return $arrMenuText;
    }
}

if (!function_exists('tk1GetFooter')) {
    function tk1GetFooter()
    {
        $oText = BlockInfo::where('block_type', 'footer_text')->get();

        $arrMenuText = [];
        foreach ($oText as $t) {
            $arrMenuText[$t->block_name] = $t->head_title1;
        }

        return $arrMenuText;
    }
}

if (!function_exists('tk1FormatDateLocal')) {
    function tk1FormatDateLocal($date)
    {
        if ($date == '' || $date == null)
            return null;
        
        $language = Session::get('language', config('app.locale'));

        if ($language == 'en')
            return Carbon::parse($date)->format('F Y');
        else
            return 'Tháng '.Carbon::parse($date)->format('m - Y');
            
    }
}


if (!function_exists('tk1FormatDateDB')) {
    function tk1FormatDateDB($date, string $format = 'd/m/Y')
    {
        if ($date == '')
            return null;
        else
            return Carbon::createFromFormat($format, $date)->format('Y-m-d');
    }
}

if (!function_exists('tk1FormatDate')) {
    function tk1FormatDate($date)
    {
        //echo $date.' 11111';exit;
        if ($date == '' || $date == null)
            return null;
        else
            return Carbon::parse($date)->format('M, d Y');
    }
}

if (!function_exists('tk1FormatDate2')) {
    function tk1FormatDate2($date)
    {
        if ($date == '')
            return null;
        else
            return Carbon::parse($date)->format('d/m/Y');
    }
}

if (!function_exists('tk1BetweenDates')) {
    function tk1BetweenDates($from, $to)
    {
        //echo Carbon::parse($to);
        $diff_in_days = Carbon::parse($to)->diffInDays(Carbon::parse($from));

        //echo $diff_in_days;

        if ($diff_in_days > 1)
            return $diff_in_days. ' days';
        else if ($diff_in_days == 1)
            return $diff_in_days. ' day';
        else{
            $diff_in_hours = Carbon::parse($to)->diffInHours(Carbon::parse($from));
            return $diff_in_hours.' hours';
        }
            
    }
}

if (!function_exists('tk1AddDay')) {
    function tk1AddDay($date, $day)
    {
        return Carbon::parse($date)->addDays($day)->format('M, d Y');
    }
}

if (!function_exists('tk1DisplayTags')) {
    function tk1DisplayTags($arrTypes)
    {
        $arr = array();
        $class_tag = '';

        foreach ($arrTypes as $k=>$v) {

            switch ($v->tag_name) {
                case 'TVC' :
                    $arr[] = 'tvc';
                    break;
                case 'Commercial' :
                    $arr[] = 'com';
                    break;
                case 'Document' :
                        $arr[] = 'doc';
                        break;
                case 'Movie' :
                    $arr[] = 'film';
                    break;
                case 'Music Video' :
                    $arr[] = 'music';
                    break;
                case 'Commercial' :
                    $arr[] = 'commercial';
                    break;
            }
        }
        $class_tag = implode(', ', $arr);

        return $class_tag;
        
    }
}

if (!function_exists('tk1DisplayTypes')) {
    function tk1DisplayTypes($types)
    {
        $str_type = '';

        $arr = array();
        foreach ($types as $k=>$v) {
            $arr[] = $v->tag_name;
        }
        $str_type = implode(', ', $arr);
        
        return $str_type;
        
    }
}

if (!function_exists('tk1CheckClientProject')) {
    function tk1CheckClientProject($id)
    {
        $client = Auth::user();

        if ($client->company->id != $id)
            abort(403, "Cannot access to restricted page");
    }
}

if (!function_exists('tk1Slug')) {
    function tk1Slug($name)
    {
        $name = $name. ' '. rand(1000, 9999);

        return Str::slug($name, '-');
    }
}

if (!function_exists('tk1StatusColor')) {
    function tk1StatusColor($status)
    {
        if ($status == 'DECLINED')
            $color = 'red';
        else if ($status == 'ACCEPTED')
            $color = 'green';
        else
            $color = 'yellow';

        return $color;
    }
}

if (!function_exists('tk1StatusPostColor')) {
    function tk1StatusPostColor($status)
    {
        if ($status == 'pending' || $status == 'archive')
            $color = 'gray';
        else if ($status == 'completed')
            $color = 'green';
        else if ($status == 'deleted')
            $color = 'red';
        else
            $color = 'blue';

        return $color;
    }
}

if (!function_exists('tk1GetRound')) {
    function tk1GetRound($round, $lv)
    {
        if ($round >= $lv)
            return ' class="active"';
        else
            return '';
    }
}

if (!function_exists('tk1GetRoleStatus')) {
    function tk1GetRoleStatus($status)
    {
        if ($status == '')
            return 'none';
        else
            return $status;
    }
}

if (!function_exists('tk1GetRoleStatusColor')) {
    function tk1GetRoleStatusColor($status)
    {
        $status = strtolower($status);
        if ($status == 'requested' || $status == 'in contact' || $status == 'confirmed' || $status == 'waiting response')
            return 'blue';
        else if ($status == 'response')
            return 'green';
        else if ($status == 'declined')
            return 'red';
        else
            return 'gray';
    }
}

if (!function_exists('tk1GetMineType')) {
    function tk1GetMineType($data)
    {
        $arr = explode(';', $data);

        return str_replace('data:', '', $arr[0]);
    }
}