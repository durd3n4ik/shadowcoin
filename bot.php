<?php

require_once('simplevk-master/autoload.php'); // БЛИБЛИОТЕКИ
require './vendor/autoload.php';// БЛИБЛИОТЕКИ

use Krugozor\Database\Mysql\Mysql as Mysql; // КЛАССЫ ДЛЯ РАБОТЫ С БД
use DigitalStar\vk_api\vk_api; // Основной класс
use DigitalStar\vk_api\Message; // Конструктор сообщений
use DigitalStar\vk_api\VkApiException; // Обработка ошибок

$host = 'localhost'; // По умолчанию localhost или ваш IP адрес сервера
$name = 'id13772477_durik'; // логин для авторизации к БД
$pass = 'V|CL]8kHB^$MGYw4'; // Пароль для авторизации к БД
$bdname = 'id13772477_bot'; // ИМЯ базы данных
$vk_key = 'b3ebd83de7989368d43838bb3a7f5336d086f953c0842e3b4c2000dd6aad010c9ac72a81bbbf2d87fffe2'; // Длинный ключ сообщества, который мы получим чуть позже
$confirm = '6a227ab1'; // СТРОКА которую должен вернуть сервер
$v = '5.103'; // Версия API, последняя на сегодняшнее число, оставлять таким если на новых работать в будущем не будет

$db = Mysql::create($host, $name, $pass)->setDatabaseName($bdname)->setCharset('utf8mb4');
$vk = vk_api::create($vk_key, $v)->setConfirm($confirm);
$my_msg = new Message($vk);
$data = json_decode(file_get_contents('php://input')); //Получает и декодирует JSON пришедший из ВК

$vk->sendOK();
//$vk->debug();

// ТУТ УЖЕ БУДЕМ ПИСАТЬ КОД //

// Переменные для удобной работы в будущем
$id = $data->object->message->from_id; // ИД того кто написал
$peer_id = $data->object->message->peer_id; // Только для бесед (ид беседы)

$time = time();
$cmd = explode(" ", mb_strtolower($data->object->message->text)); // Команды
$message = $data->object->message->text; // Сообщение полученное ботом
$new_ids = current($data->object->message->fwd_messages)->from_id ?? $data->object->message->reply_message->from_id; // ИД того чье сообщение переслали
$userinfo = $vk->userInfo($id);
$bonus = $vk->buttonText('⏰ Бонус!', 'white', ['command' => 'bonus']);//кнопка бонуса
$casinoinfo = $vk->buttonText('💯 Казино', 'green', ['command' => 'casinoinfo']);//кнопка  казино
$games = $vk->buttonText('Игры', 'green', ['command' => 'games']);//кнопка  игр
$menu = $vk->buttonText('Меню', 'blue', ['command' => 'menu']);//кнопка  меню
$profile= $vk->buttonText('Профиль', 'blue', ['command' => 'profile']);//кнопка Профиль
$buyteam= $vk->buttonText('Нанять отряд', 'green', ['command' => 'buyteam']);//кнопка нанять наёмников
$storage=$vk->buttonText('Хранилище', 'green', ['command' => 'storage']);//кнопка Хранилище
$collect=$vk->buttonText('Собрать прибыль', 'white', ['command' => 'collect']);//кнопка Собрать прибыль
// Закончили с переменными
$sellincome=$vk->buttonText('Продать прибыль с наёмников', 'white', ['command' => 'sellincome']);
$sellstars=$vk->buttonText('Продать звёзды 🌟', 'white', ['command' => 'sellstars']);
$sellshards=$vk->buttonText('Продать осколки ✨', 'white', ['command' => 'sellshards']);
$sellspheres=$vk->buttonText('Продать сферы 🔮', 'white', ['command' => 'sellspheres']);
$hunt=$vk->buttonText('Охота', 'white', ['command' => 'hunt']);
$huntstorage=$vk->buttonText('Склад', 'white', ['command' => 'huntstorage']);
$huntshop=$vk->buttonText('Магазин', 'white', ['command' => 'huntshop']);
$help=$vk->buttonText('Помощь', 'blue', ['command' => 'help']);
$helpcmd=$vk->buttonText('Команды', 'white', ['command' => 'helpcmd']);
$helpteam=$vk->buttonText('Наёмники', 'white', ['command' => 'helpteam']);
$helpteamelete=$vk->buttonText('Элитные наёмники', 'white', ['command' => 'helpteamelete']);
$cases=$vk->buttonText('Кейсы', 'red', ['command' => 'cases']);
$cases_silver=$vk->buttonText(' 🗝 Серебряные ключи', 'white', ['command' => 'cases_silver']);
$cases_gold=$vk->buttonText('🔑 Золотые ключи', 'white', ['command' => 'cases_gold']);
$cases_strange=$vk->buttonText('🧪 Странные ключи', 'white', ['command' => 'cases_strange']);
$cases_silver1=$vk->buttonText('🔒 Открыть 1 🗝 Серебряный ключ', 'white', ['command' => 'cases_silver1']);
$cases_silver50=$vk->buttonText('🔒 Открыть 50 🗝 Серебряных ключей', 'white', ['command' => 'cases_silver50']);
$cases_gold1=$vk->buttonText('🔒 Открыть 1 🔑 Золотой ключ', 'white', ['command' => 'cases_gold1']);
$cases_gold50=$vk->buttonText('🔒 Открыть 50 🔑 Золотых ключей', 'white', ['command' => 'cases_gold50']);
$cases_strange1=$vk->buttonText('🔒 Открыть 1 🧪 Странный ключ', 'white', ['command' => 'cases_strange1']);
$cases_strange50=$vk->buttonText('🔒 Открыть 50 🧪 Странных ключей', 'white', ['command' => 'cases_strange50']);
$cases_strange500=$vk->buttonText('🔒 Открыть 500 🧪 Странных ключей', 'white', ['command' => 'cases_strange500']);
$back_cases=$vk->buttonText('Назад', 'green', ['command' => 'cases']);
if ($id < 0){exit();} // ПРОВЕРЯЕМ что сообщение прислал юзер а не сообщество

    
    

if ($data->type == 'message_new') {
    $db->query('UPDATE users SET time = ?i WHERE vk_id = ?i', $time, $id);
    if (isset($data->object->message->payload)) {  //получаем payload
        $payload = json_decode($data->object->message->payload, True); // Декодируем кнопки в массив
    } else {
        $payload = null; // Если пришел пустой массив кнопок, то присваеваем кнопке NULL
    }
    $payload = $payload['command'];
    
    $id_reg_check = $db->query('SELECT vk_id FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['vk_id']; // Пытаемся получить пользователя который написал сообщение боту
    if (!$id_reg_check and $id > 0) { // Если вдруг запрос вернул NULL (0) это FALSE, то используя знак ! перед переменной, все начинаем работать наоборот, FALSE становится TRUE
        // Так же мы проверяем что $id больше нуля, что бы не отвечать другим ботам, но лучше в самом верху добавить такую проверку что бы не делать лашних обращений к БД!
        $db->query("INSERT INTO users (vk_id, nick, status, time,balance,time_bonus,trump,time_2_min,stars,time_60_min,time_240_min,time_720_min,time_1440_min,shards,spheres,time_2_chek,time_60_chek,time_240_chek,time_720_chek,time_1440_chek,recruit,wanderer,healer,warrior,mage,hero,god,adam,reiman,archer,	jester,king,assassin,goblin,fairy,berserk,ac,elf,swordsman,orc,tiger,seeker,death,Inquisitor,wolf,collector,	stigmata,inspector,ghost,kok,zombies,merchant,rider,undertaker,baron,rusalka,dragon,silver_key,gold_key,strange_key,level,xp_curent,xp_need,power,hp_now,hp_all,level5,level15,level25,drop_silver,drop_gold,drop_strange,location,donation,job_stat) VALUES (?i, '?s', ?i, ?i, ?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i,?i)", $id, "$userinfo[first_name] $userinfo[last_name]", 0, $time,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,500,0,0,0,0,0,0,1,0,0,0,0,0);
         
        $vk->sendButton($peer_id, "Приветствую  тебя, @id$id ($userinfo[first_name] $userinfo[last_name]), ты теперь один из нас, вступай в ряды мощных панамеровцев!",  [[$profile,$storage],[$buyteam,$bonus],[$cases],[$help], [$games]]);
    }
    
    if($cmd[0]=='0'){
        $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name]) ✅\n Добро пожаловать в главное меню", [[$profile,$storage],[$buyteam,$bonus],[$cases,$hunt],[$help], [$games]]);
    }
    
    if($cmd[0]=='нанять' or $cmd[0]=='Нанять'){
        if($cmd[1]!=0){
            if($cmd[2]!=0){
                 $time_2_min = $db->query('SELECT time_2_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_min']; // вытягиваем весь баланс
        $time_60_min = $db->query('SELECT time_60_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_min'];
        $time_240_min = $db->query('SELECT time_240_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_min'];
        $time_720_min = $db->query('SELECT time_720_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_720_min'];
        $time_1440_min = $db->query('SELECT time_1440_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_min'];
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
        $recruit = $db->query('SELECT recruit FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['recruit'];
        $wanderer = $db->query('SELECT wanderer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['wanderer'];
        $healer = $db->query('SELECT healer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['healer'];
        $warrior = $db->query('SELECT warrior FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['warrior'];
        $mage = $db->query('SELECT mage FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['mage'];
        $hero = $db->query('SELECT hero FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['hero'];
        $god = $db->query('SELECT god FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['god'];
        $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
        $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
        $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
        $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        $silver_key = $db->query('SELECT silver_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['silver_key'];
        $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
        $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
         $db->query('UPDATE users SET time = ?i WHERE vk_id = ?i', $time, $id);
         
         if($hero>=1 or $god>=1 or $merchant >=1 or $rider >=1 or $undertaker >=1 or $baron >=1 or $rusalka >=1 or $dragon >=1){
            $incometime1440=$time-$time_1440_min;
            if($incometime1440>=86400){
                $income1440=($time-$time_1440_min);
                $income1440min=intval($income1440/86400);
                $timeleft1440=$income1440-($income1440min*86400);
                $time_1440_min=$time-$timeleft1440;
                $starsplus1400=(round(($income1440min*($hero*150000)))+round(($income1440min*($god*7500000 ))));
                $shardsplus1400=(round(($income1440min*($hero*50000)))+round(($income1440min*($god*125000))));
                $spheresplus1400=(round(($income1440min*($hero*1500)))+round(($income1440min*($god*7500)))+round(($income1440min*($merchant*8888))));
                $silver_keyplus1400=(round(($income1440min*($undertaker*15)))+round(($income1440min*($dragon*25))));
                $gold_keyplus1440=(round(($income1440min*($baron*10)))+round(($income1440min*($dragon*20))));
                $strange_keyplus1440=(round(($income1440min*($rider*5)))+round(($income1440min*($dragon*15))));
                $godplus1440=(round(($income1440min*($rusalka*1))));
                
                $stars=$stars+$starsplus1400;
                $shards=$shards+$shardsplus1400;
                $spheres=$spheres+$spheresplus1400;
                $silver_key=$silver_key+$silver_keyplus1400;
                $gold_key=$gold_key+$gold_keyplus1440;
                $strange_key=$strange_key+$strange_keyplus1440;
                $god=$god+$godplus1440;
                
               $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET silver_key = ?i WHERE vk_id = ?i', $silver_key, $id);
                $db->query('UPDATE users SET gold_key = ?i WHERE vk_id = ?i', $gold_key, $id);
                $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
                $db->query('UPDATE users SET god = ?i WHERE vk_id = ?i', $god, $id);
                $db->query('UPDATE users SET time_1440_min = ?i WHERE vk_id = ?i', $time_1440_min, $id);
                 
            }
          }
          
          if($tiger>=1 or $death >=1 or $Inquisitor>=1 or $wolf>=1 or $collector>=1 or $stigmata >=1 or $ghost>=1 or $kok>=1 or $zombies>=1){
            $incometime720=$time-$time_720_min;
            if($incometime720>=43200){
                $income720=($time-$time_720_min);
                $income720min=intval($income720/43200);
                $timeleft720=$income720-($income720min*43200);
                $time_720_min=$time-$timeleft720;
                $starsplus720=(round(($income720min*($stigmata*555000)))+round(($income720min*($ghost*999999))));
                $shardsplus720=(round(($income720min*($stigmata*55500)))+round(($income720min*($ghost*99999))));
                $spheresplus720=(round(($income720min*($collector*7777)))+round(($income720min*($ghost*9999)))+round(($income720min*($kok*5555))));
                $balanceplus720=(round(($income720min*($kok*5500000))));
                $silver_keyplus720=(round(($income720min*($tiger*5)))+round(($income720min*($zombies*3))));
                $gold_keyplus720=(round(($income720min*($death*3)))+round(($income720min*($zombies*2))));
                $strange_keyplus720=(round(($income720min*($Inquisitor*1)))+round(($income720min*($zombies*1))));
                $trumpplus720=(round(($income720min*($wolf*150))));
                $stars=$stars+$starsplus720;
                $shards=$shards+$shardsplus720;
                $spheres=$spheres+$spheresplus720;
                $balance=$balance+$balanceplus720;
                $silver_key=$silver_key+$silver_keyplus720;
                $gold_key=$gold_key+$gold_keyplus720;
                $strange_key=$strange_key+$strange_keyplus720;
                $trump=$trump+$trumpplus720;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET silver_key = ?i WHERE vk_id = ?i', $silver_key, $id);
                $db->query('UPDATE users SET gold_key = ?i WHERE vk_id = ?i', $gold_key, $id);
                $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
                $db->query('UPDATE users SET trump = ?i WHERE vk_id = ?i', $trump, $id);
                $db->query('UPDATE users SET time_720_min = ?i WHERE vk_id = ?i', $time_720_min, $id);
          }
         }
          
         if($warrior>=1 or $mage>=1 or $elf >=1 or $swordsman >=1 or $orc >=1){
            $incometime240=$time-$time_240_min;
            if($incometime240>=14400){
                $income240=($time-$time_240_min);
                $income240min=intval($income240/14400);
                $timeleft240=$income240-($income240min*14400);
                $time_240_min=$time-$timeleft240;
                $starsplus240=(round(($income240min*($swordsman*888888))));
                $shardsplus240=(round(($income240min*($elf*35000)))+round(($income240min*($orc*345000))));
                $spheresplus240=(round(($income240min*$warrior))+round(($income240min*($mage*70)))+round(($income240min*($elf*2000)))+round(($income240min*($swordsman*3333))));
                $balanceplus240=(round(($income240min*($orc*450000))));
                $stars=$stars+$starsplus240;
                $shards=$shards+$shardsplus240;
                $spheres=$spheres+$spheresplus240;
                $balance=$balance+$balanceplus240;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET time_240_min = ?i WHERE vk_id = ?i', $time_240_min, $id);
          }
         }
          if($recruit>=1 or $healer>=1 or $king>=1 or $assassin>=1 or $goblin>=1 or $fairy>=1 or $ac>=1){
            $incometime60=$time-$time_60_min;
            if($incometime60>=3600){
                $income60=($time-$time_60_min);
                $income60min=intval($income60/3600);
                $timeleft60=$income60-($income60min*3600);
                $time_60_min=$time-$timeleft60;
                $starsplus60=(round(($income60min*($king*25000)))+round(($income60min*($king*170000))));
                $shardsplus60=(round(($income60min*$recruit))+round(($income60min*($healer*350)))+round(($income60min*($assassin*12000))));
                $spheresplus60=(round(($income60min*($goblin*500))));
                $balanceplus60=(round(($income60min*($fairy*50000)))+round(($income60min*($ac*55000))));
                $stars=$stars+$starsplus60;
                $shards=$shards+$shardsplus60;
                $spheres=$spheres+$spheresplus60;
                $balance=$balance+$balanceplus60;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                
                $db->query('UPDATE users SET time_60_min = ?i WHERE vk_id = ?i', $time_60_min, $id);
            }
          }
            
        if($trump>=1 or $wanderer>=1 or $adam>=1 or $reiman>=1 or $archer>=1 or $jester>=1 or $berserk>=1 or $seeker>=1 or $inspector>=1){
            $incometime2=$time-$time_2_min;
            if($incometime2>=120){
                $income2=($time-$time_2_min);
                
                $income2min=intval($income2/120);
                $timeleft2=$income2-($income2min*120);
                $time_2_min=$time-$timeleft2;
                
                $starsplus=(round(($income2min*$trump))+round(($income2min*($wanderer*125)))+round(($income2min*($adam*5500)))+round(($income2min*($berserk*1500)))+round(($income2min*($seeker*12345))));
                $shardsplus2=(round(($income2min*($reiman*350)))+round(($income2min*($berserk*150))));
                $spheresplus2=(round(($income2min*($archer*15))));
                $balanceplus2=(round(($income2min*($jester*1500))));
                $recruitplus2=(round(($income2min*($inspector * 1))));
                $stars=$stars+$starsplus;
                $shards=$shards+$shardsplus2;
                $spheres=$spheres+$spheresplus2;
                $balance=$balance+$balanceplus2;
                $recruit=$recruit+$recruitplus2;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET recruit = ?i WHERE vk_id = ?i', $recruit, $id);
                $db->query('UPDATE users SET time_2_min = ?i WHERE vk_id = ?i', $time_2_min, $id);
                
                 
            }
                
        }
                $allstars=$starsplus+$starsplus60+$starsplus240+$starsplus720+$starsplus1400;              
                $allshards=$shardsplus+$shardsplus2+$shardsplus60+$shardsplus240+$shardsplus720+$shardsplus1400;
                $allspheres=$spheresplus+$spheresplus2+$spheresplus60+$spheresplus240+$spheresplus720+$spheresplus1400;
                $allbalance=$balanceplus2+$balanceplus60+$balanceplus240+$balanceplus720;
                $allrecruit=$recruitplus2;
                $allSilverKey=$silver_keyplus720+$silver_keyplus1400;
                $allGoldKey=$gold_keyplus720+$gold_keyplus1440;
                $allStrangeKey=$strange_keyplus720+$strange_keyplus1440;
                $allTrump=$trumpplus720;
                $allGod=$godplus1440;
                if($allstars>=1){
                    $starstext="\n🌟 Звёзды: $allstars";
                }
                else{
                    $starstext=null;
                }
                if($allshards>=1){
                    $shardstext="\n✨ Осколки: $allshards";
                }
                else{
                    $shardstext=null;
                }
                if($allstars>=1){
                    $spherestext="\n🔮 Сферы: $allspheres";
                }
                else{
                    $spherestext=null;
                }
                if($allbalance>=1){
                    $balancetext="\n💵 Баксов: $allbalance";
                }
                else{
                    $balancetext=null;
                }
                if($allrecruit>=1){
                    $recruittext="\n 👼 Новичков: $allrecruit";
                }
                else{
                    $recruittext=null;
                }
                if($allSilverKey>=1){
                    $SilverKeytext="\n 🗝 Серебряные ключи: $allSilverKey";
                }
                else{
                    $SilverKeytext=null;
                }
                if($allGoldKey>=1){
                    $GoldKeytext="\n 🔑 Золотые ключи: $allGoldKey";
                }
                else{
                    $GoldKeytext=null;
                }
                if($allStrangeKey>=1){
                    $StrangeKeytext="\n 🧪 Странные ключи: $allStrangeKey";
                }
                else{
                    $StrangeKeytext=null;
                }
                if($allTrump>=1){
                    $Trumptext="\n 🙍‍♂ Бродяг: $allTrump";
                }
                else{
                    $Trumptext=null;
                }
                 if($allGod>=1){
                    $Godtext="\n 🦹‍♂ Полубогов: $allGod";
                }
                else{
                    $Godtext=null;
                }
        
        
        
            $vk->sendMessage($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n При вводе команды Нанять ваша прибыль собирается в не зависимости от того, купили ли вы наёмника или нет $starstext $shardstext  $spherestext $balancetext $recruittext $SilverKeytext $GoldKeytext $StrangeKeytext $Trumptext $Godtext
            У вас:
                🌟 $stars звёзд 
                ✨ $shards осколков 
                🔮 $spheres сфер");
            }
       
        }
    }
         $level = $db->query('SELECT level FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['level'];
         $drop_silver = $db->query('SELECT drop_silver FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['drop_silver'];
         
         $drop_gold = $db->query('SELECT drop_gold FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['drop_gold'];
         $drop_strange = $db->query('SELECT drop_strange FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['drop_strange'];
         $level5 = $db->query('SELECT level5 FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['level5'];
         $level15 = $db->query('SELECT level15 FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['level15'];
         $level25 = $db->query('SELECT level25 FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['level25'];
         $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
         $xp_need = $db->query('SELECT xp_need FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_need'];
         $silver_key = $db->query('SELECT silver_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['silver_key'];
         $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
         $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
        if($xp_curent>=$xp_need){
            $xp_curent=$xp_curent-$xp_need;
            $level=$level + 1;
            $xp_need = round($xp_need * 1.5);
            $level5=$level5 + 1;
            $level15=$level15 + 1;
            $level25=$level25 + 1;
            $db->query('UPDATE users SET level = ?i WHERE vk_id = ?i', $level, $id);
            
            $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
            $db->query('UPDATE users SET xp_need = ?i WHERE vk_id = ?i', $xp_need, $id);
           
            
            if($level5>=5){
                $drop_silver=$drop_silver + 1;
                $level5=$level5-5;
                
                
            }
            if($level15>=15){
                $drop_gold=$drop_gold + 1;
                $level15=$level15-15;
                
                
                
            }
            if($level25>=25){
                $drop_strange=$drop_strange + 1;
                $level25=$level25-25;
                
                
            }
            if($drop_strange>=1){
                 $drop_strange_text=" 🧪 $drop_strange Странных ключа";
                }
                else{
                    $drop_strange_text=null;
                }
            if($drop_gold>=1){
                 $drop_gold_text=" 🔑 $drop_gold Золотых ключа";
                }
                else{
                     $drop_gold_text=null;
                }
            if($drop_silver>=1){
                 $drop_silver_text=" 🗝$drop_silver Серебряных ключа";
                }
                else{
                    $drop_silver_text=null;
                }
            
            
            
           
           
           
           $silver_key=$silver_key + $drop_silver;
           $gold_key=$gold_key +  $drop_gold;
           $strange_key=$strange_key + $drop_strange;
           
           $db->query('UPDATE users SET silver_key = ?i WHERE vk_id = ?i', $silver_key, $id);
           $db->query('UPDATE users SET gold_key = ?i WHERE vk_id = ?i', $gold_key, $id);
           $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
           $db->query('UPDATE users SET level5 = ?i WHERE vk_id = ?i', $level5, $id);
            $db->query('UPDATE users SET level15 = ?i WHERE vk_id = ?i', $level15, $id);
            $db->query('UPDATE users SET level25 = ?i WHERE vk_id = ?i', $level25, $id);
            $db->query('UPDATE users SET drop_silver = ?i WHERE vk_id = ?i', $drop_silver, $id);
            $db->query('UPDATE users SET drop_gold = ?i WHERE vk_id = ?i', $drop_gold, $id);
            $db->query('UPDATE users SET drop_strange = ?i WHERE vk_id = ?i', $drop_strange, $id);
            $vk->sendMessage($peer_id, "🎊 Поздравляем вас
            🆙 Вы повысили свой уровень 
            ✴ Ваш уровень: $level
            🎁Ваша награда:
              $drop_silver_text
              $drop_gold_text
              $drop_strange_text");
        }

    
     
    
    
    // ТУТ будут наши команды
     //ФУНКЦИЯ НАНЯТЬ ОТРЯД
    if($cmd[0]=='Нанять' or $cmd[0]=='нанять'){
        if(!$cmd[1]){
                $vk->sendMessage($peer_id, "Вы не ввели номер наёмника.\n Для покупки наймников введите команду:\n Нанять[номер][количество] \n Пример: Нанять 1 1");
            }
        elseif($cmd[1]=='1'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $trump = $db->query('SELECT trump FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['trump']; // вытягиваем весь баланс
                 $time_2_min = $db->query('SELECT time_2_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_min'];
                 $time_2_chek = $db->query('SELECT time_2_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             
            $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
             $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
            
             $trumpprice=$sum*1000;
             
                 if($balance < $trumpprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 🙍‍♂ Бродяг за $trumpprice 💵");
                    $balance=$balance-$trumpprice;
                    $trump=$trump+$sum;
                    $xp_curent=$xp_curent + (1*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET trump = ?i WHERE vk_id = ?i', $trump, $id); // Обновляем данные
                      $power=$power+1;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                    
                      if($trump>=1 and $time_2_chek==1){
                          $time_2_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_2_min = ?i WHERE vk_id = ?i', $time_2_min, $id); // Обновляем данные
                          $time_2_chek=0;
                          $db->query('UPDATE users SET time_2_chek = ?i WHERE vk_id = ?i', $time_2_chek, $id); // Обновляем данные
                          
                      }
                    
                }
            }
        }
        elseif($cmd[1]=='2'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $recruit = $db->query('SELECT recruit FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['recruit']; // вытягиваем весь баланс
                 $time_60_min = $db->query('SELECT time_60_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_min'];
                 $time_60_chek = $db->query('SELECT time_60_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
              $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
            
             $recruitprice=$sum*10000;
             
                 if($balance < $recruitprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 👼Новичков за $recruitprice 💵");
                    $balance=$balance-$recruitprice;
                    $recruit=$recruit+$sum;
                    $xp_curent=$xp_curent + (10*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET recruit = ?i WHERE vk_id = ?i', $recruit, $id); // Обновляем данные
                      $power=$power+10;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                    
                      if($recruit>=1 and $time_60_chek==1){
                          $time_60_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_60_min = ?i WHERE vk_id = ?i', $time_60_min, $id); // Обновляем данные
                          $time_60_chek=0;
                          $db->query('UPDATE users SET time_60_chek = ?i WHERE vk_id = ?i', $time_60_chek, $id); // Обновляем данные
                          
                      }
                    
                }
            }
        }
        elseif($cmd[1]=='3'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $wanderer = $db->query('SELECT wanderer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['wanderer']; // вытягиваем весь баланс
                 $time_2_min = $db->query('SELECT time_2_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_min'];
                 $time_2_chek = $db->query('SELECT time_2_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
              $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
             
            
             $wandererprice=$sum*100000;
             
                 if($balance < $wandererprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 👳‍♂Скитальцев за $wandererprice 💵");
                    $balance=$balance-$wandererprice;
                    $wanderer=$wanderer+$sum;
                    $xp_curent=$xp_curent + (100*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET wanderer = ?i WHERE vk_id = ?i', $wanderer, $id); // Обновляем данные
                       $power=$power+100;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                    
                      if($wanderer>=1 and $time_2_chek==1){
                          $time_2_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_2_min = ?i WHERE vk_id = ?i', $time_60_min, $id); // Обновляем данные
                          $time_2_chek=0;
                          $db->query('UPDATE users SET time_2_chek = ?i WHERE vk_id = ?i', $time_60_chek, $id); // Обновляем данные
                         
                      }
                    
                }
            }
        }
        elseif($cmd[1]=='4'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $healer = $db->query('SELECT healer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['healer']; // вытягиваем весь баланс
                 $time_60_min = $db->query('SELECT time_60_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_min'];
                 $time_60_chek = $db->query('SELECT time_60_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
              $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
             
            
             $healerprice=$sum*1000000;
             
                 if($balance < $healerprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 👷‍♂Целителей за $healerprice 💵");
                    $balance=$balance-$healerprice;
                    $healer=$healer+$sum;
                    $xp_curent=$xp_curent + (1000*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET healer = ?i WHERE vk_id = ?i', $healer, $id); // Обновляем данные
                      $power=$power+1000;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                    
                      if($healer>=1 and $time_60_chek==1){
                          $time_60_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_60_min = ?i WHERE vk_id = ?i', $time_60_min, $id); // Обновляем данные
                          $time_60_chek=0;
                          $db->query('UPDATE users SET time_2_chek = ?i WHERE vk_id = ?i', $time_60_chek, $id); // Обновляем данные
                          
                      }
                    
                }
            }
        }
        elseif($cmd[1]=='5'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $warrior = $db->query('SELECT warrior FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['warrior']; // вытягиваем весь баланс
                 $time_240_min = $db->query('SELECT time_240_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_min'];
                 $time_240_chek = $db->query('SELECT time_240_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
              $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
             
            
             $warriorprice=$sum*5000000;
             
                 if($balance < $warriorprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 🤺Рыцарей за $warriorprice 💵");
                    $balance=$balance-$warriorprice;
                    $warrior=$warrior+$sum;
                    $xp_curent=$xp_curent + (5000*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET warrior = ?i WHERE vk_id = ?i', $warrior, $id); // Обновляем данные
                      $power=$power+5000;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                    
                      if($warrior>=1 and $time_240_chek==1){
                          $time_240_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_240_min = ?i WHERE vk_id = ?i', $time_240_min, $id); // Обновляем данные
                          $time_240_chek=0;
                          $db->query('UPDATE users SET time_240_chek = ?i WHERE vk_id = ?i', $time_240_chek, $id); // Обновляем данные
                          
                      }
                    
                }
            }
        }
        elseif($cmd[1]=='6'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $mage  = $db->query('SELECT mage  FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['mage']; // вытягиваем весь баланс
                 $time_240_min = $db->query('SELECT time_240_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_min'];
                 $time_240_chek = $db->query('SELECT time_240_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
              $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
             
            
             $mageprice=$sum*15000000;
             
                 if($balance < $mageprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 🧙‍♂Магов за $mageprice 💵");
                    $balance=$balance-$mageprice;
                    $mage=$mage+$sum;
                    $xp_curent=$xp_curent + (15000*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET mage = ?i WHERE vk_id = ?i', $mage, $id); // Обновляем данные
                       $power=$power+15000;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                    
                      if($mage>=1 and $time_240_chek==1){
                          $time_240_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_240_min = ?i WHERE vk_id = ?i', $time_240_min, $id); // Обновляем данные
                          $time_240_chek=0;
                          $db->query('UPDATE users SET time_240_chek = ?i WHERE vk_id = ?i', $time_240_chek, $id); // Обновляем данные
                         
                      }
                    
                }
            }
        }
        elseif($cmd[1]=='7'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $hero = $db->query('SELECT hero FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['hero']; // вытягиваем весь баланс
                 $time_1440_min = $db->query('SELECT time_1440_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_min'];
                 $time_1440_chek = $db->query('SELECT time_1440_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
              $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
             
            
             $heroprice=$sum*50000000;
             
                 if($balance < $heroprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 🤴Героев за $heroprice 💵");
                    $balance=$balance-$heroprice;
                    $hero=$hero+$sum;
                    $xp_curent=$xp_curent + (50000*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET hero = ?i WHERE vk_id = ?i', $hero, $id); // Обновляем данные
                    $power=$power+50000;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                      if($hero>=1 and $time_1440_chek==1){
                          $time_1440_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_1440_min = ?i WHERE vk_id = ?i', $time_1440_min, $id); // Обновляем данные
                          $time_1440_chek=0;
                          $db->query('UPDATE users SET time_1440_chek = ?i WHERE vk_id = ?i', $time_1440_chek, $id); // Обновляем данные
                          
                      }
                    
                }
            }
        }
        elseif($cmd[1]=='8'){
            if(!$cmd[2]){
                $vk->sendMessage($peer_id, "Вы не ввели кочичество.\n Для покупки наймников введите команду:\n Нанять[номер][количество]\n Пример: Нанять 1 1");
            }
            else {
                $god = $db->query('SELECT god FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['god']; // вытягиваем весь баланс
                 $time_1440_min = $db->query('SELECT time_1440_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_min'];
                 $time_1440_chek = $db->query('SELECT time_1440_chek FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_chek'];
                  
             $sum =  str_replace(['к','k'], '000', $cmd[2]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
             $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
             $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс
             $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
              $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
             
            
             $godprice=$sum*100000000;
             
                 if($balance < $godprice) {
                    $vk->sendMessage($peer_id, 'У вас не достаточно денег');
                     
                }
                else{
                    $vk->sendMessage($peer_id, "Вы успешно наняли $sum 🦹‍♂Полубогов за $godprice 💵");
                    $balance=$balance-$godprice;
                    $god=$god+$sum;
                    $xp_curent=$xp_curent + (100000*$sum);
                    $db->query('UPDATE users SET xp_curent = ?i WHERE vk_id = ?i', $xp_curent, $id);
                     $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id); // Обновляем данные
                      $db->query('UPDATE users SET god = ?i WHERE vk_id = ?i', $god, $id); // Обновляем данные
                    $power=$power+100000;
                          $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
                      if($god>=1 and $time_1440_chek==1){
                          $time_1440_min=$time;
                          $vk->sendMessage($peer_id, "OK");
                          $db->query('UPDATE users SET time_1440_min = ?i WHERE vk_id = ?i', $time_1440_min, $id); // Обновляем данные
                          $time_1440_chek=0;
                          $db->query('UPDATE users SET time_1440_chek = ?i WHERE vk_id = ?i', $time_1440_chek, $id); // Обновляем данные
                          
                      }
                    
                }
            }
        }
        
        
    }

    if ($cmd[0] == 'казино'){ // Первая команда
    

        if (!$cmd[1]){ // если вторая команда пустая она вернет FALSE
            $vk->sendMessage($peer_id, 'Укажите сумму ставки!');
        }elseif ($cmd[1] == 'все' or $cmd[1] == 'всё'){ // Если указано все

            $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс

            if($balance == 0) {
                $vk->sendMessage($peer_id, 'У Вас нет денег :(');
            } else {
                $result = mt_rand(1, 4); // 1 - проиграл половину, 2 - победа x1.5, 3 - победа x2, 4 - проиграл все
                $win_money = ($result == 1 ? $balance / 2 : ($result == 2 ? $balance * 2 : ($result == 3 ? $balance * 5 : 0)));
                $win_nowin = ($result == 1 ? '🛑 проиграли половину' : ($result == 2 ? '🎉 выиграли x2' : ($result == 3 ? '🎉 выиграли x5' : '🛑 проиграли все')));
                $vk->sendMessage($peer_id, "Вы $win_nowin, ваш баланс теперь составляет $win_money монет.");
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $win_money, $id); // Обновляем данные
            }
        } else {

         $sum =  str_replace(['к','k'], '000', $cmd[1]); // наши Кk превращаем в человеческий вид, заменяя их на нули :)
         $sum =  ltrim(mb_eregi_replace('[^0-9]', '', $sum),'0'); // удаляем лишние символы, лишние нули спереди и все что может поломать систему :), подробнее о функциях можно почитать в интернете
         $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance']; // вытягиваем весь баланс

            if($balance < $sum) {
                $vk->sendMessage($peer_id, 'У вас не достаточно денег');
            } else {
            $result = mt_rand(1, 4); // 1 - проиграл половину, 2 - победа x1.5, 3 - победа x2, 4 - проиграл все

            $win_money = ($result == 1 ?  $balance - ($sum / 2)  : ($result == 2 ? $balance + ($sum * 2) : ($result == 3 ? $balance + ($sum * 5) : $balance - $sum)));
            $win_nowin = ($result == 1 ? '🛑 проиграли половину' : ($result == 2 ? '🎉 выиграли x2' : ($result == 3 ? '🎉 выиграли x5' : '🛑 проиграли все')));

            $vk->sendMessage($peer_id, "Вы $win_nowin, ваш баланс теперь составляет $win_money монет.");
            $db->query('UPDATE users SET balance =  ?i WHERE vk_id = ?i',  $win_money, $id); // Обновляем данные
            }
        }


    }
    


    // Давайте для обработки кнопки воспльзуемся SWITCH - CASE
    switch ($payload) // Проще говоря мы загрузили кнопки кнопки в свич, теперь проверяем что за кнопка была нажата и обрабатываем ее
    {
        case 'bonus';
        $time_bonus = $id_reg_check = $db->query('SELECT time_bonus FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_bonus'];
        if ($time_bonus < $time){
        	$balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        	
            //  + 21600 минут = 6 часов
            $next_bonus = $time + 2400; // Прибавляем 6 часов для следующего бонуса!
            $rand_money = mt_rand(1000, 5000); // Рандомно выбираем число от 1000 до 5000, используя встроенную функцию PHP mt_rand
            $db->query('UPDATE users SET time_bonus = ?i, balance = balance + ?i WHERE vk_id = ?i',$next_bonus, $rand_money, $id); // Обновляем данные
            $balance_plusbonus=$balance+$rand_money;
            $vk->sendMessage($peer_id,"@id$id ($userinfo[first_name] $userinfo[last_name]) ✅ Вы взяли бонус, Вам выпало $rand_money 💵 \nBаш баланс: $balance_plusbonus 💵 ");
        } else { // Иначе сообщим о том что бонус уже взят!
            $time_bonus=$time_bonus+10800;
            $next_bonus = date("d.m в H:i:s",$time_bonus);
            $vk->sendMessage($peer_id,"❗@id$id ($userinfo[first_name] $userinfo[last_name])\n Вы уже брали бонус ранее, следующий будет доступен \"$next_bonus\"");
        }

        break;
        case 'games';
            $vk->sendButton($peer_id,"Вы открыли меню с играми. Выберите во что хотите сыграть:", [[ $casinoinfo,$menu]]);
        break;
        case 'casinoinfo';
            $vk->sendButton($peer_id,"Чтобы сыграть в казино введите команду:\n\nКазино[сумма ставки]\nПример команды:\nКазино 300 или Казино всё", [[ $casinoinfo,$menu]]);
        break;
        case 'menu';
           $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name]) ✅\n Добро пожаловать в главное меню",  [[$profile,$storage],[$buyteam,$bonus],[$cases,$hunt],[$help], [$games]]);
        break;
        case 'profile';
        $level = $db->query('SELECT level FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['level'];
        $xp_curent = $db->query('SELECT xp_curent FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_curent'];
        $xp_need = $db->query('SELECT xp_need FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['xp_need'];
        $trump = $db->query('SELECT trump FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['trump'];
        $recruit = $db->query('SELECT recruit FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['recruit'];
        $wanderer = $db->query('SELECT wanderer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['wanderer'];
        $healer = $db->query('SELECT healer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['healer'];
        $warrior = $db->query('SELECT warrior FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['warrior'];
        $mage = $db->query('SELECT mage FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['mage'];
        $hero = $db->query('SELECT hero FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['hero'];
        $god = $db->query('SELECT god FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['god'];
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
         $silver_key = $db->query('SELECT silver_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['silver_key'];
        $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
        $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
            $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
            
             $power = $db->query('SELECT power FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['power'];
                $elite_team_text[0] = ($adam==0 ? $elite_team_text[0]=null :"\n👨‍⚕Адам : $adam ");
                $elite_team_text[1] = ($reiman==0 ? $elite_team[1]=null : "\n🧑Рейман: $reiman " );
                $elite_team_text[2] = ($archer==0 ? $elite_team[2]=null :"\n👲Лучник: $archer ");
                $elite_team_text[3] = ($jester==0 ? $elite_team[3]=null :"\n🤹‍♂Шут: $jester " );
                $elite_team_text[4] = ($king==0 ? $elite_team[4]=null :"\n👴Король: $king "   );
                $elite_team_text[5] = ($assassin==0 ? $elite_team[5]=null :"\n👨‍🎤Асасин: $assassin ");
                $elite_team_text[6] = ($goblin==0 ? $elite_team[6]=null :"\n🤶Гоблин: $goblin " );
                $elite_team_text[7] = ($fairy==0 ? $elite_team[7]=null :"\n🧚‍♂Фея: $fairy "  );
                $elite_team_text[8] = ($berserk==0 ? $elite_team[8]=null :"\n🏃‍♂Берсерк: $berserk " );
                $elite_team_text[9] = ($ac==0 ? $elite_team[9]=null :"\n🙆‍♂Ас: $ac " );
                $elite_team_text[10] = ($elf==0 ? $elite_team[10]=null :"\n🧝‍♂Эльф: $elf ");
                $elite_team_text[11] = ($swordsman==0 ? $elite_team[11]=null :"\n😡Мечник: $swordsman " );
                $elite_team_text[12] = ($orc==0 ? $elite_team[12]=null :"\n🥶Орк: $orc " );
                $elite_team_text[13] = ($tiger==0 ? $elite_team[13]=null :"\n🐅Тигр: $tiger " );
                $elite_team_text[14] = ($seeker==0 ? $elite_team[14]=null :"\n🕵‍♂Искатель: $seeker ");
                $elite_team_text[15] = ($death==0 ? $elite_team[15]=null :"\n💀Смерть: $death " );
                $elite_team_text[16] = ($Inquisitor==0 ? $elite_team[16]=null :"\n💂‍♂Инквизитор: $Inquisitor " );
                $elite_team_text[17] = ($wolf==0 ? $elite_team[17]=null :"\n🐺Волк: $wolf "   );
                $elite_team_text[18] = ($collector==0 ? $elite_team[18]=null :"\n🙇‍♂Собиратель: $collector " );
                $elite_team_text[19] = ($stigmata==0 ? $elite_team[19]=null :"\n😈Стигмат: $stigmata " );
                $elite_team_text[20] = ($inspector==0 ? $elite_team[20]=null :"\n👮‍♂Инспектор: $inspector ");
                $elite_team_text[21] = ($ghost==0 ? $elite_team[21]=null : "\n👻Призрак: $ghost "  );
                $elite_team_text[22] = ($kok==0 ? $elite_team[22]=null :"\n👨‍🍳Кок: $kok ");
                $elite_team_text[23] = ($zombies==0 ? $elite_team[23]=null :"\n🧟‍♂Зомби: $zombies " );
                $elite_team_text[24] = ($merchant==0 ? $elite_team[24]=null :"\n🧕Торговец: $merchant ");
                $elite_team_text[25] = ($rider==0 ? $elite_team[25]=null :"\n🏇Всадник: $rider ");
                $elite_team_text[26] = ($undertaker==0 ? $elite_team[26]=null :"\n🕴Гробовщик: $undertaker " );
                $elite_team_text[27] = ($baron==0 ? $elite_team[27]=null :"\n👨‍🏫Барон: $baron " );
                $elite_team_text[28] = ($rusalka==0 ? $elite_team[28]=null :"\n🧜‍♀Русалка: $rusalka " );
                $elite_team_text[29] = ($dragon==0 ? $elite_team[29]=null :  "\n🐲Дракон: $dragon " );
               
           
           $power=(($trump*1)+($recruit*10)+($wanderer*100)+($healer*1000)+($warrior*5000)+($mage*15000)+($hero*50000)+($god*100000));
            $vk->sendButton($peer_id,"✅ @id$id ($userinfo[first_name] $userinfo[last_name]) ✅\n Это ваш профиль \n 🤠 Тут вы сможете увидеть информацию о вашем профиле и о вашей группировке наёмноков\n Ваш баланс: $balance 💵\n
            ✴ Ваш уровень: $level
            🆙 Опыта до след. уровня $xp_curent / $xp_need \n
            
            Сила вашего отряда:✊🏻 $power ед. \n
            Ключи:
            🗝 $silver_key Серебрянных ключа
            🔑 $gold_key Золотых ключа
            🧪 $strange_key Странный ключ
            \n Ввашем отряде: \n🙍‍♂  Бродяг: $trump \n 👼Новичков: $recruit \n 👳‍♂Скитальцев: $wanderer \n 👷‍♂Целителей: $healer \n 🤺Рыцарей: $warrior \n 🧙‍♂Магов: $mage \n 🤴Героев: $hero \n 🦹‍♂Полубогов: $god \n
            Элитные наёмники \n
            $elite_team_text[0] $elite_team_text[1] $elite_team_text[2] $elite_team_text[3] $elite_team_text[4] $elite_team_text[5] $elite_team_text[6] $elite_team_text[7] $elite_team_text[8] $elite_team_text[9] $elite_team_text[10] $elite_team_text[11] $elite_team_text[12] $elite_team_text[13] $elite_team_text[14] $elite_team_text[15] $elite_team_text[16] $elite_team_text[17] $elite_team_text[18] $elite_team_text[19] $elite_team_text[20] $elite_team_text[21] $elite_team_text[22] $elite_team_text[23] $elite_team_text[24] $elite_team_text[25] $elite_team_text[26] $elite_team_text[27] $elite_team_text[28] $elite_team_text[29]
            " , [[ $menu]]);
             $db->query('UPDATE users SET power = ?i WHERE vk_id = ?i', $power, $id);
        break;
        case 'buyteam';
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Добро пожаловать в меню покупки членов команды \n\n№ 1. 🙍‍♂Бродяга: Цена 1000 💵 \n📦 Приносит каждые 2 минуты 🌟 1 звезду \n\n№ 2. 👼Новичок: Цена 10000 💵 \n📦 Приносит каждый  час ✨ 1 осколок \n\n№ 3. 👳‍♂Скиталец: Цена 100000 💵 \n📦 Приносит каждые 2 минуты 🌟 125 звёзд \n\n№ 4. 👷‍♂Целитель: Цена 1000000 💵 \n📦 Приносит каждый  час ✨ 350 осколоков \n\n№ 5. 🤺Рыцарь: Цена 5000000 💵 \n📦 Приносит каждыйе 4 часа🔮 1 сферу \n\n№ 6. 🧙‍♂Маг: Цена 15000000 💵 \n📦 Приносит каждыйе 4 часа🔮 70 сфер \n\n№ 7. 🤴Герой: Цена 50000000  💵 \n📦 Приносит каждыйе 24 часа🌟 150000 звёзд ✨ 50000 осколоков 🔮 1500 сфер \n\n№ 8. 🦹‍♂Полубог: Цена 100000000 💵\n📦 Приносит каждыйе 24 часа🌟 7500000 звёзд ✨ 125000 осколоков 🔮 7500 сфер \n\n Для того что-бы нанять наёмника введите команду:\n Нанять [номер наёмника][количество]\nПример команды: Нанять 1 5 ", [[ $menu ]]);
            
        break;
        
        
        case 'storage';
         $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
         $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
         $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Добро пожаловать в Хранилище \n\n У вас: \n Звёзд: 🌟 $stars \nОсколков: ✨ $shards \nСфер: 🔮 $spheres", [[$collect],[$sellincome],[ $menu ]]);
            
        break;
        case 'collect';
        $time_2_min = $db->query('SELECT time_2_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_2_min']; // вытягиваем весь баланс
        $time_60_min = $db->query('SELECT time_60_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_60_min'];
        $time_240_min = $db->query('SELECT time_240_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_240_min'];
        $time_720_min = $db->query('SELECT time_720_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_720_min'];
        $time_1440_min = $db->query('SELECT time_1440_min FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['time_1440_min'];
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
        $recruit = $db->query('SELECT recruit FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['recruit'];
        $wanderer = $db->query('SELECT wanderer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['wanderer'];
        $healer = $db->query('SELECT healer FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['healer'];
        $warrior = $db->query('SELECT warrior FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['warrior'];
        $mage = $db->query('SELECT mage FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['mage'];
        $hero = $db->query('SELECT hero FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['hero'];
        $god = $db->query('SELECT god FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['god'];
        $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
        $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
        $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
        $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        $silver_key = $db->query('SELECT silver_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['silver_key'];
        $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
        $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
         $db->query('UPDATE users SET time = ?i WHERE vk_id = ?i', $time, $id);
         
          if($hero>=1 or $god>=1 or $merchant >=1 or $rider >=1 or $undertaker >=1 or $baron >=1 or $rusalka >=1 or $dragon >=1){
            $incometime1440=$time-$time_1440_min;
            if($incometime1440>=86400){
                $income1440=($time-$time_1440_min);
                $income1440min=intval($income1440/86400);
                $timeleft1440=$income1440-($income1440min*86400);
                $time_1440_min=$time-$timeleft1440;
                $starsplus1400=(round(($income1440min*($hero*150000)))+round(($income1440min*($god*7500000 ))));
                $shardsplus1400=(round(($income1440min*($hero*50000)))+round(($income1440min*($god*125000))));
                $spheresplus1400=(round(($income1440min*($hero*1500)))+round(($income1440min*($god*7500)))+round(($income1440min*($merchant*8888))));
                $silver_keyplus1400=(round(($income1440min*($undertaker*15)))+round(($income1440min*($dragon*25))));
                $gold_keyplus1440=(round(($income1440min*($baron*10)))+round(($income1440min*($dragon*20))));
                $strange_keyplus1440=(round(($income1440min*($rider*5)))+round(($income1440min*($dragon*15))));
                $godplus1440=(round(($income1440min*($rusalka*1))));
                
                $stars=$stars+$starsplus1400;
                $shards=$shards+$shardsplus1400;
                $spheres=$spheres+$spheresplus1400;
                $silver_key=$silver_key+$silver_keyplus1400;
                $gold_key=$gold_key+$gold_keyplus1440;
                $strange_key=$strange_key+$strange_keyplus1440;
                $god=$god+$godplus1440;
                
               $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET silver_key = ?i WHERE vk_id = ?i', $silver_key, $id);
                $db->query('UPDATE users SET gold_key = ?i WHERE vk_id = ?i', $gold_key, $id);
                $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
                $db->query('UPDATE users SET god = ?i WHERE vk_id = ?i', $god, $id);
                $db->query('UPDATE users SET time_1440_min = ?i WHERE vk_id = ?i', $time_1440_min, $id);
                 
            }
          }
          
          if($tiger>=1 or $death >=1 or $Inquisitor>=1 or $wolf>=1 or $collector>=1 or $stigmata >=1 or $ghost>=1 or $kok>=1 or $zombies>=1){
            $incometime720=$time-$time_720_min;
            if($incometime720>=43200){
                $income720=($time-$time_720_min);
                $income720min=intval($income720/43200);
                $timeleft720=$income720-($income720min*43200);
                $time_720_min=$time-$timeleft720;
                $starsplus720=(round(($income720min*($stigmata*555000)))+round(($income720min*($ghost*999999))));
                $shardsplus720=(round(($income720min*($stigmata*55500)))+round(($income720min*($ghost*99999))));
                $spheresplus720=(round(($income720min*($collector*7777)))+round(($income720min*($ghost*9999)))+round(($income720min*($kok*5555))));
                $balanceplus720=(round(($income720min*($kok*5500000))));
                $silver_keyplus720=(round(($income720min*($tiger*5)))+round(($income720min*($zombies*3))));
                $gold_keyplus720=(round(($income720min*($death*3)))+round(($income720min*($zombies*2))));
                $strange_keyplus720=(round(($income720min*($Inquisitor*1)))+round(($income720min*($zombies*1))));
                $trumpplus720=(round(($income720min*($wolf*150))));
                $stars=$stars+$starsplus720;
                $shards=$shards+$shardsplus720;
                $spheres=$spheres+$spheresplus720;
                $balance=$balance+$balanceplus720;
                $silver_key=$silver_key+$silver_keyplus720;
                $gold_key=$gold_key+$gold_keyplus720;
                $strange_key=$strange_key+$strange_keyplus720;
                $trump=$trump+$trumpplus720;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET silver_key = ?i WHERE vk_id = ?i', $silver_key, $id);
                $db->query('UPDATE users SET gold_key = ?i WHERE vk_id = ?i', $gold_key, $id);
                $db->query('UPDATE users SET strange_key = ?i WHERE vk_id = ?i', $strange_key, $id);
                $db->query('UPDATE users SET trump = ?i WHERE vk_id = ?i', $trump, $id);
                $db->query('UPDATE users SET time_720_min = ?i WHERE vk_id = ?i', $time_720_min, $id);
          }
         }
          
         if($warrior>=1 or $mage>=1 or $elf >=1 or $swordsman >=1 or $orc >=1){
            $incometime240=$time-$time_240_min;
            if($incometime240>=14400){
                $income240=($time-$time_240_min);
                $income240min=intval($income240/14400);
                $timeleft240=$income240-($income240min*14400);
                $time_240_min=$time-$timeleft240;
                $starsplus240=(round(($income240min*($swordsman*888888))));
                $shardsplus240=(round(($income240min*($elf*35000)))+round(($income240min*($orc*345000))));
                $spheresplus240=(round(($income240min*$warrior))+round(($income240min*($mage*70)))+round(($income240min*($elf*2000)))+round(($income240min*($swordsman*3333))));
                $balanceplus240=(round(($income240min*($orc*450000))));
                $stars=$stars+$starsplus240;
                $shards=$shards+$shardsplus240;
                $spheres=$spheres+$spheresplus240;
                $balance=$balance+$balanceplus240;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET time_240_min = ?i WHERE vk_id = ?i', $time_240_min, $id);
          }
         }
          if($recruit>=1 or $healer>=1 or $king>=1 or $assassin>=1 or $goblin>=1 or $fairy>=1 or $ac>=1){
            $incometime60=$time-$time_60_min;
            if($incometime60>=3600){
                $income60=($time-$time_60_min);
                $income60min=intval($income60/3600);
                $timeleft60=$income60-($income60min*3600);
                $time_60_min=$time-$timeleft60;
                $starsplus60=(round(($income60min*($king*25000)))+round(($income60min*($king*170000))));
                $shardsplus60=(round(($income60min*$recruit))+round(($income60min*($healer*350)))+round(($income60min*($assassin*12000))));
                $spheresplus60=(round(($income60min*($goblin*500))));
                $balanceplus60=(round(($income60min*($fairy*50000)))+round(($income60min*($ac*55000))));
                $stars=$stars+$starsplus60;
                $shards=$shards+$shardsplus60;
                $spheres=$spheres+$spheresplus60;
                $balance=$balance+$balanceplus60;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                
                $db->query('UPDATE users SET time_60_min = ?i WHERE vk_id = ?i', $time_60_min, $id);
            }
          }
            
        if($trump>=1 or $wanderer>=1 or $adam>=1 or $reiman>=1 or $archer>=1 or $jester>=1 or $berserk>=1 or $seeker>=1 or $inspector>=1){
            $incometime2=$time-$time_2_min;
            if($incometime2>=120){
                $income2=($time-$time_2_min);
                
                $income2min=intval($income2/120);
                $timeleft2=$income2-($income2min*120);
                $time_2_min=$time-$timeleft2;
                
                $starsplus=(round(($income2min*$trump))+round(($income2min*($wanderer*125)))+round(($income2min*($adam*5500)))+round(($income2min*($berserk*1500)))+round(($income2min*($seeker*12345))));
                $shardsplus2=(round(($income2min*($reiman*350)))+round(($income2min*($berserk*150))));
                $spheresplus2=(round(($income2min*($archer*15))));
                $balanceplus2=(round(($income2min*($jester*1500))));
                $recruitplus2=(round(($income2min*($inspector * 1))));
                $stars=$stars+$starsplus;
                $shards=$shards+$shardsplus2;
                $spheres=$spheres+$spheresplus2;
                $balance=$balance+$balanceplus2;
                $recruit=$recruit+$recruitplus2;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
                $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                $db->query('UPDATE users SET recruit = ?i WHERE vk_id = ?i', $recruit, $id);
                $db->query('UPDATE users SET time_2_min = ?i WHERE vk_id = ?i', $time_2_min, $id);
                
                 
            }
                
        }
                $allstars=$starsplus+$starsplus60+$starsplus240+$starsplus720+$starsplus1400;              
                $allshards=$shardsplus+$shardsplus2+$shardsplus60+$shardsplus240+$shardsplus720+$shardsplus1400;
                $allspheres=$spheresplus+$spheresplus2+$spheresplus60+$spheresplus240+$spheresplus720+$spheresplus1400;
                $allbalance=$balanceplus2+$balanceplus60+$balanceplus240+$balanceplus720;
                $allrecruit=$recruitplus2;
                $allSilverKey=$silver_keyplus720+$silver_keyplus1400;
                $allGoldKey=$gold_keyplus720+$gold_keyplus1440;
                $allStrangeKey=$strange_keyplus720+$strange_keyplus1440;
                $allTrump=$trumpplus720;
                $allGod=$godplus1440;
                if($allstars>=1){
                    $starstext="\n🌟 Звёзды: $allstars";
                }
                else{
                    $starstext=null;
                }
                if($allshards>=1){
                    $shardstext="\n✨ Осколки: $allshards";
                }
                else{
                    $shardstext=null;
                }
                if($allstars>=1){
                    $spherestext="\n🔮 Сферы: $allspheres";
                }
                else{
                    $spherestext=null;
                }
                if($allbalance>=1){
                    $balancetext="\n💵 Баксов: $allbalance";
                }
                else{
                    $balancetext=null;
                }
                if($allrecruit>=1){
                    $recruittext="\n 👼 Новичков: $allrecruit";
                }
                else{
                    $recruittext=null;
                }
                if($allSilverKey>=1){
                    $SilverKeytext="\n 🗝 Серебряные ключи: $allSilverKey";
                }
                else{
                    $SilverKeytext=null;
                }
                if($allGoldKey>=1){
                    $GoldKeytext="\n 🔑 Золотые ключи: $allGoldKey";
                }
                else{
                    $GoldKeytext=null;
                }
                if($allStrangeKey>=1){
                    $StrangeKeytext="\n 🧪 Странные ключи: $allStrangeKey";
                }
                else{
                    $StrangeKeytext=null;
                }
                if($allTrump>=1){
                    $Trumptext="\n 🙍‍♂ Бродяг: $allTrump";
                }
                else{
                    $Trumptext=null;
                }
                 if($allGod>=1){
                    $Godtext="\n 🦹‍♂ Полубогов: $allGod";
                }
                else{
                    $Godtext=null;
                }
            if($trump>=1 or $recruit>=1 or $wanderer>=1 or $healer>=1 or $warrior>=1 or $mage>=1 or $hero>=1 or $god>=1){
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Вы собрали прибыль с наёмников:\n $starstext $shardstext  $spherestext $balancetext $recruittext $SilverKeytext $GoldKeytext $StrangeKeytext $Trumptext $Godtext \n\n У вас:\n 🌟 $stars звёзд \n ✨ $shards осколков \n 🔮 $spheres сфер", [[$collect],[$sellincome],[ $menu ]]);
        }
        
        if($trump==0 and $recruit==0 and $wanderer==0 and $healer==0 and $warrior==0 and $mage==0 and $hero==0 and $god==0){
            $vk->sendButton($peer_id," @id$id ($userinfo[first_name] $userinfo[last_name]) \n Для того чтобы собрать прибыл вам необходимо чтобы в вашем отряде был хоть кто-то", [[$collect],[$sellincome],[ $menu ]]);
        }
        
        
        break;
        
        case 'sellincome';
        
        	$balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
         $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
          $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
           $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Тут вы можете продать прибыль с наёмников \n\n У вас: \n Звёзд: 🌟 $stars \nОсколков: ✨ $shards \nСфер: 🔮 $spheres\n\n Цена продажи\n 1 🌟: 0.1 💵 \n 1 ✨ : 10 💵\n 1 🔮 250 💵", [[$sellstars],[$sellshards],[$sellspheres],[ $menu ]]);
            
        break;
        case 'sellstars';
        $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        $starprice=0.1;
        	$balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
         $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
         $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
         $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
         if($stars<100){
             $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n В вашем хранилище меньше 100 звёзд. \n\n У вас: \n Звёзд: 🌟 $stars ", [[$sellstars],[$sellshards],[$sellspheres],[ $menu ]]);
         }
         else{
             $starsmoney=round($starprice*$stars);
             $balance=$balance+$starsmoney;
             $srarsnow=0;
              
                $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Вы успешно продали 🌟 $stars звёзд за: $starsmoney 💵 \n\n У вас: \n Звёзд: 🌟 $srarsnow \n Осколков: ✨  $shards \n Сфер:🔮  $spheres \n\n Ваш баланс: $balance", [[$sellstars],[$sellshards],[$sellspheres],[ $menu ]]);
                $stars=$stars-$stars;
                $db->query('UPDATE users SET stars = ?i WHERE vk_id = ?i', $stars, $id);
               $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                
         }
           
            
        break;
        case 'sellshards';
        $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        $shardsprice=10;
        	$balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
         $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
         $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
         if($shards<10){
             $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n В вашем хранилище меньше 10 осколков. \n\n У вас: \n Осколков: ✨ $shards ", [[$sellstars],[$sellshards],[$sellspheres],[ $menu ]]);
         }
         else{
             $shardsmoney=round($shardsprice*$shards);
             $balance=$balance+$shardsmoney;
             $shardsnow=0;
              
                $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Вы успешно продали ✨  $shards осколков за: $shardsmoney 💵 \n\n У вас: \nЗвёзд: 🌟 $stars \n Осколков: ✨  $shardsnow \n Сфер:🔮  $spheres \n\n Ваш баланс: $balance", [[$sellstars],[$sellshards],[$sellspheres],[ $menu ]]);
                $shards=$shards-$shards;
                $db->query('UPDATE users SET shards = ?i WHERE vk_id = ?i', $shards, $id);
               $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                
         }
           
            
        break;
        case 'sellspheres';
        $balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
        $spheresprice=250;
        	$balance = $db->query('SELECT balance FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['balance'];
         $stars = $db->query('SELECT stars FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['stars']; 
         $shards = $db->query('SELECT shards FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['shards'];
         $spheres = $db->query('SELECT spheres FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['spheres'];
         if($spheres<1){
             $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n В вашем хранилище меньше 1 Сфер. \n\n У вас: \n Сфер: 🔮 $spheres ", [[$sellstars],[$sellshards],[$sellspheres],[ $menu ]]);
         }
         else{
             $spheresmoney=round($spheresprice*$spheres);
             $balance=$balance+$spheresmoney;
             $spheresnow=0;
              
                $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Вы успешно продали 🔮 $spheres сфер за: $spheresmoney 💵 \n\n У вас: Звёзд: 🌟 $stars \n Осколков: ✨  $shards \n Сфер:🔮  $spheresnow \n Ваш баланс: $balance", [[$sellstars],[$sellshards],[$sellspheres],[ $menu ]]);
                $spheres=$spheres-$spheres;
                $db->query('UPDATE users SET spheres = ?i WHERE vk_id = ?i', $spheres, $id);
               $db->query('UPDATE users SET balance = ?i WHERE vk_id = ?i', $balance, $id);
                
         }
           
            
        break;
        case 'help';
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Выберите пункт:", [[$helpcmd],[$helpteam],[$helpteamelete],[ $menu ]]);
        break;
        case 'helpcmd';
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Нанять: \n Нанять[номер][число]", [[$helpcmd],[$helpteam],[$helpteamelete],[ $menu ]]);
        break;
         case 'helpteam';
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Нанять: \n Нанять[номер][число]", [[$helpcmd],[$helpteam],[$helpteamelete],[ $menu ]]);
        break;
        case 'helpteamelete';
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n Тут вы увидите информацию о элитных наёмниках:
                \n№ 1 👨‍⚕Адам\n 📦Приносит каждые 2 минуты:
                5500🌟 Звёзд
                \n№ 2 🧑Рейман\n 📦Приносит каждые 2 минуты:
                350✨ Осколков
                \n№ 3 👲Лучник\n 📦Приносит каждые 2 минуты:
                15🔮 Сфер
                \n№ 4 🤹‍♂Шут\n 📦Приносит каждые 2 минуты: 
                1500 💵
                \n№ 5 👴Король\n 📦Приносит каждый час: 
                170000🌟 Звёзд
                \n№ 6 👨‍🎤Асасин\n 📦Приносит каждый час: 
                12000✨ Осколков
                \n№ 7 🤶Гоблин\n 📦Приносит каждый час: 
                500🔮 Сфер
                \n№ 8 🧚‍♂Фея\n 📦Приносит каждый час: 
                50000 💵
                \n№ 9 🏃‍♂Берсерк\n 📦Приносит каждые 2 минуты: 
                1500🌟 Звёзд 
                150✨ Осколков
                \n№ 10 🙆‍♂Ас\n 📦Приносит каждый час:
                55000 💵
                \n№ 11 🧝‍♂Эльф\n 📦Приносит каждые 4 часа: 
                35000✨ Осколков 
                2000🔮 Сфер
                \n№ 12 😡Мечник\n 📦Приносит каждые 4 часа: 
                888888🌟 Звёзд 
                3333🔮 Сфер
                \n№ 13 🥶Орк\n 📦Приносит каждые 4 часа: 
                345000✨ Осколков 
                450000 💵
                \n№ 14 🐅Тигр\n 📦Приносит каждые 12 часов: 
                5 🗝Серебрянных ключа
                \n№ 15 🕵‍♂Искатель\n 📦Приносит каждые 2 минуты: 
                12345🌟 Звёзд 
                \n№ 16 💀Смерть \n 📦Приносит каждые 12 часов: 
                3 🔑Золотых ключа
                \n№ 17 💂‍♂Инквизитор\n 📦Приносит каждые 12 часов:
                1 🧪Странный ключ
                \n№ 18 🐺Волк \n 📦Приносит каждые 12 часов: 
                150 🙍‍♂ Бродяг
                \n№ 19 🙇‍♂Собиратель\n 📦Приносит каждые 12 часов: 
                7777🔮 Сфер
                \n№ 20 😈Стигмат\n 📦Приносит каждые 12 часов: 
                555000🌟 Звёзд
                55500✨ Осколков
                \n№ 21 👮‍♂Инспектор\n 📦Приносит каждые 2 минуты: 
                1 👼Новичка
                \n№ 22 👻Призрак\n 📦Приносит каждые 12 часов:
                999999🌟 Звёзд 
                99999✨ Осколков 
                9999🔮 Сфер
                \n№ 23 👨‍🍳Кок\n 📦Приносит каждые 12 часов:
                5500000 💵
                5555🔮 Сферы
                \n№ 24 🧟‍♂Зомби\n 📦Приносит каждые 12 часов:
                3 🗝Серебрянных ключа
                2 🔑Золотых ключа
                1 🧪Странный ключ
                \n№ 25 🧕Торговец\n 📦Приносит каждые 24 часа:
                8888🔮 Сфер
                \n№ 26 🏇Всадник\n 📦Приносит каждые 24 часа:
                5 🧪Странных ключа
                \n№ 27 🕴Гробовщик\n  📦Приносит каждые 24 часа:
                15 🗝Серебрянных ключа
                \n№ 28 👨‍🏫Барон\n 📦Приносит каждые 24 часа:
                10 🔑Золотых ключа
                \n№ 29 🧜‍♀Русалка\n 📦Приносит каждые 24 часа:
                1 🦹‍♂Полубога
                \n№ 30 🐲Дракон\n 📦Приносит каждые 24 часа:
                25 🗝Серебрянных ключа
                20 🔑Золотых ключа
                15 🧪Странных ключа
                ", 
                [[$helpcmd],[$helpteam],[$helpteamelete],[ $menu ]]);
        break;
        case 'cases';
       
        $silver_key = $db->query('SELECT silver_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['silver_key'];
        $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
        $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n 
            Ключи:
            🗝 $silver_key Серебрянных ключа
            🔑 $gold_key Золотых ключа
            🧪 $strange_key Странный ключ", [[$cases_silver],[$cases_gold],[$cases_strange],[ $menu ]]);
            
        break;
        case 'cases_silver';
       $silver_key = $db->query('SELECT silver_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['silver_key'];
        
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n 
            При открытии 50 кейсов, вы получаете бонус в виде дополнительного открытого
            Ключи:
          🗝 $silver_key Серебрянных ключа", [[$cases_silver1],[$cases_silver50],[$back_cases],[ $menu ]]);
        break;
        case 'cases_gold';
        $gold_key = $db->query('SELECT gold_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['gold_key'];
        
            $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n 
            Ключи:
             🔑 $gold_key Золотых ключа", [[$cases_gold1],[$cases_gold50],[$back_cases],[ $menu ]]);
        break;
        case 'cases_strange';
         $donation = $db->query('SELECT donation FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['donation'];
        $strange_key = $db->query('SELECT strange_key FROM users WHERE vk_id = ?i', $id)->fetch_assoc()['strange_key'];
        
            
           if($donation>=500){
                $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n 
            Ключи:
           🧪 $strange_key Странный ключ", [[$cases_strange1],[$cases_strange50],[$cases_strange500],[$back_cases],[ $menu ]]);
                
            }
            else{
                $vk->sendButton($peer_id," ✅ @id$id ($userinfo[first_name] $userinfo[last_name])✅\n 
            Ключи:
           🧪 $strange_key Странный ключ", [[$cases_strange1],[$cases_strange50],[$back_cases],[ $menu ]]);
            }
        break;
          case 'cases_silver1';
         include 'Includes/OpenCases/open1SilverCase.php';
        break;
        case 'cases_silver50';
         include 'Includes/OpenCases/open50SilverCase.php';
        break;
         case 'cases_gold1';
          include 'Includes/OpenCases/open1GoldCase.php';
        break;
        case 'cases_gold50';
         include 'Includes/OpenCases/open50GoldCase.php';
        break;
        
        
        
        
        
        
        
        
        
        
        
        case 'cases_strange1';
         include 'Includes/OpenCases/open1StrangeCase.php';
        break;
        case 'cases_strange50';
         include 'Includes/OpenCases/open50StrangeCase.php';
        break;
        
        case 'cases_strange500';
         include 'Includes/OpenCases/open500StrangeCase.php';
        break;
       
        case 'hunt';
        include 'Includes/Huntscript.php';
        break;

    }


}