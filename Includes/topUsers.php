<?php
 $donation = $db->query('SELECT donation FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['donation']; 
 
        if($donation>=10){
           $array1=array();
           
            for($i=0; $i<=3000; $i++){
                if($i<=3000){
                    $infoPower[$i] = $db->query("SELECT power FROM users WHERE id = $i")->fetch_assoc()['power'];
                   $infoPower1[$i] = $db->query("SELECT nick FROM users WHERE id = $i")->fetch_assoc()['nick'];
                  
                   if($infoPower[$i]!='' or $infoPower1[$i]!='')
                       {
                           array_push($array1,  "$infoPower[$i]   $infoPower1[$i]" );
                           
                       }
                        
                    
                    }
                    
            }
           natcasesort($array1);
           
               $array2 = ( array_reverse($array1));
           
           
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Выберите локацию для охоты
            
            1. ✊🏻  $array2[0] 
            2. ✊🏻  $array2[1] 
            3. ✊🏻  $array2[2] 
            4. ✊🏻  $array2[3] 
            5. ✊🏻  $array2[4] 
            6. ✊🏻  $array2[5] 
            7. ✊🏻  $array2[6] 
            8. ✊🏻  $array2[7] 
            9. ✊🏻  $array2[8] 
            10.✊🏻  $array2[9] 
            ", [[$hunt],[ $menu ]]);
           
           
        }
        else{
             $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n У вас не достаточно прав",  [[$profile,$storage],[$buyteam,$bonus],[$cases,$hunt],[$help], [$games]]);
        }
?>