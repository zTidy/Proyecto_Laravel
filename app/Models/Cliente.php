<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $fech_nacimiento
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @property Recetum[] $recetas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model                     //Modelo de nuestro Cliente
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     //Datos de nuestro modelo cliente
    protected $fillable = ['nombre', 'apellido', 'fech_nacimiento', 'correo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     //Función para la relación de nuestro modelo Receta
     public function recetas()
    {
        return $this->hasMany(\App\Models\Recetum::class, 'id', 'cliente_id');
    }

}
