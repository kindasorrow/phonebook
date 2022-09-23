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
        $posts = Phonebook::all();
        $user_id = auth()->user()->id;
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
        //$posts = Phonebook::query()->get();
        $user_id = auth()->user()->id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        //Phonebook::create($request->all());
    //Phonebook::query()->create();
        $db = DB::insert('insert into phonebooks (user_id, name,email,phone) values (?, ?,?,?)', [$user_id, $name,$email,$phone]);
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
