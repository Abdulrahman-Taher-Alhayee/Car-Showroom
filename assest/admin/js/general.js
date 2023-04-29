$(document).ready(function(){
    $(document).on('click','#update_image',function(e){
        e.preventDefault();
        if(!$("#photo").length){
            $("#update_image").hide();
            $("#cancel_update_image").show();
            $("#oldimage").html('<br><input type="file"  onchange="readURL(this)" name="photo" id="photo">');
        }
        return false;
    });
    $(document).on('click','#cancel_update_image',function(e){
        e.preventDefault();
            $("#update_image").show();
            $("#cancel_update_image").hide();
            $("#oldimage").html('');

        return false;
    });
});
function readURL(input) {
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#uploadedimg').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
