<?php

namespace App\Validation;

use App\Exceptions\FormValidationException;

class FormValidator
{
    private array $data;
    private array $errors = [];
    private array $rules;

    public function __construct(array $data, array $rules = [])
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function passes(): void
    {
        foreach ($this->rules as $key => $rules)
        {
            foreach ($rules as $rule) {

                [$name, $attribute] = explode(':', $rule);

                $ruleName = 'validate' . ucfirst($name); //ValidateRequired;

                $this->{$ruleName}($key, $attribute); // pasauc funkciju
            }
        }

        if (count($this->errors)>0)
        {
            throw new FormValidationException();
        }
    }

    private function validateRequired(string $key): void
    {
        if (empty(trim($this->data[$key])))
        {
            $this->errors[$key][] = "{$key} field is required.";
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}