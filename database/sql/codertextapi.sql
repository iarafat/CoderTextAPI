-- Adminer 4.8.1 MySQL 5.7.35-0ubuntu0.18.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1,	NULL,	1,	'Category 1',	'category-1',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(2,	NULL,	1,	'Category 2',	'category-2',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(3,	NULL,	1,	'Parent',	'parent',	'2020-05-16 00:44:38',	'2020-05-16 00:44:38'),
(4,	3,	3,	'Child',	'child',	'2020-05-16 00:44:52',	'2020-05-17 03:54:31'),
(5,	3,	2,	'Child Two',	'child-two',	'2020-05-17 03:22:17',	'2020-05-17 03:22:17');

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1,	1,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(2,	1,	'name',	'text',	'Name',	1,	1,	1,	1,	1,	1,	NULL,	2),
(3,	1,	'email',	'text',	'Email',	1,	1,	1,	1,	1,	1,	NULL,	3),
(4,	1,	'password',	'password',	'Password',	1,	0,	0,	1,	1,	0,	NULL,	4),
(5,	1,	'remember_token',	'text',	'Remember Token',	0,	0,	0,	0,	0,	0,	NULL,	5),
(6,	1,	'created_at',	'timestamp',	'Created At',	0,	1,	1,	0,	0,	0,	NULL,	6),
(7,	1,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	7),
(8,	1,	'avatar',	'image',	'Avatar',	0,	1,	1,	1,	1,	1,	NULL,	8),
(9,	1,	'user_belongsto_role_relationship',	'relationship',	'Role',	0,	1,	1,	1,	1,	0,	'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',	10),
(10,	1,	'user_belongstomany_role_relationship',	'relationship',	'Roles',	0,	1,	1,	1,	1,	0,	'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',	11),
(11,	1,	'settings',	'hidden',	'Settings',	0,	0,	0,	0,	0,	0,	NULL,	12),
(12,	2,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(13,	2,	'name',	'text',	'Name',	1,	1,	1,	1,	1,	1,	NULL,	2),
(14,	2,	'created_at',	'timestamp',	'Created At',	0,	0,	0,	0,	0,	0,	NULL,	3),
(15,	2,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	4),
(16,	3,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(17,	3,	'name',	'text',	'Name',	1,	1,	1,	1,	1,	1,	NULL,	2),
(18,	3,	'created_at',	'timestamp',	'Created At',	0,	0,	0,	0,	0,	0,	NULL,	3),
(19,	3,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	4),
(20,	3,	'display_name',	'text',	'Display Name',	1,	1,	1,	1,	1,	1,	NULL,	5),
(21,	1,	'role_id',	'text',	'Role',	1,	1,	1,	1,	1,	1,	NULL,	9),
(22,	4,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(23,	4,	'parent_id',	'select_dropdown',	'Parent',	0,	0,	1,	1,	1,	1,	'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',	2),
(24,	4,	'order',	'text',	'Order',	1,	1,	1,	1,	1,	1,	'{\"default\":1}',	3),
(25,	4,	'name',	'text',	'Name',	1,	1,	1,	1,	1,	1,	NULL,	4),
(26,	4,	'slug',	'text',	'Slug',	1,	1,	1,	1,	1,	1,	'{\"slugify\":{\"origin\":\"name\"}}',	5),
(27,	4,	'created_at',	'timestamp',	'Created At',	0,	0,	1,	0,	0,	0,	NULL,	6),
(28,	4,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	7),
(29,	5,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(30,	5,	'author_id',	'text',	'Author',	1,	0,	1,	1,	0,	1,	NULL,	2),
(31,	5,	'category_id',	'text',	'Category',	1,	0,	1,	1,	1,	0,	NULL,	3),
(32,	5,	'title',	'text',	'Title',	1,	1,	1,	1,	1,	1,	NULL,	4),
(33,	5,	'excerpt',	'text_area',	'Excerpt',	1,	0,	1,	1,	1,	1,	NULL,	5),
(34,	5,	'body',	'rich_text_box',	'Body',	1,	0,	1,	1,	1,	1,	NULL,	6),
(35,	5,	'image',	'image',	'Post Image',	0,	1,	1,	1,	1,	1,	'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',	7),
(36,	5,	'slug',	'text',	'Slug',	1,	0,	1,	1,	1,	1,	'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}',	8),
(37,	5,	'meta_description',	'text_area',	'Meta Description',	1,	0,	1,	1,	1,	1,	NULL,	9),
(38,	5,	'meta_keywords',	'text_area',	'Meta Keywords',	1,	0,	1,	1,	1,	1,	NULL,	10),
(39,	5,	'status',	'select_dropdown',	'Status',	1,	1,	1,	1,	1,	1,	'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',	11),
(40,	5,	'created_at',	'timestamp',	'Created At',	0,	1,	1,	0,	0,	0,	NULL,	12),
(41,	5,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	NULL,	13),
(42,	5,	'seo_title',	'text',	'SEO Title',	0,	1,	1,	1,	1,	1,	NULL,	14),
(43,	5,	'featured',	'checkbox',	'Featured',	1,	1,	1,	1,	1,	1,	NULL,	15),
(44,	6,	'id',	'number',	'ID',	1,	0,	0,	0,	0,	0,	NULL,	1),
(45,	6,	'author_id',	'text',	'Author',	1,	0,	0,	0,	0,	0,	NULL,	2),
(46,	6,	'title',	'text',	'Title',	1,	1,	1,	1,	1,	1,	NULL,	3),
(47,	6,	'excerpt',	'text_area',	'Excerpt',	1,	0,	1,	1,	1,	1,	NULL,	4),
(48,	6,	'body',	'rich_text_box',	'Body',	1,	0,	1,	1,	1,	1,	NULL,	5),
(49,	6,	'slug',	'text',	'Slug',	1,	0,	1,	1,	1,	1,	'{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}',	6),
(50,	6,	'meta_description',	'text',	'Meta Description',	1,	0,	1,	1,	1,	1,	NULL,	7),
(51,	6,	'meta_keywords',	'text',	'Meta Keywords',	1,	0,	1,	1,	1,	1,	NULL,	8),
(52,	6,	'status',	'select_dropdown',	'Status',	1,	1,	1,	1,	1,	1,	'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',	9),
(53,	6,	'created_at',	'timestamp',	'Created At',	1,	1,	1,	0,	0,	0,	NULL,	10),
(54,	6,	'updated_at',	'timestamp',	'Updated At',	1,	0,	0,	0,	0,	0,	NULL,	11),
(55,	6,	'image',	'image',	'Page Image',	0,	1,	1,	1,	1,	1,	NULL,	12),
(56,	7,	'id',	'text',	'Id',	1,	0,	0,	0,	0,	0,	'{}',	1),
(57,	7,	'category_id',	'text',	'Category Id',	1,	0,	1,	1,	1,	0,	'{}',	2),
(58,	7,	'title',	'text',	'Title',	1,	1,	1,	1,	1,	1,	'{}',	3),
(59,	7,	'slug',	'text',	'Slug',	1,	0,	1,	1,	1,	1,	'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:products,slug\"}}',	4),
(60,	7,	'image',	'image',	'Image',	0,	1,	1,	1,	1,	1,	'{\"quality\":\"70%\",\"upsize\":true}',	5),
(61,	7,	'body',	'rich_text_box',	'Body',	0,	0,	1,	1,	1,	1,	'{}',	6),
(62,	7,	'status',	'text',	'Status',	1,	1,	1,	1,	1,	1,	'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',	7),
(63,	7,	'buy_now_link',	'text',	'Buy Now Link',	0,	0,	1,	1,	1,	1,	'{}',	8),
(64,	7,	'live_demo_link',	'text',	'Live Demo Link',	0,	0,	1,	1,	1,	1,	'{}',	9),
(65,	7,	'meta_description',	'text',	'Meta Description',	0,	0,	1,	1,	1,	1,	'{}',	10),
(66,	7,	'meta_keywords',	'text',	'Meta Keywords',	0,	0,	1,	1,	1,	1,	'{}',	11),
(67,	7,	'seo_title',	'text',	'Seo Title',	0,	0,	1,	1,	1,	1,	'{}',	12),
(68,	7,	'created_at',	'timestamp',	'Created At',	0,	1,	1,	0,	0,	0,	'{}',	13),
(69,	7,	'updated_at',	'timestamp',	'Updated At',	0,	0,	0,	0,	0,	0,	'{}',	14),
(70,	7,	'price',	'number',	'Price',	0,	1,	1,	1,	1,	1,	'{}',	5);

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1,	'users',	'users',	'User',	'Users',	'voyager-person',	'TCG\\Voyager\\Models\\User',	'TCG\\Voyager\\Policies\\UserPolicy',	'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',	'',	1,	0,	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(2,	'menus',	'menus',	'Menu',	'Menus',	'voyager-list',	'TCG\\Voyager\\Models\\Menu',	NULL,	'',	'',	1,	0,	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(3,	'roles',	'roles',	'Role',	'Roles',	'voyager-lock',	'TCG\\Voyager\\Models\\Role',	NULL,	'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',	'',	1,	0,	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(4,	'categories',	'categories',	'Category',	'Categories',	'voyager-categories',	'TCG\\Voyager\\Models\\Category',	NULL,	'',	'',	1,	0,	NULL,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(5,	'posts',	'posts',	'Post',	'Posts',	'voyager-news',	'TCG\\Voyager\\Models\\Post',	'TCG\\Voyager\\Policies\\PostPolicy',	'',	'',	1,	0,	NULL,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(6,	'pages',	'pages',	'Page',	'Pages',	'voyager-file-text',	'TCG\\Voyager\\Models\\Page',	NULL,	'',	'',	1,	0,	NULL,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(7,	'products',	'products',	'Product',	'Products',	'voyager-bag',	'App\\Product',	NULL,	NULL,	NULL,	1,	1,	'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}',	'2020-04-27 23:12:40',	'2020-05-09 02:24:36');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(2,	'main_menu',	'2020-05-05 11:36:09',	'2020-05-05 11:36:09'),
(3,	'footer_menu',	'2020-05-05 11:36:23',	'2020-05-05 11:36:23');

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1,	1,	'Dashboard',	'',	'_self',	'voyager-boat',	NULL,	NULL,	1,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37',	'voyager.dashboard',	NULL),
(2,	1,	'Media',	'',	'_self',	'voyager-images',	NULL,	NULL,	6,	'2020-04-27 23:08:37',	'2020-04-27 23:13:24',	'voyager.media.index',	NULL),
(3,	1,	'Users',	'',	'_self',	'voyager-person',	NULL,	16,	1,	'2020-04-27 23:08:37',	'2020-04-27 23:14:04',	'voyager.users.index',	NULL),
(4,	1,	'Roles',	'',	'_self',	'voyager-lock',	NULL,	16,	2,	'2020-04-27 23:08:37',	'2020-04-27 23:14:11',	'voyager.roles.index',	NULL),
(5,	1,	'Tools',	'',	'_self',	'voyager-tools',	NULL,	NULL,	8,	'2020-04-27 23:08:37',	'2020-04-27 23:14:11',	NULL,	NULL),
(6,	1,	'Menu Builder',	'',	'_self',	'voyager-list',	NULL,	5,	1,	'2020-04-27 23:08:37',	'2020-04-27 23:12:59',	'voyager.menus.index',	NULL),
(7,	1,	'Database',	'',	'_self',	'voyager-data',	NULL,	5,	2,	'2020-04-27 23:08:37',	'2020-04-27 23:12:59',	'voyager.database.index',	NULL),
(8,	1,	'Compass',	'',	'_self',	'voyager-compass',	NULL,	5,	3,	'2020-04-27 23:08:37',	'2020-04-27 23:12:59',	'voyager.compass.index',	NULL),
(9,	1,	'BREAD',	'',	'_self',	'voyager-bread',	NULL,	5,	4,	'2020-04-27 23:08:37',	'2020-04-27 23:12:59',	'voyager.bread.index',	NULL),
(10,	1,	'Settings',	'',	'_self',	'voyager-settings',	NULL,	NULL,	7,	'2020-04-27 23:08:37',	'2020-04-27 23:13:42',	'voyager.settings.index',	NULL),
(11,	1,	'Categories',	'',	'_self',	'voyager-categories',	NULL,	NULL,	3,	'2020-04-27 23:08:38',	'2020-04-27 23:13:24',	'voyager.categories.index',	NULL),
(12,	1,	'Posts',	'',	'_self',	'voyager-news',	'#000000',	NULL,	4,	'2020-04-27 23:08:38',	'2020-05-09 04:46:20',	'voyager.posts.index',	'null'),
(13,	1,	'Pages',	'',	'_self',	'voyager-file-text',	NULL,	NULL,	5,	'2020-04-27 23:08:38',	'2020-04-27 23:13:24',	'voyager.pages.index',	NULL),
(14,	1,	'Hooks',	'',	'_self',	'voyager-hook',	NULL,	5,	5,	'2020-04-27 23:08:39',	'2020-04-27 23:12:59',	'voyager.hooks',	NULL),
(15,	1,	'Products',	'',	'_self',	'voyager-bag',	NULL,	NULL,	2,	'2020-04-27 23:12:40',	'2020-04-27 23:12:59',	'voyager.products.index',	NULL),
(16,	1,	'Others',	'',	'_self',	'voyager-list-add',	'#000000',	NULL,	9,	'2020-04-27 23:13:56',	'2020-04-27 23:14:41',	NULL,	''),
(17,	2,	'Home',	'/',	'_self',	NULL,	'#000000',	NULL,	10,	'2020-05-06 02:06:13',	'2020-05-06 02:06:13',	NULL,	''),
(18,	2,	'Products',	'/products',	'_self',	NULL,	'#000000',	NULL,	11,	'2020-05-06 02:06:45',	'2020-05-06 02:06:45',	NULL,	''),
(19,	2,	'Blog',	'/blog',	'_self',	NULL,	'#000000',	NULL,	12,	'2020-05-06 02:06:59',	'2020-05-06 02:06:59',	NULL,	''),
(20,	2,	'Contact Us',	'/contact',	'_self',	NULL,	'#000000',	NULL,	13,	'2020-05-06 02:07:38',	'2020-05-06 02:07:38',	NULL,	''),
(21,	3,	'COMPANY',	'javascript:;',	'_self',	NULL,	'#000000',	NULL,	1,	'2020-05-06 02:09:11',	'2020-05-06 02:11:05',	NULL,	''),
(22,	3,	'LEGAL',	'javascript:;',	'_self',	NULL,	'#000000',	NULL,	2,	'2020-05-06 02:09:33',	'2020-05-06 02:11:05',	NULL,	''),
(23,	3,	'Privacy',	'/pages/privacy',	'_self',	NULL,	'#000000',	22,	1,	'2020-05-06 02:09:54',	'2020-05-06 02:20:25',	NULL,	''),
(24,	3,	'Terms',	'/pages/terms',	'_self',	NULL,	'#000000',	22,	2,	'2020-05-06 02:10:10',	'2020-05-06 02:20:36',	NULL,	''),
(25,	3,	'Home',	'/',	'_self',	NULL,	'#000000',	21,	1,	'2020-05-06 02:10:26',	'2020-05-06 02:11:05',	NULL,	''),
(26,	3,	'Products',	'/products',	'_self',	NULL,	'#000000',	21,	2,	'2020-05-06 02:10:38',	'2020-05-06 02:11:09',	NULL,	''),
(27,	3,	'Blog',	'/blog',	'_self',	NULL,	'#000000',	21,	3,	'2020-05-06 02:10:48',	'2020-05-06 02:11:14',	NULL,	''),
(28,	3,	'Contact Us',	'/contact',	'_self',	NULL,	'#000000',	21,	4,	'2020-05-06 02:11:00',	'2020-05-06 02:11:18',	NULL,	'');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2016_01_01_000000_add_voyager_user_fields',	1),
(3,	'2016_01_01_000000_create_data_types_table',	1),
(4,	'2016_01_01_000000_create_pages_table',	1),
(5,	'2016_01_01_000000_create_posts_table',	1),
(6,	'2016_02_15_204651_create_categories_table',	1),
(7,	'2016_05_19_173453_create_menu_table',	1),
(8,	'2016_10_21_190000_create_roles_table',	1),
(9,	'2016_10_21_190000_create_settings_table',	1),
(10,	'2016_11_30_135954_create_permission_table',	1),
(11,	'2016_11_30_141208_create_permission_role_table',	1),
(12,	'2016_12_26_201236_data_types__add__server_side',	1),
(13,	'2017_01_13_000000_add_route_to_menu_items_table',	1),
(14,	'2017_01_14_005015_create_translations_table',	1),
(15,	'2017_01_15_000000_make_table_name_nullable_in_permissions_table',	1),
(16,	'2017_03_06_000000_add_controller_to_data_types_table',	1),
(17,	'2017_04_11_000000_alter_post_nullable_fields_table',	1),
(18,	'2017_04_21_000000_add_order_to_data_rows_table',	1),
(19,	'2017_07_05_210000_add_policyname_to_data_types_table',	1),
(20,	'2017_08_05_000000_add_group_to_settings_table',	1),
(21,	'2017_11_26_013050_add_user_role_relationship',	1),
(22,	'2017_11_26_015000_create_user_roles_table',	1),
(23,	'2018_03_11_000000_add_user_settings',	1),
(24,	'2018_03_14_000000_add_details_to_data_types_table',	1),
(25,	'2018_03_16_000000_make_settings_value_nullable',	1),
(26,	'2019_08_19_000000_create_failed_jobs_table',	1),
(27,	'2020_04_26_115839_create_products_table',	1);

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1,	0,	'Hello World',	'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.',	'<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>',	'pages/page1.jpg',	'hello-world',	'Yar Meta Description',	'Keyword1, Keyword2',	'ACTIVE',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38');

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1,	'browse_admin',	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(2,	'browse_bread',	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(3,	'browse_database',	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(4,	'browse_media',	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(5,	'browse_compass',	NULL,	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(6,	'browse_menus',	'menus',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(7,	'read_menus',	'menus',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(8,	'edit_menus',	'menus',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(9,	'add_menus',	'menus',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(10,	'delete_menus',	'menus',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(11,	'browse_roles',	'roles',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(12,	'read_roles',	'roles',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(13,	'edit_roles',	'roles',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(14,	'add_roles',	'roles',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(15,	'delete_roles',	'roles',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(16,	'browse_users',	'users',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(17,	'read_users',	'users',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(18,	'edit_users',	'users',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(19,	'add_users',	'users',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(20,	'delete_users',	'users',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(21,	'browse_settings',	'settings',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(22,	'read_settings',	'settings',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(23,	'edit_settings',	'settings',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(24,	'add_settings',	'settings',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(25,	'delete_settings',	'settings',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(26,	'browse_categories',	'categories',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(27,	'read_categories',	'categories',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(28,	'edit_categories',	'categories',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(29,	'add_categories',	'categories',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(30,	'delete_categories',	'categories',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(31,	'browse_posts',	'posts',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(32,	'read_posts',	'posts',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(33,	'edit_posts',	'posts',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(34,	'add_posts',	'posts',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(35,	'delete_posts',	'posts',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(36,	'browse_pages',	'pages',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(37,	'read_pages',	'pages',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(38,	'edit_pages',	'pages',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(39,	'add_pages',	'pages',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(40,	'delete_pages',	'pages',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(41,	'browse_hooks',	NULL,	'2020-04-27 23:08:39',	'2020-04-27 23:08:39'),
(42,	'browse_products',	'products',	'2020-04-27 23:12:40',	'2020-04-27 23:12:40'),
(43,	'read_products',	'products',	'2020-04-27 23:12:40',	'2020-04-27 23:12:40'),
(44,	'edit_products',	'products',	'2020-04-27 23:12:40',	'2020-04-27 23:12:40'),
(45,	'add_products',	'products',	'2020-04-27 23:12:40',	'2020-04-27 23:12:40'),
(46,	'delete_products',	'products',	'2020-04-27 23:12:40',	'2020-04-27 23:12:40');

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1,	1),
(2,	1),
(3,	1),
(4,	1),
(5,	1),
(6,	1),
(7,	1),
(8,	1),
(9,	1),
(10,	1),
(11,	1),
(12,	1),
(13,	1),
(14,	1),
(15,	1),
(16,	1),
(17,	1),
(18,	1),
(19,	1),
(20,	1),
(21,	1),
(22,	1),
(23,	1),
(24,	1),
(25,	1),
(26,	1),
(27,	1),
(28,	1),
(29,	1),
(30,	1),
(31,	1),
(32,	1),
(33,	1),
(34,	1),
(35,	1),
(36,	1),
(37,	1),
(38,	1),
(39,	1),
(40,	1),
(42,	1),
(43,	1),
(44,	1),
(45,	1),
(46,	1);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1,	0,	2,	'Lorem Ipsum Post',	NULL,	'This is the excerpt for the Lorem Ipsum Post',	'<p>This is the body of the lorem ipsum post</p>',	'posts/post1.jpg',	'lorem-ipsum-post',	'This is the meta description',	'keyword1, keyword2, keyword3',	'PUBLISHED',	0,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(2,	0,	2,	'My Sample Post',	NULL,	'This is the excerpt for the sample Post',	'<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>',	'posts/post2.jpg',	'my-sample-post',	'Meta Description for sample post',	'keyword1, keyword2, keyword3',	'PUBLISHED',	0,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(3,	0,	2,	'Latest Post id',	NULL,	'This is the excerpt for the latest post',	'<p>This is the body for the latest post</p>',	'posts/post3.jpg',	'latest-post',	'This is the meta description',	'keyword1, keyword2, keyword3',	'PUBLISHED',	0,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(4,	0,	2,	'Yarr Post',	NULL,	'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.',	'<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>',	'posts/post4.jpg',	'yarr-post',	'this be a meta descript',	'keyword1, keyword2, keyword3',	'PUBLISHED',	0,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(5,	1,	2,	'Distinctio Harum re',	'Ut officia autem cum',	NULL,	'<p>Odio vel doloribus q.</p>',	NULL,	'distinctio-harum-re',	'Expedita minim corpo',	'Enim dolores qui lab',	'DRAFT',	0,	'2020-04-28 08:55:54',	'2020-04-28 08:55:54');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `status` enum('DRAFT','PUBLISHED','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `buy_now_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_demo_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `category_id`, `title`, `slug`, `price`, `image`, `body`, `status`, `buy_now_link`, `live_demo_link`, `meta_description`, `meta_keywords`, `seo_title`, `created_at`, `updated_at`) VALUES
(1,	2,	'Commodi aliquip ea l',	'commodi-aliquip-ea-l',	NULL,	'products/April2020/oerxEuuqKW5aynbh8hWD.jpg',	'<p>This Neque eos, repellend.</p>',	'PUBLISHED',	'Et dolorem cupidatat',	'Harum qui eiusmod si',	'Delectus iusto dolo',	'Est voluptates quas',	'Excepturi laborum qu',	'2020-04-28 09:41:51',	'2020-05-17 05:06:29'),
(2,	2,	'Id incidunt delenit',	'id-incidunt-delenit',	232.23,	'products/April2020/lccX6eL0JGYB1ujaT6cT.png',	'<p>Ut voluptates volupt.</p>',	'PUBLISHED',	'Sunt iusto sit volu',	'Officia dolorem arch',	'Provident at ipsa',	'Itaque dolor consect',	'Duis sit doloremque',	'2020-04-28 09:43:41',	'2020-05-17 05:06:19');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'Administrator',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37'),
(2,	'user',	'Normal User',	'2020-04-27 23:08:37',	'2020-04-27 23:08:37');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1,	'site.title',	'Site Title',	'Site Title',	'',	'text',	1,	'Site'),
(2,	'site.description',	'Site Description',	'Site Description',	'',	'text',	2,	'Site'),
(3,	'site.logo',	'Site Logo',	'',	'',	'image',	4,	'Site'),
(4,	'site.google_analytics_tracking_id',	'Google Analytics Tracking ID',	'xcvfdbhgfghgfh',	'',	'text',	22,	'Site'),
(5,	'admin.bg_image',	'Admin Background Image',	'',	'',	'image',	5,	'Admin'),
(6,	'admin.title',	'Admin Title',	'Voyager',	'',	'text',	1,	'Admin'),
(7,	'admin.description',	'Admin Description',	'Welcome to Voyager. The Missing Admin for Laravel',	'',	'text',	2,	'Admin'),
(8,	'admin.loader',	'Admin Loader',	'',	'',	'image',	3,	'Admin'),
(9,	'admin.icon_image',	'Admin Icon Image',	'',	'',	'image',	4,	'Admin'),
(10,	'admin.google_analytics_client_id',	'Google Analytics Client ID (used for admin dashboard)',	NULL,	'',	'text',	1,	'Admin'),
(11,	'home-page-hero-section.hero_title',	'Hero Title',	'Data to enrich your <br class=\"xl:hidden\" /> <span class=\"text-indigo-600\">online business</span>',	NULL,	'text',	6,	'Home Page Hero Section'),
(12,	'home-page-hero-section.hero_text',	'Hero Text',	'Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.',	NULL,	'text',	7,	'Home Page Hero Section'),
(13,	'home-page-hero-section.button_one_link',	'Get started Button Link',	'/products',	NULL,	'text',	8,	'Home Page Hero Section'),
(14,	'home-page-hero-section.button_two_link',	'Learn More Button Link',	'/blog',	NULL,	'text',	9,	'Home Page Hero Section'),
(17,	'ad-banners.medium_rectangle_banner_300_250',	'Medium Rectangle Banner',	NULL,	NULL,	'text_area',	10,	'Ad Banners'),
(18,	'ad-banners.leaderboard_banner_728_90',	'Leaderboard Banner',	NULL,	NULL,	'text_area',	11,	'Ad Banners'),
(19,	'ad-banners.half_page_banner_300_600',	'Half Page Banner',	NULL,	NULL,	'text_area',	12,	'Ad Banners'),
(20,	'ad-banners.square_mobile_banner_250_250',	'Square Mobile Banner',	NULL,	NULL,	'text_area',	13,	'Ad Banners'),
(21,	'ad-banners.mobile_leaderboard_banner_320_50',	'Mobile Leaderboard',	NULL,	NULL,	'text_area',	14,	'Ad Banners'),
(22,	'contact-form.receive_email',	'Contact Receive Email',	'info@codertext.com',	NULL,	'text',	15,	'Contact Form'),
(23,	'mailchimp-newsletter.form_action_link',	'Form Action Link',	'https://webnextbd.us10.list-manage.com/subscribe/post?u=31c1043a62b795fa62892c0b7&amp;id=600b31113f',	NULL,	'text',	16,	'Mailchimp Newsletter'),
(24,	'mailchimp-newsletter.hidden_input_name',	'Hidden Input Name',	'b_31c1043a62b795fa62892c0b7_600b31113f',	NULL,	'text',	17,	'Mailchimp Newsletter'),
(25,	'social-media-links.facebook',	'Facebook',	NULL,	NULL,	'text',	18,	'Social Media Links'),
(26,	'social-media-links.instagram',	'Instagram',	NULL,	NULL,	'text',	19,	'Social Media Links'),
(27,	'social-media-links.twitter',	'Twitter',	NULL,	NULL,	'text',	20,	'Social Media Links'),
(28,	'site.keywords',	'Site Keywords',	NULL,	NULL,	'text',	3,	'Site'),
(29,	'site.logo_dark',	'Site Logo Dark',	'',	NULL,	'image',	21,	'Site');

DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1,	'data_types',	'display_name_singular',	5,	'pt',	'Post',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(2,	'data_types',	'display_name_singular',	6,	'pt',	'Página',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(3,	'data_types',	'display_name_singular',	1,	'pt',	'Utilizador',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(4,	'data_types',	'display_name_singular',	4,	'pt',	'Categoria',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(5,	'data_types',	'display_name_singular',	2,	'pt',	'Menu',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(6,	'data_types',	'display_name_singular',	3,	'pt',	'Função',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(7,	'data_types',	'display_name_plural',	5,	'pt',	'Posts',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(8,	'data_types',	'display_name_plural',	6,	'pt',	'Páginas',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(9,	'data_types',	'display_name_plural',	1,	'pt',	'Utilizadores',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(10,	'data_types',	'display_name_plural',	4,	'pt',	'Categorias',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(11,	'data_types',	'display_name_plural',	2,	'pt',	'Menus',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(12,	'data_types',	'display_name_plural',	3,	'pt',	'Funções',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(13,	'categories',	'slug',	1,	'pt',	'categoria-1',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(14,	'categories',	'name',	1,	'pt',	'Categoria 1',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(15,	'categories',	'slug',	2,	'pt',	'categoria-2',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(16,	'categories',	'name',	2,	'pt',	'Categoria 2',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(17,	'pages',	'title',	1,	'pt',	'Olá Mundo',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(18,	'pages',	'slug',	1,	'pt',	'ola-mundo',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(19,	'pages',	'body',	1,	'pt',	'<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(20,	'menu_items',	'title',	1,	'pt',	'Painel de Controle',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(21,	'menu_items',	'title',	2,	'pt',	'Media',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(22,	'menu_items',	'title',	12,	'pt',	'Publicações',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(23,	'menu_items',	'title',	3,	'pt',	'Utilizadores',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(24,	'menu_items',	'title',	11,	'pt',	'Categorias',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(25,	'menu_items',	'title',	13,	'pt',	'Páginas',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(26,	'menu_items',	'title',	4,	'pt',	'Funções',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(27,	'menu_items',	'title',	5,	'pt',	'Ferramentas',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(28,	'menu_items',	'title',	6,	'pt',	'Menus',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(29,	'menu_items',	'title',	7,	'pt',	'Base de dados',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38'),
(30,	'menu_items',	'title',	10,	'pt',	'Configurações',	'2020-04-27 23:08:38',	'2020-04-27 23:08:38');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1,	1,	'Admin',	'admin@admin.com',	'users/default.png',	NULL,	'$2y$10$ot0w8sTr2LP1YzCZDi0jo.HB9UE/YrJV8y7qiBk.SIeS9lxgVyqC2',	'DfANJARaoHwUDxLZ26KtAdkL1nJL2HcgEJNkm8uzaYINxPQExSancdRuUjTl',	NULL,	'2020-04-27 23:08:38',	'2020-04-27 23:08:38');

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2021-08-26 16:25:19
