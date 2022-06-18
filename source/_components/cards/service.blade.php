@props(['service'])

<div
    class="card w-full max-w-screen-lg mx-auto mb-8 flex flex-col md:even:flex-row-reverse  md:odd:flex-row justify-between">

    <div class="w-full md:w-[450px] lg:w-[640px] flex flex-col justify-center">
        <img src="{{ $service->img }}" alt="{{ $service->imgAlt }}" class="object-scale-down rounded-3xl">
    </div>

    <div class="p-4 lg:pr-16 basis-2/5 flex flex-col justify-center">
        <h3 class="mb-5 text-bloodmyst-isle text-3xl font-merriweather"> {{ $service->title }} </h3>
        <p class="text-frozen-blue-dark">
            {{ $service->description }}
        </p>
    </div>

</div>
