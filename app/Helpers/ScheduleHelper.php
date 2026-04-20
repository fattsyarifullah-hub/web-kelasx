<?php

namespace App\Helpers;

class ScheduleHelper
{
    public static function getPiketNames(): array
    {
        return [
            'Abbiyadsjach Nobel Fibrayir',
            'Abian Pranata',
            'Ahmad Asmalul Faiz',
            'Bariq Ainul Fikri',
            'Algo Athallah Hayatuna',
            'Alifandra Moamar Farizy',
            'Ahmad Muzakki',
        ];
    }

    public static function getJadwalTambahan(): array
    {
        return [
            [
                'time' => '13.00 - 14.20',
                'title' => 'MATEMATIKA / BAHASA INGGRIS / INFORMATIKA / ORIENTASI PPLG / SENI BUDAYA',
            ],
            [
                'time' => '14.20 - 15.40',
                'title' => 'IPA / PENDIDIKAN AGAMA / PDN PANCASILA / MATEMATIKA / PEMROG. TERSTRUKTUR',
            ],
            [
                'time' => '16.00 - 16.40',
                'title' => 'JAM TAMBAHAN SOFTSKILL / GO TO HOME',
            ],
        ];
    }
}
