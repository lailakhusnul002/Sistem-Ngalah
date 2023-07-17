<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violationa extends Model
{
    use HasFactory;
    protected $dates = ['created_at','tanggal_lahir'];
    // protected $fillable = ['']
    protected $table = 'violationas';
    public $timestamps = true;
    protected $guarded = ['id'];
    
    // public function student(){
    //     return $this->belongsTo(Student::class);
    // }

//     public function getImageAttribute($value)
// {
//     // $value adalah nilai dari kolom 'image' dalam tabel
//     // Ubah nilai menjadi URL dengan menggunakan helper asset()
//     return $value ? asset('fotosantri/' . $value) : null;
// }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}

