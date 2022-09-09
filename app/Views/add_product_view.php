<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cake</title>
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

        .main_content{
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            
        }

        span {
    display: block;
    font-size: 20px;
    line-height: 28px;
    color: #1a1f36;
}
label {
    margin-bottom: 10px;
}

input {
    font-size: 16px;
    line-height: 28px;
    padding: 8px 0px;
    width: 100%;
    min-height: 20px;
    border: .5px solid #BDBDBD;
    border-radius: 4px;
    
}

input[type="submit"] {
    background-color: #1976D2;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
}

.form_content{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50%;
    flex-direction: column;
}

textarea {
    font-size: 16px;
    line-height: 28px;
    padding: 8px 0px;
    width: 100%;
    min-height: 20px;
    border: .5px solid #BDBDBD;
    border-radius: 4px;
}

.ll {
    display: flex;
    justify-content: center;
    align-items: center;
}

form{
    width: 50%;
}

form div{
    margin-top: 5px;
    margin-bottom: 5px;
}

.err{
    color: red;
}

.recp{
    display: flex;
    flex-direction: column;
}


    </style>
</head>

<body>
    <section>
        <div class="main_content">
           
           <div class="form_content">
           <span><?php echo isset($cake['id']) ?  'Edit Cake' :  'Create new cake' ?></span>
            <form method="POST" action="<?php echo isset($cake['id']) ? base_url('web/updateProduct/'.$cake['id']) : base_url('web/createProduct'); ?>">
                <div>
                <label for="name">Name</label>
                <?php if(isset($message)){
                if($message !== "1" && isset($message['name'])){
                   
                    echo "<p class='err'>".$message['name']."</p>";
                    }
                } ?>
                  <input type="text" required name="name" value="<?php echo isset($cake) ? $cake['name'] : '' ?>">
                </div>
                <div>
                <label for="type">Type</label>
                <?php if(isset($message)){
                if($message !== "1" && isset($message['type'])){
                    
                    echo "<p class='err'>".$message['type']."</p>";
                    }
                } ?>
                  <input type="text" required name="type" value="<?php echo isset($cake) ? $cake['type'] : '' ?>">
                </div>
                <div>
                  
                    <label for="price">Price</label>

                    <?php if(isset($message)){
                if($message !== "1" && isset($message['price'])){
                    echo "<p class='err'>".$message['price']."</p>";
                    }
                } ?>
                  
                  <input type="number" required name="price" value="<?php echo isset($cake) ? $cake['price'] : '' ?>">
                </div>

                <div class="recp">
                
                    <label for="recipe">Recipe</label>
                    <?php if(isset($message)){
                if($message !== "1" && isset($message['recipe'])){
                    echo "<p class='err'>".$message['recipe']."</p>";
                    }
                } ?>
                  <textarea placeholder="Recipe" required name="recipe"><?php echo isset($cake) ? $cake['recipe'] :  ''?></textarea>
                </div>

                <div class="ll">
                 
                  <input type="submit" value="Submit">
                </div>
                </div>
            </form>
           </div>
        </div>
    </section>
    
</body>
</html>