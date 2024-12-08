document.addEventListener('DOMContentLoaded', function () {
    const style = `
        * { margin: 0; padding: 0; box-sizing: border-box; }
        .cube-custom-wrapper {
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            z-index: 99999999 !important;
            perspective: 1000px;
        }
        .cube-custom-container {
            width: 100px;
            height: 100px;
            position: relative;
            transform-style: preserve-3d;
            transform: rotateX(0deg) rotateY(0deg);
            animation: rotateCube 15s infinite linear;
        }
        .cube-custom-face {
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-size: cover;
            background-position: center;
        }
        .front  { transform: translateZ(50px); }
        .back   { transform: translateZ(-50px) rotateY(180deg); }
        .left   { transform: rotateY(-90deg) translateX(-50px); transform-origin: center left; }
        .right  { transform: rotateY(90deg) translateX(50px); transform-origin: center right; }
        .top    { transform: rotateX(90deg) translateY(-50px); transform-origin: top center; }
        .bottom { transform: rotateX(-90deg) translateY(50px); transform-origin: bottom center; }
        @keyframes rotateCube {
            0% { transform: rotateX(0deg) rotateY(0deg); }
            25% { transform: rotateX(0deg) rotateY(90deg); }
            50% { transform: rotateX(90deg) rotateY(90deg); }
            75% { transform: rotateX(90deg) rotateY(180deg); }
            100% { transform: rotateX(0deg) rotateY(360deg); }
        }
        .btn-close {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #fff;
            border: none;
            padding: 5px;
            border-radius: 50%;
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
        <div class="cube-custom-wrapper">
            <div class="cube-custom-container">
                <div class="cube-custom-face front" style="background-image: url('https://picsum.photos/200/300');"></div>
                <div class="cube-custom-face back" style="background-image: url('https://picsum.photos/200/300');"></div>
                <div class="cube-custom-face left" style="background-image: url('https://picsum.photos/200/300');"></div>
                <div class="cube-custom-face right" style="background-image: url('https://picsum.photos/200/300');"></div>
                <div class="cube-custom-face top" style="background-image: url('https://picsum.photos/200/300');"></div>
                <div class="cube-custom-face bottom" style="background-image: url('https://picsum.photos/200/300');"></div>
            </div>
            <button class="btn-close" onclick="closeAd()" style="top: -40px;">
              
                X
            </button>
        </div>
    `;

    const styleElement = document.createElement('style');
    styleElement.textContent = style;
    document.head.appendChild(styleElement);

    const adWrapper = document.createElement('div');
    adWrapper.innerHTML = html;
    document.body.appendChild(adWrapper);

    // Hàm đóng quảng cáo
    window.closeAd = function () {
        adWrapper.style.display = 'none';
    };
});
