@extends('_layouts.main')

@section('body')
    <section class="h-screen hero-bg sm:hero-bg-alt text-white">
        <div class="container h-full m-auto flex flex-col">

            <nav class="h-20 bg-white opacity-10"></nav>

            <header class="flex-1 flex flex-col justify-center">

                <div class="px-8 md:px-20 xl:px-48">
                    <h1 class="text-4xl md:text-5xl xl:text-7xl font-yeseva-one text-center">
                        The ultimate <span class="text-bloodmyst-isle animate-pulse"> digitalisation </span> services
                        For the ultimate productivity
                    </h1>

                    <div class="w-32 h-1 my-4 mx-auto bg-frozen-blue-50 rounded-full"></div>

                    <p class="mb-8 md:px-20 lg:px-36 text-xl text-center">
                        Achieve more by adopting automated workflows and networking informations between the various
                        segments of your company
                    </p>

                    <button
                        class="block m-auto py-3 px-12 bg-white-smoke hover:bg-firecracker-salmon hover:shadow-inner text-bloodmyst-isle hover:text-nero text-lg font-bold rounded-full">
                        Hire us
                    </button>
                </div>
            </header>

        </div>
    </section>

    {{-- <section class="bg-gray-100 h-24"> our partners </section> --}}

    <section class="py-32 md:py-16 px-12 bg-white">

        <h2 class="mb-12 text-nero text-4xl font-bold font-yeseva-one text-center"> Our services </h2>

        @foreach ($page->services as $service)
            <x-cards.service :service="$service" />
        @endforeach

    </section>

    <section class="bg-frozen-blue-50 h-96"></section>
@endsection
