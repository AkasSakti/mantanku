<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantan extends Model
{
    protected $table = 'mantan';

    protected $primaryKey = 'id_mantan';

    public $timestamps = false;

    protected $fillable = [
        'Nama_mantan',
        'Alamat',
        'No_Hp',
    ];
}
