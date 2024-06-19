<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view("admin.technologies.index", compact("technologies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('admin.technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);
        $form_data = $request->all();
        $form_data['slug'] = Technology::generateSlug($form_data['name']);
        $newTechnology = Technology::create($form_data);
        return redirect()->route('admin.technology.show', $newTechnology->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        $technologies = Technology::all();
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        $technologies = Technology::all();
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);
        $form_data = $request->all();
        if ($technology->name !== $form_data['name']) {
            $form_data['slug'] = Technology::generateSlug($form_data['name']);
        }
        $technology->update($form_data);
        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('message', $technology->name . ' deleted successfully');
    }
}
