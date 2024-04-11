let themeToggler = document.querySelector('#theme-toggler');
const form = document.querySelector('form');


themeToggler.onclick = () =>{
    themeToggler.classList.toggle('fa-moon-o');
    if(themeToggler.classList.contains('fa-moon-o')){
        document.body.classList.add('active');
    }else{
        document.body.classList.remove('active');
    }
}