<?php
// 读取TXT文件中的URL
$urls = file('video.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if (!$urls) {
    die('无法读取URL文件');
}

// 随机选择一个URL
$random_url = $urls[array_rand($urls)];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPlayer Example</title>
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/dplayer/dist/DPlayer.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #dplayer-container {
            width: 100%;
            position: relative;
            padding-bottom: 48%; 
            height: 0;
        }
        #dplayer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="dplayer-container">
        <div id="dplayer"></div>
    </div>
    <script src="https://fastly.jsdelivr.net/npm/dplayer/dist/DPlayer.min.js"></script>
    <script>
        const dp = new DPlayer({
            container: document.getElementById('dplayer'),
            autoplay: true,
            video: {
                url: '<?php echo $random_url; ?>',
                type: 'auto'
            }
        });

        // 移动端全屏时自动横屏
        dp.on('fullscreen', function() {
            if (screen.orientation && screen.orientation.lock) {
                screen.orientation.lock('landscape').catch(function(error) {
                    console.error('无法锁定屏幕方向:', error);
                });
            }
        });
    </script>
</body>
</html>
