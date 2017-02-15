window.console&&console.log('Welkom in de console :D    ');
$( ".seatButton" ).click(function() {
    $(event.target).toggleClass("btn-success");
    $(event.target).toggleClass("btn-primary");
    // window.console&&console.log("Ceci c'est bouton:" + event.target.id.substring(10, 13));
    updateSelectedButtonsArray()
});

$( "#test" ).click(function() {
    window.console&&console.log('Generating the magic');
    var buttons_selected = [];
    $('.btn-primary').each(function(i, obj) {
        buttons_selected[i] = obj.id.substring(10, 13);
        window.console&&console.log('Button: ' , obj.id.substring(10, 13));
    });
    window.console&&console.log('Buttons selected: ', buttons_selected)
});



function updateSelectedButtonsArray() {
    window.console&&console.log('Generating the magic');
    var buttons_selected = [];
    $('.btn-primary').each(function(i, obj) {
        buttons_selected[i] = obj.id.substring(10, 13);
    });
    $('#buttons_selected').attr('value',buttons_selected);
    window.console&&console.log('Buttons selected: ', buttons_selected);
}