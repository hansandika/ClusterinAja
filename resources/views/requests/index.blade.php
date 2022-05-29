<x-app-layout title="Request">
    <div class="px-6 mx-auto md:px-16">
        <div class="container py-8">
            <div class="flex items-center justify-between pb-2 border-b-2">
                <h2 class="text-2xl font-bold">My Request</h2>
                <a href="{{ route('create-request') }}" type="button"
                    class="@guest hidden @endguest text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 md:px-5 md:py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                    Request</a>
            </div>
            <div class="flex flex-col items-start gap-4 pt-5 md:items-center md:flex-row">
                <p class="text-black-200">{{ $requests->total() }} Requests</p>
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('show-request', 'category=Newest') }}" type="button"
                        class="{{ Request::get('category') == 'Newest' || !Request::get('category') ? 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-700' : 'text-blue-700 bg-blue-200 hover:bg-blue-300 focus:ring-blue-600' }} focus:ring-2 font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">Newest</a>
                    <a href="{{ route('show-request', 'category=Help') }}" type="button"
                        class="{{ Request::get('category') == 'Help' ? 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-700' : 'text-blue-700 bg-blue-200 hover:bg-blue-300 focus:ring-blue-600' }} focus:ring-2 font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">Help</a>
                    <a href="{{ route('show-request', 'category=Maintanance') }}" type="button"
                        class="{{ Request::get('category') == 'Maintanance' ? 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-700' : 'text-blue-700 bg-blue-200 hover:bg-blue-300 focus:ring-blue-600' }} focus:ring-2 font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">Maintanance</a>
                    <a href="{{ route('show-request', 'category=Repair') }}" type="button"
                        class="{{ Request::get('category') == 'Repair' ? 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-700' : 'text-blue-700 bg-blue-200 hover:bg-blue-300 focus:ring-blue-600' }} focus:ring-2 font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">Repair</a>
                </div>
            </div>
            <div
                class="flex flex-col items-center max-w-sm gap-6 py-8 mx-auto md:py-12 md:max-w-md lg:max-w-4xl md:gap-12">
                @forelse ($requests as $request)
                    <div
                        class="w-full p-6 space-y-2 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center justify-between w-full gap-2 md:flex-row">
                            <div class="flex flex-col items-start w-full gap-2 md:gap-4 md:items-center md:flex-row">
                                <h2
                                    class="max-w-md text-2xl font-bold tracking-tight md:max-w-lg text-black-800 dark:text-white">
                                    {{ ucfirst($request->title) }}</h2>
                                <p class="text-sm text-black-200">{{ $request->updated_at->diffForHumans() }}</p>
                                <div class="flex gap-2 md:hidden">
                                    <a href="{{ route('show-request', 'category=' . ucfirst($request->requestCategory->name)) }}"
                                        type="button"
                                        class="text-sm font-medium text-center text-blue-700">{{ ucfirst($request->requestCategory->name) }}</a>
                                    @if ($request->status == 1)
                                        <a href="{{ route('show-request', 'status=Finished') }}" type="button"
                                            class="text-sm font-medium text-center text-green-700">Finished</a>
                                    @elseif($request->status == 2)
                                        <a href="{{ route('show-request', 'status=In-Progress') }}" type="button"
                                            class="text-sm font-medium text-center text-blue-700">In
                                            Progress</a>
                                    @elseif($request->status == 3)
                                        <a href="{{ route('show-request', 'status=Not-Finished') }}" type="button"
                                            class="text-sm font-medium text-center text-rose-500">Not
                                            Finished</a>
                                    @endif
                                </div>
                            </div>
                            <div class="items-center hidden gap-2 md:flex min-w-fit">
                                <a href="{{ route('show-request', 'category=' . ucfirst($request->requestCategory->name)) }}"
                                    type="button"
                                    class="text-blue-700 bg-blue-200 hover:bg-blue-300 focus:ring-blue-600 focus:outline-none focus:ring-2 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-rose-600">{{ ucfirst($request->requestCategory->name) }}</a>
                                @if ($request->status == 1)
                                    <a href="{{ route('show-request', 'status=Finished') }}" type="button"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Finished</a>
                                @elseif($request->status == 2)
                                    <a href="{{ route('show-request', 'status=In-Progress') }}" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">In
                                        Progress</a>
                                @elseif($request->status == 3)
                                    <a href="{{ route('show-request', 'status=Not-Finished') }}" type="button"
                                        class="text-white bg-rose-500 hover:bg-rose-600 focus:outline-none focus:ring-4 focus:ring-rose-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">Not
                                        Finished</a>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            @can('update', $request)
                                <a href="{{ route('edit-request', $request) }}"
                                    class="text-green-700 hover:underline hover:text-green-800">Edit</a>
                            @endcan
                            @can('delete', $request)
                                <form action="{{ route('delete-request', $request) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-red-700 hover:underline hover:text-red-800">Delete</button>
                                </form>
                            @endcan
                        </div>
                        <div class="flex items-center gap-4">
                            @if ($request->user->profile_image)
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="{{ asset('storage/profile-pictures/' . $request->user->profile_image) }}"
                                    alt="">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                            <div>
                                <h2 class="text-lg">
                                    {{ substr($request->user->email, 0, strpos($request->user->email, '@')) }}</h2>
                                <p class="text-sm text-black-200">{{ $request->user->cluster->name }}</p>
                            </div>
                        </div>
                        @if ($request->request_image)
                            <div data-modal-toggle="defaultModal" class="cursor-pointer">
                                <img class="block object-cover w-36 h-36"
                                    src="{{ asset('storage/requests/' . $request->request_image) }}" alt="">
                            </div>
                            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <!-- Modal content -->
                                <div
                                    class="relative block max-w-2xl mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                                    <img src="{{ asset('storage/requests/' . $request->request_image) }}"
                                        class="object-cover w-auto h-screen" alt="">
                                    <button type="button"
                                        class="absolute right-0 top-0 text-gray-400 bg-gray-100 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="defaultModal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ Str::limit($request->description, 125) }}</p>
                    </div>
                @empty
                    <h2 class="text-2xl text-red-500">There are no request yet!</h2>
                @endforelse
                {{ $requests->appends(Request::all())->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
