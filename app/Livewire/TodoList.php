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
    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()
                ->where('name', 'like', "%{$this->search}%")
                ->paginate(3)
        ]);
    }
}
