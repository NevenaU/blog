<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('success', 'Comment has been successfully added.');
    }

    public function destroy($id)
    {
        // Find the comment by ID, but add a check to see if the comment exists
        $comment = Comment::find($id);

        if (!$comment) {
            // If the comment doesn't exist, return an error
            return redirect()->back()->with('error', 'Comment not found.');
        }

        // If the comment is found, check if the user has permission to delete it
        if (Gate::denies('delete-comment', $comment)) {
            // If the user doesn't have permission, return a 403 error
            abort(403, 'You do not have permission to delete this comment.');
        }

        // If everything passes, delete the comment
        $comment->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment successfully deleted.');
    }

}
