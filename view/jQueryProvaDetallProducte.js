// Carregar els productes de les categories
$(document).on("click", ".button-productes", function(event) { 
    // Evitem que fagi l'acció del enllaç
    event.preventDefault(); 
    var category = $(this).find('p').attr('id'); // Trobem l'atribut corresponent a la id de la categoria
    var categoryId = parseInt(category, 10);

    // Carreguem la nova part de la pàgina
    $('.main-content-eliminar').load('/controller/c_llistatProductes.php?category_id=' + categoryId);
});

// Carregar els detalls sobre el producte
$(document).on("click", ".button-producte", function(event) { 
    // Evitem que fagi l'acció del enllaç
    event.preventDefault();
    var producte = $(this).find('p').attr('id'); // Trobem l'atribut corresponent a la id del producte
    var producteId = parseInt(producte, 10);
    // Carreguem la nova part de la pàgina
    $('.productes').load('/controller/c_detallsProducte.php?producteId=' + producteId);
});

// Afegir productes al carret
$(document).on("click", ".afegir-producte", function(event) {
    // Evitem que fagi l'acció del enllaç
    event.preventDefault();
    var quantitat = $('input[name="quantitat"]').val();
    var producteId = $(this).attr('value'); 

    // Carreguem la nova part de la pàgina
    $('.detalls').load('/controller/c_afegirProducte.php?producteId=' + producteId + '&quantitat=' + quantitat, function() {
        $('header').load('/controller/c_header.php');
        $('.detalls').load('/controller/c_detallsProducte.php?producteId=' + producteId);
        $('footer').load('/controller/c_footer.php');
    });
});

// Carregar resultats de la busqueda
$(document).on("click", ".boton-search", function(event) {
    // Evitem que fagi l'acció del enllaç
    event.preventDefault();
    var searchText = $('input[name="text-search"]').val();
    // Carreguem la nova part de la pàgina
    $('.body').load('/controller/c_resultats.php?search=' + encodeURIComponent(searchText));
}); 
