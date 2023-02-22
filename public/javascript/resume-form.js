// dynamic field creation

const addBtn = document.querySelector(".add-btn-edu");
const input = document.querySelector(".input-group");



function addInput() {
    const field1 = document.createElement("input");
    field1.type = "text";
    field1.placeholder="diplome1";


    const field2 = document.createElement("input");
    field2.classList.add("field2");
    field2.type = "text";
    field2 .placeholder="diplome2";

    const field3 = document.createElement("textarea");
    field3.classList.add("desc");
    field3.type = "text";
    field3.placeholder = "desc";

    
    const btn =document.createElement("a");
    btn.className = "delete";
    btn.innerHTML = "&times";

    const flex= document.createElement("div");
    flex.className="flex";
    
    btn.addEventListener("click", deleteFunc);


    input.appendChild(flex);
    flex.appendChild(btn);
    flex.appendChild(field1);
    flex.appendChild(field2);
    flex.appendChild(field3);
    
} 

function deleteFunc (){
    this.parentElement.remove();
}
addBtn.addEventListener("click" , addInput);



