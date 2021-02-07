<?php

 $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
          $recruit = $db->query('SELECT recruit FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['recruit'];
           $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
         $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
         $trump = $db->query('SELECT trump FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['trump'];
         $wanderer = $db->query('SELECT wanderer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['wanderer'];
        $inspector = $db->query('SELECT inspector FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['inspector'];
        $ghost = $db->query('SELECT ghost FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['ghost'];
        $kok = $db->query('SELECT kok FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['kok'];
        $zombies = $db->query('SELECT zombies FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['zombies'];
        $merchant = $db->query('SELECT merchant FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['merchant'];
        $rider = $db->query('SELECT rider FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['rider'];
        $undertaker = $db->query('SELECT undertaker FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['undertaker'];
        $baron = $db->query('SELECT baron FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['baron'];
        $rusalka = $db->query('SELECT rusalka FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['rusalka'];
        $dragon = $db->query('SELECT dragon FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['dragon'];
         $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        $silver_key = $db->query('SELECT silver_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['silver_key'];
        $time_2_min = $db->query('SELECT time_2_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_min']; // вытягиваем весь баланс
        $time_60_min = $db->query('SELECT time_60_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_min'];
        $time_240_min = $db->query('SELECT time_240_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_min'];
        $time_720_min = $db->query('SELECT time_720_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_720_min'];
        $time_1440_min = $db->query('SELECT time_1440_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_min'];
        $time_2_chek = $db->query('SELECT time_2_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_chek'];
        $time_60_chek = $db->query('SELECT time_60_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_chek'];
        $time_240_chek = $db->query('SELECT time_240_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_chek'];
        $time_720_chek = $db->query('SELECT time_720_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_720_chek'];
        $time_1440_chek = $db->query('SELECT time_1440_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_chek'];
        $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
        $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
        $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
            if($strange_key>=50){
                $strange_key=$strange_key-50;
                $xp_curent=$xp_curent + 500;
                $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
                for($i=0; $i<=50; $i++)
                {
                 $result = mt_rand(1, 100000);
                $win_money[$i] = ($result< 10000 ? $balance=$balance + 2500000 
                : ($result >= 10000 && $result < 20000 ? $stars=$stars+100000 
                : ($result >= 20000 && $result < 30000 ? $shards=$shards+10000 
                : ($result >= 30000 && $result < 40000 ? $spheres=$spheres+1000 
                : ($result >= 40000 && $result < 50000 ? $wanderer=$wanderer + 1
                : ($result >= 50000 && $result < 57000 ? $stars=$stars+10000000 
                : ($result >= 57000 && $result < 64000 ? $shards=$shards+1000000 
                : ($result >= 64000 && $result < 71000 ? $spheres=$spheres+100000 
                : ($result >= 71000 && $result < 76000 ? $stars=$stars+50000000 
                : ($result >= 76000 && $result < 81000 ? $shards=$shards+5000000 
                : ($result >= 81000 && $result < 86000 ? $spheres=$spheres+500000  
                : ($result >= 86000 && $result < 89000 ? $stars=$stars+100000000  
                : ($result >= 89000 && $result < 92000 ? $shards=$shards+10000000 
                : ($result >= 92000 && $result < 95000 ? $spheres=$spheres+1000000 
                : ($result >= 95000 && $result < 96000 ?  $balance=$balance + 10000000 
                : ($result >=96000  &&  $result<97000 ? $balance=$balance + 25000000 
                
                :( $result>= 97000  &&   $result< 98000 ? $wanderer=$wanderer + 10 
                :( $result>= 98000 &&   $result< 98200 ? $inspector =$inspector  + 1 
                :( $result>= 98200 &&   $result< 98400 ? $ghost =$ghost  + 1 
                :( $result>= 98400 &&   $result< 98600 ? $kok =$kok  + 1 
                :( $result>= 98600 &&   $result< 98800 ? $zombies =$zombies  + 1 
                :( $result>= 98800 &&   $result< 99000 ? $merchant =$merchant  + 1 
                :( $result>= 99000 &&   $result< 99200 ? $rider =$rider  + 1 
                :( $result>= 99200 &&   $result< 99400 ? $undertaker =$undertaker  + 1 
                :( $result>= 99400 &&   $result< 99600 ? $baron =$baron  + 1 
                :( $result>= 99600 &&   $result< 99800 ? $rusalka =$rusalka  + 1 
                : $dragon =$dragon  + 1))))))))))))))))))))))))));
                $drop[$i] = ($result< 10000 ? '📦 Выиграли 2500000 💵' 
                : ($result >= 10000 && $result < 20000 ? ' 📦 Выиграли 🌟100000 Звёзд' 
                : ($result >= 20000 && $result < 30000 ? ' 📦 Выиграли ✨10000 Осколков' 
                : ($result >= 30000 && $result < 40000 ? ' 📦 Выиграли 🔮1000 Сфер' 
                : ($result >= 40000 && $result < 50000 ? ' 📦 Выиграли 👳‍♂x1 Скитальцев'
                : ($result >= 50000 && $result < 57000 ? ' 📦 Выиграли 🌟10000000 Звёзд'
                : ($result >= 57000 && $result < 64000 ? ' 📦 Выиграли ✨1000000 Осколков '
                : ($result >= 64000 && $result < 71000 ? ' 📦 Выиграли 🔮100000 Сфер'
                : ($result >= 71000 && $result < 76000 ? ' 📦 Выиграли 🌟50000000 Звёзд' 
                : ($result >= 76000 && $result < 81000 ? ' 📦 Выиграли ✨5000000 Осколков' 
                : ($result >= 81000 && $result < 86000 ? ' 📦 Выиграли 🔮500000 Сфер' 
                : ($result >= 86000 && $result < 89000 ? ' 📦 Выиграли 🌟100000000 Звёзд (👍🏻)' 
                : ($result >= 89000 && $result < 92000 ? ' 📦 Выиграли ✨10000000 Осколков 👍🏻) ' 
                : ($result >= 92000 && $result < 95000 ? ' 📦 Выиграли 🔮1000000 Сфер (👍🏻)' 
                : ($result >= 95000 && $result < 96000 ? ' 📦 Выиграли 10000000 💵' 
                : (($result >=96000  &&  $result<97000) ? ' 📦 Выиграли 25000000 💵 ' 
                
                :($result>= 97000  &&   $result< 98000 ?   '📦 Выйграли 👳‍♂x10 Скитальцев ' 
                :($result>= 98000 &&   $result< 98200 ?   '📦 Выйграли 👮‍♂x1 Инспектор (👍🏻)'
                :( $result>= 98200 &&   $result< 98400 ? '📦 Выйграли 👻x1 Призрак (👍🏻)'
                :( $result>= 98400 &&   $result< 98600 ? '📦 Выйграли 👨‍🍳x1 Кок (👍🏻)' 
                :( $result>= 98600 &&   $result< 98800 ? '📦 Выйграли 🧟‍♂x1 Зомби (👍🏻)'
                :( $result>= 98800 &&   $result< 99000 ? '📦 Выйграли 🧕‍x1 Торговец (👍🏻)'
                :( $result>= 99000 &&   $result< 99200 ? '📦 Выйграли 🏇x1 Всадник  (👍🏻)' 
                :( $result>= 99200 &&   $result< 99400 ? '📦 Выйграли 🕴x1 Гробовщик (👍🏻)' 
                :( $result>= 99400 &&   $result< 99600 ? '📦 Выйграли 👨‍🏫x1 Барон (👍🏻)'
                :( $result>= 99600 &&   $result< 99800 ? '📦 Выйграли 🧜‍♀x1 Русалка (👍🏻)'
                : "📦 Выйграли 🐲 x1 Дракон (👍🏻)"  ))))))))))))))))))))))))));
                
               if($time_2_chek==1){
                   if($inspector>=1){
                       $time_2_chek=0;
                       $time_2_min=$time;
                       $vk->sendMessage($peer_id,"@id$id ($userinfo[first_name] $userinfo[last_name]) ✅ OK");
                   }
               }
                if($time_720_chek==1){
                   if($ghost>=1 or $kok>=1 or $zombies>=1){
                       $time_720_chek=0;
                       $time_720_min=$time;
                       $vk->sendMessage($peer_id,"@id$id ($userinfo[first_name] $userinfo[last_name]) ✅ OK");
                   }
               }
               if($time_1440_chek==1){
                   if($merchant >=1 or $rider >=1 or $undertaker >=1 or $baron >=1 or $rusalka >=1 or $dragon >=1){
                       $time_1440_chek=0;
                       $time_1440_min=$time;
                   }
               }
                
                }
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n 
            Вам выпало:
            $drop[0]
            $drop[1]
            $drop[2]
            $drop[3]
            $drop[4]
            $drop[5]
            $drop[6]
            $drop[7]
            $drop[8]
            $drop[9]
            $drop[10]
            $drop[11]
            $drop[12]
            $drop[13]
            $drop[14]
            $drop[15]
            $drop[16]
            $drop[17]
            $drop[18]
            $drop[19]
            $drop[20]
            $drop[21]
            $drop[22]
            $drop[23]
            $drop[24]
            $drop[25]
            $drop[26]
            $drop[27]
            $drop[28]
            $drop[29]
            $drop[30]
            $drop[31]
            $drop[32]
            $drop[33]
            $drop[34]
            $drop[35]
            $drop[36]
            $drop[37]
            $drop[38]
            $drop[39]
            $drop[40]
            $drop[41]
            $drop[42]
            $drop[43]
            $drop[44]
            $drop[45]
            $drop[46]
            $drop[47]
            $drop[48]
            $drop[49]
            $drop[50]
            
           ", [[$cases_strange1],[$cases_strange50],[$back_cases],[ $menu ]]);
            $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
           $db->query('UPDATE users SET wanderer = ?i WHERE vk_id = ?i', $wanderer, $id);
           $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
            $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
            $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
           $db->query('UPDATE users SET inspector = ?i WHERE vk_id = ?i', $inspector, $id);
           $db->query('UPDATE users SET ghost  = ?i WHERE vk_id = ?i', $ghost , $id);
           $db->query('UPDATE users SET kok  = ?i WHERE vk_id = ?i', $kok , $id);
           $db->query('UPDATE users SET zombies  = ?i WHERE vk_id = ?i', $zombies , $id);
           $db->query('UPDATE users SET merchant  = ?i WHERE vk_id = ?i', $merchant , $id);
           $db->query('UPDATE users SET rider  = ?i WHERE vk_id = ?i', $rider , $id);
           $db->query('UPDATE users SET undertaker  = ?i WHERE vk_id = ?i', $undertaker , $id);
           $db->query('UPDATE users SET baron  = ?i WHERE vk_id = ?i', $baron , $id);
           $db->query('UPDATE users SET rusalka  = ?i WHERE vk_id = ?i', $rusalka , $id);
           $db->query('UPDATE users SET dragon  = ?i WHERE vk_id = ?i', $dragon , $id);
            $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
            $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
            $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
            $db->query('UPDATE users SET gold_key = ?i WHERE vk_id = ?i', $gold_key, $id);
            $db->query('UPDATE users SET trump = ?i WHERE vk_id = ?i', $trump, $id);
           $db->query('UPDATE users SET time_2_min = ?i WHERE vk_id = ?i', $time_2_min, $id);
           $db->query('UPDATE users SET time_60_min = ?i WHERE vk_id = ?i', $time_60_min, $id);
           $db->query('UPDATE users SET time_240_min = ?i WHERE vk_id = ?i', $time_240_min, $id);
           $db->query('UPDATE users SET time_720_min = ?i WHERE vk_id = ?i', $time_720_min, $id);
           $db->query('UPDATE users SET time_1440_min = ?i WHERE vk_id = ?i', $time_1440_min, $id);
           $db->query('UPDATE users SET time_2_chek = ?i WHERE vk_id = ?i', $time_2_chek, $id);
           $db->query('UPDATE users SET time_60_chek = ?i WHERE vk_id = ?i', $time_60_chek, $id);
           $db->query('UPDATE users SET time_240_chek = ?i WHERE vk_id = ?i', $time_240_chek, $id);
           $db->query('UPDATE users SET time_720_chek = ?i WHERE vk_id = ?i', $time_720_chek, $id);
           $db->query('UPDATE users SET time_1440_chek = ?i WHERE vk_id = ?i', $time_1440_chek, $id);
            }
            else{
                $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n 
            У вас не хватает ключей
           ", [[$cases_strange1],[$cases_strange50],[$back_cases],[ $menu ]]);
            }

?>