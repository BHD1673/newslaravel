

const firstReadnetStyle = "* { margin: 0; padding: 0; box-sizing: border-box; }" +
    ".first-readnet-wrapper { position: fixed; bottom: 200px; left: 20px; transition: opacity 0.5s ease; }" +
    ".first-readnet-container { width: 388px; height: 128px; position: relative; border-radius: 6px; background-color: #fff; box-shadow: 1px 2px 5px 1px rgba(0, 0, 0, .3); }" +
    ".first-readnet-content { position: relative; height: 100%; overflow: hidden; border-radius: 6px; }" +
    ".first-readnet-btn-close, .first-readnet-btn-close-mobile { position: absolute; top: -28px; width: 24px; height: 24px; border-radius: 50%; opacity: .8; background-color: #fff; border: none; padding: 0; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: opacity .1s ease-out; }" +
    ".first-readnet-btn-close-mobile { display: none; }" +
    ".first-readnet-item-link { display: flex; text-decoration: none; color: #222; position: absolute; opacity: 0; transform: translateY(30px); transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out; }" +
    ".first-readnet-item-link.active { opacity: 1; transform: translateY(0); z-index: 2; }" +
    ".first-readnet-image { width: 120px; display: flex; align-items: center; height: 85px !important; border-top-left-radius: 6px; object-fit: cover; overflow: hidden;   flex-shrink: 0; }" +
    ".first-readnet-sub-units { padding: 5px 10px; }" +
    ".first-readnet-unit { display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; font-size: 13px; color: #000; max-height: 95px; }" +
    ".first-readnet-text {     font-weight: 600;   line-height: 1; font-family: Arial, Helvetica, sans-serif; font-size: 16px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; }" +
    ".first-readnet-source, .first-readnet-button { font-size: 12px;padding: 2px 0px 0px 0px ;       font-family: Arial, Helvetica, sans-serif;; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; }" +
    ".first-readnet-button { display: flex; -webkit-box-flex: 1; -webkit-box-pack: end; justify-content: flex-end; -webkit-box-align:end; align-items:stretch;color:#000; font-size:14px; font-weight:700; }" +
    ".first-readnet-fade-out { opacity: 0; transition: opacity 0.5s ease; }" +
    ".first-readnet-image-container {flex-shrink: 0;margin-right: 10px; }" +
    ".first-readnet-button-outer {position: absolute;top: 95%; right:5px; transform: translateY(-95%);}" +
    ".first-readnet-button {gap:12px}" + "@media (max-width: 480px) {" +
    ".first-readnet-wrapper { width: 100%; top: 0; left: 0; right: 0; }" +
    ".first-readnet-container { width: 100%; height: 120px; border-radius: 0; }" +
    ".first-readnet-button { display: none; }" +
    ".first-readnet-wrapper {z-index:2147483647 !important;}"+

    "@media (max-width: 480px) {" +
    ".first-readnet-wrapper { width: 100% ; top: 30px; left: 0; right: 0; z-index:2147483647 !important;  }" + 
    ".first-readnet-btn-close-mobile { display: none; }" + 
    ".first-readnet-btn-close {right: 5px; width: 30px; height: 25px; background-color:#ffffff;z-index:2147483647 !important; border-radius:50%; }" + 
    "}";
   
const firstReadnetStyleElement = document.createElement("style");
firstReadnetStyleElement.textContent = firstReadnetStyle;
document.head.appendChild(firstReadnetStyleElement);
const firstReadnetData = [{
    "imageSrc": "https://s-img.mgid.com/g/20988443/492x277/-/aHR0cDovL2NsLmltZ2hvc3RzLmNvbS9pbWdoL2ltYWdlL2ZldGNoL2FyXzE2OjksY19maWxsLGVfc2hhcnBlbjoxMDAsZl9qcGcsZ19mYWNlczphdXRvLHFfYXV0bzpnb29kLHdfMTAyMC9odHRwOi8vaW1naG9zdHMuY29tL3QvMjAyNC0xMC8xMDE5MjQvMTQ5MDM2ZWI4OWJjNmIxZGQ0NWUzOTI5ODJhN2MwZGYucG5n.webp?v=1730876761-07M3cCFejUEImbzeyTOuBQDQliPEqFmidDgAffM4sQM",
    "link": "https://example-link1.com",
    "source": "Sponsored: DiscoveryFeed ",
    "title": "See What Personalised Content We Have Based on Your Browsing History"
}, {
    "imageSrc": "https://s-img.mgid.com/g/20836753/492x277/-/aHR0cDovL2NsLmltZ2hvc3RzLmNvbS9pbWdoL2ltYWdlL2ZldGNoL2FyXzE2OjksY19maWxsLGVfc2hhcnBlbjoxMDAsZl9qcGcsZ19mYWNlczphdXRvLHFfYXV0bzpnb29kLHdfMTAyMC9odHRwOi8vaW1naG9zdHMuY29tL3QvMjAyNC0wOS8xMDE5MjQvYTc1MjQ1YTJlNGQyMTM4NGQ5N2ExMTg0ZjZmMDA4NjEucG5n.webp?v=1730876761--ZJJQjQof-6PBMpyOlmrOOM1QSZTMprrhfM1PMR5QHw",
    "link": "https://example-link2.com",
    "source": "Sponsored: DiscoveryFeed ",
    "title": "See What Personalised Content We Have Based on Your Browsing History"
}];
let firstReadnetHTML = "<div class='first-readnet-container'>" +
    "<button class='first-readnet-btn-close first-readnet-btn-close-action' onclick='closeFirstReadnet()'>" +
    "<img class='first-readnet-close' src='https://widgets.outbrain.com/images/widgetIcons/icon-x.svg' alt=''>" +
    "</button>" + "<div class='first-readnet-content'>" +
    "<button class='first-readnet-btn-close-mobile first-readnet-btn-close-action' onclick='closeFirstReadnet()'>" +
    "<img class='first-readnet-close' src='https://widgets.outbrain.com/images/widgetIcons/icon-x.svg' alt=''>" +
    "</button>" + "<div class='first-readnet-list'>" + firstReadnetData.map(function(item) {
        return "<a class='first-readnet-item-link' href='" + item.link + "' target='_blank'>" +
            "<span class='first-readnet-unit first-readnet-image-container' >" +
            "<img class='first-readnet-image' loading='eager' aria-hidden='true' src='" + item.imageSrc +
            "' alt='" + item.title + "'>" + "</span>" + "<section class='first-readnet-sub-units'>" +
            "<span class='first-readnet-unit first-readnet-text'>" + item.title + "</span>" +
            "<span class='first-readnet-unit first-readnet-source'>" + item.source + "</span>" + 
            "<br>" +
            
            "<span class='first-readnet-button first-readnet-button-outer'>Prossima Storia  <img class='first-readnet-chevron' src='https://widgets.outbrain.com/images/widgetIcons/icon-chevron.svg' alt=''></span>" +
            "</section>" + "</a>"
    }).join("") + "</div>" + "</div>" + "</div>";
const firstReadnetWrapper = document.createElement("div");
firstReadnetWrapper.classList.add("first-readnet-wrapper");
firstReadnetWrapper.innerHTML = firstReadnetHTML;
document.body.appendChild(firstReadnetWrapper);
const firstReadnetItems = document.querySelectorAll('.first-readnet-item-link');
let currentIndexFirstReadnet = 0;

function showNextFirstReadnet() {
    firstReadnetItems[currentIndexFirstReadnet].classList.remove('active');
    setTimeout(function() {
        currentIndexFirstReadnet = (currentIndexFirstReadnet + 1) % firstReadnetItems.length;
        firstReadnetItems[currentIndexFirstReadnet].classList.add('active')
    }, 500)
}
showNextFirstReadnet();
const firstReadnetInterval = setInterval(showNextFirstReadnet, 8000);

function closeFirstReadnet() {
    firstReadnetWrapper.classList.add("first-readnet-fade-out");
    setTimeout(() => firstReadnetWrapper.remove(), 600);
    clearInterval(firstReadnetInterval)
}

