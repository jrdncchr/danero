<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;

class StoryController extends Controller {

	public function index()
	{
		$stories = Post::where('user_id', Auth::user()->id)
			->orderBy('created_at', 'desc')
			->paginate(10);
		return view('manage.story.index', ['stories' => $stories]);
	}

	public function show(Post $post)
	{
		return view('manage.story.form', ['story' => $post]);
	}

	public function create() 
	{
		return view('manage.story.form');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|string',
			'content' => 'required|string'
		]);

		$post = new Post;
		$post->title = $request->title;
		$post->content = $request->content;
		$post->active = $request->active == 'on';
		$post->user_id = Auth::user()->id;
		$post->save();

		return redirect()->route('stories.index')->with('message', 'Story has been created!');
	}

	public function edit(Request $request, Post $post)
	{
		if (Auth::user()->id == $post->user_id) {

			$this->validate($request, [
				'title' => 'required|string',
				'content' => 'required|string'
			]);

			$post->title = $request->title;
			$post->content = $request->content;
			$post->active = $request->active == 'on';
			$post->save();

			return redirect()->route('stories.show', ['post' => $post->id])->with('message', 'Story updated!');
		} else {
			abort(404);
		}
	}

	public function destroy(Post $post) {
		$post->delete();
		return redirect()->route('stories.index');
	}
	
}