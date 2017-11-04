<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Color Music Website</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <script type="text/javascript" src="jquery-3.2.1.slim.min.js"></script>
    </head>
    <body>
        <header>
            <h1>Choose your Guitar...</h1>
            <h2 id="hover-guitar-header">Hover a guitar to see what song will play!</h2>
        </header>
        <section id="guitar-main-container">
            <!--BLACK GUITAR-->
        <?php 
        $colorArray = ["black", "grey", "silver", "white", "gold", "brown", "red", "orange", "yellow", "chartreuse", "lime", "green", "blue", "indigo", "purple", "violet", "lavender", "pink", "magenta"];
        $colorCodeArray = ["333", "666", "CCC", "EDE5D9", "D4A14F", "7C583A", "C1272D", "EF7726", "FFDA00", "D9E021", "8CC63F", "009245", "0071BC", "251463", "6D2791", "735AAF", "AF9DE0", "FF7BAC", "D32D71"];
            
        for($i = 0; $i < count($colorArray);$i++) {
            makeGuitar($colorArray[$i],$colorCodeArray[$i]);
        }
        function makeGuitar($color, $colorCode){
        echo "<svg id='Layer_1' class='$color guitar $colorCode' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 164.66 500'><title>black_guitar</title><line x1='59.49' y1='69.49' x2='65.54' y2='72.27' style='fill:none;stroke:#b3b3b3;stroke-miterlimit:10;stroke-width:4px'/><line x1='63.06' y1='57.53' x2='69.11' y2='60.31' style='fill:none;stroke:#b3b3b3;stroke-miterlimit:10;stroke-width:4px'/><line x1='66.48' y1='45.8' x2='72.28' y2='49.07' style='fill:none;stroke:#b3b3b3;stroke-miterlimit:10;stroke-width:4px'/><line x1='69.92' y1='34.08' x2='75.98' y2='36.86' style='fill:none;stroke:#b3b3b3;stroke-miterlimit:10;stroke-width:4px'/><line x1='73.01' y1='21.84' x2='79.07' y2='24.62' style='fill:none;stroke:#b3b3b3;stroke-miterlimit:10;stroke-width:4px'/><line x1='76.85' y1='9.39' x2='82.91' y2='12.17' style='fill:none;stroke:#b3b3b3;stroke-miterlimit:10;stroke-width:4px'/><ellipse cx='58.33' cy='69.57' rx='4.43' ry='3.6' transform='translate(-25.11 104.97) rotate(-72.97)' style='fill:#b3b3b3'/><ellipse cx='61.42' cy='57.33' rx='4.43' ry='3.6' transform='translate(-11.23 99.27) rotate(-72.97)' style='fill:#b3b3b3'/><ellipse cx='64.72' cy='45.85' rx='4.43' ry='3.6' transform='matrix(0.29, -0.96, 0.96, 0.29, 2.09, 94.3)' style='fill:#b3b3b3'/><ellipse cx='68.29' cy='33.88' rx='4.43' ry='3.6' transform='translate(16.05 89.25) rotate(-72.97)' style='fill:#b3b3b3'/><ellipse cx='71.86' cy='21.91' rx='4.43' ry='3.6' transform='translate(30.02 84.2) rotate(-72.97)' style='fill:#b3b3b3'/><ellipse cx='75.22' cy='9.19' rx='4.43' ry='3.6' transform='translate(44.56 78.42) rotate(-72.97)' style='fill:#b3b3b3'/><path d='M15.29,326.78S10,309.16,10,299s1-19.77,6.78-26.67,11-5.9,12.34-3.85,3.46,5.13,3.66,16,10.69,19.37,12.4,19.7,15,8.43,22.35-5.82,26.57,23.87,26.57,23.87,8.37,11.08,19.26,6.41,13.9-5.5,17.11-20.21,9.48-11.17,12.37-9.54,11.33,11.46,8.33,26.93-12.58,33.57-12,42.77,4.1,22,13.53,36.86,16.11,44.66,8.67,64.61-29.69,29-43.35,29.57-61.51.9-74.44-3.21-32.06-13-37.9-25.19-9.77-27.74,1-54.72,21.51-43.78,17-62.84S15.29,326.78,15.29,326.78Z' transform='translate(0.16 0)' style='fill:#$colorCode'/><path d='M48.54,425.58s-9-7.64-6-24.34,10.37-24,12.83-38.51,1.86-22.46-2.08-38,12.73-6.8,16.53-3.39,37.31,17.23,47.38,14,17.8-9,20.25-23.53,4.63-8.19,7.27-1.62,3.3,23.46-6.82,42.54-1.67,33.37,4.86,46.58,20.43,42.66,14.15,49.28-13.38.08-23.32-9.34-35-14.62-54.56-9.16S48.54,425.58,48.54,425.58Z' transform='translate(0.16 0)' style='fill:#fff'/><path d='M67.06,327.37l1.59-236.1s-10.45-4-8.43-9.84,22-72.76,22-72.76S86.45-2.27,95.73.43s16.81,10.75,8.57,22-12.51-2.6-7.38,18.72S103.62,71,103.62,71,89.69,72,90,95.06s5.61,235.72,5.61,235.72.57,3.5-4.44,4.48-18.87.8-21.07.19S66.9,335.54,67.06,327.37Z' transform='translate(0.16 0)' style='fill:#d3b488'/><circle cx='81.8' cy='325.74' r='1.94' style='fill:#736357'/><circle cx='81.66' cy='313.59' r='1.94' style='fill:#736357'/><circle cx='81.37' cy='299.45' r='1.94' style='fill:#736357'/><circle cx='80.93' cy='283.32' r='1.94' style='fill:#736357'/><circle cx='74.33' cy='256.72' r='1.94' style='fill:#736357'/><circle cx='87.99' cy='256.16' r='1.94' style='fill:#736357'/><circle cx='80.66' cy='224.08' r='1.94' style='fill:#736357'/><circle cx='80.17' cy='199.02' r='1.94' style='fill:#736357'/><circle cx='80.08' cy='171.01' r='1.94' style='fill:#736357'/><circle cx='79.42' cy='139.51' r='1.94' style='fill:#736357'/><line x1='67.52' y1='261.46' x2='94.02' y2='261.79' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.6' y1='250.07' x2='94.1' y2='250.4' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.3' y1='270.87' x2='94.56' y2='270.99' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.35' y1='279.8' x2='94.61' y2='279.91' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.95' y1='287.76' x2='94.72' y2='287.6' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.79' y1='295.93' x2='95.05' y2='296.04' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.69' y1='302.86' x2='94.95' y2='302.98' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.11' y1='309.52' x2='95.33' y2='310.18' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.02' y1='316.46' x2='95.51' y2='316.64' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.15' y1='328.61' x2='95.92' y2='328.3' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.46' y1='322.43' x2='95.47' y2='322.33' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.82' y1='240.66' x2='93.56' y2='241.2' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='68.64' y1='229.05' x2='93.15' y2='229.53' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.96' y1='217.87' x2='93.22' y2='218.14' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='67.82' y1='205.72' x2='93.09' y2='205.98' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='68.29' y1='191.37' x2='92.32' y2='191.57' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='68.21' y1='177.98' x2='91.97' y2='178.67' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='68.41' y1='164.11' x2='91.95' y2='164.05' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='68.18' y1='148.74' x2='91.73' y2='148.67' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='68.56' y1='131.16' x2='90.87' y2='131.03' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><line x1='68.67' y1='114.06' x2='90.71' y2='114.42' style='fill:none;stroke:#998675;stroke-miterlimit:10;stroke-width:2px'/><rect x='60.86' y='422.14' width='46.49' height='21.59' rx='10.08' ry='10.08' transform='translate(-4.26 0.88) rotate(-0.58)' style='fill:gray'/><rect x='60.5' y='394.61' width='46.49' height='21.59' rx='10.08' ry='10.08' transform='translate(-3.98 0.88) rotate(-0.58)' style='fill:#b3b3b3'/><rect x='59.98' y='340.31' width='46.49' height='21.59' rx='10.08' ry='10.08' transform='translate(-3.42 0.87) rotate(-0.58)' style='fill:#b3b3b3'/><polyline points='125.03 383.16 125.77 403.27 104.14 439.37' style='fill:none;stroke:#b3b3b3;stroke-miterlimit:10;stroke-width:6px'/>
            <a href='$color.html'target='_top'>
            <rect x='0' y='0' width='100%' height='100%' fill-opacity='0'/></a>
            </svg>";
        }
        ?>
            
        </section>
        <script>
        var musicArray = {
            black:"Black Coffee",
            grey:"Shades of Grey",
            silver:"Silver Lining",
            white:"White Wedding",
            gold:"After The Goldrush",
            brown:"Brown Eyes",
            red:"99 Red Balloons",
            orange:"Orange Crush",
            yellow:"Mellow Yellow",
            chartreuse:"(You dyed your hair) Chartreuse",
            lime:"Lime Green Fitted Blouse",
            green:"John Deere Green",
            blue:"Blue Moon",
            indigo:"The Indigo Swing",
            purple:"Purple People Eater",
            violet:"Violet",
            lavender:"Kiko and the Lavender Moon",
            pink:"Cadillac Pink",
            magenta:"Magenta Rose"
        };
        $("svg").hover(
            function() {
                var classes = this.getAttribute("class").split(" ");
                $("#hover-guitar-header").html(musicArray[classes[0]]);
                $("#hover-guitar-header").css("color","#" + classes[2]);
            }
        );
          $("svg").mouseleave(
                function() {
                    $("#hover-guitar-header").html("Hover a guitar to see what song will play!");
                    $("#hover-guitar-header").css("color","#666");
                }
        );
        </script>
    </body>
</html>