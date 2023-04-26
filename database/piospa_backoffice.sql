/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : piospa_backoffice

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 29/04/2020 10:20:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for piospa_admin
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin`;
CREATE TABLE `piospa_admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'ID user API STS trã về',
  `full_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `default_menu` int(11) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0 COMMENT 'Đánh dấu xóa',
  `is_admin` tinyint(1) NULL DEFAULT 0 COMMENT 'Đánh dấu admin',
  `is_change_pass` tinyint(1) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày xóa',
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL COMMENT 'Người xóa',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 138 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin
-- ----------------------------
INSERT INTO `piospa_admin` VALUES (1, 'e4041108-1a0c-4a0c-9dae-d8ea24108e5b', 'PioSpa Manager', NULL, 'admin@piospa.com', '$2y$12$0aC5FdjnGH7Bn4VSk26seuDNiKvM9AiV6EucyBU3oaYbnTnrX70jK', NULL, 1, 1, 0, 1, 1, '2019-09-09 08:09:45', '2020-04-29 02:42:43', NULL, NULL);

-- ----------------------------
-- Table structure for piospa_admin_action
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_action`;
CREATE TABLE `piospa_admin_action`  (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `action_group_name_id` int(11) NULL DEFAULT NULL,
  `action_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `action_name_default` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên quyền mặc định',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_menu` tinyint(1) NULL DEFAULT 0 COMMENT 'Đánh dấu action menu',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`action_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_action
-- ----------------------------
INSERT INTO `piospa_admin_action` VALUES (1, 1, 'Xem quốc gia', 'Xem quốc gia', 'Xem danh sách quốc gia', 'admin.country', 1, 1, 0, '2019-09-05 11:22:04', '2019-10-06 20:10:05');
INSERT INTO `piospa_admin_action` VALUES (2, 1, 'Tạo quốc gia', 'Tạo quốc gia', NULL, 'admin.country.create', 1, 1, 0, '2019-09-05 11:22:07', '2019-10-06 20:10:05');
INSERT INTO `piospa_admin_action` VALUES (3, 1, 'Sửa quốc gia', 'Sửa quốc gia', NULL, 'admin.country.edit', 0, 1, 0, '2019-09-05 11:22:09', '2019-09-22 20:25:02');
INSERT INTO `piospa_admin_action` VALUES (4, 1, 'Xóa quốc gia', 'Xóa quốc gia', NULL, 'admin.country.destroy', 0, 1, 0, '2019-09-05 11:22:12', '2019-09-22 20:25:06');
INSERT INTO `piospa_admin_action` VALUES (5, 2, 'Xem chi tiết tỉnh thành', 'Xem chi tiết tỉnh thành', NULL, 'admin.province', 1, 1, 0, '2019-09-05 11:22:15', '2019-10-17 10:34:25');
INSERT INTO `piospa_admin_action` VALUES (6, 2, 'Tạo tỉnh thành', 'Tạo tỉnh thành', NULL, 'admin.province.create', 1, 1, 0, '2019-09-05 11:22:17', '2019-10-06 20:10:31');
INSERT INTO `piospa_admin_action` VALUES (7, 2, 'Sửa tỉnh thành', 'Sửa tỉnh thành', NULL, 'admin.province.edit', 0, 1, 0, '2019-09-05 11:22:21', '2019-09-22 20:25:19');
INSERT INTO `piospa_admin_action` VALUES (8, 2, 'Xóa tỉnh thành', 'Xóa tỉnh thành', '', 'admin.province.destroy', 0, 1, 0, '2019-09-05 11:22:23', '2019-10-15 14:04:59');
INSERT INTO `piospa_admin_action` VALUES (9, 3, 'Xem chi tiết quận huyện', 'Xem chi tiết quận huyện', NULL, 'admin.district', 1, 1, 0, '2019-09-05 11:22:27', '2019-10-17 11:07:42');
INSERT INTO `piospa_admin_action` VALUES (10, 3, 'Tạo quận huyện', 'Tạo quận huyện', NULL, 'admin.district.create', 1, 1, 0, '2019-09-05 11:22:30', '2019-10-06 20:11:16');
INSERT INTO `piospa_admin_action` VALUES (11, 3, 'Sửa quận huyện', 'Sửa quận huyện', NULL, 'admin.district.edit', 0, 1, 0, '2019-09-05 11:22:33', '2019-09-22 20:25:58');
INSERT INTO `piospa_admin_action` VALUES (12, 3, 'Xóa quận huyện', 'Xóa quận huyện', NULL, 'admin.district.destroy', 0, 1, 0, '2019-09-05 11:22:35', '2019-11-12 14:56:59');
INSERT INTO `piospa_admin_action` VALUES (13, 4, 'Xem chi tiết phường xã', 'Xem chi tiết phường xã', NULL, 'admin.ward', 1, 1, 0, '2019-09-05 11:22:38', '2019-10-17 11:08:27');
INSERT INTO `piospa_admin_action` VALUES (14, 4, 'Tạo phường xã', 'Tạo phường xã', NULL, 'admin.ward.create', 1, 1, 0, '2019-09-05 11:22:42', '2019-10-06 20:11:16');
INSERT INTO `piospa_admin_action` VALUES (15, 4, 'Sửa phường xã', 'Sửa phường xã', NULL, 'admin.ward.edit', 0, 1, 0, '2019-09-05 11:22:44', '2019-09-22 20:26:36');
INSERT INTO `piospa_admin_action` VALUES (16, 4, 'Xóa phường xã', 'Xóa phường xã', NULL, 'admin.ward.destroy', 0, 1, 0, '2019-09-05 11:22:47', '2019-09-22 20:26:36');
INSERT INTO `piospa_admin_action` VALUES (17, 5, 'Xem nhóm quyền', 'Xem nhóm quyền', NULL, 'user.admin-group.index', 1, 1, 0, '2019-09-05 15:32:50', '2019-10-06 20:02:56');
INSERT INTO `piospa_admin_action` VALUES (18, 5, 'Tạo nhóm quyền', 'Tạo nhóm quyền', NULL, 'user.admin-group.create', 1, 1, 0, '2019-09-05 15:33:18', '2019-10-06 20:03:10');
INSERT INTO `piospa_admin_action` VALUES (19, 5, 'Sửa nhóm quyền', 'Sửa nhóm quyền', NULL, 'user.admin-group.edit', 0, 1, 0, '2019-09-09 14:30:36', '2019-09-22 20:26:36');
INSERT INTO `piospa_admin_action` VALUES (20, 5, 'Xóa nhóm quyền', 'Xóa nhóm quyền', NULL, 'user.admin-group.destroy', 0, 1, 0, '2019-09-09 14:31:21', '2019-09-22 20:26:36');
INSERT INTO `piospa_admin_action` VALUES (21, 6, 'Xem quyền truy cập', 'Xem quyền truy cập', NULL, 'user.admin-group-action.index', 1, 1, 0, '2019-09-11 09:18:12', '2019-10-06 20:03:34');
INSERT INTO `piospa_admin_action` VALUES (22, 6, 'Sửa quyền truy cập', 'Sửa quyền truy cập', NULL, 'user.admin-group-action.edit', 0, 1, 0, '2019-09-11 09:18:50', '2019-09-22 20:26:36');
INSERT INTO `piospa_admin_action` VALUES (23, 7, 'Danh sách nhóm quyền brand portal', 'Danh sách nhóm quyền brand portal', NULL, 'brand-portal.admin-group.index', 1, 1, 1, '2019-09-11 09:19:55', '2019-09-24 17:39:11');
INSERT INTO `piospa_admin_action` VALUES (24, 7, 'Thêm nhóm quyền brand portal', 'Thêm nhóm quyền brand portal', NULL, 'brand-portal.admin-group.create', 1, 1, 1, '2019-09-11 09:20:22', '2019-09-24 17:39:11');
INSERT INTO `piospa_admin_action` VALUES (25, 7, 'Sửa nhóm quyền brand portal', 'Sửa nhóm quyền brand portal', NULL, 'brand-portal.admin-group.edit', 0, 1, 1, '2019-09-11 09:20:43', '2019-09-24 17:39:11');
INSERT INTO `piospa_admin_action` VALUES (26, 7, 'Xóa nhóm quyền brand portal', 'Xóa nhóm quyền brand portal', NULL, 'brand-portal.admin-group.destroy', 0, 1, 1, '2019-09-11 09:21:04', '2019-09-24 17:39:11');
INSERT INTO `piospa_admin_action` VALUES (27, 8, 'Xem menu', 'Xem menu', NULL, 'user.admin-menu.index', 1, 1, 0, '2019-09-11 09:21:41', '2019-10-06 20:04:04');
INSERT INTO `piospa_admin_action` VALUES (28, 8, 'Sửa menu', 'Sửa menu', NULL, 'user.admin-menu.edit', 0, 1, 0, '2019-09-11 09:22:01', '2019-09-22 20:27:25');
INSERT INTO `piospa_admin_action` VALUES (29, 8, 'Xóa menu', 'Xóa menu', NULL, 'user.admin-menu.destroy', 0, 1, 0, '2019-09-11 09:22:18', '2019-09-22 20:27:25');
INSERT INTO `piospa_admin_action` VALUES (30, 8, 'Tạo menu', 'Tạo menu', NULL, 'user.admin-menu.create', 1, 1, 0, '2019-09-13 09:18:44', '2019-10-06 20:04:04');
INSERT INTO `piospa_admin_action` VALUES (31, 9, 'Xem tài khoản store user', 'Xem tài khoản store user', NULL, 'user.store-user', 1, 1, 0, '2019-09-13 16:42:01', '2019-10-06 20:05:47');
INSERT INTO `piospa_admin_action` VALUES (32, 9, 'Tạo tài khoản store user', 'Tạo tài khoản store user', NULL, 'user.store-user.create', 1, 1, 0, '2019-09-13 16:42:40', '2019-10-06 20:05:47');
INSERT INTO `piospa_admin_action` VALUES (33, 9, 'Sửa tài khoản store user', 'Sửa tài khoản store user', NULL, 'user.store-user.edit', 0, 1, 0, '2019-09-13 16:46:51', '2019-10-06 20:05:47');
INSERT INTO `piospa_admin_action` VALUES (34, 9, 'Xóa tài khoản store user', 'Xóa tài khoản store user', NULL, 'user.store-user.destroy', 0, 1, 1, '2019-09-13 17:59:36', '2019-12-05 04:54:33');
INSERT INTO `piospa_admin_action` VALUES (35, 9, 'Reset mật khẩu tài khoản store user', 'Reset mật khẩu tài khoản store user', '', 'user.store-user.reset-password', 0, 1, 0, '2019-09-13 18:01:59', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_action` VALUES (36, 9, 'Xem thông tin tài khoản Store user', 'Xem thông tin tài khoản Store user', NULL, 'user.store-user.detail', 0, 1, 0, '2019-09-13 18:02:57', '2019-09-22 20:28:00');
INSERT INTO `piospa_admin_action` VALUES (37, 10, 'Xem tài khoản Backoffice', 'Xem tài khoản Backoffice', NULL, 'user.my-store', 1, 1, 0, '2019-09-13 18:18:01', '2019-10-06 20:04:46');
INSERT INTO `piospa_admin_action` VALUES (38, 10, 'Tạo tài khoản Backoffice', 'Tạo tài khoản Backoffice', NULL, 'user.my-store.create', 1, 1, 0, '2019-09-13 18:19:00', '2019-10-06 20:04:46');
INSERT INTO `piospa_admin_action` VALUES (39, 10, 'Sửa tài khoản Backoffice', 'Sửa tài khoản Backoffice', '', 'user.my-store.edit', 0, 1, 0, '2019-09-13 18:20:05', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_action` VALUES (40, 10, 'Xóa tài khoản Backoffice', 'Xóa tài khoản Backoffice', NULL, 'user.my-store.destroy', 0, 1, 1, '2019-09-13 18:20:53', '2019-12-05 04:54:33');
INSERT INTO `piospa_admin_action` VALUES (41, 10, 'Reset mật khẩu tài khoản Backoffice', 'Reset mật khẩu tài khoản Backoffice', '', 'user.my-store.update-password', 0, 1, 0, '2019-09-13 18:23:38', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_action` VALUES (42, 11, 'Xem thương hiệu', 'Xem thương hiệu', NULL, 'admin.brand', 1, 1, 0, NULL, '2019-10-06 20:06:58');
INSERT INTO `piospa_admin_action` VALUES (43, 11, 'Tạo thương hiệu', 'Tạo thương hiệu', '', 'admin.brand.create', 1, 1, 0, '2019-09-23 03:23:34', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_action` VALUES (44, 11, 'Sửa thương hiệu', 'Sửa thương hiệu', '', 'admin.brand.edit', 0, 1, 0, '2019-09-23 03:23:59', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_action` VALUES (45, 11, 'Xóa thương hiệu', 'Xóa thương hiệu', NULL, 'admin.brand.destroy', 0, 0, 1, '2019-09-23 03:24:28', '2019-12-05 04:54:33');
INSERT INTO `piospa_admin_action` VALUES (46, 12, 'Xem nhóm nội dung hỗ trợ', 'Xem nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.index', 1, 1, 0, '2019-09-23 03:30:11', '2019-10-06 20:09:12');
INSERT INTO `piospa_admin_action` VALUES (47, 12, 'Tạo nhóm nội dung hỗ trợ', 'Tạo nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.create', 1, 1, 0, '2019-09-23 03:30:33', '2019-10-06 20:09:12');
INSERT INTO `piospa_admin_action` VALUES (48, 12, 'Sửa nhóm nội dung hỗ trợ', 'Sửa nhóm nội dung hỗ trợ', '', 'admin.faq-group.edit', 0, 1, 0, '2019-09-23 03:30:52', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_action` VALUES (49, 12, 'Xóa nhóm nội dung hỗ trợ', 'Xóa nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.destroy', 0, 1, 0, '2019-09-23 03:31:16', '2019-10-06 20:09:12');
INSERT INTO `piospa_admin_action` VALUES (50, 13, 'Xem nội dung hỗ trợ', 'Xem nội dung hỗ trợ', 'dsada', 'admin.faq.index', 1, 1, 0, '2019-09-23 03:31:44', '2019-10-06 19:13:55');
INSERT INTO `piospa_admin_action` VALUES (51, 13, 'Tạo nội dung hỗ trợ', 'Tạo nội dung hỗ trợ', NULL, 'admin.faq.create', 1, 1, 0, '2019-09-23 03:32:11', '2019-10-06 19:13:31');
INSERT INTO `piospa_admin_action` VALUES (52, 13, 'Sửa nội dung hỗ trợ', 'Sửa nội dung hỗ trợ', '', 'admin.faq.edit', 0, 1, 0, '2019-09-23 03:32:40', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_action` VALUES (53, 13, 'Xóa nội dung hỗ trợ', 'Xóa nội dung hỗ trợ', NULL, 'admin.faq.destroy', 0, 1, 0, '2019-09-23 03:32:58', '2019-10-06 19:13:09');
INSERT INTO `piospa_admin_action` VALUES (54, 14, 'Xem chi tiết nội dung tĩnh', 'Xem chi tiết nội dung tĩnh', NULL, 'admin.policy-terms.index', 1, 1, 0, '2019-09-23 03:36:52', '2019-10-06 20:12:41');
INSERT INTO `piospa_admin_action` VALUES (55, 14, 'Tạo nội dung tĩnh', 'Tạo nội dung tĩnh', NULL, 'admin.policy-terms.create', 1, 1, 0, '2019-09-23 03:37:12', '2019-10-06 20:11:56');
INSERT INTO `piospa_admin_action` VALUES (56, 14, 'Sửa nội dung tĩnh', 'Sửa nội dung tĩnh', NULL, 'admin.policy-terms.edit', 0, 1, 0, '2019-09-23 03:37:31', '2019-10-06 20:12:41');
INSERT INTO `piospa_admin_action` VALUES (57, 14, 'Xóa nội dung tĩnh', 'Xóa nội dung tĩnh', NULL, 'admin.policy-terms.destroy', 0, 1, 0, '2019-09-23 03:37:58', '2019-10-06 20:12:41');
INSERT INTO `piospa_admin_action` VALUES (58, 15, 'Xem notification', 'Xem notification', NULL, 'admin.notification', 1, 1, 0, '2019-09-26 15:30:57', '2019-10-18 04:01:27');
INSERT INTO `piospa_admin_action` VALUES (59, 15, 'Thêm thông báo', 'Thêm thông báo', NULL, 'admin.notification.create', 1, 1, 0, '2019-09-26 15:31:17', '2019-09-26 08:31:17');
INSERT INTO `piospa_admin_action` VALUES (60, 15, 'Sửa thông báo', 'Sửa thông báo', NULL, 'admin.notification.edit', 0, 1, 0, '2019-09-26 15:31:44', '2019-09-26 08:31:44');
INSERT INTO `piospa_admin_action` VALUES (61, 15, 'Xóa thông báo', 'Xóa thông báo', NULL, 'admin.notification.destroy', 0, 1, 0, '2019-09-26 15:32:07', '2019-09-26 08:32:07');
INSERT INTO `piospa_admin_action` VALUES (62, 16, 'Xem nhóm menu', 'Xem nhóm menu', NULL, 'user.admin-menu-category.index', 1, 1, 0, '2019-10-04 16:18:04', '2019-10-04 09:18:04');
INSERT INTO `piospa_admin_action` VALUES (63, 16, 'Tạo nhóm menu', 'Tạo nhóm menu', NULL, 'user.admin-menu-category.create', 1, 1, 0, '2019-10-04 16:20:41', '2019-10-04 09:20:41');
INSERT INTO `piospa_admin_action` VALUES (64, 16, 'Sửa nhóm menu', 'Sửa nhóm menu', NULL, 'user.admin-menu-category.edit', 0, 1, 0, '2019-10-04 16:21:33', '2019-10-04 09:21:33');
INSERT INTO `piospa_admin_action` VALUES (65, 16, 'Xóa nhóm menu', 'Xóa nhóm menu', NULL, 'user.admin-menu-category.destroy', 0, 1, 0, '2019-10-04 16:21:56', '2019-10-04 09:21:56');
INSERT INTO `piospa_admin_action` VALUES (66, 5, 'Giao quyền cho nhân viên', 'Giao quyền cho nhân viên', NULL, 'user.admin-group.add-user-into-group', 0, 1, 0, '2019-10-07 01:45:29', '2019-10-06 18:45:29');
INSERT INTO `piospa_admin_action` VALUES (67, 18, 'Cài đặt gửi thông báo', 'Cài đặt gửi thông báo', '', 'admin.config-notification', 1, 1, 0, '2019-10-08 10:27:20', '2019-10-17 07:53:04');
INSERT INTO `piospa_admin_action` VALUES (68, 17, 'Xem nhóm khách hàng', 'Xem nhóm khách hàng', NULL, 'user.user-group-notification', 1, 1, 0, '2019-10-08 10:30:51', '2019-10-08 03:30:53');
INSERT INTO `piospa_admin_action` VALUES (70, 17, 'Thêm nhóm khách hàng tự động', 'Thêm nhóm khách hàng tự động', NULL, 'user.user-group-notification.create-auto', 1, 1, 0, '2019-10-11 17:12:20', '2019-10-18 04:03:41');
INSERT INTO `piospa_admin_action` VALUES (71, 17, 'Thêm nhóm khách hàng tự định nghĩa', 'Thêm nhóm khách hàng tự định nghĩa', NULL, 'user.user-group-notification.create-user-define', 1, 1, 0, '2019-10-11 17:13:06', '2019-10-18 04:03:41');
INSERT INTO `piospa_admin_action` VALUES (72, 17, 'Sửa nhóm khách hàng tự động', 'Sửa nhóm khách hàng tự động', NULL, 'user.user-group-notification.edit-auto', 0, 1, 0, '2019-10-11 17:15:29', '2019-10-18 04:03:41');
INSERT INTO `piospa_admin_action` VALUES (73, 17, 'Sửa nhóm khách hàng tự định nghĩa', 'Sửa nhóm khách hàng tự định nghĩa', NULL, 'user.user-group-notification.edit-user-define', 0, 1, 0, '2019-10-11 17:16:06', '2019-10-18 04:03:41');
INSERT INTO `piospa_admin_action` VALUES (74, 11, 'Cài đặt hoạt động', 'Cài đặt hoạt động', NULL, 'admin.brand.update-status', 0, 1, 0, '2019-10-18 11:22:03', '2019-10-18 04:22:03');
INSERT INTO `piospa_admin_action` VALUES (75, 19, 'Danh sách dịch vụ', 'Danh sách dịch vụ', 'Danh sách dịch vụ', 'admin.service', 1, 1, 0, '2019-10-18 11:22:03', '2020-04-14 06:58:48');
INSERT INTO `piospa_admin_action` VALUES (76, 19, 'Tạo dịch vụ', 'Tạo dịch vụ', 'Tạo dịch vụ', 'admin.service.create', 0, 1, 0, '2019-10-18 11:22:03', '2019-10-18 04:22:03');
INSERT INTO `piospa_admin_action` VALUES (77, 19, 'Sửa dịch vụ', 'Sửa dịch vụ', 'Sửa dịch vụ', 'admin.service.edit', 0, 1, 0, '2019-10-18 11:22:03', '2019-10-18 04:22:03');
INSERT INTO `piospa_admin_action` VALUES (78, 19, 'Danh sách tính năng', 'Danh sách tính năng', 'Danh sách tính năng', 'service.service-feature.index', 1, 1, 0, '2019-10-18 11:22:03', '2019-10-18 04:22:03');
INSERT INTO `piospa_admin_action` VALUES (79, 19, 'Chi tiết tính năng', 'Chi tiết tính năng', 'Chi tiết tính năng', 'service.service-feature.show', 0, 1, 0, '2019-10-18 11:22:03', '2020-04-15 11:26:45');
INSERT INTO `piospa_admin_action` VALUES (80, 19, 'Sửa tính năng', 'Sửa tính năng', 'Sửa tính năng', 'service.service-feature.edit', 0, 1, 0, '2019-10-18 11:22:03', '2019-10-18 04:22:03');

-- ----------------------------
-- Table structure for piospa_admin_action_group_name
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_action_group_name`;
CREATE TABLE `piospa_admin_action_group_name`  (
  `action_group_name_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `action_group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`action_group_name_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_action_group_name
-- ----------------------------
INSERT INTO `piospa_admin_action_group_name` VALUES (1, 'Quản lý quốc gia', '2019-09-13 02:03:41', '2019-10-07 01:42:40');
INSERT INTO `piospa_admin_action_group_name` VALUES (2, 'Quản lý tỉnh thành', '2019-09-13 02:06:34', '2019-10-07 01:42:58');
INSERT INTO `piospa_admin_action_group_name` VALUES (3, 'Quản lý quận huyện', '2019-09-13 02:06:49', '2019-10-07 01:43:08');
INSERT INTO `piospa_admin_action_group_name` VALUES (4, 'Quản lý phường xã', '2019-09-13 02:07:14', '2019-10-07 01:43:17');
INSERT INTO `piospa_admin_action_group_name` VALUES (5, 'Quản lý nhóm quyền', '2019-09-13 02:07:36', '2019-10-04 10:28:40');
INSERT INTO `piospa_admin_action_group_name` VALUES (6, 'Cài đặt quyền truy cập backoffice', '2019-09-13 02:08:30', '2019-10-04 10:40:38');
INSERT INTO `piospa_admin_action_group_name` VALUES (7, 'Nhóm quyền brand portal', '2019-09-13 02:09:23', '2019-09-13 02:09:23');
INSERT INTO `piospa_admin_action_group_name` VALUES (8, 'Cài đặt menu', '2019-09-13 02:09:54', '2019-10-07 01:40:24');
INSERT INTO `piospa_admin_action_group_name` VALUES (9, 'Quản lý User app', '2019-09-13 16:41:05', '2019-10-07 01:41:07');
INSERT INTO `piospa_admin_action_group_name` VALUES (10, 'Quản lý User backoffice', '2019-09-13 18:04:58', '2019-10-07 01:40:45');
INSERT INTO `piospa_admin_action_group_name` VALUES (11, 'Quản lý thương hiệu', NULL, '2019-10-07 01:41:25');
INSERT INTO `piospa_admin_action_group_name` VALUES (12, 'Cài đặt nhóm nội dung hỗ trợ', '2019-09-23 03:21:10', '2019-10-07 01:42:11');
INSERT INTO `piospa_admin_action_group_name` VALUES (13, 'Cài đặt nội dung hỗ trợ', '2019-09-23 03:21:17', '2019-10-07 01:42:24');
INSERT INTO `piospa_admin_action_group_name` VALUES (14, 'Cài đặt static page', '2019-09-23 03:22:48', '2019-10-07 01:43:30');
INSERT INTO `piospa_admin_action_group_name` VALUES (15, 'Quản lý notification', '2019-09-26 15:30:23', '2019-10-07 01:41:45');
INSERT INTO `piospa_admin_action_group_name` VALUES (16, 'Quản lý nhóm menu', '2019-10-04 16:16:56', '2019-10-04 16:16:56');
INSERT INTO `piospa_admin_action_group_name` VALUES (17, 'Quản lý nhóm khách hàng', '2019-10-08 10:25:57', '2019-10-08 10:25:59');
INSERT INTO `piospa_admin_action_group_name` VALUES (18, 'Cài đặt notification tự động', '2019-10-08 10:26:46', '2019-10-17 18:02:56');
INSERT INTO `piospa_admin_action_group_name` VALUES (19, 'Quản lý dịch vụ', '2019-10-08 10:26:46', '2019-10-17 18:02:56');

-- ----------------------------
-- Table structure for piospa_admin_feature
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_feature`;
CREATE TABLE `piospa_admin_feature`  (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chức năng',
  `feature_group_id` int(11) NOT NULL COMMENT 'Mã nhóm chức năng',
  `feature_name_vi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chức năng - Tiếng việt',
  `feature_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên chức năng - Tiếng anh',
  `feature_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã chức năng',
  `service_type` enum('VisibilityPRO','retailPRO') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại dịch vụ : VisibilityPRO , retailPRO ',
  `platform_type` enum('Portal','App') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại nền tảng : Portal , App',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả chức năng',
  `brand_action_id` int(11) NULL DEFAULT NULL COMMENT 'Mã chức năng của brand : dmspro_mys_admin_action',
  `is_actived` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái ',
  `created_at` datetime(0) NOT NULL COMMENT 'Thời điểm tạo',
  `created_by` int(11) NOT NULL COMMENT 'Người tạo',
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Thời điểm cập nhật ',
  `updated_by` int(11) NOT NULL COMMENT 'Người cập nhật ',
  `feature_group_old_id` int(11) NOT NULL,
  `feature_group_old_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`feature_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 291 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách chức năng của hệ thống -Master data' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of piospa_admin_feature
-- ----------------------------
INSERT INTO `piospa_admin_feature` VALUES (1, 1, 'Danh sách chương trình khuyến mãi ', 'Trade marketing list', 'RETAILPRO_TB_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (2, 1, 'Khuyến mãi nổi bật trên trang chủ ', 'Hot promotion ', 'RETAILPRO_TB_0002', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (3, 1, 'Tab Sản phẩm khuyến mãi ', 'Tab - Special offers ', 'RETAILPRO_TB_0003', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (4, 9, 'Đăng ký chương trình trade marketing ', 'Apply trade marketing program', 'RETAILPRO_TR_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (5, 9, 'Danh sách trả thưởng / quà tặng ', 'Reward', 'RETAILPRO_TR_0002', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (6, 2, 'Danh sách sản phẩm ', 'Product List', 'RETAILPRO_PL_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (7, 2, 'Danh sách sản  phẩm nổi bật trên trang chủ ', 'Hot product ', 'RETAILPRO_PL_0002', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (8, 3, 'Đặt hàng nhanh ', 'Quick order ', 'RETAILPRO_PO_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (9, 3, 'Mua hàng', 'Add to cart ', 'RETAILPRO_PO_0002', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (10, 3, 'Tab danh sách lịch sử đơn hàng ', 'Tab Oder History', 'RETAILPRO_PO_0003', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (11, 3, 'Báo cáo ', 'Report', 'RETAILPRO_PO_0004', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (12, 4, 'Quét QR', 'Scan QR redemption', 'RETAILPRO_RE_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (13, 4, 'Tab danh sách lịch sử  quà tặng đã giao ', 'Tab \"Delevered gifts\"', 'RETAILPRO_RE_0002', 'retailPRO', 'App', NULL, NULL, 0, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (14, 5, 'Chụp ảnh', 'Photo tracking ', 'RETAILPRO_PT_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (15, 5, 'Tab danh sách lịch sử  hình ảnh', 'Tab photo tracking history ', 'RETAILPRO_PT_0002', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (16, 6, 'widget bài viết', 'Article', 'RETAILPRO_AR_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (17, 7, 'Nhân viên hỗ trợ ', 'Support Staff', 'RETAILPRO_SS_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (18, 8, 'Catalog', 'Catalog', 'RETAILPRO_CA_0001', 'retailPRO', 'App', NULL, NULL, 1, '2020-04-21 09:59:52', 1, '2020-04-21 09:59:52', 1, 0, '');
INSERT INTO `piospa_admin_feature` VALUES (19, 10, 'Xem dashboard', NULL, 'admin.dashboard', 'retailPRO', 'Portal', 'Chỉ xem trang dashboard', 1, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 1, 'Dashboard');
INSERT INTO `piospa_admin_feature` VALUES (20, 11, 'Xem sản phẩm', NULL, 'product.index', 'retailPRO', 'Portal', 'Danh sách sản phẩm', 2, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 2, 'Quản lý sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (21, 11, 'Sửa sản phẩm', NULL, 'product.edit', 'retailPRO', 'Portal', 'Sửa sản phẩm', 3, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 2, 'Quản lý sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (22, 13, 'Xem chương trình trade marketing', NULL, 'brand.campaign', 'retailPRO', 'Portal', 'Danh sách khuyến mãi', 5, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (23, 14, 'Xem tài khoản brand portal', NULL, 'user', 'retailPRO', 'Portal', NULL, 6, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 5, 'Quản lý User brand portal');
INSERT INTO `piospa_admin_feature` VALUES (24, 15, 'Xem danh mục sản phẩm', NULL, 'product.product-category', 'retailPRO', 'Portal', NULL, 7, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 6, 'Quản lý danh mục sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (25, 15, 'Tạo danh mục sản phẩm', NULL, 'product.product-category.create', 'retailPRO', 'Portal', NULL, 8, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 6, 'Quản lý danh mục sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (26, 15, 'Sửa danh mục sản phẩm', NULL, 'product.product-category.edit', 'retailPRO', 'Portal', NULL, 9, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 6, 'Quản lý danh mục sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (27, 15, 'Xóa danh mục sản phẩm', NULL, 'product.product-category.destroy', 'retailPRO', 'Portal', NULL, 10, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 6, 'Quản lý danh mục sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (28, 16, 'Danh sách giá bán', NULL, 'product.price-list', 'retailPRO', 'Portal', 'Danh sách giá bán', 11, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 7, 'Quản lý giá bán');
INSERT INTO `piospa_admin_feature` VALUES (29, 16, 'Sửa giá bán', NULL, 'product.price-list.edit', 'retailPRO', 'Portal', NULL, 12, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 7, 'Quản lý giá bán');
INSERT INTO `piospa_admin_feature` VALUES (30, 17, 'Danh sách nhóm quyền', NULL, 'user.admin-group.index', 'retailPRO', 'Portal', NULL, 13, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 8, 'Quản lý nhóm quyền');
INSERT INTO `piospa_admin_feature` VALUES (31, 17, 'Tạo nhóm quyền', NULL, 'user.admin-group.create', 'retailPRO', 'Portal', NULL, 14, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 8, 'Quản lý nhóm quyền');
INSERT INTO `piospa_admin_feature` VALUES (32, 17, 'Sửa nhóm quyền', NULL, 'user.admin-group.edit', 'retailPRO', 'Portal', NULL, 15, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 8, 'Quản lý nhóm quyền');
INSERT INTO `piospa_admin_feature` VALUES (33, 17, 'Xóa nhóm quyền', NULL, 'user.admin-group.destroy', 'retailPRO', 'Portal', NULL, 16, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 8, 'Quản lý nhóm quyền');
INSERT INTO `piospa_admin_feature` VALUES (34, 18, 'Danh sách menu', NULL, 'user.admin-menu.index', 'retailPRO', 'Portal', 'Danh sách menu', 17, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 9, 'Cài đặt menu');
INSERT INTO `piospa_admin_feature` VALUES (35, 18, 'Tạo menu', NULL, 'user.admin-menu.create', 'retailPRO', 'Portal', NULL, 18, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 9, 'Cài đặt menu');
INSERT INTO `piospa_admin_feature` VALUES (36, 18, 'Sửa menu', NULL, 'user.admin-menu.edit', 'retailPRO', 'Portal', NULL, 19, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 9, 'Cài đặt menu');
INSERT INTO `piospa_admin_feature` VALUES (37, 18, 'Xóa menu', NULL, 'user.admin-menu.destroy', 'retailPRO', 'Portal', NULL, 20, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 9, 'Cài đặt menu');
INSERT INTO `piospa_admin_feature` VALUES (38, 19, 'Danh sách quyền truy cập', NULL, 'user.admin-group-action.index', 'retailPRO', 'Portal', NULL, 21, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 10, 'Cài đặt quyền truy cập brand portal');
INSERT INTO `piospa_admin_feature` VALUES (39, 19, 'Sửa quyền truy cập', NULL, 'user.admin-group-action.edit', 'retailPRO', 'Portal', NULL, 22, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 10, 'Cài đặt quyền truy cập brand portal');
INSERT INTO `piospa_admin_feature` VALUES (40, 13, 'Sửa chương trình trade marketing', NULL, 'brand.campaign.edit', 'retailPRO', 'Portal', NULL, 23, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (41, 13, 'Xóa chương trình trade marketing', NULL, 'brand.campaign.destroy', 'retailPRO', 'Portal', NULL, 24, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (42, 20, 'Danh sách nhóm menu', NULL, 'user.admin-menu-category.index', 'retailPRO', 'Portal', NULL, 25, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 11, 'Quản lý nhóm menu');
INSERT INTO `piospa_admin_feature` VALUES (43, 20, 'Tạo nhóm menu', NULL, 'user.admin-menu-category.create', 'retailPRO', 'Portal', NULL, 26, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 11, 'Quản lý nhóm menu');
INSERT INTO `piospa_admin_feature` VALUES (44, 20, 'Sửa nhóm menu', NULL, 'user.admin-menu-category.edit', 'retailPRO', 'Portal', NULL, 27, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 11, 'Quản lý nhóm menu');
INSERT INTO `piospa_admin_feature` VALUES (45, 20, 'Xóa nhóm menu', NULL, 'user.admin-menu-category.destroy', 'retailPRO', 'Portal', NULL, 28, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 11, 'Quản lý nhóm menu');
INSERT INTO `piospa_admin_feature` VALUES (46, 21, 'Danh sách đơn hàng', NULL, 'product.order', 'retailPRO', 'Portal', 'Danh sách đơn hàng', 29, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 12, 'Quản lý đơn hàng');
INSERT INTO `piospa_admin_feature` VALUES (47, 22, 'Danh sách giỏ hàng', NULL, 'product.cart', 'retailPRO', 'Portal', 'Danh sách giỏ hàng', 30, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 13, 'Quản lý giỏ hàng');
INSERT INTO `piospa_admin_feature` VALUES (48, 23, 'Sửa cài đặt thời gian nhận hàng', NULL, 'setting.time-receipt', 'retailPRO', 'Portal', '', 31, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 14, 'Quản lý thời gian nhận hàng');
INSERT INTO `piospa_admin_feature` VALUES (49, 24, 'Xem cài đặt thông báo tự động', NULL, 'config-notification', 'retailPRO', 'Portal', NULL, 32, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 15, 'Cài đặt notification tự động');
INSERT INTO `piospa_admin_feature` VALUES (50, 12, 'Xem cửa hàng kết nối', NULL, 'product.store.listStoreConnect', 'retailPRO', 'Portal', 'Thông tin cửa hàng kết nối', 34, 1, '2020-04-21 09:59:52', 0, '2020-04-21 09:59:52', 0, 3, 'Quản lý danh sách cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (51, 25, 'Danh sách thông báo', NULL, 'admin.notification', 'retailPRO', 'Portal', NULL, 35, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 16, 'Quản lý notification');
INSERT INTO `piospa_admin_feature` VALUES (52, 25, 'Tạo notiffication', NULL, 'admin.notification.create', 'retailPRO', 'Portal', NULL, 36, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 16, 'Quản lý notification');
INSERT INTO `piospa_admin_feature` VALUES (53, 25, 'Sửa notiffication', NULL, 'admin.notification.edit', 'retailPRO', 'Portal', NULL, 37, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 16, 'Quản lý notification');
INSERT INTO `piospa_admin_feature` VALUES (54, 25, 'Xóa notiffication', NULL, 'admin.notification.destroy', 'retailPRO', 'Portal', NULL, 38, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 16, 'Quản lý notification');
INSERT INTO `piospa_admin_feature` VALUES (55, 17, 'Giao quyền cho nhân viên', NULL, 'user.admin-group.add-user-into-group', 'retailPRO', 'Portal', NULL, 39, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 8, 'Quản lý nhóm quyền');
INSERT INTO `piospa_admin_feature` VALUES (56, 26, 'Xem nhóm cửa hàng', NULL, 'store.store-group', 'retailPRO', 'Portal', NULL, 40, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (57, 26, 'Tạo nhóm cửa hàng tự động', NULL, 'store.store-group.create-group-auto', 'retailPRO', 'Portal', NULL, 41, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (58, 26, 'Tạo nhóm cửa hàng tự định nghĩa', NULL, 'store.store-group.create-group-define', 'retailPRO', 'Portal', NULL, 42, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (59, 26, 'Sửa nhóm cửa hàng tự động', NULL, 'store.store-group.edit-auto', 'retailPRO', 'Portal', NULL, 43, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (60, 26, 'Sửa nhóm cửa hàng định nghĩa', NULL, 'store.store-group.edit-define', 'retailPRO', 'Portal', NULL, 44, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (61, 11, 'Duyệt sản phẩm', NULL, 'product.product.change-is-active', 'retailPRO', 'Portal', 'Duyệt sản phẩm', 47, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 2, 'Quản lý sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (62, 14, 'Tạo tài khoản brand portal', NULL, 'user.create', 'retailPRO', 'Portal', NULL, 48, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 5, 'Quản lý User brand portal');
INSERT INTO `piospa_admin_feature` VALUES (63, 14, 'Sửa tài khoản brand portal', NULL, 'user.edit', 'retailPRO', 'Portal', NULL, 49, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 5, 'Quản lý User brand portal');
INSERT INTO `piospa_admin_feature` VALUES (64, 24, 'Sửa cài đặt thông báo tự động', NULL, 'config-notification.save', 'retailPRO', 'Portal', NULL, 50, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 15, 'Cài đặt notification tự động');
INSERT INTO `piospa_admin_feature` VALUES (65, 14, 'Reset mật khẩu tài khoản brand portal', NULL, 'user.staging.update-password', 'retailPRO', 'Portal', NULL, 52, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 5, 'Quản lý User brand portal');
INSERT INTO `piospa_admin_feature` VALUES (66, 27, 'Danh sách nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.index', 'retailPRO', 'Portal', 'Danh sách nhóm nội dung hỗ trợ', 53, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 18, 'Cài đặt nhóm nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (67, 27, 'Tạo nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.create', 'retailPRO', 'Portal', NULL, 54, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 18, 'Cài đặt nhóm nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (68, 27, 'Sửa nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.edit', 'retailPRO', 'Portal', NULL, 55, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 18, 'Cài đặt nhóm nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (69, 27, 'Xóa nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.destroy', 'retailPRO', 'Portal', NULL, 56, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 18, 'Cài đặt nhóm nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (70, 28, 'Danh sách nội dung hỗ trợ', NULL, 'admin.faq.index', 'retailPRO', 'Portal', 'Danh sách nội dung hỗ trợ', 57, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 19, 'Cài đặt nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (71, 28, 'Tạo nội dung hỗ trợ', NULL, 'admin.faq.create', 'retailPRO', 'Portal', NULL, 58, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 19, 'Cài đặt nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (72, 28, 'Sửa nội dung hỗ trợ', NULL, 'admin.faq.edit', 'retailPRO', 'Portal', NULL, 59, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 19, 'Cài đặt nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (73, 28, 'Xóa nội dung hỗ trợ', NULL, 'admin.faq.destroy', 'retailPRO', 'Portal', NULL, 60, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 19, 'Cài đặt nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (74, 29, 'Xem thông tin hiển thị', NULL, 'page.banner', 'retailPRO', 'Portal', NULL, 61, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 20, 'Quản lý hiển thị');
INSERT INTO `piospa_admin_feature` VALUES (75, 29, 'Sửa thông tin hiển thị', NULL, 'page.banner.edit', 'retailPRO', 'Portal', NULL, 62, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 20, 'Quản lý hiển thị');
INSERT INTO `piospa_admin_feature` VALUES (76, 12, 'Hủy kết nối', NULL, 'product.store.cancel', 'retailPRO', 'Portal', NULL, 63, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 3, 'Quản lý danh sách cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (77, 30, 'Xem giới thiệu sản phẩm', NULL, 'product.catalog', 'retailPRO', 'Portal', NULL, 64, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 21, 'Quản lý giới thiệu sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (78, 30, 'Sửa giới thiệu sản phẩm', NULL, 'product.catalog.update', 'retailPRO', 'Portal', NULL, 65, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 21, 'Quản lý giới thiệu sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (79, 31, 'Chĩnh sửa cấu hình trang login', NULL, 'setting.config.edit', 'retailPRO', 'Portal', 'Chĩnh sửa cấu hình trang login', 66, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (80, 31, 'Xem chi tiết cấu hình trang login', NULL, 'setting.config.show', 'retailPRO', 'Portal', 'Xem chi tiết cấu hình trang login', 67, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (81, 31, 'Xem cấu hình trang login', NULL, 'setting.config.index', 'retailPRO', 'Portal', 'Xem cấu hình trang login', 68, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (82, 13, 'Báo cáo chương trình quà tặng sampling', NULL, 'product.sampling.report', 'retailPRO', 'Portal', 'Báo cáo chương trình quà tặng sampling', 69, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (83, 31, 'Cài đặt tích hợp O2O', NULL, 'product.sampling.config020', 'retailPRO', 'Portal', 'Cài đặt tích hợp O2O', 70, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (84, 13, 'Danh sách đăng ký nhận quà Sampling', NULL, 'product.sampling.index', 'retailPRO', 'Portal', 'Danh sách đăng ký nhận quà Sampling', 71, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (85, 13, 'Danh sách chương trình sampling ', NULL, 'brand.campaign-sampling', 'retailPRO', 'Portal', 'Danh sách chương trình sampling ', 72, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (86, 31, 'Cài đặt đặt hàng', NULL, 'setting.settingOrder.index', 'retailPRO', 'Portal', 'Cài đặt đặt hàng', 73, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (87, 31, 'Sửa Cài đặt đặt hàng', NULL, 'setting.settingOrder.edit', 'retailPRO', 'Portal', 'Sửa Cài đặt đặt hàng', 74, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (88, 31, 'Cài đặt kết nối điểm bán', NULL, 'setting.brand-config', 'retailPRO', 'Portal', 'Cài đặt kết nối điểm bán', 75, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (89, 32, 'Quản lý quốc gia', NULL, 'admin.country', 'retailPRO', 'Portal', 'Quản lý quốc gia', 76, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (90, 32, 'Quản lý tỉnh thành', NULL, 'admin.province', 'retailPRO', 'Portal', 'Quản lý tỉnh thành', 77, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (91, 32, 'Quản lý quận huyện', NULL, 'admin.district', 'retailPRO', 'Portal', 'Quản lý quận huyện', 78, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (92, 32, 'Quản lý phường xã', NULL, 'admin.ward', 'retailPRO', 'Portal', 'Quản lý phường xã', 79, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (93, 32, 'Xem chi tiêt quốc gia', NULL, 'admin.country.detail', 'retailPRO', 'Portal', 'Xem chi tiêt quốc gia', 80, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (94, 32, 'Xem chi tiêt Quận huyện', NULL, 'admin.district.detail', 'retailPRO', 'Portal', 'Xem chi tiêt Quận huyện', 81, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (95, 32, 'Xem chi tiết tỉnh thành', NULL, 'admin.province.detail', 'retailPRO', 'Portal', 'Xem chi tiết tỉnh thành', 82, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (96, 32, 'Xem chi tiết tỉnh thành', NULL, 'admin.province.detail', 'retailPRO', 'Portal', 'Xem chi tiết tỉnh thành', 83, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (97, 32, 'Xem chi tiết phường xã', NULL, 'admin.ward.detail', 'retailPRO', 'Portal', 'Xem chi tiết phường xã', 84, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (98, 26, 'Danh sách lịch sử cập nhật excel', NULL, 'brand.history-import-outlet', 'retailPRO', 'Portal', NULL, 85, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (99, 12, 'Hủy kết nối', NULL, 'product.store.cancel', 'retailPRO', 'Portal', NULL, 86, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 3, 'Quản lý danh sách cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (100, 30, 'Xem giới thiệu sản phẩm', NULL, 'product.catalog', 'retailPRO', 'Portal', NULL, 87, 1, '2020-04-21 10:00:05', 0, '2020-04-21 10:00:05', 0, 21, 'Quản lý giới thiệu sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (101, 30, 'Sửa giới thiệu sản phẩm', NULL, 'product.catalog.update', 'retailPRO', 'Portal', NULL, 88, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 21, 'Quản lý giới thiệu sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (102, 26, 'Danh sách yêu cầu kết nối', NULL, 'outlet.store-require.requires-connection', 'retailPRO', 'Portal', NULL, 89, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (103, 26, 'Tạo cửa hàng kết nối', NULL, 'product.store.create', 'retailPRO', 'Portal', NULL, 90, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (104, 26, 'Xem chi tiết cửa hàng kết nối', NULL, 'product.store.show', 'retailPRO', 'Portal', NULL, 91, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (105, 26, 'Sửa cửa hàng kết nối', NULL, 'product.store.edit', 'retailPRO', 'Portal', NULL, 92, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (106, 26, 'Cửa hàng yêu cầu kết nối Xem chi tiết', NULL, 'outlet.store-require.show', 'retailPRO', 'Portal', NULL, 93, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (107, 26, 'Cửa hàng yêu cầu kết nối Chỉ định kết nối', NULL, 'outlet.store-require.specify-connection', 'retailPRO', 'Portal', NULL, 94, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (108, 26, 'Cửa hàng yêu cầu kết nối Duyệt', NULL, 'outlet.store-require.approve', 'retailPRO', 'Portal', NULL, 95, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (109, 26, 'Cửa hàng yêu cầu kết nối Tạo lại yêu cầu', NULL, 'outlet.store-require.create-new-require', 'retailPRO', 'Portal', NULL, 96, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (110, 26, 'Cửa hàng yêu cầu kết nối Hủy', NULL, 'outlet.store-require.cancel', 'retailPRO', 'Portal', NULL, 97, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (111, 31, 'Danh sách loại ảnh', NULL, 'photos.index', 'retailPRO', 'Portal', NULL, 98, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (112, 31, 'Chi tiết loại ảnh', NULL, 'photos.show', 'retailPRO', 'Portal', NULL, 99, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (113, 31, 'Tạo loại ảnh', NULL, 'photos.create', 'retailPRO', 'Portal', NULL, 100, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (114, 31, 'Sửa loại ảnh', NULL, 'photos.edit', 'retailPRO', 'Portal', NULL, 101, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (115, 31, 'Danh sách yêu cầu ảnh', NULL, 'photos-definition.index', 'retailPRO', 'Portal', NULL, 102, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (116, 31, 'Chi tiết yêu cầu ảnh', NULL, 'photos-definition.show', 'retailPRO', 'Portal', NULL, 103, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (117, 31, 'Tạo yêu cầu ảnh', NULL, 'photos-definition.create', 'retailPRO', 'Portal', NULL, 104, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (118, 31, 'Sửa yêu cầu ảnh', NULL, 'photos-definition.edit', 'retailPRO', 'Portal', NULL, 105, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (119, 12, 'Xem mã kết nối', NULL, 'product.store.view-passcode', 'retailPRO', 'Portal', 'Xem mã cửa hàng kết nối', 106, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 3, 'Quản lý danh sách cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (120, 32, 'Quản lý vùng địa lý', NULL, 'admin.geo-area', 'retailPRO', 'Portal', 'Quản lý vùng địa lý', 107, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (121, 29, 'Danh sách landing page', NULL, 'page.landing-page', 'retailPRO', 'Portal', 'Danh sách landing page', 108, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 20, 'Quản lý hiển thị');
INSERT INTO `piospa_admin_feature` VALUES (122, 14, 'Chi tiết tài khoản', NULL, 'user.show', 'retailPRO', 'Portal', NULL, 109, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 5, 'Quản lý User brand portal');
INSERT INTO `piospa_admin_feature` VALUES (123, 17, 'Chi tiết nhóm quyền', NULL, 'user.admin-group.show', 'retailPRO', 'Portal', NULL, 110, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 8, 'Quản lý nhóm quyền');
INSERT INTO `piospa_admin_feature` VALUES (124, 19, 'Sửa quyền truy cập', NULL, 'user.admin-group-action.show', 'retailPRO', 'Portal', NULL, 111, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 10, 'Cài đặt quyền truy cập brand portal');
INSERT INTO `piospa_admin_feature` VALUES (125, 18, 'Chi tiết menu', NULL, 'user.admin-menu.show', 'retailPRO', 'Portal', NULL, 112, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 9, 'Cài đặt menu');
INSERT INTO `piospa_admin_feature` VALUES (126, 20, 'Chi tiết nhóm menu', NULL, 'user.admin-menu-category.show', 'retailPRO', 'Portal', 'Chi tiết nhóm menu', 113, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 11, 'Quản lý nhóm menu');
INSERT INTO `piospa_admin_feature` VALUES (127, 13, 'Tạo sản phẩm sampling ', NULL, 'product.product.create-sampling', 'retailPRO', 'Portal', 'Tạo sản phẩm sampling ', 114, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (128, 15, 'Chi tiết mục sản phẩm', NULL, 'product.product-category.show', 'retailPRO', 'Portal', 'Chi tiết mục sản phẩm', 115, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 6, 'Quản lý danh mục sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (129, 13, 'Chi tiết chương trình trade marketing', NULL, 'brand.campaign.show', 'retailPRO', 'Portal', 'Chi tiết chương trình trade marketing', 116, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (130, 13, 'Tạo chương trình sampling ', NULL, 'brand.campaign-sampling.create', 'retailPRO', 'Portal', 'Tạo chương trình sampling ', 117, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (131, 21, 'Chi tiết đơn hàng', NULL, 'product.order', 'retailPRO', 'Portal', 'Chi tiết đơn hàng', 118, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 12, 'Quản lý đơn hàng');
INSERT INTO `piospa_admin_feature` VALUES (132, 22, 'Chi tiết giỏ hàng', NULL, 'product.cart.show', 'retailPRO', 'Portal', 'Chi tiết giỏ hàng', 119, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 13, 'Quản lý giỏ hàng');
INSERT INTO `piospa_admin_feature` VALUES (133, 25, 'Chi tiết thông báo', NULL, 'admin.notification.detail', 'retailPRO', 'Portal', 'Chi tiết thông báo', 120, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 16, 'Quản lý notification');
INSERT INTO `piospa_admin_feature` VALUES (134, 27, 'Chi tiết nhóm nội dung hỗ trợ', NULL, 'admin.faq-group.show', 'retailPRO', 'Portal', 'Chi tiết nhóm nội dung hỗ trợ', 121, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 18, 'Cài đặt nhóm nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (135, 28, 'Chi tiết nội dung hỗ trợ', NULL, 'admin.faq.show', 'retailPRO', 'Portal', 'Chi tiết nội dung hỗ trợ', 122, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 19, 'Cài đặt nội dung hỗ trợ');
INSERT INTO `piospa_admin_feature` VALUES (136, 29, 'Chi tiết thông tin hiển thị', NULL, 'page.banner.show', 'retailPRO', 'Portal', NULL, 123, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 20, 'Quản lý hiển thị');
INSERT INTO `piospa_admin_feature` VALUES (137, 32, 'Tạo vùng địa lý', NULL, 'admin.geo-area.create', 'retailPRO', 'Portal', 'Tạo vùng địa lý', 124, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (138, 32, 'Chi tiết vùng địa lý', NULL, 'admin.geo-area.show', 'retailPRO', 'Portal', 'Chi tiết vùng địa lý', 125, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (139, 32, 'Sửa vùng địa lý', NULL, 'admin.geo-area.edit', 'retailPRO', 'Portal', 'Sửa vùng địa lý', 126, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (140, 32, 'Xóa vùng địa lý', NULL, 'admin.geo-area.destroy', 'retailPRO', 'Portal', 'Xóa vùng địa lý', 127, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 24, 'Quản lý vùng địa lý');
INSERT INTO `piospa_admin_feature` VALUES (141, 13, 'Sửa chương trình sampling ', NULL, 'brand.campaign-sampling.edit', 'retailPRO', 'Portal', 'Sửa chương trình sampling ', 128, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (142, 13, 'Chi tiết chương trình sampling ', NULL, 'brand.campaign-sampling.show', 'retailPRO', 'Portal', 'Chi tiết chương trình sampling ', 129, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (143, 11, 'Chi tiết sản phẩm', NULL, 'product.product.detail', 'retailPRO', 'Portal', 'Chi tiết sản phẩm', 130, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 2, 'Quản lý sản phẩm');
INSERT INTO `piospa_admin_feature` VALUES (144, 13, 'Chi tiết đăng ký nhận quà Sampling', NULL, 'product.sampling.detail', 'retailPRO', 'Portal', 'Chi tiết đăng ký nhận quà Sampling', 131, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (145, 26, 'Chi tiết cửa hàng tự định nghĩa', NULL, 'store.store-group.detail-define', 'retailPRO', 'Portal', 'Chi tiết cửa hàng tự định nghĩa', 132, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (146, 26, 'Chi tiết cửa hàng tự động', NULL, 'store.store-group.detail-auto', 'retailPRO', 'Portal', 'Chi tiết cửa hàng tự động', 133, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 17, 'Quản lý nhóm cửa hàng');
INSERT INTO `piospa_admin_feature` VALUES (147, 31, 'Sửa kết nối điểm bán', NULL, 'setting.brand-config.edit', 'retailPRO', 'Portal', 'Sửa kết nối điểm bán', 134, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (274, 29, 'Tạo landing page', NULL, 'page.landing-page.create', 'retailPRO', 'Portal', 'Tạo landing page', 135, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 20, '');
INSERT INTO `piospa_admin_feature` VALUES (275, 29, 'Sửa landing page', NULL, 'page.landing-page.edit', 'retailPRO', 'Portal', 'Sửa landing page', 136, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 20, '');
INSERT INTO `piospa_admin_feature` VALUES (276, 29, 'Chi tiết landing page', NULL, 'page.landing-page.show', 'retailPRO', 'Portal', 'Chi tiết landing page', 137, 1, '2020-04-21 10:00:17', 0, '2020-04-21 10:00:17', 0, 20, '');
INSERT INTO `piospa_admin_feature` VALUES (277, 16, 'Chi tiết giá bán', NULL, 'product.price-list.show', 'retailPRO', 'Portal', NULL, 138, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 7, 'Quản lý giá bán');
INSERT INTO `piospa_admin_feature` VALUES (278, 29, 'Sửa thông tin hiển silde product', NULL, 'page.product.edit', 'retailPRO', 'Portal', NULL, 139, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 20, 'Quản lý hiển thị');
INSERT INTO `piospa_admin_feature` VALUES (279, 29, 'Xem thông tin hiển silde product', NULL, 'page.product.show', 'retailPRO', 'Portal', NULL, 140, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 20, 'Quản lý hiển thị');
INSERT INTO `piospa_admin_feature` VALUES (280, 21, 'Chi tiết đơn hàng', NULL, 'product.order.show', 'retailPRO', 'Portal', 'Danh sách đơn hàng', 141, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 12, 'Quản lý đơn hàng');
INSERT INTO `piospa_admin_feature` VALUES (281, 13, 'Báo cáo Địa điểm phát quà tặng sampling', NULL, 'product.sampling.report-outlet', 'retailPRO', 'Portal', 'Báo cáo Địa điểm phát quà tặng sampling', 142, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 4, 'Quản lý chương trình Trade Marketing');
INSERT INTO `piospa_admin_feature` VALUES (282, 10, 'Thay đổi mật khẩu', NULL, 'admin.profile.change-password', 'retailPRO', 'Portal', 'Thay đổi mật khẩu', 144, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 1, 'Dashboard');
INSERT INTO `piospa_admin_feature` VALUES (283, 10, 'Thông tin cá nhân', NULL, 'admin.profile', 'retailPRO', 'Portal', 'Thông tin cá nhân', 143, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 1, 'Dashboard');
INSERT INTO `piospa_admin_feature` VALUES (284, 16, 'Cập nhật giá bán', NULL, 'product.price-list.update', 'retailPRO', 'Portal', 'Cập nhật giá bán', 145, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 7, 'Quản lý giá bán');
INSERT INTO `piospa_admin_feature` VALUES (285, 31, 'Danh sách báo cáo chụp ảnh', NULL, 'photos.report', 'retailPRO', 'Portal', 'Danh sách báo cáo chụp ảnh', 150, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (286, 31, 'Chi tiết báo cáo chụp ảnh', NULL, 'photos.report.detail', 'retailPRO', 'Portal', 'Danh sách báo cáo chụp ảnh', 151, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (287, 31, 'Cấu hình GEO-Fencing cho tất cả các cửa hàng', NULL, 'setting.photographic-distance', 'retailPRO', 'Portal', 'Danh sách báo cáo chụp ảnh', 152, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (288, 31, 'Cài đặt cập nhật tọa độ cửa hàng tự động', NULL, 'setting.update-coordinates', 'retailPRO', 'Portal', 'Danh sách báo cáo chụp ảnh', 153, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (289, 31, 'Sửa cấu hình GEO-Fencing cho tất cả các cửa hàng', NULL, 'setting.update-coordinates.edit', 'retailPRO', 'Portal', 'Sửa cấu hình GEO-Fencing cho tất cả các cửa hàng', 154, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 22, 'Cài đặt cấu hình');
INSERT INTO `piospa_admin_feature` VALUES (290, 31, 'Sửa cài đặt cập nhật tọa độ cửa hàng tự động', NULL, 'setting.update-coordinates.edit', 'retailPRO', 'Portal', 'Sửa cài đặt cập nhật tọa độ cửa hàng tự động', 155, 1, '0000-00-00 00:00:00', 0, '2020-04-18 15:43:19', 0, 22, 'Cài đặt cấu hình');

-- ----------------------------
-- Table structure for piospa_admin_feature_group
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_feature_group`;
CREATE TABLE `piospa_admin_feature_group`  (
  `feature_group_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhóm chức năng',
  `feature_group_name_vi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhóm chức năng - Tiếng việt',
  `feature_group_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhóm chức năng - Tiếng anh',
  `feature_group_name_redefine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên nhóm chức năng - định nghĩa lại',
  `description_short` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mô tả ngắn',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả',
  `is_actived` tinyint(1) NULL DEFAULT 1 COMMENT 'Trạng thái ',
  `created_at` datetime(0) NOT NULL COMMENT 'Thời điểm tạo',
  `created_by` int(11) NOT NULL COMMENT 'người tạo',
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Thời điểm cập nhật',
  `updated_by` int(11) NOT NULL COMMENT 'Người cập nhật ',
  PRIMARY KEY (`feature_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách nhóm chức năng - Master data' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of piospa_admin_feature_group
-- ----------------------------
INSERT INTO `piospa_admin_feature_group` VALUES (1, 'Danh sách chương trình khuyến mãi ', 'Trade marketing browsing', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (2, 'Danh sách sản phẩm ', 'Product browsing', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (3, 'Đặt hàng', 'Order ', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (4, 'Phát quà', 'Redemption', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (5, 'Chụp hình', 'Photo tracking', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (6, 'Bài viết', 'Article', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (7, 'Nhân viên hỗ trợ ', 'Support staff', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (8, 'Catalog', 'Catalog', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (9, 'Đăng ký chương trình khuyến mãi ', 'Register trade marketing', NULL, NULL, NULL, 1, '2020-04-21 10:00:27', 1, '2020-04-21 10:00:27', 1);
INSERT INTO `piospa_admin_feature_group` VALUES (10, 'Dashboard', '', 'Dashboard 01', 'Dashboard', 'Dashboard', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (11, 'Quản lý sản phẩm', '', 'Quản lý sản phẩm', 'Quản lý sản phẩm', 'Quản lý sản phẩm', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (12, 'Quản lý danh sách cửa hàng', '', 'Quản lý danh sách cửa hàng', 'Quản lý danh sách cửa hàng', 'Quản lý danh sách cửa hàng', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (13, 'Quản lý chương trình Trade Marketing', '', 'Quản lý chương trình Trade Marketing', 'Quản lý chương trình Trade Marketing', 'Quản lý chương trình Trade Marketing', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (14, 'Quản lý User brand portal', '', 'Quản lý User brand portal', 'Quản lý User brand portal', 'Quản lý User brand portal', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (15, 'Quản lý danh mục sản phẩm', '', 'Quản lý danh mục sản phẩm', 'Quản lý danh mục sản phẩm', 'Quản lý danh mục sản phẩm', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (16, 'Quản lý giá bán', '', 'Quản lý giá bán', 'Quản lý giá bán', 'Quản lý giá bán', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (17, 'Quản lý nhóm quyền', '', 'Quản lý nhóm quyền', 'Quản lý nhóm quyền', 'Quản lý nhóm quyền', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (18, 'Cài đặt menu', '', 'Cài đặt menu', 'Cài đặt menu', 'Cài đặt menu', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (19, 'Cài đặt quyền truy cập brand portal', '', 'Cài đặt quyền truy cập brand portal', 'Cài đặt quyền truy cập brand portal', 'Cài đặt quyền truy cập brand portal', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (20, 'Quản lý nhóm menu', '', 'Quản lý nhóm menu', 'Quản lý nhóm menu', 'Quản lý nhóm menu', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (21, 'Quản lý đơn hàng', '', 'Quản lý đơn hàng', 'Quản lý đơn hàng', 'Quản lý đơn hàng', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (22, 'Quản lý giỏ hàng', '', 'Quản lý giỏ hàng', 'Quản lý giỏ hàng', 'Quản lý giỏ hàng', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (23, 'Quản lý thời gian nhận hàng', '', 'Quản lý thời gian nhận hàng', 'Quản lý thời gian nhận hàng', 'Quản lý thời gian nhận hàng', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (24, 'Cài đặt notification tự động', '', 'Cài đặt notification tự động', 'Cài đặt notification tự động', 'Cài đặt notification tự động', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (25, 'Quản lý notification', '', 'Quản lý notification', 'Quản lý notification', 'Quản lý notification', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (26, 'Quản lý nhóm cửa hàng', '', 'Quản lý nhóm cửa hàng', 'Quản lý nhóm cửa hàng', 'Quản lý nhóm cửa hàng', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (27, 'Cài đặt nhóm nội dung hỗ trợ', '', 'Cài đặt nhóm nội dung hỗ trợ', 'Cài đặt nhóm nội dung hỗ trợ', 'Cài đặt nhóm nội dung hỗ trợ', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (28, 'Cài đặt nội dung hỗ trợ', '', 'Cài đặt nội dung hỗ trợ', 'Cài đặt nội dung hỗ trợ', 'Cài đặt nội dung hỗ trợ', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (29, 'Quản lý hiển thị', '', 'Quản lý hiển thị', 'Quản lý hiển thị', 'Quản lý hiển thị', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (30, 'Quản lý giới thiệu sản phẩm', '', 'Quản lý giới thiệu sản phẩm', 'Quản lý giới thiệu sản phẩm', 'Quản lý giới thiệu sản phẩm', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (31, 'Cài đặt cấu hình', '', 'Cài đặt cấu hình', 'Cài đặt cấu hình', 'Cài đặt cấu hình', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);
INSERT INTO `piospa_admin_feature_group` VALUES (32, 'Quản lý vùng địa lý', '', 'Quản lý vùng địa lý', 'Quản lý vùng địa lý', 'Quản lý vùng địa lý', 1, '2020-04-21 10:00:27', 0, '2020-04-21 10:00:27', 0);

-- ----------------------------
-- Table structure for piospa_admin_forgot_pass
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_forgot_pass`;
CREATE TABLE `piospa_admin_forgot_pass`  (
  `forget_pass_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `expire` datetime(0) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`forget_pass_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of piospa_admin_forgot_pass
-- ----------------------------
INSERT INTO `piospa_admin_forgot_pass` VALUES (1, 133, 'Vx34Roh0Z4KSwGlbdTBQmnFzYNl9A7CV', '2020-04-22 10:34:22', 0, '2020-04-21 10:34:22', '2020-04-21 10:39:05');
INSERT INTO `piospa_admin_forgot_pass` VALUES (2, 132, 'f0kvXqcYVQlWLVoxxaEraWzsuJHAA8yU', '2020-04-22 10:43:30', 0, '2020-04-21 10:43:30', '2020-04-21 10:44:36');
INSERT INTO `piospa_admin_forgot_pass` VALUES (3, 134, 'N9BBiWBCVLoVXIvdYNOu9EPIfZunVuhG', '2020-04-22 10:48:47', 1, '2020-04-21 10:48:47', '2020-04-21 10:48:47');
INSERT INTO `piospa_admin_forgot_pass` VALUES (4, 136, 'D5IpQ8qhaHVKsXUAUaXxCCUKgTiOZIB5', '2020-04-26 14:32:41', 1, '2020-04-25 14:32:41', '2020-04-25 14:32:41');

-- ----------------------------
-- Table structure for piospa_admin_group
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_group`;
CREATE TABLE `piospa_admin_group`  (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `group_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_group
-- ----------------------------
INSERT INTO `piospa_admin_group` VALUES (1, 'Quản lý quốc gia', 'Quản lý toàn bộ những gì thuộc quốc gia', 1, 1, NULL, 7, NULL, '2019-09-26 16:34:50');
INSERT INTO `piospa_admin_group` VALUES (2, 'Quản lý quận huyện', 'Quản lý toàn bộ những gì thuộc quận huyện', 1, 1, NULL, 7, NULL, '2019-09-11 09:28:24');
INSERT INTO `piospa_admin_group` VALUES (3, 'Group C', 'Group C', 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `piospa_admin_group` VALUES (4, 'Quản lý tỉnh thành', 'Quản lý toàn bộ những gì thuộc tỉnh thành', 1, 1, NULL, 7, NULL, '2019-09-11 09:26:54');
INSERT INTO `piospa_admin_group` VALUES (5, 'Chỉ quản lý tỉnh thành', 'Chỉ quản lý thêm xóa sửa tỉnh thành', 1, 1, NULL, 7, NULL, '2019-09-11 09:27:32');
INSERT INTO `piospa_admin_group` VALUES (6, 'Quản lý phường xã', 'Quản lý toàn bộ những gì thuộc phường xã', 1, 1, NULL, 7, NULL, '2019-09-11 09:29:59');
INSERT INTO `piospa_admin_group` VALUES (7, 'Chỉ quản lý phường xã  45555555555555555555555555555555555555555555555555555555555555555555555555555', 'Chỉ quản lý thêm, xóa, sửa phường xã', 1, 1, NULL, 7, NULL, '2019-10-10 16:53:15');
INSERT INTO `piospa_admin_group` VALUES (8, 'Group BBBB', 'Group BBBB', 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `piospa_admin_group` VALUES (9, 'Group CC', 'Group CC', 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `piospa_admin_group` VALUES (10, 'Group CCC', 'Group CCC', 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `piospa_admin_group` VALUES (11, 'Group CCCC', 'Group CCCC', 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `piospa_admin_group` VALUES (12, 'Group CCCCC', 'Group CCCCC', 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `piospa_admin_group` VALUES (13, 'Chỉ quản lý quốc gia', 'Chỉ quản lý thêm xóa sửa quốc gia', 1, 1, 2, 7, NULL, '2019-09-11 09:26:14');
INSERT INTO `piospa_admin_group` VALUES (14, 'Chỉ quản lý quận huyện', 'Chỉ quản lý thêm, xóa, sửa quận huyện', 1, 1, 2, 7, '2019-09-09 14:38:51', '2019-09-11 09:29:04');
INSERT INTO `piospa_admin_group` VALUES (15, 'Administratorrrrmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', 'Toàn quyềnrrr', 1, 1, 7, 7, '2019-09-10 12:33:07', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group` VALUES (16, 'Nhóm quyền test 1', '123123123', 1, 1, 7, 7, '2019-09-10 12:47:51', '2019-09-10 12:47:51');
INSERT INTO `piospa_admin_group` VALUES (17, 'Phuong Nam', NULL, 1, 1, 7, 7, '2019-09-22 16:19:23', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group` VALUES (18, 'Supper Admin', NULL, 1, 1, 7, 7, '2019-09-24 13:47:28', '2019-09-24 13:47:28');
INSERT INTO `piospa_admin_group` VALUES (19, 'Supper Admin', 'Admin', 1, 1, 7, 7, '2019-09-24 14:05:09', '2019-09-24 14:22:59');
INSERT INTO `piospa_admin_group` VALUES (20, '363906306i3kngkshgsd%@%^$&&$709u29052582nskjfnskjgbsjgbsjgnslgmcklvnjkgnsklg,sg,s\';
INSERT INTO `piospa_admin_group` VALUES (21, 'Supper Admin', 'Admin', 1, 1, 7, 7, '2019-09-24 15:09:59', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group` VALUES (22, 'Tên nhóm quyền vu ngo Tên nhóm quyền vu ngoTên nhóm quyền vu ngoTên nhóm quyền vu ngoTên nhóm quyền vu ngoTên nhóm quyền vu ngo', 'Tên nhóm quyền vu ngoTên nhóm quyền vu ngoTên nhóm quyền vu ngoTên nhóm quyền vu ngoTên nhóm quyền vu ngo', 1, 1, 7, 7, '2019-09-24 15:11:12', '2019-09-24 15:12:13');
INSERT INTO `piospa_admin_group` VALUES (23, 'G1', 'G1', 1, 1, 7, 7, '2019-09-24 17:17:06', '2019-09-24 17:17:06');
INSERT INTO `piospa_admin_group` VALUES (24, '1', '1', 1, 1, 7, 7, '2019-09-24 20:30:55', '2019-09-24 20:30:55');
INSERT INTO `piospa_admin_group` VALUES (25, 'G2', '', 1, 1, 7, 7, '2019-09-25 17:10:51', '2019-09-25 17:10:51');
INSERT INTO `piospa_admin_group` VALUES (26, 'CombinationGroup', 'CombinationGroup', 1, 1, 7, 7, '2019-09-26 14:54:46', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group` VALUES (27, 'SS', 'SS', 1, 1, 75, 75, '2019-09-26 15:49:43', '2019-09-26 15:49:43');
INSERT INTO `piospa_admin_group` VALUES (28, 'SuongGroup', 'SuongG', 1, 1, 75, 75, '2019-09-26 15:58:10', '2019-09-26 15:58:10');
INSERT INTO `piospa_admin_group` VALUES (29, 'SuongTest', 'SuongTest', 1, 1, 7, 7, '2019-09-26 16:04:03', '2019-09-27 09:55:12');
INSERT INTO `piospa_admin_group` VALUES (30, 'SuongQuocGiaGroup', 'SuongQuocGiaGroup', 1, 1, 86, 86, '2019-09-26 17:17:51', '2019-09-26 17:17:51');
INSERT INTO `piospa_admin_group` VALUES (31, 'SuongGroupNew', 'Suong', 1, 1, 86, 86, '2019-09-26 22:59:11', '2019-09-26 22:59:11');
INSERT INTO `piospa_admin_group` VALUES (32, 'QuyenCreateBySuongqcWithoutPermission', 'QuyenCr', 1, 1, 86, 86, '2019-09-27 09:46:36', '2019-09-27 09:46:36');
INSERT INTO `piospa_admin_group` VALUES (33, 'ViewPage', 'ViewPage', 1, 1, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group` VALUES (34, 'Chỉ xem user', 'Chỉ xem user', 1, 1, 7, 7, '2019-10-01 17:37:29', '2019-10-01 17:37:29');
INSERT INTO `piospa_admin_group` VALUES (35, 'Intern Shippppp', 'Thực tập sinh', 1, 1, 7, 7, '2019-10-03 11:48:34', '2019-10-03 11:48:57');
INSERT INTO `piospa_admin_group` VALUES (36, 'Presher', 'aa', 1, 1, 7, 7, '2019-10-08 06:48:15', '2019-10-08 06:48:15');
INSERT INTO `piospa_admin_group` VALUES (37, '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 'a', 1, 1, 7, 7, '2019-10-10 16:25:35', '2019-10-10 16:25:35');
INSERT INTO `piospa_admin_group` VALUES (38, 'Ngaan', 'Toàn quyề', 1, 1, 7, 7, '2019-10-10 16:36:32', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group` VALUES (39, 'Ngaannnn', 'Ngaan', 1, 1, 7, 7, '2019-10-10 16:36:56', '2019-10-10 16:36:56');
INSERT INTO `piospa_admin_group` VALUES (40, 'zxvbbnmjhđhhhjfdhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '', 1, 1, 7, 7, '2019-10-10 16:51:08', '2019-10-10 16:51:08');
INSERT INTO `piospa_admin_group` VALUES (41, 'aaaaa11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '', 1, 1, 7, 7, '2019-10-10 16:52:00', '2019-10-10 16:52:00');
INSERT INTO `piospa_admin_group` VALUES (42, 'Ngân test Nam', '', 1, 1, 7, 7, '2019-10-11 14:27:24', '2019-10-11 14:27:24');
INSERT INTO `piospa_admin_group` VALUES (43, 'Thành_Huyện', 'Chỉ xem thành, huyện', 1, 1, 7, 7, '2019-10-11 14:45:37', '2019-10-11 14:45:37');
INSERT INTO `piospa_admin_group` VALUES (44, 'Xã', '', 1, 1, 7, 7, '2019-10-11 15:04:39', '2019-10-11 15:04:39');
INSERT INTO `piospa_admin_group` VALUES (45, 'DSQG', '', 1, 1, 7, 7, '2019-10-11 15:09:47', '2019-10-11 15:09:47');
INSERT INTO `piospa_admin_group` VALUES (46, 'Chỉ xem menu', '', 1, 1, 7, 7, '2019-10-11 15:11:53', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group` VALUES (47, 'truy cập all', '', 1, 1, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group` VALUES (48, 'a', '', 1, 1, 7, 7, '2019-10-14 16:22:08', '2019-10-14 16:22:08');
INSERT INTO `piospa_admin_group` VALUES (49, 'a', '', 1, 1, 7, 7, '2019-10-14 16:52:18', '2019-10-14 16:52:18');
INSERT INTO `piospa_admin_group` VALUES (50, 'Thương hiệu', '', 1, 1, 7, 7, '2019-10-14 20:53:03', '2019-10-14 20:53:03');
INSERT INTO `piospa_admin_group` VALUES (51, 'Supper Admin Supper Admin', 'Supper Admin Supper Admin', 1, 1, 7, 7, '2019-10-15 21:04:04', '2019-10-15 21:04:04');
INSERT INTO `piospa_admin_group` VALUES (52, 'Admin', 'Admin', 1, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group` VALUES (53, 'Quản lý nhóm quyền', 'Quản lý nhóm quyền', 1, 1, 7, 115, '2019-10-17 09:44:39', '2019-10-17 09:45:59');
INSERT INTO `piospa_admin_group` VALUES (54, 'Cài đặt quyền truy cập backoffice', 'Cài đặt quyền truy cập backoffice', 1, 1, 7, 7, '2019-10-17 09:47:28', '2019-10-17 09:47:28');
INSERT INTO `piospa_admin_group` VALUES (55, 'Cài đặt menu', 'Cài đặt menu', 1, 1, 7, 7, '2019-10-17 09:56:13', '2019-10-17 09:56:13');
INSERT INTO `piospa_admin_group` VALUES (56, 'Quản lý User backoffice', 'Quản lý User backoffice', 1, 1, 7, 115, '2019-10-17 09:59:53', '2019-10-17 10:05:11');
INSERT INTO `piospa_admin_group` VALUES (57, 'Quản lý User app', 'Quản lý User app', 1, 1, 115, 7, '2019-10-17 10:08:51', '2019-10-18 16:08:38');
INSERT INTO `piospa_admin_group` VALUES (58, 'Quản lý thương hiệu', 'Quản lý thương hiệu', 1, 1, 115, 115, '2019-10-17 10:18:32', '2019-10-17 10:18:32');
INSERT INTO `piospa_admin_group` VALUES (59, 'Quản lý nhóm khách hàng', 'Quản lý nhóm khách hàng', 1, 1, 115, 115, '2019-10-17 10:22:11', '2019-10-17 10:32:15');
INSERT INTO `piospa_admin_group` VALUES (60, 'Quản lý notification', 'Quản lý notification', 1, 1, 115, 115, '2019-10-17 10:38:33', '2019-10-17 10:38:33');
INSERT INTO `piospa_admin_group` VALUES (61, 'Cài đặt nhóm nội dung hỗ trợ', 'Cài đặt nhóm nội dung hỗ trợ', 1, 1, 115, 115, '2019-10-17 10:41:11', '2019-10-17 10:41:11');
INSERT INTO `piospa_admin_group` VALUES (62, 'Cài đặt nội dung hỗ trợ', 'Cài đặt nội dung hỗ trợ', 1, 1, 115, 115, '2019-10-17 10:44:00', '2019-10-17 10:44:00');
INSERT INTO `piospa_admin_group` VALUES (63, 'Quản lý quốc gia, tỉnh thành, quận huyện, phường xã', 'Quản lý quốc gia, tỉnh thành, quận huyện, phường xã', 1, 1, 115, 7, '2019-10-17 10:46:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group` VALUES (64, 'Cài đặt static page', 'Cài đặt static page', 1, 1, 115, 115, '2019-10-17 11:18:01', '2019-10-17 11:18:01');
INSERT INTO `piospa_admin_group` VALUES (65, 'Linh', '', 1, 1, 7, 7, '2019-10-18 15:08:23', '2019-10-18 15:08:23');
INSERT INTO `piospa_admin_group` VALUES (66, 'QL user app', '', 1, 1, 7, 7, '2019-10-18 15:46:55', '2019-10-18 15:46:55');
INSERT INTO `piospa_admin_group` VALUES (67, 'QL user app', '', 1, 1, 7, 7, '2019-10-18 15:49:59', '2019-10-18 15:49:59');
INSERT INTO `piospa_admin_group` VALUES (68, 'QL tỉnh thành, quận huyện, phường xã', '', 1, 1, 7, 7, '2019-10-18 16:20:03', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group` VALUES (69, 'vund', 'vund', 1, 1, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group` VALUES (70, 'Quản lý thương hiệu', 'Quản lý thương hiệu', 1, 0, 7, 130, '2019-12-05 08:28:15', '2020-04-18 11:38:31');
INSERT INTO `piospa_admin_group` VALUES (71, 'Quản lý tài khoản', 'Quản lý tài khoản', 1, 0, 7, 130, '2019-12-05 08:29:24', '2020-04-18 11:39:47');
INSERT INTO `piospa_admin_group` VALUES (72, 'Quản lý quốc gia, tỉnh thành, quận huyện, phường xã', 'Quản lý quốc gia, tỉnh thành, quận huyện, phường xã', 1, 0, 7, 130, '2019-12-05 08:31:59', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group` VALUES (73, 'Quản lý nội dung hỗ trợ', 'Quản lý nội dung hỗ trợ', 1, 0, 7, 130, '2019-12-05 08:34:43', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group` VALUES (74, 'Quản lý notification', 'Quản lý notification', 1, 0, 7, 130, '2019-12-05 08:37:27', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group` VALUES (75, 'Quản lý phân quyền', 'Quản lý phân quyền', 1, 0, 7, 130, '2019-12-05 08:39:37', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group` VALUES (76, 'Quản lý thương hiệu 1', 'QLTH', 1, 0, 7, 7, '2020-04-21 09:07:48', '2020-04-21 09:07:48');
INSERT INTO `piospa_admin_group` VALUES (77, 'Quản lý tài khoản 1', 'Quản lý tài khoản', 1, 0, 7, 7, '2020-04-21 09:24:59', '2020-04-21 09:24:59');
INSERT INTO `piospa_admin_group` VALUES (78, 'Quản lý địa lý', 'Quản lý địa lý', 1, 0, 7, 7, '2020-04-21 09:40:19', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group` VALUES (79, 'Quản lý nội dung hỗ trợ 2', 'Quản lý nội dung hỗ trợ 2', 1, 0, 7, 7, '2020-04-21 09:42:42', '2020-04-21 09:42:42');
INSERT INTO `piospa_admin_group` VALUES (80, 'Quản lý cài đặt', 'Quản lý cài đặt', 1, 0, 7, 7, '2020-04-21 09:57:06', '2020-04-21 09:57:06');
INSERT INTO `piospa_admin_group` VALUES (81, 'Tham khảo', 'Tham khảo', 1, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group` VALUES (82, 'Nhóm quyền Vũ test', 'Nhóm quyền Vũ test', 1, 0, 7, 7, '2020-04-24 09:48:50', '2020-04-24 09:51:11');
INSERT INTO `piospa_admin_group` VALUES (83, 'Nhóm quyền quản lý tài khoản test', 'Nhóm quyền quản lý tài khoản test', 1, 0, 7, 7, '2020-04-25 11:18:20', '2020-04-25 11:35:06');
INSERT INTO `piospa_admin_group` VALUES (84, 'Nhóm quyền quản lý thương hiệu test', 'Nhóm quyền quản lý thương hiệu test', 1, 0, 7, 7, '2020-04-25 11:20:52', '2020-04-25 11:35:53');
INSERT INTO `piospa_admin_group` VALUES (85, 'Nhóm quyền quản lý địa chỉ test', 'Nhóm quyền quản lý địa chỉ test', 1, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group` VALUES (86, 'Nhóm quyền quản lý nội dung hỗ trợ test', 'Nhóm quyền quản lý nội dung hỗ trợ test', 1, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group` VALUES (87, 'Nhóm quyền quản lý notification test', 'Nhóm quyền quản lý notification test', 1, 0, 7, 7, '2020-04-25 11:40:01', '2020-04-25 11:40:01');
INSERT INTO `piospa_admin_group` VALUES (88, 'Nhóm quyền cài đặt test', 'Nhóm quyền cài đặt test', 1, 0, 7, 7, '2020-04-25 11:41:34', '2020-04-25 14:20:31');
INSERT INTO `piospa_admin_group` VALUES (89, 'Admin Test', 'Admin Test', 1, 1, 7, 7, '2020-04-25 13:38:25', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group` VALUES (90, 'vu test', 'vu test', 1, 1, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');

-- ----------------------------
-- Table structure for piospa_admin_group_action
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_group_action`;
CREATE TABLE `piospa_admin_group_action`  (
  `group_action_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NULL DEFAULT NULL,
  `action_id` int(11) NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`group_action_id`) USING BTREE,
  UNIQUE INDEX `group_id`(`group_id`, `action_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2077 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_group_action
-- ----------------------------
INSERT INTO `piospa_admin_group_action` VALUES (21, 13, 2, 0, 7, 7, '2019-09-11 09:26:14', '2019-09-11 09:26:14');
INSERT INTO `piospa_admin_group_action` VALUES (22, 13, 3, 0, 7, 7, '2019-09-11 09:26:14', '2019-09-11 09:26:14');
INSERT INTO `piospa_admin_group_action` VALUES (23, 13, 4, 0, 7, 7, '2019-09-11 09:26:14', '2019-09-11 09:26:14');
INSERT INTO `piospa_admin_group_action` VALUES (24, 5, 5, 0, 7, 7, '2019-09-11 09:27:32', '2019-09-11 09:27:32');
INSERT INTO `piospa_admin_group_action` VALUES (25, 5, 6, 0, 7, 7, '2019-09-11 09:27:32', '2019-09-11 09:27:32');
INSERT INTO `piospa_admin_group_action` VALUES (26, 5, 7, 0, 7, 7, '2019-09-11 09:27:32', '2019-09-11 09:27:32');
INSERT INTO `piospa_admin_group_action` VALUES (28, 14, 9, 0, 7, 7, '2019-09-11 09:29:04', '2019-09-11 09:29:04');
INSERT INTO `piospa_admin_group_action` VALUES (29, 14, 10, 0, 7, 7, '2019-09-11 09:29:04', '2019-09-11 09:29:04');
INSERT INTO `piospa_admin_group_action` VALUES (30, 14, 11, 0, 7, 7, '2019-09-11 09:29:04', '2019-09-11 09:29:04');
INSERT INTO `piospa_admin_group_action` VALUES (31, 14, 12, 0, 7, 7, '2019-09-11 09:29:04', '2019-09-11 09:29:04');
INSERT INTO `piospa_admin_group_action` VALUES (65, 13, 1, 0, 7, 7, '2019-09-13 14:03:10', '2019-09-13 14:03:10');
INSERT INTO `piospa_admin_group_action` VALUES (104, 17, 1, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (105, 17, 2, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (106, 17, 3, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (107, 17, 4, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (108, 17, 5, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (109, 17, 6, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (110, 17, 7, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (112, 17, 9, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (113, 17, 10, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (114, 17, 11, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (115, 17, 12, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (116, 17, 13, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (117, 17, 14, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (118, 17, 15, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (119, 17, 16, 0, 7, 7, '2019-09-22 16:26:00', '2019-09-22 16:26:00');
INSERT INTO `piospa_admin_group_action` VALUES (177, 19, 2, 0, 7, 7, '2019-09-24 14:22:59', '2019-09-24 14:22:59');
INSERT INTO `piospa_admin_group_action` VALUES (535, 26, 46, 0, 7, 7, '2019-09-26 15:28:04', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group_action` VALUES (536, 26, 47, 0, 7, 7, '2019-09-26 15:28:04', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group_action` VALUES (538, 26, 49, 0, 7, 7, '2019-09-26 15:28:04', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group_action` VALUES (541, 26, 54, 0, 7, 7, '2019-09-26 15:28:04', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group_action` VALUES (542, 26, 55, 0, 7, 7, '2019-09-26 15:28:04', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group_action` VALUES (543, 26, 56, 0, 7, 7, '2019-09-26 15:28:04', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group_action` VALUES (544, 26, 57, 0, 7, 7, '2019-09-26 15:28:04', '2019-09-26 15:28:04');
INSERT INTO `piospa_admin_group_action` VALUES (545, 21, 42, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (547, 21, 1, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (548, 21, 2, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (549, 21, 3, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (550, 21, 4, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (551, 21, 5, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (552, 21, 6, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (553, 21, 7, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (555, 21, 9, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (556, 21, 10, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (557, 21, 11, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (558, 21, 12, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (559, 21, 13, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (560, 21, 14, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (561, 21, 15, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (562, 21, 16, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (563, 21, 17, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (564, 21, 18, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (565, 21, 19, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (566, 21, 20, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (567, 21, 21, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (568, 21, 22, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (569, 21, 27, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (570, 21, 28, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (571, 21, 29, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (572, 21, 30, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (573, 21, 31, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (574, 21, 32, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (575, 21, 33, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (576, 21, 34, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (578, 21, 36, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (579, 21, 37, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (580, 21, 38, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (582, 21, 40, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (585, 21, 46, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (586, 21, 47, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (588, 21, 49, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (590, 21, 51, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (592, 21, 53, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (593, 21, 54, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (594, 21, 55, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (595, 21, 56, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (596, 21, 57, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (597, 21, 58, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (598, 21, 59, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (599, 21, 60, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (600, 21, 61, 0, 7, 7, '2019-09-26 15:45:37', '2019-09-26 15:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (671, 1, 1, 0, 7, 7, '2019-09-26 16:34:50', '2019-09-26 16:34:50');
INSERT INTO `piospa_admin_group_action` VALUES (1082, 29, 1, 0, 7, 7, '2019-09-27 09:55:12', '2019-09-27 09:55:12');
INSERT INTO `piospa_admin_group_action` VALUES (1083, 29, 2, 0, 7, 7, '2019-09-27 09:55:12', '2019-09-27 09:55:12');
INSERT INTO `piospa_admin_group_action` VALUES (1084, 33, 1, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1085, 33, 5, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1086, 33, 9, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1087, 33, 13, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1088, 33, 17, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1089, 33, 21, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1090, 33, 27, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1091, 33, 31, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1092, 33, 37, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1093, 33, 42, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1094, 33, 46, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1096, 33, 54, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1097, 33, 58, 0, 7, 7, '2019-09-27 09:56:42', '2019-09-27 09:56:42');
INSERT INTO `piospa_admin_group_action` VALUES (1099, 21, 50, 0, 7, 7, '2019-09-30 17:44:56', '2019-09-30 17:44:56');
INSERT INTO `piospa_admin_group_action` VALUES (1100, 26, 50, 0, 7, 7, '2019-09-30 17:44:56', '2019-09-30 17:44:56');
INSERT INTO `piospa_admin_group_action` VALUES (1101, 33, 50, 0, 7, 7, '2019-09-30 17:44:56', '2019-09-30 17:44:56');
INSERT INTO `piospa_admin_group_action` VALUES (1102, 34, 37, 0, 7, 7, '2019-10-01 17:37:29', '2019-10-01 17:37:29');
INSERT INTO `piospa_admin_group_action` VALUES (1105, 35, 2, 0, 7, 7, '2019-10-03 11:48:57', '2019-10-03 11:48:57');
INSERT INTO `piospa_admin_group_action` VALUES (1106, 35, 3, 0, 7, 7, '2019-10-03 11:48:57', '2019-10-03 11:48:57');
INSERT INTO `piospa_admin_group_action` VALUES (1113, 36, 6, 0, 7, 7, '2019-10-08 06:48:15', '2019-10-08 06:48:15');
INSERT INTO `piospa_admin_group_action` VALUES (1114, 36, 7, 0, 7, 7, '2019-10-08 06:48:15', '2019-10-08 06:48:15');
INSERT INTO `piospa_admin_group_action` VALUES (1168, 15, 1, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1169, 15, 2, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1170, 15, 3, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1171, 15, 4, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1172, 15, 5, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1173, 15, 6, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1174, 15, 7, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1176, 15, 9, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1177, 15, 10, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1178, 15, 11, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1179, 15, 12, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1180, 15, 13, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1181, 15, 14, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1182, 15, 15, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1183, 15, 16, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1184, 15, 17, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1185, 15, 18, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1186, 15, 19, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1187, 15, 20, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1188, 15, 21, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1189, 15, 22, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1190, 15, 27, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1191, 15, 28, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1192, 15, 29, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1193, 15, 30, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1194, 15, 31, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1195, 15, 32, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1196, 15, 33, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1197, 15, 34, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1199, 15, 36, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1200, 15, 37, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1201, 15, 38, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1203, 15, 40, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1205, 15, 42, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1208, 15, 46, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1209, 15, 47, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1211, 15, 49, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1212, 15, 50, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1213, 15, 51, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1215, 15, 53, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1216, 15, 54, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1217, 15, 55, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1218, 15, 56, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1219, 15, 57, 0, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_action` VALUES (1221, 38, 28, 0, 7, 7, '2019-10-10 16:45:52', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group_action` VALUES (1222, 38, 29, 0, 7, 7, '2019-10-10 16:45:52', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group_action` VALUES (1223, 38, 30, 0, 7, 7, '2019-10-10 16:45:52', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group_action` VALUES (1224, 38, 46, 0, 7, 7, '2019-10-10 16:45:52', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group_action` VALUES (1225, 38, 47, 0, 7, 7, '2019-10-10 16:45:52', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group_action` VALUES (1227, 38, 49, 0, 7, 7, '2019-10-10 16:45:52', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group_action` VALUES (1228, 7, 13, 0, 7, 7, '2019-10-10 16:53:15', '2019-10-10 16:53:15');
INSERT INTO `piospa_admin_group_action` VALUES (1229, 7, 14, 0, 7, 7, '2019-10-10 16:53:15', '2019-10-10 16:53:15');
INSERT INTO `piospa_admin_group_action` VALUES (1230, 7, 15, 0, 7, 7, '2019-10-10 16:53:15', '2019-10-10 16:53:15');
INSERT INTO `piospa_admin_group_action` VALUES (1231, 7, 16, 0, 7, 7, '2019-10-10 16:53:15', '2019-10-10 16:53:15');
INSERT INTO `piospa_admin_group_action` VALUES (1263, 42, 1, 0, 7, 7, '2019-10-11 14:27:24', '2019-10-11 14:27:24');
INSERT INTO `piospa_admin_group_action` VALUES (1264, 42, 5, 0, 7, 7, '2019-10-11 14:27:24', '2019-10-11 14:27:24');
INSERT INTO `piospa_admin_group_action` VALUES (1265, 42, 9, 0, 7, 7, '2019-10-11 14:27:24', '2019-10-11 14:27:24');
INSERT INTO `piospa_admin_group_action` VALUES (1266, 43, 1, 0, 7, 7, '2019-10-11 14:45:37', '2019-10-11 14:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (1267, 43, 5, 0, 7, 7, '2019-10-11 14:45:37', '2019-10-11 14:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (1268, 43, 9, 0, 7, 7, '2019-10-11 14:45:37', '2019-10-11 14:45:37');
INSERT INTO `piospa_admin_group_action` VALUES (1269, 44, 13, 0, 7, 7, '2019-10-11 15:04:39', '2019-10-11 15:04:39');
INSERT INTO `piospa_admin_group_action` VALUES (1270, 44, 14, 0, 7, 7, '2019-10-11 15:04:39', '2019-10-11 15:04:39');
INSERT INTO `piospa_admin_group_action` VALUES (1271, 44, 15, 0, 7, 7, '2019-10-11 15:04:39', '2019-10-11 15:04:39');
INSERT INTO `piospa_admin_group_action` VALUES (1272, 44, 16, 0, 7, 7, '2019-10-11 15:04:39', '2019-10-11 15:04:39');
INSERT INTO `piospa_admin_group_action` VALUES (1274, 47, 1, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1275, 47, 2, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1276, 47, 3, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1277, 47, 4, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1278, 47, 5, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1279, 47, 6, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1280, 47, 7, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1282, 47, 9, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1283, 47, 10, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1284, 47, 11, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1285, 47, 12, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1286, 47, 13, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1287, 47, 14, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1288, 47, 15, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1289, 47, 16, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1290, 47, 17, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1291, 47, 18, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1292, 47, 19, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1293, 47, 20, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1294, 47, 21, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1295, 47, 22, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1296, 47, 27, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1297, 47, 28, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1298, 47, 29, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1299, 47, 30, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1300, 47, 31, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1301, 47, 32, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1302, 47, 33, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1303, 47, 34, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1305, 47, 36, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1306, 47, 37, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1307, 47, 38, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1309, 47, 40, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1311, 47, 42, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1314, 47, 46, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1315, 47, 47, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1317, 47, 49, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1318, 47, 50, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1319, 47, 51, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1321, 47, 53, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1322, 47, 54, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1323, 47, 55, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1324, 47, 56, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1325, 47, 57, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1326, 47, 58, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1327, 47, 59, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1328, 47, 60, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1329, 47, 61, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1330, 47, 62, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1331, 47, 63, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1332, 47, 64, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1333, 47, 65, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1334, 47, 66, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1336, 47, 68, 0, 7, 7, '2019-10-11 15:40:19', '2019-10-11 15:40:19');
INSERT INTO `piospa_admin_group_action` VALUES (1337, 5, 8, 0, 7, 7, '2019-10-15 21:04:59', '2019-10-15 21:04:59');
INSERT INTO `piospa_admin_group_action` VALUES (1338, 15, 8, 0, 7, 7, '2019-10-15 21:04:59', '2019-10-15 21:04:59');
INSERT INTO `piospa_admin_group_action` VALUES (1339, 17, 8, 0, 7, 7, '2019-10-15 21:04:59', '2019-10-15 21:04:59');
INSERT INTO `piospa_admin_group_action` VALUES (1340, 21, 8, 0, 7, 7, '2019-10-15 21:04:59', '2019-10-15 21:04:59');
INSERT INTO `piospa_admin_group_action` VALUES (1341, 38, 8, 0, 7, 7, '2019-10-15 21:04:59', '2019-10-15 21:04:59');
INSERT INTO `piospa_admin_group_action` VALUES (1342, 47, 8, 0, 7, 7, '2019-10-15 21:04:59', '2019-10-15 21:04:59');
INSERT INTO `piospa_admin_group_action` VALUES (1343, 51, 8, 0, 7, 7, '2019-10-15 21:04:59', '2019-10-15 21:04:59');
INSERT INTO `piospa_admin_group_action` VALUES (1344, 52, 1, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1345, 52, 2, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1346, 52, 3, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1347, 52, 4, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1348, 52, 5, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1349, 52, 6, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1350, 52, 7, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1351, 52, 8, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1352, 52, 9, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1353, 52, 10, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1354, 52, 11, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1355, 52, 12, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1356, 52, 13, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1357, 52, 14, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1358, 52, 15, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1359, 52, 16, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1360, 52, 17, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1361, 52, 18, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1362, 52, 19, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1363, 52, 20, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1364, 52, 21, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1365, 52, 22, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1366, 52, 27, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1367, 52, 28, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1368, 52, 29, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1369, 52, 30, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1370, 52, 31, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1371, 52, 32, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1372, 52, 33, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1373, 52, 34, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1375, 52, 36, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1376, 52, 37, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1377, 52, 38, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1379, 52, 40, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1381, 52, 42, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1384, 52, 46, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1385, 52, 47, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1387, 52, 49, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1388, 52, 50, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1389, 52, 51, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1391, 52, 53, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1392, 52, 54, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1393, 52, 55, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1394, 52, 56, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1395, 52, 57, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1396, 52, 58, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1397, 52, 59, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1398, 52, 60, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1399, 52, 61, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1400, 52, 62, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1401, 52, 63, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1402, 52, 64, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1403, 52, 65, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1404, 52, 66, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1406, 52, 68, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1407, 52, 70, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1408, 52, 71, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1409, 52, 72, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1410, 52, 73, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (1414, 53, 17, 0, 115, 115, '2019-10-17 09:45:59', '2019-10-17 09:45:59');
INSERT INTO `piospa_admin_group_action` VALUES (1415, 53, 18, 0, 115, 115, '2019-10-17 09:45:59', '2019-10-17 09:45:59');
INSERT INTO `piospa_admin_group_action` VALUES (1416, 53, 19, 0, 115, 115, '2019-10-17 09:45:59', '2019-10-17 09:45:59');
INSERT INTO `piospa_admin_group_action` VALUES (1417, 53, 20, 0, 115, 115, '2019-10-17 09:45:59', '2019-10-17 09:45:59');
INSERT INTO `piospa_admin_group_action` VALUES (1418, 53, 66, 0, 115, 115, '2019-10-17 09:45:59', '2019-10-17 09:45:59');
INSERT INTO `piospa_admin_group_action` VALUES (1419, 54, 21, 0, 7, 7, '2019-10-17 09:47:28', '2019-10-17 09:47:28');
INSERT INTO `piospa_admin_group_action` VALUES (1420, 55, 27, 0, 7, 7, '2019-10-17 09:56:13', '2019-10-17 09:56:13');
INSERT INTO `piospa_admin_group_action` VALUES (1421, 55, 29, 0, 7, 7, '2019-10-17 09:56:13', '2019-10-17 09:56:13');
INSERT INTO `piospa_admin_group_action` VALUES (1422, 55, 62, 0, 7, 7, '2019-10-17 09:56:13', '2019-10-17 09:56:13');
INSERT INTO `piospa_admin_group_action` VALUES (1423, 55, 64, 0, 7, 7, '2019-10-17 09:56:13', '2019-10-17 09:56:13');
INSERT INTO `piospa_admin_group_action` VALUES (1431, 56, 37, 0, 115, 115, '2019-10-17 10:05:11', '2019-10-17 10:05:11');
INSERT INTO `piospa_admin_group_action` VALUES (1432, 56, 38, 0, 115, 115, '2019-10-17 10:05:11', '2019-10-17 10:05:11');
INSERT INTO `piospa_admin_group_action` VALUES (1435, 56, 40, 0, 115, 115, '2019-10-17 10:05:11', '2019-10-17 10:05:11');
INSERT INTO `piospa_admin_group_action` VALUES (1445, 58, 42, 0, 115, 115, '2019-10-17 10:18:32', '2019-10-17 10:18:32');
INSERT INTO `piospa_admin_group_action` VALUES (1453, 59, 68, 0, 115, 115, '2019-10-17 10:32:15', '2019-10-17 10:32:15');
INSERT INTO `piospa_admin_group_action` VALUES (1454, 59, 71, 0, 115, 115, '2019-10-17 10:32:15', '2019-10-17 10:32:15');
INSERT INTO `piospa_admin_group_action` VALUES (1455, 59, 72, 0, 115, 115, '2019-10-17 10:32:15', '2019-10-17 10:32:15');
INSERT INTO `piospa_admin_group_action` VALUES (1456, 60, 58, 0, 115, 115, '2019-10-17 10:38:33', '2019-10-17 10:38:33');
INSERT INTO `piospa_admin_group_action` VALUES (1457, 60, 59, 0, 115, 115, '2019-10-17 10:38:33', '2019-10-17 10:38:33');
INSERT INTO `piospa_admin_group_action` VALUES (1458, 60, 61, 0, 115, 115, '2019-10-17 10:38:33', '2019-10-17 10:38:33');
INSERT INTO `piospa_admin_group_action` VALUES (1459, 61, 46, 0, 115, 115, '2019-10-17 10:41:11', '2019-10-17 10:41:11');
INSERT INTO `piospa_admin_group_action` VALUES (1461, 62, 50, 0, 115, 115, '2019-10-17 10:44:00', '2019-10-17 10:44:00');
INSERT INTO `piospa_admin_group_action` VALUES (1462, 62, 53, 0, 115, 115, '2019-10-17 10:44:00', '2019-10-17 10:44:00');
INSERT INTO `piospa_admin_group_action` VALUES (1508, 64, 54, 0, 115, 115, '2019-10-17 11:18:01', '2019-10-17 11:18:01');
INSERT INTO `piospa_admin_group_action` VALUES (1509, 64, 55, 0, 115, 115, '2019-10-17 11:18:01', '2019-10-17 11:18:01');
INSERT INTO `piospa_admin_group_action` VALUES (1510, 64, 56, 0, 115, 115, '2019-10-17 11:18:01', '2019-10-17 11:18:01');
INSERT INTO `piospa_admin_group_action` VALUES (1511, 4, 67, 0, 7, 7, '2019-10-17 14:53:04', '2019-10-17 14:53:04');
INSERT INTO `piospa_admin_group_action` VALUES (1512, 5, 67, 0, 7, 7, '2019-10-17 14:53:04', '2019-10-17 14:53:04');
INSERT INTO `piospa_admin_group_action` VALUES (1513, 6, 67, 0, 7, 7, '2019-10-17 14:53:04', '2019-10-17 14:53:04');
INSERT INTO `piospa_admin_group_action` VALUES (1514, 13, 67, 0, 7, 7, '2019-10-17 14:53:04', '2019-10-17 14:53:04');
INSERT INTO `piospa_admin_group_action` VALUES (1515, 33, 67, 0, 7, 7, '2019-10-17 14:53:04', '2019-10-17 14:53:04');
INSERT INTO `piospa_admin_group_action` VALUES (1516, 47, 67, 0, 7, 7, '2019-10-17 14:53:04', '2019-10-17 14:53:04');
INSERT INTO `piospa_admin_group_action` VALUES (1517, 52, 67, 0, 7, 7, '2019-10-17 14:53:04', '2019-10-17 14:53:04');
INSERT INTO `piospa_admin_group_action` VALUES (1518, 65, 37, 0, 7, 7, '2019-10-18 15:08:23', '2019-10-18 15:08:23');
INSERT INTO `piospa_admin_group_action` VALUES (1519, 65, 38, 0, 7, 7, '2019-10-18 15:08:23', '2019-10-18 15:08:23');
INSERT INTO `piospa_admin_group_action` VALUES (1521, 65, 40, 0, 7, 7, '2019-10-18 15:08:23', '2019-10-18 15:08:23');
INSERT INTO `piospa_admin_group_action` VALUES (1523, 66, 31, 0, 7, 7, '2019-10-18 15:46:55', '2019-10-18 15:46:55');
INSERT INTO `piospa_admin_group_action` VALUES (1524, 66, 32, 0, 7, 7, '2019-10-18 15:46:55', '2019-10-18 15:46:55');
INSERT INTO `piospa_admin_group_action` VALUES (1525, 66, 34, 0, 7, 7, '2019-10-18 15:46:55', '2019-10-18 15:46:55');
INSERT INTO `piospa_admin_group_action` VALUES (1527, 66, 36, 0, 7, 7, '2019-10-18 15:46:55', '2019-10-18 15:46:55');
INSERT INTO `piospa_admin_group_action` VALUES (1528, 67, 31, 0, 7, 7, '2019-10-18 15:49:59', '2019-10-18 15:49:59');
INSERT INTO `piospa_admin_group_action` VALUES (1529, 67, 32, 0, 7, 7, '2019-10-18 15:49:59', '2019-10-18 15:49:59');
INSERT INTO `piospa_admin_group_action` VALUES (1530, 67, 34, 0, 7, 7, '2019-10-18 15:49:59', '2019-10-18 15:49:59');
INSERT INTO `piospa_admin_group_action` VALUES (1532, 67, 36, 0, 7, 7, '2019-10-18 15:49:59', '2019-10-18 15:49:59');
INSERT INTO `piospa_admin_group_action` VALUES (1533, 57, 31, 0, 7, 7, '2019-10-18 16:08:38', '2019-10-18 16:08:38');
INSERT INTO `piospa_admin_group_action` VALUES (1534, 57, 32, 0, 7, 7, '2019-10-18 16:08:38', '2019-10-18 16:08:38');
INSERT INTO `piospa_admin_group_action` VALUES (1535, 57, 34, 0, 7, 7, '2019-10-18 16:08:38', '2019-10-18 16:08:38');
INSERT INTO `piospa_admin_group_action` VALUES (1537, 57, 36, 0, 7, 7, '2019-10-18 16:08:38', '2019-10-18 16:08:38');
INSERT INTO `piospa_admin_group_action` VALUES (1538, 57, 33, 0, 7, 7, '2019-10-18 16:08:38', '2019-10-18 16:08:38');
INSERT INTO `piospa_admin_group_action` VALUES (1539, 68, 5, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1540, 68, 6, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1541, 68, 7, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1542, 68, 8, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1543, 68, 9, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1544, 68, 10, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1545, 68, 11, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1546, 68, 12, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1547, 68, 13, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1548, 68, 14, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1549, 68, 15, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1550, 68, 16, 0, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_action` VALUES (1551, 69, 1, 0, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_action` VALUES (1552, 69, 2, 0, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_action` VALUES (1553, 69, 3, 0, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_action` VALUES (1554, 69, 4, 0, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_action` VALUES (1555, 69, 5, 0, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_action` VALUES (1556, 69, 9, 0, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_action` VALUES (1578, 63, 1, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1579, 63, 2, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1580, 63, 4, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1581, 63, 5, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1582, 63, 9, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1583, 63, 11, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1584, 63, 12, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1585, 63, 13, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1586, 63, 14, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1587, 63, 15, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1588, 63, 16, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1589, 63, 3, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1590, 63, 6, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1591, 63, 7, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1592, 63, 8, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1593, 63, 10, 0, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_action` VALUES (1668, 70, 42, 0, 130, 130, '2020-04-18 11:38:31', '2020-04-18 11:38:31');
INSERT INTO `piospa_admin_group_action` VALUES (1671, 70, 74, 0, 130, 130, '2020-04-18 11:38:31', '2020-04-18 11:38:31');
INSERT INTO `piospa_admin_group_action` VALUES (1672, 71, 31, 0, 130, 130, '2020-04-18 11:39:47', '2020-04-18 11:39:47');
INSERT INTO `piospa_admin_group_action` VALUES (1673, 71, 32, 0, 130, 130, '2020-04-18 11:39:47', '2020-04-18 11:39:47');
INSERT INTO `piospa_admin_group_action` VALUES (1674, 71, 33, 0, 130, 130, '2020-04-18 11:39:47', '2020-04-18 11:39:47');
INSERT INTO `piospa_admin_group_action` VALUES (1676, 71, 36, 0, 130, 130, '2020-04-18 11:39:47', '2020-04-18 11:39:47');
INSERT INTO `piospa_admin_group_action` VALUES (1677, 71, 37, 0, 130, 130, '2020-04-18 11:39:47', '2020-04-18 11:39:47');
INSERT INTO `piospa_admin_group_action` VALUES (1678, 71, 38, 0, 130, 130, '2020-04-18 11:39:47', '2020-04-18 11:39:47');
INSERT INTO `piospa_admin_group_action` VALUES (1681, 75, 17, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1682, 75, 18, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1683, 75, 19, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1684, 75, 20, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1685, 75, 21, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1686, 75, 22, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1687, 75, 27, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1688, 75, 28, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1689, 75, 29, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1690, 75, 30, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1691, 75, 62, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1692, 75, 63, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1693, 75, 64, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1694, 75, 65, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1695, 75, 66, 0, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_action` VALUES (1696, 74, 58, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1697, 74, 59, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1698, 74, 60, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1699, 74, 67, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1700, 74, 68, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1701, 74, 70, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1702, 74, 71, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1703, 74, 72, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1704, 74, 73, 0, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_action` VALUES (1705, 73, 46, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1706, 73, 47, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1708, 73, 49, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1709, 73, 50, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1710, 73, 51, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1712, 73, 53, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1713, 73, 54, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1714, 73, 55, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1715, 73, 56, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1716, 73, 57, 0, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_action` VALUES (1717, 72, 1, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1718, 72, 2, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1719, 72, 3, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1720, 72, 4, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1721, 72, 5, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1722, 72, 6, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1723, 72, 7, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1724, 72, 8, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1725, 72, 9, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1726, 72, 10, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1727, 72, 11, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1728, 72, 12, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1729, 72, 13, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1730, 72, 14, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1731, 72, 15, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1732, 72, 16, 0, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_action` VALUES (1733, 15, 44, 0, 7, 7, '2020-04-21 09:09:35', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_group_action` VALUES (1734, 21, 44, 0, 7, 7, '2020-04-21 09:09:35', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_group_action` VALUES (1735, 47, 44, 0, 7, 7, '2020-04-21 09:09:35', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_group_action` VALUES (1736, 52, 44, 0, 7, 7, '2020-04-21 09:09:35', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_group_action` VALUES (1737, 58, 44, 0, 7, 7, '2020-04-21 09:09:35', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_group_action` VALUES (1738, 70, 44, 0, 7, 7, '2020-04-21 09:09:35', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_group_action` VALUES (1739, 76, 44, 0, 7, 7, '2020-04-21 09:09:35', '2020-04-21 09:09:35');
INSERT INTO `piospa_admin_group_action` VALUES (1740, 15, 43, 0, 7, 7, '2020-04-21 09:10:16', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_group_action` VALUES (1741, 21, 43, 0, 7, 7, '2020-04-21 09:10:16', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_group_action` VALUES (1742, 47, 43, 0, 7, 7, '2020-04-21 09:10:16', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_group_action` VALUES (1743, 52, 43, 0, 7, 7, '2020-04-21 09:10:16', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_group_action` VALUES (1744, 58, 43, 0, 7, 7, '2020-04-21 09:10:16', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_group_action` VALUES (1745, 70, 43, 0, 7, 7, '2020-04-21 09:10:16', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_group_action` VALUES (1746, 76, 43, 0, 7, 7, '2020-04-21 09:10:16', '2020-04-21 09:10:16');
INSERT INTO `piospa_admin_group_action` VALUES (1747, 15, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1748, 21, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1749, 47, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1750, 52, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1751, 56, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1752, 65, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1753, 71, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1754, 77, 41, 0, 7, 7, '2020-04-21 09:30:54', '2020-04-21 09:30:54');
INSERT INTO `piospa_admin_group_action` VALUES (1755, 15, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1756, 21, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1757, 47, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1758, 52, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1759, 57, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1760, 66, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1761, 67, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1762, 71, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1763, 77, 35, 0, 7, 7, '2020-04-21 09:31:26', '2020-04-21 09:31:26');
INSERT INTO `piospa_admin_group_action` VALUES (1764, 15, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1765, 21, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1766, 47, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1767, 52, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1768, 56, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1769, 65, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1770, 71, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1771, 77, 39, 0, 7, 7, '2020-04-21 09:32:03', '2020-04-21 09:32:03');
INSERT INTO `piospa_admin_group_action` VALUES (1781, 15, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1782, 21, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1783, 26, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1784, 38, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1785, 47, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1786, 52, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1787, 61, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1788, 73, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1789, 79, 48, 0, 7, 7, '2020-04-21 09:45:03', '2020-04-21 09:45:03');
INSERT INTO `piospa_admin_group_action` VALUES (1790, 15, 52, 0, 7, 7, '2020-04-21 09:45:39', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_group_action` VALUES (1791, 21, 52, 0, 7, 7, '2020-04-21 09:45:39', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_group_action` VALUES (1792, 26, 52, 0, 7, 7, '2020-04-21 09:45:39', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_group_action` VALUES (1793, 47, 52, 0, 7, 7, '2020-04-21 09:45:39', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_group_action` VALUES (1794, 52, 52, 0, 7, 7, '2020-04-21 09:45:39', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_group_action` VALUES (1795, 73, 52, 0, 7, 7, '2020-04-21 09:45:39', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_group_action` VALUES (1796, 79, 52, 0, 7, 7, '2020-04-21 09:45:39', '2020-04-21 09:45:39');
INSERT INTO `piospa_admin_group_action` VALUES (1797, 78, 1, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1798, 78, 2, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1799, 78, 3, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1800, 78, 4, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1801, 78, 5, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1802, 78, 6, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1803, 78, 7, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1804, 78, 8, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1805, 78, 9, 0, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_action` VALUES (1806, 81, 1, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1807, 81, 2, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1808, 81, 3, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1809, 81, 4, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1810, 81, 5, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1811, 81, 6, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1812, 81, 7, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1813, 81, 8, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1814, 81, 9, 0, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_action` VALUES (1820, 82, 68, 0, 7, 7, '2020-04-24 09:51:11', '2020-04-24 09:51:11');
INSERT INTO `piospa_admin_group_action` VALUES (1821, 84, 42, 0, 7, 7, '2020-04-25 11:35:53', '2020-04-25 11:35:53');
INSERT INTO `piospa_admin_group_action` VALUES (1822, 84, 43, 0, 7, 7, '2020-04-25 11:35:53', '2020-04-25 11:35:53');
INSERT INTO `piospa_admin_group_action` VALUES (1823, 84, 44, 0, 7, 7, '2020-04-25 11:35:53', '2020-04-25 11:35:53');
INSERT INTO `piospa_admin_group_action` VALUES (1824, 84, 74, 0, 7, 7, '2020-04-25 11:35:53', '2020-04-25 11:35:53');
INSERT INTO `piospa_admin_group_action` VALUES (1825, 85, 1, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1826, 85, 2, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1827, 85, 3, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1828, 85, 4, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1829, 85, 5, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1830, 85, 6, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1831, 85, 7, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1832, 85, 8, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1833, 85, 9, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1834, 85, 10, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1835, 85, 11, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1836, 85, 12, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1837, 85, 13, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1838, 85, 14, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1839, 85, 15, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1840, 85, 16, 0, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_action` VALUES (1841, 86, 46, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1842, 86, 47, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1843, 86, 48, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1844, 86, 49, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1845, 86, 50, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1846, 86, 51, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1847, 86, 52, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1848, 86, 53, 0, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_action` VALUES (1849, 87, 58, 0, 7, 7, '2020-04-25 11:40:01', '2020-04-25 11:40:01');
INSERT INTO `piospa_admin_group_action` VALUES (1850, 87, 59, 0, 7, 7, '2020-04-25 11:40:01', '2020-04-25 11:40:01');
INSERT INTO `piospa_admin_group_action` VALUES (1851, 87, 60, 0, 7, 7, '2020-04-25 11:40:01', '2020-04-25 11:40:01');
INSERT INTO `piospa_admin_group_action` VALUES (1852, 87, 61, 0, 7, 7, '2020-04-25 11:40:01', '2020-04-25 11:40:01');
INSERT INTO `piospa_admin_group_action` VALUES (1929, 89, 1, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1930, 89, 2, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1931, 89, 3, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1932, 89, 4, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1933, 89, 5, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1934, 89, 6, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1935, 89, 7, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1936, 89, 8, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1937, 89, 9, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1938, 89, 10, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1939, 89, 11, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1940, 89, 12, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1941, 89, 17, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1942, 89, 18, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1943, 89, 19, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1944, 89, 20, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1945, 89, 21, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1946, 89, 22, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1947, 89, 27, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1948, 89, 28, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1949, 89, 29, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1950, 89, 30, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1951, 89, 31, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1952, 89, 32, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1953, 89, 33, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1954, 89, 35, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1955, 89, 36, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1956, 89, 37, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1957, 89, 38, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1958, 89, 39, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1959, 89, 41, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1960, 89, 42, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1961, 89, 43, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1962, 89, 44, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1963, 89, 46, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1964, 89, 47, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1965, 89, 48, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1966, 89, 49, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1967, 89, 50, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1968, 89, 51, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1969, 89, 52, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1970, 89, 53, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1971, 89, 54, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1972, 89, 55, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1973, 89, 56, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1974, 89, 57, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1975, 89, 58, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1976, 89, 59, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1977, 89, 60, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1978, 89, 61, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1979, 89, 62, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1980, 89, 63, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1981, 89, 64, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1982, 89, 65, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1983, 89, 66, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1984, 89, 67, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1985, 89, 68, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1986, 89, 70, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1987, 89, 71, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1988, 89, 72, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1989, 89, 73, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1990, 89, 74, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1991, 89, 75, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1992, 89, 76, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1993, 89, 77, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1994, 89, 78, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1995, 89, 79, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (1996, 89, 80, 0, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_action` VALUES (2001, 88, 27, 0, 7, 7, '2020-04-25 14:20:31', '2020-04-25 14:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (2002, 88, 28, 0, 7, 7, '2020-04-25 14:20:31', '2020-04-25 14:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (2003, 88, 29, 0, 7, 7, '2020-04-25 14:20:31', '2020-04-25 14:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (2004, 88, 30, 0, 7, 7, '2020-04-25 14:20:31', '2020-04-25 14:20:31');
INSERT INTO `piospa_admin_group_action` VALUES (2005, 90, 1, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2006, 90, 2, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2007, 90, 3, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2008, 90, 4, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2009, 90, 5, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2010, 90, 6, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2011, 90, 7, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2012, 90, 8, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2013, 90, 9, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2014, 90, 10, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2015, 90, 11, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2016, 90, 12, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2017, 90, 13, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2018, 90, 14, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2019, 90, 15, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2020, 90, 16, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2021, 90, 17, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2022, 90, 18, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2023, 90, 19, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2024, 90, 20, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2025, 90, 21, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2026, 90, 22, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2027, 90, 27, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2028, 90, 28, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2029, 90, 29, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2030, 90, 30, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2031, 90, 31, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2032, 90, 32, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2033, 90, 33, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2034, 90, 35, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2035, 90, 36, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2036, 90, 37, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2037, 90, 38, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2038, 90, 39, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2039, 90, 41, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2040, 90, 42, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2041, 90, 43, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2042, 90, 44, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2043, 90, 46, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2044, 90, 47, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2045, 90, 48, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2046, 90, 49, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2047, 90, 50, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2048, 90, 51, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2049, 90, 52, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2050, 90, 53, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2051, 90, 54, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2052, 90, 55, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2053, 90, 56, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2054, 90, 57, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2055, 90, 58, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2056, 90, 59, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2057, 90, 60, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2058, 90, 61, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2059, 90, 62, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2060, 90, 63, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2061, 90, 64, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2062, 90, 65, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2063, 90, 66, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2064, 90, 67, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2065, 90, 68, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2066, 90, 70, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2067, 90, 71, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2068, 90, 72, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2069, 90, 73, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2070, 90, 74, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2071, 90, 75, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2072, 90, 76, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2073, 90, 77, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2074, 90, 78, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2075, 90, 79, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_action` VALUES (2076, 90, 80, 0, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');

-- ----------------------------
-- Table structure for piospa_admin_group_map
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_group_map`;
CREATE TABLE `piospa_admin_group_map`  (
  `group_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_parent_id` int(11) NULL DEFAULT NULL,
  `group_child_id` int(255) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`group_map_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for piospa_admin_group_menu
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_group_menu`;
CREATE TABLE `piospa_admin_group_menu`  (
  `group_menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `menu_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`group_menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 586 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_group_menu
-- ----------------------------
INSERT INTO `piospa_admin_group_menu` VALUES (202, 17, 3, 7, 7, '2019-10-07 21:13:56', '2019-10-07 21:13:56');
INSERT INTO `piospa_admin_group_menu` VALUES (204, 33, 3, 7, 7, '2019-10-07 21:13:56', '2019-10-07 21:13:56');
INSERT INTO `piospa_admin_group_menu` VALUES (205, 35, 3, 7, 7, '2019-10-07 21:13:56', '2019-10-07 21:13:56');
INSERT INTO `piospa_admin_group_menu` VALUES (206, 17, 4, 7, 7, '2019-10-07 21:14:12', '2019-10-07 21:14:12');
INSERT INTO `piospa_admin_group_menu` VALUES (208, 33, 4, 7, 7, '2019-10-07 21:14:12', '2019-10-07 21:14:12');
INSERT INTO `piospa_admin_group_menu` VALUES (209, 35, 4, 7, 7, '2019-10-07 21:14:12', '2019-10-07 21:14:12');
INSERT INTO `piospa_admin_group_menu` VALUES (267, 33, 10, 7, 7, '2019-10-08 10:28:30', '2019-10-08 10:28:30');
INSERT INTO `piospa_admin_group_menu` VALUES (268, 17, 11, 7, 7, '2019-10-08 10:28:37', '2019-10-08 10:28:37');
INSERT INTO `piospa_admin_group_menu` VALUES (270, 33, 11, 7, 7, '2019-10-08 10:28:37', '2019-10-08 10:28:37');
INSERT INTO `piospa_admin_group_menu` VALUES (272, 33, 15, 7, 7, '2019-10-08 10:34:20', '2019-10-08 10:34:20');
INSERT INTO `piospa_admin_group_menu` VALUES (275, 33, 17, 7, 7, '2019-10-08 10:35:09', '2019-10-08 10:35:09');
INSERT INTO `piospa_admin_group_menu` VALUES (276, 33, 18, 7, 7, '2019-10-08 10:36:03', '2019-10-08 10:36:03');
INSERT INTO `piospa_admin_group_menu` VALUES (291, 15, 3, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_menu` VALUES (292, 15, 4, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_menu` VALUES (298, 15, 10, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_menu` VALUES (299, 15, 11, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_menu` VALUES (300, 15, 15, 7, 7, '2019-10-10 16:42:02', '2019-10-10 16:42:02');
INSERT INTO `piospa_admin_group_menu` VALUES (302, 38, 10, 7, 7, '2019-10-10 16:45:52', '2019-10-10 16:45:52');
INSERT INTO `piospa_admin_group_menu` VALUES (303, 5, 27, 7, 7, '2019-10-10 17:39:56', '2019-10-10 17:39:56');
INSERT INTO `piospa_admin_group_menu` VALUES (304, 6, 27, 7, 7, '2019-10-10 17:39:56', '2019-10-10 17:39:56');
INSERT INTO `piospa_admin_group_menu` VALUES (305, 13, 27, 7, 7, '2019-10-10 17:39:56', '2019-10-10 17:39:56');
INSERT INTO `piospa_admin_group_menu` VALUES (306, 14, 27, 7, 7, '2019-10-10 17:39:56', '2019-10-10 17:39:56');
INSERT INTO `piospa_admin_group_menu` VALUES (307, 13, 1, 7, 7, '2019-10-10 17:46:40', '2019-10-10 17:46:40');
INSERT INTO `piospa_admin_group_menu` VALUES (308, 17, 1, 7, 7, '2019-10-10 17:46:40', '2019-10-10 17:46:40');
INSERT INTO `piospa_admin_group_menu` VALUES (309, 1, 1, 7, 7, '2019-10-10 17:46:40', '2019-10-10 17:46:40');
INSERT INTO `piospa_admin_group_menu` VALUES (310, 29, 1, 7, 7, '2019-10-10 17:46:40', '2019-10-10 17:46:40');
INSERT INTO `piospa_admin_group_menu` VALUES (311, 33, 1, 7, 7, '2019-10-10 17:46:40', '2019-10-10 17:46:40');
INSERT INTO `piospa_admin_group_menu` VALUES (312, 17, 2, 7, 7, '2019-10-10 17:59:35', '2019-10-10 17:59:35');
INSERT INTO `piospa_admin_group_menu` VALUES (313, 33, 2, 7, 7, '2019-10-10 17:59:35', '2019-10-10 17:59:35');
INSERT INTO `piospa_admin_group_menu` VALUES (314, 22, 2, 7, 7, '2019-10-10 17:59:35', '2019-10-10 17:59:35');
INSERT INTO `piospa_admin_group_menu` VALUES (315, 42, 2, 7, 7, '2019-10-11 14:27:24', '2019-10-11 14:27:24');
INSERT INTO `piospa_admin_group_menu` VALUES (316, 42, 3, 7, 7, '2019-10-11 14:27:24', '2019-10-11 14:27:24');
INSERT INTO `piospa_admin_group_menu` VALUES (317, 43, 2, 7, 7, '2019-10-11 14:45:37', '2019-10-11 14:45:37');
INSERT INTO `piospa_admin_group_menu` VALUES (318, 43, 3, 7, 7, '2019-10-11 14:45:37', '2019-10-11 14:45:37');
INSERT INTO `piospa_admin_group_menu` VALUES (319, 44, 4, 7, 7, '2019-10-11 15:04:39', '2019-10-11 15:04:39');
INSERT INTO `piospa_admin_group_menu` VALUES (320, 44, 11, 7, 7, '2019-10-11 15:04:39', '2019-10-11 15:04:39');
INSERT INTO `piospa_admin_group_menu` VALUES (321, 45, 2, 7, 7, '2019-10-11 15:09:47', '2019-10-11 15:09:47');
INSERT INTO `piospa_admin_group_menu` VALUES (357, 46, 15, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (358, 46, 18, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (359, 46, 2, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (360, 46, 10, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (362, 46, 3, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (363, 46, 17, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (364, 46, 23, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (365, 46, 4, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (366, 46, 11, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (369, 46, 21, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (370, 46, 22, 7, 7, '2019-10-11 15:17:45', '2019-10-11 15:17:45');
INSERT INTO `piospa_admin_group_menu` VALUES (375, 6, 41, 7, 7, '2019-10-14 20:32:56', '2019-10-14 20:32:56');
INSERT INTO `piospa_admin_group_menu` VALUES (376, 5, 41, 7, 7, '2019-10-14 20:32:56', '2019-10-14 20:32:56');
INSERT INTO `piospa_admin_group_menu` VALUES (377, 13, 41, 7, 7, '2019-10-14 20:32:56', '2019-10-14 20:32:56');
INSERT INTO `piospa_admin_group_menu` VALUES (381, 52, 15, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (382, 52, 18, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (383, 52, 35, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (384, 52, 2, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (385, 52, 10, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (387, 52, 3, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (388, 52, 17, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (389, 52, 23, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (390, 52, 4, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (391, 52, 11, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (394, 52, 21, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (395, 52, 22, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (398, 54, 10, 7, 7, '2019-10-17 09:47:28', '2019-10-17 09:47:28');
INSERT INTO `piospa_admin_group_menu` VALUES (399, 55, 23, 7, 7, '2019-10-17 09:56:13', '2019-10-17 09:56:13');
INSERT INTO `piospa_admin_group_menu` VALUES (400, 55, 11, 7, 7, '2019-10-17 09:56:13', '2019-10-17 09:56:13');
INSERT INTO `piospa_admin_group_menu` VALUES (408, 59, 21, 115, 115, '2019-10-17 10:32:15', '2019-10-17 10:32:15');
INSERT INTO `piospa_admin_group_menu` VALUES (409, 60, 18, 115, 115, '2019-10-17 10:38:33', '2019-10-17 10:38:33');
INSERT INTO `piospa_admin_group_menu` VALUES (410, 61, 15, 115, 115, '2019-10-17 10:41:11', '2019-10-17 10:41:11');
INSERT INTO `piospa_admin_group_menu` VALUES (428, 64, 17, 115, 115, '2019-10-17 11:18:01', '2019-10-17 11:18:01');
INSERT INTO `piospa_admin_group_menu` VALUES (433, 68, 2, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_menu` VALUES (434, 68, 3, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_menu` VALUES (435, 68, 4, 7, 7, '2019-10-18 16:23:35', '2019-10-18 16:23:35');
INSERT INTO `piospa_admin_group_menu` VALUES (437, 69, 35, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_menu` VALUES (438, 69, 2, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_group_menu` VALUES (447, 63, 35, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_menu` VALUES (448, 63, 2, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_menu` VALUES (449, 63, 3, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_menu` VALUES (450, 63, 4, 7, 7, '2019-11-22 14:58:44', '2019-11-22 14:58:44');
INSERT INTO `piospa_admin_group_menu` VALUES (475, 75, 10, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_menu` VALUES (476, 75, 23, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_menu` VALUES (477, 75, 11, 130, 130, '2020-04-18 11:40:45', '2020-04-18 11:40:45');
INSERT INTO `piospa_admin_group_menu` VALUES (478, 74, 18, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_menu` VALUES (479, 74, 21, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_menu` VALUES (480, 74, 22, 130, 130, '2020-04-18 11:41:18', '2020-04-18 11:41:18');
INSERT INTO `piospa_admin_group_menu` VALUES (481, 73, 15, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_menu` VALUES (483, 73, 17, 130, 130, '2020-04-18 11:42:25', '2020-04-18 11:42:25');
INSERT INTO `piospa_admin_group_menu` VALUES (484, 72, 35, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_menu` VALUES (485, 72, 2, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_menu` VALUES (486, 72, 3, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_menu` VALUES (487, 72, 4, 130, 130, '2020-04-18 11:42:49', '2020-04-18 11:42:49');
INSERT INTO `piospa_admin_group_menu` VALUES (489, 52, 8, 7, 7, '2020-04-21 09:29:35', '2020-04-21 09:29:35');
INSERT INTO `piospa_admin_group_menu` VALUES (490, 71, 8, 7, 7, '2020-04-21 09:29:35', '2020-04-21 09:29:35');
INSERT INTO `piospa_admin_group_menu` VALUES (491, 77, 8, 7, 7, '2020-04-21 09:29:35', '2020-04-21 09:29:35');
INSERT INTO `piospa_admin_group_menu` VALUES (492, 52, 6, 7, 7, '2020-04-21 09:30:07', '2020-04-21 09:30:07');
INSERT INTO `piospa_admin_group_menu` VALUES (493, 71, 6, 7, 7, '2020-04-21 09:30:07', '2020-04-21 09:30:07');
INSERT INTO `piospa_admin_group_menu` VALUES (494, 77, 6, 7, 7, '2020-04-21 09:30:07', '2020-04-21 09:30:07');
INSERT INTO `piospa_admin_group_menu` VALUES (497, 79, 15, 7, 7, '2020-04-21 09:42:42', '2020-04-21 09:42:42');
INSERT INTO `piospa_admin_group_menu` VALUES (498, 52, 16, 7, 7, '2020-04-21 09:44:18', '2020-04-21 09:44:18');
INSERT INTO `piospa_admin_group_menu` VALUES (499, 73, 16, 7, 7, '2020-04-21 09:44:18', '2020-04-21 09:44:18');
INSERT INTO `piospa_admin_group_menu` VALUES (500, 79, 16, 7, 7, '2020-04-21 09:44:18', '2020-04-21 09:44:18');
INSERT INTO `piospa_admin_group_menu` VALUES (501, 52, 5, 7, 7, '2020-04-21 09:59:40', '2020-04-21 09:59:40');
INSERT INTO `piospa_admin_group_menu` VALUES (502, 75, 5, 7, 7, '2020-04-21 09:59:40', '2020-04-21 09:59:40');
INSERT INTO `piospa_admin_group_menu` VALUES (503, 76, 5, 7, 7, '2020-04-21 09:59:40', '2020-04-21 09:59:40');
INSERT INTO `piospa_admin_group_menu` VALUES (504, 80, 5, 7, 7, '2020-04-21 09:59:40', '2020-04-21 09:59:40');
INSERT INTO `piospa_admin_group_menu` VALUES (505, 78, 35, 7, 7, '2020-04-21 10:10:37', '2020-04-21 10:10:37');
INSERT INTO `piospa_admin_group_menu` VALUES (506, 72, 49, 7, 7, '2020-04-21 10:17:05', '2020-04-21 10:17:05');
INSERT INTO `piospa_admin_group_menu` VALUES (507, 81, 49, 7, 7, '2020-04-21 10:18:40', '2020-04-21 10:18:40');
INSERT INTO `piospa_admin_group_menu` VALUES (509, 82, 21, 7, 7, '2020-04-24 09:51:11', '2020-04-24 09:51:11');
INSERT INTO `piospa_admin_group_menu` VALUES (511, 83, 6, 7, 7, '2020-04-25 11:35:06', '2020-04-25 11:35:06');
INSERT INTO `piospa_admin_group_menu` VALUES (513, 85, 35, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_menu` VALUES (514, 85, 2, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_menu` VALUES (515, 85, 3, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_menu` VALUES (516, 85, 4, 7, 7, '2020-04-25 11:37:38', '2020-04-25 11:37:38');
INSERT INTO `piospa_admin_group_menu` VALUES (517, 86, 15, 7, 7, '2020-04-25 11:38:54', '2020-04-25 11:38:54');
INSERT INTO `piospa_admin_group_menu` VALUES (518, 87, 18, 7, 7, '2020-04-25 11:40:01', '2020-04-25 11:40:01');
INSERT INTO `piospa_admin_group_menu` VALUES (540, 89, 5, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (542, 89, 15, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (543, 89, 18, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (544, 89, 35, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (545, 89, 47, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (546, 89, 48, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (547, 89, 50, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (548, 89, 2, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (549, 89, 10, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (550, 89, 16, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (551, 89, 3, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (552, 89, 17, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (553, 89, 23, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (554, 89, 11, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (555, 89, 6, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (556, 89, 8, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (557, 89, 21, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (558, 89, 22, 7, 7, '2020-04-25 13:40:28', '2020-04-25 13:40:28');
INSERT INTO `piospa_admin_group_menu` VALUES (559, 88, 11, 7, 7, '2020-04-25 14:20:31', '2020-04-25 14:20:31');
INSERT INTO `piospa_admin_group_menu` VALUES (560, 90, 5, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (562, 90, 15, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (563, 90, 18, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (564, 90, 35, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (565, 90, 47, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (566, 90, 48, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (567, 90, 50, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (568, 90, 2, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (569, 90, 10, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (570, 90, 16, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (571, 90, 3, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (572, 90, 17, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (573, 90, 23, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (574, 90, 4, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (575, 90, 11, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (576, 90, 6, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (577, 90, 8, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (578, 90, 21, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (579, 90, 22, 7, 7, '2020-04-25 15:53:33', '2020-04-25 15:53:33');
INSERT INTO `piospa_admin_group_menu` VALUES (583, 52, 14, 7, 7, '2020-04-27 16:42:01', '2020-04-27 16:42:01');
INSERT INTO `piospa_admin_group_menu` VALUES (584, 70, 14, 7, 7, '2020-04-27 16:42:01', '2020-04-27 16:42:01');
INSERT INTO `piospa_admin_group_menu` VALUES (585, 84, 14, 7, 7, '2020-04-27 16:42:01', '2020-04-27 16:42:01');

-- ----------------------------
-- Table structure for piospa_admin_has_group
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_has_group`;
CREATE TABLE `piospa_admin_has_group`  (
  `admin_has_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NULL DEFAULT NULL,
  `group_id` int(11) NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`admin_has_group_id`) USING BTREE,
  UNIQUE INDEX `admin_id`(`admin_id`, `group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 833 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_has_group
-- ----------------------------
INSERT INTO `piospa_admin_has_group` VALUES (634, 97, 13, 0, 7, 7, '2019-10-03 10:28:31', '2019-10-03 10:28:31');
INSERT INTO `piospa_admin_has_group` VALUES (635, 97, 15, 0, 7, 7, '2019-10-03 10:28:31', '2019-10-03 10:28:31');
INSERT INTO `piospa_admin_has_group` VALUES (637, 97, 35, 0, 7, 7, '2019-10-03 11:48:57', '2019-10-03 11:48:57');
INSERT INTO `piospa_admin_has_group` VALUES (638, 96, 38, 0, 7, 7, '2019-10-10 16:36:32', '2019-10-10 16:36:32');
INSERT INTO `piospa_admin_has_group` VALUES (639, 7, 14, 0, 7, 7, '2019-10-10 16:55:40', '2019-10-10 16:55:40');
INSERT INTO `piospa_admin_has_group` VALUES (640, 96, 14, 0, 7, 7, '2019-10-10 16:55:40', '2019-10-10 16:55:40');
INSERT INTO `piospa_admin_has_group` VALUES (641, 97, 14, 0, 7, 7, '2019-10-10 16:55:40', '2019-10-10 16:55:40');
INSERT INTO `piospa_admin_has_group` VALUES (642, 98, 14, 0, 7, 7, '2019-10-10 16:55:40', '2019-10-10 16:55:40');
INSERT INTO `piospa_admin_has_group` VALUES (643, 100, 14, 0, 7, 7, '2019-10-10 16:55:40', '2019-10-10 16:55:40');
INSERT INTO `piospa_admin_has_group` VALUES (644, 102, 14, 0, 7, 7, '2019-10-10 16:55:40', '2019-10-10 16:55:40');
INSERT INTO `piospa_admin_has_group` VALUES (645, 102, 42, 0, 7, 7, '2019-10-11 14:27:24', '2019-10-11 14:27:24');
INSERT INTO `piospa_admin_has_group` VALUES (646, 106, 1, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (647, 106, 2, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (648, 106, 4, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (649, 106, 5, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (650, 106, 6, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (651, 106, 13, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (652, 106, 14, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (653, 106, 17, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (654, 106, 22, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (655, 106, 29, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (656, 106, 30, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (657, 106, 32, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (658, 106, 33, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (659, 106, 34, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (660, 106, 35, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (661, 106, 36, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (662, 106, 38, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (663, 106, 39, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (664, 106, 42, 0, 7, 7, '2019-10-11 14:44:07', '2019-10-11 14:44:07');
INSERT INTO `piospa_admin_has_group` VALUES (665, 97, 43, 0, 7, 7, '2019-10-11 14:45:37', '2019-10-11 14:45:37');
INSERT INTO `piospa_admin_has_group` VALUES (674, 109, 2, 0, 7, 7, '2019-10-16 14:24:53', '2019-10-16 14:24:53');
INSERT INTO `piospa_admin_has_group` VALUES (675, 109, 1, 0, 7, 7, '2019-10-16 14:24:53', '2019-10-16 14:24:53');
INSERT INTO `piospa_admin_has_group` VALUES (676, 7, 52, 0, 7, 7, '2019-10-17 09:20:31', '2019-10-17 09:20:31');
INSERT INTO `piospa_admin_has_group` VALUES (693, 117, 56, 0, 7, 7, '2019-10-18 15:55:47', '2019-10-18 15:55:47');
INSERT INTO `piospa_admin_has_group` VALUES (694, 117, 57, 0, 7, 7, '2019-10-18 15:55:47', '2019-10-18 15:55:47');
INSERT INTO `piospa_admin_has_group` VALUES (695, 117, 68, 0, 7, 7, '2019-10-18 16:20:03', '2019-10-18 16:20:03');
INSERT INTO `piospa_admin_has_group` VALUES (696, 100, 69, 0, 7, 7, '2019-10-18 18:29:10', '2019-10-18 18:29:10');
INSERT INTO `piospa_admin_has_group` VALUES (697, 120, 57, 0, 7, 7, '2019-10-21 14:53:21', '2019-10-21 14:53:21');
INSERT INTO `piospa_admin_has_group` VALUES (698, 121, 57, 0, 7, 7, '2019-10-21 14:56:39', '2019-10-21 14:56:39');
INSERT INTO `piospa_admin_has_group` VALUES (699, 123, 57, 0, 7, 7, '2019-10-21 15:03:40', '2019-10-21 15:03:40');
INSERT INTO `piospa_admin_has_group` VALUES (700, 115, 63, 0, 115, 115, '2019-11-12 09:12:18', '2019-11-12 09:12:18');
INSERT INTO `piospa_admin_has_group` VALUES (701, 124, 70, 0, 7, 7, '2019-12-05 08:28:15', '2019-12-05 08:28:15');
INSERT INTO `piospa_admin_has_group` VALUES (702, 125, 71, 0, 7, 7, '2019-12-05 08:29:24', '2019-12-05 08:29:24');
INSERT INTO `piospa_admin_has_group` VALUES (703, 126, 72, 0, 7, 7, '2019-12-05 08:31:59', '2019-12-05 08:31:59');
INSERT INTO `piospa_admin_has_group` VALUES (704, 127, 73, 0, 7, 7, '2019-12-05 08:34:43', '2019-12-05 08:34:43');
INSERT INTO `piospa_admin_has_group` VALUES (705, 128, 74, 0, 7, 7, '2019-12-05 08:37:27', '2019-12-05 08:37:27');
INSERT INTO `piospa_admin_has_group` VALUES (706, 129, 75, 0, 7, 7, '2019-12-05 08:40:22', '2019-12-05 08:40:22');
INSERT INTO `piospa_admin_has_group` VALUES (707, 130, 52, 0, 7, 7, '2020-04-18 08:53:25', '2020-04-18 08:53:25');
INSERT INTO `piospa_admin_has_group` VALUES (708, 130, 70, 0, 7, 7, '2020-04-18 08:53:25', '2020-04-18 08:53:25');
INSERT INTO `piospa_admin_has_group` VALUES (709, 130, 71, 0, 7, 7, '2020-04-18 08:53:25', '2020-04-18 08:53:25');
INSERT INTO `piospa_admin_has_group` VALUES (710, 130, 72, 0, 7, 7, '2020-04-18 08:53:25', '2020-04-18 08:53:25');
INSERT INTO `piospa_admin_has_group` VALUES (711, 130, 73, 0, 7, 7, '2020-04-18 08:53:25', '2020-04-18 08:53:25');
INSERT INTO `piospa_admin_has_group` VALUES (712, 130, 74, 0, 7, 7, '2020-04-18 08:53:25', '2020-04-18 08:53:25');
INSERT INTO `piospa_admin_has_group` VALUES (713, 130, 75, 0, 7, 7, '2020-04-18 08:53:25', '2020-04-18 08:53:25');
INSERT INTO `piospa_admin_has_group` VALUES (737, 133, 52, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (738, 133, 70, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (739, 133, 71, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (740, 133, 73, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (741, 133, 74, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (742, 133, 75, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (743, 133, 78, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (744, 133, 80, 0, 7, 7, '2020-04-21 10:05:15', '2020-04-21 10:05:15');
INSERT INTO `piospa_admin_has_group` VALUES (747, 132, 81, 0, 7, 7, '2020-04-21 10:24:44', '2020-04-21 10:24:44');
INSERT INTO `piospa_admin_has_group` VALUES (748, 135, 82, 0, 7, 7, '2020-04-24 09:48:50', '2020-04-24 09:48:50');
INSERT INTO `piospa_admin_has_group` VALUES (804, 136, 83, 0, 7, 7, '2020-04-25 14:26:13', '2020-04-25 14:26:13');
INSERT INTO `piospa_admin_has_group` VALUES (805, 136, 84, 0, 7, 7, '2020-04-25 14:26:13', '2020-04-25 14:26:13');
INSERT INTO `piospa_admin_has_group` VALUES (806, 136, 85, 0, 7, 7, '2020-04-25 14:26:13', '2020-04-25 14:26:13');
INSERT INTO `piospa_admin_has_group` VALUES (807, 136, 86, 0, 7, 7, '2020-04-25 14:26:13', '2020-04-25 14:26:13');
INSERT INTO `piospa_admin_has_group` VALUES (808, 136, 87, 0, 7, 7, '2020-04-25 14:26:13', '2020-04-25 14:26:13');
INSERT INTO `piospa_admin_has_group` VALUES (809, 136, 88, 0, 7, 7, '2020-04-25 14:26:13', '2020-04-25 14:26:13');
INSERT INTO `piospa_admin_has_group` VALUES (810, 131, 90, 0, 7, 7, '2020-04-25 15:53:52', '2020-04-25 15:53:52');
INSERT INTO `piospa_admin_has_group` VALUES (813, 137, 52, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (814, 137, 70, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (815, 137, 71, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (816, 137, 72, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (817, 137, 73, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (818, 137, 74, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (819, 137, 75, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (820, 137, 76, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (821, 137, 77, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (822, 137, 78, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (823, 137, 79, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (824, 137, 80, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (825, 137, 81, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (826, 137, 82, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (827, 137, 83, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (828, 137, 84, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (829, 137, 85, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (830, 137, 86, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (831, 137, 87, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');
INSERT INTO `piospa_admin_has_group` VALUES (832, 137, 88, 0, 7, 7, '2020-04-27 17:02:39', '2020-04-27 17:02:39');

-- ----------------------------
-- Table structure for piospa_admin_lock_out
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_lock_out`;
CREATE TABLE `piospa_admin_lock_out`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Khóa tài khoản user' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for piospa_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_menu`;
CREATE TABLE `piospa_admin_menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'tên của page',
  `menu_route` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'route ',
  `menu_icon` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `menu_image` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `menu_position` int(10) UNSIGNED NULL DEFAULT 1,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `menu_category_id` int(10) UNSIGNED NULL DEFAULT 0,
  `is_actived` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_menu
-- ----------------------------
INSERT INTO `piospa_admin_menu` VALUES (1, 'Cài đặt', 'admin.country', '<i class=\"fa fa-globe-asia\"></i>', NULL, 1, NULL, 2, 0, '2019-09-05 11:21:45', '2019-10-10 10:49:10');
INSERT INTO `piospa_admin_menu` VALUES (2, 'Quản lý tỉnh thành', 'admin.province', '<i class=\"fa fa-city\"></i>', NULL, 2, NULL, 2, 0, '2019-09-05 11:21:49', '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (3, 'Quản lý quận huyện', 'admin.district', '<i class=\"fa fa-globe\"></i>', NULL, 3, NULL, 2, 0, '2019-09-05 11:21:52', '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (4, 'Quản lý phường xã', 'admin.ward', '<i class=\"fa fa-building\"></i>', NULL, 4, NULL, 2, 0, '2019-09-05 11:21:54', '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (5, 'Quản lý nhóm quyền', 'user.admin-group.index', '<i class=\"fa fa-user-friends\"></i>', NULL, 1, NULL, 5, 1, '2019-09-05 15:31:59', '2020-04-29 03:04:16');
INSERT INTO `piospa_admin_menu` VALUES (6, 'Quản lý User backoffice', 'user.my-store', '<i class=\"fa fa-user\"></i>', NULL, 5, NULL, 1, 0, NULL, '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (7, 'Quản lý tài khoản Brand portal', 'user.staging', '<i class=\"fa fa-globe\"></i>', NULL, 7, NULL, 0, 0, NULL, '2019-09-09 08:12:02');
INSERT INTO `piospa_admin_menu` VALUES (8, 'Quản lý User app', 'user.store-user', '<i class=\"fa fa-user\"></i>', NULL, 6, NULL, 1, 1, NULL, '2020-04-29 03:03:51');
INSERT INTO `piospa_admin_menu` VALUES (10, 'Cài đặt quyền truy cập backoffice', 'user.admin-group-action.index', '<i class=\"fa fa-user-friends\"></i>', NULL, 2, NULL, 5, 1, '2019-09-11 08:31:25', '2020-04-29 03:04:20');
INSERT INTO `piospa_admin_menu` VALUES (11, 'Cài đặt menu', 'user.admin-menu.index', '<i class=\"fa fa-list\"></i>', NULL, 4, NULL, 5, 1, '2019-09-11 09:16:15', '2020-04-29 03:04:44');
INSERT INTO `piospa_admin_menu` VALUES (13, 'Danh sách Brand', 'admin.brand', '<i class=\"fa fa-city\"></i>', NULL, 1, 'Danh sách Brand', 0, 0, '2019-09-16 15:03:06', '2019-09-16 08:06:06');
INSERT INTO `piospa_admin_menu` VALUES (14, 'Quản lý thương hiệu', 'admin.brand', '<i class=\"fa fa-globe\"></i>', NULL, 1, 'Quản lý thương hiệu', 24, 1, '2019-09-16 15:06:37', '2020-04-29 03:03:44');
INSERT INTO `piospa_admin_menu` VALUES (15, 'Cài đặt nhóm nội dung hỗ trợ', 'admin.faq-group.index', '<i class=\"fa fa-globe\"></i>', NULL, 1, 'Cài đặt nhóm nội dung hỗ trợ', 3, 0, NULL, '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (16, 'Cài đặt nội dung hỗ trợ', 'admin.faq.index', '<i class=\"fa fa-globe\"></i>', NULL, 2, 'Cài đặt nội dung hỗ trợ', 3, 0, NULL, '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (17, 'Cài đặt static page', 'admin.policy-terms.index', '<i class=\"fa fa-globe\"></i>', NULL, 3, 'Cài đặt static page', 3, 0, NULL, '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (18, 'Quản lý notification', 'admin.notification', '<i class=\"fa fa-globe\"></i>', NULL, 1, 'Quản lý notification', 4, 0, NULL, '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (19, 'Test', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 20, 'Test', 0, 0, '2019-09-29 12:10:29', '2019-09-30 08:19:20');
INSERT INTO `piospa_admin_menu` VALUES (20, 'Ngânvgfgfdgd', 'admin.district.create', '<i class=\"fa fa-map-marker-alt\"></i>', NULL, 8, 'Ngânfgdfgdgggggggggggg', 0, 0, '2019-10-03 11:39:56', '2019-10-03 04:41:16');
INSERT INTO `piospa_admin_menu` VALUES (21, 'Quản lý nhóm khách hàng', 'user.user-group-notification', '<i class=\"fa fa-address-card\"></i>', NULL, 21, 'Nhóm khách hàng nhận thông báo', 4, 0, NULL, '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (22, 'Cài đặt notification tự động', 'admin.config-notification', '<i class=\"fa fa-address-card\"></i>', NULL, 22, NULL, 4, 0, NULL, '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (23, 'Quản lý nhóm menu', 'user.admin-menu-category.index', '<i class=\"fa fa-list\"></i>', NULL, 3, NULL, 5, 1, '2019-10-07 21:07:09', '2020-04-29 03:04:39');
INSERT INTO `piospa_admin_menu` VALUES (24, 'Cài đặt gửi thông báo', 'admin.config-notification', '<i class=\"fa fa-cog\"></i>', NULL, 23, 'Cài đặt gửi thông báo', 4, 0, '2019-10-08 10:42:53', '2019-10-08 05:08:28');
INSERT INTO `piospa_admin_menu` VALUES (25, 'aa', 'user.store-user', '<i class=\"fa fa-address-card\"></i>', NULL, 55, 'aa', 0, 0, '2019-10-10 17:23:34', '2019-10-10 10:44:28');
INSERT INTO `piospa_admin_menu` VALUES (26, 'Cài đặt', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 666, 'aa', 0, 0, '2019-10-10 17:38:21', '2019-10-10 10:38:41');
INSERT INTO `piospa_admin_menu` VALUES (27, 'mmmmmmmmxasadasfafag', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 88, NULL, 0, 0, '2019-10-10 17:39:56', '2019-10-10 10:40:37');
INSERT INTO `piospa_admin_menu` VALUES (28, '454536123456', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 123, '123456789', 0, 0, '2019-10-10 17:41:11', '2019-10-10 10:44:36');
INSERT INTO `piospa_admin_menu` VALUES (29, '123123123', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 123456789, '12312323', 0, 0, '2019-10-10 17:41:32', '2019-10-10 10:44:24');
INSERT INTO `piospa_admin_menu` VALUES (30, 'Cài đặt', 'admin.district.create', '<i class=\"fa fa-address-card\"></i>', NULL, 1, 'Cài đặt', 1, 0, '2019-10-10 17:48:46', '2019-10-10 10:49:05');
INSERT INTO `piospa_admin_menu` VALUES (31, 'mmmm', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 12, NULL, 5, 0, '2019-10-10 17:50:28', '2019-10-10 10:50:38');
INSERT INTO `piospa_admin_menu` VALUES (32, 'fdgf', 'admin.country.create', '<i class=\"fa fa-building\"></i>', NULL, 155, 'gdfg', 1, 0, '2019-10-10 18:12:24', '2019-10-10 11:12:56');
INSERT INTO `piospa_admin_menu` VALUES (33, '1111', 'admin.country.create', '<i class=\"fa fa-globe-asia\"></i>', NULL, 11111, '1111', 0, 0, '2019-10-10 18:14:24', '2019-10-10 11:14:49');
INSERT INTO `piospa_admin_menu` VALUES (34, 'ưqeqw', 'admin.country', '<i class=\"fa fa-building\"></i>', NULL, 1545444, 'rưerw', 1, 0, '2019-10-10 18:14:37', '2019-10-10 11:15:01');
INSERT INTO `piospa_admin_menu` VALUES (35, 'Quản lý quốc gia', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 1, NULL, 2, 0, '2019-10-14 10:09:33', '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (36, 'A', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 5, '123', 5, 0, '2019-10-14 15:56:59', '2019-10-14 08:57:24');
INSERT INTO `piospa_admin_menu` VALUES (37, 'A', 'user.admin-menu-category.index', '<i class=\"fa fa-address-card\"></i>', NULL, 5, '123', 5, 0, '2019-10-14 15:57:55', '2019-10-14 09:15:02');
INSERT INTO `piospa_admin_menu` VALUES (38, 'Cài đặt menu', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 5, NULL, 0, 0, '2019-10-14 16:17:20', '2019-10-14 09:17:41');
INSERT INTO `piospa_admin_menu` VALUES (39, 'Quản lý User app', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 4, NULL, 0, 0, '2019-10-14 16:18:21', '2019-10-14 09:18:44');
INSERT INTO `piospa_admin_menu` VALUES (40, 'a', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 5, NULL, 0, 0, '2019-10-14 16:36:02', '2019-10-14 09:42:32');
INSERT INTO `piospa_admin_menu` VALUES (41, 'test', 'user.store-user', '<i class=\"fa fa-address-card\"></i>', NULL, 12, 'test', 1, 0, '2019-10-14 20:27:25', '2019-10-17 01:51:46');
INSERT INTO `piospa_admin_menu` VALUES (42, 'A', 'user.admin-menu-category.create', '<i class=\"fa fa-address-card\"></i>', NULL, 5, '123', 0, 0, '2019-10-15 08:56:12', '2019-10-15 02:49:04');
INSERT INTO `piospa_admin_menu` VALUES (43, 'A', 'user.admin-menu.create', '<i class=\"fa fa-home\"></i>', NULL, 5, '123', 5, 0, '2019-10-15 09:50:09', '2019-10-17 01:51:29');
INSERT INTO `piospa_admin_menu` VALUES (44, 'SuongTest', 'user.admin-menu-category.index', '<i class=\"fa fa-address-card\"></i>', NULL, 10, 'SuongTest', 5, 0, '2019-10-15 20:47:50', '2019-10-15 13:52:18');
INSERT INTO `piospa_admin_menu` VALUES (45, 'SuongTest', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 100, NULL, 0, 0, '2019-10-15 21:07:28', '2019-10-15 14:07:45');
INSERT INTO `piospa_admin_menu` VALUES (46, 'Menu test', 'admin.country', '<i class=\"fa fa-plus\"></i>', NULL, 1, NULL, 0, 0, '2019-12-05 11:53:23', '2019-12-05 11:54:10');
INSERT INTO `piospa_admin_menu` VALUES (47, 'Danh sách dịch vụ', 'admin.service', '<i class=\"fa fa-address-card\"></i>', NULL, 1, 'Danh sách dịch vụ', 22, 0, '2020-04-14 14:01:25', '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (48, 'Danh sách Tính năng', 'service.service-feature.index', '<i class=\"fa fa-address-card\"></i>', NULL, 1, 'Danh sách dịch vụ', 22, 0, '2020-04-14 14:01:25', '2020-04-29 03:02:55');
INSERT INTO `piospa_admin_menu` VALUES (49, 'Hình ảnh tham khảo', 'admin.ward', '<i class=\"fa fa-address-card\"></i>', NULL, 1, 'Hình ảnh tham khảo', 0, 0, '2020-04-21 10:17:05', '2020-04-21 10:24:00');
INSERT INTO `piospa_admin_menu` VALUES (50, 'Hình ảnh tham khảo', 'admin.country', '<i class=\"fa fa-address-card\"></i>', NULL, 1, 'Hình ảnh tham khảo', 0, 0, '2020-04-21 10:23:48', '2020-04-29 03:02:55');

-- ----------------------------
-- Table structure for piospa_admin_menu_category
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_menu_category`;
CREATE TABLE `piospa_admin_menu_category`  (
  `menu_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `menu_category_icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `menu_category_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `menu_category_position` int(10) UNSIGNED NULL DEFAULT 1,
  `is_actived` tinyint(1) UNSIGNED NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`menu_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piospa_admin_menu_category
-- ----------------------------
INSERT INTO `piospa_admin_menu_category` VALUES (1, 'Tài khoản', '<i class=\"fa fa-user\"></i>', NULL, 1, 1, '2020-04-29 03:03:30', '2019-10-08 10:27:17');
INSERT INTO `piospa_admin_menu_category` VALUES (2, 'Địa chỉ', '<i class=\"fa fa-map-marker-alt\"></i>', NULL, 2, 0, '2020-04-29 03:03:24', '2019-10-08 10:29:16');
INSERT INTO `piospa_admin_menu_category` VALUES (3, 'Nội dung hỗ trợ', '<i class=\"fa fa-layer-group\"></i>', NULL, 3, 0, '2020-04-29 03:03:24', '2019-10-08 10:33:58');
INSERT INTO `piospa_admin_menu_category` VALUES (4, 'Notification', '<i class=\"fa fa-address-card\"></i>', NULL, 4, 0, '2020-04-29 03:03:24', '2019-10-08 10:36:13');
INSERT INTO `piospa_admin_menu_category` VALUES (5, 'Cài đặt', '<i class=\"fa fa-address-card\"></i>', NULL, 5, 1, '2020-04-29 03:04:05', '2020-04-21 10:21:37');
INSERT INTO `piospa_admin_menu_category` VALUES (6, 'a', '<i class=\"fa fa-address-card\"></i>', NULL, 5, 0, '2019-10-10 17:03:32', '2019-10-10 17:03:32');
INSERT INTO `piospa_admin_menu_category` VALUES (7, 'b', '<i class=\"fa fa-box-open\"></i>', NULL, 6, 0, '2019-10-10 17:03:26', '2019-10-10 17:03:26');
INSERT INTO `piospa_admin_menu_category` VALUES (8, 'v', '<i class=\"fa fa-city\"></i>', NULL, 9, 0, '2019-10-10 17:03:23', '2019-10-10 17:03:23');
INSERT INTO `piospa_admin_menu_category` VALUES (9, 'r', '<i class=\"fa fa-address-card\"></i>', NULL, 11, 0, '2019-10-10 17:03:20', '2019-10-10 17:03:20');
INSERT INTO `piospa_admin_menu_category` VALUES (10, 'yyy', '<i class=\"fa fa-address-card\"></i>', NULL, 15, 0, '2019-10-10 17:03:16', '2019-10-10 17:03:16');
INSERT INTO `piospa_admin_menu_category` VALUES (11, 'trêt', '<i class=\"fa fa-globe-asia\"></i>', NULL, 122, 0, '2019-10-10 17:03:13', '2019-10-10 17:03:13');
INSERT INTO `piospa_admin_menu_category` VALUES (12, '.vvcv', '<i class=\"fa fa-address-card\"></i>', NULL, 99, 0, '2019-10-10 17:10:30', '2019-10-10 17:10:30');
INSERT INTO `piospa_admin_menu_category` VALUES (13, 'a', '<i class=\"fa fa-address-card\"></i>', NULL, 44, 0, '2019-10-10 17:10:26', '2019-10-10 17:10:26');
INSERT INTO `piospa_admin_menu_category` VALUES (14, 'yyy', '<i class=\"fa fa-address-card\"></i>', NULL, 6666, 0, '2019-10-10 17:10:34', '2019-10-10 17:10:34');
INSERT INTO `piospa_admin_menu_category` VALUES (15, 'mmmmm', '<i class=\"fa fa-building\"></i>', NULL, 66, 0, '2019-10-10 17:27:10', '2019-10-10 17:27:10');
INSERT INTO `piospa_admin_menu_category` VALUES (16, 'yyyy', '<i class=\"fa fa-address-card\"></i>', NULL, 1888, 0, '2019-10-10 17:27:05', '2019-10-10 17:27:05');
INSERT INTO `piospa_admin_menu_category` VALUES (17, 'A', '<i class=\"fa fa-address-card\"></i>', NULL, 5, 0, '2019-10-17 08:54:53', '2019-10-17 08:54:53');
INSERT INTO `piospa_admin_menu_category` VALUES (18, 'A', '<i class=\"fa fa-address-card\"></i>', NULL, 5, 0, '2019-10-17 09:23:38', '2019-10-17 09:23:38');
INSERT INTO `piospa_admin_menu_category` VALUES (19, 'A', '<i class=\"fa fa-address-card\"></i>', NULL, 5, 0, '2019-10-17 09:32:07', '2019-10-17 09:32:07');
INSERT INTO `piospa_admin_menu_category` VALUES (20, 'A', '<i class=\"fa fa-address-card\"></i>', NULL, 5, 0, '2019-12-05 04:52:39', '2019-12-05 11:52:39');
INSERT INTO `piospa_admin_menu_category` VALUES (21, 'Nhóm menu test', '<i class=\"fa fa-globe-asia\"></i>', NULL, 11, 0, '2019-12-05 04:54:00', '2019-12-05 11:54:00');
INSERT INTO `piospa_admin_menu_category` VALUES (22, 'Quản lý dịch vụ', '<i class=\"fa fa-layer-group\"></i>', NULL, 7, 0, '2020-04-29 03:03:25', '2020-04-14 14:01:01');
INSERT INTO `piospa_admin_menu_category` VALUES (23, 'Tham khảo thêm', '<i class=\"fa fa-address-card\"></i>', NULL, 8, 0, '2020-04-21 03:24:00', '2020-04-21 10:24:00');
INSERT INTO `piospa_admin_menu_category` VALUES (24, 'Quản lý thương hiệu', '<i class=\"fa fa-address-card\"></i>', NULL, 0, 1, '2020-04-29 03:03:31', '2020-04-27 16:41:29');

-- ----------------------------
-- Table structure for piospa_admin_service
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_service`;
CREATE TABLE `piospa_admin_service`  (
  `service_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã dịch vụ',
  `service_name_vi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên dịch vụ - tiếng việt ',
  `service_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên dịch vụ - tiếng anh ',
  `description_short` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả ngắn',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả',
  `is_actived` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái ',
  `created_at` datetime(0) NOT NULL COMMENT 'thời điểm tạo',
  `created_by` int(11) NOT NULL COMMENT 'Người tạo',
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Thời điểm cập nhật',
  `updated_by` int(11) NOT NULL COMMENT 'Người cập nhật ',
  PRIMARY KEY (`service_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách dịch vụ-user define' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of piospa_admin_service
-- ----------------------------
INSERT INTO `piospa_admin_service` VALUES (1, 'Gói dịch vụ full', 'Service Package full', 'Gói dịch vụ full', NULL, 1, '2020-04-11 07:52:20', 1, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service` VALUES (2, 'Gói dịch vụ sản phẩm', 'Service Package product', 'test', NULL, 1, '2020-04-11 07:53:47', 1, '2020-04-21 23:51:45', 7);
INSERT INTO `piospa_admin_service` VALUES (3, 'Gói dịch vụ', 'Service package 03', 'Gói dịch vụ Trade Marketing', '<p>Update nội dung<img style=\"width: 711px;\" src=\"https://rtqc.blob.core.windows.net/images/5e9f0ba469850.png\"><br></p>', 0, '2020-04-11 07:54:15', 1, '2020-04-21 22:15:44', 7);
INSERT INTO `piospa_admin_service` VALUES (4, 'Gói dịch vụ chụp hình', 'Service package photo tracking', 'Service package photo tracking', NULL, 1, '2020-04-11 07:54:58', 1, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service` VALUES (5, 'Gói dịch vụ Trade Marketing', 'Trade Marketing Promotion Service', 'Gói dịch vụ Trade Marketing', NULL, 1, '2020-04-16 08:41:26', 7, '2020-04-22 09:00:47', 7);
INSERT INTO `piospa_admin_service` VALUES (6, 'Quản lý dịch vụ và tính năng', 'Service & feature management', 'Quản lý dịch vụ và tính năng ngắn', '<p><b style=\"background-color: rgb(255, 255, 0);\">Quản lý dịch vụ bao gồm A, B,C</b></p>', 0, '2020-04-21 10:04:32', 7, '2020-04-21 13:37:19', 7);
INSERT INTO `piospa_admin_service` VALUES (7, 'Dịch vụ  test', 'Dịch vụ  test', 'Dịch vụ  test', NULL, 1, '2020-04-22 09:01:22', 7, '2020-04-22 09:02:22', 7);
INSERT INTO `piospa_admin_service` VALUES (8, '2222', '11', '111', NULL, 1, '2020-04-22 10:04:43', 7, '2020-04-22 10:04:43', 7);
INSERT INTO `piospa_admin_service` VALUES (9, '1234_update', '1234-update', '1233', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 11111111<br></p>', 1, '2020-04-22 13:38:15', 7, '2020-04-22 13:43:01', 7);
INSERT INTO `piospa_admin_service` VALUES (10, 'test1', 'test1', '1234', NULL, 0, '2020-04-22 14:31:44', 7, '2020-04-22 14:31:54', 7);

-- ----------------------------
-- Table structure for piospa_admin_service_brand
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_service_brand`;
CREATE TABLE `piospa_admin_service_brand`  (
  `service_brand_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã map dịch vụ và brand ',
  `service_id` int(11) NOT NULL COMMENT 'Mã dịch vụ ',
  `brand_id` int(11) NOT NULL COMMENT 'Mã brand',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Đánh dấu xóa',
  `is_actived` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái ',
  `created_by` int(11) NOT NULL COMMENT 'người tạo',
  `created_at` datetime(0) NOT NULL COMMENT 'thời điểm tạo',
  `updated_by` int(11) NOT NULL COMMENT 'Người cập nhật ',
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Thời điểm cập nhật',
  PRIMARY KEY (`service_brand_id`) USING BTREE,
  UNIQUE INDEX `service_id_brand_id`(`service_id`, `brand_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 178 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách dịch vụ đăng ký của brand' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of piospa_admin_service_brand
-- ----------------------------
INSERT INTO `piospa_admin_service_brand` VALUES (23, 1, 7, 0, 1, 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14');
INSERT INTO `piospa_admin_service_brand` VALUES (24, 4, 10, 0, 1, 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43');
INSERT INTO `piospa_admin_service_brand` VALUES (25, 4, 11, 0, 1, 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09');
INSERT INTO `piospa_admin_service_brand` VALUES (26, 4, 13, 0, 1, 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47');
INSERT INTO `piospa_admin_service_brand` VALUES (27, 4, 14, 0, 1, 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43');
INSERT INTO `piospa_admin_service_brand` VALUES (28, 4, 15, 0, 1, 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29');
INSERT INTO `piospa_admin_service_brand` VALUES (29, 4, 16, 0, 1, 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08');
INSERT INTO `piospa_admin_service_brand` VALUES (30, 4, 17, 0, 1, 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35');
INSERT INTO `piospa_admin_service_brand` VALUES (45, 1, 6, 0, 1, 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13');
INSERT INTO `piospa_admin_service_brand` VALUES (68, 1, 5, 0, 1, 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44');
INSERT INTO `piospa_admin_service_brand` VALUES (70, 6, 19, 0, 1, 7, '2020-04-21 10:22:23', 7, '2020-04-21 10:22:23');
INSERT INTO `piospa_admin_service_brand` VALUES (71, 1, 19, 0, 1, 7, '2020-04-21 10:22:23', 7, '2020-04-21 10:22:23');
INSERT INTO `piospa_admin_service_brand` VALUES (126, 6, 20, 0, 1, 7, '2020-04-21 11:23:14', 7, '2020-04-21 11:23:14');
INSERT INTO `piospa_admin_service_brand` VALUES (127, 1, 20, 0, 1, 7, '2020-04-21 11:23:14', 7, '2020-04-21 11:23:14');
INSERT INTO `piospa_admin_service_brand` VALUES (131, 1, 18, 0, 1, 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28');
INSERT INTO `piospa_admin_service_brand` VALUES (151, 5, 4, 0, 1, 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45');
INSERT INTO `piospa_admin_service_brand` VALUES (152, 2, 4, 0, 1, 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45');
INSERT INTO `piospa_admin_service_brand` VALUES (163, 1, 1, 0, 1, 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39');
INSERT INTO `piospa_admin_service_brand` VALUES (164, 4, 3, 0, 1, 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46');
INSERT INTO `piospa_admin_service_brand` VALUES (167, 5, 22, 0, 0, 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30');
INSERT INTO `piospa_admin_service_brand` VALUES (168, 2, 22, 0, 0, 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30');
INSERT INTO `piospa_admin_service_brand` VALUES (177, 1, 2, 0, 1, 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25');

-- ----------------------------
-- Table structure for piospa_admin_service_brand_feature
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_service_brand_feature`;
CREATE TABLE `piospa_admin_service_brand_feature`  (
  `service_brand_feature_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã map brand dịch vụ và chức năng',
  `brand_id` int(11) NOT NULL COMMENT 'Mã  thương hiệu ',
  `service_id` int(11) NULL DEFAULT NULL COMMENT 'Mã dịch vụ ',
  `feature_group_id` int(11) NOT NULL COMMENT 'Mã nhóm chức năng',
  `is_actived` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Tình trạng ',
  `created_at` datetime(0) NOT NULL COMMENT 'Thời điểm tạo',
  `created_by` int(11) NOT NULL COMMENT 'người tạo',
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Thời điểm cập nhật',
  `updated_by` int(11) NOT NULL COMMENT 'Người cập nhật ',
  `brand_update_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thời điểm cập nhật bởi brand',
  `brand_update_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật bởi brand',
  PRIMARY KEY (`service_brand_feature_id`) USING BTREE,
  UNIQUE INDEX `service_brand_id_feature_group_id`(`brand_id`, `feature_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3750 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách chi tiết chức năng brand đã đăng ký và tình trạng của nó' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of piospa_admin_service_brand_feature
-- ----------------------------
INSERT INTO `piospa_admin_service_brand_feature` VALUES (553, 7, 1, 1, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (554, 7, 1, 2, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (555, 7, 1, 3, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (556, 7, 1, 4, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (557, 7, 1, 5, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (558, 7, 1, 6, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (559, 7, 1, 7, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (560, 7, 1, 8, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (561, 7, 1, 9, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (562, 7, 1, 10, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (563, 7, 1, 11, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (564, 7, 1, 12, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (565, 7, 1, 13, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (566, 7, 1, 14, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (567, 7, 1, 15, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (568, 7, 1, 16, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (569, 7, 1, 17, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (570, 7, 1, 18, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (571, 7, 1, 19, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (572, 7, 1, 20, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (573, 7, 1, 21, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (574, 7, 1, 22, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (575, 7, 1, 23, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (576, 7, 1, 24, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (577, 7, 1, 25, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (578, 7, 1, 26, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (579, 7, 1, 27, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (580, 7, 1, 28, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (581, 7, 1, 29, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (582, 7, 1, 30, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (583, 7, 1, 31, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (584, 7, 1, 32, 1, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7, '2020-04-19 17:48:14', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (585, 10, 4, 5, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (586, 10, 4, 6, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (587, 10, 4, 9, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (588, 10, 4, 10, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (589, 10, 4, 12, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (590, 10, 4, 14, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (591, 10, 4, 17, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (592, 10, 4, 18, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (593, 10, 4, 19, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (594, 10, 4, 20, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (595, 10, 4, 23, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (596, 10, 4, 24, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (597, 10, 4, 25, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (598, 10, 4, 26, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (599, 10, 4, 27, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (600, 10, 4, 28, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (601, 10, 4, 29, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (602, 10, 4, 30, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (603, 10, 4, 31, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (604, 10, 4, 32, 1, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7, '2020-04-19 18:16:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (605, 11, 4, 5, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (606, 11, 4, 6, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (607, 11, 4, 9, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (608, 11, 4, 10, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (609, 11, 4, 12, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (610, 11, 4, 14, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (611, 11, 4, 17, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (612, 11, 4, 18, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (613, 11, 4, 19, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (614, 11, 4, 20, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (615, 11, 4, 23, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (616, 11, 4, 24, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (617, 11, 4, 25, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (618, 11, 4, 26, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (619, 11, 4, 27, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (620, 11, 4, 28, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (621, 11, 4, 29, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (622, 11, 4, 30, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (623, 11, 4, 31, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (624, 11, 4, 32, 1, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7, '2020-04-19 18:19:09', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (625, 13, 4, 5, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (626, 13, 4, 6, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (627, 13, 4, 9, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (628, 13, 4, 10, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (629, 13, 4, 12, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (630, 13, 4, 14, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (631, 13, 4, 17, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (632, 13, 4, 18, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (633, 13, 4, 19, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (634, 13, 4, 20, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (635, 13, 4, 23, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (636, 13, 4, 24, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (637, 13, 4, 25, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (638, 13, 4, 26, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (639, 13, 4, 27, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (640, 13, 4, 28, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (641, 13, 4, 29, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (642, 13, 4, 30, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (643, 13, 4, 31, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (644, 13, 4, 32, 1, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7, '2020-04-19 18:39:47', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (645, 14, 4, 5, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (646, 14, 4, 6, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (647, 14, 4, 9, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (648, 14, 4, 10, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (649, 14, 4, 12, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (650, 14, 4, 14, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (651, 14, 4, 17, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (652, 14, 4, 18, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (653, 14, 4, 19, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (654, 14, 4, 20, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (655, 14, 4, 23, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (656, 14, 4, 24, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (657, 14, 4, 25, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (658, 14, 4, 26, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (659, 14, 4, 27, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (660, 14, 4, 28, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (661, 14, 4, 29, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (662, 14, 4, 30, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (663, 14, 4, 31, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (664, 14, 4, 32, 1, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7, '2020-04-19 18:41:43', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (665, 15, 4, 5, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (666, 15, 4, 6, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (667, 15, 4, 9, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (668, 15, 4, 10, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (669, 15, 4, 12, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (670, 15, 4, 14, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (671, 15, 4, 17, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (672, 15, 4, 18, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (673, 15, 4, 19, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (674, 15, 4, 20, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (675, 15, 4, 23, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (676, 15, 4, 24, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (677, 15, 4, 25, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (678, 15, 4, 26, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (679, 15, 4, 27, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (680, 15, 4, 28, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (681, 15, 4, 29, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (682, 15, 4, 30, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (683, 15, 4, 31, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (684, 15, 4, 32, 1, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7, '2020-04-20 09:34:29', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (685, 16, 4, 5, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (686, 16, 4, 6, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (687, 16, 4, 9, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (688, 16, 4, 10, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (689, 16, 4, 12, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (690, 16, 4, 14, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (691, 16, 4, 17, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (692, 16, 4, 18, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (693, 16, 4, 19, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (694, 16, 4, 20, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (695, 16, 4, 23, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (696, 16, 4, 24, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (697, 16, 4, 25, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (698, 16, 4, 26, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (699, 16, 4, 27, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (700, 16, 4, 28, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (701, 16, 4, 29, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (702, 16, 4, 30, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (703, 16, 4, 31, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (704, 16, 4, 32, 1, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7, '2020-04-20 09:47:08', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (705, 17, 4, 5, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (706, 17, 4, 6, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (707, 17, 4, 9, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (708, 17, 4, 10, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (709, 17, 4, 12, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (710, 17, 4, 14, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (711, 17, 4, 17, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (712, 17, 4, 18, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (713, 17, 4, 19, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (714, 17, 4, 20, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (715, 17, 4, 23, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (716, 17, 4, 24, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (717, 17, 4, 25, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (718, 17, 4, 26, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (719, 17, 4, 27, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (720, 17, 4, 28, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (721, 17, 4, 29, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (722, 17, 4, 30, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (723, 17, 4, 31, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (724, 17, 4, 32, 1, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7, '2020-04-20 09:59:35', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1173, 6, 1, 1, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1174, 6, 1, 2, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1175, 6, 1, 3, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1176, 6, 1, 4, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1177, 6, 1, 5, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1178, 6, 1, 6, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1179, 6, 1, 7, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1180, 6, 1, 8, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1181, 6, 1, 9, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1182, 6, 1, 10, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1183, 6, 1, 11, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1184, 6, 1, 12, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1185, 6, 1, 13, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1186, 6, 1, 14, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1187, 6, 1, 15, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1188, 6, 1, 16, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1189, 6, 1, 17, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1190, 6, 1, 18, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1191, 6, 1, 19, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1192, 6, 1, 20, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1193, 6, 1, 21, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1194, 6, 1, 22, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1195, 6, 1, 23, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1196, 6, 1, 24, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1197, 6, 1, 25, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1198, 6, 1, 26, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1199, 6, 1, 27, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1200, 6, 1, 28, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1201, 6, 1, 29, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1202, 6, 1, 30, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1203, 6, 1, 31, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1204, 6, 1, 32, 1, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7, '2020-04-20 14:41:13', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1669, 5, 1, 1, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1670, 5, 1, 2, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1671, 5, 1, 3, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1672, 5, 1, 4, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1673, 5, 1, 5, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1674, 5, 1, 6, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1675, 5, 1, 7, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1676, 5, 1, 8, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1677, 5, 1, 9, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1678, 5, 1, 10, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1679, 5, 1, 11, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1680, 5, 1, 12, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1681, 5, 1, 13, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1682, 5, 1, 14, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1683, 5, 1, 15, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1684, 5, 1, 16, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1685, 5, 1, 17, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1686, 5, 1, 18, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1687, 5, 1, 19, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1688, 5, 1, 20, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1689, 5, 1, 21, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1690, 5, 1, 22, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1691, 5, 1, 23, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1692, 5, 1, 24, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1693, 5, 1, 25, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1694, 5, 1, 26, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1695, 5, 1, 27, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1696, 5, 1, 28, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1697, 5, 1, 29, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1698, 5, 1, 30, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1699, 5, 1, 31, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (1700, 5, 1, 32, 1, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7, '2020-04-21 10:18:44', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2928, 18, 1, 1, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2929, 18, 1, 2, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2930, 18, 1, 3, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2931, 18, 1, 4, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2932, 18, 1, 5, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2933, 18, 1, 6, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2934, 18, 1, 7, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2935, 18, 1, 8, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2936, 18, 1, 9, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2937, 18, 1, 10, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2938, 18, 1, 11, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2939, 18, 1, 12, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2940, 18, 1, 13, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2941, 18, 1, 14, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2942, 18, 1, 15, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2943, 18, 1, 16, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2944, 18, 1, 17, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2945, 18, 1, 18, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2946, 18, 1, 19, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2947, 18, 1, 20, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2948, 18, 1, 21, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2949, 18, 1, 22, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2950, 18, 1, 23, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2951, 18, 1, 24, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2952, 18, 1, 25, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2953, 18, 1, 26, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2954, 18, 1, 27, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2955, 18, 1, 28, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2956, 18, 1, 29, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2957, 18, 1, 30, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2958, 18, 1, 31, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (2959, 18, 1, 32, 1, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7, '2020-04-21 11:37:28', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3160, 4, 5, 1, 0, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3161, 4, 5, 9, 0, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3162, 4, 5, 13, 0, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3163, 4, 5, 31, 0, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3164, 4, 5, 32, 0, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3165, 4, 2, 4, 0, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7, '2020-04-21 23:56:45', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3398, 1, 1, 1, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3399, 1, 1, 2, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3400, 1, 1, 3, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3401, 1, 1, 4, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3402, 1, 1, 5, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3403, 1, 1, 6, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3404, 1, 1, 7, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3405, 1, 1, 8, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3406, 1, 1, 9, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3407, 1, 1, 10, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3408, 1, 1, 11, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3409, 1, 1, 12, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3410, 1, 1, 13, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3411, 1, 1, 14, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3412, 1, 1, 15, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3413, 1, 1, 16, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3414, 1, 1, 17, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3415, 1, 1, 18, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3416, 1, 1, 19, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3417, 1, 1, 20, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3418, 1, 1, 21, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3419, 1, 1, 22, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3420, 1, 1, 23, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3421, 1, 1, 24, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3422, 1, 1, 25, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3423, 1, 1, 26, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3424, 1, 1, 27, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3425, 1, 1, 28, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3426, 1, 1, 29, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3427, 1, 1, 30, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3428, 1, 1, 31, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3429, 1, 1, 32, 1, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7, '2020-04-23 16:58:39', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3430, 3, 4, 5, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3431, 3, 4, 6, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3432, 3, 4, 9, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3433, 3, 4, 10, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3434, 3, 4, 12, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3435, 3, 4, 14, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3436, 3, 4, 17, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3437, 3, 4, 18, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3438, 3, 4, 19, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3439, 3, 4, 20, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3440, 3, 4, 23, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3441, 3, 4, 24, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3442, 3, 4, 25, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3443, 3, 4, 26, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3444, 3, 4, 27, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3445, 3, 4, 28, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3446, 3, 4, 29, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3447, 3, 4, 30, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3448, 3, 4, 31, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3449, 3, 4, 32, 1, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7, '2020-04-23 17:42:46', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3456, 22, 5, 1, 0, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3457, 22, 5, 9, 0, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3458, 22, 5, 13, 0, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3459, 22, 5, 31, 0, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3460, 22, 5, 32, 0, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3461, 22, 2, 4, 0, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7, '2020-04-25 11:36:30', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3718, 2, 1, 1, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3719, 2, 1, 2, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3720, 2, 1, 3, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3721, 2, 1, 4, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3722, 2, 1, 5, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3723, 2, 1, 6, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3724, 2, 1, 7, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3725, 2, 1, 8, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3726, 2, 1, 9, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3727, 2, 1, 10, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3728, 2, 1, 11, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3729, 2, 1, 12, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3730, 2, 1, 13, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3731, 2, 1, 14, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3732, 2, 1, 15, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3733, 2, 1, 16, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3734, 2, 1, 17, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3735, 2, 1, 18, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3736, 2, 1, 19, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3737, 2, 1, 20, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3738, 2, 1, 21, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3739, 2, 1, 22, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3740, 2, 1, 23, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3741, 2, 1, 24, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3742, 2, 1, 25, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3743, 2, 1, 26, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3744, 2, 1, 27, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3745, 2, 1, 28, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3746, 2, 1, 29, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3747, 2, 1, 30, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3748, 2, 1, 31, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);
INSERT INTO `piospa_admin_service_brand_feature` VALUES (3749, 2, 1, 32, 1, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7, '2020-04-28 09:26:25', 7);

-- ----------------------------
-- Table structure for piospa_admin_service_feature
-- ----------------------------
DROP TABLE IF EXISTS `piospa_admin_service_feature`;
CREATE TABLE `piospa_admin_service_feature`  (
  `service_feature_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã map dịch vụ và nhóm chức năng',
  `service_id` int(11) NOT NULL COMMENT 'Mã dịch vụ',
  `feature_group_id` int(11) NOT NULL COMMENT 'Mã nhóm chức năng',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Đánh dấu xóa ',
  `created_at` datetime(0) NOT NULL COMMENT 'Thời điểm tạo',
  `created_by` int(11) NOT NULL COMMENT 'người tạo',
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) COMMENT 'Thời điểm cập nhật',
  `update_by` int(11) NOT NULL COMMENT 'Người cập nhật ',
  PRIMARY KEY (`service_feature_id`) USING BTREE,
  UNIQUE INDEX `service_id_feature_group_id`(`service_id`, `feature_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 229 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách map dịch vụ và nhóm chức năng ' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of piospa_admin_service_feature
-- ----------------------------
INSERT INTO `piospa_admin_service_feature` VALUES (129, 4, 5, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (130, 4, 6, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (131, 4, 10, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (132, 4, 12, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (133, 4, 14, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (134, 4, 17, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (135, 4, 18, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (136, 4, 19, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (137, 4, 20, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (138, 4, 24, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (139, 4, 25, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (140, 4, 26, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (141, 4, 27, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (142, 4, 28, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (143, 4, 29, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (144, 4, 31, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (145, 4, 33, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (146, 4, 32, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (147, 4, 30, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (148, 4, 23, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (149, 4, 9, 0, '2020-04-15 17:40:00', 7, '2020-04-15 17:40:00', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (153, 1, 1, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (154, 1, 2, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (155, 1, 3, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (156, 1, 4, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (157, 1, 5, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (158, 1, 6, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (159, 1, 7, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (160, 1, 8, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (161, 1, 9, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (162, 1, 10, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (163, 1, 11, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (164, 1, 12, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (165, 1, 13, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (166, 1, 14, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (167, 1, 15, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (168, 1, 16, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (169, 1, 17, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (170, 1, 18, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (171, 1, 19, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (172, 1, 20, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (173, 1, 21, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (174, 1, 22, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (175, 1, 23, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (176, 1, 24, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (177, 1, 25, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (178, 1, 26, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (179, 1, 27, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (180, 1, 28, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (181, 1, 29, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (182, 1, 30, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (183, 1, 31, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (184, 1, 32, 0, '2020-04-18 15:48:24', 7, '2020-04-18 15:48:24', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (195, 6, 29, 0, '2020-04-21 13:37:19', 7, '2020-04-21 13:37:19', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (196, 6, 32, 0, '2020-04-21 13:37:19', 7, '2020-04-21 13:37:19', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (210, 3, 32, 0, '2020-04-21 22:15:44', 7, '2020-04-21 22:15:44', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (211, 2, 4, 0, '2020-04-21 23:51:45', 7, '2020-04-21 23:51:45', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (212, 5, 1, 0, '2020-04-22 09:00:47', 7, '2020-04-22 09:00:47', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (213, 5, 9, 0, '2020-04-22 09:00:47', 7, '2020-04-22 09:00:47', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (214, 5, 13, 0, '2020-04-22 09:00:47', 7, '2020-04-22 09:00:47', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (215, 5, 31, 0, '2020-04-22 09:00:47', 7, '2020-04-22 09:00:47', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (216, 5, 32, 0, '2020-04-22 09:00:47', 7, '2020-04-22 09:00:47', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (219, 7, 24, 0, '2020-04-22 09:02:22', 7, '2020-04-22 09:02:22', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (220, 7, 25, 0, '2020-04-22 09:02:22', 7, '2020-04-22 09:02:22', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (221, 8, 32, 0, '2020-04-22 10:04:43', 7, '2020-04-22 10:04:43', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (222, 8, 31, 0, '2020-04-22 10:04:43', 7, '2020-04-22 10:04:43', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (223, 8, 30, 0, '2020-04-22 10:04:43', 7, '2020-04-22 10:04:43', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (225, 9, 32, 0, '2020-04-22 13:43:01', 7, '2020-04-22 13:43:01', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (226, 9, 27, 0, '2020-04-22 13:43:01', 7, '2020-04-22 13:43:01', 7);
INSERT INTO `piospa_admin_service_feature` VALUES (228, 10, 30, 0, '2020-04-22 14:31:54', 7, '2020-04-22 14:31:54', 7);

-- ----------------------------
-- Table structure for piospa_brand
-- ----------------------------
DROP TABLE IF EXISTS `piospa_brand`;
CREATE TABLE `piospa_brand`  (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL,
  `tenant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID branch dùng để xác định config multi tenant',
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhãn hàng',
  `brand_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `brand_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'link api của nhà phân phối',
  `brand_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Avatar nhãn hàng',
  `brand_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'banner nhãn hàng',
  `brand_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Giới thiệu về nhãn hàng',
  `brand_contr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'connection string',
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên công ty',
  `company_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã công ty',
  `position` int(11) NOT NULL DEFAULT 0 COMMENT 'Vị trí sắp xếp. Số càng lớn thì nằm phía trên',
   `hotline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên hiển thị',
  `is_published` tinyint(1) NULL DEFAULT 0 COMMENT 'Hiển thị trên app',
  `is_activated` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Cho phép user tương tác với nhãn hàng',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Đã xóa',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thời gian cập nhật',
  `created_by` int(11) NOT NULL COMMENT 'người tạo',
  `updated_by` int(11) NOT NULL COMMENT 'người cập nhật',
  PRIMARY KEY (`brand_id`) USING BTREE,
  INDEX `tenant_id`(`tenant_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách nhà phân phối' ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
