$(document).ready(function() {
  $(".nav-list").bind("click", function(event) {
    window.location.href = $(event.target).attr("goto");
  });
});