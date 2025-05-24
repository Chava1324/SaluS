<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'licencia_medica',
        'especialidad',
        'user_id',
    ];
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }
    public function horarios()
    {
        return $this->belongsTo(Horario::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function historial()
    {
        return $this->hasMany(Historials::class);
    }
}
