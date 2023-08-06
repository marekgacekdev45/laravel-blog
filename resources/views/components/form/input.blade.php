@props(['name', 
// 'type' => 'text'
])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input class="border border-gray-400 p-2 w-full" 
    name="{{ $name }}" 
    id="{{ $name }}" 
   
   {{-- value="{{ old($name) }}"  --}}
   {{-- type="{{ $type }}" --}}
   {{$attributes(['value'=> old($name)])}}
   >
    <x-form.error name="{{ $name }}" />
</x-form.field>
