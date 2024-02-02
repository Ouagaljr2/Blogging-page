const connexion= document.getElementById('connect');
const formconnect=document.getElementById('connexion');

const inscrip= document.getElementById('champs2');
const forminscrip=document.getElementById('creercompte');

const corps=document.getElementById('image1');

corps.addEventListener('click',function(){
  if( getComputedStyle(formconnect).display =="flex" || getComputedStyle(forminscrip).display == "flex"){
    forminscrip.style.display = "none";
    formconnect.style.display = "none";
  }

})


// pour faire apparaitre et disparaitre le chmaps de connexion

connexion.addEventListener('click',function(event){
  event.preventDefault();
  forminscrip.style.display = "none";
  if(getComputedStyle(formconnect).display != "none"){
    formconnect.style.display = "none";
r
  } else {
    formconnect.style.display = "flex";
  }

})


// pour faire apparaitre et disparaitre le chmaps d'inscription

inscrip.addEventListener('click',function(event){
  event.preventDefault();
  formconnect.style.display = "none";
  if(getComputedStyle(forminscrip).display != "flex"){
    forminscrip.style.display="flex";
  }

})


// traitement des donnes avant envoi a la base pour inscription

const form2= document.getElementById('form2')

form2.addEventListener('submit', function (event) {
  event.preventDefault()

  let hasError = false

  const initError = (textError,champ,num) => {
    hasError = true
    champ.parentElement.classList.add('error')
    champ.parentNode.children[num].innerText = textError
  }

  const firstname = document.getElementById('fname')
  const lastname = document.getElementById('lname')
  const mdp = document.getElementById('creatpassword')
  const mail=document.getElementById('mail')
  const bday=document.getElementById('bday')

  //nom

  if (firstname.value.length === 0) {
    initError('Ce champ est requis',firstname,2);
  }
  if (firstname.value.length > 255) {
    initError('Ce champ doit faire max 255 caractères',firstname,2);
  }
  //prenom

  if (lastname.value.length === 0) {
    initError('Ce champ est requis',lastname,2);
  }
  if (lastname.value.length > 255) {
    initError('Ce champ doit faire max 255 caractères',lastname,2);
  }

  //mdp

  if (mdp.value.length < 8) {
    initError('Passwprd min : 8 caractères',mdp,2);
  }
  if (mdp.value.length > 255) {
    initError('Ce champ doit faire max 255 caractères',mdp,2);
  }

  //mail
  if (mail.value.length ===0) {
    initError('ce champ est requis',mail,2);
  }
  // bday

  if (bday.value.length ===0) {
    initError('ce champ est requis',bday,2);
  }
 
  if (!hasError) {
    this.submit()
  }
})

// traitement avant envoi dans la base pour connexion


const form1= document.getElementById('form1')

form1.addEventListener('submit', function (event) {
  event.preventDefault();

  let hasError = false;

  const initError = (textError,champ,num) => {
    hasError = true
    champ.parentElement.classList.add('error')
    champ.parentNode.children[num].innerText = textError
  }

  const username = document.getElementById('username')
  const Password = document.getElementById('password')
 
  //nom

  if (username.value.length === 0) {
    initError('Ce champ est requis',username,2);
  }
  if (username.value.length > 255) {
    initError('Ce champ doit faire max 255 caractères',username,2);
  }
  //prenom

  if (password.value.length <8) {
    initError('Passwprd min : 8 caractères',Password,2);
  }
  if (password.value.length > 255) {
    initError('Ce champ doit faire max 255 caractères',password,2);
  }
 
  if (!hasError) {
    this.submit()
  }
})






  