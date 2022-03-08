function clickEvent(first, last) {
    if (first.value.length) {
        document.getElementById(last).focus();
    }
}
//_______________[Share]__________________//

const shareBtn = document.getElementById("icon-share");
const shareCon = document.getElementById("share_container");
const shareBox = document.getElementById("share_box");
const shareOff = document.getElementById("off_share_btn");

shareBtn.addEventListener("click", () => {
    shareBox.classList.add("show-share");
    shareCon.classList.add("share-container");
});

window.addEventListener("click", (e) =>
    e.target == shareCon ?
    shareCon.classList.remove("share-container") &
    shareBox.classList.remove("show-share") :
    false
);

shareOff.addEventListener("click", () => {
    shareBox.classList.remove("show-share");
    shareCon.classList.remove("share-container");
});
//_______________[Share]__________________//

//_______________[Buy_goods]__________________//
const buyGoodsBtn = document.getElementById("buy-goods");
const buyGoodsCon = document.getElementById("buy_goods_container");
const buyGoodsBox = document.getElementById("buy_goods_box");

buyGoodsBtn.addEventListener("click", () => {
    buyGoodsBox.classList.add("show-buy-good-box");
    buyGoodsCon.classList.add("buy-good-container");
});

window.addEventListener("click", (e) =>
    e.target == buyGoodsCon ?
    buyGoodsCon.classList.remove("buy-good-container") &
    buyGoodsBox.classList.remove("show-buy-good-box") :
    false
);
//_______________[Buy_goods]__________________//

window.addEventListener("scroll", function() {
    const choiceCon = document.getElementById("choice_container");
    let windowPosition = window.scrollY > 0;
    choiceCon.classList.toggle("show-choice", windowPosition);
});

// function openCity(cityName) {
//     var i;
//     var x = document.getElementsByClassName("city");
//     for (i = 0; i < x.length; i++) {
//         x[i].style.display = "none";
//     }
//     document.getElementById(cityName).style.display = "block";
// }





function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tabs-btn");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}