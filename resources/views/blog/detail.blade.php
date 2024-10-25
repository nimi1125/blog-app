@include('blog.header')

<section class="container mt-5">
    <div class="blogDetailArea">
        <div class="blogDetailTitBox d-flex justify-content-between">
            <h2 class="blogDetailTit">Blog Title</h2>
            <div class="blogDetailUserImgBox">
                <img src="" alt="">
            </div>
        </div>
        <div class="blogDetailImgBox">
            <img src="" alt="">
        </div>
        <div class="blogDetailTxtBox">
            <h3>見出しとか</h3>
            <p>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。<br>
                ブログ本文が入ります。ブログ本文が入ります。ブログ本文が入ります。
            </p>
        </div>
    </div>
</section>

<section class="container morepostSec">
    <div class="row mt-5">
        <div class="col-12 col-md-4">
            <div class="morepostImgBox">
                <img src="" alt="">
            </div>
            <h4 class="morepostTit mt-1">
                Post Title
            </h4>
        </div>
        <div class="col-12 col-md-4">
            <div class="morepostImgBox">
                <img src="" alt="">
            </div>
            <h4 class="morepostTit mt-1">
                Post Title
            </h4>
        </div>
        <div class="col-12 col-md-4">
            <div class="morepostImgBox">
                <img src="" alt="">
            </div>
            <h4 class="morepostTit mt-1">
                Post Title
            </h4>
        </div>
    </div>
</section>

<section class="commentsSec ml-auto mr-auto mt-5">
    <div class="row">
        <div class="col-9">
            <textarea name="comment" class="commentTxtArea"></textarea>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">Comment</button>
        </div>
    </div>
    <div class="commentArea mt-3">
        <div class="row">
            <div class="col-2">
                <div class="commentUserImgBox mx-auto">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col-10">
                <div class="commentTxt">
                    <p>コメントコメントコメントコメントコメント</p>
                </div>
                <p class="updateTime">
                    a min ago
                </p>
            </div>
        </div>
    </div>
</section>