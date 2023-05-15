const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if(entry.isIntersecting){
            entry.target.classList.add("slide");
        } 
    });
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el));

function feedback(){
    const name = document.querySelector("#fname");
    const email = document.querySelector("#femail");
    if(name.value != "" && email.value != ""){
        alert("Feedback Successfully Sent!");
    } else {
        alert("Some fields are missing");
    }
}

