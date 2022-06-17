@extends('_layouts.main')

@section('body')
    <section class="h-screen hero-bg sm:hero-bg-alt text-white">
        <div class="container h-full m-auto flex flex-col">

            <nav class="h-20 bg-white opacity-10"></nav>

            <div class="flex-1 flex flex-col justify-center">

                <div class="px-8 md:px-20 xl:px-48">
                    <h1 class="mb-10 text-4xl md:text-5xl xl:text-7xl text-center">
                        The ultimate <span class="text-bloodmyst-isle"> digitalisation </span> services
                        For the ultimate productivity
                    </h1>

                    <p class="mb-8 md:px-20 lg:px-36 text-xl text-center">
                        Our team is skilled and love their work and are ready to channel their energy toward understanding
                        the needs of your team and help them upgrade their workflows doing the things they love
                    </p>

                    <button
                        class="block m-auto py-3 px-12 bg-white-smoke hover:bg-firecracker-salmon hover:shadow-inner text-bloodmyst-isle hover:text-nero text-lg font-bold rounded-full">
                        Hire us
                    </button>
                </div>
            </div>

        </div>
    </section>

    {{-- <section class="bg-gray-100 h-24"> our partners </section> --}}

    {{-- <section class="bg-white h-96">

    </section>

    <section class="bg-gray-50 h-96"></section> --}}
@endsection
