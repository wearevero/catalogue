<x-app-layout title="Update {!! $product->no_item !!}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg drop-shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center flex items-center justify-center font-bold text-7xl mt-5 mb-10">
                        {{ $product->no_item }}
                    </h1>
                    <form method="post" action="{{  route('products.update', $product->id) }}" enctype="multipart/form-data" class="py-5 text-lg items-center justify-center">
                        @csrf
                        @method('PUT')
                        <a data-fancybox="gallery" data-caption="{{ $product->no_item }}" href="{{ asset('image/'.$product->image ?? 'tidak ada gambar')}}" href="{{ asset('image/'.$product->image ?? 'tidak ada gambar')}}">
                            <img xpreview="{{ asset('image/'.$product->image ?? 'tidak ada gambar')}}" src="{{ asset('image/'.$product->image ?? 'tidak ada gambar')}}" alt="{{ $product->no_item }} tidak memiliki gambar" height="250" width="250" class="text-center xzoom-gallery py-2 hover:cursor-pointer mx-auto rounded-md" title="{{ $product->no_item }}" />
                        </a>
                        <h1 class="text-xl mt-10 mb-5 font-bold">Detail Data &nbsp;<span class="font-semibold px-3 bg-rose-500/20 rounded-lg text-rose-500 border border-rose-500 text-sm">wajib diisi</span></h1>
                        <div class="mb-6 flex">
                            <span class="inline-flex items-center px-3 text-gray-900 dark:text-slate-100 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                No. Item
                            </span>
                            <input type="text" name="no_item" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $product->no_item }}">
                        </div>

                        <div class="grid gap-6 md:grid-cols-2">
                            <!-- master category field -->
                            <div class="mb-6 flex">
                                <span class="inline-flex items-center px-3 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-slate-100 dark:border-gray-600">
                                    Main Category
                                </span>
                                <select name="id_main_category" id="main_category" class="uppercase rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="666">
                                    <option value="{{ $product->id_main_category }}">
                                        {{ $product->main_category->nama_category }}
                                    </option>
                                    @foreach ($main_categorys as $category)
                                    <option value="{{ $category->id }}" {{ old('id_main_category') == $category->id ? 'selected' : null }}>
                                        {{ $category->nama_category }}
                                    </option>
                                    @endforeach
                                    <select>
                            </div>
                            <!-- end of master category field -->

                            <div class="mb-6 flex">
                                <span class="inline-flex dark:text-slate-100 items-center px-3 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Sub Category
                                </span>
                                <select name="id_sub_category" id="sub_category" class="uppercase rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="666">
                                    <option value="{{ $product->id_sub_category }}">
                                        {{ $product->category->nama_kategori }}
                                    </option>
                                    @foreach ($categorys as $category)
                                    <option value="{{ $product->category->id }}">
                                        {{ $category->nama_kategori }}
                                    </option>
                                    @endforeach
                                    <select>
                            </div>
                            <!-- closing main & sub category -->
                        </div>


                        <div class=" mb-6 flex">
                            <span class="inline-flex dark:text-slate-100 items-center px-3 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Gambar
                            </span>
                            <input class="flex items-center justify-center px-7 rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 border-gray-300 p-12 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="image" type="file" onchange="previewImage(event)" id="image" />
                            <div class="border ml-3 items-center text-center border-violet-500 w-fit rounded-lg p-5">
                                <div class="">
                                    <img id="preview" src="{{ old('preview_image') }}" alt="Preview Image" class="flex items-center justify-center" width="200" height="100" />
                                </div>
                            </div>
                        </div>


                        {{-- keterangan --}}
                        <h1 class="text-xl mt-10 mb-5 font-bold">Keterangan tambahan &nbsp;<span class="font-semibold px-3 bg-yellow-500/20 rounded-lg text-yellow-500 border border-yellow-500 text-sm">optional</span></h1>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class="flex">
                                <span class="inline-flex dark:text-slate-100 items-center px-3 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Qty Stone
                                </span>
                                <input type="text" name="qty_stone" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $product->qty_stone }}">
                            </div>
                            <div class="flex">
                                <span class="inline-flex dark:text-slate-100 items-center px-3 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Size stone
                                </span>
                                <input type="text" name="size_stone" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $product->size_stone }}">
                            </div>
                            <div class="flex">
                                <span class="inline-flex dark:text-slate-100 items-center px-3 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Size
                                </span>
                                <input type="text" name="size" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $product->size }}">
                            </div>
                        </div>
                        <button type="submit" value="EDIT" class="show_confirmEdit bg-blue-800/30 text-center hover:bg-blue-400/10 mx-auto mt-10 font-bold text-indigo-500 px-5 py-1 border border-blue-800 rounded-md">
                            Lets update!
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>