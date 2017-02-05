/**
 * Created by monkey_C on 04-Feb-17.
 */
const $ = require('jquery');
const _ = require('lodash');
const toastr = require('toastr');


export default class {

    constructor(domId, canvasOptions) {

        let canvas = new fabric.Canvas(domId, canvasOptions);
        let model = {};

    }

    getCanvas() {

        return this.canvas;
    }

    createCanvas(domId, canvasOptions, gridSize) {

        if (gridSize > 0) {
            this.canvas.on('object:moving', function (options) {
                options.target.set({
                    left: Math.round(options.target.left / gridSize) * gridSize,
                    top: Math.round(options.target.top / gridSize) * gridSize
                });
            });
        }

        canvasName.includeDefaultValues = false;

    }

    addTexts(textObjectsArray) {
        this.model.texts = textObjectsArray;
        textObjectsArray.forEach(function (textObject) {
            this.canvas.add(new fabric.Text(textObject.value, textObject));
        });
    }

    addImages(imageObjectsArray) {

        this.model.images = imageObjectsArray;

        imageObjectsArray.forEach(function (imageObject) {
            fabric.Image.fromURL(imageObject.value, function (image) {

                for (let [property, value] of entries(imageObject)) {
                    image.set({
                        property: value
                    });
                }

                canvas.add(image);
            });

        });
    }


    // clone item to another canvas

    _cloneItem(item, typeProperty, idProperty, destCanvas, type) {

        if (item[typeProperty] == "label") {
            var result = this.model.texts.filter(function (obj) {
                return obj[idProperty] == item[idProperty];
            });
        }
        else if (item[typeProperty] == "image") {
            var result = this.model.images.filter(function (obj) {
                return obj[idProperty] == item[idProperty];
            })
        }

        let model = result[0];

        var clone = fabric.util.object.clone(item);

        if (type === "remove") {
            clone.set({left: model.menu_left, top: model.menu_top});

            if (item[typeProperty] == "label") {

                clone.set({fontSize: model.menu_fontSize, fontWeight: model.menu_fontWeight, fill: model.fill});
                console.log(clone);
                if (model.menu_value) {
                    clone.setText(model.menu_value);
                }
            }

            else if (item[typeProperty] == "image") {
                clone.set({top: model.menu_top, left: model.menu_left});
                clone.scaleToWidth(model.menu_width);
                clone.scaleToHeight(model.menu_height);
            }
        }
        else if (type === "add") {
            clone.set({left: model.left, top: model.top});

            if (item[typeProperty] == "label") {
                clone.set({fontSize: model.fontSize, fontWeight: model.fontWeight, fill: $('#text-color').val()});
                clone.setText(model.value);
            }
            else if (item[typeProperty] == "image") {
                clone.set({top: model.top, left: model.left});
                clone.scaleToWidth(model.width);
                clone.scaleToHeight(model.height);
            }
        }
        destCanvas.add(clone);

    }

    // canvas events and behaviour
    setObjectSelectionBehaviour(idProperty, excludedId, canvasType) {

        this.canvas.on('object:selected', function (e) {

            if (e.target[idProperty] !== excludedId && !e.target._objects) {

                var container = e.target.canvas.contextContainer.canvas.offsetParent;

                if (canvasType == "container") {
                    this._addDeleteBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                    this._addZIndexButtons(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                }

                else if (canvasType == "menu") {
                    this._addAddBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                }
            }
        });

        this.canvas.on('mouse:down', function (e) {

            if (canvasType == "container") {
                if (!this.canvas.getActiveObject()) {
                    $(".deleteBtn").remove();
                    $(".upBtn").remove();
                    $(".downBtn").remove();
                }
            }

            else if (canvasType == "menu") {
                if (!this.canvas.getActiveObject()) {
                    $(".addBtn").remove();
                }
            }

        });

        this.canvas.on('object:modified', function (e) {

            if (canvasType == "container") {
                if (e.target[idProperty] !== excludedId) {
                    var container = e.target.canvas.contextContainer.canvas.offsetParent;
                    this._addDeleteBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                    this._addZIndexButtons(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                }
            }

            else if (canvasType == "menu") {
                var container = e.target.canvas.contextContainer.canvas.offsetParent;
                this._addAddBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
            }

        });

        this.canvas.on('object:scaling', function (e) {

            if (canvasType == "container") {
                $(".deleteBtn").remove();
                $(".upBtn").remove();
                $(".downBtn").remove();
            }

            else if (canvasType == "menu") {
                $(".addBtn").remove();
            }

        });

        this.canvas.on('object:moving', function (e) {

            if (canvasType == "container") {
                $(".deleteBtn").remove();
                $(".upBtn").remove();
                $(".downBtn").remove();
            }

            else if (canvasType == "menu") {
                $(".addBtn").remove();
            }

        });

        this.canvas.on('object:rotating', function (e) {

            if (canvasType == "container") {
                $(".deleteBtn").remove();
                $(".upBtn").remove();
                $(".downBtn").remove();
            }

            else if (canvasType == "menu") {
                $(".addBtn").remove();
            }
        });
    }

    setDocumentBehavior(idProperty, excludedId, canvasType, destCanvas) {

        if(canvasType == "container") {

            $(document).on('click', ".deleteBtn", function () {

                target = this.canvas.getActiveObject();

                if (target) {

                    if (target[idProperty] != excludedId) {
                        this._cloneItem(target, destCanvas, "remove");
                    }

                    this.canvas.remove(target);
                    $(".upBtn").remove();
                    $(".downBtn").remove();
                    $(".deleteBtn").remove();
                }
            });

            $(document).on('click', ".upBtn", function () {

                target = this.canvas.getActiveObject();
                target.bringForward();
                showToast('Élément élevé au plan n° ' + canvas.getObjects().indexOf(target));


            });

            $(document).on('click', ".downBtn", function () {

                target = this.canvas.getActiveObject();
                target.sendBackwards();
                showToast('Élément ramené au plan n° ' + canvas.getObjects().indexOf(target));

            });

            $(document).on('click', "#custom-text-btn", function () {

                let value = $('#text-value').val();

                this.canvas.add(new fabric.Text(value, {

                    iris_type: "label",
                    iris_identifier: "custom",
                    left: 880,
                    top: 70,
                    originX: "center",
                    originY: "center",
                    fontSize: 19,
                    fontFamily: 'Calibri',
                }));

                $("html, body").animate({scrollTop: 100}, "slow");

            });
        }
    }

    // DOM Interaction

    // add add button

    _addAddBtn(container, x, y) {
        $(".addBtn").remove();
        var btnLeft = x - 10;
        var btnTop = y - 10;
        var addBtn = '<img src="{{asset("img/add-button.png")}}" class="addBtn" style="position:absolute;top:' + btnTop + 'px;left:' + btnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
        $(container).append(addBtn);
    }

    // add delete button

    _addDeleteBtn(container, x, y) {
        $(".deleteBtn").remove();
        var btnLeft = x - 10;
        var btnTop = y - 10;
        var deleteBtn = '<img src="{{asset("img/close-button.png")}}" class="deleteBtn" style="position:absolute;top:' + btnTop + 'px;left:' + btnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
        $(container).append(deleteBtn);
    }

    // add up and down button for z-index control

    _addZIndexButtons(container, x, y) {
        $(".upBtn").remove();
        $(".downBtn").remove();
        var upBtnLeft = x - 40;
        var upBtnTop = y - 10;
        var downBtnLeft = x - 60;
        var downBtnTop = y - 10;

        var upBtn = '<img src="{{asset("img/up-button.png")}}" class="upBtn" style="position:absolute;top:' + upBtnTop + 'px;left:' + upBtnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
        var downBtn = '<img src="{{asset("img/down-button.png")}}" class="downBtn" style="position:absolute;top:' + downBtnTop + 'px;left:' + downBtnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
        $(container).append(upBtn);
        $(container).append(downBtn);

    }

    _showToast(message) {
        toastr.clear();
        toastr.options = {timeOut: 2500, preventDuplicates: true, positionClass: "toast-bottom-full-width"};
        toastr.info(message);
    }


}