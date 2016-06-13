<?php
return 'conhxw';
function conhxw(&$content) {

	//全角转半角（可能和下面放一起更合适吧）
	$str_sbc = 'ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ１２３４５６７８９０ａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚ［］；＇／．，＜＞？＂：｜＋＿＼＝－）（＊＆＾％＄＠！￣';
	$str_ori = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz[];\'/.,<>?":|+_\=-)(*&^%$@!~';

	for ($i = 0; $i < strlen($str_sbc); $i += 3) {
		$content = str_replace($str_sbc{$i} . $str_sbc{$i + 1} . $str_sbc{$i + 2}, $str_ori{$i / 3}, $content);
	}

	//转换数字时同时转换火星文
	$ary_hxw = array('҉|', 'ā|á|ǎ|à|а|А|α', 'в|в|В|ъ|Ъ|ы|Ы|ь|Ь|β', 'с|с|С', 'Ё|е|Е|ё|Ё|ê|ē|é|ě|è', '℉|ｆ', 'ɡ', 'н|Н', 'ī|í|ǐ|ì', 'ｊ', 'κ', 'ι', 'м|М', 'ń|п|П|Й|π', 'ō|ó|ǒ|ǒ|о|О|ο|σ|⊙|○|◎', 'р|Р|ρ', 'я|Я', '\$', 'т|Т|τ', 'ū|ú|ǔ|ù|∪|μ|υ', '∨|ν', 'ω', '×|х|Х|χ', 'у|У|γ', 'ф|Ф', '蕶|零|〇', ' 一|壹|Ⅰ|⒈|㈠|①|⑴', '二|贰|Ⅱ|⒉|㈡|②|⑵|ニ|貳', '三|叁|Ⅲ|⒊|㈢|③|⑶|弎|э|Э', '四|肆|Ⅳ|⒋|㈣|④|⑷', '五|伍|Ⅴ|⒌|⑤|㈤|⑸', '六|陆|陸|Ⅵ|⒍|㈥|⑥|⑹', '七|柒|Ⅶ|⒎|⑦|㈦|⑺', '八|捌|ハ|仈|Ⅷ|⒏|㈧|⑧|⑻|θ', '九|玖|艽|Ⅸ|⒐|⑨|㈨|⑼', '十|拾|㈩|⑩|⒑|Ⅺ|⑽');
	$ary_ori = array('', 'a', 'b', 'c', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', '中', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10');

	for ($i = 0; $i < count($ary_hxw); $i++) {
		$content = preg_replace('/' . $ary_hxw[$i] . '/is', $ary_ori[$i], $content);
	}

	//替换HTML编码字符
	$content = html_entity_decode($content, ENT_QUOTES);

};
