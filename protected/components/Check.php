<?php
class Check
{
    static function Value($val)
    {
        try
        {
            if (isset($val))
            {
                if (!empty($val))
                {
                    return true;
                }
            }
        }
        catch (Exception $e)
        {
        }
        return false;
    }
    static function Clear($val)
    {
        $val = trim($val);
        $val = stripslashes($val);
        $val = htmlspecialchars($val);
        return $val;
    }
}