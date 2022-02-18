<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['Read']]);
    }

    public function Create(Request $request) {
        //validation
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'post_id' => 'required|exists:post,id'
        ]);

        Comment::create(array_merge(
            $validator->validated(),
            ['user_id' => auth()->user()->id]
        ));
        return redirect('post/'.$request->post_id);
    }

    public function Read($id) {
        return response()->json(Comment::where('post_id', $id)->get());
    }

    public function Update() {

    }

    public function Delete() {

    }
}
