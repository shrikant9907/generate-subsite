jQuery.fn.extend({
    createRepeater: function (options = {}) {
        var hasOption = function (optionKey) {
            return options.hasOwnProperty(optionKey);
        };

        var option = function (optionKey) {
            return options[optionKey];
        };

        var generateId = function (string) {
            return string
                .replace(/\[/g, '_')
                .replace(/\]/g, '')
                .toLowerCase();
        };

        var itemsInputsValue = function(){
            jQuery('input, textarea').on('keyup', function(){
                jQuery(this).attr('value', jQuery(this).val());
            });
        }

        var onInputChange = function(){
            jQuery('#multistep-form :input, input').on('keypress change keyup',function() {
                jQuery('.preview-button').addClass('hide').removeClass('show');
                jQuery('.save-changes-btn').removeClass('hide').addClass('show');
            });
        }

        var removeItemParent = function () {
            jQuery('.remove-btn').on('click', function(){
                jQuery(this).parents('.items').remove();
            
                var items = repeater.find(".items");
                var key = 0;
            
                items.each(function (index, item) {
                    items.remove();
                    if (items.length >= 1) {
                        addItem($(item), key, 'off');
                    }
                    key++;
                });
            })
        }

        var resetIndex = function () {
            var items = repeater.find(".items");
            var key = 0;
        
            items.each(function (index, item) {
                items.remove();
                if (items.length >= 1) {
                    addItem($(item), key, 'off');
                }
                key++;
            });
        }

        var addItem = function (items, key, fresh = true) {
            var itemContent = items;
            var group = itemContent.data("group");
            var item = itemContent;
            var input = item.find('input, textarea, select');
            
            input.each(function (index, el) {
                var attrName = $(el).data('name');
                var attrValue = $(el).attr('value');
                var skipName = $(el).data('skip-name');
                if (skipName != true) {
                    $(el).attr("name", group + "[" + key + "]" + "[" + attrName + "]");
                } else {
                    if (attrName != 'undefined') {
                        $(el).attr("name", attrName);
                    }
                }

                if (el.type == 'textarea') {
                    $(el).text(el.value);
                }

                if (fresh == true) {
                    $(el).attr('value', '');
                    if (el.type == 'textarea') {
                        $(el).text('');
                    }
                } else if((fresh == false) || (fresh == 'clone')) {
                    if (key > 0) {
                        var prevName = "#"+group+"_"+(key-1)+"_"+attrName;
                        $(el).attr('value', $(prevName).val());
                    }
                
                    if (attrValue) {
                        $(el).attr('value', attrValue);
                    }
    
                } else {
                    $(el).attr('value', $('#'+attrName).val());
                }

                $(el).attr('id', generateId($(el).attr('name')));
                $(el).parent().find('label').attr('for', generateId($(el).attr('name')));

                // Add / Duplicate show save changes button
                jQuery('.preview-button').addClass('hide').removeClass('show');
                jQuery('.save-changes-btn').removeClass('hide').addClass('show');

            })


            var itemClone = items;

            // remove source url inside repater field when add row 
            if (fresh == true) {
                itemClone.find('.field-image').remove();
            }

            // add image from the last row
            if ((fresh == false) || (fresh == 'clone')) {
                var imgVal = itemClone.find('.urlInput').val();
                if (imgVal) {
                    itemClone.find('.field-image').remove();
                    itemClone.find('.urlInput').before('<div class="field-image"><img class="img-thumbnail w_100 mb_10" src="'+ imgVal +'" alt="" /></div>');
                }
            }

            /* Handling remove btn */
            var removeButton = itemClone.find('.remove-btn');

            if (key == 0) {
                removeButton.attr('disabled', true);
                // removeButton.remove();
                removeButton.addClass('invisible');
            } else {
                removeButton.attr('disabled', false);
                removeButton.removeClass('invisible');
            }

            var newItem = $("<div class='items' data-group='"+group+"'>" + itemClone.html() + "<div/>");
            newItem.attr('data-index', key);

            newItem.appendTo(repeater);

            removeItemParent(); 
            itemsInputsValue(); 
            onInputChange();
            fnImageClose();
        };

        /* find elements */
        var repeater = this;
        var items = repeater.find(".items");
        var key = 0;
        var addButton = repeater.find('.repeater-add-btn');
        var cloneButton = repeater.find('.repeater-clone-btn');
      
        items.each(function (index, item) {
            items.remove();
            if (hasOption('showFirstItemToDefault') && option('showFirstItemToDefault') == true) {
                addItem($(item), key, false);
                key++;
            } else {
                if (items.length > 1) {
                    addItem($(item), key, false);
                    key++;
                }
            }
        });
       
        /* handle click and add items */
        addButton.on("click", function () {
            addItem($(items[0]), key);
            key++;
            // Load Select Picker
            // jQuery('.selectpicker').selectpicker();
            fnImageClose();
        });

        cloneButton.on("click", function () {

            // Load Select Picker
            // jQuery('.selectpicker').selectpicker();

            var items = repeater.find(".items");
            if (items) {
                key = items.length;
            }
            if (key > 0) {
                lastKey = key - 1;
            } else {
                lastKey = 0;
            }
            
            addItem($(items[lastKey]), key, 'clone');
            key++;

            // reset index
            resetIndex();

            fnImageClose();
        });
    }
});