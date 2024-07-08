
document.addEventListener('DOMContentLoaded', function() {
    const hamBurger = document.querySelector(".toggle-btn");
    const sidebar = document.querySelector("#sidebar");
    const main = document.querySelector(".main");

    hamBurger.addEventListener("click", function() {
        sidebar.classList.toggle("collapse");
        main.classList.toggle("sidebar-collapsed");
        
        // Update toggle button icon if needed
        const icon = hamBurger.querySelector('i');
        if (sidebar.classList.contains('collapse')) {
            icon.classList.remove('lni-menu');
            icon.classList.add('lni-grid-alt');
        } else {
            icon.classList.remove('lni-grid-alt');
            icon.classList.add('lni-menu');
        }
    });
    
});




// const hamBurger = document.querySelector(".toggle-btn");

// hamBurger.addEventListener("click",function(){
//     document.querySelector("#sidebar").classList.toggle("expand");
// })
