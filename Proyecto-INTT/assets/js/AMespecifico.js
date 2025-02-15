    $(document).ready(function() {
    $("#user-menu-trigger").click(function() {
      $("#user-menu").toggle();
    });

    // Cerrar el menú si se hace clic fuera de él
    $(document).on("click", function(event) {
      if (!$(event.target).closest("#user-menu-trigger").length && !$(event.target).closest("#user-menu").length) {
        $("#user-menu").hide();
      }
    });
  });

