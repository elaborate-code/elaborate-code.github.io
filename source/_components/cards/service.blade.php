@props(['service'])

<div
    class="w-full lg:w-[1000px] 2xl:w-[1200px] mx-auto mb-8 flex flex-col-reverse md:even:flex-row-reverse  md:odd:flex-row justify-between hover:bg-frozen-blue-50 rounded-3xl hover:scale-105 hover:shadow-xl hover:border">

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
