<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $guarded = ['id'];
    protected $primarykey = 'id';

    public function jurusan()
    {
        return $this->belongTo(Jurusan::class, 'jurusan_id', 'id');
    }
}
