<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="py-3 px-4 mb-2 w-full rounded-3xl bg-red-500 text-white">
                    {{ $error }}
                </div>
                @endforeach
                @endif
                <form method="POST" action="{{ route('admin.products.update', $product) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            value="{{ $product->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tagline" :value="__('Tagline')" />
                        <x-text-input id="tagline" class="block mt-1 w-full" type="text" name="tagline"
                            value="{{ $product->tagline }}" required autocomplete="tagline" />
                        <x-input-error :messages="$errors->get('tagline')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail (Legacy - Optional)')" />
                        @if($product->thumbnail)
                        <div class="mt-2 mb-2">
                            <img src="{{ Storage::url($product->thumbnail) }}" alt="{{ $product->name }} thumbnail"
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                        </div>
                        @endif
                        <input id="thumbnail" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm"
                            type="file" name="thumbnail" accept="image/*" />
                        <p class="mt-1 text-sm text-gray-500">This is for backward compatibility. You can use Product
                            Images instead.</p>
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="images" :value="__('Product Images (Multiple)')" />
                        <input id="images" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm"
                            type="file" name="images[]" multiple accept="image/*" />
                        <p class="mt-1 text-sm text-gray-500">You can select up to 10 images.</p>
                        <x-input-error :messages="$errors->get('images')" class="mt-2" />
                        <x-input-error :messages="$errors->get('images.*')" class="mt-2" />
                    </div>

                    <!-- Current Images Display -->
                    @if($product->images->count() > 0)
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg text-gray-700">Current Images</h3>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($product->images as $image)
                            <div class="relative group">
                                <img src="{{ Storage::url($image->image_path) }}"
                                    alt="{{ $product->name }} image {{ $loop->iteration }}"
                                    class="w-full h-32 object-cover rounded-lg border {{ $image->is_primary ? 'border-indigo-500 border-2' : 'border-gray-200' }}">

                                <!-- Primary Badge -->
                                @if($image->is_primary)
                                <span
                                    class="absolute top-2 right-2 bg-indigo-700 text-white text-xs px-2 py-1 rounded-full">
                                    Primary
                                </span>
                                @endif

                                <!-- Image Controls -->
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                                    <!-- Set as Primary -->
                                    @if(!$image->is_primary)
                                    <label
                                        class="bg-indigo-600 text-white text-xs px-2 py-1 rounded-full mx-1 cursor-pointer">
                                        <input type="radio" name="primary_image_id" value="{{ $image->id }}"
                                            class="hidden">
                                        Set Primary
                                    </label>
                                    @endif

                                    <!-- Delete Image -->
                                    <label
                                        class="bg-red-600 text-white text-xs px-2 py-1 rounded-full mx-1 cursor-pointer">
                                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"
                                            class="hidden">
                                        Delete
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Hover over images to set as primary or delete.</p>
                    </div>
                    @endif

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full p-3">{{ $product->about }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition-colors">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Preview for new images
        document.getElementById('images').addEventListener('change', function(event) {
            // You can add image preview functionality here similar to the create form
            console.log('Images selected:', this.files.length);
        });

        // Handle primary image selection
        document.querySelectorAll('input[name="primary_image_id"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Remove primary styling from all images
                document.querySelectorAll('.border-indigo-500').forEach(img => {
                    img.classList.remove('border-indigo-500', 'border-2');
                    img.classList.add('border-gray-200');
                });
                
                // Add primary styling to selected image
                if (this.checked) {
                    this.closest('.relative').querySelector('img').classList.remove('border-gray-200');
                    this.closest('.relative').querySelector('img').classList.add('border-indigo-500', 'border-2');
                }
            });
        });

        // Handle image deletion
        document.querySelectorAll('input[name="delete_images[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    this.closest('.relative').querySelector('img').classList.add('opacity-50');
                } else {
                    this.closest('.relative').querySelector('img').classList.remove('opacity-50');
                }
            });
        });
    </script>
    @endpush
</x-app-layout>