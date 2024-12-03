<?php

namespace App\Enums;

enum Section: string
{
    // Home page section
    case HOME_BANNER = 'home_banner';
    case HOME_THERAPY_SERVICE = 'therapy_services';
    case HOME_NETWORK_PSYCHOLOGISTS = 'network_of_psychologists';
    case HOME_NETWORK_PSYCHOLOGISTS_ITEM = 'network_of_psychologists_item';

    case HOME_PSYCHOLOGISTS_ITEM = 'home_of_psychologists_item';
    case REBATES = 'rebates';
    case REBATES_ITEM = 'rebates_item';

    //About Us page section
    case ABOUT_THERAPY_CONNECT = 'therapy_connect';

    // Service Page sections...

    case INDIVIDUAL_THERAPY = 'individual_therapy';
    case BENEFITS_INDIVIDUAL_THERAPY_TITLE = 'therapy_title';
    case BENEFITS_INDIVIDUAL_THERAPY = 'benefits_of_individual_therapy';
    case WHAT_TO_EXPECT_TITLE = 'what_to_expect_title';
    case WHAT_TO_EXPECT = 'what_to_expect';

    // Our Psychologists Page sections...

    case MEET_WITH_OUR_TEAM = 'meet_with_our_team';


    public static function HomePage()
    {
        return [
            self::HOME_BANNER->value => ['item' => 1, 'type' => 'first'],
            self::HOME_THERAPY_SERVICE->value => ['item' => 1, 'type' => 'first'],
            self::HOME_NETWORK_PSYCHOLOGISTS->value => ['item' => 1, 'type' => 'first'],
            self::HOME_NETWORK_PSYCHOLOGISTS_ITEM->value => ['item' => 3, 'type' => 'get'],
        ];
    }
    // About Us page section
    public static function AboutUsPage()
    {
        return [
            self::ABOUT_THERAPY_CONNECT->value => ['item' => 1, 'type' => 'first'],
        ];
    }
}


