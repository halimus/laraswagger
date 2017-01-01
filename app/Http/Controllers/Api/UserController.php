<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Models\User;


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
            //You laravel response
            //return response()->json(['error' => ['message' => 'User not found', 'status_code'=> '404']], 404);
            //return response()->json(['message' => 'User not found', 'status_code'=> '404'], 404);
            
            //Using Dingo Helpers
            //return $this->response->errorNotFound();
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
        


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
         
    }
    
}
