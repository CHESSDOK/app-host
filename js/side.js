// menu
document.addEventListener("DOMContentLoaded", function () {
    const burgerBtn = document.getElementById("burger-btn");
    const sideMenu = document.getElementById("side-menu");
    const closeBotn = document.getElementById("close-botns");
    const logoutBtn = document.getElementById("logout");
  
    burgerBtn.addEventListener("click", function () {
      sideMenu.style.right = "0";
    });
  
    closeBotn.addEventListener("click", function () {
      sideMenu.style.right = "-250px";
    });
  
    logoutBtn.addEventListener("click", function () {
      // Add your logout functionality here
      console.log("Logout clicked");
    });
  });