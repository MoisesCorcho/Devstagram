<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount(Post $post)
    {
        $this->isLiked = $this->post->checkLike( auth()->user() );
        $this->likes = $this->post->likes->count();
    }

    public function like()
    {
        if ($this->post->checkLike( auth()->user() )) {
            request()->user()->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        }else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
