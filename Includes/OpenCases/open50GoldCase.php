<?php

 $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
          $recruit = $db->query('SELECT recruit FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['recruit'];
           $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
         $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
         $trump = $db->query('SELECT trump FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['trump'];
        $elf = $db->query('SELECT elf FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['elf'];
        $swordsman = $db->query('SELECT swordsman FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['swordsman'];
        $orc = $db->query('SELECT orc FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['orc'];
        $tiger = $db->query('SELECT tiger FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['tiger'];
        $seeker = $db->query('SELECT seeker FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['seeker'];
        $death = $db->query('SELECT death FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['death'];
        $Inquisitor = $db->query('SELECT Inquisitor FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['Inquisitor'];
        $wolf = $db->query('SELECT wolf FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['wolf'];
        $collector = $db->query('SELECT collector FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['collector'];
        $stigmata = $db->query('SELECT stigmata FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stigmata'];
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
            if($gold_key>=50){
                $gold_key=$gold_key-50;
                $xp_curent=$xp_curent + 150;
                $db->query('UPDATE users SET gold_key = ?i WHERE vk_id = ?i', $gold_key, $id);
                for($i=0; $i<=50; $i++)
                {
                  $result = mt_rand(1, 10000);
                $win_money[$i] = ($result< 1000 ? $balance=$balance + 250000 
                : ($result >= 1000 && $result < 2000 ? $stars=$stars+10000 
                : ($result >= 2000 && $result < 3000 ? $shards=$shards+1000 
                : ($result >= 3000 && $result < 4000 ? $spheres=$spheres+100 
                : ($result >= 4000 && $result < 5000 ? $recruit=$recruit + 1
                : ($result >= 5000 && $result < 5600 ? $stars=$stars+1000000 
                : ($result >= 5600 && $result < 6200 ? $shards=$shards+100000 
                : ($result >= 6200 && $result < 6800 ? $spheres=$spheres+10000 
                : ($result >= 6800 && $result < 7200 ? $stars=$stars+5000000 
                : ($result >= 7200 && $result < 7600 ? $shards=$shards+500000 
                : ($result >= 7600 && $result < 8000 ? $spheres=$spheres+50000  
                : ($result >= 8000 && $result < 8100 ? $stars=$stars+10000000  
                : ($result >= 8100 && $result < 8200 ? $shards=$shards+1000000 
                : ($result >= 8200 && $result < 8300 ? $spheres=$spheres+100000 
                : ($result >= 8300 && $result < 8400 ?  $balance=$balance + 1000000 
                : ($result >=8400  &&  $result<8500 ? $balance=$balance + 2500000 
                : ($result>= 8500  &&   $result< 8600 ?  $strange_key=$strange_key + 1 
                :( $result>= 8600  &&   $result< 9800 ? $recruit=$recruit + 10 
                :( $result>= 9800 &&   $result< 9820  ? $elf=$elf + 1 
                :( $result>= 9820 &&   $result< 9840  ? $swordsman=$swordsman + 1 
                :( $result>= 9840 &&   $result< 9860  ? $orc=$orc + 1 
                :( $result>= 9860 &&   $result< 9880  ? $tiger=$tiger + 1 
                :( $result>= 9880 &&   $result< 9900  ? $seeker=$seeker + 1 
                :( $result>= 9900 &&   $result< 9920  ? $death=$death + 1 
                :( $result>= 9920 &&   $result< 9940  ? $Inquisitor=$Inquisitor + 1 
                :( $result>= 9940 &&   $result< 9960  ? $wolf=$wolf + 1 
                :( $result>= 9960 &&   $result< 9980  ? $collector=$collector + 1 
                : $stigmata=$stigmata + 1)))))))))))))))))))))))))));
                $drop[$i] = ($result< 1000 ? '📦 Выиграли 250000 💵' 
                : ($result >= 1000 && $result < 2000 ? ' 📦 Выиграли 🌟10000 Звёзд' 
                : ($result >= 2000 && $result < 3000 ? ' 📦 Выиграли ✨1000 Осколков' 
                : ($result >= 3000 && $result < 4000 ? ' 📦 Выиграли 🔮100 Сфер' 
                : ($result >= 4000 && $result < 5000 ? ' 📦 Выиграли 👼x1 Новичков'
                : ($result >= 5000 && $result < 5600 ? ' 📦 Выиграли 🌟1000000 Звёзд'
                : ($result >= 5600 && $result < 6200 ? ' 📦 Выиграли ✨100000 Осколков '
                : ($result >= 6200 && $result < 6800 ? ' 📦 Выиграли 🔮10000 Сфер'
                : ($result >= 6800 && $result < 7200 ? ' 📦 Выиграли 🌟5000000 Звёзд' 
                : ($result >= 7200 && $result < 7600 ? ' 📦 Выиграли ✨500000 Осколков' 
                : ($result >= 7600 && $result < 8000 ? ' 📦 Выиграли 🔮50000 Сфер' 
                : ($result >= 8000 && $result < 8100 ? ' 📦 Выиграли 🌟10000000 Звёзд (👍🏻)' 
                : ($result >= 8100 && $result < 8200 ? ' 📦 Выиграли ✨1000000 Осколков 👍🏻) ' 
                : ($result >= 8200 && $result < 8300 ? ' 📦 Выиграли 🔮100000 Сфер (👍🏻)' 
                : ($result >= 8300 && $result < 8400 ? ' 📦 Выиграли 1000000 💵' 
                : (($result >=8400  &&  $result<8500) ? ' 📦 Выиграли 2500000 💵 ' 
                : ($result>= 8500  &&   $result< 8600 ?  '📦 Выйграли  🧪 x1 Странных ключа' 
                :($result>= 8600  &&   $result< 9800 ?   '📦 Выйграли 👼x10 Новичков ' 
                :($result>= 9800 &&   $result< 9820?   '📦 Выйграли 🧝‍♂x1 Эльф (👍🏻)'
                :( $result>= 9820 &&   $result< 9840 ? '📦 Выйграли 😡x1 Мечник (👍🏻)'
                :( $result>= 9840  &&   $result< 9860? '📦 Выйграли 🥶x1 Орк (👍🏻)' 
                :( $result>= 9860  &&   $result< 9880? '📦 Выйграли 🐅x1 Тигр (👍🏻)'
                :( $result>= 9880  &&   $result< 9900? '📦 Выйграли 🕵‍♂x1 Искатель (👍🏻)'
                :( $result>= 9900 &&   $result< 9920 ? '📦 Выйграли 💀x1 Смерть  (👍🏻)' 
                :( $result>= 9920 &&   $result< 9940 ? '📦 Выйграли 💂‍♂x1 Инквизитор (👍🏻)' 
                :( $result>= 9940  &&   $result< 9960? '📦 Выйграли 🐺x1 Волк (👍🏻)'
                :( $result>= 9960  &&   $result< 9980? '📦 Выйграли 🙇‍♂x1 Собиратель (👍🏻)'
                : "📦 Выйграли 😈 x1 Стигмат (👍🏻)"  )))))))))))))))))))))))))));
                
               if($time_2_chek==1){
                   if($seeker>=1){
                       $time_2_chek=0;
                       $time_2_min=$time;
                       $vk->sendMessage($peer_id,"@id$id ($userinfo[first_name] $userinfo[last_name]) ✅ OK");
                   }
               }
                if($time_240_chek==1){
                   if($elf>=1 or $swordsman>=1 or $orc>=1 or $tiger>=1){
                       $time_240_chek=0;
                       $time_240_min=$time;
                       $vk->sendMessage($peer_id,"@id$id ($userinfo[first_name] $userinfo[last_name]) ✅ OK");
                   }
               }
               if($time_720_chek==1){
                   if($death>=1 or $Inquisitor>=1 or $wolf>=1 or $collector>=1){
                       $time_720_chek=0;
                       $time_720_min=$time;
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
            
           ", [[$cases_gold1],[$cases_gold50],[$back_cases],[ $menu ]]);
           $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
           $db->query('UPDATE users SET recruit = ?i WHERE vk_id = ?i', $recruit, $id);
           $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
            $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
            $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
           $db->query('UPDATE users SET elf = ?i WHERE vk_id = ?i', $elf, $id);
           $db->query('UPDATE users SET swordsman = ?i WHERE vk_id = ?i', $swordsman, $id);
           $db->query('UPDATE users SET orc = ?i WHERE vk_id = ?i', $orc, $id);
           $db->query('UPDATE users SET tiger = ?i WHERE vk_id = ?i', $tiger, $id);
           $db->query('UPDATE users SET seeker = ?i WHERE vk_id = ?i', $seeker, $id);
           $db->query('UPDATE users SET death = ?i WHERE vk_id = ?i', $death, $id);
           $db->query('UPDATE users SET Inquisitor = ?i WHERE vk_id = ?i', $Inquisitor, $id);
           $db->query('UPDATE users SET wolf = ?i WHERE vk_id = ?i', $wolf, $id);
           $db->query('UPDATE users SET collector = ?i WHERE vk_id = ?i', $collector, $id);
           $db->query('UPDATE users SET stigmata = ?i WHERE vk_id = ?i', $stigmata, $id);
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
           ", [[$cases_gold1],[$cases_gold50],[$back_cases],[ $menu ]]);
            }

?>