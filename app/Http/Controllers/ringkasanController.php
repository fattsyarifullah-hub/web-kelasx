<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengumuman_crud;
use App\Models\photo_piket;
use App\Models\siswa_search;
use App\Helpers\ScheduleHelper;
use Carbon\Carbon;

class ringkasanController extends Controller
{
    public function index() {
        $pengumuman = pengumuman_crud::latest()->take(1)->get();
        $siswa = siswa_search::take(3)->get();
        $photo = photo_piket::where('expired_at', '>', Carbon::now())->latest()->take(1)->get();

        $totalSiswa = siswa_search::count();
        $totalPengumuman = pengumuman_crud::count();
        $activePiket = photo_piket::where('expired_at', '>', Carbon::now())->count();

        $piketNames = ScheduleHelper::getPiketNames();
        $schedulePreview = ScheduleHelper::getJadwalTambahan();

        return view('ringkasan.index', compact(
            'pengumuman',
            'siswa',
            'photo',
            'totalSiswa',
            'totalPengumuman',
            'activePiket',
            'piketNames',
            'schedulePreview'
        ));
    }
}
