const view = document.getElementsByName("view");
view.forEach(element => {
    element.addEventListener("click", function () {

        contentHidden.classList.add("active");
        contentOpps.classList.remove("active");
        contentProfile.classList.remove("active");

        
        console.log("d");
    })
});

