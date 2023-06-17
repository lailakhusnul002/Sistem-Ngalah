<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violationa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at','tanggal_lahir'];
    // protected $fillable = ['']
    protected $table = 'violationas';
    public $timestamps = true;


    protected $fillable = [
        'student_id',
        'jeniskelamin',
        'pelanggaran',
        'jenispelanggaran',
        'hukuman',
        'notelpon',
        'foto',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }
}

