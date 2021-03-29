function qwe()
{
    $("input").on("keypress", function(e) {

        var char = /["a-zA-Z]/;
        var val = String.fromCharCode(e.which);
        var test = char.test(val);

        if(!test) return false
    })
}
/*
function keyPress(event)
{
    if (event.keyCode >= 97 && event.keyCode <= 122)
    {
        alert(event.keyCode);
    }
    else
    {
        //alert(event.keyCode);
    }
}*/
