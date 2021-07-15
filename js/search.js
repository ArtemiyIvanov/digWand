 
$('.btn-search').on('click', (e) => {
    e.preventDefault();
    let field = $('.search-field').val();

    $.ajax({
        method: "POST",
        url: "search.php",
        data: {searchQuery: field},
        success: (data) => {
            let goods = JSON.parse(data);
            renderProducts(true, goods);
        }
    });
});