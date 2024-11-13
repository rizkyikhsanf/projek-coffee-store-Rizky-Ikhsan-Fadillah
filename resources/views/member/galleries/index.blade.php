<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            <x-secondary-button><a href="{{ route('member.galleries.create') }}">Tambah Data</a></x-secondary-button>
            ||  Dashboard Galery   
        </h2>
    </x-slot>
    
    <x-slot name="headerRight">
        <form action="{{ route('member.galleries.index') }}" method="get">
            <x-text-input id="search" name="search" type="text" class="p-1 m-0 md:w-72 w-80 mt-3 md:mt-0"
                value="{{ request('search') }}" placeholder="masukan kata kunci....."></x-text-input>
            <x-secondary-button class="p-1" type="submit">Search</x-secondary-button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 shadow-sm sm:rounded-lg overflow-x-auto">
                <div class="p-6 bg-gray-800 border-b border-gray-200">
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap table-fixed">
                        <thead>
                            <tr class="text-center font-bold text-gray-200">
                                <td class="border px-6 py-4 w-[80px]">No</td>
                                <td class="border px-6 py-4">Judul</td>
                                <td class="border px-6 py-4 lg:w-[250px] hidden lg:table-cell">Tanggal</td>
                                <td class="border px-6 py-4 lg:w-[100px] hidden lg:table-cell">gambar</td>
                                <td class="border px-6 py-4 lg:w-[250px] w-[100px]">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr class="text-gray-200">
                                    <td class="border px-6 py-4 text-center">{{ $data->firstItem() + $key }}</td>
                                    <td class="border px-6 py-4">
                                        {{ $value->title }}
                                        <div class="block lg:hidden text-sm text-gray-200">
                                            {{ $value->status }} | {{ $value->created_at->isoFormat('dddd, D MMMM Y') }}
                                        </div>
                                    </td>

                                    {{-- created at --}}
                                    <td class="border px-6 py-4 text-center text-gray-500 text-sm hidden lg:table-cell">
                                        {{ $value->created_at->isoFormat('dddd, D MMMM Y') }}</td>

                                    {{-- gambar --}}
                                    <td class="border px-6 py-4 text-center text-sm hidden lg:table-cell">
                                        @if ($value->image_path)
                                            <img src="{{ asset(getenv('CUSTOM_GALLERY_LOCATION') .'/'. $value->image_path) }}" alt="Gambar"
                                                class="w-20 h-20 object-cover mx-auto">
                                        @else
                                            <span class="text-gray-400">Tidak Ada Gambar</span>
                                        @endif
                                    </td>

                                    {{-- aksi --}}
                                    <td class="border px-6 py-4 text-center">
                                        <a href='{{ route('member.galleries.edit', ['galery' => $value->id]) }}'
                                            class="text-blue-600 hover:text-blue-400 px-2">edit</a>

                                        {{-- form delete --}}
                                        <form
                                            action="{{ route('member.galleries.destroy', ['galery' => $value->id]) }}"
                                            class="inline" method="post"
                                            onsubmit="return confirm('yakin mau dihapus')">
                                            @csrf
                                            @method('delete')
                                            <button type='submit' class='text-red-600 hover:text-red-400 px-2'>
                                                hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-5">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
