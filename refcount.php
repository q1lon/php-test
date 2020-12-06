<?php
// 变量赋值时，refcount 值等于 1
$name = 'zzz'.time(); // php5.4以后如果字符串是一个不可变字符串 会显示(interned , is_ref=0
xdebug_debug_zval('name'); // (refcount=1, is_ref=0)string 'zzz'

// $name 作为值赋值给另一个变量， refcount 值增加 1
$copy = $name;
xdebug_debug_zval('name'); // (refcount=2, is_ref=0)string 'zzz'

// 销毁变量，refcount 值减掉 1
unset($copy);
xdebug_debug_zval('name'); // (refcount=1, is_ref=0)string 'zzz'



$a = array( 'meaning' => 'life', 'number' => 42 );
xdebug_debug_zval( 'a' );
$a['life'] = $a['meaning'];
xdebug_debug_zval( 'a' );

