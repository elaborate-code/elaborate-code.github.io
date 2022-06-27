@extends('_layouts.main')

@section('header')
    <header class="">
        <x-nav :page="$page" lang="{{ $lang }}" class="bg-frozen-blue-dark text-white" />

        <section class="bg-gray-200 contact-bg">
            <div class="container aspect-video max-h-[600px] mx-auto flex justify-center sm:justify-end">

                <div class="h-full p-4 flex justify-center items-center sm:basis-1/2">
                    <div class="flex gap-4">
                        <div class="hidden w-2 bg-bloodmyst-isle sm:block"></div>
                        <h1
                            class="text-bloodmyst-isle text-5xl font-yeseva-one text-center font-bold sm:text-left sm:text-7xl lg:text-9xl">
                            Contact us
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    </header>
@endsection

@section('body')
    <section class="py-8 bg-white-smoke">
        <div class="flex flex-col gap-8 container mx-auto p-4">

            <h2 class="text-bloodmyst-isle text-center text-3xl">
                Let's talk
            </h2>

            <p class="text-center text-frozen-blue-dark">
                Let us know how we can help and we'll get in touch with you shortly
            </p>

            <form action="https://formsubmit.co/ee12d2b34596e814d47702339907bd3e" method="POST">

                <input type="hidden" name="_subject" value="Elaborate Code service request">
                <input type="hidden" name="_template" value="table">

                <input type="hidden" name="_captcha" value="false">
                <input type="text" name="_honey" style="display:none">
                <input type="hidden" name="_next" value="{{ $page->getUrl() }}">
                {{-- <input type="hidden" name="_autoresponse" value="your custom message"> --}}

                <div class="w-full grid grid-cols-4 gap-4 text-lg font-merriweather lg:w-2/3 xl:w-1/2 mx-auto">

                    <input type="text" name="full_name" placeholder="Full name" required
                        class="col-span-full py-4 px-2 outline-none border-2 border-firecracker-salmon-light rounded-sm">

                    <input type="email" name="email" placeholder="E-mail" required
                        class="col-span-full py-4 px-2 outline-none border-2 border-firecracker-salmon-light rounded-sm md:col-span-2">

                    <input type="tel" name="phone" placeholder="{{ $page->$lang['Phone number'] }}"
                        class="col-span-full py-4 px-2 outline-none border-2 border-firecracker-salmon-light rounded-sm md:col-span-2">

                    <textarea name="message" aria-label="Message content" rows="5"
                        class="col-span-full py-4 px-2 outline-none border-2 border-firecracker-salmon-light rounded-sm"></textarea>

                    <button
                        class="col-span-full py-4 px-2 bg-bloodmyst-isle-light text-bloodmyst-isle-dark font-bold text-center rounded-sm shadow-sm hover:bg-firecracker-salmon hover:shadow-white">
                        {{ $page->$lang['Send'] }}
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
