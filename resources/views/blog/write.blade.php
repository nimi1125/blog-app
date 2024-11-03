<x-app-layout>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mt-5">
        Title
    </h2>
    <form method="post" enctype="multipart/form-data" class="space-y-5 mt-5">
        <div class="writeImgBox flex items-center space-x-3">
            <input type="file" name="avatar" class="block text-sm text-gray-500 
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100
                cursor-pointer">
        </div>
        <div class="writeTxtBox">
            <textarea name="comment" class="w-full h-32 p-3 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your comment here..."></textarea>
            <button type="submit" class="mt-3 createBtn">
                Create
            </button>
        </div>
    </form>
</div>
</x-app-layout>