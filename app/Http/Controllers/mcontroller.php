<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

use App\Task;
use App\Kala;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;
class mcontroller extends Controller
{
    
    public function del(Request $request,Kala $kala)
    {
   if(  Storage::disk('kala')->exists($kala->pic_name))
      {Storage::disk('kala')->delete($kala->pic_name);}
   $kala->delete();
        return back();
    }
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
    $fileName = time().''.$request->file('photo')->getClientOriginalName();
           
            
        $fileName = str_replace(' ', '_', $fileName);
         
      
        $kala=new Kala;
      
            $kala->name=$request->name;
     
        $kala->details=$request->details;
        
        $kala->pic_name=$fileName;
    
            $kala->save();
 
           
       
         Storage::disk('kala')->put(
           $kala->pic_name,
            file_get_contents($request->file('photo')->getRealPath())
        );
     return redirect()->back()->with('message', 'The post successfully inserted.');
    }
        
        
        
    }
    
    public function geteditpage(Request $request,Kala $kala)
    {
        
        return view('editpage', ['kala' => $kala]);
    }
    public function editkala (Request $request,Kala $kala)
    {
          $rules = [
        'name' => 'required|max:255',
        'details' => 'required',
      
    ];
    $v = Validator::make($request->all(), $rules);
    if($v->fails()){
 
        return redirect()->back()->withErrors($v->errors())->withInput($request->except('photo'));
     
    } 
        
        $kala->name=$request->name;
        $kala->details=$request->details;
        
       if ($request->hasFile('photo')) {
                         $file = $request->file('photo');
    $fileName = time().''.$request->file('photo')->getClientOriginalName();
       $fileName = str_replace(' ', '_', $fileName);
           
            Storage::disk('kala')->put(
            $fileName,
            file_get_contents($request->file('photo')->getRealPath())
        );
              if(  Storage::disk('kala')->exists($kala->pic_name))
      {Storage::disk('kala')->delete($kala->pic_name);}
           $kala->pic_name=$fileName;
           
           
    //
}

           $kala->save();
        
            
       return  redirect  ('/');
        
    }
    
}
