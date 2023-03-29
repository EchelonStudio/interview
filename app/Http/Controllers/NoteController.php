<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Http\RedirectResponse;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        
          return view('note', [
            'notes' => auth()->user()->notes()->orderBy('id', 'desc')->get()
          ]);
    }

    /**
     * Store a newly created resource 
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'text' => 'required'
        ]);

        Note::create([
            'user_id' => auth()->user()->id,
            'note_id' => Str::random(5),
            'text' => $request->text
        ]);


        return back()->with('status', 'Note Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($note_id)
    {   
        $note = Note::where('note_id', $note_id)->first();

       return view('show', [
        'note' => $note
       ]);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $note_id)
    {
         Note::where('note_id', $note_id)->update([
            'text' => $request->text,
        ]);

        return back()->with('status', 'Note saved');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Note::where('id', $id)->delete();

       return redirect()->route('notes.index')->with('status', 'Note Deleted');
    }
}
