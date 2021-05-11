<?php

use Illuminate\Support\Facades\Auth;

function checkUserLevel(){
    $user_level = Auth::user()->level == 0 ? 'admin' : 'owner';
    return $user_level;
}