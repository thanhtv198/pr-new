<?php

return [
    //button
    'button' => [
        'edit' => 'Sửa',
        'delete' => 'Xóa',
        'add' => 'Thêm mới',
        'login' => 'Đăng nhập',
        'logout' => 'Đăng xuất',
        'search' => 'Tìm kiếm',
        'ship' => 'Giao hàng',
        'save' => 'Lưa',
        'sign_up' => 'Đăng kí',
        'add_cart' => 'Thêm vào giỏ hàng',
        'update' => 'Cập nhật',
        'order' => 'Đặt hàng ngay',
        'delete_selected' => 'Xóa lựa chọn',
        'remove' => 'Xóa',
        'send' => 'Giử',
    ],
    //validate
    'validate' => [
        'name' => 'Tên không thể trống',
        'email' => 'Email không thể trống',
        'valid_email' => 'Email không hợp lệ',
        'address' => 'Địa chỉ không thể trống',
        'phone_number' => 'Số điện thoại không thể trống',
        'birthday' => 'Ngày sinh không thể trống',
        'password' => 'Mật khẩu phải hợp lệ',
        'repassword' => 'Mật khẩu không trùng khớp',
        'valid_password' => 'Mật khẩu phải ít nhất 6 kí tự',
        'news_title' => 'Tiêu đề không thể trống',
        'news_content' => 'Nội dung không thể trống',
        'news_image' => 'Ảnh không được trống',
        'news_size' => 'Kích thước tối đa 4096 byte.',
        'news_ext' => 'Đuôi ảnh không hợp lệ',
        'content' => 'Nội dung không thể trống',
        'local_id' => 'Thành phố không được trống',
    ],
    //login
    'login' => [
        'success' => 'Đăng nhập thành công!',
        'failed' => 'Đăng nhập thất bại',
        'sign_up_success' => 'Đăng kí thành công, đăng nhập tài khoản!'
    ],
    //return with
    'with' => [
        'add_success' => 'Thêm mới thành công!',
        'add_wishlist_success' => 'Đã thêm vào danh sách yêu thích!',
        'wishlist_already_exits' => 'Sản phẩm đã tồn tại trong danh sách yêu thích!',
        'wishlist_empty' => 'Danh sách yêu thích không có sản phẩm nào!',
        'edit_success' => 'Sửa thành công!',
        'add_message' => 'Thêm mới thất bại',
        'edit_message' => 'Sửa thất bại',
        'delete_success' => 'Xóa thành công!',
        'cancel_success' => 'Hủy thành công!',
        'delete_message' => 'Xóa không thành công',
        'permission' => 'Bạn không có quyền thực hiện tác vụ này!',
        'order_success' => 'Đặt hàng thành công!',
        'order_empty' => 'Giỏ hàng trống',
        'add_cart_success' => 'Thêm vào giỏ hàng thành công',
        'more_compare' => 'So sánh phải có hai sản phẩm',
        'exists_compare' => 'Sản phẩm đã tồn tại trong danh sách so sánh',
        '3_product' => 'Không thể so sánh quá hai sản phẩm',
        'type_price' => 'Nhập giá để tìm kiếm',
        'no_product_bought' => 'Bạn chưa mua sản phẩm nào',
        'no_product_sold' => 'Bạn chưa bán sản phẩm nào',
        'handle_success' => 'Xử lí thành công',
        'no_order' => 'Bạn không có đơn hàng nào',
        'send_success' => 'Gửi tin nhắn thành công!',
        'login' => 'Bạn phải đăng nhập để thực hiện tác vụ này',
        'delete_error' => 'Bạn không thể xóa chính mình',
        'delete_ept' => 'Bạn phải chọn người dùng muốn xóa',
    ],
    //tags
    'tag' => [
        //admin
        'success' => 'Đăng nhập thành công!',
        'failed' => 'Đăng nhập thất bại',
        'welcome_login' => 'Chào mừng trở lại! Vui lòng đăng nhập',
        'sign_in' => 'Đăng nhập',
        'aside_admin_online' => 'Online',
        'aside_admin_dashboard' => 'Bảng điều khiển',
        'content_admin_dashboard' => 'Bảng điều khiển',
        'aside_admin_product' => 'Quản lí sản phẩm',
        'aside_admin_product_category' => 'Danh mục',
        'aside_admin_product_manufacture' => 'Nhà sản xuất',
        'aside_admin_product_list_product' => 'Danh sách sản phẩm',
        'aside_admin_account' => 'Tài khoản',
        'aside_admin_account_manager' => 'Quản lí',
        'aside_admin_account_member' => 'Thành viên',
        'aside_admin_content' => 'Nội dung',
        'aside_admin_content_news' => 'Tin tức',
        'aside_admin_interaction' => 'Tương tác',
        'aside_admin_interaction_respond' => 'Phản hồi',
        'aside_admin_interaction_comment' => 'Bình luận sản phẩm',
        'footer_admin_content' => 'Bất kì gì bạn muốn',
        'header_admin_site_page' => 'Trang khách hàng',
        'header_admin_home_page' => 'Trang chủ',
        'header_admin_user' => 'Lập trình viên',
        'header_admin_sign_out' => 'Đăng xuất',
        'search' => 'Tìm kiếm',
        'title_site' => 'Comtor',
        'view_news' => 'Lượt xem',
        'cart_title' => 'Giỏ hàng của bạn',
        'shop' => 'Shop',
        'compare_product' => 'So sánh sản phẩm',
        '404' => 'Lỗi 404 - Không tìm thấy trang!',
        'aside_admin_content_slide' => 'Slides',
    ],
    //form
    'form' => [
        'name' => 'Họ và tên',
        'email' => 'Email',
        'address' => 'Địa chỉ',
        'birthday' => 'Ngày sinh',
        'phone_number' => 'Số điện thoại',
        'password' => 'Mật khẩu',
        'role' => 'Quyền',
        'repassword' => 'Nhập lại mật khẩu',
        'action' => 'Hành động',
        'stt' => 'Mã',
        'status' => 'Trạng thái',
        'chose' => 'Check',
        'note' => 'Ghi chú',
        'qty_product' => 'Số lượng sản phẩm',
        'qyt_member' => 'Số lượng thành viên',
        'qty_news' => 'Số lượng tin tức',
        'qty_respond' => 'Số lượng phản hồi',
        'total_product' => 'Tổng sản phẩm',
        'total_sold' => 'Tổng sản phẩm bán',
        'total_buy' => 'Tổng sản phẩm mua',
        'total_respond' => 'Tổng phản hồi',
        'date_order' => 'Ngày đặt hàng',
        'city' => 'Thành phố',
        'slide' => 'Số lượng slide',
        'parent_category' => 'Danh mục cha',


    ],
    //title_form
    'title_form' => [
        'account_manager_title' => 'Manager information',
        'account_manager_head' => 'Manager management',
        'account_member_title' => 'Member information',
        'account_member_head' => 'Member management',
        'category_head' => 'Category management',
        'category_title' => 'Category infomation',
        'product_head' => 'Product management',
        'product_title' => 'Product infomation',
        'manufacture_head' => 'Manufacture management',
        'manufacture_title' => 'Manufacture infomation',
        'respond_head' => 'Respond management',
        'respond_title' => 'List respond',
        'news_head' => 'News management',
        'news_title' => 'List news',
        'common_qty' => 'Common Quantity',
        'check_product' => 'Check Product',
        'slide_title' => 'list slide',
        'slide_head' => 'Slide management',
        'wishlist' => 'Products In Your Wishlist',
    ],
    //product
    'product' => [
        'name' => 'Name',
        'price' => 'Price',
        'manufacture' => 'Manufacture',
        'description' => 'Description',
        'promotion' => 'Promotion',
        'category' => 'Category',
        'image' => 'Image',
        'status' => 'Status',
        'action' => 'Action',
        'code' => 'Code',
        'accept_now' => 'Accept now',
        'accepted' => 'Accepted',
        'parent_category' => 'Parent Category',
        'qty' => 'Quantity',
        'qty_image' => 'Image Qty',
        'os' => 'Operation System',
        'screen' => 'Screen',
        'back_camera' => 'Back Camera (Px)',
        'front_camera' => 'Front Camera (Px)',
        'sim' => 'Sim',
        'battery' => 'Battery (Mah)',
        'cpu' => 'CPU',
        'ram' => 'RAM (GB)',
        'memory' => 'Memory (GB)',
        'config' => 'Product Configuration',
        'info' => 'Product Information',
        'created_at' => 'Created at',
        'order_id' => 'Order Code',
        'price_one' => 'Price / 1 product',
        'total' => 'Total',
        'product' => 'Product',
        'seller_info' => 'Seller Infomation',
        'address_sell' => 'Address sell product ',
        'add_wishlist' => 'Add To Wishlist',
        'add_compare' => 'Add To Compare',
    ],
    //news
    'news' => [
        'title' => 'Title',
        'content' => 'Content',
        'image' => 'Image',
    ],
    //respond
    'respond' => [
        'check_now' => 'Check',
        'pendding' => 'Pendding',
        'checked' => 'Checked',
        'handle_now' => 'Handle now',
        'handled' => 'Handled',
        'uncheck' => 'UnCheck',
        'rejected' => 'Rejected',
        'reject_now' => 'Reject now',
        'send_respond' => 'Send Your Respond',
        'respond' => 'If you have any problem or you want to contribute to us, please put your respond for us',
    ],
    //site footer
    'footer' => [
        'deliver' => 'Shipping to overseas',
        'deliver1' => 'We support shipment abroad with shipment cost suitable for all types of objects',
        'support' => 'Advisory and support',
        'support1' => '24/7 support. Help you solve questions',
        'discount' => 'Promotion Gifts',
        'discount1' => 'We usually organize promotions during the holidays',
        'guarantee' => 'Guarantee',
        'guarantee1' => 'We promise to deliver to you within 48 hours of confirming your order',
        'coppyright' => '© 2017 Grocery Shoppy. All rights reserved',
    ],
    //home page
    'home_page' => [
        'head' => 'Sản phẩm đề xuất cho bạn',
        'title11' => 'Sản phẩm mới',
        'title12' => 'Tốt nhất cho bạn',
        'title13' => 'Sản phẩm nổi bật',
        'title14' => 'Khuyến mại tuyệt vời',
        'title21' => 'Sản phẩm mới',
        'title22' => 'Sản phẩm xem nhiều nhất',
        'search_result' => 'Không tìm thấy sản phẩm',
        'result_quantity' => 'Số sản phẩm phù hợp với kết quả tìm kiếm',
        'news_detail' => 'Chi tiết tin tức',
        'view_product' => 'Xem chi tiết',
        'add_cart_success' => 'Thêm vào giỏ hàng thành công!',
    ],
    //header
    'header' => [
        'phone' => '190041593',
        'sign_in' => 'Đăng nhập',
        'sign_up' => 'Đăng kí',
        'cart' => 'Giỏ hàng',
        'compare' => 'So sánh',
        'category' => 'Danh mục',
        'manufacture' => 'Nhà sản xuất',
        'introduce' => 'Giới thiệu',
        'profile' => 'Trang cá nhân',
        'sell_product' => 'Đăng bài bán sản phẩm',
        'logout' => 'Đăng xuất',
        'notify' => 'Thông báo',
        'wishlist' => 'Yêu thích',
        'transaction' => 'Giao dịch',
        'my_account' => 'Tài khoản',
        'home' => 'Trang chủ',
    ],
    //aside_content
    'aside' => [
        'search_here' => 'Tìm kiếm..',
        'search_price' => 'Giá (.000.000 đ)',
        'search_local' => 'Tìm theo thành phố',
        'from' => 'Từ',
        'to' => 'Đến',
        'news' => 'Tin tức mới'
    ],
    //site
    'site' => [
        'sign_up' => 'Đăng kí tài khoản mới',
    ],
    //product_detail
    'product_detail' => [
        'head' => 'Chi tiết sản phẩm',
        'views' => 'Lượt xem: ',
        'manufacture' => 'Nhà sản xuất: ',
        'category' => 'Danh mục: ',
        'date_manufacture' => 'Ngày sản xuất: ',
        'description' => 'Mô tả ',
        'info' => 'Thông tin ',
        'detail' => 'Chi tiết ',
        'detail_head' => 'Cấu hình chi tiết',
        'comment1' => 'Lượt bình luận',
        'comment' => 'Bình luận',
        'login_to_comment' => 'Bạn phải đăng nhập để bình luận',
        'login_to_rate' => 'Bạn phải đăng nhập để đánh giá',
        'replies' => 'Trả lời',
        'seller' => 'Người bán',
    ],
    //info
    'info' => [
        'head' => 'View your profile',
        'buy_history' => 'View your history bought',
        'order' => 'View your order',
        'info_config' => 'Edit your profile',
    ],

    //timeline
    'time_line' => [
        'title' => 'Your Timeline',
    ],


    //sell
    'sell' => [
        'your_product' => 'Your pruduct',
        'your_sold' => 'Your pruduct posted',
        'price_promotion' => 'Price - Discount',
        'date_create' => 'Date of post',
        'correct_photo' => 'The product has correct photo',
        'resonable_price' => 'The product is reasonably priced',
        'resonable_name' => 'The product is reasonably named',
    ],
     //cart
    'cart' => [
        'product_in_cart' => 'Products in your cart',
        'cart' => 'Your Cart',
    ],
    //checkout
    'checkout' => [
        'confirm' => 'Confirm your order',
        'total' => 'Total price of your order: ',
        'deliver' => 'Deliver to this address ',
        'checkout' => 'Checkout',
        'cart_empty' => 'Cart is empty',
    ],
    //sold
    'sold' => [
        'order_sold' => 'Sold orders',
        'your_product_sold' => 'Your sold products',
        'export' => 'Export file',
    ],
    //bought
    'bought' => [
        'order_bought' => 'Bought orders',
        'your_product_bought' => 'Your bought products',
    ],
];
