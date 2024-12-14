<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="font-sans antialiased">
                <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
                    <div class="mt-6 w-full overflow-hidden rounded-lg bg-white px-16 py-20 lg:max-w-4xl">
                        <div class="mb-4">
                            <h1 class="font-serif text-3xl font-bold">Edit Product</h1>
                        </div>

                        <div class="w-full rounded bg-white px-6 py-4 shadow-md ring-1 ring-gray-900/10">
                            <form method="POST" action="{{ route('product.update', $pro->id) }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Product Name -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="description_upper"> Product Name </label>
                                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="pro_name" placeholder="Enter Product Name" value="{{ $pro->pro_name }}">
                                    @error('pro_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Product Name -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="description_upper"> Price </label>
                                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="price" placeholder="Enter Price" value="{{ $pro->price }}">
                                    @error('price')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Product Detail -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="description_upper"> Product Detail </label>
                                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="pro_detail" placeholder="Enter Product Detail" value="{{ $pro->pro_detail }}">
                                    @error('pro_detail')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Background -->
                                <div class="form-group mb-4">
                                    <!-- Display the current background image -->
                                    <label class="block text-sm font-medium text-gray-700">Current Product Photo</label>
                                    <img id="current-pro_photo"
                                         src="{{ asset('uploads/product/' . $pro->pro_photo) }}"
                                         width="500px"
                                         height="auto"
                                         alt="Current Product Photo"
                                         class="mb-4 rounded border border-gray-300">
                                </div>

                                <div class="form-group mb-4">
                                    <!-- File input for new background -->
                                    <label class="block text-sm font-medium text-gray-700" for="pro_photo">Upload New Product Photo</label>
                                    <input type="file" name="pro_photo" id="pro_photo" class="form-control" accept="image/*" onchange="previewImage(event)">
                                    @error('pro_photo')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Preview Section -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Preview New Product Photo</label>
                                    <img id="pro_photo-preview"
                                         src="#"
                                         alt="New Product Photo Preview"
                                         class="max-w-full h-auto rounded border border-gray-300"
                                         style="display: none;">
                                </div>

                                <!-- JavaScript for Preview -->
                                <script>
                                    function previewImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('pro_photo-preview');
                                        const currentBackground = document.getElementById('current-pro_photo');

                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();

                                            reader.onload = function (e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                                currentBackground.style.display = 'none'; // Hide the old image
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>

                                <!-- Categorie Type -->
                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700" for="description_upper"> Categories Type </label>
                                    <select name="cat_id" required>
                                        @foreach ($cat as $item)
                                            <option value="{{ $item->cat_id }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Select Categories Type">{{ $item->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4 flex items-center justify-start">
                                    <button type="submit" class="inline-flex items-center rounded-md bg-sky-500 px-6 py-2 text-sm font-semibold text-sky-100 ring-gray-300 hover:bg-sky-700 focus:border-gray-900 focus:outline-none focus:ring">
                                        Update Slider
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
