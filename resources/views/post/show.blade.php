<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post information') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="post-list">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    @if ($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image">
                    @endif
                    <form action="{{ route('comment.store',$post) }}" method="post">
                        @csrf
                        <x-text-input name="content" style="width: 100%; resize: none;"></x-text-input>
                        <button type="submit" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                        Add
                    </button>
                    </form>

                    @foreach ($post->comments as $comment)
                        <p>{{ $comment->user->name }}: {{ $comment->content }}</p>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>