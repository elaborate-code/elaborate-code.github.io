@extends('_layouts.main')

@section('body')
    <nav class="absolute top-0 w-full">
        <div class="container mx-auto p-4 text-center">
            <x-logo class="h-9 mx-auto text-white" />
            <p class="text-white" translate="no"> {{ $page->name }} </p>
        </div>
    </nav>

    <main class="scroll-smooth">

        <section name="hero section" class="h-screen hero-bg sm:hero-bg-alt">
            <header class="container h-full mx-auto flex flex-col text-white">

                <div class="flex-1 flex flex-col justify-center">

                    <div class="px-8 md:px-20 xl:px-48">
                        <h1 class="text-4xl md:text-5xl xl:text-7xl font-yeseva-one text-center" lang="en"
                            translate="no">
                            The ultimate <span class="text-bloodmyst-isle animate-pulse"> digitalisation </span> services
                            For the ultimate productivity
                        </h1>

                        <div class="w-32 h-1 my-4 mx-auto bg-frozen-blue-50 rounded-full"></div>

                        <p class="mb-8 md:px-20 lg:px-36 text-xl text-center">
                            {{ $page->$lang['Achieve more by adopting automated workflows and networking informations between the various segments of your company'] }}
                        </p>

                        <a href="#cta"
                            class="block w-fit mx-auto py-3 px-12 bg-white-smoke text-bloodmyst-isle-700 hover:bg-firecracker-salmon hover:shadow-inner  hover:text-nero text-lg font-bold rounded-full">
                            {{ $page->$lang['Request a service'] }}
                        </a>
                    </div>
                </div>

            </header>
        </section>

        {{-- <section name="Clients and partners" class="bg-gray-100 h-24"> our partners/clients </section> --}}

        <section name="Who are we" class="sticky top-0 -z-10 p-8 bg-white-smoke md:p-12">

            <h2 class="mb-4 text-bloodmyst-isle text-4xl font-bold font-yeseva-one text-center md:mb-6">
                {{ $page->$lang['Who are we'] }}
            </h2>

            <p class="w-full sm:w-96 mx-auto text-center">
                {{ $page->$lang['We are a team of passionate IT people, we mainly craft on-demand web APPs (CMS, ERP, CRM, IOT, E-Commerce ...) and websites. We also offer infrastructure upgrade services like setting up Windows/Linux server with its tools and optimize networks physically and logically.'] }}
            </p>
        </section>

        <section name="Our services" class="bg-white">

            <div class="container mx-auto py-10 px-4 md:py-16 md:px-6">


                <h2 class="mb-12 text-nero text-4xl font-bold font-yeseva-one text-center">
                    {{ $page->$lang['Our services'] }}
                </h2>

                @foreach ($page->services as $service)
                    <x-cards.service service-title="{{ $page->$lang[$service->title] }}"
                        service-desc="{{ $page->$lang[$service->desc] }}" service-img="{{ $service->img }}"
                        service-img-alt="{{ $service->imgAlt }}" />
                @endforeach
            </div>
        </section>

        <section name="CTA" id="cta" class="bg-bloodmyst-isle-dark py-10 px-4">
            <h2 class="mb-4 text-bloodmyst-isle text-4xl font-bold font-merriweather text-center">
                {{ $page->$lang['Are you interested in our services ?'] }}
            </h2>

            <p class="mb-2 text-white text-center">
                {{ $page->$lang['Let us know your E-mail and phone number and we will reach out to you shortly'] }}
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

                    <input type="email" name="email" placeholder="E-mail" required
                        class="w-72 h-14 px-4 outline-none border-none rounded-sm">

                    <input type="tel" name="phone" placeholder="{{ $page->$lang['Phone number'] }}" required
                        class="w-56 h-14 px-4 outline-none border-none rounded-sm">

                    <button
                        class="h-14 w-40 bg-bloodmyst-isle-light text-bloodmyst-isle-dark font-bold text-center rounded-sm shadow-sm hover:shadow-white-smoke">
                        {{ $page->$lang['Send'] }}
                    </button>
                </div>
            </form>

            <a class="block mt-4 cursor-pointer text-firecracker-salmon-light text-sm text-center underline"
                href="{{ $page->route('/contact', $lang) }}">
                {{ $page->$lang['Or send us a detailed message'] }}
            </a>
        </section>

        <section name="Featured project" class="py-8 bg-white">

            <h2 class="mb-6 px-4 md:px-6 text-nero text-4xl font-bold font-yeseva-one text-center">
                {{ $page->$lang['Our Featured applications'] }}
            </h2>

            <div class="flex flex-wrap justify-center gap-6 container mx-auto lg:gap-12">

                @foreach ($page->projects as $project)
                    <x-cards.project project-name="{{ $project->name }}"
                        project-desc="{{ $page->$lang[$project->desc] }}" project-img="{{ $project->img }}"
                        project-href="{{ $project->href }}" class="project-card-frozen-blue-theme" />
                @endforeach
            </div>

        </section>

    </main>
@endsection
