<?php


use App\Siswa;
use App\Guru;

function ranking5Besar(){
    $siswa = Siswa::All();
    $siswa->map(function($s){
        $s->rataRataNilai = $s->rataRataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);

    return $siswa;
}

function jumlahSiswa(){
    return Siswa::count();
}

function jumlahGuru(){
    return Guru::count();
}