<?php

namespace App\Policies;

use App\Posts;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Posts  $post
     * @return bool
     */
    public function update(User $user, Posts $post)
    {
        return $user->id === $post->user_id;
    }
}
