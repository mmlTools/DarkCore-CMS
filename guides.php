<?php define('DarkCoreCMS', TRUE); include 'header.php' ;
			require_once 'core/config.php'; 
				require_once 'core/functions/global_functions.php'; 
					require_once 'core/functions/realm_functions.php'; 
						require_once 'core/functions/account_functions.php'; ?>
	<title>GamingZeta - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
	<script type="text/javascript"
		src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
	<div id='header'>
	</div>
	<?php include 'menu.php';
		if (isset($_GET['guide'])) { $guide = $_GET['guide'];}
	?>
	<div id='content'>
		<div id='content-wrapper'>
			<div class='arm-title'>USEFUL GUIDES</div>
			<div id='guides-body'>
				<a class='guide-thumb<?php if ($guide == 1) echo"-active"; ?>' href='?guide=1/CONNECTION-GUIDE'>CONNECTION GUIDE<br>By Darksoke</a>
				<!--<a class='guide-thumb<?php if ($guide == 2) echo"-active"; ?>' href='?guide=2/V%I%P-AND-DONATOR-GUIDE'>V.I.P AND DONATOR GUIDE<br>by Rosaline</a>-->
				<a class='guide-thumb<?php if ($guide == 3) echo"-active"; ?>' href='?guide=3/LEVELING-AND-GEARING-GUIDE'>LEVELING AND GEARING GUIDE<br>by Rosaline</a>
			</div>
			<?php if (!isset($guide) || $guide == 1){?>
				<div id='guide-body' style='display: block;'>
					<div id='guide-main-description' style='width:905px!important;'>
						<h1 class='content-wrapper-title' style='color:#D7FF8C!important;'>Connection Guide - Requirements</h1>
						<span class='box-divider'></span>
						<label style='color:#99CCCC'>Download WOTLK GAME CLIENT</label> - <a style='color:#E266FF;' href='https://mega.nz/#!WQZSkBTb!idOtPO18jHBh8sCsUJaQUrJ3Cc8RkWrXTYxAVUf6-bI' target="_blank"> Mega.co.nz </a><br><br>
						<label style='color:#99CCCC'>Download PATCH-8.MPQ</label> - <a style='color:#E266FF;' href='http://www.mediafire.com/download/87tz5so0vp0rxg8/patch-8.mpq' target="_blank">MediaFire - last updated: 06/11/2015 6:11 PM</a><br><br>
						<label style='color:#99CCCC'>Download PATCH-F.MPQ</label> - <a style='color:#E266FF;' href='http://www.mediafire.com/download/hv21w8g859a80l4/patch-f.mpq' target="_blank">MediaFire</a><br><br>
						<label style='color:#99CCCC'>Download PATCH-F.MPQ</label> - <a style='color:#E266FF;' href='https://mega.nz/#!vZYyAaKA!wiU4ztQqovQTQBpAjeUBo5Gqoz98imwycSXwYgkm_B8' target="_blank">Mega.co.nz - last updated: 13/12/2015 6:11 PM</a><br><br>
						<label style='color:#99CCCC'>Realmlist</label> - <label style='color:#CC0033;'>set realmlist wotlk.gamingzeta.com</label><br><br>
						
						<label style='color:#3399FF;font-size:20px;'>Explanation:</label> <br>
						<label style='color:#99CCCC;font-size:14px;font-weight:900;'>WOTLK CLIENT</label> <label style='color:#6FA547'>- This is the game client for patch 3.3.5a , you only need to download it in case you don't have it already.</label><br><br>
						<label style='color:#99CCCC;font-size:14px;font-weight:900;'>PATCH-8.MPQ</label> <label style='color:#6FA547'>- This is the most important patch in the server , you need it in order to be able to use your skills and fix "?" weapon icons , it is also reaquired to fix some ingame perks like being able to see the custom extended costs / custom gems etc.</label><br><br>
						<label style='color:#99CCCC;font-size:14px;font-weight:900;'>PATCH-F.MPQ</label><label style='color:#6FA547'>- This patch is optional , required in order to be able to see the CATA/MOP content , with the upcoming realm this patch won't change so you can use it crossrealms , more informations about it when the new realm will be up , make sure you download it for a full Thorium Ragnarok experience.</label><br><br>
					</div>
					<div id='guide-main-body'>
						<h1 class='content-wrapper-title' style='color:#D7FF8C!important;'>How to apply the patches and setup your realmlist</h1>
						<span class='box-divider'></span>
						<label style='color:#99CCCC;font-size:14px;font-weight:900;'>Step 1 {Downloading Game Client - Pass this step if you already have WOTLK 3.3.5a installed}:</label> <label style='color:#6FA547'>Download WOTLK client from <a style='color:#E266FF' href='https://mega.nz/#!WQZSkBTb!idOtPO18jHBh8sCsUJaQUrJ3Cc8RkWrXTYxAVUf6-bI'> Mega.co.nz </a> using their sync application , choose where you want the game to be downloaded and wait until all the files are moved to that location. After the game is fully downloaded move to step 2.</label><br><br>
						<label style='color:#99CCCC;font-size:14px;font-weight:900;'>Step 2 {Setting up the realmlist}:</label> <label style='color:#6FA547'>Move to your </label><label style='color:#E266FF'>CLIENT FOLDER -> DATA -> enXX(XX mean your client version/language) -> search for Realmlist.wtf</label> <label style='color:#6FA547'>, open it using your desired text editors I suggest you to use</label> <label style='color:#E266FF'>Notepad++ , WIN USERS (press CTRL+A then BACK SPACE)</label> <label style='color:#6FA547'>now copy the following</label> <label style='color:#E266FF'>set realmlist wotlk.gamingzeta.com</label> <label style='color:#6FA547'>and paste it in your Realmslist.wtf , save the file and move to step 3.</label></br><br>
						<label style='color:#99CCCC;font-size:14px;font-weight:900;'>Step 3 {Downloading and applying patches}:</label> <label style='color:#6FA547'>Download </label><a style='color:#E266FF' href='http://www.mediafire.com/download/87tz5so0vp0rxg8/patch-8.mpq'>Patch-8.mpq(Mediafire)</a> <label style='color:#6FA547'>and</label> <a style='color:#E266FF' href='http://www.mediafire.com/download/hv21w8g859a80l4/patch-f.mpq'>Patch-f.mpq(Mediafire)</a> <label style='color:#6FA547'>after you finish downloading them , move the files to </label><label style='color:#E266FF'>CLIENT FOLDER -> DATA </label><label style='color:#6FA547'>, make sure you don't have anny other custom patches from other servers because it can cause a client crash or server files conflict and you won't be able to play in our realms. Your Data folder should look exaclty as in the following image.</label></br></br></br>
						<img src="images/guides/patches.png" width="100%"/>
					</div>
				</div>
			<?php } ?>
			<?php if ($guide == 3){?>
				<div id='guide-body' style='display: block;'>
					<div id='guide-main-description' style='width:905px!important;'>
						<h1 class='content-wrapper-title' style='color:#D7FF8C!important;'>Knowing the Area</h1>
						<span class='box-divider'></span>
						<p class="guides-paragraph"><label class="guides-pindep">Knowing The Area: </label>When you first appear in the starting area as a level 1 you will notice that there are alot of NPC's, don't feel obliged to know every single NPC. The basic NPC's are the weapon trainers, which you should look at each one to make sure you have optimal training of all your weapons. Then you will see your class trainer, which you will be able to obtain skills from there. There is also the tier upgrade vendors, ignore them until you are a later level. There is a regeant vendor which apply to buffs you may have that you need the regeants for or warlocks need soulstones for summoning their demons. Then there is donator and voting vendors which I will explain later in the guide.</p><br><br>
						<center><img src="http://i.imgur.com/q4JLD3v.jpg" width="900" /></center>
					</div>
					<div id='guide-main-body'>
						<h1 class='content-wrapper-title' style='color:#D7FF8C!important;'>Starting Outfit & Character Informations</h1>
						<span class='box-divider'></span>
						<p class="guides-paragraph"><label class="guides-pindep">Your Character: </label>When you first start you will have some pretty strong armor, leveling wont be easy so when you progress you should make sure you don't pull too many monsters. This may be difficult with classes that are "squishy", such as mage or priest.</p>
						<p class="guides-paragraph"><label class="guides-pindep">Hearth Stone (Service Stone): </label>This item is more or less called the Service Stone Portable Teleporter. Which will guide you to everywhere you will be needing. Take a look through all the different things and get an understanding so your not stranded when you reach maximum level.</p><br><br>
						<center><img src="http://i.imgur.com/EThfESF.jpg" /></center>
					</div>
					<div id='guide-main-body'>
						<h1 class='content-wrapper-title' style='color:#D7FF8C!important;'>Level Quests & First Tier Sets</h1>
						<span class='box-divider'></span>
						<p class="guides-paragraph"><label class="guides-pindep">Here is a list with the main things about leveling</label></p>
						<ul>
							<li><p class="guides-paragraph"><label class="guides-pindep">Quests: </label>The person you will look directly for is Maeiv Shadowsong, she will be giving you your first quest, you will see completion credit will give you a "Swift Spectral Tiger" and 2 "Gold Bars". When killing 20 monsters on the leveling path. This mount can be used at level 1 and will help you with traveling.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Buff Up: </label>You may feel slightly weak when leveling, don't forget that extra buff you get, go into your inventory pressing "B" on your keyboard. Right Click the stone, which will be called, "Service Stone Portable Teleporter". Then click player service, then buff. With that you will recieve a ton of exotic buffs you may not know skim over them and notice the effects that are recieved when you buff. A buff in particular that looks like a mask that lasts for 2 hours, called " Invocation of The Wickerman". Which will increase your exp and reputation gain by 5%.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Gear while leveling: </label>You probably will be wandering, where do I get trinkets and rings? Well there is a level 10 boss where you can kill a few times to get what you need from the boss. There are bosses that you can find all around the leveling road so there is no exact problem farming a few once in awhile.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Skills & Talents: </label>Don't forget while leveling or reaching level 80 to go to your skill trainer and learn all your skills. Another thing to look at is your talent tree. With the talent tree upon reaching 255 you should have more than enough talent points to max out all the talent specilizations. Which will also show optimum damage with having all the specilization skills.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Gems: </label>A crucial gem is a haste gem which will give you 100 haste, to recieve this you have to get jewelcrafting and get King's Amber which is 3000 Honor and can be bought from the yellow Gem vendor. Or you can buy it from Miner Argus for 3000 Honor points.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Enchants: </label>Just recently added there has been a new enchant system, while the enchants don't seem significant for melee getting lifesteal on your weapon can help if you have a lack of self heals.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Vote: </label>There are many things you can get when you vote, transmogs bags gear, which can be converted to the woman in the middle that deals with all the transfers with donator and vote points.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Donate: </label>You can get 3 different sets of gear, gold, platinum, and Diamond, which all cost money to get.For more informations please read the <a style="color:#FF9900;" href='?guide=2/V%I%P-AND-DONATOR-GUIDE'>DONATOR GUIDE</a></p></li>
						</ul>
					</div>
					<div id='guide-main-body'>
						<h1 class='content-wrapper-title' style='color:#D7FF8C!important;'>Uppon reaching level 255</h1>
						<span class='box-divider'></span>
						<p class="guides-paragraph"><label class="guides-pindep">This will be a really fast walktrough , more informations will be added later in some indepth guides</label></p>
						<ul>
							<li><p class="guides-paragraph"><label class="guides-pindep">Gearing: </label>From there you should be starting to get better gear, when going to shadowfang keep you should start working on the quests and getting the Ruby's for gear upgrade. Check the tier shops on the items needed to upgrade your armor, and do the quests needed to do ShadowFang Keep. <br> <label class="guides-pindep">*NOTE </label> Shadowfang Keep is a dungeon and if needs to be resetted click your character portrait and click reset Instances while outside the duengon. Then you can enter with a newly re-equipped duengon. When all the quests are completed for this duengon you will be able to go to the next duengon, which is Deadmines, where you can find in your hearthstone, <label class="guides-pindep">->World Teleport-> Custom Instances -> The Deadmines</label>. From there you continue doing the same thing.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Gear informations: </label>Remember below I talked about Maeiv ShadowSong and the armor? Well at 255 talk to her and buy all the pieces, then go to the Azshara Undead Troll tier 2 and upgrade all the pieces. From there continue until you completely run out of gold bars. Then from there you should start working on weapons, which you talk to an npc in Hellfire Peninsula. To arrive here, you will have to go to your "hearthstone" Click "World Teleport", then click "Global Mall". From there you will be in Hellfire Peninsula. You will want to go to Corporal Soulhart, which find the weapons you need and go to the designated bosses. When gearing it goes up to tier 18 and it starts to tier one, listed below will be all of the ruby upgrade merchants that you will run in to on the way through your exploration of the server.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">World and Legendary Bosses: </label>There are many cool perks at 255 which the first thing is world bosses, the first 5 world bosses are strong but they can be defeated soloably. From there you get your weapons and items. Then there is Poseidon which will drop trinkets, rings, bags, pendants, shirts, tabards, and your ranged/Libram idol type item. Then you can fight Terror Hound, this boss will drop shards or class items that is equivalent to a tier 18 item.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">PVP Zones and Gear: </label>There are two pvp zones currently implemented in this server, Gurubashi arena, and the Dire Maul dueling zone, which can be found in <label class="guides-pindep">World Teleport -> PvP zones</label>. There are many different regeants you have to get to get pvp gear that range from many different things such as pvp or pve, a good thing to do is farm them mainly for the haste in the items.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Transmogrification: </label>When you transmog don't forget to save the armor set you want, so when you want that armor set you can click it and you don't have to use any of your transmogrification tokens! Also there is a black market auction transmog person, this person will help in letting you get a certain item from a code, which can be found on wowhead for the item you want. When you speak to him he will go in more details about this situation, he can be found in the global mall.</p></li>
							<li><p class="guides-paragraph"><label class="guides-pindep">Events: </label>When completing a staircase event you will recieve a decent reward, now the staircase event may be challenging but in the end it may be worth the trouble for the reward, and don't feel obliged to do them they are just for fun.</p></li>
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
<?php include 'global-footer.php' ?>
</html>