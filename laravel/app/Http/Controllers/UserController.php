<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	public function __construct() {
		$this->middleware('auth:api', ['except' => ['Login', 'Create']]);
	}

	public function Login(Request $request) {
        //validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'required' => ':Attribute is not filled',
            'email' => ':input is not an email'
        ]);

        if($validator->fails())
            return view('login')->with('errors', $validator->errors()->all());
        if(! $token = auth()->attempt($validator->validated()))
            return view('login')->with('errors', ['Incorrect username or password']);

        //login
        return $this->CreateNewToken($token);
	}

	public function Register(Request $request) {
		//validation
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:user',
			'password' => 'required|between:8,max|confirmed'
		], [
			'required' => ':Attribute is not filled',
            'email' => ':input is not an email',
			'unique' => ':Attribute already used',
			'between' => ':Attribute length should be between :min~:max characters',
			'confirmed' => ':Attributes are not matched'
		]);

		if($validator->fails())
			return view('signup')->with('errors', $validator->errors()->all());

		//insert
		User::create(array_merge(
            $validator->validated(),
			['password' => Hash::make($request->password)]
		));
		return view('redirect')->with('msg', 'SingUp Success');
	}

    public function Logout() {
        auth()->logout();
        return view('redirect')->with('msg', 'Logout Success');
    }

    public function ShowProfile() {
        return view('profile')->with('user', auth()->user());
    }

    public function ShowUserTable() {
        if(auth()->user()->isAdmin)
            return view('usertable');
        return 'Permission Denied';
    }

    private function CreateNewToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
