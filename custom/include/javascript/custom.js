$(document).ready(function () {
    // Colapsar todos los subpaneles al cargar la página
    $('div.panel-body.panel-collapse.collapse.in').each(function () {
        $(this).removeClass('in').attr('aria-expanded', 'false');
        var subpanelId = $(this).attr('id').replace('subpanel_', '');
        $('#subpanel_title_' + subpanelId).addClass('collapsed').attr('aria-expanded', 'false');
    });
});
