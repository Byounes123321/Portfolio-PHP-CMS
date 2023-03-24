window.onload = () => {
var prevScrollPos = window.pageYOffset;
const myCheckbox = document.getElementById('check');
var mobileNav = document.getElementById("mobileNav");
const navLinks = document.getElementById("NavLinks");
const main = document.getElementById("main");
window.onscroll = function() {

  var currentScrollPos = window.pageYOffset;
  if (prevScrollPos > currentScrollPos) {
    document.querySelector(".header").classList.add("sticky");
  } else {
    document.querySelector(".header").classList.remove("sticky");
  }
  prevScrollPos = currentScrollPos;
  
}

myCheckbox.addEventListener('change', (event) => {
  const isChecked = event.target.checked;


  console.log(isChecked);
    if(isChecked){
    document.querySelector(".mobileNav").classList.add("displayed");
    document.querySelector("body").classList.add("fixed");
    main.classList.add("blur");

    navLinks.addEventListener("click", ()=>{
      document.querySelector("body").classList.remove("fixed");
      document.querySelector(".mobileNav").classList.remove("displayed");
      $(myCheckbox).prop('checked', false);



    })
    }
    else{
    document.querySelector(".mobileNav").classList.remove("displayed");
    document.querySelector("body").classList.remove("fixed");
    main.classList.remove("blur");


    }
});
}