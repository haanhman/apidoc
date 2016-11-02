<?php
function vietdecode($value)
{
    $value = trim($value);
    $value = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $value);
    $value = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $value);
    $value = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $value);
    $value = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $value);
    $value = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $value);
    $value = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $value);
    $value = preg_replace("/(đ)/", 'd', $value);
    $value = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $value);
    $value = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $value);
    $value = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $value);
    $value = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $value);
    $value = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $value);
    $value = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $value);
    $value = preg_replace("/(Đ)/", 'D', $value);
    $trans = array(
            ':' => '', '/' => '', '@' => '', '+' => '', '(' => '', ')' => '', '?' => '', '=' => '', '&' => '', '{' => '', '}' => ''
    );
    $value = strtr($value, $trans);

    $value = trim($value, '-');
    return strtolower($value);
}

/**
 * function clean URL
 * return string url chi co cac ky tu tu a-z, 0-9 va khong chap nhan cac ky tu dac biet
 */
function change_url_seo($string, $file = false)
{
    $value = vietdecode($string);
    if ($file == false) {
        $value = preg_replace("/[^a-zA-Z0-9\_]/ism", '-', $value);
    } else {
        $value = preg_replace("/[^a-zA-Z0-9\.]/ism", '-', $value);
    }
    $value = preg_replace("/[\-]+/ism", '-', $value);
    if ($file == false) {
        preg_match_all('#[a-zA-Z0-9\s\-\+\_]+#im', $value, $matches);
    } else {
        preg_match_all('#[a-zA-Z0-9\s\-\+\.]+#im', $value, $matches);
    }
    $value = implode('', $matches[0]);
    $value = trim($value);
    $value = preg_replace('/\s+/', '-', $value);
    $value = preg_replace('/(\+)+/', '-', $value);
    $value = preg_replace('/(\-)+/', '-', $value);
    return trim($value, '-');
}
?>
# <?php echo $data['project']->name ?><?php echo "\n"; ?>
<?php echo $data['project']->description ?><?php echo "\n"; ?>


**Table of contents**<?php echo "\n\n" ?>
<?php
$i = 1;
foreach($data['group_function'] as $group) {
?>
<?php echo $i ?>. [{{$group->name}}](#{{change_url_seo($group->name)}})<?php echo "\n\n" ?>
<?php
$function = !empty($data['function'][$group->id]) ? $data['function'][$group->id] : array();
if(!empty($function)) {
$j = 1;
foreach($function as $func) {
$args = !empty($data['argument'][$func['id']]) ? $data['argument'][$func['id']] : array();
$return_value = !empty($data['return_value'][$func['id']]) ? $data['return_value'][$func['id']] : array();
?>
<?php echo "\t" . $i . '.' . $j . '. [/v1' . $func['end_point'] . '-' . $func['request_method'] ?>](#<?php echo change_url_seo('/v1'.$func['end_point'] . ' [' . $func['request_method'] .']') ?>)<?php echo "\n\n" ?>
<?php
}
}
$i++;
}
?>


<?php
foreach($data['group_function'] as $group) {
?>
## {{$group->name}}<?php echo "\n"; ?>
<?php echo $group->description ?><?php echo "\n"; ?>
<?php
$function = !empty($data['function'][$group->id]) ? $data['function'][$group->id] : array();
if(!empty($function)) {
foreach($function as $func) {
$args = !empty($data['argument'][$func['id']]) ? $data['argument'][$func['id']] : array();
$return_value = !empty($data['return_value'][$func['id']]) ? $data['return_value'][$func['id']] : array();
?>
### <?php echo '/v1'.$func['end_point'] . ' [' . $func['request_method'] . ']' ?><?php echo "\n"; ?>
*<?php echo $func['description'] ?>*<?php echo "\n\n"; ?>
Request method: **<?php echo $func['request_method'] ?>**<?php echo "\n"; ?>

**Argument**<?php echo "\n\n"; ?>
|Name|Type|Header|Require|Descriptions|<?php echo "\n"; ?>
|:---|:---|:---:|:---:|:---|<?php echo "\n"; ?>
<?php
if(!empty($args)) {
foreach($args as $arg_item) {
?>
|{{$arg_item['name']}}|{{$arg_item['data_type']}}|<?php if ($arg_item['is_header'] == 1) echo '✓'; ?>|<?php if ($arg_item['is_required'] == 1) echo '✓'; ?>|{{$arg_item['description']}}|<?php echo "\n"; ?>
<?php
}
}
?>

**Return value**<?php echo "\n\n"; ?>
|Name|Type|Descriptions|<?php echo "\n"; ?>
|:---|:---|:---|<?php echo "\n"; ?>
<?php
if(!empty($return_value)) {
foreach($return_value as $rt_item) {
?>
|{{$rt_item['name']}}|{{$rt_item['data_type']}}|{{$rt_item['description']}}<?php echo "\n"; ?>
<?php
}
}
?>

**Sample data**<?php echo "\n"; ?>
```javascript<?php echo "\n"; ?>
<?php echo $func['sample_data'] . "\n"; ?>
```<?php echo "\n"; ?>
--<?php echo "\n\n"; ?>
<?php
}
}
}
?>