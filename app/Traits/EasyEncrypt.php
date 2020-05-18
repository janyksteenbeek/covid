<?php

namespace App\Traits;

trait EasyEncrypt
{
    public function setAttribute($key, $value)
    {
        if (!is_null($this->encryptList) && in_array($key, $this->encryptList)) {
            $value = encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttributeValue($key)
    {
        $value = parent::getAttributeValue($key);

        if (is_null($value) || is_null($this->encryptList)) {
            return $value;
        }

        if (in_array($key, $this->encryptList)) {
            $value = is_null($value) ? $value : decrypt($value);
        }

        return $value;
    }

    public function decryptAll()
    {
        if (is_null($this->encryptList)) {
            return;
        }

        foreach ($this->attributes as $key => $attribute) {
            if (in_array($key, $this->encryptList)) {
                $this->attributes[$key] = is_null($attribute) ? $attribute : decrypt($attribute);
            }
        }
    }
}
