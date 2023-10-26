<?php

namespace App\Helpers;

use App\Models\Banner;
use App\Models\Contact;

class Helper
{
    public static function banner_image(): string
    {
        $banner = Banner::select('file')->first();

        return $banner->file;
    }

    public static function contact_phone(): string
    {
        $phone = Contact::first()->phone;
        return self::phone_number_format($phone);
    }
    public static function phone_number_format(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        $length = strlen($phone);

        if ($length == 12)
            $formattedNumber = '(' . substr($phone, 3, 2) . ') ' . substr($phone, 5, 3) . '-' . substr($phone, 8, 2) . '-' . substr($phone, 10, 2);
        else if ($length == 9)
            $formattedNumber = '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 3) . '-' . substr($phone, 5, 2) . '-' . substr($phone, 7, 2);
        else
            return 'Invalid phone number';

        return "+998". $formattedNumber;
    }


}
