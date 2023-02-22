


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

$('.datepicker .edu-date-begin').datepicker({
    startDate: '2023-01-01'
});


var input = document.querySelector("#phone");
window.intlTelInput(input);

const formEducation = document.querySelector(".form-education");
const formEduInputs = document.querySelector("#form-educ");

const addBtn = document.querySelector(".add-btn-edu");
addBtn.addEventListener('click', event => {
    var divClone = formEduInputs.cloneNode(true);
    
    formEducation.appendChild(divClone);

    const deleteBtn = document.querySelector(".delete-btn");

    deleteBtn.addEventListener('click',deleteFunc);


    var educationInputs = document.querySelectorAll('.form-education .form-control');
    var educationForms = document.querySelectorAll(".form-education .form-educ")
    // Set their ids
    for (var i = 0; i < educationInputs.length; i++)
        educationInputs[i].id = 'abc-' + i;
    for (var i = 0; i < educationForms.length; i++)
        educationForms[i].id = 'edu-form-' + i;
    
})


function deleteFunc(){
    var educationForms = document.querySelectorAll(".form-education .form-educ")

    for (var i = 0; i < educationForms.length; i++)
        educationForms[i].id = 'edu-form-' + i;
    var i = 0;
    document.querySelector("#edu-form-"+i).remove();
    // this.parentElement.remove();
}
