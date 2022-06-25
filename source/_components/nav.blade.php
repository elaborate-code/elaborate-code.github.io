@props(['page', 'lang'])

<nav class="absolute top-0 w-full">
    <div class="flex justify-between container mx-auto p-4 text-center">

        <a href="{{ $page->route('/', $lang) }}" class="flex items-center gap-2">
            <x-logo class="h-9 w-fit mx-auto text-white" />
            <p class="w-max text-white text-left text-sm sm:text-base md:text-lg" translate="no"> {{ $page->name }} </p>
        </a>

        <x-nav-langs :page="$page" lang="{{ $lang }}" />

    </div>
</nav>
