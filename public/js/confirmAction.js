$(document).ready(function () {
$('.delete-btn').click(function (e) {
    e.preventDefault();
    $val=$(this).val();
if(confirm('هل تريد حذف '+$val+" ؟!")){
   return  true;
}else {
    return false;
}
})
});
