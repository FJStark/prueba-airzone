<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostActivityResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postActivity($id)
    {
        /* Creamos un Api Resource que se encarga de devolver la respuesta en el formato que se solicita en este apartado,
        añadiendo no solo los usuarios que intervienen en el post al nivel del post en lugar de a nivel de comments, si no también
        añadiendo las claves "body" y "post" tal y como se muestra en el ejemplo.
         */
        return new PostActivityResource(Post::with('comments.writer')->findOrFail($id));
    }
}
