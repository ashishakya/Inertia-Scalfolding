<?php

namespace App\BDMS\Traits;

use App\BDMS\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait ModelTrait
 * @package App\SOSC\Traits
 */
trait ModelTrait
{
    /**
     * Boot method for creating, updating and deleting models.
     */
    public static function bootModelTrait()
    {
        static::creating(
            function ($model) {
                /** @var Model $model */
                $model->setAttribute('created_by', currentUser() ? currentUser()->id : null);
            }
        );

        static::updating(
            function ($model) {
                /** @var Model $model */
                $model->setAttribute('updated_by', currentUser() ? currentUser()->id : null);
            }
        );

        static::deleting(
            function ($model) {
                /** @var Model $model */
                $model->setAttribute('deleted_by', currentUser() ? currentUser()->id : null)->save();
            }
        );
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function destroyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}

