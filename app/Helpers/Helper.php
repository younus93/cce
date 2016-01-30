<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\EnquiryUser;

class Helper
{
    public static function getUserData($id,$type)
    {
        $enquiry_user = EnquiryUser::findOrFail($id);
        if($type == 1)
            return ($enquiry_user->name != "" ? $enquiry_user->name : 'Not Set' );
        return $enquiry_user->phone;
    }
}