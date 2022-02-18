<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\ListView;

class PostListView extends ListView
{
    public $searchBy = ['title'];

	/**
	 * Sets a model class to get the initial data
	 */
	protected $model = Post::class;

	/**
	 * Sets the properties to every list item component
	 *
	 * @param $model Current model for each card
	 */
	public function data($model)
	{
        $author = User::where('id', $model->poster_id)->first();
		return [
			'avatar' => '',
			'title' => $model->title,
			'subtitle' => $author->email
		];
	}
}
