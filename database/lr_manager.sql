/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.53 : Database - lr_manager
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lr_manager` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `lr_manager`;

/*Table structure for table `lr_admin_role` */

DROP TABLE IF EXISTS `lr_admin_role`;

CREATE TABLE `lr_admin_role` (
  `admin_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `lr_admin_role` */

insert  into `lr_admin_role`(`admin_id`,`role_id`) values (1,1),(3,2),(4,2);

/*Table structure for table `lr_admins` */

DROP TABLE IF EXISTS `lr_admins`;

CREATE TABLE `lr_admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL COMMENT '名称',
  `password` varchar(128) DEFAULT NULL COMMENT '密码',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `status` int(1) DEFAULT '1' COMMENT '状态，1正常，0禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lr_admins` */

insert  into `lr_admins`(`id`,`name`,`password`,`description`,`status`) values (1,'admin','$2y$10$LE6WRHd1jnxuMVwI7n21/Odk8URlnVajlnFKTsSqis/MC2lSzy6OW','super administrator',1),(3,'guester',NULL,'a guester',1),(4,'guester1',NULL,'other guester',1);

/*Table structure for table `lr_menus` */

DROP TABLE IF EXISTS `lr_menus`;

CREATE TABLE `lr_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL COMMENT '菜单标识',
  `parent_key` varchar(255) DEFAULT NULL COMMENT '上级菜单标识',
  `local` varchar(255) DEFAULT NULL COMMENT '国际化，描述英译',
  `text` varchar(255) DEFAULT NULL COMMENT '描述',
  `target` varchar(255) DEFAULT NULL COMMENT 'url跳转类别',
  `icon` varchar(255) DEFAULT NULL COMMENT '图表',
  `path` varchar(255) DEFAULT NULL COMMENT '前端路由',
  `url` varchar(512) DEFAULT NULL COMMENT '浏览器跳转地址',
  `order` int(6) DEFAULT '1000' COMMENT '排序，越大越前',
  `type` int(1) DEFAULT '1' COMMENT '类型1菜单、2功能',
  `code` varchar(255) DEFAULT NULL COMMENT '编码，功能权限使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lr_menus` */

insert  into `lr_menus`(`id`,`key`,`parent_key`,`local`,`text`,`target`,`icon`,`path`,`url`,`order`,`type`,`code`) values (2,'document','component','document','文档','_blank','book',NULL,'https://open.vbill.cn/react-admin',1200,1,NULL),(3,'menus','20190718090554vTy5a','menus','菜单编辑',NULL,'menu-unfold','/menu-permission',NULL,1000,1,NULL),(4,'codeGenerator','component','codeGenerator','代码生成',NULL,'code','/admin-crud',NULL,999,1,NULL),(5,'ajax','component','ajax','ajax请求',NULL,'api','/example/ajax',NULL,998,1,NULL),(6,'user','20190718090554vTy5a','users','用户列表',NULL,'user','/users',NULL,900,1,NULL),(7,'role','20190718090554vTy5a','roles ','角色列表',NULL,'team','/roles',NULL,800,1,NULL),(8,'page404',NULL,'page404','404页面不存',NULL,'file-search','/404',NULL,700,2,NULL),(9,'user-center',NULL,'user-center','用户中心',NULL,'user','/user-center',NULL,600,1,NULL),(10,'component',NULL,'component','组件',NULL,'ant-design',NULL,NULL,700,1,NULL),(11,'/example/antd/async-select','component','asyncSelect','AsyncSelect # 异步下拉',NULL,'deployment-unit','/example/antd/async-select',NULL,1000,1,NULL),(12,'/example/antd/form-element','component','formElement','FormElement # 表单元素',NULL,'deployment-unit','/example/antd/form-element',NULL,1000,1,NULL),(13,'/example/antd/operator','component','operator','Operator # 操作',NULL,'deployment-unit','/example/antd/operator',NULL,1000,1,NULL),(14,'/example/antd/pagination','component','pagination','Pagination # 分页组件',NULL,'deployment-unit','/example/antd/pagination',NULL,1000,1,NULL),(15,'/example/antd/query-bar','component','queryBar','QueryBar # 查询条',NULL,'deployment-unit','/example/antd/query-bar',NULL,1000,1,NULL),(16,'/example/antd/query-item','component','queryItem','QueryItem # 查询条件',NULL,'deployment-unit','/example/antd/query-item',NULL,1000,1,NULL),(17,'/example/antd/table-editable','component','tableEditable','TableEditable # 可编辑表格',NULL,'deployment-unit','/example/antd/table-editable',NULL,1000,1,NULL),(18,'/example/antd/table-row-draggable','component','tableRowDraggable','TableRowDraggable # 表格行可拖拽',NULL,'deployment-unit','/example/antd/table-row-draggable',NULL,1000,1,NULL),(19,'/example/antd/tool-bar','component','toolBar','ToolBar # 工具条',NULL,'deployment-unit','/example/antd/tool-bar',NULL,1000,1,NULL),(20,'/example/antd/user-avatar','component','userAvatar','UserAvatar # 用户头像',NULL,'deployment-unit','/example/antd/user-avatar',NULL,1000,1,NULL),(51,'20190718090554vTy5a',NULL,'authManager','权限管理',NULL,'lock',NULL,NULL,2,1,NULL),(52,'20190722021436W09iP','20190718090554vTy5a','administrator','管理员管理',NULL,'usergroup-add','/admins',NULL,1000,1,NULL),(53,'20190723082846xWoCb','20190722021436W09iP',NULL,'获取管理员列表',NULL,NULL,NULL,NULL,1000,2,'admin/admins/getAdmins'),(54,'201907230830210nfjm','20190722021436W09iP',NULL,'添加管理员',NULL,NULL,NULL,NULL,1000,2,'admin/admins/add'),(55,'20190723083046Q5vlg','20190722021436W09iP',NULL,'编辑管理员',NULL,NULL,NULL,NULL,1000,2,'admin/admins/edit'),(56,'20190723083110yDnSt','20190722021436W09iP',NULL,'删除管理员',NULL,NULL,NULL,NULL,1000,2,'admin/admins/del'),(57,'20190723084122gyCde','menus',NULL,'获取菜单列表',NULL,NULL,NULL,NULL,1000,2,'admin/menus/getMenus'),(58,'20190723084159fLDHF','menus',NULL,'添加菜单',NULL,NULL,NULL,NULL,1000,2,'admin/menus/add'),(59,'201907230842164oAoV','menus',NULL,'编辑菜单',NULL,NULL,NULL,NULL,1000,2,'admin/menus/edit'),(60,'20190723084241uiICM','menus',NULL,'删除菜单',NULL,NULL,NULL,NULL,1000,2,'admin/menus/del'),(61,'20190723084318EB6qP','user',NULL,'获取用户列表',NULL,NULL,NULL,NULL,1000,2,'admin/users/getUsers'),(62,'20190723084352wt739','user',NULL,'添加用户',NULL,NULL,NULL,NULL,1000,2,'admin/users/add'),(63,'20190723084410Vc0mS','user',NULL,'编辑用户',NULL,NULL,NULL,NULL,1000,2,'admin/users/edit'),(64,'20190723084433waZVb','user',NULL,'删除用户',NULL,NULL,NULL,NULL,1000,2,'admin/users/del'),(65,'20190723084458WNAR8','role',NULL,'获取角色列表',NULL,NULL,NULL,NULL,1000,2,'admin/roles/getRoles'),(66,'20190723084525MKB1c','role',NULL,'添加角色',NULL,NULL,NULL,NULL,1000,2,'admin/roles/add'),(67,'20190723084618TdB37','role',NULL,'编辑角色',NULL,NULL,NULL,NULL,1000,2,'admin/roles/edit'),(68,'20190723084637plJI3','role',NULL,'删除角色',NULL,NULL,NULL,NULL,1000,2,'admin/roles/del');

/*Table structure for table `lr_migrations` */

DROP TABLE IF EXISTS `lr_migrations`;

CREATE TABLE `lr_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lr_migrations` */

insert  into `lr_migrations`(`id`,`migration`,`batch`) values (1,'2019_07_22_061020_create_lr_admins_table',0),(2,'2019_07_22_061020_create_lr_menus_table',0),(3,'2019_07_22_061020_create_lr_roles_table',0),(4,'2019_07_22_061020_create_lr_users_table',0),(5,'2019_07_24_071153_create_lr_admin_role_table',0),(6,'2019_07_24_071153_create_lr_admins_table',0),(7,'2019_07_24_071153_create_lr_menus_table',0),(8,'2019_07_24_071153_create_lr_migrations_table',0),(9,'2019_07_24_071153_create_lr_roles_table',0),(10,'2019_07_24_071153_create_lr_users_table',0);

/*Table structure for table `lr_roles` */

DROP TABLE IF EXISTS `lr_roles`;

CREATE TABLE `lr_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `description` varchar(512) DEFAULT NULL COMMENT '描述',
  `permissions` text COMMENT '权限key,逗号隔开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lr_roles` */

insert  into `lr_roles`(`id`,`name`,`description`,`permissions`) values (1,'admin2','超级管理员1',',antDesign,201907170951063dTU7,page404,user-center,,20190723084241uiICM,20190723084122gyCde,20190723084159fLDHF,201907230842164oAoV,20190723082846xWoCb,201907230830210nfjm,20190723083046Q5vlg,20190723083110yDnSt,20190723084433waZVb,20190723084410Vc0mS,20190723084352wt739,20190723084318EB6qP,20190723084637plJI3,20190723084618TdB37,20190723084525MKB1c,20190723084458WNAR8,20190718090554vTy5a,menus,20190722021436W09iP,user,role,,,document,/example/antd/async-select,/example/antd/form-element,/example/antd/operator,/example/antd/pagination,/example/antd/query-bar,/example/antd/query-item,/example/antd/table-editable,/example/antd/table-row-draggable,/example/antd/tool-bar,/example/antd/user-avatar,codeGenerator,ajax,component,'),(2,'guester','客人角色','antDesign,document,201907170951063dTU7,menus,codeGenerator,ajax,user,role,page404,user-center,,');

/*Table structure for table `lr_users` */

DROP TABLE IF EXISTS `lr_users`;

CREATE TABLE `lr_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `mobile` varchar(12) DEFAULT NULL COMMENT '手机号码',
  `age` int(3) unsigned DEFAULT '0' COMMENT '年龄',
  `position` varchar(128) DEFAULT NULL COMMENT '职位',
  `job` varchar(255) DEFAULT NULL COMMENT '工作',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lr_users` */

insert  into `lr_users`(`id`,`name`,`password`,`mobile`,`age`,`position`,`job`) values (4,'张珊',NULL,'234324',50,NULL,NULL),(6,'张思',NULL,'42342',20,NULL,NULL),(7,'admin1','$2y$10$fWFJoKKbU.Vb10.WQovqTOmiyPUP5H8FxhXWkoanIwjwFfauzueO.',NULL,0,NULL,NULL),(9,'34放大',NULL,'6595',50,NULL,NULL),(10,'发的发',NULL,'4545643',24,NULL,NULL),(11,NULL,'$2y$10$1nwg4flES6hZpt/.3w7W7OdtrWTf/jIatuHm7cVZ1A8GTA4c/R.OW',NULL,0,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
