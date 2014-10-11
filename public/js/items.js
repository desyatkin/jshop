function changeItemType(type_id)
{
    $('#item_type_id_1').toggle();
    $('#item_type_id_2').toggle();
}

function addParamRow()
{
    var row = $('#body_item_params div:first').html();
    $('#body_item_params').append('<div class="form-inline" style="margin-bottom: 15px;">' + row + '</div>');

}