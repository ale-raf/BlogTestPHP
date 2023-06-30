<?php
include('../../src/Helpers/Text.php');
include('../../src/Model/Post.php');

use App\Helpers\Text;
use App\Model\Post;

$title = 'Mon blog';
$pdo = new PDO('mysql:dbname=blog;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$query = $pdo->query('SELECT * FROM post ORDER BY created_at DESC LIMIT 12');
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class);
?>
// $pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
// $pdo->exec('TRUNCATE TABLE post_category');
// $pdo->exec('TRUNCATE TABLE post');
// $pdo->exec('TRUNCATE TABLE category');
// $pdo->exec('TRUNCATE TABLE user');
// $pdo->exec('SET FOREIGN_KEY_CHECKS = 1');


// for($i = 0; $i < 50; $i++) {
//     $pdo->exec("INSERT INTO post SET name='Article #$i', slug='article-$i', created_at='2023-06-30 15:00:00', content='lorem ipsum'");
// }


<h1>Mon blog</h1>

<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3">
        <?php require 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>