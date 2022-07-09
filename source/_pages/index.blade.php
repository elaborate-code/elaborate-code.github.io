@extends('_layouts.main')

@section('header')
    <header>

        <x-nav :page="$page" class="absolute top-0 w-full text-nero" />

        <section name="hero section" class="py-24 flex flex-col justify-center">

            {{-- center xy --}}
            <div class="max-w-7xl mx-auto flex items-center justify-between">

                <div class="py-8 px-4 flex flex-col gap-y-2 sm:gap-y-4 sm:px-8 md:basis-1/2">

                    <h1 class="text-3xl font-yeseva-one md:text-5xl" lang="en" translate="no">
                        <span class="text-bloodmyst-isle animate-pulse"> Web apps </span> that improve business efficiency.
                    </h1>

                    <div class="w-32 h-1 bg-bloodmyst-isle rounded-full"></div>

                    <p class="text-lg md:text-xl">
                        {{ $page->__('We hand-code websites and web applications that help businesses become more productive.') }}
                    </p>

                    <a href="#cta"
                        class="block w-fit py-3 px-6 bg-bloodmyst-isle text-white-smoke hover:bg-white-smoke hover:text-bloodmyst-isle-600  hover:shadow-inner text-lg font-bold rounded-full animate-fade-in">
                        {{ $page->__('Request a service') }}
                    </a>
                </div>

                {{-- <img src="{{ $page->url('/assets/svgs/Information_flow_Monochromatic.svg') }}" alt=""
                    class="basis-1/2"> --}}

                <x-svg.Information_flow_Monochromatic class="w-1/2 object-cover" />
            </div>

        </section>
    </header>
@endsection

@section('body')
    <main>

        {{-- <section name="Clients and partners" class="bg-gray-100 h-24"> our partners/clients </section> --}}

        <section name="Who are we" class="relative py-16 bg-bloodmyst-isle-100">

            <div class="custom-shape-divider-top-1657217003 fill-white">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        opacity=".25" class="shape-fill"></path>
                    <path
                        d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                        opacity=".5" class="shape-fill"></path>
                    <path
                        d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>

            <h2 class="mb-4 text-bloodmyst-isle text-4xl font-bold font-yeseva-one text-center md:mb-6">
                {{ $page->__('Who are we') }}
            </h2>

            <p class="w-full sm:w-96 mx-auto text-center">
                {{ $page->__('We are a team of passionate IT people, we mainly craft on-demand web APPs (CMS, ERP, CRM, IOT, E-Commerce ...) and websites. We also offer infrastructure upgrade services like setting up Windows/Linux server with its tools and optimize networks physically and logically.') }}
            </p>

            <div class="custom-shape-divider-bottom-1657220297 fill-white">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </section>

        <section name="Our services" class="bg-white">

            <div class="container mx-auto py-10 px-4 md:py-16 md:px-6">


                <h2 class="mb-12 text-nero text-4xl font-bold font-yeseva-one text-center">
                    {{ $page->__('Our services') }}
                </h2>

                @foreach ($page->services as $service)
                    <x-cards.service service-title="{{ $page->__($service->title) }}"
                        service-desc="{{ $page->__($service->desc) }}" service-img="{{ $page->url($service->img) }}"
                        service-img-alt="{{ $service->imgAlt }}" />
                @endforeach
            </div>
        </section>

        <section name="CTA" id="cta" class="bg-bloodmyst-isle-900 py-10 px-4">
            <h2 class="mb-4 text-bloodmyst-isle text-4xl font-bold font-merriweather text-center">
                {{ $page->__('Are you interested in our services ?') }}
            </h2>

            <p class="mb-2 text-white text-center">
                {{ $page->__('Let us know your E-mail and phone number and we will reach out to you shortly') }}
            </p>

            {{-- https://formsubmit.co/ajax-documentation --}}
            <form action="https://formsubmit.co/ee12d2b34596e814d47702339907bd3e" method="POST">

                <input type="hidden" name="_subject" value="Elaborate Code contact message">
                <input type="hidden" name="_template" value="table">

                <input type="hidden" name="_captcha" value="false">
                <input type="text" name="_honey" style="display:none">
                <input type="hidden" name="_next" value="{{ $page->getUrl() }}">
                {{-- <input type="hidden" name="_autoresponse" value="your custom message"> --}}

                <div class="flex flex-col justify-center items-center md:flex-row gap-4 text-lg font-merriweather">
                    <input type="email" name="email" placeholder="E-mail" required
                        class="w-72 h-14 px-4 outline-none border-none rounded-sm">

                    <input type="tel" name="phone" placeholder="{{ $page->__('Phone number') }}"
                        class="w-56 h-14 px-4 outline-none border-none rounded-sm">

                    <button
                        class="h-14 w-40 bg-bloodmyst-isle-100 text-bloodmyst-isle-900 font-bold text-center rounded-sm shadow-sm hover:bg-firecracker-salmon hover:shadow-white-smoke">
                        {{ $page->__('Send') }}
                    </button>
                </div>
            </form>

            <a class="block mt-4 cursor-pointer text-firecracker-salmon-100 text-sm text-center underline"
                href="{{ $page->lang_url('/contact') }}">
                {{ $page->__('Or send us a detailed message') }}
            </a>
        </section>

        <section name="Featured project" class="py-8 bg-white">

            <h2 class="mb-6 px-4 md:px-6 text-nero text-4xl font-bold font-yeseva-one text-center">
                {{ $page->__('Our Featured applications') }}
            </h2>

            <div class="flex flex-wrap justify-center gap-6 container mx-auto lg:gap-12">

                @foreach ($page->projects as $project)
                    <x-cards.project project-name="{{ $project->name }}"
                        project-desc="{{ $page->__($project->desc) }}" project-img="{{ $page->url($project->img) }}"
                        project-href="{{ $project->href }}" class="project-card-frozen-blue-theme" />
                @endforeach
            </div>

        </section>

    </main>
@endsection
