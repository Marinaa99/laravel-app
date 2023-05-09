
<x-app-layout>

    <div style="margin-top: 40px">
        <div class="mt-4 border mx-auto my-4 p-4 max-w-lg bg-white">
            <ul>
                @foreach ($friendRequests as $friendRequest)
                    <li class="flex items-center justify-between mb-2">
                        <div>{{ $friendRequest->user->name }} wants to be your friend.</div>
                        <div class="flex">
                            <form action="{{ route('requests.acceptFriendRequest', $friendRequest->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded ml-2">Accept</button>
                            </form>
                            <form action="{{ route('requests.rejectFriendRequest', $friendRequest->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded ml-2">Reject</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>

