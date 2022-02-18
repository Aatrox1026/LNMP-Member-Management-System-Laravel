<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['ReadOne', 'ReadAll']]);
    }

    public function Create(Request $request) {
        //validation
        $validaor = Validator::make($request->all(), [
            'title' => 'required|max:100',
        ], [
            'required' => ':Attribute is not filled',
            'max' => ':Attribute should be less than :max characters',
        ]);

        if($validaor->fails())
            return view('Post.create_post')->with('errors', $validaor->errors()->all());

        //insert
        Post::create(array_merge(
            $validaor->validated(),
            ['poster_id' => auth()->user()->id]
        ));
        return redirect()->route('posts');
    }

    public function ReadOne($id) {
        $model = Post::where('id', $id)->first();
        $client = new Client;
        $response = $client->get(url('comments/'.$id));
        $comments = json_decode($response->getBody());
        return view('Post.post')->with('model', $model)->with('comments', $comments);
    }

    public function ReadAll() {
        return view('Post.postlist');
    }

    public function Update() {

    }

    public function Delete() {

    }

    public function ShowCreatePage() {
        return view('Post.create_post');
    }
}
