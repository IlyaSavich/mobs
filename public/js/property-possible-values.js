var possibleInput = $('#property-possible-input')[0].outerHTML;
var minPossibleInputQuantity = 1;
var possibleInputQuantity = minPossibleInputQuantity;

var PossibleValue = function () {};

PossibleValue.prototype.init = function () {

};

function addPossibleInput() {
    input.after(possibleInput);
}

$('#property-group-type').change(function () {
    var inputTypes = JSON.parse($('#property-input-type-json').html());
    var groupType = $(this).find(":selected").val();
    if (groupType == 2) {
        showPossible();
    } else if (groupType == 1) {
        hidePossible();
    }
    changeOptions($("#property-input-type"), inputTypes[groupType]);
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

function showPossible() {
    $('#strut').hide();
    $('#possible-inputs-box').show();
}

function hidePossible() {
    $('#strut').show();
    $('#possible-inputs-box').hide();
}

function removePossibleInput(object) {
    // if (possibleInputQuantity > minPossibleInputQuantity) {
        $(object).parent().remove();
    // }
}