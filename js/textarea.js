// const textAreas = [...document.querySelectorAll("textarea")]


// for (const textArea of textAreas) {
//     textArea.addEventListener("input", auto_grow);
// }

// function auto_grow(event) {
//     event.target.style.height = (event.target.scrollHeight)+"px";
// }

const textAreas = [...document.querySelectorAll("textarea")]


for (const textArea of textAreas) {
    textArea.addEventListener("input", auto_grow);
}

function auto_grow(event) {
    if (Number(event.target.style.height.slice(0, event.target.style.height.length - 2)) > 300) return
    event.target.style.height = (event.target.scrollHeight)+"px";
}
