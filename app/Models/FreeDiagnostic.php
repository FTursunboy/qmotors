<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeDiagnostic extends Model
{
    use ModelCommonMethods;

    public $fillable = ['tech_center_id', 'user_car_id', 'date', 'free_diagnostic_type_id'];

    const TYPES = [
        [
            [
                'name' => 'САЛОН, ЭЛЕКТРИКА',
                'types' => [
                    ['name' => '- Наличие предупреждающих сигналов опасности'],
                    ['name' => '- Функция зажигания, стартера и запуска'],
                    ['name' => '- Исправность стояночного тормоза'],
                    ['name' => '- Работа сцепления'],
                    ['name' => '- Работа АКПП/МКПП'],
                    ['name' => '- Исправность звукового сигнала'],
                    ['name' => '- Исправность стеклоподъемников'],
                    ['name' => '- Работа стеклоочистителя и омывателя'],
                    ['name' => '- Исправность внешнего освещения'],
                    ['name' => '- Работа системы кондиционирования'],
                ],
            ],
            [
                'name' => 'ПОДКАПОТНОЕ ПРОСТРАНСТВО',
                'types' => [
                    ['name' => '- Опоры силового агрегата'],
                    ['name' => '- Уровень масла ДВС и герметичность'],
                    ['name' => '- Уровень антифриза и герметичность'],
                    ['name' => '- Уровень жидкости ГУР и герметичность'],
                    ['name' => '- Уровень масла АКПП/МКПП'],
                    ['name' => '- Состояние тормозной жидкости'],
                    ['name' => '- Наличие вибрации и посторонних шумов'],
                    ['name' => '- Состояние АКБ'],
                    ['name' => '- Состояние свечей и проводов'],
                    ['name' => '- Целостность приводных ремней'],
                    ['name' => '- Подшипники ступиц передних колес']
                ]
            ],
            [
                'name' => 'ХОДОВАЯ (ПОДВЕСКА)',
                'types' => [
                    ['name' => '- Амортизаторы передней подвески'],
                    ['name' => '- Подшипники ступиц задних колес'],
                    ['name' => '- Амортизаторы задней подвески'],
                    ['name' => '- Чистота радиаторов'],
                    ['name' => '- Состояние колесных дисков и протектора'],
                    ['name' => '- Диски и колодки передних колес'],
                    ['name' => '- Диски и колодки задних колес'],
                    ['name' => '- Состояние тормозных шлангов'],
                    ['name' => '- Рычаги передней подвески'],
                    ['name' => '- Рычаги задней подвески'],
                    ['name' => '- Состояние шаровых опор'],
                    ['name' => '- Рулевая рейка'],
                    ['name' => '- Шарниры рулевого управления'],
                    ['name' => '- Крепление переднего стабилизатора'],
                    ['name' => '- Крепление заднего стабилизатора'],
                    ['name' => '- Шрус, пыльники и люфт'],
                    ['name' => '- Сайлентблоки подрамника'],
                    ['name' => '- Течи и запотевания сальников и поддонов'],
                    ['name' => '- Герметичность системы выхлопа'],
                    ['name' => '- Карданный вал'],
                    ['name' => '- Силовые элементы днища кузова'],
                    ['name' => '- Состояние штатных элементов защиты']
                ],
            ],
        ]
    ];

    public function tech_center(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TechCenter::class);
    }

    public function user_car(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserCar::class);
    }

    public function free_diagnostic_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FreeDiagnosticType::class);
    }
}
