<?php define('DarkCoreCMS', TRUE); include 'header.php' ; ?>
	<div id='content'>
		<div id='content-wrapper'>
			<div id='rules-body'>
				<div class='title'>Rules and Frequently Asked Questions</div>
				<?php $rules = get_rules(3);  for ($i=1;$i<=count($rules);$i++) { ?>
					<?php echo rewrite_body($rules[$i]['body']).'<br>'; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
<?php include 'global-footer.php' ?>
</html>
