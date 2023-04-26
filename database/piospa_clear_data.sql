/*
 Navicat Premium Data Transfer

 Source Server         : WAO
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : piospa_clear_tung

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 29/04/2020 10:31:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for actions
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'tên slug chức năng',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'tên chức năng',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO `actions` VALUES (1, 'read-customer-appointment-list-day', 'Danh sách lịch hẹn - Theo ngày', 0, '2019-04-08 22:12:12', '2019-04-08 01:12:12');
INSERT INTO `actions` VALUES (2, 'admin.customer_appointment.submitModalAdd', 'Danh sách lịch hẹn - Thêm mới', 1, '2019-04-08 22:13:27', '2019-04-08 01:13:27');
INSERT INTO `actions` VALUES (3, 'detail-customer-appointment', 'Chi tiết lịch hẹn', 0, '2019-04-08 22:13:53', '2019-04-08 01:13:53');
INSERT INTO `actions` VALUES (4, 'admin.customer_appointment.submitModalEdit', 'Chi tiết lịch hẹn - Chỉnh sửa lịch hẹn', 1, '2019-04-08 22:14:24', '2019-04-08 01:14:24');
INSERT INTO `actions` VALUES (5, 'admin.customer_appointment.submitEdit', 'Chi tiết lịch hẹn - Xác nhận lịch hẹn', 1, '2019-04-08 22:15:15', '2019-04-08 01:15:15');
INSERT INTO `actions` VALUES (6, 'read-customer-appointment-week', 'Danh sách lịch hẹn - Theo tuần', 0, '2019-04-08 22:15:53', '2019-04-08 01:15:53');
INSERT INTO `actions` VALUES (7, 'edit-customer-appointment-week', 'Danh sách lịch hẹn - Theo tuần - Chỉnh sửa lịch hẹn', 0, '2019-04-08 22:17:01', '2019-04-08 01:17:01');
INSERT INTO `actions` VALUES (8, 'detail-customer-appointment-receipt', 'Chi tiết lịch hẹn  - Thanh toán', 0, '2019-04-08 22:18:08', '2019-04-08 01:18:08');
INSERT INTO `actions` VALUES (9, 'read-list-order', 'Danh sách đơn hàng', 0, '2019-04-08 22:18:29', '2019-04-08 01:18:29');
INSERT INTO `actions` VALUES (10, 'admin.order.submitAdd', 'Thêm mới đơn hàng', 0, '2019-04-08 22:18:54', '2019-04-08 01:18:54');
INSERT INTO `actions` VALUES (11, 'add-order-choose-customer', 'Thêm mới đơn hàng - Chọn khách hàng', 0, '2019-04-08 22:21:31', '2019-04-08 01:21:31');
INSERT INTO `actions` VALUES (12, 'admin.order.add-discount', 'Thêm mới đơn hàng - Xử lý giảm giá từng sản phẩm', 0, '2019-04-08 22:23:19', '2019-04-08 01:23:19');
INSERT INTO `actions` VALUES (13, 'admin.order.add-discount-bill', 'Thêm mới đơn hàng - Giảm giá tổng bill', 0, '2019-04-08 22:23:59', '2019-04-08 01:23:59');
INSERT INTO `actions` VALUES (14, 'admin.order.submitAddReceipt', 'Thêm mới đơn hàng - Thanh toán', 0, '2019-04-08 22:25:26', '2019-04-08 01:25:26');
INSERT INTO `actions` VALUES (16, 'admin.order.remove', 'Xóa đơn hàng', 1, '2019-04-08 22:26:12', '2019-04-08 01:26:12');
INSERT INTO `actions` VALUES (17, 'detail-order', 'Chi tiết đơn hàng', 0, '2019-04-08 22:26:28', '2019-04-08 01:26:28');
INSERT INTO `actions` VALUES (18, 'read-list-customer', 'Danh sách khách hàng', 0, '2019-04-08 22:26:50', '2019-04-08 01:26:50');
INSERT INTO `actions` VALUES (19, 'admin.customer.submitAdd', 'Thêm mới khách hàng', 0, '2019-04-08 22:27:01', '2019-04-08 01:27:01');
INSERT INTO `actions` VALUES (20, 'admin.customer.add-customer-refer', 'Thêm mới khách hàng - Thêm mới người giới thiệu', 0, '2019-04-08 22:27:54', '2019-04-08 01:27:54');
INSERT INTO `actions` VALUES (21, 'admin.customer.add-customer-group', 'Thêm mới khách hàng - Thêm mới nhóm khách hàng', 0, '2019-04-08 22:28:41', '2019-04-08 01:28:41');
INSERT INTO `actions` VALUES (22, 'detail-customer', 'Chi tiết khách hàng', 0, '2019-04-08 22:28:58', '2019-04-08 01:28:58');
INSERT INTO `actions` VALUES (23, 'admin.customer.submitEdit', 'Chỉnh sửa khách hàng', 0, '2019-04-08 22:29:20', '2019-04-08 01:29:20');
INSERT INTO `actions` VALUES (24, 'admin.customer.remove', 'Xóa khách hàng', 1, '2019-04-08 22:29:33', '2019-04-08 01:29:33');
INSERT INTO `actions` VALUES (25, 'admin.customer.change-status', 'Khách hàng - Cập nhật trạng thái', 1, '2019-04-08 22:29:55', '2019-04-08 01:29:55');
INSERT INTO `actions` VALUES (26, 'admin.customer.submitAcitve', 'Khách hàng - Kích hoạt thẻ dịch vụ', 1, '2019-04-08 22:30:31', '2019-04-08 01:30:31');
INSERT INTO `actions` VALUES (27, 'read-service-card', 'Danh sách thẻ dịch vụ', 0, '2019-04-08 22:30:45', '2019-04-08 01:30:45');
INSERT INTO `actions` VALUES (28, 'admin.service-card.submitCreate', 'Thêm mới thẻ dịch vụ', 0, '2019-04-08 22:31:01', '2019-04-08 01:31:01');
INSERT INTO `actions` VALUES (29, 'admin.service-card.submitEdit', 'Chỉnh sửa thẻ dịch vụ', 0, '2019-04-08 22:31:14', '2019-04-08 01:31:14');
INSERT INTO `actions` VALUES (30, 'detail-service-card', 'Chi tiết thẻ dịch vụ', 0, '2019-04-08 22:31:39', '2019-04-08 01:31:39');
INSERT INTO `actions` VALUES (31, 'read-list-service-card-sold', 'Danh sách thẻ dịch vụ đã bán', 0, '2019-04-08 22:32:25', '2019-04-08 01:32:25');
INSERT INTO `actions` VALUES (32, 'read-list-service-card-money-sold', 'Danh sách thẻ tiền đã bán', 0, '2019-04-08 22:33:05', '2019-04-08 01:33:05');
INSERT INTO `actions` VALUES (33, 'detail-service-card-sold', 'Chi tiết thẻ dịch vụ đã bán', 0, '2019-04-08 22:33:30', '2019-04-08 01:33:30');
INSERT INTO `actions` VALUES (34, 'read-service-branch-price', 'Danh sách giá dịch vụ', 0, '2019-04-08 22:33:50', '2019-04-08 01:33:50');
INSERT INTO `actions` VALUES (35, 'admin.service-branch-price.submit-config', 'Cấu hình giá dịch vụ', 0, '2019-04-08 22:34:08', '2019-04-08 01:34:08');
INSERT INTO `actions` VALUES (36, 'admin.service-branch-price.submit-edit', 'Chỉnh sửa cấu hình giá dịch vụ', 0, '2019-04-08 22:34:42', '2019-04-08 01:34:42');
INSERT INTO `actions` VALUES (37, 'read-product-branch-price', 'Danh sách giá sản phẩm', 0, '2019-04-08 22:35:01', '2019-04-08 01:35:01');
INSERT INTO `actions` VALUES (38, 'admin.product-branch-price.submit-config', 'Cấu hình giá sản phẩm', 0, '2019-04-08 22:35:17', '2019-04-08 01:35:17');
INSERT INTO `actions` VALUES (39, 'admin.product-branch-price.submit-edit', 'Chỉnh sửa cấu hình giá sản phẩm', 0, '2019-04-08 22:35:40', '2019-04-08 01:35:40');
INSERT INTO `actions` VALUES (40, 'read-product-inventory', 'Tồn kho', 0, '2019-04-08 22:35:59', '2019-04-08 01:35:59');
INSERT INTO `actions` VALUES (41, 'admin.product-inventory.list-inventory-input', 'Quản lý kho - Tab nhập kho', 1, '2019-04-08 22:36:29', '2019-04-08 01:36:29');
INSERT INTO `actions` VALUES (42, 'admin.inventory-input.submit-add', 'Thêm phiếu nhập kho', 0, '2019-04-08 22:36:48', '2019-04-08 01:36:48');
INSERT INTO `actions` VALUES (43, 'admin.inventory-input.submit-edit', 'Chỉnh sửa phiếu nhập kho', 0, '2019-04-08 22:37:02', '2019-04-08 01:37:02');
INSERT INTO `actions` VALUES (44, 'admin.inventory-input.remove', 'Xóa phiếu nhập kho', 1, '2019-04-08 22:37:22', '2019-04-08 01:37:22');
INSERT INTO `actions` VALUES (45, 'detail-inventory-input', 'Chi tiết phiếu nhập kho', 0, '2019-04-08 22:37:35', '2019-04-08 01:37:35');
INSERT INTO `actions` VALUES (46, 'admin.product-inventory.list-inventory-input', 'Quản lý kho - Tab xuất kho', 1, '2019-04-08 22:38:06', '2019-04-08 01:38:06');
INSERT INTO `actions` VALUES (47, 'admin.inventory-output.submit-add', 'Thêm phiếu xuất kho', 0, '2019-04-08 22:38:29', '2019-04-08 01:38:29');
INSERT INTO `actions` VALUES (48, 'admin.inventory-output.submit-edit', 'Chỉnh sửa phiếu xuất kho', 0, '2019-04-08 22:38:54', '2019-04-08 01:38:54');
INSERT INTO `actions` VALUES (49, 'admin.inventory-output.remove', 'Xóa phiếu xuất kho', 1, '2019-04-08 22:39:11', '2019-04-08 01:39:11');
INSERT INTO `actions` VALUES (50, 'detail-inventory-output', 'Chi tiết phiếu xuất kho', 0, '2019-04-08 22:39:26', '2019-04-08 01:39:26');
INSERT INTO `actions` VALUES (51, 'admin.product-inventory.list-inventory-transfer', 'Quản lý kho - Tab chuyển kho kho', 1, '2019-04-08 22:39:43', '2019-04-08 01:39:43');
INSERT INTO `actions` VALUES (52, 'admin.inventory-transfer.submit-add', 'Thêm phiếu chuyển kho', 0, '2019-04-08 22:40:05', '2019-04-08 01:40:05');
INSERT INTO `actions` VALUES (53, 'admin.inventory-transfer.submit-edit', 'Chỉnh sửa phiếu chuyển kho', 0, '2019-04-08 22:40:23', '2019-04-08 01:40:23');
INSERT INTO `actions` VALUES (54, 'admin.inventory-transfer.remove', 'Xóa phiếu chuyển kho', 1, '2019-04-08 22:40:47', '2019-04-08 01:40:47');
INSERT INTO `actions` VALUES (55, 'detail-inventory-transfer', 'Chi tiết phiếu chuyển kho', 0, '2019-04-08 22:41:03', '2019-04-08 01:41:03');
INSERT INTO `actions` VALUES (56, 'admin.product-inventory.list-inventory-checking', 'Quản lý kho - Tab kiểm kho', 1, '2019-04-08 22:41:23', '2019-04-08 01:41:23');
INSERT INTO `actions` VALUES (57, 'admin.inventory-checking.submit-add', 'Thêm phiếu kiểm kho', 0, '2019-04-08 22:41:40', '2019-04-08 01:41:40');
INSERT INTO `actions` VALUES (58, 'admin.inventory-checking.submit-edit', 'Chỉnh sửa phiếu kiểm kho', 0, '2019-04-08 22:41:51', '2019-04-08 01:41:51');
INSERT INTO `actions` VALUES (59, 'admin.inventory-checking.remove', 'Xóa phiếu kiểm kho', 1, '2019-04-08 22:42:16', '2019-04-08 01:42:16');
INSERT INTO `actions` VALUES (60, 'detail-inventory-checking', 'Chi tiết phiếu kiểm kho', 0, '2019-04-08 22:42:33', '2019-04-08 01:42:33');
INSERT INTO `actions` VALUES (61, 'admin.sms.config-sms', 'Cấu hình SMS', 0, '2019-04-08 22:42:44', '2019-04-08 01:42:44');
INSERT INTO `actions` VALUES (62, 'admin.sms.setting-sms', 'Cài đặt nội dung gửi SMS', 1, '2019-04-08 22:43:05', '2019-04-08 01:43:05');
INSERT INTO `actions` VALUES (63, 'admin.sms.active-sms-config', 'SMS - Thay đổi trạng thái', 1, '2019-04-08 22:43:22', '2019-04-08 01:43:22');
INSERT INTO `actions` VALUES (64, 'admin.sms.get-config', 'SMS - Cài đặt gửi SMS', 1, '2019-04-08 22:43:43', '2019-04-08 01:43:43');
INSERT INTO `actions` VALUES (65, 'read-list-sms-campaign', 'SMS- Danh sách chiến dịch', 0, '2019-04-08 22:44:06', '2019-04-08 01:44:06');
INSERT INTO `actions` VALUES (66, 'admin.campaign.submit-add', 'SMS -Thêm chiến dịch', 0, '2019-04-08 22:44:40', '2019-04-08 01:44:40');
INSERT INTO `actions` VALUES (67, 'admin.campaign.submit-edit', 'SMS - Chỉnh sửa chiến dịch', 0, '2019-04-08 22:45:08', '2019-04-08 01:45:08');
INSERT INTO `actions` VALUES (68, 'detail-sms-campaign', 'SMS - Chi tiết chiến dịch', 0, '2019-04-08 22:45:37', '2019-04-08 01:45:37');
INSERT INTO `actions` VALUES (69, 'admin.email-auto.submit-config', 'Cấu hình Email', 0, '2019-04-08 22:46:05', '2019-04-08 01:46:05');
INSERT INTO `actions` VALUES (70, 'admin.email-auto.submit-config', 'Cấu hình gửi email', 1, '2019-04-08 22:46:47', '2019-04-08 01:46:47');
INSERT INTO `actions` VALUES (71, 'admin.email-auto.submit-setting-content', 'Email - Cấu hình nội dung gửi', 1, '2019-04-08 22:47:53', '2019-04-08 01:47:53');
INSERT INTO `actions` VALUES (72, 'admin.email-auto.change-status', 'Email - Thay đổi trạng thái', 1, '2019-04-08 22:48:20', '2019-04-08 01:48:20');
INSERT INTO `actions` VALUES (73, 'read-list-email-campaign', 'Email - Danh sách chiến dịch', 0, '2019-04-08 22:49:12', '2019-04-08 01:49:12');
INSERT INTO `actions` VALUES (74, 'admin.email.submitAdd', 'Email - Thêm chiến dịch', 0, '2019-04-08 22:49:36', '2019-04-08 01:49:36');
INSERT INTO `actions` VALUES (75, 'admin.email.submit-edit', 'Email - Chỉnh sửa chiến dịch', 0, '2019-04-08 22:50:08', '2019-04-08 01:50:08');
INSERT INTO `actions` VALUES (76, 'detail-email-campaign', 'Email - Chi tiết chiến dịch', 0, '2019-04-08 22:50:35', '2019-04-08 01:50:35');
INSERT INTO `actions` VALUES (77, 'read-list-customer-group', 'Danh sách nhóm khách hàng', 0, '2019-04-08 22:51:05', '2019-04-08 01:51:05');
INSERT INTO `actions` VALUES (78, 'customer-group.change-status', 'Nhóm khách hàng - Cập nhật trạng thái', 1, '2019-04-08 22:51:41', '2019-04-08 01:51:41');
INSERT INTO `actions` VALUES (79, 'customer-group.add', 'Thêm nhóm khách hàng', 1, '2019-04-08 22:51:58', '2019-04-08 01:51:58');
INSERT INTO `actions` VALUES (80, 'customer-group.edit-submit', 'Chỉnh sửa nhóm khách hàng', 1, '2019-04-08 22:52:12', '2019-04-08 01:52:12');
INSERT INTO `actions` VALUES (81, 'customer-group.remove', 'Xóa nhóm khách hàng', 1, '2019-04-08 22:52:31', '2019-04-08 01:52:31');
INSERT INTO `actions` VALUES (82, 'read-list-customer-source', 'Danh sách nguồn khách hàng', 0, '2019-04-08 22:55:15', '2019-04-08 01:55:15');
INSERT INTO `actions` VALUES (83, 'customer-source.add', 'Thêm nguồn khách hàng', 1, '2019-04-08 22:55:29', '2019-04-08 01:55:29');
INSERT INTO `actions` VALUES (84, 'customer-source.change-status', 'Nguồn khách hàng - Cập nhật trạng thái', 1, '2019-04-08 22:56:03', '2019-04-08 01:56:03');
INSERT INTO `actions` VALUES (85, 'customer-source.edit-submit', 'Chỉnh sửa nguồn khách hàng', 1, '2019-04-08 22:56:16', '2019-04-08 01:56:16');
INSERT INTO `actions` VALUES (86, 'customer-source.remove', 'Xóa nguồn khách hàng', 1, '2019-04-08 22:56:35', '2019-04-08 01:56:35');
INSERT INTO `actions` VALUES (87, 'read-list-product', 'Danh sách sản phẩm', 0, '2019-04-08 22:56:53', '2019-04-08 01:56:53');
INSERT INTO `actions` VALUES (88, 'admin.product.submit-add', 'Thêm sản phẩm', 0, '2019-04-08 22:57:02', '2019-04-08 01:57:02');
INSERT INTO `actions` VALUES (89, 'admin.product.change-status', 'Sản phẩm - Thay đổi trạng thái', 1, '2019-04-08 22:57:29', '2019-04-08 01:57:29');
INSERT INTO `actions` VALUES (90, 'admin.product.submit-edit', 'Chỉnh sửa sản phẩm', 0, '2019-04-08 22:57:37', '2019-04-08 01:57:37');
INSERT INTO `actions` VALUES (91, 'detail-product', 'Chi tiết sản phẩm', 0, '2019-04-08 22:57:45', '2019-04-08 01:57:45');
INSERT INTO `actions` VALUES (92, 'admin.product.remove', 'Xóa sản phẩm', 1, '2019-04-08 22:57:53', '2019-04-08 01:57:53');
INSERT INTO `actions` VALUES (93, 'read-list-product-category', 'Danh sách danh mục sản phẩm', 0, '2019-04-08 22:58:44', '2019-04-08 01:58:44');
INSERT INTO `actions` VALUES (94, 'admin.product-category.add', 'Thêm danh mục sản phẩm', 1, '2019-04-08 22:58:58', '2019-04-08 01:58:58');
INSERT INTO `actions` VALUES (95, 'admin.product-category.submit-edit', 'Chỉnh sửa danh mục sản phẩm', 1, '2019-04-08 22:59:20', '2019-04-08 01:59:20');
INSERT INTO `actions` VALUES (96, 'admin.product-category.change-status', 'Danh mục sản phẩm - Thay đổi trạng thái', 1, '2019-04-08 22:59:53', '2019-04-08 01:59:53');
INSERT INTO `actions` VALUES (97, 'admin.product-category.remove', 'Xóa danh mục sản phẩm', 1, '2019-04-08 23:00:40', '2019-04-08 02:00:40');
INSERT INTO `actions` VALUES (98, 'read-list-product-attribute-group', 'Danh sách nhóm thuộc tính', 0, '2019-04-08 23:01:17', '2019-04-08 02:01:17');
INSERT INTO `actions` VALUES (99, 'admin.product-attribute-group.add', 'Thêm nhóm thuộc tính', 1, '2019-04-08 23:01:27', '2019-04-08 02:01:27');
INSERT INTO `actions` VALUES (100, 'admin.product-attribute-group.submit-edit', 'Chỉnh sửa nhóm thuộc tính', 1, '2019-04-08 23:01:46', '2019-04-08 02:01:46');
INSERT INTO `actions` VALUES (101, 'admin.product-attribute-group.remove', 'Xóa nhóm thuộc tính', 1, '2019-04-08 23:02:04', '2019-04-08 02:02:04');
INSERT INTO `actions` VALUES (102, 'admin.product-attribute-group.change-status', 'Nhóm thuộc tính - Thay đổi trạng thái', 1, '2019-04-08 23:02:33', '2019-04-08 02:02:33');
INSERT INTO `actions` VALUES (103, 'read-list-product-attribute', 'Danh sách thuộc tính', 0, '2019-04-08 23:02:52', '2019-04-08 02:02:52');
INSERT INTO `actions` VALUES (104, 'admin.product-attribute.add', 'Thêm thuộc tính', 1, '2019-04-08 23:03:16', '2019-04-08 02:03:16');
INSERT INTO `actions` VALUES (105, 'admin.product-attribute.submit-edit', 'Chỉnh sửa thuộc tính', 1, '2019-04-08 23:03:25', '2019-04-08 02:03:25');
INSERT INTO `actions` VALUES (106, 'admin.product-attribute.remove', 'Xóa thuộc tính', 1, '2019-04-08 23:03:43', '2019-04-08 02:03:43');
INSERT INTO `actions` VALUES (107, 'admin.product-attribute.change-status', 'Thuộc tính - Thay đổi trạng thái', 1, '2019-04-08 23:04:01', '2019-04-08 02:04:01');
INSERT INTO `actions` VALUES (108, 'read-list-product-model', 'Danh sách nhãn hiệu', 0, '2019-04-08 23:04:17', '2019-04-08 02:04:17');
INSERT INTO `actions` VALUES (109, 'admin.product-model.add', 'Thêm nhãn hiệu', 1, '2019-04-08 23:04:31', '2019-04-08 02:04:31');
INSERT INTO `actions` VALUES (110, 'admin.product-model.submit-edit', 'Chỉnh sửa nhãn hiệu', 1, '2019-04-08 23:04:43', '2019-04-08 02:04:43');
INSERT INTO `actions` VALUES (111, 'admin.product-model.remove', 'Xóa nhãn hiệu', 1, '2019-04-08 23:05:04', '2019-04-08 02:05:04');
INSERT INTO `actions` VALUES (112, 'read-list-supplier', 'Danh sách nhà cung cấp', 0, '2019-04-08 23:05:19', '2019-04-08 02:05:19');
INSERT INTO `actions` VALUES (113, 'admin.supplier.add', 'Thêm nhà cung cấp', 1, '2019-04-08 23:05:32', '2019-04-08 02:05:32');
INSERT INTO `actions` VALUES (114, 'admin.supplier.submit-edit', 'Chỉnh sửa nhà cung cấp', 1, '2019-04-08 23:05:39', '2019-04-08 02:05:39');
INSERT INTO `actions` VALUES (115, 'admin.supplier.remove', 'Xóa nhà cung cấp', 1, '2019-04-08 23:05:57', '2019-04-08 02:05:57');
INSERT INTO `actions` VALUES (116, 'read-list-service', 'Danh sách dịch vụ', 0, '2019-04-08 23:06:21', '2019-04-08 02:06:21');
INSERT INTO `actions` VALUES (117, 'admin.service.submitAdd', 'Thêm dịch vụ', 0, '2019-04-08 23:06:31', '2019-04-08 02:06:31');
INSERT INTO `actions` VALUES (118, 'admin.service.submitEdit', 'Chỉnh sửa dịch vụ', 0, '2019-04-08 23:06:44', '2019-04-08 02:06:44');
INSERT INTO `actions` VALUES (119, 'admin.service.remove', 'Xóa dịch vụ', 1, '2019-04-08 23:06:57', '2019-04-08 02:06:57');
INSERT INTO `actions` VALUES (120, 'admin.service.change-status', 'Dịch vụ - Thay đổi trạng thái', 1, '2019-04-08 23:07:15', '2019-04-08 02:07:15');
INSERT INTO `actions` VALUES (121, 'detail-service', 'Chi tiết dịch vụ', 0, '2019-04-08 23:07:27', '2019-04-08 02:07:27');
INSERT INTO `actions` VALUES (122, 'read-list-service-category', 'Danh sách nhóm dịch vụ', 0, '2019-04-08 23:07:51', '2019-04-08 02:07:51');
INSERT INTO `actions` VALUES (123, 'admin.service_category.submitAdd', 'Thêm nhóm dịch vụ', 1, '2019-04-08 23:08:02', '2019-04-08 02:08:02');
INSERT INTO `actions` VALUES (124, 'admin.service_category.submitEdit', 'Chỉnh sửa nhóm dịch vụ', 1, '2019-04-08 23:08:13', '2019-04-08 02:08:13');
INSERT INTO `actions` VALUES (125, 'admin.service_category.change-status', 'Nhóm dịch vụ - Thay đổi trạng thái', 1, '2019-04-08 23:08:43', '2019-04-08 02:08:43');
INSERT INTO `actions` VALUES (126, 'admin.service_category.remove', 'Xóa nhóm dịch vụ', 1, '2019-04-08 23:08:59', '2019-04-08 02:08:59');
INSERT INTO `actions` VALUES (127, 'read-list-staff', 'Danh sách nhân viên', 0, '2019-04-08 23:09:16', '2019-04-08 02:09:16');
INSERT INTO `actions` VALUES (128, 'admin.staff.submitAdd', 'Thêm nhân viên', 0, '2019-04-08 23:09:24', '2019-04-08 02:09:24');
INSERT INTO `actions` VALUES (129, 'admin.staff.submit-edit', 'Chỉnh sửa nhân viên', 0, '2019-04-08 23:09:35', '2019-04-08 02:09:35');
INSERT INTO `actions` VALUES (130, 'admin.staff.change-status', 'Nhân viên -  Thay đổi trạng thái', 1, '2019-04-08 23:09:58', '2019-04-08 02:09:58');
INSERT INTO `actions` VALUES (131, 'admin.staff.remove', 'Xóa nhân viên', 1, '2019-04-08 23:10:05', '2019-04-08 02:10:05');
INSERT INTO `actions` VALUES (132, 'read-list-department', 'Danh sách phòng ban', 0, '2019-04-08 23:10:21', '2019-04-08 02:10:21');
INSERT INTO `actions` VALUES (133, 'admin.department.add', 'Thêm phòng ban', 1, '2019-04-08 23:10:33', '2019-04-08 02:10:33');
INSERT INTO `actions` VALUES (134, 'admin.department.submit-edit', 'Chỉnh sửa phòng ban', 1, '2019-04-08 23:10:45', '2019-04-08 02:10:45');
INSERT INTO `actions` VALUES (135, 'admin.department.change-status', 'Phòng ban - Thay đổi trạng thái', 1, '2019-04-08 23:10:57', '2019-04-08 02:10:57');
INSERT INTO `actions` VALUES (136, 'admin.department.remove', 'Xóa phòng ban', 1, '2019-04-08 23:11:05', '2019-04-08 02:11:05');
INSERT INTO `actions` VALUES (137, 'read-list-shift', 'Danh sách ca làm việc', 0, '2019-04-08 23:12:22', '2019-04-08 02:12:22');
INSERT INTO `actions` VALUES (138, 'admin.shift.add', 'Thêm ca làm việc', 1, '2019-04-08 23:12:33', '2019-04-08 02:12:33');
INSERT INTO `actions` VALUES (139, 'admin.shift.submit-edit', 'Chỉnh sửa ca làm việc', 1, '2019-04-08 23:12:45', '2019-04-08 02:12:45');
INSERT INTO `actions` VALUES (140, 'admin.shift.change-status', 'Ca làm việc - Thay đổi trạng thái', 1, '2019-04-08 23:13:03', '2019-04-08 02:13:03');
INSERT INTO `actions` VALUES (141, 'admin.shift.remove', 'Xóa ca làm việc', 1, '2019-04-08 23:13:20', '2019-04-08 02:13:20');
INSERT INTO `actions` VALUES (142, 'read-list-warehouse', 'Danh sách kho', 0, '2019-04-08 23:13:36', '2019-04-08 02:13:36');
INSERT INTO `actions` VALUES (143, 'admin.warehouse.submitAdd', 'Thêm kho', 1, '2019-04-08 23:13:50', '2019-04-08 02:13:50');
INSERT INTO `actions` VALUES (144, 'admin.warehouse.submitedit', 'Chỉnh sửa kho', 1, '2019-04-08 23:14:00', '2019-04-08 02:14:00');
INSERT INTO `actions` VALUES (145, 'admin.transport.remove', 'Xóa kho', 1, '2019-04-08 23:14:20', '2019-04-08 02:14:20');
INSERT INTO `actions` VALUES (146, 'admin.transport.submitadd', 'Danh sách đơn vị vận chuyển', 0, '2019-04-08 23:14:37', '2019-04-08 02:14:37');
INSERT INTO `actions` VALUES (147, 'admin.transport.submitadd', 'Thêm đơn vị vận chuyển', 1, '2019-04-08 23:14:47', '2019-04-08 02:14:47');
INSERT INTO `actions` VALUES (148, 'admin.transport.submitedit ', 'Chỉnh sửa đơn vị vận chuyển', 1, '2019-04-08 23:14:55', '2019-04-08 02:14:55');
INSERT INTO `actions` VALUES (149, 'admin.warehouse.delete', 'Xóa đơn vị vận chuyển', 1, '2019-04-08 23:15:08', '2019-04-08 02:15:08');
INSERT INTO `actions` VALUES (150, 'read-list-room', 'Danh sách phòng phục vụ', 0, '2019-04-08 23:15:23', '2019-04-08 02:15:23');
INSERT INTO `actions` VALUES (151, 'admin.room.submitadd', 'Thêm phòng phục vụ', 1, '2019-04-08 23:15:38', '2019-04-08 02:15:38');
INSERT INTO `actions` VALUES (152, 'admin.room.submitedit', 'Chỉnh sửa phòng phục vụ', 1, '2019-04-08 23:15:57', '2019-04-08 02:15:57');
INSERT INTO `actions` VALUES (153, 'admin.room.change-status', 'Phòng phục vụ - Thay đổi trạng thái', 1, '2019-04-08 23:16:11', '2019-04-08 02:16:11');
INSERT INTO `actions` VALUES (154, 'admin.room.remove', 'Xóa phòng phục vụ', 1, '2019-04-08 23:16:19', '2019-04-08 02:16:19');
INSERT INTO `actions` VALUES (155, 'read-list-unit', 'Danh sách đơn vị tính', 0, '2019-04-08 23:16:35', '2019-04-08 02:16:35');
INSERT INTO `actions` VALUES (156, 'admin.unit.submitadd', 'Thêm đơn vị tính', 1, '2019-04-08 23:17:04', '2019-04-08 02:17:04');
INSERT INTO `actions` VALUES (157, 'admin.unit.submitedit', 'Chỉnh sửa đơn vị tính', 1, '2019-04-08 23:17:13', '2019-04-08 02:17:13');
INSERT INTO `actions` VALUES (158, 'admin.unit.remove', 'Xóa đơn vị tính', 1, '2019-04-08 23:17:21', '2019-04-08 02:17:21');
INSERT INTO `actions` VALUES (159, 'read-list-unit-conversion', 'Danh sách đơn vị quy đổi', 0, '2019-04-08 23:17:43', '2019-04-08 02:17:43');
INSERT INTO `actions` VALUES (160, 'admin.unit_conversion.submitadd', 'Thêm đơn vị quy đổi', 1, '2019-04-08 23:17:55', '2019-04-08 02:17:55');
INSERT INTO `actions` VALUES (161, 'admin.unit_conversion.submitedit', 'Chỉnh sửa đơn vị quy đổi', 1, '2019-04-08 23:18:07', '2019-04-08 02:18:07');
INSERT INTO `actions` VALUES (162, 'admin.unit_conversion.remove', 'Xóa đơn vị quy đổi', 1, '2019-04-08 23:18:16', '2019-04-08 02:18:16');
INSERT INTO `actions` VALUES (163, 'report-revenue-branch', 'Báo cáo doanh thu chi nhánh', 0, '2019-04-08 23:19:02', '2019-04-08 02:19:02');
INSERT INTO `actions` VALUES (164, 'report-revenue-customer', 'Báo cáo doanh thu theo khách hàng', 0, '2019-04-08 23:19:15', '2019-04-08 02:19:15');
INSERT INTO `actions` VALUES (165, 'report-revenue-staff', 'Báo cáo doanh thu theo nhân viên', 0, '2019-04-08 23:19:33', '2019-04-08 02:19:33');
INSERT INTO `actions` VALUES (166, 'admin.report-revenue-product', 'Báo cáo doanh thu theo sản phẩm', 0, '2019-04-08 23:19:42', '2019-04-08 02:19:42');
INSERT INTO `actions` VALUES (167, 'admin.report-revenue-service', 'Báo cáo doanh thu theo dịch vụ', 0, '2019-04-08 23:19:52', '2019-04-08 02:19:52');
INSERT INTO `actions` VALUES (168, 'admin.report-revenue-service-card', 'Báo cáo doanh thu theo thẻ dịch vụ', 0, '2019-04-08 23:20:02', '2019-04-08 02:20:02');
INSERT INTO `actions` VALUES (169, 'statistical-customer', 'Thống kê khách hàng', 0, '2019-04-08 23:20:37', '2019-04-08 02:20:37');
INSERT INTO `actions` VALUES (170, 'statistical-branch', 'Thống kê theo chi nhánh', 0, '2019-04-08 23:20:47', '2019-04-08 02:20:47');
INSERT INTO `actions` VALUES (171, 'statistical-service', 'Thống kê thẻ dịch vụ', 0, '2019-04-08 23:21:01', '2019-04-08 02:21:01');
INSERT INTO `actions` VALUES (172, 'statistical-customer-appointment', 'Thống kê lịch hẹn', 0, '2019-04-08 23:21:36', '2019-04-08 02:21:36');
INSERT INTO `actions` VALUES (173, 'statistical-order', 'Thống kê đơn hàng', 0, '2019-04-08 23:21:54', '2019-04-08 02:21:54');
INSERT INTO `actions` VALUES (174, 'statistical-service', 'Thống kê dịch vụ', 0, '2019-04-08 23:23:05', '2019-04-08 02:23:05');
INSERT INTO `actions` VALUES (175, 'config-page-appointment', 'Trang đặt lịch', 0, '2019-04-08 23:26:42', '2019-04-08 02:26:42');
INSERT INTO `actions` VALUES (176, 'config-page-appointment-submit-edit-info', 'Trang đặt lịch - Tab lưu thông tin đơn vị', 0, '2019-04-08 23:27:07', '2019-04-08 02:27:07');
INSERT INTO `actions` VALUES (177, 'config-page-appointment-submit-add-banner', 'Trang đặt lịch - Tab banner - thêm banner', 0, '2019-04-08 23:27:27', '2019-04-08 02:27:27');
INSERT INTO `actions` VALUES (178, 'config-page-appointment-edit-banner', 'Trang đặt lịch - Tab banner - Chỉnh sửa banner', 0, '2019-04-08 23:27:51', '2019-04-08 02:27:51');
INSERT INTO `actions` VALUES (179, 'config-page-appointment-remove-banner', 'Trang đặt lịch - Tab banner - Xóa banner', 0, '2019-04-08 23:28:19', '2019-04-08 02:28:19');
INSERT INTO `actions` VALUES (180, 'config-page-appointment-change-status-time', 'Trang đặt lịch - Tab thời gian hoạt động - Thay đổi trạng thái', 0, '2019-04-08 23:28:39', '2019-04-08 02:28:39');
INSERT INTO `actions` VALUES (181, 'config-page-appointment-submit-edit-time', 'Trang đặt lịch - Tab thời gian hoạt động - Lưu thông tin', 0, '2019-04-08 23:29:00', '2019-04-08 02:29:00');
INSERT INTO `actions` VALUES (182, 'config-page-appointment-change-status-menu', 'Trang đặt lịch - Tab tùy chỉnh menu - Rule menu -  Thay đổi trạng thái', 0, '2019-04-08 23:29:25', '2019-04-08 02:29:25');
INSERT INTO `actions` VALUES (183, 'config-page-appointment-submit-edit-rule-menu', 'Trang đặt lịch - Tab tùy chỉnh menu - Rule menu -  Lưu thông tin', 0, '2019-04-08 23:29:55', '2019-04-08 02:29:55');
INSERT INTO `actions` VALUES (184, 'config-page-appointment-change-status-booking', 'Trang đặt lịch - Tab tùy chỉnh menu - Rule booking -  Thay đổi trạng thái', 0, '2019-04-08 23:30:20', '2019-04-08 02:30:20');
INSERT INTO `actions` VALUES (185, 'config-page-appointment-change-status-setting-other', 'Trang đặt lịch - Tab tùy chỉnh khác - Setting other -  Thay đổi trạng thái', 0, '2019-04-08 23:30:41', '2019-04-08 02:30:41');
INSERT INTO `actions` VALUES (186, 'config-page-appointment-submit-edit-day', 'Trang đặt lịch - Tab tùy chỉnh khác - Setting other -  Lưu thông tin', 0, '2019-04-08 23:31:05', '2019-04-08 02:31:05');
INSERT INTO `actions` VALUES (187, 'config-page-appointment-submit-edit-booking-extra', 'Trang đặt lịch - Tab tùy chỉnh khác - Booking extra -  Lưu thông tin', 0, '2019-04-08 23:31:25', '2019-04-08 02:31:25');
INSERT INTO `actions` VALUES (188, 'read-list-config-email-template', 'Template Email - Danh sách cấu hình', 0, '2019-04-08 23:31:53', '2019-04-08 02:31:53');
INSERT INTO `actions` VALUES (189, 'admin.config-email-template.submit-edit', 'Template Email - Lưu thông tin', 0, '2019-04-08 23:32:09', '2019-04-08 02:32:09');
INSERT INTO `actions` VALUES (190, 'admin.config-email-template.change-status-website', 'Template Email - Thay đổi trạng thái website', 0, '2019-04-08 23:32:29', '2019-04-08 02:32:29');
INSERT INTO `actions` VALUES (191, 'admin.config-email-template.change-status-logo', 'Template Email - Thay đổi trạng thái logo', 0, '2019-04-08 23:32:51', '2019-04-08 02:32:51');
INSERT INTO `actions` VALUES (192, 'read-list-voucher', 'Danh sách khuyến mãi', 0, '2019-04-08 23:33:07', '2019-04-08 02:33:07');
INSERT INTO `actions` VALUES (193, 'admin.voucher.submitCreate', 'Thêm mã giảm giá', 0, '2019-04-08 23:33:16', '2019-04-08 02:33:16');
INSERT INTO `actions` VALUES (194, 'admin.voucher.submitEdit', 'Chỉnh sửa mã giảm gá', 0, '2019-04-08 23:33:28', '2019-04-08 02:33:28');
INSERT INTO `actions` VALUES (195, 'admin.voucher.delete', 'Xóa khuyến mãi', 1, '2019-04-08 23:33:38', '2019-04-08 02:33:38');
INSERT INTO `actions` VALUES (196, 'admin.voucher.changeStatus', 'Khuyến mãi - Thay đổi trạng thái', 1, '2019-04-08 23:33:56', '2019-04-08 02:33:56');
INSERT INTO `actions` VALUES (197, 'read-list-banch', 'Danh sách chi nhánh', 0, '2019-04-08 23:34:13', '2019-04-08 02:34:13');
INSERT INTO `actions` VALUES (198, 'admin.branch.add', 'Thêm chi nhánh', 1, '2019-04-08 23:34:21', '2019-04-08 02:34:21');
INSERT INTO `actions` VALUES (199, 'admin.branch.submit-edit', 'Chỉnh sửa chi nhánh', 1, '2019-04-08 23:34:28', '2019-04-08 02:34:28');
INSERT INTO `actions` VALUES (200, 'admin.branch.delete', 'Xóa chi nhánh', 1, '2019-04-08 23:34:36', '2019-04-08 02:34:36');
INSERT INTO `actions` VALUES (201, 'admin.branch.change-status', 'Chi nhánh - Thay đổi trạng thái', 1, '2019-04-08 23:34:51', '2019-04-08 02:34:51');
INSERT INTO `actions` VALUES (202, 'read-list-order-source', 'Danh sách nguồn đơn hàng', 0, '2019-04-08 23:35:05', '2019-04-08 02:35:05');
INSERT INTO `actions` VALUES (203, 'admin.order-source.add', 'Thêm nguồn đơn hàng', 1, '2019-04-08 23:35:17', '2019-04-08 02:35:17');
INSERT INTO `actions` VALUES (204, 'admin.order-source.submit-edit', 'Chỉnh sửa nguồn đơn hàng', 1, '2019-04-08 23:35:29', '2019-04-08 02:35:29');
INSERT INTO `actions` VALUES (205, 'admin.order-source.remove', 'Xóa nguồn đơn hàng', 1, '2019-04-08 23:35:40', '2019-04-08 02:35:40');
INSERT INTO `actions` VALUES (206, 'admin.order-source.change-status', 'Nguồn đơn hàng - Thay đổi trạng thái', 1, '2019-04-08 23:35:53', '2019-04-08 02:35:53');
INSERT INTO `actions` VALUES (207, 'read-list-member-level', 'Danh sách cấp độ thành viên', 0, '2019-04-08 23:36:10', '2019-04-08 02:36:10');
INSERT INTO `actions` VALUES (208, 'admin.member-level.submitadd', 'Thêm cấp độ thành viên', 1, '2019-04-08 23:36:23', '2019-04-08 02:36:23');
INSERT INTO `actions` VALUES (209, 'admin.member-level.submitedit', 'Chỉnh sửa cấp độ thành viên', 1, '2019-04-08 23:36:37', '2019-04-08 02:36:37');
INSERT INTO `actions` VALUES (210, 'admin.member-level.remove', 'Xóa cấp độ thành viên', 1, '2019-04-08 23:36:48', '2019-04-08 02:36:48');
INSERT INTO `actions` VALUES (211, 'admin.member-level.change-status', 'Cấp độ thành viên - Thay đổi trạng thái', 1, '2019-04-08 23:37:01', '2019-04-08 02:37:01');
INSERT INTO `actions` VALUES (212, 'admin.config-print-service-card.submit-edit', 'Cấu hình thẻ in', 0, '2019-04-08 23:37:14', '2019-04-08 02:37:14');
INSERT INTO `actions` VALUES (213, 'admin.config-print-bill.submitEdit', 'Cấu hình in hóa đơn', 0, '2019-04-08 23:37:29', '2019-04-08 02:37:29');
INSERT INTO `actions` VALUES (214, 'admin.service-card.change-status', 'Thẻ dịch vụ - Thay đổi trạng thái', 1, NULL, NULL);
INSERT INTO `actions` VALUES (215, 'admin.email-auto.email-template', 'Chọn template email', 1, NULL, NULL);
INSERT INTO `actions` VALUES (216, 'admin.unit.change-status', 'Đơn vị tính - Thay đổi trạng thái', 1, NULL, NULL);
INSERT INTO `actions` VALUES (217, 'admin.service-card.delete', 'Xóa thẻ dịch vụ', 1, '2019-04-12 00:00:00', '2019-04-11 17:00:00');
INSERT INTO `actions` VALUES (218, 'admin.staff-title.submitadd', 'Thêm chức vụ', 1, NULL, NULL);
INSERT INTO `actions` VALUES (219, 'admin.staff-title.remove', 'Xóa chức vụ', 1, NULL, NULL);
INSERT INTO `actions` VALUES (220, 'admin.staff-title.submitedit', 'Chỉnh sửa chức vụ', 1, NULL, NULL);
INSERT INTO `actions` VALUES (221, 'admin.staff-title.change-status', 'Chức vụ - Thay đổi trạng thái', 1, NULL, NULL);
INSERT INTO `actions` VALUES (222, 'admin.customer.import-excel', 'Import khách hàng', 1, NULL, NULL);
INSERT INTO `actions` VALUES (223, 'admin.customer.submit-process-card', 'Thêm thẻ liệu trình', 1, NULL, NULL);
INSERT INTO `actions` VALUES (224, 'admin.order.print-bill2', 'In hóa đơn', 1, NULL, NULL);
INSERT INTO `actions` VALUES (225, 'admin.order.cancel', 'Hủy đơn hàng', 1, '2019-10-06 00:00:00', '2019-10-05 17:00:00');

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu`  (
  `admin_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `admin_menu_category_id` int(11) NULL DEFAULT NULL,
  `admin_menu_route` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `admin_menu_icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Tên icon',
  `admin_menu_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `admin_menu_position` int(11) NULL DEFAULT NULL COMMENT 'Vị trí ',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`admin_menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES (1, 'Trang chủ', 1, 'dashbroad', 'flaticon-line-graph', NULL, 1, NULL, '2019-11-09 18:17:55');
INSERT INTO `admin_menu` VALUES (2, 'Lịch hẹn', 1, 'admin.customer_appointment.list-day', NULL, 'uploads/admin/icon/icon-calendar.png', 2, NULL, NULL);
INSERT INTO `admin_menu` VALUES (3, 'Đơn hàng', 1, 'admin.order', NULL, 'uploads/admin/icon/icon-order.png', 3, NULL, NULL);
INSERT INTO `admin_menu` VALUES (4, 'Khách hàng', 1, 'admin.customer', NULL, 'uploads/admin/icon/icon-member.png', 4, NULL, NULL);
INSERT INTO `admin_menu` VALUES (5, 'Khuyến mãi (Voucher)', 1, 'admin.voucher', NULL, 'uploads/admin/icon/icon-promotion.png', 5, NULL, NULL);
INSERT INTO `admin_menu` VALUES (6, 'Thẻ dịch vụ đã bán', 1, 'admin.service-card.sold.service-card', 'fa fa-id-card', NULL, 6, NULL, NULL);
INSERT INTO `admin_menu` VALUES (7, 'Thẻ tiền đã bán', 1, 'admin.service-card.sold.service-money', 'fa fa-credit-card', NULL, 7, NULL, '2019-04-17 12:15:07');
INSERT INTO `admin_menu` VALUES (8, 'Dịch vụ', 2, 'admin.service', NULL, 'uploads/admin/icon/icon-services.png', 1, NULL, '2019-04-17 12:19:39');
INSERT INTO `admin_menu` VALUES (9, 'Giá dịch vụ', 2, 'admin.service-branch-price', NULL, 'uploads/admin/icon/icon-price.png', 2, NULL, '2019-04-17 12:17:15');
INSERT INTO `admin_menu` VALUES (10, 'Sản phẩm', 2, 'admin.product', NULL, 'uploads/admin/icon/icon-product.png', 3, NULL, '2019-04-17 12:19:48');
INSERT INTO `admin_menu` VALUES (11, 'Giá sản phẩm', 2, 'admin.product-branch-price', NULL, 'uploads/admin/icon/icon-price.png', 4, NULL, NULL);
INSERT INTO `admin_menu` VALUES (12, 'Chi nhánh', 2, 'admin.branch', 'fa fa-university', NULL, 5, NULL, NULL);
INSERT INTO `admin_menu` VALUES (13, 'Nhân viên', 2, 'admin.staff', NULL, 'uploads/admin/icon/icon-staff.png', 6, NULL, NULL);
INSERT INTO `admin_menu` VALUES (14, 'Thẻ dịch vụ', 2, 'admin.service-card', NULL, 'uploads/admin/icon/icon-services-card.png', 7, NULL, NULL);
INSERT INTO `admin_menu` VALUES (15, 'Chiến dịch SMS', 3, 'admin.sms.sms-campaign', NULL, 'uploads/admin/icon/icon-sms.png', 1, NULL, NULL);
INSERT INTO `admin_menu` VALUES (16, 'Chiến dịch Email', 3, 'admin.email', NULL, 'uploads/admin/icon/icon-email.png', 2, NULL, NULL);
INSERT INTO `admin_menu` VALUES (17, 'Danh sách kho', 4, 'admin.warehouse', 'la la-list-ol', NULL, 1, NULL, '2019-04-17 13:42:53');
INSERT INTO `admin_menu` VALUES (18, 'Tồn kho', 4, 'admin.product-inventory', NULL, 'uploads/admin/icon/icon-kho.png', 2, NULL, NULL);
INSERT INTO `admin_menu` VALUES (19, 'Nhà cung cấp', 4, 'admin.supplier', 'la la-suitcase', NULL, 3, NULL, NULL);
INSERT INTO `admin_menu` VALUES (20, 'SMS', 5, 'admin.sms.config-sms', '', 'uploads/admin/icon/icon-sms.png', 1, NULL, NULL);
INSERT INTO `admin_menu` VALUES (21, 'Email', 5, 'admin.email-auto', NULL, 'uploads/admin/icon/icon-email.png', 2, NULL, NULL);
INSERT INTO `admin_menu` VALUES (22, 'Trang đặt lịch', 5, 'admin.config.page-appointment', 'la la-calendar', NULL, 3, NULL, NULL);
INSERT INTO `admin_menu` VALUES (23, 'In thẻ dịch vụ', 5, 'admin.config-print-service-card', 'la la-cc-mastercard', NULL, 4, NULL, '2019-04-20 16:56:30');
INSERT INTO `admin_menu` VALUES (24, 'Template email', 5, 'admin.config-email-template', 'la la-envelope', NULL, 5, NULL, NULL);
INSERT INTO `admin_menu` VALUES (25, 'Hóa đơn', 5, 'admin.config-print-bill', 'la la-print', NULL, 6, NULL, NULL);
INSERT INTO `admin_menu` VALUES (26, 'Chi nhánh', 6, 'admin.report-revenue.branch', NULL, 'uploads/admin/icon/icon-report.png', 1, NULL, '2019-04-22 18:18:13');
INSERT INTO `admin_menu` VALUES (27, 'Khách hàng', 6, 'admin.report-revenue.customer', NULL, 'uploads/admin/icon/icon-member.png', 2, NULL, '2019-04-22 18:18:23');
INSERT INTO `admin_menu` VALUES (28, 'Nhân viên', 6, 'admin.report-revenue.staff', NULL, 'uploads/admin/icon/icon-staff.png', 3, NULL, '2019-04-22 18:18:35');
INSERT INTO `admin_menu` VALUES (29, 'Sản phẩm', 6, 'admin.report-revenue.product', NULL, 'uploads/admin/icon/icon-product.png', 4, NULL, '2019-04-22 18:18:46');
INSERT INTO `admin_menu` VALUES (30, 'Dịch vụ', 6, 'admin.report-revenue.service', NULL, 'uploads/admin/icon/icon-services.png', 5, NULL, '2019-04-22 18:18:54');
INSERT INTO `admin_menu` VALUES (31, 'Thẻ dịch vụ', 6, 'admin.report-revenue.service-card', NULL, 'uploads/admin/icon/icon-services-card.png', 6, NULL, '2019-04-22 18:19:02');
INSERT INTO `admin_menu` VALUES (32, 'Khách hàng', 7, 'admin.report-growth.customer', 'la la-user-secret', NULL, 1, NULL, '2019-04-22 18:19:14');
INSERT INTO `admin_menu` VALUES (33, 'Chi nhánh', 7, 'admin.report-growth.branch', 'la la-university', NULL, 2, NULL, '2019-04-22 18:19:25');
INSERT INTO `admin_menu` VALUES (34, 'Thẻ dịch vụ', 7, 'admin.report-growth.service-card', 'la la-credit-card', NULL, 3, NULL, '2019-04-22 18:19:35');
INSERT INTO `admin_menu` VALUES (35, 'Lịch hẹn', 7, 'admin.report-customer-appointment', 'la la-calendar-times-o', NULL, 4, NULL, '2019-04-22 18:19:44');
INSERT INTO `admin_menu` VALUES (36, 'Đơn hàng', 7, 'admin.statistical.order', 'la la-file-text-o', NULL, 5, NULL, '2019-04-22 18:19:54');
INSERT INTO `admin_menu` VALUES (37, 'Dịch vụ', 7, 'admin.report-growth.service', NULL, 'uploads/admin/icon/icon-thong-ke.png', 6, NULL, '2019-04-22 18:20:07');
INSERT INTO `admin_menu` VALUES (38, 'Danh mục sản phẩm', 8, 'admin.product-category', 'la la-list', NULL, 1, NULL, '2019-05-07 09:02:40');
INSERT INTO `admin_menu` VALUES (39, 'Nhóm thuộc tính', 8, 'admin.product-attribute-group', 'la la-cubes', NULL, 2, NULL, NULL);
INSERT INTO `admin_menu` VALUES (40, 'Thuộc tính', 8, 'admin.product-attribute', 'la la-cube', '', 3, NULL, NULL);
INSERT INTO `admin_menu` VALUES (41, 'Nhãn hiệu', 8, 'admin.product-model', 'la la-skyatlas', NULL, 4, NULL, NULL);
INSERT INTO `admin_menu` VALUES (42, 'Nhóm dịch vụ', 8, 'admin.service_category', 'la la-object-group', NULL, 5, NULL, NULL);
INSERT INTO `admin_menu` VALUES (43, 'Phòng ban', 8, 'admin.department', 'fa fa-home', NULL, 6, NULL, NULL);
INSERT INTO `admin_menu` VALUES (44, 'Ca làm việc', 8, 'admin.shift', 'la la-clock-o', NULL, 7, NULL, NULL);
INSERT INTO `admin_menu` VALUES (45, 'Ngành nghề kinh doanh', 8, 'admin.bussiness', 'la la-deviantart', NULL, 8, NULL, NULL);
INSERT INTO `admin_menu` VALUES (46, 'Nguồn đơn hàng', 8, 'admin.order-source', 'la la-clipboard', NULL, 9, NULL, NULL);
INSERT INTO `admin_menu` VALUES (47, 'Nhóm thẻ dịch vụ', 8, 'admin.service-card-group', 'la la-object-group', NULL, 10, NULL, '2019-05-07 08:38:33');
INSERT INTO `admin_menu` VALUES (48, 'Nhóm khách hàng', 8, 'customer-group', 'la la-users', NULL, 11, NULL, NULL);
INSERT INTO `admin_menu` VALUES (49, 'Nguồn khách hàng', 8, 'customer-source', 'la la-gear', NULL, 12, NULL, NULL);
INSERT INTO `admin_menu` VALUES (50, 'Cấp độ thành viên', 8, 'admin.member-level', 'la la-level-up', NULL, 13, NULL, NULL);
INSERT INTO `admin_menu` VALUES (51, 'Đơn vị vận chuyển', 8, 'admin.transport', 'flaticon-truck', NULL, 14, NULL, NULL);
INSERT INTO `admin_menu` VALUES (52, 'Phòng phục vụ', 8, 'admin.room', 'flaticon-interface-9', NULL, 15, NULL, NULL);
INSERT INTO `admin_menu` VALUES (53, 'Danh sách đơn vị tính', 8, 'admin.unit', 'flaticon-profile-1', NULL, 16, NULL, NULL);
INSERT INTO `admin_menu` VALUES (54, 'Danh sách quy đổi', 8, 'admin.unit_conversion', 'flaticon-interface-9', NULL, 17, NULL, NULL);
INSERT INTO `admin_menu` VALUES (55, 'Chức vụ', 8, 'admin.staff-title', NULL, 'uploads/admin/icon/icon-thong-ke.png', 18, NULL, NULL);
INSERT INTO `admin_menu` VALUES (56, 'Lịch hẹn hủy', 8, 'admin.customer_appointment.index-cancel', NULL, 'uploads/admin/icon/icon-thong-ke.png', 19, NULL, NULL);
INSERT INTO `admin_menu` VALUES (57, 'Lịch hẹn trễ', 8, 'admin.customer_appointment.index-late', NULL, 'uploads/admin/icon/icon-thong-ke.png', 20, NULL, NULL);
INSERT INTO `admin_menu` VALUES (58, 'Nhóm quyền', 5, 'admin.authorization', 'la la-user-secret', NULL, 21, NULL, '2019-12-23 21:56:14');
INSERT INTO `admin_menu` VALUES (61, 'Nhóm quyền', 8, 'admin.role-group', 'la la-angle-double-down', NULL, 23, NULL, NULL);
INSERT INTO `admin_menu` VALUES (62, 'Công nợ', 2, 'admin.receipt', 'a la-clipboard', NULL, 8, NULL, NULL);
INSERT INTO `admin_menu` VALUES (63, 'Công nợ', 6, 'admin.report-debt-branch', 'la la-indent', NULL, 7, NULL, '2019-10-05 16:40:21');
INSERT INTO `admin_menu` VALUES (64, 'Nhóm khách hàng nhận thông báo', 8, 'admin.customer-group-filter', 'fla flaticon-presentation', NULL, 24, '2019-10-23 00:00:00', '2019-10-23 07:10:40');
INSERT INTO `admin_menu` VALUES (65, 'Hoa Hồng Nhân viên', 6, 'admin.report-staff-commission', NULL, 'uploads/admin/icon/icon-staff.png', 8, '2019-11-15 00:00:00', '2019-04-22 18:18:35');
INSERT INTO `admin_menu` VALUES (66, 'Quy tắc điểm thưởng', 5, 'admin.point-reward-rule', 'fa flaticon-trophy', NULL, 7, '2019-11-20 00:00:00', '2019-11-20 00:00:00');
INSERT INTO `admin_menu` VALUES (67, 'Thời gian thiết lập thứ hạng', 5, 'admin.time-reset-rank', 'la la-history', NULL, 8, '2019-12-23 21:57:20', '2019-12-23 21:57:28');
INSERT INTO `admin_menu` VALUES (68, 'Quản lý đơn hàng cần giao', 2, 'delivery', 'la la-history', NULL, 8, NULL, '2020-03-30 15:14:47');
INSERT INTO `admin_menu` VALUES (69, 'Cấu hình thông báo tự động', 9, 'config', 'la la-history', NULL, 1, NULL, '2020-04-16 10:02:07');
INSERT INTO `admin_menu` VALUES (70, 'Quản lý thông báo', 9, 'admin.notification', 'la la-history', NULL, 2, NULL, '2020-04-16 17:06:32');
INSERT INTO `admin_menu` VALUES (71, 'Đơn hàng từ app', 1, 'admin.order-app', NULL, 'uploads/admin/icon/icon-order.png', 3, NULL, '2020-04-27 09:02:31');

-- ----------------------------
-- Table structure for admin_menu_category
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu_category`;
CREATE TABLE `admin_menu_category`  (
  `menu_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `menu_category_icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`menu_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin_menu_category
-- ----------------------------
INSERT INTO `admin_menu_category` VALUES (1, 'Hoạt động', NULL, NULL, '2019-04-17 11:49:42');
INSERT INTO `admin_menu_category` VALUES (2, 'Quản lý ', NULL, NULL, '2019-04-17 11:49:50');
INSERT INTO `admin_menu_category` VALUES (3, 'Marketing', NULL, NULL, '2019-04-17 11:50:00');
INSERT INTO `admin_menu_category` VALUES (4, 'Kho', NULL, NULL, '2019-04-17 11:50:16');
INSERT INTO `admin_menu_category` VALUES (5, 'Cấu hình', NULL, NULL, '2019-04-17 11:50:23');
INSERT INTO `admin_menu_category` VALUES (6, 'Báo cáo doanh thu', NULL, NULL, '2019-04-17 11:50:58');
INSERT INTO `admin_menu_category` VALUES (7, 'Thống kê', NULL, NULL, '2019-04-17 11:51:04');
INSERT INTO `admin_menu_category` VALUES (8, 'Quản lý chung', NULL, NULL, '2020-04-16 10:01:37');
INSERT INTO `admin_menu_category` VALUES (9, 'Thông báo', NULL, NULL, '2020-04-16 10:02:28');

-- ----------------------------
-- Table structure for appointment_services
-- ----------------------------
DROP TABLE IF EXISTS `appointment_services`;
CREATE TABLE `appointment_services`  (
  `appointment_service_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_appointment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(4) NULL DEFAULT 0,
  PRIMARY KEY (`appointment_service_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of appointment_services
-- ----------------------------
INSERT INTO `appointment_services` VALUES (1, 9, 2, 2, '2018-11-23 21:09:29', '2018-11-23 14:09:29', 0);
INSERT INTO `appointment_services` VALUES (2, 15, 3, 2, '2018-11-28 22:03:08', '2018-11-28 15:03:08', 0);
INSERT INTO `appointment_services` VALUES (3, 19, 6, 1, '2018-11-30 14:48:15', '2018-11-30 14:48:15', 0);
INSERT INTO `appointment_services` VALUES (4, 22, 3, 1, '2018-12-09 19:15:47', '2018-12-09 12:15:47', 0);
INSERT INTO `appointment_services` VALUES (5, 24, 4, 1, '2018-12-08 09:09:08', '2018-12-08 09:09:08', 0);
INSERT INTO `appointment_services` VALUES (6, 25, 6, 1, '2018-12-09 19:16:01', '2018-12-09 12:16:01', 0);
INSERT INTO `appointment_services` VALUES (7, 29, 12, 1, '2018-12-15 08:25:03', '2018-12-15 08:25:03', 0);
INSERT INTO `appointment_services` VALUES (8, 31, 6, 1, '2018-12-16 10:52:18', '2018-12-16 10:52:18', 0);
INSERT INTO `appointment_services` VALUES (9, 31, 3, 2, '2018-12-16 10:52:18', '2018-12-16 10:52:18', 0);
INSERT INTO `appointment_services` VALUES (10, 32, 3, 1, '2018-12-20 19:43:11', '2018-12-20 12:43:11', 1);
INSERT INTO `appointment_services` VALUES (11, 33, 2, 1, '2018-12-20 14:04:03', '2018-12-20 14:04:03', 0);
INSERT INTO `appointment_services` VALUES (12, 34, 7, 1, '2018-12-20 22:21:35', '2018-12-20 15:21:35', 0);
INSERT INTO `appointment_services` VALUES (13, 34, 5, 1, '2018-12-20 22:21:35', '2018-12-20 15:21:35', 0);
INSERT INTO `appointment_services` VALUES (14, 35, 7, 1, '2018-12-20 14:53:13', '2018-12-20 14:53:13', 0);
INSERT INTO `appointment_services` VALUES (15, 35, 6, 2, '2018-12-20 14:53:13', '2018-12-20 14:53:13', 0);
INSERT INTO `appointment_services` VALUES (16, 36, 2, 5, '2018-12-21 17:34:02', '2018-12-21 10:34:02', 1);
INSERT INTO `appointment_services` VALUES (17, 38, 2, 1, '2018-12-22 17:52:35', '2018-12-22 10:52:35', 1);
INSERT INTO `appointment_services` VALUES (18, 39, 5, 1, '2018-12-22 17:52:25', '2018-12-22 10:52:25', 1);
INSERT INTO `appointment_services` VALUES (19, 39, 4, 1, '2018-12-22 17:52:25', '2018-12-22 10:52:25', 1);
INSERT INTO `appointment_services` VALUES (20, 46, 5, 1, '2018-12-26 21:19:50', '2018-12-26 14:19:50', 0);
INSERT INTO `appointment_services` VALUES (21, 46, 6, 3, '2018-12-26 21:19:50', '2018-12-26 14:19:50', 0);
INSERT INTO `appointment_services` VALUES (22, 46, 4, 1, '2018-12-26 21:19:50', '2018-12-26 14:19:50', 0);
INSERT INTO `appointment_services` VALUES (23, 46, 14, 1, '2018-12-26 21:19:50', '2018-12-26 14:19:50', 0);
INSERT INTO `appointment_services` VALUES (24, 47, 22, 1, '2018-12-27 20:42:53', '2018-12-27 13:42:53', 0);
INSERT INTO `appointment_services` VALUES (25, 47, 23, 1, '2018-12-26 09:08:48', '2018-12-26 02:08:48', 1);
INSERT INTO `appointment_services` VALUES (26, 47, 6, 1, '2018-12-26 09:08:48', '2018-12-26 02:08:48', 1);
INSERT INTO `appointment_services` VALUES (27, 48, 2, 1, '2018-12-27 13:14:22', '2018-12-27 13:14:22', 0);
INSERT INTO `appointment_services` VALUES (28, 49, 2, 3, '2018-12-28 20:35:05', '2018-12-28 13:35:05', 0);
INSERT INTO `appointment_services` VALUES (29, 54, 7, 1, '2019-01-16 09:02:53', '2019-01-16 02:02:53', 0);

-- ----------------------------
-- Table structure for appointment_source
-- ----------------------------
DROP TABLE IF EXISTS `appointment_source`;
CREATE TABLE `appointment_source`  (
  `appointment_source_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_source_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`appointment_source_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of appointment_source
-- ----------------------------
INSERT INTO `appointment_source` VALUES (1, 'trực tiếp', NULL, '2019-01-16 22:35:39', '2019-01-16 15:36:07', 1, 1, 0);
INSERT INTO `appointment_source` VALUES (2, 'facebook', NULL, '2019-01-16 22:35:43', '2019-01-16 15:35:56', 1, 1, 0);
INSERT INTO `appointment_source` VALUES (3, 'zalo', NULL, '2019-01-16 22:36:08', '2019-01-16 15:36:11', 1, 1, 0);
INSERT INTO `appointment_source` VALUES (4, 'gọi điện', NULL, '2019-01-16 22:36:13', '2019-01-16 15:36:17', 1, 1, 0);
INSERT INTO `appointment_source` VALUES (5, 'Booking online ', NULL, '2019-01-16 22:36:13', '2019-08-15 19:06:02', 1, 1, 0);

-- ----------------------------
-- Table structure for banner_slider
-- ----------------------------
DROP TABLE IF EXISTS `banner_slider`;
CREATE TABLE `banner_slider`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Tên file',
  `type` enum('mobile','desktop') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'desktop',
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `position` int(11) NULL DEFAULT NULL COMMENT 'Vị trí hiển thị',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for booking_extra
-- ----------------------------
DROP TABLE IF EXISTS `booking_extra`;
CREATE TABLE `booking_extra`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Hình ảnh',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of booking_extra
-- ----------------------------
INSERT INTO `booking_extra` VALUES (1, 'Mã gooogle analytics', 'ABC1=1', NULL, 25, NULL, '2019-08-23 15:00:51');
INSERT INTO `booking_extra` VALUES (2, 'SEO Management', NULL, NULL, NULL, NULL, '2019-03-22 20:33:40');
INSERT INTO `booking_extra` VALUES (3, 'Tiêu đề share facebook', 'test', 'uploads/admin/spa-info/20190914/3156847112714092019_config.jpg', 28, NULL, '2019-09-14 21:25:27');

-- ----------------------------
-- Table structure for booking_link
-- ----------------------------
DROP TABLE IF EXISTS `booking_link`;
CREATE TABLE `booking_link`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `link_iframe` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for branch_images
-- ----------------------------
DROP TABLE IF EXISTS `branch_images`;
CREATE TABLE `branch_images`  (
  `branch_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL COMMENT 'Id chi nhánh',
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên file',
  `type` enum('mobile','desktop') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'desktop',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`branch_image_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'Danh sách hình ảnh của chi nhánh' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches`  (
  `branch_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Số điện thoại ',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Email',
  `hot_line` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Hot line ',
  `provinceid` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '79' COMMENT 'Mã Tỉnh / Thành phố',
  `districtid` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '760' COMMENT 'Mã Quận / Huyện',
  `is_representative` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Là chi nhánh chính',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `representative_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'mã đại diện',
  `is_actived` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT 1,
  `updated_by` int(11) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `latitude` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Vĩ độ',
  `longitude` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Kinh độ',
  PRIMARY KEY (`branch_id`) USING BTREE,
  UNIQUE INDEX `branch_name`(`branch_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Danh sách chi nhánh' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand`  (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL,
  `tenant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID branch dùng để xác định config multi tenant',
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhãn hàng',
  `brand_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `brand_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'link api của nhà phân phối',
  `brand_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Avatar nhãn hàng',
  `brand_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'banner nhãn hàng',
  `brand_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Giới thiệu về nhãn hàng',
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên công ty',
  `company_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã công ty',
  `position` int(11) NOT NULL DEFAULT 0 COMMENT 'Vị trí sắp xếp. Số càng lớn thì nằm phía trên',
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên hiển thị',
  `is_published` tinyint(1) NULL DEFAULT 0 COMMENT 'Hiển thị trên app',
  `is_activated` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Cho phép user tương tác với nhãn hàng',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Đã xóa',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thời gian cập nhật',
  `created_by` int(11) NOT NULL COMMENT 'người tạo',
  `updated_by` int(11) NOT NULL COMMENT 'người cập nhật',
  PRIMARY KEY (`brand_id`) USING BTREE,
  INDEX `tenant_id`(`tenant_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách nhà phân phối' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES (1, NULL, 'b33ce6c4-5824-427a-810d-f7618846b38f', 'Piospa', 'piospa', 'https://dp-platform-api.azure-api.net/retbranddev/b33ce6c4-5824-427a-810d-f7618846b38f', 'https://d4zzp4ohshzeb.cloudfront.net/resize/listing-picture/be9517eb-a8c2-398a-a065-b14b8b85c02a?width=1000&height=1000&dpr=2&withoutEnlargement=true', 'https://myassignmenthelpdesk.com/blog/wp-content/uploads/2018/12/Download-Free-Coca-Cola-Wallpaper-940x510.jpeg', '', NULL, NULL, 0, NULL, 1, 1, 1, NULL, '2020-04-16 16:06:08', 1, 1);

-- ----------------------------
-- Table structure for brandname
-- ----------------------------

DROP TABLE IF EXISTS `brandname`;
CREATE TABLE `brandname`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `is_active` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of brandname
-- ----------------------------
INSERT INTO `brandname` VALUES (1, 'PIOSPA', 28, 28, '2019-01-30 00:00:00', '2019-01-30 00:00:00', 1);

-- ----------------------------
-- Table structure for bussiness
-- ----------------------------
DROP TABLE IF EXISTS `bussiness`;
CREATE TABLE `bussiness`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Tên ngành nghề',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Thông tin mô tả',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bussiness
-- ----------------------------
INSERT INTO `bussiness` VALUES (1, 'Salon', 1, 0, NULL, 25, NULL, '2019-03-21 11:01:30', '2019-03-21 11:01:30');
INSERT INTO `bussiness` VALUES (2, 'Masa', 1, 0, NULL, 25, 25, '2019-04-16 14:50:25', '2019-04-16 14:50:31');
INSERT INTO `bussiness` VALUES (3, 'Chăm sóc sắc đẹp', 1, 0, NULL, 25, NULL, '2019-09-14 21:26:54', '2019-09-14 21:26:54');

-- ----------------------------
-- Table structure for commission_log
-- ----------------------------
DROP TABLE IF EXISTS `commission_log`;
CREATE TABLE `commission_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NULL DEFAULT NULL COMMENT 'Khách giới thiệu',
  `branch_id` int(11) NULL DEFAULT NULL COMMENT 'Chi nhánh',
  `money` decimal(10, 0) NULL DEFAULT NULL,
  `type` enum('cash_out','tranfer_money') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'tranfer_money',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`config_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, 'reset_member_ranking', '1', '2019-12-26 10:59:48');
INSERT INTO `config` VALUES (2, 'actived_loyalty', '1', '2019-12-26 10:59:48');
INSERT INTO `config` VALUES (3, 'hot_search', 'Kem dưỡng da;Kem Massage;', '2020-04-23 14:06:08');

-- ----------------------------
-- Table structure for config_email_template
-- ----------------------------
DROP TABLE IF EXISTS `config_email_template`;
CREATE TABLE `config_email_template`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` tinyint(1) NULL DEFAULT 1 COMMENT 'Hiển thị logo',
  `website` tinyint(1) NULL DEFAULT 1 COMMENT 'Hiển thị website ',
  `background_header` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu nền header',
  `color_header` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu chữ header',
  `background_body` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu nền body',
  `color_body` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu chữ body',
  `background_footer` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu nền footer',
  `color_footer` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu chữ footer',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Ảnh minh họa',
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_email_template
-- ----------------------------
INSERT INTO `config_email_template` VALUES (1, 1, 1, 'FFFFFF', '15213F', 'FFFFFF', '201D1D', 'FFFFFF', '201D1D', 'uploads/admin/config-email-template/20190423/1155602333823042019_config.jpg', '2019-04-23 19:44:03', 25);

-- ----------------------------
-- Table structure for config_notification
-- ----------------------------
DROP TABLE IF EXISTS `config_notification`;
CREATE TABLE `config_notification`  (
  `key` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Key để phân biệt notification',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nội dung cấu hình',
  `config_notification_group_id` int(11) NOT NULL COMMENT 'Nhóm cấu hình',
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Active cho phép gửi',
  `display_sort` int(11) NOT NULL DEFAULT 100 COMMENT 'Vị trí hiển thị trong cùng 1 nhóm',
  `send_type` enum('immediately','before','after','in_time') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'immediately' COMMENT 'Loại gửi',
  `schedule_unit` enum('day','hour','minute') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Đơn vị cộng thêm. Dùng hàm Cartbon->add(2, \'hour\') để tính thời gian chính xác',
  `value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Giá trị sẽ + - hoặc đúng thời điểm',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày tạo',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày cạp nhật',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`key`) USING BTREE,
  INDEX `config_notification_group_id`(`config_notification_group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Cấu hình push notification tự động' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_notification
-- ----------------------------
INSERT INTO `config_notification` VALUES ('appointment_A', 'Lịch hẹn cập nhật trạng thái Xác nhận', 2, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 19:27:05', NULL);
INSERT INTO `config_notification` VALUES ('appointment_C', 'Lịch hẹn cập nhật trạng thái Huỷ', 2, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 19:27:05', NULL);
INSERT INTO `config_notification` VALUES ('appointment_R', 'Lịch hẹn gần tới giờ đã đặt', 2, 1, 100, 'before', 'minute', '30', NULL, '2020-04-14 11:39:24', NULL);
INSERT INTO `config_notification` VALUES ('appointment_W', 'Lịch hẹn mới Chờ xử lý', 2, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-16 17:48:41', 28);
INSERT INTO `config_notification` VALUES ('customer_birthday', 'Chúc mừng sinh nhật khách hàng', 4, 1, 100, 'in_time', NULL, '10:00', '2019-10-04 12:34:18', '2020-04-14 11:39:37', 1);
INSERT INTO `config_notification` VALUES ('customer_ranking', 'Chúc mừng khách hàng thăng hạng thành viên', 4, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-14 09:12:26', NULL);
INSERT INTO `config_notification` VALUES ('customer_W', 'Chúc mừng khách hàng mới', 4, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 18:53:49', NULL);
INSERT INTO `config_notification` VALUES ('order_status_A', 'Đơn hàng được cập nhật sang trạng thái Xác nhận', 1, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-16 17:48:19', 28);
INSERT INTO `config_notification` VALUES ('order_status_B', 'Đơn hàng được cập nhật sang trạng thái Đã trả hàng', 1, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-16 17:48:19', 28);
INSERT INTO `config_notification` VALUES ('order_status_C', 'Đơn hàng cập nhật sang trạng thái Hủy', 1, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 18:44:49', NULL);
INSERT INTO `config_notification` VALUES ('order_status_D', 'Đơn hàng được cập nhật sang trạng thái Đang giao', 1, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 18:44:49', NULL);
INSERT INTO `config_notification` VALUES ('order_status_I', 'Đơn hàng được cập nhật sang trạng thái Đã giao', 1, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 18:44:49', NULL);
INSERT INTO `config_notification` VALUES ('order_status_S', 'Đơn hàng đã được thanh toán thành công', 1, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 18:52:57', NULL);
INSERT INTO `config_notification` VALUES ('order_status_W', 'Đơn hàng mới', 1, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-16 17:48:30', 28);
INSERT INTO `config_notification` VALUES ('service_card_expired', 'Thẻ dịch vụ hết hạn sử dụng', 3, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-14 09:20:25', NULL);
INSERT INTO `config_notification` VALUES ('service_card_nearly_expired', 'Thẻ dịch vụ sắp hết hạn sử dụng', 3, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-13 18:24:13', NULL);
INSERT INTO `config_notification` VALUES ('service_card_over_number_used', 'Thẻ dịch vụ hết số lần sử dụng', 3, 1, 100, 'immediately', NULL, NULL, NULL, '2020-04-14 00:47:53', NULL);

-- ----------------------------
-- Table structure for config_notification_group
-- ----------------------------
DROP TABLE IF EXISTS `config_notification_group`;
CREATE TABLE `config_notification_group`  (
  `config_notification_group_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID tự tăng',
  `config_notification_group_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhóm',
  `display_sort` int(11) NULL DEFAULT 100 COMMENT 'Sắp xếp vị trí hiển thị',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thời gian cập nhật',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`config_notification_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Group cấu hình push notification' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_notification_group
-- ----------------------------
INSERT INTO `config_notification_group` VALUES (1, 'Tự động gửi thông báo trạng thái đặt hàng', 100, '2019-10-04 12:25:43', '2019-10-04 05:25:43', 1);
INSERT INTO `config_notification_group` VALUES (2, 'Tự động gửi thông báo trạng thái đặt lịch', 100, '2019-10-04 12:25:35', '2020-04-14 00:17:50', 1);
INSERT INTO `config_notification_group` VALUES (3, 'Tự động gửi thông báo thẻ dịch vụ', 100, '2019-10-04 12:26:17', '2020-04-14 00:18:03', 1);
INSERT INTO `config_notification_group` VALUES (4, 'Tự động gửi thông báo chăm sóc hội viên', 100, '2019-10-04 12:26:47', '2020-04-14 00:18:09', 1);

-- ----------------------------
-- Table structure for config_print_bill
-- ----------------------------
DROP TABLE IF EXISTS `config_print_bill`;
CREATE TABLE `config_print_bill`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `printed_sheet` int(1) NULL DEFAULT 1 COMMENT 'Số liên in',
  `is_print_reply` int(1) NOT NULL DEFAULT 1 COMMENT 'In lại hoặc không',
  `print_time` int(11) NULL DEFAULT NULL COMMENT 'Số lần in',
  `is_show_logo` int(1) NULL DEFAULT 1 COMMENT 'Show logo',
  `is_show_unit` int(1) NULL DEFAULT 1 COMMENT 'Show  tên đơn vị/ cty',
  `is_show_address` int(1) NULL DEFAULT 1 COMMENT 'Show  địa chỉ đơn vị/ cty/ chi nhánh',
  `is_show_phone` int(1) NULL DEFAULT 1 COMMENT 'Show  SĐT',
  `is_show_order_code` int(1) NULL DEFAULT 1 COMMENT 'Show  mã hóa đơn',
  `is_show_cashier` int(1) NULL DEFAULT 1 COMMENT 'Show người thu ngân',
  `is_show_customer` int(1) NULL DEFAULT 1 COMMENT 'Show khách hàng',
  `is_show_datetime` int(1) NULL DEFAULT 1 COMMENT 'Show thời gian in',
  `is_show_footer` int(1) NULL DEFAULT 1 COMMENT 'Show footer',
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `template` enum('k58','k80','A5') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'k80',
  `symbol` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_print_bill
-- ----------------------------
INSERT INTO `config_print_bill` VALUES (1, 1, 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 28, NULL, '2020-01-13 14:14:57', 'k58', NULL);

-- ----------------------------
-- Table structure for config_print_service_card
-- ----------------------------
DROP TABLE IF EXISTS `config_print_service_card`;
CREATE TABLE `config_print_service_card`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `card_type` enum('service_card','money_card','voucher') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Loại thẻ',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Hình logo',
  `name_spa` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Tên spa',
  `background` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu nền',
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Màu chữ',
  `background_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Hình nền',
  `qr_code` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_print_service_card
-- ----------------------------
INSERT INTO `config_print_service_card` VALUES (1, 'service_card', 'uploads/admin/config-print-service-card/20190416/5155539986716042019_config.png', NULL, NULL, NULL, 'uploads/admin/config-print-service-card/20190505/8155702299505052019_config.jpg', 0, NULL, '2019-09-14 10:55:09', NULL, 25);
INSERT INTO `config_print_service_card` VALUES (2, 'money_card', 'uploads/admin/config-print-service-card/20190422/4155594438322042019_config.jpg', NULL, NULL, NULL, 'uploads/admin/config-print-service-card/20190422/6155594438522042019_config.jpg', 1, NULL, '2019-04-22 21:46:25', NULL, 25);
INSERT INTO `config_print_service_card` VALUES (3, 'voucher', 'uploads/admin/config-print-service-card/20190422/6155594441122042019_config.jpg', NULL, NULL, NULL, 'uploads/admin/config-print-service-card/20190422/6155594441422042019_config.jpg', 1, NULL, '2019-04-22 21:46:54', NULL, 25);

-- ----------------------------
-- Table structure for config_time_reset_rank
-- ----------------------------
DROP TABLE IF EXISTS `config_time_reset_rank`;
CREATE TABLE `config_time_reset_rank`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tháng reset rank',
  `type` enum('one_month','two_month','three_month','four_month','six_month','one_year') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config_time_reset_rank
-- ----------------------------
INSERT INTO `config_time_reset_rank` VALUES (11, 'Một tháng reset một lần', '1,2,3,4,5,6,7,8,9,10,11,12', 'one_month', 0, '2019-12-26 10:59:48', '2019-12-26 10:59:48', 28, 28);

-- ----------------------------
-- Table structure for customer_appointment_details
-- ----------------------------
DROP TABLE IF EXISTS `customer_appointment_details`;
CREATE TABLE `customer_appointment_details`  (
  `customer_appointment_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_appointment_id` int(11) NOT NULL,
  `service_id` int(11) NULL DEFAULT NULL COMMENT 'id dịch vụ',
  `staff_id` int(11) NULL DEFAULT NULL COMMENT 'id nhân viên phụ vụ',
  `room_id` int(11) NULL DEFAULT NULL COMMENT 'id phòng',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `customer_order` int(11) NOT NULL COMMENT 'số thứ tự khách hàng , nếu 1 khách hàng có dùng 2 dịch vụ thì sô thứ tự giống nhau',
  PRIMARY KEY (`customer_appointment_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 397 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_appointment_log
-- ----------------------------
DROP TABLE IF EXISTS `customer_appointment_log`;
CREATE TABLE `customer_appointment_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_appointment_id` int(11) NOT NULL,
  `created_type` enum('backend','app') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend',
  `status` enum('new','confirm','cancel','finish','wait') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` int(11) NOT NULL COMMENT 'Người tạo ăn theo type',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_appointments
-- ----------------------------
DROP TABLE IF EXISTS `customer_appointments`;
CREATE TABLE `customer_appointments`  (
  `customer_appointment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_appointment_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Mã lịch hẹn',
  `customer_id` int(11) NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `customer_refer` int(11) NULL DEFAULT NULL COMMENT 'người giới thiệu',
  `appointment_source_id` int(11) UNSIGNED NULL DEFAULT NULL COMMENT 'nguồn khách hàng',
  `customer_appointment_type` enum('direct','appointment','booking') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'appointment',
  `date` date NOT NULL,
  `time` time(0) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` enum('new','confirm','cancel','finish','wait') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'new' COMMENT 'Trạng thái lịch hẹn',
  `customer_quantity` int(11) NULL DEFAULT NULL COMMENT 'số lượng khách ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`customer_appointment_id`) USING BTREE,
  INDEX `appointment_source_id`(`appointment_source_id`) USING BTREE,
  CONSTRAINT `customer_appointments_ibfk_1` FOREIGN KEY (`appointment_source_id`) REFERENCES `appointment_source` (`appointment_source_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 229 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_branch_money
-- ----------------------------
DROP TABLE IF EXISTS `customer_branch_money`;
CREATE TABLE `customer_branch_money`  (
  `branch_id` int(11) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `total_money` decimal(10, 0) NULL DEFAULT NULL COMMENT 'tổng tiền đã active',
  `total_using` decimal(10, 0) NULL DEFAULT NULL COMMENT 'tổng tiền đã sử dụng',
  `balance` decimal(10, 0) NULL DEFAULT NULL COMMENT 'tiền còn lại',
  `commission_money` decimal(10, 0) NULL DEFAULT NULL COMMENT 'Tiền khuyến mãi',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`branch_id`, `customer_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_debt
-- ----------------------------
DROP TABLE IF EXISTS `customer_debt`;
CREATE TABLE `customer_debt`  (
  `customer_debt_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `debt_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'CN_2019091231',
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `debt_type` enum('order','first') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'order',
  `order_id` int(11) NOT NULL,
  `status` enum('unpaid','part-paid','paid','cancel','fail') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0 COMMENT 'Số tiền nợ',
  `amount_paid` int(11) NOT NULL DEFAULT 0 COMMENT 'Số tiền đã thanh toán',
  `note` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'nội dung thu',
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`customer_debt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 120 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_device
-- ----------------------------
DROP TABLE IF EXISTS `customer_device`;
CREATE TABLE `customer_device`  (
  `customer_device_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL COMMENT 'id của user',
  `imei` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'imei thiết bị',
  `model` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Model thiết bị',
  `platform` enum('android','ios','other') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Flatform',
  `os_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'hệ điều hành',
  `app_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Phiên bản app',
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'token bắn notification',
  `date_created` datetime(0) NULL DEFAULT NULL COMMENT 'ngày tạo',
  `last_access` datetime(0) NULL DEFAULT NULL COMMENT 'lần truy cập gần nhất',
  `date_modified` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngày cập nhật ',
  `modified_by` int(11) NULL DEFAULT NULL COMMENT 'người cập nhật',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'người tạo',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `endpoint_arn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'endpoint push amazon',
  PRIMARY KEY (`customer_device_id`) USING BTREE,
  INDEX `customer_id_is_actived_is_deleted`(`customer_id`, `is_actived`, `is_deleted`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'danh sách thiết bị theo nhân viên' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_group_condition
-- ----------------------------
DROP TABLE IF EXISTS `customer_group_condition`;
CREATE TABLE `customer_group_condition`  (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customer_group_condition
-- ----------------------------
INSERT INTO `customer_group_condition` VALUES (1, 'Nhóm khách hàng đã tạo', 'Nhóm khách hàng đã tạo', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (2, 'Thời gian hẹn cách đây', 'Thời gian khách hàng đặt lịch cách \"số ngày\"', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (3, 'Trạng thái lịch hẹn', 'Trạng thái lịch hẹn', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (4, 'Thời gian hẹn', 'Sáng/ trưa/ chiều/ tối', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (5, 'Chưa từng có lịch hẹn', 'Chưa từng có lịch hẹn', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (6, 'Đã sử dụng dịch vụ', 'id dịch vụ', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (7, 'Chưa từng sử dụng dịch vụ', 'id dịch vụ', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (8, 'Đã sử dụng sản phẩm', 'id sản phẩm', '2019-10-22 17:00:00', '2019-10-22 17:00:00');
INSERT INTO `customer_group_condition` VALUES (9, 'Chưa từng sử dụng sản phẩm', 'id sản phẩm', '2019-10-22 17:00:00', '2019-10-22 17:00:00');

-- ----------------------------
-- Table structure for customer_group_define_detail
-- ----------------------------
DROP TABLE IF EXISTS `customer_group_define_detail`;
CREATE TABLE `customer_group_define_detail`  (
  `id` int(10) NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_group_id` int(10) NOT NULL COMMENT 'ID nhóm khách hàng tự định nghĩa',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_group_detail
-- ----------------------------
DROP TABLE IF EXISTS `customer_group_detail`;
CREATE TABLE `customer_group_detail`  (
  `id` int(10) NOT NULL,
  `customer_group_id` int(10) NOT NULL COMMENT 'ID nhóm khách hàng nhận thông báo',
  `group_type` enum('A','B') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'A: Bao gồm, B: Loại bỏ',
  `condition_rule` enum('or','and') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `condition_id` int(11) NOT NULL COMMENT 'ID điều kiện',
  `customer_group_define_id` int(10) NULL DEFAULT NULL COMMENT 'ID nhóm khách hàng tự định nghĩa đã tạo',
  `day_appointment` int(10) NULL DEFAULT NULL,
  `status_appointment` enum('new','confirm','cancel','finish','wait') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `time_appointment` int(11) NULL DEFAULT NULL,
  `not_appointment` tinyint(1) NULL DEFAULT NULL,
  `use_service` int(10) NULL DEFAULT NULL,
  `not_use_service` int(10) NULL DEFAULT NULL,
  `use_product` int(10) NULL DEFAULT NULL,
  `not_use_product` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_group_filter
-- ----------------------------
DROP TABLE IF EXISTS `customer_group_filter`;
CREATE TABLE `customer_group_filter`  (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `filter_group_type` enum('user_define','auto') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Kiểu tự định nghĩa/ auto',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `filter_condition_rule_A` enum('or','and') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `filter_condition_rule_B` enum('or','and') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'Nhóm khách hàng nhận thông báo' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_groups
-- ----------------------------
DROP TABLE IF EXISTS `customer_groups`;
CREATE TABLE `customer_groups`  (
  `customer_group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`customer_group_id`) USING BTREE,
  UNIQUE INDEX `group_name`(`group_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customer_groups
-- ----------------------------
INSERT INTO `customer_groups` VALUES (1, 'Khách Vãng Lai', '2019-09-14 09:31:37', '2019-09-14 09:31:37', 0, 25, 25, 1, 'khach-vang-lai');

-- ----------------------------
-- Table structure for customer_service_cards
-- ----------------------------
DROP TABLE IF EXISTS `customer_service_cards`;
CREATE TABLE `customer_service_cards`  (
  `customer_service_card_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `card_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `service_card_id` int(11) UNSIGNED NOT NULL,
  `actived_date` datetime(0) NULL DEFAULT NULL,
  `expired_date` datetime(0) NULL DEFAULT NULL,
  `number_using` int(11) NULL DEFAULT NULL,
  `count_using` int(11) NULL DEFAULT NULL,
  `money` decimal(10, 0) NULL DEFAULT NULL,
  `money_using` decimal(10, 0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0 COMMENT 'Đánh dấu hủy',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Ghi chú',
  PRIMARY KEY (`customer_service_card_id`) USING BTREE,
  INDEX `service_card_id`(`service_card_id`) USING BTREE,
  CONSTRAINT `customer_service_cards_ibfk_1` FOREIGN KEY (`service_card_id`) REFERENCES `service_cards` (`service_card_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 135 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_sources
-- ----------------------------
DROP TABLE IF EXISTS `customer_sources`;
CREATE TABLE `customer_sources`  (
  `customer_source_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_source_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_source_type` enum('in','out') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in',
  `is_actived` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`customer_source_id`) USING BTREE,
  UNIQUE INDEX `customer_source_name`(`customer_source_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customer_sources
-- ----------------------------
INSERT INTO `customer_sources` VALUES (1, 'Trực tiếp', 'in', 1, 0, 1, 1, '2018-09-30 15:14:53', '2018-09-30 15:15:05', NULL);
INSERT INTO `customer_sources` VALUES (24, 'Qua Facebook', 'in', 1, 0, 25, 25, '2019-09-25 16:39:09', '2019-09-25 16:39:09', 'qua-facebook');
INSERT INTO `customer_sources` VALUES (25, 'Giới thiệu', 'in', 1, 0, 25, 25, '2019-09-25 16:40:18', '2019-09-25 16:40:18', 'gioi-thieu');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NULL DEFAULT NULL,
  `customer_group_id` int(11) NOT NULL,
  `full_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ và Tên',
  `birthday` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày sinh',
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'giới tính',
  `phone1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'số điện thoại1',
  `phone2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'số điện thoại2',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'email1',
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'facebook',
  `province_id` int(11) NULL DEFAULT NULL,
  `district_id` int(11) NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Dia chi',
  `customer_source_id` int(10) UNSIGNED NULL DEFAULT NULL COMMENT 'Nguồn khách hàng',
  `customer_refer_id` int(11) NULL DEFAULT NULL COMMENT 'mã khách giới thiệu',
  `customer_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Link avatar',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ghi chú',
  `date_last_visit` datetime(0) NULL DEFAULT NULL COMMENT 'ngày đến gần nhất',
  `is_actived` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NOT NULL COMMENT 'Ngừoi thay đổi gần nhất',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `zalo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `account_money` decimal(10, 0) NULL DEFAULT NULL COMMENT 'số tiền tài khoản còn lại',
  `customer_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `point` double(16, 2) NULL DEFAULT 0.00,
  `member_level_id` int(11) NULL DEFAULT NULL,
  `password` char(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$12$ePB/hO4n6SSEsmbBjjhAHunkh/zZhLodzFspa4rEW18GBrL538zbO',
  `phone_verified` tinyint(1) NULL DEFAULT 0 COMMENT 'Đã xác thực số điện thoại',
  `FbId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ZaloId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_updated` tinyint(1) NULL DEFAULT 0 COMMENT 'Cập nhật thông tin khi đăng ký tài khoản trên app',
  PRIMARY KEY (`customer_id`) USING BTREE,
  UNIQUE INDEX `customer_id_UNIQUE`(`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 306 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, NULL, 0, 'Khách hàng vãng lai', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '2019-04-11 09:07:10', NULL, '2019-04-18 09:57:45', NULL, NULL, NULL, 0, '$2y$12$ePB/hO4n6SSEsmbBjjhAHunkh/zZhLodzFspa4rEW18GBrL538zbO', 0, NULL, '', 0);

-- ----------------------------
-- Table structure for deliveries
-- ----------------------------
DROP TABLE IF EXISTS `deliveries`;
CREATE TABLE `deliveries`  (
  `delivery_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NULL DEFAULT NULL COMMENT ' ',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `contact_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `contact_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `total_transport_estimate` int(11) NULL DEFAULT 1 COMMENT 'số lần giao hàng dự kiến',
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `is_actived` tinyint(1) NULL DEFAULT NULL,
  `delivery_status` enum('packing','delivered','preparing','delivering','cancel') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'packing',
  `time_order` datetime(0) NOT NULL COMMENT 'Thời gian đặt hàng',
  PRIMARY KEY (`delivery_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for delivery_detail
-- ----------------------------
DROP TABLE IF EXISTS `delivery_detail`;
CREATE TABLE `delivery_detail`  (
  `delivery_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_history_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`delivery_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 151 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for delivery_details
-- ----------------------------
DROP TABLE IF EXISTS `delivery_details`;
CREATE TABLE `delivery_details`  (
  `delivery_detail_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) NOT NULL,
  `transport_id` int(11) NULL DEFAULT NULL COMMENT ' ',
  `staff_id` int(11) NULL DEFAULT NULL,
  `object_id` int(11) NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `status` enum('new','inprogress','success','cancle') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`delivery_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for delivery_history
-- ----------------------------
DROP TABLE IF EXISTS `delivery_history`;
CREATE TABLE `delivery_history`  (
  `delivery_history_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) NOT NULL,
  `transport_id` int(11) NULL DEFAULT NULL COMMENT ' ',
  `transport_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'mã giao hàng',
  `delivery_staff` int(11) NULL DEFAULT NULL,
  `delivery_start` datetime(0) NULL DEFAULT NULL,
  `delivery_end` datetime(0) NULL DEFAULT NULL,
  `contact_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `amount` int(11) NULL DEFAULT NULL COMMENT 'tiền cần thu',
  `verified_payment` tinyint(4) NULL DEFAULT NULL COMMENT 'xác nhận đã thu tiền',
  `verified_by` int(11) NULL DEFAULT NULL COMMENT 'kế toán xác nhận đã thu tiền',
  `status` enum('new','inprogress','success','cancel','fail','confirm') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `time_ship` datetime(0) NULL DEFAULT NULL COMMENT 'thời gian giao hàng dự kiến',
  PRIMARY KEY (`delivery_history_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for delivery_history_log
-- ----------------------------
DROP TABLE IF EXISTS `delivery_history_log`;
CREATE TABLE `delivery_history_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_history_id` int(11) NOT NULL,
  `status` enum('new','inprogress','success','fail','cancel','confirm') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Trạng thái giao hàng',
  `created_by` int(11) NOT NULL COMMENT 'Người tạo sẽ ăn theo type',
  `created_type` enum('backend','app') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'backend',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments`  (
  `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_inactive` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`department_id`) USING BTREE,
  UNIQUE INDEX `department_name`(`department_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES (1, 'Giám đốc', 1, 0, 1, 1, '2018-09-30 08:30:06', '2019-04-16 07:47:02', NULL);
INSERT INTO `departments` VALUES (2, 'Lễ tân', 1, 0, 25, 25, '2019-09-13 09:44:20', '2019-09-13 09:44:20', 'le-tan');
INSERT INTO `departments` VALUES (3, 'Marketing', 1, 0, 25, 25, '2019-09-13 09:44:27', '2019-09-13 09:44:27', 'marketing');
INSERT INTO `departments` VALUES (4, 'Hành chính', 1, 0, 25, 25, '2019-09-13 09:44:53', '2019-09-13 09:44:53', 'hanh-chinh');

-- ----------------------------
-- Table structure for device_token
-- ----------------------------
DROP TABLE IF EXISTS `device_token`;
CREATE TABLE `device_token`  (
  `id` int(11) NOT NULL COMMENT 'ID tự tăng',
  `user_id` int(11) NOT NULL COMMENT 'ID user',
  `platform` enum('ios','android') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hệ điều hành của thiết bị',
  `device_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'token của thiết bị',
  `endpoint_arn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'endpoint push amazon',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thời gian cập nhật'
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Thiết bị push notification. Mỗi user hoặc 1 máy là unique' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for district
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district`  (
  `districtid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `location` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `provinceid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`districtid`) USING BTREE,
  INDEX `provinceid`(`provinceid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO `district` VALUES ('001', 'Ba Đình', 'Quận', '21 02 08N, 105 49 38E', '01');
INSERT INTO `district` VALUES ('002', 'Hoàn Kiếm', 'Quận', '21 01 53N, 105 51 09E', '01');
INSERT INTO `district` VALUES ('003', 'Tây Hồ', 'Quận', '21 04 10N, 105 49 07E', '01');
INSERT INTO `district` VALUES ('004', 'Long Biên', 'Quận', '21 02 21N, 105 53 07E', '01');
INSERT INTO `district` VALUES ('005', 'Cầu Giấy', 'Quận', '21 01 52N, 105 47 20E', '01');
INSERT INTO `district` VALUES ('006', 'Đống Đa', 'Quận', '21 00 56N, 105 49 06E', '01');
INSERT INTO `district` VALUES ('007', 'Hai Bà Trưng', 'Quận', '21 00 27N, 105 51 35E', '01');
INSERT INTO `district` VALUES ('008', 'Hoàng Mai', 'Quận', '20 58 33N, 105 51 22E', '01');
INSERT INTO `district` VALUES ('009', 'Thanh Xuân', 'Quận', '20 59 44N, 105 48 56E', '01');
INSERT INTO `district` VALUES ('016', 'Sóc Sơn', 'Huyện', '21 16 55N, 105 49 46E', '01');
INSERT INTO `district` VALUES ('017', 'Đông Anh', 'Huyện', '21 08 16N, 105 49 38E', '01');
INSERT INTO `district` VALUES ('018', 'Gia Lâm', 'Huyện', '21 01 28N, 105 56 54E', '01');
INSERT INTO `district` VALUES ('019', 'Từ Liêm', 'Huyện', '21 02 39N, 105 45 32E', '01');
INSERT INTO `district` VALUES ('020', 'Thanh Trì', 'Huyện', '20 56 32N, 105 50 55E', '01');
INSERT INTO `district` VALUES ('024', 'Hà Giang', 'Thị Xã', '22 46 23N, 105 02 39E', '02');
INSERT INTO `district` VALUES ('026', 'Đồng Văn', 'Huyện', '23 14 34N, 105 15 48E', '02');
INSERT INTO `district` VALUES ('027', 'Mèo Vạc', 'Huyện', '23 09 10N, 105 26 38E', '02');
INSERT INTO `district` VALUES ('028', 'Yên Minh', 'Huyện', '23 04 20N, 105 10 13E', '02');
INSERT INTO `district` VALUES ('029', 'Quản Bạ', 'Huyện', '23 04 03N, 104 58 05E', '02');
INSERT INTO `district` VALUES ('030', 'Vị Xuyên', 'Huyện', '22 45 50N, 104 56 26E', '02');
INSERT INTO `district` VALUES ('031', 'Bắc Mê', 'Huyện', '22 45 48N, 105 16 26E', '02');
INSERT INTO `district` VALUES ('032', 'Hoàng Su Phì', 'Huyện', '22 41 37N, 104 40 06E', '02');
INSERT INTO `district` VALUES ('033', 'Xín Mần', 'Huyện', '22 38 05N, 104 28 35E', '02');
INSERT INTO `district` VALUES ('034', 'Bắc Quang', 'Huyện', '22 23 42N, 104 55 06E', '02');
INSERT INTO `district` VALUES ('035', 'Quang Bình', 'Huyện', '22 23 07N, 104 37 11E', '02');
INSERT INTO `district` VALUES ('040', 'Cao Bằng', 'Thị Xã', '22 39 20N, 106 15 20E', '04');
INSERT INTO `district` VALUES ('042', 'Bảo Lâm', 'Huyện', '22 52 37N, 105 27 28E', '04');
INSERT INTO `district` VALUES ('043', 'Bảo Lạc', 'Huyện', '22 52 31N, 105 42 41E', '04');
INSERT INTO `district` VALUES ('044', 'Thông Nông', 'Huyện', '22 49 09N, 105 57 05E', '04');
INSERT INTO `district` VALUES ('045', 'Hà Quảng', 'Huyện', '22 53 42N, 106 06 32E', '04');
INSERT INTO `district` VALUES ('046', 'Trà Lĩnh', 'Huyện', '22 48 14N, 106 19 47E', '04');
INSERT INTO `district` VALUES ('047', 'Trùng Khánh', 'Huyện', '22 49 31N, 106 33 58E', '04');
INSERT INTO `district` VALUES ('048', 'Hạ Lang', 'Huyện', '22 42 37N, 106 41 42E', '04');
INSERT INTO `district` VALUES ('049', 'Quảng Uyên', 'Huyện', '22 40 15N, 106 27 42E', '04');
INSERT INTO `district` VALUES ('050', 'Phục Hoà', 'Huyện', '22 33 52N, 106 30 02E', '04');
INSERT INTO `district` VALUES ('051', 'Hoà An', 'Huyện', '22 41 20N, 106 02 05E', '04');
INSERT INTO `district` VALUES ('052', 'Nguyên Bình', 'Huyện', '22 38 52N, 105 57 02E', '04');
INSERT INTO `district` VALUES ('053', 'Thạch An', 'Huyện', '22 28 51N, 106 19 51E', '04');
INSERT INTO `district` VALUES ('058', 'Bắc Kạn', 'Thị Xã', '22 08 00N, 105 51 10E', '06');
INSERT INTO `district` VALUES ('060', 'Pác Nặm', 'Huyện', '22 35 46N, 105 40 25E', '06');
INSERT INTO `district` VALUES ('061', 'Ba Bể', 'Huyện', '22 23 54N, 105 43 30E', '06');
INSERT INTO `district` VALUES ('062', 'Ngân Sơn', 'Huyện', '22 25 50N, 106 01 00E', '06');
INSERT INTO `district` VALUES ('063', 'Bạch Thông', 'Huyện', '22 12 04N, 105 51 01E', '06');
INSERT INTO `district` VALUES ('064', 'Chợ Đồn', 'Huyện', '22 11 18N, 105 34 43E', '06');
INSERT INTO `district` VALUES ('065', 'Chợ Mới', 'Huyện', '21 57 56N, 105 51 29E', '06');
INSERT INTO `district` VALUES ('066', 'Na Rì', 'Huyện', '22 09 48N, 106 05 09E', '06');
INSERT INTO `district` VALUES ('070', 'Tuyên Quang', 'Thị Xã', '21 49 40N, 105 13 12E', '08');
INSERT INTO `district` VALUES ('072', 'Nà Hang', 'Huyện', '22 28 34N, 105 21 03E', '08');
INSERT INTO `district` VALUES ('073', 'Chiêm Hóa', 'Huyện', '22 12 49N, 105 14 32E', '08');
INSERT INTO `district` VALUES ('074', 'Hàm Yên', 'Huyện', '22 05 46N, 105 00 13E', '08');
INSERT INTO `district` VALUES ('075', 'Yên Sơn', 'Huyện', '21 51 53N, 105 18 14E', '08');
INSERT INTO `district` VALUES ('076', 'Sơn Dương', 'Huyện', '21 40 22N, 105 22 57E', '08');
INSERT INTO `district` VALUES ('080', 'Lào Cai', 'Thành Phố', '22 25 07N, 103 58 43E', '10');
INSERT INTO `district` VALUES ('082', 'Bát Xát', 'Huyện', '22 35 50N, 103 44 49E', '10');
INSERT INTO `district` VALUES ('083', 'Mường Khương', 'Huyện', '22 41 05N, 104 08 26E', '10');
INSERT INTO `district` VALUES ('084', 'Si Ma Cai', 'Huyện', '22 39 46N, 104 16 05E', '10');
INSERT INTO `district` VALUES ('085', 'Bắc Hà', 'Huyện', '22 30 08N, 104 18 54E', '10');
INSERT INTO `district` VALUES ('086', 'Bảo Thắng', 'Huyện', '22 22 47N, 104 10 00E', '10');
INSERT INTO `district` VALUES ('087', 'Bảo Yên', 'Huyện', '22 17 38N, 104 25 02E', '10');
INSERT INTO `district` VALUES ('088', 'Sa Pa', 'Huyện', '22 18 54N, 103 54 18E', '10');
INSERT INTO `district` VALUES ('089', 'Văn Bàn', 'Huyện', '22 03 48N, 104 10 59E', '10');
INSERT INTO `district` VALUES ('094', 'Điện Biên Phủ', 'Thành Phố', '21 24 52N, 103 02 31E', '11');
INSERT INTO `district` VALUES ('095', 'Mường Lay', 'Thị Xã', '22 01 47N, 103 07 10E', '11');
INSERT INTO `district` VALUES ('096', 'Mường Nhé', 'Huyện', '22 06 11N, 102 30 54E', '11');
INSERT INTO `district` VALUES ('097', 'Mường Chà', 'Huyện', '21 50 31N, 103 03 15E', '11');
INSERT INTO `district` VALUES ('098', 'Tủa Chùa', 'Huyện', '21 58 19N, 103 23 01E', '11');
INSERT INTO `district` VALUES ('099', 'Tuần Giáo', 'Huyện', '21 38 03N, 103 21 06E', '11');
INSERT INTO `district` VALUES ('100', 'Điện Biên', 'Huyện', '21 15 19N, 103 03 19E', '11');
INSERT INTO `district` VALUES ('101', 'Điện Biên Đông', 'Huyện', '21 14 07N, 103 15 19E', '11');
INSERT INTO `district` VALUES ('102', 'Mường Ảng', 'Huyện', '', '11');
INSERT INTO `district` VALUES ('104', 'Lai Châu', 'Thị Xã', '22 23 15N, 103 24 22E', '12');
INSERT INTO `district` VALUES ('106', 'Tam Đường', 'Huyện', '22 20 16N, 103 32 53E', '12');
INSERT INTO `district` VALUES ('107', 'Mường Tè', 'Huyện', '22 24 16N, 102 43 11E', '12');
INSERT INTO `district` VALUES ('108', 'Sìn Hồ', 'Huyện', '22 17 21N, 103 18 12E', '12');
INSERT INTO `district` VALUES ('109', 'Phong Thổ', 'Huyện', '22 38 24N, 103 22 38E', '12');
INSERT INTO `district` VALUES ('110', 'Than Uyên', 'Huyện', '21 59 35N, 103 45 30E', '12');
INSERT INTO `district` VALUES ('111', 'Tân Uyên', 'Huyện', '', '12');
INSERT INTO `district` VALUES ('116', 'Sơn La', 'Thành Phố', '21 20 39N, 103 54 52E', '14');
INSERT INTO `district` VALUES ('118', 'Quỳnh Nhai', 'Huyện', '21 46 34N, 103 39 02E', '14');
INSERT INTO `district` VALUES ('119', 'Thuận Châu', 'Huyện', '21 24 54N, 103 39 46E', '14');
INSERT INTO `district` VALUES ('120', 'Mường La', 'Huyện', '21 31 38N, 104 02 48E', '14');
INSERT INTO `district` VALUES ('121', 'Bắc Yên', 'Huyện', '21 13 23N, 104 22 09E', '14');
INSERT INTO `district` VALUES ('122', 'Phù Yên', 'Huyện', '21 13 33N, 104 41 51E', '14');
INSERT INTO `district` VALUES ('123', 'Mộc Châu', 'Huyện', '20 49 21N, 104 43 10E', '14');
INSERT INTO `district` VALUES ('124', 'Yên Châu', 'Huyện', '20 59 33N, 104 19 51E', '14');
INSERT INTO `district` VALUES ('125', 'Mai Sơn', 'Huyện', '21 10 08N, 103 59 36E', '14');
INSERT INTO `district` VALUES ('126', 'Sông Mã', 'Huyện', '21 06 04N, 103 43 56E', '14');
INSERT INTO `district` VALUES ('127', 'Sốp Cộp', 'Huyện', '20 52 46N, 103 30 38E', '14');
INSERT INTO `district` VALUES ('132', 'Yên Bái', 'Thành Phố', '21 44 28N, 104 53 42E', '15');
INSERT INTO `district` VALUES ('133', 'Nghĩa Lộ', 'Thị Xã', '21 35 58N, 104 29 22E', '15');
INSERT INTO `district` VALUES ('135', 'Lục Yên', 'Huyện', '22 06 44N, 104 43 12E', '15');
INSERT INTO `district` VALUES ('136', 'Văn Yên', 'Huyện', '21 55 55N, 104 33 51E', '15');
INSERT INTO `district` VALUES ('137', 'Mù Cang Chải', 'Huyện', '21 48 22N, 104 09 01E', '15');
INSERT INTO `district` VALUES ('138', 'Trấn Yên', 'Huyện', '21 42 20N, 104 48 56E', '15');
INSERT INTO `district` VALUES ('139', 'Trạm Tấu', 'Huyện', '21 30 40N, 104 28 03E', '15');
INSERT INTO `district` VALUES ('140', 'Văn Chấn', 'Huyện', '21 34 15N, 104 35 19E', '15');
INSERT INTO `district` VALUES ('141', 'Yên Bình', 'Huyện', '21 52 24N, 104 55 16E', '15');
INSERT INTO `district` VALUES ('148', 'Hòa Bình', 'Thành Phố', '20 50 36N, 105 19 20E', '17');
INSERT INTO `district` VALUES ('150', 'Đà Bắc', 'Huyện', '20 55 58N, 105 04 52E', '17');
INSERT INTO `district` VALUES ('151', 'Kỳ Sơn', 'Huyện', '20 54 06N, 105 23 18E', '17');
INSERT INTO `district` VALUES ('152', 'Lương Sơn', 'Huyện', '20 53 16N, 105 30 55E', '17');
INSERT INTO `district` VALUES ('153', 'Kim Bôi', 'Huyện', '20 40 34N, 105 32 15E', '17');
INSERT INTO `district` VALUES ('154', 'Cao Phong', 'Huyện', '20 41 23N, 105 17 48E', '17');
INSERT INTO `district` VALUES ('155', 'Tân Lạc', 'Huyện', '20 36 44N, 105 15 03E', '17');
INSERT INTO `district` VALUES ('156', 'Mai Châu', 'Huyện', '20 40 56N, 104 59 46E', '17');
INSERT INTO `district` VALUES ('157', 'Lạc Sơn', 'Huyện', '20 29 59N, 105 24 57E', '17');
INSERT INTO `district` VALUES ('158', 'Yên Thủy', 'Huyện', '20 25 42N, 105 37 59E', '17');
INSERT INTO `district` VALUES ('159', 'Lạc Thủy', 'Huyện', '20 29 12N, 105 44 06E', '17');
INSERT INTO `district` VALUES ('164', 'Thái Nguyên', 'Thành Phố', '21 33 20N, 105 48 26E', '19');
INSERT INTO `district` VALUES ('165', 'Sông Công', 'Thị Xã', '21 29 14N, 105 48 47E', '19');
INSERT INTO `district` VALUES ('167', 'Định Hóa', 'Huyện', '21 53 50N, 105 38 01E', '19');
INSERT INTO `district` VALUES ('168', 'Phú Lương', 'Huyện', '21 45 57N, 105 43 22E', '19');
INSERT INTO `district` VALUES ('169', 'Đồng Hỷ', 'Huyện', '21 41 10N, 105 55 43E', '19');
INSERT INTO `district` VALUES ('170', 'Võ Nhai', 'Huyện', '21 47 14N, 106 02 29E', '19');
INSERT INTO `district` VALUES ('171', 'Đại Từ', 'Huyện', '21 36 17N, 105 37 28E', '19');
INSERT INTO `district` VALUES ('172', 'Phổ Yên', 'Huyện', '21 27 08N, 105 45 19E', '19');
INSERT INTO `district` VALUES ('173', 'Phú Bình', 'Huyện', '21 29 36N, 105 57 42E', '19');
INSERT INTO `district` VALUES ('178', 'Lạng Sơn', 'Thành Phố', '21 51 19N, 106 44 50E', '20');
INSERT INTO `district` VALUES ('180', 'Tràng Định', 'Huyện', '22 18 09N, 106 26 32E', '20');
INSERT INTO `district` VALUES ('181', 'Bình Gia', 'Huyện', '22 03 56N, 106 19 01E', '20');
INSERT INTO `district` VALUES ('182', 'Văn Lãng', 'Huyện', '22 01 59N, 106 34 17E', '20');
INSERT INTO `district` VALUES ('183', 'Cao Lộc', 'Huyện', '21 53 05N, 106 50 34E', '20');
INSERT INTO `district` VALUES ('184', 'Văn Quan', 'Huyện', '21 51 04N, 106 33 04E', '20');
INSERT INTO `district` VALUES ('185', 'Bắc Sơn', 'Huyện', '21 48 57N, 106 15 28E', '20');
INSERT INTO `district` VALUES ('186', 'Hữu Lũng', 'Huyện', '21 34 33N, 106 20 33E', '20');
INSERT INTO `district` VALUES ('187', 'Chi Lăng', 'Huyện', '21 40 05N, 106 37 24E', '20');
INSERT INTO `district` VALUES ('188', 'Lộc Bình', 'Huyện', '21 40 41N, 106 58 12E', '20');
INSERT INTO `district` VALUES ('189', 'Đình Lập', 'Huyện', '21 32 07N, 107 07 25E', '20');
INSERT INTO `district` VALUES ('193', 'Hạ Long', 'Thành Phố', '20 52 24N, 107 05 23E', '22');
INSERT INTO `district` VALUES ('194', 'Móng Cái', 'Thành Phố', '21 26 31N, 107 55 09E', '22');
INSERT INTO `district` VALUES ('195', 'Cẩm Phả', 'Thị Xã', '21 03 42N, 107 17 22E', '22');
INSERT INTO `district` VALUES ('196', 'Uông Bí', 'Thị Xã', '21 04 33N, 106 45 07E', '22');
INSERT INTO `district` VALUES ('198', 'Bình Liêu', 'Huyện', '21 33 07N, 107 26 24E', '22');
INSERT INTO `district` VALUES ('199', 'Tiên Yên', 'Huyện', '21 22 24N, 107 22 50E', '22');
INSERT INTO `district` VALUES ('200', 'Đầm Hà', 'Huyện', '21 21 23N, 107 34 32E', '22');
INSERT INTO `district` VALUES ('201', 'Hải Hà', 'Huyện', '21 25 50N, 107 41 26E', '22');
INSERT INTO `district` VALUES ('202', 'Ba Chẽ', 'Huyện', '21 15 40N, 107 09 52E', '22');
INSERT INTO `district` VALUES ('203', 'Vân Đồn', 'Huyện', '20 56 17N, 107 28 02E', '22');
INSERT INTO `district` VALUES ('204', 'Hoành Bồ', 'Huyện', '21 06 30N, 107 02 43E', '22');
INSERT INTO `district` VALUES ('205', 'Đông Triều', 'Huyện', '21 07 10N, 106 34 36E', '22');
INSERT INTO `district` VALUES ('206', 'Yên Hưng', 'Huyện', '20 55 40N, 106 51 05E', '22');
INSERT INTO `district` VALUES ('207', 'Cô Tô', 'Huyện', '21 05 01N, 107 49 10E', '22');
INSERT INTO `district` VALUES ('213', 'Bắc Giang', 'Thành Phố', '21 17 36N, 106 11 18E', '24');
INSERT INTO `district` VALUES ('215', 'Yên Thế', 'Huyện', '21 31 29N, 106 09 27E', '24');
INSERT INTO `district` VALUES ('216', 'Tân Yên', 'Huyện', '21 23 23N, 106 05 55E', '24');
INSERT INTO `district` VALUES ('217', 'Lạng Giang', 'Huyện', '21 21 58N, 106 15 21E', '24');
INSERT INTO `district` VALUES ('218', 'Lục Nam', 'Huyện', '21 18 16N, 106 29 24E', '24');
INSERT INTO `district` VALUES ('219', 'Lục Ngạn', 'Huyện', '21 26 15N, 106 39 09E', '24');
INSERT INTO `district` VALUES ('220', 'Sơn Động', 'Huyện', '21 19 42N, 106 51 09E', '24');
INSERT INTO `district` VALUES ('221', 'Yên Dũng', 'Huyện', '21 12 22N, 106 14 12E', '24');
INSERT INTO `district` VALUES ('222', 'Việt Yên', 'Huyện', '21 16 16N, 106 04 59E', '24');
INSERT INTO `district` VALUES ('223', 'Hiệp Hòa', 'Huyện', '21 15 51N, 105 57 30E', '24');
INSERT INTO `district` VALUES ('227', 'Việt Trì', 'Thành Phố', '21 19 01N, 105 23 35E', '25');
INSERT INTO `district` VALUES ('228', 'Phú Thọ', 'Thị Xã', '21 24 54N, 105 13 46E', '25');
INSERT INTO `district` VALUES ('230', 'Đoan Hùng', 'Huyện', '21 36 56N, 105 08 42E', '25');
INSERT INTO `district` VALUES ('231', 'Hạ Hoà', 'Huyện', '21 35 13N, 105 00 22E', '25');
INSERT INTO `district` VALUES ('232', 'Thanh Ba', 'Huyện', '21 27 04N, 105 09 10E', '25');
INSERT INTO `district` VALUES ('233', 'Phù Ninh', 'Huyện', '21 26 59N, 105 18 13E', '25');
INSERT INTO `district` VALUES ('234', 'Yên Lập', 'Huyện', '21 22 21N, 105 01 25E', '25');
INSERT INTO `district` VALUES ('235', 'Cẩm Khê', 'Huyện', '21 23 04N, 105 05 25E', '25');
INSERT INTO `district` VALUES ('236', 'Tam Nông', 'Huyện', '21 18 24N, 105 14 59E', '25');
INSERT INTO `district` VALUES ('237', 'Lâm Thao', 'Huyện', '21 19 37N, 105 18 09E', '25');
INSERT INTO `district` VALUES ('238', 'Thanh Sơn', 'Huyện', '21 08 32N, 105 04 40E', '25');
INSERT INTO `district` VALUES ('239', 'Thanh Thuỷ', 'Huyện', '21 07 26N, 105 17 18E', '25');
INSERT INTO `district` VALUES ('240', 'Tân Sơn', 'Huyện', '', '25');
INSERT INTO `district` VALUES ('243', 'Vĩnh Yên', 'Thành Phố', '21 18 26N, 105 35 33E', '26');
INSERT INTO `district` VALUES ('244', 'Phúc Yên', 'Thị Xã', '21 18 55N, 105 43 54E', '26');
INSERT INTO `district` VALUES ('246', 'Lập Thạch', 'Huyện', '21 24 45N, 105 25 39E', '26');
INSERT INTO `district` VALUES ('247', 'Tam Dương', 'Huyện', '21 21 40N, 105 33 36E', '26');
INSERT INTO `district` VALUES ('248', 'Tam Đảo', 'Huyện', '21 27 34N, 105 35 09E', '26');
INSERT INTO `district` VALUES ('249', 'Bình Xuyên', 'Huyện', '21 19 48N, 105 39 43E', '26');
INSERT INTO `district` VALUES ('250', 'Mê Linh', 'Huyện', '21 10 53N, 105 42 05E', '01');
INSERT INTO `district` VALUES ('251', 'Yên Lạc', 'Huyện', '21 13 17N, 105 34 44E', '26');
INSERT INTO `district` VALUES ('252', 'Vĩnh Tường', 'Huyện', '21 14 58N, 105 29 37E', '26');
INSERT INTO `district` VALUES ('253', 'Sông Lô', 'Huyện', '', '26');
INSERT INTO `district` VALUES ('256', 'Bắc Ninh', 'Thành Phố', '21 10 48N, 106 03 58E', '27');
INSERT INTO `district` VALUES ('258', 'Yên Phong', 'Huyện', '21 12 40N, 105 59 36E', '27');
INSERT INTO `district` VALUES ('259', 'Quế Võ', 'Huyện', '21 08 44N, 106 11 06E', '27');
INSERT INTO `district` VALUES ('260', 'Tiên Du', 'Huyện', '21 07 37N, 106 02 19E', '27');
INSERT INTO `district` VALUES ('261', 'Từ Sơn', 'Thị Xã', '21 07 12N, 105 57 26E', '27');
INSERT INTO `district` VALUES ('262', 'Thuận Thành', 'Huyện', '21 02 24N, 106 04 10E', '27');
INSERT INTO `district` VALUES ('263', 'Gia Bình', 'Huyện', '21 03 55N, 106 12 53E', '27');
INSERT INTO `district` VALUES ('264', 'Lương Tài', 'Huyện', '21 01 33N, 106 13 28E', '27');
INSERT INTO `district` VALUES ('268', 'Hà Đông', 'Quận', '20 57 25N, 105 45 21E', '01');
INSERT INTO `district` VALUES ('269', 'Sơn Tây', 'Thị Xã', '21 05 51N, 105 28 27E', '01');
INSERT INTO `district` VALUES ('271', 'Ba Vì', 'Huyện', '21 09 40N, 105 22 43E', '01');
INSERT INTO `district` VALUES ('272', 'Phúc Thọ', 'Huyện', '21 06 32N, 105 34 52E', '01');
INSERT INTO `district` VALUES ('273', 'Đan Phượng', 'Huyện', '21 07 13N, 105 40 49E', '01');
INSERT INTO `district` VALUES ('274', 'Hoài Đức', 'Huyện', '21 01 25N, 105 42 03E', '01');
INSERT INTO `district` VALUES ('275', 'Quốc Oai', 'Huyện', '20 58 45N, 105 36 43E', '01');
INSERT INTO `district` VALUES ('276', 'Thạch Thất', 'Huyện', '21 02 17N, 105 33 05E', '01');
INSERT INTO `district` VALUES ('277', 'Chương Mỹ', 'Huyện', '20 52 46N, 105 39 01E', '01');
INSERT INTO `district` VALUES ('278', 'Thanh Oai', 'Huyện', '20 51 44N, 105 46 18E', '01');
INSERT INTO `district` VALUES ('279', 'Thường Tín', 'Huyện', '20 49 59N, 105 22 19E', '01');
INSERT INTO `district` VALUES ('280', 'Phú Xuyên', 'Huyện', '20 43 37N, 105 53 43E', '01');
INSERT INTO `district` VALUES ('281', 'Ứng Hòa', 'Huyện', '20 42 41N, 105 47 58E', '01');
INSERT INTO `district` VALUES ('282', 'Mỹ Đức', 'Huyện', '20 41 53N, 105 43 31E', '01');
INSERT INTO `district` VALUES ('288', 'Hải Dương', 'Thành Phố', '20 56 14N, 106 18 21E', '30');
INSERT INTO `district` VALUES ('290', 'Chí Linh', 'Huyện', '21 07 47N, 106 23 46E', '30');
INSERT INTO `district` VALUES ('291', 'Nam Sách', 'Huyện', '21 00 15N, 106 20 26E', '30');
INSERT INTO `district` VALUES ('292', 'Kinh Môn', 'Huyện', '21 00 04N, 106 30 23E', '30');
INSERT INTO `district` VALUES ('293', 'Kim Thành', 'Huyện', '20 55 40N, 106 30 33E', '30');
INSERT INTO `district` VALUES ('294', 'Thanh Hà', 'Huyện', '20 53 19N, 106 25 43E', '30');
INSERT INTO `district` VALUES ('295', 'Cẩm Giàng', 'Huyện', '20 57 05N, 106 12 29E', '30');
INSERT INTO `district` VALUES ('296', 'Bình Giang', 'Huyện', '20 52 36N, 106 11 24E', '30');
INSERT INTO `district` VALUES ('297', 'Gia Lộc', 'Huyện', '20 51 01N, 106 17 34E', '30');
INSERT INTO `district` VALUES ('298', 'Tứ Kỳ', 'Huyện', '20 49 05N, 106 24 05E', '30');
INSERT INTO `district` VALUES ('299', 'Ninh Giang', 'Huyện', '20 45 13N, 106 20 09E', '30');
INSERT INTO `district` VALUES ('300', 'Thanh Miện', 'Huyện', '20 46 02N, 106 12 26E', '30');
INSERT INTO `district` VALUES ('303', 'Hồng Bàng', 'Quận', '20 52 37N, 106 38 32E', '31');
INSERT INTO `district` VALUES ('304', 'Ngô Quyền', 'Quận', '20 51 13N, 106 41 57E', '31');
INSERT INTO `district` VALUES ('305', 'Lê Chân', 'Quận', '20 50 12N, 106 40 30E', '31');
INSERT INTO `district` VALUES ('306', 'Hải An', 'Quận', '20 49 38N, 106 45 57E', '31');
INSERT INTO `district` VALUES ('307', 'Kiến An', 'Quận', '20 48 26N, 106 38 03E', '31');
INSERT INTO `district` VALUES ('308', 'Đồ Sơn', 'Quận', '20 42 41N, 106 44 54E', '31');
INSERT INTO `district` VALUES ('309', 'Kinh Dương', 'Quận', '', '31');
INSERT INTO `district` VALUES ('311', 'Thuỷ Nguyên', 'Huyện', '20 56 36N, 106 39 38E', '31');
INSERT INTO `district` VALUES ('312', 'An Dương', 'Huyện', '20 53 06N, 106 35 36E', '31');
INSERT INTO `district` VALUES ('313', 'An Lão', 'Huyện', '20 47 54N, 106 33 19E', '31');
INSERT INTO `district` VALUES ('314', 'Kiến Thụy', 'Huyện', '20 45 13N, 106 41 47E', '31');
INSERT INTO `district` VALUES ('315', 'Tiên Lãng', 'Huyện', '20 42 23N, 106 36 03E', '31');
INSERT INTO `district` VALUES ('316', 'Vĩnh Bảo', 'Huyện', '20 40 56N, 106 29 57E', '31');
INSERT INTO `district` VALUES ('317', 'Cát Hải', 'Huyện', '20 47 09N, 106 58 07E', '31');
INSERT INTO `district` VALUES ('318', 'Bạch Long Vĩ', 'Huyện', '20 08 41N, 107 42 51E', '31');
INSERT INTO `district` VALUES ('323', 'Hưng Yên', 'Thành Phố', '20 39 38N, 106 03 08E', '33');
INSERT INTO `district` VALUES ('325', 'Văn Lâm', 'Huyện', '20 58 31N, 106 02 51E', '33');
INSERT INTO `district` VALUES ('326', 'Văn Giang', 'Huyện', '20 55 51N, 105 57 14E', '33');
INSERT INTO `district` VALUES ('327', 'Yên Mỹ', 'Huyện', '20 53 45N, 106 01 21E', '33');
INSERT INTO `district` VALUES ('328', 'Mỹ Hào', 'Huyện', '20 55 35N, 106 05 34E', '33');
INSERT INTO `district` VALUES ('329', 'Ân Thi', 'Huyện', '20 48 49N, 106 05 30E', '33');
INSERT INTO `district` VALUES ('330', 'Khoái Châu', 'Huyện', '20 49 53N, 105 58 28E', '33');
INSERT INTO `district` VALUES ('331', 'Kim Động', 'Huyện', '20 44 47N, 106 01 47E', '33');
INSERT INTO `district` VALUES ('332', 'Tiên Lữ', 'Huyện', '20 40 05N, 106 07 59E', '33');
INSERT INTO `district` VALUES ('333', 'Phù Cừ', 'Huyện', '20 42 51N, 106 11 30E', '33');
INSERT INTO `district` VALUES ('336', 'Thái Bình', 'Thành Phố', '20 26 45N, 106 19 56E', '34');
INSERT INTO `district` VALUES ('338', 'Quỳnh Phụ', 'Huyện', '20 38 57N, 106 21 16E', '34');
INSERT INTO `district` VALUES ('339', 'Hưng Hà', 'Huyện', '20 35 38N, 106 12 42E', '34');
INSERT INTO `district` VALUES ('340', 'Đông Hưng', 'Huyện', '20 32 50N, 106 20 15E', '34');
INSERT INTO `district` VALUES ('341', 'Thái Thụy', 'Huyện', '20 32 33N, 106 32 32E', '34');
INSERT INTO `district` VALUES ('342', 'Tiền Hải', 'Huyện', '20 21 05N, 106 32 45E', '34');
INSERT INTO `district` VALUES ('343', 'Kiến Xương', 'Huyện', '20 23 52N, 106 25 22E', '34');
INSERT INTO `district` VALUES ('344', 'Vũ Thư', 'Huyện', '20 25 29N, 106 16 43E', '34');
INSERT INTO `district` VALUES ('347', 'Phủ Lý', 'Thành Phố', '20 32 19N, 105 54 55E', '35');
INSERT INTO `district` VALUES ('349', 'Duy Tiên', 'Huyện', '20 37 33N, 105 58 01E', '35');
INSERT INTO `district` VALUES ('350', 'Kim Bảng', 'Huyện', '20 34 19N, 105 50 41E', '35');
INSERT INTO `district` VALUES ('351', 'Thanh Liêm', 'Huyện', '20 27 31N, 105 55 09E', '35');
INSERT INTO `district` VALUES ('352', 'Bình Lục', 'Huyện', '20 29 23N, 106 02 52E', '35');
INSERT INTO `district` VALUES ('353', 'Lý Nhân', 'Huyện', '20 32 55N, 106 04 48E', '35');
INSERT INTO `district` VALUES ('356', 'Nam Định', 'Thành Phố', '20 25 07N, 106 09 54E', '36');
INSERT INTO `district` VALUES ('358', 'Mỹ Lộc', 'Huyện', '20 27 21N, 106 07 56E', '36');
INSERT INTO `district` VALUES ('359', 'Vụ Bản', 'Huyện', '20 22 57N, 106 05 35E', '36');
INSERT INTO `district` VALUES ('360', 'Ý Yên', 'Huyện', '20 19 48N, 106 01 55E', '36');
INSERT INTO `district` VALUES ('361', 'Nghĩa Hưng', 'Huyện', '20 05 37N, 106 08 59E', '36');
INSERT INTO `district` VALUES ('362', 'Nam Trực', 'Huyện', '20 20 08N, 106 12 54E', '36');
INSERT INTO `district` VALUES ('363', 'Trực Ninh', 'Huyện', '20 14 42N, 106 12 45E', '36');
INSERT INTO `district` VALUES ('364', 'Xuân Trường', 'Huyện', '20 17 53N, 106 21 43E', '36');
INSERT INTO `district` VALUES ('365', 'Giao Thủy', 'Huyện', '20 14 45N, 106 28 39E', '36');
INSERT INTO `district` VALUES ('366', 'Hải Hậu', 'Huyện', '20 06 26N, 106 16 29E', '36');
INSERT INTO `district` VALUES ('369', 'Ninh Bình', 'Thành Phố', '20 14 45N, 105 58 24E', '37');
INSERT INTO `district` VALUES ('370', 'Tam Điệp', 'Thị Xã', '20 09 42N, 103 52 43E', '37');
INSERT INTO `district` VALUES ('372', 'Nho Quan', 'Huyện', '20 18 46N, 105 42 48E', '37');
INSERT INTO `district` VALUES ('373', 'Gia Viễn', 'Huyện', '20 19 50N, 105 52 20E', '37');
INSERT INTO `district` VALUES ('374', 'Hoa Lư', 'Huyện', '20 15 04N, 105 55 52E', '37');
INSERT INTO `district` VALUES ('375', 'Yên Khánh', 'Huyện', '20 11 26N, 106 04 33E', '37');
INSERT INTO `district` VALUES ('376', 'Kim Sơn', 'Huyện', '20 02 07N, 106 05 27E', '37');
INSERT INTO `district` VALUES ('377', 'Yên Mô', 'Huyện', '20 07 45N, 105 59 45E', '37');
INSERT INTO `district` VALUES ('380', 'Thanh Hóa', 'Thành Phố', '19 48 26N, 105 47 37E', '38');
INSERT INTO `district` VALUES ('381', 'Bỉm Sơn', 'Thị Xã', '20 05 21N, 105 51 48E', '38');
INSERT INTO `district` VALUES ('382', 'Sầm Sơn', 'Thị Xã', '19 45 11N, 105 54 03E', '38');
INSERT INTO `district` VALUES ('384', 'Mường Lát', 'Huyện', '20 30 42N, 104 37 27E', '38');
INSERT INTO `district` VALUES ('385', 'Quan Hóa', 'Huyện', '20 29 15N, 104 56 35E', '38');
INSERT INTO `district` VALUES ('386', 'Bá Thước', 'Huyện', '20 22 48N, 105 14 50E', '38');
INSERT INTO `district` VALUES ('387', 'Quan Sơn', 'Huyện', '20 15 17N, 104 51 58E', '38');
INSERT INTO `district` VALUES ('388', 'Lang Chánh', 'Huyện', '20 08 58N, 105 07 40E', '38');
INSERT INTO `district` VALUES ('389', 'Ngọc Lặc', 'Huyện', '20 04 08N, 105 22 39E', '38');
INSERT INTO `district` VALUES ('390', 'Cẩm Thủy', 'Huyện', '20 12 20N, 105 27 22E', '38');
INSERT INTO `district` VALUES ('391', 'Thạch Thành', 'Huyện', '21 12 41N, 105 36 38E', '38');
INSERT INTO `district` VALUES ('392', 'Hà Trung', 'Huyện', '20 03 20N, 105 51 20E', '38');
INSERT INTO `district` VALUES ('393', 'Vĩnh Lộc', 'Huyện', '20 02 29N, 105 39 28E', '38');
INSERT INTO `district` VALUES ('394', 'Yên Định', 'Huyện', '20 00 31N, 105 37 44E', '38');
INSERT INTO `district` VALUES ('395', 'Thọ Xuân', 'Huyện', '19 55 39N, 105 29 14E', '38');
INSERT INTO `district` VALUES ('396', 'Thường Xuân', 'Huyện', '19 54 55N, 105 10 46E', '38');
INSERT INTO `district` VALUES ('397', 'Triệu Sơn', 'Huyện', '19 48 11N, 105 34 03E', '38');
INSERT INTO `district` VALUES ('398', 'Thiệu Hoá', 'Huyện', '19 53 56N, 105 40 57E', '38');
INSERT INTO `district` VALUES ('399', 'Hoằng Hóa', 'Huyện', '19 51 59N, 105 51 34E', '38');
INSERT INTO `district` VALUES ('400', 'Hậu Lộc', 'Huyện', '19 56 02N, 105 53 19E', '38');
INSERT INTO `district` VALUES ('401', 'Nga Sơn', 'Huyện', '20 00 16N, 105 59 26E', '38');
INSERT INTO `district` VALUES ('402', 'Như Xuân', 'Huyện', '19 5 55N, 105 20 22E', '38');
INSERT INTO `district` VALUES ('403', 'Như Thanh', 'Huyện', '19 35 19N, 105 33 09E', '38');
INSERT INTO `district` VALUES ('404', 'Nông Cống', 'Huyện', '19 36 58N, 105 40 54E', '38');
INSERT INTO `district` VALUES ('405', 'Đông Sơn', 'Huyện', '19 47 44N, 105 42 19E', '38');
INSERT INTO `district` VALUES ('406', 'Quảng Xương', 'Huyện', '19 40 53N, 105 48 01E', '38');
INSERT INTO `district` VALUES ('407', 'Tĩnh Gia', 'Huyện', '19 27 13N, 105 43 38E', '38');
INSERT INTO `district` VALUES ('412', 'Vinh', 'Thành Phố', '18 41 06N, 105 42 05E', '40');
INSERT INTO `district` VALUES ('413', 'Cửa Lò', 'Thị Xã', '18 47 26N, 105 43 31E', '40');
INSERT INTO `district` VALUES ('414', 'Thái Hoà', 'Thị Xã', '', '40');
INSERT INTO `district` VALUES ('415', 'Quế Phong', 'Huyện', '19 42 25N, 104 54 21E', '40');
INSERT INTO `district` VALUES ('416', 'Quỳ Châu', 'Huyện', '19 32 16N, 105 03 18E', '40');
INSERT INTO `district` VALUES ('417', 'Kỳ Sơn', 'Huyện', '19 24 36N, 104 09 45E', '40');
INSERT INTO `district` VALUES ('418', 'Tương Dương', 'Huyện', '19 19 15N, 104 35 41E', '40');
INSERT INTO `district` VALUES ('419', 'Nghĩa Đàn', 'Huyện', '19 21 19N, 105 26 33E', '40');
INSERT INTO `district` VALUES ('420', 'Quỳ Hợp', 'Huyện', '19 19 24N, 105 09 12E', '40');
INSERT INTO `district` VALUES ('421', 'Quỳnh Lưu', 'Huyện', '19 14 01N, 105 37 00E', '40');
INSERT INTO `district` VALUES ('422', 'Con Cuông', 'Huyện', '19 03 50N, 107 47 15E', '40');
INSERT INTO `district` VALUES ('423', 'Tân Kỳ', 'Huyện', '19 06 11N, 105 14 14E', '40');
INSERT INTO `district` VALUES ('424', 'Anh Sơn', 'Huyện', '18 58 04N, 105 04 30E', '40');
INSERT INTO `district` VALUES ('425', 'Diễn Châu', 'Huyện', '19 01 20N, 105 34 13E', '40');
INSERT INTO `district` VALUES ('426', 'Yên Thành', 'Huyện', '19 01 25N, 105 26 17E', '40');
INSERT INTO `district` VALUES ('427', 'Đô Lương', 'Huyện', '18 55 00N, 105 21 03E', '40');
INSERT INTO `district` VALUES ('428', 'Thanh Chương', 'Huyện', '18 44 11N, 105 12 59E', '40');
INSERT INTO `district` VALUES ('429', 'Nghi Lộc', 'Huyện', '18 47 41N, 105 31 30E', '40');
INSERT INTO `district` VALUES ('430', 'Nam Đàn', 'Huyện', '18 40 28N, 105 30 32E', '40');
INSERT INTO `district` VALUES ('431', 'Hưng Nguyên', 'Huyện', '18 41 13N, 105 37 41E', '40');
INSERT INTO `district` VALUES ('436', 'Hà Tĩnh', 'Thành Phố', '18 21 20N, 105 54 00E', '42');
INSERT INTO `district` VALUES ('437', 'Hồng Lĩnh', 'Thị Xã', '18 32 05N, 105 42 40E', '42');
INSERT INTO `district` VALUES ('439', 'Hương Sơn', 'Huyện', '18 26 47N, 105 19 36E', '42');
INSERT INTO `district` VALUES ('440', 'Đức Thọ', 'Huyện', '18 29 23N, 105 36 39E', '42');
INSERT INTO `district` VALUES ('441', 'Vũ Quang', 'Huyện', '18 19 30N, 105 26 38E', '42');
INSERT INTO `district` VALUES ('442', 'Nghi Xuân', 'Huyện', '18 38 46N, 105 46 17E', '42');
INSERT INTO `district` VALUES ('443', 'Can Lộc', 'Huyện', '18 26 39N, 105 46 13E', '42');
INSERT INTO `district` VALUES ('444', 'Hương Khê', 'Huyện', '18 11 36N, 105 41 24E', '42');
INSERT INTO `district` VALUES ('445', 'Thạch Hà', 'Huyện', '18 19 29N, 105 52 43E', '42');
INSERT INTO `district` VALUES ('446', 'Cẩm Xuyên', 'Huyện', '18 11 32N, 106 00 04E', '42');
INSERT INTO `district` VALUES ('447', 'Kỳ Anh', 'Huyện', '18 05 15N, 106 15 49E', '42');
INSERT INTO `district` VALUES ('448', 'Lộc Hà', 'Huyện', '', '42');
INSERT INTO `district` VALUES ('450', 'Đồng Hới', 'Thành Phố', '17 26 53N, 106 35 15E', '44');
INSERT INTO `district` VALUES ('452', 'Minh Hóa', 'Huyện', '17 44 03N, 105 51 45E', '44');
INSERT INTO `district` VALUES ('453', 'Tuyên Hóa', 'Huyện', '17 54 04N, 105 58 17E', '44');
INSERT INTO `district` VALUES ('454', 'Quảng Trạch', 'Huyện', '17 50 04N, 106 22 24E', '44');
INSERT INTO `district` VALUES ('455', 'Bố Trạch', 'Huyện', '17 29 13N, 106 06 54E', '44');
INSERT INTO `district` VALUES ('456', 'Quảng Ninh', 'Huyện', '17 15 15N, 106 32 31E', '44');
INSERT INTO `district` VALUES ('457', 'Lệ Thủy', 'Huyện', '17 07 35N, 106 41 47E', '44');
INSERT INTO `district` VALUES ('461', 'Đông Hà', 'Thành Phố', '16 48 12N, 107 05 12E', '45');
INSERT INTO `district` VALUES ('462', 'Quảng Trị', 'Thị Xã', '16 44 37N, 107 11 20E', '45');
INSERT INTO `district` VALUES ('464', 'Vĩnh Linh', 'Huyện', '17 01 35N, 106 53 49E', '45');
INSERT INTO `district` VALUES ('465', 'Hướng Hóa', 'Huyện', '16 42 19N, 106 40 14E', '45');
INSERT INTO `district` VALUES ('466', 'Gio Linh', 'Huyện', '16 54 49N, 106 56 16E', '45');
INSERT INTO `district` VALUES ('467', 'Đa Krông', 'Huyện', '16 33 58N, 106 55 49E', '45');
INSERT INTO `district` VALUES ('468', 'Cam Lộ', 'Huyện', '16 47 09N, 106 57 52E', '45');
INSERT INTO `district` VALUES ('469', 'Triệu Phong', 'Huyện', '16 46 32N, 107 09 12E', '45');
INSERT INTO `district` VALUES ('470', 'Hải Lăng', 'Huyện', '16 41 07N, 107 13 34E', '45');
INSERT INTO `district` VALUES ('471', 'Cồn Cỏ', 'Huyện', '19 09 39N, 107 19 58E', '45');
INSERT INTO `district` VALUES ('474', 'Huế', 'Thành Phố', '16 27 16N, 107 34 29E', '46');
INSERT INTO `district` VALUES ('476', 'Phong Điền', 'Huyện', '16 32 42N, 106 16 37E', '46');
INSERT INTO `district` VALUES ('477', 'Quảng Điền', 'Huyện', '16 35 21N, 107 29 31E', '46');
INSERT INTO `district` VALUES ('478', 'Phú Vang', 'Huyện', '16 27 20N, 107 42 28E', '46');
INSERT INTO `district` VALUES ('479', 'Hương Thủy', 'Huyện', '16 19 27N, 107 37 26E', '46');
INSERT INTO `district` VALUES ('480', 'Hương Trà', 'Huyện', '16 25 49N, 107 28 37E', '46');
INSERT INTO `district` VALUES ('481', 'A Lưới', 'Huyện', '16 13 59N, 107 16 12E', '46');
INSERT INTO `district` VALUES ('482', 'Phú Lộc', 'Huyện', '16 17 16N, 107 55 25E', '46');
INSERT INTO `district` VALUES ('483', 'Nam Đông', 'Huyện', '16 07 11N, 107 41 25E', '46');
INSERT INTO `district` VALUES ('490', 'Liên Chiểu', 'Quận', '16 07 26N, 108 07 04E', '48');
INSERT INTO `district` VALUES ('491', 'Thanh Khê', 'Quận', '16 03 28N, 108 11 00E', '48');
INSERT INTO `district` VALUES ('492', 'Hải Châu', 'Quận', '16 03 38N, 108 11 46E', '48');
INSERT INTO `district` VALUES ('493', 'Sơn Trà', 'Quận', '16 06 13N, 108 16 26E', '48');
INSERT INTO `district` VALUES ('494', 'Ngũ Hành Sơn', 'Quận', '16 00 30N, 108 15 09E', '48');
INSERT INTO `district` VALUES ('495', 'Cẩm Lệ', 'Quận', '', '48');
INSERT INTO `district` VALUES ('497', 'Hoà Vang', 'Huyện', '16 03 59N, 108 01 57E', '48');
INSERT INTO `district` VALUES ('498', 'Hoàng Sa', 'Huyện', '16 21 36N, 111 57 01E', '48');
INSERT INTO `district` VALUES ('502', 'Tam Kỳ', 'Thành Phố', '15 34 37N, 108 29 52E', '49');
INSERT INTO `district` VALUES ('503', 'Hội An', 'Thành Phố', '15 53 20N, 108 20 42E', '49');
INSERT INTO `district` VALUES ('504', 'Tây Giang', 'Huyện', '15 53 46N, 107 25 52E', '49');
INSERT INTO `district` VALUES ('505', 'Đông Giang', 'Huyện', '15 54 44N, 107 47 06E', '49');
INSERT INTO `district` VALUES ('506', 'Đại Lộc', 'Huyện', '15 50 10N, 107 58 27E', '49');
INSERT INTO `district` VALUES ('507', 'Điện Bàn', 'Huyện', '15 54 15N, 108 13 38E', '49');
INSERT INTO `district` VALUES ('508', 'Duy Xuyên', 'Huyện', '15 47 58N, 108 13 27E', '49');
INSERT INTO `district` VALUES ('509', 'Quế Sơn', 'Huyện', '15 41 03N, 108 05 34E', '49');
INSERT INTO `district` VALUES ('510', 'Nam Giang', 'Huyện', '15 36 37N, 107 33 52E', '49');
INSERT INTO `district` VALUES ('511', 'Phước Sơn', 'Huyện', '15 23 17N, 107 50 22E', '49');
INSERT INTO `district` VALUES ('512', 'Hiệp Đức', 'Huyện', '15 31 09N, 108 05 56E', '49');
INSERT INTO `district` VALUES ('513', 'Thăng Bình', 'Huyện', '15 42 29N, 108 22 04E', '49');
INSERT INTO `district` VALUES ('514', 'Tiên Phước', 'Huyện', '15 29 30N, 108 15 28E', '49');
INSERT INTO `district` VALUES ('515', 'Bắc Trà My', 'Huyện', '15 08 00N, 108 05 32E', '49');
INSERT INTO `district` VALUES ('516', 'Nam Trà My', 'Huyện', '15 16 40N, 108 12 15E', '49');
INSERT INTO `district` VALUES ('517', 'Núi Thành', 'Huyện', '15 26 53N, 108 34 49E', '49');
INSERT INTO `district` VALUES ('518', 'Phú Ninh', 'Huyện', '15 30 43N, 108 24 43E', '49');
INSERT INTO `district` VALUES ('519', 'Nông Sơn', 'Huyện', '', '49');
INSERT INTO `district` VALUES ('522', 'Quảng Ngãi', 'Thành Phố', '15 07 17N, 108 48 24E', '51');
INSERT INTO `district` VALUES ('524', 'Bình Sơn', 'Huyện', '15 18 45N, 108 45 35E', '51');
INSERT INTO `district` VALUES ('525', 'Trà Bồng', 'Huyện', '15 13 30N, 108 29 57E', '51');
INSERT INTO `district` VALUES ('526', 'Tây Trà', 'Huyện', '15 11 13N, 108 22 23E', '51');
INSERT INTO `district` VALUES ('527', 'Sơn Tịnh', 'Huyện', '15 11 49N, 108 45 03E', '51');
INSERT INTO `district` VALUES ('528', 'Tư Nghĩa', 'Huyện', '15 05 25N, 108 45 23E', '51');
INSERT INTO `district` VALUES ('529', 'Sơn Hà', 'Huyện', '14 58 35N, 108 29 09E', '51');
INSERT INTO `district` VALUES ('530', 'Sơn Tây', 'Huyện', '14 58 11N, 108 21 22E', '51');
INSERT INTO `district` VALUES ('531', 'Minh Long', 'Huyện', '14 56 49N, 108 40 19E', '51');
INSERT INTO `district` VALUES ('532', 'Nghĩa Hành', 'Huyện', '14 58 06N, 108 46 05E', '51');
INSERT INTO `district` VALUES ('533', 'Mộ Đức', 'Huyện', '11 59 13N, 108 52 21E', '51');
INSERT INTO `district` VALUES ('534', 'Đức Phổ', 'Huyện', '14 44 59N, 108 56 58E', '51');
INSERT INTO `district` VALUES ('535', 'Ba Tơ', 'Huyện', '14 42 52N, 108 43 44E', '51');
INSERT INTO `district` VALUES ('536', 'Lý Sơn', 'Huyện', '15 22 50N, 109 06 56E', '51');
INSERT INTO `district` VALUES ('540', 'Qui Nhơn', 'Thành Phố', '13 47 15N, 109 12 48E', '52');
INSERT INTO `district` VALUES ('542', 'An Lão', 'Huyện', '14 32 10N, 108 47 52E', '52');
INSERT INTO `district` VALUES ('543', 'Hoài Nhơn', 'Huyện', '14 30 56N, 109 01 56E', '52');
INSERT INTO `district` VALUES ('544', 'Hoài Ân', 'Huyện', '14 20 51N, 108 54 04E', '52');
INSERT INTO `district` VALUES ('545', 'Phù Mỹ', 'Huyện', '14 14 41N, 109 05 43E', '52');
INSERT INTO `district` VALUES ('546', 'Vĩnh Thạnh', 'Huyện', '14 14 26N, 108 44 08E', '52');
INSERT INTO `district` VALUES ('547', 'Tây Sơn', 'Huyện', '13 56 47N, 108 53 06E', '52');
INSERT INTO `district` VALUES ('548', 'Phù Cát', 'Huyện', '14 03 48N, 109 03 57E', '52');
INSERT INTO `district` VALUES ('549', 'An Nhơn', 'Huyện', '13 51 28N, 109 04 02E', '52');
INSERT INTO `district` VALUES ('550', 'Tuy Phước', 'Huyện', '13 46 30N, 109 05 38E', '52');
INSERT INTO `district` VALUES ('551', 'Vân Canh', 'Huyện', '13 40 35N, 108 57 52E', '52');
INSERT INTO `district` VALUES ('555', 'Tuy Hòa', 'Thành Phố', '13 05 42N, 109 15 50E', '54');
INSERT INTO `district` VALUES ('557', 'Sông Cầu', 'Thị Xã', '13 31 40N, 109 12 39E', '54');
INSERT INTO `district` VALUES ('558', 'Đồng Xuân', 'Huyện', '13 24 59N, 108 56 46E', '54');
INSERT INTO `district` VALUES ('559', 'Tuy An', 'Huyện', '13 15 19N, 109 12 21E', '54');
INSERT INTO `district` VALUES ('560', 'Sơn Hòa', 'Huyện', '13 12 16N, 108 57 17E', '54');
INSERT INTO `district` VALUES ('561', 'Sông Hinh', 'Huyện', '12 54 19N, 108 53 38E', '54');
INSERT INTO `district` VALUES ('562', 'Tây Hoà', 'Huyện', '', '54');
INSERT INTO `district` VALUES ('563', 'Phú Hoà', 'Huyện', '13 04 07N, 109 11 24E', '54');
INSERT INTO `district` VALUES ('564', 'Đông Hoà', 'Huyện', '', '54');
INSERT INTO `district` VALUES ('568', 'Nha Trang', 'Thành Phố', '12 15 40N, 109 10 40E', '56');
INSERT INTO `district` VALUES ('569', 'Cam Ranh', 'Thị Xã', '11 59 05N, 108 08 17E', '56');
INSERT INTO `district` VALUES ('570', 'Cam Lâm', 'Huyện', '', '56');
INSERT INTO `district` VALUES ('571', 'Vạn Ninh', 'Huyện', '12 43 10N, 109 11 18E', '56');
INSERT INTO `district` VALUES ('572', 'Ninh Hòa', 'Huyện', '12 32 54N, 109 06 11E', '56');
INSERT INTO `district` VALUES ('573', 'Khánh Vĩnh', 'Huyện', '12 17 50N, 108 51 56E', '56');
INSERT INTO `district` VALUES ('574', 'Diên Khánh', 'Huyện', '12 13 19N, 109 02 16E', '56');
INSERT INTO `district` VALUES ('575', 'Khánh Sơn', 'Huyện', '12 02 17N, 108 53 47E', '56');
INSERT INTO `district` VALUES ('576', 'Trường Sa', 'Huyện', '9 07 27N, 114 15 00E', '56');
INSERT INTO `district` VALUES ('582', 'Phan Rang-Tháp Chàm', 'Thành Phố', '11 36 11N, 108 58 34E', '58');
INSERT INTO `district` VALUES ('584', 'Bác Ái', 'Huyện', '11 54 45N, 108 51 29E', '58');
INSERT INTO `district` VALUES ('585', 'Ninh Sơn', 'Huyện', '11 42 36N, 108 44 55E', '58');
INSERT INTO `district` VALUES ('586', 'Ninh Hải', 'Huyện', '11 42 46N, 109 05 41E', '58');
INSERT INTO `district` VALUES ('587', 'Ninh Phước', 'Huyện', '11 28 56N, 108 50 34E', '58');
INSERT INTO `district` VALUES ('588', 'Thuận Bắc', 'Huyện', '', '58');
INSERT INTO `district` VALUES ('589', 'Thuận Nam', 'Huyện', '', '58');
INSERT INTO `district` VALUES ('593', 'Phan Thiết', 'Thành Phố', '10 54 16N, 108 03 44E', '60');
INSERT INTO `district` VALUES ('594', 'La Gi', 'Thị Xã', '', '60');
INSERT INTO `district` VALUES ('595', 'Tuy Phong', 'Huyện', '11 20 26N, 108 41 15E', '60');
INSERT INTO `district` VALUES ('596', 'Bắc Bình', 'Huyện', '11 15 52N, 108 21 33E', '60');
INSERT INTO `district` VALUES ('597', 'Hàm Thuận Bắc', 'Huyện', '11 09 18N, 108 03 07E', '60');
INSERT INTO `district` VALUES ('598', 'Hàm Thuận Nam', 'Huyện', '10 56 20N, 107 54 38E', '60');
INSERT INTO `district` VALUES ('599', 'Tánh Linh', 'Huyện', '11 08 26N, 107 41 22E', '60');
INSERT INTO `district` VALUES ('600', 'Đức Linh', 'Huyện', '11 11 43N, 107 31 34E', '60');
INSERT INTO `district` VALUES ('601', 'Hàm Tân', 'Huyện', '10 44 41N, 107 41 33E', '60');
INSERT INTO `district` VALUES ('602', 'Phú Quí', 'Huyện', '10 33 13N, 108 57 46E', '60');
INSERT INTO `district` VALUES ('608', 'Kon Tum', 'Thành Phố', '14 20 32N, 107 58 04E', '62');
INSERT INTO `district` VALUES ('610', 'Đắk Glei', 'Huyện', '15 08 13N, 107 44 03E', '62');
INSERT INTO `district` VALUES ('611', 'Ngọc Hồi', 'Huyện', '14 44 23N, 107 38 49E', '62');
INSERT INTO `district` VALUES ('612', 'Đắk Tô', 'Huyện', '14 46 49N, 107 55 36E', '62');
INSERT INTO `district` VALUES ('613', 'Kon Plông', 'Huyện', '14 48 13N, 108 20 05E', '62');
INSERT INTO `district` VALUES ('614', 'Kon Rẫy', 'Huyện', '14 32 56N, 108 13 09E', '62');
INSERT INTO `district` VALUES ('615', 'Đắk Hà', 'Huyện', '14 36 50N, 107 59 55E', '62');
INSERT INTO `district` VALUES ('616', 'Sa Thầy', 'Huyện', '14 16 02N, 107 36 30E', '62');
INSERT INTO `district` VALUES ('617', 'Tu Mơ Rông', 'Huyện', '', '62');
INSERT INTO `district` VALUES ('622', 'Pleiku', 'Thành Phố', '13 57 42N, 107 58 03E', '64');
INSERT INTO `district` VALUES ('623', 'An Khê', 'Thị Xã', '14 01 24N, 108 41 29E', '64');
INSERT INTO `district` VALUES ('624', 'Ayun Pa', 'Thị Xã', '', '64');
INSERT INTO `district` VALUES ('625', 'Kbang', 'Huyện', '14 18 08N, 108 29 17E', '64');
INSERT INTO `district` VALUES ('626', 'Đăk Đoa', 'Huyện', '14 07 02N, 108 09 36E', '64');
INSERT INTO `district` VALUES ('627', 'Chư Păh', 'Huyện', '14 13 30N, 107 56 33E', '64');
INSERT INTO `district` VALUES ('628', 'Ia Grai', 'Huyện', '13 59 25N, 107 43 16E', '64');
INSERT INTO `district` VALUES ('629', 'Mang Yang', 'Huyện', '13 57 26N, 108 18 37E', '64');
INSERT INTO `district` VALUES ('630', 'Kông Chro', 'Huyện', '13 45 47N, 108 36 04E', '64');
INSERT INTO `district` VALUES ('631', 'Đức Cơ', 'Huyện', '13 46 16N, 107 38 26E', '64');
INSERT INTO `district` VALUES ('632', 'Chư Prông', 'Huyện', '13 35 39N, 107 47 36E', '64');
INSERT INTO `district` VALUES ('633', 'Chư Sê', 'Huyện', '13 37 04N, 108 06 56E', '64');
INSERT INTO `district` VALUES ('634', 'Đăk Pơ', 'Huyện', '13 55 47N, 108 36 16E', '64');
INSERT INTO `district` VALUES ('635', 'Ia Pa', 'Huyện', '13 31 37N, 108 30 34E', '64');
INSERT INTO `district` VALUES ('637', 'Krông Pa', 'Huyện', '13 14 13N, 108 39 12E', '64');
INSERT INTO `district` VALUES ('638', 'Phú Thiện', 'Huyện', '', '64');
INSERT INTO `district` VALUES ('639', 'Chư Pưh', 'Huyện', '', '64');
INSERT INTO `district` VALUES ('643', 'Buôn Ma Thuột', 'Thành Phố', '12 39 43N, 108 10 40E', '66');
INSERT INTO `district` VALUES ('644', 'Buôn Hồ', 'Thị Xã', '', '66');
INSERT INTO `district` VALUES ('645', 'Ea H\leo', 'Huyện', '13 13 52N, 108 12 30E', '66');
INSERT INTO `district` VALUES ('646', 'Ea Súp', 'Huyện', '13 10 59N, 107 46 49E', '66');
INSERT INTO `district` VALUES ('647', 'Buôn Đôn', 'Huyện', '12 52 45N, 107 45 20E', '66');
INSERT INTO `district` VALUES ('648', 'Cư M gar', 'Huyện', '12 53 47N, 108 04 16E', '66');
INSERT INTO `district` VALUES ('649', 'Krông Búk', 'Huyện', '12 56 27N, 108 13 54E', '66');
INSERT INTO `district` VALUES ('650', 'Krông Năng', 'Huyện', '12 59 41N, 108 23 42E', '66');
INSERT INTO `district` VALUES ('651', 'Ea Kar', 'Huyện', '12 48 17N, 108 32 42E', '66');
INSERT INTO `district` VALUES ('652', 'M đrắk', 'Huyện', '12 42 14N, 108 47 09E', '66');
INSERT INTO `district` VALUES ('653', 'Krông Bông', 'Huyện', '12 27 08N, 108 27 01E', '66');
INSERT INTO `district` VALUES ('654', 'Krông Pắc', 'Huyện', '12 41 20N, 108 18 42E', '66');
INSERT INTO `district` VALUES ('655', 'Krông A Na', 'Huyện', '12 31 51N, 108 05 03E', '66');
INSERT INTO `district` VALUES ('656', 'Lắk', 'Huyện', '12 19 20N, 108 12 17E', '66');
INSERT INTO `district` VALUES ('657', 'Cư Kuin', 'Huyện', '', '66');
INSERT INTO `district` VALUES ('660', 'Gia Nghĩa', 'Thị Xã', '', '67');
INSERT INTO `district` VALUES ('661', 'Đắk Glong', 'Huyện', '12 01 53N, 107 50 37E', '67');
INSERT INTO `district` VALUES ('662', 'Cư Jút', 'Huyện', '12 40 56N, 107 44 44E', '67');
INSERT INTO `district` VALUES ('663', 'Đắk Mil', 'Huyện', '12 31 08N, 107 42 24E', '67');
INSERT INTO `district` VALUES ('664', 'Krông Nô', 'Huyện', '12 22 16N, 107 53 49E', '67');
INSERT INTO `district` VALUES ('665', 'Đắk Song', 'Huyện', '12 14 04N, 107 36 30E', '67');
INSERT INTO `district` VALUES ('666', 'Đắk R lấp', 'Huyện', '12 02 30N, 107 25 59E', '67');
INSERT INTO `district` VALUES ('667', 'Tuy Đức', 'Huyện', '', '67');
INSERT INTO `district` VALUES ('672', 'Đà Lạt', 'Thành Phố', '11 54 33N, 108 27 08E', '68');
INSERT INTO `district` VALUES ('673', 'Bảo Lộc', 'Thị Xã', '11 32 48N, 107 47 37E', '68');
INSERT INTO `district` VALUES ('674', 'Đam Rông', 'Huyện', '12 02 35N, 108 10 26E', '68');
INSERT INTO `district` VALUES ('675', 'Lạc Dương', 'Huyện', '12 08 30N, 108 27 48E', '68');
INSERT INTO `district` VALUES ('676', 'Lâm Hà', 'Huyện', '11 55 26N, 108 11 31E', '68');
INSERT INTO `district` VALUES ('677', 'Đơn Dương', 'Huyện', '11 48 26N, 108 32 48E', '68');
INSERT INTO `district` VALUES ('678', 'Đức Trọng', 'Huyện', '11 41 50N, 108 18 58E', '68');
INSERT INTO `district` VALUES ('679', 'Di Linh', 'Huyện', '11 31 10N, 108 05 23E', '68');
INSERT INTO `district` VALUES ('680', 'Bảo Lâm', 'Huyện', '11 38 31N, 107 43 25E', '68');
INSERT INTO `district` VALUES ('681', 'Đạ Huoai', 'Huyện', '11 27 11N, 107 38 08E', '68');
INSERT INTO `district` VALUES ('682', 'Đạ Tẻh', 'Huyện', '11 33 46N, 107 32 00E', '68');
INSERT INTO `district` VALUES ('683', 'Cát Tiên', 'Huyện', '11 39 38N, 107 23 27E', '68');
INSERT INTO `district` VALUES ('688', 'Phước Long', 'Thị Xã', '', '70');
INSERT INTO `district` VALUES ('689', 'Đồng Xoài', 'Thị Xã', '11 31 01N, 106 50 21E', '70');
INSERT INTO `district` VALUES ('690', 'Bình Long', 'Thị Xã', '', '70');
INSERT INTO `district` VALUES ('691', 'Bù Gia Mập', 'Huyện', '11 56 57N, 106 59 21E', '70');
INSERT INTO `district` VALUES ('692', 'Lộc Ninh', 'Huyện', '11 49 28N, 106 35 11E', '70');
INSERT INTO `district` VALUES ('693', 'Bù Đốp', 'Huyện', '11 59 08N, 106 49 54E', '70');
INSERT INTO `district` VALUES ('694', 'Hớn Quản', 'Huyện', '11 37 37N, 106 36 02E', '70');
INSERT INTO `district` VALUES ('695', 'Đồng Phù', 'Huyện', '11 28 45N, 106 57 07E', '70');
INSERT INTO `district` VALUES ('696', 'Bù Đăng', 'Huyện', '11 46 09N, 107 14 14E', '70');
INSERT INTO `district` VALUES ('697', 'Chơn Thành', 'Huyện', '11 28 45N, 106 39 26E', '70');
INSERT INTO `district` VALUES ('703', 'Tây Ninh', 'Thị Xã', '11 21 59N, 106 07 47E', '72');
INSERT INTO `district` VALUES ('705', 'Tân Biên', 'Huyện', '11 35 14N, 105 57 53E', '72');
INSERT INTO `district` VALUES ('706', 'Tân Châu', 'Huyện', '11 34 49N, 106 17 48E', '72');
INSERT INTO `district` VALUES ('707', 'Dương Minh Châu', 'Huyện', '11 22 04N, 106 16 58E', '72');
INSERT INTO `district` VALUES ('708', 'Châu Thành', 'Huyện', '11 19 02N, 106 00 15E', '72');
INSERT INTO `district` VALUES ('709', 'Hòa Thành', 'Huyện', '11 15 31N, 106 08 44E', '72');
INSERT INTO `district` VALUES ('710', 'Gò Dầu', 'Huyện', '11 09 39N, 106 14 42E', '72');
INSERT INTO `district` VALUES ('711', 'Bến Cầu', 'Huyện', '11 07 50N, 106 08 25E', '72');
INSERT INTO `district` VALUES ('712', 'Trảng Bàng', 'Huyện', '11 06 18N, 106 23 12E', '72');
INSERT INTO `district` VALUES ('718', 'Thủ Dầu Một', 'Thị Xã', '11 00 01N, 106 38 56E', '74');
INSERT INTO `district` VALUES ('720', 'Dầu Tiếng', 'Huyện', '11 19 07N, 106 26 59E', '74');
INSERT INTO `district` VALUES ('721', 'Bến Cát', 'Huyện', '11 12 42N, 106 36 28E', '74');
INSERT INTO `district` VALUES ('722', 'Phú Giáo', 'Huyện', '11 20 21N, 106 47 48E', '74');
INSERT INTO `district` VALUES ('723', 'Tân Uyên', 'Huyện', '11 06 31N, 106 49 02E', '74');
INSERT INTO `district` VALUES ('724', 'Dĩ An', 'Huyện', '10 55 03N, 106 47 09E', '74');
INSERT INTO `district` VALUES ('725', 'Thuận An', 'Huyện', '10 55 58N, 106 41 59E', '74');
INSERT INTO `district` VALUES ('731', 'Biên Hòa', 'Thành Phố', '10 56 31N, 106 50 50E', '75');
INSERT INTO `district` VALUES ('732', 'Long Khánh', 'Thị Xã', '10 56 24N, 107 14 29E', '75');
INSERT INTO `district` VALUES ('734', 'Tân Phú', 'Huyện', '11 22 51N, 107 21 35E', '75');
INSERT INTO `district` VALUES ('735', 'Vĩnh Cửu', 'Huyện', '11 14 31N, 107 00 06E', '75');
INSERT INTO `district` VALUES ('736', 'Định Quán', 'Huyện', '11 12 41N, 107 17 03E', '75');
INSERT INTO `district` VALUES ('737', 'Trảng Bom', 'Huyện', '10 58 39N, 107 00 52E', '75');
INSERT INTO `district` VALUES ('738', 'Thống Nhất', 'Huyện', '10 58 29N, 107 09 26E', '75');
INSERT INTO `district` VALUES ('739', 'Cẩm Mỹ', 'Huyện', '10 47 05N, 107 14 36E', '75');
INSERT INTO `district` VALUES ('740', 'Long Thành', 'Huyện', '10 47 38N, 106 59 42E', '75');
INSERT INTO `district` VALUES ('741', 'Xuân Lộc', 'Huyện', '10 55 39N, 107 24 21E', '75');
INSERT INTO `district` VALUES ('742', 'Nhơn Trạch', 'Huyện', '10 39 18N, 106 53 18E', '75');
INSERT INTO `district` VALUES ('747', 'Vũng Tầu', 'Thành Phố', '10 24 08N, 107 07 05E', '77');
INSERT INTO `district` VALUES ('748', 'Bà Rịa', 'Thị Xã', '10 30 33N, 107 10 47E', '77');
INSERT INTO `district` VALUES ('750', 'Châu Đức', 'Huyện', '10 39 23N, 107 15 08E', '77');
INSERT INTO `district` VALUES ('751', 'Xuyên Mộc', 'Huyện', '10 37 46N, 107 29 39E', '77');
INSERT INTO `district` VALUES ('752', 'Long Điền', 'Huyện', '10 26 47N, 107 12 53E', '77');
INSERT INTO `district` VALUES ('753', 'Đất Đỏ', 'Huyện', '10 28 40N, 107 18 27E', '77');
INSERT INTO `district` VALUES ('754', 'Tân Thành', 'Huyện', '10 34 50N, 107 05 06E', '77');
INSERT INTO `district` VALUES ('755', 'Côn Đảo', 'Huyện', '8 42 25N, 106 36 05E', '77');
INSERT INTO `district` VALUES ('760', '1', 'Quận', '10 46 34N, 106 41 45E', '79');
INSERT INTO `district` VALUES ('761', '12', 'Quận', '10 51 43N, 106 39 32E', '79');
INSERT INTO `district` VALUES ('762', 'Thủ Đức', 'Quận', '10 51 20N, 106 45 05E', '79');
INSERT INTO `district` VALUES ('763', '9', 'Quận', '10 49 49N, 106 49 03E', '79');
INSERT INTO `district` VALUES ('764', 'Gò Vấp', 'Quận', '10 50 12N, 106 39 52E', '79');
INSERT INTO `district` VALUES ('765', 'Bình Thạnh', 'Quận', '10 48 46N, 106 42 57E', '79');
INSERT INTO `district` VALUES ('766', 'Tân Bình', 'Quận', '10 48 13N, 106 39 03E', '79');
INSERT INTO `district` VALUES ('767', 'Tân Phú', 'Quận', '10 47 32N, 106 37 31E', '79');
INSERT INTO `district` VALUES ('768', 'Phú Nhuận', 'Quận', '10 48 06N, 106 40 39E', '79');
INSERT INTO `district` VALUES ('769', '2', 'Quận', '10 46 51N, 106 45 25E', '79');
INSERT INTO `district` VALUES ('770', '3', 'Quận', '10 46 48N, 106 40 46E', '79');
INSERT INTO `district` VALUES ('771', '10', 'Quận', '10 46 25N, 106 40 02E', '79');
INSERT INTO `district` VALUES ('772', '11', 'Quận', '10 46 01N, 106 38 44E', '79');
INSERT INTO `district` VALUES ('773', '4', 'Quận', '10 45 42N, 106 42 09E', '79');
INSERT INTO `district` VALUES ('774', '5', 'Quận', '10 45 24N, 106 40 00E', '79');
INSERT INTO `district` VALUES ('775', '6', 'Quận', '10 44 46N, 106 38 10E', '79');
INSERT INTO `district` VALUES ('776', '8', 'Quận', '10 43 24N, 106 37 40E', '79');
INSERT INTO `district` VALUES ('777', 'Bình Tân', 'Quận', '10 46 16N, 106 35 26E', '79');
INSERT INTO `district` VALUES ('778', '7', 'Quận', '10 44 19N, 106 43 35E', '79');
INSERT INTO `district` VALUES ('783', 'Củ Chi', 'Huyện', '11 02 17N, 106 30 20E', '79');
INSERT INTO `district` VALUES ('784', 'Hóc Môn', 'Huyện', '10 52 42N, 106 35 33E', '79');
INSERT INTO `district` VALUES ('785', 'Bình Chánh', 'Huyện', '10 45 01N, 106 30 45E', '79');
INSERT INTO `district` VALUES ('786', 'Nhà Bè', 'Huyện', '10 39 06N, 106 43 35E', '79');
INSERT INTO `district` VALUES ('787', 'Cần Giờ', 'Huyện', '10 30 43N, 106 52 50E', '79');
INSERT INTO `district` VALUES ('794', 'Tân An', 'Thành Phố', '10 31 36N, 106 24 06E', '80');
INSERT INTO `district` VALUES ('796', 'Tân Hưng', 'Huyện', '10 49 05N, 105 39 26E', '80');
INSERT INTO `district` VALUES ('797', 'Vĩnh Hưng', 'Huyện', '10 52 54N, 105 45 58E', '80');
INSERT INTO `district` VALUES ('798', 'Mộc Hóa', 'Huyện', '10 47 09N, 105 57 56E', '80');
INSERT INTO `district` VALUES ('799', 'Tân Thạnh', 'Huyện', '10 37 44N, 105 57 07E', '80');
INSERT INTO `district` VALUES ('800', 'Thạnh Hóa', 'Huyện', '10 41 37N, 106 11 08E', '80');
INSERT INTO `district` VALUES ('801', 'Đức Huệ', 'Huyện', '10 51 57N, 106 15 48E', '80');
INSERT INTO `district` VALUES ('802', 'Đức Hòa', 'Huyện', '10 53 04N, 106 23 58E', '80');
INSERT INTO `district` VALUES ('803', 'Bến Lức', 'Huyện', '10 41 40N, 106 26 28E', '80');
INSERT INTO `district` VALUES ('804', 'Thủ Thừa', 'Huyện', '10 39 41N, 106 20 12E', '80');
INSERT INTO `district` VALUES ('805', 'Tân Trụ', 'Huyện', '10 31 47N, 106 30 06E', '80');
INSERT INTO `district` VALUES ('806', 'Cần Đước', 'Huyện', '10 32 21N, 106 36 33E', '80');
INSERT INTO `district` VALUES ('807', 'Cần Giuộc', 'Huyện', '10 34 43N, 106 38 35E', '80');
INSERT INTO `district` VALUES ('808', 'Châu Thành', 'Huyện', '10 27 52N, 106 30 00E', '80');
INSERT INTO `district` VALUES ('815', 'Mỹ Tho', 'Thành Phố', '10 22 14N, 106 21 52E', '82');
INSERT INTO `district` VALUES ('816', 'Gò Công', 'Thị Xã', '10 21 55N, 106 40 24E', '82');
INSERT INTO `district` VALUES ('818', 'Tân Phước', 'Huyện', '10 30 36N, 106 13 02E', '82');
INSERT INTO `district` VALUES ('819', 'Cái Bè', 'Huyện', '10 24 21N, 105 56 01E', '82');
INSERT INTO `district` VALUES ('820', 'Cai Lậy', 'Huyện', '10 24 20N, 106 06 05E', '82');
INSERT INTO `district` VALUES ('821', 'Châu Thành', 'Huyện', '20 25 21N, 106 16 57E', '82');
INSERT INTO `district` VALUES ('822', 'Chợ Gạo', 'Huyện', '10 23 45N, 106 26 53E', '82');
INSERT INTO `district` VALUES ('823', 'Gò Công Tây', 'Huyện', '10 19 55N, 106 35 02E', '82');
INSERT INTO `district` VALUES ('824', 'Gò Công Đông', 'Huyện', '10 20 42N, 106 42 54E', '82');
INSERT INTO `district` VALUES ('825', 'Tân Phú Đông', 'Huyện', '', '82');
INSERT INTO `district` VALUES ('829', 'Bến Tre', 'Thành Phố', '10 14 17N, 106 22 26E', '83');
INSERT INTO `district` VALUES ('831', 'Châu Thành', 'Huyện', '10 17 24N, 106 17 45E', '83');
INSERT INTO `district` VALUES ('832', 'Chợ Lách', 'Huyện', '10 13 26N, 106 09 08E', '83');
INSERT INTO `district` VALUES ('833', 'Mỏ Cày Nam', 'Huyện', '10 06 56N, 106 19 40E', '83');
INSERT INTO `district` VALUES ('834', 'Giồng Trôm', 'Huyện', '10 08 46N, 106 28 12E', '83');
INSERT INTO `district` VALUES ('835', 'Bình Đại', 'Huyện', '10 09 56N, 106 37 46E', '83');
INSERT INTO `district` VALUES ('836', 'Ba Tri', 'Huyện', '10 04 08N, 106 35 10E', '83');
INSERT INTO `district` VALUES ('837', 'Thạnh Phú', 'Huyện', '9 55 53N, 106 32 45E', '83');
INSERT INTO `district` VALUES ('838', 'Mỏ Cày Bắc', 'Huyện', '', '83');
INSERT INTO `district` VALUES ('842', 'Trà Vinh', 'Thị Xã', '9 57 09N, 106 20 39E', '84');
INSERT INTO `district` VALUES ('844', 'Càng Long', 'Huyện', '9 58 18N, 106 12 52E', '84');
INSERT INTO `district` VALUES ('845', 'Cầu Kè', 'Huyện', '9 51 23N, 106 03 33E', '84');
INSERT INTO `district` VALUES ('846', 'Tiểu Cần', 'Huyện', '9 48 37N, 106 12 06E', '84');
INSERT INTO `district` VALUES ('847', 'Châu Thành', 'Huyện', '9 52 57N, 106 24 12E', '84');
INSERT INTO `district` VALUES ('848', 'Cầu Ngang', 'Huyện', '9 47 14N, 106 29 19E', '84');
INSERT INTO `district` VALUES ('849', 'Trà Cú', 'Huyện', '9 42 06N, 106 16 24E', '84');
INSERT INTO `district` VALUES ('850', 'Duyên Hải', 'Huyện', '9 39 58N, 106 26 23E', '84');
INSERT INTO `district` VALUES ('855', 'Vĩnh Long', 'Thành Phố', '10 15 09N, 105 56 08E', '86');
INSERT INTO `district` VALUES ('857', 'Long Hồ', 'Huyện', '10 13 58N, 105 55 47E', '86');
INSERT INTO `district` VALUES ('858', 'Mang Thít', 'Huyện', '10 10 58N, 106 05 13E', '86');
INSERT INTO `district` VALUES ('859', 'Vũng Liêm', 'Huyện', '10 03 32N, 106 10 35E', '86');
INSERT INTO `district` VALUES ('860', 'Tam Bình', 'Huyện', '10 03 58N, 105 58 03E', '86');
INSERT INTO `district` VALUES ('861', 'Bình Minh', 'Huyện', '10 05 45N, 105 47 21E', '86');
INSERT INTO `district` VALUES ('862', 'Trà Ôn', 'Huyện', '9 59 20N, 105 57 56E', '86');
INSERT INTO `district` VALUES ('863', 'Bình Tân', 'Huyện', '', '86');
INSERT INTO `district` VALUES ('866', 'Cao Lãnh', 'Thành Phố', '10 27 38N, 105 37 21E', '87');
INSERT INTO `district` VALUES ('867', 'Sa Đéc', 'Thị Xã', '10 19 22N, 105 44 31E', '87');
INSERT INTO `district` VALUES ('868', 'Hồng Ngự', 'Thị Xã', '', '87');
INSERT INTO `district` VALUES ('869', 'Tân Hồng', 'Huyện', '10 52 48N, 105 29 21E', '87');
INSERT INTO `district` VALUES ('870', 'Hồng Ngự', 'Huyện', '10 48 13N, 105 19 00E', '87');
INSERT INTO `district` VALUES ('871', 'Tam Nông', 'Huyện', '10 44 06N, 105 30 58E', '87');
INSERT INTO `district` VALUES ('872', 'Tháp Mười', 'Huyện', '10 33 36N, 105 47 13E', '87');
INSERT INTO `district` VALUES ('873', 'Cao Lãnh', 'Huyện', '10 29 03N, 105 41 40E', '87');
INSERT INTO `district` VALUES ('874', 'Thanh Bình', 'Huyện', '10 36 38N, 105 28 51E', '87');
INSERT INTO `district` VALUES ('875', 'Lấp Vò', 'Huyện', '10 21 27N, 105 36 06E', '87');
INSERT INTO `district` VALUES ('876', 'Lai Vung', 'Huyện', '10 14 43N, 105 38 40E', '87');
INSERT INTO `district` VALUES ('877', 'Châu Thành', 'Huyện', '10 13 27N, 105 48 38E', '87');
INSERT INTO `district` VALUES ('883', 'Long Xuyên', 'Thành Phố', '10 22 22N, 105 25 33E', '89');
INSERT INTO `district` VALUES ('884', 'Châu Đốc', 'Thị Xã', '10 41 20N, 105 05 15E', '89');
INSERT INTO `district` VALUES ('886', 'An Phú', 'Huyện', '10 50 12N, 105 05 33E', '89');
INSERT INTO `district` VALUES ('887', 'Tân Châu', 'Thị Xã', '10 49 11N, 105 11 18E', '89');
INSERT INTO `district` VALUES ('888', 'Phú Tân', 'Huyện', '10 40 26N, 105 14 40E', '89');
INSERT INTO `district` VALUES ('889', 'Châu Phú', 'Huyện', '10 34 12N, 105 12 13E', '89');
INSERT INTO `district` VALUES ('890', 'Tịnh Biên', 'Huyện', '10 33 30N, 105 00 17E', '89');
INSERT INTO `district` VALUES ('891', 'Tri Tôn', 'Huyện', '10 24 41N, 104 56 58E', '89');
INSERT INTO `district` VALUES ('892', 'Châu Thành', 'Huyện', '10 25 39N, 105 15 31E', '89');
INSERT INTO `district` VALUES ('893', 'Chợ Mới', 'Huyện', '10 27 23N, 105 26 57E', '89');
INSERT INTO `district` VALUES ('894', 'Thoại Sơn', 'Huyện', '10 16 45N, 105 15 59E', '89');
INSERT INTO `district` VALUES ('899', 'Rạch Giá', 'Thành Phố', '10 01 35N, 105 06 20E', '91');
INSERT INTO `district` VALUES ('900', 'Hà Tiên', 'Thị Xã', '10 22 54N, 104 30 10E', '91');
INSERT INTO `district` VALUES ('902', 'Kiên Lương', 'Huyện', '10 20 21N, 104 39 46E', '91');
INSERT INTO `district` VALUES ('903', 'Hòn Đất', 'Huyện', '10 14 20N, 104 55 57E', '91');
INSERT INTO `district` VALUES ('904', 'Tân Hiệp', 'Huyện', '10 05 18N, 105 14 04E', '91');
INSERT INTO `district` VALUES ('905', 'Châu Thành', 'Huyện', '9 57 37N, 105 10 16E', '91');
INSERT INTO `district` VALUES ('906', 'Giồng Giềng', 'Huyện', '9 56 05N, 105 22 06E', '91');
INSERT INTO `district` VALUES ('907', 'Gò Quao', 'Huyện', '9 43 17N, 105 17 06E', '91');
INSERT INTO `district` VALUES ('908', 'An Biên', 'Huyện', '9 48 37N, 105 03 18E', '91');
INSERT INTO `district` VALUES ('909', 'An Minh', 'Huyện', '9 40 24N, 104 59 05E', '91');
INSERT INTO `district` VALUES ('910', 'Vĩnh Thuận', 'Huyện', '9 33 25N, 105 11 30E', '91');
INSERT INTO `district` VALUES ('911', 'Phú Quốc', 'Huyện', '10 13 44N, 103 57 25E', '91');
INSERT INTO `district` VALUES ('912', 'Kiên Hải', 'Huyện', '9 48 31N, 104 37 48E', '91');
INSERT INTO `district` VALUES ('913', 'U Minh Thượng', 'Huyện', '', '91');
INSERT INTO `district` VALUES ('914', 'Giang Thành', 'Huyện', '', '91');
INSERT INTO `district` VALUES ('916', 'Ninh Kiều', 'Quận', '10 01 58N, 105 45 34E', '92');
INSERT INTO `district` VALUES ('917', 'Ô Môn', 'Quận', '10 07 28N, 105 37 51E', '92');
INSERT INTO `district` VALUES ('918', 'Bình Thuỷ', 'Quận', '10 03 42N, 105 43 17E', '92');
INSERT INTO `district` VALUES ('919', 'Cái Răng', 'Quận', '9 59 57N, 105 46 56E', '92');
INSERT INTO `district` VALUES ('923', 'Thốt Nốt', 'Quận', '10 14 23N, 105 32 02E', '92');
INSERT INTO `district` VALUES ('924', 'Vĩnh Thạnh', 'Huyện', '10 11 35N, 105 22 45E', '92');
INSERT INTO `district` VALUES ('925', 'Cờ Đỏ', 'Huyện', '10 02 48N, 105 29 46E', '92');
INSERT INTO `district` VALUES ('926', 'Phong Điền', 'Huyện', '9 59 57N, 105 39 35E', '92');
INSERT INTO `district` VALUES ('927', 'Thới Lai', 'Huyện', '', '92');
INSERT INTO `district` VALUES ('930', 'Vị Thanh', 'Thị Xã', '9 45 15N, 105 24 50E', '93');
INSERT INTO `district` VALUES ('931', 'Ngã Bảy', 'Thị Xã', '', '93');
INSERT INTO `district` VALUES ('932', 'Châu Thành A', 'Huyện', '9 55 50N, 105 38 31E', '93');
INSERT INTO `district` VALUES ('933', 'Châu Thành', 'Huyện', '9 55 22N, 105 48 37E', '93');
INSERT INTO `district` VALUES ('934', 'Phụng Hiệp', 'Huyện', '9 47 20N, 105 43 29E', '93');
INSERT INTO `district` VALUES ('935', 'Vị Thuỷ', 'Huyện', '9 48 05N, 105 32 13E', '93');
INSERT INTO `district` VALUES ('936', 'Long Mỹ', 'Huyện', '9 40 47N, 105 30 53E', '93');
INSERT INTO `district` VALUES ('941', 'Sóc Trăng', 'Thành Phố', '9 36 39N, 105 59 00E', '94');
INSERT INTO `district` VALUES ('942', 'Châu Thành', 'Huyện', '', '94');
INSERT INTO `district` VALUES ('943', 'Kế Sách', 'Huyện', '9 49 30N, 105 57 25E', '94');
INSERT INTO `district` VALUES ('944', 'Mỹ Tú', 'Huyện', '9 38 21N, 105 49 52E', '94');
INSERT INTO `district` VALUES ('945', 'Cù Lao Dung', 'Huyện', '9 37 36N, 106 12 13E', '94');
INSERT INTO `district` VALUES ('946', 'Long Phú', 'Huyện', '9 34 38N, 106 06 07E', '94');
INSERT INTO `district` VALUES ('947', 'Mỹ Xuyên', 'Huyện', '9 28 16N, 105 55 51E', '94');
INSERT INTO `district` VALUES ('948', 'Ngã Năm', 'Huyện', '9 31 38N, 105 37 22E', '94');
INSERT INTO `district` VALUES ('949', 'Thạnh Trị', 'Huyện', '9 28 05N, 105 43 02E', '94');
INSERT INTO `district` VALUES ('950', 'Vĩnh Châu', 'Huyện', '9 20 50N, 105 59 58E', '94');
INSERT INTO `district` VALUES ('951', 'Trần Đề', 'Huyện', '', '94');
INSERT INTO `district` VALUES ('954', 'Bạc Liêu', 'Thị Xã', '9 16 05N, 105 45 08E', '95');
INSERT INTO `district` VALUES ('956', 'Hồng Dân', 'Huyện', '9 30 37N, 105 24 25E', '95');
INSERT INTO `district` VALUES ('957', 'Phước Long', 'Huyện', '9 23 13N, 105 24 41E', '95');
INSERT INTO `district` VALUES ('958', 'Vĩnh Lợi', 'Huyện', '9 16 51N, 105 40 54E', '95');
INSERT INTO `district` VALUES ('959', 'Giá Rai', 'Huyện', '9 15 51N, 105 23 18E', '95');
INSERT INTO `district` VALUES ('960', 'Đông Hải', 'Huyện', '9 08 11N, 105 24 42E', '95');
INSERT INTO `district` VALUES ('961', 'Hoà Bình', 'Huyện', '', '95');
INSERT INTO `district` VALUES ('964', 'Cà Mau', 'Thành Phố', '9 10 33N, 105 11 11E', '96');
INSERT INTO `district` VALUES ('966', 'U Minh', 'Huyện', '9 22 30N, 104 57 00E', '96');
INSERT INTO `district` VALUES ('967', 'Thới Bình', 'Huyện', '9 22 50N, 105 07 35E', '96');
INSERT INTO `district` VALUES ('968', 'Trần Văn Thời', 'Huyện', '9 07 36N, 104 57 27E', '96');
INSERT INTO `district` VALUES ('969', 'Cái Nước', 'Huyện', '9 00 31N, 105 03 23E', '96');
INSERT INTO `district` VALUES ('970', 'Đầm Dơi', 'Huyện', '8 57 48N, 105 13 56E', '96');
INSERT INTO `district` VALUES ('971', 'Năm Căn', 'Huyện', '8 46 59N, 104 58 20E', '96');
INSERT INTO `district` VALUES ('972', 'Phú Tân', 'Huyện', '8 52 47N, 104 53 35E', '96');
INSERT INTO `district` VALUES ('973', 'Ngọc Hiển', 'Huyện', '8 40 47N, 104 57 58E', '96');

-- ----------------------------
-- Table structure for email_campaign
-- ----------------------------
DROP TABLE IF EXISTS `email_campaign`;
CREATE TABLE `email_campaign`  (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NULL DEFAULT NULL COMMENT 'Id Chi nhánh',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên chiến dịch',
  `status` enum('cancel','new','sent') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'new' COMMENT 'Trang thái chiến dịch',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Nội dung email',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Slug chiến dịch để check trùng',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Thời gian gửi',
  `is_now` tinyint(4) NULL DEFAULT 0 COMMENT 'Gửi ngay',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Ngươi update',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sent_by` int(11) NULL DEFAULT NULL COMMENT 'Người gửi',
  `time_sent` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thời gian gửi xong',
  PRIMARY KEY (`campaign_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for email_config
-- ----------------------------
DROP TABLE IF EXISTS `email_config`;
CREATE TABLE `email_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` enum('birthday','new_appointment','cancel_appointment','remind_appointment','paysuccess','new_customer','service_card_nearly_expired','service_card_over_number_used','service_card_expires') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Hình thức gửi mail',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Điều kiện số ngày gửi',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Tiêu đề mẫu',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT 'Nội dung email mẫu',
  `is_actived` tinyint(1) NULL DEFAULT 0 COMMENT 'trạng thái',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `time_sent` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Thời gian gửi ',
  `actived_by` int(11) NULL DEFAULT NULL COMMENT 'Người actived',
  `datetime_actived` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian active',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of email_config
-- ----------------------------
INSERT INTO `email_config` VALUES (1, 'birthday', NULL, 'Chúc mừng sinh nhật', '<p><b>Happy birthday&nbsp;</b>{gender}&nbsp;{full_name} ABC test abc <b>abc</b></p><p><b><br></b></p><p></p><p></p>', 1, NULL, 25, '2019-12-23 15:34:02', '2019-12-23 15:34:02', '15:21', 28, '2019-12-23 15:34:00');
INSERT INTO `email_config` VALUES (2, 'new_appointment', NULL, 'Lịch hẹn mới', '<p>Cám ơn&nbsp;{gender}&nbsp;{name} đã sử dụng dịch vụ của&nbsp;{name_spa}</p><p>Thời gian hẹn của a chị là&nbsp;{day_appointment}&nbsp;{time_appointment}&nbsp;</p><p>Cám ơn anh chị&nbsp;</p><p><br></p>', 1, NULL, 28, '2019-04-18 11:16:47', '2019-04-18 11:16:47', NULL, 25, '2019-04-18 11:16:00');
INSERT INTO `email_config` VALUES (3, 'cancel_appointment', NULL, 'Thông báo hủy lịch hẹn', 'Chào {gender} {full_name}, bạn vừa hủy lịch hẹn {code_appointment} thành công, cảm ơn bạn đã quan tâm đến dịch vụ chúng tôi .', 0, NULL, 30, '2019-04-17 21:11:54', '2019-04-17 21:11:54', NULL, 25, '2019-04-17 21:11:00');
INSERT INTO `email_config` VALUES (4, 'remind_appointment', '3', 'Nhắc lịch hẹn', 'Chào {gender} {full_name}, bạn có 1 lịch hẹn vào {time} tại {name_spa} bạn vui lòng đến sớm 15p để chúng tôi sắp xếp stylist chuyên nghiệp nhất phục vụ bạn', 1, NULL, NULL, '2019-09-14 11:50:56', '2019-09-14 11:50:56', NULL, 25, '2019-09-14 11:50:00');
INSERT INTO `email_config` VALUES (5, 'paysuccess', NULL, 'Mua hàng thành công', '<p>Bạn vừa thanh toán thành công đơn hàng&nbsp;{order_code}&nbsp;</p>', 1, NULL, 25, '2019-04-18 10:19:46', '2019-04-18 10:19:46', NULL, 25, '2019-04-18 10:19:00');
INSERT INTO `email_config` VALUES (6, 'new_customer', NULL, 'Đăng kí khách hàng mới', '<p>Chào mừng {gender} <b>{full_name} </b>đã đăng kí thành viên tại&nbsp;{name_spa} của chúng tôi!</p>', 1, NULL, 30, '2019-04-19 16:34:54', '2019-04-19 16:34:54', NULL, 25, '2019-04-19 16:34:00');
INSERT INTO `email_config` VALUES (7, 'service_card_nearly_expired', '2', 'Thông báo thẻ dịch vụ sắp hết hạn', 'Chào {full_name}, thẻ dịch vụ {code_card} của bạn sẽ hết hạn vào ngày {time}, bạn hãy nhanh chóng sử dụng trước khi hết hạn.', 0, NULL, NULL, '2019-04-11 10:13:11', '2019-04-11 10:13:11', NULL, 25, '2019-04-11 10:13:00');
INSERT INTO `email_config` VALUES (8, 'service_card_over_number_used', NULL, 'Thông báo thẻ dịch vụ hết số lần sử dụng', 'Chào {full_name}, thẻ dịch vụ {card_code} của bạn đã hết số lần sử dụng', 0, NULL, NULL, '2019-04-11 10:13:13', '2019-04-11 10:13:13', NULL, 25, '2019-04-11 10:13:00');
INSERT INTO `email_config` VALUES (9, 'service_card_expires', NULL, 'Thông báo thẻ dịch vụ hết hạn', 'Chào {gender} {full_name}, thẻ dịch vụ {code_card} sẽ hết hạn vào {time}', 0, NULL, NULL, '2019-04-11 10:13:14', '2019-04-11 10:13:14', NULL, 25, '2019-04-11 10:13:00');

-- ----------------------------
-- Table structure for email_log
-- ----------------------------
DROP TABLE IF EXISTS `email_log`;
CREATE TABLE `email_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NULL DEFAULT NULL COMMENT 'Tên chiến dịch',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Email',
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên khách hàng',
  `email_status` enum('new','cancel','sent') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Trạng thái gửi tin',
  `email_type` enum('birthday','new_appointment','cancel_appointment','remind_appointment','paysuccess','new_customer','service_card_nearly_expired','service_card_over_number_used','service_card_expires','print_card') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Loại tin',
  `object_id` int(11) NULL DEFAULT NULL,
  `object_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content_sent` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Nội dung gửi',
  `created_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày tạo',
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày cập nhật',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `time_sent` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian bắt đầu gửi tin nhắn',
  `time_sent_done` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian gửi xong tin nhắn',
  `provider` enum('gmail','amazone') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'dich vụ email',
  `sent_by` int(11) NULL DEFAULT NULL COMMENT 'Người gửi',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 369 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for email_provider
-- ----------------------------
DROP TABLE IF EXISTS `email_provider`;
CREATE TABLE `email_provider`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('gmail','amazone') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Loại dịch vu',
  `name_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Tên đại điện',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Email',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Mật khẩu',
  `is_actived` tinyint(1) NULL DEFAULT NULL COMMENT 'TRạng thái',
  `email_template_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of email_provider
-- ----------------------------
INSERT INTO `email_provider` VALUES (1, 'amazone', 'PIOSPA', 'cs@piospa.com', NULL, 1, 1, NULL, '2020-02-21 11:49:54', 28, 28);

-- ----------------------------
-- Table structure for email_templates
-- ----------------------------
DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Ảnh hiển thị template',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of email_templates
-- ----------------------------
INSERT INTO `email_templates` VALUES (1, 'template-1.jpg');
INSERT INTO `email_templates` VALUES (2, 'template-2.jpg');
INSERT INTO `email_templates` VALUES (3, 'template-3.jpg');
INSERT INTO `email_templates` VALUES (4, 'template-4.jpg');

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq`  (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_group` int(11) NULL DEFAULT NULL COMMENT 'nhóm ? nếu type khác faq thì null',
  `faq_type` enum('faq','privacy_policy','terms_use') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'faq : hỏi đáp, policy : chính sach bảo mật, terms : điều khoản sử dụng',
  `faq_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'title',
  `faq_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'nội dung',
  `faq_position` int(10) UNSIGNED NULL DEFAULT 1 COMMENT 'thứ tự hiển thị',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`faq_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'trung tâm cài đặt hỗ trợ' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for faq_group
-- ----------------------------
DROP TABLE IF EXISTS `faq_group`;
CREATE TABLE `faq_group`  (
  `faq_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL,
  `faq_group_type` enum('basic','default','page') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'nếu loại là trang (dùng cho cms)',
  `faq_group_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'tiêu đề',
  `faq_group_position` int(10) UNSIGNED NULL DEFAULT 1 COMMENT 'vị trí hiển thị',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`faq_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'nhóm trung tâm cài đặt hỗ trợ' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for feedback_answer
-- ----------------------------
DROP TABLE IF EXISTS `feedback_answer`;
CREATE TABLE `feedback_answer`  (
  `feedback_answer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `feedback_question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_answer_value` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`feedback_answer_id`) USING BTREE,
  INDEX `feedback_question_id`(`feedback_question_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách câu trả lời của bảng khảo sát' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for feedback_question
-- ----------------------------
DROP TABLE IF EXISTS `feedback_question`;
CREATE TABLE `feedback_question`  (
  `feedback_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_question_type` enum('rating','comment') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rating' COMMENT 'rating: câu hỏi đánh giá; comment: câu hỏi dạng phát biểu cảm nghĩ',
  `feedback_question_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_question_active` tinyint(1) NULL DEFAULT 1 COMMENT '0: Ẩn; 1: Hiển thị',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`feedback_question_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh sách câu hỏi của bảng khảo sát' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_checking_details
-- ----------------------------
DROP TABLE IF EXISTS `inventory_checking_details`;
CREATE TABLE `inventory_checking_details`  (
  `inventory_checking_detail_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inventory_checking_id` int(11) NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `quantity_old` int(11) NULL DEFAULT NULL,
  `quantity_new` int(11) NULL DEFAULT NULL,
  `quantity_difference` int(11) NULL DEFAULT NULL,
  `current_price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `type_resolve` enum('not','output','input') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`inventory_checking_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_checkings
-- ----------------------------
DROP TABLE IF EXISTS `inventory_checkings`;
CREATE TABLE `inventory_checkings`  (
  `inventory_checking_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NULL DEFAULT NULL,
  `checking_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'phiếu kiểm kê : KK + nam + thang + ngay + (id tự tăng phiếu )',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `approved_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `status` enum('draft','success') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`inventory_checking_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_input_details
-- ----------------------------
DROP TABLE IF EXISTS `inventory_input_details`;
CREATE TABLE `inventory_input_details`  (
  `inventory_input_detail_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inventory_input_id` int(11) NULL DEFAULT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `current_price` int(11) NULL DEFAULT NULL,
  `quantity_recived` int(11) NULL DEFAULT NULL,
  `total` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`inventory_input_detail_id`) USING BTREE,
  INDEX `filling_station_inventory_workflow_header_id`(`inventory_input_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_inputs
-- ----------------------------
DROP TABLE IF EXISTS `inventory_inputs`;
CREATE TABLE `inventory_inputs`  (
  `inventory_input_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NULL DEFAULT NULL,
  `pi_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'phiếu nhập kho : PN + nam + thang + ngay + (id tự tăng phiếu )',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `approved_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `approved_at` datetime(0) NULL DEFAULT NULL,
  `status` enum('success','inprogress','new','draft','cancel') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_recived` int(11) NULL DEFAULT NULL,
  `date_recived` datetime(0) NULL DEFAULT NULL,
  `object_id` int(11) NULL DEFAULT NULL,
  `type` enum('normal','transfer','checking','return') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'normal',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`inventory_input_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_output_details
-- ----------------------------
DROP TABLE IF EXISTS `inventory_output_details`;
CREATE TABLE `inventory_output_details`  (
  `inventory_output_detail_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inventory_output_id` int(11) NULL DEFAULT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `current_price` int(11) NULL DEFAULT NULL,
  `total` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`inventory_output_detail_id`) USING BTREE,
  INDEX `filling_station_inventory_workflow_header_id`(`inventory_output_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 209 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_outputs
-- ----------------------------
DROP TABLE IF EXISTS `inventory_outputs`;
CREATE TABLE `inventory_outputs`  (
  `inventory_output_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `po_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'phiếu xuất kho: XK + nam + thang + ngay + (id tự tăng phiếu )',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `approved_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `approved_at` datetime(0) NULL DEFAULT NULL,
  `status` enum('success','inprogress','new','draft','cancel') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` enum('normal','retail','transfer','checking') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'normal',
  `object_id` int(11) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`inventory_output_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 385 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_tranfer_details
-- ----------------------------
DROP TABLE IF EXISTS `inventory_tranfer_details`;
CREATE TABLE `inventory_tranfer_details`  (
  `inventory_tranfer_detail_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inventory_tranfer_id` int(11) NULL DEFAULT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `current_price` int(11) NULL DEFAULT NULL,
  `quantity_tranfer` int(255) NULL DEFAULT NULL,
  `total` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`inventory_tranfer_detail_id`) USING BTREE,
  INDEX `filling_station_inventory_workflow_header_id`(`inventory_tranfer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for inventory_tranfers
-- ----------------------------
DROP TABLE IF EXISTS `inventory_tranfers`;
CREATE TABLE `inventory_tranfers`  (
  `inventory_tranfer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `warehouse_to` int(11) NOT NULL,
  `warehouse_from` int(11) NULL DEFAULT NULL,
  `transfer_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'phiếu chuyển kho : CK + nam + thang + ngay + (id tự tăng phiếu )',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `approved_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `approved_at` datetime(0) NULL DEFAULT NULL,
  `transfer_at` datetime(0) NULL DEFAULT NULL,
  `status` enum('success','inprogress','new','draft','cancel') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`inventory_tranfer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for manual_group
-- ----------------------------
DROP TABLE IF EXISTS `manual_group`;
CREATE TABLE `manual_group`  (
  `manual_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `manual_group_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'tiêu đề',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`manual_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'nhóm trung tâm cài đặt hỗ trợ' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of manual_group
-- ----------------------------
INSERT INTO `manual_group` VALUES (1, 'Hướng dẫn đặt lịch', 1, 0, '2020-04-08 14:13:43', NULL, '2020-04-08 14:13:46', NULL);
INSERT INTO `manual_group` VALUES (2, 'Hướng dẫn đặt hàng', 1, 0, '2020-04-08 14:13:58', NULL, '2020-04-08 14:14:00', NULL);
INSERT INTO `manual_group` VALUES (3, 'Hướng dẫn sử dụng mã giảm giá', 1, 0, '2020-04-08 14:14:16', NULL, '2020-04-08 14:14:18', NULL);

-- ----------------------------
-- Table structure for manuals
-- ----------------------------
DROP TABLE IF EXISTS `manuals`;
CREATE TABLE `manuals`  (
  `manual_id` int(11) NOT NULL AUTO_INCREMENT,
  `manual_group_id` int(11) NOT NULL,
  `manual_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'title',
  `manual_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'nội dung',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`manual_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'trung tâm cài đặt hỗ trợ' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for map_product_attributes
-- ----------------------------
DROP TABLE IF EXISTS `map_product_attributes`;
CREATE TABLE `map_product_attributes`  (
  `map_product_attribute_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_attribute_groupd_id` int(11) NULL DEFAULT NULL,
  `product_attribute_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`map_product_attribute_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for map_role_group_staff
-- ----------------------------
DROP TABLE IF EXISTS `map_role_group_staff`;
CREATE TABLE `map_role_group_staff`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_group_id` int(11) NULL DEFAULT NULL,
  `staff_id` int(11) NULL DEFAULT NULL,
  `is_actived` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of map_role_group_staff
-- ----------------------------
INSERT INTO `map_role_group_staff` VALUES (1, 1, 35, '1', '2019-04-25 10:06:40', '2019-04-25 10:06:40');
INSERT INTO `map_role_group_staff` VALUES (2, 1, 36, '1', '2019-05-27 15:23:14', '2019-05-27 15:23:14');
INSERT INTO `map_role_group_staff` VALUES (5, 2, 39, '1', '2019-09-23 11:55:05', '2019-09-23 11:55:05');
INSERT INTO `map_role_group_staff` VALUES (10, 1, 25, '1', '2019-09-26 19:07:16', '2019-09-26 19:07:16');
INSERT INTO `map_role_group_staff` VALUES (12, 2, 37, '1', '2019-09-29 17:51:50', '2019-09-29 17:51:50');
INSERT INTO `map_role_group_staff` VALUES (32, 3, 40, '1', '2019-11-12 22:26:23', '2019-11-12 22:26:23');
INSERT INTO `map_role_group_staff` VALUES (33, 1, 42, '1', '2019-11-25 12:41:29', '2019-11-25 12:41:29');
INSERT INTO `map_role_group_staff` VALUES (34, 2, 42, '1', '2019-11-25 12:41:29', '2019-11-25 12:41:29');
INSERT INTO `map_role_group_staff` VALUES (35, 3, 42, '1', '2019-11-25 12:41:29', '2019-11-25 12:41:29');
INSERT INTO `map_role_group_staff` VALUES (36, 4, 42, '1', '2019-11-25 12:41:29', '2019-11-25 12:41:29');
INSERT INTO `map_role_group_staff` VALUES (37, 1, 41, '1', '2020-02-19 09:23:23', '2020-02-19 09:23:23');
INSERT INTO `map_role_group_staff` VALUES (38, 2, 41, '1', '2020-02-19 09:23:23', '2020-02-19 09:23:23');
INSERT INTO `map_role_group_staff` VALUES (39, 3, 41, '1', '2020-02-19 09:23:23', '2020-02-19 09:23:23');
INSERT INTO `map_role_group_staff` VALUES (40, 4, 41, '1', '2020-02-19 09:23:23', '2020-02-19 09:23:23');
INSERT INTO `map_role_group_staff` VALUES (41, 2, 38, '1', '2020-02-26 11:44:16', '2020-02-26 11:44:16');
INSERT INTO `map_role_group_staff` VALUES (42, 2, 43, '1', '2020-02-26 11:53:22', '2020-02-26 11:53:22');

-- ----------------------------
-- Table structure for member_levels
-- ----------------------------
DROP TABLE IF EXISTS `member_levels`;
CREATE TABLE `member_levels`  (
  `member_level_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `code` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `point` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`member_level_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of member_levels
-- ----------------------------
INSERT INTO `member_levels` VALUES (1, 'Thành Viên', 'thanh-vien', 'member', 0, 0, '<p>Thành viên mới chưa có quyền lợi</p>', 1, 1, 28, '2019-11-14 13:53:33', '2020-04-27 14:48:12', 0);
INSERT INTO `member_levels` VALUES (2, 'Bạc', 'bac', 'silver', 100, 5, NULL, 1, 1, 28, '2019-11-14 13:53:56', '2019-11-24 10:14:49', 0);
INSERT INTO `member_levels` VALUES (3, 'Vàng', 'vang', 'gold', 200, 10, NULL, 1, 1, 28, '2019-11-14 13:54:17', '2019-11-24 10:14:58', 0);
INSERT INTO `member_levels` VALUES (4, 'Kim Cương', 'kim-cuong', 'diamond', 500, 15, NULL, 1, 1, 28, '2019-11-14 13:55:03', '2020-03-20 16:08:30', 0);

-- ----------------------------
-- Table structure for mystore_filter_group
-- ----------------------------
DROP TABLE IF EXISTS `mystore_filter_group`;
CREATE TABLE `mystore_filter_group`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `filter_group_type` enum('user_define','auto') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Kiểu tự định nghĩa/ auto',
  `tenant_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_brand` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `filter_condition_rule_A` enum('or','and') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `filter_condition_rule_B` enum('or','and') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'Nhóm khách hàng nhận thông báo' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `new_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description_detail_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `description_detail_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Sản phẩm liên quan',
  `service` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Dịch vụ liên quan',
  `is_actived` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`new_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification`  (
  `notification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID tự tăng',
  `notification_detail_id` bigint(20) NULL DEFAULT NULL COMMENT 'Chi tiet notification',
  `user_id` int(11) NOT NULL COMMENT 'ID user',
  `notification_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Avatar của thông báo',
  `notification_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Title',
  `notification_message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Nội dung thông báo',
  `is_read` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tin nhắn đọc chua',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày tạo',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày cập nhật',
  PRIMARY KEY (`notification_id`) USING BTREE,
  INDEX `notification_detail_id`(`notification_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 357 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Thông báo' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for notification_detail
-- ----------------------------
DROP TABLE IF EXISTS `notification_detail`;
CREATE TABLE `notification_detail`  (
  `notification_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID notification tu tang',
  `tenant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'ID tenant. Neu notification cua mystore thi nul',
  `background` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Noi dung thong bao',
  `action_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên hiển thị của action',
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'App route khi click vao thong bao',
  `action_params` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Param route',
  `is_brand` tinyint(1) NULL DEFAULT 0 COMMENT '0 nếu ở backoffice, 1 nếu gửi từ brandportal',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thoi gian tao',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Nguoi tao',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Thoi gian cap nhat',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Nguoi cap nhat',
  PRIMARY KEY (`notification_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 320 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Chi tiet notification' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for notification_queue
-- ----------------------------
DROP TABLE IF EXISTS `notification_queue`;
CREATE TABLE `notification_queue`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID tự tăng',
  `notification_detail_id` bigint(20) UNSIGNED NULL DEFAULT NULL COMMENT 'Noi dung gui notification',
  `tenant_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'ID xac dinh brand',
  `send_type` enum('all','group','unicast') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Gui tat ca user hoac nhom',
  `send_type_object` int(11) NULL DEFAULT NULL COMMENT 'ID object',
  `notification_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Avatar của thông báo',
  `notification_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Title',
  `notification_message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Nội dung thông báo',
  `send_at` datetime(0) NOT NULL COMMENT 'Thoi gian hen gio',
  `is_brand` tinyint(1) NOT NULL COMMENT 'Notification cua brand hay mystore',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thoi gian tao',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Nguoi tao',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày cập nhật',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Nguoi cap nhat',
  `is_actived` tinyint(2) NULL DEFAULT NULL,
  `is_send` tinyint(1) NULL DEFAULT 0 COMMENT 'Đanh dau da gui',
  `is_deleted` tinyint(1) NULL DEFAULT 0 COMMENT 'Danh dau huy,xoa',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notification_detail_id`(`notification_detail_id`) USING BTREE,
  INDEX `tenant_id_is_send`(`tenant_id`, `is_send`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Notification hẹn giờ gửi' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for notification_template
-- ----------------------------
DROP TABLE IF EXISTS `notification_template`;
CREATE TABLE `notification_template`  (
  `notification_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_detail_id` int(11) NULL DEFAULT NULL,
  `notification_type_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'tiêu đề thông báo',
  `title_short` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'tiêu đề hiển thị ngắn',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'thông tin nổi bật của thông báo',
  `action_group` tinyint(255) NULL DEFAULT 1 COMMENT '0 không có hành động, 1 có hành động',
  `action_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'tên hành động',
  `from_type` enum('all','group') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'loại người nhận',
  `from_type_object` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `send_type` enum('immediately','schedule') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'loại thời gian gửi thông báo : ngay lập tức hay lịch',
  `send_at` datetime(0) NULL DEFAULT NULL,
  `schedule_option` enum('specific','none') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Loại nếu gửi tùy chọn : chính xác hoặc tương đối',
  `schedule_value` tinyint(4) NULL DEFAULT NULL COMMENT 'giá trị',
  `schedule_value_type` enum('day','hours','minute') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'hours',
  `send_status` enum('sent','not','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_actived` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`notification_template_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for notification_template_auto
-- ----------------------------
DROP TABLE IF EXISTS `notification_template_auto`;
CREATE TABLE `notification_template_auto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID tự tăng',
  `key` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Key đùng để xác định notification',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề',
  `message` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung tin nhắn',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Hình của notification',
  `has_detail` tinyint(1) NULL DEFAULT 0 COMMENT 'Có trang chi tiết không',
  `detail_background` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Background detail',
  `detail_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung detail',
  `detail_action_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên button tương tác',
  `detail_action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Action khi click ở app',
  `detail_action_params` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Param bổ sung',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày tạo',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày cập nhật',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `key`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Template cấu hình nội dung gửi Notification' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of notification_template_auto
-- ----------------------------
INSERT INTO `notification_template_auto` VALUES (1, 'order_status_W', 'Cảm ơn bạn đã đặt hàng', 'Đơn đặt hàng số [order_code] đã được tiếp nhận và đang chờ xử lý', 'http://backend-api.piospa.com/uploads/notification/config/20200416/6158700890616042020_notification.jpg', 1, 'http://backend-api.piospa.com/uploads/notification/config/20200416/9158700890816042020_notification.jpg', '<p style=\"font-size:14px\">Đơn đặt hàng số [order_code] đã được tiếp nhận và đang chờ xử lý</p>', 'Xem chi tiết', 'order_detail', '{\"order_id\":\"[:order_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:31:54', '2020-04-16 17:48:30');
INSERT INTO `notification_template_auto` VALUES (2, 'order_status_D', 'Đơn hàng được cập nhật trạng thái đang giao hàng!', 'Đơn đặt hàng số [order_code] đã được xác nhận và trong bắt đầu giao hàng', NULL, 1, NULL, '<p style=\"font-size:14px\">Đơn đặt hàng số [order_code] đã được xác nhận và trong bắt đầu giao hàng</p>', 'Xem chi tiết', 'order_detail', '{\"order_id\":\"[:order_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:32:53', '2020-04-14 17:05:25');
INSERT INTO `notification_template_auto` VALUES (3, 'order_status_I', 'Đơn hàng được cập nhật trạng thái đã giao hàng!', 'Đơn đặt hàng số [order_code] đã được giao hàng thành công', NULL, 1, NULL, '<p style=\"font-size:14px\">Đơn đặt hàng số [order_code] đã được giao hàng thành công</p>', 'Xem chi tiết', 'order_detail', '{\"order_id\":\"[:order_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:35:24', '2020-04-14 17:05:35');
INSERT INTO `notification_template_auto` VALUES (4, 'order_status_B', 'Đơn hàng được cập nhật trạng thái đã trả hàng!', 'Đơn đặt hàng số [order_code] đã được trả hàng thành công', 'http://backend-api.piospa.com/uploads/notification/config/20200416/8158700840416042020_notification.png', 1, 'http://backend-api.piospa.com/uploads/notification/config/20200416/9158700841116042020_notification.jpg', '<p style=\"font-size:14px\">Đơn đặt hàng số [order_code] đã được trả hàng thành công</p>', 'Xem chi tiết', 'order_detail', '{\"order_id\":\"[:order_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:35:24', '2020-04-16 17:40:17');
INSERT INTO `notification_template_auto` VALUES (5, 'order_status_C', 'Đơn hàng được cập nhật trạng thái đã hủy!', 'Đơn đặt hàng số [order_code] đã bị hủy', NULL, 1, NULL, '<p style=\"font-size:14px\">Đơn đặt hàng số [order_code] đã bị hủy</p>', 'Xem chi tiết', 'order_detail', '{\"order_id\":\"[:order_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:35:24', '2020-04-14 17:06:08');
INSERT INTO `notification_template_auto` VALUES (6, 'brand_connect_status_W', 'Yêu cầu kết nối của bạn đang chờ duyệt!', 'Yêu cầu kết nối với [:brand_name] đã được tiếp nhận và đang chờ xử lý. Kết nối thêm với các nhà cung cấp khác để đặt hàng dễ dàng hơn!', NULL, 1, NULL, '<p style=\"font-size:14px\">Yêu cầu kết nối với [:brand_name] đã được tiếp nhận và đang chờ xử lý. Kết nối thêm với các nhà cung cấp khác để đặt hàng dễ dàng hơn!</p>', 'Kết nối thêm nhà cung cấp', 'home', NULL, '2019-10-10 09:05:33', '2019-11-21 15:47:00');
INSERT INTO `notification_template_auto` VALUES (7, 'brand_connect_status_C', 'Chúc mừng bạn đã kết nối thành công với nhà cung cấp!', '[:brand_name] và bạn đã kết nối thành công. Hãy bắt đầu đặt hàng ngay!', NULL, 1, NULL, '<p style=\"font-size:14px\">[:brand_name] và bạn đã kết nối thành công. Hãy bắt đầu đặt hàng ngay!</p>', 'Đặt hàng ngay', 'brand', '{\"brand_id\":[:brand_id],\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\"}', '2019-10-10 09:07:33', '2019-11-21 15:47:09');
INSERT INTO `notification_template_auto` VALUES (8, 'brand_connect_status_R', 'Kết nối với nhà cung cấp không thành công!', 'Chúng tôi rất tiếc! [:brand_name] đã từ chối kết nối với bạn. Vui lòng liên hệ với [:brand_name] hoặc thực hiện kết nối lại!', NULL, 1, NULL, '<p style=\"font-size:14px\">Chúng tôi rất tiếc! [:brand_name] đã từ chối kết nối với bạn. Vui lòng liên hệ với [:brand_name] hoặc thực hiện kết nối lại!</p>', 'Kết nối lại', 'brand_info', '{\"brand_id\":[:brand_id],\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\"}', '2019-10-10 09:10:07', '2019-11-21 15:47:19');
INSERT INTO `notification_template_auto` VALUES (9, 'marketing_register_status_W', 'Yêu cầu đăng ký chương trình khuyến mãi của bạn đang chờ duyệt!', 'Yêu cầu đăng ký khuyến mãi với [:brand_name] đã được tiếp nhận và đang chờ xử lý. Xem thêm các chương trình khuyến mãi khác và đặt hàng ngay!', NULL, 1, NULL, '<p style=\"font-size:14px\">Yêu cầu đăng ký khuyến mãi với [:brand_name] đã được tiếp nhận và đang chờ xử lý. Xem thêm các chương trình khuyến mãi khác và đặt hàng ngay!</p>', 'Xem chi tiết', 'market', '{\"campaign_id\":\"[:campaign_id]\",\"promo_name\":\"[:promo_name]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":\"[:brand_id]\"}', '2019-10-10 09:10:07', '2020-04-14 17:03:28');
INSERT INTO `notification_template_auto` VALUES (10, 'marketing_register_status_C', 'Chúc mừng bạn đã đăng ký chương trình khuyến mãi thành công!', 'Đăng ký khuyến mãi với [:brand_name] đã được duyệt. Hãy bắt đầu đặt hàng ngay!', NULL, 1, NULL, '<p style=\"font-size:14px\">Đăng ký khuyến mãi với [:brand_name] đã được duyệt. Hãy bắt đầu đặt hàng ngay!</p>', 'Xem chi tiết', 'market', '{\"campaign_id\":[:campaign_id],\"promo_name\":\"[:promo_name]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-10 09:10:07', '2019-11-21 15:47:35');
INSERT INTO `notification_template_auto` VALUES (11, 'marketing_register_status_R', 'Đăng ký khuyến mãi không thành công!', 'Chúng tôi rất tiếc! [:brand_name] đã từ chối đăng ký chương trình khuyến mãi của bạn. Vui lòng liên hệ với [:brand_name] hoặc thực hiện đăng ký lại!', NULL, 1, NULL, '<p style=\"font-size:14px\">Chúng tôi rất tiếc! [:brand_name] đã từ chối đăng ký chương trình khuyến mãi của bạn. Vui lòng liên hệ với [:brand_name] hoặc thực hiện đăng ký lại!</p>', 'Đăng ký lại', 'market', '{\"campaign_id\":\"[:campaign_id]\",\"promo_name\":\"[:promo_name]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-10 09:10:07', '2019-11-21 15:47:43');
INSERT INTO `notification_template_auto` VALUES (12, 'send_cart_not_order', 'Bạn có quên giỏ hàng chưa đặt hàng không?', 'Nhiều sản phẩm của [:brand_name] đã được thêm vào giỏ hàng của bạn nhưng chưa được đặt hàng. Đặt hàng ngay để khách hàng của bạn luôn luôn mua được những sản phẩm cần thiết và không lo hết hàng nhé!', NULL, 1, NULL, '<p style=\"font-size:14px\">Nhiều sản phẩm của [:brand_name] đã được thêm vào giỏ hàng của bạn nhưng chưa được đặt hàng. Đặt hàng ngay để khách hàng của bạn luôn luôn mua được những sản phẩm cần thiết và không lo hết hàng nhé!</p>', 'Đặt hàng ngay', 'order_product', '{\"brand_id\":[:brand_id],\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\"}', '2019-10-10 09:10:07', '2019-11-22 09:23:50');
INSERT INTO `notification_template_auto` VALUES (13, 'send_order_flash', 'Bạn có một đơn hàng gợi ý từ [:brand_name]!', 'Đặt hàng ngay để khách hàng của bạn luôn luôn mua được những sản phẩm cần thiết và không lo hết hàng nhé!', NULL, 1, NULL, '<p style=\"font-size:14px\">Đặt hàng ngay để khách hàng của bạn luôn luôn mua được những sản phẩm cần thiết và không lo hết hàng nhé!</p>', 'Đặt hàng ngay', 'quick_order', '{\"order_list_id\":[:hint_order_id],\"brand_id\":[:brand_id],\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\"}', '2019-10-10 09:10:07', '2019-11-22 09:24:05');
INSERT INTO `notification_template_auto` VALUES (14, 'appointment_W', 'Cảm ơn bạn đã đặt lịch', 'Lịch chăm sóc tại [branch_name] vào lúc [time] [date] đã được tiếp nhận và đang chờ xử lý', 'http://backend-api.piospa.com/uploads/notification/config/20200416/7158700891816042020_notification.jpg', 1, 'http://backend-api.piospa.com/uploads/notification/config/20200416/9158700892016042020_notification.jpg', '<p style=\"font-size:14px\">Lịch chăm sóc tại [branch_name] vào lúc [time] [date] đã được tiếp nhận và đang chờ xử lý</p>', 'Xem chi tiết', 'appointment_detail', '{\"appointment_id\":\"[:customer_appointment_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:31:54', '2020-04-16 17:48:41');
INSERT INTO `notification_template_auto` VALUES (16, 'appointment_R', 'Lịch hẹn gần đến giờ', 'Bạn có lịch chăm sóc tại [branch_name] vào lúc [time] [date] .Mau đến cửa hàng thôi nào ', NULL, 1, NULL, '<p style=\"font-size:14px\">Bạn có lịch chăm sóc tại [branch_name] vào lúc [time] [date] .Mau đến cửa hàng thôi nào </p>', 'Xem chi tiết', 'appointment_detail', '{\"appointment_id\":\"[:customer_appointment_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:31:54', '2020-04-15 09:36:40');
INSERT INTO `notification_template_auto` VALUES (17, 'appointment_C', 'Lịch hẹn đã huỷ', 'Lịch chăm sóc tại [branch_name] vào lúc [time] [date] đã huỷ. Chân thành cám ơn và hẹn bạn lần tiếp theo', NULL, 1, NULL, '<p style=\"font-size:14px\">Lịch chăm sóc tại [branch_name] vào lúc [time] [date] đã huỷ. Chân thành cám ơn và hẹn bạn lần tiếp theo</p>', 'Xem chi tiết', 'appointment_detail', '{\"appointment_id\":\"[:customer_appointment_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:31:54', '2020-04-15 10:10:03');
INSERT INTO `notification_template_auto` VALUES (18, 'service_card_nearly_expired', 'Liệu trình gần hết hạn', 'Liệu trình [name] sẽ hết hạn vào ngày [expired_date]. Hãy đến với chúng tôi để được chăm sóc', NULL, 0, NULL, '<p style=\"font-size:14px\">Liệu trình [name] sẽ hết hạn vào ngày [expired_date]. Hãy đến với chúng tôi để được chăm sóc </p>', '', '', '', '2019-10-04 17:31:54', '2020-04-14 09:25:45');
INSERT INTO `notification_template_auto` VALUES (19, 'service_card_expired', 'Liệu trình hết hạn sử dụng', 'Liệu trình [name] đã hết hạn vào ngày [expired_date]. Cám ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi', NULL, 0, NULL, '<p style=\"font-size:14px\">Liệu trình [name] đã hết hạn vào ngày [expired_date]. Cám ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi </p>', '', '', '', '2019-10-04 17:31:54', '2020-04-14 09:25:06');
INSERT INTO `notification_template_auto` VALUES (20, 'service_card_over_number_used', 'Liệu trình hết số lần sử dụng', 'Liệu trình [name] đã sử dụng hết các lần cho phép . Hãy đến với chúng tôi để tiếp tục sử dụng các dịch vụ tuyệt vời', NULL, 0, NULL, '<p style=\"font-size:14px\">Liệu trình [name] đã sử dụng hết các lần cho phép . Hãy đến với chúng tôi để tiếp tục sử dụng các dịch vụ tuyệt vời </p>', '', '', '', '2019-10-04 17:31:54', '2020-04-14 09:09:29');
INSERT INTO `notification_template_auto` VALUES (21, 'customer_ranking', 'Chúc mừng thăng hạng', 'Chúc mừng bạn đã thăng hạng [name] với những quyền lợi mới.Hãy tận hưởng nào ', NULL, 1, NULL, '<p style=\"font-size:14px\">Chúc mừng bạn đã thăng hạng [name] với những quyền lợi mới.Hãy tận hưởng nào </p>', 'Xem chi tiết', 'loyalty', '', '2019-10-04 17:31:54', '2020-04-14 08:51:30');
INSERT INTO `notification_template_auto` VALUES (22, 'customer_birthday', 'Chúc mừng sinh nhật khách hàng', 'Chúc bạn có một ngày sinh nhật vui vẻ và thành công trong công việc ', NULL, 0, NULL, '<p style=\"font-size:14px\">Chúc bạn có một ngày sinh nhật vui vẻ và thành công trong công việc </p>', NULL, 'birthday', NULL, NULL, '2020-04-19 14:23:28');
INSERT INTO `notification_template_auto` VALUES (23, 'customer_W', 'Chúc mừng khách hàng mới', 'Chúc mừng [name] đã trở thành thành viên mới, hãy tận hưởng những dịch vụ tốt nhất của chúng tôi.', NULL, 0, NULL, '<p style=\"font-size:14px\">Chúc mừng [name] đã trở thành thành viên mới, hãy tận hưởng những dịch vụ tốt nhất của chúng tôi.</p>', NULL, NULL, NULL, NULL, '2020-04-15 10:38:18');
INSERT INTO `notification_template_auto` VALUES (24, 'order_status_S', 'Đơn hàng đã được thanh toán thành công', 'Đơn đặt hàng số [order_code] đã được thanh toán thành công', NULL, 1, NULL, '<p style=\"font-size:14px\">Đơn đặt hàng số [order_code] đã được thanh toán thành công</p>', 'Xem chi tiết', 'order_detail', '{\"order_id\":\"[:order_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', NULL, '2020-04-15 12:06:57');
INSERT INTO `notification_template_auto` VALUES (25, 'order_status_A', 'Đơn hàng được cập nhật trạng thái Xác nhận!', 'Đơn đặt hàng số [order_code] đã được Xác nhận', 'http://backend-api.piospa.com/uploads/notification/config/20200416/8158700840416042020_notification.png', 1, 'http://backend-api.piospa.com/uploads/notification/config/20200416/9158700841116042020_notification.jpg', '<p style=\"font-size:14px\">Đơn đặt hàng số [order_code] đã được xác nhận.Chúng tôi sẽ lên kết hoạch giao hàng đến bạn sớm nhất</p>', 'Xem chi tiết', 'order_detail', '{\"order_id\":\"[:order_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:35:24', '2020-04-18 17:04:50');
INSERT INTO `notification_template_auto` VALUES (26, 'appointment_A', 'Lịch hẹn đã được Xác nhận', 'Lịch chăm sóc tại [branch_name] vào lúc [time] [date] đã được Xác nhận', 'http://backend-api.piospa.com/uploads/notification/config/20200416/7158700891816042020_notification.jpg', 1, 'http://backend-api.piospa.com/uploads/notification/config/20200416/9158700892016042020_notification.jpg', '<p style=\"font-size:14px\">Lịch chăm sóc tại [branch_name] vào lúc [time] [date] đã được Xác nhận</p>', 'Xem chi tiết', 'appointment_detail', '{\"appointment_id\":\"[:customer_appointment_id]\",\"user_id\":\"[:user_id]\",\"brand_url\":\"[:brand_url]\",\"brand_name\":\"[:brand_name]\",\"brand_id\":[:brand_id]}', '2019-10-04 17:31:54', '2020-04-16 17:48:41');

-- ----------------------------
-- Table structure for notification_type
-- ----------------------------
DROP TABLE IF EXISTS `notification_type`;
CREATE TABLE `notification_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_detail` tinyint(1) NULL DEFAULT 0 COMMENT 'có đích đến chi tiết',
  `detail_type` enum('brand','faq','order','market','faq_brand','product','report') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'loại popup danh sách tương ứng với action app',
  `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'App route khi click vao thong bao',
  `from` enum('backoffice','brand','all') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'dùng cho cms nào ?',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `is_notify` tinyint(1) NULL DEFAULT 1,
  `is_banner` tinyint(1) NULL DEFAULT 0 COMMENT 'dùng cho banner',
  `is_deleted` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of notification_type
-- ----------------------------
INSERT INTO `notification_type` VALUES (1, 'Trang chủ thương hiệu', 1, 'brand', 'brand', 'all', '2019-09-16 11:38:41', '2019-09-16 11:38:41', 1, 1, 0);

-- ----------------------------
-- Table structure for order_commission
-- ----------------------------
DROP TABLE IF EXISTS `order_commission`;
CREATE TABLE `order_commission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_detail_id` int(11) NULL DEFAULT NULL,
  `refer_id` int(11) NULL DEFAULT NULL COMMENT 'Người giới thiệu',
  `staff_id` int(11) NULL DEFAULT NULL COMMENT 'Nhân viên phục vụ',
  `refer_money` decimal(16, 0) NULL DEFAULT NULL COMMENT 'Tiền hoa hồng người giới thiệu',
  `staff_money` decimal(16, 0) NULL DEFAULT NULL COMMENT 'Tiền hoa hồng nhân viên phục vụ',
  `status` enum('approve','cancel') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'approve',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `order_detail_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(16) NOT NULL,
  `object_id` int(16) NOT NULL COMMENT 'id của dich vụ , sản phẩm hoac thẻ dịch vụ tuỳ objecttype ',
  `object_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'tên của dich vụ , sản phẩm hoac thẻ dịch vụ tuỳ objecttype ',
  `object_type` enum('service_card','service','product','member_card') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `object_code` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `staff_id` int(11) NULL DEFAULT NULL COMMENT 'nhân viên phục vụ',
  `refer_id` int(11) NULL DEFAULT NULL COMMENT 'Người giới thiệu',
  `price` int(16) NULL DEFAULT NULL,
  `quantity` int(16) NULL DEFAULT NULL,
  `discount` int(16) NULL DEFAULT NULL,
  `amount` int(16) NULL DEFAULT NULL,
  `voucher_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` datetime(0) NULL DEFAULT NULL,
  `is_deleted` tinyint(4) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`order_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1311 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for order_log
-- ----------------------------
DROP TABLE IF EXISTS `order_log`;
CREATE TABLE `order_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `created_type` enum('backend','app') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'backend' COMMENT 'Người tạo ăn theo type',
  `type` enum('update','status') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('not_call','confirmed','ordercomplete','ordercancel','paysuccess','payfail','new','pay-half') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT 'Nội dung cập nhật',
  `created_by` int(11) NOT NULL COMMENT 'Người tạo sẽ ăn theo type',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for order_sources
-- ----------------------------
DROP TABLE IF EXISTS `order_sources`;
CREATE TABLE `order_sources`  (
  `order_source_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_source_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_actived` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`order_source_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of order_sources
-- ----------------------------
INSERT INTO `order_sources` VALUES (1, 'Trực tiếp', 1, 0, 1, 1, '2018-09-30 15:20:34', '2018-10-03 03:44:46', NULL);
INSERT INTO `order_sources` VALUES (2, 'Đặt qua app', 1, 0, 1, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `order_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `customer_id` int(16) NOT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `refer_id` int(11) NULL DEFAULT NULL COMMENT 'Khách giới thiệu',
  `total` decimal(16, 0) NULL DEFAULT NULL,
  `discount` decimal(16, 0) NULL DEFAULT NULL,
  `amount` decimal(10, 0) NULL DEFAULT NULL,
  `tranport_charge` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `process_status` enum('not_call','confirmed','ordercomplete','ordercancle','paysuccess','payfail','new','pay-half') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'new',
  `order_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `customer_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `payment_method_id` int(16) NULL DEFAULT NULL,
  `order_source_id` int(11) NULL DEFAULT 1,
  `transport_id` int(11) NULL DEFAULT NULL,
  `voucher_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `discount_member` decimal(16, 0) NULL DEFAULT NULL,
  `is_apply` tinyint(4) NULL DEFAULT 0 COMMENT 'Đơn hàng từ app đã chuyển chi nhánh chưa',
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 536 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for otp_log
-- ----------------------------
DROP TABLE IF EXISTS `otp_log`;
CREATE TABLE `otp_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Tên brandname',
  `telco` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Nhà mạng',
  `customer_id` int(11) NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  `message` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Nội dung tin nhắn',
  `otp` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `otp_type` enum('register','forget_password') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `otp_expired` datetime(0) NOT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 0 COMMENT '0: Otp chưa sử dụng 1: Otp đã sử dụng',
  `is_sent` tinyint(1) NULL DEFAULT 0 COMMENT 'Đã gửi',
  `time_send` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày gửi',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Tên trang',
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Route của trang',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 218 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (1, 'Danh sách lịch hen - Theo ngày', 'admin.customer_appointment.list-day', 1, '2019-04-08 14:20:24', '2019-04-08 07:20:24');
INSERT INTO `pages` VALUES (2, 'Danh sách lịch hen - Thêm mới', 'admin.customer_appointment.submitModalAdd', 0, '2019-04-08 14:20:38', '2019-04-08 07:20:38');
INSERT INTO `pages` VALUES (3, 'Danh sách lịch hen - Chi tiết lịch hẹn', 'admin.customer_appointment.detail', 1, '2019-04-08 14:20:46', '2019-04-08 07:20:46');
INSERT INTO `pages` VALUES (4, 'Chi tiết lịch hẹn - chỉnh sửa lịch hẹn', 'admin.customer_appointment.submitModalEdit', 0, '2019-04-08 14:20:57', '2019-04-08 07:20:57');
INSERT INTO `pages` VALUES (5, 'Chi tiết lịch hẹn- xác nhận lịch hẹn', 'admin.customer_appointment.submitEdit', 0, '2019-04-08 14:21:08', '2019-04-08 07:21:08');
INSERT INTO `pages` VALUES (6, 'Lịch hẹn - Danh sách lịch hẹn - Theo tuần', 'admin.customer_appointment', 0, '2019-04-08 14:21:26', '2019-04-08 07:21:26');
INSERT INTO `pages` VALUES (7, 'Danh sách lịch hẹn - Theo tuần - Chỉnh sửa lịch hẹn', 'admin.customer_appointment.submitModalEdit', 0, '2019-04-08 14:21:40', '2019-04-08 07:21:40');
INSERT INTO `pages` VALUES (8, 'Chi tiết lịch hẹn - Thanh toán', 'admin.customer_appointment.receipt', 1, '2019-04-08 14:21:52', '2019-04-08 07:21:52');
INSERT INTO `pages` VALUES (9, 'Danh sách đơn hàng', 'admin.order', 1, '2019-04-08 14:22:06', '2019-04-08 07:22:06');
INSERT INTO `pages` VALUES (10, 'Thêm mới đơn hàng', 'admin.order.add', 1, '2019-04-08 14:22:15', '2019-04-08 07:22:15');
INSERT INTO `pages` VALUES (11, 'Thêm mới đơn hàng - Chọn khách hàng', 'admin.order.search-customer', 0, '2019-04-08 14:23:20', '2019-04-08 07:23:20');
INSERT INTO `pages` VALUES (12, 'Thêm mới đơn hàng - Xử lý giảm giá từng sản', 'admin.order.add-discount', 0, '2019-04-08 14:23:35', '2019-04-08 07:23:35');
INSERT INTO `pages` VALUES (13, 'Thêm mới đơn hàng - xử lý giảm giá tổng bill', 'admin.order.add-discount-bill', 0, '2019-04-08 14:23:50', '2019-04-08 07:23:50');
INSERT INTO `pages` VALUES (14, 'Thêm mới đơn hàng - Xử lý thanh toán', 'admin.order.submitAddReceipt', 0, '2019-04-08 14:24:01', '2019-04-08 07:24:01');
INSERT INTO `pages` VALUES (15, 'Đơn hàng - Thanh toán sau', 'admin.order.receipt-after', 1, '2019-04-08 14:24:11', '2019-04-08 07:24:11');
INSERT INTO `pages` VALUES (16, 'Đơn hàng - Xóa đơn hàng', 'admin.order.remove', 0, '2019-04-08 14:24:54', '2019-04-08 07:24:54');
INSERT INTO `pages` VALUES (17, 'Đơn hàng - Chi tiết đơn hàng', 'admin.order.detail', 1, '2019-04-08 14:25:02', '2019-04-08 07:25:02');
INSERT INTO `pages` VALUES (18, 'Danh sách khách hàng', 'admin.customer', 1, '2019-04-08 14:26:02', '2019-04-08 07:26:02');
INSERT INTO `pages` VALUES (19, 'Thêm mới khách hàng', 'admin.customer.add', 1, '2019-04-08 14:26:14', '2019-04-08 07:26:14');
INSERT INTO `pages` VALUES (20, 'Thêm mới khách hàng - Thêm mới người giới thiệu', 'admin.customer.add-customer-refer', 0, '2019-04-08 14:26:30', '2019-04-08 07:26:30');
INSERT INTO `pages` VALUES (21, 'Thêm mới khách hàng - Thêm mới nhóm  khách hàng', 'admin.customer.add-customer-group', 0, '2019-04-08 14:26:44', '2019-04-08 07:26:44');
INSERT INTO `pages` VALUES (22, 'Chi tiết khách hàng', 'admin.customer.detail', 1, '2019-04-08 14:26:57', '2019-04-08 07:26:57');
INSERT INTO `pages` VALUES (23, 'Chỉnh sửa khách hàng', 'admin.customer.edit', 1, '2019-04-08 14:27:39', '2019-04-08 07:27:39');
INSERT INTO `pages` VALUES (24, 'Xóa khách hàng', 'admin.customer.remove', 0, '2019-04-08 14:27:54', '2019-04-08 07:27:54');
INSERT INTO `pages` VALUES (25, 'Khách hàng - Thay đổi trạng thái', 'admin.customer.change-status', 0, '2019-04-08 14:29:02', '2019-04-08 07:29:02');
INSERT INTO `pages` VALUES (26, 'Khách hàng - Kích hoạt thẻ dịch vụ', 'admin.customer.submitAcitve', 0, '2019-04-08 14:29:11', '2019-04-08 07:29:11');
INSERT INTO `pages` VALUES (27, 'Danh sách thẻ dịch vụ', 'admin.service-card', 1, '2019-04-08 14:29:23', '2019-04-08 07:29:23');
INSERT INTO `pages` VALUES (28, 'Thêm mới thẻ dịch vụ', 'admin.service-card.create', 1, '2019-04-08 14:29:33', '2019-04-08 07:29:33');
INSERT INTO `pages` VALUES (29, 'Chỉnh sửa thẻ dịch vụ', 'admin.service-card.edit', 1, '2019-04-08 14:29:43', '2019-04-08 07:29:43');
INSERT INTO `pages` VALUES (30, 'Chi tiết thẻ dịch vụ', 'admin.service-card.detail', 1, '2019-04-08 14:29:57', '2019-04-08 07:29:57');
INSERT INTO `pages` VALUES (31, 'Danh sách thẻ dv đã bán', 'admin.service-card.sold.service-card', 1, '2019-04-08 14:30:16', '2019-04-08 07:30:16');
INSERT INTO `pages` VALUES (32, 'Danh sách thẻ tiền đã bán', 'admin.service-card.sold.service-money', 1, '2019-04-08 14:31:17', '2019-04-08 07:31:17');
INSERT INTO `pages` VALUES (33, 'Chi tiết thẻ dịch vụ đã bán', 'admin.service-card.sold.detail', 1, '2019-04-08 14:31:29', '2019-04-08 07:31:29');
INSERT INTO `pages` VALUES (34, 'Danh sách giá dịch vụ', 'admin.service-branch-price', 1, '2019-04-08 14:32:05', '2019-04-08 07:32:05');
INSERT INTO `pages` VALUES (35, 'Cấu hình giá dịch vụ', 'admin.service-branch-price.config', 1, '2019-04-08 14:32:18', '2019-04-08 07:32:18');
INSERT INTO `pages` VALUES (36, 'Chỉnh sửa cấu hình giá dịch vụ', 'admin.service-branch-price.edit', 1, '2019-04-08 14:32:46', '2019-04-08 07:32:46');
INSERT INTO `pages` VALUES (37, 'Danh sách giá sản phẩm', 'admin.product-branch-price', 1, '2019-04-08 14:33:08', '2019-04-08 07:33:08');
INSERT INTO `pages` VALUES (38, 'Cấu hình giá sản phẩm', 'admin.product-branch-price.config', 1, '2019-04-08 14:33:23', '2019-04-08 07:33:23');
INSERT INTO `pages` VALUES (39, 'Chỉnh sửa cấu hình giá sản phẩm', 'admin.product-branch-price.edit', 1, '2019-04-08 14:33:39', '2019-04-08 07:33:39');
INSERT INTO `pages` VALUES (40, 'Quản lý kho - Tồn kho', 'admin.product-inventory', 1, '2019-04-08 14:33:53', '2019-04-08 07:33:53');
INSERT INTO `pages` VALUES (41, 'Quản lý kho - Tab nhập kho', 'admin.product-inventory.list-inventory-input', 0, '2019-04-08 14:34:32', '2019-04-08 07:34:32');
INSERT INTO `pages` VALUES (42, 'Thêm phiếu nhập kho', 'admin.inventory-input.add', 0, '2019-04-08 14:35:26', '2019-04-08 07:35:26');
INSERT INTO `pages` VALUES (43, 'Chỉnh sửa phiếu nhập kho', 'admin.inventory-input.edit', 0, '2019-04-08 14:35:40', '2019-04-08 07:35:40');
INSERT INTO `pages` VALUES (44, 'Xóa phiếu nhập kho', 'admin.inventory-input.remove', 0, '2019-04-08 14:35:54', '2019-04-08 07:35:54');
INSERT INTO `pages` VALUES (45, 'Chi tiết phiếu nhập kho', 'admin.inventory-input.detail', 1, '2019-04-08 14:36:11', '2019-04-08 07:36:11');
INSERT INTO `pages` VALUES (46, 'Quản lý kho - Tab xuất kho', 'admin.product-inventory.list-inventory-output', 0, '2019-04-08 14:36:35', '2019-04-08 07:36:35');
INSERT INTO `pages` VALUES (47, 'Thêm phiếu xuất kho', 'admin.inventory-output.add', 0, '2019-04-08 14:36:46', '2019-04-08 07:36:46');
INSERT INTO `pages` VALUES (48, 'Chỉnh sửa phiếu xuất kho', 'admin.inventory-output.edit', 0, '2019-04-08 14:37:18', '2019-04-08 07:37:18');
INSERT INTO `pages` VALUES (49, 'Xóa phiếu xuất kho', 'admin.inventory-output.remove', 0, '2019-04-08 14:38:24', '2019-04-08 07:38:24');
INSERT INTO `pages` VALUES (50, 'Chi tiết phiếu xuất kho', 'admin.inventory-output.detail', 1, '2019-04-08 14:38:34', '2019-04-08 07:38:34');
INSERT INTO `pages` VALUES (51, 'Quản lý kho - Tab chuyển kho kho', 'admin.product-inventory.list-inventory-transfer', 0, '2019-04-08 14:38:45', '2019-04-08 07:38:45');
INSERT INTO `pages` VALUES (52, 'Thêm phiếu chuyển kho', 'admin.inventory-transfer.add', 0, '2019-04-08 14:39:01', '2019-04-08 07:39:01');
INSERT INTO `pages` VALUES (53, 'Chỉnh sửa phiếu chuyển kho', 'admin.inventory-transfer.edit', 0, '2019-04-08 14:39:11', '2019-04-08 07:39:11');
INSERT INTO `pages` VALUES (54, 'Xóa phiếu chuyển kho', 'admin.inventory-transfer.remove', 0, '2019-04-08 14:39:21', '2019-04-08 07:39:21');
INSERT INTO `pages` VALUES (55, 'Chi tiết phiếu chuyển kho', 'admin.inventory-transfer.detail', 1, '2019-04-08 14:39:36', '2019-04-08 07:39:36');
INSERT INTO `pages` VALUES (56, 'Quản lý kho - Tab kiểm kho', 'admin.product-inventory.list-inventory-checking', 0, '2019-04-08 14:39:49', '2019-04-08 07:39:49');
INSERT INTO `pages` VALUES (57, 'Thêm phiếu kiểm kho', 'admin.inventory-checking.add', 0, '2019-04-08 14:39:59', '2019-04-08 07:39:59');
INSERT INTO `pages` VALUES (58, 'Chỉnh sửa phiếu kiểm kho', 'admin.inventory-checking.edit', 0, '2019-04-08 14:40:11', '2019-04-08 07:40:11');
INSERT INTO `pages` VALUES (59, 'Xóa phiếu kiểm kho', 'admin.inventory-checking.remove', 0, '2019-04-08 14:40:44', '2019-04-08 07:40:44');
INSERT INTO `pages` VALUES (60, 'Chi tiết phiếu kiểm kho', 'admin.inventory-checking.detail', 1, '2019-04-08 14:41:01', '2019-04-08 07:41:01');
INSERT INTO `pages` VALUES (61, 'Cấu hình SMS', 'admin.sms.config-sms', 1, '2019-04-08 14:42:20', '2019-04-08 07:42:20');
INSERT INTO `pages` VALUES (62, 'Cài đặt nội dung gửi SMS', 'admin.sms.setting-sms', 0, '2019-04-08 14:42:56', '2019-04-08 07:42:56');
INSERT INTO `pages` VALUES (63, 'Cấu hình SMS - Thay đổi trạng thái', 'admin.sms.active-sms-config', 0, '2019-04-08 14:43:05', '2019-04-08 07:43:05');
INSERT INTO `pages` VALUES (64, 'Cấu hình SMS - Cài đặt gửi SMS', 'admin.sms.get-config', 0, '2019-04-08 14:43:28', '2019-04-08 07:43:28');
INSERT INTO `pages` VALUES (65, 'SMS - Chiến dịch - Danh sách', 'admin.sms.sms-campaign', 1, '2019-04-08 14:43:41', '2019-04-08 07:43:41');
INSERT INTO `pages` VALUES (66, 'SMS - Thêm chiến dịch', 'admin.sms.sms-campaign-add', 1, '2019-04-08 14:44:07', '2019-04-08 07:44:07');
INSERT INTO `pages` VALUES (67, 'SMS- Chỉnh sửa chiến dịch', 'admin.campaign.edit', 1, '2019-04-08 14:44:23', '2019-04-08 07:44:23');
INSERT INTO `pages` VALUES (68, 'SMS- Chi tiết chiến dịch', 'admin.campaign.detail', 1, '2019-04-08 14:44:46', '2019-04-08 07:44:46');
INSERT INTO `pages` VALUES (69, 'Cấu hình Email', 'admin.email-auto', 1, '2019-04-08 14:46:04', '2019-04-08 07:46:04');
INSERT INTO `pages` VALUES (70, 'Cấu hình gửi email tự động', 'admin.email-auto.config', 0, '2019-04-08 14:48:13', '2019-04-08 07:48:13');
INSERT INTO `pages` VALUES (71, 'Cấu hình email - Cấu hình nội dung', 'admin.email-auto.setting-content', 1, '2019-04-08 14:48:43', '2019-04-08 07:48:43');
INSERT INTO `pages` VALUES (72, 'Cấu hình email - Thay đổi trạng thái', 'admin.email-auto.change-status', 0, '2019-04-08 14:48:56', '2019-04-08 07:48:56');
INSERT INTO `pages` VALUES (73, 'Email - Danh sách chiến dịch', 'admin.email', 1, '2019-04-08 14:49:16', '2019-04-08 07:49:16');
INSERT INTO `pages` VALUES (74, 'Email - Thêm chiến dịch', 'admin.email.add', 1, '2019-04-08 14:49:44', '2019-04-08 07:49:44');
INSERT INTO `pages` VALUES (75, 'Email - Chỉnh sửa chiến dịch', 'admin.email.edit', 1, '2019-04-08 14:50:36', '2019-04-08 07:50:36');
INSERT INTO `pages` VALUES (76, 'Email - Chi tiết chiến dịch', 'admin.email.detail', 1, '2019-04-08 14:50:56', '2019-04-08 07:50:56');
INSERT INTO `pages` VALUES (77, 'Danh sách nhóm khách hàng', 'customer-group', 1, '2019-04-08 14:51:53', '2019-04-08 07:51:53');
INSERT INTO `pages` VALUES (78, 'Nhóm khách hàng - Thay đổi trạng thái', 'customer-group.change-status', 0, '2019-04-08 14:52:30', '2019-04-08 07:52:30');
INSERT INTO `pages` VALUES (79, 'Thêm nhóm khách hàng', 'customer-group.add', 0, '2019-04-08 14:52:41', '2019-04-08 07:52:41');
INSERT INTO `pages` VALUES (80, 'Chỉnh sửa nhóm khách hàng', 'customer-group.edit', 0, '2019-04-08 14:52:52', '2019-04-08 07:52:52');
INSERT INTO `pages` VALUES (81, 'Xóa nhóm khách hàng', 'customer-group.remove', 0, '2019-04-08 14:53:05', '2019-04-08 07:53:05');
INSERT INTO `pages` VALUES (82, 'Danh sách nguồn khách hàng', 'customer-source', 1, '2019-04-08 14:53:16', '2019-04-08 07:53:16');
INSERT INTO `pages` VALUES (83, 'Thêm nguồn khách hàng', 'customer-source.add', 0, '2019-04-08 14:53:26', '2019-04-08 07:53:26');
INSERT INTO `pages` VALUES (84, 'Nguồn khách hàng - Thay đổi trạng thái', 'customer-source.change-status', 0, '2019-04-08 14:53:47', '2019-04-08 07:53:47');
INSERT INTO `pages` VALUES (85, 'Chỉnh sửa nguồn khách hàng', 'customer-source.edit', 1, '2019-04-08 14:53:58', '2019-04-08 07:53:58');
INSERT INTO `pages` VALUES (86, 'Xóa nguồn khách hàng', 'customer-source.remove', 0, '2019-04-08 14:54:11', '2019-04-08 07:54:11');
INSERT INTO `pages` VALUES (87, 'Danh sách sản phẩm', 'admin.product', 1, '2019-04-08 14:54:19', '2019-04-08 07:54:19');
INSERT INTO `pages` VALUES (88, 'Thêm sản phẩm', 'admin.product.add', 1, '2019-04-08 14:54:28', '2019-04-08 07:54:28');
INSERT INTO `pages` VALUES (89, 'Sản phẩm - Thay đổi trạng thái', 'admin.product.change-status', 0, '2019-04-08 14:54:40', '2019-04-08 07:54:40');
INSERT INTO `pages` VALUES (90, 'Chỉnh sửa sản phẩm', 'admin.product.edit', 1, '2019-04-08 14:54:48', '2019-04-08 07:54:48');
INSERT INTO `pages` VALUES (91, 'Chi tiết sản phẩm', 'product-detail', 1, '2019-04-08 14:55:05', '2019-04-08 07:55:05');
INSERT INTO `pages` VALUES (92, 'Xóa sản phẩm', 'admin.product.remove', 0, '2019-04-08 14:55:14', '2019-04-08 07:55:14');
INSERT INTO `pages` VALUES (93, 'Danh sách danh mục sản phẩm', 'admin.product-category', 1, '2019-04-08 14:55:28', '2019-04-08 07:55:28');
INSERT INTO `pages` VALUES (94, 'Thêm danh mục sản phẩm', 'admin.product-category.add', 0, '2019-04-08 14:55:38', '2019-04-08 07:55:38');
INSERT INTO `pages` VALUES (95, 'Chỉnh sửa danh mục sản phẩm', 'admin.product-category.edit', 0, '2019-04-08 14:55:48', '2019-04-08 07:55:48');
INSERT INTO `pages` VALUES (96, 'Danh mục sản phẩm - Thay đổi trạng thái', 'admin.product-category.change-status', 0, '2019-04-08 14:56:02', '2019-04-08 07:56:02');
INSERT INTO `pages` VALUES (97, 'Xóa danh mục sản phẩm', 'admin.product-category.remove', 0, '2019-04-08 14:56:12', '2019-04-08 07:56:12');
INSERT INTO `pages` VALUES (98, 'Danh sách nhóm thuộc tính', 'admin.product-attribute-group', 1, '2019-04-08 14:56:22', '2019-04-08 07:56:22');
INSERT INTO `pages` VALUES (99, 'Thêm nhóm thuộc tính', 'admin.product-attribute-group.add', 0, '2019-04-08 14:56:30', '2019-04-08 07:56:30');
INSERT INTO `pages` VALUES (100, 'Chỉnh sửa nhóm thuộc tính', 'admin.product-attribute-group.edit', 0, '2019-04-08 14:56:37', '2019-04-08 07:56:37');
INSERT INTO `pages` VALUES (101, 'Xóa nhóm thuộc tính', 'admin.product-attribute-group.remove', 0, '2019-04-08 14:56:47', '2019-04-08 07:56:47');
INSERT INTO `pages` VALUES (102, 'Nhóm thuộc tính - Thay đổi trạng thái', 'admin.product-attribute-group.change-status', 0, '2019-04-08 14:57:06', '2019-04-08 07:57:06');
INSERT INTO `pages` VALUES (103, 'Danh sách thuộc tính', 'admin.product-attribute', 1, '2019-04-08 14:57:14', '2019-04-08 07:57:14');
INSERT INTO `pages` VALUES (104, 'Thêm thuộc tính', 'admin.product-attribute.add', 0, '2019-04-08 14:57:24', '2019-04-08 07:57:24');
INSERT INTO `pages` VALUES (105, 'Chỉnh sửa thuộc tính', 'admin.product-attribute.edit', 0, '2019-04-08 14:57:31', '2019-04-08 07:57:31');
INSERT INTO `pages` VALUES (106, 'Xóa thuộc tính', 'admin.product-attribute.remove', 0, '2019-04-08 14:57:44', '2019-04-08 07:57:44');
INSERT INTO `pages` VALUES (107, 'Thuộc tính - Thay đổi trạng thái', 'admin.product-attribute.change-status', 0, '2019-04-08 14:57:59', '2019-04-08 07:57:59');
INSERT INTO `pages` VALUES (108, 'Danh sách nhãn hiệu sản phẩm', 'admin.product-model', 1, '2019-04-08 14:59:02', '2019-04-08 07:59:02');
INSERT INTO `pages` VALUES (109, 'Thêm nhãn hiệu sản phẩm', 'admin.product-model.add', 0, '2019-04-08 14:59:12', '2019-04-08 07:59:12');
INSERT INTO `pages` VALUES (110, 'Chỉnh sửa nhãn hiệu sản phẩm', 'admin.product-model.edit', 0, '2019-04-08 14:59:22', '2019-04-08 07:59:22');
INSERT INTO `pages` VALUES (111, 'Xóa nhãn hiệu', 'admin.product-model.remove', 0, '2019-04-08 14:59:29', '2019-04-08 07:59:29');
INSERT INTO `pages` VALUES (112, 'Danh sách nhà cung cấp', 'admin.supplier', 1, '2019-04-08 14:59:41', '2019-04-08 07:59:41');
INSERT INTO `pages` VALUES (113, 'Thêm nhà cung cấp', 'admin.supplier.add', 0, '2019-04-08 14:59:51', '2019-04-08 07:59:51');
INSERT INTO `pages` VALUES (114, 'Chỉnh sửa nhà cung cấp', 'admin.supplier.edit', 0, '2019-04-08 15:00:01', '2019-04-08 08:00:01');
INSERT INTO `pages` VALUES (115, 'Xóa nhà cung cấp', 'admin.supplier.remove', 0, '2019-04-08 15:00:08', '2019-04-08 08:00:08');
INSERT INTO `pages` VALUES (116, 'Danh sách dịch vụ', 'admin.service', 1, '2019-04-08 15:00:18', '2019-04-08 08:00:18');
INSERT INTO `pages` VALUES (117, 'Thêm dịch vụ', 'admin.service.add', 1, '2019-04-08 15:00:25', '2019-04-08 08:00:25');
INSERT INTO `pages` VALUES (118, 'Chỉnh sửa dịch vụ', 'admin.service.edit', 1, '2019-04-08 15:00:31', '2019-04-08 08:00:31');
INSERT INTO `pages` VALUES (119, 'Xóa dịch vụ', 'admin.service.remove', 0, '2019-04-08 15:00:38', '2019-04-08 08:00:38');
INSERT INTO `pages` VALUES (120, 'Dịch vụ - Thay đổi trạng thái', 'admin.service.change-status', 0, '2019-04-08 15:00:52', '2019-04-08 08:00:52');
INSERT INTO `pages` VALUES (121, 'Chi tiết dịch vụ', 'admin.service.detail', 1, '2019-04-08 15:01:00', '2019-04-08 08:01:00');
INSERT INTO `pages` VALUES (122, 'Danh sách nhóm dịch vụ', 'admin.service_category', 1, '2019-04-08 15:01:07', '2019-04-08 08:01:07');
INSERT INTO `pages` VALUES (123, 'Thêm nhóm dịch vụ', 'admin.service_category.submitAdd', 0, '2019-04-08 15:01:14', '2019-04-08 08:01:14');
INSERT INTO `pages` VALUES (124, 'Chỉnh sửa nhóm dịch vụ', 'admin.service_category.edit', 0, '2019-04-08 15:01:20', '2019-04-08 08:01:20');
INSERT INTO `pages` VALUES (125, 'Nhóm dịch vụ - Thay đổi trạng thái', 'admin.service_category.change-status', 0, '2019-04-08 15:01:35', '2019-04-08 08:01:35');
INSERT INTO `pages` VALUES (126, 'Xóa nhóm dịch vụ', 'admin.service_category.remove', 0, '2019-04-08 15:01:55', '2019-04-08 08:01:55');
INSERT INTO `pages` VALUES (127, 'Danh sách nhân viên', 'admin.staff', 1, '2019-04-08 15:06:52', '2019-04-08 08:06:52');
INSERT INTO `pages` VALUES (128, 'Thêm nhân viên', 'admin.staff.add', 1, '2019-04-08 15:07:09', '2019-04-08 08:07:09');
INSERT INTO `pages` VALUES (129, 'Chỉnh sửa nhân viên', 'admin.staff.edit', 1, '2019-04-08 15:07:17', '2019-04-08 08:07:17');
INSERT INTO `pages` VALUES (130, 'Nhân viên -  Thay đổi trạng thái', 'admin.staff.change-status', 0, '2019-04-08 15:07:26', '2019-04-08 08:07:26');
INSERT INTO `pages` VALUES (131, 'Xóa nhân viên', 'admin.staff.remove', 0, '2019-04-08 15:07:33', '2019-04-08 08:07:33');
INSERT INTO `pages` VALUES (132, 'Danh sách phòng ban', 'admin.department', 1, '2019-04-08 15:07:40', '2019-04-08 08:07:40');
INSERT INTO `pages` VALUES (133, 'Thêm phòng ban', 'admin.department.add', 0, '2019-04-08 15:07:49', '2019-04-08 08:07:49');
INSERT INTO `pages` VALUES (134, 'Chỉnh sửa phòng ban', 'admin.department.edit', 0, '2019-04-08 15:07:56', '2019-04-08 08:07:56');
INSERT INTO `pages` VALUES (135, 'Phòng ban - Thay đổi trạng thái', 'admin.department.change-status', 0, '2019-04-08 15:08:03', '2019-04-08 08:08:03');
INSERT INTO `pages` VALUES (136, 'Xóa phòng ban', 'admin.department.remove', 0, '2019-04-08 15:08:13', '2019-04-08 08:08:13');
INSERT INTO `pages` VALUES (137, 'Danh sách ca làm việc', 'admin.shift', 1, '2019-04-08 15:08:29', '2019-04-08 08:08:29');
INSERT INTO `pages` VALUES (138, 'Thêm ca làm việc', 'admin.shift.add', 0, '2019-04-08 15:08:39', '2019-04-08 08:08:39');
INSERT INTO `pages` VALUES (139, 'Chỉnh sửa ca làm việc', 'admin.shift.edit', 0, '2019-04-08 15:08:51', '2019-04-08 08:08:51');
INSERT INTO `pages` VALUES (140, 'Ca làm việc - Thay đổi trạng thái', 'admin.shift.change-status', 0, '2019-04-08 15:08:59', '2019-04-08 08:08:59');
INSERT INTO `pages` VALUES (141, 'Xóa ca làm việc', 'admin.shift.remove', 0, '2019-04-08 15:09:06', '2019-04-08 08:09:06');
INSERT INTO `pages` VALUES (142, 'Danh sách kho', 'admin.warehouse', 1, '2019-04-08 15:09:12', '2019-04-08 08:09:12');
INSERT INTO `pages` VALUES (143, 'Thêm kho', 'admin.warehouse.submitAdd', 0, '2019-04-08 15:09:22', '2019-04-08 08:09:22');
INSERT INTO `pages` VALUES (144, 'Chỉnh sửa kho', 'admin.warehouse.edit', 0, '2019-04-08 15:09:31', '2019-04-08 08:09:31');
INSERT INTO `pages` VALUES (145, 'Xóa kho', 'admin.warehouse.delete', 0, '2019-04-08 15:09:37', '2019-04-08 08:09:37');
INSERT INTO `pages` VALUES (146, 'Danh sách đơn vị vận chuyển', 'admin.transport', 1, '2019-04-08 15:09:46', '2019-04-08 08:09:46');
INSERT INTO `pages` VALUES (147, 'Thêm đơn vị vận chuyển', 'admin.transport.submitadd', 0, '2019-04-08 15:09:58', '2019-04-08 08:09:58');
INSERT INTO `pages` VALUES (148, 'Chỉnh sửa đơn vị vận chuyển', 'admin.transport.edit', 0, '2019-04-08 15:10:05', '2019-04-08 08:10:05');
INSERT INTO `pages` VALUES (149, 'Xóa đơn vị vận chuyển', 'admin.transport.remove', 0, '2019-04-08 15:10:13', '2019-04-08 08:10:13');
INSERT INTO `pages` VALUES (150, 'Danh sách phòng phục vụ', 'admin.room', 1, '2019-04-08 15:10:26', '2019-04-08 08:10:26');
INSERT INTO `pages` VALUES (151, 'Thêm phòng phục vụ', 'admin.room.submitadd', 0, '2019-04-08 15:10:33', '2019-04-08 08:10:33');
INSERT INTO `pages` VALUES (152, 'Chỉnh sửa phòng phục vụ', 'admin.room.edit', 0, '2019-04-08 15:10:40', '2019-04-08 08:10:40');
INSERT INTO `pages` VALUES (153, 'Phòng phục vụ - Thay đổi trạng thái', 'admin.room.change-status', 0, '2019-04-08 15:10:46', '2019-04-08 08:10:46');
INSERT INTO `pages` VALUES (154, 'Xóa phòng dịch vụ', 'admin.room.remove', 0, '2019-04-08 15:10:55', '2019-04-08 08:10:55');
INSERT INTO `pages` VALUES (155, 'Danh sách đơn vị tính', 'admin.unit', 1, '2019-04-08 15:11:08', '2019-04-08 08:11:08');
INSERT INTO `pages` VALUES (156, 'Thêm đơn vị tính', 'admin.unit.submitadd', 0, '2019-04-08 15:11:15', '2019-04-08 08:11:15');
INSERT INTO `pages` VALUES (157, 'Chỉnh sửa đơn vị tính', 'admin.unit.edit', 0, '2019-04-08 15:11:26', '2019-04-08 08:11:26');
INSERT INTO `pages` VALUES (158, 'Xóa đơn vị tính', 'admin.unit.remove', 0, '2019-04-08 15:11:33', '2019-04-08 08:11:33');
INSERT INTO `pages` VALUES (159, 'Danh sách đơn vị quy đổi', 'admin.unit_conversion', 1, '2019-04-08 15:11:56', '2019-04-08 08:11:56');
INSERT INTO `pages` VALUES (160, 'Thêm đơn vị quy đổi', 'admin.unit_conversion.submitadd', 0, '2019-04-08 15:12:04', '2019-04-08 08:12:04');
INSERT INTO `pages` VALUES (161, 'Chỉnh sửa đơn vị quy đổi', 'admin.unit_conversion.edit', 0, '2019-04-08 15:12:12', '2019-04-08 08:12:12');
INSERT INTO `pages` VALUES (162, 'Xóa đơn vị quy đổi', 'admin.unit_conversion.remove', 0, '2019-04-08 15:12:21', '2019-04-08 08:12:21');
INSERT INTO `pages` VALUES (163, 'Báo cáo doanh thu chi nhánh', 'admin.report-revenue.branch', 1, '2019-04-08 15:12:29', '2019-04-08 08:12:29');
INSERT INTO `pages` VALUES (164, 'Báo cáo doanh thu theo khách hàng', 'admin.report-revenue.customer', 1, '2019-04-08 15:12:39', '2019-04-08 08:12:39');
INSERT INTO `pages` VALUES (165, 'Báo cáo doanh thu theo nhân viên', 'admin.report-revenue.staff', 1, '2019-04-08 15:12:47', '2019-04-08 08:12:47');
INSERT INTO `pages` VALUES (166, 'Báo cáo doanh thu theo sản phẩm', 'admin.report-revenue.product', 1, '2019-04-08 15:12:55', '2019-04-08 08:12:55');
INSERT INTO `pages` VALUES (167, 'Báo cáo doanh thu theo dịch vụ', 'admin.report-revenue.service', 1, '2019-04-08 15:13:03', '2019-04-08 08:13:03');
INSERT INTO `pages` VALUES (168, 'Báo cáo doanh thu theo thẻ dịch vụ', 'admin.report-revenue.service-card', 1, '2019-04-08 15:13:10', '2019-04-08 08:13:10');
INSERT INTO `pages` VALUES (169, 'Thống kê khách hàng', 'admin.report-growth.customer', 1, '2019-04-08 15:13:20', '2019-04-08 08:13:20');
INSERT INTO `pages` VALUES (170, 'Thống kê theo chi nhánh', 'admin.report-growth.branch', 1, '2019-04-08 15:13:32', '2019-04-08 08:13:32');
INSERT INTO `pages` VALUES (171, 'Thống kê thẻ dịch vụ', 'admin.report-growth.service-card', 1, '2019-04-08 15:13:39', '2019-04-08 08:13:39');
INSERT INTO `pages` VALUES (172, 'Thống kê lịch hẹn', 'admin.report-customer-appointment', 1, '2019-04-08 15:14:14', '2019-04-08 08:14:14');
INSERT INTO `pages` VALUES (173, 'Thống kê đơn hàng', 'admin.statistical.order', 1, '2019-04-08 15:14:23', '2019-04-08 08:14:23');
INSERT INTO `pages` VALUES (174, 'Cấu hình trang đặt lịch', 'admin.config.page-appointment', 1, '2019-04-08 15:14:51', '2019-04-08 08:14:51');
INSERT INTO `pages` VALUES (175, 'Trang đặt lịch - Tab lưu thông tin đơn vị', 'admin.config-page-appointment.submit-edit-info', 0, '2019-04-08 15:15:08', '2019-04-08 08:15:08');
INSERT INTO `pages` VALUES (176, 'Trang đặt lịch - Tab banner - Thêm banner', 'admin.config-page-appointment.submit-add-banner', 0, '2019-04-08 15:15:24', '2019-04-08 08:15:24');
INSERT INTO `pages` VALUES (177, 'Trang đặt lịch - Tab banner - Chỉnh sửa banner', 'admin.config-page-appointment.edit-banner', 0, '2019-04-08 15:15:36', '2019-04-08 08:15:36');
INSERT INTO `pages` VALUES (178, 'Trang đặt lịch - Tab banner - Xóa banner', 'admin.config-page-appointment.remove-banner', 0, '2019-04-08 15:15:49', '2019-04-08 08:15:49');
INSERT INTO `pages` VALUES (179, 'Trang đặt lịch - Tab thời gian hoạt động - Thay đổi trạng thái', 'admin.config-page-appointment.change-status-time', 0, '2019-04-08 15:16:11', '2019-04-08 08:16:11');
INSERT INTO `pages` VALUES (180, 'Trang đặt lịch - Tab thời gian hoạt động - Lưu thông tin', 'admin.config-page-appointment.submit-edit-time', 0, '2019-04-08 15:16:26', '2019-04-08 08:16:26');
INSERT INTO `pages` VALUES (181, 'Trang đặt lịch - Tab tùy chỉnh menu - Rule menu -  Thay đổi trạng thái', 'admin.config-page-appointment.change-status-menu', 0, '2019-04-08 15:17:39', '2019-04-08 08:17:39');
INSERT INTO `pages` VALUES (182, 'Trang đặt lịch - Tab tùy chỉnh menu - Rule menu -  Lưu thông tin', 'admin.config-page-appointment.submit-edit-rule-menu', 0, '2019-04-08 15:17:57', '2019-04-08 08:17:57');
INSERT INTO `pages` VALUES (183, 'Trang đặt lịch - Tab tùy chỉnh menu - Rule booking -  Thay đổi trạng thái', 'admin.config-page-appointment.change-status-booking', 0, '2019-04-08 15:18:15', '2019-04-08 08:18:15');
INSERT INTO `pages` VALUES (184, 'Trang đặt lịch - Tab tùy chỉnh khác - Setting other -  Thay đổi trạng thái', 'admin.config-page-appointment.change-status-setting-other', 0, '2019-04-08 15:18:34', '2019-04-08 08:18:34');
INSERT INTO `pages` VALUES (185, 'Trang đặt lịch - Tab tùy chỉnh khác - Setting other -  Lưu thông tin', 'admin.config-page-appointment.submit-edit-day', 0, '2019-04-08 15:18:52', '2019-04-08 08:18:52');
INSERT INTO `pages` VALUES (186, 'Trang đặt lịch - Tab tùy chỉnh khác - Booking extra -  lưu thông tin', 'admin.config-page-appointment.submit-edit-booking-extra', 0, '2019-04-08 15:19:06', '2019-04-08 08:19:06');
INSERT INTO `pages` VALUES (187, 'Template Email - Danh sách cấu hình', 'admin.config-email-template', 1, '2019-04-08 15:21:08', '2019-04-08 08:21:08');
INSERT INTO `pages` VALUES (188, 'Template Email - Lưu thông tin', 'admin.config-email-template.submit-edit', 0, '2019-04-08 15:21:15', '2019-04-08 08:21:15');
INSERT INTO `pages` VALUES (189, 'Template Email - Thay đổi trạng thái  website', 'admin.config-email-template.change-status-website', 0, '2019-04-08 15:22:06', '2019-04-08 08:22:06');
INSERT INTO `pages` VALUES (190, 'Template Email -  Thay đổi trạng thái logo', 'admin.config-email-template.change-status-logo', 0, '2019-04-08 15:22:13', '2019-04-08 08:22:13');
INSERT INTO `pages` VALUES (191, 'Danh sách khuyến mãi', 'admin.voucher', 1, '2019-04-08 15:22:25', '2019-04-08 08:22:25');
INSERT INTO `pages` VALUES (192, 'Thêm mã giảm giá', 'admin.voucher.create', 1, '2019-04-08 15:23:05', '2019-04-08 08:23:05');
INSERT INTO `pages` VALUES (193, 'Chỉnh sửa mã giảm gá', 'admin.voucher.edit', 1, '2019-04-08 15:23:11', '2019-04-08 08:23:11');
INSERT INTO `pages` VALUES (194, 'Xóa khuyến mãi', 'admin.voucher.delete', 0, '2019-04-08 15:23:26', '2019-04-08 08:23:26');
INSERT INTO `pages` VALUES (195, 'Khuyến mãi - Thay đổi trạng thái', 'admin.voucher.changeStatus', 0, '2019-04-08 15:23:34', '2019-04-08 08:23:34');
INSERT INTO `pages` VALUES (196, 'Danh sách chi nhánh', 'admin.branch', 1, '2019-04-08 15:23:41', '2019-04-08 08:23:41');
INSERT INTO `pages` VALUES (197, 'Thêm chi nhánh', 'admin.branch.add', 0, '2019-04-08 15:23:51', '2019-04-08 08:23:51');
INSERT INTO `pages` VALUES (198, 'Chỉnh sửa chi nhánh', 'admin.branch.edit', 1, '2019-04-08 15:23:58', '2019-04-08 08:23:58');
INSERT INTO `pages` VALUES (199, 'Xóa chi nhánh', 'admin.branch.delete', 0, '2019-04-08 15:24:15', '2019-04-08 08:24:15');
INSERT INTO `pages` VALUES (200, 'Chi nhánh - Thay đổi trạng thái', 'admin.branch.change-status', 0, '2019-04-08 15:24:22', '2019-04-08 08:24:22');
INSERT INTO `pages` VALUES (201, 'Danh sách nguồn đơn hàng', 'admin.order-source', 1, '2019-04-08 15:24:28', '2019-04-08 08:24:28');
INSERT INTO `pages` VALUES (202, 'Thêm nguồn đơn hàng', 'admin.order-source.add', 0, '2019-04-08 15:24:35', '2019-04-08 08:24:35');
INSERT INTO `pages` VALUES (203, 'Chỉnh sửa nguồn đơn hàng', 'admin.order-source.edit', 0, '2019-04-08 15:24:41', '2019-04-08 08:24:41');
INSERT INTO `pages` VALUES (204, 'Xóa nguồn đơn hàng', 'admin.order-source.remove', 0, '2019-04-08 15:24:48', '2019-04-08 08:24:48');
INSERT INTO `pages` VALUES (205, 'Nguồn đơn hàng - Thay đổi trạng thái', 'admin.order-source.change-status', 0, '2019-04-08 15:24:55', '2019-04-08 08:24:55');
INSERT INTO `pages` VALUES (206, 'Danh sách cấp độ thành viên', 'admin.member-level', 1, '2019-04-08 15:25:02', '2019-04-08 08:25:02');
INSERT INTO `pages` VALUES (207, 'Thêm cấp độ thành viên', 'admin.member-level.submitadd', 0, '2019-04-08 15:25:11', '2019-04-08 08:25:11');
INSERT INTO `pages` VALUES (208, 'Chỉnh sửa cấp độ thành viên', 'admin.member-level.edit', 0, '2019-04-08 15:25:31', '2019-04-08 08:25:31');
INSERT INTO `pages` VALUES (209, 'Xóa cấp độ thành viên', 'admin.member-level.remove', 0, '2019-04-08 15:25:45', '2019-04-08 08:25:45');
INSERT INTO `pages` VALUES (210, 'Cấp độ thành viên - Thay đổi trạng thái', 'admin.member-level.change-status', 0, '2019-04-08 15:25:52', '2019-04-08 08:25:52');
INSERT INTO `pages` VALUES (211, 'Cấu hình thẻ in', 'admin.config-print-service-card', 1, '2019-04-08 15:26:12', '2019-04-08 08:26:12');
INSERT INTO `pages` VALUES (212, 'Cấu hình in hóa đơn', 'admin.config-print-bill', 1, '2019-04-08 15:26:19', '2019-04-08 08:26:19');
INSERT INTO `pages` VALUES (213, 'Thống kê dịch vụ', 'admin.report-growth.service', 1, NULL, NULL);
INSERT INTO `pages` VALUES (214, 'Xem lịch hẹn theo tháng', 'admin.customer_appointment', 1, NULL, NULL);
INSERT INTO `pages` VALUES (215, 'Danh sách chức vụ', 'admin.staff-title', 1, NULL, NULL);
INSERT INTO `pages` VALUES (216, 'Phân quyền', 'admin.authorization', 1, NULL, NULL);
INSERT INTO `pages` VALUES (217, 'Nhóm quyền', 'admin.role-group', 1, NULL, NULL);

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `payment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `staff_id` int(11) NULL DEFAULT NULL COMMENT 'người chi tiền',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `total_amount` int(16) NOT NULL DEFAULT 0,
  `approved_by` int(11) NULL DEFAULT NULL,
  `status` enum('new','approved','paid','unpaid') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'new',
  `type` enum('refer','refund','other','commissions_refer','inventory_input') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'other',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `receiver_id` int(11) NULL DEFAULT NULL,
  `customer_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for phone_service
-- ----------------------------
DROP TABLE IF EXISTS `phone_service`;
CREATE TABLE `phone_service`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID tự tăng',
  `telco` enum('vina','mobi','viettel','gphone','vnm') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nhà mạng',
  `service_num` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Đầu số',
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày tạo',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày cập nhật',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `telco_service_num`(`telco`, `service_num`) USING BTREE,
  INDEX `service_num`(`service_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Đầu số di động' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of phone_service
-- ----------------------------
INSERT INTO `phone_service` VALUES (1, 'mobi', '070', '2019-08-28 16:13:01', '2019-08-28 09:13:01');
INSERT INTO `phone_service` VALUES (2, 'mobi', '079', '2019-08-28 16:13:18', '2019-08-28 09:13:18');
INSERT INTO `phone_service` VALUES (3, 'mobi', '077', '2019-08-28 16:13:28', '2019-08-28 09:13:28');
INSERT INTO `phone_service` VALUES (4, 'mobi', '076', '2019-08-28 16:13:35', '2019-08-28 09:13:35');
INSERT INTO `phone_service` VALUES (5, 'mobi', '078', '2019-08-28 16:13:41', '2019-08-28 09:13:41');
INSERT INTO `phone_service` VALUES (6, 'mobi', '089', '2019-08-28 16:13:51', '2019-08-28 09:13:51');
INSERT INTO `phone_service` VALUES (7, 'mobi', '090', '2019-08-28 16:13:57', '2019-08-28 09:13:57');
INSERT INTO `phone_service` VALUES (8, 'mobi', '093', '2019-08-28 16:14:05', '2019-08-28 09:14:05');
INSERT INTO `phone_service` VALUES (9, 'vina', '083', '2019-08-28 16:14:12', '2019-08-28 09:14:12');
INSERT INTO `phone_service` VALUES (10, 'vina', '084', '2019-08-28 16:14:18', '2019-08-28 09:14:18');
INSERT INTO `phone_service` VALUES (11, 'vina', '085', '2019-08-28 16:14:24', '2019-08-28 09:14:24');
INSERT INTO `phone_service` VALUES (12, 'vina', '081', '2019-08-28 16:14:29', '2019-08-28 09:14:29');
INSERT INTO `phone_service` VALUES (13, 'vina', '082', '2019-08-28 16:14:35', '2019-08-28 09:14:35');
INSERT INTO `phone_service` VALUES (14, 'vina', '088', '2019-08-28 16:14:41', '2019-08-28 09:14:41');
INSERT INTO `phone_service` VALUES (15, 'vina', '091', '2019-08-28 16:14:47', '2019-08-28 09:14:47');
INSERT INTO `phone_service` VALUES (16, 'vina', '094', '2019-08-28 16:14:55', '2019-08-28 09:14:55');
INSERT INTO `phone_service` VALUES (17, 'viettel', '032', '2019-08-28 16:15:03', '2019-08-28 09:15:03');
INSERT INTO `phone_service` VALUES (18, 'viettel', '033', '2019-08-28 16:15:13', '2019-08-28 09:15:13');
INSERT INTO `phone_service` VALUES (19, 'viettel', '034', '2019-08-28 16:15:18', '2019-08-28 09:15:18');
INSERT INTO `phone_service` VALUES (20, 'viettel', '035', '2019-08-28 16:15:23', '2019-08-28 09:15:23');
INSERT INTO `phone_service` VALUES (21, 'viettel', '036', '2019-08-28 16:15:34', '2019-08-28 09:15:34');
INSERT INTO `phone_service` VALUES (22, 'viettel', '037', '2019-08-28 16:15:40', '2019-08-28 09:15:40');
INSERT INTO `phone_service` VALUES (23, 'viettel', '038', '2019-08-28 16:15:44', '2019-08-28 09:15:44');
INSERT INTO `phone_service` VALUES (24, 'viettel', '039', '2019-08-28 16:15:48', '2019-08-28 09:15:48');
INSERT INTO `phone_service` VALUES (25, 'viettel', '086', '2019-08-28 16:15:58', '2019-08-28 09:15:58');
INSERT INTO `phone_service` VALUES (26, 'viettel', '096', '2019-08-28 16:16:05', '2019-08-28 09:16:05');
INSERT INTO `phone_service` VALUES (27, 'viettel', '097', '2019-08-28 16:16:13', '2019-08-28 09:16:13');
INSERT INTO `phone_service` VALUES (28, 'viettel', '098', '2019-08-28 16:16:20', '2019-08-28 09:16:20');
INSERT INTO `phone_service` VALUES (29, 'vnm', '056', '2019-08-28 16:16:28', '2019-08-28 09:16:28');
INSERT INTO `phone_service` VALUES (30, 'vnm', '058', '2019-08-28 16:16:36', '2019-08-28 09:16:36');
INSERT INTO `phone_service` VALUES (31, 'vnm', '092', '2019-08-28 16:16:45', '2019-08-28 09:16:45');
INSERT INTO `phone_service` VALUES (32, 'gphone', '059', '2019-08-28 16:16:52', '2019-08-28 09:16:52');
INSERT INTO `phone_service` VALUES (33, 'gphone', '099', '2019-08-28 16:17:00', '2019-08-28 09:17:00');

-- ----------------------------
-- Table structure for point_history
-- ----------------------------
DROP TABLE IF EXISTS `point_history`;
CREATE TABLE `point_history`  (
  `point_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NULL DEFAULT NULL,
  `point` double NOT NULL,
  `type` enum('plus','subtract') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'plus',
  `point_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `object_id` int(11) NULL DEFAULT NULL COMMENT 'Ăn theo point_description',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `accepted_ranking` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`point_history_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 220 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for point_history_detail
-- ----------------------------
DROP TABLE IF EXISTS `point_history_detail`;
CREATE TABLE `point_history_detail`  (
  `point_history_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_history_id` int(11) NOT NULL,
  `point_reward_rule_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`point_history_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 345 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for point_reward_rule
-- ----------------------------
DROP TABLE IF EXISTS `point_reward_rule`;
CREATE TABLE `point_reward_rule`  (
  `point_reward_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên chương trình ',
  `rule_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'mã chương trình',
  `point_maths` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nhân hoặc +',
  `point_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'giá trị điểm được cộng ',
  `rule_type` enum('purchase','event') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Loại : mua hàng hoặc event',
  `hagtag_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Danh sách id các dịch vụ , sản phẩm , thẻ dịch vụ đặc biệt',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `modified_by` int(11) NULL DEFAULT NULL,
  `modified_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`point_reward_rule_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of point_reward_rule
-- ----------------------------
INSERT INTO `point_reward_rule` VALUES (1, 'Tỉ lệ điểm / thanh toán', 'payment_ratio', '*', '0.0001', 'purchase', '0', NULL, 1, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (2, 'Tỉ lệ sản phẩm', 'product', '*', '1', 'purchase', '0', NULL, 0, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (3, 'Tỉ lệ dịch vụ', 'services', '*', '1', 'purchase', '0', NULL, 0, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (4, 'Tỉ lệ thẻ liệu trình', 'service_card', '*', '2', 'purchase', '0', NULL, 0, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (5, 'Tỉ lệ khách thành viên', 'member', '+', '1', 'purchase', '0', NULL, 1, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (6, 'Tỉ lệ khách hạng Bạc', 'silver', '+', '2', 'purchase', '0', NULL, 1, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (7, 'Tỉ lệ khách hạng Vàng', 'gold', '+', '3', 'purchase', '0', NULL, 1, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (8, 'Tỉ lệ khách hạng Kim Cương', 'diamond', '+', '4', 'purchase', '0', NULL, 1, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (9, 'Dịch vụ đặc biệt', 'service_special', '+', '2', 'purchase', '3', NULL, 0, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (10, 'Sản phẩm đặc biệt', 'product_special', '+', '2', 'purchase', '0', NULL, 0, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (11, 'Thẻ dịch vụ/ liệu trình đặc biệt', 'service_card_special', '+', '2', 'purchase', '21,23', NULL, 0, 28, '2019-12-09 10:31:44', '2019-12-09 10:31:44');
INSERT INTO `point_reward_rule` VALUES (12, 'Cài đặt active app Member ', 'actived_app', '+', '1', 'event', NULL, NULL, 1, 28, '2019-12-23 16:58:05', '2019-12-23 16:58:05');
INSERT INTO `point_reward_rule` VALUES (13, 'Giới thiệu khách hàng', 'refer', '+', '2', 'event', NULL, NULL, 1, 28, '2019-12-23 16:58:05', '2019-12-23 16:58:05');
INSERT INTO `point_reward_rule` VALUES (14, 'Sinh nhật', 'birthday', '+', '2', 'event', NULL, NULL, 1, 28, '2019-12-23 16:58:05', '2019-12-23 16:58:05');
INSERT INTO `point_reward_rule` VALUES (15, 'Phản hồi dịch vụ', 'review', '+', '4', 'event', NULL, NULL, 1, 28, '2019-12-23 16:58:05', '2019-12-23 16:58:05');
INSERT INTO `point_reward_rule` VALUES (16, 'Đặt lịch từ app', 'appointment_app', '+', '2', 'event', NULL, NULL, 1, NULL, '2020-04-20 11:43:27', '2020-04-20 11:43:27');
INSERT INTO `point_reward_rule` VALUES (17, 'Mua hàng từ app', 'order_app', '+', '2', 'event', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `point_reward_rule` VALUES (18, 'Đặt lịch trực tiếp', 'appointment_direct', '+', '10', 'event', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `point_reward_rule` VALUES (19, 'Đặt lịch từ facebook', 'appointment_fb', '+', '20', 'event', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `point_reward_rule` VALUES (20, 'Đặt lịch từ zalo', 'appointment_zalo', '+', '30', 'event', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `point_reward_rule` VALUES (21, 'Đặt lịch bằng gọi điện', 'appointment_call', '+', '40', 'event', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `point_reward_rule` VALUES (22, 'Đặt lịch online', 'appointment_online', '+', '50', 'event', NULL, NULL, 1, NULL, NULL, NULL);
INSERT INTO `point_reward_rule` VALUES (23, 'Mua hàng trực tiếp', 'order_direct', '+', '20', 'event', NULL, NULL, 1, NULL, '2020-04-20 11:52:46', '2020-04-20 11:52:46');
INSERT INTO `point_reward_rule` VALUES (24, 'Đánh giá', 'rating', '+', '15', 'event', NULL, NULL, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for point_rules
-- ----------------------------
DROP TABLE IF EXISTS `point_rules`;
CREATE TABLE `point_rules`  (
  `point_rule_id` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ',
  `rule_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `order_amount_smallest` decimal(10, 0) NULL DEFAULT NULL,
  `order_amount_biggest` decimal(10, 0) NULL DEFAULT NULL,
  `order_quantity_smallest` int(16) NULL DEFAULT NULL,
  `order_quantity_biggest` int(16) NULL DEFAULT NULL,
  `product_allow` tinyint(1) NULL DEFAULT NULL,
  `hastag_product_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `service_allow` tinyint(1) NULL DEFAULT NULL,
  `hastag_service_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `service_card_allow` tinyint(1) NULL DEFAULT NULL,
  `hagtag_service_card_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `formula` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'công thức tính VD : amount/100000',
  `branch_limit` tinyint(1) NULL DEFAULT 0,
  `branch_allow` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `customer_source_limit` tinyint(1) NULL DEFAULT 0,
  `customer_source_alllow` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `order_source_limit` tinyint(1) NULL DEFAULT 0,
  `order_source_allow` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `payment_method_limit` tinyint(1) NULL DEFAULT 0,
  `payment_method_allow` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`point_rule_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for print_log
-- ----------------------------
DROP TABLE IF EXISTS `print_log`;
CREATE TABLE `print_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL COMMENT 'Chi nhánh',
  `order_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã hóa đơn',
  `debt_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã công nợ',
  `staff_print_reply_by` int(11) NOT NULL COMMENT 'Người in lại',
  `staff_print_by` int(11) NOT NULL COMMENT 'Người in đầu',
  `total_money` decimal(10, 0) NULL DEFAULT NULL COMMENT 'Tổng tiền phải trả',
  `created_at` datetime(0) NOT NULL COMMENT 'Thời gian in đầu',
  `updated_at` datetime(0) NOT NULL COMMENT 'Thời gian in sau',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 327 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_attribute_groups
-- ----------------------------
DROP TABLE IF EXISTS `product_attribute_groups`;
CREATE TABLE `product_attribute_groups`  (
  `product_attribute_group_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_attribute_group_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`product_attribute_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_attributes
-- ----------------------------
DROP TABLE IF EXISTS `product_attributes`;
CREATE TABLE `product_attributes`  (
  `product_attribute_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_attribute_label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_attribute_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `product_attribute_group_id` int(11) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`product_attribute_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_branch_prices
-- ----------------------------
DROP TABLE IF EXISTS `product_branch_prices`;
CREATE TABLE `product_branch_prices`  (
  `product_branch_price_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `old_price` decimal(10, 0) NULL DEFAULT NULL,
  `new_price` decimal(10, 0) NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`product_branch_price_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 95 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `product_category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`product_category_id`) USING BTREE,
  UNIQUE INDEX `category_name`(`category_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_childs
-- ----------------------------
DROP TABLE IF EXISTS `product_childs`;
CREATE TABLE `product_childs`  (
  `product_child_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_child_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `cost` decimal(10, 0) NULL DEFAULT NULL,
  `price` decimal(16, 0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'slug check trùng',
  PRIMARY KEY (`product_child_id`) USING BTREE,
  UNIQUE INDEX `product_code`(`product_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_favourite
-- ----------------------------
DROP TABLE IF EXISTS `product_favourite`;
CREATE TABLE `product_favourite`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL COMMENT 'id của product_child',
  `user_id` int(11) NOT NULL COMMENT 'người thích',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images`  (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` enum('mobile','desktop') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'desktop',
  `created_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`product_image_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_inventorys
-- ----------------------------
DROP TABLE IF EXISTS `product_inventorys`;
CREATE TABLE `product_inventorys`  (
  `product_inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `import` decimal(10, 0) NULL DEFAULT NULL,
  `export` decimal(10, 0) NULL DEFAULT NULL,
  `quantity` decimal(10, 0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`product_inventory_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_model
-- ----------------------------
DROP TABLE IF EXISTS `product_model`;
CREATE TABLE `product_model`  (
  `product_model_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_model_name` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_model_note` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`product_model_id`) USING BTREE,
  UNIQUE INDEX `product_model_name`(`product_model_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_model_id` int(11) NULL DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_short_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `cost` decimal(10, 0) NULL DEFAULT NULL,
  `price_standard` decimal(16, 0) NULL DEFAULT NULL,
  `is_sales` tinyint(1) NULL DEFAULT 0 COMMENT 'sản phẩm giảm giá ',
  `is_promo` tinyint(1) NULL DEFAULT 0 COMMENT 'quà tặng',
  `type` enum('normal','hot','new') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type_manager` enum('normal','attribute') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Cách thức quản lý ',
  `count_version` int(11) NULL DEFAULT NULL COMMENT 'số phiên bản',
  `is_inventory_warning` tinyint(1) NULL DEFAULT 0,
  `inventory_warning` int(11) NULL DEFAULT 0 COMMENT 'mức cảnh báo tồn kho',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staff_commission_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type_staff_commission` enum('percent','money') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Kiểu hoa hồng cho nhân viên phục vụ',
  `refer_commission_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type_refer_commission` enum('percent','money') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Kiểu hoa hồng cho khách giới thiệu',
  `supplier_id` int(11) NULL DEFAULT NULL COMMENT 'nhà cung cấp',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `product_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_all_branch` tinyint(1) NULL DEFAULT 0 COMMENT 'Tất cả chi nhánh',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'slug check trùng',
  `description_detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả chi tiết',
  `type_app` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'new: mới, best_seller: bán chạy',
  `percent_sale` int(11) NULL DEFAULT 0 COMMENT '% giảm giá',
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for province
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province`  (
  `provinceid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `location_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`provinceid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of province
-- ----------------------------
INSERT INTO `province` VALUES ('01', 'Hà Nội', 'Thành Phố', 1);
INSERT INTO `province` VALUES ('02', 'Hà Giang', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('04', 'Cao Bằng', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('06', 'Bắc Kạn', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('08', 'Tuyên Quang', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('10', 'Lào Cai', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('11', 'Điện Biên', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('12', 'Lai Châu', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('14', 'Sơn La', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('15', 'Yên Bái', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('17', 'Hòa Bình', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('19', 'Thái Nguyên', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('20', 'Lạng Sơn', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('22', 'Quảng Ninh', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('24', 'Bắc Giang', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('25', 'Phú Thọ', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('26', 'Vĩnh Phúc', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('27', 'Bắc Ninh', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('30', 'Hải Dương', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('31', 'Hải Phòng', 'Thành Phố', 1);
INSERT INTO `province` VALUES ('33', 'Hưng Yên', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('34', 'Thái Bình', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('35', 'Hà Nam', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('36', 'Nam Định', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('37', 'Ninh Bình', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('38', 'Thanh Hóa', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('40', 'Nghệ An', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('42', 'Hà Tĩnh', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('44', 'Quảng Bình', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('45', 'Quảng Trị', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('46', 'Thừa Thiên Huế', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('48', 'Đà Nẵng', 'Thành Phố', 1);
INSERT INTO `province` VALUES ('49', 'Quảng Nam', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('51', 'Quảng Ngãi', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('52', 'Bình Định', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('54', 'Phú Yên', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('56', 'Khánh Hòa', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('58', 'Ninh Thuận', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('60', 'Bình Thuận', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('62', 'Kon Tum', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('64', 'Gia Lai', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('66', 'Đắk Lắk', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('67', 'Đắk Nông', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('68', 'Lâm Đồng', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('70', 'Bình Phước', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('72', 'Tây Ninh', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('74', 'Bình Dương', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('75', 'Đồng Nai', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('77', 'Bà Rịa - Vũng Tàu', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('79', 'Hồ Chí Minh', 'Thành Phố', 1);
INSERT INTO `province` VALUES ('80', 'Long An', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('82', 'Tiền Giang', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('83', 'Bến Tre', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('84', 'Trà Vinh', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('86', 'Vĩnh Long', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('87', 'Đồng Tháp', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('89', 'An Giang', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('91', 'Kiên Giang', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('92', 'Cần Thơ', 'Thành Phố', 1);
INSERT INTO `province` VALUES ('93', 'Hậu Giang', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('94', 'Sóc Trăng', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('95', 'Bạc Liêu', 'Tỉnh', 1);
INSERT INTO `province` VALUES ('96', 'Cà Mau', 'Tỉnh', 1);

-- ----------------------------
-- Table structure for rating_log
-- ----------------------------
DROP TABLE IF EXISTS `rating_log`;
CREATE TABLE `rating_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` enum('order','appointment','product','airtist','voucher','article','service') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'loại rating',
  `object_value` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'giá trị từng loại (id)',
  `rating_by` int(11) NOT NULL COMMENT 'người dùng đánh giá',
  `rating_value` int(2) NOT NULL COMMENT 'chấm điểm',
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` datetime(0) NOT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'Bảng ghi log rating ' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for receipt_details
-- ----------------------------
DROP TABLE IF EXISTS `receipt_details`;
CREATE TABLE `receipt_details`  (
  `receipt_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `receipt_type` enum('cash','transfer','visa','member_card','member_point','member_money') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `note` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `card_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`receipt_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 468 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for receipts
-- ----------------------------
DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts`  (
  `receipt_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receipt_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `customer_id` int(11) NULL DEFAULT NULL,
  `staff_id` int(11) NULL DEFAULT NULL,
  `object_type` enum('order','debt','delivery') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'order',
  `object_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NULL DEFAULT 0,
  `total_money` int(11) NULL DEFAULT NULL COMMENT 'Tổng tiền dịch vụ',
  `voucher_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã giảm giá',
  `status` enum('unpaid','part-paid','paid','cancel','fail') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NULL DEFAULT 0 COMMENT 'Số tiền giảm bằng voucher',
  `custom_discount` int(11) NULL DEFAULT 0 COMMENT 'Số tiền giảm trực tiếp',
  `is_discount` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Đã thanh trừ giảm giá toàn bill',
  `amount` int(11) NULL DEFAULT 0 COMMENT 'Số tiền cần thanh toán',
  `amount_paid` int(11) NULL DEFAULT 0 COMMENT 'Số tiền đã thanh toán',
  `amount_return` int(11) NULL DEFAULT 0 COMMENT 'Số tiền hoàn lại',
  `note` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'nội dung thu',
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `discount_member` int(11) NULL DEFAULT NULL,
  `receipt_source` enum('direct','delivery') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'direct' COMMENT 'Nguồn thanh toán',
  PRIMARY KEY (`receipt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 468 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for reset_rank_log
-- ----------------------------
DROP TABLE IF EXISTS `reset_rank_log`;
CREATE TABLE `reset_rank_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `time_reset_rank_id` int(11) NOT NULL COMMENT 'Thời gian reset rank',
  `month_reset` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Tháng reset rank ứng với time reset',
  `member_level_id` int(11) NOT NULL COMMENT 'Hạng mới',
  `member_level_old_id` int(11) NULL DEFAULT NULL COMMENT 'Hạng cũ',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3760 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for role_actions
-- ----------------------------
DROP TABLE IF EXISTS `role_actions`;
CREATE TABLE `role_actions`  (
  `role_action_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_title_id` int(11) NULL DEFAULT NULL COMMENT 'Nhóm nhân viên',
  `action_id` int(11) NULL DEFAULT NULL COMMENT 'Chức năng',
  `group_id` int(11) NULL DEFAULT NULL COMMENT 'Nhom quyên',
  `is_actived` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`role_action_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 499 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_actions
-- ----------------------------
INSERT INTO `role_actions` VALUES (1, 1, 2, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (2, 1, 4, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (3, 1, 5, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (4, 1, 16, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (5, 1, 24, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (6, 1, 25, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (7, 1, 26, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (8, 1, 41, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (9, 1, 44, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (10, 1, 46, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (11, 1, 49, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (12, 1, 51, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (13, 1, 54, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (14, 1, 56, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (15, 1, 59, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (16, 1, 62, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (17, 1, 63, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (18, 1, 64, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (19, 1, 70, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (20, 1, 71, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (21, 1, 72, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (22, 1, 78, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (23, 1, 79, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (24, 1, 80, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (25, 1, 81, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (26, 1, 83, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (27, 1, 84, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (28, 1, 85, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (29, 1, 86, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (30, 1, 89, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (31, 1, 92, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (32, 1, 94, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (33, 1, 95, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (34, 1, 96, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (35, 1, 97, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (36, 1, 99, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (37, 1, 100, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (38, 1, 101, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (39, 1, 102, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (40, 1, 104, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (41, 1, 105, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (42, 1, 106, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (43, 1, 107, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (44, 1, 109, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (45, 1, 110, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (46, 1, 111, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (47, 1, 113, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (48, 1, 114, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (49, 1, 115, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (50, 1, 119, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (51, 1, 120, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (52, 1, 123, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (53, 1, 124, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (54, 1, 125, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (55, 1, 126, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (56, 1, 130, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (57, 1, 131, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (58, 1, 133, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (59, 1, 134, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (60, 1, 135, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (61, 1, 136, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (62, 1, 138, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (63, 1, 139, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (64, 1, 140, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (65, 1, 141, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (66, 1, 143, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (67, 1, 144, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (68, 1, 145, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (69, 1, 147, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (70, 1, 148, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (71, 1, 149, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (72, 1, 151, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (73, 1, 152, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (74, 1, 153, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (75, 1, 154, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (76, 1, 156, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (77, 1, 157, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (78, 1, 158, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (79, 1, 160, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (80, 1, 161, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (81, 1, 162, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (82, 1, 195, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (83, 1, 196, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (84, 1, 198, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (85, 1, 199, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (86, 1, 200, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (87, 1, 201, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (88, 1, 203, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (89, 1, 204, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (90, 1, 205, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (91, 1, 206, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (92, 1, 208, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (93, 1, 209, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (94, 1, 210, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (95, 1, 211, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (96, 1, 214, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (97, 1, 215, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (98, 1, 216, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (99, 1, 217, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (100, 1, 218, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (101, 1, 219, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (102, 1, 220, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (103, 1, 221, NULL, '1', '2019-04-13 01:39:14', '2019-04-12 18:39:14');
INSERT INTO `role_actions` VALUES (104, 3, 2, NULL, '0', '2019-04-13 01:46:19', '2019-04-12 18:46:40');
INSERT INTO `role_actions` VALUES (105, 3, 203, NULL, '0', '2019-04-13 01:47:47', '2019-04-12 18:47:50');
INSERT INTO `role_actions` VALUES (106, NULL, 2, 1, '1', '2019-04-25 10:00:58', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (107, NULL, 5, 1, '1', '2019-04-25 10:01:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (108, NULL, 24, 1, '1', '2019-04-25 10:01:02', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (109, NULL, 25, 1, '1', '2019-04-25 10:01:03', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (110, NULL, 26, 1, '1', '2019-04-25 10:01:04', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (111, NULL, 41, 1, '1', '2019-04-25 10:01:06', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (112, NULL, 44, 1, '1', '2019-04-25 10:05:34', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (113, NULL, 46, 1, '1', '2019-04-25 10:05:37', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (114, NULL, 51, 1, '1', '2019-04-25 10:05:41', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (115, NULL, 107, 1, '1', '2019-04-25 10:05:46', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (116, NULL, 209, 1, '1', '2019-04-25 10:10:39', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (117, NULL, 94, 1, '1', '2019-04-25 10:11:35', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (118, NULL, 106, 1, '1', '2019-04-25 10:11:38', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (119, NULL, 133, 1, '1', '2019-04-25 10:11:41', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (120, NULL, 201, 1, '1', '2019-04-25 10:11:46', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (121, NULL, 217, 1, '1', '2019-04-25 10:11:50', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (122, NULL, 54, 1, '1', '2019-04-25 10:15:40', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (123, NULL, 123, 1, '1', '2019-04-25 10:16:15', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (124, NULL, 134, 1, '1', '2019-04-25 10:16:19', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (125, NULL, 4, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (126, NULL, 16, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (127, NULL, 49, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (128, NULL, 56, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (129, NULL, 59, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (130, NULL, 62, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (131, NULL, 63, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (132, NULL, 64, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (133, NULL, 70, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (134, NULL, 71, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (135, NULL, 72, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (136, NULL, 78, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (137, NULL, 79, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (138, NULL, 80, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (139, NULL, 81, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (140, NULL, 83, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (141, NULL, 84, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (142, NULL, 85, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (143, NULL, 86, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (144, NULL, 89, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (145, NULL, 92, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (146, NULL, 95, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (147, NULL, 96, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (148, NULL, 97, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (149, NULL, 99, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (150, NULL, 100, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (151, NULL, 101, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (152, NULL, 102, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (153, NULL, 104, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (154, NULL, 105, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (155, NULL, 109, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (156, NULL, 110, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (157, NULL, 111, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (158, NULL, 113, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (159, NULL, 114, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (160, NULL, 115, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (161, NULL, 119, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (162, NULL, 120, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (163, NULL, 124, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (164, NULL, 125, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (165, NULL, 126, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (166, NULL, 130, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (167, NULL, 131, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (168, NULL, 135, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (169, NULL, 136, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (170, NULL, 138, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (171, NULL, 139, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (172, NULL, 140, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (173, NULL, 141, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (174, NULL, 143, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (175, NULL, 144, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (176, NULL, 145, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (177, NULL, 147, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (178, NULL, 148, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (179, NULL, 149, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (180, NULL, 151, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (181, NULL, 152, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (182, NULL, 153, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (183, NULL, 154, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (184, NULL, 156, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (185, NULL, 157, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (186, NULL, 158, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (187, NULL, 160, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (188, NULL, 161, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (189, NULL, 162, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (190, NULL, 195, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (191, NULL, 196, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (192, NULL, 198, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (193, NULL, 199, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (194, NULL, 200, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (195, NULL, 203, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (196, NULL, 204, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (197, NULL, 205, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (198, NULL, 206, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (199, NULL, 208, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (200, NULL, 210, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (201, NULL, 211, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (202, NULL, 214, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (203, NULL, 215, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (204, NULL, 216, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (205, NULL, 218, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (206, NULL, 219, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (207, NULL, 220, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (208, NULL, 221, 1, '1', '2019-04-25 23:27:00', '2019-05-06 18:06:56');
INSERT INTO `role_actions` VALUES (209, NULL, 2, 2, '1', '2019-09-13 09:37:22', '2019-09-13 09:37:22');
INSERT INTO `role_actions` VALUES (210, NULL, 4, 2, '1', '2019-09-13 09:37:23', '2019-09-13 09:37:23');
INSERT INTO `role_actions` VALUES (211, NULL, 5, 2, '1', '2019-09-13 09:37:24', '2019-09-13 09:37:24');
INSERT INTO `role_actions` VALUES (212, NULL, 16, 2, '0', '2019-09-13 09:37:29', '2019-09-13 09:37:30');
INSERT INTO `role_actions` VALUES (213, NULL, 26, 2, '1', '2019-09-13 09:37:36', '2019-09-13 09:37:36');
INSERT INTO `role_actions` VALUES (214, NULL, 79, 2, '1', '2019-09-13 09:37:45', '2019-09-13 09:37:45');
INSERT INTO `role_actions` VALUES (215, NULL, 80, 2, '1', '2019-09-13 09:37:46', '2019-09-13 09:37:46');
INSERT INTO `role_actions` VALUES (216, NULL, 81, 2, '1', '2019-09-13 09:37:46', '2019-09-13 09:37:46');
INSERT INTO `role_actions` VALUES (217, NULL, 83, 2, '1', '2019-09-13 09:37:48', '2019-09-29 17:49:10');
INSERT INTO `role_actions` VALUES (218, NULL, 41, 3, '1', '2019-09-13 09:40:22', '2019-09-13 09:40:22');
INSERT INTO `role_actions` VALUES (219, NULL, 44, 3, '1', '2019-09-13 09:40:22', '2019-09-13 09:40:22');
INSERT INTO `role_actions` VALUES (220, NULL, 46, 3, '1', '2019-09-13 09:40:23', '2019-09-13 09:40:23');
INSERT INTO `role_actions` VALUES (221, NULL, 49, 3, '1', '2019-09-13 09:40:24', '2019-09-13 09:40:24');
INSERT INTO `role_actions` VALUES (222, NULL, 51, 3, '1', '2019-09-13 09:40:25', '2019-09-13 09:40:25');
INSERT INTO `role_actions` VALUES (223, NULL, 54, 3, '1', '2019-09-13 09:40:27', '2019-09-13 09:40:27');
INSERT INTO `role_actions` VALUES (224, NULL, 56, 3, '1', '2019-09-13 09:40:28', '2019-09-13 09:40:28');
INSERT INTO `role_actions` VALUES (225, NULL, 59, 3, '1', '2019-09-13 09:40:29', '2019-09-13 09:40:29');
INSERT INTO `role_actions` VALUES (226, NULL, 92, 3, '1', '2019-09-13 09:40:36', '2019-09-13 09:40:36');
INSERT INTO `role_actions` VALUES (227, NULL, 94, 3, '1', '2019-09-13 09:40:37', '2019-09-13 09:40:37');
INSERT INTO `role_actions` VALUES (228, NULL, 95, 3, '1', '2019-09-13 09:40:38', '2019-09-13 09:40:38');
INSERT INTO `role_actions` VALUES (229, NULL, 96, 3, '1', '2019-09-13 09:40:39', '2019-09-13 09:40:39');
INSERT INTO `role_actions` VALUES (230, NULL, 97, 3, '1', '2019-09-13 09:40:40', '2019-09-13 09:40:40');
INSERT INTO `role_actions` VALUES (231, NULL, 99, 3, '1', '2019-09-13 09:40:52', '2019-09-13 09:40:52');
INSERT INTO `role_actions` VALUES (232, NULL, 100, 3, '1', '2019-09-13 09:40:52', '2019-09-13 09:40:52');
INSERT INTO `role_actions` VALUES (233, NULL, 101, 3, '1', '2019-09-13 09:40:53', '2019-09-13 09:40:53');
INSERT INTO `role_actions` VALUES (234, NULL, 102, 3, '1', '2019-09-13 09:40:54', '2019-09-13 09:40:54');
INSERT INTO `role_actions` VALUES (235, NULL, 104, 3, '1', '2019-09-13 09:40:55', '2019-09-13 09:40:55');
INSERT INTO `role_actions` VALUES (236, NULL, 105, 3, '1', '2019-09-13 09:40:59', '2019-09-13 09:40:59');
INSERT INTO `role_actions` VALUES (237, NULL, 106, 3, '1', '2019-09-13 09:41:00', '2019-09-13 09:41:00');
INSERT INTO `role_actions` VALUES (238, NULL, 107, 3, '1', '2019-09-13 09:41:01', '2019-09-13 09:41:01');
INSERT INTO `role_actions` VALUES (239, NULL, 109, 3, '1', '2019-09-13 09:41:02', '2019-09-13 09:41:02');
INSERT INTO `role_actions` VALUES (240, NULL, 110, 3, '1', '2019-09-13 09:41:03', '2019-09-13 09:41:03');
INSERT INTO `role_actions` VALUES (241, NULL, 111, 3, '1', '2019-09-13 09:41:05', '2019-09-13 09:41:05');
INSERT INTO `role_actions` VALUES (242, NULL, 113, 3, '1', '2019-09-13 09:41:06', '2019-09-13 09:41:06');
INSERT INTO `role_actions` VALUES (243, NULL, 114, 3, '1', '2019-09-13 09:41:07', '2019-09-13 09:41:07');
INSERT INTO `role_actions` VALUES (244, NULL, 115, 3, '1', '2019-09-13 09:41:09', '2019-09-13 09:41:09');
INSERT INTO `role_actions` VALUES (245, NULL, 143, 3, '1', '2019-09-13 09:41:16', '2019-09-13 09:41:16');
INSERT INTO `role_actions` VALUES (246, NULL, 144, 3, '1', '2019-09-13 09:41:16', '2019-09-13 09:41:16');
INSERT INTO `role_actions` VALUES (247, NULL, 145, 3, '1', '2019-09-13 09:41:17', '2019-09-13 09:41:17');
INSERT INTO `role_actions` VALUES (248, NULL, 147, 3, '1', '2019-09-13 09:41:18', '2019-09-13 09:41:18');
INSERT INTO `role_actions` VALUES (249, NULL, 148, 3, '1', '2019-09-13 09:41:19', '2019-09-13 09:41:19');
INSERT INTO `role_actions` VALUES (250, NULL, 223, 2, '1', '2019-09-26 19:31:19', '2019-09-26 19:31:19');
INSERT INTO `role_actions` VALUES (251, NULL, 62, 2, '1', '2019-09-29 17:48:51', '2019-09-29 17:48:51');
INSERT INTO `role_actions` VALUES (252, NULL, 63, 2, '1', '2019-09-29 17:48:52', '2019-09-29 17:48:52');
INSERT INTO `role_actions` VALUES (253, NULL, 64, 2, '1', '2019-09-29 17:48:54', '2019-09-29 17:48:54');
INSERT INTO `role_actions` VALUES (254, NULL, 70, 2, '1', '2019-09-29 17:48:56', '2019-09-29 17:48:56');
INSERT INTO `role_actions` VALUES (255, NULL, 56, 2, '1', '2019-09-29 17:49:01', '2019-09-29 17:49:01');
INSERT INTO `role_actions` VALUES (256, NULL, 51, 2, '1', '2019-09-29 17:49:02', '2019-09-29 17:49:02');
INSERT INTO `role_actions` VALUES (257, NULL, 46, 2, '1', '2019-09-29 17:49:03', '2019-09-29 17:49:03');
INSERT INTO `role_actions` VALUES (258, NULL, 41, 2, '1', '2019-09-29 17:49:05', '2019-09-29 17:49:05');
INSERT INTO `role_actions` VALUES (259, NULL, 84, 2, '1', '2019-09-29 17:49:09', '2019-09-29 17:49:09');
INSERT INTO `role_actions` VALUES (260, NULL, 89, 2, '1', '2019-09-29 17:49:13', '2019-09-29 17:49:13');
INSERT INTO `role_actions` VALUES (261, NULL, 99, 2, '1', '2019-09-29 17:49:17', '2019-09-29 17:49:17');
INSERT INTO `role_actions` VALUES (262, NULL, 96, 2, '1', '2019-09-29 17:49:18', '2019-09-29 17:49:18');
INSERT INTO `role_actions` VALUES (263, NULL, 100, 2, '1', '2019-09-29 17:49:21', '2019-09-29 17:49:21');
INSERT INTO `role_actions` VALUES (264, NULL, 109, 2, '1', '2019-09-29 17:49:24', '2019-09-29 17:49:24');
INSERT INTO `role_actions` VALUES (265, NULL, 107, 2, '1', '2019-09-29 17:49:25', '2019-09-29 17:49:25');
INSERT INTO `role_actions` VALUES (266, NULL, 120, 2, '1', '2019-09-29 17:49:35', '2019-09-29 17:49:35');
INSERT INTO `role_actions` VALUES (267, NULL, 124, 2, '1', '2019-09-29 17:49:36', '2019-09-29 17:49:36');
INSERT INTO `role_actions` VALUES (268, NULL, 123, 2, '1', '2019-09-29 17:49:37', '2019-09-29 17:49:37');
INSERT INTO `role_actions` VALUES (269, NULL, 125, 2, '1', '2019-09-29 17:49:39', '2019-09-29 17:49:39');
INSERT INTO `role_actions` VALUES (270, NULL, 130, 2, '1', '2019-09-29 17:49:41', '2019-09-29 17:49:41');
INSERT INTO `role_actions` VALUES (271, NULL, 133, 2, '1', '2019-09-29 17:49:43', '2019-09-29 17:49:43');
INSERT INTO `role_actions` VALUES (272, NULL, 135, 2, '1', '2019-09-29 17:49:45', '2019-09-29 17:49:45');
INSERT INTO `role_actions` VALUES (273, NULL, 138, 2, '1', '2019-09-29 17:49:47', '2019-09-29 17:49:47');
INSERT INTO `role_actions` VALUES (274, NULL, 140, 2, '1', '2019-09-29 17:49:48', '2019-09-29 17:49:48');
INSERT INTO `role_actions` VALUES (275, NULL, 143, 2, '1', '2019-09-29 17:49:50', '2019-09-29 17:49:50');
INSERT INTO `role_actions` VALUES (276, NULL, 147, 2, '1', '2019-09-29 17:49:53', '2019-09-29 17:49:53');
INSERT INTO `role_actions` VALUES (277, NULL, 199, 2, '1', '2019-09-29 17:49:57', '2019-09-29 17:49:57');
INSERT INTO `role_actions` VALUES (278, NULL, 196, 2, '1', '2019-09-29 17:49:59', '2019-09-29 17:49:59');
INSERT INTO `role_actions` VALUES (279, NULL, 161, 2, '1', '2019-09-29 17:50:01', '2019-09-29 17:50:01');
INSERT INTO `role_actions` VALUES (280, NULL, 156, 2, '1', '2019-09-29 17:50:04', '2019-09-29 17:50:04');
INSERT INTO `role_actions` VALUES (281, NULL, 224, 2, '1', '2019-09-29 17:50:16', '2019-09-29 17:50:16');
INSERT INTO `role_actions` VALUES (282, NULL, 220, 2, '1', '2019-09-29 17:50:20', '2019-09-29 17:50:20');
INSERT INTO `role_actions` VALUES (283, NULL, 218, 2, '1', '2019-09-29 17:50:21', '2019-09-29 17:50:21');
INSERT INTO `role_actions` VALUES (284, NULL, 222, 2, '1', '2019-09-29 17:50:23', '2019-09-29 17:50:23');
INSERT INTO `role_actions` VALUES (285, NULL, 2, 5, '0', '2019-12-02 10:55:29', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (286, NULL, 225, 5, '0', '2019-12-02 10:59:27', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (287, NULL, 224, 5, '0', '2019-12-02 10:59:28', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (288, NULL, 4, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (289, NULL, 5, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (290, NULL, 16, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (291, NULL, 24, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (292, NULL, 25, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (293, NULL, 26, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (294, NULL, 41, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (295, NULL, 44, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (296, NULL, 46, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (297, NULL, 49, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (298, NULL, 51, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (299, NULL, 54, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (300, NULL, 56, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (301, NULL, 59, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (302, NULL, 62, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (303, NULL, 63, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (304, NULL, 64, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (305, NULL, 70, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (306, NULL, 71, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (307, NULL, 72, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (308, NULL, 78, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (309, NULL, 79, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (310, NULL, 80, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (311, NULL, 81, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (312, NULL, 83, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (313, NULL, 84, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (314, NULL, 85, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (315, NULL, 86, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (316, NULL, 89, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (317, NULL, 92, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (318, NULL, 94, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (319, NULL, 95, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (320, NULL, 96, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (321, NULL, 97, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (322, NULL, 99, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (323, NULL, 100, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (324, NULL, 101, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (325, NULL, 102, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (326, NULL, 104, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (327, NULL, 105, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (328, NULL, 106, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (329, NULL, 107, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (330, NULL, 109, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (331, NULL, 110, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (332, NULL, 111, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (333, NULL, 113, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (334, NULL, 114, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (335, NULL, 115, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (336, NULL, 119, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (337, NULL, 120, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (338, NULL, 123, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (339, NULL, 124, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (340, NULL, 125, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (341, NULL, 126, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (342, NULL, 130, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (343, NULL, 131, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (344, NULL, 133, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (345, NULL, 134, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (346, NULL, 135, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (347, NULL, 136, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (348, NULL, 138, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (349, NULL, 139, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (350, NULL, 140, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (351, NULL, 141, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (352, NULL, 143, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (353, NULL, 144, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (354, NULL, 145, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (355, NULL, 147, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (356, NULL, 148, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (357, NULL, 149, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (358, NULL, 151, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (359, NULL, 152, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (360, NULL, 153, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (361, NULL, 154, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (362, NULL, 156, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (363, NULL, 157, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (364, NULL, 158, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (365, NULL, 160, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (366, NULL, 161, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (367, NULL, 162, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (368, NULL, 195, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (369, NULL, 196, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (370, NULL, 198, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (371, NULL, 199, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (372, NULL, 200, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (373, NULL, 201, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (374, NULL, 203, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (375, NULL, 204, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (376, NULL, 205, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (377, NULL, 206, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (378, NULL, 208, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (379, NULL, 209, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (380, NULL, 210, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (381, NULL, 211, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (382, NULL, 214, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (383, NULL, 215, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (384, NULL, 216, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (385, NULL, 217, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (386, NULL, 218, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (387, NULL, 219, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (388, NULL, 220, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (389, NULL, 221, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (390, NULL, 222, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (391, NULL, 223, 5, '0', '2019-12-02 11:00:33', '2019-12-02 11:00:38');
INSERT INTO `role_actions` VALUES (392, NULL, 2, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (393, NULL, 4, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (394, NULL, 5, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (395, NULL, 16, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (396, NULL, 24, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (397, NULL, 25, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (398, NULL, 26, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (399, NULL, 41, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (400, NULL, 44, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (401, NULL, 46, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (402, NULL, 49, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (403, NULL, 51, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (404, NULL, 54, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (405, NULL, 56, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (406, NULL, 59, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (407, NULL, 62, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (408, NULL, 63, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (409, NULL, 64, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (410, NULL, 70, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (411, NULL, 71, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (412, NULL, 72, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (413, NULL, 78, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (414, NULL, 79, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (415, NULL, 80, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (416, NULL, 81, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (417, NULL, 83, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (418, NULL, 84, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (419, NULL, 85, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (420, NULL, 86, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (421, NULL, 89, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (422, NULL, 92, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (423, NULL, 94, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (424, NULL, 95, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (425, NULL, 96, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (426, NULL, 97, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (427, NULL, 99, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (428, NULL, 100, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (429, NULL, 101, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (430, NULL, 102, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (431, NULL, 104, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (432, NULL, 105, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (433, NULL, 106, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (434, NULL, 107, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (435, NULL, 109, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (436, NULL, 110, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (437, NULL, 111, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (438, NULL, 113, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (439, NULL, 114, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (440, NULL, 115, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (441, NULL, 119, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (442, NULL, 120, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (443, NULL, 123, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (444, NULL, 124, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (445, NULL, 125, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (446, NULL, 126, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (447, NULL, 130, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (448, NULL, 131, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (449, NULL, 133, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (450, NULL, 134, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (451, NULL, 135, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (452, NULL, 136, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (453, NULL, 138, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (454, NULL, 139, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (455, NULL, 140, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (456, NULL, 141, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (457, NULL, 143, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (458, NULL, 144, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (459, NULL, 145, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (460, NULL, 147, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (461, NULL, 148, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (462, NULL, 149, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (463, NULL, 151, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (464, NULL, 152, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (465, NULL, 153, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (466, NULL, 154, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (467, NULL, 156, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (468, NULL, 157, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (469, NULL, 158, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (470, NULL, 160, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (471, NULL, 161, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (472, NULL, 162, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (473, NULL, 195, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (474, NULL, 196, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (475, NULL, 198, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (476, NULL, 199, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (477, NULL, 200, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (478, NULL, 201, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (479, NULL, 203, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (480, NULL, 204, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (481, NULL, 205, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (482, NULL, 206, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (483, NULL, 208, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (484, NULL, 209, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (485, NULL, 210, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (486, NULL, 211, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (487, NULL, 214, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (488, NULL, 215, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (489, NULL, 216, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (490, NULL, 217, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (491, NULL, 218, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (492, NULL, 219, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (493, NULL, 220, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (494, NULL, 221, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (495, NULL, 222, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (496, NULL, 223, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (497, NULL, 224, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');
INSERT INTO `role_actions` VALUES (498, NULL, 225, 6, '1', '2019-12-14 14:33:09', '2019-12-14 19:18:54');

-- ----------------------------
-- Table structure for role_group
-- ----------------------------
DROP TABLE IF EXISTS `role_group`;
CREATE TABLE `role_group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'tên nhóm',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'slug để check trùng',
  `is_actived` tinyint(1) NULL DEFAULT 1 COMMENT 'trạng thái',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_group
-- ----------------------------
INSERT INTO `role_group` VALUES (1, 'Quản lý', 'quan-ly', 1, '2019-04-25 09:56:54', '2019-05-06 18:08:05');
INSERT INTO `role_group` VALUES (2, 'Lễ  Tân', 'le-tan', 1, '2019-09-13 09:35:34', '2019-09-13 09:35:34');
INSERT INTO `role_group` VALUES (3, 'Quản lý kho', 'quan-ly-kho', 1, '2019-09-13 09:35:44', '2019-09-13 09:35:44');
INSERT INTO `role_group` VALUES (4, 'Marketing', 'marketing', 1, '2019-09-13 09:36:04', '2019-09-13 09:36:04');
INSERT INTO `role_group` VALUES (5, 'Nhom Quyen Auto - Khong Xoa', 'nhom-quyen-auto-khong-xoa', 1, '2019-12-02 10:54:19', '2019-12-08 15:32:31');
INSERT INTO `role_group` VALUES (6, 'Nhom quyen Auto', 'nhom-quyen-auto', 1, '2019-12-08 15:32:53', '2019-12-08 15:32:53');

-- ----------------------------
-- Table structure for role_pages
-- ----------------------------
DROP TABLE IF EXISTS `role_pages`;
CREATE TABLE `role_pages`  (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_title_id` int(11) NULL DEFAULT NULL COMMENT 'Chức vụ nhân viên',
  `group_id` int(11) NULL DEFAULT NULL COMMENT 'Nhóm quyền',
  `page_id` int(11) NULL DEFAULT NULL COMMENT 'Trang (page)',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 539 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_pages
-- ----------------------------
INSERT INTO `role_pages` VALUES (1, 1, NULL, 1, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (2, 1, NULL, 3, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (3, 1, NULL, 8, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (4, 1, NULL, 9, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (5, 1, NULL, 10, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (6, 1, NULL, 15, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (7, 1, NULL, 17, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (8, 1, NULL, 18, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (9, 1, NULL, 19, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (10, 1, NULL, 22, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (11, 1, NULL, 23, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (12, 1, NULL, 27, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (13, 1, NULL, 28, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (14, 1, NULL, 29, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (15, 1, NULL, 30, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (16, 1, NULL, 31, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (17, 1, NULL, 32, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (18, 1, NULL, 33, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (19, 1, NULL, 34, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (20, 1, NULL, 35, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (21, 1, NULL, 36, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (22, 1, NULL, 37, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (23, 1, NULL, 38, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (24, 1, NULL, 39, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (25, 1, NULL, 40, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (26, 1, NULL, 42, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (27, 1, NULL, 43, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (28, 1, NULL, 45, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (29, 1, NULL, 47, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (30, 1, NULL, 48, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (31, 1, NULL, 50, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (32, 1, NULL, 52, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (33, 1, NULL, 53, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (34, 1, NULL, 55, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (35, 1, NULL, 57, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (36, 1, NULL, 58, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (37, 1, NULL, 60, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (38, 1, NULL, 61, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (39, 1, NULL, 65, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (40, 1, NULL, 66, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (41, 1, NULL, 67, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (42, 1, NULL, 68, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (43, 1, NULL, 69, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (44, 1, NULL, 71, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (45, 1, NULL, 73, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (46, 1, NULL, 74, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (47, 1, NULL, 75, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (48, 1, NULL, 76, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (49, 1, NULL, 77, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (50, 1, NULL, 82, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (51, 1, NULL, 85, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (52, 1, NULL, 87, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (53, 1, NULL, 88, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (54, 1, NULL, 90, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (55, 1, NULL, 91, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (56, 1, NULL, 93, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (57, 1, NULL, 98, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (58, 1, NULL, 103, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (59, 1, NULL, 108, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (60, 1, NULL, 112, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (61, 1, NULL, 116, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (62, 1, NULL, 117, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (63, 1, NULL, 118, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (64, 1, NULL, 121, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (65, 1, NULL, 122, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (66, 1, NULL, 127, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (67, 1, NULL, 128, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (68, 1, NULL, 129, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (69, 1, NULL, 132, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (70, 1, NULL, 137, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (71, 1, NULL, 142, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (72, 1, NULL, 146, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (73, 1, NULL, 150, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (74, 1, NULL, 155, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (75, 1, NULL, 159, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (76, 1, NULL, 163, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (77, 1, NULL, 164, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (78, 1, NULL, 165, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (79, 1, NULL, 166, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (80, 1, NULL, 167, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (81, 1, NULL, 168, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (82, 1, NULL, 169, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (83, 1, NULL, 170, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (84, 1, NULL, 171, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (85, 1, NULL, 172, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (86, 1, NULL, 173, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (87, 1, NULL, 174, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (88, 1, NULL, 187, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (89, 1, NULL, 191, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (90, 1, NULL, 192, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (91, 1, NULL, 193, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (92, 1, NULL, 196, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (93, 1, NULL, 201, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (94, 1, NULL, 206, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (95, 1, NULL, 211, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (96, 1, NULL, 212, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (97, 1, NULL, 213, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (98, 1, NULL, 214, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (99, 1, NULL, 215, '2019-04-13 01:39:12', '2019-04-12 18:39:12', 1);
INSERT INTO `role_pages` VALUES (100, 2, NULL, 1, '2019-04-13 01:40:52', '2019-04-12 18:40:52', 1);
INSERT INTO `role_pages` VALUES (101, 2, NULL, 3, '2019-04-13 01:40:55', '2019-04-12 18:40:55', 1);
INSERT INTO `role_pages` VALUES (102, 2, NULL, 18, '2019-04-13 01:41:06', '2019-04-12 18:41:06', 1);
INSERT INTO `role_pages` VALUES (103, 2, NULL, 19, '2019-04-13 01:41:11', '2019-04-12 18:41:11', 1);
INSERT INTO `role_pages` VALUES (104, 2, NULL, 22, '2019-04-13 01:41:13', '2019-04-12 18:41:13', 1);
INSERT INTO `role_pages` VALUES (105, 2, NULL, 77, '2019-04-13 01:41:52', '2019-04-12 18:41:52', 1);
INSERT INTO `role_pages` VALUES (106, 2, NULL, 82, '2019-04-13 01:41:53', '2019-04-12 18:41:53', 1);
INSERT INTO `role_pages` VALUES (107, 2, NULL, 87, '2019-04-13 01:41:57', '2019-04-12 18:41:57', 1);
INSERT INTO `role_pages` VALUES (108, 2, NULL, 91, '2019-04-13 01:42:12', '2019-04-12 18:42:12', 1);
INSERT INTO `role_pages` VALUES (109, 2, NULL, 93, '2019-04-13 01:42:15', '2019-04-12 18:42:15', 1);
INSERT INTO `role_pages` VALUES (110, 2, NULL, 98, '2019-04-13 01:42:17', '2019-04-12 18:42:17', 1);
INSERT INTO `role_pages` VALUES (111, 2, NULL, 103, '2019-04-13 01:42:17', '2019-04-12 18:42:17', 1);
INSERT INTO `role_pages` VALUES (112, 2, NULL, 108, '2019-04-13 01:42:19', '2019-04-12 18:42:19', 1);
INSERT INTO `role_pages` VALUES (113, 2, NULL, 112, '2019-04-13 01:42:19', '2019-04-12 18:42:19', 1);
INSERT INTO `role_pages` VALUES (114, 2, NULL, 116, '2019-04-13 01:42:22', '2019-04-12 18:42:22', 1);
INSERT INTO `role_pages` VALUES (115, 2, NULL, 121, '2019-04-13 01:42:24', '2019-04-12 18:42:24', 1);
INSERT INTO `role_pages` VALUES (116, 2, NULL, 122, '2019-04-13 01:42:26', '2019-04-12 18:42:26', 1);
INSERT INTO `role_pages` VALUES (117, 2, NULL, 127, '2019-04-13 01:42:27', '2019-04-12 18:42:27', 1);
INSERT INTO `role_pages` VALUES (118, 2, NULL, 132, '2019-04-13 01:42:31', '2019-04-12 18:42:31', 1);
INSERT INTO `role_pages` VALUES (119, 2, NULL, 137, '2019-04-13 01:42:33', '2019-04-12 18:42:33', 1);
INSERT INTO `role_pages` VALUES (120, 2, NULL, 142, '2019-04-13 01:42:36', '2019-04-12 18:42:36', 1);
INSERT INTO `role_pages` VALUES (121, 2, NULL, 146, '2019-04-13 01:42:37', '2019-04-12 18:42:37', 1);
INSERT INTO `role_pages` VALUES (122, 2, NULL, 150, '2019-04-13 01:42:39', '2019-04-12 18:42:39', 1);
INSERT INTO `role_pages` VALUES (123, 2, NULL, 155, '2019-04-13 01:42:39', '2019-04-12 18:42:39', 1);
INSERT INTO `role_pages` VALUES (124, 2, NULL, 159, '2019-04-13 01:42:41', '2019-04-12 18:42:41', 1);
INSERT INTO `role_pages` VALUES (125, 2, NULL, 201, '2019-04-13 01:42:58', '2019-04-12 18:42:58', 1);
INSERT INTO `role_pages` VALUES (126, 2, NULL, 206, '2019-04-13 01:42:58', '2019-04-12 18:42:58', 1);
INSERT INTO `role_pages` VALUES (127, 2, NULL, 214, '2019-04-13 01:43:03', '2019-04-12 18:43:03', 1);
INSERT INTO `role_pages` VALUES (128, 2, NULL, 215, '2019-04-13 01:43:09', '2019-04-12 18:43:09', 1);
INSERT INTO `role_pages` VALUES (129, 3, NULL, 3, '2019-04-13 01:43:45', '2019-04-12 18:43:45', 1);
INSERT INTO `role_pages` VALUES (130, 3, NULL, 8, '2019-04-13 01:43:47', '2019-04-12 18:43:47', 1);
INSERT INTO `role_pages` VALUES (131, 3, NULL, 9, '2019-04-13 01:43:48', '2019-04-12 18:43:48', 1);
INSERT INTO `role_pages` VALUES (132, 3, NULL, 10, '2019-04-13 01:43:50', '2019-04-12 18:43:50', 1);
INSERT INTO `role_pages` VALUES (133, 3, NULL, 15, '2019-04-13 01:43:53', '2019-04-12 18:43:53', 1);
INSERT INTO `role_pages` VALUES (134, 3, NULL, 17, '2019-04-13 01:43:54', '2019-04-12 18:43:54', 1);
INSERT INTO `role_pages` VALUES (135, 3, NULL, 18, '2019-04-13 01:43:56', '2019-04-12 18:43:56', 1);
INSERT INTO `role_pages` VALUES (136, 3, NULL, 19, '2019-04-13 01:43:57', '2019-04-12 18:43:57', 1);
INSERT INTO `role_pages` VALUES (137, 3, NULL, 22, '2019-04-13 01:43:59', '2019-04-12 18:43:59', 1);
INSERT INTO `role_pages` VALUES (138, 3, NULL, 23, '2019-04-13 01:44:00', '2019-04-12 18:44:00', 1);
INSERT INTO `role_pages` VALUES (139, 3, NULL, 27, '2019-04-13 01:44:08', '2019-04-12 18:44:08', 1);
INSERT INTO `role_pages` VALUES (140, 3, NULL, 30, '2019-04-13 01:44:13', '2019-04-12 18:44:21', 0);
INSERT INTO `role_pages` VALUES (141, 3, NULL, 34, '2019-04-13 01:44:29', '2019-04-12 18:44:29', 1);
INSERT INTO `role_pages` VALUES (142, 3, NULL, 37, '2019-04-13 01:44:33', '2019-04-12 18:44:33', 1);
INSERT INTO `role_pages` VALUES (143, 3, NULL, 40, '2019-04-13 01:44:40', '2019-04-12 18:44:47', 0);
INSERT INTO `role_pages` VALUES (144, 3, NULL, 77, '2019-04-13 01:44:59', '2019-04-12 18:44:59', 1);
INSERT INTO `role_pages` VALUES (145, 3, NULL, 82, '2019-04-13 01:44:59', '2019-04-12 18:44:59', 1);
INSERT INTO `role_pages` VALUES (146, 3, NULL, 85, '2019-04-13 01:45:00', '2019-04-12 18:45:00', 1);
INSERT INTO `role_pages` VALUES (147, 3, NULL, 87, '2019-04-13 01:45:00', '2019-04-12 18:45:00', 1);
INSERT INTO `role_pages` VALUES (148, 3, NULL, 93, '2019-04-13 01:45:11', '2019-04-12 18:45:11', 1);
INSERT INTO `role_pages` VALUES (149, 3, NULL, 98, '2019-04-13 01:45:11', '2019-04-12 18:45:11', 1);
INSERT INTO `role_pages` VALUES (150, 3, NULL, 103, '2019-04-13 01:45:12', '2019-04-12 18:45:12', 1);
INSERT INTO `role_pages` VALUES (151, 3, NULL, 108, '2019-04-13 01:45:13', '2019-04-12 18:45:13', 1);
INSERT INTO `role_pages` VALUES (152, 3, NULL, 112, '2019-04-13 01:45:14', '2019-04-12 18:45:14', 1);
INSERT INTO `role_pages` VALUES (153, 3, NULL, 116, '2019-04-13 01:45:16', '2019-04-12 18:45:16', 1);
INSERT INTO `role_pages` VALUES (154, 3, NULL, 121, '2019-04-13 01:45:18', '2019-04-12 18:45:18', 1);
INSERT INTO `role_pages` VALUES (155, 3, NULL, 122, '2019-04-13 01:45:21', '2019-04-12 18:45:21', 1);
INSERT INTO `role_pages` VALUES (156, 3, NULL, 132, '2019-04-13 01:45:27', '2019-04-12 18:45:27', 1);
INSERT INTO `role_pages` VALUES (157, 3, NULL, 137, '2019-04-13 01:45:28', '2019-04-12 18:45:28', 1);
INSERT INTO `role_pages` VALUES (158, 3, NULL, 142, '2019-04-13 01:45:31', '2019-04-12 18:45:32', 0);
INSERT INTO `role_pages` VALUES (159, 3, NULL, 150, '2019-04-13 01:45:37', '2019-04-12 18:45:37', 1);
INSERT INTO `role_pages` VALUES (160, 3, NULL, 155, '2019-04-13 01:45:38', '2019-04-12 18:45:38', 1);
INSERT INTO `role_pages` VALUES (161, 3, NULL, 159, '2019-04-13 01:45:39', '2019-04-12 18:45:39', 1);
INSERT INTO `role_pages` VALUES (162, 3, NULL, 215, '2019-04-13 01:45:44', '2019-04-12 18:45:44', 1);
INSERT INTO `role_pages` VALUES (163, 3, NULL, 214, '2019-04-13 01:45:47', '2019-04-12 18:45:47', 1);
INSERT INTO `role_pages` VALUES (164, 3, NULL, 206, '2019-04-13 01:45:54', '2019-04-12 18:45:54', 1);
INSERT INTO `role_pages` VALUES (165, 3, NULL, 201, '2019-04-13 01:45:57', '2019-04-12 18:45:57', 1);
INSERT INTO `role_pages` VALUES (166, 3, NULL, 191, '2019-04-13 01:46:05', '2019-04-12 18:46:05', 1);
INSERT INTO `role_pages` VALUES (167, NULL, 1, 1, '2019-04-25 09:57:55', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (168, NULL, 1, 3, '2019-04-25 09:57:58', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (169, NULL, 1, 9, '2019-04-25 09:58:06', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (170, NULL, 1, 15, '2019-04-25 09:58:09', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (171, NULL, 1, 18, '2019-04-25 09:58:12', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (172, NULL, 1, 19, '2019-04-25 09:58:21', '2019-05-07 22:03:10', 1);
INSERT INTO `role_pages` VALUES (173, NULL, 1, 23, '2019-04-25 09:59:27', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (174, NULL, 1, 28, '2019-04-25 09:59:31', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (175, NULL, 1, 29, '2019-04-25 09:59:34', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (176, NULL, 1, 31, '2019-04-25 09:59:39', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (177, NULL, 1, 69, '2019-04-25 09:59:42', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (178, NULL, 1, 166, '2019-04-25 09:59:50', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (179, NULL, 1, 34, '2019-04-25 10:00:27', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (180, NULL, 1, 75, '2019-04-25 10:09:43', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (181, NULL, 1, 108, '2019-04-25 10:09:46', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (182, NULL, 1, 215, '2019-04-25 10:09:50', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (183, NULL, 1, 214, '2019-04-25 10:09:53', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (184, NULL, 1, 165, '2019-04-25 10:12:30', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (185, NULL, 1, 17, '2019-04-25 10:12:53', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (186, NULL, 1, 8, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (187, NULL, 1, 10, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (188, NULL, 1, 22, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (189, NULL, 1, 27, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (190, NULL, 1, 30, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (191, NULL, 1, 32, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (192, NULL, 1, 33, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (193, NULL, 1, 35, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (194, NULL, 1, 36, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (195, NULL, 1, 37, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (196, NULL, 1, 38, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (197, NULL, 1, 39, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (198, NULL, 1, 40, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (199, NULL, 1, 45, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (200, NULL, 1, 50, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (201, NULL, 1, 55, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (202, NULL, 1, 60, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (203, NULL, 1, 61, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (204, NULL, 1, 65, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (205, NULL, 1, 66, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (206, NULL, 1, 67, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (207, NULL, 1, 68, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (208, NULL, 1, 71, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (209, NULL, 1, 73, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (210, NULL, 1, 74, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (211, NULL, 1, 76, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (212, NULL, 1, 77, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (213, NULL, 1, 82, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (214, NULL, 1, 85, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (215, NULL, 1, 87, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (216, NULL, 1, 88, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (217, NULL, 1, 90, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (218, NULL, 1, 91, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (219, NULL, 1, 93, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (220, NULL, 1, 98, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (221, NULL, 1, 103, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (222, NULL, 1, 112, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (223, NULL, 1, 116, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (224, NULL, 1, 117, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (225, NULL, 1, 118, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (226, NULL, 1, 121, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (227, NULL, 1, 122, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (228, NULL, 1, 127, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (229, NULL, 1, 128, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (230, NULL, 1, 129, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (231, NULL, 1, 132, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (232, NULL, 1, 137, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (233, NULL, 1, 142, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (234, NULL, 1, 146, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (235, NULL, 1, 150, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (236, NULL, 1, 155, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (237, NULL, 1, 159, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (238, NULL, 1, 163, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (239, NULL, 1, 164, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (240, NULL, 1, 167, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (241, NULL, 1, 168, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (242, NULL, 1, 169, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (243, NULL, 1, 170, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (244, NULL, 1, 171, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (245, NULL, 1, 172, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (246, NULL, 1, 173, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (247, NULL, 1, 174, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (248, NULL, 1, 187, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (249, NULL, 1, 191, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (250, NULL, 1, 192, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (251, NULL, 1, 193, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (252, NULL, 1, 196, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (253, NULL, 1, 201, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (254, NULL, 1, 206, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (255, NULL, 1, 211, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (256, NULL, 1, 212, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (257, NULL, 1, 213, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (258, NULL, 1, 216, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (259, NULL, 1, 217, '2019-04-25 23:26:59', '2019-05-06 18:06:54', 1);
INSERT INTO `role_pages` VALUES (260, NULL, 2, 1, '2019-09-13 09:36:21', '2019-09-13 09:36:21', 1);
INSERT INTO `role_pages` VALUES (261, NULL, 2, 3, '2019-09-13 09:36:22', '2019-09-13 09:36:22', 1);
INSERT INTO `role_pages` VALUES (262, NULL, 2, 8, '2019-09-13 09:36:27', '2019-09-13 09:36:27', 1);
INSERT INTO `role_pages` VALUES (263, NULL, 2, 9, '2019-09-13 09:36:27', '2019-09-13 09:36:27', 1);
INSERT INTO `role_pages` VALUES (264, NULL, 2, 10, '2019-09-13 09:36:28', '2019-09-13 09:36:28', 1);
INSERT INTO `role_pages` VALUES (265, NULL, 2, 15, '2019-09-13 09:36:30', '2019-09-13 09:36:30', 1);
INSERT INTO `role_pages` VALUES (266, NULL, 2, 17, '2019-09-13 09:36:30', '2019-09-13 09:36:30', 1);
INSERT INTO `role_pages` VALUES (267, NULL, 2, 18, '2019-09-13 09:36:32', '2019-09-13 09:36:32', 1);
INSERT INTO `role_pages` VALUES (268, NULL, 2, 19, '2019-09-13 09:36:33', '2019-09-13 09:36:33', 1);
INSERT INTO `role_pages` VALUES (269, NULL, 2, 22, '2019-09-13 09:36:34', '2019-09-13 09:36:34', 1);
INSERT INTO `role_pages` VALUES (270, NULL, 2, 23, '2019-09-13 09:36:35', '2019-09-13 09:36:35', 1);
INSERT INTO `role_pages` VALUES (271, NULL, 2, 27, '2019-09-13 09:36:41', '2019-09-13 09:36:41', 1);
INSERT INTO `role_pages` VALUES (272, NULL, 2, 28, '2019-09-13 09:36:42', '2019-09-13 09:36:42', 1);
INSERT INTO `role_pages` VALUES (273, NULL, 2, 29, '2019-09-13 09:36:44', '2019-09-13 09:36:44', 1);
INSERT INTO `role_pages` VALUES (274, NULL, 2, 30, '2019-09-13 09:36:45', '2019-09-13 09:36:45', 1);
INSERT INTO `role_pages` VALUES (275, NULL, 2, 87, '2019-09-13 09:36:56', '2019-09-13 09:36:56', 1);
INSERT INTO `role_pages` VALUES (276, NULL, 2, 88, '2019-09-13 09:36:57', '2019-09-13 09:36:57', 1);
INSERT INTO `role_pages` VALUES (277, NULL, 2, 90, '2019-09-13 09:36:58', '2019-09-13 09:36:58', 1);
INSERT INTO `role_pages` VALUES (278, NULL, 2, 91, '2019-09-13 09:36:58', '2019-09-13 09:36:58', 1);
INSERT INTO `role_pages` VALUES (279, NULL, 2, 93, '2019-09-13 09:36:59', '2019-09-13 09:37:01', 1);
INSERT INTO `role_pages` VALUES (280, NULL, 2, 98, '2019-09-13 09:37:02', '2019-09-13 09:37:02', 1);
INSERT INTO `role_pages` VALUES (281, NULL, 2, 103, '2019-09-13 09:37:03', '2019-09-13 09:37:03', 1);
INSERT INTO `role_pages` VALUES (282, NULL, 2, 108, '2019-09-13 09:37:04', '2019-09-13 09:37:04', 1);
INSERT INTO `role_pages` VALUES (283, NULL, 2, 112, '2019-09-13 09:37:05', '2019-09-13 09:37:06', 0);
INSERT INTO `role_pages` VALUES (284, NULL, 2, 116, '2019-09-13 09:37:08', '2019-09-13 09:37:08', 1);
INSERT INTO `role_pages` VALUES (285, NULL, 2, 117, '2019-09-13 09:37:08', '2019-09-13 09:37:08', 1);
INSERT INTO `role_pages` VALUES (286, NULL, 2, 118, '2019-09-13 09:37:09', '2019-09-13 09:37:09', 1);
INSERT INTO `role_pages` VALUES (287, NULL, 2, 121, '2019-09-13 09:37:10', '2019-09-13 09:37:10', 1);
INSERT INTO `role_pages` VALUES (288, NULL, 2, 122, '2019-09-13 09:37:12', '2019-09-13 09:37:12', 1);
INSERT INTO `role_pages` VALUES (289, NULL, 3, 37, '2019-09-13 09:39:38', '2019-09-13 09:39:38', 1);
INSERT INTO `role_pages` VALUES (290, NULL, 3, 38, '2019-09-13 09:39:39', '2019-09-13 09:39:39', 1);
INSERT INTO `role_pages` VALUES (291, NULL, 3, 39, '2019-09-13 09:39:40', '2019-09-13 09:39:40', 1);
INSERT INTO `role_pages` VALUES (292, NULL, 3, 40, '2019-09-13 09:39:40', '2019-09-13 09:39:40', 1);
INSERT INTO `role_pages` VALUES (293, NULL, 3, 45, '2019-09-13 09:39:41', '2019-09-13 09:39:41', 1);
INSERT INTO `role_pages` VALUES (294, NULL, 3, 50, '2019-09-13 09:39:42', '2019-09-13 09:39:42', 1);
INSERT INTO `role_pages` VALUES (295, NULL, 3, 55, '2019-09-13 09:39:43', '2019-09-13 09:39:43', 1);
INSERT INTO `role_pages` VALUES (296, NULL, 3, 60, '2019-09-13 09:39:44', '2019-09-13 09:39:44', 1);
INSERT INTO `role_pages` VALUES (297, NULL, 3, 87, '2019-09-13 09:39:52', '2019-09-13 09:39:52', 1);
INSERT INTO `role_pages` VALUES (298, NULL, 3, 88, '2019-09-13 09:39:52', '2019-09-13 09:39:52', 1);
INSERT INTO `role_pages` VALUES (299, NULL, 3, 90, '2019-09-13 09:39:53', '2019-09-13 09:39:53', 1);
INSERT INTO `role_pages` VALUES (300, NULL, 3, 91, '2019-09-13 09:39:54', '2019-09-13 09:39:54', 1);
INSERT INTO `role_pages` VALUES (301, NULL, 3, 93, '2019-09-13 09:39:54', '2019-09-13 09:39:54', 1);
INSERT INTO `role_pages` VALUES (302, NULL, 3, 98, '2019-09-13 09:39:56', '2019-09-13 09:39:56', 1);
INSERT INTO `role_pages` VALUES (303, NULL, 3, 103, '2019-09-13 09:39:58', '2019-09-13 09:39:58', 1);
INSERT INTO `role_pages` VALUES (304, NULL, 3, 108, '2019-09-13 09:39:58', '2019-09-13 09:39:58', 1);
INSERT INTO `role_pages` VALUES (305, NULL, 3, 112, '2019-09-13 09:40:00', '2019-09-13 09:40:00', 1);
INSERT INTO `role_pages` VALUES (306, NULL, 3, 142, '2019-09-13 09:40:05', '2019-09-13 09:40:05', 1);
INSERT INTO `role_pages` VALUES (307, NULL, 3, 146, '2019-09-13 09:40:08', '2019-09-13 09:40:08', 1);
INSERT INTO `role_pages` VALUES (308, NULL, 2, 31, '2019-09-29 17:47:34', '2019-09-29 17:47:34', 1);
INSERT INTO `role_pages` VALUES (309, NULL, 2, 32, '2019-09-29 17:47:35', '2019-09-29 17:47:35', 1);
INSERT INTO `role_pages` VALUES (310, NULL, 2, 33, '2019-09-29 17:47:36', '2019-09-29 17:47:36', 1);
INSERT INTO `role_pages` VALUES (311, NULL, 2, 34, '2019-09-29 17:47:39', '2019-09-29 17:47:39', 1);
INSERT INTO `role_pages` VALUES (312, NULL, 2, 35, '2019-09-29 17:47:41', '2019-09-29 17:47:41', 1);
INSERT INTO `role_pages` VALUES (313, NULL, 2, 36, '2019-09-29 17:47:42', '2019-09-29 17:47:42', 1);
INSERT INTO `role_pages` VALUES (314, NULL, 2, 37, '2019-09-29 17:47:43', '2019-09-29 17:47:43', 1);
INSERT INTO `role_pages` VALUES (315, NULL, 2, 38, '2019-09-29 17:47:44', '2019-09-29 17:47:44', 1);
INSERT INTO `role_pages` VALUES (316, NULL, 2, 39, '2019-09-29 17:47:48', '2019-09-29 17:47:48', 1);
INSERT INTO `role_pages` VALUES (317, NULL, 2, 128, '2019-09-29 17:48:13', '2019-09-29 17:48:13', 1);
INSERT INTO `role_pages` VALUES (318, NULL, 2, 129, '2019-09-29 17:48:14', '2019-09-29 17:48:14', 1);
INSERT INTO `role_pages` VALUES (319, NULL, 2, 132, '2019-09-29 17:48:16', '2019-09-29 17:48:16', 1);
INSERT INTO `role_pages` VALUES (320, NULL, 2, 137, '2019-09-29 17:48:16', '2019-09-29 17:48:16', 1);
INSERT INTO `role_pages` VALUES (321, NULL, 2, 142, '2019-09-29 17:48:19', '2019-09-29 17:48:19', 1);
INSERT INTO `role_pages` VALUES (322, NULL, 2, 169, '2019-09-29 17:48:26', '2019-09-29 17:48:26', 1);
INSERT INTO `role_pages` VALUES (323, NULL, 2, 170, '2019-09-29 17:48:26', '2019-09-29 17:48:27', 0);
INSERT INTO `role_pages` VALUES (324, NULL, 2, 171, '2019-09-29 17:48:29', '2019-09-29 17:48:29', 1);
INSERT INTO `role_pages` VALUES (325, NULL, 2, 172, '2019-09-29 17:48:30', '2019-09-29 17:48:30', 1);
INSERT INTO `role_pages` VALUES (326, NULL, 2, 173, '2019-09-29 17:48:30', '2019-09-29 17:48:30', 1);
INSERT INTO `role_pages` VALUES (327, NULL, 2, 213, '2019-09-29 17:50:32', '2019-09-29 17:50:32', 1);
INSERT INTO `role_pages` VALUES (328, NULL, 2, 214, '2019-09-29 17:50:34', '2019-09-29 17:50:34', 1);
INSERT INTO `role_pages` VALUES (329, NULL, 2, 215, '2019-09-29 17:50:35', '2019-09-29 17:50:35', 1);
INSERT INTO `role_pages` VALUES (330, NULL, 2, 216, '2019-09-29 17:50:37', '2019-09-29 17:50:37', 1);
INSERT INTO `role_pages` VALUES (331, NULL, 2, 217, '2019-09-29 17:50:37', '2019-09-29 17:50:37', 1);
INSERT INTO `role_pages` VALUES (332, NULL, 2, 206, '2019-09-29 17:50:41', '2019-09-29 17:50:41', 1);
INSERT INTO `role_pages` VALUES (333, NULL, 2, 201, '2019-09-29 17:50:42', '2019-09-29 17:50:42', 1);
INSERT INTO `role_pages` VALUES (334, NULL, 2, 211, '2019-09-29 17:50:44', '2019-09-29 17:50:44', 1);
INSERT INTO `role_pages` VALUES (335, NULL, 2, 212, '2019-09-29 17:50:45', '2019-09-29 17:50:45', 1);
INSERT INTO `role_pages` VALUES (336, NULL, 2, 193, '2019-09-29 17:50:46', '2019-09-29 17:50:46', 1);
INSERT INTO `role_pages` VALUES (337, NULL, 2, 196, '2019-09-29 17:50:47', '2019-09-29 17:50:47', 1);
INSERT INTO `role_pages` VALUES (338, NULL, 2, 198, '2019-09-29 17:50:48', '2019-09-29 17:50:48', 1);
INSERT INTO `role_pages` VALUES (339, NULL, 2, 192, '2019-09-29 17:50:52', '2019-09-29 17:50:52', 1);
INSERT INTO `role_pages` VALUES (340, NULL, 2, 191, '2019-09-29 17:50:53', '2019-09-29 17:50:53', 1);
INSERT INTO `role_pages` VALUES (341, NULL, 2, 187, '2019-09-29 17:50:54', '2019-09-29 17:50:54', 1);
INSERT INTO `role_pages` VALUES (342, NULL, 2, 174, '2019-09-29 17:50:54', '2019-09-29 17:50:54', 1);
INSERT INTO `role_pages` VALUES (343, NULL, 2, 167, '2019-09-29 17:50:58', '2019-09-29 17:50:58', 1);
INSERT INTO `role_pages` VALUES (344, NULL, 2, 164, '2019-09-29 17:51:01', '2019-09-29 17:51:01', 1);
INSERT INTO `role_pages` VALUES (345, NULL, 2, 163, '2019-09-29 17:51:02', '2019-09-29 17:51:02', 1);
INSERT INTO `role_pages` VALUES (346, NULL, 2, 155, '2019-09-29 17:51:05', '2019-09-29 17:51:05', 1);
INSERT INTO `role_pages` VALUES (347, NULL, 2, 150, '2019-09-29 17:51:06', '2019-09-29 17:51:06', 1);
INSERT INTO `role_pages` VALUES (348, NULL, 2, 159, '2019-09-29 17:51:07', '2019-09-29 17:51:07', 1);
INSERT INTO `role_pages` VALUES (349, NULL, 2, 146, '2019-09-29 17:51:09', '2019-09-29 17:51:09', 1);
INSERT INTO `role_pages` VALUES (350, NULL, 2, 166, '2019-09-29 17:51:12', '2019-09-29 17:51:12', 1);
INSERT INTO `role_pages` VALUES (351, NULL, 5, 1, '2019-12-02 10:55:27', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (352, NULL, 5, 193, '2019-12-02 10:59:35', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (353, NULL, 5, 3, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (354, NULL, 5, 8, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (355, NULL, 5, 9, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (356, NULL, 5, 10, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (357, NULL, 5, 15, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (358, NULL, 5, 17, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (359, NULL, 5, 18, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (360, NULL, 5, 19, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (361, NULL, 5, 22, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (362, NULL, 5, 23, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (363, NULL, 5, 27, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (364, NULL, 5, 28, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (365, NULL, 5, 29, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (366, NULL, 5, 30, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (367, NULL, 5, 31, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (368, NULL, 5, 32, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (369, NULL, 5, 33, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (370, NULL, 5, 34, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (371, NULL, 5, 35, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (372, NULL, 5, 36, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (373, NULL, 5, 37, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (374, NULL, 5, 38, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (375, NULL, 5, 39, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (376, NULL, 5, 40, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (377, NULL, 5, 45, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (378, NULL, 5, 50, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (379, NULL, 5, 55, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (380, NULL, 5, 60, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (381, NULL, 5, 61, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (382, NULL, 5, 65, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (383, NULL, 5, 66, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (384, NULL, 5, 67, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (385, NULL, 5, 68, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (386, NULL, 5, 69, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (387, NULL, 5, 71, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (388, NULL, 5, 73, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (389, NULL, 5, 74, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (390, NULL, 5, 75, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (391, NULL, 5, 76, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (392, NULL, 5, 77, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (393, NULL, 5, 82, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (394, NULL, 5, 85, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (395, NULL, 5, 87, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (396, NULL, 5, 88, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (397, NULL, 5, 90, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (398, NULL, 5, 91, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (399, NULL, 5, 93, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (400, NULL, 5, 98, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (401, NULL, 5, 103, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (402, NULL, 5, 108, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (403, NULL, 5, 112, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (404, NULL, 5, 116, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (405, NULL, 5, 117, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (406, NULL, 5, 118, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (407, NULL, 5, 121, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (408, NULL, 5, 122, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (409, NULL, 5, 127, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (410, NULL, 5, 128, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (411, NULL, 5, 129, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (412, NULL, 5, 132, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (413, NULL, 5, 137, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (414, NULL, 5, 142, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (415, NULL, 5, 146, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (416, NULL, 5, 150, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (417, NULL, 5, 155, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (418, NULL, 5, 159, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (419, NULL, 5, 163, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (420, NULL, 5, 164, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (421, NULL, 5, 165, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (422, NULL, 5, 166, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (423, NULL, 5, 167, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (424, NULL, 5, 168, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (425, NULL, 5, 169, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (426, NULL, 5, 170, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (427, NULL, 5, 171, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (428, NULL, 5, 172, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (429, NULL, 5, 173, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (430, NULL, 5, 174, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (431, NULL, 5, 187, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (432, NULL, 5, 191, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (433, NULL, 5, 192, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (434, NULL, 5, 196, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (435, NULL, 5, 198, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (436, NULL, 5, 201, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (437, NULL, 5, 206, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (438, NULL, 5, 211, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (439, NULL, 5, 212, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (440, NULL, 5, 213, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (441, NULL, 5, 214, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (442, NULL, 5, 215, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (443, NULL, 5, 216, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (444, NULL, 5, 217, '2019-12-02 11:00:30', '2019-12-02 12:59:59', 0);
INSERT INTO `role_pages` VALUES (445, NULL, 6, 1, '2019-12-08 15:35:45', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (446, NULL, 6, 3, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (447, NULL, 6, 8, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (448, NULL, 6, 9, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (449, NULL, 6, 10, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (450, NULL, 6, 15, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (451, NULL, 6, 17, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (452, NULL, 6, 18, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (453, NULL, 6, 19, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (454, NULL, 6, 22, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (455, NULL, 6, 23, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (456, NULL, 6, 27, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (457, NULL, 6, 28, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (458, NULL, 6, 29, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (459, NULL, 6, 30, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (460, NULL, 6, 31, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (461, NULL, 6, 32, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (462, NULL, 6, 33, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (463, NULL, 6, 34, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (464, NULL, 6, 35, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (465, NULL, 6, 36, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (466, NULL, 6, 37, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (467, NULL, 6, 38, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (468, NULL, 6, 39, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (469, NULL, 6, 40, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (470, NULL, 6, 45, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (471, NULL, 6, 50, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (472, NULL, 6, 55, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (473, NULL, 6, 60, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (474, NULL, 6, 61, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (475, NULL, 6, 65, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (476, NULL, 6, 66, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (477, NULL, 6, 67, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (478, NULL, 6, 68, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (479, NULL, 6, 69, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (480, NULL, 6, 71, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (481, NULL, 6, 73, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (482, NULL, 6, 74, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (483, NULL, 6, 75, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (484, NULL, 6, 76, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (485, NULL, 6, 77, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (486, NULL, 6, 82, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (487, NULL, 6, 85, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (488, NULL, 6, 87, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (489, NULL, 6, 88, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (490, NULL, 6, 90, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (491, NULL, 6, 91, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (492, NULL, 6, 93, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (493, NULL, 6, 98, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (494, NULL, 6, 103, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (495, NULL, 6, 108, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (496, NULL, 6, 112, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (497, NULL, 6, 116, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (498, NULL, 6, 117, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (499, NULL, 6, 118, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (500, NULL, 6, 121, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (501, NULL, 6, 122, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (502, NULL, 6, 127, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (503, NULL, 6, 128, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (504, NULL, 6, 129, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (505, NULL, 6, 132, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (506, NULL, 6, 137, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (507, NULL, 6, 142, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (508, NULL, 6, 146, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (509, NULL, 6, 150, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (510, NULL, 6, 155, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (511, NULL, 6, 159, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (512, NULL, 6, 163, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (513, NULL, 6, 164, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (514, NULL, 6, 165, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (515, NULL, 6, 166, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (516, NULL, 6, 167, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (517, NULL, 6, 168, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (518, NULL, 6, 169, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (519, NULL, 6, 170, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (520, NULL, 6, 171, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (521, NULL, 6, 172, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (522, NULL, 6, 173, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (523, NULL, 6, 174, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (524, NULL, 6, 187, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (525, NULL, 6, 191, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (526, NULL, 6, 192, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (527, NULL, 6, 193, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (528, NULL, 6, 196, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (529, NULL, 6, 198, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (530, NULL, 6, 201, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (531, NULL, 6, 206, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (532, NULL, 6, 211, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (533, NULL, 6, 212, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (534, NULL, 6, 213, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (535, NULL, 6, 214, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (536, NULL, 6, 215, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (537, NULL, 6, 216, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);
INSERT INTO `role_pages` VALUES (538, NULL, 6, 217, '2019-12-08 15:35:46', '2019-12-14 14:33:07', 1);

-- ----------------------------
-- Table structure for room_logs
-- ----------------------------
DROP TABLE IF EXISTS `room_logs`;
CREATE TABLE `room_logs`  (
  `room_log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NULL DEFAULT NULL,
  `checkin` datetime(0) NULL DEFAULT NULL COMMENT 'thời gian vào phòng',
  `checkout` datetime(0) NULL DEFAULT NULL COMMENT 'thời gian ra phòng',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_finish` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`room_log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms`  (
  `room_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `seat` int(11) NOT NULL COMMENT 'số ghế phục vụ',
  `seat_using` int(11) NULL DEFAULT NULL COMMENT 'số ghế đã sử dụng',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`room_id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for rule_booking
-- ----------------------------
DROP TABLE IF EXISTS `rule_booking`;
CREATE TABLE `rule_booking`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Tên các bước đặt lịch',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rule_booking
-- ----------------------------
INSERT INTO `rule_booking` VALUES (1, 'Chi nhánh', 1, 28, '2019-03-23 14:53:06');
INSERT INTO `rule_booking` VALUES (2, 'Dịch vụ', 0, 28, '2019-07-22 15:32:46');
INSERT INTO `rule_booking` VALUES (3, 'Kỹ thuật viên', 0, 28, '2019-07-22 15:32:47');
INSERT INTO `rule_booking` VALUES (4, 'Thời gian', 0, 28, '2019-07-22 15:32:47');
INSERT INTO `rule_booking` VALUES (5, 'Thông tin cá nhân', 0, 28, '2019-07-22 15:32:48');
INSERT INTO `rule_booking` VALUES (6, 'Xác nhận', 0, 28, '2019-07-22 15:32:49');

-- ----------------------------
-- Table structure for rule_menu
-- ----------------------------
DROP TABLE IF EXISTS `rule_menu`;
CREATE TABLE `rule_menu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên menu',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `position` int(11) NULL DEFAULT NULL COMMENT 'Vị trí hiển thị',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rule_menu
-- ----------------------------
INSERT INTO `rule_menu` VALUES (1, 'Đặt lịch hẹn', 1, 1, 28, NULL, '2019-07-22 15:33:49');
INSERT INTO `rule_menu` VALUES (2, 'Dịch vụ', 0, 2, 28, NULL, '2019-07-22 15:33:49');
INSERT INTO `rule_menu` VALUES (3, 'Sản phẩm', 0, 3, 28, NULL, '2019-07-22 15:33:49');
INSERT INTO `rule_menu` VALUES (4, 'Giới thiệu', 0, 4, 28, NULL, '2019-07-22 15:33:49');
INSERT INTO `rule_menu` VALUES (5, 'Chi nhánh', 1, 2, 28, NULL, '2019-07-22 15:33:49');
INSERT INTO `rule_menu` VALUES (6, 'Liên hệ', 0, 5, 28, NULL, '2019-07-22 15:33:49');

-- ----------------------------
-- Table structure for rule_setting_other
-- ----------------------------
DROP TABLE IF EXISTS `rule_setting_other`;
CREATE TABLE `rule_setting_other`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `day` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số ngày đặt lịch xa nhất',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rule_setting_other
-- ----------------------------
INSERT INTO `rule_setting_other` VALUES (1, 'Hiển thị thời gian kinh doanh', 1, '', 25, '2019-08-23 15:00:46');
INSERT INTO `rule_setting_other` VALUES (2, 'Hiển thị giá dịch vụ', 0, '', 28, '2019-10-05 10:44:33');
INSERT INTO `rule_setting_other` VALUES (3, 'Hiển thị thời gian dịch vụ', 0, '', 28, '2019-10-05 10:44:36');
INSERT INTO `rule_setting_other` VALUES (4, 'Thời gian đặt lịch', 1, '15', 28, '2019-07-15 14:24:26');

-- ----------------------------
-- Table structure for service_branch_prices
-- ----------------------------
DROP TABLE IF EXISTS `service_branch_prices`;
CREATE TABLE `service_branch_prices`  (
  `service_branch_price_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `old_price` decimal(10, 0) NULL DEFAULT NULL,
  `new_price` decimal(10, 0) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`service_branch_price_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 231 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_card_groups
-- ----------------------------
DROP TABLE IF EXISTS `service_card_groups`;
CREATE TABLE `service_card_groups`  (
  `service_card_group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`service_card_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_card_list
-- ----------------------------
DROP TABLE IF EXISTS `service_card_list`;
CREATE TABLE `service_card_list`  (
  `service_card_list_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `service_card_id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `order_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` decimal(16, 0) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `actived_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`service_card_list_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 275 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_cards
-- ----------------------------
DROP TABLE IF EXISTS `service_cards`;
CREATE TABLE `service_cards`  (
  `service_card_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_card_group_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `service_is_all` tinyint(1) NULL DEFAULT NULL COMMENT 'thẻ 1 dịch vụ  or tất cả dịch vụ',
  `service_id` int(11) NULL DEFAULT NULL COMMENT 'mã dịch vụ nếu như loại thẻ đó là thẻ dùng 1 dịch vụ',
  `service_card_type` enum('money','service') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `date_using` int(11) NULL DEFAULT NULL COMMENT 'số ngày sử dụng so với ngày active . 0 là ko giới hạn',
  `number_using` int(11) NULL DEFAULT NULL COMMENT 'số lần sử dụng . 0 là không giới hạn',
  `price` decimal(10, 0) NULL DEFAULT 0 COMMENT 'giá bán',
  `money` decimal(10, 0) NULL DEFAULT 0 COMMENT 'tiền sẽ được cộng vào tài khoản ',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Check trùng',
  `staff_commission_value` varchar(244) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `type_staff_commission` enum('percent','money') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Kiểu hoa hồng cho nhân viên',
  `refer_commission_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `type_refer_commission` enum('percent','money') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Kiểu hoa hồng cho khách giới thiệu',
  PRIMARY KEY (`service_card_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 66 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_categories
-- ----------------------------
DROP TABLE IF EXISTS `service_categories`;
CREATE TABLE `service_categories`  (
  `service_category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`service_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_images
-- ----------------------------
DROP TABLE IF EXISTS `service_images`;
CREATE TABLE `service_images`  (
  `service_image_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` enum('mobile','desktop') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT 'desktop',
  `created_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`service_image_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for service_materials
-- ----------------------------
DROP TABLE IF EXISTS `service_materials`;
CREATE TABLE `service_materials`  (
  `service_material_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL COMMENT 'id sản phẩm ',
  `material_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'mã sản phẩm',
  `quantity` decimal(11, 0) NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`service_material_id`) USING BTREE,
  UNIQUE INDEX `material_code`(`material_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `service_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `service_category_id` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `service_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `service_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `price_standard` decimal(10, 0) NULL DEFAULT NULL,
  `is_sale` tinyint(1) NULL DEFAULT NULL COMMENT 'dịch vụ giảm giá',
  `service_type` enum('normal','hot','new') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `time` int(11) NULL DEFAULT NULL COMMENT 'thời gian phục vụ mỗi dịch vụ',
  `have_material` tinyint(1) NULL DEFAULT 0 COMMENT 'có sử dụng nguyên liệu trừ kho',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `staff_commission_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `type_staff_commission` enum('percent','money') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Kiểu hoa hồng cho nhân viên phục vụ',
  `refer_commission_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `type_refer_commission` enum('percent','money') CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Kiểu hoa hồng cho khách giới thiệu',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `detail_description` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`service_id`) USING BTREE,
  UNIQUE INDEX `service_name_code`(`service_name`, `service_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 118 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for shifts
-- ----------------------------
DROP TABLE IF EXISTS `shifts`;
CREATE TABLE `shifts`  (
  `shift_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shift_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start_time` time(0) NULL DEFAULT NULL,
  `end_time` time(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`shift_id`) USING BTREE,
  UNIQUE INDEX `shift_code`(`shift_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sms_campaign
-- ----------------------------
DROP TABLE IF EXISTS `sms_campaign`;
CREATE TABLE `sms_campaign`  (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên chiến dịch',
  `status` enum('cancel','new','sent') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'new' COMMENT 'Trang thái chiến dịch',
  `content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nội dung tin nhắn',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Slug chiến dịch để check trùng',
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Mã chiến dịch',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Thời gian gửi',
  `is_now` tinyint(1) NULL DEFAULT 0 COMMENT 'Gửi ngay',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Ngươi update',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sent_by` int(11) NULL DEFAULT NULL,
  `time_sent` datetime(0) NULL DEFAULT NULL,
  `branch_id` int(11) NOT NULL COMMENT 'Id chi nhánh',
  PRIMARY KEY (`campaign_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sms_config
-- ----------------------------
DROP TABLE IF EXISTS `sms_config`;
CREATE TABLE `sms_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` enum('birthday','new_appointment','cancel_appointment','remind_appointment','paysuccess','new_customer','service_card_nearly_expired','service_card_over_number_used','service_card_expires') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Loại tin nhắn',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'điều kiện gửi (Số giờ, số ngày gửi trước)',
  `time_sent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'thời điểm gửi tin nhắn',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên loại tin nhắn',
  `content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nội dung nhắn tin',
  `is_active` tinyint(1) NULL DEFAULT 0 COMMENT 'Trạng thái tin nhắn',
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `actived_by` int(11) NULL DEFAULT NULL COMMENT 'Người active',
  `datetime_actived` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian active',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sms_config
-- ----------------------------
INSERT INTO `sms_config` VALUES (1, 'birthday', '', '10:00', 'Chúc mừng sinh nhật', 'Chuc mung khach hang {CUSTOMER_GENDER} {CUSTOMER_FULL_NAME}. Chuc {CUSTOMER_GENDER} sinh nhat vui ve', 1, 1, 25, '2019-09-25 16:32:01', '2019-09-25 16:32:01', 25, '2019-09-14 09:52:01');
INSERT INTO `sms_config` VALUES (2, 'remind_appointment', '60', NULL, 'Nhắc lịch hẹn', '{CUSTOMER_GENDER} {CUSTOMER_NAME} da dat lich tai {NAME_SPA} vao luc {DATETIME}.', 1, 1, 25, '2019-09-14 09:52:03', '2019-09-14 09:52:03', 25, '2019-09-14 09:52:03');
INSERT INTO `sms_config` VALUES (3, 'new_appointment', '0', NULL, 'Lịch hẹn mới', '{CUSTOMER_GENDER} {CUSTOMER_FULL_NAME} da dat lich tai {NAME_SPA} vao luc {DATETIME_APPOINTMENT} ma lich hen {CODE_APPOINTMENT}', 1, 1, 28, '2020-02-19 15:39:09', '2020-02-19 15:39:09', 28, '2020-02-19 15:39:09');
INSERT INTO `sms_config` VALUES (4, 'cancel_appointment', '0', NULL, 'Huỷ lịch hẹn', 'Chao {CUSTOMER_GENDER} {CUSTOMER_FULL_NAME}. {CUSTOMER_GENDER} da huy lich hen cua {NAME_SPA}. Ma lich hen {CODE_APPOINTMENT}', 1, 1, 25, '2019-09-14 09:52:02', '2019-09-14 09:52:02', 25, '2019-09-14 09:52:02');
INSERT INTO `sms_config` VALUES (5, 'new_customer', '0', NULL, 'Khách hàng mới', 'Cam on {CUSTOMER_GENDER} {CUSTOMER_NAME} da dang ky thanh vien tai {NAME_SPA}.', 1, 1, 25, '2019-09-14 09:52:05', '2019-09-14 09:52:05', 25, '2019-09-14 09:52:05');
INSERT INTO `sms_config` VALUES (6, 'service_card_nearly_expired', '1', NULL, 'Thẻ dịch vụ sắp hết hạn', 'Chao {CUSTOMER_GENDER} {CUSTOMER_FULL_NAME} the dich vu cua {CUSTOMER_GENDER} se het han vao {DATETIME}. Ma the {CODE_CARD}', 1, 1, 25, '2019-09-14 09:52:05', '2019-09-14 09:52:05', 25, '2019-09-14 09:52:05');
INSERT INTO `sms_config` VALUES (7, 'service_card_over_number_used', '1', NULL, 'Thẻ dịch vụ hết số lần sử dụng', 'Chao {CUSTOMER_GENDER}{CUSTOMER_FULL_NAME}. The dich vu cua ban da het so lan su dung. Ma the {CODE_CARD}', 1, 1, 25, '2019-09-14 09:52:06', '2019-09-14 09:52:06', 25, '2019-09-14 09:52:06');
INSERT INTO `sms_config` VALUES (8, 'service_card_expires', '1', NULL, 'Thẻ dịch vụ hết hạn sử dụng', 'Chao {CUSTOMER_GENDER}{CUSTOMER_FULL_NAME}. The dich vu cua {CUSTOMER_GENDER} da het han su dung. Ma the {CODE_CARD}', 1, 1, 25, '2019-09-14 09:52:07', '2019-09-14 09:52:07', 25, '2019-09-14 09:52:07');
INSERT INTO `sms_config` VALUES (9, 'paysuccess', '0', '', 'Thanh toán thành công', 'Cam on {CUSTOMER_GENDER}{CUSTOMER_FULL_NAME}da mua hang tai {NAME_SPA}.', 1, NULL, 25, '2019-09-14 09:52:04', '2019-09-14 09:52:04', 25, '2019-09-14 09:52:04');

-- ----------------------------
-- Table structure for sms_log
-- ----------------------------
DROP TABLE IF EXISTS `sms_log`;
CREATE TABLE `sms_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên brandname',
  `campaign_id` int(11) NULL DEFAULT NULL COMMENT 'Tên chiến dịch',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Số điện thoại',
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên khách hàng',
  `message` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nội dung tin nhắn',
  `sms_status` enum('new','cancel','sent') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Trạng thái gửi tin',
  `sms_type` enum('birthday','new_appointment','cancel_appointment','remind_appointment','paysuccess','new_customer','service_card_nearly_expired','service_card_over_number_used','service_card_expires') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Loại tin nhắn',
  `error_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'tin nhắn trả ve mã lỗi',
  `error_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'thông tin mã lỗi',
  `sms_guid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'tin nhắn trả về guid',
  `created_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày tạo',
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'Ngày cập nhật',
  `time_sent` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian bắt đầu gửi tin nhắn',
  `time_sent_done` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian gửi xong tin nhắn',
  `sent_by` int(11) NULL DEFAULT NULL COMMENT 'Người gửi',
  `created_by` int(11) NOT NULL,
  `object_id` int(11) NULL DEFAULT NULL,
  `object_type` enum('customer','customer_appointment','service_card','order') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 586 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sms_setting_brandname
-- ----------------------------
DROP TABLE IF EXISTS `sms_setting_brandname`;
CREATE TABLE `sms_setting_brandname`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider` enum('st','vht','vietguys','fpt','viettel') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Nhà cung cấp',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Số / Tên brandname',
  `type` enum('brandname','1900xxxx','8xxx','09xxxxxx') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'brandname' COMMENT 'branhname: Brandname, 1900xxxx: Số cố định (1900xxxxx), 8xxx: Số cố định (8xxx), 09xxxxxx: Số ngẫu nhiên (09xxxxxx)',
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Tài khoản hoặc API key',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Mật khẩu hoặc API secret',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 0 COMMENT 'Bật tắt cấu hình',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sms_setting_brandname
-- ----------------------------
INSERT INTO `sms_setting_brandname` VALUES (1, 'fpt', 'FTI', '1900xxxx', 'waoservices', 'E@X=2\\is*DGo~b5zSRY`', '2019-02-16 12:08:51', '2020-02-19 15:40:42', 1, 28, 1);

-- ----------------------------
-- Table structure for sms_vendor_config
-- ----------------------------
DROP TABLE IF EXISTS `sms_vendor_config`;
CREATE TABLE `sms_vendor_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` enum('st','vht','vietguys','fpt','viettel') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Nhà cung cấp',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Số / Tên brandname',
  `type` enum('brandname','1900xxxx','8xxx','09xxxxxx') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'brandname' COMMENT 'branhname: Brandname, 1900xxxx: Số cố định (1900xxxxx), 8xxx: Số cố định (8xxx), 09xxxxxx: Số ngẫu nhiên (09xxxxxx)',
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Tài khoản hoặc API key',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Mật khẩu hoặc API secret',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 0 COMMENT 'Bật tắt cấu hình',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sms_vendor_config
-- ----------------------------
INSERT INTO `sms_vendor_config` VALUES (1, 'fpt', 'piospa', 'brandname', '232131321sa', '321dsakdaskd21323213@#$!', '2019-02-16 12:08:51', '2019-02-16 12:08:54', 1, 2, 1);

-- ----------------------------
-- Table structure for spa_info
-- ----------------------------
DROP TABLE IF EXISTS `spa_info`;
CREATE TABLE `spa_info`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Tên đơn vị',
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Mã đơn vị',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Số điện thoại',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Email',
  `hot_line` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Hot line',
  `provinceid` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '79' COMMENT 'Mã tỉnh/ thành phố',
  `districtid` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '760',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `slogan` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `bussiness_id` int(11) NULL DEFAULT NULL COMMENT 'Mã ngành nghề kinh doanh',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `fanpage` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `zalo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `instagram_page` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tax_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Mã số thuế',
  `is_part_paid` tinyint(1) NULL DEFAULT 1 COMMENT 'Cho phép thanh toán nhiều lần',
  `introduction` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `branch_apply_order` int(11) NULL DEFAULT NULL COMMENT 'Chi nhánh nhận đơn hàng từ app',
  `total_booking_time` int(11) NULL DEFAULT 0 COMMENT 'Số lượng đặt lịch tối đa trong 1 khung giờ, 0: ko giới hạn',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of spa_info
-- ----------------------------
INSERT INTO `spa_info` VALUES (1, 'Nhi Lê Center', '001', '0888515575', 'hathanhphong29@gmail.com', '0981339686', '72', '712', 'Lô 7 Khu Mai Anh , Nguyễn Du', 'Dẫn đầu kỹ nguyên công nghệ', 1, 'uploads/admin/spa-info/20191010/3157069240510102019_config.jpg', 1, 0, 'https://www.facebook.com/Vi%E1%BB%87n-Th%E1%BA%A9m-M%E1%BB%B9-NHI-L%C3%8A-l-Korea-Skincare-Clinic-102697141096381/', '0981339686 - 0967005205', 'test', NULL, 28, NULL, '2020-03-21 16:33:47', NULL, NULL, 1, 'XẢ STRESS CUỐI TUẦN CÙNG NHI LÊ CENTER', 1, 4);

-- ----------------------------
-- Table structure for staff_title
-- ----------------------------
DROP TABLE IF EXISTS `staff_title`;
CREATE TABLE `staff_title`  (
  `staff_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_title_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên chức vụ',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `staff_title_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Mã chức vụ',
  `staff_title_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả',
  `is_system` tinyint(4) NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái',
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT 'Thời gian cập nhật',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`staff_title_id`) USING BTREE,
  UNIQUE INDEX `staff_title_name`(`staff_title_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of staff_title
-- ----------------------------
INSERT INTO `staff_title` VALUES (1, 'Quản lý', NULL, 'CV_0804201901', NULL, 1, 1, 0, '2019-04-08 13:48:53', '2019-04-07 23:48:53', NULL, NULL);
INSERT INTO `staff_title` VALUES (2, 'Nhân viên phục vụ', NULL, 'CV_0804201902', NULL, 1, 1, 0, '2019-04-08 13:49:01', '2019-04-07 23:49:01', NULL, NULL);
INSERT INTO `staff_title` VALUES (3, 'Thu ngân', NULL, 'CV_0804201903', NULL, 1, 1, 0, '2019-04-08 13:49:06', '2019-04-07 23:49:06', NULL, NULL);
INSERT INTO `staff_title` VALUES (4, 'Kế toán', 'ke-toan', 'CV_0705201904', 'nhunhu', 1, 1, 0, '2019-05-07 21:10:44', '2019-05-07 14:10:44', NULL, NULL);
INSERT INTO `staff_title` VALUES (5, 'Lễ tân', 'le-tan', 'CV_1309201905', NULL, 1, 1, 0, '2019-09-13 09:43:50', '2019-09-13 09:43:50', NULL, NULL);

-- ----------------------------
-- Table structure for staffs
-- ----------------------------
DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs`  (
  `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL COMMENT 'Id phòng ban',
  `branch_id` int(11) NULL DEFAULT NULL,
  `staff_title_id` int(11) NOT NULL COMMENT 'Id chức vụ',
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '70fb6cc4d9ed728fa61892a8e7d085aad3c904dd',
  `salt` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '900150983cd24fb0d6963f7d28e17f72',
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ và Tên',
  `birthday` datetime(0) NULL DEFAULT NULL COMMENT 'Ngày sinh',
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'giới tính',
  `phone1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'số điện thoại1',
  `phone2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'số điện thoại2',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'email1',
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'facebook',
  `date_last_login` datetime(0) NULL DEFAULT NULL COMMENT 'last login',
  `is_admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Là admin',
  `is_actived` tinyint(4) NULL DEFAULT 0 COMMENT 'đã in acive',
  `is_deleted` tinyint(4) NULL DEFAULT 0 COMMENT 'đã xoá',
  `staff_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'link hình avatar',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Dia chi',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`staff_id`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of staffs
-- ----------------------------
INSERT INTO `staffs` VALUES (25, 1, 2, 1, 'admin', '$2y$12$AjVTYL86IfZNsYo.0jjXF.5OPZFYsngUJs948Z3ENLUVJ50UocMpO', '900150983cd24fb0d6963f7d28e17f72', 'Piospa Manager', '1994-05-29 00:00:00', 'female', '0967005205', NULL, 'admin@gmail.com', NULL, NULL, 1, 1, 0, 'uploads/admin/staff/20190916/7156864320116092019_staff.jpg', '24 trường chinh , gò dầu tây ninh', 1, 1, '2018-10-03 02:16:53', '2019-09-26 19:07:33', '7gsoYVInLuvP3lz1GQkMR1HMHvmOKSixcPRJiXWtKXnuFlGTTvWJRS6jYlr8');

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `supplier_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` datetime(0) NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'đia chỉ nhà cung cấp',
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'tên nguời đại diện',
  `contact_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'chức vụ người đại diện',
  `contact_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'số dt người đại diện',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`supplier_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ticket_staff_device
-- ----------------------------
DROP TABLE IF EXISTS `ticket_staff_device`;
CREATE TABLE `ticket_staff_device`  (
  `ticket_staff_device_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL COMMENT 'id của user',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `imei` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'imei thiết bị',
  `model` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Model thiết bị',
  `platform` enum('android','ios','other') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Flatform',
  `os_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'hệ điều hành',
  `app_version` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Phiên bản app',
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'token bắn notification',
  `date_created` datetime(0) NULL DEFAULT NULL COMMENT 'ngày tạo',
  `last_access` datetime(0) NULL DEFAULT NULL COMMENT 'lần truy cập gần nhất',
  `date_modified` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'ngày cập nhật ',
  `modified_by` int(11) NULL DEFAULT NULL COMMENT 'người cập nhật',
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'người tạo',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `endpoint_arn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'endpoint push amazon',
  PRIMARY KEY (`ticket_staff_device_id`) USING BTREE,
  INDEX `staff_id_is_actived_is_deleted`(`staff_id`, `is_actived`, `is_deleted`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'danh sách thiết bị theo nhân viên' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for time_insert_reset_rank
-- ----------------------------
DROP TABLE IF EXISTS `time_insert_reset_rank`;
CREATE TABLE `time_insert_reset_rank`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Giá trị Insert vào',
  `type` enum('one_month','two_month','three_month','four_month','six_month','one_year') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of time_insert_reset_rank
-- ----------------------------
INSERT INTO `time_insert_reset_rank` VALUES (1, '1,2,3,4,5,6,7,8,9,10,11,12', 'one_month', '2019-12-23 00:00:00', '2019-12-23 00:00:00');
INSERT INTO `time_insert_reset_rank` VALUES (2, '3,5,7,9,11,1', 'two_month', '2019-12-23 00:00:00', '2019-12-23 00:00:00');
INSERT INTO `time_insert_reset_rank` VALUES (3, '4,7,10,1', 'three_month', '2019-12-23 00:00:00', '2019-12-23 00:00:00');
INSERT INTO `time_insert_reset_rank` VALUES (4, '5,9,1', 'four_month', '2019-12-23 00:00:00', '2019-12-23 00:00:00');
INSERT INTO `time_insert_reset_rank` VALUES (5, '7,1', 'six_month', '2019-12-23 00:00:00', '2019-12-23 00:00:00');
INSERT INTO `time_insert_reset_rank` VALUES (6, '1', 'one_year', '2019-12-23 00:00:00', '2019-12-23 00:00:00');

-- ----------------------------
-- Table structure for time_working
-- ----------------------------
DROP TABLE IF EXISTS `time_working`;
CREATE TABLE `time_working`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eng_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Tên thứ bằng tiếng anh',
  `vi_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT 'Tên thứ bằng tiếng việt',
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `start_time` time(0) NOT NULL COMMENT 'Giờ bắt đầu làm việc',
  `end_time` time(0) NOT NULL COMMENT 'Giờ tan ca',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of time_working
-- ----------------------------
INSERT INTO `time_working` VALUES (1, 'Monday', 'Thứ hai', 1, '08:30:00', '20:00:00', 42, NULL, '2019-11-26 14:58:41');
INSERT INTO `time_working` VALUES (2, 'Tuesday', 'Thứ ba', 1, '08:30:00', '20:00:00', 42, NULL, '2019-11-26 14:58:41');
INSERT INTO `time_working` VALUES (3, 'Wednesday', 'Thứ tư', 1, '08:30:00', '20:00:00', 42, NULL, '2019-11-26 14:58:41');
INSERT INTO `time_working` VALUES (4, 'Thursday', 'Thứ năm', 1, '08:00:00', '20:00:00', 42, NULL, '2019-11-26 14:58:41');
INSERT INTO `time_working` VALUES (5, 'Friday', 'Thứ sáu', 1, '08:00:00', '20:00:00', 42, NULL, '2019-11-26 14:58:41');
INSERT INTO `time_working` VALUES (6, 'Saturday', 'Thứ bảy', 1, '08:00:00', '20:00:00', 42, NULL, '2019-11-26 14:58:41');
INSERT INTO `time_working` VALUES (7, 'Sunday', 'Chủ nhật', 1, '08:00:00', '20:00:00', 42, NULL, '2019-11-26 14:58:41');

-- ----------------------------
-- Table structure for timekeeper_logs
-- ----------------------------
DROP TABLE IF EXISTS `timekeeper_logs`;
CREATE TABLE `timekeeper_logs`  (
  `timekeeper_log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `shift_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` date NULL DEFAULT NULL,
  `time_in` time(0) NULL DEFAULT NULL,
  `time_out` time(0) NULL DEFAULT NULL,
  `hour` int(2) NULL DEFAULT NULL,
  `dayhour` int(2) NULL DEFAULT NULL,
  `late_minute` int(6) NULL DEFAULT NULL,
  `early_minute` int(6) NULL DEFAULT NULL,
  `is_overtime` tinyint(1) NULL DEFAULT 0,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`timekeeper_log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for timekeeper_shifts
-- ----------------------------
DROP TABLE IF EXISTS `timekeeper_shifts`;
CREATE TABLE `timekeeper_shifts`  (
  `timekeeper_shift_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `shift_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `all_day` tinyint(1) NULL DEFAULT 0,
  `d1` tinyint(1) NULL DEFAULT 0,
  `d2` tinyint(1) NULL DEFAULT 0,
  `d3` tinyint(1) NULL DEFAULT 0,
  `d4` tinyint(1) NULL DEFAULT 0,
  `d5` tinyint(1) NULL DEFAULT 0,
  `d6` tinyint(1) NULL DEFAULT 0,
  `d7` tinyint(1) NULL DEFAULT 0,
  `d8` tinyint(1) NULL DEFAULT 0,
  `d9` tinyint(1) NULL DEFAULT 0,
  `d10` tinyint(1) NULL DEFAULT 0,
  `d11` tinyint(1) NULL DEFAULT 0,
  `d12` tinyint(1) NULL DEFAULT 0,
  `d13` tinyint(1) NULL DEFAULT 0,
  `d14` tinyint(1) NULL DEFAULT 0,
  `d15` tinyint(1) NULL DEFAULT 0,
  `d16` tinyint(1) NULL DEFAULT 0,
  `d17` tinyint(1) NULL DEFAULT 0,
  `d18` tinyint(1) NULL DEFAULT 0,
  `d19` tinyint(1) NULL DEFAULT 0,
  `d20` tinyint(1) NULL DEFAULT 0,
  `d21` tinyint(1) NULL DEFAULT 0,
  `d22` tinyint(1) NULL DEFAULT 0,
  `d23` tinyint(1) NULL DEFAULT 0,
  `d24` tinyint(1) NULL DEFAULT 0,
  `d25` tinyint(1) NULL DEFAULT 0,
  `d26` tinyint(1) NULL DEFAULT 0,
  `d27` tinyint(1) NULL DEFAULT 0,
  `d28` tinyint(1) NULL DEFAULT 0,
  `d29` tinyint(1) NULL DEFAULT 0,
  `d30` tinyint(1) NULL DEFAULT 0,
  `d31` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`timekeeper_shift_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for transports
-- ----------------------------
DROP TABLE IF EXISTS `transports`;
CREATE TABLE `transports`  (
  `transport_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transport_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `charge` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(4) NULL DEFAULT 0,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `contact_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `contact_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL COMMENT 'Người tạo',
  `updated_by` int(11) NULL DEFAULT NULL COMMENT 'Người cập nhật',
  PRIMARY KEY (`transport_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transports
-- ----------------------------
INSERT INTO `transports` VALUES (1, 'Grab', 'grab', 20000, '2020-03-26 19:35:55', '2020-03-26 19:35:55', 0, NULL, 'Mr Phu Dee', '0794212390', 'Giám đốc', '72 trần trọng cung', 28, NULL);
INSERT INTO `transports` VALUES (2, 'Go Việt', 'go-viet', 20000, '2020-03-27 09:49:51', '2020-03-27 09:49:51', 0, NULL, 'Lê Quang Phú', '0794212390', 'Giám đốc', 'Châu Đốc, An Giang', 28, NULL);

-- ----------------------------
-- Table structure for unit_conversions
-- ----------------------------
DROP TABLE IF EXISTS `unit_conversions`;
CREATE TABLE `unit_conversions`  (
  `unit_conversion_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL COMMENT 'đơn vị cần quy đổi',
  `unit_standard` int(11) NOT NULL COMMENT 'đơn vị gốc',
  `conversion_rate` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`unit_conversion_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units`  (
  `unit_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `is_standard` tinyint(1) NOT NULL DEFAULT 0,
  `is_actived` tinyint(1) NULL DEFAULT 1,
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`unit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for vouchers
-- ----------------------------
DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE `vouchers`  (
  `voucher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_all` tinyint(1) NULL DEFAULT NULL,
  `type` enum('sale_percent','sale_cash') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Loại giảm giá: giảm theo phần trăm, giảm tiền trực tiếp',
  `percent` int(11) NULL DEFAULT NULL COMMENT 'phần trăm giảm',
  `cash` int(11) NULL DEFAULT NULL COMMENT 'giảm bao nhiêu tiền',
  `max_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Giá giảm tối đa dành cho giảm theo %',
  `required_price` int(11) NULL DEFAULT NULL COMMENT 'Yêu cầu giá dịch vụ lớn hơn hoặc bằng (%, cash)',
  `object_type` enum('service_card','product','service','all') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `object_type_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'VD : \"all\" giảm tất cả  \'1,2,3\' chỉ những object nào có id trong đó mới dc giảm ',
  `expire_date` datetime(0) NOT NULL COMMENT 'Ngày hết hạn',
  `branch_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quota` int(11) NULL DEFAULT NULL COMMENT 'hạn mức sd',
  `total_use` int(11) NULL DEFAULT NULL COMMENT 'số lần đã sd',
  `is_actived` tinyint(4) NOT NULL DEFAULT 1,
  `sale_special` tinyint(1) NULL DEFAULT 0,
  `voucher_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Hình ảnh',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mô tả ngắn',
  `detail_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả chi tiết',
  `member_level_apply` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'VD : \"all\" giảm tất cả  \'1,2,3\' chỉ những member level id nào có id trong đó mới dc áp dụng\r\n',
  `type_using` enum('public','private') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'public: sử dụng tất cả, private: sử dụng nội bộ',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`voucher_id`) USING BTREE,
  UNIQUE INDEX `code`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for warehouses
-- ----------------------------
DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses`  (
  `warehouse_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `province_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '79',
  `district_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` tinyint(1) NULL DEFAULT 0,
  `is_retail` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`warehouse_id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
