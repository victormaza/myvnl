function ajaxDelete(id,url){
    alert(url);
    $.ajax({
            type: 'POST',
            url: url,
            data: {
                'id': id
            },
            dataType: 'json',
            success: function(response) {
                if(response == 'good'){
                    $('p').hide();
                }
            },
            error: function() {
                alert('Erreur lors de la suppression');
            }

        }); 
    return false;   
}