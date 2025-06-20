<?php

namespace App\Enums;

enum UserRole: string
{
    case Owner = 'kasir';
    case Admin = 'admin';
}
