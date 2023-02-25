$(document).ready(function () {

  'use-strict';

  let sideNavMenuBar, sideNavCloseMenuBar, sideNavBar, dropdown, i, dropdownContent;

  // header start 

  var mainHeader = document.querySelector(".mainHeader");
  var mainMobileHeader = document.querySelector(".mainMobileHeader");

  var sticky = mainHeader.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      mainHeader.classList.add("header-sticky");
      mainMobileHeader.classList.add("header-sticky");
    } else {
      mainHeader.classList.remove("header-sticky");
      mainMobileHeader.classList.remove("header-sticky");
    }
  }

  window.addEventListener("scroll", myFunction);


  sideNavMenuBar = document.querySelector("#sideNavMenuBar");
  sideNavCloseMenuBar = document.querySelector("#sideNavCloseMenuBar");
  sideNavBar = document.querySelector("#sideNavBar");
  dropdown = document.getElementsByClassName("sideNavDropdown");

  sideNavMenuBar.onclick = () => {
    sideNavBar.classList.add("active");
  }
  sideNavCloseMenuBar.onclick = () => {
    sideNavBar.classList.remove("active");
  }

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
      this.classList.toggle("active");
      dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
  // header end 

  // checkout js start 
  let checkbox = document.getElementById("checkDiffAddress");
  if(checkbox){
    checkbox.addEventListener("change", function () {
      let form = document.getElementById("shiptoDiffAddress");
      if (checkbox.checked) {
        form.style.display = "block";
        checkbox.value = 1;
      } else {
        form.style.display = "none";
        checkbox.value= 0
      }
    });
  }


  //  /


});