$(function(){
    $('input#lname').autocomplete({
        source: '../php/getlname.php'
    });
});
