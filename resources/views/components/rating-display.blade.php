
<div {{ $attributes->merge([ "class" => "flex gap-2" ]) }}>
    @for ($i = 0; $i < floor($rating); $i++)
        <img
            src="/icons/stars/filled-star.svg"
            alt="star"
            class="w-10 h-10 dark:filter-invert"
        >
    @endfor
    @if ($rating - floor($rating) > 0)
        <div class="w-10 h-10 relative">
            <img
                src="/icons/stars/half-filled-star.svg"
                alt="star"
                class="w-full h-full dark:filter-invert"
            >
            <img
                src="/icons/stars/star.svg"
                alt="star"
                class="absolute top-0 left-0 w-full h-full dark:filter-invert"
            >
        </div>
    @endif
    @for ($i = 0; $i < 5 - ceil($rating); $i++)
        <img
            src="/icons/stars/star.svg"
            alt="star"
            class="w-10 h-10 dark:filter-invert"
        >
    @endfor
</div>
