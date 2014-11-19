<?php

namespace OKLM\StringGenerator;

/**
 * Class PasswordGenerator
 * @package OKLM\StringGenerator
 */
class PasswordGenerator
{

    /**
     * @var string
     */
    private static $strengthEasy = 'azertyuiopqsdfghjklmwxcvbn';
    /**
     * @var string
     */
    private static $strengthMedium = 'AZERTYUIOPQSDFGHJKLMWXCVBN0123456789';
    /**
     * @var string
     */
    private static $strengthHard = '$€@éè#!';

    /**
     *
     */
    const PASSWORD_EASY = 1;
    /**
     *
     */
    const PASSWORD_MEDIUM = 2;
    /**
     *
     */
    const PASSWORD_HARD = 3;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * @param int $rand
     * @param $strength
     *
     * @return string
     *
     * @throws \Exception
     */
    public static function generate($rand = 10, $strength )
    {
        if (!in_array($strength, [
            self::PASSWORD_EASY,
            self::PASSWORD_MEDIUM,
            self::PASSWORD_HARD,
        ])) {
            throw new \Exception('Invalid strength');
        }

        switch($strength){
            case self::PASSWORD_EASY:
                $string = self::$strengthEasy;
                break;
            case self::PASSWORD_MEDIUM:
                $string = self::$strengthEasy.self::$strengthMedium;
                break;
            case self::PASSWORD_HARD:
                $string = self::$strengthEasy.self::$strengthMedium.self::$strengthHard;
                break;
        }

        $password = '';

        for($i = 0; $i < $rand; $i++){
            $password .= mb_substr($string, mt_rand(0, mb_strlen($string)-1), 1);
        }

        return $password;
    }
} 