<!-- resources/views/posts/show.blade.php -->
<x-app-layout>
    <div class="container mx-auto mt-8">
        <div class="border-b pb-4 mb-6">
            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
            <p class="text-gray-600 text-sm">By {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}</p>
        </div>

        <div class="mb-6">
            <p>{{ $post->content }}</p>
        </div>

        @auth
            @if (auth()->id() === $post->user_id)
                <a href="{{ route('posts.edit', $post->id) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">Edit</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure?')"
                            class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
                </form>
            @endif
        @endauth

        <hr class="my-6">

        <h2 class="text-xl font-semibold mb-4">Comments</h2>

        @foreach ($post->comments as $comment)
            <div class="border-b py-2">
                <p>{{ $comment->comment }}</p>
                <p class="text-sm text-gray-500">– {{ $comment->user->name }}, {{ $comment->created_at->diffForHumans() }}</p>

                @auth
                    @if(auth()->id() === $comment->user_id)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Are you sure?')"
                                    class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach

        @auth
            <h3 class="text-lg font-semibold mt-4 mb-2">Add a Comment:</h3>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <textarea name="comment" rows="4" class="w-full p-2 border border-gray-300 rounded" required></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Post Comment</button>
            </form>
        @endauth

        @guest
            <p class="mt-4 text-gray-500">You must be logged in to post a comment.</p>
        @endguest
    </div>
</x-app-layout>
