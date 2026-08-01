let url = new URL(location.href)

if (url.searchParams.get('open_tab') === 'veta_detallepresupuesto') {
    setTimeout(function () {
        document.location.hash = "#subpanel_title_veta_detallepresupuesto_veta_presupuesto";
        $('#formformveta_detallepresupuesto_veta_presupuesto').submit()
    }, 500)
}