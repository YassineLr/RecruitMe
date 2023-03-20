const navBar = document.querySelector("nav"),
  menuBtns = document.querySelectorAll(".menu-icon"),
  overlay = document.querySelector(".overlay");
textLogo = document.querySelector(".logo .logo-name");
iconLogo = document.querySelector(".logo .menu-icon");

menuBtns.forEach((menuBtn) => {
  menuBtn.addEventListener("click", () => {
    navBar.classList.toggle("open");
    if (!navBar.classList.contains("open")) {
      textLogo.style.color = "white";
      iconLogo.style.color = "white";
    }
    else {
      textLogo.style.color = "black";
      iconLogo.style.color = "black";
    }


  });
});

overlay.addEventListener("click", () => {
  navBar.classList.remove("open");
  textLogo.style.color = "white";
  iconLogo.style.color = "white";
});

const profileLink = document.getElementById("profile-link");
const contentProfile = document.getElementById("content-wrapper-profile");
const contentOpps = document.getElementById("content-wrapper-opportunities");
const listLinks = document.querySelectorAll(".lists > li > a");



$("#content-wrapper-profile").load("/RecruitMe/controllers/candidat-forms/resume-form-dashboard.php", function () {

  $.getScript("/RecruitMe/public/javascript/dashboard-form-candidat.js", function () {
    
  });

});

$("#content-wrapper-opportunities").load("/RecruitMe/controllers/sign-up-login/view-jobs-candidat.php", function () {
  const view = document.getElementsByName("view");
  view.forEach(element => {
      element.addEventListener("click", function () {

          contentHidden.classList.add("active");
          contentOpps.classList.remove("active");
          contentProfile.classList.remove("active");


          console.log("d");
          
      })
  });

});

$("#profile-link").click(function () {


  const test = document.getElementsByName("pers-input-2");
  console.log(test);

});
listLinks.forEach(link => {
  link.addEventListener("click", (e) => {
    if (link.id == "profile-link") {
      console.log("ddd");
      if (!contentProfile.classList.contains("active")) {
        contentProfile.classList.add("active");
        contentOpps.classList.remove("active");

      }

    }
    else {
      if (!contentOpps.classList.contains("active")) {
        contentOpps.classList.add("active");
        contentProfile.classList.remove("active");
      }

      console.log("efff");
    }
  })
});


