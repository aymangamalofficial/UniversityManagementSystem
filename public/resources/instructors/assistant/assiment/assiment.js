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
        iconOpen.classList.toggle("rotate-45"); 
    });


    document.addEventListener("click", (e) => {
        const isClickInsideSidebar = sidebar.contains(e.target);
        const isClickOnIcon = iconOpen.contains(e.target);

        if (!isClickInsideSidebar && !isClickOnIcon && window.innerWidth < 768) {
            sidebar.classList.add("translate-x-full");
            iconOpen.classList.remove("rotate-45"); 
        }
    });
    // ########################################################################

function openAssignmentModal() {
    document.getElementById("assignmentModal").classList.remove("hidden");
}

function closeAssignmentModal() {
    document.getElementById("assignmentModal").classList.add("hidden");


    document.getElementById("assignmentSuccess").classList.add("hidden");
    document.getElementById("assignmentError").classList.add("hidden");


    document.getElementById("assignmentNumber").value = '';
    document.getElementById("assignmentDeadline").value = '';
    document.getElementById("assignmentTime").value = '';
    document.getElementById("assignmentFile").value = '';


    const progress = document.getElementById("assignmentProgress");
    progress.style.width = "0%";
    document.getElementById("assignmentProgressBar").classList.add("hidden");
}

function submitAssignment() {
    const assignmentNumber = document.getElementById("assignmentNumber").value;
    const assignmentDeadline = document.getElementById("assignmentDeadline").value;
    const assignmentTime = document.getElementById("assignmentTime").value;
    const assignmentFile = document.getElementById("assignmentFile").files[0];
    const errorMessage = document.getElementById("assignmentError");
    const successMessage = document.getElementById("assignmentSuccess");
    const progressBar = document.getElementById("assignmentProgressBar");
    const progress = document.getElementById("assignmentProgress");

    errorMessage.classList.add("hidden");
    successMessage.classList.add("hidden");

    if (!assignmentNumber || !assignmentDeadline || !assignmentTime || !assignmentFile) {
        errorMessage.textContent = "يرجى إكمال جميع الحقول.";
        errorMessage.classList.remove("hidden");
        return;
    }

    if (assignmentFile.type !== "application/pdf") {
        errorMessage.textContent = "الملف يجب أن يكون بصيغة PDF فقط.";
        errorMessage.classList.remove("hidden");
        return;
    }

    // عرض progress bar
    progressBar.classList.remove("hidden");
    progress.style.width = "0%";

    let currentProgress = 0;
    const interval = setInterval(() => {
        currentProgress += 10;
        progress.style.width = currentProgress + "%";

        if (currentProgress >= 100) {
            clearInterval(interval);
            successMessage.classList.remove("hidden");
            errorMessage.classList.add("hidden");
        }
    }, 150);
}

// #############################################################




