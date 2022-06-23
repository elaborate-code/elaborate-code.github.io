@extends('_layouts.main')

@section('body')
    <nav class="absolute top-0 w-full">
        <div class="container mx-auto p-4 text-center">
            <x-logo class="h-9 mx-auto text-white" />
            <p class="text-white"> {{ $page->name }} </p>
        </div>
    </nav>

    <main class="scroll-smooth">

        <section name="hero section" class="h-screen hero-bg sm:hero-bg-alt">
            <header class="container h-full mx-auto flex flex-col text-white">

                <div class="flex-1 flex flex-col justify-center">

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

                        <a href="#cta"
                            class="block w-fit mx-auto py-3 px-12 bg-white-smoke text-bloodmyst-isle-700 hover:bg-firecracker-salmon hover:shadow-inner  hover:text-nero text-lg font-bold rounded-full">
                            Request a service
                        </a>
                    </div>
                </div>

            </header>
        </section>

        {{-- <section name="Clients and partners" class="bg-gray-100 h-24"> our partners/clients </section> --}}

        <section name="Who are we" class="sticky top-0 -z-10 p-10 md:py-16 md:px-12 bg-white-smoke">

            <h2 class="mb-6 text-bloodmyst-isle text-4xl font-bold font-yeseva-one text-center"> Who are we</h2>

            <p class="w-full sm:w-96 mx-auto text-center">
                {{ $page->who_are_we->short->$lang }}
            </p>
        </section>

        <section name="Our services" class="bg-white">

            <div class="container mx-auto py-10 px-4 md:py-16 md:px-6">


                <h2 class="mb-12 text-nero text-4xl font-bold font-yeseva-one text-center"> Our services </h2>

                @foreach ($page->services as $service)
                    <x-cards.service service-title="{{ $service->title }}" service-desc="{{ $service->desc->$lang }}"
                        service-img="{{ $service->img }}" service-img-alt="{{ $service->imgAlt }}" />
                @endforeach
            </div>
        </section>

        <section name="CTA" id="cta" class="bg-bloodmyst-isle-dark py-10 px-4">
            <h2 class="mb-4 text-bloodmyst-isle text-4xl font-bold font-merriweather text-center"> Are you intrested in our
                services ? </h2>

            <p class="mb-2 text-white text-center">
                Let us know your E-mail and phone number and we will reach out to you shortly
            </p>

            {{-- https://formsubmit.co/ajax-documentation --}}
            <form action="https://formsubmit.co/ee12d2b34596e814d47702339907bd3e" method="POST">
                <div class="flex flex-col justify-center items-center md:flex-row gap-4 text-lg font-merriweather">

                    <input type="hidden" name="_subject" value="Elaborate Code service request">
                    <input type="hidden" name="_template" value="table">

                    <input type="hidden" name="_captcha" value="false">
                    <input type="text" name="_honey" style="display:none">
                    <input type="hidden" name="_next" value="{{ $page->getUrl() }}">
                    {{-- <input type="hidden" name="_autoresponse" value="your custom message"> --}}

                    <input type="email" name="email" placeholder="email" required
                        class="w-72 h-14 px-4 outline-none border-none rounded-sm">

                    <input type="tel" name="phone" placeholder="phone" required
                        class="w-56 h-14 px-4 outline-none border-none rounded-sm">

                    <button
                        class="h-14 w-40 bg-bloodmyst-isle-light text-bloodmyst-isle-dark font-bold text-center rounded-sm shadow-sm hover:shadow-white-smoke">
                        Send </button>
                </div>
            </form>

            <a class="block mt-4 cursor-pointer text-firecracker-salmon-light text-sm text-center underline" href="#">
                Or send us a detailed message
            </a>
        </section>

        <section name="Featured project" class="py-8 bg-white">

            <h2 class="mb-6 px-4 md:px-6 text-nero text-4xl font-bold font-yeseva-one text-center">
                Our Featured applications
            </h2>

            <div class="flex flex-wrap justify-center gap-12 container mx-auto">

                @foreach ($page->projects as $project)
                    <x-cards.project project-name="{{ $project->name }}" project-desc="{{ $project->desc->$lang }}"
                        project-img="{{ $project->img }}" project-href="{{ $project->href }}" {{-- class="{{ $loop->even ? 'project-card-frozen-blue-theme' : 'project-card-bloodmyst-isle-theme' }}" /> --}}
                        class="{{ true ? 'project-card-frozen-blue-theme' : 'project-card-bloodmyst-isle-theme' }}" />
                @endforeach
            </div>

        </section>

    </main>

    <footer class="bg-nero text-white-smoke">

        <div class="p-8 bg-frozen-blue-dark">
            <div class="container mx-auto">

                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="basis-full md:basis-1/2 flex justify-around items-center">
                        <a href="https://www.linkedin.com/company/elaboratecode" target="__blank" class="flex">
                            <x-icons.linkedin class="h-10 aspect-square" />
                        </a>
                        <a href="https://github.com/elaborate-code" target="__blank" class="flex">
                            <x-icons.github class="h-10 aspect-square" />
                        </a>
                    </div>

                    <div class="basis-full md:basis-1/2 text-xs">
                        <p> Free assets attributions: </p>
                        <ul class="list-disc">
                            <li>
                                <a target="__blank" href='https://www.freepik.com/photos/cloud-backup'>
                                    Cloud backup photo created by rawpixel.com - www.freepik.com</a>
                            </li>
                            <li>
                                <a target="__blank" href='https://www.freepik.com/photos/plexus'>
                                    Plexus photo created by kjpargeter - www.freepik.com</a>
                            </li>
                            <li>
                                <a target="__blank" href='https://www.freepik.com/photos/it-people'>
                                    It people photo created by ArthurHidden - www.freepik.com</a>
                            </li>
                            <li>
                                <a target="__blank" href='https://www.freepik.com/photos/man-work'>
                                    Man work photo created by ArthurHidden - www.freepik.com</a>
                            </li>
                            <li>
                                <a target="__blank" href='https://www.freepik.com/photos/network-engineer'>
                                    Network engineer photo created by senivpetro - www.freepik.com</a>
                            </li>
                            <li>
                                <a target="__blank" href='https://www.freepik.com/psd/laptop-mobile'>
                                    Laptop mobile psd created by riandra - www.freepik.com</a>
                            </li>
                            <li>
                                <a target="__blank" href='https://www.freepik.com/psd/website-mockup'>
                                    Website mockup psd created by aleksandr_samochernyi - www.freepik.com</a>
                            </li>
                            <li>
                                <a target="__blank" href='https://www.freepik.com/psd/browser-mockup'>
                                    Browser mockup psd created by designwarrior - www.freepik.com</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="py-4 text-white-smoke text-center">
            Copyright &copy; {{ date('Y') }}
        </div>
    </footer>
@endsection
