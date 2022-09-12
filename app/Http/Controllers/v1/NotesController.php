<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Services\ToDoHandler;
use App\Models\Note;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ToDoHandler $toDoHandler)
    {
        return $toDoHandler->showNotes();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NoteRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request, ToDoHandler $toDoHandler)
    {
        return $toDoHandler->addNote($request->note["name"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    public function setDone(Note $note, ToDoHandler $toDoHandler)
    {
       return $toDoHandler->setNoteDone($note);
    }

    public function setUrgent(Note $note, ToDoHandler $toDoHandler)
    {
        return $toDoHandler->setNoteUrgent($note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note, ToDoHandler $toDoHandler)
    {
        return $toDoHandler->deleteNote($note);
    }
}
