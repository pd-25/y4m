// ----- collapsible box --------------
// var coll = document.getElementsByClassName("collapsible-btn");
// var i;

// for (i = 0; i < coll.length; i++) {
//   coll[i].addEventListener("click", function() {
//     this.classList.toggle("active");
//     var content = this.nextElementSibling;
//     if (content.style.display === "block") {
//       content.style.display = "none";
//     } else {
//       content.style.display = "block";
//     }
//   });
// }

// ------------------- store detail page product slider -------------------
const sliderWrapper = document.querySelector('.slider-wrapper');
const slides = document.querySelectorAll('.slide');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
const thumbnails = document.querySelectorAll('.thumbnails img');

let index = 0;

// Function to update the large slider
function updateSlider() {
  sliderWrapper.style.transform = `translateX(-${index * 100}%)`;
  updateActiveThumbnail();
}

// Function to highlight the active thumbnail
function updateActiveThumbnail() {
  thumbnails.forEach((thumb, i) => {
    thumb.classList.toggle('active', i === index);
  });
}

// Event listeners for previous and next buttons
prev.addEventListener('click', () => {
  index = (index === 0) ? slides.length - 1 : index - 1;
  updateSlider();
});

next.addEventListener('click', () => {
  index = (index === slides.length - 1) ? 0 : index + 1;
  updateSlider();
});

// Event listeners for thumbnail clicks
thumbnails.forEach((thumb) => {
  thumb.addEventListener('click', (e) => {
    index = parseInt(thumb.dataset.index); // Get the index from the thumbnail
    updateSlider();
  });
});

// Initialize active thumbnail
updateActiveThumbnail();


// ------------------ store detail page increase number -----------------
$(document).ready(function() {
  $('#btn').click(function() {
      $('#btn').toggleClass("cart_clk");

  });
  $("#btn").one("click", function() {
      $('.cart .fa').attr('data-before', '1');
  });

  var prnum = $('.num').text();
  $('.inc').click(function() {
      if (prnum > 0) {
          prnum++;
          $('.num').text(prnum);
          $('.cart .fa').attr('data-before', prnum);
      }

  });
  $('.dec').click(function() {
      if (prnum > 1) {
          prnum--;
          $('.num').text(prnum);
          $('.cart .fa').attr('data-before', prnum);
      }

  });

});