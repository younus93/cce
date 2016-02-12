<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\EnquiryUser;
use App\MainIssue;
use App\UserEnquries;
use App\SubIssue;
use App\Helpers;


class Helper
{
    public static function getUserData($id,$type)
    {
        $enquiry_user = EnquiryUser::findOrFail($id);
        if($type == 1)
            return ($enquiry_user->name != "" ? $enquiry_user->name : 'Not Set' );
        return $enquiry_user->phone;
    }
    public static function getuser($id,$type){
        $enqiury_user = EnquiryUser::find($id);
        if($type ==1) {
            return ($enqiury_user->name != "" ? $enqiury_user->name : 'Not set');
        }else{
            return ($enqiury_user->phone);

        }
    }
    function getsubissuename($id){
        $subissuename = SubIssue::findorfail($id);
        return $subissuename->subissue_name;
    }
    public function getsubissue(){
        $subissue = SubIssue::All();
        return $subissue;
    }
    public function getmainissue(){
        $mainissue = MainIssue::All();
        return $mainissue;
    }


}