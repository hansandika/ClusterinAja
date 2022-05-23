<footer class="py-6 mx-auto text-white md:px-16 md:py-12 bg-black-700">
    <div class="container flex flex-col items-center justify-between gap-8 md:flex-row">
        <div class="flex space-x-4">
            <a href="{{ route('show-home') }}" class="font-medium">Home</a>
            <a href="{{ route('show-thread') }}" class="font-medium">Discussion</a>
            @auth
                <a href="{{ route('show-request') }}" class="font-medium">Request</a>
            @endauth
        </div>
        <div class="flex flex-col items-center justify-center gap-4">
            <img src="{{ asset('img/logo-white.png') }}" class="w-44" alt="">
            <p>Copyright &copy; 2022, All Rights Reserved</p>
        </div>
        <div class="flex flex-col items-center justify-center gap-4">
            <p class="text-2xl font-semibold">Contact Us</p>
            <div class="flex space-x-3 text-2xl text-white">
                <a class="cursor-pointer hover:text-red-500"><i class="fab fa-youtube"></i></a>
                <a class="cursor-pointer hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                <a class="cursor-pointer hover:text-blue-700"><i class="fab fa-facebook"></i></a>
                <a class="cursor-pointer hover:text-pink-600"><i class="fab fa-pinterest"></i></a>
                <a class="cursor-pointer hover:text-rose-600"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
