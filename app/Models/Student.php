<?php

namespace App\Models;

use App\Models\Asrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['nama','jeniskelamin','alamat','notelpon','foto','id_asramas','tanggal_lahir'];
    protected $dates = ['created_at','tanggal_lahir'];



    public function asramas(){
        return $this->belongsTo(Asrama::class,'id_asramas','id');
    }
    public function violationa(){
        return $this->hasMany(Violationa::class);
    }
}
