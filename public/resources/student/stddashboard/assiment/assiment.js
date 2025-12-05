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

function handleFileUpload(event) {
    const file = event.target.files[0];
    if (file) {
        const progressBar = document.getElementById('assignmentProgressBar');
        const progress = document.getElementById('assignmentProgress');
        const message = document.getElementById('uploadSuccessMessage');

        progressBar.classList.remove('hidden');
        message.classList.add('hidden');
        progress.style.width = '0%';

        // محاكاة تقدم الرفع (وهمي)
        let percent = 0;
        const interval = setInterval(() => {
            percent += 10;
            progress.style.width = percent + '%';

            if (percent >= 100) {
                clearInterval(interval);
                setTimeout(() => {
                    progressBar.classList.add('hidden');
                    message.classList.remove('hidden');

                    // إخفاء الرسالة بعد 3 ثواني
                    setTimeout(() => {
                        message.classList.add('hidden');
                    }, 3000);
                }, 300); // بعد انتهاء أنيميشن الشريط
            }
        }, 200); // مدة التحديث
    }
}


// #############################################################
    const slider = document.getElementById("slider");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    nextBtn.addEventListener("click", () => {
        slider.scrollBy({ left: 300, behavior: 'smooth' });
    });

    prevBtn.addEventListener("click", () => {
        slider.scrollBy({ left: -300, behavior: 'smooth' });
    });
// ###########################################################


