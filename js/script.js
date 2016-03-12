/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('body').on('click', '.page-scroll a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});


//sweet alerts
function joinOffer(){
    swal({
        title: 'Do you need to join this offer?',
        html: 'By clicking on agree, you will be joined to this offer and you cannot leave until the offer ends. click here to read <a href="#">License agreement</a>.',
        showCancelButton: true,
        confirmButtonColor: '#18bc9c',
        cancelButtonColor: '#2c3e50',
        confirmButtonText: 'Yes, count me in!',
        closeOnConfirm: false },
        function() {
            swal({
                title: 'Success!',
                text: 'You have successfully joined with this offer.',
                showCancelButton: false,
                confirmButtonColor: '#18bc9c',
                confirmButtonText: 'Okay',
                type: 'success',
                closeOnConfirm: false })
        })}

function reportOffer(){
    swal({
            title: 'Do you need to report this offer?',
            showCancelButton: true,
            confirmButtonColor: '#18bc9c',
            cancelButtonColor: '#2c3e50',
            confirmButtonText: 'Yes, report it!',
            closeOnConfirm: false },
        function() {
            swal({
                title: 'Describe your request',
                html: '<p><textarea cols="3" rows="3" class="form-control"></textarea>',
                showCancelButton: true,
                confirmButtonColor: '#18bc9c',
                cancelButtonColor: '#2c3e50',
                closeOnConfirm: false },
                function() {
                    swal({
                        title: 'You request has been reported.',
                        confirmButtonColor: '#18bc9c',
                    }); });
        })}