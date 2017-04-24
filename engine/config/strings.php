<?php if (!defined("DARKCORECMS")) header('Location: ../../');
function rank_string($rank){
    switch($rank){
        case 0: return "Player"; break;
        case 4: return "V.I.P"; break;
        case 5: return "Developer"; break;
        case 6: return "Trial Gamemaster"; break;
        case 7: return "Initiate Gamemaster"; break;
        case 8: return "Senior Gamemaster"; break;
        case 9: return "Advanced Gamemaster"; break;
        case 10: return "Head Gamemaster"; break;
        case 11: return "Administrator"; break;
        case 12: return "Staff Seargent"; break;
        case 13: return "Co-Owner"; break;
        case 14: return "Owner"; break;
        default: return "Player"; break;
    }
}
function char_name_color($class){
    switch ($class)
    {
        case 6: return "C41F3B";break;
        case 11: return "FF7D0A";break;
        case 3: return "ABD473";break;
        case 8: return "69CCF0";break;
        case 2: return "F58CBA";break;
        case 5: return "FFFFFF";break;
        case 4: return "FFF569";break;
        case 7: return "0070DE";break;
        case 9: return "9482C9";break;
        case 1: return "C79C6E";break;
    }
}
function class_strings($class){
    switch($class){
        case 1: return 'Warrior'; break;
        case 2: return 'Paladin'; break;
        case 3: return 'Hunter'; break;
        case 4: return 'Rogue'; break;
        case 5: return 'Priest'; break;
        case 6: return 'Death Knight'; break;
        case 7: return 'Shaman'; break;
        case 8: return 'Mage'; break;
        case 9: return 'Warlock'; break;
        case 11: return 'Druid'; break;
    }
}

function race_strings($race){
    switch($race){
        case 1: return 'Human'; break;
        case 2: return 'Orc'; break;
        case 3: return 'Dwarf'; break;
        case 4: return 'Night Elf'; break;
        case 5: return 'Undead'; break;
        case 6: return 'Tauren'; break;
        case 7: return 'Gnome'; break;
        case 8: return 'Troll'; break;
        case 9: return 'Gnome'; break;
        case 10: return 'Blood Elf'; break;
        case 11: return 'Draenei'; break;
        case 12: return 'Worgen'; break;
    }
}
function rank_color($username,$rank,$icon = 0){
    $color = '#FFFFFF';
    if ($icon == 0) {
        $icon = '<img class="avatar-name" src="style/images/staff.png" alt="Staff Icon"/>';
        $vip = '<img class="avatar-name" src="style/images/vip.png" alt="Vip Icon"/>';
    }
    else{
        $icon = '';
        $vip='';
    }
    switch($rank){
        case 0: $color = '<div class="avatar-name" style="color:#ffffff;">'; break;
        case 1: $color = '<div class="avatar-name" style="color:#ffffff;">'; break;
        case 2: $color = '<div class="avatar-name" style="color:#ffffff;">'; break;
        case 3: $color = '<div class="avatar-name" style="color:#ffffff;">'; break;
        case 4: $color =   $vip.'<div class="avatar-name" style="color:#9900FF;">'; break;
        case 5: $color =  $icon.'<div class="avatar-name" style="color:#660099;">'; break;
        case 6: $color =  $icon.'<div class="avatar-name" style="color:#003300;">'; break;
        case 7: $color =  $icon.'<div class="avatar-name" style="color:#003300;">'; break;
        case 8: $color =  $icon.'<div class="avatar-name" style="color:#006600;">'; break;
        case 9: $color =  $icon.'<div class="avatar-name" style="color:#009900;">'; break;
        case 10: $color = $icon.'<div class="avatar-name" style="color:#00FF00;">'; break;
        case 11: $color = $icon.'<div class="avatar-name" style="color:#CC3333;">'; break;
        case 12: $color = $icon.'<div class="avatar-name" style="color:#CC3333;">'; break;
        case 13: $color = $icon.'<div class="avatar-name" style="color:#FF0000;">'; break;
        case 14: $color = $icon.'<div class="avatar-name" style="color:#FF0000;">'; break;
    }
    return $color.$username.'</div>';
}