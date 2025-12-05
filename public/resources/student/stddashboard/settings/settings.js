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

    document.addEventListener("click", (e) => {
        const isClickInsideSidebar = sidebar.contains(e.target);
        const isClickOnIcon = iconOpen.contains(e.target);

        if (!isClickInsideSidebar && !isClickOnIcon && window.innerWidth < 768) {
            sidebar.classList.add("translate-x-full");
            iconOpen.classList.remove("rotate-45"); 
        }
    });
// ########################################################################

    const photoInput = document.getElementById('photoInput');
    const uploadBtn = document.getElementById('uploadBtn');
    const profilePreview = document.getElementById('profilePreview');

    uploadBtn.addEventListener('click', () => {
        photoInput.click();
    });

    photoInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (event) {
            profilePreview.src = event.target.result;
        };
        reader.readAsDataURL(file);
        }
    });

    document.getElementById('phone').addEventListener('input', function () {
        if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
        }
    });


    document.getElementById('studentForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let valid = true;

        const phone = document.getElementById('phone');
        const phoneError = document.getElementById('phone-error');
        const phoneRegex = /^01[0-2,5]{1}[0-9]{8}$/;

        if (!phoneRegex.test(phone.value)) {
        phoneError.textContent = "رقم الهاتف يجب أن يبدأ بـ 01 ويحتوي على 11 رقم فقط.";
        phoneError.classList.remove('hidden');
        valid = false;
        } else {
        phoneError.classList.add('hidden');
        }

        const major = document.getElementById('major');
        const majorError = document.getElementById('major-error');
        if (major.value.trim() === '') {
        majorError.classList.remove('hidden');
        valid = false;
        } else {
        majorError.classList.add('hidden');
        }

        const email = document.getElementById('email');
        const emailError = document.getElementById('email-error');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
        emailError.classList.remove('hidden');
        valid = false;
        } else {
        emailError.classList.add('hidden');
        }

        if (valid) {
        const progressBarContainer = document.getElementById("assignmentProgressBar");
        const progressBar = document.getElementById("assignmentProgress");
        const successMsg = document.getElementById("formSuccess");

        progressBar.style.width = "0%";
        progressBarContainer.classList.remove("hidden");
        successMsg.classList.add("hidden");

        let progress = 0;
        const interval = setInterval(() => {
            if (progress >= 100) {
            clearInterval(interval);
            successMsg.classList.remove("hidden");

            setTimeout(() => {
                progressBarContainer.classList.add("hidden");
                progressBar.style.width = "0%";
                successMsg.classList.add("hidden");
            }, 2000);
            } else {
            progress += 10;
            progressBar.style.width = progress + "%";
            }
        }, 150);
        }
    });
// #############################################################




