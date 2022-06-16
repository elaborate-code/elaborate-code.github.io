@extends('_layouts.main')

@section('body')
    <main class="grid min-h-screen px-2">

        <div id="particles-js"></div>

        <div class="place-self-center text-white w-full m-2 p-4 rounded-md shadow-sm text-center">
            <div class="text-center text-5xl">
                Elaborate Code
            </div>

            <div class="text-center text-secondary-1">
                @medilies
            </div>

            <div class="my-4 p-2 text-3xl">
                <span class="font-bold">
                    Coming
                </span>

                <span
                    class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-secondary-2 relative inline-block">
                    <span class="relative text-white"> SOON </span>
                </span>
            </div>

            <img src="https://media.giphy.com/media/l3nWhI38IWDofyDrW/giphy.gif" alt="" class="w-80 aspect-auto m-auto">

        </div>

    </main>
@endsection
