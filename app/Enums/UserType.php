<?php

namespace App\Enums;

enum UserType: string
{
    case ADMIN = 'admin';
    case REVIEWER = 'reviewer';
    case AUTHOR = 'author';
}
