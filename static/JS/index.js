const menuBtn = document.getElementById("menu-btn"); 
const nablinks = document.getElementById("nav-links"); 
const menuBtnIcon= menuBtn.querySelector("i");

menuBtn.addEventListener("click" , (e) =>{
    nablinks.classList.toggle("open");
    const isOpen = nablinks.classList.contains("open");
    menuBtnIcon.setAttribute("class" , isOpen ? "ri-close-line" :  "ri-menu-line");
})




const scrollRevealOption={
    distance : "50px",
    origin : "bottom",
    duration :1000 };

    // header container

    ScrollReveal().reveal(".header_container h1" , {
        ...scrollRevealOption,
    });

    ScrollReveal().reveal(".header_container p" , {
        ...scrollRevealOption,
        delay : 500,
    });

    ScrollReveal().reveal(".header_container a" , {
        ...scrollRevealOption,
        delay:1000
    });

