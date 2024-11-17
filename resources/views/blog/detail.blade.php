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

                <div class="blogDetailImgBox mt-5">
                    <img src="{{ asset($post->image_path) }}" alt="Blog Image" class="w-full h-72 object-cover rounded-lg">
                </div>

                <div class="blogDetailTxtBox mt-5">
                    <p class="text-gray-700 leading-relaxed mt-2">
                        {{ $post->content }}
                    </p>
                </div>
            </div>
        </section>

        <section class="container mx-auto mt-5 px-4">
            <h3 class="text-xl mb-2">More Post</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($posts as $post)
                    <a href='{{ route('detail',$post) }}' class="text-center block text-black hover:opacity-5">
                        <div class="morepostImgBox w-full h-48 rounded-lg overflow-hidden">
                            <img src="{{ asset($post->image_path) }}" alt="More Post Image" class="w-full h-full object-cover">
                        </div>
                        <h4 class="text-lg font-medium mt-2">{{ $post->title }}</h4>
                    </a>
                @endforeach
            </div>
        </section>

        <section class="container mx-auto mt-5 px-4">
            <div class="flex items-start space-x-4">
                <form method="post" action="{{ route('comment.store', ['id' => $post->id]) }}" enctype="multipart/form-data" class="w-full">
                    @csrf
                    <div class="flex-grow">
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


            <div class="commentArea mt-5 space-y-4">
                <div class="flex space-x-4 items-start">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('img/person.jpg') }}"" alt="User Image" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <div class="bg-gray-100 p-3 rounded-lg">
                            <p class="text-gray-700">コメントコメントコメントコメントコメント</p>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">a min ago</p>
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-app-layout>