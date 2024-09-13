<?php

namespace App\Http\Controllers;

use App\Models\Catering;
use Illuminate\Http\Request;

class CateringController extends Controller
{
    public function index()
    {
        $caterings = Catering::all();
        return view('caterings.index', compact('caterings'));
    }

    public function create()
    {
        return view('caterings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'description' => 'required',
        ]);

        Catering::create($request->all());

        return redirect()->route('caterings.index')
                         ->with('success', 'Catering created successfully.');
    }

    public function show(Catering $catering)
    {
        return view('caterings.show', compact('catering'));
    }

    public function edit(Catering $catering)
    {
        return view('caterings.edit', compact('catering'));
    }

    public function update(Request $request, Catering $catering)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'description' => 'required',
        ]);

        $catering->update($request->all());

        return redirect()->route('caterings.index')
                         ->with('success', 'Catering updated successfully.');
    }

    public function destroy(Catering $catering)
    {
        $catering->delete();

        return redirect()->route('caterings.index')
                         ->with('success', 'Catering deleted successfully.');
    }
}
