const inputElements = [...document.querySelectorAll('input.code-input')]
var totalSeconds = 60;
var secondsLabel = document.getElementById("seconds");
var minutesLabel = document.getElementById("minutes");
var noticeLink = document.getElementById("notice");


minutesLabel.value = "00";
var timer = setInterval(setTime, 1000);

function setTime() {
    if (totalSeconds > 0) {
        --totalSeconds;
        secondsLabel.innerHTML = pad(totalSeconds % 60);
        minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    } else {
        noticeLink.style.display = "block";
        clearInterval(timer);

    }
}

function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
        return "0" + valString;
    } else {
        return valString;
    }
}

inputElements.forEach((ele, index) => {
    ele.addEventListener('keydown', (e) => {
        // if the keycode is backspace & the current field is empty
        // focus the input before the current. Then the event happens
        // which will clear the "before" input box.

        if (e.keyCode === 8 && e.target.value === '') inputElements[Math.max(0, index - 1)].focus()
        inputElements.forEach(element => {
            element.style.color = "black";

        });
    })
    ele.addEventListener('input', (e) => {
        var numbers = /^[0-9]+$/;
        if (ele.value.match(numbers)) {
            inputElements.forEach(element => {
                element.style.color = "black";

            });
            const [first, ...rest] = e.target.value
            e.target.value = first ?? '' // first will be undefined when backspace was entered, so set the input to ""
            const lastInputBox = index === inputElements.length - 1
            const didInsertContent = first !== undefined

            if (didInsertContent && !lastInputBox) {
                // continue to input the rest of the string
                inputElements[index + 1].focus()
                inputElements[index + 1].value = rest.join('')
                inputElements[index + 1].dispatchEvent(new Event('input'))
            }

            else if (didInsertContent && lastInputBox) {
                var code = "";

                inputElements.forEach(element => {
                    code += element.value;
                });


                // var vercode = localStorage.getItem('verCode');
                function getCookie(name) {
                    const value = `; ${document.cookie}`;
                    const parts = value.split(`; ${name}=`);
                    if (parts.length === 2) {
                        return parts.pop().split(';').shift();
                    }
                }

                const encryptedVerCode = getCookie("vercode");
                var decryptedVerCode1 = encryptedVerCode.substring(18, 20);
                var decryptedVerCode2 = encryptedVerCode.substring(32, 36);
                var decryptedVerCode = decryptedVerCode1 + decryptedVerCode2;
                var userType = encryptedVerCode.substring(64);
                console.log(userType);


                console.log(decryptedVerCode);
                if (decryptedVerCode == code) {
                    inputElements.forEach(element => {
                        element.style.color = "green";

                    });
                    const formData = new FormData();
                    formData.append('checked', true);
                    // Create a new XMLHttpRequest object
                    var xhr = new XMLHttpRequest();

                    // Set the URL and method for the request
                    xhr.open("POST", "/RecruitMe/controllers/includes/signup.php", true);

                    // Set the content type of the request
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const response = xhr.responseText;
                            console.log(response);


                        }
                        else {
                            console.log("error");

                        }
                    };
                    // Set the data to be sent in the request body


                    // Send the request with the data
                    xhr.send(formData);


                    if (userType == "1") {
                        window.location.href = "/RecruitMe/views/candidats/fill-method.php"

                    }
                    else {
                        window.location.href = "/RecruitMe/controllers/candidat-forms/dashboard-rec.php"

                    }

                }
                else {
                    inputElements.forEach(element => {
                        element.style.color = "red";

                    });

                }
            }
        }
        else {
            e.target.value = "";
        }
        // take the first character of the input
        // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
        // but I'm willing to overlook insane security code practices.

    })
})


// mini example on how to pull the data on submit of the form
function onSubmit(e) {
    e.preventDefault()
    const code = inputElements.map(({ value }) => value).join('')
    console.log(code)
}