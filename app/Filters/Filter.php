<?php

namespace Statamic\Filters;

use Statamic\API\Str;
use Statamic\Extend\HasTitle;
use Statamic\Extend\HasHandle;
use Illuminate\Contracts\Support\Arrayable;

abstract class Filter implements Arrayable
{
    use HasTitle, HasHandle;

    public function required()
    {
        return false;
    }

    public function visible($key, $context)
    {
        return false;
    }

    public function toArray()
    {
        return [
            'handle' => $this->handle(),
            'title' => $this->title(),
            'options' => format_input_options($this->options()),
            'required' => $this->required(),
        ];
    }
}
