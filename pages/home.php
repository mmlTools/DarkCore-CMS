<?php if (!defined("DARKCORECMS")) redirect("../");
    $login = new Login;
    if (isset($_POST['login']))
        $login->do_login($_POST['login_username'], $_POST['login_password']);
    $login_errors = $login->login_errors;
    $news_engine = new News;
    $news = $news_engine->news;
?>
<div id='content'>
    <div id='index-content-left'>
        <div id='main-tools'>
            <div class='main-tools-box'>
                <h1 class="main-tools-head-text">WELCOME TO <?php echo strtoupper($website_title) ?></h1>
                <div class="main-tools-description"><?php echo $website_description ?></div>
                <ul>
                    <li class="main-tools-li"><a href="index?page=armory">ARMORY</a></li>
                    <li class="main-tools-li"><a href="index?page=guides">GUIDES</a></li>
                    <li class="main-tools-li"><a href="index?page=rules">RULES</a></li>
                </ul>
            </div>
        </div>
        <?php foreach($news as $announcement) { ?>
        <div id='lastnews'>
            <div class='lastnews-head-text'><?php echo $announcement['title'] ?></div>
            <div class='newsdivider'></div>
            <div class='news'>
                <div class='newsthumbbody'>
                    <?php echo $announcement['body'] ?>
                </div>
            </div>
            <div class="news-author-box">
                <div class="avatar">
                    <img src="style/images/avatars/<?php echo $announcement['author']['avatar'] ?>" />
                </div>
                <span>
                    <label>Posted by</label>
                    <label><?php echo rank_color($announcement['author']['nickname'], $announcement['author']['rank']) ?></label>
                    <label><?php echo date_string($announcement['date']) ?></label>
                </span>
            </div>
        </div>
        <?php } ?>
        <div id='mediabox'>
            <div class='mediabox-head-text'>MEDIA</div>
            <div class="newsdivider"></div>
            <iframe id="abc_frame" width="368" height="215" src="https://www.youtube.com/embed/iyQ0dXWmW6o" frameborder="0" allowfullscreen></iframe>
            <div class="media-line">
                <div class="media-thumb" onclick="getvideo('iyQ0dXWmW6o')">
                    <img src="http://img.youtube.com/vi/iyQ0dXWmW6o/2.jpg" width="50" height="50" />
                </div>
                <div class="media-thumb" onclick="getvideo('vRYvhY8YzU4')" style="margin-left:10px;">
                    <img src="http://img.youtube.com/vi/vRYvhY8YzU4/2.jpg" width="50" height="50" />
                </div>
            </div>
        </div>
        <div id='secondary-box'>
            <div class='mediabox-head-text'>SOCIAL MEDIA</div>
            <div class="newsdivider"></div>
            <div class="milestone-line">
                Next Milestone: <label style="color:#5BD0B0;">750</label> Likes Reward: <label style="color:#5BD0B0;">3</label> DP <label style="color:#5BD0B0;">300</label> VP<br>
                Last Milestone: <label style="color:#5BD0B0;">700</label> Likes Reward: <label style="color:#5BD0B0;">500</label> VP<br>
            </div>
        </div>
    </div>
    <div id='index-content-right'>
        <?php if (!isset($_SESSION['usr'])) { ?>
        <div class='acclogin-info'>
            <div class='acclogin-info-head-text'>ACCOUNT</div>
            <div class='newsdivider'></div>
            <?php if (count($login_errors) > 0) {
                foreach ($login_errors as $key => $error) echo "<label class='error'>{$error}</label>";
             } ?>
            <div class='loggedas'>
                <form action='' method='post'  autocomplete='off' enctype='multipart/form-data'>
                    <input value=''  name='login_username' class='usrinput' placeholder='Username' autocomplete='off' type='text' />
                    <input value=''  name='login_password' class='usrinput' style='margin-top:5px;' placeholder='Password' autocomplete='off' type='password' />
                    <input value='Login' name='login' id='submit' type='submit'>
                    <a href='modules/register' 	><div class='submit-submenu'>Register</div></a>
                </form>
            </div>
        </div>
        <?php } ?>
        <div class="connectionguide"></div>
        <div class="dpatches"></div>
        <div class="rmlist">set realmlist <?php echo $realmlist ?></div>
        <div class="realmstat">
            <a href="modules/realm?id=1">
                <img class="gversion" src='style/images/icons/r-wotlk.png' height='19' alt='wotlk icon' />
                <div class="realmname">
                    <a href='' class='realmnamelink'>DarkCore CMS</a>
                </div>
                <div class="realminfo">
                    Online: 0/250
                    Alliance: 0
                    Horde: 0
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    function getvideo($code){
        $(document).ready(function() {
            $('#abc_frame').attr('src','https://www.youtube.com/embed/'+$code);
        })
    }
</script>
