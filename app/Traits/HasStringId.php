<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Concerns\HasUniqueIds;
use Illuminate\Support\Str;

trait HasStringId
{
    use HasUniqueIds;

    public function uniqueIds(): array
    {
        return [$this->getKeyName()];
    }

    /**
     * Determine if the model uses unique ids.
     *
     * @return bool
     */
    public function usesUniqueIds()
    {
        return true;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        if (in_array($this->getKeyName(), $this->uniqueIds())) {
            return 'string';
        }

        return $this->keyType;
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        if (in_array($this->getKeyName(), $this->uniqueIds())) {
            return false;
        }

        return $this->incrementing;
    }

    public function newUniqueId(int $len = 16): string
    {
        $len = max($len, 16);

        $time = microtime();
        $time = substr($time, 11).substr($time, 2, 3);

        $prefix = base_convert($time, 10, 36);

        return strtoupper($prefix.Str::random($len - strlen($prefix)));
    }
}
