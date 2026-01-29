<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to post news.');
        }

        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $data['image'] = $path;
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News posted');
    }

    public function edit(News $news)
    {
        $this->authorizeAction($news);

        return view('news.edit', compact('news'));
    }

    // update handles image upload and removal
    public function update(Request $request, News $news)
    {
        $this->authorizeAction($news);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('title', 'body');

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $path = $request->file('image')->store('news_images', 'public');
            $data['image'] = $path;
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated');
    }

    public function destroy(News $news)
    {
        $this->authorizeAction($news);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted');
    }

    protected function authorizeAction(News $news)
    {
        if (!Auth::check()) abort(403);
        $user = Auth::user();
        if ($user->id !== $news->user_id && !$user->is_admin) {
            abort(403);
        }
    }
}
