$(function () {
    $('#aa').on('click','li',function () {
        let id=parseInt($(this).attr('is_default'));
        $.ajax({
            url:'/index.php',
            data:{
                c:'category',
                m:'update',
            }
        })
    })
})