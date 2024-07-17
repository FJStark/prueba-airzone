<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function writer(): BelongsTo
    {
        /*
            En esta relación ha sido necesario indicar el nombre de la clave foránea debido al nombre de la función que realiza la
            relación, laravel por defecto trata de buscar la clave foránea a partir del nombre de la relación seguido del id
            (en este caso buscaría "writer_id"), si la función se llamase user, no sería necesario especificar ésta columna.
         */
        return $this->belongsTo(User::class, 'user_id');
    }
}
