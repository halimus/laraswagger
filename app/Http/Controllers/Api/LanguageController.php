<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;


class LanguageController extends Controller {

    use Helpers;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $languages = Language::all();
        
        return response()->json(['results' => $languages]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $language = Language::find($id);

        if (!$language) {
            return $this->response->error('Language not found', 404);
        }
        
        return response()->json(['result' => $language]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $rules = array(
            'language_name' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            //return $this->response->error($validator->errors(), 400);
            //return $this->response->errorInternal($validator->errors());
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        else {
            if(Language::create($request->all())){
                return $this->response->created();
            }
            else{
                return $this->response->error('could_not_create_language', 500);
            } 
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
        $language = Language::find($id);
        if (!$language) {
            return $this->response->error('Language not found', 404);
        }
        
        $rules = array(
            'language_name' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            //return $this->response->error($validator->errors(), 400);
            //return $this->response->errorInternal($validator->errors());
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        $language->fill($request->all());
        
        if($language->save()){
            return $this->response->noContent();
        }
        else{
            return $this->response->error('could_not_update_language', 500);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $language = Language::find($id);
        if (!$language) {
            return $this->response->error('Language not found', 404);
        }
        if($language->delete()){
            return $this->response->noContent();
        }
        else{
           return $this->response->error('could_not_delete_language', 500); 
        } 
    }
    
}
