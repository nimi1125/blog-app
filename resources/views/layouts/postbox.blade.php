<div class="container mx-auto mt-5 mb-5">
    <div class="flex space-x-2">
        <input type="search" id="site-search" name="q" class="border border-gray-300 rounded-md p-2 flex-grow" placeholder="Search"/>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5 px-7">
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
</div>