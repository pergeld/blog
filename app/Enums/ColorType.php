<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class ColorType extends Enum implements LocalizedEnum
{
    public const GRAY = 'gray';
    public const ZINC = 'zinc';
    public const NEUTRAL = 'neutral';
    public const RED = 'red';
    public const ORANGE = 'orange';
    public const AMBER = 'amber';
    public const YELLOW = 'yellow';
    public const LIME = 'lime';
    public const GREEN = 'green';
    public const EMERALD = 'emerald';
    public const TEAL = 'teal';
    public const CYAN = 'cyan';
    public const SKY = 'sky';
    public const BLUE = 'blue';
    public const INDIGO = 'indigo';
    public const VIOLET = 'violet';
    public const PURPLE = 'purple';
    public const FUCHSIA = 'fuchsia';
    public const PINK = 'pink';
    public const ROSE = 'rose';
}
