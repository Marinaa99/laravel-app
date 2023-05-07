<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="text-center">
            {{ __('Dashboard') }}
            </div>
        </h2>

    </x-slot>


        <div class="container">
            <ul>
                @foreach ($friendRequests as $friendRequest)
                    <li>{{ $friendRequest->user->name }} wants to be your friend.
                        <form action="{{ route('dashboard.acceptFriendRequest', $friendRequest->id) }}" method="POST">
                            @csrf

                            <button type="submit">Accept</button>
                        </form>
                    </li>
                @endforeach
            </ul>

        </div>

</x-app-layout>
