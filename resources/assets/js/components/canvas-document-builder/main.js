/**
 * Created by monkey_C on 04-Feb-17.
 */
const $ = require('jquery');
const _ = require('lodash');
const toastr = require('toastr');
const fabric = require("fabric").fabric;

const img_path = "/build/css/images/";

export default class {

    constructor(domTarget, canvasOptions, parameters, models = {}) {

        let defaults = {
            buttons: {
                add: ".addBtn",
                delete: ".deleteBtn",
                up: ".upBtn",
                down: ".downBtn",
                font_up: ".fontUpBtn",
                font_down: ".fontDownBtn",
                add_custom_text: "#custom-text-btn",
            },

            images: {
                add_button: `${img_path}add-button.png`,
                delete_button: `${img_path}close-button.png`,
                up_button: `${img_path}up-button.png`,
                down_button: `${img_path}down-button.png`,
                font_up_button: `${img_path}font-up-button.png`,
                font_down_button: `${img_path}font-down-button.png`,
                content_placeholder: `${img_path}fr-content-ph.png`,
                logo_placeholder: `${img_path}logo-placeholder.png`
            },

            color_pickers: {
                text: "#text-color",
                background: "#bg-color",
            },

            custom_inputs: {
                text: "#text-value",
                image: "#image-file",
            }

        };

        /*
         * Save the parameters in the current instance
         */
        this.parameters = Object.assign({}, defaults, parameters);

        this.canvas = new fabric.Canvas(domTarget, canvasOptions);

        this.models = models;

        console.log(this.models.texts);

    }

    getCanvas() {

        return this.canvas;
    }

    setGrid(gridSize) {

        this.canvas.on('object:moving', function (options) {
            options.target.set({
                left: Math.round(options.target.left / gridSize) * gridSize,
                top: Math.round(options.target.top / gridSize) * gridSize
            });
        });

        this.canvas.includeDefaultValues = false;
        return this;
    }

    addTexts(textObjectsArray) {
        textObjectsArray.forEach((textObject) => {
            this.canvas.add(new fabric.Text(textObject.value, textObject));
        });
        return this;
    }

    addImages(imageObjectsArray) {
        imageObjectsArray.forEach((imageObject) => {
            fabric.Image.fromURL(imageObject.value, (image) => {

                let imageProperties = {};

                _.forIn(imageObject, function (value, key) {
                    imageProperties[key] = value;
                });

                image.set(imageProperties);

                this.canvas.add(image);
            });
        });
        return this;
    }

    setModels(models) {
        _.forIn(models, (value, key) => {
            this.models[key] = value;
        });
        return this;
    }

    loadJSON(jsonTemplate) {
        this.canvas.loadFromJSON(jsonTemplate, this.canvas.renderAll.bind(this.canvas), function (o, object) {
        });
        return this;
    }

    loadRemovedTexts(removedItems, idProperty, excludedId, properties) {

        removedItems.forEach((removedItem) => {

            if (removedItem[idProperty] !== excludedId) {

                let text = {};
                _.forIn(properties, function (value, key) {
                    text[key] = removedItem[value];
                });

                this.canvas.add(new fabric.Text(text.value, text));
            }
        });
    }

    loadRemovedImages(removedItems, idProperty, excludedId, properties) {

        removedItems.forEach((removedItem) => {

            if (removedItem[idProperty] !== excludedId) {

                let imageProperties = {};

                _.forIn(properties, function (value, key) {
                    imageProperties[key] = removedItem[value];
                });

                fabric.Image.fromURL(imageProperties.value, (image) => {
                    image.set({top: imageProperties.top, left: imageProperties.left});
                    image.scaleToWidth(imageProperties.width);
                    image.scaleToHeight(imageProperties.height);
                    this.canvas.add(image);
                });
            }
        });

    }

    getRemovedItems(jsonTemplate, modelName, idProperty) {
        let arrayTemplate = JSON.parse(jsonTemplate);
        return _.differenceBy(this.models[modelName], arrayTemplate.objects, idProperty);
    }

    // clone item to another canvas

    _cloneItem(options) {

        let type = (options.item[options.typeProperty] === 'label') ? this.models.texts : this.models.images;

        let result = type.filter(function (obj) {
            return obj[options.idProperty] === options.item[options.idProperty];
        });


        let model = _.first(result);

        let clone = fabric.util.object.clone(options.item);

        if (options.type === "remove") {
            clone.set({left: model.menu_left, top: model.menu_top});

            if (options.item[options.typeProperty] === "label") {

                clone.set({fontSize: model.menu_fontSize, fontWeight: model.menu_fontWeight, fill: model.fill});
                if (model.menu_value) {
                    clone.setText(model.menu_value);
                }
            }

            else if (options.item[options.typeProperty] === "image") {
                clone.set({top: model.menu_top, left: model.menu_left});
                clone.scaleToWidth(model.menu_width);
                clone.scaleToHeight(model.menu_height);
            }
        }
        else if (options.type === "add") {

            clone.set({left: model.left, top: model.top});

            if (options.item[options.typeProperty] === "label") {

                clone.set({fontSize: model.fontSize, fontWeight: model.fontWeight, fill: $(this.parameters.color_pickers.text).val()});
                clone.setText(model.value);
            }
            else if (options.item[options.typeProperty] === "image") {
                clone.set({top: model.top, left: model.left});
                clone.scaleToWidth(model.width);
                clone.scaleToHeight(model.height);
            }
        }
        options.destCanvas.add(clone);

    }

    // canvas events and behaviour
    setObjectSelectionBehaviour(idProperty, typeProperty, textType, excludedId, canvasType) {
        let addControls = (e) => {
            if (canvasType === "container") {
                if (e.target[idProperty] !== excludedId) {
                    let container = e.target.canvas.contextContainer.canvas.offsetParent;
                    this._addDeleteBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                    this._addZIndexButtons(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                    if (e.target[typeProperty] === textType) {
                        this._addFontUpBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                        this._addFontDownBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                    }
                }
            }

            else if (canvasType === "menu") {
                let container = e.target.canvas.contextContainer.canvas.offsetParent;
                this._addAddBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
            }
        };

        let removeControls = () => {
            if (canvasType === "container") {
                $(this.parameters.buttons.delete).remove();
                $(this.parameters.buttons.up).remove();
                $(this.parameters.buttons.down).remove();
                $(this.parameters.buttons.font_up).remove();
                $(this.parameters.buttons.font_down).remove();
            }

            else if (canvasType === "menu") {
                $(this.parameters.buttons.add).remove();
            }
        };

        this.canvas.on({
            'object:selected': addControls,
            'object:modified': addControls,
            'selection:cleared': removeControls,
            'object:scaling': removeControls,
            'object:moving': removeControls,
            'object:rotating': removeControls
        });
        return this;
    }

    setMainContainerBehaviour(options) {

        $(document).on('click', this.parameters.buttons.delete, () => {

            let target = this.canvas.getActiveObject();

            if (target) {
                if (target[options.idProperty] !== options.excludedId) {
                    this._cloneItem({
                        item: target,
                        idProperty: options.idProperty,
                        typeProperty: options.typeProperty,
                        destCanvas: options.destCanvas,
                        type: "remove"
                    });
                }

                this.canvas.remove(target);
                $(this.parameters.buttons.up).remove();
                $(this.parameters.buttons.down).remove();
                $(this.parameters.buttons.font_up).remove();
                $(this.parameters.buttons.font_down).remove();
                $(this.parameters.buttons.delete).remove();
            }
        });

        $(document).on('click', this.parameters.buttons.up, () => {

            let target = this.canvas.getActiveObject();
            target.bringForward();
            this._showToast(`Élément élevé au plan n° ${this.canvas.getObjects().indexOf(target)}`);


        });

        $(document).on('click', this.parameters.buttons.down, () => {

            let target = this.canvas.getActiveObject();
            target.sendBackwards();
            this._showToast(`Élément ramené au plan n° ${this.canvas.getObjects().indexOf(target)}`);

        });

        $(document).on('click', this.parameters.buttons.font_up, () => {

            let target = this.canvas.getActiveObject();
            target.fontSize++;
            this.canvas.renderAll();

        });

        $(document).on('click', this.parameters.buttons.font_down, () => {

            let target = this.canvas.getActiveObject();
            target.fontSize--;
            this.canvas.renderAll();

        });

        $(this.parameters.color_pickers.text).spectrum({
            showInput: true,
            showPalette: true,
            palette: [],
            showButtons: false,
            preferredFormat: "hex",

        });

        $(this.parameters.color_pickers.background).spectrum({
            showInput: true,
            showPalette: true,
            palette: [],
            showButtons: false,
            preferredFormat: "hex",

        });

        $(this.parameters.color_pickers.text).change(() => {

            this.canvas._objects.forEach((object) => {
                if (object[options.typeProperty] === "label") {
                    object.setColor($(this.parameters.color_pickers.text).val());
                }
                this.canvas.renderAll();
            });

        });

        $(this.parameters.color_pickers.background).change(() => {

            this.canvas.backgroundColor = $(this.parameters.color_pickers.background).val();
            this.canvas.renderAll();

        });
        return this;
    }

    setMenuContainerBehaviour(destCanvas) {
        $(document).on('click', this.parameters.buttons.add, () => {
            if (this.canvas.getActiveObject()) {
                this._cloneItem({
                    item: this.canvas.getActiveObject(),
                    idProperty: "iris_identifier",
                    typeProperty: "iris_type",
                    destCanvas: destCanvas,
                    type: "add"
                });
                this.canvas.remove(this.canvas.getActiveObject());
                $(this.parameters.buttons.add).remove();
            }
        });
        return this;
    }

    setCustomContainerBehaviour(customTextProperties, customImageProperties) {

        $(document).on('click', this.parameters.buttons.add_custom_text, () => {

            let value = $(this.parameters.custom_inputs.text).val();
            customTextProperties.fill = $(this.parameters.color_pickers.text).val();
            this.canvas.add(new fabric.Text(value, customTextProperties));
            $("html, body").animate({scrollTop: 100}, "slow");

        });

        $(this.parameters.custom_inputs.image).change((e) => {

            let reader = new FileReader();
            reader.onload = (event) => {
                let imgObj = new Image();
                imgObj.src = event.target.result;
                imgObj.onload = () => {
                    let image = new fabric.Image(imgObj);

                    let imageProperties = {};

                    _.forIn(customImageProperties, function (value, key) {
                        imageProperties[key] = value;
                    });

                    image.set(imageProperties);

                    this.canvas.add(image);
                };
            };

            reader.readAsDataURL(e.target.files[0]);
        });
        return this;
    }

    saveToJSON(customPropertiesArray, domId) {
        let json = this.canvas.toJSON(customPropertiesArray);
        $(domId).val(JSON.stringify(json));
        return this;
    }

    // DOM Interaction

    // add add button

    _addAddBtn(container, x, y) {
        $(this.parameters.buttons.add).remove();
        let btnLeft = x - 10;
        let btnTop = y - 10;
        let addBtnEl = this._domAdapter(this.parameters.buttons.add);

        let addBtn = `<img src="${this.parameters.images.add_button}" ${addBtnEl.attribute}="${addBtnEl.value}" style="position:absolute;top:${btnTop}px;left:${btnLeft}px;cursor:pointer;width:20px;height:20px;"/>`;
        $(container).append(addBtn);
    }

    // add delete button

    _addDeleteBtn(container, x, y) {
        $(this.parameters.buttons.delete).remove();
        let btnLeft = x - 10;
        let btnTop = y - 10;
        let deleteBtnEl = this._domAdapter(this.parameters.buttons.delete);
        let deleteBtn = `<img src="${this.parameters.images.delete_button}" ${deleteBtnEl.attribute}="${deleteBtnEl.value}" style="position:absolute; top:${btnTop}px; left:${btnLeft}px; cursor:pointer;width:20px;height:20px;"/>`;

        $(container).append(deleteBtn);

    }

    //  add font size up button

    _addFontUpBtn(container, x, y) {
        $(this.parameters.buttons.font_up).remove();
        let btnLeft = x - 110;
        let btnTop = y - 10;
        let fontUpBtnEl = this._domAdapter(this.parameters.buttons.font_up);
        let fontUpBtn = `<img src="${this.parameters.images.font_up_button}" ${fontUpBtnEl.attribute}="${fontUpBtnEl.value}" style="position:absolute; top:${btnTop}px; left:${btnLeft}px; cursor:pointer;width:20px;height:20px;"/>`;

        $(container).append(fontUpBtn);
    }

    //  add font size down button

    _addFontDownBtn(container, x, y) {
        $(this.parameters.buttons.font_down).remove();
        let btnLeft = x - 90;
        let btnTop = y - 10;
        let fontDownBtnEl = this._domAdapter(this.parameters.buttons.font_down);
        let fontDownBtn = `<img src="${this.parameters.images.font_up_button}" ${fontDownBtnEl.attribute}="${fontDownBtnEl.value}" style="position:absolute; top:${btnTop}px; left:${btnLeft}px; cursor:pointer;width:20px;height:20px;"/>`;

        $(container).append(fontDownBtn);
    }

    // add up and down button for z-index control

    _addZIndexButtons(container, x, y) {
        $(this.parameters.buttons.up).remove();
        $(this.parameters.buttons.down).remove();
        let upBtnLeft = x - 40;
        let upBtnTop = y - 10;
        let downBtnLeft = x - 60;
        let downBtnTop = y - 10;
        let upBtnEl = this._domAdapter(this.parameters.buttons.up);
        let downBtnEl = this._domAdapter(this.parameters.buttons.down);
        let upBtn = `<img src="${this.parameters.images.up_button}" ${upBtnEl.attribute}="${upBtnEl.value}" style="position:absolute; top:${upBtnTop}px; left:${upBtnLeft}px; cursor:pointer;width:20px;height:20px;"/>`;
        let downBtn = `<img src="${this.parameters.images.down_button}" ${downBtnEl.attribute}="${downBtnEl.value}" style="position:absolute; top:${downBtnTop}px; left:${downBtnLeft}px; cursor:pointer;width:20px;height:20px;"/>`;

        $(container).append(upBtn);
        $(container).append(downBtn);

    }

    _domAdapter(string) {

        let isClass = new RegExp('^\.');
        let isId = new RegExp('^#');
        let result = {
            attribute: "",
            value: ""
        };

        if (isClass.test(string)) {
            result.attribute = "class";
        }
        else if (isId.test(string)) {
            result.attribute = "id";
        }

        result.value = (string).replace(".", "").replace("#", "");

        return result;
    }

    _showToast(message) {
        toastr.clear();
        toastr.options = {timeOut: 2500, preventDuplicates: true, positionClass: "toast-bottom-full-width"};
        toastr.info(message);
    }


}