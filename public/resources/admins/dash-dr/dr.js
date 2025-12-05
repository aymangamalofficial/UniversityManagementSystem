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
// ====================================================================
function opendr() {
    document.getElementById("drModal").classList.remove("hidden");
}

function closedr() {
    document.getElementById("drModal").classList.add("hidden");
}
// ==============================================================

function openassit() {
    document.getElementById("assitModal").classList.remove("hidden");
}

function closeassit() {
    document.getElementById("assitModal").classList.add("hidden");
}
// ===============================================================
// function Editedr() {
//     document.getElementById("drEdite").classList.remove("hidden");
// }

// function closeEdite() {
//     document.getElementById("drEdite").classList.add("hidden");
// }

function openEditedr() {
    document.getElementById("Editedr").classList.remove("hidden");
}

function closeEditedr() {
    document.getElementById("Editedr").classList.add("hidden");
}
// function Editedr() {
//     alert("تم تعديل بيانات الهيئة المُختارة بنجاح!");
//     closeEditedr();
// }
function Editedr() {
    closedeleteModal();
    let deletedMessage = document.getElementById("editedMessage");
    deletedMessage.classList.remove("hidden");

    // إخفاء الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        deletedMessage.classList.add("hidden");
    }, 1000);
    closeEditedr();
}

// ================================================================
// function adddr() {
//     alert("تمت إضافة هيئة التدريس!");
//     closedr();
// }
function adddr() {
    // closedeleteModal();
    let deletedMessage = document.getElementById("saveMessage");
    deletedMessage.classList.remove("hidden");

    // إخفاء الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        deletedMessage.classList.add("hidden");
    }, 1000);
    closedr();
}
// ================================================================
// function addassit() {
//     alert("تم إضافة  الهيئة المعاونة !");
//     closeassit();
// }
function addassit() {
    closedeleteModal();
    let deletedMessage = document.getElementById("saveMessage");
    deletedMessage.classList.remove("hidden");

    // إخفاء الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        deletedMessage.classList.add("hidden");
    }, 1000);
    closeassit();
}
// ==================================================
function opendelete() {
    document.getElementById("deleteModal").classList.remove("hidden");
}

function closedeleteModal() {
    document.getElementById("deleteModal").classList.add("hidden");
}

function deleteMessage() {
    closedeleteModal();
    let deletedMessage = document.getElementById("deletedMessage");
    deletedMessage.classList.remove("hidden");

    // إخفاء الرسالة بعد 3 ثوانٍ
    setTimeout(() => {
        deletedMessage.classList.add("hidden");
    }, 1000);
}

// ===============================================================
document.addEventListener("DOMContentLoaded", function () {
    let majorFilter = document.getElementById("majorFilter");
    let codeSearch = document.getElementById("codeSearch");
    let studentsBody = document.getElementById("dataTable");

    // إضافة أحداث الاستماع للمدخلات
    codeSearch.addEventListener("input", filterTable);
    majorFilter.addEventListener("change", filterTable);

    function filterTable() {
        let codeSearchValue = codeSearch.value.trim();
        let majorFilterValue = majorFilter.value.trim();

        let rows = studentsBody.querySelectorAll("tr");

        rows.forEach(row => {
            let studentId = row.children[2].textContent.trim(); // الرقم الجامعي (عمود 3)
            let major = row.children[3].textContent.trim(); // الهيئة (عمود 4)
            let showRow = true;

            // فلترة حسب الكود الجامعي
            if (codeSearchValue !== "" && !studentId.includes(codeSearchValue)) {
                showRow = false;
            }

            // فلترة حسب الهيئة
            if (majorFilterValue !== "" && major !== majorFilterValue) {
                showRow = false;
            }

            row.style.display = showRow ? "" : "none";
        });
    }
});




