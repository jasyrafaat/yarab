$("._search").keyup(function () {
var _search=$(this).val();
$.ajax({
    type:"POST",
    url:"/search",
    data:{_search:_search, _token:_token},
    success:function(data){
        $(".data_search").html(data);
    },
    error:function(error){
        console.log(error);

    }

});
})
