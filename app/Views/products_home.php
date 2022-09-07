<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Home</title>
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
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            overflow: scroll;
            gap: 5rem;
        }

        .search_input{
            width: 50%;
            display: flex;
            flex-direction: row;
            gap: 5px;
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

        input[type=text] {
            width: 100%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            padding: 12px 20px 12px 20px;
        }

        input[type=submit] {
            width: 30%;
            cursor: pointer;
        }
        ul{
           
            list-style-type: none;
        }

        ul li {
            margin: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            cursor: pointer;
        }

        ul li p {
            font-style: normal;
            font-weight: 200;
        }

        .li_mt{
            margin-top: 5px;
            font-size: 13px;
            font-weight: 700;
        }

        

        .price_section {
            margin: 5px;
            background-color: #1976D2;
            padding: 6px;
            color:#fff;
            border-radius: 5px;
            cursor:pointer;
        }

        .ul_container{
           
            width: 50%;
        }

        a {
            text-decoration: none;
            color: rgba(33, 37, 41, 1);
        }

        .inner {
            width: 100%;
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .inner a {
            color: red;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
<section>

<div class="main_body">
    <h1>The CakeShop API</h1>
    <a href="<?php echo base_url('web/createProduct') ?>" class="price_section">Add Cake</a>
    <?php 
        if(isset($message)){
            if($message == '1'){
                ?>

                   <div class="ul_container">
                     <ul>
                      
                    <?php foreach ($cakes as $item): ?>
                       
                        <li>
                            <div class="inner"><a href="<?php echo base_url('web/deleteProduct/'.$item['id']) ?>">Delete</a></div>
                            <a href="<?php echo base_url('web/viewProduct/'.$item['id']) ?>">
                            <h2><?php echo $item['name'] ?></h2>
                            <p><?php echo $item['recipe'] ?></p>
                            </a>
                          
                         
                           
                        </li>
                        

                    <?php endforeach ?>
                    
                    </ul>
                   </div>
                <?php
            }else{ ?>
               <h1><?php echo $message; ?></h1> 
           <?php }
        }
    ?>
</div>

</section>
</body>
</html>