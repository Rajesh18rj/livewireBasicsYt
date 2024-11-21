<div>
    <form wire:submit="createNewUser" action="">
        <input wire:model="name" type="text" placeholder="name">
        <input wire:model="email" type="email" placeholder="email">
        <input wire:model="password" type="password" placeholder="password">

        <button>Create</button>
    </form>

    <hr>

    @foreach ($users as $user)
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
        <p>{{$user->password}}</p>
    @endforeach

</div>
