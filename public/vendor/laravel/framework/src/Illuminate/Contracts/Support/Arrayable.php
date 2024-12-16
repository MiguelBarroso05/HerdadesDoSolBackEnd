<?php

namespace Illuminate\Contracts\Support;

/**
 * @pages TKey of array-key
 * @pages TValue
 */
interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array<TKey, TValue>
     */
    public function toArray();
}
