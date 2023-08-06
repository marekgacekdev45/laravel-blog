<x-layout>

    <x-settings heading="Publish New Post">

        <form action="{{ route('admin.post.create') }}" method="post" enctype="multipart/form-data">
            @csrf
    
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.input name="excerpt" />
            <x-form.textarea name="body" />
    
            <div class="mb-6">
                <label for="category_id"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                <select name="category_id" id="category_id">
    
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
    
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
    
                </select>
    
                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
    
    
            <x-buttons.primary-button type="submit">Add Post</x-buttons.primary-button>
        </form>
       
    </x-settings>
</x-layout>
