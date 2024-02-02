

// traitement avant enregistrement d'un article

const form3= document.getElementById('form3');
form3.addEventListener('submit', function (event) {

  event.preventDefault();

  let hasError = false;

  const initError = (textError,champ,num) => {
    hasError = true
    champ.parentElement.classList.add('error')
    champ.parentNode.children[num].innerText = textError
  }

  const autorName = document.getElementById('idt')
  const artName = document.getElementById('nArt')
  const content = document.getElementById('content')
 
  //nom de l'auteur de l'article

  if (autorName.value.length === 0) {
    initError('Entrez votre nom',autorName,2);
  }
  if (autorName.value.length > 255) {
    initError('Ce champ doit faire max 255 caractères',autorName,2);
  }
  //Nom de l'article

  if (artName.value.length <3) {
    initError('Donnez un nom a votre article',artName,2);
  }
  if (artName.value.length > 255) {
    initError('Ce champ doit faire max 255 caractères',artName,2);
  }

  //contenu de l'article

  if (content.value.length <10) {
    initError('Votre article est trop court',content,2);
  }
 
  if (!hasError) {
    this.submit()
  }

})