$(function () {
    $("._add_to_cart").click(function(){
        var id=$(this).attr("id_pro");
        $.ajax({
            type:"POST",
            url:"cart",
            data:{id:id,_token:_token},
            success:function (data) {
            $(".shopping-list").load(location.href+" .shopping-list",function(){
                totalPrice();
                DeleteCart();

            })

            },
            error:function(error){
                console.log(error);

            }


        })
    })

})



function totalPrice() {
var price=document.querySelectorAll(".amount");
var count=document.querySelectorAll("._count");
var total=0;
for(var i=0; i<count.length; i++){
 var total=total+count[i].innerHTML*price[i].innerHTML;
}
$(".total-amount").html("$"+total);
var count_item=$(".item_cart").length;
$(".2_Items").html(count_item+"Items");
$(".t_item").html(count_item);
}


totalPrice();



function DeleteCart() {
$(".del_cart").click(function(){
    var product_id=$(this).attr("product_id");
    $(this).closest("li").remove();
    $.ajax({
        type:"POST",
        url:"deleteCart",
        data: {product_id:product_id,_token:_token},
        success: function(){
            totalPrice();

        },
        error: function(){

        },


    })
})
}


DeleteCart();


