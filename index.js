console.log("hello! welcome to my website!");

//Interactive box

const myBox = document.getElementById("myBox");

myBox.addEventListener("click", function(event){
    event.target.style.backgroundColor = "red";
    event.target.textContent = "Hello!!";
});

myBox.addEventListener(`mouseover`, event => {
    event.target.style.backgroundColor = "gray";
    event.target.textContent = "Go on...";
});

myBox.addEventListener(`mouseout`, event => {
    event.target.style.backgroundColor = "black";
    event.target.textContent = "Click me";
})

// Image slider

const slides = document.querySelectorAll(".slides img");
let slideIndex = 0;
let intervalId = null;

document.addEventListener(`DOMContentLoaded`, initializeSlider);

function initializeSlider(){
    if(slides.length > 0){
        slides[slideIndex].classList.add("displaySlide");
        intervalId = setInterval(nextSlide, 5000);
    }
}
function showSlide(index){
    if(index >= slides.length){
        slideIndex = 0;
    }
    else if(index < 0){
        slideIndex = slides.length - 1;
    }
    slides.forEach(slide => {
        slide.classList.remove("displaySlide");
    });
    slides[slideIndex].classList.add("displaySlide");
}
function prevSlide(){
    clearInterval(intervalId);
    slideIndex--;
    showSlide(slideIndex);
}
function nextSlide(){
    slideIndex++;
    showSlide(slideIndex);
}

//happy birthday!!

function happyBirthday(username, age){
    console.log("Happy birthday to you!");
    console.log("Happy birthday to you!");
    console.log(`Happy birthday dear ${username}!`);
    console.log("Happy birthday to you!");
    console.log(`You are ${age} years old`);
}

happyBirthday("mee", 16);
happyBirthday("you", 9001);