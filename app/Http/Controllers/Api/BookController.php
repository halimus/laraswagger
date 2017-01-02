<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller {

    use Helpers;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $books = Book::all();
        return response()->json(['results' => $books]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $book = Book::find($id);
        if (!$book) {
            return $this->response->error('Book not found', 404);
        }
        return response()->json(['result' => $book]);
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
        $messages = $this->messages();
        $validator = Validator::make($request->all(), $rules, $messages); 
        if ($validator->fails()) {
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        $input['slug'] = str_slug($request['title'], '-');
        
        if(Book::create($input)){
            return $this->response->created();
        }
        else{
            return $this->response->error('could_not_create_book', 500);
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
        $book = Book::find($id);
        if (!$book) {
            return $this->response->error('Book not found', 404);
        }
        
        $input = $request->all();
        $rules = $this->rules($input);
        $validator = Validator::make($request->all(), $rules); 
        if ($validator->fails()) {
            return $this->response->errorBadRequest($validator->errors()); 
        } 
        
        if(isset($request['title'])){
            
        }
        $input['slug'] = str_slug($request['title'], '-');
        
        $book->fill($input);
        if($book->save()){
            return $this->response->noContent();
        }
        else{
            return $this->response->error('could_not_update_book', 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $book = Book::find($id);
        if (!$book) {
            return $this->response->error('Book not found', 404);
        }
        if($book->delete()){
            return $this->response->noContent();
        }
        else{
           return $this->response->error('could_not_delete_book', 500); 
        }
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($input) {
        $rules = [
            'title' => 'required|min:2',
            'pages_count' => 'required|numeric',
            'published_date' => 'required|date',
            'price' => 'required|between:1, 999.99',
            'quantity' => 'required|numeric',
            'author_id' => 'required|exists:authors,author_id',
            'field_id' => 'required|exists:fields,field_id',
            'language_id' => 'required|exists:languages,language_id',
            
        ];
        
//        if(isset($input['title'])){
//            $rules['title'] = 'required|min:2';
//        }
        
        return $rules;
    }
    
    
    
    /*
     * 
     */

    public function messages() {
        return [
            'author_id.exists' => 'Not an existing author_id',
            'field_id.exists' => 'Not an existing field_id',
            'language_id.exists' => 'Not an existing language_id',
        ];
    }
    
}
