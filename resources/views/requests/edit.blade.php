<x-app-layout title="Edit Request">
    <div class="px-6 mx-auto md:px-16">
        <div class="container py-8">
            <h2 class="text-3xl font-semibold">Edit Request</h2>
            <form action="{{ route('update-request', $request) }}" method="POST" class="max-w-3xl space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <x-request-form action='Edit' :types="$types" :request="$request" />
            </form>
        </div>
    </div>
</x-app-layout>
