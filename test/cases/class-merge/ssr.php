<?php $render = function ($data, $noDataOutput) {
final class _
{
    public static $componentRenderers = [];
    private const HTML_ENTITY = [
        '&' => '&amp;',
        '<' => '&lt;',
        '>' => '&gt;',
        '"' => '&quot;',
        "'" => '&#39;'
    ];

    public static function objSpread($arr, $needSpread) {
        $obj = (object)[];
        foreach ($arr as $idx => $val) {
            if ($needSpread[$idx]) {
                foreach ($val as $subkey => $subvar) {
                    $obj->{$subkey} = $subvar;
                }
            } else {
                $obj->{$val[0]} = $val[1];
            }
        }
        return $obj;
    }

    public static function spread($arr, $needSpread) {
        $ret = [];
        foreach ($arr as $idx => $val) {
            if ($needSpread[$idx]) {
                foreach ($val as $subvar) array_push($ret, $subvar);
            } else {
                array_push($ret, $val);
            }
        }
        return $ret;
    }

    public static function extend($target, $source)
    {
        if (!$target) $target = (object)[];
        if ($source) {
            foreach ($source as $key => $val) {
                $target->{$key} = $val;
            }
        }
        return $target;
    }

    public static function each($array, $iter)
    {
        if (!$array) {
            return;
        }
        foreach ($array as $key => $val) {
            if ($iter($val, $key) === false) {
                break;
            }
        }
    }

    public static function contains($array, $value)
    {
        return in_array($value, $array);
    }

    public static function htmlFilterReplacer($c)
    {
        return _::HTML_ENTITY[$c];
    }

    public static function escapeHTML($source)
    {
        if (!$source) {
            return "";
        }
        if (is_string($source)) {
            return htmlspecialchars($source, ENT_QUOTES);
        }
        if (is_bool($source)) {
            return $source ? 'true' : 'false';
        }
        return strval($source);
    }

    public static function _classFilter($source)
    {
        if (is_array($source)) {
            return join(" ", $source);
        }
        return $source;
    }

    public static function _styleFilter($source)
    {
        return _::defaultStyleFilter($source);
    }

    public static function _xclassFilter($outer, $inner)
    {
        if (is_array($outer)) {
            $outer = join(" ", $outer);
        }
        if ($outer) {
            if ($inner) {
                return $inner . ' ' . $outer;
            }
            return $outer;
        }
        return $inner;
    }

    public static function _xstyleFilter($outer, $inner)
    {
        if ($outer) {
            $outer = _::defaultStyleFilter($outer);
        }
        if ($outer) {
            if ($inner) {
                return $inner . ';' . $outer;
            }
            return $outer;
        }
        return $inner;
    }

    public static function attrFilter($name, $value)
    {
        if (isset($value)) {
            return " " . $name . '="' . $value . '"';
        }
        return '';
    }

    public static function boolAttrFilter($name, $value)
    {
        return _::boolAttrTruthy($value) ? ' ' . $name : '';
    }

    private static function boolAttrTruthy($value) {
        if (is_string($value)) {
            return $value != '' && $value != 'false' && $value != '0';
        }
        return (boolean)$value;
    }

    public static function callFilter($ctx, $name, $args)
    {
        $filter = $ctx["proto"]["filters"][$name];
        // TODO this is
        if (is_callable($filter)) {
            return call_user_func_array($filter, $args);
        }
    }

    public static function defaultStyleFilter($source)
    {
        if (is_array($source) || is_object($source)) {
            $result = '';
            foreach ($source as $key => $val) {
                $result .= $key . ':' . $val . ';';
            }
            return $result;
        }
        return $source;
    }
}
function _id2($data, $noDataOutput = false, $parentCtx = [], $tagName = null, $sourceSlots = []) {
$_id2Proto = [
"filters" => [

],
"computed" => [

],
"computedNames" => [

],
"tagName" => "b"
];
$html = "";
$componentCtx = [
"proto" => $_id2Proto,
"sourceSlots" => $sourceSlots,
"data" => $data ? $data : (object)[],
"owner" => $parentCtx,
"slotRenderers" => []
];
if ($data) {
}
$computedNames = $componentCtx["proto"]["computedNames"];
foreach ($computedNames as $i => $computedName) {
  $data[$computedName] = $componentCtx["proto"]["computed"][$computedName]($componentCtx);
}
$html .= "<b";
$html .= _::attrFilter('class', _::escapeHTML(_::_xclassFilter((isset($componentCtx["data"]->{"class"}) ? $componentCtx["data"]->{"class"} : null), _::escapeHTML(_::_classFilter((isset($componentCtx["data"]->{"clazz"}) ? $componentCtx["data"]->{"clazz"} : null))))));
if ((isset($componentCtx["data"]->{"style"}) ? $componentCtx["data"]->{"style"} : null)) {
$html .= _::attrFilter('style', _::escapeHTML(_::_styleFilter((isset($componentCtx["data"]->{"style"}) ? $componentCtx["data"]->{"style"} : null))));
}
if ((isset($componentCtx["data"]->{"id"}) ? $componentCtx["data"]->{"id"} : null)) {
$html .= _::attrFilter('id', _::escapeHTML((isset($componentCtx["data"]->{"id"}) ? $componentCtx["data"]->{"id"} : null)));
}
$html .= ">";
if (!$noDataOutput) {
$html .= "<!--s-data:" . json_encode($componentCtx["data"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "-->";
}
$html .= _::escapeHTML((isset($componentCtx["data"]->{"text"}) ? $componentCtx["data"]->{"text"} : null));
$html .= "</b>";
return $html;
};
function _id1($data, $noDataOutput = false, $parentCtx = [], $tagName = null, $sourceSlots = []) {
$_id1Proto = [
"filters" => [

],
"computed" => [

],
"computedNames" => [

],
"tagName" => "div"
];
$html = "";
$componentCtx = [
"proto" => $_id1Proto,
"sourceSlots" => $sourceSlots,
"data" => $data ? $data : (object)[],
"owner" => $parentCtx,
"slotRenderers" => []
];
if ($data) {
}
$computedNames = $componentCtx["proto"]["computedNames"];
foreach ($computedNames as $i => $computedName) {
  $data[$computedName] = $componentCtx["proto"]["computed"][$computedName]($componentCtx);
}
$html .= "<div";
if ((isset($componentCtx["data"]->{"class"}) ? $componentCtx["data"]->{"class"} : null)) {
$html .= _::attrFilter('class', _::escapeHTML(_::_classFilter((isset($componentCtx["data"]->{"class"}) ? $componentCtx["data"]->{"class"} : null))));
}
if ((isset($componentCtx["data"]->{"style"}) ? $componentCtx["data"]->{"style"} : null)) {
$html .= _::attrFilter('style', _::escapeHTML(_::_styleFilter((isset($componentCtx["data"]->{"style"}) ? $componentCtx["data"]->{"style"} : null))));
}
if ((isset($componentCtx["data"]->{"id"}) ? $componentCtx["data"]->{"id"} : null)) {
$html .= _::attrFilter('id', _::escapeHTML((isset($componentCtx["data"]->{"id"}) ? $componentCtx["data"]->{"id"} : null)));
}
$html .= ">";
if (!$noDataOutput) {
$html .= "<!--s-data:" . json_encode($componentCtx["data"], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "-->";
}
$sourceSlots = [];
$html .= call_user_func("_id2", 
(object)["class" => _::escapeHTML(_::_classFilter((isset($componentCtx["data"]->{"clazz"}) ? $componentCtx["data"]->{"clazz"} : null)))], true, $componentCtx, "x-child", $sourceSlots);
$sourceSlots = null;
$html .= "</div>";
return $html;
};
return call_user_func("_id1", $data, $noDataOutput);
}; ?>