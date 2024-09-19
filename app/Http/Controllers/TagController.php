<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=> 'required'
        ]);

        Tag::create([
            'name'=> $request->name
        ]);
        
        return redirect('/'); 
    }

    public function destroy(Tag $tag){
        
        $tag->delete();
        return redirect('/');
    }
}
