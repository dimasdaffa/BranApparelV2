<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                <div class="mb-4">
                    @foreach ($errors->all() as $error)
                    <div class="py-3 px-4 mb-2 w-full rounded-3xl bg-red-500 text-white">
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tagline" :value="__('Tagline')" />
                        <x-text-input id="tagline" class="block mt-1 w-full" type="text" name="tagline"
                            :value="old('tagline')" required autocomplete="tagline" />
                        <x-input-error :messages="$errors->get('tagline')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail (Legacy - Optional)')" />
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
                        <p class="mt-1 text-sm text-gray-500">You can select up to 10 images. The first image will be
                            set as primary.</p>
                        <x-input-error :messages="$errors->get('images')" class="mt-2" />
                        <x-input-error :messages="$errors->get('images.*')" class="mt-2" />
                    </div>

                    <div id="image-preview-container" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full p-3">{{ old('about') }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full hover:bg-indigo-800 transition-colors">
                            Add New Product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('image-preview-container');
            previewContainer.innerHTML = '';
            
            if (this.files && this.files.length > 0) {
                Array.from(this.files).forEach((file, index) => {
                    // Validate file type
                    if (!file.type.startsWith('image/')) {
                        return;
                    }
                    
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'relative';
                        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-32 object-cover rounded-lg border border-gray-200';
                        img.alt = `Preview ${index + 1}`;
                        
                        previewDiv.appendChild(img);
                        
                        // Add primary badge for first image
                        if (index === 0) {
                            const badge = document.createElement('span');
                            badge.className = 'absolute top-2 right-2 bg-indigo-700 text-white text-xs px-2 py-1 rounded-full';
                            badge.textContent = 'Primary';
                            previewDiv.appendChild(badge);
                        }
                        
                        // Add image number
                        const numberBadge = document.createElement('span');
                        numberBadge.className = 'absolute top-2 left-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded-full';
                        numberBadge.textContent = index + 1;
                        previewDiv.appendChild(numberBadge);
                        
                        previewContainer.appendChild(previewDiv);
                    };
                    
                    reader.readAsDataURL(file);
                });
            }
        });

        // Also add preview for thumbnail
        document.getElementById('thumbnail').addEventListener('change', function(event) {
            // You can add thumbnail preview here if needed
            console.log('Thumbnail selected:', this.files[0]?.name);
        });
    </script>
    @endpush
</x-app-layout>