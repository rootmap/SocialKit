// customs animation @unimed

var newRegTrigger = $('.new-user-title');
var existingRegTrigger = $('.existing-user-title');
var existingGuestTrigger = $('.existing-guest-title');
var newUser = $('.registration-form.new-user');
var existingUser = $('.registration-form.existing-user');
var guestUser = $('.registration-form.existing-guest-user');

newUser.css('left', 0);
existingUser.css('left', '35%');
guestUser.css('left', '60');

newRegTrigger.click(function () {
    $(this).addClass('active');
    $(this).parent().find(existingRegTrigger).removeClass('active');
    $(this).parent().find(existingGuestTrigger).removeClass('active');
    newUser.css('left', 0);
    existingUser.css('left', '35%');
    guestUser.css('left', '66%');
});

existingRegTrigger.click(function () {
    $(this).addClass('active');
    $(this).parent().find(newRegTrigger).removeClass('active');
    $(this).parent().find(existingGuestTrigger).removeClass('active');
    newUser.css('left', '-60%');
    existingUser.css('left', '-30%');
    guestUser.css('left', '60%');

});

existingGuestTrigger.click(function () {
    $(this).addClass('active');
    $(this).parent().find(newRegTrigger).removeClass('active');
    $(this).parent().find(existingRegTrigger).removeClass('active');

    newUser.css('left', '-60%');
    existingUser.css('left', '-65%');
    guestUser.css('left', '-60%');

});
