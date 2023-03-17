const navBar = document.querySelector("nav"),
  menuBtns = document.querySelectorAll(".menu-icon"),
  overlay = document.querySelector(".overlay");

menuBtns.forEach((menuBtn) => {
  menuBtn.addEventListener("click", () => {
    navBar.classList.toggle("open");
  });
});

overlay.addEventListener("click", () => {
  navBar.classList.remove("open");
});

const profileLink= document.getElementById("profile-link")


$("#profile-link").click(function () {
  $("#content-wrapper").load("/RecruitMe/views/candidats/resume-form.php");
});
