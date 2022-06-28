@props(['page', 'lang'])

<div {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    @foreach (['en', 'fr'] as $lang_opt)
        @php
            $href = $page->lang_route($lang, $lang_opt);
        @endphp

        <a href="{{ $href }}" class="m-2 {{ $lang_opt === $lang ? 'underline underline-offset-1' : '' }}">
            {{ strtoupper($lang_opt) }}
        </a>
    @endforeach
</div>