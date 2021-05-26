<?php

use Illuminate\Support\Facades\Auth;

function checkUserLevel(){
    $user_level = Auth::user()->level == 0 ? 'admin' : 'owner';
    return $user_level;
}

function showErrorMessage($errors, $field){
    return '<div class="invalid-feedback d-block">'. $errors->first($field) .'</div>';
}

function getProgress($progress){
    switch($progress){
        case 0:
            return 'Proyek Baru';
        break;
        case 1:
            return 'Pembelian Bahan';
        break;
        case 2:
            return 'Pengerjaan';
        break;
        case 3:
            return 'Pemasangan';
        break;
        case 4:
            return 'Selesai';
        break;
    }
    if($progress == 0){
        return 'Proyek Baru';
    }
}

function formatPrice($value){
    return 'Rp '. number_format($value,0,',','.');
}