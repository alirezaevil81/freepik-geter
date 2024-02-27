<?php

namespace Src\Traits;


trait HasFilters
{

    private function setVal($value, $type1, $type2 = null)
    {
        if ($type2 != null) {
            $this->uri .= '&filters[' . $type1 . '][' . $type2 . ']=' . $value;
        } else {
            $this->uri .= '&filters[' . $type1 . ']=' . $value;
        }
    }

    private function switchBool($var, $type1, $type2 = null)
    {
        if ($type2 != null) {
            switch ($var) {
                case true;
                    $this->uri .= '&filters[' . $type1 . '][' . $type2 . ']=1';
                    break;
                default;
                    $this->uri .= '&filters[' . $type1 . '][' . $type2 . ']=0';
                    break;
            }
        } else {
            switch ($var) {
                case true;
                    $this->uri .= '&filters[' . $type1 . ']=1';
                    break;
                default;
                    $this->uri .= '&filters[' . $type1 . ']=0';
                    break;
            }
        }
    }

    public function orientation
    (
        $landscape = false,
        $portrait = false,
        $square = false,
        $panoramic = false
    )
    {
        $this->switchBool($landscape, 'orientation', 'landscape');
        $this->switchBool($portrait, 'orientation', 'portrait');
        $this->switchBool($square, 'orientation', 'square');
        $this->switchBool($panoramic, 'orientation', 'panoramic');
        return $this;
    }

    public function contentType
    (
        $photo = false,
        $psd = false,
        $vector = false
    )
    {
        $this->switchBool($photo, 'content_type', 'photo');
        $this->switchBool($psd, 'content_type', 'psd');
        $this->switchBool($vector, 'content_type', 'vector');
        return $this;
    }

    public function license
    (
        $freemium = false,
        $premium = false,
        $essential = false
    )
    {
        $this->switchBool($freemium, 'license', 'freemium');
        $this->switchBool($premium, 'license', 'premium');
        $this->switchBool($essential, 'license', 'essential');
        return $this;
    }

    public function people
    (
        $include = false,
        $exclude = false,
        $number = null,
        $age = null,
        $gender = null,
        $ethnicity = null
    )
    {
        $this->switchBool($include, 'people', 'include');
        $this->switchBool($exclude, 'people', 'exclude');
        if ($number != null) {
            $this->setVal($number, 'people', 'number');
        }
        if ($age != null) {
            $this->setVal($age, 'people', 'age');
        }
        if ($gender != null) {
            $this->setVal($gender, 'people', 'gender');
        }
        if ($ethnicity != null) {
            $this->setVal($ethnicity, 'people', 'ethnicity');
        }
        return $this;
    }

    public function choice($choice = true)
    {
        $this->switchBool($choice, 'choice');
        return $this;
    }

    public function shape($value)
    {
        $this->setVal($value, 'shape');
        return $this;
    }

    public function freeSvg($value)
    {
        $this->setVal($value, 'free_svg');
        return $this;
    }

    public function period($value)
    {
        $this->setVal($value, 'period');
        return $this;
    }

    public function color($value)
    {
        $this->setVal($value, 'color');
        return $this;
    }

    public function author($value)
    {
        $this->setVal($value, 'author');
        return $this;
    }

    public function quickEdit($quickEdit = true)
    {
        $this->switchBool($quickEdit, 'quick-edit');
        return $this;
    }

    public function vector($type, $style)
    {
        $this->setVal($type, 'vector', 'type');
        $this->setVal($style, 'vector', 'style');
        return $this;

    }

    public function aiGenerated($excluded = false, $only = false)
    {
        $this->switchBool($excluded, 'ai-generated', 'excluded');
        $this->switchBool($only, 'ai-generated', 'only');
        return $this;
    }

    public function psd($value)
    {
        $this->setVal($value, 'psd', 'type');
        return $this;
    }

    public function ids($value)
    {
        $this->setVal($value, 'ids');
        return $this;
    }
}