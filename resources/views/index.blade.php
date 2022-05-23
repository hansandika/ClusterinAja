<x-app-layout title='Home'>
    <div class="px-6 mx-auto bg-blue-100 md:px-16">
        <section id="hero" class="container py-8">
            <div class="flex flex-col-reverse items-center justify-between md:flex-row">
                <div class="flex flex-col items-center gap-8 md:gap-12 md:items-start">
                    <div class="space-y-3 text-center md:text-left">
                        <h3 class="text-4xl font-bold md:text-5xl text-black-600">{{ strtoupper('Its Easy To') }}</h3>
                        <h3 class="text-4xl font-bold md:text-5xl text-black-600">{{ strtoupper('Live in Cluster') }}
                    </div>
                    </h3>
                    <p class="w-4/6 font-medium leading-loose text-center md:text-left text-black-300">Cluster services,
                        including discussion, and
                        requesting
                        help. Meet the right
                        platform to help
                        you.
                    </p>
                    <div>
                        <a href="{{ route('show-thread') }}"
                            class="px-10 py-2.5 text-md font-medium bg-blue-600 text-white hover:bg-blue-700 transition focus:outline-none focus:ring focus:ring-blue-200 rounded duration-300">Go
                            to Discussion</a>
                    </div>
                    <div class="flex gap-8">
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-800" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Free Registration</span>
                        </div>
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-800" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Great Services</span>
                        </div>
                    </div>
                </div>
                <div class="w-3/4 md:w-auto">
                    <img src="{{ asset('img/cluster-illustration.png') }}" alt="">
                </div>
            </div>
        </section>
        <section id="features" class="py-8 pb-32">
            <div class="container flex flex-col gap-8 mx-auto mt-10 md:flex-row md:space-y-0">
                <div class="flex flex-col items-center space-y-4 md:space-y-9 md:w-1/2 md:items-start">
                    <h2 class="max-w-md text-4xl font-semibold text-center md:text-left text-black-800">
                        What's different about ClusterinAja?
                    </h2>
                    <p class="max-w-sm font-medium leading-loose text-center md:text-left text-black-300">
                        Manage and provide all the functionality your needs, without the complexity.
                    </p>
                </div>
                <div class="flex flex-col space-y-8 md:w-1/2">
                    <!-- List Item 1 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <div class="bg-blue-700 rounded-l-full md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <div class="px-4 py-2 text-white bg-blue-500 rounded-full md:py-1">
                                    01
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Getting services become easier
                                </h3>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Getting services become easier
                            </h3>
                            <p class="text-black-400">
                                Every needs can requested easily and stored in database and get fast response from the
                                cluster.
                            </p>
                        </div>
                    </div>

                    <!-- List Item 2 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <div class="bg-blue-700 rounded-l-full md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <div class="px-4 py-2 text-white bg-blue-500 rounded-full md:py-1">
                                    02
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Ease of Use
                                </h3>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Ease of Use
                            </h3>
                            <p class="text-black-400">
                                Users can access the website easily without getting confused with the feature.
                            </p>
                        </div>
                    </div>

                    <!-- List Item 3 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <div class="bg-blue-700 rounded-l-full md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <div class="px-4 py-2 text-white bg-blue-500 rounded-full md:py-1">
                                    03
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Everything you need in one place
                                </h3>
                            </div>
                        </div>
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Everything you need in one place
                            </h3>
                            <p class="text-black-400">
                                Stop jumping from one service to another to communicate, and get request. Manager offers
                                an all-in-one team productivity solution.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
