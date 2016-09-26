$("dialog.box").ready(function() {
  $("span.close").bind("click", function() {
    $("div.modal-bg").fadeOut();
  });
});