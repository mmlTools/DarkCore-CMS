
</div>
<div id="forum-left">
    <div id="forum-category-left">
        <div class='lastnews-head-text'><?php echo $board->categorys[1]['title']; ?></div>
        <div class="newsdivider"></div>

        <div class="forum-line">
            <a href="?forum=<?php echo $forums->forums[$j]['id'] ?>">
                <div class="forum-icon-place"><img src="<?php echo $forums->forums[$j]['icon'] ?>" class="forum-icon"/></div>
                <div class="f-title-desc">
                    <div class="f-title"><?php echo $forums->forums[$j]['title'] ?></div>
                    <div class="f-desc"><?php echo $forums->forums[$j]['description'] ?></div>
                </div>
                <div class="f-info-topics">
                    <div style="font-weight:bold;padding-top:10px;"><?php echo rand(100,1000); ?></div>
                    <div style="color:#ffffff">TOPICS</div>
                </div>
                <div class="f-info-posts">
                    <div style="font-weight:bold;padding-top:10px;"><?php echo rand(100,1000); ?></div>
                    <div style="color:#ffffff">POSTS</div>
                </div>
            </a>
            <div class="f-info-latest">
                <div style="padding-top:5px;font-size:12px">General informations</div>
                <div style="color:#FF0000;font-size:12px">Darksoke</div>
                <div style="color:#717B7A;font-size:12px">Sun Nov 8, 2015, 11:41 pm</div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div id="forum-category-left">
        <div class='lastnews-head-text'>Area Forums</div>
        <div class="newsdivider"></div>
        <?php $forums->get_forums_by_category(2); for ($j=1;$j <= count($forums->forums);$j++){ ?>
        <div class="area-forum-line">
            <a href="?forum=<?php echo $forums->forums[$j]['id'] ?>">
                <div class="forum-icon-place"><img src="<?php echo $forums->forums[$j]['icon'] ?>" class="forum-icon"/></div>
                <div class="area-f-title-desc">
                    <div class="area-f-title"><?php echo $forums->forums[$j]['title'] ?></div>
                    <div class="area-f-desc">Topics: <?php echo rand(100,1000); ?></div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
    <div id="forum-category-left">
        <div class='lastnews-head-text'>Class discutions</div>
        <div class="newsdivider"></div>
        <?php $forums->get_forums_by_category(3); for ($j=1;$j <= count($forums->forums);$j++){ ?>
        <div class="area-forum-line">
            <a href="?forum=<?php echo $forums->forums[$j]['id'] ?>">
                <div class="forum-icon-place"><img src="<?php echo $forums->forums[$j]['icon'] ?>" class="forum-icon"/></div>
                <div class="area-f-title-desc">
                    <div class="area-f-title"><?php echo $forums->forums[$j]['title'] ?></div>
                    <div class="area-f-desc">Topics: <?php echo rand(100,1000); ?></div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<div id='forum-right'>
    <div class='lastnews-head-text'>Recent Topics</div>
    <div class="newsdivider"></div>
    <div class="right-info-latest">
        <div style="padding-top:5px;font-size:16px">General informations</div>
        <div style="color:#FF0000;font-size:14px">Darksoke</div>
        <div style="color:#717B7A;font-size:12px">Sun Nov 8, 2015, 11:41 pm</div>
    </div>
    <div class="right-info-latest">
        <div style="padding-top:5px;font-size:16px">General informations</div>
        <div style="color:#FF0000;font-size:14px">Darksoke</div>
        <div style="color:#717B7A;font-size:12px">Sun Nov 8, 2015, 11:41 pm</div>
    </div>
    <div class="right-info-latest">
        <div style="padding-top:5px;font-size:16px">General informations</div>
        <div style="color:#FF0000;font-size:14px">Darksoke</div>
        <div style="color:#717B7A;font-size:12px">Sun Nov 8, 2015, 11:41 pm</div>
    </div>
    <div class='lastnews-head-text'>Latest Posts</div>
    <div class="newsdivider"></div>
    <div class="right-info-latest">
        <div style="padding-top:5px;font-size:16px">RE: General informations</div>
        <div style="color:#FF0000;font-size:14px">Darksoke</div>
        <div style="color:#717B7A;font-size:12px">Sun Nov 8, 2015, 11:41 pm</div>
    </div>
    <div class="right-info-latest">
        <div style="padding-top:5px;font-size:16px">RE: General informations</div>
        <div style="color:#FF0000;font-size:14px">Darksoke</div>
        <div style="color:#717B7A;font-size:12px">Sun Nov 8, 2015, 11:41 pm</div>
    </div>
    <div class="right-info-latest">
        <div style="padding-top:5px;font-size:16px">RE: General informations</div>
        <div style="color:#FF0000;font-size:14px">Darksoke</div>
        <div style="color:#717B7A;font-size:12px">Sun Nov 8, 2015, 11:41 pm</div>
    </div>
    <div class='lastnews-head-text'>Statistics</div>
    <div class="newsdivider"></div>
    <div class="right-info-latest">
        <div class="statistics-label">Total Accounts:</div><div class="statistics-values"><?php echo rand(1000,10000); ?></div>
        <div class="statistics-label">Total Topics:</div><div class="statistics-values"><?php echo rand(1000,10000); ?></div>
        <div class="statistics-label">Total Posts:</div><div class="statistics-values"><?php echo rand(1000,10000); ?></div>
        <div class="statistics-label">Newest Member:</div><div class="statistics-values" style="color: #FF0000;">Darksoke</div>
    </div>
</div>
<?php } ?>
</div>




<div class="forum-line-big">
    <a href="?forum=1&topic=1&page=1">
        <div class="forum-big-icon-place"><img src="../<?php echo $forums->forums[$j]['icon']; ?>" class="forum-icon"/></div>
        <div class="f-big-title-desc">
            <div class="f-big-title"><?php echo $forums->forums[$j]['title']; ?></div>
            <div class="f-big-desc">Started by Darksoke on 11/11/2015</div>
        </div>
        <div class="f-info-posts-big">
            <div style="font-weight:bold;padding-top:10px;"><?php echo rand(100,1000); ?></div>
            <div style="color:#ffffff">POSTS</div>
        </div>
    </a>
    <div class="f-info-latest">
        <div style="padding-top:15px;color:#FF0000;font-size:18px">Darksoke</div>
        <div style="color:#717B7A;font-size:14px">Sun Nov 8, 2015, 11:41 pm</div>
    </div>
</div>