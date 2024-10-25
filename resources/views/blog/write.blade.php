@include('blog.header')

<div class="container writeContainer">
    <h2 class="mt-5 writeTit">
    Title
    </h2>
    <form method="post" enctype="multipart/form-data">
        <div class="writeImgBox mt-5">
            <input class="writeImgInput" type="file" name="avatar">
            <button class="writeImgBtn" type="submit">Upload Image</button>
        </div>
        <div class="writeTxtBox mt-5">
            <textarea name="comment" class="commentTxtArea"></textarea>
            <button type="submit" class="createBtn mt-3">create</button>
        </div>
    </form>
</div>