function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}
window.onscroll = function() {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};
//=============================delete
function opendelete() {
    document.getElementById("deleteModal").classList.remove("hidden");
}

function closeModal() {
    document.getElementById("deleteModal").classList.add("hidden");
}

function deleteMessage() {
    closeModal();
    let deletedMessage = document.getElementById("deletedMessage");
    deletedMessage.classList.remove("hidden");

    // إخفاء الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        deletedMessage.classList.add("hidden");
    }, 1000);
}
//====================edite
function openedite() {
    document.getElementById("editeModal").classList.remove("hidden");
}

function editeModal() {
    document.getElementById("editeModal").classList.add("hidden");
}

function editeMessage() {
    editeModal();
    let deletedMessage = document.getElementById("editeMessage");
    deletedMessage.classList.remove("hidden");

    // إخفاء الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        deletedMessage.classList.add("hidden");
    }, 1000);
}
// save================================================
function opensave() {
    document.getElementById("saveModal").classList.remove("hidden");
}

function saveModal() {
    document.getElementById("saveModal").classList.add("hidden");
}

function saveMessage() {
    saveModal();
    let deletedMessage = document.getElementById("saveMessage");
    deletedMessage.classList.remove("hidden");

    // إخفاء الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        deletedMessage.classList.add("hidden");
    }, 1000);
}