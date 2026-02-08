<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Items;

class CheckItemStock implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $item = request()->input('item');

        $item = Items::where('name', $item)->first();

        $requested_quantity = request()->input('quantity');

        if (!$item || $requested_quantity > $item->quantity || $item->quantity <= 0) {
            $fail('The requested quantity exceeds available stock of ' . $item->quantity);
            return;
        } elseif ($item->quantity <= 0) {
            $fail('The requested quantity is not available.');
            return;
        }
    }
}
