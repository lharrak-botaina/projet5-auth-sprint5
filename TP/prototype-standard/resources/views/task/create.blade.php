<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::user())
                    {{-- <a href="{{route('task.create')}}" >Ajouter</a> --}}
                    @endif
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{route('task.store')}}" method="POST">
                        @csrf
                        <input type="text" placeholder="nom" name="name_task"></br>
                        <button class="btn btn-primary ">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
