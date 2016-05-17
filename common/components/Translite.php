<?php
namespace common\components;
/**
 * Translite class file.
 *
 * @author Evgeniy Verbitskiy <everbslab@gmail.com>
 * @version 0.0.1
 * @package helpers
 *  
 *  Класс предназначен для облегчения перевода русских ссылок в транслит для дальнейшей их записи в базу 
 * 
 *  @example
 *  
 *  $sefurl = Translite::rusencode('моя новая ссылка 1');
 *  -- преобразует русский текст в транслит вида "moya_novaya_ssylka_1".
 *  
 *    
 */
class Translite
{
	public static $rustable =array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    
    
    /* Функция перевода русского текста в транслит
     * 
     * @var string $str - исходная строка
     * @var string $spacechar - строка-разделитель пробелов
     * 
     */
    public static function rusencode($str = null, $spacechar = '_')
    {
    	if ($str)
    	{
    		$str = strtolower(strtr($str, self::$rustable));
            $str = preg_replace('~[^-a-z0-9_]+~u', $spacechar, $str);
            $str = trim($str, $spacechar);
            return $str;
    	} else {
    		return;
    	}
    }
}	 
?>