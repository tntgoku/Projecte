document.addEventListener("DOMContentLoaded", function() {
    let sidebarBtn = document.querySelector(".sidebarBtn");
    let sidebar = document.querySelector(".sidebar");
    let section=document.querySelector('.home-section')
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        section.classList.toggle("active")
    }
});
