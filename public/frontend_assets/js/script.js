$(document).ready(function () {

  'use-strict';

  let swiper, sideNavMenuBar, sideNavCloseMenuBar, sideNavBar, dropdown, i, dropdownContent;

  // header start 
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

  // banner start 
  swiper = new Swiper(".bannerSwiper", {
    spaceBetween: 30,
    grabCursor: true,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  // banner end 

  swiper = new Swiper(".productSlide", {
    slidesPerView: 1,
    spaceBetween: 10,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      type: 'bullets',
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });


  swiper = new Swiper(".newArrivalsSlide", {
    slidesPerView: 1,
    spaceBetween: 10,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      type: 'bullets',
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });


  swiper = new Swiper(".brandsSlide", {
    spaceBetween: 10,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      type: 'bullets',
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 5,
      },
    },
  });


  // inner category listing start 
  swiper = new Swiper('.latestProductSwiper', {
    direction: 'horizontal',
    slidesPerView: 1,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });
  // inner category listing end 


});