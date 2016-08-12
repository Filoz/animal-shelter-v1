jQuery(document).ready(function($){

    anshNavigation = '<nav class="ansh-widget"><a class="next-adopted greyed" href="#"><span class="dashicons dashicons-arrow-up-alt2"></span></a><a href="#" class="previous-adopted"><span class="dashicons dashicons-arrow-down-alt2"></span></a></nav>';
    $('.widget_ansh_adopted_widget').append(anshNavigation);

    $.each(anshAdopted, function(key, value) {
        anshAdoptedContainer = '<div class="ansh-adopted-animal hidden"><a href="'+value.permalink+'" title="'+value.titleAttr+'"><img src="'+value.thumbnailUrl+'"></a><h4>'+value.title+'</h4></div>';
        $('.widget_ansh_adopted_widget .ansh-adopted-animal:last-of-type').after(anshAdoptedContainer);
    });

    $('.previous-adopted').on('click', function() {
        $('.next-adopted').removeClass('greyed');
        anshLastActiveAdopted = $('.ansh-adopted-animal.active').last();
        if (anshLastActiveAdopted[0] !== $('.ansh-adopted-animal:last-of-type')[0]) {
            adoptedToShow = anshLastActiveAdopted.next('.ansh-adopted-animal');
            adoptedToShow.toggleClass('hidden').toggleClass('active');
            firstToHide = $('.ansh-adopted-animal.active').first();
            firstToHide.toggleClass('hidden').toggleClass('active');
        } else {
            $('.previous-adopted').toggleClass('greyed');
        }
        event.preventDefault();
    });

    $('.next-adopted').on('click', function() {
        $('.previous-adopted').removeClass('greyed');
        anshFirstActiveAdopted = $('.ansh-adopted-animal.active').first();
        if (anshFirstActiveAdopted[0] !== $('.ansh-adopted-animal.active:first-of-type')[0]) {
            adoptedToShow = anshFirstActiveAdopted.prev('.ansh-adopted-animal');
            adoptedToShow.toggleClass('hidden').toggleClass('active');
            firstToHide = $('.ansh-adopted-animal.active').last();
            //if (firstToHide[0] !== $('.ansh-adopted-animal.active').last()[0] )
            firstToHide.toggleClass('hidden').toggleClass('active');
        } else {
            $('.next-adopted').toggleClass('greyed');
        }
        event.preventDefault();
    });
});
