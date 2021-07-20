$(document).ready(function(){
    $(".btn-next").on('click', function(){
        $('.first-party').prop('style', 'display:none');
        $('.second-party').removeAttr('style');
    })
    $(".btn-voltar").on('click', function () {
        $('.second-party').prop('style', 'display:none');
        $('.first-party').removeAttr('style');
    })

    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    let url   = baseUrl;

    $.get(url+'/WEB/agendamint/admin/bancos.json', function(result){
        console.log(result)
        result.forEach(element => {
            $('select[name=nome-banco]').append(
                '<option value="'+element.label+'">'+element.label+'</option>'
            );
            console.log(element.label)
        });
        
    })
})