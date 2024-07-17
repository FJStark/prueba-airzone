<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Collection;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /*
    Para esta función no he encontrado forma de realizar una relación con las disponibles en la documentación de laravel, por lo que he usado
     la funcionalidad "carga anidada" obteniendo post y categorias, de los comentarios relacionados con el usuario, luego con pluck he obtenido
     solo las categorías, con flatten he convertido el array multidimensionar en uno de una dimensión y suprimido los duplicados con unique,
     he usado values para quedarme solo con los valores del array resultante suprimiendo las keys numéricas innecesarias.
     */
    public function userCategories(): Collection
    {
        return $this->comments()->with('post.categories')->get()->pluck('post.categories')->flatten()->unique('id')->values();
    }
}
