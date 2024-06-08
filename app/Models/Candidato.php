<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vacante_id',
        'cv'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vacante()
    {
        return $this->belongsTo(Vacante::class);
    }
}
