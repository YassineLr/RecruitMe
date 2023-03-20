

var input = document.querySelector("#phone");
window.intlTelInput(input);

const formPers = document.querySelector(".form-resume");
const persInputs = formPers.querySelectorAll("input,select,textarea");

for (var i = 0; i < persInputs.length; i++) {
    persInputs[i].name = 'pers-input-' + i;

}

const email = localStorage.getItem("userEmail");


const emailInput = document.getElementsByName("pers-input-3")[0];

emailInput.value = email;



// EDUCATION ADD FORM FUNCTION

const formEducation = document.querySelector(".form-education");
const formEduInputs = document.querySelector("#edu-form-0");
const addEduBtn = document.querySelector(".add-btn-edu");

var educationInputs = document.querySelectorAll('.form-education .form-control, .form-education .form-select');

for (var i = 0; i < educationInputs.length; i++)
    // educationInputs[i].id = 'education-input-' + i;
    educationInputs[i].name = 'education-input-' + i;

function addEduForm() {

    var divClone = formEduInputs.cloneNode(true);
    divClone.id = "cloneDiv";

    formEducation.appendChild(divClone);
    const cloneInputs = document.querySelectorAll("#cloneDiv input, textarea");
    for (var i = 0; i < cloneInputs.length; i++)
        cloneInputs[i].value = "";


    var educationInputs = document.querySelectorAll('.form-education .form-control, .form-education .form-select');
    var educationForms = document.querySelectorAll(".form-education .form-educ");
    var saveButtons = document.querySelectorAll(".saveBtn");
    var deleteButtons = document.querySelectorAll(".delete-btn");
    for (var i = 0; i < deleteButtons.length; i++)
        deleteButtons[i].id = "delete-btn-" + i;
    // Set their ids
    for (var i = 0; i < saveButtons.length; i++)
        saveButtons[i].id = i;
    for (var i = 0; i < educationInputs.length; i++)
        // educationInputs[i].id = 'education-input-' + i;
        educationInputs[i].name = 'education-input-' + i;
    for (var i = 0; i < educationForms.length; i++) {
        educationForms[i].id = 'edu-form-' + i;

        // Get a reference to the parent element that contains both buttons
        const parentElement = document.querySelector("#edu-form-" + i);

        // Add an event listener to the parent element
        parentElement.addEventListener('click', (event) => {
            // Check if the click event was triggered by the button you want to target
            if (event.target && event.target.id == "delete-btn-" + (i - 1)) {
                // Perform the desired action when the button is clicked
                const element = document.querySelector("#edu-form-" + (i - 1));
                element.remove();
            }

        });
    }
}

addEduBtn.addEventListener('click', (e) => {
    e.preventDefault();
    addEduForm();
})


// EXPERIENCE ADD FORM FUNCTION

const formExperience = document.querySelector(".formExp");
const formExpInputs = document.querySelector("#exp-form-0");
const addBtnExp = document.querySelector(".add-btn-exp");

var expInputs = document.querySelectorAll('.form-experience .form-control');
for (var i = 0; i < expInputs.length; i++)
    // expInputs[i].id = 'exp-input-' + i;
    expInputs[i].name = 'exp-input-' + i;

function addExpForm() {
    var divClone = formExpInputs.cloneNode(true);
    divClone.id = "cloneDiv";

    formExperience.appendChild(divClone);
    const cloneInputs = document.querySelectorAll("#cloneDiv input,textarea");
    for (var i = 0; i < cloneInputs.length; i++)
        cloneInputs[i].value = "";


    var expInputs = document.querySelectorAll('.form-experience .form-control');
    var expForms = document.querySelectorAll(".form-experience .form-exp");
    var deleteButtons = document.querySelectorAll(".delete-btn-exp");
    for (var i = 0; i < deleteButtons.length; i++)
        deleteButtons[i].id = "delete-btn-exp-" + i;
    // Set their ids

    for (var i = 0; i < expInputs.length; i++)
        // expInputs[i].id = 'exp-input-' + i;
        expInputs[i].name = 'exp-input-' + i;
    for (var i = 0; i < expForms.length; i++) {
        expForms[i].id = 'exp-form-' + i;

        // Get a reference to the parent element that contains both buttons
        const parentElement = document.querySelector("#exp-form-" + i);

        // Add an event listener to the parent element
        parentElement.addEventListener('click', (event) => {

            // Check if the click event was triggered by the button you want to target
            if (event.target && event.target.id == "delete-btn-exp-" + (i - 1)) {
                // Perform the desired action when the button is clicked

                const element = document.querySelector("#exp-form-" + (i - 1));
                element.remove();
            }

        });
    }
}

addBtnExp.addEventListener('click', (e) => {
    e.preventDefault();
    addExpForm();
})


// SKILLS ADD FORM FUNCTION

const formCompetence = document.querySelector(".formSkill");
const formCompInputs = document.querySelector("#comp-form-0");
const addBtnComp = document.querySelector(".add-btn-comp");

var compInputs = document.querySelectorAll('.form-competence .form-control, .skill-select');

for (var i = 0; i < compInputs.length; i++)
    compInputs[i].name = 'skill-input-' + i;

function addSkillsForm() {
    var divClone = formCompInputs.cloneNode(true);
    divClone.id = "cloneDiv";

    formCompetence.appendChild(divClone);
    const cloneInputs = document.querySelectorAll("#cloneDiv input");
    for (var i = 0; i < cloneInputs.length; i++)
        cloneInputs[i].value = "";


    var compInputs = document.querySelectorAll('.form-competence .form-control, .skill-select');
    var compForms = document.querySelectorAll(".form-competence .form-comp");
    var deleteButtons = document.querySelectorAll(".delete-btn-comp");
    for (var i = 0; i < deleteButtons.length; i++)
        deleteButtons[i].id = "delete-btn-comp-" + i;
    // Set their ids

    for (var i = 0; i < compInputs.length; i++)
        compInputs[i].name = 'skill-input-' + i;
    for (var i = 0; i < compForms.length; i++) {
        compForms[i].id = 'comp-form-' + i;

        // Get a reference to the parent element that contains both buttons
        const parentElement = document.querySelector("#comp-form-" + i);

        // Add an event listener to the parent element
        parentElement.addEventListener('click', (event) => {

            // Check if the click event was triggered by the button you want to target
            if (event.target && event.target.id == "delete-btn-comp-" + (i - 1)) {
                // Perform the desired action when the button is clicked

                const element = document.querySelector("#comp-form-" + (i - 1));
                element.remove();
            }

        });
    }
}
addBtnComp.addEventListener('click', (e) => {
    e.preventDefault();
    addSkillsForm();
})


// LANGUAGES ADD FORM FUNCTION

const formLang = document.querySelector(".formlang");
const formLangInputs = document.querySelector("#lang-form-0");
const addBtnLang = document.querySelector(".add-btn-lang");

var langInputs = document.querySelectorAll('.form-language .form-control, .lang-select');

for (var i = 0; i < langInputs.length; i++)
    langInputs[i].name = 'lang-input-' + i;

function addLangsForm() {
    var divClone = formLangInputs.cloneNode(true);
    divClone.id = "cloneDiv";

    formLang.appendChild(divClone);
    const cloneInputs = document.querySelectorAll("#cloneDiv input");
    for (var i = 0; i < cloneInputs.length; i++)
        cloneInputs[i].value = "";


    var langInputs = document.querySelectorAll('.form-language .form-control, .lang-select');
    var langForms = document.querySelectorAll(".form-language .form-lang ");
    var deleteButtons = document.querySelectorAll(".delete-btn-lang");
    for (var i = 0; i < deleteButtons.length; i++)
        deleteButtons[i].id = "delete-btn-lang-" + i;
    // Set their ids

    for (var i = 0; i < langInputs.length; i++)
        // langInputs[i].id = 'lang-input-' + i;
        langInputs[i].name = 'lang-input-' + i;
    for (var i = 0; i < langForms.length; i++) {
        langForms[i].id = 'lang-form-' + i;

        // Get a reference to the parent element that contains both buttons
        const parentElement = document.querySelector("#lang-form-" + i);

        // Add an event listener to the parent element
        parentElement.addEventListener('click', (event) => {

            // Check if the click event was triggered by the button you want to target
            if (event.target && event.target.id == "delete-btn-lang-" + (i - 1)) {
                // Perform the desired action when the button is clicked

                const element = document.querySelector("#lang-form-" + (i - 1));
                element.remove();
            }

        });
    }
}

addBtnLang.addEventListener('click', (e) => {
    e.preventDefault();
    addLangsForm();
})



// SUBMIT FUNCTION

const finalSubmit = document.querySelector(".final-submit");
finalSubmit.addEventListener("click", event => {
    console.log("heeeloo");


    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()

                }

                form.classList.add('was-validated')


            }, false)

        })

    })()




})




var localItems = localStorage.getItem("response");
const parsedItems = JSON.parse(localItems);

var skillsLength = parsedItems.Comp.length;
var experienceLength = parsedItems.Exp.length;
var educationLength = parsedItems.Edu.length;
var languagesLength = parsedItems.Lang.length;




////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


// EXPERIENCE FORM DYNAMIC INPUT FILLING

function fillExpInputs(inputId, diplomat) {
    document.getElementsByName("exp-input-" + inputId)[0].value = diplomat;
}


// ADDING EXPERRIENCE FORMS
for (i = 0; i < experienceLength - 1; i++) {
    addExpForm();

}

var k = (experienceLength - 1) * 6;


// FILLING INPUTS
for (i = 0; i < experienceLength; i++) {
    var diplomat = parsedItems.Exp[i].keyword;
    var diplomatUpper = diplomat[0].toUpperCase() + diplomat.substring(1);

    fillExpInputs(k, diplomatUpper);
    k = k - 6;
}




////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////



// EDUCATION FORM DYNAMIC INPUT FILLING

function fillEduInputs(inputId, diplomat) {

    if (diplomat == "Licence") {
        document.getElementsByName("education-input-" + inputId)[0].value = "bac3";

    }
    else if (diplomat == "Baccalauréat") {
        document.getElementsByName("education-input-" + inputId)[0].value = "bac";

    }
    else if (diplomat == "Master") {
        document.getElementsByName("education-input-" + inputId)[0].value = "bac5";

    }
    else if (diplomat == "Doctorat") {
        document.getElementsByName("education-input-" + inputId)[0].value = "doctorat";

    }
}


// ADDING EDUCATION FORMS
for (i = 0; i < educationLength - 1; i++) {
    addEduForm();

}

var k = (educationLength - 1) * 6;


// FILLING INPUTS
for (i = 0; i < educationLength; i++) {
    var diplomat = parsedItems.Edu[i].keyword;
    var diplomatUpper = diplomat[0].toUpperCase() + diplomat.substring(1);

    fillEduInputs(k, diplomatUpper);
    k = k - 6;
}


////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////



// SKILLS FORM DYNAMIC INPUT FILLING

function fillSkillsInputs(inputId, diplomat) {
    document.getElementsByName("skill-input-" + inputId)[0].value = diplomat;
}

// ADDING SKILLS FORMS
for (i = 0; i < skillsLength - 1; i++) {
    addSkillsForm();
}

var k = 0;

// FILLING INPUTS
for (i = 0; i < skillsLength; i++) {
    var diplomat = parsedItems.Comp[i].keyword;

    var diplomatUpper = diplomat[0].toUpperCase() + diplomat.substring(1);

    fillSkillsInputs(k, diplomatUpper);
    k = k + 2;
}


////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


// LANG FORM DYNAMIC INPUT FILLING

function fillLangsInputs(inputId, diplomat) {
    document.getElementsByName("lang-input-" + inputId)[0].value = diplomat;
}

// ADDING LANG FORMS
for (i = 0; i < languagesLength - 1; i++) {
    addLangsForm();
}

var k = 0;

// FILLING INPUTS
for (i = 0; i < languagesLength; i++) {
    var diplomat = parsedItems.Lang[i].keyword;

    var diplomatUpper = diplomat[0].toUpperCase() + diplomat.substring(1);

    fillLangsInputs(k, diplomatUpper);
    k = k + 2;
}


////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


const persScroll = document.getElementById("pers-scroll");
const educScroll = document.getElementById("educ-scroll");
const expScroll = document.getElementById("exp-scroll");
const skillScroll = document.getElementById("skill-scroll");
const langScroll = document.getElementById("lang-scroll");
const tabLink = document.querySelectorAll(".nav-follow-item");

function scrollToDiv(pos) {

    var targetDiv = document.getElementsByClassName(pos)[0];
    targetDiv.scrollIntoView({ behavior: "smooth" });
}

persScroll.addEventListener('click', function () {
    scrollToDiv("form-resume");


});
educScroll.addEventListener('click', function () {
    scrollToDiv("form-education");


});
expScroll.addEventListener('click', function () {
    scrollToDiv("form-experience");


});
skillScroll.addEventListener('click', function () {
    scrollToDiv("form-competence");
});
langScroll.addEventListener('click', function () {
    scrollToDiv("form-language");
});


tabLink.forEach(function (item) {
    item.addEventListener(
        "click",
        function (e) {
            // ADDS AND REMOVES ACTIVE CLASS ON TABLINKS
            tabLink.forEach(function (item) {
                item.classList.remove("side-bar-clicked");
            });
            item.classList.add("side-bar-clicked");
            // SOMEHOW EQUATE TAB LINKS TO TAB PANES

        },
        false
    );
});




function setupIntersectionObserver(targets, options, callback) {
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                callback(entry.target, true);
            } else {
                callback(entry.target, false);
            }
        });
    }, {
        rootMargin: '-400px 0px'
    });

    targets.forEach(target => {
        observer.observe(target);
    });
}

const targetDivs = document.querySelectorAll('.form-section');

setupIntersectionObserver(targetDivs, {}, (target, inView) => {
    if (inView) {
        tabLink.forEach(function (item) {

            // ADDS AND REMOVES ACTIVE CLASS ON TABLINKS
            tabLink.forEach(function (item) {
                item.classList.remove("side-bar-clicked");
            });


            if (target.id == "form-competence") {
                skillScroll.classList.add("side-bar-clicked");
            }
            else if (target.id == "form-resume") {
                persScroll.classList.add("side-bar-clicked");
            }
            else if (target.id == "form-experience") {
                expScroll.classList.add("side-bar-clicked");
            }
            else if (target.id == "form-language") {
                langScroll.classList.add("side-bar-clicked");
            }
            else if (target.id == "form-education") {
                educScroll.classList.add("side-bar-clicked");
            }

        });
    }
});


function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function () {
            preview.src = reader.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

