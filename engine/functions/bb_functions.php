<?php if (!defined("DARKCORECMS")) redirect("../../");
class BbParser {

    private   $find = array(
        '~\[h1\](.*?)\[/h1\]~s',
        '~\[h2\](.*?)\[/h2\]~s',
        '~\[h3\](.*?)\[/h3\]~s',
        '~\[h4\](.*?)\[/h4\]~s',
        '~\[h5\](.*?)\[/h5\]~s',
        '~\[b\](.*?)\[/b\]~s',
        '~\[i\](.*?)\[/i\]~s',
        '~\[u\](.*?)\[/u\]~s',
        '~\[s\](.*?)\[/s\]~s',
        '~\[quote\](.*?)\[/quote\]~s',
        '~\[size=(.*?)\](.*?)\[/size\]~s',
        '~\[color=((?:[a-zA-Z]|#[a-fA-F0-9]{3,6})+)\](.*?)\[/color\]~s',
        '~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
        '~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s',
        '~\[list\](.*?)\[/list\]~s',
        '~\[l\](.*?)\[/l\]~s'
    );

    public   $replace = array(
        '<h1>$1</h1>',
        '<h2>$1</h2>',
        '<h3>$1</h3>',
        '<h4>$1</h4>',
        '<h5>$1</h5>',
        '<b>$1</b>',
        '<i>$1</i>',
        '<span style="text-decoration:underline;">$1</span>',
        '<span style="text-decoration: line-through;">$1</span>',
        '<blockquote>$1</blockquote>',
        '<span style="font-size:$1px;">$2</span>',
        '<span style="color:$1;">$2</span>',
        '<a href="$1">$1</a>',
        '<img src="$1" alt="" />',
        '<ul>$1</ul>',
        '<li>$1</li>'
    );

// Replacing the BBcodes with corresponding HTML tags
    function showBBcodes($text)
    {
        return preg_replace($this->find, $this->replace, $text);
    }

    function bbcodes_list(){
        $editor = '';
        $editor .='<div id="phpbbbar">';
        $editor .='<button class="submits" onclick="insertText('."'[/b]', '[b]', 'bb_box'".'); return false;" unselectable="on" ><b>B</b></button>';
        $editor .='<button class="submits" onclick="insertText('."'[/i]', '[i]', 'bb_box'".'); return false;" unselectable="on" ><i>I</i></button>';
        $editor .='<button class="submits" onclick="insertText('."'[/u]', '[u]', 'bb_box'".'); return false;" unselectable="on" ><span style="text-decoration:underline;">U</span></button>';
        $editor .='<button class="submits" onclick="insertText('."'[/s]', '[s]', 'bb_box'".'); return false;" unselectable="on" ><span style="text-decoration: line-through;">Strike</span></button>';
        $editor .='<button class="submits" onclick="insertText('."'[/list]', '[list]', 'bb_box'".'); return false;" unselectable="on" >List</button>';
        $editor .='<button class="submits" onclick="insertText('."'[/l]', '[l]', 'bb_box'".'); return false;" unselectable="on" >List Bullet</button>';
        $editor .='</div>';
        return $editor;
    }
}