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
    $.each(data, function (key, value) {

        var rowNode = table.row.add([
            '<input type="checkbox" value="' + value.id + '" name="property_id[]">',
            value.title,
            '<input type="' + value.input_type + '">'
        ]).draw().node();

        $(rowNode).attr('category_id', value.pivot.category_id);
    });
}

$('#property-group-type').change(function () {
    var inputTypes = JSON.parse($('#property-input-type-json').html());
    changeOptions($("#property-input-type"), inputTypes[$(this).find(":selected").val()]);
});

function changeOptions(self, options) {
    var $option;

    self.empty();

    $.each(options, function(index, option) {
        $option = $("<option></option>")
            .attr("value", option)
            .text(index);
        self.append($option);
    });
}

function alertObj(obj) {
    var str = "";
    for(k in obj) {
        str += k+": "+ obj[k]+"\r\n";
    }
    alert(str);
}