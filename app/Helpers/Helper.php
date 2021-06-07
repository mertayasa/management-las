<?php

use Collective\Html\FormFacade;
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

function getProgressPercentage($progress){
    switch($progress){
        case 0:
            return '20';
        break;
        case 1:
            return '40';
        break;
        case 2:
            return '60';
        break;
        case 3:
            return '80';
        break;
        case 4:
            return '100';
        break;
    }
}

function formatPrice($value){
    return 'Rp '. number_format($value,0,',','.');
}

function isApproved($project){
    if(Auth::user()->level == 0){
        switch($project->approved){
            case 0 :
                return '<span class="badge badge-warning">Belum Disetujui</span>';
            break;
            case 1 :
                return '<span class="badge badge-success">Disetujui</span>';
            break;
            case 2 :
                return '<span class="badge badge-danger">Ditolak</span>';
            break;
        }
    }else{
        return FormFacade::select('type', [0 => 'Belum Disetujui', 1 => 'Disetujui', 2 => 'Ditolak'], $project->approved, ['id' => 'projectApproved', 'onchange' => 'updateApproved(this.value, '. $project->id .')', 'class' => 'form-control']);
    }
}