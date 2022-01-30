$(document).ready(function () {
    //$('#activo').on('change',function () {
    //    $(this).value = $(this).checked?1:0;
    //});
    //alert('Hola mundo');
    $(document).on('change','#activo',function () {
        var value =$(this).is(':checked')?1:0;
        $(this).val(value);
        //alert($(this).val());
    });
});

