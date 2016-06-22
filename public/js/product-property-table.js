$('.product-category-check').change(function () {
    if ($(this).is(":checked")) {

        var table = $('#product-property-table').DataTable();

        $.ajax({
            type: "GET",
            url: "http://mobs/admin/category/property/" + $(this).val(),
            success: function (data) {
                addPropertyRows(table, data);
            }
        });

    }
});

function addPropertyRows(table, data) {
    console.log(data);
    $.each(data, function (key, value) {

        var rowNode = table.row.add([
            '<input type="checkbox" value="' + value.id + '" name="property_id[]">',
            value.title,
            value.input
        ]).draw().node();

        $(rowNode).attr('category_id', value.pivot.category_id);
    });
}

function alertObj(obj) {
    var str = "";
    for(k in obj) {
        str += k+": "+ obj[k]+"\r\n";
    }
    alert(str);
}