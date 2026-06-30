<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $featuredRooms = HotelRoom::where('status', 'Tersedia')
            ->orderByDesc('harga_per_malam')
            ->take(3)
            ->get();

        return view('home.index', compact('featuredRooms'));
    }

    public function about()
    {
        return view('about.index');
    }

    public function rooms()
    {
        $rooms = HotelRoom::orderBy('harga_per_malam', 'asc')->paginate(6);

        return view('rooms.index', compact('rooms'));
    }
    public function roomDetail($id)
    {
        $room = HotelRoom::findOrFail($id);

    return view('rooms.show', compact('room'));
    }

  public function gallery()
{
    $galleries = Gallery::latest()->paginate(9);

    return view('gallery.index', compact('galleries'));
}

    public function facilities()
    {
        return view('facilities.index');
    }

    public function contact()
    {
        return view('contact.index');
    }
}