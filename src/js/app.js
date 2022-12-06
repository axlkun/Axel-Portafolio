document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',navegacionResponsive);
    mobileMenu.addEventListener('click',menu);
    loginError();
    hideFloatButton();
}

function navegacionResponsive(){
    
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');

}


function menu(){
    const navegacion = document.querySelector('.navegacion');
    const mobileMenu = document.querySelector('.mobile-menu');

    if(navegacion.classList.contains('mostrar')){
            mobileMenu.innerHTML = '<lottie-player src="/build/img/menuV2.json" background="transparent"  speed="3"  style="width: 48px; height: 48px;" autoplay hover></lottie-player>';
            // console.log("muestra");
        }else{
            mobileMenu.innerHTML = '<lottie-player src="/build/img/menuV2.json" direction="-1" background="transparent"  speed="10"  style="width: 48px; height: 48px;" autoplay></lottie-player>';
            // console.log('oculta');
        }
}

// function scrollNav(){
//     const enlaces = document.querySelectorAll('.navegacion a');

//     //se itera en cada enlace para agregar un event listener
//     enlaces.forEach(enlace =>{
//         enlace.addEventListener('click',function(e){
//             e.preventDefault();
//             const seccionScroll = e.target.attributes.href.value; //accedemos al valor del href de cada enlace
//             const seccion = document.querySelector(seccionScroll);
//             seccion.scrollIntoView({behavior:'smooth'});
//         });
//     });
// }

// function navegacionFija(){
//     const barra = document.querySelector('.header');
//     const sobremi = document.querySelector('.sobre-mi');

//     window.addEventListener('scroll', function(){
//         if(sobremi.getBoundingClientRect().top < 0){
//             barra.classList.add('fijo');
//         }else{
//             barra.classList.remove('fijo');
//         }
//     })
// }

function hideFloatButton(){
    const floatButton = document.querySelector('.up');
    const inicio = document.querySelector('.inicio');
    const final = document.querySelector('.contacto');

    window.addEventListener('scroll', function(){
        if(inicio.getBoundingClientRect().top < 0 && screen.width > 992){
            floatButton.classList.add('show');
        }
        else{
            floatButton.classList.remove('show');
        }

        if(final.getBoundingClientRect().top < 0 && screen.width > 992){
            floatButton.classList.remove('show');
        }
    })
}

function loginError(){
    
    const login = document.querySelector('.login');
    //const alerta = document.querySelector('.alerta');

    if(document.querySelector('#eror.alerta')){
        if(screen.width > 768){
        login.style.setProperty('align-items','normal');
        //alerta.style.setProperty('margin','1rem auto');
        }
    }
}
