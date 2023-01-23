function toggleSelect($elm) {
    if(!$elm.closest('.fakeSelect').hasClass('collapsed')) {
        $elm.closest('.fakeSelect').addClass('collapsed');
    } else {
        $elm.closest('.fakeSelect').removeClass('collapsed');

    }
}

function handleSelect($elm) {

    var content = $elm.html();
    var selectedContainer = $elm.parent().parent().parent();
    var selectParent = selectedContainer.data('for');
    var selectedValue = $elm.parent().data('value');


    if(selectedContainer.hasClass('multiple')) {
        var selectedOption = $("select" + selectParent + ' option[value="' + selectedValue + '"]')

        if(selectedOption.prop("selected") === false ) {
;
            selectedOption.prop("selected", true);
            $('.fakeSelect-options-item[data-value="' + selectedValue + '"]').addClass('selected');
            selectedContainer.find('.selected-option').append(content + ', ');    

        } else {
            selectedOption.prop("selected", false);

            var selectedOptionHTML = selectedContainer.find('.selected-option').html();
            selectedOptionHTML = selectedOptionHTML.replace(content + ', ', ""); 

            $('.fakeSelect-options-item[data-value="' + selectedValue + '"]').removeClass('selected');
            selectedContainer.find('.selected-option').html(selectedOptionHTML);

        };

    } else {
        $("select" + selectParent).val(selectedValue);

        selectedContainer.addClass('collapsed');
        selectedContainer.find('.selected-option').empty();
        selectedContainer.find('.selected-option').append(content);    

    }

}

function createFakeSelect (trueSelect) {

    $('.fakeSelect[data-for="#' + trueSelect + '"]').remove();

    var isMultiple = '';
    var selectClasses = $("#"+trueSelect).attr('class');

    if($("#"+trueSelect).attr('multiple')) {

        isMultiple = 'multiple';

    }
    var fakeSelectDom = '<div class="fakeSelect collapsed ' + isMultiple + ' ' + selectClasses + '" data-for="#' + trueSelect + '">'
                        + '<div class="chevron"></div>'
                        + '<span class="selected-option">';
    var options = $('#' + trueSelect + ' option');
    
    if(!$("#"+trueSelect).attr('multiple')) {
        var selectedOption;

        selectedOption = $('#' + trueSelect + ' option:selected');

        if(selectedOption.data('icon') != undefined) {

            fakeSelectDom += '<img class="fakeSelect-icon" src=" '+ selectedOption.data('icon') +' " title="' + selectedOption.html() + '" loading="lazy">' + selectedOption.html() + '</span>'
            + '<ul class="fakeSelect-options">';
        } else {
            fakeSelectDom += selectedOption.html() + '</span>'
            + '<ul class="fakeSelect-options">';
        }
    

    } else {

        var selectedOptions = $("#"+trueSelect+" option:selected");

        selectedOptions.each(function() {
            fakeSelectDom += $(this).html()+', ';
        });
        fakeSelectDom += '</span>'
        + '<ul class="fakeSelect-options">';


    }



    var values = {};

    options.each(function() {
        values[$(this).index()] = [ $(this).val() , $(this).html(), $(this).data('icon'), $(this).data('couleur'), $(this).prop('selected') ? 'selected' : '' ];
    });

    var fakeOptions = {}

    for (var i = 0 ; i < options.length ; i++) {
        if( values[i][2] != undefined ) {
            fakeOptions[i] = '<li class="fakeSelect-options-item ' + values[i][4] + '" data-value="' + values[i][0] + '"><a href="javascript:void(0)"><img class="fakeSelect-icon" src=" '+ values[i][2] +' " title="' + values[i][1] + '">' + values[i][1] + '</a></li>'
        } else if ( values[i][3]  != undefined ) {
            fakeOptions[i] = '<li class="fakeSelect-options-item ' + values[i][4] + '" data-value="' + values[i][0] + '"><a href="javascript:void(0)"><span class="fakeSelect-color" style="background-color:'+ values[i][3] +'"></span>' + values[i][1] + '</a></li>'
        } else {
            fakeOptions[i] = '<li class="fakeSelect-options-item ' + values[i][4] + '" data-value="' + values[i][0] + '"><a href="javascript:void(0)">' + values[i][1] + '</a></li>'
        }
    }

    for (var i = 0 ; i < options.length ; i++) {
        fakeSelectDom += fakeOptions[i]
    }

    fakeSelectDom += '</ul></div>';

    $(fakeSelectDom).insertAfter('#' + trueSelect);

}

function initSelect($selectID) {

    if ($selectID) {
        $('.fakeSelect[data-for="' + $selectID + '"] .selected-option,' + '.fakeSelect[data-for="' + $selectID + '"] .chevron').on('click', function() {
            $(this).parent().addClass('collapsed');
            toggleSelect($(this))

        })
        $('.fakeSelect[data-for="' + $selectID + '"] .fakeSelect-options-item a').on('click', function(e) {
            handleSelect($(this))
        })

    } else {
        $('.fakeSelect .selected-option, .chevron').on('click', function() {
            $('.fakeSelect').addClass('collapsed');
            toggleSelect($(this))

        })
        $('.fakeSelect .fakeSelect-options-item a').on('click', function(e) {
            handleSelect($(this))
        })
    }

    $(document).click(function(event) { 
        var $target = $(event.target);
        if($('.fakeSelect-options').is(":visible") && !$target.is('select')) {
            $('.fakeSelect').addClass('collapsed');
            toggleSelect($target.closest('.fakeSelect')) ;
        }        
    });

}

$(document).ready(function() {
    $('select:not(.ui-datepicker-month)').each(function() {
        createFakeSelect ($(this).attr('id'));
    })

    initSelect();
    
})
