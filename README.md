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


### 1. Thiết kế cơ sở dữ liệu:
   - **Bảng `product_types`**:
     - Chứa thông tin về các loại sản phẩm như Editorial, Photorial, Video, Topic, và Infographic.
     - **Cấu trúc**:
       | Column Name       | Data Type | Description                                     |
       |-------------------|-----------|-------------------------------------------------|
       | `id`              | INT       | Khóa chính, tự tăng.                            |
       | `name`            | VARCHAR   | Tên của loại sản phẩm (ví dụ: Editorial).        |
       | `base_price`      | DECIMAL   | Giá cơ bản cho mỗi loại sản phẩm.                |
       | `price_per_word`  | DECIMAL   | Giá tính theo số lượng từ (nếu áp dụng).        |
       | `price_per_unit`  | DECIMAL   | Giá tính theo đơn vị (ví dụ: mỗi video).        |
       | `description`     | TEXT      | Mô tả chi tiết về loại sản phẩm.                 |

   - **Bảng `orders`**:
     - Lưu thông tin đơn hàng của khách hàng, bao gồm tổng giá trị đơn hàng và trạng thái xử lý.
     - **Cấu trúc**:
       | Column Name       | Data Type | Description                                     |
       |-------------------|-----------|-------------------------------------------------|
       | `id`              | INT       | Khóa chính, tự tăng.                            |
       | `customer_id`     | INT       | ID của khách hàng (liên kết với bảng `customers`). |
       | `total_price`     | DECIMAL   | Tổng giá trị đơn hàng.                          |
       | `status`          | ENUM      | Trạng thái đơn hàng (`pending`, `confirmed`, `completed`). |
       | `created_at`      | TIMESTAMP | Thời điểm tạo đơn hàng.                         |
       | `updated_at`      | TIMESTAMP | Thời điểm cập nhật đơn hàng.                    |

   - **Bảng `order_items`**:
     - Lưu chi tiết các sản phẩm trong từng đơn hàng, bao gồm loại sản phẩm, số lượng, và giá cho mỗi mục.
     - **Cấu trúc**:
       | Column Name       | Data Type | Description                                     |
       |-------------------|-----------|-------------------------------------------------|
       | `id`              | INT       | Khóa chính, tự tăng.                            |
       | `order_id`        | INT       | ID của đơn hàng (liên kết với bảng `orders`).   |
       | `product_type_id` | INT       | ID của loại sản phẩm (liên kết với bảng `product_types`). |
       | `quantity`        | INT       | Số lượng sản phẩm trong đơn hàng.               |
       | `length`          | INT       | Độ dài của bài viết (nếu có, ví dụ: số từ).     |
       | `price`           | DECIMAL   | Giá của sản phẩm trong đơn hàng.                |
       | `created_at`      | TIMESTAMP | Thời điểm tạo mục sản phẩm trong đơn hàng.      |
       | `updated_at`      | TIMESTAMP | Thời điểm cập nhật mục sản phẩm trong đơn hàng. |

   - **Bảng `carts` (giỏ hàng)**:
     - Lưu tạm thời các sản phẩm mà khách hàng đã chọn trước khi đặt đơn hàng chính thức.
     - **Cấu trúc**:
       | Column Name       | Data Type | Description                                     |
       |-------------------|-----------|-------------------------------------------------|
       | `id`              | INT       | Khóa chính, tự tăng.                            |
       | `customer_id`     | INT       | ID của khách hàng.                              |
       | `product_type_id` | INT       | ID của loại sản phẩm (liên kết với bảng `product_types`). |
       | `quantity`        | INT       | Số lượng sản phẩm trong giỏ hàng.               |
       | `length`          | INT       | Độ dài bài viết (nếu có).                       |
       | `price`           | DECIMAL   | Giá của sản phẩm tạm tính.                      |
       | `created_at`      | TIMESTAMP | Thời điểm thêm sản phẩm vào giỏ hàng.           |
       | `updated_at`      | TIMESTAMP | Thời điểm cập nhật giỏ hàng.                    |

   - **Liên kết giữa các bảng**:
     - `orders` có quan hệ `1-n` với `order_items`, nghĩa là một đơn hàng có thể chứa nhiều mục sản phẩm.
     - `product_types` có quan hệ `1-n` với `order_items` và `carts`, nghĩa là một loại sản phẩm có thể xuất hiện trong nhiều đơn hàng hoặc giỏ hàng.
     - `carts` lưu trữ các mục sản phẩm trước khi tạo đơn hàng, giúp khách hàng điều chỉnh các yêu cầu trước khi xác nhận đặt hàng.

### 2. Quy trình xử lý báo giá và đặt hàng:
   - **Bước 1: Khách hàng thêm sản phẩm vào giỏ hàng**:
     - Khi khách hàng chọn một loại sản phẩm (ví dụ: Editorial) và nhập số lượng cũng như độ dài (nếu cần), hệ thống sẽ lưu các mục này vào bảng `carts`.
     - Hệ thống sử dụng bảng `product_types` để tra cứu `base_price` và `price_per_word` nhằm tính giá tạm tính cho từng sản phẩm.
     - Giá tạm tính sẽ được lưu vào cột `price` trong bảng `carts`.

   - **Bước 2: Tính toán tổng giá trị giỏ hàng**:
     - Khi khách hàng xem giỏ hàng, hệ thống tính tổng giá trị bằng cách cộng các giá trị `price` của từng mục trong bảng `carts`.
     - Hiển thị tổng giá trị giỏ hàng trên giao diện người dùng.

   - **Bước 3: Khách hàng tạo đơn hàng từ giỏ hàng**:
     - Khi khách hàng xác nhận đặt hàng, hệ thống chuyển các mục từ `carts` sang `order_items` và tạo một bản ghi mới trong bảng `orders`.
     - Tổng giá trị giỏ hàng sẽ được lưu vào `total_price` trong bảng `orders`.
     - Xóa các mục đã chuyển khỏi bảng `carts` sau khi đơn hàng được tạo thành công.

   - **Bước 4: Quản trị viên xử lý đơn hàng**:
     - Khi nhận được thông báo về đơn hàng mới, quản trị viên có thể xem các chi tiết đơn hàng trong bảng `order_items`.
     - Dựa trên thông tin đơn hàng, quản trị viên liên hệ với khách hàng để xác nhận và tiến hành các bước tiếp theo (như chỉnh sửa nội dung, báo giá cuối cùng).
