<!--
GUIDES PAGE: Progress 25%
MAIN AUTHOR: Darksoke
-->
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
	 $text_parser = new BbParser;
	?>
	<div id='content'>
		<div id='content-wrapper'>
			<div id='guides-body'>
				<div class="categorybox">
					<span class="title">Guides Category Name</span>
					<ul>
						<li><a href="#guide1">About our custom BB code parser</a></li>
						<li><a href="#guide2">About guides page</a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
					</ul>
				</div>
				<div class="categorybox">
					<span class="title">Guides Category Name</span>
					<ul>
						<li><a href="#guide1">About our custom BB code parser</a></li>
						<li><a href="#guide2">About guides page</a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
					</ul>
				</div>
				<div class="categorybox">
					<span class="title">Guides Category Name</span>
					<ul>
						<li><a href="#guide1">About our custom BB code parser</a></li>
						<li><a href="#guide2">About guides page</a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
					</ul>
				</div>
				<div class="categorybox">
					<span class="title">Guides Category Name</span>
					<ul>
						<li><a href="#guide1">About our custom BB code parser</a></li>
						<li><a href="#guide2">About guides page</a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
					</ul>
				</div>
				<div class="categorybox">
					<span class="title">Guides Category Name</span>
					<ul>
						<li><a href="#guide1">About our custom BB code parser</a></li>
						<li><a href="#guide2">About guides page</a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
					</ul>
				</div>
				<div class="categorybox">
					<span class="title">Guides Category Name</span>
					<ul>
						<li><a href="#guide1">About our custom BB code parser</a></li>
						<li><a href="#guide2">About guides page</a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
						<li><a href="#guide1">Guide title test </a></li>
					</ul>
				</div>
			</div>
				<div id='guide-body' style='display: block;'>
					<div id='guide-main-description'>
						<h1 class='content-wrapper-title' style='color:#61D17E !important;'><a name="guide1">About our custom BB code parser</a></h1>
						<span class='box-divider'></span>
						<p>
							<?php $text = "This is a sample of a [b]BB[/b] parsed text \n
							The following BB codes can be parsed
							[list]
								[l]COLOR[/l]
								[l]UNDERLINE[/l]
								[l]ITALIC[/l]
								[l]BOLD[/l]
								[l]STRIKED TEXT[/l]
								[l]LINK[/l]
								[l]FONT SIZE[/l]
								[l]IMAGE[/l]
							[list]
							"; echo $text_parser->showBBcodes($text)?>
						</p>
						<h1 class='content-wrapper-title' style='color:#61D17E !important;'><a name="guide2">About guides page</a></h1>
						<span class='box-divider'></span>
						<p>
							<?php $text = "This is a sample of a [b]BB[/b] parsed text \n
							The following BB codes can be parsed
							[list]
								[l]COLOR[/l]
								[l]UNDERLINE[/l]
								[l]ITALIC[/l]
								[l]BOLD[/l]
								[l]STRIKED TEXT[/l]
								[l]LINK[/l]
								[l]FONT SIZE[/l]
								[l]IMAGE[/l]
							[list]
							"; echo $text_parser->showBBcodes($text)?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include 'global-footer.php' ?>
</html>
