window.onscroll = function() {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};

document.getElementById('menu-toggle').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

          gsap.utils.toArray('.about, .text-about, .photo-about, .News , .contact').forEach((section) => {
            gsap.from(section, {
                opacity: -1,  // Start with opacity 0
                y: 60,  // Start from 50px lower
                duration: 2,  // Animation duration
                scrollTrigger: {
                    trigger: section,
                    start: 'top 100%',  // Trigger animation when the section is 80% from the top of the viewport
                    end: 'bottom 90%',
                    scrub: true,  // Smooth animation as you scroll
                },
            });
        });