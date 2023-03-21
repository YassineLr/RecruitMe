const fillResumeDrop = document.querySelector(".fill-cv");


fillResumeDrop.addEventListener('dragover', (e) => {
    e.preventDefault();
    fillResumeDrop.classList.add("hover");
})

fillResumeDrop.addEventListener('dragleave', (e) => {

    fillResumeDrop.classList.remove("hover");
})

const uploadIcon = document.querySelector(".fa-cloud-arrow-up");
const uploadLabel = document.querySelector("#up-label");


fillResumeDrop.addEventListener('drop', (e) => {
    e.preventDefault();
    const pdf = e.dataTransfer.files[0];
    const type = pdf.type;
    console.log(type)
    fillResumeDrop.classList.remove("hover");

    if (type == "application/pdf") {
        return correctUpload(pdf);
    }
    else {
        return wrongUpload()
    }

})

const correctUpload = (pdf) => {
    uploadIcon.style.color = "green";
    uploadLabel.style.fontSize = "15px";
    uploadLabel.innerText = pdf.name + " a été ajouté";


}

const wrongUpload = (pdf) => {
    uploadIcon.style.color = "red";
    uploadLabel.style.fontSize = "15px";
    if (pdf.size > 1048576) {
        uploadLabel.innerText = "Veuillez télécharger un PDF < 1MB";
    }
    else {
        uploadLabel.innerText = "Veuillez Selectioner un PDF";
    }

}



const uploadInput = document.querySelector(".upload-input").addEventListener("change", (e) => {
    const pdf = e.target.files[0];
    const type = pdf.type;
    const size = pdf.size;
    console.log(size);
    console.log(type)

    fillResumeDrop.classList.remove("hover");

    if (type == "application/pdf" && size < 1048576) {

        return correctUpload(pdf);
    }
    else {
        return wrongUpload(pdf);
    }

})


function submitPdf() {
   
    const fileInput = document.getElementById('myFile');
    const file = fileInput.files[0];
    const formData = new FormData();
    if (file.type == "application/pdf" && file.size < 1048576) {
        formData.append('file', file);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/RecruitMe/controllers/upload.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = xhr.responseText;
                console.log(response);
           

                localStorage.setItem("response", response);
                window.location.href = "./resume-form.php";

            }
            else {
                console.log("error");
            }
        };

        xhr.send(formData);
    }
    else {
        false;
    }

}