@extends('layouts.app')
@section('content')

<section class="container mx-auto">
    <div class="mt-5">
        <h2 class="text-2xl font-semibold">
            Your Post
        </h2>
    </div>
    @include('layouts.postbox')
</section>

@endsection