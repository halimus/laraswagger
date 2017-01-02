<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;


class AuthorController extends Controller {

    use Helpers;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $authors = Author::all();
        
        return response()->json(['results' => $authors]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $author = Author::find($id);
        if (!$author) {
            //Using Dingo Helpers
            return $this->response->error('Author not found', 404);
        }
        return response()->json(['result' => $author]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = $this->rules();
        $validator = Validator::make($request->all(), $rules); 
        if ($validator->fails()) {
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        if(Author::create($request->all())){
            return $this->response->created();
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
        $author = Author::find($id);
        if (!$author) {
            return $this->response->error('Author not found', 404);
        }
        
        $rules = $this->rules();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        $author->fill($request->all());
        if($author->save()){
            return $this->response->noContent();
        }
        else{
            return $this->response->error('could_not_update_author', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $author = Author::find($id);
        if (!$author) {
            return $this->response->error('Author not found', 404);
        }
        if($author->delete()){
            return $this->response->noContent();
        }
        else{
           return $this->response->error('could_not_delete_author', 500); 
        } 
    }
    
    /*
     * 
     */
    public function rules(){
        return array(
            'author_name' => 'required|min:3',
            'email' => 'email|max:45',
            'phone' => 'numeric|digits_between:10,12',
        );
    }
}
