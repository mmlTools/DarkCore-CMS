function onAdd(str) {
    $("#fuck").load();
    $.ajax({
        type: "GET",
        url: 'func.php',
        data: "functionName=test&param1="+str,
        success: function(response) {
            $('#txtHint').text(response);
        }
    });
}