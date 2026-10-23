<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cliente extends Model
{
    Use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;


    protected $fillable = [
        'nombre_cliente',
        'apellido_cliente',
        'fecha_nac',
        'edad',
        'dpi',
        'ubicacion_id_ubicacion'
    ];

    //Relacion con la tabla ubicacion
    public function ubicacion()
    {
        return $this->belongsTo(ubicacion::class, 'ubicacion_id_ubicacion', 'id_ubicacion');
    }

    //Relacion con la tabla ubicacion
    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'cliente_id_cliente', 'id_cliente');
    }

    //Fecha
    public function edad()
    {
        return Carbon::parse($this->fecha_nac)->age;
    }
}
