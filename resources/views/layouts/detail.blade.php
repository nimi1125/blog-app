<x-app-layout>
<section class="container mx-auto mt-5 px-4">
    <div class="blogDetailArea">
        <!-- Blog Title and User Image -->
        <div class="blogDetailTitBox flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Blog Title</h2>
            <div class="w-12 h-12 rounded-full overflow-hidden">
                <img src="" alt="User Image" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Blog Main Image -->
        <div class="blogDetailImgBox mt-5">
            <img src="" alt="Blog Image" class="w-full h-72 object-cover rounded-lg">
        </div>

        <!-- Blog Content -->
        <div class="blogDetailTxtBox mt-5">
            <h3 class="text-xl font-medium">見出しとか</h3>
            <p class="text-gray-700 leading-relaxed mt-2">
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。
            </p>
        </div>
    </div>
</section>

<section class="container mx-auto mt-5 px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- More Posts -->
        <div class="text-center">
            <div class="morepostImgBox w-full h-48 rounded-lg overflow-hidden">
                <img src="" alt="More Post Image" class="w-full h-full object-cover">
            </div>
            <h4 class="text-lg font-medium mt-2">Post Title</h4>
        </div>

        <div class="text-center">
            <div class="morepostImgBox w-full h-48 rounded-lg overflow-hidden">
                <img src="" alt="More Post Image" class="w-full h-full object-cover">
            </div>
            <h4 class="text-lg font-medium mt-2">Post Title</h4>
        </div>

        <div class="text-center">
            <div class="morepostImgBox w-full h-48 rounded-lg overflow-hidden">
                <img src="" alt="More Post Image" class="w-full h-full object-cover">
            </div>
            <h4 class="text-lg font-medium mt-2">Post Title</h4>
        </div>
    </div>
</section>

<section class="container mx-auto mt-5 px-4">
    <!-- Comment Form -->
    <div class="flex items-start space-x-4">
        <div class="flex-grow">
            <textarea name="comment" class="w-full h-20 p-3 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add a comment..."></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
            Comment
        </button>
    </div>

    <!-- Comments Area -->
    <div class="commentArea mt-5 space-y-4">
        <div class="flex space-x-4 items-start">
            <div class="w-12 h-12 rounded-full overflow-hidden">
                <img src="" alt="User Image" class="w-full h-full object-cover">
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
</x-app-layout>