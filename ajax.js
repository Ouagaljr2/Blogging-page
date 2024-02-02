let section = document.getElementById('les_articles')
function loadart(pagenumber){
  fetch('http://localhost:8080/asserts/chargement.php?page='+pagenumber)

            .then((response) => {
                response.json()
                        .then((Articles) => {
                            console.log(Articles)
                            Articles.forEach((Article) => {
                            const article = document.createElement('article')
                            const info=document.createElement('div')
                            const titre = document.createElement('p')
                            const auteur=document.createElement('p')
                            titre.innerText=Article.artName
                            auteur.innerText=Article.autorName
                            info.append(auteur)
                            info.append(titre)
                            article.append(info)
                            article.append(Article.content)
                            section.appendChild(article)
                          })
                        })
            })
            .catch()
}

loadart(0);
let i=1;
document.getElementById('voirPlus')
        .addEventListener('click', () => {
          loadart(i++);
          
        })