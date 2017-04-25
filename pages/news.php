<?php if (!defined("DARKCORECMS") || !isset($_GET['id'])) header('Location: ../');
$news_engine = new News;
$news = $news_engine->news;
?>
<div id='content'>
    <div id='errors-box'>
        <label class="ok"><?php echo "This module is under development" ?></label>
    </div>
    <div id='content-wrapper'>

    </div>
</div>
