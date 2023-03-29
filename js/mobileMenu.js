const showMenu = document.querySelector(".mobile");
const menuLinks = [...document.querySelectorAll(".mobile-list_link")]
let showMobileMenu = 1;

showMenu.addEventListener("click", ()=>{
    menuLinks.forEach((link, index) => {
        showMobileMenu ?
        link.style = `transform: translate(0, ${-130 * (index + 1) - 50}%); opacity: 1;` :
        link.style = ``;
    });
    showMobileMenu === 0 ? showMobileMenu = 1 : showMobileMenu = 0;
})
