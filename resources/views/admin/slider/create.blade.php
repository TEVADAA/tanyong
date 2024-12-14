<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="font-sans antialiased">
                <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
                    <div class="mt-6 w-full overflow-hidden rounded-lg bg-white px-16 py-20 lg:max-w-4xl">
                        <div class="mb-4">
                            <h1 class="font-serif text-3xl font-bold">Add Slider</h1>
                        </div>

                        <div class="w-full rounded bg-white px-6 py-4 shadow-md ring-1 ring-gray-900/10">
                            <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Background -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="background">Background</label>
                                    <input type="file" name="background" id="background" class="form-control" accept="image/*" onchange="previewImage(event)">

                                    @error('background')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <!-- Preview Section -->
                                    <div class="mt-4">
                                        <img id="background-preview" src="{{ old('background') ? asset('uploads/slider/' . old('background')) : '#' }}"
                                             alt="Background Preview"
                                             class="max-w-full h-auto rounded border border-gray-300"
                                             style="display: {{ old('background') ? 'block' : 'none' }};">
                                    </div>
                                </div>

                                <!-- JavaScript for Preview -->
                                <script>
                                    function previewImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('background-preview');

                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();

                                            reader.onload = function (e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>


                                <!-- Description Upper -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="description_upper"> Description Upper </label>
                                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description_upper" placeholder="Enter Your Description">
                                    @error('description_upper')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description Middle -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="description_middle"> Description Middle </label>
                                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description_middle" placeholder="Enter Your Description">
                                    @error('description_middle')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description Lower -->
                                <div class="form-group mb-4">
                                    <label class="block text-sm font-medium text-gray-700" for="description_lower"> Description Lower </label>
                                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description_lower" placeholder="Enter Your Description">
                                    @error('description_lower')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4 flex items-center justify-start">
                                    <button type="submit" class="inline-flex items-center rounded-md bg-sky-500 px-6 py-2 text-sm font-semibold text-sky-100 ring-gray-300 hover:bg-sky-700 focus:border-gray-900 focus:outline-none focus:ring">
                                        Add New Slider
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
