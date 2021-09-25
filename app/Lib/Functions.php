<?php

define("LOGIN_NONE", 0);
define("LOGIN_ADMIN", 1);
define("LOGIN_TEACHER", 2);
define("LOGIN_STUDENT", 3);

define("QUESTION_FOR_NONE", 0);
define("QUESTION_FOR_TEST", 1);
define("QUESTION_FOR_EXAM", 9);

define("PUBLIC_PATH", "");

/**-------------------------------------------------------------
 * The function create_password($len, $diff) is used to create
 * a random password. The arguments are:
 *     $len : the length of the password.
 *        PASSWORD_SHORT_LENGTH   = 4
 *        PASSWORD_MIDDLE_LENGTH  = 6
 *        PASSWORD_LONG_LENGTH    = 8
 *        PASSWORD_TOOLONG_LENGTH = 12
 *     $dif : the difficulty of the password
 *        PASSWORD_EASY = 0
 *        PASSWORD_AVER = 1
 *        PASSWORD_DIFF = 2
 * This function returns a passwword as a string.
 * @param $len
 * @param $dif
 * @return string
 */
function randomPassword($len = 6, $dif = 0)
{
	switch ($dif) {
		case 0:
			$abc = "0123456789";
			break;
		case 1:
			$abc = "qw0er1ty2ui3opa4sdf5ghj6kl7zx8cv9bnm";
			break;
		default:
			$abc = "01eErRt89qTyYuUiIoOpPaVbBnNmM@As234*567Qw&WSdDfFgGhHjJkKlLzZxXcCv";
			break;
	}
	$n = strlen($abc);
	$pwd = "";
	for ($i = 0; $i < $len; $i++) {
		$pwd = $pwd.substr($abc, rand(0, $n-1), 1);
	}
	return $pwd;
}

function randomMediumPassword()
{
    return randomPassword(8, 1);
}

function randomLongPassword()
{
    return randomPassword(12, 2);
}

/**----------------------------------------------------------------------
 *  This function is used to create a random array of $m different integer
 *  numbers from $n given numbers.
 * @param $m
 * @param $n
 * @return array
 */
function getRandomQuestionNumber($m, $n)
{
    $arr = [];
    for ($i = 0; $i < $m; $i++)
    {
        while (true)
        {
            $num = rand(0, $n-1);
            $c = count($arr);
            $flag = true;
            for ($j = 0; $j < $c; $j++)
            {
                if ($num == $arr[$j])
                {
                    $flag = false;
                    break;
                }
            }
            if ($flag)
            {
                break;
            }
        }
        $arr[$i] = $num;
    }
    return $arr;
}

/**--------------------------------------------------------
 *  This function is used to create a random answer.
 * @param $array
 * @return array
 */
function createRandomAnswer($array)
{
    $permutation = array(
        array(0, 1, 2, 3), array(0, 1, 3, 2), array(0, 2, 1, 3),
        array(0, 2, 3, 1), array(0, 3, 2, 1), array(0, 3, 1, 2),
        array(1, 0, 2, 3), array(1, 0, 3, 2), array(1, 2, 3, 0),
        array(1, 2, 0, 3), array(1, 3, 0, 2), array(1, 3, 2, 0),
        array(2, 0, 1, 3), array(2, 0, 3, 1), array(2, 1, 0, 3),
        array(2, 1, 3, 0), array(2, 3, 1, 0), array(2, 3, 0, 1),
        array(3, 0, 1, 2), array(3, 0, 2, 1), array(3, 1, 0, 2),
        array(3, 1, 2, 0), array(3, 2, 1, 0), array(3, 2, 0, 1)
    );
    $r = rand(0, 23);
    $list[0] = $array[$permutation[$r][0]];
    $list[1] = $array[$permutation[$r][1]];
    $list[2] = $array[$permutation[$r][2]];
    $list[3] = $array[$permutation[$r][3]];
    return $list;
}

