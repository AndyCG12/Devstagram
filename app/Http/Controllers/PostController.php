<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    //
    public function index(User $user){
        //dd('Desde muro');

        //Obtener las publicaciones del usuario
        //$posts = Post::where('user_id', $user->id)->get();

        //Practicando la paginacion
        $posts = Post::where('user_id', $user->id)->latest()->paginate(8);

        return view('dashboard',[
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create(){
        //dd('Creando post...');
        return view('posts.create');
    }

    public function store(Request $request){
        //dd('Creando publicacion');

        //validar el formulario
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen'  => 'required'
        ]);
        //Guardar publicacion 
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        //
        //$request->user()->posts()->create([
            //'titulo' => $request->titulo,
            //'descripcion' => $request->descripcion,
            //'imagen' => $request->imagen,
            //'user_id' => auth()->user()->id
        //]);

        //redireccionar al usuario
        return redirect()->route('posts.index', auth()->user()->username);

    }

    public function show(User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    
    }

    public function destroy(Post $post){
        //dd('Eliminando...', $post->id);

        $this->authorize('delete', $post);
        $post->delete();

        //eliminar imagen
        $imagen_path = public_path('uploads/'.$post->imagen);

        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
