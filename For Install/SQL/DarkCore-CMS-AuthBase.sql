#--Run this on your AUTH database

ALTER TABLE account 
	ADD `donator` TINYINT(4) NOT NULL DEFAULT '0',
	ADD `rank` INT(32) NULL DEFAULT NULL,
	ADD `staff_id` INT(32) NULL DEFAULT NULL,
	ADD `vp` VARCHAR(50) NULL DEFAULT '0',
	ADD `dp` VARCHAR(50) NULL DEFAULT '0',
	ADD `isactive` INT(32) NULL DEFAULT NULL,
	ADD `activation` VARCHAR(255) NULL DEFAULT NULL,
	ADD `VipLevel` TINYINT(4) NOT NULL DEFAULT '0',
	ADD `total_votes` INT(11) NOT NULL DEFAULT '0',
	ADD `country` VARCHAR(255) NULL DEFAULT NULL,
	ADD `age` VARCHAR(255) NULL DEFAULT NULL,
	ADD `foundus` VARCHAR(255) NULL DEFAULT NULL,
<<<<<<< HEAD
	ADD `avatar` VARCHAR(255) NOT NULL DEFAULT 'images/avatars/darksoke.png';
=======
<<<<<<< HEAD
<<<<<<< HEAD
	ADD `avatar` VARCHAR(255) NOT NULL DEFAULT 'images/avatars/darksoke.png';
=======
	ADD `avatar` VARCHAR(255) NOT NULL DEFAULT 'images/avatars/darksoke.png'
>>>>>>> 125730e55fe04220c23a8e2220fe2f11434ba6b3
=======
	ADD `avatar` VARCHAR(255) NOT NULL DEFAULT 'images/avatars/darksoke.png'
>>>>>>> origin/master
	ADD 'CustomRank' VARCHAR(50) NOT NULL DEFAULT 'Member';
>>>>>>> master
