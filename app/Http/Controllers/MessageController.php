<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Daftar pesan
     */
    public function index()
    {
        $messages = Message::latest()->get();

        return view('messages.index', compact('messages'));
    }

    /**
     * Detail pesan
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);

        // Otomatis ubah status menjadi Sudah Dibaca
        if ($message->status == 'Belum Dibaca') {

            $message->update([
                'status' => 'Sudah Dibaca'
            ]);
        }

        return view('messages.show', compact('message'));
    }

    /**
     * Hapus pesan
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return redirect()
            ->route('messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}