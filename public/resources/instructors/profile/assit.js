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
// ##################################################################################
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
// ##################################################################################
        function openModal() {
            document.getElementById("settingsModal").classList.remove("hidden");
            document.getElementById("settingsModal").classList.add("flex");
        }
// ##################################################################################
        function closeModal() {
            document.getElementById("settingsModal").classList.add("hidden");
            document.getElementById("settingsModal").classList.remove("flex");
        }
// ##################################################################################
    function updatePhone() {
        const phoneInput = document.getElementById('phoneInput');
        const error = document.getElementById('phoneError');
        const phone = phoneInput.value.trim();
        const phoneRegex = /^(010|011|012|015)[0-9]{8}$/;

        if (phone === '') {
            error.textContent = 'رقم الهاتف لا يمكن أن يكون فارغًا';
            error.classList.remove('hidden');
        } else if (!phoneRegex.test(phone)) {
            error.textContent = 'رقم غير صالح. يجب أن يبدأ بـ 010 أو 011 أو 012 أو 015 ويكون 11 رقمًا';
            error.classList.remove('hidden');
        } else {
            error.classList.add('hidden');

            const existingMsg = document.getElementById('successMessage');
            if (existingMsg) existingMsg.remove();

            const msg = document.createElement('p');
            msg.id = 'successMessage';
            msg.className = 'text-green-600 text-center mt-3';
            msg.textContent = 'تم تحديث البيانات  بنجاح!';
            phoneInput.parentElement.appendChild(msg);
        }
    }

    setInterval(() => {
        const msg = document.getElementById('successMessage');
        if (msg) msg.remove();
    }, 2000);
// ##################################################################################
    function openPasswordModal() {
        document.getElementById('passwordModal').classList.remove('hidden');
    }
    function closePasswordModal() {
        document.getElementById('passwordModal').classList.add('hidden');
    }
// ##################################################################################

    document.getElementById('profileImageInput').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            // عرض progress bar وتهيئته
            const progressBar = document.getElementById('progressBar');
            const progress = document.getElementById('progress');
            progress.style.width = '0%';
            progressBar.classList.remove('hidden');

            // تحميل وهمي - يحاكي رفع الصورة تدريجياً
            let width = 0;
            const fakeUpload = setInterval(() => {
                if (width >= 100) {
                    clearInterval(fakeUpload);
                    setTimeout(() => {
                        progressBar.classList.add('hidden');
                    }, 500);
                } else {
                    width += 10;
                    progress.style.width = width + '%';
                }
            }, 100); 

            // قراءة الصورة وعرضها
            reader.onload = function (e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('profileImageDisplay').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
// #############################################################################################

