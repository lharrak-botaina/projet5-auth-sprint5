
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70">
                    <strong>created:</strong>{{$note->created_at->diffForHumans()}}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>updated:</strong>{{$note->updated_at->diffForHumans()}}
                </p>
                <a href="{{ route('notes.edit',$note) }}" class="btn-link ml-auto">Edit Note</a>
                <form action="{{ route('notes.destroy',$note) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('are you sure you want to delete this form?')">delete</button>
                </form>
               
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl">
                  {{ $note->title }}
                </h2>
                
                <p class="mt-2 whitespace-pre-wrap"> {{($note->text)  }}</p>
               
            </div>
           
        </div>
    </div>
</x-app-layout>
