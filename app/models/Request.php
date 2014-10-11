<?php

class Request extends \Eloquent
{
    protected $table = 'requests';
    protected $fillable = ['user_id', 'item_id', 'status_id', 'money', 'description'];
}