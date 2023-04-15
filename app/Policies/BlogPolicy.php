<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class BlogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (Gate::allows('blog_show')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(): bool|null
    {
        if (Gate::denies('blog_access')) {
            return null;
        }
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(): bool|null
    {
        if (Gate::denies('blog_create')) {
            return null;
        }
        return true;
    }

    public function edit(User $user, Blog $blog): bool|null
    {
        if (Gate::allows('blog_edit') && ($user->isAdmin() || $user->id === $blog->author_id)) {
                return true;
        }
        return null;        
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blog $blog): bool|null
    {
        if (Gate::allows('blog_update') && ($user->isAdmin() || $user->id === $blog->author_id)) {
            return true;
        }
        return null;    
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blog $blog): Response
    {
        if (Gate::allows('blog_delete') && ($user->isAdmin() || $user->id === $blog->author_id)) {
            return Response::allow();
        }
        return Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Blog $blog): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Blog $blog): bool
    {
        //
    }
}
