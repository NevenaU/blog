<!-- resources/views/posts/create.blade.php -->
<x-app-layout>
    <div class="container mx-auto max-w-xl mt-8">
        <h1 class="text-2xl font-bold mb-4">Create New Post</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block font-semibold">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label for="content" class="block font-semibold">Content</label>
                <textarea name="content" id="content" rows="6"
                          class="w-full border rounded px-3 py-2" required>{{ old('content') }}</textarea>
            </div>

            <div>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Publish
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
