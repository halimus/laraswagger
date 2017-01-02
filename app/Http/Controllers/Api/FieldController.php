<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Models\Field;
use Illuminate\Support\Facades\Validator;


class FieldController extends Controller {

    use Helpers;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $fields = Field::all();
        
        return response()->json(['results' => $fields]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $field = Field::find($id);

        if (!$field) {
            return $this->response->error('Field not found', 404);
        }
        
        return response()->json(['result' => $field]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = array(
            'field_name' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            //return $this->response->error($validator->errors(), 400);
            //return $this->response->errorInternal($validator->errors());
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        if(Field::create($request->all())){
            return $this->response->created();
        }
        else{
            return $this->response->error('could_not_create_field', 500);
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
        $field = Field::find($id);
        if (!$field) {
            return $this->response->error('Field not found', 404);
        }
        
        $rules = array(
            'field_name' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            //return $this->response->error($validator->errors(), 400);
            //return $this->response->errorInternal($validator->errors());
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        $field->fill($request->all());
        if($field->save()){
            return $this->response->noContent();
        }
        else{
            return $this->response->error('could_not_update_field', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $field = Field::find($id);
        if (!$field) {
            return $this->response->error('Field not found', 404);
        }
        if($field->delete()){
            return $this->response->noContent();
        }
        else{
           return $this->response->error('could_not_delete_field', 500); 
        } 
    }
    
}
