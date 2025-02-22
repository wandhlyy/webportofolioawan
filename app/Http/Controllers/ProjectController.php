<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\History;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $histories = History::where('user_id', Auth::id())->get();

        return view('projects.index', compact('projects', 'histories'));
    }

    public function detail()
    {
        $projects = Project::all();
        return view('detail', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'author'      => 'required|string|max:255',
            'project_date'=> 'required|date',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('projects', 'public') : null;

        $project = Project::create([
            'title'       => $request->title,
            'description' => $request->description,
            'author'      => $request->author,
            'project_date'=> $request->project_date,
            'image'       => $imagePath,
            'user_id'     => Auth::id(),
        ]);

        History::create([
            'user_id' => auth()->id(),
            'user_email' => auth()->user()->email,
            'author' => $request->author,
            'project_title' => $request->title, // Perbaikan di sini
            'project_date' => $request->project_date,
            'status' => 'in process', // Bisa langsung di-set default
        ]);
        
        
        

        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'author'      => 'required|string|max:255',
            'project_date'=> 'required|date',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $imagePath = $request->file('image')->store('projects', 'public');
        } else {
            $imagePath = $project->image;
        }

        $project->update([
            'title'       => $request->title,
            'description' => $request->description,
            'author'      => $request->author,
            'project_date'=> $request->project_date,
            'image'       => $imagePath,
        ]);
        
        return redirect()->route('projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:valid,in process,tidak valid',
    ]);

    $history = History::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $history->update(['status' => $request->status]);

    return redirect()->route('projects.index')->with('success', 'Status berhasil diperbarui!');
}


    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        History::where('project_title', $project->title)
            ->where('user_id', Auth::id())
            ->delete();

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus!');
    }
}
