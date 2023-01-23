$(document).ready(function() {


    /**
     * Replace all SVG images with inline SVG
     */

    $('img[src$=".svg"]').each(function(){
        var $img = $(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
        var imgHeight = $img.outerHeight();
        var imgWidth = $img.outerWidth();

        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            if( !$img.attr('width')) {
                $svg = $svg.attr('width', imgWidth);
            } else {
                $svg = $svg.attr('width', $img.attr('width'));
            }

            if( !$img.attr('height')) {
                    $svg = $svg.attr('height', imgHeight);
            } else {
                $svg = $svg.attr('hidth', $img.attr('hidth'));
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
});