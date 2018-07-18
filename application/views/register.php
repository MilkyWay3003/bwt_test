<div class="container">
                        
                <? if ($result) {
                  echo  "<p>Вы успешно зарегистрированы!</p>";
                }
                   elseif (isset($errors) && is_array($errors)) 
                   {
                    echo  "<ul>";
                            foreach ($errors as $error) 
                            {
                                echo "<li>".$error."</li>";
                            }                             
                    echo  "</ul>"; 
                    } ?>
                   
                   <?php include 'application/views/signup.php'; ?>
                
                <br/>
                <br/>
            </div>
        </div>
    </div>