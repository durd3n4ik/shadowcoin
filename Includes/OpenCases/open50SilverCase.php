<?php

$gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
         $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
         $trump = $db->query('SELECT trump FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['trump'];
         $adam = $db->query('SELECT adam FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['adam'];
        $reiman = $db->query('SELECT reiman FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['reiman'];
        $archer = $db->query('SELECT archer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['archer'];
        $jester = $db->query('SELECT jester FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['jester'];
        $king = $db->query('SELECT king FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['king'];
        $assassin = $db->query('SELECT assassin FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['assassin'];
        $goblin = $db->query('SELECT goblin FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['goblin'];
        $fairy = $db->query('SELECT fairy FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['fairy'];
        $berserk = $db->query('SELECT berserk FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['berserk'];
        $ac = $db->query('SELECT ac FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['ac'];
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
            if($silver_key>=50){
                $silver_key=$silver_key-50;
                $xp_curent=$xp_curent + 50;
                $db->query('UPDATE users SET silver_key = ?i WHERE vk_id = ?i', $silver_key, $id);
                for($i=0; $i<=50; $i++)
                {
                 $result = mt_rand(1, 1000);
                $win_money[$i] = ($result< 100 ? $balance=$balance + 25000 
                : ($result >= 100 && $result < 200 ? $stars=$stars+1000 
                : ($result >= 200 && $result < 300 ? $shards=$shards+100 
                : ($result >= 300 && $result < 400 ? $spheres=$spheres+10 
                : ($result >= 400 && $result < 500 ? $trump=$trump + 1
                : ($result >= 500 && $result < 560 ? $stars=$stars+100000 
                : ($result >= 560 && $result < 620 ? $shards=$shards+10000 
                : ($result >= 620 && $result < 680 ? $spheres=$spheres+1000 
                : ($result >= 680 && $result < 720 ? $stars=$stars+500000 
                : ($result >= 720 && $result < 760 ? $shards=$shards+50000 
                : ($result >= 760 && $result < 800 ? $spheres=$spheres+5000  
                : ($result >= 800 && $result < 810 ? $stars=$stars+1000000  
                : ($result >= 810 && $result < 820 ? $shards=$shards+100000 
                : ($result >= 820 && $result < 830 ? $spheres=$spheres+10000 
                : ($result >= 830 && $result < 840 ?  $balance=$balance + 100000 
                : ($result >=840  &&  $result<850 ? $balance=$balance + 250000 
                : ($result>= 850  &&   $result< 860 ?  $gold_key=$gold_key + 2 
                :( $result>= 860  &&   $result< 991 ? $trump=$trump + 10 
                :( $result== 991  ? $adam=$adam + 1 
                :( $result== 992  ? $reiman=$reiman + 1 
                :( $result== 993  ? $archer=$archer + 1 
                :( $result== 994  ? $jester=$jester + 1 
                :( $result== 995  ? $king=$king + 1 
                :( $result== 996  ? $assassin=$assassin + 1 
                :( $result== 997  ? $goblin=$goblin + 1 
                :( $result== 998  ? $fairy=$fairy + 1 
                :( $result== 999  ? $berserk=$berserk + 1 
                : $ac=$ac + 1)))))))))))))))))))))))))));
                $drop[$i] = ($result< 100 ? '📦 Выиграли 25000 💵' 
                : ($result >= 100 && $result < 200 ? ' 📦 Выиграли 🌟1000 Звёзд' 
                : ($result >= 200 && $result < 300 ? ' 📦 Выиграли ✨100 Осколков' 
                : ($result >= 300 && $result < 400 ? ' 📦 Выиграли 🔮10 Сфер' 
                : ($result >= 400 && $result < 500 ? ' 📦 Выиграли 🙍‍♂x1 Бродяг'
                : ($result >= 500 && $result < 560 ? ' 📦 Выиграли 🌟100000 Звёзд'
                : ($result >= 560 && $result < 620 ? ' 📦 Выиграли ✨10000 Осколков '
                : ($result >= 620 && $result < 680 ? ' 📦 Выиграли 🔮1000 Сфер'
                : ($result >= 680 && $result < 720 ? ' 📦 Выиграли 🌟500000 Звёзд' 
                : ($result >= 720 && $result < 760 ? ' 📦 Выиграли ✨50000 Осколков' 
                : ($result >= 760 && $result < 800 ? ' 📦 Выиграли 🔮5000 Сфер' 
                : ($result >= 800 && $result < 810 ? ' 📦 Выиграли 🌟1000000 Звёзд (👍🏻)' 
                : ($result >= 810 && $result < 820 ? ' 📦 Выиграли ✨100000 Осколков 👍🏻) ' 
                : ($result >= 820 && $result < 830 ? ' 📦 Выиграли 🔮10000 Сфер (👍🏻)' 
                : ($result >= 830 && $result < 840 ? ' 📦 Выиграли 100000 💵' 
                : (($result >=840  &&  $result<850) ? ' 📦 Выиграли 250000 💵 ' 
                : ($result>= 850  &&   $result< 860 ?  '📦 Выйграли  🔑 x2 Золотых ключа' 
                :($result>= 860  &&   $result< 991 ?   '📦 Выйграли 🙍‍♂x10 Бродяг ' 
                :($result== 991 ?   '📦 Выйграли 👨‍⚕x1 Адам (👍🏻)'
                :( $result== 992  ? '📦 Выйграли 🧑x1 Рейман (👍🏻)'
                :( $result== 993  ? '📦 Выйграли 👲x1 Лучник (👍🏻)' 
                :( $result== 994  ? '📦 Выйграли 🤹‍♂x1 Шут (👍🏻)'
                :( $result== 995  ? '📦 Выйграли 👴x1 Король (👍🏻)'
                :( $result== 996  ? '📦 Выйграли 👨‍🎤x1 Асасин  (👍🏻)' 
                :( $result== 997  ? '📦 Выйграли 🤶x1 Гоблин (👍🏻)' 
                :( $result== 998  ? '📦 Выйграли 🧚‍♂x1 Фея (👍🏻)'
                :( $result== 999  ? '📦 Выйграли 🏃‍♂x1 Берсерк (👍🏻)'
                : "📦 Выйграли 🙆‍♂ x1 Ас (👍🏻)"  )))))))))))))))))))))))))));
                
               if($time_2_chek==1){
                   if($adam>=1 or $reiman>=1 or $archer>=1 or $jester>=1 or $berserk>=1 ){
                       $time_2_chek=0;
                       $time_2_min=$time;
                       $vk->sendMessage($peer_id,"@id$id ($userinfo[first_name] $userinfo[last_name]) ✅ OK");
                   }
               }
               if($time_60_chek==1){
                   if($king>=1 or $assassin>=1 or $goblin>=1 or $fairy>=1 or $ac>=1){
                       $time_60_chek=0;
                       $time_60_min=$time;
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
            
           ", [[$cases_silver1],[$cases_silver50],[$back_cases],[ $menu ]]);
           $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
            $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
            $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
           $db->query('UPDATE users SET adam = ?i WHERE vk_id = ?i', $adam, $id);
           $db->query('UPDATE users SET reiman = ?i WHERE vk_id = ?i', $reiman, $id);
           $db->query('UPDATE users SET archer = ?i WHERE vk_id = ?i', $archer, $id);
           $db->query('UPDATE users SET jester = ?i WHERE vk_id = ?i', $jester, $id);
           $db->query('UPDATE users SET king = ?i WHERE vk_id = ?i', $king, $id);
           $db->query('UPDATE users SET assassin = ?i WHERE vk_id = ?i', $assassin, $id);
           $db->query('UPDATE users SET goblin = ?i WHERE vk_id = ?i', $goblin, $id);
           $db->query('UPDATE users SET fairy = ?i WHERE vk_id = ?i', $fairy, $id);
           $db->query('UPDATE users SET berserk = ?i WHERE vk_id = ?i', $berserk, $id);
           $db->query('UPDATE users SET ac = ?i WHERE vk_id = ?i', $ac, $id);
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
           ", [[$cases_silver1],[$cases_silver50],[$back_cases],[ $menu ]]);
            }

?>