@props(['page', 'lang'])

<nav {{ $attributes->merge(['class' => '']) }}>

    <x-hamburger-menu :page="$page" lang="{{ $lang }}" class="" />

    <div class="flex justify-between container mx-auto p-4 text-center">

        <a href="{{ $page->route('/', $lang) }}" class="flex items-center gap-2">
            <x-logo class="h-9 w-fit mx-auto" />
            <p class="w-maxtext-left text-sm text-left sm:text-base md:text-lg" translate="no"> {{ $page->name }} </p>
        </a>

        {{-- <x-nav-langs :page="$page" lang="{{ $lang }}" /> --}}
        <div x-data x-on:click="$dispatch('open-hamburger')" class="sm:hidden w-8 h-8">
            <x-icons.hamburger />
        </div>

    </div>
</nav>
