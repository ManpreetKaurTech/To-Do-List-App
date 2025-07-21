<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolists =Todolist::latest()->paginate(5);
       return view('todolist.index',compact('todolists'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Todolist::create($request->all());
        return redirect()->route('todolist.index')->with('success',' To do List created successfully .');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todolist $todolist)
    {
        return view('todolist.show', compact('todolist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todolist $todolist)
    {
       return view('todolist.edit', compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todolist $todolist)
    {
       $validated = $request->validate([
        'date' => 'required|date',
        'title' => 'required|string',
        'description' => 'required|string',
    ]);
    $id= $todolist->id;
    $todolist = Todolist::findOrFail($id);
    $todolist->update($validated);

    return redirect()->route('todolist.index')->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return redirect()->route('todolist.index');
    }
}
