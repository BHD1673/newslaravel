# News

News là một trang web đọc báo tích hợp nhiều nội dung đặc biệt bao gồm đăng ký mua báo giấy online, đăng ký quyền đọc báo online độc quyền...

## Về nội dung chính
1. Chức năng đăng ký, đăng nhập
    - Quyền lợi: Có thể xem lịch sử đọc, lựa chọn bài viết yêu thích, có thể comment bài viết. Có thể xem lịch sử giao dịch
2. Chức năng đăng ký (Subscription)
    - Cho phép người dùng đăng ký đọc báo không quảng cáo, được phép truy cập vào các nội dung độc quyền trước những người dùng khác
3. Chức năng đặt viết bài theo yêu cầu
    - Cho phép khách hàng đặc biệt được quyền hạn để đặt bài viết theo yêu cầu đặc biệt. Khách hàng sau khi đăng nhập có thể tìm dến, đặt bài viết theo số lượng. Có thể cho só lượng lớn ví dụ 5 bài một lượt là một mốc giá
    - Khách hàng có thể cho vào như một giỏ hàng để viết theo từng danh mục đặc biệt
    - Sẽ cho thành 5 loại sản phẩm chính, bao gồm: Editorial, Photorial, Video, Topic, Inforgraphic
    - Sẽ có demo cho từng loại sản phẩm
## Quy trình đặt hàng
1. Trình bày danh mục sản phẩm:
Hiển thị 5 loại sản phẩm chính dưới dạng danh mục:
    - Editorial (Bài viết chỉnh sửa)
    - Photorial (Ảnh tư liệu)
    - Video
    - Topic (Chủ đề đặc thù)
    - Infographic
##### => Cung cấp bản demo cho mỗi loại sản phẩm để khách hàng dễ dàng hình dung.
2. Chi tiết yêu cầu:
* Khách hàng lựa chọn sản phẩm, sau đó điền các chi tiết đặc biệt như:
    - Độ dài bài viết
    - Số lượng bài viết
    - Chủ đề cụ thể
    => Các yêu cầu này sẽ giúp quản trị nắm bắt rõ hơn về mong muốn của khách hàng.
3. Thêm vào giỏ hàng:
    - Khách hàng có thể thêm yêu cầu vào giỏ hàng, tương tự như một giỏ hàng mua sắm.
    - Mỗi giỏ hàng có thể bao gồm các sản phẩm thuộc các loại khác nhau.
4. Tạo đơn hàng:
    - Sau khi xác nhận yêu cầu, hệ thống sẽ tạo một đơn hàng và gửi thông tin chi tiết đến quản trị.
    **Chưa có bước thanh toán trực tiếp trong hệ thống ở giai đoạn này.*
5. Liên hệ và báo giá:
    - Quản trị viên sẽ liên lạc lại với khách hàng để xác nhận chi tiết yêu cầu.
    - Sau khi thống nhất, quản trị viên sẽ cung cấp hóa đơn cuối cùng cho khách hàng.
6. Thanh toán:
    - Sau khi nhận được hóa đơn, khách hàng có thể tiến hành thanh toán. Quy trình này có thể được tích hợp với các hệ thống thanh toán hoặc xử lý thủ công.


#### Phương thức liên hệ:

1. Xây dựng hệ thống báo giá
- Thiết kế cơ sở dữ liệu:
    + Bảng product_type chứa thông tin về các loại sản phẩm
    + Bảng order lưu thông tin đơn hàng của khách hàng 
    + Bảng order_items lưu chi tiết các sản phẩm trong từng đơn hàng 
    + *Có thể thêm bảng giỏ hàng (carts) như bình thường*