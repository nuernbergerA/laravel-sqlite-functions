<?php

// @see https://dev.mysql.com/doc/refman/8.0/en/string-functions.html#function_field

test('ASCII', function () {
    $this->expectQuery("ASCII('2')")
         ->toBe(50);
    $this->expectQuery("ASCII(2)")
         ->toBe(50);
    $this->expectQuery("ASCII('dx')")
         ->toBe(100);
});

test('BIN', function () {
    $this->expectQuery('BIN(12)')
        ->toBe('1100');
});

test('BIT_LENGTH', function () {
    $this->expectQuery("BIT_LENGTH('text')")
        ->toBe(32);
});

test('CHAR', function () {
    $this->expectQuery("CHAR(77,121,83,81,'76')")
        ->toBe('MySQL');
    $this->expectQuery("CHAR(77,77.3,'77.3')")
        ->toBe('MMM');
});

test('CHAR_LENGTH', function () {
    $this->expectQuery("CHAR_LENGTH('海豚')")
         ->toBe('2');
});

test('CHARACTER_LENGTH', function () {
    $this->expectQuery("CHARACTER_LENGTH('海豚')")
         ->toBe('2');
});

test('CONCAT', function () {
    $this->expectQuery("CONCAT('My', 'S', 'QL')")
         ->toBe('MySQL');
    $this->expectQuery("CONCAT('My', NULL, 'QL')")
         ->toBeNull();
    $this->expectQuery("CONCAT(14.3)")
         ->toBe('14.3');
});

test('CONCAT_WS', function () {
    $this->expectQuery("CONCAT_WS(',','First name','Second name','Last Name')")
         ->toBe('First name,Second name,Last Name');
    $this->expectQuery("CONCAT_WS(',','First name',NULL,'Last Name')")
         ->toBe('First name,Last Name');
});

test('ELT', function () {
    $this->expectQuery("ELT(1, 'Aa', 'Bb', 'Cc', 'Dd')")
         ->toBe('Aa');
    $this->expectQuery("ELT(4, 'Aa', 'Bb', 'Cc', 'Dd')")
         ->toBe('Dd');
});

test('EXPORT_SET', function () {
    //EXPORT_SET(bits,on,off[,separator[,number_of_bits]])
    $this->expectQuery("EXPORT_SET(5,'Y','N',',',4)")
         ->toBe('Y,N,Y,N');
    $this->expectQuery("EXPORT_SET(6,'1','0',',',10)")
         ->toBe('0,1,1,0,0,0,0,0,0,0');
});

test('FIELD', function () {
    $this->expectQuery("FIELD('Bb', 'Aa', 'Bb', 'Cc', 'Dd', 'Ff')")
         ->toBe(2);
    $this->expectQuery("FIELD('Gg', 'Aa', 'Bb', 'Cc', 'Dd', 'Ff')")
         ->toBe(0);
});

test('FIND_IN_SET', function () {
    $this->expectQuery("FIND_IN_SET('b','a,b,c,d')")
         ->toBe(2);
});

test('FORMAT', function () {
    $this->expectQuery("FORMAT(12332.123456, 4)")
         ->toBe('12,332.1235');
    $this->expectQuery("FORMAT(12332.1,4)")
         ->toBe('12,332.1000');
    $this->expectQuery("FORMAT(12332.2,0)")
         ->toBe('12,332');
    $this->expectQuery("FORMAT(12332.2,2,'de_DE')")
         ->toBe('12.332,20');
});

test('FROM_BASE64', function () {
    $this->expectQuery("FROM_BASE64('JWJj')")
         ->toBe('abc');
});

test('TO_BASE64', function () {
    $this->expectQuery("TO_BASE64('abc')")
         ->toBe('JWJj');
});

test('HEX', function () {
    $this->expectQuery("HEX('abc')")
         ->toBe(616263);
    $this->expectQuery("HEX(255)")
         ->toBe('FF');
});

test('INSERT', function () {
    $this->expectQuery("INSERT('Quadratic', 3, 4, 'What')")
         ->toBe('QuWhattic');
    $this->expectQuery("INSERT('Quadratic', -1, 4, 'What')")
         ->toBe('Quadratic');
    $this->expectQuery("INSERT('Quadratic', 3, 100, 'What')")
         ->toBe('QuWhat');
});

test('INSTR', function () {
    $this->expectQuery("INSTR('foobarbar', 'bar')")
         ->toBe(4);
    $this->expectQuery("INSTR('xbar', 'foobar')")
         ->toBe(0);
});

test('LCASE', function () {
    $this->expectQuery("LCASE('QUADRATICALLY')")
         ->toBe('quadratically');
});

test('LEFT', function () {
    // This function is multibyte safe.

    $this->expectQuery("LEFT('foobarbar', 5)")
         ->toBe('fooba');
    $this->expectQuery("LEFT(null, 5)")
         ->toBeNull();
});

test('LENGTH', function () {
    $this->expectQuery("LENGTH('海豚')")
         ->toBe('6');
});

test('LOAD_FILE(file_name)');

test('LOCATE', function () {
    $this->expectQuery("LOCATE('bar', 'foobarbar')")
        ->toBe(4);
    $this->expectQuery("LOCATE('xbar', 'foobar')")
        ->toBe(0);
    $this->expectQuery("LOCATE('bar', 'foobarbar', 5)")
        ->toBe(7);
});

test('LOWER', function () {
    $this->expectQuery("LOWER('QUADRATICALLY')")
        ->toBe('quadratically');
});

test('LPAD', function () {
    $this->expectQuery("LPAD('hi',4,'??')")
        ->toBe('??hi');
    $this->expectQuery("LPAD('hi',1,'??')")
        ->toBe('h');
});

test('LTRIM', function () {
    $this->expectQuery("LTRIM('  barbar ')")
        ->toBe('barbar ');
});

test('MAKE_SET', function () {
    $this->expectQuery("MAKE_SET(1,'a','b','c')")
        ->toBe('a');
    $this->expectQuery("MAKE_SET(1 | 4,'hello','nice','world')")
        ->toBe('hello,world');
    $this->expectQuery("MAKE_SET(1 | 4,'hello','nice',NULL,'world')")
        ->toBe('hello');
    $this->expectQuery("MAKE_SET(0,'a','b','c')")
        ->toBe('');
});

test('MID', function () {
    // alias SUBSTRING
});

test('OCT', function () {
    $this->expectQuery("OCT(12)")
         ->toBe('14');
});

test('OCTET_LENGTH', function () {
    // alias LENGTH
});

test('ORD', function () {
    $this->expectQuery("ORD('2')")
         ->toBe(50);
});

test('POSITION', function () {
    // alias LOCATE
});

test('QUOTE', function () {
    $this->expectQuery("QUOTE('Don\'t!')")
         ->toBe('Don\'t!');
    $this->expectQuery("QUOTE(NULL)")
         ->toBeNull();
});

test('REPEAT', function () {
    $this->expectQuery("REPEAT('MySQL', 3)")
         ->toBe('MySQLMySQLMySQL');
});

test('REPLACE', function () {
    $this->expectQuery("REPLACE('www.mysql.com', 'w', 'Ww')")
         ->toBe('WwWwWw.mysql.com');
});

test('REVERSE', function () {
    $this->expectQuery("REVERSE('abc')")
         ->toBe('cba');
});

test('RIGHT', function () {
    $this->expectQuery("RIGHT('foobarbar', 4)")
         ->toBe('rbar');
});

test('RPAD', function () {
    $this->expectQuery("RPAD('hi',5,'?')")
        ->toBe('hi???');
    $this->expectQuery("RPAD('hi',1,'?')")
        ->toBe('h');
});

test('RTRIM', function () {
    $this->expectQuery("RTRIM(' barbar   ')")
         ->toBe(' barbar');
});

test('SOUNDEX', function () {
    $this->expectQuery("SOUNDEX('Hello')")
         ->toBe('H400');
    $this->expectQuery("SOUNDEX('Quadratically')")
         ->toBe('Q36324');
});

test('SPACE', function () {
    $this->expectQuery("SPACE(6)")
         ->toBe('      ');
});


