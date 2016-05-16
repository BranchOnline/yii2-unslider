$(document).ready(function() {
  setSize();
});

$(window).resize(function() {
  setSize();
});


function setSize() {
   // Get an array of all element heights
   var elementHeights = $('.inner__table__content').map(function() {
     return $(this).height();
   }).get();

   // Math.max takes a variable number of arguments
   // `apply` is equivalent to passing each height as an argument
   var maxHeight = Math.max.apply(null, elementHeights);

   // Set each height to the max height
   $('.inner__table__content').height(maxHeight);
}
