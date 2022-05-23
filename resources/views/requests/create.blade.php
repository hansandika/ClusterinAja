<x-app-layout title="Create Request">
    <div class="px-6 mx-auto bg-blue-100 md:px-16">
        <div class="container py-8">
            <h2 class="text-3xl font-semibold">Create Request</h2>
            <form action="{{ route('store-request') }}" method="POST" class="max-w-3xl space-y-6"
                enctype="multipart/form-data">
                @csrf
                <x-request-form action='Create' :types="$types" />
            </form>
        </div>
    </div>
</x-app-layout>
