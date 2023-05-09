<x-app-layout>


    <div class="flex mt-16 justify-center h-screen">

    <div class="message-list" style="max-height: 500px; overflow-y: auto; width: 40%; background: #ffffff;  ">
        <div class="p-4 bg-gray-100" style="border-top: 2px solid #22C55E; border-bottom: 1px solid ;">
            <div class="clear-both">
                <div class="float-right">
                    <a href="{{ route('friends.friends') }}">
                    <button type="button" class="text-black hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    </a>
                </div>
            </div>
            <div>Conversation with <span class="text-bold uppercase text-green-500">{{ $friend->name }}</span></div>
        </div>
        <div class="p-4">
            @foreach ($messages as $message)
                <div class="flex {{ $message->user_id == Auth::id() ? 'justify-end' : 'justify-start' }} items-center mb-4 mt-5">
                    @if ($message->user_id != Auth::id())
                        <img src="/images/avatar-1.jpg" alt="avatar-1" class="rounded-full w-8 h-8 mr-2">
                    @endif
                    <div class="flex {{ $message->user_id == Auth::id() ? 'flex-row-reverse' : '' }} ">
                        <div class="{{ $message->user_id == Auth::id() ? 'bg-green-200' : 'bg-gray-100' }} text-black py-2 px-4 rounded-lg {{ $message->user_id == Auth::id() ? 'ml-4' : 'mr-4' }} flex-1">
                            <p class="message-body">{{ $message->message }}</p>
                            <p class="message-time text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                        @if ($message->user_id == Auth::id())
                            <form method="POST" action="{{ route('messages.delete', [$friend->id, $message->id]) }}" class="ml-auto">
                                @csrf
                                @method('DELETE')
                                <button  class=" bg-transparent  text-white py-2 px-2 rounded-full">
                                    <svg  aria-hidden="true" class="justify-center w-5 h-5 mr-1 -ml-2" fill="red" troke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>
                    @if ($message->user_id == Auth::id())
                        <img src="/images/avatar-2.jpg" alt="avatar-2" class="rounded-full w-8 h-8 ml-2">
                    @endif
                </div>
            @endforeach


        </div>

        <form method="POST" action="{{ route('messages.store') }}" class="flex justify-center mb-4">
                @csrf
                <input type="hidden" name="friend_id" value="{{ $friend->id }}">
                <textarea name="message" class="w-4/5 resize-none  focus-visible:ring-2 focus-visible:ring-green-300 rounded-lg p-2 mr-2" style="border-color: #22C55E" placeholder="Type your message..."></textarea>
            <div class="mt-4">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 h-9 rounded-lg text-sm flex items-center justify-center">
                    <svg aria-hidden="true" class="w-5 h-5 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"></path>
                    </svg>
                </button>
            </div>
            </form>

    </div>
        </div>

</x-app-layout>
