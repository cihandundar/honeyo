// HAMBURGER MENU
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".header-wrapper");
const overlay = document.querySelector(".overlay");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    overlay.classList.toggle("active");

    if (navMenu.classList.contains("active")) {
        document.body.style.overflow = "hidden";
        document.body.classList.add("active-menu");
    } else {
        document.body.style.overflow = "auto";
        document.body.classList.remove("active-menu");
    }
    overlay.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
        overlay.classList.remove("active");
        document.body.style.overflow = "auto";
        document.body.classList.remove("active-menu");
    });
});

// SERVICES BOX
document.addEventListener('DOMContentLoaded', function() {
    const servicesBoxes = document.querySelectorAll('.services-box');
    
    // İlk kutuyu aktif yap
    if (servicesBoxes.length > 0) {
        servicesBoxes[0].classList.add('active');
    }

    // Hover olaylarını dinle
    servicesBoxes.forEach(box => {
        box.addEventListener('mouseenter', function() {
            // Tüm kutuları pasif yap
            servicesBoxes.forEach(b => b.classList.remove('active'));
            // Hover olan kutuyu aktif yap
            this.classList.add('active');
        });
    });
});
