if (/add-product/.test(window.location.href)) {
    $(".Disc-container").hide();
    $(".Furniture-container").hide();
    $(".Book-container").hide();

    $(document).ready(function () {
        if ($('#productType').length) {
            $('#productType').val(localStorage.getItem("productType"));
        }
    });

    let productType = localStorage.getItem("productType");

    if (productType === null) {
        localStorage.setItem("productType", 'typeswitcher');
    }

    if (productType === productType) {
        $(`.${productType}-container`).show();
    }

    $('#productType').on('change', function (event) {
        localStorage.setItem("productType", $(this).val());

        if (event.target.value === 'Book') {
            $(".Disc-container").hide();
            $(".Furniture-container").hide();
            $(".Book-container").show();
        } else if (event.target.value === 'Disc') {
            $(".Disc-container").show();
            $(".Furniture-container").hide();
            $(".Book-container").hide();
        } else if (event.target.value === 'Furniture') {
            $(".Disc-container").hide();
            $(".Furniture-container").show();
            $(".Book-container").hide();
        } else {
            $(".Disc-container").hide();
            $(".Furniture-container").hide();
            $(".Book-container").hide();
        }

    });


} else {
    localStorage.removeItem("productType");
}

