<x-app-layout>
    <div class="container">
        <x-slot name="header">
            <div class="text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                EDIT USER
            </h2>
            </div>
        </x-slot>


        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <a href="{{ route('users.index') }}" class="flex items-center space-x-2 text-gray-600 hover:text-gray-900 mb-5">
                <svg class="w-6 h-6 inline-block align-text-bottom" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v12a1 1 0 01-1.7.7l-6-6a1 1 0 010-1.4l6-6A1 1 0 0110 3z" clip-rule="evenodd" />
                </svg>


                <span>GO BACK </span>
            </a>
            <div class="mt-5 md:mt-0 md:col-span-2">

                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email" class="form-input rounded-md shadow-sm mt-1 block w-full" @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                    @error('email')
                                    <span class="text-sm text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Update') }}
                                    </button>
                                </div>

                        </form>
                    </div>

        </div>
    </x-app-layout>
