<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use LaravelViews\Views\DetailView;

class PostDetailView extends DetailView
{
    public $modelClass = Post::class;

    public function heading($model) {
        $author = User::where('id', $model->poster_id)->first();
        return [
            $model->title,
            $author->email
        ];
    }

    /**
     * @param $model Model instance
     * @return array Array with all the detail data or the components
     */
    public function detail($model)
    {
        return [

        ];
    }
}
