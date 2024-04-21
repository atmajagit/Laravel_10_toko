<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Distributor;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';
    protected $fillable = ['id_distributor','id_buku', 'jumlah_beli', 'tanggal_beli'];

    public static function getId(){
        return $getId = DB::table('pembelian')->orderBy('id_pembelian')->take(2)->get();

    }

    public function distributors()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function pembelians()
    {
        return $this->belongsToMany(Pembelian::class);
    }
}
