<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = ['judul_buku','penulis', 'penerbit', 'tahun_terbit', 'stok', 'harga_pokok', 'harga_jual'];

    public static $pk = 'id_buku';
    protected $table = 'buku';

    public function getWhere($keyword = '', $return_type = 'count', $limit = 0, $offset = 0)
    {
        $query = DB::table(self::$table . ' as x1')
            ->select('x1.id_buku', 'x1.judul_buku', 'x2.user_full_name AS post_author', 'x1.created_at', 'x1.is_deleted')
            ->leftJoin('users as x2', 'x1.post_author', '=', 'x2.id')
            ->where('x1.post_type', 'page');

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('x1.post_title', 'like', '%' . $keyword . '%')
                    ->orWhere('x2.user_full_name', 'like', '%' . $keyword . '%')
                    ->orWhere('x1.created_at', 'like', '%' . $keyword . '%');
            });
        }

        if ($return_type == 'count') {
            return $query->count();
        }

        if ($limit > 0) {
            $query->skip($offset)->take($limit);
        }

        return $query->get();
    }

}
