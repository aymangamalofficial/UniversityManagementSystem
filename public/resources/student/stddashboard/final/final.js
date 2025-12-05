
lucide.createIcons();
// ##############################################################################
// navbar
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
// ############################################################################
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
            iconOpen.classList.remove("rotate-45"); // يرجع الزر زي ما كان 
        }
    });
// ########################################################################################

// ###############################################################################

// ###################################################################
