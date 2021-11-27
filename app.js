// const student_icon = document.getElementById('student_icon');
// const modal_container = document.getElementById('modal_container');
// const close = document.getElementById('close');
            
// open.addEventListener('click', () => {
//     modal_container.classList.add('show');
// });

// close.addEventListener('click', () => {
//     modal_container.classList.remove('show');
// });


// Register js //
window.onbeforeunload = function(e) {
    // Turning off the event
    e.preventDefault();
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    let charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}



const Username = document.querySelector("#UserName")
const Password = document.querySelector("#PassWord")
const Id = document.querySelector("#ID")
const Firstname = document.querySelector("#FirstName")
const Middlename = document.querySelector("#MiddleName")
const Lastname = document.querySelector("#LastName")

 Username.value = sessionStorage.getItem('username')
 Password.value = sessionStorage.getItem('password')
 Id.value = sessionStorage.getItem('id')
 Firstname.value = sessionStorage.getItem('firstname')
 Middlename.value = sessionStorage.getItem('middlename')
 Lastname.value = sessionStorage.getItem('lastname')
 if(sessionStorage.getItem("autosave")){
    Username.value = sessionStorage.getItem("autosave");
    }
    if(sessionStorage.getItem("autosave2")){
    Password.value = sessionStorage.getItem("autosave2");
}
if(sessionStorage.getItem("autosave3")){
    Id.value = sessionStorage.getItem("autosave3");
}
if(sessionStorage.getItem("autosave4")){
    Firstname.value = sessionStorage.getItem("autosave4")
}
if(sessionStorage.getItem("autosave5")){
    Middlename.value = sessionStorage.getItem("autosave5")
}
if(sessionStorage.getItem("autosave6")){
    Lastname.value = sessionStorage.getItem("autosave6")
}




Username.addEventListener("change", function() {
    sessionStorage.setItem("autosave", Username.value);
})
Password.addEventListener("change", function(){
    sessionStorage.setItem("autosave2", Password.value);  
})
Id.addEventListener("change", function(){
    sessionStorage.setItem("autosave3", Id.value);
})
Firstname.addEventListener("change", function(){
    sessionStorage.setItem("autosave4", Firstname.value);
})
Middlename.addEventListener("chnage", function(){
    sessionStorage.setItem("autosave5", Middlename.value);
})
Lastname.addEventListener("change", function(){
    sessionStorage.setItem("autosave6", Lastname.value);
})
sessionStorage.removeItem("autosave");
sessionStorage.removeItem("autosave2");
sessionStorage.removeItem("autosave3");
sessionStorage.removeItem("autosave4");
sessionStorage.removeItem("autosave5");
sessionStorage.removeItem("autosave6");    

    

// Student login //
       
