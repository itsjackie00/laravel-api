<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Project;
use Illuminate\Http\Request;


class Technology extends Model
{
    protected $fillable = ['name', 'type_id'];
    use HasFactory;
    public function type()
    {
        return $this->belongsTo(Type::class);
    } 

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }
    public function updateProject(Request $request, Project $project)
    {
        $project->fill($request->all())->save();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully');
    }
    
}
