// tagline slider
let start = 0;
otomatis();

function otomatis() {
  const sliders = document.querySelectorAll(".rii_hero");

  for (let i = 0; i < sliders.length; i++) {
    sliders[i].style.display = "none";
  }

  if (start >= sliders.length) {
    start = 0;
  }

  sliders[start].style.display = "block";
  console.log("gambar ke" + start);
  start++;

  setTimeout(otomatis, 5000);
}
// 

var input = document.querySelector('#options-autoplay-input')

var glide = new Glide('#options-autoplay', {
  autoplay: input.value,
  hoverpause: false,
  perView: 3
})

input.addEventListener('input', function (event) {
  glide.update({
    autoplay: (event.target.value != 0) ? event.target.value : false
  })
})

glide.mount()
