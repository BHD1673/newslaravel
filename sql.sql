CREATE TABLE ads (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NOT NULL,   -- Liên kết với bảng users
  title VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,  -- Tiêu đề quảng cáo
  img VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,    -- Đường dẫn hình ảnh quảng cáo
  link VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,   -- Đường link quảng cáo
  email VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,  -- Email liên hệ
  phone VARCHAR(50) COLLATE utf8mb4_unicode_ci NOT NULL,   -- Số điện thoại liên hệ
  start_time DATETIME NOT NULL,  -- Thời gian bắt đầu
  end_time DATETIME NOT NULL,    -- Thời gian kết thúc
  position ENUM('top', 'center', 'bottom', 'detail') NOT NULL,  -- Vị trí quảng cáo
  status ENUM('pending', 'approved', 'active', 'cancelled', 'completed') DEFAULT 'pending',  -- Trạng thái quảng cáo
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE ads_payment (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ad_id BIGINT UNSIGNED NOT NULL,  -- Liên kết với bảng ads
  amount DECIMAL(10, 2) NOT NULL,   -- Tổng số tiền thanh toán
  deposit DECIMAL(10, 2) NOT NULL,  -- Tiền cọc (20% tiền gốc)
  paid_amount DECIMAL(10, 2) NOT NULL,  -- Tiền đã thanh toán (80% tiền gốc)
  payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',  -- Trạng thái thanh toán
  payment_method ENUM('VNPay', 'bank_transfer', 'other') NOT NULL,  -- Phương thức thanh toán
  paid_at TIMESTAMP NULL,  -- Thời gian thanh toán
  FOREIGN KEY (ad_id) REFERENCES ads(id)
);

CREATE TABLE ads_history (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ad_id BIGINT UNSIGNED NOT NULL,   -- Liên kết với bảng ads
  status ENUM('pending', 'approved', 'active', 'cancelled', 'completed') DEFAULT 'pending',  -- Trạng thái quảng cáo
  action_taken ENUM('created', 'approved', 'paid', 'cancelled', 'completed', 'refund') NOT NULL,  -- Hành động thực hiện
  action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Thời gian hành động
  refund_amount DECIMAL(10, 2) DEFAULT NULL,  -- Số tiền hoàn trả (nếu có)
  FOREIGN KEY (ad_id) REFERENCES ads(id)
);
CREATE TABLE ads_position (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  position ENUM('top', 'center', 'bottom', 'detail') NOT NULL,  -- Các vị trí quảng cáo
  price DECIMAL(10, 2) NOT NULL,  -- Giá của mỗi vị trí (giá theo giờ)
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Quy trình nghiệp vụ
Trang đăng ký quảng cáo (User Registration for Ads)

Người dùng chọn thời gian bắt đầu và kết thúc, cũng như vị trí banner (top, center, bottom, detail).(giá top là 50k 1 tiếng , center 40k, bottom 30k 1 tiếng , detail 60k/tieng,người dùng đăng ký thời gian bao nhiêu tự tính số tiền cần trả);

Kiểm tra tính hợp lệ của thời gian và đảm bảo không có quảng cáo nào đã đặt trùng thời gian trong cùng 1 vị trí.
Nếu có trùng thời gian và vị trí, thông báo cho người dùng thay đổi thời gian và vị trí quảng cáo.
Nếu tất cả thông tin check thành công sẽ chuyển sang trang tiếp theo
Trong trang tiếp theo,  điền thông tin quảng cáo (title, img, link, email, phone).
Tiếp đến sẽ đưa đến trang History Registration Ads (quản lý chờ xét duyệt quảng cáo);
Nếu ads được duyệt, sẽ chuyển sang trang thanh toán.(gửi mail cho khách hàng nếu được duyệt, nếu trong 12 tiếng ko nhan mail thi hệ thống chuyển trạng thái quảng cáo sang 'cancelled')
sau khi nguoi dung nhan duoc mail va nhan xac nhan dua ra trang thanh toan
Tiep Theo se cho nguoi dung ra trang Thanh toán

Hệ thống hiển thị thông tin thanh toán bao gồm thời gian, giá tiền(giá tiền sẽ là 20% giá trị tiền cọc và 80% giá trị tiền gốc) và vị trí banner đã chọn.
Người dùng thanh toán qua VNPay hoặc các phương thức thanh toán khác.
Nếu thanh toán thành công, hệ thống lưu thông tin thanh toán vào bảng ads_payment và chuyển trạng thái quảng cáo sang 'active'.
Lịch sử quảng cáo (Ads History)

Sau khi thanh toán thành công, trạng thái quảng cáo sẽ được hiển thị trong lịch sử quảng cáo của người dùng, và trạng thái quảng cáo sẽ là 'active', trong khoảng thời gian đang chạy sẽ là pending , hết thời gian là completed
Người dùng có thể hủy quảng cáo. Nếu hủy, hệ thống cập nhật trạng thái quảng cáo thành 'cancelled' và yêu cầu thông tin hoàn tiền (số tài khoản ngân hàng)
 + Sẽ là trả tiền cho người dùng 80% số tiền thanh toán
 + Sẽ đưa ra 1 bảng thông tin bao gồm tổng tiền đã thanh toán, tiền cọc 20% tiền gốc; số tiền sẽ được hoàn trả 
Nếu hoàn tiền thành công, gửi email thông báo và cập nhật trạng thái hoàn tiền trong bảng ads_history.
Trang quản lý quảng cáo của Admin

Admin có thể xem tất cả các quảng cáo của người dùng, với các trạng thái pending, active, cancelled, completed.
Admin có thể duyệt hoặc từ chối quảng cáo.
Admin sau khi nhận được thanh toán tiền từ khách hàng sẽ được đưa lên, và bên admin lấy dữ liệu từ db xuống và sẽ xử lý quảng cáo sao cho quảng cáo chạy đúng thời gian
Admin có thể xử lý yêu cầu hoàn tiền và cập nhật trạng thái trong bảng ads_history.
Các bước thực hiện thêm:
Kiểm tra trùng lặp thời gian: Trước khi người dùng đặt quảng cáo, cần phải kiểm tra xem có quảng cáo nào khác đã đặt trong cùng một khung giờ hay không.

Thanh toán online: Sau khi người dùng điền đầy đủ thông tin và chọn phương thức thanh toán, hệ thống sẽ sử dụng API VNPay để xử lý thanh toán và cập nhật trạng thái thanh toán trong bảng ads_payment.

Hoàn tiền: Khi người dùng yêu cầu hủy quảng cáo và đã xác nhận hoàn tiền, hệ thống cần xử lý giao dịch hoàn tiền qua tài khoản ngân hàng và gửi email xác nhận.

Hy vọng với cấu trúc cơ sở dữ liệu này, bạn có thể quản lý được quy trình quảng cáo cho cả người dùng và admin.