<?php

// @see https://dev.mysql.com/doc/refman/8.0/en/date-and-time-functions.html#function_adddate

test('ADDTIME', function () {
    $this->expectQuery("ADDTIME('2007-12-31 23:59:59.999999', '1 1:1:1.000002')")
         ->toBe('2008-01-02 01:01:01.000001');
    $this->expectQuery("ADDTIME('01:00:00.999999', '02:00:00.999998')")
         ->toBe('03:00:01.999997');
});

test('CONVERT_TZ', function () {
    $this->expectQuery("CONVERT_TZ('2004-01-01 12:00:00','GMT','MET')")
         ->toBe('2004-01-01 13:00:00');
    $this->expectQuery("CONVERT_TZ('2004-01-01 12:00:00','+00:00','+10:00')")
         ->toBe('2004-01-01 22:00:00');
});

test('CURDATE', function () {
    $this->expectQuery("CURDATE()")
         ->toBe('2008-06-13');
    $this->expectQuery("CURDATE() + 0")
         ->toBe(20080613);
});

test('CURTIME', function () {
    $this->expectQuery("CURTIME()")
         ->toBe('23:50:26');
    $this->expectQuery("CURTIME() + 0")
         ->toBe(235026.000000);
});

test('DATE', function () {
    $this->expectQuery("DATE('2003-12-31 01:02:03')")
         ->toBe('2003-12-31');
});

test('DATEDIFF', function () {
    $this->expectQuery("DATEDIFF('2007-12-31 23:59:59','2007-12-30')")
         ->toBe(1);
    $this->expectQuery("SELECT DATEDIFF('2010-11-30 23:59:59','2010-12-31');")
         ->toBe(31);
});

test('DATE_ADD', function () {
    $this->expectQuery("DATE_ADD('2008-01-02', INTERVAL 31 DAY)")
         ->toBe('2008-02-02');
    $this->expectQuery("ADDDATE('2008-01-02', INTERVAL 31 DAY)")
         ->toBe('2008-02-02');
    $this->expectQuery("ADDDATE('2008-01-02', 31)")
         ->toBe('2008-02-02');
    $this->expectQuery("DATE_ADD('2018-05-01',INTERVAL 1 DAY)")
        ->toBe('2018-05-02');
    $this->expectQuery("DATE_SUB('2018-05-01',INTERVAL 1 YEAR)")
        ->toBe('2017-05-01');
    $this->expectQuery("DATE_ADD('2020-12-31 23:59:59', INTERVAL 1 SECOND)")
        ->toBe('2021-01-01 00:00:00');
    $this->expectQuery("DATE_ADD('2018-12-31 23:59:59', INTERVAL 1 DAY)")
        ->toBe('2019-01-01 23:59:59');
    $this->expectQuery("DATE_ADD('2100-12-31 23:59:59', INTERVAL '1:1' MINUTE_SECOND)")
        ->toBe('2101-01-01 00:01:00');
    $this->expectQuery("DATE_SUB('2025-01-01 00:00:00', INTERVAL '1 1:1:1' DAY_SECOND)")
        ->toBe('2024-12-30 22:58:59');
    $this->expectQuery("DATE_ADD('1900-01-01 00:00:00', INTERVAL '-1 10' DAY_HOUR)")
        ->toBe('1899-12-30 14:00:00');
    $this->expectQuery("DATE_SUB('1998-01-02', INTERVAL 31 DAY)")
        ->toBe('1997-12-02');
    $this->expectQuery("DATE_ADD('1992-12-31 23:59:59.000002', INTERVAL '1.999999' SECOND_MICROSECOND)")
        ->toBe('1993-01-01 00:00:01.000001');
});

test('DATE_FORMAT', function () {
    $this->expectQuery("DATE_FORMAT('2009-10-04 22:23:00', '%W %M %Y')")
        ->toBe('Sunday October 2009');
    $this->expectQuery("DATE_FORMAT('2007-10-04 22:23:00', '%H:%i:%s')")
        ->toBe('22:23:00');
    $this->expectQuery("DATE_FORMAT('1900-10-04 22:23:00', '%D %y %a %d %m %b %j')")
        ->toBe('4th 00 Thu 04 10 Oct 277');
    $this->expectQuery("DATE_FORMAT('1997-10-04 22:23:00', '%H %k %I %r %T %S %w')")
        ->toBe('22 22 10 10:23:00 PM 22:23:00 00 6');
    $this->expectQuery("DATE_FORMAT('1999-01-01', '%X %V')")
        ->toBe('1998 52');
    $this->expectQuery("DATE_FORMAT('2006-06-00', '%d')")
        ->toBe('00');
});

test('DAYNAME', function () {
    $this->expectQuery("DAYNAME('2007-02-03')")
        ->toBe('Saturday');
});

test('DAYOFMONTH', function () {
    $this->expectQuery("DAYOFMONTH('2007-02-03')")
        ->toBe(3);
});

test('DAYOFWEEK', function () {
    $this->expectQuery("DAYOFWEEK('2007-02-03')")
        ->toBe(7);
});

test('DAYOFYEAR', function () {
    $this->expectQuery("DAYOFYEAR('2007-02-03')")
        ->toBe(34);
});
/**
CURRENT_DATE
CURRENT_TIME
CURRENT_TIMESTAMP
CURTIME
DATE
DATEDIFF
DATE_FORMAT
DATE_SUB
DAY
DAYNAME
DAYOFMONTH
DAYOFWEEK
DAYOFYEAR
EXTRACT
FROM_DAYS
HOUR
LAST_DAY
LOCALTIME
LOCALTIMESTAMP
MAKEDATE
MAKETIME
MICROSECOND
MINUTE
MONTH
MONTHNAME
NOW
PERIOD_ADD
PERIOD_DIFF
QUARTER
SECOND
SEC_TO_TIME
STR_TO_DATE
SUBDATE
SUBTIME
SYSDATE
TIME
TIME_FORMAT
TIME_TO_SEC
TIMEDIFF
TIMESTAMP
TO_DAYS
WEEK
WEEKDAY
WEEKOFYEAR
YEAR
YEARWEEK

 */
