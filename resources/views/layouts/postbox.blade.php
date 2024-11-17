<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5 px-7">
    @if($posts->isEmpty())
        <p>該当データがありません。</p>
    @else
        @foreach($posts as $post)
            <div class="postBox bg-white rounded-lg h-96">
                <div class="postImgItem overflow-hidden w-64 h-32">
                    <img src="{{ $post->image_path }}" alt="{{ $post->title }}" class="object-contain w-full h-full">
                </div>
                <div class="postTxtItem p-4">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg font-semibold">{{ $post->title }}</h4>
                        <p class="text-sm text-blue-500">{{ $post->category_name }}</p>
                    </div>
                    <div class="postSubTxtBox flex space-x-4 mt-2 text-gray-500 text-sm">
                        <p class="author text-blue-500">{{ $post->user_name }}</p>
                        <p class="updateTime">{{ $post->updated_at->locale('en')->diffForHumans() }}</p>
                    </div>
                    <div class="mainTxt mt-4">
                        <p class="text-gray-700">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
{{-- ToDo: ページネーションのCSSがうまく反映されない --}}
<div class="text-center px-36 mt-2 pagenation">
    {{ $posts->Links() }}
</div>