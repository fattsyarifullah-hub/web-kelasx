<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\photo_piket;
use App\Helpers\ScheduleHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PiketController extends Controller
{
    public function index() 
    {   
        $photo = photo_piket::where('expired_at', '>', Carbon::now())->first();
        $piketNames = ScheduleHelper::getPiketNames();
        return view('piket.index', compact('photo', 'piketNames'));
    }
    
    public function create() {
        return View('piket.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg|max:2048'
        ]);
        
        $path = $request->file('photo');
        $path->storeAs('public/photo', $path->hashName());

        $expired_at = Carbon::now()->addDay();

        photo_piket::Create([
            'photo' => $path->hashName(),
            'expired_at' => $expired_at,
        ]);

        return redirect()->route('piket.index')->with('success', 'Data berhasil disimpan.');
    }
}
