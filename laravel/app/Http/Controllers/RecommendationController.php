<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecommendationController extends Controller
{
    public function create()
    {
        return view('recommendations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|string',
            'attachment' => 'nullable|file|max:2048',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $data = [
            'note' => $request->note,
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        }

        if ($request->hasFile('attachment')) {
            // store in storage/app/notes
            $path = $request->file('attachment')->store('notes');
            $data['attachment_path'] = $path;
        }

        Recommendation::create($data);

        return redirect()->route('recommendations.create')->with('success', 'Recommendation submitted. Thank you!');
    }

    // admin-only listing
    public function index()
    {
        if (!Auth::check() || !Auth::user()->is_admin) abort(403);

        $recs = Recommendation::latest()->get();
        return view('recommendations.index', compact('recs'));
    }

    // download attachment (admin only)
    public function downloadAttachment(Recommendation $recommendation)
    {
        if (!Auth::check() || !Auth::user()->is_admin) abort(403);

        if (! $recommendation->attachment_path || ! Storage::exists($recommendation->attachment_path)) {
            abort(404);
        }

        return Storage::download($recommendation->attachment_path);
    }

        // delete recommendation (admin only)
        public function destroy($id)
        {
            if (!Auth::check() || !Auth::user()->is_admin) abort(403);

            $recommendation = Recommendation::findOrFail($id);

            if ($recommendation->attachment_path && Storage::exists($recommendation->attachment_path)) {
                Storage::delete($recommendation->attachment_path);
            }

            $recommendation->delete();

            return back()->with('success', 'Recommendation deleted successfully.');
        }
}
