document.addEventListener("DOMContentLoaded", function () {

const navbar = document.querySelector("nav");

window.addEventListener("scroll", function () {

if (window.scrollY > 50) {

navbar.style.background = "rgba(0,0,0,0.65)";
navbar.style.backdropFilter = "blur(12px)";
navbar.style.transition = "0.4s";

} else {

navbar.style.background = "rgba(255,255,255,0.12)";
navbar.style.backdropFilter = "blur(15px)";

}

});

const buttons = document.querySelectorAll(".hero-btn");

buttons.forEach(function(button){

button.addEventListener("mouseenter", function(){

button.style.transform = "scale(1.08)";

});

button.addEventListener("mouseleave", function(){

button.style.transform = "scale(1)";

});

});

const cards = document.querySelectorAll(".feature-box");

const observer = new IntersectionObserver(function(entries){

entries.forEach(function(entry){

if(entry.isIntersecting){

entry.target.style.opacity="1";

entry.target.style.transform="translateY(0)";

}

});

});

cards.forEach(function(card){

card.style.opacity="0";

card.style.transform="translateY(40px)";
card.style.transition="0.8s";

observer.observe(card);

});

const text = "Create • Share • Inspire";

let index = 0;

const heading = document.querySelector(".hero h1");

const type = document.createElement("h3");

type.style.marginTop="20px";
type.style.color="#FFD54F";
type.style.fontSize="28px";

document.querySelector(".hero-content").appendChild(type);

function typing(){

if(index < text.length){

type.innerHTML += text.charAt(index);

index++;

setTimeout(typing,100);

}

}

typing();

});

function confirmDelete(){

return confirm("Are you sure you want to delete this blog?");

}