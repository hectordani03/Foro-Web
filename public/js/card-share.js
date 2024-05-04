const shareBtn = document.getElementById("share-button");
document.addEventListener("DOMContentLoaded", function() {
    const shareButtons = document.querySelectorAll("#share-button");
    shareButtons.forEach((shareBtn) => {
        shareBtn.addEventListener("click", (e) => {
            console.log("conseguido")
        });
    });
});