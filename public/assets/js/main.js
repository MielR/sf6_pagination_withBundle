
// fanaovana SCROLL INFINITE 

const html = document.querySelector('html')
const tablebody = document.querySelector('.tablebody')

// client height  = 
//function mivrifier hoe AMBANY ve le ascenseur (scroller)


function atBottom(element) {
    if ((element.scrollHeight - element.scrollTop) == element.clientHeight) {
        return true
    } else {
        return false
    }
}
let page = 2

// evenement mi-verifier anle element= html 
window.addEventListener('scroll', function () {
    if (atBottom(html)) {
        axios.get(`http://localhost:9000/data/${page}`)
            .then((response) => {
                // console.log(response)
                const todos = response.data.todos
                //console.log(todos)

                //boucle mi-CREER anle element TD x 20 , sy mi-inserer anazy anaty TR
                for (todo of todos) {
                    let element = `
                        <td>${todo.id}</td>
                        <td>${todo.content}</td>
                    `
                    let tr = document.createElement('tr')

                    //tr.innerHTML = element : inserena anaty  TR ny element html "element"
                    tr.innerHTML = element
                    //appendChild(tr) = inserer l'elemnt HTML "tr" a la fin du "tablebody "
                    tablebody.appendChild(tr)
                    // appendChild != prepend
                }
                page++
                //mila incrementena ilay PAGE raha ts zany ilay page=2 fona no miverina miampy eo ambany 
            })
            .catch(error => console.log(error))

    }    //tsy miasa intony ny ELSE satria tsy manao ninoninona si else  
    // } else {
    //     console.log('tsy ambany')
    // }
})