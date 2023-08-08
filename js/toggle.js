let burger = $(".menu-trigger");
let side = $(".side");
burger.each(function (index) {
  let $this = $(this);

  $this.on("click", function (e) {
    e.preventDefault();
    $(this).toggleClass("active-" + (index + 5));
  });
});

burger.on("click", function () {
  side.toggleClass("move");
});
