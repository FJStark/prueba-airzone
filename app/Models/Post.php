<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    const CREATED_AT = 'added';
    const UPDATED_AT = 'updated';

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function owner(): BelongsTo
    {
        /*
            En esta relación ha sido necesario indicar el nombre de la clave foránea debido al nombre de la función que realiza la
            relación, laravel por defecto trata de buscar la clave foránea a partir del nombre de la relación seguido del id
            (en este caso buscaría "owner_id"), si la función se llamase user, no sería necesario especificar esta columna.
         */
        return $this->belongsTo(User::class, 'user_id');
    }
}
