<?php
// 读取TXT文件中的URL
$urls = file('video.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 随机选择一个URL
$randomUrl = $urls[array_rand($urls)];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Video Player</title>
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/dplayer/dist/DPlayer.min.css">
</head>
<body>
    <div id="dplayer" style="width: 100%; height: 100vh;"></div>
    <script src="https://fastly.jsdelivr.net/npm/dplayer/dist/DPlayer.min.js"></script>
    <script>
        const dp = new DPlayer({
            container: document.getElementById('dplayer'),
            video: {
                url: '<?php echo $randomUrl; ?>',
                type: 'auto'
            }
        });
    </script>
</body>
</html>
