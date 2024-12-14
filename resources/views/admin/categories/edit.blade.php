<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="font-sans antialiased">
                <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
                    <div class="mt-6 w-full overflow-hidden rounded-lg bg-white px-16 py-20 lg:max-w-4xl">
                        <div class="mb-4">
                            <h1 class="font-serif text-3xl font-bold">Edit Categories</h1>
                        </div>

                        <div class="w-full rounded bg-white px-6 py-4 shadow-md ring-1 ring-gray-900/10">
                            <form method="POST" action="{{ route('categories.update',$cat->cat_id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Categories Name </label>
                                  <input type="text" class="form-control" name="cat_name" value="{{ $cat->cat_name }}">
                                  @error('cat_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                    <button type="submit" class="inline-flex items-center rounded-md bg-sky-500 px-6 py-2 text-sm font-semibold text-sky-100 ring-gray-300 hover:bg-sky-700 focus:border-gray-900 focus:outline-none focus:ring">
                                        Update Categories
                                    </button>
                                </div>

                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
