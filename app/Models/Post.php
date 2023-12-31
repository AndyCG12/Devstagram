<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class)->select(['name','username']);
    }
    //Obtener los comentarios de una publicacion
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    //obtener los likes
    public function likes(){
        return $this->hasMany(Like::class);
    }

//verificar si ya se dio like
public function checkLike(User $user){
    return $this->likes->contains('user_id', $user->id);
}

}
