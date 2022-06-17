<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeSearching($query)
    {
        if(request('keyword')) {
            return $query->where('tanggal', 'like', '%' . request('keyword') . '%')
                    ->orWhere('waktu', 'like', '%' . request('keyword') . '%')
                    ->orWhere('lokasi', 'like', '%' . request('keyword') . '%')
                    ->orWhere('suhu', 'like', '%' . request('keyword') . '%');
        }
    }

    public function scopeUrutkan($query)
    {
        if(request('urut')) {
            return $query->orderBy(request('urut'));
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
