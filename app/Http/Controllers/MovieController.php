<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $movies = Movie::paginate();

        return view('movie.index', compact('movies'))
            ->with('i', ($request->input('page', 1) - 1) * $movies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $movie = new Movie();

        return view('movie.create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request): RedirectResponse
    {
        Movie::create($request->validated());

        return Redirect::route('movies.index')
            ->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $movie = Movie::find($id);

        return view('movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $movie = Movie::find($id);

        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, Movie $movie): RedirectResponse
    {
        $movie->update($request->validated());

        return Redirect::route('movies.index')
            ->with('success', 'Movie updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Movie::find($id)->delete();

        return Redirect::route('movies.index')
            ->with('success', 'Movie deleted successfully');
    }
}
