<?php

namespace App\Http\Controllers;

use App\Models\Chirper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChirperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //



        return Inertia::render('chirpers/index',['chirps' => Chirper::with('user:id,name')->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

       $validated = $request->validate([
        'message' => 'required'
       ]);

      
         $request->user()->chirpers()->create($validated);

 
       return redirect(route('chirps.index'));

    }

    /**
 * Display the specified resource.web
     */
    public function show(Chirper $chirper): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirper $chirper): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirper $chirp): RedirectResponse
    {
        //

        // $this->authorize('update', $chirp);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $chirp->update($validated);
 
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirper $chirper): RedirectResponse
    {

        
    $chirper->delete();
 
        return redirect(route('chirps.index'));
    }
}
