<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use App\Kala;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;
class mcontroller extends Controller
{
    public function addkalapost(Request $request)
    {

        
         $rules = [
        'name' => 'required|max:255',
        'details' => 'required',
       'photo' => 'max:1024',
    ];
    $v = Validator::make($request->all(), $rules);
    if($v->fails()){
 
        return redirect()->back()->withErrors($v->errors())->withInput($request->except('photo'));
     
    } else {
         
        
        $file = $request->file('photo');
    
            $fileName = time().'_'.$request->name;
            $destinationPath = public_path().'/uploads';
        
            $file->move($destinationPath, $fileName);
      
        $kala=new Kala;
      
            $kala->name=$request->name;
              return 1;    
        $kala->details=$request->details;
        
        $kala->pic_name=$fileName;
    
            $kala->save();
 
            return redirect()->back()->with('message', 'The post successfully inserted.');
       
    }
        
        
        
    }
}
