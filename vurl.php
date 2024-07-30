<?php $a=file('video.txt');$b=$a[array_rand($a)];header("Location:$b");
