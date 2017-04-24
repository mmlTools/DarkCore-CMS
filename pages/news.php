<?php if (!defined("DARKCORECMS") || !isset($_GET['id'])) header('Location: ../');
$news_engine = new News;
$news = $news_engine->news;
?>