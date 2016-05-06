<?php
header("Content-type: text/html; charset=utf-8");
    if($_COOKIE['CN']=='0'&&$_COOKIE['US']=='0') {
    $markets = 'zh-cn';
}
if($_COOKIE['CN']=='1') {
    $markets = 'zh-cn';
}
if($_COOKIE['US']=='1') {
    $markets = 'en-us';
}
$header[] = "Ocp-Apim-Subscription-Key: 84a314765fc244bf871d6fea394c2a2c";
$header[] = "charset=UTF-8";
@$q = $_GET['q'];
if($q&&$q!=="") {
$q = urlencode($q);
$url = "https://bingapis.azure-api.net/api/v5/search/?q=$q&count=5&offset=0&mkt=$markets&safesearch=Moderate";
echo $url;
exit;
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // 获取数据返回  
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTP_VERSION, 1.1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_ENCODING, "");
$output = curl_exec($ch);
$output = json_decode($output,true);
$web_value = $output['webPages']['value'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a blog page with a list of posts.">

    <title>GCSE</title>

    


<link rel="stylesheet" href="css/pure-min.css">



<!--[if lte IE 8]>
  
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
  
<![endif]-->
<!--[if gt IE 8]><!-->
  
    <link rel="stylesheet" href="css/grids-responsive-min.css">
  
<!--<![endif]-->





  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/blog-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/blog.css">
    <!--<![endif]-->
  


    

    

</head>
<body>

<script>
function display() {
    settings = document.getElementById('settings');
    if (settings.style.display=="none") {
        settings.style.display="inline";
    }
    else if (settings.style.display=="inline") {
       settings.style.display="none";
    }
}    
</script>

<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            <h1 class="brand-title">GCSE</h1>
			<form class="pure-form" method="get">
				<fieldset>
					<input type="text" placeholder="Type Here" name="q" style="color: #000000;margin-bottom:.5em;" value="<?php echo @$_GET['q'];?>">
					<button type="submit" class="pure-button pure-button-primary" style="margin-bottom:.5em">Search</button>
				</fieldset>
			</form>
            <nav class="nav">
                <ul class="nav-list">
                	<li class="nav-item">
                        <a class="pure-button" onclick="display();">Settings</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="content pure-u-1 pure-u-md-3-4">
        <div>
<div id="settings" style="display:none">
    <h1 class="content-subhead">Select Markets</h1>
    <form class="pure-form" method="post" action="markets.php">
        <fieldset>
            <label for="CN">
            <input id="CN" type="checkbox" name="CN" <?php if ($_COOKIE['CN']=='1') {
                echo 'checked="checked"';
            } ?>>
            zh-CN
            </label>
            <label for="US">
            <input id="US" type="checkbox" name="US" <?php if ($_COOKIE['US']=='1') {
                echo 'checked="checked"';
            } ?>>
            en-US
            </label>
		    <button type="submit" class="pure-button pure-button-primary">Confirm</button>
       </fieldset>
    </form>
</div>
            <!-- A wrapper-->
            <div class="posts">
                <h1 class="content-subhead">Search Result</h1>
<?php
if ($q&&$q!=="") {
foreach ($web_value as $value) {
    ?>
                <section class="post">
                    <header class="post-header">                        
                        <h2 class="post-title"><?php echo $value['name'];?></h2>
                        <p class="post-meta">
                            <a class="post-category post-category-pure"><?php echo $value['dateLastCrawled'];?></a>
                            </p>
                    </header>

                    <div class="post-description">
                        <p>
                            <?php echo $value['snippet'];?>
                        </p>
                    </div>
                    <p class="post-meta">
    <a href="<?php echo $value['url'];?>" target="_blank" class="post-author"><?php echo $value['displayUrl'];?></a>
                         </p>
                </section>
    <?php
}
}
else {
    ?>
    <!--Can put content here-->
    <?php
}
?>
            </div>

            <div class="footer">
                <div class="pure-menu pure-menu-horizontal">
                    <ul>
                        <li class="pure-menu-item"><a href="about.html" class="pure-menu-link">About</a></li>
                        <li class="pure-menu-item"><a href="http://twitter.com/yuilibrary/" class="pure-menu-link">Wechat</a></li>
                        <li class="pure-menu-item"><a href="http://github.com/yahoo/pure/" class="pure-menu-link">GitHub</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>






</body>
</html>
