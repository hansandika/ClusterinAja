<x-app-layout title="Create Discussion">
    <div class="px-6 mx-auto md:px-16">
        <div class="container py-8">
            <h2 class="text-3xl font-semibold">Create Thread</h2>
            <form action="{{ route('store-thread') }}" method="POST" class="max-w-3xl space-y-6"
                enctype="multipart/form-data">
                @csrf
                <x-thread-form action='Create' :types="$types" />
            </form>
        </div>
    </div>
</x-app-layout>
