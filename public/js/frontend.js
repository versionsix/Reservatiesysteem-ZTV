$( document ).ready(function() {
    console.log( "ready!" );
    $('#buttons_selected').attr('value','');
    $('#seatsCounter').text('Aantal zitjes geselecteerd: 0');
    $('#summernote').summernote({
        toolbar: [
            //[groupname, [button list]]

            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['view', ['codeview']],
        ]
    });

});
window.console&&console.log('Welkom in de console :D    ');
$( ".seatButton" ).click(function(event) {
    if( !event ) event = window.event;
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
$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Selecteer'
});
$('#datePickerContainer .input-group.date').datepicker({
    format: "dd-mm-yyyy",
    language: "nl-BE"
});

function updateSelectedButtonsArray() {
    window.console&&console.log('Generating the magic');
    var buttons_selected = [];
    $('.btn-primary').each(function(i, obj) {
        buttons_selected[i] = obj.id.substring(10, 13);
    });
    $('#seatsCounter').text('Aantal zitjes geselecteerd: ' + buttons_selected.length);
    $('#buttons_selected').attr('value',buttons_selected);
    window.console&&console.log('Buttons selected: ', buttons_selected);
}