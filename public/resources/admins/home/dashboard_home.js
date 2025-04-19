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

// ===================================================================
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


