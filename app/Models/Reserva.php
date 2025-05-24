<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'events'; // <- aquí se indica la tabla real

    protected $fillable = [
        'consultorio',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'user_id',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'hora_inicio' => 'datetime',
        'hora_fin' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];
    public function toArray()
    {
        return [
            'id' => $this->id,
            'consultorios' => optional($this->consultorio)->nombre ?? 'Sin nombre',
            'fecha' => optional($this->start)->format('Y-m-d'),
            'hora_inicio' => optional($this->start)->format('H:i:s'),
            'hora_fin' => optional($this->end)->format('H:i:s'),
        ];
    }
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class, 'consultorio_id');
    }
}
