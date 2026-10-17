<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comercio extends Model
{
    use HasFactory;

    protected $table = 'comercios';

    protected $fillable = [
        'nombre_comercio',
        'rubro',
        'telefono',
    ];

    public function transacciones(): HasMany
    {
        return $this->hasMany(Transaccion::class);
    }
}
