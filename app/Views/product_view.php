<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake View</title>

    <style>

        * {
            transition: background-color 300ms ease, color 300ms ease;
            margin: 0;
            padding: 0;
        }
        *:focus {
            background-color: rgba(221, 72, 20, .2);
            outline: none;
        }

        .main_body{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 2rem;
        }

        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .price_section {
            margin: 5px;
            background-color: #1976D2;
            padding: 6px;
            color:#fff;
            border-radius: 5px;
            cursor:pointer;
        }

        .main_body span{
            margin: 0px;
            padding: 0px;
            width: 30%;
        }

        .main_body span p{
            margin: 0px;
            padding: 0px;
           font-weight: bold;
           width: fit-content;
        }

    </style>
</head>
<body>
    <section>
        <div class="main_body">
            <?php if($message == "1"){
                ?>
                <h1>
                <?php echo $cake['name']; ?>
                </h1>
                 <span><p>Recipe:</p> <?php echo $cake['recipe']; ?></span>
                <div class="price_section" onclick="alert('<?php  echo 'Price: '.$cake['price']; ?>')">Purchase</div>
                <?php
            }else {
                ?>
                <h1><?php echo $message; ?></h1>
                <?php
            } ?>
        </div>
    </section>
</body>
</html>