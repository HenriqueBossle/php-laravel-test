<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\HeroRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $heroes = Hero::paginate();

        return view('hero.index', compact('heroes'))
            ->with('i', ($request->input('page', 1) - 1) * $heroes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $hero = new Hero();

        return view('hero.create', compact('hero'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeroRequest $request): RedirectResponse
    {
        Hero::create($request->validated());

        return Redirect::route('heroes.index')
            ->with('success', 'Hero created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $hero = Hero::find($id);

        return view('hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $hero = Hero::find($id);

        return view('hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeroRequest $request, Hero $hero): RedirectResponse
    {
        $hero->update($request->validated());

        return Redirect::route('heroes.index')
            ->with('success', 'Hero updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Hero::find($id)->delete();

        return Redirect::route('heroes.index')
            ->with('success', 'Hero deleted successfully');
    }
}
