document.addEventListener("DOMContentLoaded", function () {
    // take element from html.file
    let searchInput = document.getElementById("searchInput");  // السيرش
    let yearFilter = document.getElementById("yearFilter"); //الفلترة بالسنة 
    let majorFilter = document.getElementById("majorFilter"); // الفلترة بالبرنامج

    // إضافة مستمعات الأحداث
    searchInput.addEventListener("input", filterTable);
    yearFilter.addEventListener("change", filterTable);
    majorFilter.addEventListener("change", filterTable);

    function filterTable() {
        let searchValue = searchInput.value.toLowerCase().trim();
        let yearFilterValue = yearFilter.value;
        let majorFilterValue = majorFilter.value;

        let rows = document.querySelectorAll("#studentsBody tr");

            rows.forEach(row => {
                let name = row.children[1].textContent.toLowerCase();
                let studentId = row.children[3].textContent.toLowerCase(); 
                let major = row.getAttribute("data-major");
                let year = row.getAttribute("data-year");

            // التحقق من تطابق الاسم أو رقم الطالب مع البحث
            let matchesSearch = searchValue === "" || name.includes(searchValue) || studentId.includes(searchValue);
            let matchesYear = yearFilterValue === "" || year === yearFilterValue;
            let matchesMajor = majorFilterValue === "" || major === majorFilterValue;

            //   عرض أو إخفاء الصف بناءً على التصفية اللي هتختارها
            row.style.display = (matchesSearch && matchesYear && matchesMajor) ? "" : "none";
        });
    }
});
document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("modal");
    let addStudentBtn = document.getElementById("addStudentBtn");

    addStudentBtn.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    document.getElementById("modal").addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});

function openModal() {
    document.getElementById("modal").style.display = "flex";
}
function closeModal() {
    document.getElementById("modal").style.display = "none";
}


