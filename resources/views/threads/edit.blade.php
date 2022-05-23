<x-app-layout title="Edit Discussion">
    <div class="px-6 mx-auto bg-blue-100 md:px-16">
        <div class="container py-8">
            <h2 class="text-3xl font-semibold">Edit Thread</h2>
            <form action="{{ route('update-thread', $thread) }}" method="POST" class="max-w-3xl space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <x-thread-form action='Edit' :types="$types" :thread="$thread" />
            </form>
        </div>
    </div>
</x-app-layout>
