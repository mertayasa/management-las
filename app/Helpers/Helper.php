<?php

use Illuminate\Support\Facades\Auth;

function checkUserLevel(){
    $user_level = Auth::user()->level == 0 ? 'admin' : 'owner';
    return $user_level;
}

function showErrorMessage($errors, $field){
    return '<div class="invalid-feedback d-block">'. $errors->first($field) .'</div>';
}