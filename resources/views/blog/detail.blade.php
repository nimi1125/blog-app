<x-app-layout>
    @if(isset($error))
        <div class="alert alert-danger text-center text-xl">
            <p class="mt-5 block">{{ $error }}</p> 
            <a href="{{ route('home') }}" class="mt-5 block">トップページに戻る</a>
        </div>
    @endif
    @if(isset($post))
        <section class="container mx-auto mt-5 px-4">
            <div class="blogDetailArea">
                <div class="blogDetailTitBox flex justify-between items-center">
                    <h2 class="text-2xl font-semibold">{{ $post->title }}</h2>
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('img/person.jpg') }}" alt="User Image" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="blogDetailImgBox mt-5 h-72">
                    <img src="{{ asset($post->image_path) }}" alt="Blog Image" class="w-full h-full object-cover rounded-lg">
                </div>

                <div class="blogDetailTxtBox mt-5">
                    <p class="text-gray-700 leading-relaxed mt-2">
                        {!! nl2br(htmlspecialchars($post->content)) !!}
                    </p>
                </div>
            </div>
        </section>

        @if($posts->isNotEmpty())        
            <section class="container mx-auto mt-5 px-4">
                <h3 class="text-xl mb-2">More Post</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($posts as $item)
                        <a href='{{ route('detail',$item) }}' class="text-center block text-black hover:opacity-8">
                            <div class="morepostImgBox w-full h-48 rounded-lg overflow-hidden">
                                <img src="{{ asset($item->image_path) }}" alt="More Post Image" class="w-full h-full object-cover">
                            </div>
                            <h4 class="text-lg font-medium mt-2">{{ $item->title }}</h4>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="container mx-auto mt-5 px-4">
            <h3 class="text-xl mb-2">Comments</h3>
            <div class="flex items-start space-x-4">
                <form method="post" action="{{ route('comment.store', ['id' => $post->id]) }}" enctype="multipart/form-data" class="w-full">
                    @csrf
                    <div class="flex-grow">
                        @error('content')
                            <div class="alert alert-success p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                        @enderror
                        @if (session('success'))
                            <div class="alert alert-success p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                                {{ session('success') }}
                            </div>
                        @endif
                        <textarea name="content" class="w-full h-20 p-3 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add a comment..."></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                        Comment
                    </button>
                </form>
            </div>

            @if($comments->isNotEmpty())
                <div class="commentArea rounded-lg">
                    <div class="commentBox h-full py-2 px-4 mt-5 space-y-4 bg-white overflow-y-scroll">
                        @foreach($comments as $comment)
                            <div class="flex space-x-4 items-start py-2 px-4">
                                <div class="w-12 h-12 rounded-full overflow-hidden">
                                    <img src="{{ asset('img/person.jpg') }}" alt="User Image" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-grow">
                                    <div class="commentContentBox relative bg-gray-100 p-3 rounded-lg">
                                        <p class="text-gray-700">
                                            {!! nl2br(htmlspecialchars($comment->content)) !!}
                                        </p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Posted by {{ $comment->user->name ?? 'Unknown User' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center text-gray-500 mt-5 py-2 px-4">コメントはまだありません。</p>
            @endif
        </section>
    @endif
</x-app-layout>


