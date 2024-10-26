@extends('layouts.guest')

@section('content')
<div class="container mx-auto mt-5 mb-5">
    <div class="flex space-x-2">
        <input type="search" id="site-search" name="q" class="border border-gray-300 rounded-md p-2 flex-grow" placeholder="Search"/>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
    </div>
</div>

<section class="container mx-auto">
    @include('layouts.postbox')
</section>
@endsection