<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Note;

class NumberRecordsInTable implements Rule
{
    protected $max_table_size;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($number)
    {
        $this->max_table_size = $number;
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
        // TODO Search how to use Services in custom rules
        $count = Note::all()->count();
        return $count < $this->max_table_size;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Exceeded the number of records in the table.';
    }
}
