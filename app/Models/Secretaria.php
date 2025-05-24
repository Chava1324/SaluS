<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Secretaria extends Model
{
    use HasRoles, HasFactory;
    protected $guard_name = 'web';

    protected $fillable = [
        'nombres',
        'apellidos',
        'curp',
        'celular',
        'fecha_nacimiento',
        'direccion',
        'user_id'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
