<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'no_hp', 'email', 'alamat', 'catatan'];

    public function transactions()
    {
        return $this->hasMany(Penjualan::class);
    }
}
