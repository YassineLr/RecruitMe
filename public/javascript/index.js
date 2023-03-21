"use strict";

// Getting cards
const signin_card = document.getElementById("home");
const signup_card = document.getElementById("signup");

// Getting buttons
// const switch_signin = document.getElementById("switch_signin");
const switch_signup = document.getElementById("switch_signup");

// Hiding signup card
signup.style.display = "none";

// Switching to signup card
switch_signup.addEventListener("click", () => {
  signup.style.display = "block";
  home.style.display = "none";
});

// Switching to signin card
switch_signin.addEventListener("click", () => {
  signin_card.style.display = "none";
  signup_card.style.display = "block";
});

$(document).ready(function() {
  $('#fullpage').fullpage({
    navigation: true,
    navigationPosition: 'right',
    navigationTooltips: ['section1', 'section2','section3','section4',],
    showActiveTooltip: true,
    slidesNavigation: true,
      slidesNavPosition: 'bottom',
    controlArrows:false,
  });
});
