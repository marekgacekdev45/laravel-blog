<x-layout>

    <x-settings heading="Edit Post - {{ $post->title }}">

        <form action="{{ route('admin.post.update',$post->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PatCH')

            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('slug', $post->slug)" />
            <div class="flex mb-3">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl mr-5" width="100">
                <x-form.input name="thumbnail" type="file" />
            </div>
            <x-form.input name="excerpt" :value="old('excerpt', $post->excerpt)" />
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                <select name="category_id" id="category_id">

                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach

                </select>

                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <x-buttons.primary-button type="submit">Update</x-buttons.primary-button>
        </form>

    </x-settings>
</x-layout>
