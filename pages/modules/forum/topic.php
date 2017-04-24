<?php define('DarkCoreCMS', TRUE);
include 'header.php';
include '../engine/config.php';
include '../engine/functions/global_functions.php';
include '../engine/functions/realm_functions.php';
include '../engine/functions/bugtracker.php';
include '../engine/functions/account_functions.php';
include '../engine/functions/vote_functions.php';
include '../engine/functions/armory_functions.php';
include '../engine/functions/board_functions.php';
$topic = new TopicData;
if (isset($_GET['id'])){
    $error = 0;
    if ($topic->check_topic_exist(convertToIntExtended($_GET['id'])) == true) {
        $topic->get_topics_by_id(convertToIntExtended($_GET['id']));
        if (isset($topic->topic))
            $thread_base = $topic->topic;
    }
    else
        $error = 1;
}
?>
<title>GamingZeta - <?php if (isset($thread_base['title'])) echo ucwords( $thread_base['title'] ); else echo 'Can\'t Find'; ?> </title>
</head>
<body>
<div id='header'>
</div>
<?php include 'menu.php';?>
    <div id='content'>
        <div id='content-wrapper'>
            <?php if ($error == 1){
            echo"<div id='forum-notify-frame'>
                        The topic you are looking for seems to not exist
                </div>";
            } else {
                $user_account = new account;
                $user_account->construct(ucfirst(get_username_byid($thread_base['autor'])));
                    echo $thread_base['id'].'<br>';
                    echo $thread_base['title'].'<br>';
                    echo $thread_base['body'].'<br>';
                    echo $thread_base['forum'].'<br>';
                    echo $thread_base['thumbnail'].'<br>';
                    echo $thread_base['date'].'<br>';
                    echo $user_account->avatar.'<br>';
                    echo $user_account->joindate.'<br>';
            } ?>
        </div>
    </div>
<script type="text/javascript">SkinnyTip.init();</script>
<?php include 'global-footer.php'; ?>