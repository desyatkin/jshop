<?php

class Items extends \Eloquent
{
    protected $table = 'items';
    protected $fillable = ['id', 'user_id', 'city_id', 'name', 'description', 'status_id', 'end_date'];

    /**
     * Метод для возврата денег пользователю или пользователям?
     */
    public function rollbackMoney()
    {

    }

    /**
     * Метод для перевода денег создателю Закупки
     */
    public function sendToCreatorMoney()
    {

    }


    public function requests()
    {
        return $this->hasMany('Request');
    }

    public function params()
    {
        return $this->hasMany('ItemsParams');
    }

    public function pictures()
    {
        return $this->hasMany('ItemPictures', 'item_id');
    }

}