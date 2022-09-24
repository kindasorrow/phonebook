<?php

namespace App\Http\Controllers;

use App\Models\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_id = auth()->user()->id;
        $posts = Phonebook::where('user_id',$user_id)->get();

        return view('posts.index', ['posts'=>$posts,'user_id'=>$user_id]);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
             $request->validate([
        'name' => 'required',
        'email' => 'required',
         'phone'=>'required',
    ]);

        $user_id = auth()->user()->id;
        $request->merge([
            'user_id' => $user_id
        ]);
        Phonebook::create($request->all());
        return redirect()->route('posts.index')->with('success','Запись успешно добавлена');
    }


    public function show(Phonebook $post)
    {
        return view('posts.show',compact('post'));
    }


    public function edit(Phonebook $post)
    {
        return view('posts.edit',compact('post'));
    }


    public function update(Request $request, Phonebook $post)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success','Запись успешно обновлена');
    }


    public function destroy(Phonebook $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success','post deleted successfully');
    }
}
