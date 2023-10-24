<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Books</title>

    @vite(["resources/js/app.js", "resources/css/app.css"])
    @stack("resources")
</head>
<body class="bg-white dark:bg-zinc-800 dark:text-white">
    <header class="m-5 py-5 px-8 bg-red-600 flex justify-between items-center rounded-xl">
        <a href="{{ route("books.index") }}" class="flex items-center gap-3">
            <img
                src="/icons/book.svg"
                alt="book"
                class="w-10 h-10"
                style="filter: invert(100%)"
                id="brand-icon"
            >
            <h2 class="text-white text-xl">Books app</h2>
        </a>

        <form action="{{ route("books.index") }}" method="get" class="flex gap-3 items-center">
            <input
                type="text" class="input" name="search" id="search"
                value="{{ request()->get("search") }}"
            >
            <button type="submit" class="btn-dark">
                <img
                    class="w-8 h-8"
                    style="filter: invert(100%)"
                    src="/icons/search.svg"
                    alt="search"
                >
            </button>
        </form>

        <div class="flex gap-5">
            @auth
                <a
                    href="{{ route("books.create") }}"
                    title="Add book"
                    class="bg-transparent hover:bg-red-700 p-2 rounded-xl"
                >
                    <img
                        src="/icons/plus.svg"
                        alt="account"
                        class="w-10 h-10"
                        style="filter: invert(100%)"
                    />
                </a>
            @endauth

            <button
                title="Toggle theme"
                class="bg-transparent hover:bg-red-700 p-2 rounded-xl"
                id="theme-toggler"
            >
                <img
                    src="/icons/themes/dark.svg"
                    alt="account"
                    class="w-10 h-10"
                    style="filter: invert(100%)"
                />
            </button>

            <div class="flex flex-col justify-center relative">
                <button
                    type="button"
                    title="Account"
                    class="bg-transparent hover:bg-red-700 p-2 rounded-xl"
                    id="account-menu-toggler"
                >
                    <img
                        src="/icons/account.svg"
                        alt="account"
                        class="w-10 h-10"
                        style="filter: invert(100%)"
                    />
                </button>
                <div
                    class="bg-slate-100 dark:bg-zinc-900 p-3 rounded-xl absolute bottom-0 left-0 translate-y-full -translate-x-1/4"
                    style="display: none"
                    id="account-menu"
                >
                    @guest
                        <a
                            href="{{ route("login.form") }}"
                            class="dropdown-link rounded-t-xl"
                        >
                            Login
                        </a>
                        <a
                            href="{{ route("register.form") }}"
                            class="dropdown-link rounded-b-xl"
                        >
                            Register
                        </a>
                    @endguest
                    @auth
                        <a
                            href="{{ route("logout") }}"
                            class="dropdown-link rounded-xl"
                        >
                            Logout
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    <main class="p-5">
        @yield("content")
    </main>
</body>
</html>
