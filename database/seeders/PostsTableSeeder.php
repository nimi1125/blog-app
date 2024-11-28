<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();

        $beachResortCategoryId = Category::where('name', 'ビーチリゾート')->first()->id;
        $historyCultureCategoryId = Category::where('name', '歴史・文化')->first()->id;
        $natureOutdoorCategoryId = Category::where('name', '自然・アウトドア')->first()->id;

        $images = [
            'img/beach.jpg',
            'img/mountain.jpg',
            'img/river.jpg',
        ];

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $natureOutdoorCategoryId,
            'title' => 'バリ島の隠れた名所を巡る',
            'content' => 'バリ島は観光地として有名ですが、観光客が少ない場所にも素晴らしいスポットがたくさんあります。例えば、ウブドの棚田はその美しい風景で知られ、静かな時間を過ごすには最適な場所です。さらに、サヌールビーチでは、穏やかな海と美しい夕日を楽しむことができます。地元の市場では、手作りの工芸品や香辛料を手に入れることができ、バリ島の文化を深く感じることができるでしょう。忙しい観光地を避け、静かで魅力的な場所を巡る旅は、心に残る素晴らしい経験です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $historyCultureCategoryId,
            'title' => 'フランス・パリで過ごすロマンティックな日々',
            'content' => 'パリは世界的に有名なロマンティックな都市です。エッフェル塔の前で写真を撮ったり、セーヌ川沿いを散歩したりするのは定番ですが、カフェでのんびりと過ごす時間も格別です。特にモンマルトル地区は、アートと歴史が息づく魅力的なエリアで、隠れたカフェやギャラリーを訪れることができます。夜には、ライトアップされたエッフェル塔を眺めながらディナーを楽しむのも、パリならではの楽しみ方です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $historyCultureCategoryId,
            'title' => 'イタリア・アマルフィ海岸の魅力',
            'content' => 'アマルフィ海岸はその美しい海と絶壁の上に広がる町々で有名です。特にポジターノは、カラフルな家々と海を見渡す絶景で、多くの旅行者を魅了しています。海岸沿いのレストランでは、新鮮なシーフードを味わいながら、青い海と空を楽しむことができます。街歩きでは、小さな道を進みながら古い教会や歴史的な建物を見つけることができ、ロマンティックな雰囲気に包まれた場所です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $beachResortCategoryId,
            'title' => 'ハワイ・オアフ島のアクティブな楽しみ方',
            'content' => 'オアフ島は美しいビーチだけでなく、アクティビティも充実しています。特にノースショアはサーフィンで有名で、世界中からサーフィン愛好者が集まります。また、ダイヤモンドヘッドのハイキングは、素晴らしい景色を楽しみながら運動できるスポットです。ワイキキビーチではシュノーケリングやパドルボードも楽しめ、海の生物と触れ合うことができます。アクティブな旅行を楽しみながら、リラックスできるビーチでもゆっくり過ごせるのが魅力です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $historyCultureCategoryId,
            'title' => 'スペイン・バルセロナで過ごす芸術と歴史の一日',
            'content' => 'バルセロナはガウディの建築で有名ですが、それ以外にも芸術と歴史が息づく街です。サグラダ・ファミリアやパルク・グエルを訪れるのはもちろん、ゴシック地区を歩いて中世の雰囲気を感じるのも魅力的です。バルセロナの市場では新鮮な食材や地元の料理を楽しむことができ、街全体がアートと文化に包まれた場所です。美しい街並みと美味しい食事が待っています。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $historyCultureCategoryId,
            'title' => 'ギリシャ・サントリーニ島の魅力に迫る',
            'content' => 'サントリーニ島はその美しい白と青の街並みが特徴で、誰もが一度は訪れてみたい場所です。フィラやイアの町では、白い家々と青い海のコントラストが絶景です。夕暮れ時に見られるサンセットは、サントリーニ島での最もロマンティックな瞬間です。島全体にはワイナリーも点在しており、地元のワインを楽しむこともできます。静かな海と壮大な景色に包まれたサントリーニ島は、忘れられない思い出を作る場所です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $beachResortCategoryId,
            'title' => 'モルディブで過ごす究極のリゾート体験',
            'content' => 'モルディブは美しい海と贅沢なリゾートで知られ、まさに天国のような場所です。透明な海ではシュノーケリングやダイビングを楽しむことができ、色とりどりの魚やサンゴ礁を観察できます。リゾート内にはプライベートヴィラもあり、ビーチに面したお部屋からは直接海にアクセスできる贅沢な体験が可能です。モルディブで過ごすひとときは、心身ともにリフレッシュできる至福の時間です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $natureOutdoorCategoryId,
            'title' => 'オーストラリア・シドニーでの都市と自然の融合',
            'content' => 'シドニーは、都市の魅力と自然の美しさが絶妙に融合した場所です。シドニーオペラハウスやハーバーブリッジは有名な観光スポットですが、少し足を延ばすとボンダイビーチやブルーマウンテンズなどの自然も堪能できます。シドニー湾をクルージングしたり、パディントンのカフェでくつろいだり、都市と自然をバランスよく楽しめるシドニーは、魅力的な観光地です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $natureOutdoorCategoryId,
            'title' => 'アメリカ・ニューヨークで体験する刺激的な日常',
            'content' => 'ニューヨークは、街そのものがエンターテイメントで溢れています。タイムズスクエアでの煌びやかな夜景や、セントラルパークでのリラックスしたひととき、ミュージアムマイルを歩いてアートに触れることもできます。さらに、ストリートフードやローカルのレストランでニューヨークならではの美味しい料理を楽しむことができ、何度でも訪れたくなる都市です。',
            'image_path' => $images[array_rand($images)],
        ]);

        Post::create([
            'user_id' => $users[array_rand($users)],
            'category_id' => $natureOutdoorCategoryId,
            'title' => 'カナダ・バンフ国立公園の自然を堪能',
            'content' => 'バンフ国立公園は、カナディアンロッキーの美しい自然を堪能できる場所です。エメラルドグリーンの湖や壮大な山々が広がり、四季折々の風景が楽しめます。ハイキングやカヤックで大自然を感じながら、静かな時間を過ごすことができます。冬にはスキーやスノーボードが楽しめるため、四季を通じて訪れる価値があります。大自然に囲まれて、心身ともにリフレッシュできる素晴らしい場所です。',
            'image_path' => $images[array_rand($images)],
        ]);
    }
}
