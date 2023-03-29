const sliderContainer = document.querySelector(".tasks-images")
const arrowRight = document.querySelector("[data-direction='right'")
const arrowLeft = document.querySelector("[data-direction='left'")
let lastWindowWidth = window.innerWidth;
let timeout;
let cardWidth;
let transform = 0;
let touchstartX = 0
let touchendX = 0;
let transition = 0.3
let tasksLength = [...document.querySelectorAll(".taskCard")].length

const getCardSize = () => {
    if (window.innerWidth === lastWindowWidth) return
    lastWindowWidth = window.innerWidth
    cardWidth = taskCard.offsetWidth + 40
    cardWidth < 380 ? transition = 0.1 : transition = 0.3
    setTransitionAndTransform(transition, transform = 0);
}

const setTransitionAndTransform = (transition, transform) => {
    sliderContainer.style = `transition: transform ${transition}s; transform: translateX(${transform * cardWidth}px)`;
}

const moveSlider = (direction, t1, t2) => {
    console.log("T1:", transform , t1, transform === t1);
    if (transform === t1) {
        transform = t2;
        setTransitionAndTransform(0, transform)
    }
    direction === "left" ? transform++ : transform--;
    setTimeout(() => setTransitionAndTransform(transition, transform), 30)
}

const checkDirection = () => {
    if (touchstartX - touchendX > 50) return moveSlider("right", -1 * (tasksLength - 4), 0)
    if (touchstartX - touchendX < -50) return moveSlider("left", 0, -1 * (tasksLength - 4))
}

// for (const task of [...tasks, ...tasks.slice(0, 4)]) {
//     const article = document.createElement("article");
//     article.classList.add("taskCard")
//     if (task.typ === "algorytmy") article.classList.add("algorytmy")

//         const wrap1 = document.createElement("div");
//         wrap1.classList.add("taskCard-wrap")
//             const div = document.createElement("div");
//                 const name = document.createElement("h2");
//                 name.classList.add("taskCard-name")
//                 name.innerText = task.zadanie

//                 const list = document.createElement("h3");
//                 list.classList.add("taskCard-list")
//                 list.innerText = task.lista
//             div.appendChild(name)
//             div.appendChild(list)

            

//             const img = document.createElement("img")
//             img.classList.add("taskCard-image");
//             img.src = `./src/${task.img}`
//             img.alt = "Zdjęcię użytkownika, który dodał zadanie";

//         wrap1.appendChild(div)
//         wrap1.appendChild(img)
       

//         const wrap2 = document.createElement("div");
//         wrap2.classList.add("taskCard-wrap")
//             const descriptionTitle = document.createElement("h4");
//             descriptionTitle.classList.add("taskCard-descriptionTitle")
//             descriptionTitle.innerText = task.typ

//             const username = document.createElement("p");
//             username.classList.add("taskCard-username")
//             username.innerText = task.nazwa

//         wrap2.appendChild(descriptionTitle)
//         wrap2.appendChild(username)

//          // DONE

//         const description = document.createElement("p");
//         description.classList.add("taskCard-description");
//         description.innerText = task.opis;

//         const link = document.createElement("a")
//         link.classList.add("taskCard-link", task.typ === "programowanie" ? "btn2" : "btn3", "btnL");
//         link.innerText = "Rozwiązanie"

//     article.appendChild(wrap1)
//     article.appendChild(wrap2)
//     article.appendChild(description)
//     article.appendChild(link)
// sliderContainer.appendChild(article)
// }

const taskCard = document.querySelector(".taskCard")
cardWidth = taskCard.offsetWidth + 40;

arrowRight.addEventListener("click", () => moveSlider("right", -1 * (tasksLength - 4), 0))
arrowLeft.addEventListener("click", () => moveSlider("left", 0, -1 * (tasksLength - 4)))
window.addEventListener("resize", () => {
    clearTimeout(timeout); timeout = setTimeout(getCardSize, 100)
})

sliderContainer.addEventListener("touchstart", e => touchstartX = e.changedTouches[0].screenX)
sliderContainer.addEventListener('touchend', e => {
    touchendX = e.changedTouches[0].screenX
    checkDirection()
})