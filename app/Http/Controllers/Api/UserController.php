<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller {

    use Helpers;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $users = User::all();
        return response()->json(['results' => $users]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        if (!$user) {
            return $this->response->error('User not found', 404);
        }
        return response()->json(['result' => $user]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) { 
        $input = $request->all();
        
        $rules = $this->rules($input);
        $validator = Validator::make($request->all(), $rules); 
        if ($validator->fails()) {
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        $input['password'] = bcrypt($request['password']);
        
        if(User::create($input)){
            return $this->response->created();
            //return response()->json($user, 201);
        }
        else{
            return $this->response->error('could_not_create_author', 500);
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return $this->response->error('User not found', 404);
        }
        
        $input = $request->all();
        $rules = $this->rules($input, $user->user_id);
        $validator = Validator::make($request->all(), $rules); 
        if ($validator->fails()) {
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        if(isset($request['password'])){
            $input['password'] = bcrypt($request['password']);
        }
 
        $user->fill($input);
        if($user->save()){
            return $this->response->noContent();
        }
        else{
            return $this->response->error('could_not_update_user', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        if (!$user) {
            return $this->response->error('User not found', 404);
        }
        if($user->delete()){
            return $this->response->noContent();
        }
        else{
           return $this->response->error('could_not_delete_user', 500); 
        } 
    }
    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($input, $user_id = null) {
        $rules = [
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'email' => 'required|email|max:45|unique:users'
        ];
        
        if(!empty($user_id)){
            $rules['email'] = 'required|email|max:45|unique:users,email, ' . $user_id . ',user_id';
        }
        else{
            $rules['email'] = 'required|email|max:45|unique:users';
        }
        
        if(isset($input['password'])){
            $rules['password'] = 'required|min:4';
        }
        
        return $rules;
    }
    
}
