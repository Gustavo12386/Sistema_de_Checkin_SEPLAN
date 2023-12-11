$(document).on("input", "#obs", function () {
    var limite = 220;
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    $(".carac").text(caracteresRestantes);
    
});