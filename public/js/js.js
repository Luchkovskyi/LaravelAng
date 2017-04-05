$(document).ready(function() {

    $('.click').click(function() {
        var ind=$(this).attr("id");
        var name=$('.'+ind);
        var ArrList = $(name).map(function(){
            return $(this).text();
        }).get();
        $('#ind').val(ArrList[0]);
        $('#name').val(ArrList[1]);
        $('#desc').val(ArrList[2]);
        $('#category').val(ArrList[3]);

    console.log(ArrList[0]);
    });

    $('.delete').click(function(){

        item_id=$(".delete").val(); //id товара
        console.log(item_id);
        $.ajax({
            url: '/delete',
            method: 'POST',
            data: {item_id:item_id},
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res)
            {

            },
            error: function(msg)
            {
                console.log(msg);// если ошибка, то можно посмотреть в консоле
            }
        });

    })



});
