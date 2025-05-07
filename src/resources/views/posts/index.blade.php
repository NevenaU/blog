<!-- resources/views/posts/index.blade.php -->
<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">All Posts</h1>

        @auth
            <a href="{{ route('posts.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                + New Post
            </a>
        @endauth

        @foreach ($posts as $post)
            <div class="border rounded p-4 mt-4">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h2>
                <p class="text-gray-600 text-sm">By {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
