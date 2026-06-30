<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRoom = HotelRoom::count();

        $availableRoom = HotelRoom::where('status', 'Tersedia')->count();

        $occupiedRoom = HotelRoom::where('status', 'Terisi')->count();

        $totalMessage = Message::count();

        $latestMessages = Message::latest()
                            ->take(5)
                            ->get();

        return view('dashboard.index', compact(

            'totalRoom',
            'availableRoom',
            'occupiedRoom',
            'totalMessage',
            'latestMessages'

    ));
}
}