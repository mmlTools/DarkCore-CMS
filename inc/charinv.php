<?php if(!defined('DarkCoreCMS')) { die('Direct access not permitted'); header('Location: ../');} ?>
<div class='tablecls1'>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[0])) {$helm = get_item_data($charinfo->data1[0]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($helm['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($helm['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($helm['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[1])) {$necklace = get_item_data($charinfo->data1[1]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($necklace['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($necklace['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($necklace['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[2])) {$shoulder = get_item_data($charinfo->data1[2]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($shoulder['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($shoulder['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($shoulder['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[14])) {$back = get_item_data($charinfo->data1[14]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($back['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($back['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($back['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[4])) {$chest = get_item_data($charinfo->data1[4]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($chest['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($chest['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($chest['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[3])) {$shirt = get_item_data($charinfo->data1[3]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($shirt['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($shirt['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($shirt['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[18])) {$tabard = get_item_data($charinfo->data1[18]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($tabard['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($tabard['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($tabard['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data1[8])) {$wrist = get_item_data($charinfo->data1[8]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($wrist['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($wrist['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($wrist['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
						</div>
						<div class='tablecls2'>
							<div class='stats1'>
							</div>
							<div class="itmicn1">
								<?php if (isset($charinfo->data2[15])) {$mainhand = get_item_data($charinfo->data2[15]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($mainhand['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($mainhand['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($mainhand['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn1">
								<?php if (isset($charinfo->data2[16])) {$offhand = get_item_data($charinfo->data2[16]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($offhand['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($offhand['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($offhand['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn1">
								<?php if (isset($charinfo->data2[17])) {$ranged = get_item_data($charinfo->data2[17]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($ranged['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($ranged['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($ranged['displayID']); ?>' width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='30' height='30' />
									</a>
								<?php } ?>
							</div>
						</div>
						<div class='tablecls1'>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[9])) {$hands = get_item_data($charinfo->data3[9]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($hands['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($hands['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($hands['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[5])) {$belt = get_item_data($charinfo->data3[5]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($belt['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($belt['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($belt['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[6])) {$legs = get_item_data($charinfo->data3[6]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($legs['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($legs['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($legs['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[7])) {$boots = get_item_data($charinfo->data3[7]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($boots['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($boots['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($boots['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[10])) {$ring1 = get_item_data($charinfo->data3[10]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($ring1['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($ring1['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($ring1['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[11])) {$ring2 = get_item_data($charinfo->data3[11]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($ring2['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($ring2['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($ring2['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>	
							<div class="itmicn">
								<?php if (isset($charinfo->data3[12])) {$trinket1 = get_item_data($charinfo->data3[12]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($trinket1['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($trinket1['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($trinket1['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
							<div class="itmicn">
								<?php if (isset($charinfo->data3[13])) {$trinket2 = get_item_data($charinfo->data3[13]); ?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='<?php echo geticon($trinket2['displayID'])?>' width='46' height='46' /><div class='item-frame'><?php echo return_item_string($trinket2['entry']); ?></div></div>">
									<img class='armory-itemicon' src='<?php echo geticon($trinket2['displayID']); ?>'  width='30' height='30' />
									</a>
								<?php } else {?>
									<a href="" class="skinnytip" data-text="<div style='width:600px;'><img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg' width='46' height='46' /><div class='item-frame'>This slot is empty <br><br><br></div></div>">
									<img class='armory-itemicon' src='http://wow.zamimg.com/images/wow/icons/large/inv_misc_questionmark.jpg'  width='30' height='30' />
									</a>
								<?php } ?>
							</div>
						</div>