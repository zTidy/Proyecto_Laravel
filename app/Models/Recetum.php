<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recetum
 *
 * @property $id
 * @property $receta
 * @property $cliente_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

 //Modelo de nuestra Receta
class Recetum extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //Datos que requiere nuestro modelo
    protected $fillable = ['receta', 'cliente_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     //Función que relaciona el id de nuestro cliente con su respectiva tabla (llave foranea)
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id', 'id');
    }

}
