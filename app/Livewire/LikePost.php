<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{

public $post;
public $isliked;
public $likes;

public function like(){

    if($this->post->checkLike(auth()->user())){


        //si existe el like entonces quitalo
        $this->post->likes()->where('post_id', $this->post->id)->delete();

        $this->isliked = false;
        $this->likes--;

        }
        else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id

            ]);

            $this->isliked = true;
            $this->likes++;
        }

    }

    public function render()
    {
        return view('livewire.like-post');
    }
}

