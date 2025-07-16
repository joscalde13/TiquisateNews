<x-layouts.app>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-3xl font-thin text-gray-300">Noticias</h1>
                <a href="{{ route('news.index') }}" class="text-sm text-gray-400 hover:text-gray-200">
                    &larr; Volver al listado
                </a>
            </div>

            @if($errors->any())
                <div class="bg-red-900 bg-opacity-50 text-red-200 p-4 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-gray-800 bg-opacity-50 p-8 rounded-lg">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-300">Título de la Noticia</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                               class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-200 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-base h-12">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-300">Contenido</label>
                        <textarea name="description" id="description" required rows="8"
                                  class="mt-1 block w-full bg-gray-700 border-gray-600 text-gray-200 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-300">Imagen Principal</label>
                        <input type="file" name="image" id="image"
                               class="mt-1 block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-900 file:text-blue-200 hover:file:bg-blue-800">
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-300">Previsualización de la Imagen</label>
                        <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-600 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <img id="image-preview" src="" alt="Previsualización de la imagen" class="mx-auto h-48 w-auto object-cover hidden">
                                <div id="image-placeholder" class="text-gray-500">
                                    <svg class="mx-auto h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-2">Sube una imagen para ver la previsualización</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 text-right">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-800 focus:outline-none focus:border-gray-800 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Publicar Noticia
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('image-placeholder');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        });
    </script>
    @endpush
</x-layouts.app>
