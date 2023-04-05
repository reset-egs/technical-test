<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class RoomCapacity implements Rule
{
    /**
     * The ID of the room being validated.
     *
     * @var int
     */
    protected $resourceId;

    /**
     * Create a new rule instance.
     *
     * @param  int  $resourceId
     * @return void
     */
    public function __construct($resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $roomCapacity = DB::table('rooms')->where('id', $this->resourceId)->value('number_of_people');

        return $value <= $roomCapacity;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The :attribute is greater than the room capacity.";
    }
}
