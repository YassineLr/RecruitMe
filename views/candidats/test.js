


// Example starter JavaScript for disabling form submissions if there are invalid fields
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

var today = new Date();
var minDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

$('.datepicker').datepicker({
    endDate: minDate
});

$('.edu-date').datepicker({
    startDate: '2023-01-01'
});


var input = document.querySelector("#phone");
window.intlTelInput(input);

const formEducation = document.querySelector(".form-education");
const formEduInputs = document.querySelector("#form-educ");
const addBtn = document.querySelector(".add-btn-edu");

addBtn.addEventListener('click', event => {
    var divClone = formEduInputs.cloneNode(true);
    divClone.id = "cloneDiv";

    formEducation.appendChild(divClone);
    const cloneInputs = document.querySelectorAll("#cloneDiv input");
    for (var i = 0; i < cloneInputs.length; i++)
        cloneInputs[i].value="";

  


    var educationInputs = document.querySelectorAll('.form-education .form-control');
    var educationForms = document.querySelectorAll(".form-education .form-educ");
    var saveButtons = document.querySelectorAll(".saveBtn");
    var deleteButtons = document.querySelectorAll(".delete-btn");
    for (var i = 0; i < deleteButtons.length; i++)
        deleteButtons[i].id = "delete-btn-"+i;
    // Set their ids
    for (var i = 0; i < saveButtons.length; i++)
        saveButtons[i].id = i;
    for (var i = 0; i < educationInputs.length; i++)
        educationInputs[i].id = 'abc-' + i;
    for (var i = 0; i < educationForms.length; i++) {
        educationForms[i].id = 'edu-form-' + i;

        // Get a reference to the parent element that contains both buttons
        const parentElement = document.querySelector("#edu-form-" + i);

        // Add an event listener to the parent element
        parentElement.addEventListener('click', (event) => {

            // Check if the click event was triggered by the button you want to target
            if (event.target && event.target.id == "delete-btn-"+(i-1)) {
                // Perform the desired action when the button is clicked
            
                const element = document.querySelector("#edu-form-"+(i-1));
                element.remove();
            }
            
        });
    }
})


const formExperience = document.querySelector(".form-experience");
const formExpInputs = document.querySelector("#form-exp");
const addBtnExp = document.querySelector(".add-btn-exp");

addBtnExp.addEventListener('click', event => {
    var divClone = formExpInputs.cloneNode(true);
    divClone.id = "cloneDiv";

    formExperience.appendChild(divClone);
    const cloneInputs = document.querySelectorAll("#cloneDiv input");
    for (var i = 0; i < cloneInputs.length; i++)
        cloneInputs[i].value="";


    var expInputs = document.querySelectorAll('.form-experience .form-control');
    var expForms = document.querySelectorAll(".form-experience .form-exp");
    var deleteButtons = document.querySelectorAll(".delete-btn-exp");
    for (var i = 0; i < deleteButtons.length; i++)
        deleteButtons[i].id = "delete-btn-exp-"+i;
    // Set their ids
    
    for (var i = 0; i < expInputs.length; i++)
        expInputs[i].id = 'abc-' + i;
    for (var i = 0; i < expForms.length; i++) {
        expForms[i].id = 'exp-form-' + i;

        // Get a reference to the parent element that contains both buttons
        const parentElement = document.querySelector("#exp-form-" + i);

        // Add an event listener to the parent element
        parentElement.addEventListener('click', (event) => {

            // Check if the click event was triggered by the button you want to target
            if (event.target && event.target.id == "delete-btn-exp-"+(i-1)) {
                // Perform the desired action when the button is clicked
            
                const element = document.querySelector("#exp-form-"+(i-1));
                element.remove();
            }
            
        });
    }
})