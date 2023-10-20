@extends("layout.main")

@section("content")
    <section class="w-full mt-20 flex justify-center items-center">
        <form
            method="POST"
            action="{{ route("register.submit") }}"
            class="form"
        >
            @csrf
            @method("POST")

            <h1 class="form-title">Register</h1>
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="input">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="input">
            </div>

            <div class="form-group">
                <label for="cpassword" class="form-label">Confirm password:</label>
                <input type="password" id="cpassword" name="cpassword" class="input">
            </div>

            <span class="flex justify-around">
                <button type="submit" class="btn">Register</button>
                <a href="{{ route("login.form") }}" type="submit" class="btn">Login</a>
            </span>
        </form>
    </section>
@endsection
