<x-app-layout title="Discussion">
    <div class="px-6 mx-auto bg-blue-100 md:px-16">
        <div class="container grid grid-cols-3 gap-8">
            <div class="flex-col items-center hidden gap-6 py-16 md:flex md:gap-12">
                <a href="{{ route('create-thread') }}"
                    class="@guest hidden @endguest flex justify-center gap-2 w-full max-w-sm text-center py-3.5 text-md font-medium bg-blue-500 text-white hover:bg-blue-600 transition focus:outline-none focus:ring focus:ring-blue-200 rounded-lg duration-300">
                    <span><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg></span>New Thread</a>
                <div
                    class="w-full max-w-sm p-4 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-3 text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        Categories
                    </h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Choose one of our available
                        thread category.</p>
                    <ul class="my-4 space-y-3">
                        <li>
                            <a href="{{ route('show-thread', 'category=All-Discussion') }}"
                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">All Discussion</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('show-thread', 'category=Watery') }}"
                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg {{ Request::get('category') == 'Watery' ? 'bg-blue-500 hover:bg-blue-600' : 'bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white' }}">
                                <svg class="w-6 h-6" viewBox="0 0 90 90" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="90" height="90" fill="url(#pattern0)" />
                                    <defs>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_116_207" transform="scale(0.0111111)" />
                                        </pattern>
                                        <image id="image0_116_207" width="90" height="90"
                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAAEFUlEQVR4nO2dTWhVRxiGn5s/FdwotXFTf0qoQRRKiwvRSNWVkkJjFQylgmJLaUu7dSMuBEHcuOsisYhdFkRxrQRRKoIiQlpsLG3SFposoqmCopK4mDsLb73Nzc07882cnAfeTQgf8z1Mzplz5t4JlJSUlBSaDuA0MFnN6erPSsQMAjM1GTAdUQHZy38l+/QbjqtQvIW7VNQT/QBYYza6gtAGXKe+ZJ9r1d8taZLjzC7Z55jRGLPnXeAZjYt+DrxnMtKMaQNu0bhknztAu8F4s+Uoc5fsc8RgvFnSDTyhedFPgfXRR50ZLbgVRLOSfX4CWiOPPSu+Yf6Sfb6KPPZs6MQ9fKhETwEro3aQCefQSfY5E7WDDNgCTKMXPQ1sjthH0rTi1r9qyT63KW+MAHxLOMk+X0brJlHUN8B6mQRWROopSQYIL9nnu0g9JUc37kVQLNEvWKBPjJeIJ9nnfJTOEqKH+JJ9tkboLwkqNLZrEio3qmMoPPuwk+zTF7xLY9qBX7EXfY+CbxB8gb1kn88D92pGO/A79oJ9RinorD6EvdzaHAjasQGtuOuitdja/ILb1SkM/dhLrZd9AfuOSgW4i73QerlDQdbVH2Evc7b0Bus+IjexFzlbbgTrPhI7sJfYaLYFchCFC9gLbDQ/BnIQnNW4d8DWAhvNi+qYgxByDfk1eW2KtpLhY3kHMIH9LJ1r/iHQY3moGd1LnpuhncCuEIVDiT4YqG4Mshl7J3E3XdV5BryplhJiRu8l7y/utAN71EVDiP44QM3YJN/DG+R92fB5Xu1FhnpGf0jelw1PG7BbWVAteqe4niVJ9/IX9n/2qvwtdiOjG3s56qxTyVFeOjYJa6XC+6pCStEbhbVSQdZTKfr/2aAqpBQd7F2uIWtVhZSilwlrpYKsJ+U2+xNgsbBeCjwFligKKWd0oT7xU0U2EZVyHgtrpcIjVSGl6H+FtVJB1pNS9KiwVir8oSqkFH1PWCsVZD0pRQ8La6XCz6pCStFXhbVSYUhVSLmOruA+yyHdmTBkAnewyoyimHJGz+C+DVsULiKSHILt2L9DVqVH7EZKC/Ab9pLmmxHE3wJQPzZPA6fENS04ScKXDc8i8t47HCOjk9Y/xV5Ys9kfwEdQrmAvba4ZIsNvaHXhDvmzltdoHgJvBzERgRSOjGg02f+vAH8HTzkngnUfkQru6EprmfXyAxlel+vRBpzFXmptvqcYH8p8hQppXUZOUKCZ/Dr6iHN6Y71MkeFauVm6sFlnXybjJVyzVIBPgD8JL3iMAizf5ksH8BlwH73gEeAwGb27iEEFd8LAIDBO83LHcYfLbiOhm10yA6mhgvsk5we4g1vfAVYBy4Gl1d95hLupjuHO0hvGvasYxgkvKSkpKSkpKVmAvATk1RNTaABbIwAAAABJRU5ErkJggg==" />
                                    </defs>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Watery</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('show-thread', 'category=Financial') }}"
                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg {{ Request::get('category') == 'Financial' ? 'bg-green-400 hover:bg-green-500' : 'bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Financial</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('show-thread', 'category=Electricity') }}"
                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg {{ Request::get('category') == 'Electricity' ? 'bg-yellow-300 hover:bg-yellow-400' : 'bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Electricity</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('show-thread', 'category=Other') }}"
                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg {{ Request::get('category') == 'Other' ? 'bg-violet-300 hover:bg-violet-400' : 'bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Others</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center col-span-3 gap-6 py-16 md:col-span-2 md:gap-12">
                <form class="flex items-center w-full">
                    @if (Request::get('category'))
                        <input type="hidden" value="{{ Request::get('category') }}" name="category">
                    @endif
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="simple-search" name="search"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search discussion..." required>
                    </div>
                    <button type="submit"
                        class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                            class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg></button>
                </form>
                @forelse ($threads as $thread)
                    <div
                        class="w-full p-6 space-y-2 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <a href="{{ route('show-specific-thread', $thread->slug) }}"
                                    class="max-w-md text-2xl font-bold tracking-tight md:max-w-lg text-black-800 dark:text-white">{{ ucfirst($thread->title) }}</a>
                                <p class="text-sm text-black-200">{{ $thread->updated_at->diffForHumans() }}</p>
                            </div>
                            @if ($thread->threadCategory->name == 'Watery')
                                <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                    type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $thread->threadCategory->name }}</a>
                            @elseif($thread->threadCategory->name == 'Electricity')
                                <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                    type="button"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">{{ $thread->threadCategory->name }}</a>
                            @elseif($thread->threadCategory->name == 'Financial')
                                <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                    type="button"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ $thread->threadCategory->name }}</a>
                            @elseif($thread->threadCategory->name == 'Other')
                                <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                    type="button"
                                    class="text-white bg-violet-400 hover:bg-violet-500 focus:outline-none focus:ring-4 focus:ring-violet-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800">{{ $thread->threadCategory->name }}</a>
                            @else
                                <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                    type="button"
                                    class="text-white bg-rose-500 hover:bg-rose-600 focus:outline-none focus:ring-4 focus:ring-rose-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">{{ $thread->threadCategory->name }}</a>
                            @endif
                        </div>
                        <div class="flex items-center gap-4">
                            @if ($thread->user->profile_image)
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="{{ asset('storage/profile-pictures/' . $thread->user->profile_image) }}"
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
                                    {{ substr($thread->user->email, 0, strpos($thread->user->email, '@')) }}</h2>
                                <p class="text-sm text-black-200">{{ $thread->user->cluster->name }}</p>
                            </div>
                        </div>
                        @if ($thread->thread_image)
                            <div data-modal-toggle="defaultModal" class="cursor-pointer">
                                <img class="block object-cover w-36 h-36"
                                    src="{{ asset('storage/threads/' . $thread->thread_image) }}" alt="">
                            </div>
                            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <!-- Modal content -->
                                <div
                                    class="relative block max-w-2xl mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                                    <img src="{{ asset('storage/threads/' . $thread->thread_image) }}"
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
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $thread->description }}</p>
                    </div>
                @empty
                    <h2 class="text-2xl text-red-500">There are no discussion yet!</h2>
                @endforelse
                {{ $threads->appends(Request::all())->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
