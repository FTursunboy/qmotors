<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_statuses';

    const ORDER_TITLE = 'Запись в сервис';
    const ORDER_CREATED = 'Ваша запись создана';
    const ORDER_PAYED = 'работы по вашему заказу оплачены';
    const ORDER_REJECTED = 'Ваша заявка в автосервис отменена';



}
