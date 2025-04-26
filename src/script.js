jQuery(document).ready(function($) {
    const form = $('#wc-ajax-filter-form');

    // Trigger filter on checkbox change
    form.on('change', 'input[type=checkbox]', function() {
        applyFilter(1);
    });

    // Reset filters
    form.on('click', '#reset-filters', function(e) {
        e.preventDefault();
        form[0].reset();
        $('.tag-badges').empty();
        applyFilter(1);
    });

    // Handle tag dropdown selection
    $('#tag-dropdown').on('change', function() {
        const tag = $(this).val();
        if (tag && !$(`.tag-badge[data-tag="${tag}"]`).length) {
            $('.tag-badges').append(`<span class="tag-badge inline-flex items-center text-sm bg-blue-100 text-blue-800 rounded px-2 py-1 mr-1 mb-1" data-tag="${tag}">
                ${tag}
                <button type="button" class="ml-1 text-red-600 remove-tag" data-tag="${tag}">&times;</button>
            </span>`);
            $(this).val('');
            applyFilter(1);
        }
    });

    // Remove tag badge
    form.on('click', '.remove-tag', function() {
        $(this).parent().remove();
        applyFilter(1);
    });

    // Handle pagination
    $(document).on('click', '.woocommerce-pagination a', function(e) {
        e.preventDefault();
        const page = $(this).text();
        applyFilter(page);
    });

    function applyFilter(page) {
        const selectedCats = [];
        const selectedBrands = [];
        const selectedTags = [];

        form.find('input[name="category[]"]:checked').each(function() {
            selectedCats.push($(this).val());
        });

        form.find('input[name="brand[]"]:checked').each(function() {
            selectedBrands.push($(this).val());
        });

        $('.tag-badge').each(function() {
            selectedTags.push($(this).data('tag'));
        });

        const newUrl = new URL(window.location.href);
        if (selectedCats.length > 0) newUrl.searchParams.set('filter_cat', selectedCats.join(','));
        else newUrl.searchParams.delete('filter_cat');

        if (selectedBrands.length > 0) newUrl.searchParams.set('filter_brand', selectedBrands.join(','));
        else newUrl.searchParams.delete('filter_brand');

        if (selectedTags.length > 0) newUrl.searchParams.set('filter_tags', selectedTags.join(','));
        else newUrl.searchParams.delete('filter_tags');

        newUrl.searchParams.set('page', page);
        window.history.pushState({}, '', newUrl);

        $.ajax({
            url: wcCatFilterAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_products',
                categories: selectedCats,
                brands: selectedBrands,
                tags: selectedTags,
                page: page
            },
            success: function(response) {
                $('.products').parent().html(response);
            }
        });
    }
});
