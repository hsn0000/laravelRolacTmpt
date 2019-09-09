<?php

use App\Siswa;
use App\Guru;


function ranking10Besar ()
{
    $siswa = Siswa::all();
    $siswa->map(function($s)
    {
         $s->rataRataNilai = $s->rataRataNilai();
         return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(10);
    return $siswa;
}

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}


