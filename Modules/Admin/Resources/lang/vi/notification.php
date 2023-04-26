<?php
return [
    'index' => [
        'NOTIFICATION' => 'Thông báo',
        'search' => [
            'TITLE' => 'Tiêu đề',
            'IS_SEND' => [
                'DEFAULT' => 'Trạng thái gửi thông báo',
                'SENT' => 'Đã gửi',
                'WAIT' => 'Chờ gửi',
                'DONT_SEND' => 'Chưa gửi'
            ],
            'IS_ACTIVED' => [
                'DEFAULT' => 'Hoạt động',
                'ACTIVE' => 'Đang hoạt động',
                'NON_ACTIVE' => 'Không hoạt động'
            ],
            'TIME' => 'Thời gian gửi',
            'BTN_SEARCH' => 'Tìm kiếm',
            'BTN_REMOVE' => 'Xóa'
        ],
        'table' => [
            'header' => [
                'TITLE' => 'Tiêu đề',
                'NOTIFICATIONS_IS_SENT' => 'Số thông báo gửi',
                'RATE_READ_NOTIFICATION' => 'Tỉ lệ đọc thông báo',
                'SEND_TIME' => 'Thời gian gửi',
                'ACTIVE' => 'Hoạt động',
                'IS_SEND' => 'Trạng thái gửi thông báo',
                'ACTION' => 'Hành động'
            ],
            'BTN_EDIT' => 'Sửa thông báo',
            'BTN_DELETE' => 'Xóa thông báo',
            'BTN_ADD' => 'Tạo thông báo',
            'BTN_DETAIL' => 'Chi tiết thông báo'
        ]
    ],
    'create' => [
        'SEND_NOTIFICATION' => 'Gửi thông báo',
        'CREATE_NOTIFICATION' => 'Tạo thông báo mới',
        'BTN_STORE_RELOAD' => 'Lưu và tạo mới',
        'BTN_STORE_EXIT' => 'Lưu và thoát',
        'BTN_CANCEL' => 'Hủy',
        'form' => [
            'header' => [
                'INFO_RECEIVER' => 'Thông tin người nhận',
                'CONTENT' => 'Nội dung thông báo',
                'ACTION' => 'Tùy chọn hành động',
                'SCHEDULE' => 'Lịch gửi thông báo'
            ],
            'placeholder' => [
                'TITLE' => 'Hãy nhập tiêu đề thông báo...',
                'SHORT_TITLE' => 'Tiêu đề ngắn hiển thị trên trang danh sách thông báo...',
                'ACTION_NAME' => 'Hãy nhập tên hành động...',
                'END_POINT_DETAIL' => '+ Chọn đích đến chi tiết',
                'SPECIFIC_TIME' => 'Chọn thời gian',
                'NON_SPECIFIC_TIME' => 'Nhập thời gian'
            ],
            'RECEIVER' => 'Người nhận',
            'BACKGROUND' => 'Background',
            'TITLE' => 'Tiêu đề thông báo',
            'SHORT_TITLE' => 'Tiêu đề hiển thị ngắn',
            'FEATURE' => 'Thông tin nổi bật của thông báo',
            'CONTENT' => 'Chi tiết thông báo',
            'ACTION_NAME' => 'Tên hành động',
            'CONTENT_GROUP' => 'Nhóm nội dung',
            'END_POINT' => 'Đích đến',
            'END_POINT_DETAIL' => 'Đích đến chi tiết',
            'SCHEDULE' => 'Thời gian gửi thông báo',
            'SEND_ALL_USER' => 'Gửi cho tất cả retailPRO app user',
            'SEND_GROUP' => 'Gửi cho một tập khách hàng tùy chọn',
            'BTN_ADD_SEGMENT' => 'Chọn nhóm khách hàng',
            'SEND_NOW' => 'Gửi ngay lập tức',
            'SEND_SCHEDULE' => 'Gửi thông báo vào thời gian tùy chọn',
            'SPECIFIC_TIME' => 'Giở chính xác',
            'NON_SPECIFIC_TIME' => 'Giờ tương đối',
            'HOUR' => 'Giờ',
            'MINUTE' => 'Phút',
            'DAY' => 'Ngày',
            'ACTION_GROUP' => [
                'ACTION' => 'Hành động',
                'NON_ACTION' => 'Không hành động'
            ]
        ],
        'detail_form' => [
            'brand' => [
                'title' => 'Chọn thương hiệu đích',
                'header' => [
                    'LOGO' => 'Logo',
                    'BRAND_NAME' => 'Tên thương hiệu',
                    'BRAND_CODE' => 'Mã thương hiệu',
                    'COMPANY_NAME' => 'Tên công ty',
                    'LINK' => 'Link',
                    'STATUS' => 'Trạng thái',
                    'IS_PUBLISHED' => 'Hiện thị trên app'
                ],
                'placeholder' => [
                    'BRAND_NAME' => 'Tên thương hiệu',
                    'BRAND_CODE' => 'Mã thương hiệu',
                    'COMPANY_NAME' => 'Tên công ty',
                    'STATUS' => 'Trạng thái',
                    'IS_PUBLISHED' => 'Hiện thị trên app'
                ],
                'BTN_SEARCH' => 'Tìm kiếm',
                'IS_ACTIVATED' => [
                    'YES' => 'Cho phép tương tác',
                    'NO' => 'Không được phép tương tác'
                ],
                'IS_PUBLISHED' => [
                    'YES' => 'Có',
                    'NO' => 'Không'
                ]
            ],
            'faq' => [
                'title' => 'Chọn hỗ trợ',
                'header' => [
                    'TITLE' => 'Nội dung hỗ trợ',
                    'GROUP_TITLE' => 'Nhóm nội dung hỗ trợ',
                    'GROUP_POSITION' => 'Vị trí hiển thị',
                    'STATUS' => 'Trạng thái hiển thị'
                ],
                'placeholder' => [
                    'TITLE' => 'Tiêu đề'
                ],
                'BTN_ADD' => 'Thêm hỗ trợ',
                'BTN_CLOSE' => 'Hủy',
                'FAQ' => 'Hỏi đáp',
                'IS_ACTIVATED' => [
                    'YES' => 'Kích hoạt',
                    'NO' => 'Chưa kích hoạt'
                ],
                'POLICY' => 'Chính sách bảo mật',
                'TERMS' => 'Điều khoản sử dụng',
                'GROUP' => 'Nhóm nội dung hỗ trợ'
            ]
        ],
        'group' => [
            'title' => 'Chọn nhóm khách hàng',
            'header' => [
                'NAME' => 'Tên nhóm user',
                'TYPE' => 'Loại nhóm',
                'TIME' => 'Thời gian tạo'
            ],
            'placeholder' => [
                'NAME' => 'Tên nhóm user',
                'TYPE' => 'Loại nhóm',
                'TIME' => 'Thời gian tạo'
            ],
            'type' => [
                'USER_DEFINE' => 'Nhóm được định nghĩa',
                'AUTO' => 'Nhóm tự động'
            ],
            'BTN_ADD' => 'Thêm nhóm khách hàng',
            'BTN_CLOSE' => 'Hủy'
        ]
    ],
    'edit'=>[
        'EDIT_NOTIFICATION' => 'Chỉnh sửa thông báo'
    ],
    'detail'=>[
        'DETAIL_NOTIFICATION' => 'Chi tiết thông báo',
        'BACK' => 'Quay về danh sách'
    ]
];
