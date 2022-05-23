<x-app-layout title='{{ $thread->title }}'>
    <div class="px-6 mx-auto bg-blue-100 md:px-16">
        <div class="container grid grid-cols-3 gap-8 py-16">
            <div class="col-span-3 space-y-6 md:col-span-2">
                <div class="p-6 space-y-2 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h2 class="text-3xl font-semibold">{{ ucfirst($thread->title) }}</h2>
                    <div class="flex items-center gap-1">
                        @if ($thread->threadCategory->name == 'Watery')
                            <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                class="text-blue-500 transition duration-300 hover:underline hover:text-blue-600">{{ $thread->threadCategory->name }}</a>
                        @elseif($thread->threadCategory->name == 'Electricity')
                            <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                class="text-yellow-400 transition duration-300 hover:underline hover:text-yellow-600">{{ $thread->threadCategory->name }}</a>
                        @elseif($thread->threadCategory->name == 'Financial')
                            <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                class="text-green-400 transition duration-300 hover:underline hover:text-green-600">{{ $thread->threadCategory->name }}</a>
                        @elseif($thread->threadCategory->name == 'Other')
                            <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                class="transition duration-300 hover:underline text-violet-400 hover:text-violet-600">{{ $thread->threadCategory->name }}</a>
                        @else
                            <a href="{{ route('show-thread', 'category=' . $thread->threadCategory->name) }}"
                                class="transition duration-300 hover:underline text-rose-400 hover:text-rose-600">{{ $thread->threadCategory->name }}</a>
                        @endif
                        <span class="text-black-200"> - {{ $thread->updated_at->format('d F, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-4">
                        @if ($thread->user->profile_image)
                            <img class="object-cover w-8 h-8 rounded-full"
                                src="{{ asset('storage/profile-pictures/' . $thread->user->profile_image) }}" alt="">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
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
                        <div>
                            <div data-modal-toggle="defaultModal" class="cursor-pointer">
                                <img class="block object-cover w-64 h-64"
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
                        </div>
                    @endif
                    <p>{{ $thread->description }}</p>
                    <div class="flex items-center gap-2">
                        @can('update', $thread)
                            <a href="{{ route('edit-thread', $thread) }}"
                                class="text-green-700 hover:underline hover:text-green-800">Edit</a>
                        @endcan
                        @can('delete', $thread)
                            <form action="{{ route('delete-thread', $thread) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="text-red-700 hover:underline hover:text-red-800">Delete</button>
                            </form>
                        @endcan
                    </div>
                    @if ($thread->comments->count() > 0)
                        <div class="flex flex-col gap-5 pt-8">
                            @foreach ($thread->comments as $comment)
                                <div class="flex items-start gap-4">
                                    <div>
                                        @if ($comment->user->profile_image)
                                            <img class="w-8 h-8 rounded-full"
                                                src="{{ $comment->user->profile_image }}" alt="">
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 w-9 h-9"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex flex-col p-4 border-2 border-gray-200 bg-gray-50 rounded-3xl">
                                        <h3>{{ substr($comment->user->email, 0, strpos($comment->user->email, '@')) }}
                                        </h3>
                                        <p>{{ $comment->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @auth
                        <div class="flex items-start gap-4 pt-8">
                            @if (Auth::user()->profile_image)
                                <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_image }}"
                                    alt="user photo">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 w-9 h-9" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                            <form class="w-full" action="{{ route('store-comment', $thread) }}" method="POST">
                                @csrf
                                <div
                                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                        <label for="comment" class="sr-only">Your comment</label>
                                        <textarea id="comment" name="comment" rows="4"
                                            class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                            placeholder="Write a comment..." required></textarea>
                                    </div>
                                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                        <button type="submit"
                                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                            Post comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="flex-col hidden gap-4 md:flex">
                @foreach ($threads as $currThread)
                    <div
                        class="h-auto max-w-sm p-6 space-y-2 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('show-specific-thread', $currThread->slug) }}">
                            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ ucfirst($currThread->title) }}</h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $currThread->description }}</p>
                        <div class="flex items-center gap-2">
                            @if ($currThread->user->profile_image)
                                <img class="w-8 h-8 rounded-full" src="{{ $currThread->user->profile_image }}"
                                    alt="">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                            <p>{{ substr($currThread->user->email, 0, strpos($currThread->user->email, '@')) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
