@props(['page', 'lang' => current_path_locale($page)])

<div {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    @foreach ($page->site_langs as $translated_lang)
        <a href="{{ translate_path($page, $translated_lang) }}"
            class="m-2 {{ $translated_lang === $lang ? 'underline underline-offset-1' : '' }}">
            {{ strtoupper($translated_lang) }}
        </a>
    @endforeach
</div>
