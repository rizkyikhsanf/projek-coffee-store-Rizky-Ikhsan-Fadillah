<x-front.layout>
    <section id="artikel" class="mt-24">
        <div class="container mx-auto px-12">
            <!-- Mengatur jarak antar artikel -->
            <div class="grid gap-6">
                <!-- Menggunakan loop untuk membuat artikel berderet ke bawah -->
                @foreach ($posts as $value)
                    <article class="flex gap-4 py-6">
                        <!-- Flex untuk gambar dan teks di samping -->
                        <div class="w-1/3">
                            <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . '/' . $value->thumbnail) }}" alt=""
                                class="w-full h-64 border border-gray-400 rounded-lg object-cover">
                        </div>
                        <div class="flex-1">
                            <!-- Teks artikel -->
                            <h4 class="bg-primary text-gray-200 font-bold text-xl p-2 rounded-lg">{{ $value->title }}</h4>
                            <h4 class="text-text font-semibold text-sm pb-4">{{ $value->created_at }}</h4>
                            <p class="text-primary text-base">{{ Str::limit($value->content, 400) }}</p>

                            <!-- Tombol Lihat Selengkapnya di bawah teks -->
                            <div class="pt-8">
                                <a href="article"
                                    class="text-base font-semibold text-gray-200 bg-primary py-3 px-8 rounded-xl hover:bg-white
                                    transition duration-700 ease-in-out">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-front.layout>
