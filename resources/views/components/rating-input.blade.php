@push("resources")
    @vite(["resources/js/stars.js"])
@endpush
<div class="flex items-center mb-4">
    <label
        for="rating"
        style="margin-right: {{ $labelMargin }}rem"
    >
        Rating:
    </label>
    <input type="hidden" id="rating" name="rating" value="{{ $value }}">
    <div class="flex gap-2" id="stars">
        @for ($i = 0; $i < 5; $i++)
            <div class="relative w-10 h-10" id="star-{{ $i }}">
                <img
                    src="/icons/stars/star.svg"
                    alt="star"
                    class="w-full h-full dark:filter-invert"
                >
                <img
                    src="/icons/stars/star.svg"
                    alt="star"
                    class="w-full h-full absolute top-0 left-0 dark:filter-invert"
                >
                <div class="absolute top-0 left-0 w-full h-full flex">
                    <button
                        type="button"
                        id="first-{{$i}}"
                        class="w-full h-full"
                    ></button>
                    <button
                        type="button"
                        id="second-{{$i}}"
                        class="w-full h-full"
                    ></button>
                </div>
            </div>
        @endfor
    </div>
</div>
