<?php

    include('simple_html_dom.php');
    $articles = array();
    getArticles('http://www.meleon.ru/category/kitchen-small-appliances/');

function getArticles($page) {
    global $articles, $descriptions;
    
    $html = new simple_html_dom();
    $html->load_file($page);
    
    $items = $html->find('div[class=mp-block-in]');
    foreach($items as $post) {
        $articles[] = array($post->find('a',0)->href,
		$post->find('img',0)->src,
		$post->find('div[class=mp-title]',0)->children(0)->innertext,
		$post->find('span[class=mp-price-val]',0)->innertext 
		);
    }
}
?>

<html>
<head>
</head>
<body>
    <div id="main">
<?php
    foreach($articles as $item) {
        echo '<b>URL:</b> '.$item[0].'<br/>';
		echo '<b>URL picture:</b> '.$item[1].'<br/>';
        echo '<b>Name:</b> '.$item[2].'<br/>';
		echo '<b>Price:</b> '.$item[3].'<br/>';
		echo '<br/>';
    }
?>
    </div>
</body>
</html>









