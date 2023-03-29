function addCommentButtonsFunctionality(){
    const commentButtons = [...document.querySelectorAll(".excercises-excercise_toggleComments")]

    for (const commentButton of commentButtons) {
        commentButton.addEventListener("click", () => {
            document.querySelector(`[data-id="${commentButton.dataset.id}"]`).classList.toggle("displayNone");
            // Duża litera P jest ważna
            commentButton.innerText = commentButton.innerText === "Pokaż komentarze" ?  "schowaj komentarze" : "pokaż komentarze"
        })
    }
}

addCommentButtonsFunctionality()