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
     * @SWG\Get(
     *     path="/languages",
     *     summary="List all languages",
     *     operationId="listLanguages",
     *     tags={"Languages"},
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *     )
     * )
     */
    
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
     * @SWG\Get(
     *     path="/languages/{language_id}",
     *     summary="Info for a specific language",
     *     operationId="showLanguageById",
     *     tags={"Languages"},
     *     @SWG\Parameter(
     *         name="language_id",
     *         in="path",
     *         required=true,
     *         description="The id of the language to retrieve",
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Expected response to a valid request",
     *         @SWG\Schema(ref="#/definitions/Pets")
     *     ),
     *     @SWG\Response(
     *         response="default",
     *         description="unexpected error",
     *         @SWG\Schema(ref="#/definitions/Error")
     *     )
     * )
     */
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
     * @SWG\Post(
     *    path="/languages/create",
     *    operationId="addLanguage",
     *    summary="Create a language",
     *    produces={"application/json"},
     *    tags={"Languages"},
     *    @SWG\Parameter(
     *         name="language_name",
     *         in="body",
     *         required=true,
     *         type="string",
     *         description="Language to add to the bookstore",
     *         @SWG\Schema(ref="#/definitions/languages/"),
     *    ),
     *    @SWG\Response(
     *       response=201, 
     *       description="Null response"
     *    ),
     *    @SWG\Response(
     *        response="default",
     *        description="unexpected error",
     *        @SWG\Schema(ref="#/definitions/Error")
     *    )
     * )
     */
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
