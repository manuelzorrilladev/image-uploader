<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\images;
use Inertia\Inertia;

class imageController extends Controller
{
    public function store(Request $request){

        $name = $request->file('image')->getClientOriginalName();
        $file['image'] = $request->file('image')->storeAs('img',$name,'public');
        $file['name']=$name;
        $file['url'] = env('APP_URL').'/storage/img/'.$name;

        $image = images::create($file);
        $currentId = str($image->id);


        return redirect('/complete/'.$currentId.'');

    }

    public function complete($id){
        $image = images::find($id);

        return Inertia::render('Complete',[
            'image'=>$image,
            'url'=>env('APP_URL').'/complete/'.$id

        ]);
    }
}
