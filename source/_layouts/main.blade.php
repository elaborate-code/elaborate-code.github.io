<!DOCTYPE html>
<html lang="{{ $lang ?? 'en' }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W4WQNSDGS1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-W4WQNSDGS1');
    </script>

    {{--  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="{{ $page->baseUrl }}">
    <meta property="og:url" content="{{ $page->baseUrl }}" />

    <title> {{ $page->title }} </title>
    <meta property="og:title" content="{{ $page->title }}" />

    <meta name="description" content="{{ $page->description }}">
    <meta property="og:description" content="{{ $page->description }}" />

    <meta property="og:type" content="website" />

    <meta property="og:image" content="{{ $page->baseUrl }}assets/images/OG-image.png" />

    <meta property="og:locale" content="en_US" />

    {{-- scripts --}}
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Raleway&family=Yeseva+One&display=swap"
        rel="stylesheet">


    <link rel="manifest" href="/manifest.json">

    {{-- icons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicons/favicon-16x16.png">
    <link rel="mask-icon" href="/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#F22929">

    {{--  --}}
    <meta name="twitter:card" content="summary_large_image" />
</head>

<body class="font-raleway">
    @yield('body')
</body>

<footer class="bg-nero text-white-smoke" translate="no">

    <div class="py-4 px-2 bg-frozen-blue-dark">

        <div class="flex flex-col gap-4 container mx-auto">

            <div class="basis-full flex flex-wrap justify-center items-center gap-4 md:gap-8">
                @if ($page->socials->linkedin)
                    <a aria-label="Our Linkedin page" href="{{ $page->socials->linkedin }}" target="__blank">
                        <x-icons.linkedin class="h-12 aspect-square" />
                    </a>
                @endif
                @if ($page->socials->twitter)
                    <a aria-label="Our Twitter page" href="{{ $page->socials->twitter }}" target="__blank">
                        <x-icons.twitter class="h-12 aspect-square" />
                    </a>
                @endif
                @if ($page->socials->github)
                    <a aria-label="Our Github page" href="{{ $page->socials->github }}" target="__blank">
                        <x-icons.github class="h-12 aspect-square" />
                    </a>
                @endif
                @if ($page->socials->instagram)
                    <a aria-label="Our Instagram page" href="{{ $page->socials->instagram }}" target="__blank">
                        <x-icons.instagram class="h-12 aspect-square" />
                    </a>
                @endif
                @if ($page->socials->youtube)
                    <a aria-label="Our Youtube page" href="{{ $page->socials->youtube }}" target="__blank">
                        <x-icons.youtube class="h-12 aspect-square" />
                    </a>
                @endif
                @if ($page->socials->facebook)
                    <a aria-label="Our Facebook page" href="{{ $page->socials->facebook }}" target="__blank">
                        <x-icons.facebook class="h-12 aspect-square" />
                    </a>
                @endif
            </div>

            <div class="flex flex-wrap justify-center items-center gap-4">
                <a href="mailto:{{ $page->main_email }}" class="flex items-center h-12">
                    {{ $page->main_email }}
                </a>
                <a href="tel:{{ $page->main_phone }}" class="flex items-center h-12">
                    {{ $page->main_phone }}
                </a>
            </div>

            <div class="w-full text-xs">
                <p class="text-center underline" lang="en">
                    Free assets attributions:
                </p>
                <ul class="flex justify-around flex-wrap gap-2 p-2 list-disc">
                    <li>
                        <a target="__blank" href='https://www.freepik.com/photos/cloud-backup'
                            class="block w-32 min-h-[48px] md:w-40">
                            Cloud backup photo created by rawpixel.com - www.freepik.com</a>
                    </li>
                    <li>
                        <a target="__blank" href='https://www.freepik.com/photos/plexus'
                            class="block w-32 min-h-[48px] md:w-40">
                            Plexus photo created by kjpargeter - www.freepik.com</a>
                    </li>
                    <li>
                        <a target="__blank" href='https://www.freepik.com/photos/it-people'
                            class="block w-32 min-h-[48px] md:w-40">
                            It people photo created by ArthurHidden - www.freepik.com</a>
                    </li>
                    <li>
                        <a target="__blank" href='https://www.freepik.com/photos/man-work'
                            class="block w-32 min-h-[48px] md:w-40">
                            Man work photo created by ArthurHidden - www.freepik.com</a>
                    </li>
                    <li>
                        <a target="__blank" href='https://www.freepik.com/photos/network-engineer'
                            class="block w-32 min-h-[48px] md:w-40">
                            Network engineer photo created by senivpetro - www.freepik.com</a>
                    </li>
                    <li>
                        <a target="__blank" href='https://www.freepik.com/psd/laptop-mobile'
                            class="block w-32 min-h-[48px] md:w-40">
                            Laptop mobile psd created by riandra - www.freepik.com</a>
                    </li>
                    <li>
                        <a target="__blank" href='https://www.freepik.com/psd/website-mockup'
                            class="block w-32 min-h-[48px] md:w-40">
                            Website mockup psd created by aleksandr_samochernyi - www.freepik.com</a>
                    </li>
                    <li>
                        <a target="__blank" href='https://www.freepik.com/psd/browser-mockup'
                            class="block w-32 min-h-[48px] md:w-40">
                            Browser mockup psd created by designwarrior - www.freepik.com</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="flex justify-between container mx-auto px-6 py-2 md:px-4">
        <div class="flex items-center text-white-smoke text-center">
            <p>
                Copyright &copy; {{ date('Y') }}
            </p>
        </div>

        <div class="flex items-center text-white">
            @foreach (['en', 'fr'] as $lang_opt)
                @php
                    $href = $page->lang_route($lang, $lang_opt);
                @endphp

                <a href="{{ $href }}"
                    class="m-2 {{ $lang_opt === $lang ? 'underline underline-offset-1' : '' }}">
                    {{ strtoupper($lang_opt) }}
                </a>
            @endforeach
        </div>
    </div>

</footer>

</html>
