<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <!-- 引入 DPlayer 的 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dplayer/dist/DPlayer.min.css">
</head>
<body>
    <!-- 视频播放器容器 -->
    <div id="dplayer" style="width: 100%; height: 100vh;"></div>

    <?php
    // 从TXT文件中读取视频URL
    $file = 'video.txt';
    $videoUrl = '';
    if (file_exists($file)) {
        $videoUrl = trim(file_get_contents($file));
    }
    ?>

    <!-- 引入 DPlayer 的 JS 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/dplayer/dist/DPlayer.min.js"></script>
    <script>
        const dp = new DPlayer({
            container: document.getElementById('dplayer'),
            video: {
                url: '<?php echo $videoUrl; ?>', // 从PHP变量中获取视频URL
                type: 'auto'
            }
        });
    </script>
</body>
</html>
