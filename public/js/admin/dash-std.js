
function openModal() {
    document.getElementById("studentModal").classList.remove("hidden");
}

function closeModal() {
    document.getElementById("studentModal").classList.add("hidden");
}


function openEdite() {
    document.getElementById("studentEdite").classList.remove("hidden");
}

function closeEdite() {
    document.getElementById("studentEdite").classList.add("hidden");
}

function addStudent() {
    alert("تمت إضافة الطالب!");
    closeModal();
}

function EditeStudent() {
    alert("تم تعديل بيانات الطالب!");
    closeEdite();
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
    let yearFilter = document.getElementById("yearFilter"); 
    let majorFilter = document.getElementById("majorFilter");
    let searchInput = document.getElementById("searchInput"); 
    let codeSearch = document.getElementById("codeSearch"); 
    let studentsBody = document.querySelector("tbody");

    if (searchInput) searchInput.addEventListener("input", filterTable);
    if (codeSearch) codeSearch.addEventListener("input", filterTable);
    yearFilter.addEventListener("change", filterTable);
    majorFilter.addEventListener("change", filterTable);

    function filterTable() {
        let searchValue = searchInput ? searchInput.value.toLowerCase().trim() : "";
        let codeSearchValue = codeSearch ? codeSearch.value.trim() : "";
        let yearFilterValue = yearFilter.value.trim();
        let majorFilterValue = majorFilter.value.trim();

        let rows = studentsBody.querySelectorAll("tr");
        let foundCodeMatch = false;

        rows.forEach(row => {
            let name = row.children[0].textContent.toLowerCase(); // اسم الطالب
            let studentId = row.children[2].textContent.toLowerCase(); // الرقم الجامعي
            let major = row.children[3].textContent.trim(); // البرنامج
            let year = row.children[4].textContent.trim(); // السنة الدراسية
            let codeCell = row.children[2]; // خلية الرقم الجامعي

            // تصفية الداتا يولد خلي بالك
            let matchesSearch = searchValue === "" || name.includes(searchValue) || studentId.includes(searchValue);
            let matchesYear = yearFilterValue === "" || year === yearFilterValue;
            let matchesMajor = majorFilterValue === "" || major === majorFilterValue;
            let matchesCode = codeSearchValue !== "" && studentId.includes(codeSearchValue);


            if (matchesCode) {
                foundCodeMatch = true;
                codeCell.style.backgroundColor = "#4CAF50"; 
                codeCell.style.color = "#fff";
                row.style.display = ""; 
            } else {
                codeCell.style.backgroundColor = ""; 
                codeCell.style.color = ""; 
                row.style.display = (matchesSearch && matchesYear && matchesMajor) ? "" : "none";
            }
        });


        if (!foundCodeMatch && codeSearchValue === "") {
            rows.forEach(row => {
                let major = row.children[3].textContent.trim();
                let year = row.children[4].textContent.trim();
                let name = row.children[0].textContent.toLowerCase();
                let studentId = row.children[2].textContent.toLowerCase();

                let matchesSearch = searchValue === "" || name.includes(searchValue) || studentId.includes(searchValue);
                let matchesYear = yearFilterValue === "" || year === yearFilterValue;
                let matchesMajor = majorFilterValue === "" || major === majorFilterValue;

                row.style.display = (matchesSearch && matchesYear && matchesMajor) ? "" : "none";
            });
        }
    }
});





