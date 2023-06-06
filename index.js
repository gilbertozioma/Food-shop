const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

const hanmburger = document.querySelector(".hanmburger");
const navMenu = document.querySelector(".nav-menu");
const search = document.querySelector(".search");
const navBar2 = document.querySelector(".navBar2")

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})

hanmburger.addEventListener("click", () => {
    hanmburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    search.classList.toggle("active");
    navBar2.classList.toggle("active")
})

document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
    hanmburger.classList.remove("active");
    navMenu.classList.remove("active");
    search.classList.remove("active");
    navBar2.classList.remove("active")
}))


