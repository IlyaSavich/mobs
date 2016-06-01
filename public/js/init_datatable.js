$('#product-data-table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true
});

$('#property-data-table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true
});

$("#product-category-data-table").DataTable({
    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true
});

$(".select2").select2();

$("#product-img-input").change(function () {
    readURL(this);
});

$("#property-group-type").change(function () {
    var inputTypes = JSON.parse($("#input-types").html());
    var options = "";

    $.each(inputTypes[this.value], function (type, text) {
        options += '<option value="' + type + '">' + text + '</option>';
    });

    $("#property-input-type").html(options);
});

$(".check-product-category").change(function () {
    if ($(this).is(":checked")) {
        var self = this;
        var request = $.ajax({
            url: '/admin/category/properties/' + self.value,
            type: 'GET',
            success: function (data) {
                addProperties(self.value, data);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    } else {

    }
});

function appendTableRow(table, rowData) {
    var lastRow = $('<tr/>').appendTo(table.find('tbody:last'));
    $.each(rowData, function (colIndex, c) {
        lastRow.append($('<td/>').html(c));
    });

    return lastRow;
}

function removeTableRow(table, category_id) {
    // var tr = table.find();

    $.each(data, function (index, property) {
        //
    });
}

function addProperties(categoryId, data) {
    var propertyTable = $("#property-data-table");

    $.each(data, function (index, property) {
        console.log(property);
        appendTableRow(propertyTable, [addEnableCheckbox(property, categoryId), property.title,
        addValueInput(property)]);
    });
}

function addEnableCheckbox(property, categoryId) {
    return '<input category_id="' + categoryId + '" name="property_id[]"' +
        ' type="checkbox" value="' + property.id + '">';
}

var PRIMARY_INPUT_GROUP = 1;

function addValueInput(property) {
    var input = '<input type="' + property.input_type + '" class="form-control">';

    if (property.group_type == PRIMARY_INPUT_GROUP) {
        
    }

    return input;
}

function alertObj(obj) {
    var str = "";
    for (k in obj) {
        str += k + ": " + obj[k] + "\r\n";
    }
    alert(str);
}