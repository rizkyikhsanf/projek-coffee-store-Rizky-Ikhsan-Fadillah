<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Tulisan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-300">
                                Edit Data Tulisan
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan perubahan data
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.blogs.update', ['post' => $data->id]) }}"
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
                                <x-input-label for="des" value="Description" />
                                <x-text-input id="des" name="des" type="text" class="mt-1 block w-full"
                                    value="{{ old('description', $data->description) }}" />
                            </div>

                            {{-- edit thumbnail --}}
                            <div>
                                @isset($data->thumbnail)
                                    <img src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') .'/' . $data->thumbnail) }}"
                                        class="rounded-md border border-gray-400 max-w-40 p-2">
                                @endisset
                                <x-input-label for="name" value="Thumbnail" />
                                <input type="file"
                                    class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
                                    name="thumbnail">
                            </div>

                            {{-- edit content --}}
                            <div>
                                <x-textarea-trix value="{!! old('content', $data->content) !!}" id="x"
                                    name="content"></x-textarea-trix>
                            </div>

                            {{-- tombol opsi --}}
                            <div>
                                <x-select name="status">
                                    <option value="draft"
                                        {{ old('status', $data->status) == 'draft' ? 'selected' : '' }}>
                                        Simpan Sebagai Draft</option>
                                    <option value="publish"
                                        {{ old('status', $data->status) == 'publish' ? 'selected' : '' }}>publish
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
