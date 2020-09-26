<?php

/*
 * This file is part of the eluceo/iCal package.
 *
 * (c) 2020 Markus Poerschke <markus@poerschke.nrw>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eluceo\iCal\Presentation\Component\Property\Value;

use Eluceo\iCal\Presentation\Component\Property\Value;

final class ListValue extends Value
{
    /**
     * @var Value[]
     */
    private array $values = [];

    /**
     * @param Value[] $values
     */
    public function __construct(array $values)
    {
        array_walk($values, [$this, 'addValue']);
    }

    public function __toString(): string
    {
        return implode(',', array_map('strval', $this->values));
    }

    private function addValue(Value $value): void
    {
        $this->values[] = $value;
    }
}