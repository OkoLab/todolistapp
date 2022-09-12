<?php

namespace App\Services;

use App\Models\Note;

class ToDoHandler{

    public function showNotes()
    {
        return Note::orderBy('done','asc')->orderBy('updated_at', 'DESC')->get();
    }

    public function addNote($name)
    {
        $note = new Note;
        $note->name = $name;
        $note->save();
        return $note;
    }

    public function setNoteDone(Note $note)
    {
        if ($note) {
            $note->done = !$note->done;
            $note->save();
            return $note;
        }

        return "Note not found.";
    }

    public function setNoteUrgent(Note $note)
    {
        if ($note) {
            $note->urgent = !$note->urgent;
            $note->save();
            return $note;
        }

        return "Note not found.";

    }

    public function deleteNote(Note $note)
    {
        if ($note) {
            $note->delete();
            return "Note successfully deleted.";
        }

        return "Note not found.";
    }
}