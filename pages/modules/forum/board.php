<?php define('DarkCoreCMS', TRUE);
foreach (glob("../engine/functions/*.php") as $filename)
{
    include $filename;
}
include '../header.php';
if (isset($_SESSION['usr'])) {
    $user_prw = $_SESSION['usr'];
    $user_account->construct(ucfirst($user_prw));}
	?>]
    <div id="notify">Forum is not coded yet until beta release</div>
	<div id='content'>
        <div id="forum-left">
    <?php $board = new BoardData;
          $forums = new ForumsData;
          $topic = new TopicsData;
            $board->construct(); $i=1;
                foreach($board->categorys as $category){ ?>
                <div id="forum-category-left">
                <div class='lastnews-head-text'><?php echo $board->categorys[$i]['title']; ?></div>
                <div class="newsdivider"></div>
                <?php
                        $forums->construct($i);
                        $j=1;
                        foreach ($forums->forums as $forum){
                                    $topic->construct_basic($j); ?>
                            <?php if (!is_null($forums->forums[$j]['description'])) {?>
                                <div class="forum-line">
                                    <a href="forum=<?php echo $forums->forums[$j]['id'] ?>/<?php echo urlencode($forums->forums[$j]['title']) ?>">
                                        <div class="forum-icon-place"><img src="../<?php echo $forums->forums[$j]['icon'] ?>" class="forum-icon"/></div>
                                        <div class="f-title-desc">
                                            <div class="f-title"><?php echo $forums->forums[$j]['title'] ?></div>
                                            <div class="f-desc"><?php echo $forums->forums[$j]['description'] ?></div>
                                        </div>
                                        <div class="f-info-topics">
                                            <div style="font-weight:bold;padding-top:10px;"><?php echo $topic->total_topics; ?></div>
                                            <div style="color:#ffffff">TOPICS</div>
                                        </div>
                                        <div class="f-info-posts">
                                            <div style="font-weight:bold;padding-top:10px;"><?php echo $topic->total_posts; ?></div>
                                            <div style="color:#ffffff">POSTS</div>
                                        </div>
                                    </a>
                                    <?php $lasttopic = $topic->get_last_topic($forums->forums[$j]['id']); { ?>
                                    <div class="f-info-latest">
                                        <a href="topic=<?php echo $lasttopic['id'];?>/<?php echo urlencode($lasttopic['title']);?>"><div style="color:#A1E8B9;padding-top:5px;font-size:12px"><?php if (strlen($lasttopic['title'])>24) echo substr($lasttopic['title'], 0, 24).'...'; else echo $lasttopic['title']; ?></div></a>
                                        <a href="../player?id=<?php echo $lasttopic['autor']; ?>"><div style="color:#<?php echo namecolor(get_rank_byid($lasttopic['autor'])); ?>;font-size:12px"><?php echo ucfirst(strtolower(get_username_byid($lasttopic['autor']))); ?></div></a>
                                        <div style="color:#717B7A;font-size:12px"><?php echo $lasttopic['date']; ?></div>
                                    </div>
                                    <?php } ?>
                                </div>
                        <?php } else {?>
                                <div class="area-forum-line">
                                    <a href="forum=<?php echo $forums->forums[$j]['id'] ?>/<?php echo urlencode($forums->forums[$j]['title']); ?>">
                                        <div class="forum-icon-place"><img src="../<?php echo $forums->forums[$j]['icon']; ?>" class="forum-icon"/></div>
                                        <div class="area-f-title-desc">
                                            <div class="area-f-title"><?php echo $forums->forums[$j]['title']; ?></div>
                                            <div class="area-f-desc">Topics: <?php  echo $topic->total_topics; ?> Posts: <?php  echo $topic->total_posts; ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php } $j++;}?>
                    </div>
                            <?php
                        $i++; }?>
            </div>
            <div id='forum-right'>
                <?php $stats= new ForumStats; $stats->construct(); $i=1;?>
                <div class='lastnews-head-text'>Recent Topics</div>
                <div class="newsdivider"></div>
                <?php foreach($stats->latest_topics as $topics) {?>
                <div class="right-info-latest">
                    <a href="topic=<?php echo $stats->latest_topics[$i]['id'];?>/<?php echo urlencode($stats->latest_topics[$i]['title']);?>"><div style="color:#A1E8B9;padding-top:5px;font-size:16px"><?php echo $stats->latest_topics[$i]['title']; ?></div></a>
                    <a href="../player?id=<?php echo $stats->latest_topics[$i]['autor']; ?>"><div style="color:#<?php echo namecolor(get_rank_byid($stats->latest_topics[$i]['autor'])); ?>;font-size:14px"><?php echo ucfirst(strtolower(get_username_byid($stats->latest_topics[$i]['autor']))); ?></div></a>
                    <div style="color:#717B7A;font-size:12px"><?php echo $stats->latest_topics[$i]['date']; ?></div>
                </div>
                <?php $i++; } $i=1;?>
                <div class='lastnews-head-text'>Latest Posts</div>
                <div class="newsdivider"></div>
                <?php foreach($stats->latest_posts as $posts) { $topicbyid = $stats->get_topic_by_id($stats->latest_posts[$i]['topic_id']);?>
                    <div class="right-info-latest">
                        <a href="topic=<?php echo $topicbyid['id']; ?>/<?php echo urlencode($topicbyid['title']);?>"><div style="color:#A1E8B9;padding-top:5px;font-size:16px"><?php echo $stats->latest_posts[$i]['body']; ?></div></a>
                        <a href="../player?id=<?php echo $stats->latest_posts[$i]['autor']; ?>"><div style="color:#<?php echo namecolor(get_rank_byid($stats->latest_posts[$i]['autor'])); ?>;font-size:14px"><?php echo ucfirst(strtolower(get_username_byid($stats->latest_posts[$i]['autor']))); ?></div></a>

                        <div style="color:#717B7A;font-size:12px"><?php echo $stats->latest_posts[$i]['date']; ?></div>
                    </div>
                    <?php $i++; } ?>
                <div class='lastnews-head-text'>Statistics</div>
                <div class="newsdivider"></div>
                <div class="right-info-latest">
                    <div class="statistics-label">Total Accounts:</div><div class="statistics-values"><?php echo $stats->total_accounts; ?></div>
                    <div class="statistics-label">Total Topics:</div><div class="statistics-values"><?php echo $stats->total_topics; ?></div>
                    <div class="statistics-label">Total Posts:</div><div class="statistics-values"><?php echo $stats->total_posts; ?></div>
                    <div class="statistics-label">Newest Member:</div><a href="../player?id=<?php echo $stats->last_member['id']; ?>"><div class="statistics-values" style="color: #<?php echo namecolor(get_rank_byid($stats->last_member['id'])); ?>;"><?php echo ucfirst(strtolower($stats->last_member['username'])); ?></div></a>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">SkinnyTip.init();</script>
<?php include 'global-footer.php'; ?>