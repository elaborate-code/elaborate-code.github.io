@extends('_layouts.main')

@section('body')
    <section class="h-screen hero-bg sm:hero-bg-alt text-white">
        <div class="container h-full m-auto flex flex-col">

            <nav class="h-20 bg-white opacity-10"></nav>

            <div class="flex-1 flex flex-col justify-center">

                <div class="px-8 md:px-20 xl:px-48">
                    <h1 class="mb-10 text-4xl md:text-5xl xl:text-7xl font-yeseva-one text-center">
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

    <section class="py-32 md:py-16 px-12 bg-white">

        <h2 class="mb-12 text-nero text-4xl font-bold   text-center"> Our services </h2>

        @foreach ($page->services as $service)
            <div
                class="w-full lg:w-[1000px] 2xl:w-[1200px] mx-auto mb-8 flex flex-col-reverse md:even:flex-row-reverse  md:odd:flex-row justify-between bg-frozen-blue-50 rounded-3xl">

                <div class="p-4 md:pr-8 lg:pr-16 basis-2/5 flex flex-col justify-center">
                    <h3 class="mb-5 text-bloodmyst-isle-dark text-3xl font-merriweather"> {{ $service->title }} </h3>
                    <p class="text-frozen-blue-dark">
                        {{ $service->description }}
                    </p>
                </div>

                <div class="w-full md:w-[450px] lg:w-[640px] flex flex-col justify-center">
                    <img src="{{ $service->img }}" class="object-scale-down rounded-3xl">
                </div>

            </div>
        @endforeach


    </section>

    <section class="bg-frozen-blue-50 h-96"></section>
@endsection
