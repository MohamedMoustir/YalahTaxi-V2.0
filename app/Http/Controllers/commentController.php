<?php

namespace App\Http\Controllers;

use App\Models\driveer;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function poster(request $request)
    {

        $request->validate([
            'rating' => 'required',
            'content' => 'required',
        ]);


        $comments = Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'driveer_id' => $request->driver_id,
            'rating' => $request->rating

        ]);

        return redirect()->back()->with('success', 'Post ajouté avec succès');
    }

    public function delete($id)
    {
        Comment::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {

        $commentsedite = Comment::find($id);
        return view('editeCommenter', compact('commentsedite'));
    }

    public function update(request $request, $id)
    {
        $commentsedite = Comment::find($id);
        $comment = Comment::findOrFail($id);
        $commentsedite->content = $request->content;
        $commentsedite->rating = $request->rating;
      $commentsedite->driveer_id = $comment->driveer_id;

        $commentsedite->save();
        return redirect(session('previous_url'));
    }

}
