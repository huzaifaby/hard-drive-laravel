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



  // checkout js start 
  let checkbox = document.getElementById("checkDiffAddress");
  if (checkbox) {
    checkbox.addEventListener("change", function () {
      let form = document.getElementById("shiptoDiffAddress");
      if (checkbox.checked) {
        form.style.display = "block";
        checkbox.value = 1;
      } else {
        form.style.display = "none";
        checkbox.value = 0
      }
    });
  }
  //  /

  window.onload = () => {

    const OpenSidebarToggle = document.body.querySelector('#OpenSidebarToggle');
    const CloseSidebarToggle = document.body.querySelector('#CloseSidebarToggle');

    if (OpenSidebarToggle) {
      OpenSidebarToggle.addEventListener('click', event => {
        document.getElementById("sidenavAccordion").style.display = "flex";
      });
    }
    if (CloseSidebarToggle) {
      CloseSidebarToggle.addEventListener('click', event => {
        document.getElementById("sidenavAccordion").style.display = "none";
      });
    }

  };


  
// image zoom hover
const imageZoom = (imgID, resultID) => {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /* Create lens: */
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /* Insert lens: */
  img.parentElement.insertBefore(lens, img);
  /* Calculate the ratio between result DIV and lens: */
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /* Set background properties for the result DIV */
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /* Execute a function when someone moves the cursor over the image, or the lens: */
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /* And also for touch screens: */
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);

  function moveLens(e) {
      var pos, x, y;
      /* Prevent any other actions that may occur when moving over the image */
      e.preventDefault();
      /* Get the cursor's x and y positions: */
      pos = getCursorPos(e);
      /* Calculate the position of the lens: */
      x = pos.x - (lens.offsetWidth / 2);
      y = pos.y - (lens.offsetHeight / 2);
      /* Prevent the lens from being positioned outside the image: */
      if (x > img.width - lens.offsetWidth) {
          x = img.width - lens.offsetWidth;
      }
      if (x < 0) {
          x = 0;
      }
      if (y > img.height - lens.offsetHeight) {
          y = img.height - lens.offsetHeight;
      }
      if (y < 0) {
          y = 0;
      }
      /* Set the position of the lens: */
      lens.style.left = x + "px";
      lens.style.top = y + "px";
      /* Display what the lens "sees": */
      result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }

  function getCursorPos(e) {
      var a, x = 0,
          y = 0;
      e = e || window.event;
      /* Get the x and y positions of the image: */
      a = img.getBoundingClientRect();
      /* Calculate the cursor's x and y coordinates, relative to the image: */
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /* Consider any page scrolling: */
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {
          x: x,
          y: y
      };
  }
}
imageZoom("myimage", "myresult");

//end

});