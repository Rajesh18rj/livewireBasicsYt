<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public $name;
    public $search;

    public $editingTodoID;

    #[Rule('required|min:3|max:255')]
    public $editingTodoName;
    public function create(){
//        dd('test');
        //validate
        //create the to-do
        //clear the input
        //send flash message

        $validated = $this->validate([
            'name'=>'required|min:3|max:50',
        ]);

        Todo::create($validated);

        $this->reset('name');

        session()->flash('success', 'Todo created successfully.');

    }


    public function delete(Todo $todo){
        $todo->delete();
    }

    public function toggle(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit(Todo $todo)
    {
        $this->editingTodoID = $todo->id;
        $this->editingTodoName = $todo->name;
    }

    public function cancelEdit(){
        $this->reset('editingTodoID', 'editingTodoName');
    }

    public function update(){
        $this->validateOnly('editingTodoName');

        Todo::find($this->editingTodoID)->update([
            'name'=>$this->editingTodoName,
        ]);

        $this->cancelEdit();
    }


    public function render()            #we write the read function is here
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()
                ->where('name', 'like', "%{$this->search}%")
                ->paginate(3)
        ]);
    }
}
