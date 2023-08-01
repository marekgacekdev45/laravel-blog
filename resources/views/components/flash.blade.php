@if (session()->has('success'))
<div x-data='{show:true}' x-init="setTimeout(()=>show=false,4000)" x-show='show'
 class="fixed  text-white bg-blue-700 rounded-xl py-2 px-4 bottom-3 right-3" >
    {{-- <p>{{session->get('success')}}</p> --}}
    <p>{{session('success')}}</p>
</div>
@endif