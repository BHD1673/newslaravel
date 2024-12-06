const style = `
body { display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100vh; background-color: #f4f4f4; margin: 0; perspective: 1000px; }
.container { position: relative; }
.close-btn { position: absolute; top: 10px; right: 15px; font-size: 20px; color: black; cursor: pointer; background: none; border: none; border-radius: 50%;}
.close-btn:hover { color: #333; background-color: none; }
.ad-slideshow { position: relative; top: 60px; right: 30px; width: 150px; height: 150px; transform-style: preserve-3d; animation: 18s linear infinite rotate; }
.ad-container { position: absolute; width: 150px; height: 150px; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: #fff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); backface-visibility: hidden; }
.ad-link { display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; height: 100%; text-decoration: none; color: inherit; }
.ad-image { width: 100%; height: 70%; object-fit: cover; }
.ad-content { text-align: left; flex: 1; padding: 10px; }
.ad-title { font-size: 12px; font-weight: 700; color: #333; margin: 0; line-height: 1.2;    font-style: normal;    font-family: Arial, Helvetica, sans-serif;    display: -webkit-box; }
.ad-title:hover { color:  rgb(52, 63, 207); }
.ad-sponsor { font-size: 10px; color: #777; margin-top: 5px; }
@keyframes rotate { 0%, 16.66% { transform: rotateY(0); } 33.33%, 50% { transform: rotateY(-90deg); } 66.66%, 83.33% { transform: rotateY(-180deg); } 100% { transform: rotateY(-270deg); } }
.face1 { transform: rotateY(0) translateZ(75px); }
.face2 { transform: rotateY(-90deg) translateZ(75px); }
.face3 { transform: rotateY(-180deg) translateZ(75px); }
.face4 { transform: rotateY(-270deg) translateZ(75px); }
`;

const styleElement = document.createElement("style");
styleElement.textContent = style;
document.head.appendChild(styleElement);

const ads = [
 {
     image: "https://picsum.photos/200/300",
     title: "Explore the World with Our New Adventure Tours",
     link: "https://picsum.photos/"
 },
 {
     image: "https://picsum.photos/id/237/200/300",
     title: "Delicious Recipes for Every Season - Find Your Favorites!",
     link: "https://picsum.photos/"
 },
 {
     image: "https://picsum.photos/seed/picsum/200/300",
     title: "Upgrade Your Tech: Latest Gadgets and Innovations",
     link: "https://picsum.photos/"
 },
 {
     image: "https://picsum.photos/200/300?grayscale",
     title: "Discover Nature: The Best Places for Hiking and Camping",
     link: "https://picsum.photos/"
 }
];

let adHTML =
 "<div class='container'>" +
 "<button class='close-btn' onclick='closeAd()'>&times;</button>" +
 "<div class='ad-slideshow'>" +
 ads.map((ad, index) => {
     return "<div class='ad-container face" + (index + 1) + "'>" +
         "<a href='" + ad.link + "' class='ad-link'>" +
         "<img src='" + ad.image + "' alt='Ad Image' class='ad-image'>" +
         "<div class='ad-content'>" +
         "<p class='ad-title'>" + ad.title + "</p>" +
         "</div>" +
         "</a>" +
         "</div>";
 }).join("") +
 "</div>" +
 "</div>";

const adWrapper = document.createElement("div");
adWrapper.innerHTML = adHTML;
document.body.appendChild(adWrapper);

const closeAd = function () {
 adWrapper.style.display = 'none';
};