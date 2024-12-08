document.addEventListener('DOMContentLoaded', function() {
    const style = `
    * { margin: 0; padding: 0; box-sizing: border-box; }
    .ad-wrapper { position: fixed; bottom: 200px; left: 20px; transition: opacity 0.5s ease; z-index: 99999999 !important; }
    .ad-container { width: 388px; height: 128px; position: relative; border-radius: 6px; background-color: #fff; box-shadow: 1px 2px 5px 1px rgba(0, 0, 0, .3); }
    .ad-content { position: relative; height: 100%; overflow: hidden; border-radius: 6px; }
    .btn-close, .btn-close-mobile { position: absolute; top: -28px; width: 24px; height: 24px; border-radius: 50%; opacity: .8; background-color: #fff; border: none; padding: 0; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: opacity .1s ease-out; }
    .btn-close-mobile { display: none; }
    .ad-item-link { display: flex; text-decoration: none; color: #222; position: absolute; opacity: 0; transform: translateY(30px); transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out; }
    .ad-item-link.active { opacity: 1; transform: translateY(0); z-index: 2; }
    .mgid-rec-image { width: 230px; height: 94px; border-top-left-radius: 6px; background-size: contain; }
    .mgid-sub-units { padding: 10px 14px; }
    .mgid-unit { display: block; font-size: 16px; line-height: 1.5; color: #000; }
    .mgid-rec-text { font-weight: 700; }
    .mgid-rec-source, .mgid-rec-button { font-size: 14px; }
    .mgid-rec-button { display: flex; -webkit-box-flex: 1; -webkit-box-pack: end; justify-content: flex-end; -webkit-box-align:end; align-items:stretch;color:#000; font-size:14px; font-weight:700; }
    .fade-out { opacity: 0; transition: opacity 0.5s ease; }
    @media (max-width: 480px) {
        .ad-wrapper { width: 100%; top: 0; left: 0; right: 0; }
        .ad-container { width: 100%; height: 120px; border-radius: 0; }
        .mgid-rec-button { display: none; }
        .btn-close-mobile { display: block; right: 0; top: 0; z-index: 99999; }
    }`;

    const styleElement = document.createElement("style");
    styleElement.textContent = style;
    document.head.appendChild(styleElement);

    const adData = [{"imageSrc":"https://s-img.mgid.com/g/20988443/492x277/-/aHR0cDovL2NsLmltZ2hvc3RzLmNvbS9pbWdoL2ltYWdlL2ZldGNoL2FyXzE2OjksY19maWxsLGVfc2hhcnBlbjoxMDAsZl9qcGcsZ19mYWNlczphdXRvLHFfYXV0bzpnb29kLHdfMTAyMC9odHRwOi8vaW1naG9zdHMuY29tL3QvMjAyNC0xMC8xMDE5MjQvMTQ5MDM2ZWI4OWJjNmIxZGQ0NWUzOTI5ODJhN2MwZGYucG5n.webp?v=1730876761-07M3cCFejUEImbzeyTOuBQDQliPEqFmidDgAffM4sQM","link":"https://clck.mgid.com/ghits/20988443/i/57938781/0/src/548721/pp/1/1?h=RIL6M1rQEDLojlLcXYzY109JMLjnYDSXQ3wgDnFGD2kr2_9wbUlPSmYsxJtKpnbnBsrhC_AKrLt85AFfo7DSevUznorU8qNjUsA6AnD_bLc*\u0026rid=94fabd6c-9c0d-11ef-9dfb-c84bd68370b4\u0026tt=Direct\u0026att=3\u0026pubsrcid=548721\u0026cpm=1\u0026ct=1\u0026st=420\u0026h2=YAkRAHKlbuUaGfx3ZiX7BxE0k1yKsxxX2uY9SlNyQMQxdCES_TTDxUXswrkAeGzh","source":"Kiss Of Life vÆ°á»›ng cÃ¡o buá»™c sao chÃ©p BLACKPINK â€“ Sá»± tháº­t lÃ  gÃ¬?","title":"Kiss Of Life vÆ°á»›ng cÃ¡o buá»™c sao chÃ©p BLACKPINK â€“ Sá»± tháº­t lÃ  gÃ¬?"}];

    let adHTML =
    "<div class='ad-container'>" +
    "<button class='btn-close btn-close-ad' onclick='closeAd()'>" +
    "<img class='mgid-read-next-close' src='https://widgets.outbrain.com/images/widgetIcons/icon-x.svg' alt=''>" +
    "</button>" +
    "<div class='ad-content'>" +
    "<button class='btn-close-mobile btn-close-ad' onclick='closeAd()'>" +
    "<img class='mgid-read-next-close' src='https://widgets.outbrain.com/images/widgetIcons/icon-x.svg' alt=''>" +
    "</button>" +
    "<div class='list-items'>" +
    adData.map(function(item) {
        return "<a class='ad-item-link' href='" + item.link + "' target='_blank'>" +
            "<span class='mgid-unit mgid-rec-image-container'>" +
            "<img class='mgid-rec-image' loading='eager' aria-hidden='true' src='" + item.imageSrc + "' alt='" + item.title + "'>" +
            "</span>" +
            "<section class='mgid-sub-units'>" +
            "<span class='mgid-unit mgid-rec-text'>" + item.title + "</span>" +
            "<span class='mgid-unit mgid-rec-source'>" + item.source + "</span>" +
            "<span class='mgid-unit mgid-rec-button'>Read Next Story <img class='mgid-read-next-chevron' src='https://widgets.outbrain.com/images/widgetIcons/icon-chevron.svg' alt=''></span>" +
            "</section>" +
            "</a>";
    }).join("") +
    "</div>" +
    "</div>" +
    "</div>";

    const adWrapper = document.createElement("div");
    adWrapper.classList.add("ad-wrapper");
    adWrapper.innerHTML = adHTML;
    document.body.appendChild(adWrapper);

    const items = document.querySelectorAll('.ad-item-link');
    let currentIndex = 0;

    function showNextSlide() {
        items[currentIndex].classList.remove('active');
        setTimeout(function() {
            currentIndex = (currentIndex + 1) % items.length;
            items[currentIndex].classList.add('active');
        }, 600);
    }

    items[currentIndex].classList.add('active');
    setInterval(showNextSlide, 5000);

    window.closeAd = function () {
        adWrapper.classList.add('fade-out');
        setTimeout(function() {
            adWrapper.style.display = 'none';
        }, 500);
    };
});
