<x-front.layout>
    <header class="w-auto">
        <iframe width="100%" height="400px" class="md:h-[790px]"
            src="https://www.youtube.com/embed/4rxmZKfihcY?autoplay=1&mute=1&controls=0&modestbranding=1&showinfo=0"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
        </iframe>
    </header>
    <!-- Main Content-->
    <div class="mx-auto max-w-7xl py-2 px-4 sm:px-6 lg:px-8">
        {{-- Hero Section --}}
        <section id="hero" class="pt-3">
            <div class="container mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 self-center px-4" data-aos="fade-up-right">
                        {{-- Slogan --}}
                        <h1 class="text-4xl font-bold text-primary lg:text-7xl">Crafted with passion, brewed with
                            precision.</h1>
                        {{-- Home Article --}}
                        <p class="pt-6 pb-6 leading-relaxed text-text">A Little Coffee merupakan brand spesialisasi kopi
                            dengan konsep “Made to Order” yang menyajikan Fresh Quality Coffee. Dengan menggunakan 100%
                            biji kopi asli Indonesia yang disajikan oleh barista terlatih dengan mesin kopi standar
                            internasional.
                        </p>
                        {{-- Button --}}
                        <a href="about"
                            class="text-base font-semibold text-white bg-primary py-3 px-10 rounded-xl hover:bg-gray-950
                            transition duration-700 ease-in-out">Lihat
                            Selengkapnya</a>
                    </div>
                    <div class="w-full lg:w-1/2 pt-10 lg:pt-0 z-20" data-aos="fade-left">
                        <img src="img/gambar-kopi.jpg" alt="" class="rounded-xl w-full lg:max-w-md mx-auto">
                    </div>
                </div>
            </div>
        </section>

        {{-- Gallery --}}
        <section id="menu" class="pt-16">
            <div class="container max-w-screen-lg mx-auto text-center lg:text-left" data-aos="zoom-in"
            data-aos-duration="3000">
                <h1 class="font-bold text-3xl text-primary lg:text-5xl">Menu</h1>
                <h3 class="text-md text-text pt-4 lg:text-xl">
                    Cicipi kelezatan makanan dan minuman yang dibuat oleh a little <span
                        class="text-primary font-semibold text-xl">cinta!!</span>
                </h3>
                <!-- Grid with 3 Columns -->
                <div class="grid grid-cols-1 gap-5 pt-10 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($galleries as $value)
                        <div class="shadow-lg rounded-md overflow-hidden">
                            <a href="">
                                <img src="{{ asset(getenv('CUSTOM_GALLERY_LOCATION') . '/' . $value->image_path) }}"
                                    alt="gambar" class="w-full h-64 object-cover">
                                <h1 class="text-center pt-3 pb-6 text-primary font-bold">{{ $value->title }}</h1>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Center Button -->
                <div class="flex justify-center pt-12">
                    <a href="menu"
                        class="text-base font-semibold text-white bg-primary py-3 px-24 rounded-xl hover:bg-gray-950
                        transition duration-700 ease-in-out">Lihat
                        Menu lainnya</a>
                </div>
            </div>
        </section>

        {{-- Article Section --}}
        <section id="artikel" class="mt-24 pt-24 bg-primary rounded-lg">
            <div class="container mx-auto px-4 sm:px-12">
                <div class="flex flex-col lg:flex-row gap-12">
                    <!-- Left side with one larger image -->
                    <div class="w-full lg:w-1/2 px-4" data-aos="fade-right"
                    data-aos-offset="300"
                    data-aos-easing="ease-in-sine">
                        @foreach ($posts->take(1) as $value)
                            <article class="mb-6">
                                <a href="article">
                                    <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . '/' . $value->thumbnail) }}"
                                        alt="thumbnail" class="w-full border border-gray-900 rounded-lg lg:max-w-full mb-4">
                                    <h4 class="text-white text-xl font-semibold pt-3">{{ $value->title }}</h4>
                                    <p class="text-gray-200 text-sm mt-2">{{ Str::limit($value->content, 100) }}</p>
                                </a>
                            </article>
                        @endforeach
                    </div>
                    <!-- Right side with three stacked images -->
                    <div class="w-full lg:w-1/2 grid grid-rows-3 gap-4">
                        @foreach ($posts->skip(1)->take(3) as $value)
                            <article class="flex items-center gap-4">
                                <a href="#" class="flex items-center">
                                    <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . '/' . $value->thumbnail) }}"
                                        alt="" class="w-1/3 border border-gray-900 rounded-lg">
                                    <div class="pl-4"> <!-- Padding added for space between image and text -->
                                        <h4 class="text-white font-semibold">{{ $value->title }}</h4>
                                        <p class="text-gray-200 text-sm mt-1">{{ Str::limit($value->content, 70) }}</p>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-center pt-16 pb-8">
                    <a href="article"
                        class="text-base font-semibold text-primary bg-gray-200 py-3 px-20 rounded-xl hover:bg-white
                        transition duration-700 ease-in-out">Lihat Selengkapnya</a>
                </div>
            </div>
        </section>
        
        
        {{-- Membership Section --}}
        <section id="membership" class="flex justify-center items-center h-screen mt-12">
            <div class="container text-center" data-aos="zoom-in">
                <h1 class="text-4xl font-bold text-primary pb-2 lg:text-6xl">A Little <span
                        class="font-extrabold">VIP</span></h1>
                <p class="text-text font-semibold pb-5">the new loyalty program for a little customer</p>
                <a href="" class="block mx-auto">
                    <img src="img/member.png" alt="VIP Membership" class="w-72 mx-auto">
                </a>
                <h1 class="text-4xl font-bold text-primary pb-2 lg:text-5xl">Experience just for you</h1>
                <div class="flex justify-center pt-10">
                    <a href="membership"
                        class="text-base font-semibold text-white bg-primary py-3 px-24 rounded-xl hover:bg-gray-900
                        transition duration-700 ease-in-out">Join
                        Sekarang</a>
                </div>
            </div>
        </section>
    </div>
</x-front.layout>
