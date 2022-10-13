<?php
require '../vendor/autoload.php';

// 類別先import進來
use Demo\Hello\Lara;
use Demo\Hello\Someone;
$lara= new Lara();echo '<br>';
$vincent= new Someone('Vincent');echo '<br>';
// 類別未先import進來
$mary= new \Demo\Hello\Someone ('Mary');echo '<br>';
$john= new Demo\Hello\Someone('John');echo '<br>';
$hello= new Demo\HelloWorld();echo '<br>';
use Demo\HelloWorld as World; // 類別另取別名
$world = new World();echo '<br>';

//Monolog
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('../log/my.log', Level::Warning));

// add records to the log
$log->warning('Foo');
$log->error('Bar');

//Carbon
use Carbon\Carbon;

printf("Right now is %s", Carbon::now()->toDateTimeString());
printf("Right now in Vancouver is %s", Carbon::now('America/Vancouver'));  //implicit __toString()
$tomorrow = Carbon::now()->addDay();
$lastWeek = Carbon::now()->subWeek();echo '<br>';
$nextSummerOlympics = Carbon::createFromDate(2016)->addYears(4);

$officialDate = Carbon::now()->toRfc2822String();
$howOldAmI = Carbon::createFromDate(1975, 5, 21)->age;

$noonTodayLondonTime = Carbon::createFromTime(12, 0, 0, 'Europe/London');

$internetWillBlowUpOn = Carbon::create(2038, 01, 19, 3, 14, 7, 'GMT');

// Don't really want this to happen so mock now
Carbon::setTestNow(Carbon::createFromDate(2000, 1, 1));

// comparisons are always done in UTC
if (Carbon::now()->gte($internetWillBlowUpOn)) {
    die();
}

// Phew! Return to normal behaviour
Carbon::setTestNow();

if (Carbon::now()->isWeekend()) {
    echo 'Party!';
}
// Over 200 languages (and over 500 regional variants) supported:
echo Carbon::now()->subMinutes(2)->diffForHumans();// '2 minutes ago'
echo'<br>';
echo Carbon::now()->subMinutes(2)->locale('zh_CN')->diffForHumans(); // '2分钟前'
echo'<br>';
echo Carbon::parse('2019-07-23 14:51')->isoFormat('LLLL'); // 'Tuesday, July 23, 2019 2:51 PM'
echo'<br>';
echo Carbon::parse('2019-07-23 14:51')->locale('fr_FR')->isoFormat('LLLL'); // 'mardi 23 juillet 2019 14:51'

// ... but also does 'from now', 'after' and 'before'
// rolling up to seconds, minutes, hours, days, months, years

$daysSinceEpoch = Carbon::createFromTimestamp(0)->diffInDays();

