<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Tambah Gambar
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-300">
                                Tambah Data Galery
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan penambahan data
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.galleries.store') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- title --}}
                            <div>
                                <x-input-label for="name" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                    value="{{ old('title') }}" />
                            </div>

                            {{-- deskripsi --}}
                            <div>
                                <x-input-label for="description" value="Description" />
                                <x-text-input id="description" name="description" type="text"
                                    class="mt-1 block w-full" value="{{ old('description') }}" />
                            </div>

                            {{-- harga --}}
                            <div>
                                <x-input-label for="harga" value="Harga Jual" />
                                <x-text-input id="harga" name="harga" type="text"
                                    class="mt-1 block w-full" value="{{ old('harga') }}" />
                            </div>

                            {{-- thumbnail --}}
                            <div>
                                <x-input-label for="name" value="Gambar" />
                                <input type="file"
                                    class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                                    name="image_path">
                            </div>

                            {{-- tombol simpan perubahan atau kembali --}}
                            <div class="flex items-center gap-4">
                                <a href="{{ route('member.galleries.index') }}">
                                    <x-secondary-button>kembali</x-secondary-button>
                                </a>
                                <x-primary-button>simpan</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
