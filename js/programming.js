// PRZEROBIĆ TO NA FUNKCJĘ, CZYŚCIĆ WSZYSTKO, A POTEM GENEROWAĆ JESZCZE RAZ DLA NOWYCH DANYCH
// ALBO ZMIANA LISTY TO ZMIANA LINKU Z PARAMETREM I FETCHUJEMY PO PROSTU W ODPOWIEDNI SPOSÓB

// Lista list
// const lists = ["Wykłady 1", "Ćwiczenia 1", "Wykłady 2", "Ćwiczenia 2",]
// Lista zadań
// const excercisesFetch = [
//     {
//         name: "Zadanie 1",
//         description: "Opis",
//         solution: "code",
//     },
//     {
//         name: "Zadanie 2",
//         description: "Opis 2",
//         solution: "code 2",
//     },
//     {
//         name: "Zadanie 3",
//         description: "Opis 3",
//         solution: "code 3",
//     },
// ]


// Lista zadań listy


// Nazwa aktualnej listy
// const currentListName = document.querySelector(".excercises-list")
// currentListName.innerText = lists[0]

// Generowanie selecta
// const excersisesWrap = document.querySelector(".excercises-wrap")
// const select = document.createElement("select");
// select.classList.add("excercises-wrap_listSelect");
// for (const list of lists) {
//     const option = document.createElement("option")
//     option.value = list
//     option.innerText = list
//     select.appendChild(option)
// }
// excersisesWrap.appendChild(select)





// Zadania XD
// const excercises = document.querySelector(".excercises")
// let index = 0;
// for (const excerciseFetch of excercisesFetch) {
//     const comments = [
//         {
//             userimage: "stalin.jpg",
//             username: "Stalin",
//             date: new Date(),
//             text: "Litwo, Ojczyzno Moja! Ty jesteś jak zdrowie"
//         }, 
//         {
//             userimage: "feldmarszalek.jpg",
//             username: "Feldmarszalek",
//             date: new Date(),
//             text: "TEST TEST 123"
//         }, 
//     ]
    
//     const article = document.createElement("article")
//     article.classList.add("excercises-excercise")
//     article.innerHTML = `
//     <h2  class="excercises-excercise_name h2" id=${excerciseFetch.name.replace(/\s+/g, '')}>${excerciseFetch.name}</h2>

//             <p  class="excercises-excercise_description">${excerciseFetch.description}</p>
//             <h4  class="excercises-excercise_solution h4">ROZWIĄZANIE</h4>
//             <pre class="excercises-excercise_code language-c">
//             <code class="language-c">${excerciseFetch.solution}</code>
//             </pre>
            
//             <form action="" class="excercises-form">
//                 <img src="./src/feldmarszalek.jpg" alt="" class="excercises-form_userImage">

//                 <div class="excercises-form_wrap">
//                     <textarea class="excercises-form_textarea" name="" id="" placeholder="Napisz komentarz..."></textarea>
                
//                     <button type="submit" class="btn2 btnL excercises-form_submit">Prześlij</button>
//                 </div>
//             </form>
            
//             <section data-id=${index} class="excercises-comments"></section>
//             <button data-id=${index++} class="excercises-excercise_toggleComments btn2 btnL">Pokaż komentarze</button>
//     `;

//     const commentsSection = article.querySelector(".excercises-comments")
//     commentsSection.classList.add("displayNone");
//     for (const comment of comments) {
//         const commentArticle = document.createElement("article");
//         commentArticle.classList.add("excercises-comments_comment")
//         commentArticle.innerHTML = `
//             <div class="excercises-comments_comment--wrap">
//                 <img src="./src/${comment.userimage}" alt="" class="excercises-comments_comment--userImage">
//                 <p class="excercises-comments_comment--username h5">${comment.username}
//                     <br> <span class="excercises-comments_comment--date">${comment.date.toLocaleDateString()}</span>
//                 </p>
//             </div>
//             <p class="excercises-comments_comment--text">${comment.text}</p>`
            
//         commentsSection.appendChild(commentArticle)
//     }
//     excercises.appendChild(article);




// Sidebar
// const sidebarLists = [...document.querySelectorAll(".sidebar-navigation_list")];

// for (const list of lists) {
//     const li = document.createElement("li")
//     const a = document.createElement("a")
//     a.innerText = list
//     a.classList.add("sidebar-navigation_list--link", "h5")
//     a.href = `programming.php#${list.replace(/\s+/g, '')}`
//     li.appendChild(a)
//     sidebarLists[0].appendChild(li)
// }

// for (const excercise of excercisesFetch) {
//     const li = document.createElement("li")
//     const a = document.createElement("a")
//     a.innerText = excercise.name
//     a.classList.add("sidebar-navigation_list--link", "h5")
//     a.href = `programming.php#${excercise.name.replace(/\s+/g, '')}`
//     li.appendChild(a)
//     sidebarLists[1].appendChild(li)
// }

// addCommentButtonsFunctionality()