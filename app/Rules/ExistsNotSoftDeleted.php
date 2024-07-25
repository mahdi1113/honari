<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

class ExistsNotSoftDeleted implements Rule
{
    protected $model;

    /**
     * Create a new rule instance.
     *
     * @param string $model
     * @return void
     */
    public function __construct(string $model)
    {
        $this->model = $model;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !is_null(
            app($this->model)->withTrashed()->where('id', $value)->whereNull('deleted_at')->first()
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected :attribute is invalid or has been deleted.';
    }
}
