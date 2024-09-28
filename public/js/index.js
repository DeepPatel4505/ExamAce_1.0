document.getElementById("hamburger-menu").addEventListener("click", function () {
    const navbarList = document.getElementById("navbar-list");
    navbarList.classList.toggle("active");
});


const searchButton = document.querySelector(".navbar-searchbar > span");

searchButton.addEventListener("click",()=>{
    window.location.href = "/ExamAce/profile.php";
})