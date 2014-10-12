/**
 * Меняем выводимый блок в зависимости от типа покупки
 *
 * @param type_id
 */
function changeItemType(type_id)
{
    $('#item_type_id_1').toggle();
    $('#item_type_id_2').toggle();
}


/**
 * Добавляем строку с параметрами
 *
 */
function addParamRow()
{
    var row = $('#body_item_params div:first').html();
    $('#body_item_params').append('<div class="form-inline" style="margin-bottom: 15px;">' + row + '</div>');

}

/**
 * Обновляем названия поля стоимости
 * в соответствии с введенной ед. измерения
 *
 * @param unit
 */
function updateCostUnitField(unit)
{
    $('#cost_unit_label').html('Стоимость ' + unit + ' :');
    $('#cost_unit').attr('placeholder', 'Стоимость ' + unit + '')
}


/**
 * Меняем стоимость на кнопке в зависимости от количества
 *
 * @param number
 * @param cost
 */
function changeCost(number, cost)
{
    $('#button_cost').html('Купить за ' + (number * cost).toFixed(2));
}