    //
	// $('#bb').on('click','li',function(){
	// 	$(this).appendTo('#aa')
	// })
    //
	// $('#aa').on('click','li',function(){
	// 	$(this).appendTo('#bb')
	// })
    //
    $(function () {
        $('#aa').on('click','li',function () {
            let id=$(this).attr('is_default');
            $.ajax({
                url:'/index.php',
                data:{
                    c:'news',
                    m:'category_update',
                    i:id,
                    t:'0'
                },
                success:()=>{
                    $(this).appendTo($('#bb'))
                }
            })
        })
    })

    $(function () {
        $('#bb').on('click','li',function () {
            let id=$(this).attr('is_default');
            $.ajax({
                url:'/index.php',
                data:{
                    c:'news',
                    m:'category_update',
                    i:id,
                    t:'1'
                },
                success:()=>{
                    $(this).appendTo($('#aa'))
                }
            })
        })
    });