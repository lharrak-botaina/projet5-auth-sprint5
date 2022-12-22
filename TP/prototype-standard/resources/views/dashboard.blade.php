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
                    <a href="{{route('task.create')}}" >Ajouter</a>
                    @endif
                    {{-- {{ __("You're logged in!") }} --}}
                    <table >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $value)


                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name_task}}</td>
                                @if (Auth::user())
                                <td>

                                    <form action="{{route('task.destroy',$value->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                    <button  class="btn btn-danger">Suprimer</button>
                                </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
