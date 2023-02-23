/* header sticky */

const nav = document.querySelector(".nav");

window.addEventListener("scroll", function () {

  window.scrollY >= 100 ? nav.classList.add("active") : nav.classList.remove("active");

});

let edit = document.querySelectorAll('.edit')
let save = document.querySelector('.btn-success')
let update = document.querySelector('.btn-secondary')
console.log(edit.length)
for (var i = 0; i < edit.length; i++) {
  edit[i].addEventListener('click', function (e) {
    e.preventDefault();
    save.classList.add('active');
    update.classList.add('active');
    $.ajax({
      type: 'POST',
      url: 'server.php',
      data: {
        edit: $(this).val()
      },
      success: function (data) {

      },
      error: function (result) {
        alert('error');
      }

    })

  })
}
update.addEventListener('click', function () {
  save.classList.remove('active')
  update.classList.remove('active')

})





