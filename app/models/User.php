<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = ['email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Пополнение баланса пользователя
     * @param $value mixed
     * @param $user_id mixed
     * @return mixed
     */
    public function addMoney($value, $user_id = false)
    {
        $result = [
            'success' => false,
            'errors' => [],
        ];

        try {
            DB::beginTransaction();
            //если $user_id не false то это перевод от другого пользователя
            if($user_id) {
                $user = User::find($user_id);
                if($user) {
                    if($user->money < $value) {
                        throw new \Exception('У пользователя не достаточно средств для перевода');
                    } else {
                        //Списываем деньги
                        $user->money = $user->money - $value;
                        //Делаем историю
                        Transaction::create([
                            'user_id'    => $user->id,
                            'to_user_id' => $this->id,
                            'type_id'    => 4,
                            'value'      => $value
                        ]);

                        $this->money = $this->money + $value;
                    }
                } else {
                    throw new \Exception('Нет такого пользователя');
                }
            } else {
                //Иначе это пополнение счёта из вне
                $this->money = $this->money + $value;
                //Делаем историю
                Transaction::create([
                    'user_id'    => $this->id,
                    'type_id'    => 1,
                    'value'      => $value
                ]);
            }
            DB::commit();
        }catch (\Exception $e) {
            $result['errors'][] = $e->getMessage();
            DB::rollback();
        }

        return $result;
    }
}
