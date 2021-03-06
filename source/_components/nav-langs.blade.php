@props(['page', 'lang' => $page->current_path_lang()])

<div {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    @foreach ($page->site_langs as $translated_lang)
        <a href="{{ $page->translated_url($translated_lang) }}"
            class="m-2 {{ $translated_lang === $lang ? 'underline underline-offset-1' : '' }}">
            {{ strtoupper($translated_lang) }}
        </a>
    @endforeach
</div>
