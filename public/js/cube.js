const customStyle = "\
    .cube-custom-container { position: fixed; top: 40%; right: 0; transform: translateY(-50%); }\
    .cube-custom-close-btn { position: absolute; top: 0px; right: 0px; font-size: 35px; color: #b5b5b5; cursor: pointer; background: none; border: none; border-radius: 50%; }\
    .cube-custom-ad-slideshow { position: relative; top: 60px; right: 15px; width: 150px; height: 200px; transform-style: preserve-3d; animation: 20s linear infinite rotate; }\
    .cube-custom-ad-container { position: absolute; width: 150px; height: 150px; display: flex; flex-direction: column; align-items: center; background-color: #fff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); backface-visibility: hidden; }\
    .cube-custom-ad-link { display: flex; flex-direction: column; align-items: center; width: 100%; height: 100%; text-decoration: none; color: inherit; }\
    .cube-custom-ad-image { width: 100%; height: 100px; object-fit: cover; }\
    .cube-custom-ad-content { text-align: left; flex: 1; padding: 5px 10px; overflow: hidden; }\
    .cube-custom-ad-title { font-size: 14px; font-weight: 700; color: #333; margin: 0; line-height: 1; font-family: Arial, Helvetica, sans-serif; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; }\
    .cube-custom-ad-title:hover { color: rgb(52, 63, 207); }\
    .cube-custom-ad-sponsor { font-size: 10px; color: #777; margin-top: 5px; }\
    @keyframes rotate {\
        0%, 20% { transform: rotateY(0deg); }\
        25%, 45% { transform: rotateY(-90deg); }\
        50%, 70% { transform: rotateY(-180deg); }\
        75%, 95% { transform: rotateY(-270deg); }\
        100% { transform: rotateY(-360deg); }\
    }\
    .cube-custom-face1 { transform: rotateY(0) translateZ(75px); }\
    .cube-custom-face2 { transform: rotateY(-90deg) translateZ(75px); }\
    .cube-custom-face3 { transform: rotateY(-180deg) translateZ(75px); }\
    .cube-custom-face4 { transform: rotateY(-270deg) translateZ(75px); }";
    const customStyleElement = document.createElement("style");
    customStyleElement.textContent = customStyle;
    document.head.appendChild(customStyleElement);
    
    const adData = [
        {
            image: "https://picsum.photos/200/300",
            title: "Explore the World with Our New Adventure Tours \
            Explore the World with Our New Adventure ToursExplore\
            the World with Our New Adventure Tours",
            link: "https://picsum.photos/"
        },
        {
            image: "https://picsum.photos/id/237/200/300",
            title: "Delicious Recipes ",
            link: "https://picsum.photos/"
        },
        {
            image: "https://picsum.photos/seed/picsum/200/300",
            title: "Upgrade Your  ",
            link: "https://picsum.photos/"
        },
        {
            image: "https://picsum.photos/200/300?grayscale",
            title: "Discover Nature: The Best Places for Hiking and Camping",
            link: "https://picsum.photos/"
        }
    ];
    
    let adContentHTML =
    "<div class='cube-custom-container'>" +
    "<button class='cube-custom-close-btn' onclick='closeAdPopup()'>&times;</button>" +
    "<div class='cube-custom-ad-slideshow'>" +
    adData.map((ad, index) => {
        return "<div class='cube-custom-ad-container cube-custom-face" + (index + 1) + "'>" +
            "<a href='" + ad.link + "' class='cube-custom-ad-link' target='_blank'>" +
            "<img src='" + ad.image + "' alt='Ad Image' class='cube-custom-ad-image'>" +
            "<div class='cube-custom-ad-content'>" +
            "<p class='cube-custom-ad-title'>" + ad.title + "</p>" +
            "</div>" +
            "</a>" +
            "</div>";
    }).join("") +
    "</div>" +
    "</div>";

    
    const adContainer = document.createElement("div");
    adContainer.innerHTML = adContentHTML;
    document.body.appendChild(adContainer);
    
    const closeAdPopup = function () {
        adContainer.style.display = 'none';
    };