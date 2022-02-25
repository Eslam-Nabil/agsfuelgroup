<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;


class ApiController extends Controller
{
    public function __construct(Guard $auth)
    {
            $this->currentUser = $auth->user();

    }
        public function login(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'exists:users,email'],
                'password' => ['required', 'string'],
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), 'success' => false], 401);
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $token = auth()->user()->createToken('Myapp')->accessToken;


                // DB::table('users')
                // ->where('email',$request->email)
                // ->update(['fb_token' =>$fb_token ]);

                return response()->json(['data' => ['token' => $token, 'user' => new UserResource(auth()->user())], 'success' => true], 200);
            } else {
                return response()->json(['message' => __('messages.UnAuthorised'), 'success' => false], 401);
            }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users,email|max:255',
            'phone'     => ['required', 'string', 'regex:/^(01)[0-9]{9}$/', 'unique:users,phone'],
            'password'      => 'required|string|min:6|max:255|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'success' => false], 401);
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        if($user){
        return response()->json(['data' => new UserResource($user), 'success' => true], 200);
        }else{
            return response()->json(['errors' => $validator->errors(), 'success' => false], 401);
        }
    }
    public function logout(Request $request)
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json([
            'success'   => true,
            'message'   => __('messages.Successfully logged out')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
