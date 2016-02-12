<?php

use App\SubIssue;

function getsubissuename($id){
    $subissuename = SubIssue::findorfail($id);
    return $subissuename->subissue_name;
}

