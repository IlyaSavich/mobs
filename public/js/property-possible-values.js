var possible = new PossibleValue();

function PossibleValue() {
    this.init();
}

PossibleValue.prototype.init = function () {
    this.possibleInput = $('#property-possible-input')[0].outerHTML;
    this.minPossibleInputQuantity = 1;
    this.possibleInputQuantity = this.minPossibleInputQuantity;

    var self = this;
    $('#property-group-type').change(function () {
        var inputTypes = JSON.parse($('#property-input-type-json').html());
        var groupType = $(this).find(":selected").val();

        if (groupType == 2) {
            self.showPossible();
        } else if (groupType == 1) {
            self.hidePossible();
        }

        self.changeOptions($("#property-input-type"), inputTypes[groupType]);
    });
};

PossibleValue.prototype.addPossibleInput = function () {
    this.possibleInput.after(this.possibleInput);
};

PossibleValue.prototype.changeOptions = function(self, options) {
    var $option;

    self.empty();

    $.each(options, function(index, option) {
        $option = $("<option></option>")
            .attr("value", option)
            .text(index);
        self.append($option);
    });
};

PossibleValue.prototype.showPossible = function() {
    $('#strut').hide();
    $('#possible-inputs-box').show();
};

PossibleValue.prototype.hidePossible = function() {
    $('#strut').show();
    $('#possible-inputs-box').hide();
};

PossibleValue.prototype.removePossibleInput = function(object) {
    if (this.possibleInputQuantity > this.minPossibleInputQuantity) {
        $(object).parent().remove();
    }
};