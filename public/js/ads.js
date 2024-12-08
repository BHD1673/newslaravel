document.addEventListener('DOMContentLoaded', function () {
    const style = `
        * { margin: 0; padding: 0; box-sizing: border-box; }
        .banner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);  /* Màu nền tối */
            z-index: 99999999;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }
        .banner-container {
            width: 80%;
            max-width: 800px; /* Chiều rộng tối đa của banner */
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: Arial, sans-serif;
            position: relative;
        }
        .banner-container img {
            width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng */
            height: 300px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .banner-container h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .banner-container p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .btn-close {
            position: absolute;
            top: -35px;
            right: -25px;  /* Di chuyển nút đóng vào trong khu vực hiển thị */
            background-color: #fff;
            border: none;
            padding: 0px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            z-index: 1000;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        .btn-close img {
            width: 20px;
            height: 20px;
        }
    `;

    const html = `
        <div class="banner-overlay">
            <div class="banner-container">
                <!-- Banner hình ảnh -->
                <img src="https://www.droppii.com/wp-content/uploads/2023/04/nhung-luu-y-khi-thiet-ke-banner-Shopee.jpg" alt="Banner quảng cáo của Shopee">
                <!-- Nội dung quảng cáo -->
                <h2>Khuyến mãi đặc biệt!</h2>
                <p>Giảm giá lên đến 50% cho các sản phẩm yêu thích. Mua ngay để nhận ưu đãi!</p>
                <!-- Nút đóng -->
                <button class="btn-close" onclick="closeBanner()">X</button>
            </div>
        </div>
    `;

    const styleElement = document.createElement('style');
    styleElement.textContent = style;
    document.head.appendChild(styleElement);

    const adWrapper = document.createElement('div');
    adWrapper.innerHTML = html;
    document.body.appendChild(adWrapper);

    // Hàm đóng quảng cáo
    window.closeBanner = function () {
        const banner = document.querySelector('.banner-overlay');
        banner.style.opacity = '0';
        setTimeout(function () {
            banner.style.display = 'none';
        }, 500); // Thời gian chuyển động ẩn đi banner
    };
});
