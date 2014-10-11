function changeItemType(type_id)
{
    $('#item_type_id_1').toggle();
    $('#item_type_id_2').toggle();
}

function addParamRow()
{
    var row = $('.param_row:first').html();
    $('#params').append(row);

}