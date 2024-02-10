<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = sections::all();
        return view('sections.sections' , compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'section_name' => 'required|unique:sections',
            'description' => 'required',
        ]);
        sections::create([
            'section_name' => $request->section_name,
            'description' => $request->description,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'Section has been added successfully ');
        return redirect('/sections');   
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $section)
    {
        return view('sections.edit' , compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sections $section)
    {
        $data = $request->validate([
            'section_name' => 'required',
            'description' => 'required',
    ]);
    $section->update($data);
    return redirect(route('sections.index'))->with('success', 'Section Updated Succesffully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sections $section)
    {
        $section->delete();
        return redirect(route('sections.index'))->with('success', 'Section Deleted Succesffully');

    }
}
