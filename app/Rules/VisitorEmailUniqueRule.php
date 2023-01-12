<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use App\Api\Repositories\{
    VisitorRepository,
    AuthRepository,
};
use Illuminate\Support\Arr;

class VisitorEmailUniqueRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $model = resolve(VisitorRepository::class);

        $user = resolve(AuthRepository::class);

        $visitor = $model->model()->with('user')->find(request()->id);

        if (Arr::get($visitor, 'user.email') === $value) return true;

        $email = $user->model()->where('email', $value)->first();

        if ($email) $fail('The :attribute is exists.');;

        return true;
    }
}
