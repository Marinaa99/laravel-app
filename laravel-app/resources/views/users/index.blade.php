<x-app-layout>
    <div class="container">

        <x-slot name="header">
            <div class="text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                USERS LIST
            </h2>
            </div>
        </x-slot>

        <div>
            <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="block mb-8">

        <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add user</a>
                </div>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table  class="min-w-full divide-y divide-gray-200 w-full">
            <thead>
            <tr>
                <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">


                        <div class="flex">
                        <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="text-red-600 hover:text-red-900 mb-2 mr-2" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
                                <div class="p-4">
                                    {{ $users->links() }}
                                </div>
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
