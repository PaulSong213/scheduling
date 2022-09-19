<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Filename implements Rule
{
    protected $regex;

    public function __construct(string $regex)
    {
        $this->regex = $regex;
    }

    public function passes($attribute, $value)
    {
        if (!($value instanceof UploadedFile) || !$value->isValid()) {
            return false;
        }

        return preg_match($this->regex, $value->getClientOriginalName()) > 0;
    }

    public function message()
    {
        return 'The :attribute name is invalid.';
    }
}