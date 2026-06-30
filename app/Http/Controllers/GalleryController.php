<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST DATA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('galleries.index', compact('galleries'));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('galleries.create');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate(

            [

                'judul' => 'required|max:100',

                'kategori' => 'required',

                'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',

                'deskripsi' => 'nullable|max:500',

            ],

            [

                'judul.required' => 'Judul wajib diisi.',

                'judul.max' => 'Judul maksimal 100 karakter.',

                'kategori.required' => 'Kategori wajib dipilih.',

                'foto.required' => 'Foto wajib diupload.',

                'foto.image' => 'File harus berupa gambar.',

                'foto.mimes' => 'Format gambar harus JPG, JPEG atau PNG.',

                'foto.max' => 'Ukuran gambar maksimal 2 MB.',

            ]

        );

        $namaFoto = null;

        if ($request->hasFile('foto')) {

            $namaFoto = time() . '_' . $request->foto->getClientOriginalName();

            $request->foto->move(
                public_path('uploads/gallery'),
                $namaFoto
            );
        }

        Gallery::create([

            'judul' => $request->judul,

            'kategori' => $request->kategori,

            'foto' => $namaFoto,

            'deskripsi' => $request->deskripsi,

        ]);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('galleries.edit', compact('gallery'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE DATA
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate(

            [

                'judul' => 'required|max:100',

                'kategori' => 'required',

                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

                'deskripsi' => 'nullable|max:500',

            ],

            [

                'judul.required' => 'Judul wajib diisi.',

                'judul.max' => 'Judul maksimal 100 karakter.',

                'kategori.required' => 'Kategori wajib dipilih.',

                'foto.image' => 'File harus berupa gambar.',

                'foto.mimes' => 'Format gambar harus JPG, JPEG atau PNG.',

                'foto.max' => 'Ukuran gambar maksimal 2 MB.',

            ]

        );

        $data = [

            'judul' => $request->judul,

            'kategori' => $request->kategori,

            'deskripsi' => $request->deskripsi,

        ];

        if ($request->hasFile('foto')) {

            if (
                $gallery->foto &&
                file_exists(public_path('uploads/gallery/' . $gallery->foto))
            ) {

                unlink(public_path('uploads/gallery/' . $gallery->foto));
            }

            $namaFoto = time() . '_' . $request->foto->getClientOriginalName();

            $request->foto->move(

                public_path('uploads/gallery'),

                $namaFoto

            );

            $data['foto'] = $namaFoto;
        }

        $gallery->update($data);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS DATA
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (
            $gallery->foto &&
            file_exists(public_path('uploads/gallery/' . $gallery->foto))
        ) {

            unlink(public_path('uploads/gallery/' . $gallery->foto));
        }

        $gallery->delete();

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}