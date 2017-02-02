let AbstractField = function () {

    /*
     * We define a prefix for all fields
     * in order to identify them when
     * whe need to retrieve data
     */
    this.class_prefix = "__field_"
};

AbstractField.prototype.build = function () {
};

module.exports = AbstractField;