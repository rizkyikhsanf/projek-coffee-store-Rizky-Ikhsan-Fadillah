<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Tambah Tulisan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-300">
                                Tambah Data Tulisan
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan penambahan data
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.blogs.store') }}"
                            class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf

                            {{-- title --}}
                            <div>
                                <x-input-label for="name" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                    value="{{ old('title') }}" />
                            </div>

                            {{-- deskripsi --}}
                            <div>
                                <x-input-label for="des" value="Description" />
                                <x-text-input id="des" name="des" type="text" class="mt-1 block w-full"
                                    value="{{ old('description') }}" />
                            </div>

                            {{-- thumbnail --}}
                            <div>
                                <x-input-label for="name" value="Thumbnail" />
                                <input type="file"
                                    class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                                    name="thumbnail">
                            </div>

                            {{-- content --}}
                            <div>
                                <x-textarea-trix value="{!! old('content') !!}" id="x"
                                    name="content"></x-textarea-trix>
                            </div>

                            {{-- tombol opsi --}}
                            <div>
                                <x-select name="status">
                                    <option value="draft"
                                        {{ old('status') == 'draft' ? 'selected' : '' }}>
                                        Simpan Sebagai Draft</option>
                                    <option value="publish"
                                        {{ old('status') == 'publish' ? 'selected' : '' }}>publish
                                    </option>
                                </x-select>
                            </div>

                            {{-- tombol simpan perubahan atau kembali --}}
                            <div class="flex items-center gap-4">
                                <a href="{{ route('member.blogs.index') }}">
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
