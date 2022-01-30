<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table='payments';
    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'dni',
        'apellido',
        'nombre',
        'telefono',
        'domicilio',
        'amount',
        'fecha_hora_transaccion',
        'preference_id',
        'payment_id',
        'status',
        'payment_type',
        'order_id',
    ];

    protected $guarded =[

    ];
}
