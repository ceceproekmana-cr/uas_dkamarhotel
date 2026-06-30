<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $table = 'hotel_rooms';

protected $fillable = [

    'id_kamar',

    'nomor_kamar',

    'nama_kamar',

    'tipe_kamar',

    'harga_per_malam',

    'fasilitas',

    'kapasitas_orang',

    'foto',

    'status',

    'deskripsi',

];
}