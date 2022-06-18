@extends('_layouts.main')

@section('body')
    <nav class="h-20 absolute top-0 w-full"></nav>

    <main class="scroll-smooth">

        <section name="hero section" class="h-screen hero-bg sm:hero-bg-alt">
            <header class="container h-full mx-auto flex flex-col text-white">

                <div class="-mt-16 flex-1 flex flex-col justify-center">

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
                            class="block m-auto py-3 px-12 bg-white-smoke text-bloodmyst-isle-700 hover:bg-firecracker-salmon hover:shadow-inner  hover:text-nero text-lg font-bold rounded-full">
                            Request a service
                        </button>
                    </div>
                </div>

            </header>
        </section>

        {{-- <section name="Clients and partners" class="bg-gray-100 h-24"> our partners/clients </section> --}}

        <section name="Who are we" class="sticky top-0 -z-10 p-10 md:py-16 md:px-12 bg-white-smoke">

            <h2 class="mb-6 text-bloodmyst-isle text-4xl font-bold font-yeseva-one text-center"> Who are we</h2>

            <p class="w-full sm:w-96 mx-auto text-center">
                We are a team of passionate IT people, we mainly craft on-demand web APPs (CMS, ERP, CRM, IOT, E-Commerce
                ...)
                and websites. We also offer infrastructure upgrade services like setting up Windows/Linux server with its
                services and optimize networks physically and logically
            </p>
        </section>

        <section name="Our services" class="bg-white">

            <div class="container mx-auto py-10 px-4 md:py-16 md:px-6">


                <h2 class="mb-12 text-nero text-4xl font-bold font-yeseva-one text-center"> Our services </h2>

                @foreach ($page->services as $service)
                    <x-cards.service :service="$service" />
                @endforeach
            </div>
        </section>

        <section name="CTA" class="bg-bloodmyst-isle-dark py-10 px-4">
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
                        class="w-54 h-14 px-4 outline-none border-none rounded-sm">

                    <button
                        class="h-14 w-36 bg-bloodmyst-isle-light text-bloodmyst-isle-dark font-bold text-center rounded-sm shadow-sm hover:shadow-white-smoke">
                        Send </button>
                </div>
            </form>

            <a class="block mt-4 cursor-pointer text-firecracker-salmon-light text-sm text-center underline" href="#">
                Or send us a detailed message
            </a>
        </section>

        <section name="Featured project" class="bg-frozen-blue-50 h-96">

            <div class="container mx-auto py-10 px-4 md:py-16 md:px-6">


                <h2 class="mb-12 text-nero text-4xl font-bold font-yeseva-one text-center"> Our Featured projects </h2>

            </div>
        </section>
    </main>

    <footer class="bg-nero">
        <div class="py-4 text-white-smoke text-center">
            Copyright &copy; {{ date('Y') }}
        </div>
    </footer>
@endsection
