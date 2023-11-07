ALTER TABLE `orders` ADD `order_status` VARCHAR(211) NULL AFTER `status`;

ALTER TABLE `users` CHANGE `password` `password` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;