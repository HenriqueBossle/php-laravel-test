<?php

namespace App\Http\Controllers;

use App\Models\Villain;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VillainRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VillainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $villains = Villain::paginate();

        return view('villain.index', compact('villains'))
            ->with('i', ($request->input('page', 1) - 1) * $villains->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $villain = new Villain();

        return view('villain.create', compact('villain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VillainRequest $request): RedirectResponse
    {
        Villain::create($request->validated());

        return Redirect::route('villains.index')
            ->with('success', 'Villain created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $villain = Villain::find($id);

        return view('villain.show', compact('villain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $villain = Villain::find($id);

        return view('villain.edit', compact('villain'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VillainRequest $request, Villain $villain): RedirectResponse
    {
        $villain->update($request->validated());

        return Redirect::route('villains.index')
            ->with('success', 'Villain updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Villain::find($id)->delete();

        return Redirect::route('villains.index')
            ->with('success', 'Villain deleted successfully');
    }
}
