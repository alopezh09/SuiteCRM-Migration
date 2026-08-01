// custom/include/javascript/collapseSubpanels.js
$(document).ready(function() {
    // Función para colapsar los subpaneles
	console.log("ENTRO AL JAVASCRIPT");
    function collapseSubpanels() {
        $('.subpanel .panel-body.panel-collapse.collapse.in').each(function() {
			console.log("ENTRO AL PARA");
            $(this).removeClass('in');
            $(this).attr('aria-expanded', 'false');
            $(this).closest('.subpanel').find('a.panel-heading').addClass('collapsed');
            $(this).closest('.subpanel').find('a.panel-heading').attr('aria-expanded', 'false');
        });
    }

    // Colapsar subpaneles al cargar la página
    collapseSubpanels();

    // Colapsar subpaneles cuando se actualiza una sección de la página
    $(document).ajaxComplete(function() {
        collapseSubpanels();
    });
});
