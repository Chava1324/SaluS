<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'dia',
        'hora_inicio',
        'hora_fin',
        'consultorio_id',
        'doctor_id',
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }
}
