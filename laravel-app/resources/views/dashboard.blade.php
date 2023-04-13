<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="text-center">
            {{ __('Dashboard') }}
            </div>
        </h2>

    </x-slot>

    <div class="mx-auto max-w-4xl mt-10" >
        <div class="max-w-sm p-6 mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">You're logged in!</h5>
        </a>
        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Wait until the admin assigns you a task</p>

    </div>

        </div>
    </div>

</x-app-layout>
