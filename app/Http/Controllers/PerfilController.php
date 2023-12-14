<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function index(){
        //dd('Aqui se muestra el formulario');

        return view('perfil.index');
    }

    public function store(Request $request){
        //dd('Guardando cambios...');

        $request->query->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            // 'username' => 'required|unique:users|min:3|max:20'
            'username' => [
                'required',
                'unique:users,username,'.auth()->user()->id,
                'min:3',
                'max:20',
                'not_in:editar-perfil'
            ]
        ]);

        //validacion imagen
        if($request->imagen){
            //dd('Hay imagen');

            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid().'.'.$imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);

            $imagenPath = public_path('perfiles').'/'.$nombreImagen;

            $imagenServidor->save($imagenPath);
        }

        //gurdar los cambios
        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;

        //evitar que el nombre de la imagen se pierda
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;

        $usuario->save();

        //redireccionar al usuario
        return redirect()->route('posts.index', $usuario->username);

    }
}
