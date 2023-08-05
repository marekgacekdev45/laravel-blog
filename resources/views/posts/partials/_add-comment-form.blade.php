@auth


<x-panel>
    <form action="{{ route('comments.store', $post->slug) }}" method="post">
        @csrf
        <header class="flex">
            <img src="https://i.pravatar.cc/100?u{{ auth()->id() }}" alt="" width="40"
                height="40" class="rounded-full">
            <h2 class="ml-4">Want to talk?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" id="" rows="5" class="w-full text-sm focus:ring p-2"
                placeholder="Write something" required></textarea>

                @error('body')
                    <span>{{$message}}</span>
                @enderror
        </div>
        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            {{-- <button type="submit"
                class="bg-blue-500 text-white rounded-2xl uppercase font-semibold text-xs py-2 px-10 hover:bg-blue-600">Post</button> --}}
                <x-buttons.primary-button type="submit">Post</x-buttons.primary-button>
        </div>
    </form>
</x-panel>
@else
<a href="/register">Register</a> or <a href="/login">Log In to post a commment</a>
@endauth