@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">

    
    <h1 class="font-bold mb-5">{{$heading}}</h1>
    
    <div class="flex">
        
        <aside class="w-48">
            <h4 class="font-extrabold">Links</h4>
            <ul>
                <li><a href="/admin/posts">All Posts</a></li>
                <li><a href="/admin/posts/create">Create Posts</a></li>
            </ul>
        </aside>
        
        <main class="flex-1">
            
            <x-panel class="max-w-xl mx-auto">
                
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>