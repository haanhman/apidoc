# <?php echo $data['project']->name ?><?php echo "\n"; ?>
<?php echo $data['project']->description ?><?php echo "\n"; ?>
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
### <?php echo $func['end_point'] . ' [' . $func['request_method'] . ']' ?><?php echo "\n"; ?>
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