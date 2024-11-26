<div>
    @if(session('success'))
        <span class="w-100 py-3 bg-green-300 rounded">{{session('success')}}</span>
    @endif

    <form wire:submit="createNewUser" class="p-4 space-y-4 bg-gray-100 rounded">

        <input class="block w-80 p-2 border rounded" wire:model="name" type="text" placeholder="Name">
        @error('name')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <input class="block w-80 p-2 border rounded" wire:model="email" type="email" placeholder="Email">
        @error('email')
        <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <input class="block w-80 p-2 border rounded" wire:model="password" type="password" placeholder="Password">
        @error('password')
        <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <button class="w-40 px-3 p-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create</button>

    </form>


    <hr>

    @foreach ($users as $user)
        <p>{{$user->name}}</p>
    @endforeach

        {{ $users->links() }}


</div>
