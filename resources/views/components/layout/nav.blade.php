<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">

        <div class="">
            <a href="/" class="text-xl font-bold">
                <img src="/images/logo.png" alt="Idea logo" width="100">

            </a>
        </div>

        <div class="flex gap-x-5 items-center">
            @auth
                <span class="text-sm text-gray-500">Welcome, {{ auth()->user()->name }}</span>
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-test="logout-test" class="btn-outlined">Logout</button>
                </form>
            @endauth

            @guest
                <a href="/login">Sign In</a>
                <a href="/register" class="btn">Register</a>
            @endguest
        </div>
    </div>

</nav>
