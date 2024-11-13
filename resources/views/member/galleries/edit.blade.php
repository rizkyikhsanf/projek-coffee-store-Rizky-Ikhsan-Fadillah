<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Gambar
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-300">
                                Edit Data Galery
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan perubahan data
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.galleries.update', ['galery' => $data->id]) }}"
                            class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            {{-- edit title --}}
                            <div>
                                <x-input-label for="name" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                    value="{{ old('title', $data->title) }}" />
                            </div>

                            {{-- edit deskripsi --}}
                            <div>
                                <x-input-label for="description" value="Description" />
                                <x-text-input id="description" name="description" type="text"
                                    class="mt-1 block w-full" value="{{ old('description', $data->description ) }}" />
                            </div>

                            <div>
                                <x-input-label for="harga" value="Harga Jual" />
                                <x-text-input id="harga" name="harga" type="text"
                                    class="mt-1 block w-full" value="{{ old('harga', $data->harga) }}" />
                            </div>

                            {{-- edit thumbnail --}}
                            <div>
                                @isset($data->image_path)
                                    <img src="{{ asset(getenv('CUSTOM_GALLERY_LOCATION') .'/' . $data->image_path) }}"
                                        class="rounded-md border border-gray-400 max-w-40 p-2">
                                @endisset
                                <x-input-label for="name" value="image" />
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
