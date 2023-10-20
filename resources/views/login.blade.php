@extends("layout.main")

@section("content")
    <section class="w-full mt-20 flex justify-center items-center">
        <form
            method="POST"
            action="{{ route("login.submit") }}"
            class="form"
        >
            @csrf
            @method("POST")

            <h1 class="form-title">Login</h1>

            @error("email")
                <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    @class(["input", "border-red-600" => $errors->has("email")])
                >
            </div>

            @error("password")
                <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    @class(["input", "border-red-600" => $errors->has("password")])
                >
            </div>

            <span class="flex justify-around">
                <button type="submit" class="btn">Login</button>
                <a href="{{ route("register.form") }}" type="submit" class="btn">Register</a>
            </span>
        </form>
    </section>
@endsection
