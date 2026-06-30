<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(

        [

            'nama'=>'required|max:100',

            'email'=>'required|email',

            'subjek'=>'required|max:150',

            'pesan'=>'required'

        ],

        [

            'nama.required'=>'Nama wajib diisi.',

            'email.required'=>'Email wajib diisi.',

            'email.email'=>'Format email tidak valid.',

            'subjek.required'=>'Subjek wajib diisi.',

            'pesan.required'=>'Pesan wajib diisi.'

        ]);

        Message::create([

            'nama'=>$request->nama,

            'email'=>$request->email,

            'subjek'=>$request->subjek,

            'pesan'=>$request->pesan

        ]);

        return redirect()
    ->route('contact')
    ->with('success', 'Terima kasih, pesan Anda berhasil dikirim.');
    }
}