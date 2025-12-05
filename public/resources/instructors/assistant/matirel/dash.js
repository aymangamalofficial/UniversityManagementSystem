// navbar
        lucide.createIcons();
        document.getElementById("avatar-btn").addEventListener("click", function () {
            document.getElementById("dropdown-menu").classList.toggle("hidden");
        });
        document.addEventListener("click", function (event) {
            if (!document.getElementById("avatar-btn").contains(event.target)) {
                document.getElementById("dropdown-menu").classList.add("hidden");
            }
        });
// ##################################################################################
        document.getElementById("not-btn").addEventListener("click", function () {
            document.getElementById("dropdown2-menu").classList.toggle("hidden");
        });
        document.addEventListener("click", function (event) {
            if (!document.getElementById("not-btn").contains(event.target)) {
                document.getElementById("dropdown2-menu").classList.add("hidden");
            }
        });
// ##################################################################################
        function fadeRemove(btn) {
            const alertBox = btn.parentElement;
            alertBox.classList.add('opacity-0');
            setTimeout(() => {
                alertBox.remove();
            }, 300);
        }
// ###########################################################
    const iconOpen = document.getElementById("icon-open");
    const sidebar = document.getElementById("sidebar");

    iconOpen.addEventListener("click", (e) => {
        e.stopPropagation();
        sidebar.classList.toggle("translate-x-full");
        iconOpen.classList.toggle("rotate-45"); //  تدوير للزر
    });

    // لو ضغط خارج القائمة، اقفلها وارجع الأيقونة
    document.addEventListener("click", (e) => {
        const isClickInsideSidebar = sidebar.contains(e.target);
        const isClickOnIcon = iconOpen.contains(e.target);

        if (!isClickInsideSidebar && !isClickOnIcon && window.innerWidth < 768) {
            sidebar.classList.add("translate-x-full");
            iconOpen.classList.remove("rotate-45"); // يرجع الزر زي ما كان 
        }
    });
    // ########################################################################

function closeAssignmentModal() {
    document.getElementById("uploadModal").classList.add("hidden");
    resetAssignmentForm();
}

function openAssignmentModal() {
    document.getElementById("uploadModal").classList.remove("hidden");
}

function resetAssignmentForm() {
    document.getElementById("assignmentFile").value = '';
    document.getElementById("assignmentError").classList.add("hidden");
    document.getElementById("assignmentSuccess").classList.add("hidden");
    document.getElementById("assignmentProgressBar").classList.add("hidden");
    document.getElementById("assignmentProgress").style.width = "0%";
}

function getFileExtension(fileName) {
    return fileName.split('.').pop().toLowerCase();
}

function submitAssignment() {
    const fileInput = document.getElementById("assignmentFile");
    const file = fileInput.files[0];
    const errorMsg = document.getElementById("assignmentError");
    const successMsg = document.getElementById("assignmentSuccess");
    const progressBar = document.getElementById("assignmentProgressBar");
    const progress = document.getElementById("assignmentProgress");

    // Reset
    errorMsg.classList.add("hidden");
    successMsg.classList.add("hidden");

    if (!file) {
        errorMsg.textContent = "يرجى اختيار ملف للرفع.";
        errorMsg.classList.remove("hidden");
        return;
    }

    const extension = getFileExtension(file.name);
    const allowedExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'];

    if (!allowedExtensions.includes(extension)) {
        errorMsg.textContent = "صيغة الملف غير مدعومة. الرجاء رفع ملف بصيغة PDF أو Word أو Excel.";
        errorMsg.classList.remove("hidden");
        return;
    }

    // Simulate upload with progress
    progressBar.classList.remove("hidden");
    let uploadProgress = 0;
    const interval = setInterval(() => {
        uploadProgress += 10;
        progress.style.width = uploadProgress + "%";

        if (uploadProgress >= 100) {
            clearInterval(interval);
            successMsg.classList.remove("hidden");
        }
    }, 100);
}
// #############################################################




