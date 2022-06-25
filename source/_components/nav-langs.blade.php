@props(['page', 'lang'])

<div class="basis-1/2 flex justify-end items-center text-white text-sm">
    @foreach (['en', 'fr'] as $lang_opt)
        @php
            $href = $page->lang_route($lang, $lang_opt);
        @endphp

        <a href="{{ $href }}" class="m-2 {{ $lang_opt === $lang ? 'underline underline-offset-1' : '' }}">
            {{ strtoupper($lang_opt) }}
        </a>
    @endforeach
</div>
