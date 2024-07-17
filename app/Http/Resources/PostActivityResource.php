<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class PostActivityResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "body" => [
                "post" => [
                    "id" => $this->id,
                    "title" => $this->title,
                    "short_content" => $this->short_content,
                    "owner" => $this->owner,
                    "users" => $this->comments->pluck('writer')->flatten()->unique('id')->values(),
                    "comments" => $this->comments->map(fn ($comment) => $comment->setRelation('writer', ""))
                ]
            ]
        ];
    }
    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request
     * @param  \Illuminate\Http\Response
     * @return void
     */
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->header('Charset', 'utf-8');
        $response->setEncodingOptions(JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
