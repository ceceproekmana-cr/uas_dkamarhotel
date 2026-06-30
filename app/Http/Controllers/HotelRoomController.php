<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HotelRoomController extends Controller
{
    /**
     * Menampilkan daftar kamar.
     */
    public function index()
    {
        $hotelRooms = HotelRoom::latest()->get();

        return view('hotel_rooms.index', compact('hotelRooms'));
    }

    /**
     * Form tambah kamar.
     */
    public function create()
    {
        return view('hotel_rooms.create');
    }

    /**
     * Simpan data kamar.
     */
    public function store(Request $request)
    {
        $request->validate(

            [
                'id_kamar'          => 'required|unique:hotel_rooms,id_kamar',
                'nomor_kamar'       => 'required',
                'nama_kamar'        => 'required',
                'tipe_kamar'        => 'required',
                'harga_per_malam'   => 'required|numeric|min:1',
                'fasilitas'         => 'required|string',
                'kapasitas_orang'   => 'required|integer|min:1',
                'status'            => 'required',
                'deskripsi'         => 'nullable',
                'foto'              => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],

           [
            'id_kamar.required' => 'ID Kamar wajib diisi.',
            'id_kamar.unique' => 'ID Kamar sudah digunakan.',

            'nomor_kamar.required' => 'Nomor Kamar wajib diisi.',

            'nama_kamar.required' => 'Nama Kamar wajib diisi.',

            'tipe_kamar.required' => 'Silakan pilih Tipe Kamar.',

            'harga_per_malam.required' => 'Harga per Malam wajib diisi.',
            'harga_per_malam.numeric' => 'Harga harus berupa angka.',
            'harga_per_malam.min' => 'Harga minimal Rp 1.',

            'fasilitas.required' => 'Fasilitas kamar wajib diisi.',
            'fasilitas.string' => 'Fasilitas kamar harus berupa teks.',

            'kapasitas_orang.required' => 'Kapasitas Orang wajib diisi.',
            'kapasitas_orang.integer' => 'Kapasitas harus berupa angka.',
            'kapasitas_orang.min' => 'Minimal kapasitas 1 orang.',

            'status.required' => 'Status kamar wajib dipilih.',

            'foto.required' => 'Foto kamar wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPG, JPEG atau PNG.',
            'foto.max' => 'Ukuran gambar maksimal 2 MB.',
            ]

        );

        $foto = null;

        if ($request->hasFile('foto')) {

            $namaFoto = time() . '_' . $request->foto->getClientOriginalName();

            $request->foto->move(
                public_path('uploads/hotel_rooms'),
                $namaFoto
            );

            $foto = $namaFoto;
        }

        HotelRoom::create([

            'id_kamar' => $request->id_kamar,
            'nomor_kamar' => $request->nomor_kamar,
            'nama_kamar' => $request->nama_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga_per_malam' => $request->harga_per_malam,
            'fasilitas' => $request->fasilitas,
            'kapasitas_orang' => $request->kapasitas_orang,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,

        ]);

        return redirect()
            ->route('hotel_rooms.index')
            ->with('success', 'Data kamar berhasil ditambahkan.');
    }

    /**
     * Form edit kamar.
     */
    public function edit($id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);

        return view('hotel_rooms.edit', compact('hotelRoom'));
    }

    /**
     * Update kamar.
     */
 public function update(Request $request, $id)
{
    $hotelRoom = HotelRoom::findOrFail($id);

    $request->validate(

        [
            'id_kamar' => 'required|unique:hotel_rooms,id_kamar,' . $hotelRoom->id,
            'nomor_kamar' => 'required',
            'nama_kamar' => 'required',
            'tipe_kamar' => 'required',
            'harga_per_malam' => 'required|numeric|min:1',
            'fasilitas' => 'required|string',
            'kapasitas_orang' => 'required|integer|min:1',
            'status' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ],

        [
            'id_kamar.required' => 'ID Kamar wajib diisi.',
            'id_kamar.unique' => 'ID Kamar sudah digunakan.',

            'nomor_kamar.required' => 'Nomor Kamar wajib diisi.',

            'nama_kamar.required' => 'Nama Kamar wajib diisi.',

            'tipe_kamar.required' => 'Silakan pilih Tipe Kamar.',

            'harga_per_malam.required' => 'Harga per Malam wajib diisi.',
            'harga_per_malam.numeric' => 'Harga harus berupa angka.',
            'harga_per_malam.min' => 'Harga minimal Rp 1.',

            'fasilitas.required' => 'Fasilitas kamar wajib diisi.',
            'fasilitas.string' => 'Fasilitas kamar harus berupa teks.',

            'kapasitas_orang.required' => 'Kapasitas Orang wajib diisi.',
            'kapasitas_orang.integer' => 'Kapasitas harus berupa angka.',
            'kapasitas_orang.min' => 'Minimal kapasitas 1 orang.',

            'status.required' => 'Status kamar wajib dipilih.',

            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPG, JPEG atau PNG.',
            'foto.max' => 'Ukuran gambar maksimal 2 MB.',
        ]

    );

    $data = $request->except('foto');

    if ($request->hasFile('foto')) {

        if (
            $hotelRoom->foto &&
            file_exists(public_path('uploads/hotel_rooms/' . $hotelRoom->foto))
        ) {
            unlink(public_path('uploads/hotel_rooms/' . $hotelRoom->foto));
        }

        $namaFoto = time() . '_' . $request->foto->getClientOriginalName();

        $request->foto->move(
            public_path('uploads/hotel_rooms'),
            $namaFoto
        );

        $data['foto'] = $namaFoto;
    }

    $hotelRoom->update($data);

    return redirect()
        ->route('hotel_rooms.index')
        ->with('success', 'Data kamar berhasil diperbarui.');
}

    /**
     * Hapus kamar.
     */
    public function destroy($id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);

        if (
            $hotelRoom->foto &&
            file_exists(public_path('uploads/hotel_rooms/' . $hotelRoom->foto))
        ) {
            unlink(public_path('uploads/hotel_rooms/' . $hotelRoom->foto));
        }

        $hotelRoom->delete();

        return redirect()
            ->route('hotel_rooms.index')
            ->with('success', 'Data kamar berhasil dihapus.');
    }

    /**
     * Export PDF.
     */
    public function exportPDF()
    {
        $hotelRooms = HotelRoom::orderBy('id')->get();

        $pdf = Pdf::loadView(
            'hotel_rooms.pdf',
            compact('hotelRooms')
        );

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('Laporan_Data_Kamar_Hotel.pdf');
    }
}